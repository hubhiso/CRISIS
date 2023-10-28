<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.2/css/bulma.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bm/jq-3.6.0/dt-1.11.3/datatables.min.css" />

    <link href="{{ asset('bulma-0.9.0/css/bulma.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mystyles.css') }}" rel="stylesheet">
    <script src="{{ asset('css/jquery.min.js') }}"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" crossorigin="anonymous">

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

    <div class="container is-fluid">

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
                                <i class="fa fa-users"></i>
                            </span>
                            <span>จัดการรายชื่อ</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <div class="content">
                <h3>
                    <sapn class="has-text-danger"><i class="fa fa-users"></i></sapn>
                    &nbsp;จัดการรายเคส
                </h3>

                <div class="level">
                    <div class="level-left">


                    </div>
                    <div class="level-right">
                        <a class="button is-danger is-rounded" href="#"><i class="fa fa-history"
                                aria-hidden="true"></i>&nbsp;ประวัติการจัดการ</a>
                    </div>
                </div>

                <div class=" table-container">
                    <table id="table_m" class="table panel is-bordered is-striped  is-hoverable is-fullwidth"
                        style="width: 4000px">
                        <thead>
                            <tr class="is-selected has-background-danger ">
                                <td>ลำดับ</td>
                                <td>Action</td>
                                <td>เขต</td>
                                <td>จังหวัด</td>
                                <td style="white-space: nowrap;">รหัสเคส</td>
                                <td>เพศ</td>
                                <td>สัญชาติ</td>
                                <td style="white-space: nowrap;">ปัญหาที่แจ้ง</td>
                                <td style="white-space: nowrap;">ประเภทกลุ่ม</td>
                                <td style="white-space: nowrap;">ประเภทกลุ่มย่อย</td>

                                <td style="white-space: nowrap;">ลักษณะการละเมิด</td>
                                <td>ผลกระทบ</td>
                                <td style="white-space: nowrap;">รายละเอียดของปัญหา</td>
                                <td style="white-space: nowrap;">ความต้องการความช่วยเหลือ</td>

                                <td style="white-space: nowrap;">วันที่เกิดเหตุ</td>
                                <td>วันที่แจ้งเหตุ</td>

                                <td>ผู้รับเคส</td>

                                <td style="white-space: nowrap;">วันที่ดำเนินการ</td>
                                <td style="white-space: nowrap;">หน่วยงานผู้ละเมิด</td>
                                <td style="white-space: nowrap;">ของรัฐบาลหรือของเอกชน</td>
                                <td style="white-space: nowrap;">บุคคล</td>
                                <td style="white-space: nowrap;">องค์กร</td>
                                <td style="white-space: nowrap;">รายละเอียดการดำเนินการ</td>
                                <td style="white-space: nowrap;">ผลการดำเนินการ</td>
                                <td>สถานะ</td>
                                <td style="white-space: nowrap;">ผลการดำเนินการเสร็จสิ้น</td>
                                <td>สาเหตุปฏิเสธ</td>
                            </tr>
                        </thead>

                        <tbody>

                            <?php $i=0; ?>
                            @foreach($show_data as $show)
                            <?php $i++; $list_lopp = $i; ?>
                            <tr>
                                <td>{{$i}}</td>
                                <td class="has-text-danger has-text-centered">
                                    <a class="tag is-danger" onclick="show_modal({{$i}})" href="#"> แก้ไข </a>

                                    <div id="modal{{$i}}" class="modal has-text-left">
                                        <div class="modal-background"></div>
                                        <div class="modal-card">
                                            <header class="modal-card-head">
                                                <p class="modal-card-title">แก้ไขข้อมูลเคส </p>
                                                <button class="delete" aria-label="close"></button>
                                            </header>
                                            <section class="modal-card-body">

                                                <div class="columns">
                                                    <div class="column">
                                                        <div class="field">
                                                            <label class="label">รหัสเคส</label>
                                                            <div class="control">
                                                                <p
                                                                    class="control is-expanded has-icons-left has-icons-right">
                                                                    <input class="input" type="text"
                                                                        value="{{$show->case_id}}" disabled>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="columns">
                                                    <div class="column">
                                                        <div class="field">
                                                            <label class="label">เขต</label>
                                                            <div class="control">
                                                                <p
                                                                    class="control is-expanded has-icons-left has-icons-right">
                                                                    <input class="input" type="text"
                                                                        value="{{$show->nhso}}" disabled>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="column">
                                                        <div class="field">
                                                            <label class="label">จังหวัด</label>
                                                            <div class="control">
                                                                <p
                                                                    class="control is-expanded has-icons-left has-icons-right">
                                                                    <input class="input" type="text"
                                                                        value="{{$show->provname}}" disabled>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="columns">
                                                    <div class="column">
                                                        <div class="field">
                                                            <label class="label">เพศ</label>
                                                            <div class="control">
                                                                <p
                                                                    class="control is-expanded has-icons-left has-icons-right">
                                                                    <input class="input" type="text" value="<?php 
                                                                        if($show->sex == 1){
                                                                            echo "ชาย";
                                                                        }else if($show->sex == 2){
                                                                            echo "หญิง";
                                                                        }else if($show->sex == 3){
                                                                            echo "สาวประเภทสอง";
                                                                        }else if($show->sex == 4){
                                                                            echo "อื่นๆ";
                                                                        }
                                                                        ?>" disabled>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="column">
                                                        <div class="field">
                                                            <label class="label">สัญชาติ</label>
                                                            <div class="control">
                                                                <p
                                                                    class="control is-expanded has-icons-left has-icons-right">
                                                                    <input class="input" type="text" value="<?php 
                                                                        if($show->nation == 1){
                                                                            echo "ไทย";
                                                                        }else if($show->nation == 2){
                                                                            echo "ลาว";
                                                                        }else if($show->nation == 3){
                                                                            echo "เวียดนาม";
                                                                        }else if($show->nation == 4){
                                                                            echo "พม่า";
                                                                        }else if($show->nation == 5){
                                                                            echo "กัมพูชา";
                                                                        }else if($show->nation == 6){
                                                                            echo "อื่นๆ";
                                                                        }else if($show->nation == 7){
                                                                            echo "ไร้สัญชาติ/ไม่มีสถานะบุคคล";
                                                                        }
                                                                        ?>" disabled>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="columns">
                                                    <div class="column">
                                                        <div class="field">
                                                            <label class="label">ปัญหาที่แจ้ง</label>
                                                            <div class="control">
                                                                <span class="select">
                                                                    <select id="problem_case<?php echo $i; ?>"
                                                                        name="problem_case">
                                                                        <option value="1"
                                                                            <?php if(($show->id_problem_case) == 0 ){ echo "selected";} ?>>
                                                                            {{ trans('message.se_problem_1') }}</option>
                                                                        <option value="2"
                                                                            <?php if(($show->id_problem_case) == 0 ){ echo "selected";} ?>>
                                                                            {{ trans('message.se_problem_2') }}</option>
                                                                        <option value="3"
                                                                            <?php if(($show->id_problem_case) == 0 ){ echo "selected";} ?>>
                                                                            {{ trans('message.se_problem_3') }}</option>
                                                                        <option value="4"
                                                                            <?php if(($show->id_problem_case) == 0 ){ echo "selected";} ?>>
                                                                            {{ trans('message.se_problem_4') }}</option>
                                                                        <option value="5"
                                                                            <?php if(($show->id_problem_case) == 0 ){ echo "selected";} ?>>
                                                                            {{ trans('message.se_problem_5') }}</option>
                                                                        <option value="6"
                                                                            <?php if(($show->id_problem_case) == 0 ){ echo "selected";} ?>>
                                                                            {{ trans('message.se_problem_6') }}</option>
                                                                    </select>

                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="columns">
                                                    <div class="column">
                                                        <div class="field">
                                                            <label class="label">ประเภทกลุ่ม</label>
                                                            <div class="control">
                                                                <span class="select">
                                                                    <select id="sub_problem<?php echo $i; ?>"
                                                                        name="sub_problem" @if($show->id_sub_problem == null){ disabled } @endif >
                                                                        @if(($show->id_problem_case == 1)||($show->id_problem_case == 5)||($show->id_problem_case == 6))
                                                                        <option value="1" @if($show->id_sub_problem == 1){ selected } @endif>ผู้ติดเชื้อเอชไอวี
                                                                        </option>
                                                                        <option value="2" @if($show->id_sub_problem ==
                                                                            2){ selected } @endif>กลุ่มเปราะบาง
                                                                        </option>
                                                                        <option value="4" @if($show->id_sub_problem ==
                                                                            4){ selected }
                                                                            @endif>ครอบครัวและผู้ใกล้ชิดผู้ติดเชื้อเอชไอวี
                                                                        </option>
                                                                        <option value="3" @if($show->id_sub_problem ==
                                                                            3){ selected } @endif>ประชาชนทั่วไป
                                                                        </option>
                                                                        @elseif($show->id_problem_case == 2 )
                                                                        <option value="1">
                                                                            ผู้ติดเชื้อเอชไอวี</option>
                                                                        @elseif($show->id_problem_case == 3)
                                                                        <option value="1" @if($show->id_sub_problem ==
                                                                            1){ selected } @endif>ผู้ติดเชื้อเอชไอวี
                                                                        </option>
                                                                        <option value="4" @if($show->id_sub_problem ==
                                                                            4){ selected }
                                                                            @endif>ครอบครัวและผู้ใกล้ชิดผู้ติดเชื้อเอชไอวี
                                                                        </option>
                                                                        @elseif($show->id_problem_case == 4)
                                                                        <option value="2">
                                                                            กลุ่มเปราะบาง</option>
                                                                        @endif
                                                                    </select>

                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="columns">
                                                    <div class="column">
                                                        <div class="field">
                                                            <label class="label">ประเภทกลุ่มย่อย</label>
                                                            <div class="control">
                                                                <span class="select">

                                                                    <select id="group_code<?php echo $i; ?>"
                                                                        name="group_code" @if($show->id_group_code ==
                                                                        null){ disabled } @endif>
                                                                        @if($show->id_sub_problem == 2)
                                                                        <option value="1" @if($show->id_group_code ==
                                                                            1){ selected } @endif>กลุ่มหลากหลายทางเพศ
                                                                        </option>
                                                                        <option value="2" @if($show->id_group_code ==
                                                                            2){ selected } @endif>พนักงานบริการ
                                                                        </option>
                                                                        <option value="3" @if($show->id_group_code ==
                                                                            3){ selected } @endif>ผู้ใช้สารเสพติด
                                                                        </option>
                                                                        <option value="4" @if($show->id_group_code ==
                                                                            4){ selected } @endif>ประชากรข้ามชาติ
                                                                        </option>
                                                                        <option value="5" @if($show->id_group_code ==
                                                                            5){ selected } @endif>ผู้ต้องขัง
                                                                        </option>
                                                                        <option value="6" @if($show->id_group_code ==
                                                                            6){ selected } @endif>กลุ่มชนเผ่า
                                                                        </option>
                                                                        <option value="7" @if($show->id_group_code ==
                                                                            7){ selected } @endif>คนพิการ</option>
                                                                        @endif
                                                                    </select>

                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="columns">
                                                    <div class="column">
                                                        <div class="field">
                                                            <label class="label">ลักษณะการละเมิด</label>
                                                            <div class="control">
                                                                <p class="control is-expanded has-icons-left
                                                                    has-icons-right">
                                                                    <textarea class="textarea"
                                                                        disabled>{{$show->violation_characteristics}}</textarea>
                                                                    </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="columns">
                                                    <div class="column">
                                                        <div class="field">
                                                            <label class="label">ผลกระทบ</label>
                                                            <div class="control">
                                                                <p class="control is-expanded has-icons-left
                                                                    has-icons-right">
                                                                    <textarea class="textarea"
                                                                        disabled>{{$show->effect}}</textarea>
                                                                    </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="columns">
                                                    <div class="column">
                                                        <div class="field">
                                                            <label class="label">รายละเอียดของปัญหา</label>
                                                            <div class="control">
                                                                <p class="control is-expanded has-icons-left
                                                                    has-icons-right">
                                                                    <textarea class="textarea"
                                                                        disabled>{{$show->detail}}</textarea>
                                                                    </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="columns">
                                                    <div class="column">
                                                        <div class="field">
                                                            <label class="label">ความต้องการความช่วยเหลือ</label>
                                                            <div class="control">
                                                                <p class="control is-expanded has-icons-left
                                                                    has-icons-right">
                                                                    <textarea class="textarea"
                                                                        disabled>{{$show->need}}</textarea>
                                                                    </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="columns">
                                                    <div class="column">
                                                        <div class="field">
                                                            <label class="label">วันที่เกิดเหตุ</label>
                                                            <div class="control">
                                                                <div class="columns" data-provide="datepicker">
                                                                    <div class="column ">
                                                                        ปี พ.ศ.
                                                                        <input class=" input form-control" type="number"  min="2561" max="2570" maxlength="4"
                                                                            id="YearAct{{$i}}" name="YearAct" placeholder="ปปปป"
                                                                            value="{{date('Y',strtotime(str_replace('-','/', $show->accident_date))) + 543 }}"
                                                                            onchange="//date_acc();createaccidentdate();">
                                                                    </div>
                                                                    <div class="column ">
                                                                        เดือน
                                                                        <div class="select">
                                                                            <select id="MonthAct{{$i}}" name="MonthAct"
                                                                                onchange="//date_acc();createaccidentdate();">
                                                                                <option value="1" 
                                                                                    @if(date('m',strtotime(str_replace('-','/',$show->accident_date))) == 1){ selected } @endif> มกราคม
                                                                                </option>
                                                                                <option value="2" 
                                                                                    @if(date('m',strtotime(str_replace('-','/',$show->accident_date))) == 2){ selected } @endif> กุมภาพันธ์
                                                                                </option>
                                                                                <option value="3"
                                                                                    @if(date('m',strtotime(str_replace('-','/',$show->accident_date))) == 3){ selected } @endif> มีนาคม
                                                                                </option>
                                                                                <option value="4"
                                                                                    @if(date('m',strtotime(str_replace('-','/',$show->accident_date))) == 4){ selected } @endif> เมษายน
                                                                                </option>
                                                                                <option value="5"
                                                                                    @if(date('m',strtotime(str_replace('-','/',$show->accident_date))) == 5){ selected } @endif> พฤษภาคม
                                                                                </option>
                                                                                <option value="6"
                                                                                    @if(date('m',strtotime(str_replace('-','/',$show->accident_date))) == 6){ selected } @endif> มิถุนายน
                                                                                </option>
                                                                                <option value="7"
                                                                                    @if(date('m',strtotime(str_replace('-','/',$show->accident_date))) == 7){ selected } @endif> กรกฎาคม
                                                                                </option>
                                                                                <option value="8"
                                                                                    @if(date('m',strtotime(str_replace('-','/',$show->accident_date))) == 8){ selected } @endif> สิงหาคม
                                                                                </option>
                                                                                <option value="9"
                                                                                    @if(date('m',strtotime(str_replace('-','/',$show->accident_date))) == 9){ selected } @endif> กันยายน
                                                                                </option>
                                                                                <option value="10"
                                                                                    @if(date('m',strtotime(str_replace('-','/',$show->accident_date))) == 10){ selected } @endif> ตุลาคม
                                                                                </option>
                                                                                <option value="11"
                                                                                    @if(date('m',strtotime(str_replace('-','/',$show->accident_date))) == 11){ selected } @endif> พฤศจิกายน
                                                                                </option>
                                                                                <option value="12"
                                                                                    @if(date('m',strtotime(str_replace('-','/',$show->accident_date))) == 12){ selected } @endif> ธันวาคม
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="column  ">
                                                                        วันที่<br>
                                                                        <div class="select">
                                                                            <select id="DayAct{{$i}}" name="DayAct"
                                                                                onchange="createaccidentdate();">
                                                                                @for ($j = 1; $j <= 31; $j++) 
                                                                                    <option value="{{$j}}"
                                                                                    @if(date('d',strtotime(str_replace('-','/',$show->accident_date))) == $j){ selected } @endif>{{$j}}</option>
                                                                                @endfor
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="column  is-3">
                                                                        <input type="hidden" id="DateAct{{$i}}" name="DateAct"
                                                                            class="form-control"
                                                                            value="{{date('m/d/Y',strtotime(str_replace('-','/', $show->accident_date)))}}">
                                                                        <span class="glyphicon glyphicon-th"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="columns">
                                                    <div class="column">
                                                        <div class="field">
                                                            <label class="label">วันที่แจ้งเหตุ</label>
                                                            <div class="control">
                                                                <div class="columns" data-provide="datepicker">
                                                                    <div class="column ">
                                                                        ปี พ.ศ.
                                                                        <input class=" input form-control" type="number"
                                                                            min="2561" max="2570" maxlength="4"
                                                                            id="YearCre{{$i}}" name="YearCre"
                                                                            placeholder="ปปปป"
                                                                            value="{{date('Y',strtotime(str_replace('-','/', $show->datecreate))) + 543 }}"
                                                                            disabled>
                                                                    </div>
                                                                    <div class="column ">
                                                                        เดือน
                                                                        <div class="select">
                                                                            <select id="MonthCre{{$i}}" name="MonthCre" disabled>
                                                                                <option value="1" 
                                                                                    @if(date('m',strtotime(str_replace('-','/',$show->datecreate))) == 1){ selected } @endif> มกราคม
                                                                                </option>
                                                                                <option value="2" 
                                                                                    @if(date('m',strtotime(str_replace('-','/',$show->datecreate))) == 2){ selected } @endif> กุมภาพันธ์
                                                                                </option>
                                                                                <option value="3"
                                                                                    @if(date('m',strtotime(str_replace('-','/',$show->datecreate))) == 3){ selected } @endif> มีนาคม
                                                                                </option>
                                                                                <option value="4"
                                                                                    @if(date('m',strtotime(str_replace('-','/',$show->datecreate))) == 4){ selected } @endif> เมษายน
                                                                                </option>
                                                                                <option value="5"
                                                                                    @if(date('m',strtotime(str_replace('-','/',$show->datecreate))) == 5){ selected } @endif> พฤษภาคม
                                                                                </option>
                                                                                <option value="6"
                                                                                    @if(date('m',strtotime(str_replace('-','/',$show->datecreate))) == 6){ selected } @endif> มิถุนายน
                                                                                </option>
                                                                                <option value="7"
                                                                                    @if(date('m',strtotime(str_replace('-','/',$show->datecreate))) == 7){ selected } @endif> กรกฎาคม
                                                                                </option>
                                                                                <option value="8"
                                                                                    @if(date('m',strtotime(str_replace('-','/',$show->datecreate))) == 8){ selected } @endif> สิงหาคม
                                                                                </option>
                                                                                <option value="9"
                                                                                    @if(date('m',strtotime(str_replace('-','/',$show->datecreate))) == 9){ selected } @endif> กันยายน
                                                                                </option>
                                                                                <option value="10"
                                                                                    @if(date('m',strtotime(str_replace('-','/',$show->datecreate))) == 10){ selected } @endif> ตุลาคม
                                                                                </option>
                                                                                <option value="11"
                                                                                    @if(date('m',strtotime(str_replace('-','/',$show->datecreate))) == 11){ selected } @endif> พฤศจิกายน
                                                                                </option>
                                                                                <option value="12"
                                                                                    @if(date('m',strtotime(str_replace('-','/',$show->datecreate))) == 12){ selected } @endif> ธันวาคม
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="column  ">
                                                                        วันที่<br>
                                                                        <div class="select">
                                                                            <select id="DayCre{{$i}}" name="DayCre" disabled>
                                                                                @for ($j = 1; $j <= 31; $j++) 
                                                                                    <option value="{{$j}}"
                                                                                    @if(date('d',strtotime(str_replace('-','/',$show->datecreate))) == $j){ selected } @endif>{{$j}}</option>
                                                                                @endfor
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="column  is-3">
                                                                        <input type="hidden" id="DateCre{{$i}}" name="DateCre"
                                                                            class="form-control"
                                                                            value="{{date('m/d/Y',strtotime(str_replace('-','/', $show->datecreate)))}}">
                                                                        <span class="glyphicon glyphicon-th"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="columns">
                                                    <div class="column">
                                                        <div class="field">
                                                            <label class="label">ผู้รับเคส</label>
                                                            <div class="control">
                                                                <p
                                                                    class="control is-expanded has-icons-left has-icons-right">
                                                                    <input class="input" type="text"
                                                                        value="{{$show->receiver}}" disabled>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="columns">
                                                    <div class="column">
                                                        <div class="field">
                                                            <label class="label">วันที่ดำเนินการ</label>
                                                            <div class="control">
                                                                <div class="columns" data-provide="datepicker">
                                                                    <div class="column ">
                                                                        ปี พ.ศ.
                                                                        <input class=" input form-control" type="number"
                                                                            min="2561" max="2570" maxlength="4"
                                                                            id="YearOp{{$i}}" name="YearOp" placeholder="ปปปป"
                                                                            value="{{date('Y',strtotime(str_replace('-','/', $show->operatedate))) + 543 }}"
                                                                            onchange="//date_op();createaccidentdate();">
                                                                    </div>
                                                                    <div class="column ">
                                                                        เดือน
                                                                        <div class="select">
                                                                            <select id="MonthOp{{$i}}" name="MonthOp" onchange="//date_op();createaccidentdate();">

                                                                                <option value="1" 
                                                                                    @if(date('m',strtotime(str_replace('-','/',$show->operatedate))) == 1){ selected } @endif> มกราคม
                                                                                </option>
                                                                                <option value="2" 
                                                                                    @if(date('m',strtotime(str_replace('-','/',$show->operatedate))) == 2){ selected } @endif> กุมภาพันธ์
                                                                                </option>
                                                                                <option value="3"
                                                                                    @if(date('m',strtotime(str_replace('-','/',$show->operatedate))) == 3){ selected } @endif> มีนาคม
                                                                                </option>
                                                                                <option value="4"
                                                                                    @if(date('m',strtotime(str_replace('-','/',$show->operatedate))) == 4){ selected } @endif> เมษายน
                                                                                </option>
                                                                                <option value="5"
                                                                                    @if(date('m',strtotime(str_replace('-','/',$show->operatedate))) == 5){ selected } @endif> พฤษภาคม
                                                                                </option>
                                                                                <option value="6"
                                                                                    @if(date('m',strtotime(str_replace('-','/',$show->operatedate))) == 6){ selected } @endif> มิถุนายน
                                                                                </option>
                                                                                <option value="7"
                                                                                    @if(date('m',strtotime(str_replace('-','/',$show->operatedate))) == 7){ selected } @endif> กรกฎาคม
                                                                                </option>
                                                                                <option value="8"
                                                                                    @if(date('m',strtotime(str_replace('-','/',$show->operatedate))) == 8){ selected } @endif> สิงหาคม
                                                                                </option>
                                                                                <option value="9"
                                                                                    @if(date('m',strtotime(str_replace('-','/',$show->operatedate))) == 9){ selected } @endif> กันยายน
                                                                                </option>
                                                                                <option value="10"
                                                                                    @if(date('m',strtotime(str_replace('-','/',$show->operatedate))) == 10){ selected } @endif> ตุลาคม
                                                                                </option>
                                                                                <option value="11"
                                                                                    @if(date('m',strtotime(str_replace('-','/',$show->operatedate))) == 11){ selected } @endif> พฤศจิกายน
                                                                                </option>
                                                                                <option value="12"
                                                                                    @if(date('m',strtotime(str_replace('-','/',$show->operatedate))) == 12){ selected } @endif> ธันวาคม
                                                                                </option>

                                                                                
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="column  ">
                                                                        วันที่<br>
                                                                        <div class="select">
                                                                            <select id="DayOp{{$i}}" name="DayOp"
                                                                                onchange="createaccidentdate();">
                                                                                @for ($j = 1; $j <= 31; $j++) <option
                                                                                    value="{{$j}}"
                                                                                    @if(date('d',strtotime(str_replace('-','/',$show->operatedate))) == $j){ selected }
                                                                                    @endif>{{$j}}</option>
                                                                                @endfor
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="column  is-3">
                                                                        <input type="hidden" id="Dateop{{$i}}" name="DateOp"
                                                                            class="form-control"
                                                                            value="{{date('m/d/Y',strtotime(str_replace('-','/', $show->operatedate)))}}">
                                                                        <span class="glyphicon glyphicon-th"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="columns">
                                                    <div class="column">
                                                        <div class="field">
                                                            <label class="label">หน่วยงานผู้ละเมิด</label>
                                                            <div class="control">
                                                                <div class="select">
                                                                    <select id="offender_type" name="offender_type">
                                                                        <option value="0" @if($show->type_offender ==
                                                                            0){ selected }
                                                                            @endif> โปรดเลือก </option>
                                                                        <option value="1" @if($show->type_offender ==
                                                                            1){ selected }
                                                                            @endif> สถานพยาบาล </option>
                                                                        <option value="2" @if($show->type_offender ==
                                                                            2){ selected }
                                                                            @endif> สถานที่ทำงาน </option>
                                                                        <option value="3" @if($show->type_offender ==
                                                                            3){ selected }
                                                                            @endif> สถานศึกษา </option>
                                                                        <option value="4" @if($show->type_offender ==
                                                                            4){ selected }
                                                                            @endif> ตำรวจ </option>
                                                                        <option value="5" @if($show->type_offender ==
                                                                            5){ selected }
                                                                            @endif> ทหาร </option>
                                                                        <option value="6" @if($show->type_offender ==
                                                                            6){ selected }
                                                                            @endif> ท้องถิ่น </option>
                                                                        <option value="7" @if($show->type_offender ==
                                                                            7){ selected }
                                                                            @endif> หน่วยงานอื่นๆ </option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="columns">
                                                    <div class="column">
                                                        <div class="field">
                                                            <label class="label">ของรัฐบาลหรือของเอกชน</label>
                                                            <div class="control">
                                                                <div class="select">
                                                                    <select id="subtype_offender"
                                                                        name="subtype_offender">
                                                                        <option value="1" @if($show->subtype_offender ==
                                                                            1){ selected }
                                                                            @endif> สถานพยาบาล </option>
                                                                        <option value="2" @if($show->subtype_offender ==
                                                                            2){ selected }
                                                                            @endif> สถานที่ทำงาน </option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="columns">
                                                    <div class="column">
                                                        <div class="field">
                                                            <label class="label">บุคคล</label>
                                                            <div class="control">
                                                                <p
                                                                    class="control is-expanded has-icons-left has-icons-right">
                                                                    <input class="input" type="text"
                                                                        value="{{$show->violator_name}}" disabled>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="columns">
                                                    <div class="column">
                                                        <div class="field">
                                                            <label class="label">องค์กร</label>
                                                            <div class="control">
                                                                <p
                                                                    class="control is-expanded has-icons-left has-icons-right">
                                                                    <input class="input" type="text"
                                                                        value="{{$show->offender_organization}}"
                                                                        disabled>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="columns">
                                                    <div class="column">
                                                        <div class="field">
                                                            <label class="label">รายละเอียดการดำเนินการ</label>
                                                            <div class="control">
                                                                <p
                                                                    class="control is-expanded has-icons-left has-icons-right">
                                                                    <textarea class="textarea"
                                                                        disabled>{{$show->operate_detail}}</textarea>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="columns">
                                                    <div class="column">
                                                        <div class="field">
                                                            <label class="label">ผลการดำเนินการ</label>
                                                            <div class="control">
                                                                <p
                                                                    class="control is-expanded has-icons-left has-icons-right">
                                                                    <textarea class="textarea"
                                                                        disabled>{{$show->operate_result}}</textarea>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="columns">
                                                    <div class="column">
                                                        <div class="field">
                                                            <label class="label">สถานะ</label>
                                                            <div class="control">
                                                                <div class="select">
                                                                    <select id="status" name="status">
                                                                        <option value="4" @if($show->status == 4){
                                                                            selected }
                                                                            @endif> อยู่ระหว่างการดำเนินการ </option>
                                                                        <option value="5" @if($show->status == 5){
                                                                            selected }
                                                                            @endif> ดำเนินการเสร็จสิ้น </option>
                                                                        <option value="6" @if($show->status == 6){
                                                                            selected }
                                                                            @endif> ดำเนินการแล้วส่งต่อ </option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="columns">
                                                    <div class="column">
                                                        <div class="field">
                                                            <label class="label">ผลการดำเนินการเสร็จสิ้น</label>
                                                            <div class="control">
                                                                <div class="select">
                                                                    <select id="operate_result_status"
                                                                        name="operate_result_status">
                                                                        <option value="1" @if($show->
                                                                            operate_result_status == 1){ selected }
                                                                            @endif> สำเร็จ </option>
                                                                        <option value="2" @if($show->
                                                                            operate_result_status == 2){ selected }
                                                                            @endif> ไม่สำเร็จ </option>
                                                                        <option value="3" @if($show->
                                                                            operate_result_status == 3){ selected }
                                                                            @endif> ตาย </option>
                                                                        <option value="3" @if($show->
                                                                            operate_result_status == 3){ selected }
                                                                            @endif> ย้ายที่อยู่ </option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="columns">
                                                    <div class="column">
                                                        <div class="field">
                                                            <label class="label">สาเหตุปฏิเสธ</label>
                                                            <div class="control">
                                                                <p
                                                                    class="control is-expanded has-icons-left has-icons-right">
                                                                    <textarea class="textarea"
                                                                        disabled>{{$show->reject_reason}}</textarea>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </section>
                                            <footer class="modal-card-foot">
                                                <button
                                                    class="button is-danger is-rounded">บันทึกการเปลี่ยนแปลง</button>
                                                <button class="button is-rounded">ยกเลิก</button>
                                            </footer>
                                        </div>
                                    </div>
                                </td>
                                <td>{{$show->nhso}}</td>
                                <td>{{$show->provname}}</td>
                                <td>{{$show->case_id}}</td>
                                <td>
                                    <?php 
                                    if($show->sex == 1){
                                        echo "ชาย";
                                    }else if($show->sex == 2){
                                        echo "หญิง";
                                    }else if($show->sex == 3){
                                        echo "สาวประเภทสอง";
                                    }else if($show->sex == 4){
                                        echo "อื่นๆ";
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                    if($show->nation == 1){
                                        echo "ไทย";
                                    }else if($show->nation == 2){
                                        echo "ลาว";
                                    }else if($show->nation == 3){
                                        echo "เวียดนาม";
                                    }else if($show->nation == 4){
                                        echo "พม่า";
                                    }else if($show->nation == 5){
                                        echo "กัมพูชา";
                                    }else if($show->nation == 6){
                                        echo "อื่นๆ";
                                    }else if($show->nation == 7){
                                        echo "ไร้สัญชาติ/ไม่มีสถานะบุคคล";
                                    }
                                    ?>
                                </td>
                                <td style="width: 200px;">{{$show->problem_case}}</td>
                                <td style="width: 200px;">{{$show->sub_problem}}</td>
                                <td style="width: 200px;">{{$show->group_code}}</td>

                                <td style="width: 300px;">{{$show->violation_characteristics}}</td>
                                <td style="width: 300px;">{{$show->effect}}</td>
                                <td style="width: 300px">{{$show->detail}}</td>
                                <td style="width: 300px">{{$show->need}}</td>

                                <td style="white-space: nowrap;">{{$show->accident_date}}</td>
                                <td style="white-space: nowrap;">{{$show->datecreate}}</td>

                                <td style="white-space: nowrap;">{{$show->receiver}}</td>

                                <td>{{$show->operatedate}}</td>
                                <td style="white-space: nowrap;">
                                    <?php

                                    if($show->type_offender == 1){
                                        echo "สถานพยาบาล";
                                    }else if($show->type_offender == 2){
                                        echo "สถานที่ทำงาน";
                                    }else if($show->type_offender == 3){
                                        echo "สถานศึกษา";
                                    }else if($show->type_offender == 4){
                                        echo "ตำรวจ";
                                    }else if($show->type_offender == 5){
                                        echo "ทหาร";
                                    }else if($show->type_offender == 6){
                                        echo "ท้องถิ่น";
                                    }else if($show->type_offender == 7){
                                        echo "หน่วยงานอื่นๆ";
                                    }

                                    ?>
                                </td>
                                <td>
                                    <?php

                                    if($show->subtype_offender == 1){
                                        echo "ของรัฐบาล";
                                    }else if($show->subtype_offender == 2){
                                        echo "ของเอกชน";
                                    }

                                    ?>
                                </td>
                                <td style="white-space: nowrap;">{{$show->violator_name}}</td>
                                <td style="white-space: nowrap;">{{$show->offender_organization}}</td>
                                <td style="width: 300px">{{$show->operate_detail}}</td>
                                <td style="width: 300px">{{$show->operate_result}}</td>

                                <td style="white-space: nowrap;">
                                    <?php

                                    if($show->status == 4){
                                        echo "อยู่ระหว่างการดำเนินการ";
                                    }else if($show->status == 5){
                                        echo "ดำเนินการเสร็จสิ้น";
                                    }else if($show->status == 6){
                                        echo "ดำเนินการแล้วส่งต่อ";
                                    }

                                    ?>
                                </td>
                                <td style="width: 300px">
                                    <?php

                                    if($show->operate_result_status == 1){
                                        echo "สำเร็จ";
                                    }else if($show->operate_result_status == 2){
                                        echo "ไม่สำเร็จ";
                                    }else if($show->operate_result_status == 3){
                                        echo "ตาย";
                                    }
                                    else if($show->operate_result_status == 4){
                                        echo "ย้ายที่อยู่";
                                    }


                                    ?>
                                </td>
                                <td style="width: 300px">{{$show->reject_reason}}</td>

                            </tr>


                            @endforeach

                        </tbody>
                    </table>
                </div>

            </div>

        </div>

        @extends('officer.footer_m')


        <script src="{{ asset('bulma/clipboard-1.7.1.min.js') }}"></script>
        <script src="{{ asset('bulma/main.js') }}"></script>

        <script type="text/javascript" src="https://cdn.datatables.net/v/bm/jq-3.6.0/dt-1.11.3/datatables.min.js">
        </script>

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

        $(document).ready(function() {

            var o_table = $('#table_m').DataTable({
                language: {
                    searchPlaceholder: "",
                    search: "ค้นหา",
                },
                "pageLength": 25
            });


            for (let i = 1; i <= {{ $list_lopp}}; i++) {

                $('#problem_case' + i).on('change', function(e) {
                    alert("hello" + i);
                    var prob_id = e.target.value;
                    //console.log(prob_id);
                    $('#group_code' + i).empty();
                    $('#group_code' + i).attr('disabled', 'disabled');
                    if ((prob_id == 1) || (prob_id == 5)) {
                        $('#sub_problem' + i).empty();
                        $('#sub_problem' + i).removeAttr('disabled');
                        $('#sub_problem' + i).append('<option value="1" >ผู้ติดเชื้อเอชไอวี</option>');
                        $('#sub_problem' + i).append('<option value="2" >กลุ่มเปราะบาง</option>');
                        $('#sub_problem' + i).append(
                            '<option value="4" >ครอบครัวและผู้ใกล้ชิดผู้ติดเชื้อเอชไอวี</option>');
                        $('#sub_problem' + i).append('<option value="3" >ประชาชนทั่วไป</option>');
                    } else if (prob_id == 2) {
                        $('#sub_problem' + i).empty();
                        $('#sub_problem' + i).removeAttr('disabled');
                        $('#sub_problem' + i).append('<option value="1" >ผู้ติดเชื้อเอชไอวี</option>');
                    } else if (prob_id == 3) {
                        $('#sub_problem' + i).empty();
                        $('#sub_problem' + i).removeAttr('disabled');
                        $('#sub_problem' + i).append('<option value="1" >ผู้ติดเชื้อเอชไอวี</option>');
                        $('#sub_problem' + i).append(
                            '<option value="4" >ครอบครัวและผู้ใกล้ชิดผู้ติดเชื้อเอชไอวี</option>');
                    } else if (prob_id == 4) {
                        $('#sub_problem' + i).empty();
                        $('#sub_problem' + i).removeAttr('disabled');
                        $('#sub_problem' + i).append('<option value="2" >กลุ่มเปราะบาง</option>');
                        $('#group_code' + i).empty();
                        $('#group_code' + i).removeAttr('disabled');
                        $('#group_code' + i).append('<option value="1" >กลุ่มหลากหลายทางเพศ</option>');
                        $('#group_code' + i).append('<option value="2" >พนักงานบริการ </option>');
                        $('#group_code' + i).append('<option value="3" >ผู้ใช้สารเสพติด</option>');
                        $('#group_code' + i).append('<option value="4" >ประชากรข้ามชาติ</option>');
                        $('#group_code' + i).append('<option value="5" >ผู้ถูกคุมขัง</option>');
                        $('#group_code' + i).append(
                            '<option value="7" >กลุ่มชาติพันธุ์และชนเผ่า</option>');


                    } else {
                        $('#sub_problem' + i).empty();
                        $('#sub_problem' + i).attr('disabled', 'disabled');
                    }
                });
                $('#sub_problem' + i).on('change', function(e) {
                    var sub_id = e.target.value;
                    if (sub_id == 2) {
                        $('#group_code' + i).empty();
                        $('#group_code' + i).removeAttr('disabled');
                        $('#group_code' + i).append('<option value="1" >กลุ่มหลากหลายทางเพศ</option>');
                        $('#group_code' + i).append('<option value="2" >พนักงานบริการ</option>');
                        $('#group_code' + i).append('<option value="3" >ผู้ใช้สารเสพติด</option>');
                        $('#group_code' + i).append('<option value="4" >ประชากรข้ามชาติ</option>');
                        $('#group_code' + i).append('<option value="5" >ผู้ถูกคุมขัง</option>');
                        $('#group_code' + i).append(
                            '<option value="7" >กลุ่มชาติพันธุ์และชนเผ่า</option>');


                    } else {
                        $('#group_code' + i).empty();
                        $('#group_code' + i).attr('disabled', 'disabled');
                    }
                });

            }
        });

        function show_modal(id) {
            $("#modal" + id).addClass("is-active");
        }
        </script>

</body>

</html>