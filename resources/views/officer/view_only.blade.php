<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" class="route-index">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#ab3c3c" />
    <title> ปกป้อง (CRS) </title>

    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">

    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.1/css/bulma.min.css">
    <!--link href="{{ asset('bulma-0.9.0/css/bulma.css') }}" rel="stylesheet"-->
    <!--link href="{{ asset('bulma-0.8.0/css/bulma.css') }}" rel="stylesheet"-->
    <link href="{{ asset('css/mystyles.css') }}" rel="stylesheet">

    <link href="{{ asset('css/step.css') }}" rel="stylesheet">


    {{ Html::script('js/jquery.min.js') }}



</head>
@php
$thaimonth = ["","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค."];
@endphp

<body class="layout-default has-background-light theme-light light">

    <div class="hero-head ">
        <div class=" ">
            @component('component.login_bar2')
            @endcomponent
        </div>
    </div>

    <div class="container">

        <div class="section">

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
                    <li>
                        <a href="{{ route('officer.show',['mode_id' => "0"]) }}">
                            <span class="icon is-small">
                                <i class="fas fa-list" aria-hidden="true"></i>
                            </span>
                            <span>จัดการเหตุ</span>
                        </a>
                    </li>
                    <li class="is-active">
                        <a href="#" class="has-text-dark">
                            <span class="icon is-small">
                                <i class="fa fa-id-card" aria-hidden="true"></i>
                            </span>
                            <span>ข้อมูลเบื้องต้น</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <br>

            <div class="content">
                <h1>
                    <sapn class="has-text-danger">
                        <i class="fa fa-id-card" aria-hidden="true"></i>
                    </sapn>&nbsp;ข้อมูลเบื้องต้น
                </h1>
            </div>

            <div class="box">
                @php
                $date1 = null;
                $date2 = null;
                $date3 = null;
                $date4 = null;
                $date5 = null;
                $step = 1;

                @endphp
                @foreach($timelines as $timeline)
                @if($timeline->operate_status == 1) @php $date1 =
                Carbon\Carbon::parse($timeline->operate_time);@endphp @endif
                @if($timeline->operate_status == 2) @php $date2 =
                Carbon\Carbon::parse($timeline->operate_time);$step=2 @endphp @endif
                @if($timeline->operate_status == 3) @php $date3 =
                Carbon\Carbon::parse($timeline->operate_time);$step=3 @endphp @endif
                @if($timeline->operate_status == 4) @php $date4 =
                Carbon\Carbon::parse($timeline->operate_time);$step=4 @endphp @endif
                @if($timeline->operate_status >= 5) @php $date5 =
                Carbon\Carbon::parse($timeline->operate_time);$step=5 @endphp @endif
                @endforeach
                <div class="step-state step{{$step}}">
                    <ul>
                        <li>
                            <p> แจ้งเหตุ <span>@if($date1 != null) {{$date1->format('Y-m-d')  }} @endif</span>
                            </p>
                        </li>
                        <li>
                            <p> รับเรื่อง <span>@if($date2 != null) {{$date2->format('Y-m-d')  }} @endif</span>
                            </p>
                            <a class="day">@if($date2 != null) {{$date2->diffInDays($date1) }} วัน @endif</a>
                        </li>
                        <li>
                            <p> บันทึกข้อมูล <span>@if($date3 != null) {{$date3->format('Y-m-d')  }}
                                    @endif</span>
                            </p>
                            <a class="day">@if($date3 != null) {{$date3->diffInDays($date2) }} วัน @endif</a>
                        </li>
                        <li>
                            <p> ดำเนินการ <span>@if($date4 != null) {{$date4->format('Y-m-d')  }} @endif</span>
                            </p>
                            <p class="day">@if($date4 != null) {{$date4->diffInDays($date3) }} วัน @endif</p>
                        </li>
                        <li>
                            <p> เสร็จสิ้น <span> @if($date5 != null) {{$date5->format('Y-m-d')  }} @endif</span>
                            </p>
                            <p class="day">@if($date5 != null) {{$date5->diffInDays($date4) }} วัน @endif</p>
                        </li>
                    </ul>
                </div>

            </div>

            <div class="content">
                <form class="form-horizontal" role="form" method="POST" action="{{ route('officer.accept_c') }}">

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class=" box">
                        <!--This container is <strong>centered</strong> on desktop. -->
                        <div class="field is-horizontal">
                            <div class="field-label">
                                <!-- Left empty for spacing -->
                            </div>
                        </div>
                        <div class="field is-horizontal">
                            <div class="field-label is-normal">
                                <label class="label"> วันที่</label>
                            </div>
                            <div class="field-body">
                                <div class="field is-grouped">
                                    <p class="control has-icons-left">
                                        <input class="input" type="text"
                                            value="{{date('d',strtotime(str_replace('-','/', $show_data->created_at)))}} {{$thaimonth[date('n',strtotime(str_replace('-','/', $show_data->created_at)))]}} {{date("Y",strtotime(str_replace('-','/', $show_data->created_at)))+543}}"
                                            disabled>
                                        <span class="icon is-small is-left"> </span>
                                    </p>
                                </div>
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
                                        <span class="icon is-small is-left"> </span>
                                    </p>
                                </div>
                                <div class="field-label is-normal">
                                    <label class="label">ID-Code</label>
                                </div>
                                <div class="field">
                                    <p class="control is-expanded has-icons-left has-icons-right">
                                        <input class="input" type="text" value="{{ $show_data->case_id }}" disabled> {!!
                                        Form::text('case_id',$show_data->case_id,['class'=>'text', 'hidden']) !!}

                                </div>
                            </div>
                        </div>
                        <div class="field is-horizontal">
                            <div class="field-label is-normal">
                                <label class="label"> เบอร์มือถือ </label>
                            </div>
                            <div class="field-body">
                                <div class="field is-grouped">
                                    <p class="control has-icons-left">

                                        <input class="input" type="text" value="{{ $show_data->victim_tel }}" disabled>
                                        <span class="icon  is-left"> </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="field is-horizontal">
                            <div class="field-label is-normal">
                                <label class="label"> เพศ </label>
                            </div>
                            <div class="field-body">
                                <div class="field is-narrow is-grouped">
                                    <p class="control  has-icons-left">
                                        @if($show_data->sex == 1 )
                                        <input class="input" type="text" placeholder="ประเภท1" value="ชาย" disabled>
                                        @elseif($show_data->sex == 2)
                                        <input class="input" type="text" placeholder="ประเภท2" value="หญิง" disabled>
                                        @elseif($show_data->sex == 3)
                                        <input class="input" type="text" placeholder="ประเภท3" value="สาวประเภทสอง"
                                            disabled> @elseif($show_data->sex == 4)
                                        <input class="input" type="text" placeholder="ประเภท4" value="อื่นๆ" disabled>
                                        @elseif($show_data->sex == 0)
                                        <input class="input" type="text" placeholder="ประเภท4" value="ไม่ประสงค์ตอบ"
                                            disabled>
                                        @endif

                                </div>
                                @if($show_data->sex == 4)
                                <div class="field is-narrow is-grouped">
                                    <input class="input" type="text" placeholder="ประเภท4"
                                        value="{{ $show_data->sex_etc }}" disabled>
                                </div>
                                @endif
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
                                <label class="label"></label>
                            </div>
                            <div class="field-body">
                                <div class="field is-grouped">
                                    <p class="control is-expanded  ">
                                        @if($show_data->geolat <> '' )
                                            <a class="button is-danger has-text-white" target="_blank"
                                                href="https://www.google.com/maps/?q={{ $show_data->geolat }},{{ $show_data->geolon }}">
                                                <span class="icon is-left">
                                                    <i class="fas fa-map"></i>
                                                </span>
                                                <span>คลิกเพื่อแสดงพิกัดบนแผนที่</span>
                                            </a>
                                            @else
                                            <a class="button is-danger has-text-white" target="_blank" href="" disabled>
                                                <span class="icon is-left">
                                                    <i class="fas fa-map"></i>
                                                </span>
                                                <span>ไม่มีการบันทึกพิกัด</span>
                                            </a>
                                            @endif
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-label is-normal">
                                <label class="label"> ปัญหาที่แจ้ง</label>
                            </div>
                            <div class="field-body">
                                <div class="field is-grouped">
                                    <p class="control is-expanded has-icons-left">
                                        @if($show_data->problem_case == 1 )
                                        <input class="input" type="text" placeholder="ประเภท1" value="บังคับตรวจเอชไอวี"
                                            disabled> @elseif($show_data->problem_case == 2)
                                        <input class="input" type="text" placeholder="ประเภท2"
                                            value="เปิดเผยสถานะการติดเชื้อเอชไอวี" disabled>
                                        @elseif($show_data->problem_case == 3)
                                        <input class="input" type="text" placeholder="ประเภท3"
                                            value="ถูกกีดกันหรือถูกเลือกปฏิบัติเนื่องมาจาการติดเชื้อเอชไอวี" disabled>
                                        @elseif($show_data->problem_case == 4)
                                        <input class="input" type="text" placeholder="ประเภท4"
                                            value="ถูกกีดกันหรือถูกเลือกปฏิบัติเนื่องมาจากเป็นกลุ่มเปราะบาง" disabled>
                                        @elseif($show_data->problem_case == 5)
                                        <input class="input" type="text" placeholder="ประเภท5"
                                            value="อื่นๆ ที่เกี่ยวข้องกับเอชไอวี" disabled>
                                        @elseif($show_data->problem_case == 6)
                                        <input class="input" type="text" placeholder="ประเภท6" value="อื่นๆ" disabled>

                                        @endif

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
                                    <p class="control is-expanded has-icons-left ">
                                        @if($show_data->sub_problem == 1 )
                                        <input class="input" type="text" placeholder="ประเภท1"
                                            value="ผู้ติดเชื้อเอชไอวี" disabled> @elseif($show_data->sub_problem == 2)
                                        <input class="input" type="text" placeholder="ประเภท2" value="กลุ่มเปราะบาง"
                                            disabled> @elseif($show_data->sub_problem == 3)
                                        <input class="input" type="text" placeholder="ประเภท3" value="ประชาชนทั่วไป"
                                            disabled> @elseif($show_data->sub_problem == 4)
                                        <input class="input" type="text" placeholder="ประเภท4"
                                            value="ครอบครัวและผู้ใกล้ชิดผู้ติดเชื้อเอชไอวี" disabled> @endif
                                    </p>
                                </div>
                                <div class="field-label is-normal">
                                    <label class="label"> ประเภทกลุ่มย่อย </label>
                                </div>
                                <div class="field">
                                    <p class="control is-expanded has-icons-left has-icons-right">
                                        @if($show_data->group_code == 1 )
                                        <input class="input" type="text" placeholder="ประเภท1"
                                            value="กลุ่มหลากหลายทางเพศ" disabled> 
                                        @elseif($show_data->group_code == 2)
                                        <input class="input" type="text" placeholder="ประเภท2" value="พนักงานบริการ"
                                            disabled> 
                                        @elseif($show_data->group_code == 3)
                                        <input class="input" type="text" placeholder="ประเภท3" value="ผู้ใช้สารเสพติด"
                                            disabled> 
                                        @elseif($show_data->group_code == 4)
                                        <input class="input" type="text" placeholder="ประเภท4" value="แรงงานข้ามชาติ"
                                            disabled>
                                        @elseif($show_data->group_code == 5)
                                        <input class="input" type="text" placeholder="ประเภท5" value="ผู้ถูกคุมขัง"
                                            disabled>
                                        @elseif($show_data->group_code == 6)
                                        <input class="input" type="text" placeholder="ประเภท6"
                                            value="กลุ่มชาติพันธุ์และชนเผ่า" disabled>
                                        @elseif($show_data->group_code == 7)
                                        <input class="input" type="text" placeholder="ประเภท" value="คนพิการ" disabled>
                                        @else
                                        <input class="input" type="text" placeholder="ไม่ระบุ" value="" disabled>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>


                        <div class="field is-horizontal">
                            <div class="field-label is-normal">
                                <label class="label">ผู้แจ้งเรื่อง</label>
                            </div>
                            <div class="field-body">
                                <div class="field is-grouped">
                                    <p class="control is-expanded has-icons-left ">
                                        <input class="input" type="text" value="{{ $show_data->sender }}" disabled>
                                    </p>
                                </div>
                                <div class="field-label is-normal">
                                    <label class="label">เบอร์มือถือ</label>
                                </div>
                                <div class="field">
                                    <p class="control is-expanded has-icons-left has-icons-right">
                                        <input class="input" value="{{ $show_data->agent_tel }}" disabled>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="field is-horizontal">
                            <div class="field-label is-normal">
                                <label class="label"> ผู้รับเรื่อง </label>
                            </div>
                            <div class="field-body">
                                <div class="field is-grouped">
                                    <p class="control is-expanded has-icons-left ">
                                        <input class="input" type="text" value="{{ $show_data->receiver }}" disabled>
                                        <input id="receive" name="receiver" type="text"
                                            value="{{ $show_data->receiver_id }}" hidden>

                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-label is-normal">
                                <label class="label"> รายละเอียดของปัญหา </label>
                            </div>
                            <div class="field-body">
                                <div class="field is-grouped">
                                    <div class="control is-expanded has-icons-left">
                                        <textarea class="textarea" placeholder="กรอกรายละเอียด"
                                            disabled>{{ $show_data->detail }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-label is-normal">
                                <label class="label"> ข้อมูลเพิ่มเติม </label>
                            </div>
                            <div class="field-body">
                                <div class="field is-grouped">
                                    <div class="control is-expanded ">
                                        @if ($show_data->file1 == '')
                                        <a class="button is-danger has-text-white" target="_blank" href="" disabled>
                                            <span class="icon is-left">
                                                <i class="fas fa-file-alt"></i>
                                            </span>
                                            <span>ไม่มีการบันทึกข้อมูลเพิ่มเติม</span>
                                        </a>
                                        @else
                                        <a class="button is-danger has-text-white "
                                            href="{{asset('/uploads/'.$show_data->case_id.'/'.$show_data->file1)}}"
                                            download>
                                            <span class="icon is-left">
                                                <i class="fas fa-file-alt"></i>
                                            </span>
                                            <span>คลิกเพื่อดาวน์โหลดข้อมูลเพิ่มเติม 1</span>
                                        </a>
                                        @endif
                                        @if ($show_data->file2 == '')
                                        @else
                                        <a class="button is-danger has-text-white "
                                            href="{{asset('/uploads/'.$show_data->case_id.'/'.$show_data->file2)}}"
                                            download>
                                            <span class="icon is-left">
                                                <i class="fas fa-file-alt"></i>
                                            </span>
                                            <span>คลิกเพื่อดาวน์โหลดข้อมูลเพิ่มเติม 2</span>
                                        </a>
                                        @endif
                                        @if ($show_data->file3 == '')
                                        @else
                                        <a class="button is-danger has-text-white "
                                            href="{{asset('/uploads/'.$show_data->case_id.'/'.$show_data->file3)}}"
                                            download>
                                            <span class="icon is-left">
                                                <i class="fas fa-file-alt"></i>
                                            </span>
                                            <span>คลิกเพื่อดาวน์โหลดข้อมูลเพิ่มเติม 3</span>
                                        </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if( $show_data->status == 99)
                        <div class="field is-horizontal">
                            <div class="field-label is-normal">
                                <label class="label"> เหตุผลที่ปฏิเสธการรับเรื่อง </label>
                            </div>
                            <div class="field-body">
                                <div class="field">
                                    <div class="control">
                                        <textarea class="textarea" placeholder="กรอกรายละเอียด"
                                            disabled>{{ $show_data->reject_reason }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if( $show_data->status == 98)
                        <div class="field is-horizontal">
                            <div class="field-label is-normal">
                                <label class="label"> เหตุผลที่ยุติการดำเนินการ </label>
                            </div>
                            <div class="field-body">
                                <div class="field">
                                    <div class="control">
                                        <textarea class="textarea" placeholder="กรอกรายละเอียด"
                                            disabled>{{ $show_data->reject_reason }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="field is-horizontal">
                            <div class="field-label">
                                <!-- Left empty for spacing -->
                            </div>
                        </div>
                    </div>

                    <div class="field is-grouped">
                        <div class="control">
                            {{--{!! Form::submit('ยืนยันการรับเรื่อง',['class'=>'button is-danger has-text-white']) !!}--}}
                        </div>
                        @if($show_data->receiver != "" && $show_data->status != 99 && $show_data->status != 98)
                        <div class="control">
                            <a class="button is-info "
                                href="{{ route('manager.transfer_frm',['case_id' => $show_data->case_id]) }}">
                                <i class="fa fa-exchange-alt" aria-hidden="true"></i>&nbsp;เปลี่ยนผู้รับผิดชอบ
                            </a>
                        </div>
                        @endif

                        @if( $show_data->status == 1 && $show_data->status != 99 && $show_data->status != 98)
                        <div class="control">
                            <a type="button" id="btn_reject" class="button btn_color2">
                                ปฎิเสธการรับเคส
                            </a>
                        </div>
                        @endif

                        @if( $show_data->status > 1 && $show_data->status != 99 && $show_data->status != 98)
                        <div class="control">
                            <a type="button" id="btn_endcase" class="button btn_color2">
                                ยุติการดำเนินการ
                            </a>
                        </div>
                        @endif

                        @if( $show_data->status != 99 && $show_data->status != 98)
                        <div class="control">
                            <a class="button is-danger has-text-white "
                                href="{{ route('manager.share_case',['case_id' => $show_data->case_id]) }}">
                                <i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp;เชิญทีมร่วมจัดการเคส
                            </a>
                        </div>
                        @endif

                        <p class="control">
                            <a class="button " href="{{ route('officer.show',['mode_id' => "0"]) }}"> กลับหน้าจัดการเหตุ </a>
                        </p>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <br>
    @extends('officer.footer_m')

    <div id="modal_reject" class="modal">
        <div class="modal-background"></div>
        <form role="form" method="POST" action="{{ route('manager.reject_cfm') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="case_id" value="{{ $show_data->case_id }}">
            <div class="modal-card">
                <header class="modal-card-head">
                    <p class="modal-card-title">ปฏิเสธการรับเรื่อง</p>
                    <button type="button" class="delete" aria-label="close"></button>
                </header>
                <section class="modal-card-body">

                    <div class="field">
                        <label class="label">ระบุเหตุผลที่ปฏิเสธไม่รับเรื่อง</label>
                        <div class="control">
                            <textarea class="textarea" name="reason"></textarea>
                        </div>
                    </div>

                </section>
                <footer class="modal-card-foot">
                    <div class="buttons">
                        <button type="submit" class="button is-success">ยืนยัน</button>
                        <button type="button" class="button">ยกเลิก</button>
                    </div>
                </footer>
            </div>
        </form>
    </div>

    <div id="modal_endcase" class="modal">
        <div class="modal-background"></div>
        <form role="form" method="POST" action="{{ route('manager.endcase_cfm') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="case_id" value="{{ $show_data->case_id }}">
            <div class="modal-card">
                <header class="modal-card-head">
                    <p class="modal-card-title">ยุติการดำเนินการ</p>
                    <button type="button" class="delete" aria-label="close"></button>
                </header>
                <section class="modal-card-body">

                    <div class="field">
                        <label class="label">ระบุเหตุผลที่ยุติการดำเนินการ</label>
                        <div class="control">
                            <textarea class="textarea" name="reason"></textarea>
                        </div>
                    </div>

                </section>
                <footer class="modal-card-foot">
                    <div class="buttons">
                        <button type="submit" class="button is-success">ยืนยัน</button>
                        <button type="button" class="button">ยกเลิก</button>
                    </div>
                </footer>
            </div>
        </form>
    </div>

</body>

<script src="{{ asset('bulma/clipboard-1.7.1.min.js') }}"></script>
<script src="{{ asset('bulma/main.js') }}"></script>



<script>

$(document).ready(function() {

    @if( $show_data->status == 1)
        var modalDlg = document.querySelector('#modal_reject');
        var btn_reject = document.querySelector('#btn_reject');

        btn_reject.addEventListener('click', function() {
            modalDlg.classList.add('is-active');
        });
    @endif

    @if( $show_data->status > 1)
        var modalDlgendcase = document.querySelector('#modal_endcase');
        var btn_endcase = document.querySelector('#btn_endcase');

        btn_endcase.addEventListener('click', function() {
            modalDlgendcase.classList.add('is-active');
        });
    @endif

});

//js modal
document.addEventListener('DOMContentLoaded', () => {
    // Functions to open and close a modal
    function openModal($el) {
        $el.classList.add('is-active');
    }

    function closeModal($el) {
        $el.classList.remove('is-active');
    }

    function closeAllModals() {
        (document.querySelectorAll('.modal') || []).forEach(($modal) => {
            closeModal($modal);
        });
    }

    // Add a click event on buttons to open a specific modal
    (document.querySelectorAll('.js-modal-trigger') || []).forEach(($trigger) => {
        const modal = $trigger.dataset.target;
        const $target = document.getElementById(modal);

        $trigger.addEventListener('click', () => {
            openModal($target);
        });
    });

    // Add a click event on various child elements to close the parent modal
    (document.querySelectorAll(
        '.modal-background, .modal-close, .modal-card-head .delete, .modal-card-foot .button') || []).forEach((
        $close) => {
        const $target = $close.closest('.modal');

        $close.addEventListener('click', () => {
            closeModal($target);
        });
    });

    // Add a keyboard event to close all modals
    document.addEventListener('keydown', (event) => {
        if (event.key === "Escape") {
            closeAllModals();
        }
    });
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



</html>