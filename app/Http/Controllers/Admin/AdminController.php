<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;

use App\Models\Country;
use App\Models\Doctor;

use App\Models\OtherPayment;
use App\Models\Subscriber;
use App\Models\User;

use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $users = User::whereHasRole(['user','customer'])->latest()->paginate(10);
        $riders = User::whereHasRole(['rider'])->latest()->paginate(5);
        $drivers = User::whereHasRole(['driver'])->latest()->paginate(5);
        return view('admin.index', compact('users','riders','drivers'));
    }

    public function admins()
    {
        $users = User::whereHasRole(['admin'])->latest()->paginate(100);
        return view('admin.user.admin.list', compact('users'
        ));
    }



    public function settings(Request $request){
       $data = [];
       $active = $request->get('active') ?? 'general';
       $countries = Country::where('is_active',true)->get();
        return view('admin.settings', compact('data', 'countries','active'));
    }

   public function storeSettings(Request $request)
   {

        $data = $request->except('active_setting');
        if($request->get('active_setting') == 'smtp'){
            $this->storeSmtp($request);
        }else{
            if($request->has('country_id')){
                if($request->get('country_id') != settings('country_id')){
                    $country = Country::findOrFail($request->get('country_id'));
                    if($country){
                        $data['country_code'] = $country->dial_code;
                        $data['country'] = $country->name;
                        $data['dial_min'] = $country->dial_min_length;
                        $data['dial_max'] = $country->dial_max_length;
                    }
                }
            }

            settings($data);
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
