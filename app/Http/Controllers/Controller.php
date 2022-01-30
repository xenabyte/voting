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

use Paystack;
use Mail;
use Alert;
use Log;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function viewLanding($category = Null){
        //get active editions
        $setting = Setting::first();
        $edition = $setting->edition;

        switch ($setting->stage){
            case Setting::STAGE_REGISTRATION:
                return view('welcome', [
                    'category' => $category,
                    'edition' => $edition,
                ]);
                break;
            default:
                return view('welcome', [
                    'category' => $category,
                    'edition' => $edition,
                ]);
        }
    }

    public function verifyPayment($paymentDetails){
         //get active editions
        $reference = $paymentDetails['data']['reference'];
        //check if payment have been added
        if(Transaction::where('transaction_hash', $reference)->where('status', 1)->first()){
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

        if($paymentDetails['data']['metadata']['payment_for'] == "Registration"){
            //fetch registration data
            $newCandidate = ([
                'category' => $paymentDetails['data']['metadata']['category'],
                'edition_id' => $paymentDetails['data']['metadata']['edition_id'],
                'fullname' => $paymentDetails['data']['metadata']['fullname'],
                'nickname' => $paymentDetails['data']['metadata']['nickname'],
                'age' => $paymentDetails['data']['metadata']['age'],
                'tribe' => $paymentDetails['data']['metadata']['tribe'],
                'state_of_origin'=> $paymentDetails['data']['metadata']['state_of_origin'],
                'guardian_name'=> $paymentDetails['data']['metadata']['guardian_name'],
                'guardian_email' => $paymentDetails['data']['metadata']['guardian_email'],
                'guardian_address' => $paymentDetails['data']['metadata']['guardian_address'],
                'guardian_phone_number' => $paymentDetails['data']['metadata']['guardian_phone_number'],
                'relationship'=> $paymentDetails['data']['metadata']['relationship'],
                'email'=> $paymentDetails['data']['metadata']['email'],
                'address' => $paymentDetails['data']['metadata']['address'],
                'phone_number' => $paymentDetails['data']['metadata']['phone_number'],
                'skills' => $paymentDetails['data']['metadata']['skills'],
                'languages'=> $paymentDetails['data']['metadata']['languages'],
                'occupation'=> $paymentDetails['data']['metadata']['occupation'],
                'image' => $paymentDetails['data']['metadata']['image'],
                'transaction_id' => $transactionId
            ]);

            //send email to candidate

            if($createCandidate = Candidate::create($newCandidate)){
                return true;
            }
        }
       
       return false;
    }

    public function makeEditionActive($id){
        $setting = Setting::first();
        $setting->edition_id = $id;
       if($setting->save()){
            return true;
       }
       return false;
    }
}
