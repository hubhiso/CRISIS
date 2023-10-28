<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" class="route-index">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{--{{ Html::style('bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}--}}
    {{--{{ Html::style('bootstrap/css/bootstrap.css') }}--}}

    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300&display=swap" rel="stylesheet">
    <link href="{{ asset('bulma-0.8.0/css/bulma.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mystyles.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" crossorigin="anonymous">

    {{ Html::script('js/jquery.min.js') }}
    {{--{{ Html::script('js/thai_date_dropdown.js') }}--}}

    {{--{{ Html::script('js/select_list.js') }}--}}
    {{--{{ Html::script('bootstrap/js/bootstrap.min.js') }}--}}
    {{--{{ Html::script('bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}--}}

    <meta name="theme-color" content="#ab3c3c" />

    <title> ปกป้อง (CRS) </title>

    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">

</head>

<body class="layout-default has-background-light">

    <div class="hero-head ">
        <div class=" ">
            @component('component.login_bar2')
            @endcomponent
        </div>
    </div>

    <input type="hidden" name="_token" value="{{ csrf_token() }}">

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
                        <a href="#">
                            <span class="icon is-small">
                                <i class="far fa-address-card"></i>
                            </span>
                            <span>ข้อมูลเพิ่มเติม</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <div class="tabs is-centered is-toggle is-toggle-rounded">
                <ul>
                    <li class="is-active">
                        <a>
                            <span class="icon is-small"><i class="far fa-address-card"></i></span>
                            <span> ข้อมูลเพิ่มเติม </span>
                        </a>

                    </li>
                    <li>
                        <a href="{{ route('officer.add_activities' , $show_data->case_id) }}">
                            <span class="icon is-small"><i class="fa fa-cog"></i></span>
                            <span> การดำเนินการ </span>
                        </a>

                    </li>

                </ul>
            </div>

            <div class="content">

                <form class="form-horizontal" role="form" method="POST" action="{{ route('officer.update_detail') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input id="case_id" name="case_id" type="text" value="{{  $show_data->case_id }}" hidden>

                    <br>

                    <div class="box">

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
                                        <input class="input" type="text" value="{{ $show_data->created_at }}" disabled>
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
                                        <span class="icon is-small is-left"> </span>
                                    </p>
                                </div>
                                <div class="field-label is-normal">
                                    <label class="label"> เบอร์มือถือผู้แจ้ง </label>
                                </div>
                                <div class="field">
                                    <p class="control  has-icons-left has-icons-right">
                                        <input class="input" type="text" value="{{ $show_data->agent_tel }}" disabled>
                                        <span class="icon  is-left"> </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="field is-horizontal">
                            <div class="field-label is-normal">
                                <label class="label">ผู้รับเรื่อง</label>
                            </div>
                            <div class="field-body">
                                <div class="field is-grouped">
                                    <p class="control has-icons-left">
                                        <input class="input" type="text" value="{{ $show_data->receiver }}" disabled>
                                        <span class="icon is-small is-left"> </span>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-label is-normal">
                                <label class="label">ชื่อผู้ถูกกระทำ</label>
                            </div>
                            <div class="field-body">
                                <div class="field is-grouped">
                                    <p class="control is-expanded has-icons-left ">
                                        <input class="input" type="text" name="name" value="{{ $show_data->name }}">
                                        <span class="icon is-small is-left"> </span>
                                    </p>
                                </div>
                                <div class="field-label is-normal">
                                    <label class="label">ID-Code</label>
                                </div>
                                <div class="field">
                                    <p class="control is-expanded has-icons-left has-icons-right">
                                        <input class="input" type="text" value="{{ $show_data->case_id }}" disabled>
                                    </p>
                                </div>
                            </div>
                        </div>



                        <div class="field is-horizontal">
                            <div class="field-label is-normal">
                                <label class="label"> เบอร์มือถือผู้ถูกกระทำ </label>
                            </div>
                            <div class="field-body">
                                <div class="field is-grouped">
                                    <p class="control has-icons-left">
                                        <input class="input" type="text" name="tel"
                                            value="{{ $show_data->victim_tel }}">
                                        <span class="icon  is-left"> </span>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-label is-normal">
                                <label class="label">เพศ</label>
                            </div>
                            <div class="field-body">

                                <div class="field">

                                    <label class="radio">
                                        @if( $show_data->sex == 1 )
                                        {{ Form::radio('sex', '1' , true) }}
                                        @else
                                        {{ Form::radio('sex', '1' , false) }}
                                        @endif
                                        ชาย
                                    </label>
                                    &nbsp;

                                    <label class="radio">
                                        @if( $show_data->sex == 2 )
                                        {{ Form::radio('sex', '2' , true) }}
                                        @else
                                        {{ Form::radio('sex', '2' , false) }}
                                        @endif
                                        หญิง
                                    </label>
                                    &nbsp;

                                    <label class="radio">
                                        @if( $show_data->sex == 3 )
                                        {{ Form::radio('sex', '3' , true) }}
                                        @else
                                        {{ Form::radio('sex', '3' , false) }}
                                        @endif
                                        สาวประเภทสอง
                                    </label>
                                    <br>

                                    <label class="radio">
                                        @if( $show_data->sex == 4 )
                                        {{ Form::radio('sex', '4' , true) }} อื่นๆ ระบุ
                                    </label>
                                    {!!
                                    Form::text('sex_etc',$show_data->sex_etc,['class'=>'input','placeholder'=>'ระบุเพศ'])
                                    !!}

                                    @else
                                    {{ Form::radio('sex', '4' , false) }} อื่นๆ ระบุ
                                    </label>
                                    {!!
                                    Form::text('sex_etc',$show_data->sex_etc,['class'=>'input','placeholder'=>'ระบุเพศ','style'=>'display:
                                    none']) !!}
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-label is-normal">
                                <label class="label">สัญชาติ</label>
                            </div>
                            <div class="field-body">
                                <div class="field">
                                    <label class="radio">
                                        @if( $show_data->nation == 1 )
                                        {{ Form::radio('nation', '1' , true) }}
                                        @else
                                        {{ Form::radio('nation', '1' , false) }}
                                        @endif
                                        ไทย
                                    </label>
                                    &nbsp;
                                    <label class="radio">
                                        @if( $show_data->nation == 2 )
                                        {{ Form::radio('nation', '2' , true) }}
                                        @else
                                        {{ Form::radio('nation', '2' , false) }}
                                        @endif
                                        ลาว
                                    </label>
                                    &nbsp;
                                    <label class="radio">
                                        @if( $show_data->nation == 3 )
                                        {{ Form::radio('nation', '3' , true) }}
                                        @else
                                        {{ Form::radio('nation', '3' , false) }}
                                        @endif
                                        เวียดนาม
                                    </label>
                                    &nbsp;
                                    <label class="radio">
                                        @if( $show_data->nation == 4 )
                                        {{ Form::radio('nation', '4' , true) }}
                                        @else
                                        {{ Form::radio('nation', '4' , false) }}
                                        @endif
                                        พม่า
                                    </label>
                                    <br>
                                    <label class="radio">
                                        @if( $show_data->nation == 5 )
                                        {{ Form::radio('nation', '5' , true) }}
                                        @else
                                        {{ Form::radio('nation', '5' , false) }}
                                        @endif
                                        กัมพูชา
                                    </label>
                                    &nbsp;

                                    <label class="radio">
                                        @if( $show_data->nation == 7 )
                                        {{ Form::radio('nation', '7' , true) }}
                                        @else
                                        {{ Form::radio('nation', '7' , false) }}
                                        @endif
                                        ไร้สัญชาติ/ไม่มีสถานะบุคคล
                                    </label>
                                    &nbsp;


                                    <label class="radio">
                                        @if( $show_data->nation == 6 )
                                        {{ Form::radio('nation', '6' , true) }} อื่นๆ ระบุ
                                    </label>
                                    &nbsp;
                                    {!!
                                    Form::text('nation_etc',$show_data->nation_etc,['class'=>'input','placeholder'=>'ระบุสัญชาติ'])
                                    !!}
                                    @else
                                    {{ Form::radio('nation', '6' , false) }} อื่นๆ ระบุ
                                    </label>
                                    &nbsp;
                                    {!!
                                    Form::text('nation_etc',$show_data->nation_etc,['class'=>'input','placeholder'=>'ระบุสัญชาติ','style'=>'display:
                                    none']) !!}
                                    @endif

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
                                        <input class="input" type="text" placeholder="จังหวัด"
                                            value="{{ $show_data->Provinces->PROVINCE_NAME }}" disabled>
                                    </p>
                                </div>
                                <div class="field-label is-normal">
                                    <label class="label">อำเภอ</label>
                                </div>
                                <div class="field">
                                    <p class="control is-expanded has-icons-left has-icons-right">
                                        <input class="input" placeholder="ID-CODE"
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
                                            <a class="button is-primary" target="_blank"
                                                href="https://www.google.com/maps/?q={{ $show_data->geolat }},{{ $show_data->geolon }}">
                                                <span class="icon is-left">
                                                    <i class="fas fa-map"></i>
                                                </span>
                                                <span>คลิกเพื่อแสดงพิกัดบนแผนที่</span>
                                            </a>
                                            @else
                                            <a class="button is-primary" target="_blank" href="" disabled>
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
                                <label class="label"> รายละเอียดของปัญหา </label>
                            </div>
                            <div class="field-body">
                                <div class="field">
                                    <div class="control">
                                        <textarea class="textarea" name="detail">{{ $show_data->detail }}</textarea>
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
                                        <textarea class="textarea" name="need">{{ $show_data->need }}</textarea>
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
                                        <a class="button is-primary" target="_blank" href="" disabled>
                                            <span class="icon is-left">
                                                <i class="fas fa-file-alt"></i>
                                            </span>
                                            <span>ไม่มีการบันทึกข้อมูลเพิ่มเติม</span>
                                        </a>
                                        @else
                                        <a class="button is-primary "
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
                                        <a class="button is-primary "
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
                                        <a class="button is-primary "
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

                            <div class="field is-horizontal">
                                <div class="field-label">
                                    <!-- Left empty for spacing -->
                                </div>
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
                            <div class="field-label ">
                                <label class="label"> วันที่สอบถามข้อมูล </label>
                            </div>
                            <div class="field-body">
                                <div class="columns" data-provide="datepicker">
                                    <div class="column ">
                                        ปี พ.ศ.
                                        <input type="number" min="2561" max="2570" maxlength="4" id="YearInterview"
                                            name="YearInterview" class="form-control input" placeholder="ปปปป"
                                            value="{{date('Y',strtotime(str_replace('-','/', $show_detail->interview_date)))+543 }}"
                                            onchange="date_interview();createinterviewdate()">
                                    </div>
                                    <div class="column ">
                                        เดือน
                                        <div class="select">
                                            <select id="MonthInterview" name="MonthInterview"
                                                onchange="date_interview();createinterviewdate();">
                                                <option value="1" @if(date('m')==1){ selected } @endif> มกราคม
                                                </option>
                                                <option value="2" @if(date('m')==2){ selected } @endif> กุมภาพันธ์
                                                </option>
                                                <option value="3" @if(date('m')==3){ selected } @endif> มีนาคม
                                                </option>
                                                <option value="4" @if(date('m')==4){ selected } @endif> เมษายน
                                                </option>
                                                <option value="5" @if(date('m')==5){ selected } @endif> พฤษภาคม
                                                </option>
                                                <option value="6" @if(date('m')==6){ selected } @endif> มิถุนายน
                                                </option>
                                                <option value="7" @if(date('m')==7){ selected } @endif> กรกฎาคม
                                                </option>
                                                <option value="8" @if(date('m')==8){ selected } @endif> สิงหาคม
                                                </option>
                                                <option value="9" @if(date('m')==9){ selected } @endif> กันยายน
                                                </option>
                                                <option value="10" @if(date('m')==10){ selected } @endif> ตุลาคม
                                                </option>
                                                <option value="11" @if(date('m')==11){ selected } @endif> พฤศจิกายน
                                                </option>
                                                <option value="12" @if(date('m')==12){ selected } @endif> ธันวาคม
                                                </option>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="column  ">
                                        วันที่
                                        <div class="select">
                                            <select id="DayInterview" name="DayInterview"
                                                onchange="createinterviewdate();">
                                                @for ($i = 1; $i <= 31; $i++) <option value="{{$i}}"
                                                    @if(date('d',strtotime(str_replace('-','/', $show_detail->
                                                    interview_date))) == $i){ selected } @endif>{{$i}}</option>
                                                    @endfor
                                            </select>
                                        </div>
                                    </div>

                                    <div class="column  is-3">
                                        <input type="hidden" id="DateInterview" name="DateInterview"
                                            class="form-control"
                                            value="{{date('m/d/Y',strtotime(str_replace('-','/', $show_detail->interview_date)))}}">
                                        <span class="glyphicon glyphicon-th"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-label ">
                                <label class="label"> วันเกิด </label>
                            </div>
                            <div class="field-body">
                                <div class="columns" data-provide="datepicker">
                                    <div class="column ">
                                        ปี พ.ศ.
                                        <input class="form-control input" type="number" min="2400" max="2570"
                                            maxlength="4" id="yearInput" name="yearInput" placeholder="ปปปป"
                                            value="{{date('Y',strtotime(str_replace('-','/', $show_detail->birth_date))) + 543 }}"
                                            onchange="date_birth();createbirthdate();">
                                    </div>
                                    <div class="column ">
                                        เดือน
                                        <div class="select">
                                            <select id="monthInput" name="monthdate"
                                                onchange="date_birth();createbirthdate();">
                                                <option value="1" @if(date('m',strtotime(str_replace('-','/',$show_detail->birth_date))) == 1){ selected } @endif> มกราคม</option>
                                                <option value="2" @if(date('m',strtotime(str_replace('-','/',$show_detail->birth_date))) == 2){ selected } @endif> กุมภาพันธ์</option>
                                                <option value="3" @if(date('m',strtotime(str_replace('-','/',$show_detail->birth_date))) == 3){ selected } @endif> มีนาคม
                                                </option>
                                                <option value="4" @if(date('m',strtotime(str_replace('-','/',$show_detail->birth_date))) == 4){ selected } @endif> เมษายน
                                                </option>
                                                <option value="5" @if(date('m',strtotime(str_replace('-','/',$show_detail->birth_date))) == 5){ selected } @endif> พฤษภาคม
                                                </option>
                                                <option value="6" @if(date('m',strtotime(str_replace('-','/',$show_detail->birth_date))) == 6){ selected } @endif> มิถุนายน
                                                </option>
                                                <option value="7" @if(date('m',strtotime(str_replace('-','/',$show_detail->birth_date))) == 7){ selected } @endif> กรกฎาคม
                                                </option>
                                                <option value="8" @if(date('m',strtotime(str_replace('-','/',$show_detail->birth_date))) == 8){ selected } @endif> สิงหาคม
                                                </option>
                                                <option value="9" @if(date('m',strtotime(str_replace('-','/',$show_detail->birth_date))) == 9){ selected } @endif> กันยายน
                                                </option>
                                                <option value="10" @if(date('m',strtotime(str_replace('-','/',$show_detail->birth_date))) == 10){ selected } @endif> ตุลาคม
                                                </option>
                                                <option value="11" @if(date('m',strtotime(str_replace('-','/',$show_detail->birth_date))) == 11){ selected } @endif> พฤศจิกายน
                                                </option>
                                                <option value="12" @if(date('m',strtotime(str_replace('-','/',$show_detail->birth_date))) == 12){ selected } @endif> ธันวาคม
                                                </option>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="column  ">
                                        วันที่
                                        <div class="select">
                                            <select id="dayInput" name="birthdate" onchange="createbirthdate();">
                                                @for ($i = 1; $i <= 31; $i++) <option value="{{$i}}"
                                                    @if(date('d',strtotime(str_replace('-','/', $show_detail->
                                                    birth_date))) == $i){ selected } @endif>{{$i}}</option>
                                                    @endfor
                                            </select>
                                        </div>
                                    </div>

                                    <div class="column  is-3">
                                        <input type="hidden" id="dateInput" name="birthdate" class="form-control"
                                            value="{{date('m/d/Y',strtotime(str_replace('-','/', $show_detail->birth_date)))}}">
                                        <span class="glyphicon glyphicon-th"></span>
                                    </div>
                                </div>
                                <div class="field-label is-normal">
                                    <label class="label"> อายุ </label>
                                </div>
                                <div class="field">
                                    <p class="control  ">
                                        <input class="input" name="age" id="age" value="{{$show_detail->age}}" readonly>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-label is-normal">
                                <label class="label">สถานะภาพสมรส</label>
                            </div>
                            <div class="field-body">
                                <div class="field">
                                    <label class="radio">
                                        @if( $show_detail->current_status == 1 )
                                        {{ Form::radio('marital-status', '1' , true) }}
                                        @else
                                        {{ Form::radio('marital-status', '1' , false) }}
                                        @endif
                                        โสด
                                    </label>
                                    &nbsp;
                                    <label class="radio">
                                        @if( $show_detail->current_status == 2 )
                                        {{ Form::radio('marital-status', '2' , true) }}
                                        @else
                                        {{ Form::radio('marital-status', '2' , false) }}
                                        @endif
                                        สมรส
                                    </label>
                                    &nbsp;
                                    <label class="radio">
                                        @if( $show_detail->current_status == 3 )
                                        {{ Form::radio('marital-status', '3' , true) }}
                                        @else
                                        {{ Form::radio('marital-status', '3' , false) }}
                                        @endif
                                        หม้าย/หย่า/แยก
                                    </label>
                                    &nbsp;
                                    <label class="radio">
                                        @if( $show_detail->current_status == 4 )
                                        {{ Form::radio('marital-status', '4' , true) }}
                                        @else
                                        {{ Form::radio('marital-status', '4' , false) }}
                                        @endif
                                        สมณะ
                                    </label>

                                </div>
                            </div>
                        </div>


                        <div class="field is-horizontal">
                            <div class="field-label">
                                <label class="label">อาชีพ</label>
                            </div>
                            <div class="field-body">
                                <div class="field is-narrow">
                                    <div class="control"> <span class="select">
                                            <select id="occupation" name="occupation">
                                                <option value="0" @if($show_detail->occupation == 0){ selected }
                                                    @endif>
                                                    โปรดเลือก </option>
                                                <option value="1" @if($show_detail->occupation == 1){ selected }
                                                    @endif>
                                                    ทำงานในหน่วยงานราชการ </option>
                                                <option value="2" @if($show_detail->occupation == 2){ selected }
                                                    @endif>
                                                    ทำงานในบริษัทเอกชน </option>
                                                <option value="3" @if($show_detail->occupation == 3){ selected }
                                                    @endif>
                                                    ทำงานในองค์กรพัฒนาเอกชน (NGO) </option>
                                                <option value="4" @if($show_detail->occupation == 4){ selected }
                                                    @endif>
                                                    ธุรกิจส่วนตัว </option>
                                                <option value="5" @if($show_detail->occupation == 5){ selected }
                                                    @endif>
                                                    รับจ้างทั่วไป </option>
                                                <option value="6" @if($show_detail->occupation == 6){ selected }
                                                    @endif>
                                                    เกษตรกร </option>
                                                <option value="7" @if($show_detail->occupation == 7){ selected }
                                                    @endif>
                                                    นักเรียน/นักศึกษา </option>
                                                <option value="8" @if($show_detail->occupation == 8){ selected }
                                                    @endif>
                                                    ว่างงาน </option>
                                                <option value="9" @if($show_detail->occupation == 9){ selected }
                                                    @endif>
                                                    อื่นๆ โปรดระบุ </option>
                                            </select>
                                        </span>
                                        <input class="input" id="occupation_detail" name="occupation_detail" type="text"
                                            value="{{$show_detail->occupation_detail}}" @if($show_detail->occupation !=
                                        9) style="display: none" @endif>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-label is-normal">
                                <label class="label"> ที่อยู่</label>
                            </div>
                            <div class="field-body">
                                <div class="field  is-grouped">
                                    <p class="control  is-expanded">
                                        <textarea class="textarea" name="address"
                                            placeholder="บ้านเลขที่ ซอย ถนน หมู่บ้าน ตำบล อำเภอ จังหวัด รหัสไปรษณีย์">{{$show_detail->address}}</textarea>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-label">
                                <label class="label">ประเภทบัตร</label>
                            </div>
                            <div class="field-body is-expanded">
                                <div class="field is-narrow ">
                                    <div class="control"> <span class="select">
                                            <select id="card_type" name="card_type">
                                                <option value="1" @if($show_detail->card_type == 1){ selected }
                                                    @endif>
                                                    บัตรประชาชน </option>
                                                <option value="2" @if($show_detail->card_type == 2){ selected }
                                                    @endif>
                                                    บัตรต่างด้าว </option>
                                                <option value="3" @if($show_detail->card_type == 3){ selected }
                                                    @endif>
                                                    บัตรคนไทยไร้สถานะ </option>
                                                <option value="4" @if($show_detail->card_type == 4){ selected }
                                                    @endif>
                                                    พาสปอร์ต </option>
                                            </select>
                                        </span>
                                    </div>
                                </div>
                                <div class="field-label is-normal">
                                    <label class="label">เลขที่บัตร</label>
                                </div>
                                <div class="field">
                                    <p class="control  has-icons-left has-icons-right">
                                        {!!
                                        Form::text('card_num',$show_detail->card_number,['class'=>'input','placeholder'
                                        => 'ID-CODE','maxlength' => 13 ])!!}
                                        {{--<input class="input" type="TEXT" name="card_num" placeholder="ID-CODE" value="{{$show_detail->card_number}}">--}}
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
                            <div class="field-label is-normal">
                                <label class="label"> หน่วยงานผู้ละเมิด </label>
                            </div>
                            <div class="field-body">
                                <div class="field is-narrow is-grouped">
                                    <div class="control"> <span class="select">
                                            <select id="offender_type" name="offender_type">
                                                <option value="0" @if($show_detail->type_offender == 0){ selected }
                                                    @endif> โปรดเลือก </option>
                                                <option value="1" @if($show_detail->type_offender == 1){ selected }
                                                    @endif> สถานพยาบาล </option>
                                                <option value="2" @if($show_detail->type_offender == 2){ selected }
                                                    @endif> สถานที่ทำงาน </option>
                                                <option value="3" @if($show_detail->type_offender == 3){ selected }
                                                    @endif> สถานศึกษา </option>
                                                <option value="4" @if($show_detail->type_offender == 4){ selected }
                                                    @endif> ตำรวจ </option>
                                                <option value="5" @if($show_detail->type_offender == 5){ selected }
                                                    @endif> ทหาร </option>
                                                <option value="6" @if($show_detail->type_offender == 6){ selected }
                                                    @endif> ท้องถิ่น </option>
                                                <option value="7" @if($show_detail->type_offender == 7){ selected }
                                                    @endif> หน่วยงานอื่นๆ </option>
                                            </select>
                                        </span>

                                    </div>
                                </div>
                                <div class="field is-narrow is-grouped">
                                    <div class="control"> <span class="select">
                                            <select id="offender_subtype" name="offender_subtype"
                                                @if($show_detail->type_offender == 4||$show_detail->type_offender ==
                                                5)
                                                disabled @endif>
                                                <option value="1" @if($show_detail->subtype_offender == 1){ selected
                                                    }
                                                    @endif> ของรัฐบาล </option>
                                                <option value="2" @if($show_detail->subtype_offender == 2){ selected
                                                    }
                                                    @endif> ของเอกชน </option>

                                            </select>
                                        </span>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-label is-normal">
                                <label class="label"> ผู้ละเมิด </label>
                            </div>
                            <div class="field-body">
                                <div class="field is-narrow is-grouped">
                                    <div class="control">
                                        <label class="radio">
                                            <input type="radio" name="type-violator" onclick="handleClick(this);"
                                                value="1" @if($show_detail->violator_name != ''){ checked } @endif >
                                            บุคคล
                                        </label>
                                    </div>
                                </div>
                                <div class="field is-narrow is-grouped">
                                    <div class="control">
                                        <label class="text">
                                            ชื่อ
                                        </label>
                                    </div>
                                    <div class="control">
                                        <p>
                                            <input class="input" type="text" id="violator_name" name="violator_name"
                                                @if($show_detail->violator_name != '')
                                            value="{{$show_detail->violator_name}}" @else disabled @endif>
                                        </p>
                                    </div>
                                </div>
                                <div class="field is-narrow is-grouped">
                                    <div class="control">
                                        <label class="text">
                                            หน่วยงาน
                                        </label>
                                    </div>
                                    <div class="control">
                                        <p>
                                            <input class="input" type="text" id="violator_organization"
                                                name="violator_organization" @if($show_detail->violator_name != '')
                                            value="{{$show_detail->violator_organization}}" @else disabled @endif>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-label">
                                <label class="label"> </label>
                            </div>
                            <div class="field-body">
                                <div class="field is-narrow is-grouped">
                                    <div class="control">
                                        <label class="radio">
                                            <input type="radio" name="type-violator" onclick="handleClick(this);"
                                                value="2" @if($show_detail->violator_name == ''){ checked } @endif>
                                            องค์กร
                                        </label>
                                    </div>
                                </div>
                                <div class="field is-narrow is-grouped">
                                    <div class="control">
                                        <label class="text">
                                            ชื่อ
                                        </label>
                                    </div>
                                    <div class="control">
                                        <p>
                                            <input class="input" type="text" id="offender_organization"
                                                name="offender_organization" @if($show_detail->violator_name == '')
                                            value="{{$show_detail->offender_organization}}" @else disabled @endif>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-label is-normal">
                                <label class="label"> สถานที่เกิดเหตุ </label>
                            </div>
                            <div class="field-body">
                                <div class="field">
                                    <div class="control">
                                        <textarea class="textarea" name="accident_location"
                                            placeholder="กรอกรายละเอียด">{{$show_detail->accident_location}}</textarea>
                                    </div>
                                </div>
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
                                        <input class=" input form-control" type="number" min="2561" max="2570"
                                            maxlength="4" id="YearAct" name="YearAct" placeholder="ปปปป"
                                            value="{{date('Y',strtotime(str_replace('-','/', $show_detail->accident_date))) + 543 }}"
                                            onchange="date_acc();createaccidentdate();">
                                    </div>
                                    <div class="column ">
                                        เดือน
                                        <div class="select">
                                            <select id="MonthAct" name="MonthAct"
                                                onchange="date_acc();createaccidentdate();">
                                                <option value="1" @if(date('m',strtotime(str_replace('-','/',$show_detail->accident_date))) == 1){ selected } @endif> มกราคม
                                                </option>
                                                <option value="2" @if(date('m',strtotime(str_replace('-','/',$show_detail->accident_date))) == 2){ selected } @endif> กุมภาพันธ์
                                                </option>
                                                <option value="3" @if(date('m',strtotime(str_replace('-','/',$show_detail->accident_date))) == 3){ selected } @endif> มีนาคม
                                                </option>
                                                <option value="4" @if(date('m',strtotime(str_replace('-','/',$show_detail->accident_date))) == 4){ selected } @endif> เมษายน
                                                </option>
                                                <option value="5" @if(date('m',strtotime(str_replace('-','/',$show_detail->accident_date))) == 5){ selected } @endif> พฤษภาคม
                                                </option>
                                                <option value="6" @if(date('m',strtotime(str_replace('-','/',$show_detail->accident_date))) == 6){ selected } @endif> มิถุนายน
                                                </option>
                                                <option value="7" @if(date('m',strtotime(str_replace('-','/',$show_detail->accident_date))) == 7){ selected } @endif> กรกฎาคม
                                                </option>
                                                <option value="8" @if(date('m',strtotime(str_replace('-','/',$show_detail->accident_date))) == 8){ selected } @endif> สิงหาคม
                                                </option>
                                                <option value="9" @if(date('m',strtotime(str_replace('-','/',$show_detail->accident_date))) == 9){ selected } @endif> กันยายน
                                                </option>
                                                <option value="10" @if(date('m',strtotime(str_replace('-','/',$show_detail->accident_date))) == 10){ selected } @endif> ตุลาคม
                                                </option>
                                                <option value="11" @if(date('m',strtotime(str_replace('-','/',$show_detail->accident_date))) == 11){ selected } @endif> พฤศจิกายน
                                                </option>
                                                <option value="12" @if(date('m',strtotime(str_replace('-','/',$show_detail->accident_date))) == 12){ selected } @endif> ธันวาคม
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="column  ">
                                        วันที่
                                        <div class="select">
                                            <select id="DayAct" name="DayAct" onchange="createaccidentdate();">
                                                @for ($i = 1; $i <= 31; $i++) <option value="{{$i}}"
                                                    @if(date('d',strtotime(str_replace('-','/', $show_detail->
                                                    accident_date))) == $i){ selected } @endif>{{$i}}</option>
                                                    @endfor
                                            </select>
                                        </div>
                                    </div>

                                    <div class="column  is-3">
                                        <input type="hidden" id="DateAct" name="DateAct" class="form-control"
                                            value="{{date('m/d/Y',strtotime(str_replace('-','/', $show_detail->accident_date)))}}">
                                        <span class="glyphicon glyphicon-th"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-label is-normal">
                                <label class="label"> รายละเอียดวันเวลาที่เกิดเหตุ </label>
                            </div>
                            <div class="field-body">
                                <div class="field">
                                    <div class="control">
                                        <textarea class="textarea" name="accident_time"
                                            placeholder="กรอกรายละเอียด">{{$show_detail->accident_time}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-label">
                                <!-- Left empty for spacing -->
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-label is-normal">
                                <label class="label"> ปัญหาที่แจ้ง</label>
                            </div>
                            <div class="field-body">
                                <div class="field is-narrow is-grouped">
                                    <div class="control"> <span class="select">
                                            <select id="problem_case" name="problem_case">
                                                <option value="0">โปรดเลือกประเภทปัญหาของท่าน</option>
                                                <option value="1" @if($show_data->problem_case == 1){ selected }
                                                    @endif>บังคับตรวจเอชไอวี</option>
                                                <option value="2" @if($show_data->problem_case == 2){ selected }
                                                    @endif>เปิดเผยสถานะการติดเชื้อเอชไอวี</option>
                                                <option value="3" @if($show_data->problem_case == 3){ selected }
                                                    @endif>ถูกกีดกันหรือถูกเลือกปฏิบัติเนื่องมาจาการติดเชื้อเอชไอวี
                                                </option>
                                                <option value="4" @if($show_data->problem_case == 4){ selected }
                                                    @endif>ถูกกีดกันหรือถูกเลือกปฏิบัติเนื่องมาจากเป็นกลุ่มเปราะบาง
                                                </option>
                                                <option value="5" @if($show_data->problem_case == 5){ selected }
                                                    @endif>อื่นๆ ที่เกี่ยวข้องกับเอชไอวี</option>
                                                <option value="6" @if($show_data->problem_case == 6){ selected }
                                                    @endif>กรณีอื่นๆ ที่ไม่เกี่ยวข้องกับเอชไอวี</option>

                                            </select>
                                        </span>
                                    </div>
                                </div>
                                <div class="field is-narrow is-grouped">
                                    <div class="control"> <span class="select">
                                            <select id="sub_problem" name="sub_problem" @if($show_data->sub_problem
                                                ==
                                                null){ disabled } @endif>
                                                @if(($show_data->problem_case == 1)||($show_data->problem_case ==
                                                5)||($show_data->problem_case == 6))
                                                <option value="1" style="width:250px" @if($show_data->sub_problem ==
                                                    1){
                                                    selected } @endif>ผู้ติดเชื้อเอชไอวี</option>
                                                <option value="2" style="width:250px" @if($show_data->sub_problem ==
                                                    2){
                                                    selected } @endif>กลุ่มเปราะบาง</option>
                                                <option value="4" style="width:250px" @if($show_data->sub_problem ==
                                                    4){
                                                    selected } @endif>ครอบครัวและผู้ใกล้ชิดผู้ติดเชื้อเอชไอวี
                                                </option>
                                                <option value="3" style="width:250px" @if($show_data->sub_problem ==
                                                    3){
                                                    selected } @endif>ประชาชนทั่วไป</option>
                                                @elseif($show_data->problem_case == 2 )
                                                <option value="1" style="width:250px">ผู้ติดเชื้อเอชไอวี</option>
                                                @elseif($show_data->problem_case == 3)
                                                <option value="1" style="width:250px" @if($show_data->sub_problem ==
                                                    1){
                                                    selected } @endif>ผู้ติดเชื้อเอชไอวี</option>
                                                <option value="4" style="width:250px" @if($show_data->sub_problem ==
                                                    4){
                                                    selected } @endif>ครอบครัวและผู้ใกล้ชิดผู้ติดเชื้อเอชไอวี
                                                </option>

                                                @elseif($show_data->problem_case == 4)
                                                <option value="2" style="width:250px">กลุ่มเปราะบาง</option>

                                                @endif
                                            </select>
                                        </span>
                                    </div>
                                </div>
                                <div class="field is-narrow is-grouped">
                                    <div class="control"> <span class="select">
                                            <select id="group_code" name="group_code" @if($show_data->group_code ==
                                                null){ disabled } @endif>
                                                @if($show_data->sub_problem == 2)
                                                <option value="1" style="width:250px" @if($show_data->group_code ==
                                                    1){
                                                    selected } @endif>กลุ่มหลากหลายทางเพศ</option>
                                                <option value="2" style="width:250px" @if($show_data->group_code ==
                                                    2){
                                                    selected } @endif>พนักงานบริการ</option>
                                                <option value="3" style="width:250px" @if($show_data->group_code ==
                                                    3){
                                                    selected } @endif>ผู้ใช้สารเสพติด</option>
                                                <option value="4" style="width:250px" @if($show_data->group_code ==
                                                    4){
                                                    selected } @endif>ประชากรข้ามชาติ</option>
                                                <option value="5" style="width:250px" @if($show_data->group_code ==
                                                    5){
                                                    selected } @endif>ผู้ต้องขัง</option>
                                                <option value="6" style="width:250px" @if($show_data->group_code ==
                                                    6){
                                                    selected } @endif>กลุ่มชนเผ่า</option>
                                                <option value="7" style="width:250px" @if($show_data->group_code ==
                                                    7){
                                                    selected } @endif>คนพิการ</option>
                                                @endif
                                            </select>
                                        </span>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-label is-normal">
                                <label class="label"> ลักษณะการละเมิด </label>
                            </div>
                            <div class="field-body">
                                <div class="field">
                                    <div class="control">
                                        <textarea class="textarea" name="violation_characteristics"
                                            placeholder="กรอกรายละเอียด">{{$show_detail->violation_characteristics}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-label is-normal">
                                <label class="label"> ผลกระทบ </label>
                            </div>
                            <div class="field-body">
                                <div class="field">
                                    <div class="control">
                                        <textarea class="textarea" name="effect"
                                            placeholder="กรอกรายละเอียด">{{$show_detail->effect}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--div class="field is-horizontal">
                            <div class="field-label is-normal">
                                <label class="label">สาเหตุ</label>
                            </div>
                            <div class="field-body">
                                <div class="field">

                                    <label class="radio">
                                        <input type="checkbox" name="law" @if($show_detail->cause_type1 == 1){
                                            checked } @endif>
                                            ไม่รู้กฎหมาย
                                    </label>
                                    &nbsp;

                                    <label class="radio">
                                    <input type="checkbox" name="aids" @if($show_detail->cause_type2 == 1){
                                            checked } @endif>
                                            ขาดความเข้าใจที่ถูกต้องเรื่องเอดส์
                                    </label>
                                    &nbsp;

                                    <label class="radio">
                                        <input type="checkbox" name="attitude" @if($show_detail->cause_type3 ==
                                            1){ checked } @endif>
                                            ทัศนคติ
                                    </label>
                                    &nbsp;

                                    <label class="radio">
                                        <input type="checkbox" name="policy" @if($show_detail->cause_type4 ==
                                            1){
                                            checked } @endif>
                                            นโยบายองค์กร
                                    </label>
                                    <br>

                                    <label class="radio">
                                        <input type="checkbox" name="etc" @if($show_detail->etc == 1){ checked }
                                            @endif>
                                            อื่นๆ ระบุ
                                    </label>

                                    <input name="etc_detail" class="input" type="text" placeholder=""
                                                value="{{$show_detail->etc_detail}}" @if($show_detail->occupation !=
                                            1)
                                            style="display: none" @endif>
                                </div>
                            </div>
                        </!--div-->


                        <div class="field is-horizontal">
                            <div class="field-label is-normal">
                                <label class="label"> </label>
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-label">
                                <!-- Left empty for spacing -->
                            </div>
                        </div>
                    </div>

                    <div class="field is-grouped">

                        @if (Auth::user()->p_receive == 'no')
                        @elseif (Auth::user()->p_receive == 'yes')
                        <p class="control"> {!! Form::submit('ยืนยัน',['class'=>'button is-primary']) !!}</p>
                        @endif

                        <p class="control"> <a class="button" href="{{ route('officer.show',['mode_id' => "0"]) }}">
                                ยกเลิก </a> </p>
                    </div>
                </form>

            </div>
        </div>

    </div>

    {{ Html::script('js/select_list.js') }}

    <script>
    //        $('.datepicker').datepicker({
    //            onSelect: function(){
    //               // alert("test");
    //            }
    //        });

    function createbirthdate() {

        $('#dateInput').val($('#monthInput').val() + "/" + $('#dayInput').val() + "/" + ($('#yearInput').val() - 543));
        var dob = $('#dateInput').val();
        dob = new Date(dob);
        var today = new Date();
        var age = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000));
        $("#age").val(age);

    }

    function createinterviewdate() {

        $('#DateInterview').val($('#MonthInterview').val() + "/" + $('#DayInterview').val() + "/" + ($('#YearInterview')
            .val() - 543));

    }

    function createaccidentdate() {

        $('#DateAct').val($('#MonthAct').val() + "/" + $('#DayAct').val() + "/" + ($('#YearAct').val() - 543));

    }
    $('#offender_type').on('change', function(e) {

        var sel_value = e.target.value;
        //alert(sel_value);

        if ((sel_value == 4) || (sel_value == 5)) {
            document.getElementById("offender_subtype").disabled = true;
        } else {
            document.getElementById("offender_subtype").disabled = false;
        }
    });
    ///// show and hide even btn ///////
    $('#occupation').on('change', function(e) {

        var sel_value = e.target.value;
        //alert(sel_value);

        if (sel_value == 9) {
            $('#occupation_detail').show();
        } else {
            $('#occupation_detail').hide();
        }
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
    $("input[name='etc']").on('change', function(e) {

        var sel_value = e.target.checked;
        //alert(sel_value);
        if (sel_value) {
            $("input[name='etc_detail']").show();
        } else {
            $("input[name='etc_detail']").hide();
        }
    });
    ///// end show and hide even btn ///////
    /*
     $('#type-violator').on('click change',function (e) {
     var type_id = e.target.value;
     console.log(e.type);
     });*/
    function handleClick(myRadio) {
        if (myRadio.value == 1) {
            document.getElementById("offender_organization").disabled = true;
            document.getElementById("violator_name").disabled = false;
            document.getElementById("violator_organization").disabled = false;
        } else if (myRadio.value == 2) {
            document.getElementById("offender_organization").disabled = false;
            document.getElementById("violator_name").disabled = true;
            document.getElementById("violator_organization").disabled = true;

        }

        //alert('New value: ' + myRadio.value);
        //currentValue = myRadio.value;
    }
    </script>

    <br>

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

<script>
function copyurl() {
    // Get the text field
    var copyText = document.getElementById("url_view_detail");

    copyText.select();
    copyText.setSelectionRange(0, 99999); // For mobile devices

    // Copy the text inside the text field
    navigator.clipboard.writeText(copyText.value);

}
</script>


</html>