<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Car;
use App\Models\Rental;
use App\Models\Service;
use App\Models\TripRequest;

use App\Models\User;
use App\Services\DistanceService;
use App\Services\Firebase\FirestoreService;
use App\Services\TripRequestService;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class BookingController extends Controller
{
    public function index()
    {
        $tripRequests = TripRequest::all();

        return response()->json(['data' => $tripRequests], 200);
    }

    public function getPackages(Request $request, DistanceService $distanceService):JsonResponse
    {
        $user = User::find(auth()->id());
        if(!$user->region_id){
            return $this->errorResponse('We cant identify your pickup location');
        }

        $region_id = $user->region_id;

        $request->validate([
            'pick_up_lat' => 'required',
            'pick_up_lng' => 'required',
            'pick_location' => 'required',
            'pick_up_time' => 'nullable',
            'pick_up_date' => 'nullable',
            'drop_off_time' => 'nullable',
            'drop_off_date' => 'nullable',
        ]);

        $d_lat = $request['destination_lat'];
        $d_lng = $request['destination_lng'];
        $o_lng = $request['origin_lng'];
        $o_lat = $request['origin_lat'];

        $type = $request['type'];

        $service_types =  Rental::where('types', 'LIKE', '%'.$type.'%')
            ->where('region_id', $region_id)->get();


        return response()->json(['data' => $service_types], 200);
    }

    public function getAllCars(): JsonResponse
    {
        $data = Car::all();
        return $this->successResponse('cars', $data);
    }

    public function setBooking(Request $request)
    {
        $user = User::find(auth()->id());
        if(!$user->region_id){
            return $this->errorResponse('We cant identify your pickup location');
        }

        $region_id = $user->region_id;

        $request->validate([

            'pick_up_time' => 'nullable',
            'pick_up_date' => 'nullable',

            'drop_off_date' => 'nullable',
            'car_id' => 'required',
        ]);


        $pick_up_date = $request['pick_up_date'];

        $drop_off_date = $request['drop_off_date'];

        $startDate = Carbon::parse($pick_up_date);
        $endDate = Carbon::parse($drop_off_date);

        $diffInDays = $endDate->diffInDays($startDate);

        $car = Car::find($request->input('car_id'));

        if(!$car){
            return $this->errorResponse('Something went wrong', 422);
        }


        if($diffInDays < 2){
            return $this->errorResponse('Your drop off date cant be same as pickup', 422);
        }

        $booking = [
            "days" => $diffInDays,

            "pick_up_date" => $pick_up_date,
            "drop_off_date" => $drop_off_date,

        ];

        $tax = ($car->price_per_day * $diffInDays) * 0.075;


        $booking['price_in_days'] =  $car->price_per_day * $diffInDays;
        $booking['grand_total'] =  ($car->price_per_day * $diffInDays) + $tax;


        $price = [
            ['name' => 'Price', 'val' => $car->price_per_day],
            ['name' => 'Tax', 'val' => $tax],
            ['name' => 'Total', 'val' => ($car->price_per_day * $diffInDays)],
            ['name' => 'Grand total', 'val' => ($car->price_per_day * $diffInDays) + $tax],
        ];

        $car->price = $price;

        $car->booking = $booking;


        return $this->successResponse('available cars', $car);
    }


    public function getCars(Request $request, DistanceService $distanceService)
    {
        $user = User::find(auth()->id());

        $validated = $request->validate([
            'pick_up_lat' => 'required',
            'pick_up_lng' => 'required',
            'pick_location' => 'required',
            'pick_up_time' => 'nullable',
            'pick_up_date' => 'nullable',
            'drop_off_time' => 'nullable',
            'drop_off_date' => 'nullable',
            'filter' => 'nullable',
        ]);

        $pick_up_lat = $request['pick_up_lat'];
        $pick_up_lng = $request['pick_up_lng'];
        $pick_location = $request['pick_location'];
        $pick_up_time = $request['pick_up_time'];
        $pick_up_date = $request['pick_up_date'];
        $drop_off_time = $request['drop_off_time'];
        $drop_off_date = $request['drop_off_date'];

        $startDate = Carbon::parse($pick_up_date);
        $endDate = Carbon::parse($drop_off_date);

        $diffInDays = $endDate->diffInDays($startDate);

        if(is_string($validated['filter'])){
            $filter =  json_decode($validated['filter']);
        }else{
            $filter =  $validated['filter'];
        }


        if($startDate > $endDate){
            return $this->errorResponse('Invalid pickup and drop-off date', 422);
        }

        $query = Car::query();


        foreach ($filter as $category => $values) {

            if($category == 'car_makes'){
                if(count($values) > 0) {
                    $query->whereIn('make', $values);
                }
            }
            if($category == 'car_models'){
                if(count($values) > 0) {
                    $query->whereIn('model', $values);
                }
            }
            if($category == 'car_types'){
                if(count($values) > 0) {
                    $query->whereIn('type', $values);
                }
            }
            if($category == 'transmissions'){
                if(count($values) > 0) {
                    $query->whereIn('gear', $values);
                }
            }
            if($category == 'electric_cars'){
                if(count($values) > 0){
                    $query->whereIn('fuel_type', $values);
                }
            }

            if($category == 'mileage'){
                if(in_array('unlimited', $values)){
                    $query->where('mileage', 0);
                }
            }

            if($category == 'car_specs'){
                if (in_array('4+ door', $values)) {
                    $query->where('door', '>', 3);
                }
            }

        }

        $booking = [
            "days" => $diffInDays,
            "pick_location" => $pick_location,
            "pick_up_time" => $pick_up_time,
            "pick_up_date" => $pick_up_date,
            "drop_off_date" => $drop_off_date,
            "pick_up_lat" => $pick_up_lat,
            "pick_up_lng" => $pick_up_lng,
            "drop_off_time" => $drop_off_time
        ];

        $data = $query->paginate(10);

        foreach ($data as $item){

            $tax = ($item->price_per_day * $diffInDays) * 0.075;


            $booking['price_in_days'] =  $item->price_per_day * $diffInDays;
            $booking['grand_total'] =  ($item->price_per_day * $diffInDays) + $tax;


            $price = [
                ['name' => 'Price', 'val' => $item->price_per_day],
                ['name' => 'Tax', 'val' => $tax],
                ['name' => 'Total', 'val' => ($item->price_per_day * $diffInDays)],
                ['name' => 'Grand total', 'val' => ($item->price_per_day * $diffInDays) + $tax],
            ];

            $item->price = $price;
            $item->booking = $booking;
        }

        $response['cars'] = $data;

        $response['filter'] =  [
        'car_specs' => [
            'Air conditioning',
            '4+ door',
        ],
        'electric_cars' => [
            'fully_electric',
            'hybrid',
            'plug_in_hybrid',
        ],
        'mileage' => [
            'limited',
            'unlimited',
        ]
    ];


        $response['filter']['car_makes'] = array_values(array_unique($data->pluck('make')->toArray()));
        $response['filter']['car_models'] = array_values(array_unique($data->pluck('model')->toArray()));

        $response['car_types'] = array_values(array_unique($data->pluck('type')->toArray()));
        $response['filter']['transmissions'] = array_values(array_unique($data->pluck('gear')->toArray()));

        array_unshift($response['car_types'], 'all');

        return $this->successResponse('available cars', $response);
    }

    public function myActiveRide(): JsonResponse
    {
        $user = auth()->user();
        if($user->hasRole('driver')){
            $trip = TripRequest::whereCancelled(0)
                ->where('driver_feedback', 0)
                ->where('region_id', auth()->user()->region_id)
                ->latest()->first();
        }else{
            $trip = TripRequest::where('customer_id',$user->id)
                ->whereCancelled(0)->where('rider_feedback', 0)
                ->latest()->first();
        }

        return $this->successResponse('pending Trip', $trip);
    }

    public function store(Request $request): JsonResponse
    {
        try {

            $user = User::find(auth()->id());


            $data = $request->validate([
                'pick_up_lat' => 'required',
                'car_id' => 'required',
                'pick_up_lng' => 'required',
                'pick_location' => 'required',
                'pick_up_time' => 'required',
                'pick_up_date' => 'required',
                'drop_off_time' => 'required',
                'drop_off_date' => 'required',
            ]);

            $data['customer_id'] = $user->id;

            $car = Car::findOrFail($data['car_id']);

//            if(!$car->is_available){
//                return $this->errorResponse('Sorry this car is not available for booking', 422);
//            }


            $pick_up_date = $request['pick_up_date'];
            $drop_off_time = $request['drop_off_time'];
            $drop_off_date = $request['drop_off_date'];

            $startDate = Carbon::parse($pick_up_date);
            $endDate = Carbon::parse($drop_off_date);

            $diffInDays = $endDate->diffInDays($startDate);

            if($diffInDays < 2){
                return $this->errorResponse('Your drop off date cant be same as pickup', 422);
            }

            $tax = ($car->price_per_day * $diffInDays) * 0.075;


            $data['fee'] =  $car->price_per_day * $diffInDays;
            $data['grand_total'] =  $data['fee'] + $tax;


            if($user->account_balance < $data['grand_total']){
                return $this->errorResponse('Your drop off date cant be same as pickup', 422);
            }

            $data['reference'] = substr(settings('site_name', 'TRIP'), 0, 4).'-CAR-'.date('Hm').'-'.mt_rand(100,999);

            $data['payment_method'] = 'wallet';

            $data['payment_status'] = 'paid';

            $booking = Booking::create($data);

            if($booking){

                $user->forceWithdraw($booking->grand_total, ['description' => 'Car booking wallet pay']);

                $car->is_available = false;

                $car->save();
            }

            return $this->successResponse('your booking request successfully completed', $booking);

        } catch (ValidationException $e) {
            return $this->errorResponse($e->errors(), 400);
        } catch (\Exception $e) {
            return $this->errorResponse( $e->getMessage(), 500);
        }
    }


    public function update(Request $request, $id, FirestoreService $firestoreService): JsonResponse
    {
        try {
            $validatedData = $this->validateTripRequest($request);

            $tripRequest = TripRequest::findOrFail($id);

            $tripRequest->update($validatedData);

            $firestoreService->updateTripRequest($tripRequest);

            return $this->successResponse('trip updated', $tripRequest);


        } catch (ValidationException $e) {
            return response()->json(['error' => $e->errors()], 400);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    public function updateStatus(Request $request, FirestoreService $firestoreService): JsonResponse
    {
        try {
            $trip = TripRequest::find($request['id']);
            $driver = User::find($trip->driver_id);
            $trip->status = $request['status'];



            if($request['status'] == 'cancelled_by_driver' || $request['status'] == 'cancelled_by_booker'){
                $trip->cancelled = true;
                $trip->cancelled_by = $request['status'];
                $trip->cancellation_reason = $request['cancellation_reason'];

                $firestoreService->deleteTrip($trip);
            }
            if($request['status'] == 'started_trip'){
                $trip->started_at = Carbon::now();
            }

            if($request['status'] == 'cash_received' || $request['status'] == 'trip_completed'){
//            $order->payment_method = "cash";
                if($request['status'] == 'cash_received'){
                    $trip->payment_status = "paid";
                }

                if($request['driver_lat'] && $request['driver_lng']){

                    $driver->map_lat = $request['driver_lat'];

                    $driver->map_lng = $request['driver_lng'];

                    $driver->save();
                }else{
                    return $this->errorResponse('Cant complete this ride');
                }

                $service = Service::find($trip->service_id);

                $trip->status = "awaiting_feedback";

                $trip->end_at = Carbon::now();
//            $order->completed = true;
                $distance = $this->getDistance($trip->origin_lat,$trip->origin_lng, $driver->map_lat, $driver->map_lng);

                if(isset($distance['distance'])) {
                    $dist = $distance['distance']['value'] / 1000;
                    $trip->distance = $dist > 0 ? $dist : 1;
                    $trip->distance_text = $distance['distance']['text'];

                }else{
                    $trip->distance = 0;
                    $trip->distance_text = "0 km";
                }


                $trip->distance_price = $trip->distance * $service->distance_price;


                $ride_time = now()->diffInMinutes($trip->started_at);

                $trip->duration = $ride_time > 0 ? $ride_time : 1;
                $trip->duration_text = "$trip->duration mins";

                $trip->time_price = $service->time_price * $trip->duration;

                $trip->fee = $trip->time_price + $trip->distance_price + $service->price;

                $tax_percent =  ($service->tax / 100);


                $trip->tax = ($trip->fee * $tax_percent);

                $trip->grand_total = $service->discounted($trip->fee + $trip->tax);

//            $driver = User::find($trip->driver_id);

                $trip->commission = $service->commission($trip->grand_total);

                $driver_earn = $trip->grand_total - $trip->commission;

                $trip->driver_earn = $driver_earn;

                if($trip->payment_method == "wallet"){
                    $user = User::find($trip->customer_id);


                    if($user){

                        $user->forceWithdraw($trip->grand_total, ['description' => 'Ride wallet pay']);

                        $driver->deposit($driver_earn,['description' => 'Ride earn']);
                    }

                }else{

                    $driver_fee = $trip->commission;

                    $driver->forceWithdraw($driver_fee, ['description' => 'Commission for ride'.$trip->reference]);

                }

                $trip->save();

            }

            $trip->save();

            if(!$trip->cancelled){
                $firestoreService->updateTripRequest($trip);
            }

            return $this->successResponse('order', $trip);

        }catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), 500);
        }

    }

    public function updateCurrentPosition(Request $request, FirestoreService $firestoreService): JsonResponse
    {
        try {
            $trip = TripRequest::find($request['id']);
            $trip->current_lat = $request['current_lng'];
            $trip->current_lng = $request['current_lat'];
            $trip->save();

            $firestoreService->updateTripRequest($trip);
            return $this->successResponse('Trip', $trip);
        }catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), 500);
        }

    }

    public function acceptRide(Request $request, FirestoreService $firestoreService): JsonResponse
    {
        $v = request()->header('X-App-Version') ?? 0;

//        if($v < env('VERSION')){
//            return response()->json(['status'=>0,'message' => __('Please update your app')], 404);
//        }

        try {
            $user = User::find(auth()->id());

            $request->validate([
                'id' => 'required',
            ]);


            $id = $request['id'];

            $trip = TripRequest::findOrFail($id);

            $car = $user->car;

            if(!$user->hasRole('driver') || !$car){
                return $this->errorResponse('Sorry only approved drivers can accept rides');
            }

            $trip->status = 'driver_accepted';
            $trip->driver_id = $user->id;
            $trip->car_id = $car->id;
            $trip->save();

            $trip = TripRequest::findOrFail($id);

            $firestoreService->updateTripRequest($trip);

            return $this->successResponse('trip', $trip);


        }catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), 500);
        }

    }


    public function shareFeedback(Request $request, FirestoreService $firestoreService): JsonResponse
    {
        try {
            $request->validate([
                'trip_id' => 'required',
                'rating' => 'required',
                'user' => 'required',
                'rating_comment' => 'nullable',
            ]);


            $trip = TripRequest::find($request['trip_id']);

            if ($trip) {
                $trip->rating = $request['rating'];
                $trip->rating_comment = $request['rating_comment'] ?? "";

                if ($request['user'] == "driver") {
                    $trip->driver_feedback = 1;
                    $trip->completed = 1;
                    $trip->status = "awaiting_feedback";
                } else {
                    $trip->rider_feedback = 1;
                }

                $trip->save();
                $firestoreService->updateTripRequest($trip);
            }else{
                return $this->errorResponse('Cant find trip');
            }

            return $this->successResponse('Feedback submitted', $trip);
        }
        catch (\Exception $e) {
                return $this->errorResponse($e->getMessage(), 500);
            }
    }

    public function bookingHistory(): JsonResponse
    {
        $is_driver = auth()->user()->hasRole('driver');
        $msg = 'Customers completed bookings';
        if($is_driver){
            $msg = 'Drivers completed trips';
            $bookings = [];
        }else{
            $bookings = Booking::where('customer_id', auth()->id())->latest()->paginate(100);
        }
        return $this->successResponse($msg, $bookings);

    }


    public function destroy(TripRequest $tripRequest)
    {
        try {
            $tripRequest->delete();

            return response()->json(null, 204);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    private function validateTripRequest(Request $request): array
    {
        return $request->validate([
            'region_id' => 'required',
            'customer_id' => 'required',

            'fee' => 'nullable',

            'origin' => 'required',
            'destination' => 'required',
            'payment_status' => 'nullable',
            'payment_method' => 'nullable',
            'origin_lat' => 'required',
            'origin_lng' => 'required',
            'destination_lat' => 'nullable',
            'destination_lng' => 'nullable',
            'started_at' => 'nullable',
            'end_at' => 'nullable',

            'current_lat' => 'nullable',
            'current_lng' => 'nullable',

            'distance' => 'nullable',
            'distance_text' => 'nullable',
            'duration' => 'nullable',
            'duration_text' => 'nullable',

            'car_id' => 'nullable',

            'completed' => 'nullable',
            'cancelled' => 'nullable',

            'rating' => 'nullable',
            'driver_rating' => 'nullable',
            'rating_comment' => 'nullable',
            'driver_rating_comment' => 'nullable',
            'driver_feedback' => 'nullable',
            'rider_feedback' => 'nullable',

            'base_price' => 'nullable',
            'time_price' => 'nullable',
            'distance_price' => 'nullable',
            'discount' => 'nullable',
            'tax' => 'nullable',
            'grand_total' => 'nullable',

            'service_id' => 'required',
            'ride_type' => 'required',
            'commission' => 'nullable',
            'driver_earn' => 'nullable',
        ]);
    }
}
