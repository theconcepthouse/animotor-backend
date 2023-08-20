<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CancellationReason;
use App\Models\Country;
use App\Models\Region;
use App\Models\TripRequest;
use App\Models\User;
use App\Models\VehicleMake;
use App\Models\VehicleModel;
use App\Models\VehicleType;
use App\Services\Firebase\FirebaseOTPService;
use App\Services\Firebase\FirestoreService;

use App\Services\WalletService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function getRegions(): JsonResponse
    {
        $regions = Region::where('is_active', true)->get();
        return $this->successResponse('regions', $regions);
    }

    public function getVehicleTypes(): JsonResponse
    {
        $data = VehicleType::where('is_active', true)->get();
        return $this->successResponse('vehicle types', $data);
    }

    public function getVehicleMakes(): JsonResponse
    {
        $data = VehicleMake::where('is_active', true)->get();
        return $this->successResponse('vehicle makes', $data);
    }

    public function getVehicleModels($id): JsonResponse
    {
        $data = VehicleModel::where('is_active', true)->where('make_id', $id)->get();
        return $this->successResponse('vehicle models', $data);
    }

    public function getCountries(): JsonResponse
    {
        $data = Country::where('is_active', true)->get();
        return $this->successResponse('countries', $data);
    }

    public function getSliders(): JsonResponse
    {
        $sliders = settings('mobile_sliders', '');
        $data = json_decode($sliders, true) ?? [];
        return $this->successResponse('sliders', $data);
    }

    public function getDriversCancellationReasons(): JsonResponse
    {
        $data = CancellationReason::where('is_active', true)->where('user_type','driver')->get();
        return $this->successResponse('Driver cancellation reasons', $data);
    }

    public function getRidersCancellationReasons(): JsonResponse
    {
        $data = CancellationReason::where('is_active', true)->where('user_type','rider')->get();
        return $this->successResponse('Rider cancellation reasons', $data);
    }

    public function getSettings(): JsonResponse
    {

        $data['payment_methods'] =  $this->getActiveMethods();


        $data['country_id'] = settings('country_id');
        $data['has_rental'] = settings('enable_rental', 'yes');
        $data['enable_mobile_slider'] = settings('enable_mobile_slider', 'yes');
        $data['in_app_notification_sound'] = settings('enable_in_app_notification', 'yes') == 'yes';
        $data['has_instant_ride'] = settings('enable_instant_ride', 'yes');
        $data['sidebar'] = settings('map_home_screen', 'no') == 'yes';
        $data['country_code'] = settings('country_code','+1');
        $data['country'] = settings('country','United state');
        $data['app_name'] = settings('site_name');
        $data['terms_url'] = settings('term_url');
        $data['privacy_url'] = settings('privacy_url');
        $data['about_url'] = settings('about_url');
        $data['dial_min'] = (int)settings('dial_min');
        $data['dial_max'] = (int)settings('dial_max');
        $data['currency'] = settings('currency','$');
        $data['otp_provider'] = settings('otp_provider','firebase');
        $data['unsupported_region_msg'] = settings('unsupported_region_msg',config('app.messages.unsupported_region_msg'));

        return $this->successResponse('config settings', $data);
    }

    private function getActiveMethods(): array
    {
        $active_methods =  json_decode(settings('active_methods'), true);

        $data = [];
        foreach ($active_methods as $item){
            $data[] = [
                'name' => $item,
                'link' => 'http://'.$item,
                'logo' => asset("default/payment_methods/$item-logo.png")
            ];
        }

        return $data;
    }

    public function checkFB(Request $request, WalletService $walletService){
        try {
//            $id = $request->get('trip');
//            $trip = TripRequest::findOrFail($id);
//            if($trip){
//                $data = $firestoreService->deleteTrip($trip);
//                if($data['status']){
//                    return $this->successResponse($data['message'], $data);
//                }else{
//                    return $this->errorResponse($data['message']);
//                }
//            }else{
//                $this->errorResponse('error');
//            }

//            $users = User::whereHasRole('driver')->select('id','push_token','is_online','region_id')->get();
//
//            return count($users);

            $user = User::findOrFail($request['user_id']);

            $walletService->fundWallet($user, $request['amount'], 'Wallet fund testing','paystack');

            return $user->balance;
        }catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }

    }
}
