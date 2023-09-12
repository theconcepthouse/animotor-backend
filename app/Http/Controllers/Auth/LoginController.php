<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    public function showLoginForm()
    {
        if(hasRental()){
            return view('auth.login_rental');
        }else{
            return view('auth.login');
        }
    }


    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo;



    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Check your condition here
        if (Auth::check()) {
            if(isAdmin() || isOwner()){
                $this->redirectTo = '/admin/dashboard';
            }else{
                $this->redirectTo = '/dashboard';
            }
        } else {
            $this->redirectTo = RouteServiceProvider::HOME;
        }

        $this->middleware('guest')->except('logout');
    }
}
