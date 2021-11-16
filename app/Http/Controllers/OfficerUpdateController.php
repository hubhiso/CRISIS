<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\case_input;
use App\add_detail;
use App\operate_detail;
use App\timeline;
use App\officer;
use Auth;
use App\casetransfer;


class OfficerUpdateController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth:officer');
    }

    public function accept_case(Request $request)
    {

        $case_id = $request->input('case_id');
        $receiver_name = $request->input('receiver');
        $receiver_id = $request->input('id_officer');


        $ck_status1 = timeline::where('case_id','=',$case_id)->orderBy('id','desc')->first();

        if($ck_status1->operate_status == 1){
            case_input::where('case_id','=',$case_id)->update(['receiver' => $receiver_name ,'receiver_id' => $receiver_id , 'status' => 2]);

            timeline::create(['case_id'=>$case_id,
                'operate_status'=>2,
                'operate_time'=> date("Y-m-d")
            ]);
        }else if($ck_status1->operate_status == 2){
            case_input::where('case_id','=',$case_id)->update(['receiver' => $receiver_name ,'receiver_id' => $receiver_id, 'status' => 2]);

            casetransfer::where('case_id','=',$case_id)->orderBy('id','desc')->take(1)->update(['ousername' => $request->input('receive_username')]);
        }else if($ck_status1->operate_status == 3){
            case_input::where('case_id','=',$case_id)->update(['receiver' => $receiver_name ,'receiver_id' => $receiver_id, 'status' => 3]);

            casetransfer::where('case_id','=',$case_id)->orderBy('id','desc')->take(1)->update(['ousername' => $request->input('receive_username')]);

        }else if($ck_status1->operate_status == 4){
            case_input::where('case_id','=',$case_id)->update(['receiver' => $receiver_name ,'receiver_id' => $receiver_id, 'status' => 4]);

            casetransfer::where('case_id','=',$case_id)->orderBy('id','desc')->take(1)->update(['ousername' => $request->input('receive_username')]);

        }else if($ck_status1->operate_status == 5){
            case_input::where('case_id','=',$case_id)->update(['receiver' => $receiver_name ,'receiver_id' => $receiver_id, 'status' => 5]);

            casetransfer::where('case_id','=',$case_id)->orderBy('id','desc')->take(1)->update(['ousername' => $request->input('receive_username')]);

        }else if($ck_status1->operate_status == 6){
            case_input::where('case_id','=',$case_id)->update(['receiver' => $receiver_name ,'receiver_id' => $receiver_id, 'status' => 6]);

            casetransfer::where('case_id','=',$case_id)->orderBy('id','desc')->take(1)->update(['ousername' => $request->input('receive_username')]);

        }

        
        return redirect('officer/show/0');

    }

    public function add_detail(Request $request)
    {
        //var_dump($request->input('birthdate'));
        foreach ($request->input() as $key => $value) {
            if (empty($value)) {
                $request->request->set($key, null);
            }
        }
        $case_id = $request->input('case_id');
        $birth_date = date('Y-m-d',strtotime(str_replace('-','/', $request->input('birthdate'))));
        $interview_date = date('Y-m-d',strtotime(str_replace('-','/', $request->input('DateInterview'))));
        $accident_date = date('Y-m-d',strtotime(str_replace('-','/', $request->input('DateAct'))));
        if ($interview_date == "1970-01-01"){
            $interview_date = date('Y-m-d');
        }
        if ($accident_date == "1970-01-01"){
            $accident_date = date('Y-m-d');
        }
        if ($birth_date == "1970-01-01"){
            $birth_date = date('Y-m-d');
        }
        $temp_chk1 = $request->input('law');
        $temp_chk2 = $request->input('aids');
        $temp_chk3 = $request->input('attitude');
        $temp_chk4 = $request->input('policy');
        $temp_chk5 = $request->input('etc');
        $chk1=1;
        $chk2=1;
        $chk3=1;
        $chk4=1;
        $chk5=1;
        if(!isset($temp_chk1)){
            $chk1 = 0;
        }
        if(!isset($temp_chk2)){
            $chk2 = 0;
        }
        if(!isset($temp_chk3)){
            $chk3 = 0;
        }
        if(!isset($temp_chk4)){
            $chk4 = 0;
        }
        if(!isset($temp_chk5)){
            $chk5 = 0;
        }

        case_input::where('case_id','=',$case_id)->update([ 'status' => 3,
                                                            'name' => $request->input('name'),
                                                            'victim_tel' => $request->input('tel'),
                                                            'sex' => $request->input('sex'),
                                                            'sex_etc' => $request->input('sex_etc'),
                                                            'nation' => $request->input('nation'),
                                                            'nation_etc' => $request->input('nation_etc'),
                                                            'problem_case' => $request->input('problem_case'),
                                                            'sub_problem' => $request->input('sub_problem'),
                                                            'group_code' => $request->input('group_code'),
                                                            'detail' => $request->input('detail'),
                                                            'need' => $request->input('need')]);
        timeline::create(['case_id'=>$case_id,
            'operate_status'=>3,
            'operate_time'=> $interview_date
        ]);
        add_detail::create(
            ['case_id'=>$case_id,
             'interview_date'=>$interview_date,
            'birth_date'=>$birth_date,
            'age'=>$request->input('age'),
            'current_status'=>$request->input('marital-status'),
            'occupation'=>$request->input('occupation'),
            'occupation_detail'=>$request->input('occupation_detail'),
            'address'=>$request->input('address'),
            'card_type'=>$request->input('card_type'),
            'card_number'=>$request->input('card_num'),
            'type_offender'=>$request->input('offender_type'),
            'subtype_offender'=>$request->input('offender_subtype'),
            'violator_name'=>$request->input('violator_name'),
            'violator_organization'=>$request->input('violator_organization'),
            'offender_organization'=>$request->input('offender_organization'),
            'accident_location'=>$request->input('accident_location'),
            'accident_date'=>$accident_date,
            'accident_time'=>$request->input('accident_time'),
            'violation_characteristics'=>$request->input('violation_characteristics'),
            'effect'=>$request->input('effect'),
            'cause_type1'=>$chk1,
            'cause_type2'=>$chk2,
            'cause_type3'=>$chk3,
            'cause_type4'=>$chk4,
            'etc'=>$chk5,
            'etc_detail'=>$request->input('etc_detail')]
        );
        return redirect('officer/show/0');
    }
    public function update_detail(Request $request)
    {
        //var_dump($request->input('age'));
        foreach ($request->input() as $key => $value) {
            if (empty($value)) {
                $request->request->set($key, null);
            }
        }
        $case_id = $request->input('case_id');
        $birth_date = date('Y-m-d',strtotime(str_replace('-','/', $request->input('birthdate'))));
        $interview_date = date('Y-m-d',strtotime(str_replace('-','/', $request->input('DateInterview'))));
        $accident_date = date('Y-m-d',strtotime(str_replace('-','/', $request->input('DateAct'))));

        $temp_chk1 = $request->input('law');
        $temp_chk2 = $request->input('aids');
        $temp_chk3 = $request->input('attitude');
        $temp_chk4 = $request->input('policy');
        $temp_chk5 = $request->input('etc');
        $chk1=1;
        $chk2=1;
        $chk3=1;
        $chk4=1;
        $chk5=1;
        if(!isset($temp_chk1)){
            $chk1 = 0;
        }
        if(!isset($temp_chk2)){
            $chk2 = 0;
        }
        if(!isset($temp_chk3)){
            $chk3 = 0;
        }
        if(!isset($temp_chk4)){
            $chk4 = 0;
        }
        if(!isset($temp_chk5)){
            $chk5 = 0;
        }

        case_input::where('case_id','=',$case_id)->update([ 'status' => 3,
            'name' => $request->input('name'),
            'victim_tel' => $request->input('tel'),
            'sex' => $request->input('sex'),
            'sex_etc' => $request->input('sex_etc'),
            'nation' => $request->input('nation'),
            'nation_etc' => $request->input('nation_etc'),
            'problem_case' => $request->input('problem_case'),
            'sub_problem' => $request->input('sub_problem'),
            'group_code' => $request->input('group_code'),
            'detail' => $request->input('detail'),
            'need' => $request->input('need')]);
        add_detail::where('case_id','=',$case_id)->update(
            [
                'interview_date'=>$interview_date,
                'birth_date'=>$birth_date,
                'age'=>$request->input('age'),
                'current_status'=>$request->input('marital-status'),
                'occupation'=>$request->input('occupation'),
                'occupation_detail'=>$request->input('occupation_detail'),
                'address'=>$request->input('address'),
                'card_type'=>$request->input('card_type'),
                'card_number'=>$request->input('card_num'),
                'type_offender'=>$request->input('offender_type'),
                'subtype_offender'=>$request->input('offender_subtype'),
                'violator_name'=>$request->input('violator_name'),
                'violator_organization'=>$request->input('violator_organization'),
                'offender_organization'=>$request->input('offender_organization'),
                'accident_location'=>$request->input('accident_location'),
                'accident_date'=>$accident_date,
                'accident_time'=>$request->input('accident_time'),
                'violation_characteristics'=>$request->input('violation_characteristics'),
                'effect'=>$request->input('effect'),
                'cause_type1'=>$chk1,
                'cause_type2'=>$chk2,
                'cause_type3'=>$chk3,
                'cause_type4'=>$chk4,
                'etc'=>$chk5,
                'etc_detail'=>$request->input('etc_detail')]
        );
        return redirect('officer/show/0');
    }

    public function add_activities(Request $request){
        $activities_num = operate_detail::where('case_id','=',$request->input('case_id'))->orderBy('operate_date', 'asc')->count();
        $operate_date = date('Y-m-d',strtotime(str_replace('-','/', $request->input('operate_date'))));

        if($activities_num == 0){
            timeline::create(['case_id'=>$request->input('case_id'),
                'operate_status'=>4,
                'operate_time'=> $operate_date
            ]);
        }
        operate_detail::create([
            'case_id' => $request->input('case_id'),
            'operate_date' => $operate_date,
            'advice' => $request->input('advice'),
            'investigate' => $request->input('investigate'),
            'negotiate_individual' => $request->input('negotiate_individual'),
            'negotiate_policy' => $request->input('negotiate_policy'),
            'prosecution' => $request->input('prosecution'),
            'operate_detail' => $request->input('operate_detail'),
            'operate_result' => $request->input('operate_result')
        ]);

        /*
        $operate_detail = new operate_detail($request->all());
        Auth::user()->operate_detail()->save($operate_detail);
        */

        $response = array(
            'case_id' => $request->input('case_id'),
            'operate_date' => $operate_date,
            'cout' => $activities_num,
            'investigate' => $request->input('investigate'),
            'advice' => $request->input('advice'),
            'negotiate_individual' => $request->input('negotiate_individual'),
            'negotiate_policy' => $request->input('negotiate_policy'),
            'prosecution' => $request->input('prosecution'),
            'operate_detail' => $request->input('operate_detail'),
            'operate_result' => $request->input('operate_result'),
            'msg' => 'Setting created successfully',
        );
        return \Response::json($response);
    }

    public function update_operate_case(Request $request)
    {
        $case_id = $request->input('case_id');
        if($request->input('status') == 4){
            case_input::where('case_id','=',$case_id)->update([
                'status' => $request->input('status'),
                'operate_result_status' => null,
                'problemfix' => null,
                'compensation' => null,
                'change_policy' => null,
                'prov_refer' => null,
                'refer_type' => null,
                'refer_name' => null]);

        }elseif ($request->input('status') == 5){
            case_input::where('case_id','=',$case_id)->update([
                'status' => $request->input('status'),
                'operate_result_status' => $request->input('operate_result_status'),
                'problemfix' => $request->input('problemfix'),
                'compensation' => $request->input('compensation'),
                'change_policy' => $request->input('change_policy'),
                'prov_refer' => null,
                'refer_type' => null,
                'refer_name' => null]);
            timeline::create(['case_id'=>$case_id,
                'operate_status'=>5,
                'operate_time'=> date("Y-m-d")
            ]);
        }elseif ($request->input('status') == 6){
            case_input::where('case_id','=',$case_id)->update([
                'status' => $request->input('status'),
                'operate_result_status' => null,
                'problemfix' => null,
                'compensation' => null,
                'change_policy' => null,
                'prov_refer' => $request->input('prov_refer'),
                'refer_type' => $request->input('refer_type'),
                'refer_name' => $request->input('refer_name')]);
            timeline::create(['case_id'=>$case_id,
                'operate_status'=>6,
                'operate_time'=> date("Y-m-d")
            ]);
        }

    }

    public function update_operate(Request $request)
    {
        $Operate_date = date('Y-m-d',strtotime(str_replace('-','/', $request->input('Operate_date'))));
        $id = $request->input('id');

        operate_detail::where('id','=',$id)->update([
            'operate_date' => $Operate_date,
            'advice' => $request->input('advice'),
            'investigate' => $request->input('investigate'),
            'negotiate_individual' => $request->input('negotiate_individual'),
            'negotiate_policy' => $request->input('negotiate_policy'),
            'prosecution' => $request->input('prosecution'),
            'operate_detail' => $request->input('operate_detail'),
            'operate_result' => $request->input('operate_result')]);
    }
    public function load_case(Request $request)
    {
        //$data = $request->json()->all();
        //$Filter = $data['Filter'];
        $username = $request->input('username');
        $filter = 0;
        $value_sub = $request->input('Sub_Filter');
        $Date_start = date('Y-m-d',strtotime(str_replace('-','/', $request->input('Date_start'))));
        $Date_end = date('Y-m-d',strtotime(str_replace('-','/', $request->input('Date_end')). "+1 day"));
       // $Date_end = $Date_end;
        $text_search = $request->input('Search_text');
        $type_Search = $request->input('Type_search');
        $pid = $request->input('pid');
        $pposition = $request->input('pposition');
        $parea = $request->input('parea');

        $joinofficer = officer::where('name', $username)->first();

        $join_transfers = casetransfer::where('prev_ousername' ,'=', $joinofficer->username)->distinct()->get();


        if(Auth::user()->position == "admin" || Auth::user()->p_view_all == "yes"){
            if($request->input('Filter')==1){
                $cases = case_input::where('prov_id', '>', '0');
                $filter ++;
            }else if ($request->input('Filter')==2){
                $matchThese = ['problem_case' => $value_sub];
                $cases = case_input::where($matchThese);
                $filter ++;
    
            }else if ($request->input('Filter')==3){
                $matchThese = ['status' => $value_sub];
                $cases = case_input::where($matchThese);
                $filter ++;
    
            }else if ($request->input('Filter')==4){
                $matchThese = ['sender_case' => $value_sub];
                $cases = case_input::where($matchThese);
                $filter ++;
            }else if ($request->input('Filter')==5){
                $loop_case = 0;
                foreach ($join_transfers as $join_transfer) {
                    if($loop_case == 0){
                        $cases =  case_input::where('case_id', '=', $join_transfer->case_id );
                    }else{
                        $cases =  $cases->orWhere('case_id', '=', $join_transfer->case_id );
                    }
                    $loop_case++;
                }

                $filter ++;
            }

        }else if($pposition  == "manager_area" && $pid == 0){
            if($request->input('Filter')==1){
                $cases = case_input::join('prov_geo', 'prov_id', '=', 'prov_geo.code')->where('prov_geo.nhso', '=', $parea);
                $filter ++;
            }else if ($request->input('Filter')==2){
                $cases = case_input::join('prov_geo', 'prov_id', '=', 'prov_geo.code')->where([['problem_case','=', $value_sub],['prov_geo.nhso','=',$parea]]);
                $filter ++;
    
            }else if ($request->input('Filter')==3){
                $cases = case_input::join('prov_geo', 'prov_id', '=', 'prov_geo.code')->where([['status','=', $value_sub],['prov_geo.nhso','=',$parea]]);
                $filter ++;
    
            }else if ($request->input('Filter')==4){
                $cases = case_input::join('prov_geo', 'prov_id', '=', 'prov_geo.code')->where([['sender_case','=', $value_sub],['prov_geo.nhso','=',$parea]]);
                $filter ++;
            }else if ($request->input('Filter')==5){

                $loop_case = 0;
                foreach ($join_transfers as $join_transfer) {
                    if($loop_case == 0){
                        $cases =  case_input::where('case_id', '=', $join_transfer->case_id );
                    }else{
                        $cases =  $cases->orWhere('case_id', '=', $join_transfer->case_id );
                    }
                    $loop_case++;
                }

                $filter ++;
            }

        }
        else{
            if($request->input('Filter')==1){
                $matchThese = ['prov_id'=>$pid ];
                //$test = "->orWhere('prov_id'=> '11' )";
                $cases = case_input::where($matchThese);

                foreach ($join_transfers as $join_transfer) {

                    $cases =  $cases->orWhere('case_id', '=', $join_transfer->case_id );
                }
                $filter ++;
            }else if ($request->input('Filter')==2){
                $matchThese = ['problem_case' => $value_sub,'prov_id'=>$pid];
                $cases = case_input::where($matchThese);
                $filter ++;
    
            }else if ($request->input('Filter')==3){
                $matchThese = ['status' => $value_sub,'prov_id'=>$pid];
                $cases = case_input::where($matchThese);
                $filter ++;
    
            }else if ($request->input('Filter')==4){
                $matchThese = ['sender_case' => $value_sub,'prov_id'=>$pid];
                $cases = case_input::where($matchThese);
                $filter ++;
            }else if ($request->input('Filter')==5){
                
                $loop_case = 0;
                foreach ($join_transfers as $join_transfer) {
                    if($loop_case == 0){
                        $cases =  case_input::where('case_id', '=', $join_transfer->case_id );
                    }else{
                        $cases =  $cases->orWhere('case_id', '=', $join_transfer->case_id );
                    }
                    $loop_case++;
                }

                $filter ++;
            }
        }
        

        if($Date_start != null){

            if ($filter==0) {
                $cases = case_input::whereBetween('created_at', array($Date_start, $Date_end));
                $filter++;
            }else{
                 $cases = $cases->whereBetween('created_at', array($Date_start, $Date_end));
                $filter++;
            }
        }
        if($text_search != null){

            if ($type_Search == 1){
                if ($filter==0) {
                    $cases =  case_input::Where('name', 'like', '%' . $text_search . '%');
                    $filter++;
                }else{
                    $cases =  $cases->Where('name', 'like', '%' . $text_search . '%');
                    $filter++;
                }

            }else if ($type_Search == 2){
                if ($filter==0) {
                    $cases =  case_input::Where('receiver', 'like', '%' . $text_search . '%');
                    $filter++;
                }else{
                    $cases =  $cases->Where('receiver', 'like', '%' . $text_search . '%');
                    $filter++;
                }

            }else if ($type_Search == 3){
                if ($filter==0) {
                    $cases =  case_input::Where('victim_tel', 'like', '%' . $text_search . '%');
                    $filter++;
                }else{
                    $cases =  $cases->Where('victim_tel', 'like', '%' . $text_search . '%');
                    $filter++;
                }

            }else if ($type_Search == 4){
                if ($filter==0) {
                    $cases =  case_input::Where('case_id', 'like', '%' . $text_search . '%');
                    $filter++;
                }else{
                    $cases =  $cases->Where('case_id', 'like', '%' . $text_search . '%');
                    $filter++;
                }

            }
        }

        if($joinofficer->group != null && $joinofficer->g_view_all == 'yes'){
            $groups = officer::where('group','=', $joinofficer->group)->get();

            foreach ($groups as $group) {
                //$cases =  $cases->orWhere('prov_id', '=', $group->prov_id );
                $cases =  $cases->orWhere('receiver', '=', $group->name );
                $filter++;
            }
        }

        
        if($filter > 0){
            $cases = $cases->get();
          //var_dump($cases);
        }else{
            $cases = case_input::Where('prov_id','=',$pid);
        }

        $html = view('officer._Case',compact('cases','username','join_transfers'))->render();
        return response()->json(compact('html','text_search'));

    }

    public function printcase($case_id)
    {

        $show_data = case_input::where('case_id','=',$case_id)->first();
        $show_timeline = timeline::where('case_id',$case_id)->where('operate_status',2)->first();
        $activities = operate_detail::where('case_id','=',$case_id)->orderBy('operate_date', 'asc')->get();

        return view('officer.printpage',compact('show_data', 'show_timeline', 'activities'));
    }

    
}