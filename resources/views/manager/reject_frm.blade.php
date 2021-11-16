<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" class="route-index">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> ปกป้อง (CRS) </title>
    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300&display=swap" rel="stylesheet">

    <link href="{{ asset('bulma-0.8.0/css/bulma.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mystyles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome5.0.6/css/fontawesome-all.css') }}" rel="stylesheet">

    {{ Html::script('js/jquery.min.js') }}
    <meta name="theme-color" content="#ab3c3c" />

    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">


</head>

<body class="has-background-light">

    <div class="hero-head ">
        <div class=" ">
            @component('component.login_bar2')
            @endcomponent
        </div>
    </div>

    <div class="hero is-medium has-text-centered">

        <br>
        <form class="form-horizontal" role="form" method="POST" action="{{ route('manager.reject_cfm') }}">
            
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
            
            <div class="container">
                <nav class="breadcrumb" aria-label="breadcrumbs">
                    <ul>
                        <li>
                            <a href="{{ route('guest_home') }}">
                                <span class="icon is-small">
                                    <i class="fas fa-home" aria-hidden="true"></i>
                                </span>
                                <span>หน้าแรก</span>
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
                                    <i class="fa fa-address-card" aria-hidden="true"></i>
                                </span>
                                <span>ข้อมูลเบื้องต้น</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

            <h1 id="title" class="is-size-4 mb-3"> ปฏิเสธการรับเรื่อง </h1>
            <div class="container p-3 content">
                <div class="box p-3">
                    <!--This container is <strong>centered</strong> on desktop. -->
                    <div class="field is-horizontal">
                        <div class="field-label">
                            <!-- Left empty for spacing -->
                        </div>
                    </div>

                    <div class="field is-horizontal">
                        <div class="field-label is-normal">
                            <label class="label">ผู้ถูกกระทำ</label>
                        </div>
                        <div class="field-body">
                            <div class="field is-grouped">
                                <p class="control is-expanded has-icons-left ">
                                    <input class="input" type="text" value="{{ $show_data->name }}" disabled>
                                    <span class="icon is-small is-left"> <i class="fa fa-user"></i> </span>
                                </p>
                            </div>
                            <div class="field-label is-normal">
                                <label class="label">ID-Code</label>
                            </div>
                            <div class="field">
                                <p class="control is-expanded has-icons-left has-icons-right">
                                    <input class="input" type="text" value="{{ $show_data->case_id }}" disabled>
                                    {!! Form::text('case_id',$show_data->case_id,['class'=>'text', 'hidden']) !!}

                            </div>
                        </div>
                    </div>


                    <div class="field is-horizontal">
                        <div class="field-label is-normal">
                            <label class="label">พื้นที่ จังหวัด</label>
                        </div>
                        <div class="field-body">
                            <div class="field is-grouped">
                                <p class="control is-expanded has-icons-left ">
                                    <input class="input" type="text" placeholder="ชื่อผู้แจ้ง"
                                        value="{{ $show_data->Provinces->PROVINCE_NAME }}" disabled>
                                </p>
                            </div>
                            <div class="field-label is-normal">
                                <label class="label">อำเภอ</label>
                            </div>
                            <div class="field">
                                <p class="control is-expanded has-icons-left has-icons-right">
                                    <input class="input" type="email" placeholder="ID-CODE"
                                        value="{{ $show_data->Amphurs->AMPHUR_NAME }}" disabled>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="field is-horizontal">
                        <div class="field-label is-normal">
                            <label class="label"> ระบุเหตุผลที่ปฏิเสธไม่รับเรื่อง </label>
                        </div>
                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    {{ Form::textarea('reason', null, ['size' => '100x10']) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="field is-horizontal">
                        <div class="field-label">
                            <!-- Left empty for spacing -->
                        </div>
                    </div>
                </div>
                <div class="field is-grouped">
                    <p><a> </a>
                    </p>
                    {!! Form::submit('ยืนยัน',['class'=>'button is-primary']) !!}
                    &nbsp;&nbsp;

                    <p class="control"> <a class="button" href="{{ route('officer.open_dt', $show_data->case_id) }}">
                            กลับ </a> </p>
                </div>
            </div>
        </form>
    </div>

    <br>

    @extends('officer.footer_m')

    <script src="{{ asset('bulma/clipboard-1.7.1.min.js') }}"></script>
    <script src="{{ asset('bulma/main.js') }}"></script>
    {{--<script src="{{ asset('js/prov_list.js') }}"></script>--}}

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

</body>

</html>