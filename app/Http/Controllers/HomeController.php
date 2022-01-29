<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $payment = Transaction::where('edition', $edition->id)->get();


        return view('home', [
            'edition' => $edition,
            'candidates' => $candidates,
            'payment' => $payment
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
         return view('candidates');
     }

     /**
     * Show the Edition contestants.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     public function contestants()
     {
         return view('contestants');
     }

     
     /**
     * Show the Edition payments.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
     public function payments()
     {
         return view('payments');
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
}
