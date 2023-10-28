<?php

namespace App\Http\Controllers;

use App\Http\Requests\case_inputRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\case_input;
use App\timeline;
use App\officer;
use App\province;
use App\amphur;
use App\casetransfer;
use Auth;
use App\sharecase;

class ManagerController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:officer');
    }

    public  function reject($case_id){
        $show_data = case_input::where('case_id','=',$case_id)->first();
        return view('Manager.reject_frm',compact('show_data'));
    }

    public  function transfer($case_id){
        $show_data = case_input::where('case_id','=',$case_id)->first();

        $provinces = province::orderBy('PROVINCE_NAME', 'asc')->get();
    
        $of_receiver = officer::where('name','=',$show_data->receiver)->first();
        $officers = officer::where('prov_id','=',$show_data->prov_id)->get();

        return view('Manager.transfer_frm',compact('show_data', 'of_receiver','officers', 'provinces' ));
    }

    public  function reject_cfm(Request $request){
        $case_id = $request->input('case_id');
        $reason = $request->input('reason');
        case_input::where('case_id','=',$case_id)->update(['reject_reason' => "$reason" , 'status' => 99]);
        timeline::create(['case_id'=>$case_id,
            'operate_status'=>99,
        ]);
        return redirect('officer/show/0');
    }

    public  function transfer_cfm(Request $request){
        $case_id = $request->input('case_id');
        $prev_provid = $request->input('prev_provid');

        $prev_o_username = $request->input('prev_o_username');

        $o_username = $request->input('o_username');

        $officer_id = $request->input('officer');

        $prov_id = $request->input('province');

        $amphur_id = $request->input('amphur_id');



        if($officer_id != ""){
            $officer = $officers = officer::where('id','=',$officer_id)->first();

            case_input::where('case_id','=',$case_id)->update([
                'receiver_id' => "$officer_id" , 
                'receiver' => $officer->name
            ]);
            $officername = $officer->name;
        }else{

            case_input::where('case_id','=',$case_id)->update([
                'status' => 1 , 
                'prov_id' => $prov_id , 
                'amphur_id' => $amphur_id , 
                'receiver_id' => NULL , 
                'receiver' => ""
            ]);

            $officername = NULL;

        }

        casetransfer::create([
            'case_id'=>$case_id,
            'provid'=>$prov_id,
            'prev_provid'=>$prev_provid,
            'ousername'=>$officername,
            'prev_ousername'=>$prev_o_username
        ]);

        return redirect('officer/show/0');
    }

    public function ajax_amphur($prov_id) {
        $prov_code    = $prov_id;
        $new_prov_id = province::where('PROVINCE_CODE', '=', $prov_code)->first();
        $category = amphur::where('PROVINCE_ID', '=', $new_prov_id->PROVINCE_ID)->get();
        return response()->json($category);
    }

    public  function share_case($case_id){

        $show_data = case_input::where('case_id','=',$case_id)->first();
        $provinces = province::orderBy('PROVINCE_NAME', 'asc')->get();
        $of_receiver = officer::where('name','=',$show_data->receiver)->first();
        $officers = officer::where([['prov_id','=',$show_data->prov_id],['username','!=',$of_receiver->username]])->get();

        $sharecases = sharecase::where('case_id','=',$case_id)->get();

        return view('officer.sharecase',compact('show_data', 'of_receiver','officers', 'provinces', 'sharecases' ));
    }

    public  function manage_sharecase(Request $request){

        $ck_sharecases1 = sharecase::where('case_id','=', $request->input('case_id'))->get();

        if( $request->input('old_shareperson') != null ){

            $i =0;
            foreach($request->input('old_shareperson') as $i => $old_shareperson[])  $i_loop1 = $i;

            foreach ($ck_sharecases1 as $ck_sharecase1) {

                $ck = 0;
                for($i=0;$i<=$i_loop1;$i++) {
                if( $old_shareperson[$i] == $ck_sharecase1->user_share){
                        $ck++;
                }
                }

                if($ck == 0){
                    sharecase::where([['case_id','=', $request->input('case_id')],['user_share','=', $ck_sharecase1->user_share]])->delete();
                }

            }
        }else{

            if( $ck_sharecases1 != null ){
                foreach ($ck_sharecases1 as $ck_sharecase1) {
                    sharecase::where([['case_id','=', $request->input('case_id')],['user_share','=', $ck_sharecase1->user_share]])->delete();
                }
            }

        }


        $ck_sharecases2 = sharecase::where('case_id','=', $request->input('case_id'))->get();

        if( $request->input('new_shareperson') != null ){

            $i =0;
            foreach($request->input('new_shareperson') as $i => $new_shareperson[])  $i_loop2 = $i;

            for($i=0;$i<=$i_loop2;$i++) {
                $ck = 0;
                foreach ($ck_sharecases2 as $ck_sharecase2) {
                    if($new_shareperson[$i] == $ck_sharecase2->user_share ){
                        $ck++;
                    }
                }

                if($ck == 0){
                    sharecase::create([
                        'active'=>'yes',
                        'case_id'=>$request->input('case_id'),
                        'user_receiver'=>$request->input('username'),
                        'user_share'=>$new_shareperson[$i]
                    ]);
                }
            }
        }

        $show_data = case_input::where('case_id','=',$request->input('case_id'))->first();
        $provinces = province::orderBy('PROVINCE_NAME', 'asc')->get();
        $of_receiver = officer::where('name','=',$show_data->receiver)->first();
        $officers = officer::where('prov_id','=',$show_data->prov_id)->where('username','!=',$of_receiver->username)->get();
        $sharecases = sharecase::where('case_id','=', $request->input('case_id'))->get();
        

        return view('officer.sharecase',compact('show_data', 'of_receiver','officers', 'provinces' , 'sharecases' ));


    }

    


}