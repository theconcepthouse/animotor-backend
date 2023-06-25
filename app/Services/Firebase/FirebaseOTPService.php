<?php

namespace App\Services\Firebase;

use Kreait\Firebase\Contract\Auth;

class FirebaseOTPService
{

    protected mixed $auth;

    public function __construct(Auth $auth)
    {
        $this->auth = app('firebase.auth');
    }

    public function sendOTP($phoneNumber)
    {
        // Generate a new OTP code

        $otpCode = $this->generateOTPCode();

        // Send the OTP code via Firebase
        $verification = $this->auth->startPhoneNumberVerification($phoneNumber);

        // Return the verification ID and OTP code
        return [
            'verificationId' => $verification->verificationId(),
            'otpCode' => $otpCode,
        ];
    }

    public function verifyOTP($verificationId, $otpCode)
    {
        // Verify the OTP code using Firebase
        $verification = $this->auth->verifyPhoneNumber($verificationId, $otpCode);

        // Check if the verification was successful
        return $verification->verified();
    }

    protected function generateOTPCode()
    {
        // Generate a random 6-digit OTP code
        return rand(100000, 999999);
    }

}
