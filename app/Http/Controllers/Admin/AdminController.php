<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Complaint;
use App\Models\Country;


use App\Models\TripRequest;
use App\Models\User;

use App\Services\StatisticsService;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class AdminController extends Controller
{
    public function dashboard()
    {
        $statisticsService = new StatisticsService();
        $tripsStatistics = $statisticsService->getTripsStatistics();
        $bookingsStatistics = $statisticsService->getBookingsStatistics();


        $users = User::whereHasRole(['user','customer'])->latest()->paginate(10);
        $riders = User::whereHasRole(['rider'])->latest()->paginate(5);
        $riders_count = User::whereHasRole(['rider'])->count();
        $total_complains = Complaint::count();
        $ride_counts = TripRequest::count();
        $rides = TripRequest::select('customer_id','reference','created_at','grand_total','status','id')->latest()->paginate(5);
        $drivers = User::whereHasRole(['driver'])->latest()->paginate(5);
        $approved_drivers_count = User::whereHasRole(['driver'])->where('status','approved')->count();
        $un_approved_drivers_count = User::whereHasRole(['driver'])->where('status','!=','active')->count();
        return view('admin.index', compact(
            'users','riders','drivers','rides',
            'riders','ride_counts','riders_count','total_complains',
            'un_approved_drivers_count','approved_drivers_count',
            'tripsStatistics',
            'bookingsStatistics'
        ));
    }

    public function admins()
    {
        if(isOwner()){
            $users = User::whereHasRole(['manager'])
                ->where('company_id', companyId())->latest()->paginate(100);
        }else if (isAdmin()){
            $users = User::whereHasRole(['admin'])->latest()->paginate(100);
        }else{
            $users = [];
        }
        return view('admin.user.admin.list', compact('users'));
    }



    public function settings(Request $request){
       $data = [];
       $active = $request->get('active') ?? 'general';
       $countries = Country::where('is_active',true)->get();
//       return settings('active_methods',[]);

        $active_methods = settings('active_methods', 'none');

        if (is_string($active_methods)) {
            $active_methods = json_decode($active_methods, true);
        } elseif (!is_array($active_methods)) {
            $active_methods = [];
        }

//       $active_methods =  json_decode(settings('active_methods','none'), true);
        return view('admin.settings', compact('data', 'countries','active','active_methods'));
    }

    public function ServicesSettings(){
        $title = "Services";
        $settings = [
            'enable_rental',
            'enable_instant_ride',
            'enable_fleet',
            'map_home_screen',
            'enable_email_verification',
            'enable_sms_verification',
            'enable_https',
            'enable_frontpage',
            'enable_mobile_slider',
            'enable_mobile_carlisting',
        ];
        return view('admin.settings.booking_services', compact('title','settings'));
    }

   public function storeSettings(Request $request)
   {
//
//       return $request->all();


        $data = $request->except('active_setting','_token');

       if($request->has('active_methods')){
           $dt['active_methods']  = json_encode($request->get('active_methods'));

           foreach ($request->get('active_methods') as $item){

               $this->setEnvironmentValue(strtoupper($item)."_PUBLIC_KEY", $request[strtoupper($item)."_PUBLIC_KEY"]);
               $this->setEnvironmentValue(strtoupper($item)."_SECRET_KEY", $request[strtoupper($item)."_SECRET_KEY"]);
           }

           settings($dt);

           Artisan::call('config:clear');

       }elseif($request->get('active_setting') == 'smtp'){
            $this->storeSmtp($request);
        }elseif($request->get('active_setting') == 'api'){
            $this->apiKey($request);
        }else{
            if($request->has('country_id')){
                if($request->get('country_id') != settings('country_id')){
                    $country = Country::findOrFail($request->get('country_id'));
                    if($country){
                        $data['country_code'] = $country->dial_code;
                        $data['currency'] = $country->currency_symbol;
                        $data['country'] = $country->name;
                        $data['dial_min'] = $country->dial_min_length;
                        $data['dial_max'] = $country->dial_max_length;
                    }
                }
            }


            settings($data);
        }

       if($request->get('active_setting') == 'back'){
           return redirect()->back()->with('success','Settings successfully updated');
       }

       if($request->get('type') == 'theme'){
           return redirect()->route('admin.settings.theme',['active' => $request->get('active_setting') ?? 'nav'])->with('success','Settings successfully updated');
       }

        return redirect()->route('admin.settings',['active' => $request->get('active_setting') ?? 'general'])->with('success','Settings successfully updated');

   }

   private function storeSmtp($request){
       $request->validate([
           'MAIL_HOST' => 'required|string',
           'MAIL_PORT' => 'required|integer',
           'MAIL_ENCRYPTION' => 'required|string',
           'MAIL_USERNAME' => 'required|string',
           'MAIL_PASSWORD' => 'required|string',
           'MAIL_FROM_ADDRESS' => 'required|email',
           'MAIL_FROM_NAME' => 'required|string',
       ]);

//       $this->setEnvironmentValue('APP_DEBUG', $request['APP_DEBUG']);
       $this->setEnvironmentValue('MAIL_HOST', $request['MAIL_HOST']);
       $this->setEnvironmentValue('MAIL_PORT', $request['MAIL_PORT']);
       $this->setEnvironmentValue('MAIL_ENCRYPTION', $request['MAIL_ENCRYPTION']);
       $this->setEnvironmentValue('MAIL_USERNAME', $request['MAIL_USERNAME']);
       $this->setEnvironmentValue('MAIL_PASSWORD', $request['MAIL_PASSWORD']);
       $this->setEnvironmentValue('MAIL_FROM_ADDRESS', $request['MAIL_FROM_ADDRESS']);
       $this->setEnvironmentValue('MAIL_FROM_NAME', $request['MAIL_FROM_NAME']);


   }

   private function apiKey($request){

//       $this->setEnvironmentValue('APP_DEBUG', $request['APP_DEBUG']);
       $this->setEnvironmentValue('FIREBASE_PROJECT_ID', $request['FIREBASE_PROJECT_ID'] ?? '');
       $this->setEnvironmentValue('FIREBASE_API_KEY', $request['FIREBASE_API_KEY'] ?? '');
       $this->setEnvironmentValue('MAP_API_KEY', $request['MAP_API_KEY']);

   }


    public function setEnvironmentValue($key, $value)
    {
//        $path = app()->environmentFilePath();
//
//        $escaped = preg_quote('='.env($key), '/');
//
//        file_put_contents($path, preg_replace(
//            "/^{$key}{$escaped}/m",
//            "{$key}={$value}",
//            file_get_contents($path)
//        ));


        $path = app()->environmentFilePath();

        if (file_exists($path)) {
            // Read the contents of the .env file
            $content = file_get_contents($path);

            // Create a regular expression pattern to match the key-value pair
            $pattern = "/^{$key}=(.*?)$/m";

            // Check if the pattern exists in the file content
            if (preg_match($pattern, $content, $matches)) {
                // Replace the value with the new value while preserving the quotes
                $newValue = str_replace($matches[1], $value, $matches[0]);
                $updatedContent = str_replace($matches[0], $newValue, $content);

                // Update the .env file with the updated content
                file_put_contents($path, $updatedContent);
            }
        }
    }


}
