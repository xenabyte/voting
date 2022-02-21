<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests;

//Models
use App\Models\Candidate;
use App\Models\User;
use App\Models\Contestant;
use App\Models\Edition;
use App\Models\Setting;
use App\Models\Vote;
use App\Models\Winner;
use App\Models\Transaction;

//Utils
use Log;
use Mail;
use Paystack;
use Alert;


class WelcomeController extends Controller
{
      /**
     * Show Landing page
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        return view('index');
    }

     /**
     * Show registration page
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function registration($category){
        if($category != 'kiddies' && $category != 'adult'){
            return view('error');
        }

        return $this->viewLanding($category);
    }
    
     /**
     * Register candidates.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function addCandidates(Request $request)
    {
        $setting = Setting::first();
        $edition = $setting->edition;
        $category = $request->category;

        //return to paystack payment page
        if(!empty($request->metadata)){
            return Paystack::getAuthorizationUrl()->redirectNow();
        }


        //start registration
        try{
            //$this->validate($request, Candidate::getValidationRule());
        } catch (Exception $e) {
            alert()->error($e, 'Opps')->persistent('Close');
            return redirect()->back();
        }

        //register candidates
        $imageUrl = 'uploads/candidates/'.$request->nickname.$request->file('image')->getClientOriginalName(); 
        $image = $request->file('image')->move('uploads/candidates', $imageUrl);
        $newCandidate = ([
            'edition_id' => $edition->id,
            'fullname' => $request->fullname,
            'nickname' => $request->nickname,
            'age' => $request->age,
            'tribe' => $request->tribe,
            'state_of_origin'=> $request->state_of_origin,
            'guardian_name'=> $request->guardian_name,
            'guardian_email' => $request->guardian_email,
            'guardian_address' => $request->guardian_address,
            'guardian_phone_number' => $request->guardian_phone_number,
            'relationship'=> $request->relationship,
            'email'=> $request->email,
            'address' =>$request->address,
            'phone_number' => $request->phone_number,
            'skills' => $request->skills,
            'languages'=> $request->languages,
            'occupation'=> $request->occupation,
            'image' => $imageUrl
        ]);

        // $alreadyPaid = array('07054143144', '07037078046', '07063196058', '08156892988', '08089402623', '07012662549', '09068851250', '08128641320');

        // foreach($alreadyPaid as $paid){
        //     if($request->number == $paid){
        //         if($createCandidate = Candidate::create($newCandidate)){
        //             alert()->info('Registration successful', 'Good Job')->persistent('Close');
        //             return $this->viewLanding($category);
        //         }
        //     }
        // }
        
        return view('welcome', [
            'category' => $category,
            'edition' => $edition,
            'newCandidate' => $newCandidate
        ]);

    }


    //verify payment with card
    public function verifyPayment()
    {
        $paymentDetails = Paystack::getPaymentData();

        //get active editions
        $setting = Setting::first();
        $edition = $setting->edition;
        $category = $paymentDetails['data']['metadata']['category'];

        if($paymentDetails['status'] == true){
            $processPayment = $this->processPayment($paymentDetails);
            if($processPayment){
                alert()->info('Payment successful', 'Good Job')->persistent('Close');
                return $this->viewLanding($category);
            }

            alert()->info('Payment already Processed', 'Success')->persistent('Close');
            return $this->viewLanding($category);
        }

    }

    public function paystackWebhook(Request $request){
        try {
            $webhookData = $request->all();
            $event = $webhookData['event'];
            if($event == "charge.success"){
                $processPayment = $this->processPayment($paymentDetails);
                return $processPayment;
            }
            
        }catch (ValidationException $e) {
            Log::error($e->getMessage());
        }
    }

    
}
