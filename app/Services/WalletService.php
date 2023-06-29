<?php

namespace App\Services;

class WalletService
{
    public function fundWallet($user, $amount, $description = null, $method = null): void
    {
        $user->deposit($amount, [
            'method' => $method,
            'description' => $description
        ]);
    }
}
