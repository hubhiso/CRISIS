@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password Successfully</div>

                <div class="panel-body">
                    Back to login page!  
                    &nbsp;&nbsp;&nbsp;

                    <a class="button color1 button_addshadow"
                        href="{{ route('officer.login') }}">
                        Login!
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>
@endsection
