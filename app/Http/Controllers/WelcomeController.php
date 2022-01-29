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


class WelcomeController extends Controller
{

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
    //

    
}
