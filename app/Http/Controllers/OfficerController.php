<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\officer;
use Carbon\Carbon;

class OfficerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:officer');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $show_list = officer::all();

        foreach($show_list as $show)
        {
           $o_username = $show->username;
           $o_mailwarning = $show->mailwarning;
           $o_mailwarning_at = $show->mailwarning_at;

            if($o_mailwarning == "yes"){

                $dd_mailwarning = date_diff(new \DateTime($o_mailwarning_at), new \DateTime())->format("%d");

                if($dd_mailwarning > "7"){
                    officer::where('username','=',$o_username)->update([
                        'active' => "no"
                    ]);
                }

            }
        }

        return view('officer.home');
    }
}
