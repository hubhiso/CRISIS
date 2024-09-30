<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\officer;
use Carbon\Carbon;
use Mail;
use App\log_officer;
use App\officer_group;
use App\province;
use Auth;

class ManageofficerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:officer');
    }

    public function m_officer(Request $request)
    {
        if(Auth::user()->position != "admin" and Auth::user()->position != "manager"){

            return back()->with(['message' => 'ไม่มีสิทธิ์เข้าถึง']);

        }else{

            if(Auth::user()->position == "manager"){
                $prov_id_se = Auth::user()->prov_id;
            }else if(Auth::user()->position == "manager_area"){
                $nhso_se = Auth::user()->area_id;
            }else{
                $nhso_se = $request->input('nhso');
                $prov_id_se = $request->input('prov_id');
            }

            if($nhso_se == "" || $nhso_se == "0"){

                if($prov_id_se == "" || $prov_id_se == "0"){
                    $show_list = officer::leftJoin('officer_groups', 'officers.group', '=', 'officer_groups.code')->orderBy('officers.id')->get();
                }else{
                    $show_list = officer::leftJoin('officer_groups', 'officers.group', '=', 'officer_groups.code')->where('prov_id','=',$prov_id_se)->orderBy('officers.id')->get();
                }
            }else{

                if($prov_id_se == "" || $prov_id_se == "0"){
                    $show_list = officer::leftJoin('officer_groups', 'officers.group', '=', 'officer_groups.code')->join('prov_geo', 'prov_id', '=', 'prov_geo.code')->where('prov_geo.nhso','=',$nhso_se)->orderBy('officers.id')->get();
                }else{
                    $show_list = officer::leftJoin('officer_groups', 'officers.group', '=', 'officer_groups.code')->where('prov_id','=',$prov_id_se)->orderBy('officers.id')->get();
                }

            }
            
            /*
            if($prov_id_se == "" || $prov_id_se == "0"){
                $show_list = officer::leftJoin('officer_groups', 'officers.group', '=', 'officer_groups.code')->orderBy('officers.id')->get();
            }else{
                $show_list = officer::leftJoin('officer_groups', 'officers.group', '=', 'officer_groups.code')->where('prov_id','=',$prov_id_se)->orderBy('officers.id')->get();
                }*/

            $nowdate =  Carbon::now();
            $show_group = officer_group::all();
            //$show_prov = province::orderBy('PROVINCE_NAME')->get();
            $show_prov = province::join('prov_geo', 'PROVINCE_CODE', '=', 'prov_geo.code')->orderBy('PROVINCE_NAME', 'asc')->get();

            return view('officer.manageofficer',compact('show_list','nowdate','show_group','show_prov','prov_id_se','nhso_se'));
        }


    }

    public function view_officer(Request $request)
    {
       

        $prov_id_se = Auth::user()->prov_id;
      
            
        if($prov_id_se == "" || $prov_id_se == "0"){
            $show_list = officer::leftJoin('officer_groups', 'officers.group', '=', 'officer_groups.code')->orderBy('officers.id')->get();
        }else{
            $show_list = officer::leftJoin('officer_groups', 'officers.group', '=', 'officer_groups.code')->where('prov_id','=',$prov_id_se)->orderBy('officers.id')->get();
        }

        $nowdate =  Carbon::now();
        $show_group = officer_group::all();
        $show_prov = province::orderBy('PROVINCE_NAME')->get();

        return view('officer.viewofficer',compact('show_list','nowdate','show_group','show_prov','prov_id_se'));
        


    }

    public function view_log()
    {
        if(Auth::user()->position == "manager"){
            $prov_id_se = Auth::user()->prov_id;

            $show_list = log_officer::leftJoin('officer_groups', 'log_officers.group', '=', 'officer_groups.code')->select('log_officers.created_at as timesat', 'log_officers.*')->where('prov_id','=',$prov_id_se)->orderBy('log_officers.id')->get();
        }else{
            $show_list = log_officer::leftJoin('officer_groups', 'log_officers.group', '=', 'officer_groups.code')->select('log_officers.created_at as timesat', 'log_officers.*')->orderBy('log_officers.id')->get();
        }
        /*$show_list = officer::all(); */
       
        $nowdate =  Carbon::now();
        $show_group = officer_group::all();

        $show_prov = province::all();

        return view('officer.viewlog',compact('show_list','nowdate','show_group','show_prov'));
    }

    public function create()
    {

        $message = "noppon.kumpdetch@gmail.com";

        return view('officer.email',compact('message'));
    }

    public function sendEmail(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'subject' => 'required',
            'content' => 'required',
        ]);


        $data = [
          'subject' => $request->subject,
          'email' => $request->email,
          'content' => $request->content
        ];

        Mail::send('officer.email-template', $data, function($message) use ($data) {
          $message->to($data['email'])
          ->subject($data['subject']);
        });

        return back()->with(['message' => 'ส่ง Email แจ้งเจ้าหน้าที่เรียบร้อย']);
    }

    public function update(Request $request,$id)
    {

        $officer_prev = officer::where('username','=',$id)->get();

        foreach($officer_prev as $off_prev)
        {
           $o_active = $off_prev->active;
           $o_approv = $off_prev->approv;
           $o_name = $off_prev->name;
           $o_nameorg = $off_prev->nameorg;
           $o_tel = $off_prev->tel;
           $o_email = $off_prev->email;
           $o_area = $off_prev->area_id;
           $o_prov = $off_prev->prov_id;
           $o_position = $off_prev->position;
           $o_group = $off_prev->group;
           $o_g_view_all = $off_prev->g_view_all;
           $o_p_view_all = $off_prev->p_view_all;
           $o_p_receive = $off_prev->p_receive;

           $o_mailwarning = $off_prev->mailwarning;
           $o_mailwarning_at = $off_prev->mailwarning_at;

           $o_last_login_at = $off_prev->last_login_at;
        }

        log_officer::create([
            'active'=>$o_active,
            'username'=>$id,
            'name'=>$o_name,
            'nameorg'=>$o_nameorg,
            'tel'=>$o_tel,
            'email'=>$o_email,
            'area_id'=>$o_area,
            'prov_id'=>$o_prov,
            'position'=>$o_position,
            'group'=>$o_group,
            'g_view_all'=>$o_g_view_all,
            'p_view_all'=>$o_p_view_all,
            'p_receive'=>$o_p_receive
        ]);


        $approv = $request->input('e_approv');

        $active = "";

        if($request->input('e_active') == 'Active'){
            $active = "yes";
        }else if($request->input('e_active') == 'Waiting'){
            $active = "wait";
        }else if($request->input('e_active') == 'Inactive'){
            $active = "no";
        }


        if($active == 'yes' and ($o_active == 'no' or $o_active == 'wait')){
            $ck_mailwarning = NULL;
            $ck_mailwarning_at = NULL;

            $ck_lastlogin = Carbon::now();

            if($o_approv != 'yes'){
                $ck_approv = "yes";

                officer::where('username','=',$id)->update(['approv' => 'yes']);
                
            }else{
                $ck_approv = "";
            }
            
        }else{
            $ck_mailwarning = $o_mailwarning;
            $ck_mailwarning_at = $o_mailwarning_at;

            $ck_lastlogin = $o_last_login_at;
            
            $ck_approv = "";
            
        }

        officer::where('username','=',$id)->update([

            'active' => $active,

            'mailwarning' => $ck_mailwarning,
            'mailwarning_at' => $ck_mailwarning_at,

            'name' => $request->input('e_name'),
            'nameorg' => $request->input('e_nameorg'),
            'tel' => $request->input('e_tel'),
            'email' => $request->input('e_email'),

            'area_id' => $request->input('e_area'),
            'prov_id' => $request->input('e_prov'),

            'group' => $request->input('e_group'),
            'g_view_all' => $request->input('e_v_group'),

            'last_login_at' => $ck_lastlogin,

            'p_view_all' => $request->input('e_viewall'),
            'p_receive' => $request->input('e_receiver') 
        
        ]);

        if($request->input('e_position') == "admin"){
            $ck_new_position = "admin";
        }else  if($request->input('e_position') == "ผู้ดูแลระดับเขต"){
            $ck_new_position = "manager_area";
        }else  if($request->input('e_position') == "ผู้ดูแลระดับจังหวัด"){
            $ck_new_position = "manager";
        }else  if($request->input('e_position') == "เจ้าหน้าที่"){
            $ck_new_position = "officer";
        }

        if($o_position != $ck_new_position){

            if($ck_new_position == "admin"){
                officer::where('username','=',$id)->update([
                    'area_id' => NULL,
                    'prov_id' => NULL,
                    'position' => "admin"
                ]);
            }else  if($ck_new_position == "manager_area"){
                officer::where('username','=',$id)->update([
                    'area_id' => $request->input('e_area'),
                    'prov_id' => NULL,
                    'position' => "manager_area"
                ]);
            }else  if($ck_new_position == "manager"){
                officer::where('username','=',$id)->update([
                    'area_id' => NULL,
                    'prov_id' => $request->input('e_prov'),
                    'position' => "manager"
                ]);
            }else  if($ck_new_position == "officer"){
                officer::where('username','=',$id)->update([
                    'area_id' => NULL,
                    'prov_id' => $request->input('e_prov'),
                    'position' => "officer"
                ]);
            }

        }

        if($active == 'yes'){
            officer::where('username','=',$id)->update([
                'approv' => 'yes'
            ]);
        }

        if($approv == 'no'){
            officer::where('username','=',$id)->update([
                'approv' => 'no',
                'active' => 'no'
            ]);
        }

        if($approv == 'wait'){
            officer::where('username','=',$id)->update([
                'approv' => 'wait',
                'active' => 'wait'
            ]);
        }

        if($ck_approv == "yes"){
            $img_url = "https://crs.ddc.moph.go.th/crisistest2021/public/images/seo.png";

            $data = [
            'subject' => $request->subject,
            'email' => $request->email,
            'content' => $request->content,
            'url_img' => $img_url
            ];


            Mail::send('officer.email-template2', $data , function($message) use ($data) {
            $message->to($data['email'])->subject($data['subject']);
            });
        }

        echo "<br>อัพเดตรายละเอียดเจ้าหน้าที่เรียบร้อย";

        return back()->with('success','อัพเดตรายละเอียดเจ้าหน้าที่เรียบร้อย');

    }

    public function store(Request $request)
    {
        
        officer_group::create([
            'code'=>$request->input('gcode'),
            'groupname'=>$request->input('gname')
        ]);

        return back()->with('success','สร้างกลุ่มเจ้าหน้าที่ใหม่เรียบร้อย');

    }
}