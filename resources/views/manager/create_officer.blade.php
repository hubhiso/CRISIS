<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300&display=swap" rel="stylesheet">

    <link href="{{ asset('bulma-0.9.0/css/bulma.css') }}" rel="stylesheet">
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



    @component('component.input_head') @endcomponent

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
                    <li class="is-active">
                        <a href="#">
                            <span class="icon is-small">
                                <i class="fas fa-user-plus" aria-hidden="true"></i>
                            </span>
                            <span>ลงทะเบียนผู้ใช้งาน</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <div class="level">
                <!-- Left side -->
                <div class="level-left">
                </div>

                <!-- Right side -->
                <div class="level-right">

                    <div class="control">
                        <p class=" is-danger is-medium has-text-link" id="getsuccess">&nbsp;</p>
                    </div>

                    <div class="control  ">
                        <!--p>คลิกเพื่อระบุตำแหน่งในปัจจุบัน </p-->
                        <a class="button is-link" href="{{ asset('/contents/แบบฟอร์ม_ขอสถานะผู้ใช้งานโปรแกรมCRS.pdf') }}" target="_blank">
                            <span class="icon is-left">
                                <i class="fa fa-download"></i>
                            </span>
                            <span>Download แบบฟอร์มขอรหัสผู้ใช้งาน</span>
                        </a>
                    </div>

                </div>
            </div>

            <div class="box">

                <form id="register_user" class="form-horizontal" enctype="multipart/form-data" role="form" method="POST"
                    action="{{ route('register_cfm') }}">
                    {{ csrf_field() }}

                    <div class="field is-horizontal">
                        <div class="field-label ">
                            <!-- Left empty for spacing -->
                        </div>
                    </div>
                    <label class="is-size-4 has-text-danger"><i class="fas fa-user-plus" aria-hidden="true"></i>
                        </span>ลงทะเบียนผู้ใช้งาน</label>

                    <hr>

                    <div class="columns">
                        <div class="column">
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
                        </div>
                        <div class="column">

                        </div>
                    </div>

                    <div class="columns">
                        <div class="column">
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
                        </div>
                        <div class="column">

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

                        </div>
                    </div>

                    <div class="columns">
                        <div class="column">

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

                        </div>
                        <div class="column">

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

                        </div>
                    </div>

                    <div class="columns">
                        <div class="column">

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

                        </div>
                        <div class="column">

                            <div class="field">
                                <label class="label" for="password-confirm">Confirm Password</label>
                                <div class="control">
                                    <input id="password-confirm" type="password" class="form-control input"
                                        name="password_confirmation" required>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="columns">
                        <div class="column">

                            <div class="field">
                                <label class="label">ตำแหน่ง</label>
                                <div class="control">
                                    <div class="select">
                                        <select id="position" name="position" onchange="swcase_x()" required>
                                            <option value="">เลือกตำแหน่ง</option>
                                            <option value="officer">เจ้าหน้าที่</option>
                                            <option value="manager">เจ้าหน้าที่ระดับจังหวัด</option>
                                            <option value="manager_area">เจ้าหน้าที่ระดับเขต</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="column">

                            <div class="field">
                                <label class="label" for="prov"> เลือกพื้นที่ </label>
                                <div class="control">
                                    <div class="select">
                                        <div id="select-pr" class="">
                                            <select style='width:200px' name="prov_id" id="prov_id">
                                                <option value="0" style="width:250px" selected>เลือกจังหวัด
                                                </option>
                                                @foreach($provinces as $province)

                                                <option value="{{ $province->PROVINCE_CODE }}" style="width:250px">
                                                    {{ $province->PROVINCE_NAME }}

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


                        </div>
                    </div>

                    <div class="field">
                        <label class="label"> แบบฟอร์มขอใช้งานโปรแกรม </label>
                        <div class="control">

                            <div class="file has-name is-danger is-fullwidth">
                                <label class="file-label">
                                    <input class="file-input" id="fileupload1" name="fileupload1" type="file" required>
                                    <span class="file-cta">
                                        <span class="file-icon">
                                            <i class="fas fa-upload"></i>
                                        </span>
                                        <span class="file-label input-file-trigger1">
                                            {{ trans('message.bt_upload1') }}
                                        </span>
                                    </span>
                                    <span class="file-name file-return1">
                                        {{ trans('message.bt_upload2') }}
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="field mb-5">
                        <label class="label"> สำเนาบัตรประจำตัวประชาชน </label>
                        <div class="control">

                            <div class="file has-name is-danger is-fullwidth">
                                <label class="file-label">
                                    <input class="file-input" id="fileupload2" name="fileupload2" type="file" required>
                                    <span class="file-cta">
                                        <span class="file-icon">
                                            <i class="fas fa-upload"></i>
                                        </span>
                                        <span class="file-label input-file-trigger2">
                                            {{ trans('message.bt_upload1') }}
                                        </span>
                                    </span>
                                    <span class="file-name file-return2">
                                        {{ trans('message.bt_upload2') }}
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="field mb-5">
                        <label class="label has-text-danger"> * ผู้ลงทะเบียนจำเป็นต้อง
                            ส่งเอกสารให้ครบถ้วนทั้งแบบฟอร์มขอใช้งานโปรแกรม และสำเนาบัตรประชาชน </label>
                    </div>

                    <input type="hidden" id="p_view_all" name="p_view_all">
                    <input type="hidden" id="p_receive" name="p_receive">

                    <a class="button is-danger " href="#" id="lanuchModal" onClick="confirm_modal()">&nbsp;ลงทะเบียน</i>
                    </a>


                </form>

            </div>


        </div>
    </div>

    @extends('officer.footer_m')

    <div id="confirm_modal" class="modal">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title has-text-danger">ยืนยันการลงทะเบียน</p>
                <button class="delete" aria-label="close"></button>
            </header>
            <section class="modal-card-body">
                <label for="">ต้องการยืนยันการลงทะเบียนเจ้าหน้าผู้ใช้งานระบบ</label>
            </section>
            <footer class="modal-card-foot">
                <button type="submit" form="register_user"  class="button is-danger">ยืนยันการลงทะเบียน</button>
                <button class="button">ยกลิก</button>
            </footer>
        </div>
    </div>

    <script src="{{ asset('bulma/clipboard-1.7.1.min.js') }}"></script>
    <script src="{{ asset('bulma/main.js') }}"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/v/bm/jq-3.6.0/dt-1.11.3/datatables.min.js">
    </script>


    <script>
    document.querySelector("html").classList.add('js');

    var fileInput1 = document.getElementById("fileupload1"),
        fileInput2 = document.getElementById("fileupload2"),
        button1 = document.querySelector(".input-file-trigger1"),
        button2 = document.querySelector(".input-file-trigger2"),
        the_return1 = document.querySelector(".file-return1");
    the_return2 = document.querySelector(".file-return2");

    button1.addEventListener("keydown", function(event) {
        if (event.keyCode == 13 || event.keyCode == 32) {
            fileInput1.focus();
        }
    });
    button2.addEventListener("keydown", function(event) {
        if (event.keyCode == 13 || event.keyCode == 32) {
            fileInput2.focus();
        }
    });
    button1.addEventListener("click", function(event) {
        fileInput1.focus();
        return false;
    });
    button2.addEventListener("click", function(event) {
        fileInput2.focus();
        return false;
    });
    fileInput1.addEventListener("change", function(event) {
        the_return1.innerHTML = this.files[0].name;
    });
    fileInput2.addEventListener("change", function(event) {
        the_return2.innerHTML = this.files[0].name;
    });

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

    <script>
    function confirm_modal() {
        $("#confirm_modal").addClass("is-active");
    }

    $(".noti-close").click(function() {
        $(".modal").removeClass("is-active");
    });

    $(".modal-close").click(function() {});

    $(".closebtn").click(function() {
        $(".modal").removeClass("is-active");
    });

    $(".closetop").click(function() {
        $(".modal").removeClass("is-active");
    });
    </script>



</body>

</html>