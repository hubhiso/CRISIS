<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300&display=swap" rel="stylesheet">

    <link href="{{ asset('bulma-0.8.0/css/bulma.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mystyles.css') }}" rel="stylesheet">
    <script src="{{ asset('css/jquery.min.js') }}"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" crossorigin="anonymous">

    {{ Html::script('js/jquery.min.js') }}
    <link href="{{ asset('/css/uploadicon/new3.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/nicelabel/css/jquery-nicelabel.css') }}" rel="stylesheet">

    <meta name="theme-color" content="#ab3c3c" />

    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">

    <title> ปกป้อง (CRS) </title>

</head>

<body class="has-background-light">

    <div class="hero-head ">
        <div class=" ">
            @component('component.login_bar2')
            @endcomponent
        </div>
    </div>


    <div class="container">
        <div class=" section ">

            <nav class="breadcrumb" aria-label="breadcrumbs">
                <ul>
                    <li>
                        <a href="{{ route('guest_home') }}">
                            <span class="icon is-small">
                                <i class="fas fa-home" aria-hidden="true"></i>
                            </span>
                            <span>หน้าหลัก</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('officer.main') }}">
                            <span class="icon is-small">
                                <i class="fas fa-lock" aria-hidden="true"></i>
                            </span>
                            <span>ส่วนเจ้าหน้าที่</span>
                        </a>
                    </li>
                    <li class="is-active">
                        <a href="#">
                            <span class="icon is-small">
                                <i class="fas fa-user-plus" aria-hidden="true"></i>
                            </span>
                            <span>ลงทะเบียนเจ้าหน้าที่</span>
                        </a>
                    </li>
                </ul>
            </nav>


            <div class="box column is-4 is-offset-4">
                <div class="panel-heading has-background-primary has-text-white">
                    สร้างผู้ใช้ระบบ
                </div>
                <br>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST"
                        action="{{ route('manager.register_cfm') }}">
                        {{ csrf_field() }}


                        <div class="field {{ $errors->has('username') ? ' has-error' : '' }}">
                            <label class="label" for="username">Username</label>
                            <div class="control">
                                <input id="username" type="text" class="form-control input" name="username"
                                    value="{{ old('username') }}" required autofocus>

                                @if ($errors->has('username'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="field {{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="label">ชื่อผู้ใช้งาน</label>
                            <div class="control">

                                <input id="name" type="text" class="form-control input" name="name"
                                    value="{{ old('name') }}" required>

                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="field {{ $errors->has('nameorg') ? ' has-error' : '' }}">
                            <label class="label">ชื่อหน่วยงาน</label>
                            <div class="control">

                                <input id="nameorg" type="text" class="form-control input" name="nameorg"
                                    value="{{ old('nameorg') }}" required>

                                @if ($errors->has('nameorg'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nameorg') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="field {{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="label">Email</label>
                            <div class="control">
                                <input id="email" type="email" class="form-control input" name="email"
                                    value="{{ old('email') }}"
                                    placeholder="ใช้ Email จริงและไม่ซ้ำกับที่เคยลงทะเบียนแล้ว" required>

                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                            <p id="ckemail" class="help is-success"></p>
                        </div>

                        <div class="field {{ $errors->has('tel') ? ' has-error' : '' }}">
                            <label class="label">เบอร์ติดต่อ</label>
                            <div class="control">
                                <input id="tel" type="text" class="form-control input" name="tel"
                                    value="{{ old('tel') }}" minlength="9" maxlength="10"
                                    placeholder="เบอร์ 9-10 หลักและไม่ซ้ำกับที่เคยลงทะเบียนแล้ว" required>

                                @if ($errors->has('tel'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('tel') }}</strong>
                                </span>
                                @endif
                            </div>
                            <p id="cktel" class="help is-success"></p>
                        </div>

                        <div class="field {{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="label">Password</label>
                            <div class="control">
                                <input id="password" type="password" class="form-control input" name="password"
                                    placeholder="ใช้ตัวเลขภาษาอังกฤษ หรือตัวเลข" required>

                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="field">
                            <label class="label" for="password-confirm">Confirm Password</label>
                            <div class="control">
                                <input id="password-confirm" type="password" class="form-control input"
                                    name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">ตำแหน่ง</label>
                            <div class="control">
                                <div class="select">
                                    <select id="position" name="position" onchange="swcase_x()" required>
                                        <option value="">เลือกตำแหน่ง</option>
                                        <option value="officer">เจ้าหน้าที่</option>
                                        @if( Auth::user()->position == "admin")
                                        <option value="manager">เจ้าหน้าที่ระดับจังหวัด</option>
                                        <option value="manager_area">เจ้าหน้าที่ระดับเขต</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label" for="prov"> เลือกพื้นที่ </label>
                            <div class="control">
                                <div class="select">
                                    <div id="select-pr" class="">
                                        <select style='width:200px' name="prov_id" id="prov_id">
                                            <option value="0" style="width:250px" selected>เลือกจังหวัด
                                            </option>
                                            @foreach($provinces as $province)
                                            @if ( Auth::user()->prov_id == $province->PROVINCE_CODE And
                                            Auth::user()->position == "manager")
                                            <option value="{{ $province->PROVINCE_CODE }}" style="width:250px">
                                                {{ $province->PROVINCE_NAME }}</option>
                                            @elseif( Auth::user()->position == "admin")
                                            <option value="{{ $province->PROVINCE_CODE }}" style="width:250px">
                                                {{ $province->PROVINCE_NAME }}
                                                @endif
                                                @endforeach
                                        </select>
                                    </div>
                                    <div id="select-area" class="is-hidden	">
                                        <select style='width:200px' name="area_id" id="area_id" hidden>
                                            <option value="0" style="width:250px" selected>เลือกเขต</option>
                                            <option value="1" style="width:250px">เขต 1</option>
                                            <option value="2" style="width:250px">เขต 2</option>
                                            <option value="3" style="width:250px">เขต 3</option>
                                            <option value="4" style="width:250px">เขต 4</option>
                                            <option value="5" style="width:250px">เขต 5</option>
                                            <option value="6" style="width:250px">เขต 6</option>
                                            <option value="7" style="width:250px">เขต 7</option>
                                            <option value="8" style="width:250px">เขต 8</option>
                                            <option value="9" style="width:250px">เขต 9</option>
                                            <option value="10" style="width:250px">เขต 10</option>
                                            <option value="11" style="width:250px">เขต 11</option>
                                            <option value="12" style="width:250px">เขต 12</option>
                                            <option value="13" style="width:250px">เขต 13</option>
                                        </select>
                                    </div>


                                </div>
                            </div>
                        </div>

                        <input type="hidden" id="p_view_all" name="p_view_all">
                        <input type="hidden" id="p_receive" name="p_receive">

                        <br>
                        <button type="submit" class="button is-primary">
                            สร้างผู้ใช้ระบบ
                        </button>


                    </form>
                </div>
            </div>

        </div>
    </div>

    @extends('officer.footer_m')

    <script>
    var p_id = $('#p_id').val();
    var p_po = $('#p_position').val();
    var p_ar = $('#p_area').val();

    var status_url = "{{route('officer.load_status',['prov_id' => ':p_id']) }}";
    status_url = status_url.replace(':p_id', p_id + ' ' + p_po + ' ' + p_ar);
    console.log(status_url);
    $.ajax({
        type: 'GET',
        url: status_url,
        success: function(data) {
            //console.log(data);
            $('#i-receive').text(data.NotAcp);
            $('#i-additional').text(data.NotKeyIn);
            $('#i-process').text(data.NotOp);
        }
    });
    </script>

    <script>
    $('#email').on('change', function(e) {
        // console.log(e);
        var email = e.target.value;

        if (email) {

            $.get('ajax-email/' + email, function(data) {

                if (data == 1) {
                    console.log(data);

                    $ck = "email นี้ใช้งานได้";

                    $("#ckemail").removeClass("is-danger");
                    $("#ckemail").addClass("is-success");

                    $('#ckemail').text($ck);
                } else if (data == 0) {
                    console.log(data);

                    $ck = "email นี้มีการลงทะเบียนในระบบแล้ว";

                    $("#ckemail").removeClass("is-success");
                    $("#ckemail").addClass("is-danger");

                    $('#ckemail').text($ck);
                } else if (data == 2) {
                    console.log(data);

                    $ck = "รูปแบบ email ไม่ถูกต้อง";

                    $("#ckemail").removeClass("is-success");
                    $("#ckemail").addClass("is-danger");

                    $('#ckemail').text($ck);
                }
            });
        } else {

            $ck = "";
            $('#ckemail').text($ck);
        }


    });

    $('#tel').on('change', function(e) {
        // console.log(e);
        var tel = e.target.value;

        if (tel) {

            $.get('ajax-tel/' + tel, function(data) {

                if (data == 1) {
                    console.log(data);

                    $ck = "เบอร์ติดต่อนี้ใช้งานได้";

                    $("#cktel").removeClass("is-danger");
                    $("#cktel").addClass("is-success");

                    $('#cktel').text($ck);
                } else if (data == 0) {
                    console.log(data);

                    $ck = "เบอร์ติดต่อนี้มีการลงทะเบียนในระบบแล้ว";

                    $("#cktel").removeClass("is-success");
                    $("#cktel").addClass("is-danger");

                    $('#cktel').text($ck);
                } else if (data == 2) {
                    console.log(data);

                    $ck = "ต้องใส่ตัวเลข 9 - 10 หลัก";

                    $("#cktel").removeClass("is-success");
                    $("#cktel").addClass("is-danger");

                    $('#cktel').text($ck);
                }
            });

        } else {
            $ck = "";
            $('#cktel').text($ck);
        }
    });


    function swcase_x() {
        var x = document.getElementById("position").value;

        if (x == 'officer') {
            document.getElementById("area_id").hidden = true;
            document.getElementById("prov_id").hidden = false;
            document.getElementById("area_id").value = "0";
            document.getElementById("p_view_all").value = "no";
            document.getElementById("p_receive").value = "yes";

            $("#select-area").addClass("is-hidden");
            $("#select-pr").removeClass("is-hidden");

        } else if (x == 'manager') {
            document.getElementById("area_id").hidden = true;
            document.getElementById("prov_id").hidden = false;
            document.getElementById("area_id").value = "0";
            document.getElementById("p_view_all").value = "no";
            document.getElementById("p_receive").value = "no";

            $("#select-area").addClass("is-hidden");
            $("#select-pr").removeClass("is-hidden");

        } else if (x == 'manager_area') {
            document.getElementById("prov_id").hidden = true;
            document.getElementById("area_id").hidden = false;
            document.getElementById("prov_id").value = "0";
            document.getElementById("p_view_all").value = "no";
            document.getElementById("p_receive").value = "no";

            $("#select-pr").addClass("is-hidden");
            $("#select-area").removeClass("is-hidden");

        } else {
            document.getElementById("area_id").hidden = true;
            document.getElementById("prov_id").hidden = false;
            document.getElementById("prov_id").value = "0";
            document.getElementById("area_id").value = "0";

            $("#select-area").addClass("is-hidden");
            $("#select-pr").removeClass("is-hidden");
        }
    }
    </script>

</body>

</html>