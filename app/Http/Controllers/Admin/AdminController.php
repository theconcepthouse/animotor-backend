<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;

use App\Models\Doctor;

use App\Models\OtherPayment;
use App\Models\Subscriber;
use App\Models\User;

use Carbon\Carbon;
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



    public function settings(){
       $data = [];
        return view('admin.settings', compact('data'));
    }

   public function storeSettings(Request $request){


       $this->setEnvironmentValue('P_AUDIOLOGIST_EARNED', $request['P_AUDIOLOGIST_EARNED']);
       $this->setEnvironmentValue('P_DOCTOR_EARNED', $request['P_DOCTOR_EARNED']);
       $this->setEnvironmentValue('P_FEE', $request['P_FEE']);
       $this->setEnvironmentValue('DOCTOR_MO', $request['DOCTOR_MO']);
       $this->setEnvironmentValue('DOCTOR_CATS', $request['DOCTOR_CATS']);
       $this->setEnvironmentValue('AUDIOLOGIST_MO', $request['AUDIOLOGIST_MO']);
//       $this->setEnvironmentValue('OTHER_PAYMENTS', $request['OTHER_PAYMENTS']);

       settings()->set('DOCTOR_CATS', $request['DOCTOR_CATS']);
       settings()->save();

       if ($request->input('OTHER_PAYMENTS')){
           $payments = OtherPayment::where('type','OTHER_PAYMENTS')->firstOrCreate();
           $payments->proof = $request->get('OTHER_PAYMENTS');
           $payments->type = 'OTHER_PAYMENTS';
           $payments->save();
       }

       return redirect()->back()->with('success','Settings successfully updated');

   }


    public function setEnvironmentValue($key, $value)
    {
        $path = app()->environmentFilePath();

        $escaped = preg_quote('='.env($key), '/');

        file_put_contents($path, preg_replace(
            "/^{$key}{$escaped}/m",
            "{$key}={$value}",
            file_get_contents($path)
        ));
    }


}
