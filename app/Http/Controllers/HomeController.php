<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //settings
        $setting = Setting::first();
        $edition = $setting->edition;
        $allEditions = Edition::All();

        //candidates
        $candidates = Candidate::where('edition_id', $edition->id)->get();
        //payment
        $payments = Transaction::where('edition_id', $edition->id)->get();


        return view('home', [
            'setting' => $setting,
            'edition' => $edition,
            'candidates' => $candidates,
            'payments' => $payments,
            'allEditions' => $allEditions,
        ]);
    }

    /**
     * Show the Pageantry editions.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function editions()
    {
        return view('editions');
    }

   /**
     * Show the Edition candidates.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     public function candidates()
     {
         //settings
        $setting = Setting::first();
        $edition = $setting->edition;

        //candidates
        $candidates = Candidate::where('edition_id', $edition->id)->get();

        return view('candidates', [
            'setting' => $setting,
            'candidates' => $candidates,
            'edition' => $edition,
        ]);
     }

     /**
     * Show the Edition contestants.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     public function contestants()
     {
         //settings
        $setting = Setting::first();
        $edition = $setting->edition;

        //contestants
        $contestants = Contestant::where('edition_id', $edition->id)->get();

        return view('contestants', [
            'setting' => $setting,
            'contestants' => $contestants,
            'edition' => $edition,
        ]);
     }

     
     /**
     * Show the Edition payments.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
     public function payments()
     {
         //settings
        $setting = Setting::first();
        $edition = $setting->edition;

        //payment
        $payments = Transaction::where('edition_id', $edition->id)->get();

        return view('payments', [
            'setting' => $setting,
            'payments' => $payments,
            'edition' => $edition,
        ]);
     }

     
     /**
     * Show the Edition votes.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
     public function votes()
     {
         return view('votes');
     }

      /**
     * Update pageantry stage.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function updateStage(Request $request)
    {
        $stage = $request->stage;
        $setting = Setting::first();
        $setting->stage = $stage;

        if($setting->save()){
            alert()->info('Payment successful', 'Good Job')->persistent('Close'); 
            return redirect()->back();
        }
        alert()->error('Something went wrong', 'Opps')->persistent('Close'); 
        return redirect()->back();
    }

    /**
     * Create pageantry Edition.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function createEdition(Request $request)
    {
        $setting = Setting::first();
        try{
            //$this->validate($request, Edition::getValidationRule());
        } catch (Exception $e) {
            Log::info($e);
            alert()->error($e, 'Opps')->persistent('Close');
            return redirect()->back();
        }

        //create Edition object
        $imageUrl = 'uploads/banner/'.'banner_'.time().$request->file('banner')->getClientOriginalName(); 
        $image = $request->file('banner')->move('uploads/banner', $imageUrl);
        $newEdition = ([
            'name' => $request->name,
            'year' => $request->year,
            'tagline' => $request->tagline,
            'registration_amount' => $request->registration_amount,
            'amount_per_vote' => $request->amount_per_vote,
            'banner' => $imageUrl,
        ]);


        if($createEdition = Edition::create($newEdition)){
            //make active (optional)
            if(!empty($request->make_active)){
                $this->makeEditionActive($createEdition->id);
            }
            alert()->info('Edition Created', 'Good Job')->persistent('Close'); 
            return redirect()->back();
        }
        alert()->error('Something went wrong', 'Opps')->persistent('Close'); 
        return redirect()->back();
    }

     /**
     * Activate Edition
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function activateEdition($id){

        $activateEdition = $this->makeEditionActive($id);
        
        if($activateEdition){
            alert()->info('Edition Activated', 'Good Job')->persistent('Close'); 
            return redirect()->back();
        }

        alert()->error('Something went wrong', 'Opps')->persistent('Close'); 
        return redirect()->back();
    }


    /**
     * Edit Edition
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function editEdition(Request $request){
        $editionId = $request->edition_id;

        if(!$edition = Edition::find($editionId)){
            alert()->error('Invalid Edition', 'Opps')->persistent('Close'); 
            return redirect()->back();
        }

        $edition->name = $request->name;
        $edition->year = $request->year;
        $edition->tagline = $request->tagline;
        $edition->registration_amount = $request->registration_amount;
        $edition->amount_per_vote = $request->amount_per_vote;
        if(!empty($request->banner)){
            $imageUrl = 'uploads/banner/'.'banner_'.time().$request->file('banner')->getClientOriginalName(); 
            $image = $request->file('banner')->move('uploads/banner', $imageUrl);
            $edition->banner = $imageUrl;
        }

        if($edition->save()){
            alert()->info('Changes Saved', 'Good Job')->persistent('Close'); 
            return redirect()->back();
        }

        alert()->error('Something went wrong', 'Opps')->persistent('Close'); 
        return redirect()->back();

    }
}
