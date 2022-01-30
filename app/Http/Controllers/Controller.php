<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

//Models
use App\Models\Candidate;
use App\Models\User;
use App\Models\Contestant;
use App\Models\Edition;
use App\Models\Setting;
use App\Models\Vote;
use App\Models\Winner;
use App\Models\Transaction;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function verifyPayment($reference, $paymentFor, $editionId, $amount){

        //check if payment have been added
        if(Transaction::where('transaction_hash', $reference)->where('status', 1)->first()){
            // alert()->info('Payment already Processed', 'success')->persistent('Close');
            return false;
        }

        //Create new transaction
        $transactionId = Transaction::create([
            'payment_for' => $paymentFor,
            'transaction_hash' => $reference,
            'amount' => $amount,
            'status' => 1,
            'edition_id' => $editionId,
        ])->id;


        return $transactionId


    }
}
