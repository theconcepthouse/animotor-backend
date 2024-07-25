<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\CarService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{

    public function createCustomer(Request $request)
    {
         $role = $request->get('role') ?? 'driver';
        return view('admin.customer.create', compact('role'));
    }
     public function storeCustomer(Request $request)
    {
//        return $request;

        if(isOwner() && !in_array($request->input('role'), ['manager','rider'])){
            return redirect()->route('admin.dashboard')->with('failure','you are not permitted to create this user');
        }

        $rules = [
            'first_name' => 'string|min:1|max:255|required',
            'last_name' => 'nullable',
            'phone' => 'string|min:1|max:255|required|unique:users',
            'email' => 'string|min:1|max:255|required|unique:users|email',
            'work_phone' => 'nullable',
            'hire_type' => 'required',
            'role' => 'required',
        ];
        $data = $request->validate($rules);
        $data['password'] = 'password';
        $user = User::create($data);
        $user->addRole($data['role']);

        return redirect()->back()->with('success', 'successfully created');
    }

    public function createOnBoarding(Request $request)
    {
        $role = $request->get('role') ?? 'driver';
        return view('admin.customer.create-onboarding', compact('role'));
    }

    public function addDriver(Request $request)
    {
         $role = $request->get('role') ?? 'driver';
        return view('admin.customer.add-driver', compact('role'));
    }



}
