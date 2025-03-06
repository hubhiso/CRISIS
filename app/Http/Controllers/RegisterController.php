<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\case_inputRequest;
use Illuminate\Support\Facades\Validator;
use App\case_input;
use App\timeline;
use App\officer;
use App\province;
use App\amphur;
use App\casetransfer;

class RegisterController extends Controller
{
    function  load_register(){
        $provinces = province::orderBy('PROVINCE_NAME', 'asc')->get();
        $ck_officer = officer::all();
        return view('Manager.create_officer',compact('provinces','ck_officer'));
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'tel' => 'required|numeric|digits_between:9,10',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    public function ajax_amphur($prov_id) {
        $prov_code    = $prov_id;
        $new_prov_id = province::where('PROVINCE_CODE', '=', $prov_code)->first();
        $category = amphur::where('PROVINCE_ID', '=', $new_prov_id->PROVINCE_ID)->get();
        return response()->json($category);
    }

    public function ajax_email($email) {
        
        
        $regex = "/^([a-zA-Z0-9\.]+@+[a-zA-Z]+(\.)+[a-zA-Z]{2,3})$/";

        if(preg_match($regex,$email)){

            $ck_officer = officer::where('email', '=', $email)->first();

            if(!$ck_officer){
                $ck_email = 1;
            }else{
                $ck_email = 0;
            }
        }else{
            $ck_email = 2;
        }
        return response()->json($ck_email);
       
    }

    public function ajax_tel($tel) {

        $len_tel = strlen($tel);

        $regex = '/^[0-9]*$/';

        if($len_tel >= 9 and $len_tel <= 10 and preg_match($regex,$tel)){
        
            $ck_officer = officer::where('tel', '=', $tel)->first();

            if(!$ck_officer){
                $ck_tel = 1;
            }else{
                $ck_tel = 0;
            }
        }else{
            $ck_tel = 2;
        }
       
        return response()->json($ck_tel);
    }

    public function ajax_username($username) {

        $len_user = strlen($username);

        $regex = '/^[a-zA-Z0-9]*$/';

        if($len_user >= 6 and preg_match($regex,$username)){
        
            $ck_officer = officer::where('username', '=', $username)->first();

            if(!$ck_officer){
                $ck_user = 1;
            }else{
                $ck_user = 0;
            }
        }else{
            $ck_user = 2;
        }
       
        return response()->json($ck_user);
    }

    protected function create(array $data)
    {

        return officer::create([
            'active' => 'no',
            'approv' => 'no',
            'username' => $data['username'],
            'name' => $data['name'],
            'nameorg' => $data['nameorg'],
            'email' => $data['email'],
            'tel' => $data['tel'],
            'password' => bcrypt($data['password']),
            'area_id' => $data['area_id'],
            'prov_id' => $data['prov_id'],
            'position' => $data['position'],
            'p_view_all' => $data['p_view_all'],
            'p_receive' => $data['p_receive'],
            'fileupload1' => $data['fileupload1'],
            'fileupload2' => $data['fileupload2']

        ]);


    }
     function create_officer(Request $request)
    {

        $username = $request->input('username');

        $len_user = strlen($username);
        $regex = '/^[a-zA-Z0-9]*$/';

        if($len_user < 6 or !preg_match($regex,$username)){
            $_SESSION["error"] = "ลงทะเบียนไม่สำเร็จ Username อาจจะน้อยกว่า 6 ตัว หรือไม่ใช่ภาษาอังกฤษ";
            return redirect()->back()->with(['message' => 'ลงทะเบียนไม่สำเร็จ Username อาจจะน้อยกว่า 6 ตัว หรือไม่ใช่ภาษาอังกฤษ']);
        }
        
        $this->validator($request->all())->validate();
        //$this->create($request->all());

        $tel = $request->input('tel');
        $email = $request->input('email');

        $ck_username = officer::where('username', '=', $username)->first();
        $ck_officer_tel = officer::where('tel', '=', $tel)->first();
        $ck_officer_email = officer::where('email', '=', $email)->first();

        if(!$ck_username and !$ck_officer_tel and !$ck_officer_email){

            $active = "wait"; echo "<br>active : $active";
            $approv = "wait"; echo "<br>approv : $approv";

            
            officer::create([

                'active' => $active,
                'approv' => $approv,
                'username'=>$request->input('username'),
                'name'=>$request->input('name'),
                'nameorg'=>$request->input('nameorg'),
                'email'=>$request->input('email'),
                'tel'=>$request->input('tel'),
                'password'=> bcrypt($request->input('password')),
                'area_id'=>$request->input('area_id'),
                'prov_id'=>$request->input('prov_id'),
                'position'=>$request->input('position'),
                'p_view_all'=>$request->input('p_view_all'),
                'p_receive'=>$request->input('p_receive'),

                'fileupload1'=>$request->input('fileupload1'),
                'fileupload2'=>$request->input('fileupload2')


            ]);

            $pathfile = "upload_officers/".$username;
            
            $fileupload1 = "";

            if ($request->file('fileupload1') != null) {
            //$fileupload1 =  $request->file('fileupload1')->getClientOriginalName();
            $fileupload1 =  md5(time() . $request->file('fileupload1')).'.'.$request->file('fileupload1')->getClientOriginalExtension();
            $request->file('fileupload1')->move(public_path($pathfile), $fileupload1);
            }

            $fileupload2 = "";

            if ($request->file('fileupload2') != null) {
            //$fileupload2 =  $request->file('fileupload2')->getClientOriginalName();
            $fileupload2 =  md5(time() . $request->file('fileupload2')).'.'.$request->file('fileupload2')->getClientOriginalExtension();
            $request->file('fileupload2')->move(public_path($pathfile), $fileupload2);
            }



            officer::where('username','=',$username)->update([ 'fileupload1' => $fileupload1, 'fileupload2' => $fileupload2]);

            echo "createusersuccess";
            return redirect('createusersuccess');

        }else{

            if($ck_officer_email){
                echo "<br> email -> "."ซ้ำ";
            }

            if($ck_username){
                echo "<br> email -> "."ซ้ำ";
            }

            if($ck_officer_tel){
                echo "<br> email -> "."ซ้ำ";
            }

            if($ck_username){
                $_SESSION["error"] = "ลงทะเบียนไม่สำเร็จ มีการลงทะเบียน Username นี้เข้ามาในระบบก่อนหน้านี้แล้ว";
                return redirect()->back()->with(['message' => 'ลงทะเบียนไม่สำเร็จ มีการลงทะเบียน Username นี้เข้ามาในระบบก่อนหน้านี้แล้ว']);
            }else if($ck_officer_tel){

                $_SESSION["error"] = "ลงทะเบียนไม่สำเร็จ มีการลงทะเบียนเบอร์ติดต่อนี้เข้ามาในระบบก่อนหน้านี้แล้ว";
                return redirect()->back()->with(['message' => 'ลงทะเบียนไม่สำเร็จ มีการลงทะเบียนเบอร์ติดต่อนี้เข้ามาในระบบก่อนหน้านี้แล้ว']);
            }elseif($ck_officer_email){

                $_SESSION["error"] = "ลงทะเบียนไม่สำเร็จ มีการลงทะเบียน Email นี้เข้ามาในระบบก่อนหน้านี้แล้ว";
                return redirect()->back()->with(['message' => 'ลงทะเบียนไม่สำเร็จ มีการลงทะเบียน Email นี้เข้ามาในระบบก่อนหน้านี้แล้ว']);
            }else{
                $_SESSION["error"] = "ลงทะเบียนไม่สำเร็จ กรุณาตรวจสอบข้อมูลอีกครั้ง";
                return redirect()->back()->with(['message' => 'ลงทะเบียนไม่สำเร็จ กรุณาตรวจสอบข้อมูลอีกครั้ง']);
            }

        }
    }
}
