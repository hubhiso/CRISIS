<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\officer;
use Carbon\Carbon;


class OfficerLoginController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('guest:officer' , ['except' => ['logout']]);
    }

    public function ShowLoginForm()
    {
        return view('auth.officer-login');
    }

    public function login(Request $request)
    {

        $this->validate($request, [
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        /*
        

        if( Auth::guard('officer')->attempt(['username' => $request->username , 'password' => $request->password , 'active' => 'no']))
        {
            Auth::guard('officer')->logout();
            return redirect()->back()->with(['message' => 'ID นี้ถูกระงับชั่วคราวจากการที่ไม่ได้ login เป็นเวลานาน โปรดแจ้งผู้ดูแลเพื่อเข้าใช้งาน']);
        }else{

            if( Auth::guard('officer')->attempt(['username' => $request->username , 'password' => $request->password ]
           , $request->remember)){

            officer::where('username','=', $request->username)->update(['last_login_at' => Carbon::now()]);
            return redirect()->intended(route('officer.main'));
        }

        }*/


        if( Auth::guard('officer')->attempt(['username' => $request->username , 'password' => $request->password , 'active' => 'wait' , 'approv' => 'wait'])  ){

            Auth::guard('officer')->logout();
            return redirect()->back()->with(['status'=> 'warning', 'message' => 'Username นี้กำลังรอการอนุมัติจากผู้ดูแลระบบ']);

        }else if( Auth::guard('officer')->attempt(['username' => $request->username , 'password' => $request->password , 'active' => 'no', 'approv' => 'no']) ){

            Auth::guard('officer')->logout();
            return redirect()->back()->with(['status'=> 'danger', 'message' => 'Username นี้ถูกปิดการใช้งานบัญชีผู้ใช้ โปรดแจ้งผู้ดูแลระบบหากต้องการเข้าใช้งาน']);

        }else if(Auth::guard('officer')->attempt(['username' => $request->username , 'password' => $request->password ] , $request->remember)){

            officer::where('username','=', $request->username)->update(['last_login_at' => Carbon::now()]);


            return redirect()->intended(route('officer.main'))->with(['login_eva'=> 'yes']);

        }else{

            Auth::guard('officer')->logout();
            return redirect()->back()->with(['status'=> 'danger', 'message' => 'Username หรือ Password ไม่ถูกต้อง']);

        }



       return redirect()->back()->withInput($request->only('username','remember'));
    }

    public  function  logout()
    {

        Auth::guard('officer')->logout();

        return redirect('officer');
    }
}