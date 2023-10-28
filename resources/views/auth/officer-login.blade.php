@extends('layouts.app')

@section('content')
<div class="container mb-5">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">เข้าใช้ระบบ Crisis Response System </div>
                <div class="panel-body">

                @if(\Session::has('message'))
                <div class="notification is-danger">
                    <button class="delete noti-close " onclick="this.parentElement.style.display='none'"></button>
                    <strong>{{ \Session::get('message') }}</strong>
                </div>
                @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('officer.login.submit') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Username</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="button is-danger">
                                    Login
                                </button>

                                <a class="button is-info" href="{{ route('officer.password.request') }}">
                                    ลืมหรัสผ่าน
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <a class="button is-danger" href="{{ route('register') }}"> <i class="fas fa-user-plus">&nbsp;</i> {{ trans('message.tx_user_regis') }} </a>
        </div>
    </div>
</div>
@endsection
