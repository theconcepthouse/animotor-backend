<?php

namespace App\Console\Commands;

use App\Http\Controllers\Controller;
use App\Models\Withdraw;
use Illuminate\Console\Command;

class PendingWithdrawalUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pending_withdrawal:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function handle()
    {
        $pending_withdrawals = Withdraw::where('status','pending')->get();


        $controller = app(Controller::class);

        foreach ($pending_withdrawals as $pending){

            $data = $controller->verifyTransfer($pending->reference);
            if($data){
                $pending->response = json_encode($data);
                $pending->paystack_status = $data['status'];
                $pending->status = $data['status'];

                if($data['status'] === "success"){
                    $pending->comment = "transfer successful";
                }

                $pending->save();
            }

        }

    }


}
