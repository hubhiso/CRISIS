<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\officer;
use Carbon\Carbon;
use App\officer_evaluate;
use Auth;
use Illuminate\Support\Facades\Session;

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
    public function index(Request $request)
    {
        $user = Auth::user()->username; 

        $show_list = officer::all();

        $ck_evaluate = officer::all();

        foreach($show_list as $show)
        {
            $o_username = $show->username;
            $o_mailwarning = $show->mailwarning;
            $o_mailwarning_at = $show->mailwarning_at;

            if($o_mailwarning == "yes"){

                $dd_mailwarning = date_diff(new \DateTime($o_mailwarning_at), new \DateTime())->format("%d");

                if($dd_mailwarning > "7"){
                    officer::where('username','=',$o_username)->update([
                        'approv' => "no",
                        'active' => "no"
                    ]);
                }

            }
        }

        $officereva = officer::where('username','=', $user )->get();

        foreach($officereva as $eva){

            $officer_datecreate = $eva->created_at;
            $mm_datecreate = date_diff(new \DateTime($officer_datecreate), new \DateTime())->format("%m");
            $yy_datecreate = date_diff(new \DateTime($officer_datecreate), new \DateTime())->format("%y");

            if(Session::has('login_eva') == 'yes'){
                if($yy_datecreate >= "1" or $mm_datecreate >= "1"){
                    $show_eva = "yes";
                }else{
                    $show_eva = "no";
                }
            }else{
                $show_eva = "no";
            }
        }
        

        $ck_date = officer_evaluate::where('username','=', $user )->get();
        $today = date("Y-m-d");

        $ck_datetoday_eva = 0;
        $eva1 = 0;
        $eva2 = 0;
        $eva3 = 0;
        $eva4 = 0;
        $eva5 = 0;

        foreach($ck_date as $date)
        {
            $listdate = date($date->date_notshow);

            $cratedate = date_format($date->created_at, "Y-m-d");

            if($today == $listdate){
                $show_eva = "no";
            }

            if($today == $cratedate){
                $ck_datetoday_eva = 1;
                $eva1 = $date->eva1;
                $eva2 = $date->eva2;
                $eva3 = $date->eva3;
                $eva4 = $date->eva4;
                $eva5 = $date->eva5;
            }
        }


        return view('officer.home',compact('show_eva','ck_datetoday_eva','eva1','eva2','eva3','eva4','eva5'));
    }

    public function office_eva( Request $request ) {

        $user = Auth::user()->username; 

        $ck_notshow = $request->input('ck_notshow');

        if($ck_notshow  == "yes"){
            $date_notshow = date("Y-m-d");
        }else{
            $date_notshow = NULL;
        }

            officer_evaluate::create([
                'username'=>$user,
                'eva1'=>$request->input('score1'),
                'eva2'=>$request->input('score2'),
                'eva3'=>$request->input('score3'),
                'eva4'=>$request->input('score4'),
                'eva5'=>$request->input('score5'),
                'eva_comment'=>$request->input('s_comment'),
                'date_notshow'=>$date_notshow
                
            ]);


        return response()->json( [ 'success' => 'บันทึกการประเมินตนเองสำเร็จ!' ] );

    }
}
