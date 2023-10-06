<?php

namespace App\Http\Controllers\Api;

use App\Events\NewTrip;
use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\TripRequest;

use App\Models\User;
use App\Services\DistanceService;
use App\Services\Firebase\FirestoreService;
use App\Services\NotificationService;
use App\Services\TripRequestService;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class TripRequestController extends Controller
{
    public function index(): JsonResponse
    {
        $tripRequests = TripRequest::all();

        return response()->json(['data' => $tripRequests], 200);
    }

    public function getServices(Request $request, DistanceService $distanceService):JsonResponse
    {
        $user = User::find(auth()->id());
        if(!$user->region_id){
            return $this->errorResponse('We cant identify your pickup location');
        }

        $region_id = $user->region_id;

        $request->validate([
            'type' => 'required',
        ]);

        $d_lat = $request['destination_lat'];
        $d_lng = $request['destination_lng'];
        $o_lng = $request['origin_lng'];
        $o_lat = $request['origin_lat'];

        $type = $request['type'];

        $tripRequestService = new TripRequestService();

//        if($user->email == 'Rider@gmail.com'){
            $region = $tripRequestService->getRegion($user, $request['origin_lat'], $request['origin_lng']);

            if(!$region){
                return $this->errorResponse('Your pickup address is not supported by our service');
            }

//            return $region;
//        }



        $service_types =  Service::where('types', 'LIKE', '%'.$type.'%')
            ->where('region_id', $region_id)
            ->where('is_active', true)
            ->get();

        foreach ($service_types as $type) {
            $d_km = $distanceService->getDistance($o_lat, $o_lng, $d_lat, $d_lng);
            if (isset($d_km['distance'])) {
                $type->distance_m = $d_km['distance']['value'];
                $type->duration = (number_format($d_km['duration']['value'] / 60)) . ' minutes';
                $type->distance_price = ($d_km['distance']['value'] / 1000) * $type->distance_price;

                $type->arrived_at = Carbon::now()->addMinutes(ceil($d_km['duration']['value'] / 60))->format('H:i');

                $type->time_price = $type->time_price * ($d_km['duration']['value'] / 60);

                $type->fee = $type->time_price + $type->distance_price + $type->price;

                $tax_percent = 0.075;

                $type->tax = ($type->fee * $tax_percent);

                $type->grand_total = $type->fee + $type->tax;

                $type->discounted_fee = $type->discounted($type->grand_total);
            } else {
                return $this->errorResponse('Distance is not set');
            }
        }


        return response()->json(['data' => $service_types], 200);
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

    public function store(Request $request, TripRequestService $tripRequestService,
                          DistanceService $distanceService,
                          FirestoreService $firestoreService): JsonResponse
    {
        try {

            $user = User::find(auth()->id());

            $request['customer_id'] = $user->id;

            $region = $tripRequestService->getRegion($user, $request['origin_lat'], $request['origin_lng']);
            if(!$region){
                return $this->errorResponse('Your pickup address is not supported by our service');
            }

            $request['region_id'] = $region->id;

            $data = $this->validateTripRequest($request);

            $service = Service::find($data['service_id']);

            if(!$service){
                return $this->errorResponse('Invalid booking service');
            }

            $distance = $distanceService->getDistance($data['origin_lat'], $data['origin_lng'], $data['destination_lat'], $data['destination_lng']);

            if(!$distance){
                return $this->errorResponse('wrong location');
            }


            $data['distance'] = $distance['distance']['value'] / 1000;
            $data['distance_text'] = $distance['distance']['text'];

            $data['distance_price'] = $data['distance'] * $service->distance_price;


            $data['duration'] = $distance['duration']['value'] / 60;
            $data['duration_text'] = $distance['duration']['text'];

            $data['time_price'] = $data['duration'] * $service->time_price;

            $data['base_price'] = $service->price;

            $data['fee'] = customRound($data['time_price'] + $data['distance_price'] + $service->price);

            $tax_percent = ($service->tax / 100);

            $data['tax'] = ($data['fee'] * $tax_percent);

            $grand_total = $data['fee'] + $data['tax'];

            $data['discount'] = $service->discount;
            $data['grand_total'] = $service->discounted($grand_total);

            $data['commission'] = $service->commission($data['grand_total']);

            $data['reference'] = substr(settings('site_name', 'TRIP'), 0, 4).'-'.date('Ymd-Hm').'-'.mt_rand(100000,9999999);

            $tripRequest = TripRequest::create($data);

            if($tripRequest){
                $tripRequest = TripRequest::find($tripRequest->id);
                if($tripRequest){
                    $firestoreService->updateTripRequest($tripRequest);
                }
            }


            event(new NewTrip($tripRequest));

//            $this->notifyOnlineDrivers($tripRequest);

            $data['data'] = $tripRequest;

            return $this->successResponse('success', $data);

        } catch (ValidationException $e) {
            return $this->errorResponse($e->errors(), 400);
        } catch (\Exception $e) {
            return $this->errorResponse( $e->getMessage(), 500);
        }
    }



    public function notifyOnlineDrivers($order){

        $drivers = $this->getDriversByDistance($order->origin_lat, $order->origin_lng, $order->region_id);

        $data['title'] = "New ride request";
        $data['message'] = "There is a new ride request within your current location";

        $notificationService = new NotificationService();

        return $notificationService->notifyMany($drivers, $data);
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

    public function getTrip($id): JsonResponse
    {
        try {
            $trip = TripRequest::with(['driver','customer'])->find($id);

            return $this->successResponse('Trip', $trip);

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

    public function tripHistory(): JsonResponse
    {
        $is_driver = auth()->user()->hasRole('driver');
        $msg = 'Riders completed trips';
        if($is_driver){
            $msg = 'Drivers completed trips';
            $trips = TripRequest::where('driver_id', auth()->id())
                ->where(function ($query) {
                    $query->where('completed', true)
                        ->orWhere('cancelled', true);
                })->latest()->paginate(100);
        }else{
            $trips = TripRequest::where('customer_id', auth()->id())
                ->where(function ($query) {
                    $query->where('completed', true)
                        ->orWhere('cancelled', true);
                })->latest()->paginate(100);
        }
        return $this->successResponse($msg, $trips);

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
