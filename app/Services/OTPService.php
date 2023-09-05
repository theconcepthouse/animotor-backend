<?php

namespace App\Services;

use App\Models\OtpVerify;
use Carbon\Carbon;
use Exception;
use GuzzleHttp\Client;

class OTPService
{
    public function otpRequest($phone){

        $client = new Client();

        $response = $client->request('POST', 'https://api.sendchamp.com/api/v1/verification/create', [
            'json' => [
                'channel' => 'sms',
                'sender' => settings('sender_name','SAlert'),
                'token_type' => 'numeric',
                'token_length' => 6,
                'expiration_time' => 2,
                'customer_mobile_number' => $phone,
            ],
            'headers' => [
                'Authorization' => 'Bearer '.env('SENDCHAM_PUBLIC_KEY'),
                'accept' => 'application/json',
                'content-type' => 'application/json',
            ],
        ]);

        return json_decode($response->getBody(), true);

    }

    public function saveOTP($code, $phone): void
    {
        OtpVerify::create([
            'code' => $code,
            'phone' => $phone,
            'otp_expires_at' => Carbon::now()->addMinutes(2)
        ]);
    }

    public function sendOTP($number): array
    {
        $data = [];

        $existing = OtpVerify::where('phone',$number)->first();

        if($existing){
            $otp_time = Carbon::parse($existing->otp_expires_at);
            if($otp_time->greaterThan(Carbon::now())){
                $data['status'] = true;
                $data['message'] = "OTP request interval is 2 minutes, use old code or wait a little";

                return $data;
            }

            $existing->delete();
        }

        try {

            $res = $this->otpRequest($number);

            $code = $res['data']['token'];

            $this->saveOTP($code, $number);

            $data['status'] = true;
//            $data['code'] = $code;

        }catch (Exception $e){
            $data['status'] = false;
            $data['info'] = $e->getMessage();
            $data['message'] = "something went wrong, please contact support ".$e->getMessage();
        }

        return $data;
    }

    public function verifyOTP($code, $phone): array
    {
        $otp = OtpVerify::where('phone', $phone)->where('code', $code)->first();
        $data = [];
        if(!$otp){
            $data['status'] = false;
            $data['message'] = "Invalid OTP code";
        }
        if($otp){
            $otp_time = Carbon::parse($otp->otp_expires_at);
            if(Carbon::now()->greaterThan($otp_time)){
                $data['status'] = false;
                $data['message'] = "OTP expired, please request new code";
            }else{

                $otp->delete();

                $data['status'] = true;
            }
        }
        return $data;
    }

    public function getOTPNo($phone): string
    {
        return $phone;
    }
}
