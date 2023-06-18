<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TripRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class TripRequestController extends Controller
{
    public function index()
    {
        $tripRequests = TripRequest::all();

        return response()->json(['data' => $tripRequests], 200);
    }

    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        try {

            $data = $this->validateTripRequest($request);

            $tripRequest = TripRequest::create($data);

            return $this->successResponse('success', $tripRequest);

        } catch (ValidationException $e) {
            return $this->errorResponse($e->errors(), 400);
        } catch (\Exception $e) {
            return $this->errorResponse( $e->getMessage(), 500);
        }
    }


    public function update(Request $request, TripRequest $tripRequest)
    {
        try {
            $validatedData = $this->validateTripRequest($request);

            $tripRequest->update($validatedData);

            return response()->json(['data' => $tripRequest], 200);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->errors()], 400);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
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

    private function validateTripRequest(Request $request)
    {
        return $request->validate([
            'region_id' => 'required',
            'driver_id' => 'required',
            'customer_id' => 'required',
            'fee' => 'required',
            'reference' => 'required',
            'origin' => 'required',
            'destination' => 'required',
            'status' => 'required',
            'payment_status' => 'required',
            'payment_method' => 'required',
            'origin_lat' => 'required',
            'origin_lng' => 'required',
            'destination_lat' => 'required',
            'destination_lng' => 'required',
            'started_at' => 'required',
            'end_at' => 'required',
            'current_lat' => 'required',
            'current_lng' => 'required',
            'distance' => 'required',
            'distance_text' => 'required',
            'duration' => 'required',
            'duration_text' => 'required',
            'car_id' => 'required',
            'completed' => 'required',
            'cancelled' => 'required',
            'rating' => 'required',
            'driver_rating' => 'required',
            'rating_comment' => 'required',
            'driver_rating_comment' => 'required',
            'driver_feedback' => 'required',
            'rider_feedback' => 'required',
            'base_price' => 'required',
            'time_price' => 'required',
            'distance_price' => 'required',
            'discount' => 'required',
            'tax' => 'required',
            'grand_total' => 'required',
            'service_id' => 'required',
        ]);
    }
}
