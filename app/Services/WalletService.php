<?php

namespace App\Services;

use App\Models\Transaction;
use App\Models\TransactionRecord;
use Bavix\Wallet\External\Api\TransactionQuery;

class WalletService
{
    public function fundWallet($user, $amount, $description = null, $method = null): void
    {
        $user->deposit($amount, [
            'method' => $method,
            'description' => $description
        ]);
    }

//    public function recordTransaction($user, $amount, $description = null, $method = null, $type = 'debit', $detail = null): void
//    {
//        $user->transaction_records()->create([
//            'amount' => $amount,
//            'type' => $type,
//            'description' => $description,
//            'method' => $method,
//            'detail' => $detail,
//        ]);
//
//    }
}
