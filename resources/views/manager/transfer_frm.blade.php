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

    <link href="{{ asset('css/font-awesome5.0.6/css/fontawesome-all.css') }}" rel="stylesheet">


    {{ Html::script('js/jquery.min.js') }}

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

            <br>

            <h3>
                <sapn class="has-text-info is-size-4"><i class="fa fa-exchange-alt" aria-hidden="true"></i></sapn>
                
                <span class=" is-size-4">
                &nbsp;เปลี่ยนเจ้าหน้าที่ผู้รับผิดชอบ
                </span>
                
            </h3>

            <div class="tabs is-toggle is-centered is-toggle-rounded ">
                <ul>
                    <li id="tab1-tab" class="is-active">
                        <a onclick="tab1()">
                            <span>เปลี่ยนในจังหวัดเดิม</span>
                        </a>
                    </li>
                    <li id="tab2-tab">
                        <a onclick="tab2()">
                            <span>เปลี่ยนไปจังหวัดอื่น</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="content">


                <div id="tab1">

                    <form class="form-horizontal" role="form" method="POST"
                        action="{{ route('manager.transfer_cfm') }}">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="box">
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
                                            {!! Form::text('case_id',$show_data->case_id,['class'=>'text',
                                            'hidden']) !!}

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
                                            <input name="prov" class="input" type="text" placeholder="ชื่อผู้แจ้ง"
                                                value="{{ $show_data->Provinces->PROVINCE_NAME }}" disabled>

                                            <input type="hidden" name="prev_provid"
                                                value="{{ $show_data->Provinces->PROVINCE_CODE }}">
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
                                <div class="field-label">
                                    <!-- Left empty for spacing -->
                                </div>
                            </div>
                        </div>

                        <div class="box">

                            <div class="field is-horizontal">
                                <div class="field-label">
                                    <!-- Left empty for spacing -->
                                </div>
                            </div>

                            <div class="field is-horizontal">
                                <div class="field-label is-normal">
                                    <label class="label">เปลี่ยนผู้รับเรื่อง</label>
                                </div>
                                <div class="field-body">
                                    <div class="field is-grouped">
                                        <input class="input" type="text" value="{{ $show_data->receiver }}" disabled>
                                        <input id="prev_o_username" name="prev_o_username" type="text"
                                            value="{{ $of_receiver->username  }}" hidden>
                                    </div>
                                    <div class="field-label is-normal">
                                        <label class="label">เป็น</label>
                                    </div>
                                    <div class="field">
                                        <div class="select  is-fullwidth has-icons-left ">
                                            <select name="officer" id="officer">
                                                @foreach($officers as $officer)
                                                <option value="{{ $officer->id }}">
                                                    {{ $officer->name }}
                                                </option>
                                                @endforeach
                                            </select>
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


                        <input type="hidden" name="prov_id" value="{{ Auth::user()->prov_id }}">
                        <input type="hidden" name="username" value="{{ Auth::user()->username }}">

                        <div class="field is-grouped">
                            <div class="control">
                                {!! Form::submit('ยืนยันการเปลี่ยนเจ้าหน้าที่',['class'=>'button is-primary']) !!}
                            </div>

                            <div class="control">
                                <p class="control">
                                    <a class="button" href="{{ route('officer.open_dt', $show_data->case_id) }}">
                                        กลับ
                                    </a>
                                </p>
                            </div>
                        </div>

                    </form>

                </div>

                <div id="tab2">

                    <form class="form-horizontal" role="form" method="POST"
                        action="{{ route('manager.transfer_cfm') }}">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="box">
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
                                            {!! Form::text('case_id',$show_data->case_id,['class'=>'text',
                                            'hidden']) !!}

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
                                            <input name="prov" class="input" type="text" placeholder="ชื่อผู้แจ้ง"
                                                value="{{ $show_data->Provinces->PROVINCE_NAME }}" disabled>

                                            <input type="hidden" name="prev_provid"
                                                value="{{ $show_data->Provinces->PROVINCE_CODE }}">
                                        </p>
                                    </div>
                                    <div class="field-label is-normal">
                                        <label class="label">อำเภอ</label>
                                    </div>
                                    <div class="field">
                                        <p class="control is-expanded has-icons-left has-icons-right">
                                            <input class="input" type="text" placeholder="ID-CODE"
                                                value="{{ $show_data->Amphurs->AMPHUR_NAME }}" disabled>
                                        </p>
                                    </div>

                                </div>
                            </div>

                            <div class="field is-horizontal">
                                <div class="field-label">
                                    <!-- Left empty for spacing -->
                                </div>
                            </div>
                        </div>

                        <div class="box">

                            <div class="field is-horizontal">
                                <div class="field-label">
                                    <!-- Left empty for spacing -->
                                </div>
                            </div>

                            <div class="field is-horizontal">
                                <div class="field-label has-text-left">
                                    <label class="label">* กรณีเปลี่ยนผู้รับผิดชอบไปจังหวัดอื่น
                                        สถานะจะเปลี่ยนไปขอรับเรื่องอีกครั้ง</label>
                                </div>
                            </div>
                            <br>

                            <div class="field is-horizontal">
                                <div class="field-label is-normal">
                                    <label class="label">เปลี่ยนเป็นพื้นที่ จังหวัด</label>
                                </div>
                                <div class="field-body">
                                    <div class="field is-grouped">
                                        <div class="select is-fullwidth has-icons-left ">
                                            <select name="province" id="province">
                                                <option value="0">เลือกจังหวัด
                                                </option>
                                                @foreach($provinces as $prov)
                                                <option value="{{ $prov->PROVINCE_CODE }}" style="width:250px">
                                                    {{ $prov->PROVINCE_NAME }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="field-label is-normal">
                                        <label class="label">อำเภอ</label>
                                    </div>
                                    <div class="field">
                                        <span class="select is-fullwidth">
                                            <select name="amphur_id" id="amphur_id">
                                                {{--@foreach($amphurs as $amphur)--}}
                                                {{--<option value="{{ $amphur->AMPHUR_CODE }}"
                                                style="width:250px">{{ $amphur->AMPHUR_NAME }}</option>--}}
                                                {{--@endforeach--}}
                                            </select>
                                        </span>

                                    </div>
                                </div>
                            </div>



                            <div class="field is-horizontal">
                                <div class="field-label">
                                    <!-- Left empty for spacing -->
                                </div>
                            </div>

                        </div>

                        <input id="prev_o_username" name="prev_o_username" type="text"
                            value="{{ $of_receiver->username  }}" hidden>

                        <input type="hidden" name="prov_id" value="{{ Auth::user()->prov_id }}">
                        <input type="hidden" name="username" value="{{ Auth::user()->username }}">

                        <div class="field is-grouped">
                            <div class="control">
                                {!! Form::submit('ยืนยันการเปลี่ยนเจ้าหน้าที่',['class'=>'button is-primary']) !!}
                            </div>

                            <div class="control">
                                <p class="control">
                                    <a class="button" href="{{ route('officer.open_dt', $show_data->case_id) }}">
                                        กลับ
                                    </a>
                                </p>
                            </div>
                        </div>

                    </form>

                </div>


            </div>
        </div>
    </div>


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

    <script>
    $(document).ready(function() {

        $("#tab2").addClass("is-hidden");

    });

    function tab1() {
        $("#tab1-tab").addClass("is-active");
        $("#tab2-tab").removeClass("is-active");

        $("#tab1").removeClass("is-hidden");
        $("#tab2").addClass("is-hidden");
    }

    function tab2() {
        $("#tab2-tab").addClass("is-active");
        $("#tab1-tab").removeClass("is-active");

        $("#tab2").removeClass("is-hidden");
        $("#tab1").addClass("is-hidden");
    }

    $('#province').on('change', function(e) {
        // console.log(e);
        var prov_id = e.target.value;

        $.get('ajax-amphur/' + prov_id, function(data) {
            //success data
            $('#amphur_id').empty();

            $.each(data, function($index, subcatObj) {
                $('#amphur_id').append('<option value="' + subcatObj.AMPHUR_CODE +
                    '"style="width:250px">' + subcatObj.AMPHUR_NAME + '</option>');

            });
            // console.log(data);
        });
    });
    </script>


</body>

</html>