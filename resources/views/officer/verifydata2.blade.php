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

    <?php 
        $i = 0;
    ?>
    @foreach($show_prov as $province)
    <?php 
        $i++;

        $pr_name[$i] = $province->PROVINCE_NAME;
        $pr_code[$i] = $province->PROVINCE_CODE;
        $nhso_code[$i] = $province->nhso;
        
        $prloop = $i;
    ?>
    @endforeach

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
                            <span>จัดการรายเคส</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <div class="content">
                <h3>
                    <sapn class="has-text-danger"><i class="fa fa-users"></i></sapn>
                    &nbsp;จัดการรายเคส
                </h3>
                <form role="form" class="mb-5" method="POST" action="{{ route('officer.verifydata') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="level">
                        <!-- Left side -->
                        <div class="level-left">
                            <div class="level-item">
                                <label class="label">เลือกเขต</label>
                            </div>
                            <div class="level-item">
                                <div class="select">
                                <select name="nhso" id="nhso" class="form-select rounded"
                                    onchange="setprov(nhso.value,1);">
                                    <option value="0" <?php if ($nhso_se == "0"){ echo "selected";} ?>> ทุกเขต </option>
                                    <option value="1" <?php if ($nhso_se == "1"){ echo "selected";} ?>>
                                        เขต 1
                                    </option>
                                    <option value="2" <?php if ($nhso_se == "2"){ echo "selected";} ?>>
                                        เขต 2
                                    </option>
                                    <option value="3" <?php if ($nhso_se == "3"){ echo "selected";} ?>>
                                        เขต 3
                                    </option>
                                    <option value="4" <?php if ($nhso_se == "4"){ echo "selected";} ?>>
                                        เขต 4
                                    </option>
                                    <option value="5" <?php if ($nhso_se == "5"){ echo "selected";} ?>>
                                        เขต 5
                                    </option>
                                    <option value="6" <?php if ($nhso_se == "6"){ echo "selected";} ?>>
                                        เขต 6
                                    </option>
                                    <option value="7" <?php if ($nhso_se == "7"){ echo "selected";} ?>>
                                        เขต 7
                                    </option>
                                    <option value="8" <?php if ($nhso_se == "8"){ echo "selected";} ?>>
                                        เขต 8
                                    </option>
                                    <option value="9" <?php if ($nhso_se == "9"){ echo "selected";} ?>>
                                        เขต 9
                                    </option>
                                    <option value="10" <?php if ($nhso_se == "10"){ echo "selected";} ?>>
                                        เขต 10
                                    </option>
                                    <option value="11" <?php if ($nhso_se == "11"){ echo "selected";} ?>>
                                        เขต 11
                                    </option>
                                    <option value="12" <?php if ($nhso_se == "12"){ echo "selected";} ?>>
                                        เขต 12
                                    </option>
                                    <option value="13" <?php if ($nhso_se == "13"){ echo "selected";} ?>>
                                        เขต 13
                                    </option>

                                </select>
                                </div>
                            </div>
                            <div class="level-item">
                                <label class="label">เลือกจังหวัด</label>
                            </div>
                            <div class="level-item">
                                <div class="select">
                                    <select name="prov_id" id="prov_id">
                                        <option value="0" style="width:250px">ทุกจังหวัด</option>
                                        @foreach($show_prov as $province)
                                        <option value="{{ $province->PROVINCE_CODE }}"
                                            <?php if($province->PROVINCE_CODE == $prov_id_se){ echo "selected";} ?>
                                            style="width:250px">
                                            {{ $province->PROVINCE_NAME }}
                                        </option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                        </div>

                        <!-- Right side -->
                        <div class="level-right">
                            
                        </div>
                    </div>

                    <div class="level">
                        <!-- Left side -->
                        <div class="level-left">
                            <div class="level-item">
                                <label class="label">ข้อมูลปัญหาที่พบ</label>
                            </div>
                            <div class="level-item">
                                <span class="select">
                                    <select id="problem_case" name="problem_case">
                                        <option value="0" <?php if($problem_case_se == 0){ echo "selected"; } ?>>ทั้งหมด</option>
                                        <option value="1" <?php if($problem_case_se == 1){ echo "selected"; } ?>>บังคับตรวจเอชไอวี</option>
                                        <option value="2" <?php if($problem_case_se == 2){ echo "selected"; } ?>>เปิดเผยสถานะการติดเชื้อเอชไอวี</option>
                                        <option value="3" <?php if($problem_case_se == 3){ echo "selected"; } ?>>ถูกกีดกันหรือถูกเลือกปฏิบัติเนื่องมาจาการติดเชื้อเอชไอวี
                                        </option>
                                        <option value="4" <?php if($problem_case_se == 4){ echo "selected"; } ?>>ถูกกีดกันหรือถูกเลือกปฏิบัติเนื่องมาจากเป็นกลุ่มเปราะบาง
                                        </option>
                                        <option value="5" <?php if($problem_case_se == 5){ echo "selected"; } ?>>อื่นๆ ที่เกี่ยวข้องกับเอชไอวี</option>
                                        <option value="6" <?php if($problem_case_se == 6){ echo "selected"; } ?>>อื่นๆ ที่ไม่เกี่ยวข้องกับเอชไอวี</option>
                                    </select> 
                                </span> 
                            </div>
                        </div>

                        <!-- Right side -->
                        <div class="level-right">
                        
                        </div>
                    </div>

                    <div class="level">
                        <!-- Left side -->
                        <div class="level-left">
                            <div class="level-item">
                                <label class="label">สถานะการดำเนินงาน</label>
                            </div>
                            <div class="level-item">
                                <span class="select">
                                    <select id="p_case" name="pcase" >
                                        <option value="0" <?php if ($pcase_se == "0") { echo "selected";} ?>> ทั้งหมด </option>
                                        <option value="1" <?php if ($pcase_se == "1") { echo "selected";} ?>> ยังไม่ได้รับเรื่อง </option>
                                        <option value="2" <?php if ($pcase_se == "2") { echo "selected";} ?>> รับเรื่องแล้ว </option>
                                        <option value="3" <?php if ($pcase_se == "3") { echo "selected";} ?>> บันทึกข้อมูลเพิ่มเติมแล้ว </option>
                                        <option value="4" <?php if ($pcase_se == "4") { echo "selected";} ?>> อยู่ระหว่างดำเนินการ </option>
                                        <option value="5" <?php if ($pcase_se == "5") { echo "selected";} ?>> ดำเนินการเสร็จสิ้น </option>
                                        <option value="6" <?php if ($pcase_se == "6") { echo "selected";} ?>> ดำเนินการเสร็จสิ้นแล้วส่งต่อ </option>
                                        <option value="98" <?php if ($pcase_se == "98") { echo "selected";} ?>> ยุติการดำเนินการ </option>
                                    </select>
                                </span> 
                            </div>
                            <div class="level-item">
                                <button type="submit" class="button is-danger"> ยืนยัน </button>
                            </div>
                        </div>

                        <!-- Right side -->
                        <div class="level-right">
                            <a class="button is-danger is-rounded" href="#"><i class="fa fa-history" aria-hidden="true"></i>&nbsp;ประวัติการจัดการ</a>
                        </div>
                        
                    </div>   

                </form>


                <div class=" table-container">
                    <table id="table_m" class="table panel is-bordered is-striped  is-hoverable is-fullwidth"
                        style="width: 6000px">
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

                        <?php $i=0; ?>
                            @foreach($show_data as $show)
                            <?php $i++; $list_lopp = $i; ?>
                            <tr>
                                <td>{{$i}}</td>
                                <td class="has-text-danger has-text-centered">
                                    <a class="tag is-danger" onclick="show_modal({{$i}})" href="#"> แก้ไข </a>
                                    <div id="modal{{$i}}" class="modal has-text-left">
                                        <div class="modal-background"></div>
                                        <div class="modal-card" style="width: 80%;">
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
                                <td style="width: 800px">{{$show->detail}}</td>
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
                                <td style="width: 800px">{{$show->operate_detail}}</td>
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

            var set_nhso = $('#nhso').val();

            setprov(set_nhso,0);


            
        });

        function show_modal(id) {
            $("#modal" + id).addClass("is-active");
        }
        </script>

        <script>
        function setprov(se,ck1) {

            var pr_code = <?php echo json_encode($pr_code); ?>;
            var pr_name = <?php echo json_encode($pr_name); ?>;
            var nhso_code = <?php echo json_encode($nhso_code); ?>;

            if (se == 0) {
                //alert("test"); 

                //$('#prov11').prop('disabled', 'disabled');
                //$('#prov11').val(0);

                $("#prov_id").empty();
                $("#prov_id").append($("<option></option>").attr("value", '0').text('ทุกจังหวัด'));

                for (let i = 1; i <= <?php echo $prloop; ?>; i++) {

                    $("#prov_id").append($("<option></option>").attr("value", pr_code[i]).text(pr_name[i]));

                    if(ck1 == 0){
                        if ('<?php echo $prov_id_se; ?>' == pr_code[i]) {
                        $("#prov_id option[value='" + pr_code[i] + "']").attr("selected", "selected");
                        }
                    }

                }

            } else {


                $("#prov_id").empty();
                $("#prov_id").append($("<option></option>").attr("value", '0').text("ทุกจังหวัด"));

                for (let i = 1; i <= <?php echo $prloop; ?>; i++) {

                    if (nhso_code[i] == se) {
                        $("#prov_id").append($("<option></option>")
                            .attr("value", pr_code[i]).text(pr_name[i]));
                    }

                    if ('<?php echo $prov_id_se; ?>' == pr_code[i]) {

                        $("#prov_id option[value='" + pr_code[i] + "']").attr("selected", "selected");
                    }
                }

            }
        }
        </script>

</body>

</html>