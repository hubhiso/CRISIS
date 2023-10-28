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
use App\sharecase;


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
            return redirect('officer/add_detail/'.$case_id);
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
        //return redirect('officer/show/0');

        return redirect('officer/add_activities/'.$case_id);
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
        
        return redirect('officer/add_activities/'.$case_id);
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
                'final_operate_result' => null,
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
                'final_operate_result' => $request->input('final_operate_result'),
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
                'final_operate_result' => null,
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

        $sharecases = sharecase::where('user_share','=', $joinofficer->username)->get();

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
            }else if($request->input('Filter')==6){

                //$cases = case_input::where('prov_id', '=', $request->input('Sub_Filter'));

                $matchThese = ['prov_id' => $value_sub];
                $cases = case_input::where($matchThese);

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
            }else if($request->input('Filter')==6){

                //$cases = case_input::where('prov_id', '=', $request->input('Sub_Filter'));

                $matchThese = ['prov_id' => $value_sub];
                $cases = case_input::where($matchThese);

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
            }else if($request->input('Filter')==6){

                //$cases = case_input::where('prov_id', '=', $request->input('Sub_Filter'));

                $matchThese = ['prov_id' => $value_sub];
                $cases = case_input::where($matchThese);

                $filter ++;
            }

            /*
            $sharecases = sharecase::where('user_share','=', $username)->get();
            if( $sharecases != null ){
                foreach ($sharecases as $sharecase) {

                    $matchThese = ['case_id' => $sharecase->case_id];
                    $cases = case_input::where($matchThese);

                    $filter ++;

                }
            }
            */
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

        if($request->input('Filter')<>6){
            if($joinofficer->group != null && $joinofficer->g_view_all == 'yes'){
                $groups = officer::where('group','=', $joinofficer->group)->get();
    
                foreach ($groups as $group) {
                    //$cases =  $cases->orWhere('prov_id', '=', $group->prov_id );
                    $cases =  $cases->orWhere('receiver', '=', $group->name );
                    $filter++;
                }
            }
        }
        
        if($filter > 0){
            $cases = $cases->get();
          //var_dump($cases);
        }else{
            $cases = case_input::Where('prov_id','=',$pid);
        }

        

        $html = view('officer._Case',compact('cases','username','join_transfers','sharecases'))->render();
        return response()->json(compact('html','text_search'));

    }

    public function printcase($case_id)
    {

        $show_data = case_input::where('case_id','=',$case_id)->first();
        $show_detail = add_detail::where('case_id','=',$case_id)->first();
        $show_timeline = timeline::where('case_id',$case_id)->where('operate_status',2)->first();
        $activities = operate_detail::where('case_id','=',$case_id)->orderBy('operate_date', 'asc')->get();

        return view('officer.printpage',compact('show_data', 'show_timeline', 'activities', 'show_detail'));
    }

    public function exportexcel(Request $request){

        //$show_data = case_input::all();

        $date_start = date('Y-m-d',strtotime(str_replace('-','/', $request->input('date_start2'))));
        $date_end = date('Y-m-d',strtotime(str_replace('-','/', $request->input('date_end2')). "+1 day"));
        $type_export = $request->input('type_export');

        if($type_export == 1){
            $show_data = case_input::leftJoin('provinces AS b', 'case_inputs.prov_id', '=', 'b.province_code')
            ->leftJoin('r_sub_problem AS c', 'case_inputs.sub_problem', '=', 'c.id')
            ->leftJoin('r_sex AS d', 'case_inputs.sex', '=', 'd.code')
            ->leftJoin('r_group_code AS e', 'case_inputs.group_code', '=', 'e.code')
            ->leftJoin('prov_geo AS h', 'case_inputs.prov_id', '=', 'h.code')
            ->leftJoin('r_problem_case AS f', 'case_inputs.problem_case', '=', 'f.code')
            ->leftJoin('r_status AS g', 'case_inputs.status', '=', 'g.id')
            ->leftJoin('operate_details AS o', 'case_inputs.case_id', '=', 'o.case_id')
            ->leftJoin('timelines AS t', 'case_inputs.case_id', '=', 't.case_id')
            ->select('case_inputs.problem_case','case_inputs.group_code','b.PROVINCE_NAME','h.nhso','case_inputs.case_id', 'case_inputs.sender_case', 'g.name as gname', 'case_inputs.receiver', 'e.name AS ename', 'd.name AS dname', 'c.name AS cname', 'f.name AS fname', 'case_inputs.accident_date AS accident_date', 'case_inputs.created_at AS created_at', 'case_inputs.detail', 'case_inputs.need', 'case_inputs.nation' ,'t.operate_status' ,'t.operate_time','o.operate_result','o.operate_date','o.operate_detail','case_inputs.operate_result_status')
            ->whereBetween('case_inputs.created_at', [$date_start, $date_end])
            ->orderBy('case_inputs.created_at', 'asc')
            ->orderBy('t.operate_status', 'asc')
            ->orderBy('case_inputs.case_id', 'asc')
            ->get();
        }else{
        
            $show_data = case_input::leftJoin('provinces AS b', 'case_inputs.prov_id', '=', 'b.province_code')
            ->leftJoin('r_sub_problem AS c', 'case_inputs.sub_problem', '=', 'c.id')
            ->leftJoin('r_sex AS d', 'case_inputs.sex', '=', 'd.code')
            ->leftJoin('r_group_code AS e', 'case_inputs.group_code', '=', 'e.code')
            ->leftJoin('prov_geo AS h', 'case_inputs.prov_id', '=', 'h.code')
            ->leftJoin('r_problem_case AS f', 'case_inputs.problem_case', '=', 'f.code')
            ->leftJoin('r_status AS g', 'case_inputs.status', '=', 'g.id')
            ->leftJoin('timelines AS t', 'case_inputs.case_id', '=', 't.case_id')
            ->leftJoin('operate_details AS o', 'case_inputs.case_id', '=', 'o.case_id')
            ->select('case_inputs.problem_case','case_inputs.group_code','b.PROVINCE_NAME','h.nhso','case_inputs.case_id as case_id1', 'case_inputs.sender_case', 'g.name as gname', 'case_inputs.receiver', 'e.name AS ename', 'd.name AS dname', 'c.name AS cname', 'f.name AS fname', 'case_inputs.accident_date AS accident_date', 'case_inputs.created_at AS created_at', 'case_inputs.detail', 'case_inputs.need', 'case_inputs.nation' ,'t.operate_status' ,'t.operate_time','o.operate_result','o.operate_date','o.operate_detail','case_inputs.operate_result_status')
            ->whereBetween('case_inputs.created_at', [$date_start, $date_end])
            ->orderBy('case_inputs.created_at', 'asc')
            ->orderBy('t.operate_status', 'desc')
            ->orderBy('case_inputs.case_id', 'desc')
            ->get();
        }

        //->groupBy('b.PROVINCE_NAME')

        return view('officer.ExportExcel',compact('show_data','date_start','date_end','type_export'));
    }

    public function showverifydata(){


        /*
        $show_data = case_input::leftjoin('add_details', 'case_inputs.case_id', '=', 'add_details.case_id')
        ->leftjoin('operate_details', 'case_inputs.case_id', '=', 'operate_details.case_id')
        ->where('operate_details.id', \DB::raw("(select max(operate_details.id) from operate_details)"))
        ->get();
*/
/*
        $show_data = case_input::leftjoin('add_details', 'case_inputs.case_id', '=', 'add_details.case_id')
        ->leftjoin('operate_details', 'case_inputs.case_id', '=', 'operate_details.case_id')
        ->select('case_inputs.id','case_inputs.receiver','case_inputs.case_id','operate_details.id', \DB::raw("(select max(operate_details.id) from operate_details)"))
        ->groupBy('case_inputs.id') 
        ->groupBy('case_inputs.receiver') 
        ->groupBy('case_inputs.case_id') 
        ->groupBy('operate_details.id')
        ->orderBy('case_inputs.id')
        ->get();*/
/*
        $show_data = case_input::leftjoin('add_details', 'case_inputs.case_id', '=', 'add_details.case_id')
        ->leftjoin('operate_details', 'case_inputs.case_id', '=', 'operate_details.case_id')
        ->orderBy('case_inputs.id')
        ->get();*/

        $show_data = case_input::leftjoin('add_details', 'case_inputs.case_id', '=', 'add_details.case_id')
        ->leftjoin('operate_details', 'case_inputs.case_id', '=', 'operate_details.case_id')
        ->leftjoin('prov_geo', 'prov_id', '=', 'prov_geo.code')
        ->leftjoin('r_problem_case', 'problem_case', '=', 'r_problem_case.code')
        ->leftjoin('r_sub_problem', 'sub_problem', '=', 'r_sub_problem.code')
        ->leftjoin('r_group_code', 'group_code', '=', 'r_group_code.code')
        ->select('case_inputs.id',
        'prov_geo.nhso',
        'prov_geo.name as provname',
        'case_inputs.prov_id',
        'case_inputs.case_id',
        'case_inputs.sex',
        'case_inputs.nation',
        'case_inputs.problem_case as id_problem_case',
        'r_problem_case.name as problem_case',
        'case_inputs.sub_problem as id_sub_problem',
        'r_sub_problem.name as sub_problem',
        'case_inputs.group_code as id_group_code',
        'r_group_code.name as group_code',
        'add_details.violation_characteristics',
        'add_details.effect',
        'case_inputs.detail',
        'case_inputs.need',
        'case_inputs.created_at as datecreate',
        'case_inputs.receiver',
        'operate_details.operate_date as operatedate',
        'add_details.type_offender',
        'add_details.subtype_offender',
        'add_details.violator_name',
        'add_details.offender_organization',
        'operate_details.operate_detail',
        'operate_details.operate_result',
        'case_inputs.status',
        'case_inputs.operate_result_status',
        'case_inputs.reject_reason',
        'case_inputs.accident_date')
        ->orderBy('case_inputs.id')
        ->get();
        
        
        return view('officer.verifydata',compact('show_data'));

    }

    
}