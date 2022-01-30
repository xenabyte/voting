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

        //candidates
        $candidates = Candidate::where('edition_id', $edition->id)->get();
        //payment
        $payments = Transaction::where('edition_id', $edition->id)->get();


        return view('home', [
            'setting' => $setting,
            'edition' => $edition,
            'candidates' => $candidates,
            'payments' => $payments
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
}
