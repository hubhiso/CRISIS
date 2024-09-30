<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" class="route-index">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="{{ asset('css/jquery.min.js') }}"></script>

    <title> ปกป้อง (CRS) </title>
    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300&display=swap" rel="stylesheet">

    {{--{{ Html::style('bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}--}}
    {{--{{ Html::style('bootstrap/css/bootstrap.css') }}--}}
    <!--link href="{{ asset('bulma/css/bulma.css') }}" rel="stylesheet"-->
    <link href="{{ asset('bulma-0.8.0/css/bulma.css') }}" rel="stylesheet">

    <link href="{{ asset('css/mystyles.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" crossorigin="anonymous">

    {{ Html::script('js/jquery.min.js') }}
    {{--{{ Html::script('bootstrap/js/bootstrap.min.js') }}--}}
    {{--{{ Html::script('bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}--}}

    <meta name="theme-color" content="#ab3c3c" />

    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">

</head>

<body class="layout-default has-background-light" onload="renderTable(); createoperate();">

    <div class="hero-head ">
        <div class=" ">
            @component('component.login_bar2')
            @endcomponent
        </div>
    </div>
    <br>

    <section class=" is-medium ">

        <input type="hidden" id="token" value="{{ csrf_token() }}">

        <div class="container">

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
                    <li >
                        <a href="{{ route('officer.show',['mode_id' => "0"]) }}">
                            <span class="icon is-small">
                            <i class="fas fa-list" aria-hidden="true"></i>
                            </span>
                            <span>จัดการเหตุ</span>
                        </a>
                    </li>
                    <li class="is-active">
                        <a href="#">
                            <span class="icon is-small">
                                <i class="fas fa-cog" aria-hidden="true"></i>
                            </span>
                            <span>การดำเนินการ</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <section>
                <div class="tabs is-white is-centered is-toggle is-toggle-rounded">
                    <ul>
                        <li class="">
                            <a href="{{ route('officer.edit_detail2' , $show_data->case_id) }}">
                                <span class="icon is-small"><i class="far fa-address-card"></i></span>
                                <span> ข้อมูลเพิ่มเติม </span>
                            </a>

                        </li>
                        <li class="is-active">
                            <a>
                                <span class="icon is-small"><i class="fa fa-cog"></i></span>
                                <span> การดำเนินการ </span>
                            </a>

                        </li>

                    </ul>
                </div>
            </section>

            <br>
            <div class="has-text-right">
                <a class="button is-primary" href="{{ route('officer.printpage' , $show_data->case_id) }}"><i
                        class="fa fa-print" aria-hidden="true"></i>&nbsp;พิมพ์รายละเอียดการดำเนินการ</a>
            </div>
            <br>
            <!--h1 id="title" class="title"> การดำเนินการ </!--h1-->

            <div class="box">
                <!--This container is <strong>centered</strong> on desktop. -->
                <div class="field is-horizontal">
                    <div class="field-label">
                        <!-- Left empty for spacing -->
                    </div>
                </div>
                <div class="field is-horizontal ">
                    <div class="field-label is-normal">
                        <label class="label">ชื่อผู้ถูกกระทำ</label>
                    </div>
                    <div class="field-body">
                        <div class="field is-grouped">
                            <p class="control is-expanded has-icons-left ">
                                <input class="input" type="text" placeholder="ชื่อผู้ถูกกระทำ"
                                    value="{{ $show_data->name }}" disabled>
                            </p>
                        </div>
                        <div class="field-label is-normal">
                            <label class="label">ID-Code</label>
                        </div>
                        <div class="field">
                            <p class="control is-expanded has-icons-left has-icons-right">
                                <input class="input" id="case_id" type="text" placeholder="ID-CODE"
                                    value="{{ $show_data->case_id }}" disabled>
                                {!! Form::text('case_id',$show_data->case_id,['class'=>'text', 'hidden']) !!}
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

            <div class="field is-normal">
                <p class="subtitle is-5"><i class="fa fa-folder-open has-text-primary"></i>&nbsp;การดำเนินการที่ผ่านมา
                </p>
            </div>

            <!--This container is <strong>centered</strong> on desktop. -->
            <div class="table-container">
            </div>


            <div class="field is-horizontal">
                <div class="field-label">
                    <!-- Left empty for spacing -->
                    <p class="control">
                        <button class="button is-primary" id="btn_add" onclick="open_add_form()"> <i
                                class="fas fa-plus "></i>&nbsp;เพิ่มการดำเนินการ
                        </button>
                    </p>
                </div>
            </div>
            <div class="box" id="current_operate">
                <div class="field is-normal">
                    <p class="subtitle is-5">การดำเนินการในครั้งนี้</p>
                </div>

            <div class="field is-horizontal">
                <div class="field-label ">
                    <label class="label"> วันที่ดำเนินการ </label>
                </div>
                <div class="field-body">
                    <div class="columns" data-provide="datepicker">
                        <div class="column ">
                            ปี พ.ศ.
                            <input type="number" style="width: 100px;" min="2400" max="2570" value='{{ date("Y")+543 }}'
                                maxlength="4" id="Yearoperate" name="Yearoperate" class="form-control input"
                                placeholder="ปปปป" onchange="createoperate();">
                        </div>
                        <div class="column ">
                            เดือน
                            <div class="select">
                                <select id="Monthoperate" name="Monthoperate"
                                    onchange="date_operate();createoperate();">
                                    <option value="1" @if(date('m')==1){ selected } @endif> มกราคม </option>
                                    <option value="2" @if(date('m')==2){ selected } @endif> กุมภาพันธ์ </option>
                                    <option value="3" @if(date('m')==3){ selected } @endif> มีนาคม </option>
                                    <option value="4" @if(date('m')==4){ selected } @endif> เมษายน </option>
                                    <option value="5" @if(date('m')==5){ selected } @endif> พฤษภาคม </option>
                                    <option value="6" @if(date('m')==6){ selected } @endif> มิถุนายน </option>
                                    <option value="7" @if(date('m')==7){ selected } @endif> กรกฎาคม </option>
                                    <option value="8" @if(date('m')==8){ selected } @endif> สิงหาคม </option>
                                    <option value="9" @if(date('m')==9){ selected } @endif> กันยายน </option>
                                    <option value="10" @if(date('m')==10){ selected } @endif> ตุลาคม </option>
                                    <option value="11" @if(date('m')==11){ selected } @endif> พฤศจิกายน </option>
                                    <option value="12" @if(date('m')==12){ selected } @endif> ธันวาคม </option>
                                </select>
                            </div>
                        </div>

                        <div class="column  ">
                            วันที่
                            <div class="select">
                                <select id="Dayoperate" name="Dayoperate" onchange="createoperate();">
                                    @for ($i = 1; $i <= 31; $i++) <option value="{{$i}}" @if(date('d')==$i){ selected }
                                        @endif>{{$i}}</option>
                                        @endfor
                                </select>
                            </div>
                        </div>

                        <div class="column  is-3">
                            <input type="hidden" name="operate_date" id="operate_date" class="form-control">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="field is-horizontal ">
                <div class="field-label">
                    <label class="label"> วิธีการดำเนินการ </label>
                </div>
                <div class="field-body ">
                    <div class="field is-grouped">
                        <div class="control">
                            <label>
                                <input type="checkbox" name="investigate" id="investigate">
                                สืบหาข้อเท็จจริง
                            </label>
                        </div>
                        <div class="control">
                            <label>
                                <input type="checkbox" name="advice" id="advice">
                                ให้คำปรึกษา
                            </label>
                        </div>
                        <div class="control">
                            <label>
                                <input type="checkbox" name="negotiate_individual" id="negotiate_individual">
                                เจรจาเป็นรายบุคคล
                            </label>
                        </div>
                        <div class="control">
                            <label>
                                <input type="checkbox" name="negotiate_policy" id="negotiate_policy">
                                เจรจาระดับนโยบายขององค์กร
                            </label>
                        </div>
                        <div class="control">
                            <label>
                                <input type="checkbox" name="prosecution" id="prosecution">
                                ดำเนินคดี
                            </label>
                        </div>

                    </div>
                </div>
            </div>




            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">รายละเอียดการดำเนินการ</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <div class="control">
                            <textarea class="textarea" name="operate_detail" id="operate_detail"
                                placeholder="กรอกรายละเอียด"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">ผลการดำเนินการ</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <div class="control">
                            <textarea class="textarea" name="operate_result" id="operate_result"
                                placeholder="กรอกรายละเอียด"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label"></label>
                </div>
                <div class="field-body">
                    <div class="field is-grouped">
                        <div class="control">
                            @if (Auth::user()->p_receive == 'no')
                            @elseif (Auth::user()->p_receive == 'yes')
                            <p class="control"> <a class="button is-primary" id="operate_send"> ยืนยัน </a> </p>
                            @endif

                        </div>
                        <div class="control">
                            <p class="control"> <a class="button" onclick="clear_input()"> ยกเลิก </a> </p>
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


        <div class="box">
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label"> สถานะการดำเนินการ </label>
                </div>
                <div class="field-body">
                    <div class="field is-grouped">
                        <p class="control is-expanded  ">
                            <span class="select">
                                <select name="status" id="status_operate">
                                    <option value="4" @if($show_data->status == 4 ) selected @endif>
                                        อยู่ระหว่างการดำเนินการ </option>
                                    <option value="5" @if($show_data->status == 5 ) selected @endif>
                                        ดำเนินการเสร็จสิ้น </option>
                                    <option value="6" @if($show_data->status == 6 ) selected @endif>
                                        ดำเนินการแล้วส่งต่อ </option>
                                </select> </span>
                        </p>
                    </div>

                </div>
            </div>
            <div class="field is-horizontal" id="result_form" @if($show_data->status != 5 ) style="display: none"
                @endif>
                <div class="field-label is-normal">
                    <label class="label"> ผลการดำเนินการ </label>
                </div>
                <div class="field-body">
                    <div class="columns">
                        <p class="column">
                            <span class="select">
                                <select name="operate_result_status" id="operate_result_status">
                                    <option value="1" @if($show_data->operate_result_status == 1 ) selected @endif>
                                        สำเร็จ </option>
                                    <option value="2" @if($show_data->operate_result_status == 2 ) selected @endif>
                                        ไม่สำเร็จ </option>
                                    <option value="3" @if($show_data->operate_result_status == 3 ) selected @endif>
                                        ตาย </option>
                                    <option value="4" @if($show_data->operate_result_status == 4 ) selected @endif>
                                        ย้ายที่อยู่ </option>
                                </select>
                            </span>
                        </p>


                    </div>
                </div>

            </div>
            <!--- resulte group !-->
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label"> </label>
                </div>
                <div class="field-body">
                    <p id="chk_result" @if($show_data->operate_result_status != 1 ) style="display: none" @endif>
                        <label class="checkbox">
                            <input type="checkbox" name="problemfix" id="problemfix" @if($show_data->problemfix == 1
                            ) checked @endif>
                            ปัญหาได้รับการแก้ไข
                        </label>
                        <label class="checkbox">
                            <input type="checkbox" name="compensation" id="compensation" @if($show_data->compensation ==
                            1 ) checked @endif>
                            บุคคลได้รับการเยียวยา
                        </label>
                        <label class="checkbox">
                            <input type="checkbox" name="change_policy" id="change_policy" @if($show_data->change_policy
                            == 1 ) checked @endif>
                            องค์กรเปลี่ยนนโยบาย
                        </label>
                    </p>
                </div>
            </div>

            <div class="field is-horizontal" id="refer_form" @if($show_data->status != 6 ) style="display: none"
                @endif >
                <div class="field-label is-normal">
                    <label class="label"> ส่งต่อไปยัง </label>
                </div>
                <div class="field-body">
                    <div class="field is-grouped">
                        <p class="control">
                            <span class="select">
                                <select name="refer_type" id="refer_type">
                                    <option value="1" @if($show_data->refer_type == 1 ) selected @endif>
                                        หน่วยงานในเครือข่าย </option>
                                    <option value="2" @if($show_data->refer_type == 2 ) selected @endif>
                                        หน่วยงานนอกเครือข่าย </option>
                                </select> </span>
                        </p>
                        <p class="control">
                            <span class="select">
                                <select id="prov_refer">
                                    @foreach($provinces as $province)
                                    <option @if($show_data->prov_refer == $province->PROVINCE_CODE ) selected @endif
                                        value="{{ $province->PROVINCE_CODE }}"
                                        style="width:250px">{{ $province->PROVINCE_NAME }}</option>
                                    @endforeach
                                </select> </span>
                        </p>
                        <p class="control  has-icons-left">
                            <input class="input" type="text" name="refer_name" id="refer_name"
                                placeholder="ชื่อหน่วยงาน" value="{{$show_data->refer_name}}">
                        </p>
                    </div>
                </div>
            </div>

            <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label"></label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <textarea class="textarea" name="final_operate_result" id="final_operate_result"
                                    placeholder="กรอกรายละเอียด">{{$show_data->final_operate_result}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label"></label>
                </div>
                <div class="field-body">
                    <div class="field is-grouped">
                        <div class="control">
                            @if (Auth::user()->p_receive == 'no')
                            @elseif (Auth::user()->p_receive == 'yes')
                            <p class="control"> <a class="button is-primary" onclick="update_operate_case()"> ยืนยัน
                                </a> </p>
                            @endif
                        </div>
                        <div class="control">
                            <p class="control"> <a class="button" href="{{ route('officer.show',['mode_id' => "0"]) }}">
                                    ยกเลิก </a> </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--<div class="box">--}}
        {{--<div class="field is-horizontal">--}}
        {{--<div class="field-label is-normal">--}}
        {{--<label class="label"> ผลการดำเนินการที่ส่งต่อ </label>--}}
        {{--</div>--}}
        {{--<div class="field-body">--}}
        {{--<div class="field is-grouped">--}}
        {{--<p class="control  ">--}}
        {{--<input class="input" type="text" placeholder="" value="ยังไม่ได้รับเรื่อง" disabled>--}}
        {{--</p>--}}
        {{--</div>--}}
        {{--<div class="field-label is-normal">--}}
        {{--<label class="label"> ดำเนินการเสร็จสิ้น </label>--}}
        {{--</div>--}}
        {{--<div class="field">--}}
        {{--<p class="control  has-icons-left ">--}}
        {{--<input class="input" type="text" placeholder="" value="" disabled>--}}
        {{--</p>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}

        <div class="field is-horizontal">
            <div class="field-label">
                <!-- Left empty for spacing -->
            </div>
        </div>

        </div>
        </div>
    </section>
    <br>

    <script>
    $(document).ready(function() {
        $('#operate_date').val($('#Monthoperate').val() + "/" + $('#Dayoperate').val() + "/" + ($('#Yearoperate').val() - 543));
        //var date = $('#operate_date').val();
        //alert(date);
    });
    </script>

    <script>
    ////////////////////////////// operate control /////////////////////////
    function edit_operate(operate_id) {
        var url = "{{route('officer.edit_operate',['operate_id' => ":operate_id"]) }}";
        url = url.replace(':operate_id', operate_id);
        var $request = $.get(url); // make request
        var $container = $('#edit_area' + operate_id);
        $request.done(function(data) { // success
            $container.html(data.html);
        });
    }

	function view_operate(operate_id) {
        var url = "{{route('officer.view_operate',['operate_id' => ":operate_id"]) }}";
        url = url.replace(':operate_id', operate_id);
        var $request = $.get(url); // make request
        var $container = $('#edit_area' + operate_id);
        $request.done(function(data) { // success
            $container.html(data.html);
        });
    }

    function clear_edit(operate_id) {
        $('#edit_area' + operate_id).empty();
    }

    function load_date(mon, year) {
        var output = [];
        if (mon == 2) {
            if ((year % 400) == 0) {
                var x = 29
            } else if ((year % 100) == 0) {
                var x = 28
            } else if ((year % 4) == 0) {
                var x = 29
            } else {
                var x = 28
            }
        } else if (mon == 1 || mon == 3 || mon == 5 || mon == 7 || mon == 8 || mon == 9 || mon == 12) {
            var x = 31
        } else {
            var x = 30
        }
        for (i = 1; i <= x; i++) {
            output.push('<option value="' + i + '">' + i + '</option>');
        }
        return output;
    }

    function edit_DateOperate(id) {
        var mon = $('#MonthEdit' + id).val();

        var year = $('#YearEdit' + id).val() - 543;
        var output = load_date(mon, year);
        $('#DayEdit' + id).html(output.join(''));
    }

    function createoperate() {
        $('#operate_date').val($('#Monthoperate').val() + "/" + $('#Dayoperate').val() + "/" + ($('#Yearoperate')
        .val() - 543));
    }

    function update_operate(operate_id) {
        var Operate_date = $('#MonthEdit' + operate_id).val() + "/" + $('#DayEdit' + operate_id).val() + "/" + ($(
            '#YearEdit' + operate_id).val() - 543);

        var advice_s = 0;
        var investigate_s = 0;
        var negotiate_individual_s = 0;
        var negotiate_policy_s = 0;
        var prosecution_s = 0;

        if ($('#edit_advice' + operate_id).is(':checked') == true) {
            advice_s = 1;
        }

        if ($('#edit_investigate' + operate_id).is(':checked') == true) {
            investigate_s = 1;
        }

        if ($('#edit_negotiate_individual' + operate_id).is(':checked') == true) {
            negotiate_individual_s = 1;
        }

        if ($('#edit_negotiate_policy' + operate_id).is(':checked') == true) {
            negotiate_policy_s = 1;
        }

        if ($('#edit_prosecution' + operate_id).is(':checked') == true) {
            prosecution_s = 1;
        }

        var operate_detail_s = $('#edit_operate_detail' + operate_id).val();
        var operate_result_s = $('#edit_operate_result' + operate_id).val();
        var token = $('#token').val();

        $.ajax({
            type: 'POST',
            url: '{!!  route('officer.update_operate') !!}',
            data: {
                _token: token,
                id: operate_id,
                Operate_date: Operate_date,
                advice: advice_s,
                investigate: investigate_s,
                negotiate_individual: negotiate_individual_s,
                negotiate_policy: negotiate_policy_s,
                prosecution: prosecution_s,
                operate_detail: operate_detail_s,
                operate_result: operate_result_s
            },
            success: function(data) {
                //console.log(data);
                clear_edit(operate_id)
                renderTable();
                clear_input();
                //alert(data.cout)
                $('#current_operate').hide();
                $('#btn_add').show();
            }
        })
    }

    function renderTable() {
        var case_id = $('#case_id').val();
        var url = "{{route('officer.load_activities',['case_id' => ":case_id"]) }}";

        url = url.replace(':case_id', case_id);

        console.log(url);

        var $request = $.get(url); // make request
        var $container = $('.table-container');

        $container.addClass('loading'); // add loading class (optional)

        $request.done(function(data) { // success
            if (data.html != "") {
                //alert(data.html)
                $('#current_operate').hide();
            } else {
                $('#btn_add').hide();
            }
            $container.html(data.html);
        });

        $request.always(function() {
            $container.removeClass('loading');
        });

    }

    function open_add_form() {
        $('#current_operate').show();
        $('#btn_add').hide();
    }

    function clear_input() {
        //alert("test");
        $('#operate_date').val("");
        $('#operate_detail').val("");
        $('#operate_result').val("");
        $('#advice').prop('checked', false);
        $('#negotiate_individual').prop('checked', false);
        $('#negotiate_policy').prop('checked', false);
        $('#prosecution').prop('checked', false);
        $('#current_operate').hide();
        $('#btn_add').show();
    }
    //        $('.datepicker').datepicker();


    ///////// create operate case /////////////////////
    $('#operate_send').on('click', function(e) {
        e.preventDefault();
        var case_id_s = $('#case_id').val();
        var operate_date_s = $('#operate_date').val();
        var advice_s = 0;
        var investigate_s = 0;
        var negotiate_individual_s = 0;
        var negotiate_policy_s = 0;
        var prosecution_s = 0;
        if ($('#advice').is(':checked') == true) {
            advice_s = 1;
        }
        if ($('#investigate').is(':checked') == true) {
            investigate_s = 1;
        }
        if ($('#negotiate_individual').is(':checked') == true) {
            negotiate_individual_s = 1;
        }
        if ($('#negotiate_policy').is(':checked') == true) {
            negotiate_policy_s = 1;
        }
        if ($('#prosecution').is(':checked') == true) {
            prosecution_s = 1;
        }
        var operate_detail_s = $('#operate_detail').val();
        var operate_result_s = $('#operate_result').val();
        var token = $('#token').val();
        //alert(token);
        $.ajax({
            type: 'POST',
            url: '{!!  route('officer.post_activities') !!}',
            data: {
                _token: token,
                case_id: case_id_s,
                operate_date: operate_date_s,
                advice: advice_s,
                investigate: investigate_s,
                negotiate_individual: negotiate_individual_s,
                negotiate_policy: negotiate_policy_s,
                prosecution: prosecution_s,
                operate_detail: operate_detail_s,
                operate_result: operate_result_s
            },
            success: function(data) {
                //console.log(data);
                $("#ajaxResponse").append("<div>" + data.msg + "</div>");
                renderTable();
                clear_input();
                $('#operate_date').val($('#Monthoperate').val() + "/" + $('#Dayoperate').val() + "/" + ($('#Yearoperate').val() - 543));
                //alert(data.cout)
                $('#current_operate').hide();
                $('#btn_add').show();
            }
        })
    });

    /////////// status form control///////
    $('#status_operate').change(function() {
        if (this.value == 4) {
            $('#result_form').hide();
            $('#refer_form').hide();
            $('#chk_result').hide();

        } else if (this.value == 5) {
            $('#result_form').show();
            if ($('#operate_result_status').val() == 1) {
                $('#chk_result').show();
            }
            $('#refer_form').hide();
        } else if (this.value == 6) {
            $('#result_form').hide();
            $('#refer_form').show();
            $('#chk_result').hide();

        }
    });

    $('#operate_result_status').change(function() {
        if (this.value == 1) {
            $('#chk_result').show();
        } else {
            $('#chk_result').hide();

            document.getElementById("compensation").checked = false;
            document.getElementById("change_policy").checked = false;

        }

    });

    function update_operate_case() {
        //alert("test");
        var case_id_s = $('#case_id').val();
        var status = $('#status_operate').val();
        var operate_result_status = $('#operate_result_status').val();
        var compensation = 0;
        var change_policy = 0;
        var problemfix = 0;

        var final_operate_result = $('#final_operate_result').val();

        if ($('#compensation').is(':checked') == true) {
            compensation = 1;
        }
        if ($('#change_policy').is(':checked') == true) {
            change_policy = 1;
        }
        if ($('#problemfix').is(':checked') == true) {
            problemfix = 1;
        }

        var prov_refer = $('#prov_refer').val();
        var refer_type = $('#refer_type').val();
        var refer_name = $('#refer_name').val();
        var token = $('#token').val();
        $.ajax({
            type: 'POST',
            url: '{!!  route('officer.update_case') !!}',
            data: {
                _token: token,
                case_id: case_id_s,
                status: status,
                operate_result_status: operate_result_status,
                problemfix: problemfix,
                compensation: compensation,
                change_policy: change_policy,
                prov_refer: prov_refer,
                refer_type: refer_type,
                refer_name: refer_name,
                final_operate_result: final_operate_result
            },
            success: function(data) {
                //console.log(data);
                $("#ajaxResponse").append("<div>" + data.msg + "</div>");
                //alert("อัพเดตสถาณะเสร็จสมบูรณ์");
                window.location = "{{ route('officer.show',['mode_id' => "0"]) }}";
            }
        });
    }
    //////////////////////////////////////
    </script>

    @extends('officer.footer_m')

</body>

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

</html>