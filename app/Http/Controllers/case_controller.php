<?php

namespace App\Http\Controllers;
//use Illuminate\Http\Request;
use App\Http\Requests\case_inputRequest;
use Illuminate\Support\Str;
use App\province;
use App\amphur;
use App\case_input;
use App\timeline;
use Request;
use Auth;


class case_controller extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

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
        return view('input',compact('provinces','amphurs','new_id'));    }

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
        //$input = Request::all();
        //case_input::create($request->all());
        
        $YearAct = $request->input('year_hidden');

        $accident_date = $YearAct."-".$request->input('MonthAct')."-".$request->input('DayAct');

        if ($accident_date == "1970-01-01"){
            $accident_date = date('Y-m-d');
        }
        
        if ($request->input('biosex') == 1) {
            $biosex_name = 'ชาย';
        }else if ($request->input('biosex') == 2) {
            $biosex_name = 'หญิง';
        }else if ($request->input('biosex') == 0) {
            $biosex_name = 'ไม่ประสงค์ตอบ';
        }    

        if($request->input('sender_case')==""){
            $sender_case = 1;
        }elseif($request->input('sender_case')== 1){
            $sender_case = 1;
        }elseif($request->input('sender_case')== 2){
            $sender_case = 2;
        }elseif($request->input('sender_case')== 3 ){
            $sender_case = 3;
        }

        $activecase = "yes";
        
        case_input::create([
            'activecase'=> $activecase,
            'emergency'=>$request->input('emergency'),
            'sender_case'=>$sender_case,
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

            'file1'=>$request->input('file1'),
            'file2'=>$request->input('file2'),
            'file3'=>$request->input('file3'),

            'evaluate1'=>$request->input('eva1'),
            'evaluate2'=>$request->input('eva2'),
            'evaluate3'=>$request->input('eva3'),
            'evaluate_comment'=>$request->input('eva_comment'),

            'accident_date'=>$accident_date

        ]);

        $case_id = Request::input('case_id');
        $emergency = Request::input('emergency');
        $prov_id = Request::input('prov_id');
        $provname = province::where('PROVINCE_CODE', $prov_id)->first();
        $problem_case = Request::input('problem_case');
        $problem_case_names = case_input::leftJoin('r_problem_case AS f', 'case_inputs.problem_case', '=', 'f.code')->where('f.code','=', $problem_case )->select('f.name as fname')->first();

        foreach ($problem_case_names as $problem_case_name) {

            $problem_case_names_ss =  $problem_case_names->fname;

        }

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

        case_input::where('case_id','=',$case_id)->update([ 'status' => 1, 'file1' => $file1, 'file2' => $file2, 'file3' => $file3]);

        timeline::create(['case_id'=>$case_id,
            'operate_status'=>1,
            'operate_time'=> date("Y-m-d")
        ]);

        return view('layout.gen_caseid',compact('case_id','emergency','prov_id','provname','problem_case_names_ss'));

    //return redirect('/');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($case_id)
    {
        //
        //var_dump($case_id);
        try {
            // Validate the value...
            $case = case_input::where('case_id','=',$case_id)->orWhere('victim_tel','=',$case_id)->first();
            //$id = $case->case_id;
            if ($case != null) {
                $id = $case->case_id;
                $data = timeline::where('case_id','=',$id)->orderBy('operate_status', 'asc')->get();
                $html = view('layout._status', compact('data'))->render();
                return response()->json(compact('html'));
            }else{
                 $html = view('layout._statusError')->render();
                 return response()->json(compact('html'));
            }
        } catch (Exception $e) {
           // $html = view('layout._statusError')->render();
           // return response()->json(compact('html'));
        }

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

    }
    public function up_evaluate(Request $request){
        $case_id = Request::input('case_id');
        $eval_1 =  Request::input('eval_1');
        $eval_2 = Request::input('eval_2');
        case_input::where('case_id','=',$case_id)->update([
            'evaluate1'=>$eval_1,
            'evaluate2'=>$eval_2
        ]);
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
