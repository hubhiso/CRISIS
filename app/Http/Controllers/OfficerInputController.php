<?php

namespace App\Http\Controllers;
//use Illuminate\Http\Request;
use App\Http\Requests\case_inputRequest;
use App\operate_detail;
use Illuminate\Support\HtmlString;

use Illuminate\Support\Str;
use App\province;
use App\amphur;
use App\case_input;
use App\add_detail;
use App\timeline;
use Request;
use Auth;


class OfficerInputController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function __construct()
    {
        $this->middleware('auth:officer');
    }
    public function ajax_amphur($prov_id) {
        $prov_code    = $prov_id;
        $new_prov_id = province::where('PROVINCE_CODE', '=', $prov_code)->first();
        $category = amphur::where('PROVINCE_ID', '=', $new_prov_id->PROVINCE_ID)->get();
        return response()->json($category);
    }
    public function gen_id(){
        do {
            $ran_al = str_random(2);
            $ran_num = STR::lower($ran_al).mt_rand(100,999);
            $new_id = $ran_num;
            //$token_key = makeRandomTokenKey();
        } while (case_input::where("case_id", "=", $new_id)->first() instanceof case_input);
        return $new_id;
    }
    public function index()
    {
        //

        //$caseinputs = new case_input();
        $provinces = province::orderBy('PROVINCE_NAME', 'asc')->get();
        $amphurs= amphur::where('PROVINCE_ID', '=', 1)->get();
        $new_id = $this->gen_id();
        return view('officer.input_case',compact('provinces','amphurs', 'new_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(case_inputRequest $request)
    {
        //

        //case_input::create($request->all());
        
        $accident_date = date('Y-m-d',strtotime(str_replace('-','/', $request->input('DateAct'))));
        
        if ($request->input('biosex') == 1) {
            $biosex_name = 'ชาย';
        }else if ($request->input('biosex') == 2) {
            $biosex_name = 'หญิง';
        }else if ($request->input('biosex') == 0) {
            $biosex_name = 'ไม่ประสงค์ตอบ';
        }    

        case_input::create([
            'emergency'=>$request->input('emergency'),
            'sender_case'=>$request->input('sender_case'),
            'sender'=>$request->input('sender'),
            'agent_tel'=>$request->input('agent_tel'),

            'case_id'=>$request->input('case_id'),
            'name'=>$request->input('name'),
            'victim_tel'=>$request->input('victim_tel'),

            'sex'=>$request->input('biosex'),
            'sex_name'=>$biosex_name,
            'biosex'=>$request->input('biosex'),
            'biosex_name'=>$biosex_name,

            'nation'=>$request->input('nation'),
            'nation_etc'=>$request->input('nation_etc'),

            'prov_id'=>$request->input('prov_id'),
            'amphur_id'=>$request->input('amphur_id'),
            'geolat'=>$request->input('geolat'),
            'geolon'=>$request->input('geolon'),
            'problem_case'=>$request->input('problem_case'),
            'sub_problem'=>$request->input('sub_problem'),
            'group_code'=>$request->input('group_code'),
            'detail'=>$request->input('detail'),
            'need'=>$request->input('need'),
            'group_code'=>$request->input('group_code'),
            'group_code'=>$request->input('group_code'),

            'file1'=>$request->input('file1'),
            'file2'=>$request->input('file2'),
            'file3'=>$request->input('file3'),
            
            'accident_date'=>$accident_date

        ]);

        $case_id = Request::input('case_id');
        $emergency = Request::input('emergency');
        $prov_id = Request::input('prov_id');
        $provname = province::where('PROVINCE_CODE', $prov_id)->first();

        $pathfile = "uploads/".$case_id;
        $file1 = "";

        if ($request->file('file1') != null) {
           $file1 =  md5(time() . $request->file('file1')).'.'.$request->file('file1')->getClientOriginalExtension();
           $request->file('file1')->move(public_path($pathfile), $file1);
        }

        $file2 = "";

        if ($request->file('file2') != null) {
           $file2 =  md5(time() . $request->file('file2')).'.'.$request->file('file2')->getClientOriginalExtension();
           $request->file('file2')->move(public_path($pathfile), $file2);
        }

        $file3 = "";

        if ($request->file('file3') != null) {
           $file3 =  md5(time() . $request->file('file3')).'.'.$request->file('file3')->getClientOriginalExtension();
           $request->file('file3')->move(public_path($pathfile), $file3);
        }

        if($request->input('sw_acceptorder') == '1'){
            case_input::where('case_id','=',$case_id)->update([ 'status' => 2, 'receiver_id' => $request->input('id_sender'), 'receiver' => $request->input('sender'), 'file1' => $file1, 'file2' => $file2, 'file3' => $file3]);
            timeline::create(['case_id'=>$case_id,
                'operate_status'=>1,
                'operate_time'=> date("Y-m-d")
            ]);
            timeline::create(['case_id'=>$case_id,
                'operate_status'=>2,
                'operate_time'=> date("Y-m-d")
            ]);
        }else{

            case_input::where('case_id','=',$case_id)->update([ 'status' => 1, 'file1' => $file1, 'file2' => $file2, 'file3' => $file3]);
        
            timeline::create(['case_id'=>$case_id,
                'operate_status'=>1,
                'operate_time'=> date("Y-m-d")
            ]);

        }

        $accident_date = date('Y-m-d',strtotime(str_replace('-','/', $request->input('DateAct'))));
        if ($accident_date == "1970-01-01"){
            $accident_date = date('Y-m-d');
        }
        
        

        return view('layout.gen_caseid',compact('case_id','emergency','prov_id','provname'));

        

    //return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($mode_id)
    {
        //  $cases = case_input::all();
        //  return view('officer.OfficerManageCase',compact('cases'));
        //  return View::make('officer.OfficerManageCase', $mode_id);
        //  return view('officer.OfficerManageCase')->withMode($mode_id);
        $provinces = province::orderBy('PROVINCE_NAME', 'asc')->get();

        return view('officer.OfficerManageCase',compact('mode_id', 'provinces'));
    }

    public function open_confirm($case_id)
    {
        $show_data = case_input::where('case_id','=',$case_id)->first();
         return view('officer.detail1',compact('show_data'));
    }
    public function open_detail($case_id)
    {
        $show_data = case_input::where('case_id','=',$case_id)->first();
        $timelines = timeline::where('case_id','=',$case_id)->get();
        return view('officer.view_only',compact('show_data','timelines'));
    }
    public function add_detail($case_id)
    {
        $show_data = case_input::where('case_id','=',$case_id)->first();
        

        return view('officer.detail2',compact('show_data'));
    }

    public function edit_detail2($case_id)
    {
        $show_data = case_input::where('case_id','=',$case_id)->first();
        $show_detail = add_detail::where('case_id','=',$case_id)->first();
        return view('officer.edit_detail2',compact('show_data', 'show_detail'));
    }

    public function view_detail2($case_id)
    {
        $show_data = case_input::where('case_id','=',$case_id)->first();
        $show_detail = add_detail::where('case_id','=',$case_id)->first();

        return view('officer.viewdetail2',compact('show_data', 'show_detail'));
    }

    public function view_activities($case_id)
    {
        $show_data = case_input::where('case_id','=',$case_id)->first();
        $show_timeline = timeline::where('case_id',$case_id)->where('operate_status',2)->first();
        $activities = operate_detail::where('case_id','=',$case_id)->orderBy('operate_date', 'asc')->get();
        $operate_datas = operate_detail::where('case_id','=',$case_id)->get();
        $provinces = province::all();
        
        return view('officer.viewactivities',compact('show_data', 'show_timeline', 'activities', 'operate_datas', 'provinces'));
    }

    public function add_activities($case_id)
    {
        $show_data = case_input::where('case_id','=',$case_id)->first();
        $provinces = province::all();
        return view('officer.activities',compact('show_data', 'provinces'));
    }
    public function edit_operate($operate_id)
    {
        $operate_datas = operate_detail::where('id','=',$operate_id)->get();
        $html = view('officer._edit_operate',compact('operate_datas'))->render();
        return response()->json(compact('html'));
    }

    public function view_operate($operate_id)
    {
        $operate_datas = operate_detail::where('id','=',$operate_id)->get();
        $html = view('officer._view_operate',compact('operate_datas'))->render();
        return response()->json(compact('html'));
    }


    public function load_activities_table($case_id)
    {
        $activities = operate_detail::where('case_id','=',$case_id)->orderBy('operate_date', 'asc')->get();
        $html = view('officer._activities_table',compact('activities'))->render();
        return response()->json(compact('html'));
    }
    public function load_status($data)
    {
//        $cases = case_input::select(array(
//            case_input::raw("SUM (status) as s1"),
//            case_input::raw("SUM (status) as s2"),))
//            ->where('prov_id', '=', $pid);
        $pid = Str::substr($data, 0, 2);
        $pposition = trim(Str::substr($data, 2,-2));
        $parea = trim(Str::substr($data, -2));

        if($pposition == 'adm'){ $pposition = 'admin'; }

        if($pid == 0 && $pposition  == "admin"){
            $NotAcp = case_input::Where('status', '=', '1')->count('status');
            $NotKeyIn = case_input::Where('status', '=', '2')->count('status');
            $NotOp = case_input::Where('status', '=', '3')->count('status');
        }else if($pid == 0 && $pposition  == "manager_area"){
            $NotAcp = case_input::join('prov_geo', 'prov_id', '=', 'prov_geo.code')->where([['prov_geo.nhso', '=', $parea],['status', '=', '1']])->count('status');
            $NotKeyIn = case_input::join('prov_geo', 'prov_id', '=', 'prov_geo.code')->where([['prov_geo.nhso', '=', $parea],['status', '=', '2']])->count('status');
            $NotOp = case_input::join('prov_geo', 'prov_id', '=', 'prov_geo.code')->where([['prov_geo.nhso', '=', $parea],['status', '=', '3']])->count('status');
        }else{
            $NotAcp = case_input::Where('prov_id','=',$pid)->where('status', '=', '1')->count('status');
            $NotKeyIn = case_input::Where('prov_id','=',$pid)->where('status', '=', '2')->count('status');
            $NotOp = case_input::Where('prov_id','=',$pid)->where('status', '=', '3')->count('status');
        }

        return response()->json(compact('NotAcp','NotKeyIn','NotOp'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}
