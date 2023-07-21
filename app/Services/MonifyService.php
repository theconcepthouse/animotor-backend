<?php

namespace App\Services;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Support\Facades\Http;

class MonifyService
{
    public function createMonify($user){
        if(!$user['monify_account']){

            $monnifyData = [
                "accountReference" => $user['email'],
                'accountName' => $user['first_name'] . ' ' .$user['last_name'],
                "currencyCode" => "NGN",
                "contractCode" => "117397640931",
                "customerEmail" => $user['email'],
                "customerName" => $user['first_name'] . ' ' .$user['last_name'],
                "getAllAvailableBanks"=> false,
                "preferredBanks"=> ["035","232"]
            ];

            try {
                $result = $this->createBankAccount($monnifyData);

                $user->monify_account = json_encode($result);

            }catch (\Exception $e){
                return $user;
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
            $client = new Client();
            $response = $client->request('POST', 'https://api.monnify.com/api/v2/bank-transfer/reserved-accounts', [
                'headers' => [
                    'Authorization' => "Bearer $token",
                    'Content-Type' => 'application/json',
                ],
                'json' => $data,
            ]);

            $response = json_decode($response->getBody()->getContents());
            if ($response->requestSuccessful == true) {
                return $response->responseBody->accounts;
            } else {
                return null;
            }
        } catch (ClientException $th) {
            return ['status' => 'failed'];
        }
    }

    private function MonnifyToken()
    {
        $monnify_key = env('MONI_KEY');
        $monnify_secret = env('MONI_SECRET');
        $auth = base64_encode($monnify_key . ':' . $monnify_secret);

        $response = Http::withHeaders([
            'Authorization' => 'Basic ' . $auth,
            'Content-Type' => 'application/json',
        ])->post('https://api.monnify.com/api/v1/auth/login');

        $response = $response->json();
        return $response['responseBody']['accessToken'];
    }

}
