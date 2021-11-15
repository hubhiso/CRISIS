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

    public function m_officer()
    {
        if(Auth::user()->position != "admin"){

            return back()->with(['message' => 'ไม่มีสิทธิ์เข้าถึง']);

        }else{

        $show_list = officer::leftJoin('officer_groups', 'officers.group', '=', 'officer_groups.code')->orderBy('officers.id')->get();
        
        $nowdate =  Carbon::now();
        $show_group = officer_group::all();
        $show_prov = province::all();

        return view('officer.manageofficer',compact('show_list','nowdate','show_group','show_prov'));
        }


    }

    public function view_log()
    {
        /*$show_list = officer::all(); */
        $show_list = log_officer::leftJoin('officer_groups', 'log_officers.group', '=', 'officer_groups.code')->orderBy('log_officers.id')->get();
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


        $active = $request->input('e_active');

        if($active == 'yes' and $o_active == 'no'){
            $ck_mailwarning = NULL;
            $ck_mailwarning_at = NULL;

            $ck_lastlogin = Carbon::now();
        }else{
            $ck_mailwarning = $o_mailwarning;
            $ck_mailwarning_at = $o_mailwarning_at;

            $ck_lastlogin = $o_last_login_at;
        }

        officer::where('username','=',$id)->update([

            'active' => $request->input('e_active'),

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