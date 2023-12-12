<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">

    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300&display=swap" rel="stylesheet">

    <link href="{{ asset('bulma-0.9.0/css/bulma.css') }}" rel="stylesheet">
    <link href="{{ asset('bulma-tooltip/bulma-tooltip.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mystyles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/modal/modal.css') }}" rel="stylesheet">

    <link href="{{ asset('css/font-awesome5.0.6/css/fontawesome-all.css') }}" rel="stylesheet">
    {{ Html::script('js/jquery.min.js') }}
    <link href="{{ asset('/css/uploadicon/new3.css') }}" rel="stylesheet">

    <link href="{{ asset('/css/nicelabel/css/jquery-nicelabel.css') }}" rel="stylesheet">


    {{--{{ Html::style('bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}--}}
    {{--{{ Html::style('bootstrap/css/bootstrap.css') }}--}}
    {{ Html::script('js/jquery.min.js') }}
    {{--{{ Html::script('js/thai_date_dropdown.js') }}--}}

    {{--{{ Html::script('js/select_list.js') }}--}}
    {{--{{ Html::script('bootstrap/js/bootstrap.min.js') }}--}}
    {{--{{ Html::script('bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}--}}

    <link href="{{ asset('css/bulma-switch.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bulma-checkradio.min.css') }}" rel="stylesheet">

    <title> ปกป้อง (CRS) </title>

</head>

<body class="has-background-light">

    <div class="hero-head ">
        <div class=" has-background-light">
            @component('component.login_bar2')
            @endcomponent
        </div>
    </div>

    {!! Form::open(['url' =>'officer/input_case','files' => true]) !!}

    <div class="container">
        <section class="section">
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
                                <i class="fa fa-bullhorn" aria-hidden="true"></i>
                            </span>
                            <span>แจ้งเหตุ</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <h2 id="modern-framework" class="subtitle"> กรุณาบันทึกข้อมูลเบื้องต้น
                เพื่อให้เจ้าหน้าที่รับเรื่องสามารถติดต่อไปภายหลัง </h2>

            <div class="level">
                <!-- Left side -->
                <div class="level-left">

                </div>

                <!-- Right side -->
                <div class="level-right">
                    <div class="level-item">
                        <a class="button is-danger" id="showModal"><i
                                class="fas fa-exclamation-triangle">&nbsp;</i>ขอความช่วยเหลือเร่งด่วน</a>
                    </div>
                </div>
            </div>

            <div class="level">
                    <!-- Left side -->
                    <div class="level-left">
                    </div>

                    <!-- Right side -->
                    <div class="level-right">
                        <div class="level-item">
                            <p>สถานะการขอความช่วยเหลือ <span id="tag_alert"
                                    class="tag is-medium is-rounded is-success is-light has-tooltip-multiline"
                                    data-tooltip="เจ้าหน้าที่จะติดต่อกลับภายใน 1 - 7 วัน"><b>ไม่เร่งด่วน</b></span>
                                <span id="tag_notalert"
                                    class="tag is-medium is-rounded is-danger is-light has-tooltip-multiline"
                                    data-tooltip="เจ้าหน้าที่จะติดต่อกลับภายใน 24 ชั่วโมง"><i
                                        class="fas fa-exclamation-triangle">&nbsp;</i><b>เร่งด่วน</b></span>
                            </p>
                        </div>
                    </div>
                </div>

            <input type="hidden" id="emergency" name="emergency" value="0">

            <div class="box" id="data-agent">
                <div class="field is-horizontal">
                    <div class="field-label ">
                        <!-- Left empty for spacing -->
                    </div>
                </div>
                <input id="case_id" name="case_id" type="text" value="{{  $new_id }}" hidden>

                <div class="field is-grouped">
                    <p class="control is-expanded has-icons-left ">
                        <label class="radio">

                            <input class="is-checkradio is-info" type="radio" id="sender_case" name="sender_case" value="3"
                                    checked="checked">
                            <label for="sender_case">เจ้าหน้าที่แจ้ง</label>
                        </label>
                    </p>
                </div>

                <hr>
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">ชื่อผู้แจ้ง</label>
                    </div>
                    <div class="field-body">
                        <div class="field is-grouped">
                            <p class="control is-expanded has-icons-left ">
                                {!! Form::text('sender',Auth::user()->name,['class'=>'input','readonly']) !!}
                                <span class="icon is-small is-left"> <i class="fa fa-user"></i> </span>
                            </p>
                        </div>
                        <div class="field-label is-normal">
                            <label class="label">หมายเลขโทรศัพท์ผู้แจ้ง </label>
                        </div>
                        <div class="field">
                            <p class="control is-expanded has-icons-left">
                                {!! Form::text('agent_tel',Auth::user()->tel,['class'=>'input','readonly']) !!}
                                <span class="icon  is-left"> <i class="fa fa-mobile-alt"></i> </span>
                            </p>
                        </div>
                    </div>
                    <div class="field is-horizontal">
                        <div class="field-label">
                            <!-- Left empty for spacing -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="box" id="data-person">
                <div class="field is-horizontal">
                    <div class="field-label ">
                        <!-- Left empty for spacing -->
                    </div>
                </div>
                <div class="field is-grouped">
                    <div class="field-label control is-expanded ">
                        <label class="label">ข้อมูลผู้ถูกกระทำ</label>
                    </div>
                    <div>
                        <input id="sw_acceptorder" type="checkbox" name="sw_acceptorder" value="1"
                            class="switch is-rounded is-danger">
                        <label for="sw_acceptorder">ให้ระบบรับเรื่องทันทีเมื่อแจ้งเรื่อง</label>
                    </div>
                </div>
                <hr>
                @if($errors->any())
                <ul class="notification is-warning">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">ชื่อผู้ถูกกระทำ</label>
                    </div>
                    <div class="field-body">
                        <div class="field is-grouped">
                            <p class="control is-expanded has-icons-left ">
                                {!! Form::text('name',null,['class'=>'input','placeholder'=>'ชื่อเรียก']) !!}
                                <span class="icon is-small is-left"> <i class="fa fa-user"></i> </span>
                            </p>
                        </div>
                        <div class="field-label is-normal">
                            <label class="label">หมายเลขโทรศัพท์ </label>
                        </div>
                        <div class="field">
                            <p class="control is-expanded has-icons-left">
                                {!! Form::text('victim_tel',null,['class'=>'input','placeholder' => 'เบอร์มือถือ
                                9-10 หลัก','maxlength' => 10 ])!!}
                                <span class="icon  is-left"> <i class="fa fa-mobile-alt"></i> </span>
                            </p>
                        </div>
                    </div>
                </div>

                <br>

                <div class="field is-horizontal">
                    <div class="field-label">
                        <label class="label">เพศ</label>
                    </div>
                    <div class="field-body">
                        <div class="field is-narrow">
                            <div class="control">
                                <input class="is-checkradio is-info" type="radio" id="biosex1" name="biosex" value="1"
                                    checked="checked">
                                <label for="biosex1">ชาย</label>
                                <input class="is-checkradio is-info" type="radio" id="biosex2" name="biosex" value="2">
                                <label for="biosex2">หญิง</label>
                                <input class="is-checkradio is-info" type="radio" id="biosex0" name="biosex" value="0">
                                <label for="biosex0">ไม่ประสงค์ตอบ</label>
                            </div>
                        </div>

                    </div>
                </div>

                <br>

                <div class="field is-horizontal">
                    <div class="field-label ">
                        <label class="label">สัญชาติ</label>
                    </div>
                    <div class="field-body">
                        <div class="field  ">
                            <input class="is-checkradio is-info" type="radio" id="nation1" name="nation" value="1"
                                checked="checked">
                            <label for="nation1">ไทย</label>
                            <input class="is-checkradio is-info" type="radio" id="nation2" name="nation" value="2">
                            <label for="nation2">ลาว</label>
                            <input class="is-checkradio is-info" type="radio" id="nation3" name="nation" value="3">
                            <label for="nation3">เวียดนาม</label>
                            <input class="is-checkradio is-info" type="radio" id="nation4" name="nation" value="4">
                            <label for="nation4">พม่า</label>
                            <br>
                            <br>
                            <input class="is-checkradio is-info" type="radio" id="nation5" name="nation" value="5">
                            <label for="nation5">กัมพูชา</label>
                            <input class="is-checkradio is-info" type="radio" id="nation7" name="nation" value="7">
                            <label for="nation7">ไร้สัญชาติ/ไม่มีสถานะบุคคล</label>
                            <input class="is-checkradio is-info" type="radio" id="nation6" name="nation" value="6">
                            <label for="nation6">อื่นๆ ระบุ</label>
                            <input type="text" class="input" name="nation_etc" placeholder="ระบุสัญชาติ"
                                style="display:none">

                        </div>
                    </div>
                </div>
                <div class="field is-horizontal">
                    <div class="field-label ">
                        <!-- Left empty for spacing -->
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label ">
                        <label class="label"> วันที่เกิดเหตุ </label>
                    </div>
                    <div class="field-body">
                        <div class="columns" data-provide="datepicker">
                            <div class="column ">
                                ปี พ.ศ.
                                <input style="width: 100px;" type="number" min="2400" max="2570" maxlength="4"
                                    id="YearAct" name="YearAct" class="form-control input"
                                    placeholder="{{ trans('message.txt_year_h') }}" value="{{date('Y')+543}}"
                                    onchange="date_acc();">
                            </div>
                            <div class="column ">

                                เดือน
                                <div class="select">
                                    <select id="MonthAct" name="MonthAct" onchange="date_acc();">
                                        <option value="1" @if(date('m')==1){ selected } @endif>
                                            มกราคม </option>
                                        <option value="2" @if(date('m')==2){ selected } @endif>
                                            กุมภาพันธ์ </option>
                                        <option value="3" @if(date('m')==3){ selected } @endif>
                                            มีนาคม </option>
                                        <option value="4" @if(date('m')==4){ selected } @endif>
                                            เมษายน </option>
                                        <option value="5" @if(date('m')==5){ selected } @endif>
                                            พฤษภาคม </option>
                                        <option value="6" @if(date('m')==6){ selected } @endif>
                                            มิถุนายน </option>
                                        <option value="7" @if(date('m')==7){ selected } @endif>
                                            กรกฎาคม </option>
                                        <option value="8" @if(date('m')==8){ selected } @endif>
                                            สิงหาคม </option>
                                        <option value="9" @if(date('m')==9){ selected } @endif>
                                            กันยายน </option>
                                        <option value="10" @if(date('m')==10){ selected } @endif>
                                            ตุลาคม </option>
                                        <option value="11" @if(date('m')==11){ selected } @endif>
                                            พฤศจิกายน </option>
                                        <option value="12" @if(date('m')==12){ selected } @endif>
                                            ธันวาคม </option>
                                    </select>
                                </div>

                            </div>

                            <div class="column  ">
                                วันที่
                                <div class="select">
                                    <select class="input" id="DayAct" name="DayAct" onchange="">
                                        @for ($i = 1; $i <= 31; $i++) <option value="{{$i}}" @if(date('d')==$i){
                                            selected } @endif>{{$i}}</option>
                                            @endfor
                                    </select>
                                </div>
                            </div>

                            <div class="column  is-3">
                                <input type="hidden" id="DateAct" name="DateAct" class="form-control"
                                    value="{{date('m/d/Y')}}">
                                <input type="hidden" id="year_hidden" name="year_hidden" class="form-control"
                                    value="{{date('Y')}}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label ">
                        <!-- Left empty for spacing -->
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">จังหวัดที่เกิดเหตุ</label>
                    </div>
                    <div class="field-body">
                        <div class="field is-grouped">
                            <p class="control is-expanded  ">
                                <span class="select">
                                    <select style='width:200px' name="prov_id" id="prov_id">
                                        <option value="0" style="width:250px">กรุณาเลือกจังหวัด</option>
                                        @foreach($provinces as $province)
                                        <option value="{{ $province->PROVINCE_CODE }}" style="width:250px">
                                            {{ $province->PROVINCE_NAME }}</option>
                                        @endforeach
                                    </select>
                        </div>
                        <div class="field-label is-normal">
                            <label class="label">อำเภอที่เกิดเหตุ</label>
                        </div>
                        <div class="field is-grouped">
                            <p class="control is-expanded  ">
                                <span class="select">
                                    <select style='width:200px' name="amphur_id" id="amphur_id">
                                        {{--@foreach($amphurs as $amphur)--}}
                                        {{--<option value="{{ $amphur->AMPHUR_CODE }}"
                                        style="width:250px">{{ $amphur->AMPHUR_NAME }}</option>--}}
                                        {{--@endforeach--}}
                                    </select>
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label ">
                        <!-- Left empty for spacing -->
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label"> </label>
                    </div>
                    <div class="field-body">
                        <div class="field  is-grouped">
                            <div class="control  ">
                                <!--p>คลิกเพื่อระบุตำแหน่งในปัจจุบัน </p-->
                                <a class="button is-danger" onclick="getLocation()">
                                    <span class="icon is-left">
                                        <i class="fas fa-location-arrow"></i>
                                    </span>
                                    <span>คลิกเพื่อระบุตำแหน่งในปัจจุบัน</span>
                                </a>
                                {{ Form::hidden('geolat', null, array('id' => 'glat')) }}
                                {{ Form::hidden('geolon', null, array('id' => 'glon')) }}
                            </div>
                            <div class="control">
                                <p class=" is-danger is-medium has-text-info" id="getsuccess"></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label ">
                        <!-- Left empty for spacing -->
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">ปัญหาที่พบ</label>
                    </div>
                    <div class="field-body">
                        <div class="field is-grouped">
                            <p class="control is-expanded  ">
                                <span class="select">
                                    <select id="problem_case" name="problem_case">
                                        <option value="0">โปรดเลือกประเภทปัญหาของท่าน</option>
                                        <option value="1">บังคับตรวจเอชไอวี</option>
                                        <option value="2">เปิดเผยสถานะการติดเชื้อเอชไอวี</option>
                                        <option value="3">
                                            ถูกกีดกันหรือถูกเลือกปฏิบัติเนื่องมาจาการติดเชื้อเอชไอวี
                                        </option>
                                        <option value="4">
                                            ถูกกีดกันหรือถูกเลือกปฏิบัติเนื่องมาจากเป็นกลุ่มเปราะบาง
                                        </option>
                                        <option value="5">อื่นๆ ที่เกี่ยวข้องกับ HIV</option>
                                        <option value="6">อื่นๆ</option>
                                    </select>

                                </span>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label"> ประเภทกลุ่ม </label>
                    </div>
                    <div class="field-body">
                        <div class="field is-grouped">
                            <p class="control is-expanded  ">
                                <span class="select">
                                    <select id="sub_problem" name="sub_problem" disabled="true">
                                    </select>

                            </p>
                        </div>

                    </div>
                </div>
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label"> ประเภทกลุ่มย่อย </label>
                    </div>
                    <div class="field-body">
                        <div class="field is-grouped">
                            <p class="control is-expanded  ">
                                <span class="select">
                                    <span class="select">
                                        <select id="group_code" name="group_code" disabled="true">
                                        </select>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label"> รายละเอียดของปัญหา </label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                {{--{{ Form::textarea('detail', null , ['size' => '100x10']) }}--}}
                                <textarea name="detail" class="textarea"></textarea>
                                {{--<textarea name="detail" class="textarea" placeholder="กรอกรายละเอียด"></textarea>--}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label"> ความต้องการความช่วยเหลือ </label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                {{--{{ Form::textarea('need', null, ['size' => '100x10']) }}--}}
                                <textarea name="need" class="textarea"></textarea>
                                {{--<textarea name="detail" class="textarea" placeholder="กรอกรายละเอียด"></textarea>--}}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label"> อัพโหลดข้อมูลเพิ่มเติม </label>
                    </div>
                    <div class="field-body">
                        <div class="file is-danger has-name is-fullwidth">
                            <label class="file-label">
                                <input class="input-file" id="file1" name="file1" type="file" name="resume">
                                <span class="file-cta">
                                    <span class="file-icon">
                                        <i class="fas fa-upload"></i>
                                    </span>
                                    <span class="file-label input-file-trigger1">
                                        กรุณาเลือกไฟล์...
                                    </span>
                                </span>
                                <span class="file-name file-return1">
                                    ไม่ได้เลือกไฟล์ใด
                                </span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                    </div>
                    <div class="field-body">
                        <div class="file is-danger has-name is-fullwidth">
                            <label class="file-label">
                                <input class="input-file" id="file2" name="file2" type="file" name="resume">
                                <span class="file-cta">
                                    <span class="file-icon">
                                        <i class="fas fa-upload"></i>
                                    </span>
                                    <span class="file-label input-file-trigger2">
                                        กรุณาเลือกไฟล์...
                                    </span>
                                </span>
                                <span class="file-name file-return2">
                                    ไม่ได้เลือกไฟล์ใด
                                </span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                    </div>
                    <div class="field-body">
                        <div class="file is-danger has-name is-fullwidth">
                            <label class="file-label">
                                <input class="input-file" id="file3" name="file3" type="file" name="resume">
                                <span class="file-cta">
                                    <span class="file-icon">
                                        <i class="fas fa-upload"></i>
                                    </span>
                                    <span class="file-label input-file-trigger3">
                                        กรุณาเลือกไฟล์...
                                    </span>
                                </span>
                                <span class="file-name file-return3">
                                    ไม่ได้เลือกไฟล์ใด
                                </span>
                            </label>
                        </div>
                    </div>
                </div>

            </div>

            <div class="field is-grouped">
                <p class="control">
                    @if (Auth::user()->p_receive == 'no')
                    @elseif (Auth::user()->p_receive == 'yes')
                    {!! Form::submit('ส่งข้อมูล',['class'=>'button is-danger']) !!}
                    @endif
                </p>
                <p class="control">
                    <a><a class="button is-outlined" href="{{ route('officer.main') }}">ยกเลิก</a></a>
                </p>
            </div>

        </section>
    </div>


    {!! Form::close() !!}


    <footer class="footer " style="background-color: #EEE;">
        <div class="container  ">
            <div class="content has-text-centered  ">
                <p>Crisis Response System (CRS)
                </p>
                <p id="tsp"> <small> Source code licensed <a href="http://www.hiso.or.th">HISO</a>. </small> </p>
            </div>
        </div>
    </footer>


</body>

<div id="modal_alert" class="modal ">
        <div class="modal-background"></div>
        <div class="modal-content">
            <div class="modal-card">
                <header class="modal-card-head">
                    <p class="modal-card-title has-text-danger"><i
                            class="fas fa-exclamation-triangle">&nbsp;</i>{{ trans('message.bt_urgent_rc') }}</p>
                </header>
                <section class="modal-card-body">

                    <p class="is-size-4">
                        {{ trans('message.tx_h_table') }}
                    </p>
                    <p class="is-size-5 mb-3">
                        {{ trans('message.tx_sh_table') }}
                    </p>
                    <div class="panel table-container">

                        <table class="table is-fullwidth is-striped is-hoverable">
                            <thead>
                                <tr>
                                    <th class="has-text-danger">{{ trans('message.tx_agency_name') }}</th>
                                    <th class="has-text-danger">{{ trans('message.txt_tel') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>RSAT(สมาคมฟ้าสีรุ้ง)</th>
                                    <td class="has-text-left">02-7316533</td>
                                </tr>
                                <tr>
                                    <th>TNP+ (เครือข่ายผู้ติดเชื้อ)</th>
                                    <td class="has-text-left">02-3775065</td>
                                </tr>
                                <tr>
                                    <th>FAR มูลนิธิศูนย์คุ้มครองสิทธิด้านเอดส์</th>
                                    <td class="has-text-left">097-2194393</td>
                                </tr>
                                <tr>
                                    <th>SWING (มูลนิธิเพื่อนพนักงานบริการ)</th>
                                    <td class="has-text-left">02-6329502 </td>
                                </tr>
                                <tr>
                                    <th>RTF (มูลนิธิรักษ์ไทย)</th>
                                    <td class="has-text-left">063-2057188</td>
                                </tr>
                                <tr>
                                    <th>Health and Opportunity Network (HON)</th>
                                    <td class="has-text-left">038-425808</td>
                                </tr>
                                <tr>
                                    <th>กลุ่มน้ำกว๊านสีรุ้ง</th>
                                    <td class="has-text-left">054-070599</td>
                                </tr>
                                <tr>
                                    <th>STM(บ้านสุขสันต์)</th>
                                    <td class="has-text-left">074-313409</td>
                                </tr>

                            </tbody>
                        </table>

                    </div>
                    <p class="is-size-5">ท่านต้องการขอความช่วยเหลือเร่งด่วนผ่านปกป้องหรือไม่</p>
                    <p class="is-size-6 has-text-danger">* การช่วยเหลือเร่งด่วนผ่านปกป้องเจ้าหน้าที่จะติดต่อกลับภายใน 24
                        ชม.</p>

                </section>
                <footer class="modal-card-foot">
                    <button class="button is-danger modalclose_alert" onclick="sitwch_alert('on')">ต้องการ</button>
                    <button class="button is-info modalclose_notalert" onclick="sitwch_alert('off')">ไม่ต้องการ</button>
                </footer>
            </div>
        </div>
        <button class="modal-close modalclose"></button>
    </div>

{{ Html::script('js/select_list.js') }}

<script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>

<script src="{{ asset('bulma/clipboard-1.7.1.min.js') }}"></script>
<script src="{{ asset('bulma/main.js') }}"></script>

<script src="{{ asset('/css/modal/modal.js') }}"></script>

<script>
$(document).ready(function() {

    document.getElementById("tag_notalert").style.display = 'none';
    
    $('#btn_submit').on('click', function() {
        $(this).addClass('is-loading');
    });

    var btn = document.querySelector('#showModal');
    var modalDlg = document.querySelector('#modal_alert');
    var imageModalCloseBtn = document.querySelector('.modalclose');
    var imageModalCloseBtn_alert = document.querySelector('.modalclose_alert');
    var imageModalCloseBtn_notalert = document.querySelector('.modalclose_notalert');

    btn.addEventListener('click', function() {
        modalDlg.classList.add('is-active');
    });

    imageModalCloseBtn.addEventListener('click', function() {
        modalDlg.classList.remove('is-active');
    });

    imageModalCloseBtn_alert.addEventListener('click', function() {
        //$('#emergency2').val(0);
        modalDlg.classList.remove('is-active');
    });

    imageModalCloseBtn_notalert.addEventListener('click', function() {
        //$('#emergency2').val(1);
        modalDlg.classList.remove('is-active');
    });
});
</script>

<script>
$('#prov_id').on('change', function(e) {
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

$("input[name='sex']").on('change', function(e) {

    var sel_value = e.target.value;
    //alert(sel_value);

    if (sel_value == 4) {
        $("input[name='sex_etc']").show();
    } else {
        $("input[name='sex_etc']").hide();
    }
});
$("input[name='nation']").on('change', function(e) {

    var sel_value = e.target.value;
    //alert(sel_value);

    if (sel_value == 6) {
        $("input[name='nation_etc']").show();
    } else {
        $("input[name='nation_etc']").hide();
    }
});


//<!-- upload -->

document.querySelector("html").classList.add('js');

var fileInput1 = document.getElementById("file1"),
    fileInput2 = document.getElementById("file2"),
    fileInput3 = document.getElementById("file3"),
    button1 = document.querySelector(".input-file-trigger1"),
    button2 = document.querySelector(".input-file-trigger2"),
    button3 = document.querySelector(".input-file-trigger3"),
    the_return1 = document.querySelector(".file-return1");
the_return2 = document.querySelector(".file-return2");
the_return3 = document.querySelector(".file-return3");

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
button3.addEventListener("keydown", function(event) {
    if (event.keyCode == 13 || event.keyCode == 32) {
        fileInput3.focus();
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
button3.addEventListener("click", function(event) {
    fileInput3.focus();
    return false;
});
fileInput1.addEventListener("change", function(event) {
    the_return1.innerHTML = this.files[0].name;
});
fileInput2.addEventListener("change", function(event) {
    the_return2.innerHTML = this.files[0].name;
});
fileInput3.addEventListener("change", function(event) {
    the_return3.innerHTML = this.files[0].name;
});

// Lcation Lat Long //
var getsuccess = document.getElementById("getsuccess");

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
        getsuccess.innerHTML = "กรุณารอสักครู่...";
    } else {
        latlon.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {

    getsuccess.innerHTML = "บันทึกตำแหน่งในปัจจุบันสำเร็จ";

    document.getElementById('glat').value = position.coords.latitude;
    document.getElementById('glon').value = position.coords.longitude;
}


function createaccidentdate() {

    $('#DateAct').val($('#MonthAct').val() + "/" + $('#DayAct').val() + "/" + ($('#YearAct').val() - 543));

}
</script>

{{ Html::script('css/nicelabel/js/jquery.nicelabel-o.js') }}



<script>
$(function() {
    $('#text-checkbox  > input').nicelabel();

});
</script>

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
function sitwch_alert(data) {

    if (data == 'on') {
        document.getElementById("emergency").value = "1";
        document.getElementById("tag_alert").style.display = 'none';
        document.getElementById("tag_notalert").style.display = '';

        document.getElementById("data-agent").classList.add("has-background-danger-light");
        document.getElementById("data-person").classList.add("has-background-danger-light");

    } else if (data == 'off') {
        document.getElementById("emergency").value = "0";
        document.getElementById("tag_alert").style.display = '';
        document.getElementById("tag_notalert").style.display = 'none';

        document.getElementById("data-agent").classList.remove("has-background-danger-light");
        document.getElementById("data-person").classList.remove("has-background-danger-light");

    }

}
</script>

</html>