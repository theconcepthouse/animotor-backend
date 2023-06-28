<?php

namespace App\Services;

class WalletService
{
    public function fundWallet($user, $amount): void
    {
        $user->deposit($amount);
    }
}
