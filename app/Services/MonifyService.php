<?php

namespace App\Services;

use App\Models\User;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Support\Facades\Http;

class MonifyService
{
    public string $base_url;
    public function __construct()
    {
        if(env('APP_DEBUG')){
            $this->base_url = 'https://sandbox.monnify.com';
        }else{
            $this->base_url = 'https://api.monnify.com';
        }
    }

    public function checkMonify(User $user): User
    {
        if(!$user->monify_account){

            $this->createMonify($user);

            return User::find($user->id);
        }
        return $user;
    }

    public function createMonify($user){
//        if(env('APP_DEBUG')){
//            return [];
//        }
        if(!$user->monify_account){
            $monnifyData = [
                "accountReference" => $user['email'],
                'accountName' => $user['first_name'] . ' ' .$user['last_name'],
                "currencyCode" => "NGN",
                "contractCode" => env('CONTRACT_CODE'),
                "customerEmail" => $user['email'],
                "customerName" => $user['first_name'] . ' ' .$user['last_name'],
                "getAllAvailableBanks"=> true,
            ];

            try {

                $result = $this->createBankAccount($monnifyData);

                if(isset($result['status'])){
                    return $result;
                }else{
                    $user->monify_account = json_encode($result);
                }

            }catch (\Exception $e){
                return $e->getMessage();
            }

            $user->save();

            return $user;
        }
        return [];
    }

    public function createBankAccount($data)
    {
        try {
            $token = $this->MonnifyToken();
            if(!$token){
                return ['status' => 'failed', 'message' => "can generate token"];
            }
            $client = new Client();
            $response = $client->request('POST', $this->base_url.'/api/v2/bank-transfer/reserved-accounts', [
                'headers' => [
                    'Authorization' => "Bearer $token",
                    'Content-Type' => 'application/json',
                ],
                'json' => $data,
            ]);

            $response = json_decode($response->getBody()->getContents());
            if ($response->requestSuccessful) {
                return $response?->responseBody->accounts;
            } else {
                return ['status' => 'failed', 'message' => $response];
            }
        } catch (ClientException $th) {
            return ['status' => 'failed', 'message' => $th->getMessage()];
        }
    }

    private function MonnifyToken()
    {
        $monnify_key = env('MONIFY_PUBLIC_KEY');
        $monnify_secret = env('MONIFY_SECRET_KEY');
        $auth = base64_encode($monnify_key . ':' . $monnify_secret);

        $response = Http::withHeaders([
            'Authorization' => 'Basic ' . $auth,
            'Content-Type' => 'application/json',
        ])->post($this->base_url.'/api/v1/auth/login');


        $response = json_decode($response->getBody()->getContents());
        if ($response->requestSuccessful) {
            return $response?->responseBody?->accessToken;
        } else {
            return false;
        }
    }

}
