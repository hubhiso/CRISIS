<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\officer;
use Carbon\Carbon;

class EmailController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:officer');
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


        $img_url = "https://crs.ddc.moph.go.th/crisistest2021/public/images/seo.png";

        $data = [
          'subject' => $request->subject,
          'email' => $request->email,
          'content' => $request->content,
          'url_img' => $img_url
        ];


        Mail::send('officer.email-template', $data , function($message) use ($data) {
          $message->to($data['email'])
          ->subject($data['subject']);
        });

        officer::where('username','=',$request->mailusername_id)->update([
            'mailwarning' => "yes",
            'mailwarning_at' => Carbon::now()
        ]);

        return back()->with(['message' => 'Email successfully sent!']);
    }
}
