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
     * Show registration page
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function registration($category){

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
        $imageUrl = 'uploads/images/'.$request->nickname.$request->file('image')->getClientOriginalName(); 
        $image = $request->file('image')->move('uploads/images', $imageUrl);
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
        
        return view('welcome', [
            'category' => $category,
            'edition' => $edition,
            'newCandidate' => $newCandidate
        ]);

    }


    //verify payment with card
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();

        if($paymentDetails['status'] == true){
            $student_id = $paymentDetails['data']['metadata']['student_id'];
            $student_email = $paymentDetails['data']['customer']['email'];
            $payment_reference_id = $paymentDetails['data']['reference'];
            $amountPaid = $paymentDetails['data']['amount']/100;

            //subtract charges


            $studentData = Student::find($student_id);
            $deposits = Deposit::with(['student', 'admin', 'pay_method'])->where('student_id', $studentData->id)->get();
            $paymentMethod = PaymentMethod::all();

            if(Deposit::where('payment_reference', $payment_reference_id)->where('status', Status::getStatusId(Status::STATUS_SUCCESS))->first()){
                alert()->info('Payment already Processed', 'success')->persistent('Close');
                return view('student.deposit', [
                    'deposits' => $deposits,
                    'payment_methods' => $paymentMethod
                ]);
            }

            $deposit = Deposit::with(['student'])->where('payment_reference', $payment_reference_id)->where('student_id', $student_id)->where('status', Status::getStatusId(Status::STATUS_PENDING))->first();

            //get Student
            $studentBalance = $studentData->wallet;
            $newBalance = $studentBalance + $deposit->amount;
            $studentData->wallet = $newBalance;

            $deposit->status = Status::getStatusId(Status::STATUS_SUCCESS);

            //send mail
            if($deposit->save() && $studentData->save()){
                alert()->success('Payment Successful', 'Success')->persistent('Close');
                return view('student.deposit', [
                    'deposits' => $deposits,
                    'payment_methods' => $paymentMethod
                ]);
            }

        }

    }


    
}
