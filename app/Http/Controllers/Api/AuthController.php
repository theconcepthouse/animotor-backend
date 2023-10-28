<?php

namespace App\Http\Controllers\Api;

use App\Models\Bank;
use App\Models\Service;
use App\Models\Withdraw;
use App\Notifications\EmailVerify;
use App\Notifications\PasswordReset;
use App\Notifications\PasswordReseted;
use App\Services\CarService;
use App\Services\DriverDocumentService;
use App\Services\Firebase\FirestoreService;
use App\Services\ImageService;
use App\Services\MonifyService;
use App\Services\OTPService;
use Exception;
use Illuminate\Http\JsonResponse;

use App\Http\Controllers\Controller;

use App\Models\Role;
use App\Http\Resources\UserCollection;
use App\Models\User;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:sanctum', ['except' => ['login','delete','checkPhone','testSendBlue',
            'loginUser','forgotPass','sendVerifyEmail','verifyResetCode','resetPass',
            'verifyPhone','resendOTP',
            'locations','register']]);
    }




    public function register(Request $request, CarService $carService, DriverDocumentService $driverDocumentService): JsonResponse
    {

        $request->validate([
            'first_name' => 'required|max:50|min:2',
            'last_name' => 'required|max:50|min:2',

            'phone' => 'required|min:3|unique:users',
            'country_code' => 'nullable',
            'country' => 'nullable',
            'email' => 'required|max:50|email|unique:users',
//            'password'  => 'nullable',
            'role'  => 'required',
            'password' => $request->has('password') ? 'required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$%^&+=]).+$/|min:8' : 'nullable',

            'referral'  => 'nullable',
//            'avatar'  => 'nullable',
//            'repeat_password' => 'required|same:password',
        ],[
            'password.regex' => 'The password must contain at least one capital letter, one small letter, one special character, and one number.',
        ]);

        try {
            DB::beginTransaction();

            $data = $request->all();

//            if($request->has('referral')){
//                $data['referral'] =
//            }

            $role = Role::where('name', $request['role'])->first();

            if($request->has('password')){
//                $request->validate([
//                    'password' => 'required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$%^&+=]).+$/|min:8',
//                ], [
//                    'password.regex' => 'The password must contain at least one capital letter, one small letter, one special character, and one number.',
//                ]);
//

                $data['password'] = bcrypt($data['password']);
            }else{

                $request->validate([
//                    'country' => 'required',
                    'country_code' => 'required',
                ]);

                $data['password'] = bcrypt($data['phone']);
            }

            $user = User::create($data);

            $user->addRole($role);
            // login user

//            $user->notify(new EmailVerify($user));
//
//            $user->must_verify_email = true;



            $deleted_user = User::onlyTrashed()->where('email',$user->email.'__')->first();

            $deleted_user?->forceDelete();

            if($request['role'] == 'driver'){
                $carService->createOrUpdate(null, ['driver_id' => $user->id]);

                $driverDocumentService->createRequired($user);

                $user = User::find($user->id);

            }

            $user['token'] = $user->createToken($request->email)->plainTextToken;


            DB::commit();

            return $this->successResponse('Information successfully saved', $user);
        } catch (Exception $e) {
            DB::rollback();
            return $this->errorResponse($e->getMessage(), 500);
        }




//        return $this->sendVerifyEmail($request);
    }


    public function checkPhone(Request $request): JsonResponse
    {
        $phone = $request['phone'];
        $role = $request->input('role');
        $country_code = $request->input('country_code');
        $v = $request->input('v');

        if(!$role){
            return $this->errorResponse('Please update to latest version');
        }

        if(!$phone){
            return $this->errorResponse('Please enter a valid phone');
        }

        $user = User::where('phone', $phone)->first();
        if($user){
            $data['user_exist'] = true;

            if($role == 'rider' && !$user->hasRole('rider')){
                $user->addRole('rider');
//                if($user->hasRole('driver')){
//                    return $this->errorResponse('This account is already registered as a driver, please download the drivers app');
//                }else{
//                    return $this->errorResponse('Only customers can login here');
//                }
            }

            if($role == 'driver'){
                if(!$v){
                    return $this->errorResponse('Please upgrade to the latest version');
                }
            }
            if($role == 'driver' && !$user->hasRole('driver')){
                $user->addRole('driver');



//                if($user->hasRole('rider')){
//                    return $this->errorResponse('This account is already registered as a customer, please download the customer app');
//                }else{
//                    return $this->errorResponse('Only drivers can login here');
//                }
            }


        }else {
            $data['user_exist'] = false;
        }

        $message = 'check phone response';

        if(settings('otp_provider') == 'disabled'){
            $data['auto_verify_code'] = mt_rand(100000,999999);
        }else{
            if(!$country_code){
                return $this->errorResponse('Please upgrade to latest version to login');
            }

            $otp = new OTPService();

            $res = $otp->sendOTP($country_code.$phone);

            if(!$res['status']){

                return $this->errorResponse($res['message']);
            }

            if(isset($data['message'])){
                $message = $data['message'];
            }else{
                $message = 'OTP successfully sent to your number';
            }

        }

        return $this->successResponse($message, $data);
    }


    public function resendOTP(Request $request): JsonResponse
    {

        $request->validate([
            'phone' => 'required',
        ]);

        $phone = $request['phone'];
        $country = $request['country_code'];

        if(!$phone){
            return $this->errorResponse('Please enter a valid phone');
        }

        if(!$country){
            return $this->errorResponse('Please upgrade to latest version');
        }


        $otp = new OTPService();

        $res = $otp->sendOTP($country.$phone);

        if(!$res['status']){
            return $this->errorResponse($res['message']);
        }

        if(isset($data['message'])){
            $message = $data['message'];
        }else{
            $message =  'OTP successfully sent to your number';
        }

        return $this->successResponse($message, $res);

    }


    public function login(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|max:50|email|exists:users',
            'password'  => 'required|min:6'
        ], [
            'exists' => 'This email does not exist.',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse('Invalid credentials.',422);
        }

        try {

            if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                $user = User::where('email', $request->email)->first();

                $data = $user;

                if($request['platform']){
                    $user->platform = $request['platform'];

                    $user->save();
                }

                $data['token'] = $user->createToken($request->email)->plainTextToken;
                return $this->successResponse('Login Successful', $data);

            }
            else{
                return $this->errorResponse('Invalid credentials.',422);
            }


        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return $this->errorResponse('Invalid credentials.',422);

        }
    }

    public function user(Request $request, DriverDocumentService $driverDocumentService): JsonResponse
    {
        $user = User::find(auth()->id());

        if($request->has('push_token')){
            $user->push_token = $request['push_token'];
            $user->save();
        }

        $monify = new MonifyService();

        $user = $monify->checkMonify($user);

        if($user->hasRole('driver') && count($user->documents) < 1){
            $driverDocumentService->createRequired($user);

            $user = User::find(auth()->id());

        }

        return  $this->successResponse('user details',$user);
    }

    public function verifyPhone(Request $request): JsonResponse
    {
        $phone = $request['phone'];
        $code = $request['code'];
        $country = $request['country_code'];
        if(!$phone){
            return $this->errorResponse('Something went wrong, we cant, find your phone number');
        }
        if(!$code){
            return $this->errorResponse('Invalid or expired code, please try again');
        }


        if(settings('otp_provider') != 'disabled'){
            if(!$country){
                return $this->errorResponse('Please upgrade to latest version');
            }

            $otp = new OTPService();

            $res = $otp->verifyOTP($code, $country.$phone);

            if(!$res['status']){
                return $this->errorResponse($res['message']);
            }

        }

        $user = User::where('phone', $phone)->first();

        if($user){

            $monify = new MonifyService();

            $user = $monify->checkMonify($user);

            if($user->hasRole('driver')){
                if(!$user->service){
                    $user->service_id = Service::select('id')->first()?->id ?? null;
                    $user->save();

                    $user = User::find($user->id);
                }
            }

            $data = $user;
            $data['token'] = $user->createToken($user->email)->plainTextToken;

            $data['user_exist'] = true;
        }else {
            $data['user_exist'] = false;
        }
        $data['message'] = 'Phone successfully verified';


        return $this->successResponse($data['message'],$data);
    }


    public function update(Request $request, FirestoreService $firestoreService, ImageService $imageService): JsonResponse
    {
        $data = $this->updateData($request);
        $user = user::find(auth()->user()->id);
        $message = "Account updated";

        if($request->has('update_bank')){
            $request->validate([
                'bank_name' => 'required',
                'account_number' => 'required',
                'account_name' => 'required',
            ]);

            $bank = Bank::where('user_id', $user->id)->first();

            if ($bank) {
                $bank->update([
                    'bank_name' => $request->input('bank_name'),
                    'account_number' => $request->input('account_number'),
                    'bank_code' => $request->input('bank_code'),
                    'holder_name' => $request->input('account_name'),
                ]);
            } else {
                Bank::create([
                    'user_id' => $user->id,
                    'bank_name' => $request->input('bank_name'),
                    'bank_code' => $request->input('bank_code'),
                    'account_number' => $request->input('account_number'),
                    'holder_name' => $request->input('account_name'),
                ]);
            }

        }

        if($request->has('car_status')){
            if($user->unapproved_documents > 0){
                $user->status = 'pending';
                $user->save();
                $message = "Document successfully updated";
            }
        }else{

            if($request->has('file')){
                $data['avatar'] = $imageService->uploadImage($request['file'], 'avatar/'.$user->id);
            }

            $user->update($data);
        }

//        if($user->hasRole('driver')){
            $firestoreService->updateUser($user);
//        }

        return $this->successResponse($message, $user);
    }



    public function setOnline(Request $request, FirestoreService $firestoreService): JsonResponse
    {
        $status = (bool)$request['status'];
        $user = user::find(auth()->user()->id);
        $user->is_online = $status;
        $user->last_location_update = Carbon::now()->addMinutes(2);
        $user->save();
        $firestoreService->updateUser($user);
        return $this->successResponse('status updated',$user);
    }


    public function updateToken(Request $request): JsonResponse
    {
        $user = user::find(auth()->user()->id);
        $user->push_token = $request['push_token'];
        $user->save();
        return $this->successResponse('push_token updated',$user);
    }


    public function logout(): JsonResponse
    {
        auth('api')->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }


    public function refresh(): JsonResponse
    {
        return $this->respondWithToken(auth('api')->refresh());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'user' => $this->guard('api')->user(),
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }


    public function forgotPass(Request $request): JsonResponse
    {
        $request->validate([
            'email' => 'required|max:50|email|exists:users',
        ], [
            'email.exists' => 'This email does not exist, please signup',
            'email.required' => 'Please enter a valid email address',
            'email.email' => 'Please enter a valid email address',
        ]);


        try {

            $user = User::whereEmail($request['email'])->firstOrFail();

            $user->r_code = mt_rand(1000,9999);
            $user->save();

            $user->notify(new PasswordReset($user));

            $data['success'] = true;
            $data['message'] = 'Password reset code sent to email';

            return $this->successResponse('Password reset code sent to email', $data);


        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return $this->successResponse('Something went wrong, please contact support', 500);
        }

        // return $this->respondWithToken($token);
    }

    public function resetPass(Request $request): JsonResponse
    {
        $request->validate([
            'email' => 'required|max:50|email|exists:users',
            'password'  => 'required|min:6',
            'repeat_password' => 'required|same:password',
        ], [
            'email.exists' => 'We cant validate this request, please request new code',
            'email.required' => 'We cant validate this request, please request new code',
            'email.email' => 'We cant validate this request, please request new code',
            'password.same' => 'Password confirmation mismatched ',
            'password.min' => 'Password should be greater than 5 character',
            'repeat_password.same' => 'Password confirmation mismatched ',
            'repeat_password.required' => 'Confirm your password',
            'password.required' => 'Enter a password ',
        ]);


        try {

            $user = User::whereEmail($request['email'])->firstOrFail();

            $user->r_code = "";
            $user->password = bcrypt($request['password']);
            $user->save();

            $user->notify(new PasswordReseted($user));

            $data['success'] = true;
            $data['message'] = 'Your password reset was successful!';

            return $this->successResponse('Your password reset was successful!',$data);


        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return $this->successResponse('Something went wrong, please contact support', 500);
        }

        // return $this->respondWithToken($token);
    }


    public function sendVerifyEmail(Request $request): JsonResponse
    {
        $request->validate([
            'email' => 'required|max:50|email|exists:users',
        ], [
            'email.exists' => 'This email does not exist, please signup',
            'email.required' => 'Please enter a valid email address',
            'email.email' => 'Please enter a valid email address',
        ]);


        try {

            $user = User::whereEmail($request['email'])->firstOrFail();

            $user->r_code = mt_rand(1000,9999);
            $user->save();

            $user->notify(new EmailVerify($user));

            $data['success'] = true;
            $data['message'] = 'Email verification code successfully sent';

            return $this->successResponse('Email verification code successfully sent', $data);


        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return $this->successResponse('Something went wrong, please contact support', 500);
        }

        // return $this->respondWithToken($token);
    }


    public function verifyResetCode(Request $request): JsonResponse
    {
        $request->validate([
            'email' => 'required|max:50|email|exists:users',
            'code' => 'required',
            'type' => 'nullable',
        ], [
            'email.exists' => 'We cant authenticate this request, please request new code',
            'email.required' => 'We cant authenticate this request, please request new code',
            'email.email' => 'We cant authenticate this request, please request new code',
            'code.required' => 'Please enter a your verification code',
        ]);


        try {

            $user = User::whereEmail($request['email'])->firstOrFail();

            $otherDate = Carbon::parse($user->updated_at)->addMinutes(22);
            $nowDate = Carbon::now();

            if($nowDate->gt($otherDate)){
                $user->r_code = "";

                $user->save();
                return $this->errorResponse('Reset code expired, please request new one', 500);
            }

            if(!$user->r_code){
                return $this->errorResponse('Reset code expired, please request new one', 500);
            }

            if($user->r_code != $request['code']){
                return $this->errorResponse('Invalid verification code provided', 500);
            }


            if($request['type'] == 'email'){
                $user->email_verified_at = Carbon::now();
                $user->save();
            }


            $data['success'] = true;

            if($request['type'] == 'email'){
                $data['message'] = 'Email address successfully verified, please login ...';

                $this->addUserToSendinblue($user, $user->getRoles()[0]);

                return $this->successResponse('Email address successfully verified, please login ...', $data);
            }


            $data['message'] = 'Account verified, please proceed ...';

            return $this->successResponse('Account verified, please proceed ...', $data);


        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return $this->errorResponse('Something went wrong, please contact support', 500);
        } catch (ApiException $e) {
        }

        // return $this->respondWithToken($token);
    }


    public function updateOnline(): JsonResponse
    {
        $user = auth('api')->user();
        $user->last_seen = Carbon::now()->addMinutes(5);
        $user->save();
        return response()->json($user);
    }

    public function changePassword(Request $request): JsonResponse
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:6',
        ]);

        if (!(Hash::check($request->get('current_password'), auth()->user()->password))) {
            // The passwords matches
            return $this->errorResponse('Your current password does not match with the password you provided. Please try again.', 500);
        }
        if(strcmp($request->get('current_password'), $request->get('new_password')) == 0){
            //Current password and new password are same
            return $this->errorResponse('New Password cannot be same as your current password. Please choose a different password', 500);
        }

        //Change Password
        $user = auth()->user();
        $user->password = bcrypt($request->get('new_password'));
        $user->save();
        return $this->successResponse('password successfully updated', $user);
    }

    public function guard() {
        return \Auth::Guard('api');
    }

    protected function getData(Request $request)
    {
        $rules = [
            'username' => 'required|max:50|min:3|unique:users',
            'full_name' => 'required|max:50|min:6',
            'phone' => 'required|min:3|unique:users',
            'email' => 'required|max:50|email|unique:users',
            'password'  => 'required|min:6',
            'repeatPassword' => 'required|same:password',

        ];
        $data = $request->validate($rules);
        return $data;
    }
    protected function updateData(Request $request): array
    {
        $rules = [
            'first_name' => 'nullable',
            'last_name' => 'nullable',
            'region_id' => 'nullable',
            'address' => 'nullable',
            'avatar' => 'nullable',
            'file' => 'nullable',
        ];
        return $request->validate($rules);
    }

    public function destroy($id)
    {
        $user = User::destroy($id);
        return response()->json($user);
    }

    public function delete(Request $request): JsonResponse
    {
        $request->validate([
            'id' => 'required',
        ]);
        $id = $request['id'];
        $user = User::where('email', $id)->orWhere('id', $id)->first();

        if(!$user){
            return $this->errorResponse('User doesnt exist');
        }
        $user->email = $user->email.'__';
        $user->phone = $user->phone.'__';
        $user->save();
        $user->delete();
        return $this->successResponse('User deleted', $user);
    }

    public function testSendBlue(){
        $user = User::where("email", "benjaminchukwudi0@gmail.com")->first();
        return $this->addUserToSendinblue($user, $user->getRoles()[0]);
//        return $user->getRoles()[0];
    }

}
