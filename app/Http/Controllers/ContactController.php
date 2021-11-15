<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\countdownload;
use Exception;


class ContactController extends Controller

{

    public function __construct()
    {
        $this->middleware('auth:officer');
    }

    public function contact()
    {
        return view('officer.contact');
    }
    

    public function getIndex(){
        header('content-type:text/html; charset=utf-8');
        $countdownload = countdownload::get();
        
        return $countdownload ? 'Model countdownload Connect Yes!' : 'Error! Model countdownload Connect False!!!';
    }

    public function update_count(Request $request)
    {
        
        $id = $request->input('id');
        countdownload::where('id_name','=',$id)->increment('count', 1);
       
    }

    public function guide_t()
    {
        //$show_count = countdownload::where('id_name','=','101')->first();

        $show_count = countdownload::all(); 
        
        return view('officer.guide',compact('show_count'));
    }



}

