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

    <link href="{{ asset('bulma-0.8.0/css/bulma.css') }}" rel="stylesheet">
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
                    &nbsp;จัดการรายชื่อเจ้าหน้าที่
                </h3>

                <div class="level">
                    <div class="level-left">
                        <a class="button is-primary is-rounded" onClick="creategroup()">
                            <i class="fas fa-plus"></i>
                            &nbsp;เพิ่มกลุ่มใหม่</a>

                    </div>
                    <div class="level-right">
                        <a class="button is-primary is-rounded" href="{{ route('officer.view_log') }}"><i
                                class="fa fa-history" aria-hidden="true"></i>&nbsp;ประวัติการการจัดการ</a>
                    </div>
                </div>

                @if(\Session::has('success'))
                <div class="notification is-success">
                    <button class="delete noti-close " onclick="this.parentElement.style.display='none'"></button>
                    <strong>{{ \Session::get('success') }}</strong>
                </div>
                @endif

                @if(\Session::has('message'))
                <div class="notification is-success">
                    <button class="delete noti-close " onclick="this.parentElement.style.display='none'"></button>
                    <strong>{{ \Session::get('message') }}</strong>
                </div>
                @endif

                <div class=" table-container">
                    <table id="table_m" class="table is-fullwidth is-striped is-hoverable panel"
                        style="white-space: nowrap;">
                        <thead>
                        <tr>
                            <th class="has-text-danger has-text-centered" colspan="24">จัดการายชื่อเจ้าหน้าที่</th>
                        </tr>
                            <tr>
                                <th class="has-text-danger">ลำดับ</th>
                                <th style="display:none;"></th>

                                <th class="has-text-danger"></th>
                                <th style="display:none;"></th>
                                <th class="has-text-danger">เข้าใช้</th>
                                <th class="has-text-danger" style="white-space: nomal; max-width: 60px">ชื่อ</th>
                                <th class="has-text-danger" style="white-space: nomal; max-width: 60px">หน่วยงาน</th>
                                <th class="has-text-danger" style="display:none;">เบอร์ติดต่อ</th>
                                <th class="has-text-danger" style="display:none;">Email</th>
                                <th style="display:none;"></th>
                                <th class="has-text-danger">ตำแหน่ง</th>
                                <th style="display:none;"></th>
                                <th class="has-text-danger">กลุ่ม</th>
                                <th style="display:none;"></th>
                                <th class="has-text-danger">ดูทั้งหมดในกลุ่ม</th>
                                <th class="has-text-danger">เขต</th>
                                <th style="display:none;"></th>
                                <th class="has-text-danger">จังหวัด</th>
                                
                                <th class="has-text-danger">Login ล่าสุด</th>
                                <th class="has-text-danger" style="white-space: nomal; max-width: 60px">ไม่ได้ Login</th>
                                <th style="display:none;"></th>
                                <th class="has-text-danger">ดูเคสทั้งหมด</th>
                                <th style="display:none;"></th>
                                <th class="has-text-danger">รับเคส</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1 ?>
                            @foreach($show_list as $show)

                            <?php $se_prov = "<p class='has-text-secondary'><i class='fas fa-minus-circle'></i></p>"; ?>
                            @foreach($show_prov as $prov)
                            <?php 
                                    if($show->prov_id == $prov->PROVINCE_CODE){
                                        $se_prov = $prov->PROVINCE_NAME;
                                    }
                                ?>
                            @endforeach

                            <tr>
                                <td>{{$i}}</td>
                                <td style="display:none;">{{$show->username}}</td>

                                <td>
                                    <a class="tag is-info edit_form" href="#" id="" onClick="editmanage()"><i
                                            class="fas fa-edit">&nbsp;แก้ไข</i>
                                    </a>
                                </td>

                                <td style="display:none;">{{$show->active}}</td>
                                <td>
                                    @if($show->active == 'no')
                                    <p class="has-text-secondary"><i class="fas fa-minus-circle"></i></p>
                                    @elseif($show->active == 'yes')
                                    <p class="has-text-success"><i class="fas fa-check-circle"></i></p>
                                    @else
                                    <p class="has-text-secondary"><i class="fas fa-minus-circle"></i></p>
                                    @endif
                                </td>

                                <td>{{$show->name}}</td>
                                <td>{{$show->nameorg}}</td>
                                <td style="display:none;">{{$show->tel}}</td>
                                <td style="display:none;">{{$show->email}}</td>
                                <td style="display:none;">{{$show->position}}</td>

                                <td>
                                    <?php
                                        if($show->position == "admin"){
                                            echo "admin";
                                        }elseif($show->position == "officer"){
                                            echo "เจ้าหน้าที่";
                                        }elseif($show->position == "manager"){
                                            echo "ผู้ดูแลระดับจังหวัด";
                                        }elseif($show->position == "manager_area"){
                                            echo "ผู้ดูแลระดับเขต";
                                        }
                                    ?>
                                </td>

                                <td style="display:none;">{{$show->group}}</td>

                                <td>
                                    @if($show->groupname == '')
                                    <p class="has-text-secondary"><i class="fas fa-minus-circle"></i></p>
                                    @else
                                    {{$show->groupname}}
                                    @endif
                                </td>

                                <td style="display:none;">{{$show->g_view_all}}</td>
                                <td>
                                    @if($show->g_view_all == 'no')
                                    <p class="has-text-secondary"><i class="fas fa-minus-circle"></i></p>
                                    @elseif($show->g_view_all == 'yes')
                                    <p class="has-text-success"><i class="fas fa-check-circle"></i></p>
                                    @else
                                    <p class="has-text-secondary"><i class="fas fa-minus-circle"></i></p>
                                    @endif
                                </td>
                                

                                <td>
                                    @if($show->area_id < 1) <p class="has-text-secondary"><i
                                            class="fas fa-minus-circle"></i></p>
                                        @else
                                        {{$show->area_id}}
                                        @endif
                                </td>

                                <td style="display:none;">{{$show->prov_id}}</td>
                                <td><?php echo $se_prov ?></td>

                                

                                <td>
                                    @if( $show->last_login_at == '')
                                    ไม่มีข้อมูล
                                    @else
                                    {{ date('d-m-Y', strtotime($show->last_login_at))}}
                                    @endif
                                </td>
                                <td>
                                    @if( date_diff(new \DateTime($show->last_login_at), new \DateTime())->format("%m
                                    เดือน,%d วัน") == 0 and $show->last_login_at == '')
                                    ยังไม่ได้ Login
                                    @elseif($show->last_login_at <> '')
                                        {{ date_diff(new \DateTime($show->last_login_at), new \DateTime())->format("%m เดือน, %d วัน") }}
                                        @endif

                                        &nbsp;&nbsp;
                                        <?php 
                                    $datedifflogin = date_diff(new \DateTime($show->last_login_at), new \DateTime())->format("%m") 
                                    ?>
                                        @if($datedifflogin >= "3" and $show->mailwarning == "yes")
                                        <a class="tag is-danger is-light " href="#" diabled><i
                                                class="fas fa-envelope">&nbsp;แจ้งเตือนแล้ว</i>
                                        </a>
                                        @elseif($datedifflogin >= "3" )
                                        <a class="tag is-danger " href="#" id="lanuchModal"
                                            onClick="confirmmail('{{$show->email}}','{{$show->username}}')"><i
                                                class="fas fa-envelope">&nbsp;แจ้งเตือน</i>
                                        </a>
                                        @endif
                                </td>

                                <td style="display:none;">{{$show->p_view_all}}</td>
                                <td>
                                    @if($show->p_view_all == 'no')
                                    <p class="has-text-secondary"><i class="fas fa-minus-circle"></i></p>
                                    @else
                                    <p class="has-text-success"><i class="fas fa-check-circle"></i></p>
                                    @endif
                                </td>

                                <td style="display:none;">{{$show->p_receive}}</td>
                                <td>
                                    @if($show->p_receive == 'no')
                                    <p class="has-text-secondary"><i class="fas fa-minus-circle"></i></p>
                                    @else
                                    <p class="has-text-success"><i class="fas fa-check-circle"></i></p>
                                    @endif
                                </td>



                            </tr>

                            <?php $i++ ?>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>


    @extends('officer.footer_m')


    <!-- Modal send Email -->

    <form action="{{ route('send.email') }}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <input type="hidden" id="username_send" name="email" class="form-control input" placeholder="Enter Email">
        <input type="hidden" name="subject" class="input" value="แจ้งเตือนการไม่ได้เข้าใช้ระบบ ปกป้อง(CRS) เป็นเวลานาน">
        <input type="hidden" id="mailusername_id" name="mailusername_id" class="input">

        <textarea name="content" rows="5" class=" textarea" placeholder="Enter Your Message"
            style="display:none;">ถ้าได้รับ Email นี้ ต้องขออภัยจากความผิดพลาดในการส่งด้วยครับ</textarea>

        <div id="modal" class="modal ">
            <div class="modal-background"></div>

            <div class="modal-content">
                <div class="box column is-8 is-offset-2">
                    <article class="media">

                        <div class="media-content has-text-right">
                            <a class="delete closetop" aria-label="close"></a>

                            <div class="content  has-text-centered">
                                <div class="section ">
                                    <p class="is-size-5">
                                        ระบบจะส่ง Mail แจ้งเตือนไปที่
                                    </p>

                                    <p id="confirmmail" class=" is-size-6 has-text-primary	">

                                    </p>
                                    <p class=" is-size-5">
                                        คลิกยืนยันอีกครั้ง เพื่อดำเนินการต่อไป
                                    </p>
                                </div>
                                <button type="submit" class="button is-primary">
                                    ยืนยันการส่ง </button>

                                <a class="button is-secondary closebtn">
                                    ยกเลิก </a>
                            </div>

                        </div>
                    </article>
                </div>
            </div>

        </div>

    </form>

    <!-- Modal Edit -->

    <div id="edit_manager" class="modal">
        <div class="modal-background"></div>

        <div class="modal-content">
            <div class="box column is-12 is-offset-0">
                <article class="media">

                    <div class="media-content has-text-right">
                        <a class="delete closetop" aria-label="close"></a>
                        <div class="content has-text-left">

                            <div class="panel-heading has-background-primary has-text-white">
                                แก้ไขข้อมูลเจ้าหน้าที่
                            </div>
                            <br>

                            <div class="panel-body ">

                                <form id="edit_officer" class="form-horizontal" role="form" method="POST"
                                    action="/e_officer">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}

                                    <div class="field ">
                                        <label class="label" for="username">Username</label>
                                        <div class="control">
                                            <input id="e_username" name="e_name" type="text" class="form-control input"
                                                value="" disabled>

                                        </div>
                                    </div>
                                    <div class="field">
                                        <div class="columns">
                                            <div class="column ">
                                                <label class="label" for="group"> ID เข้าใช้ระบบได้ </label>
                                                <div class=" select is-fullwidth">
                                                    <select name="e_active" id="e_active">
                                                        <option value="no"> ไม่ใช่ </option>
                                                        <option value="yes"> ใช่ </option>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="column ">
                                                <div class="notification">
                                                    <label class="label"> * เมื่อเปิดใช้อีกครั้งหลัง "ระงับ" User
                                                        จะเคลียร์วันที่ login เป็นปัจจุบัน </label>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box">
                                        <div class="field ">
                                            <label class="label" for="name">ชื่อผู้ใช้งาน</label>
                                            <div class="control">
                                                <input id="e_name" name="e_name" type="text" class="form-control input"
                                                    value="">

                                            </div>
                                        </div>
                                        <div class="field ">
                                            <label class="label" for="name">หน่วยงาน</label>
                                            <div class="control">
                                                <input id="e_nameorg" name="e_nameorg" type="text"
                                                    class="form-control input" value="">

                                            </div>
                                        </div>
                                        <div class="field ">
                                            <label class="label" for="name">เบอร์ติดต่อ</label>
                                            <div class="control">
                                                <input id="e_tel" name="e_tel" type="text" class="form-control input"
                                                    value="">

                                            </div>
                                        </div>
                                        <div class="field ">
                                            <label class="label" for="name">Email</label>
                                            <div class="control">
                                                <input id="e_email" name="e_email" type="text"
                                                    class="form-control input" value="">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="box">
                                        <div class="field ">
                                            <label class="label" for="name">ตำแหน่ง</label>
                                            <div class="control">
                                                <input id="e_position" name="e_position" type="text"
                                                    class="form-control input" value="" disabled>

                                            </div>
                                        </div>

                                        <div class="field  is-bordered">
                                            <div class="columns">

                                                <div class="column">
                                                    <label class="label" for="group">เขต</label>
                                                    <div class=" select is-fullwidth">
                                                        <select name="e_area" id="e_area">
                                                            <option value="0"> ไม่เลือก </option>
                                                            <option value="1"> 1 </option>
                                                            <option value="2"> 2 </option>
                                                            <option value="3"> 3 </option>
                                                            <option value="4"> 4 </option>
                                                            <option value="5"> 5 </option>
                                                            <option value="6"> 6 </option>
                                                            <option value="7"> 7 </option>
                                                            <option value="8"> 8 </option>
                                                            <option value="9"> 9 </option>
                                                            <option value="10"> 10 </option>
                                                            <option value="11"> 11 </option>
                                                            <option value="12"> 12 </option>
                                                            <option value="13"> 13 </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="column ">
                                                    <label class="label" for="group">จังหวัด</label>
                                                    <div class=" select is-fullwidth">
                                                        <select name="e_prov" id="e_prov">
                                                            <option value="0"> ไม่เลือก </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="field box is-bordered">
                                        <label class="content">
                                            จัดกลุ่มเพื่อให้ผู้ดูแลระดับพื้นที่เข้าถึงพื้นที่ในสามาชิกได้ </label>
                                        <br>
                                        <br>
                                        <div class="columns">
                                            <div class="column ">
                                                <label class="label" for="group">กลุ่ม</label>
                                                <div class=" select is-fullwidth">
                                                    <select name="e_group" id="e_group">
                                                        <option value=""> ไม่เลือก </option>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="column">
                                                <label class="label" for="group"> ดูได้ทุกเคสในกลุ่ม</label>
                                                <div class=" select is-fullwidth">
                                                    <select name="e_v_group" id="e_v_group">
                                                        <option value="no"> ไม่ใช่ </option>
                                                        <option value="yes"> ใช่ </option>
                                                    </select>

                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="field box is-bordered">
                                        <label class="content"> * สิทธิ์เดิมจะกำหนดจาก "ตำแหน่ง" ตอนลงทะเบียน </label>
                                        <br>
                                        <label class="content"> * ใช้ในกรณีต้องการเปลี่ยนแปลงสิทธิ์เพิ่มเติม </label>
                                        <br>
                                        <br>
                                        <div class="columns">
                                            <div class="column ">
                                                <label class="label" for="group">ดูเศสทั้งหมด</label>
                                                <div class=" select is-fullwidth">
                                                    <select name="e_viewall" id="e_viewall">
                                                        <option value="no"> ไม่ใช่ </option>
                                                        <option value="yes"> ใช่ </option>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="column">
                                                <label class="label" for="group"> รับเคส</label>
                                                <div class=" select is-fullwidth">
                                                    <select name="e_receiver" id="e_receiver">
                                                        <option value="no"> ไม่ใช่ </option>
                                                        <option value="yes"> ใช่ </option>
                                                    </select>

                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                    <button type="submit" class="button is-danger">ยืนยันแก้ไข</button>
                                    <a class="button is-secondary closebtn">
                                        ยกเลิก </a>
                                </form>
                            </div>


                        </div>
                    </div>
                </article>
            </div>

        </div>
    </div>

    <!-- Modal create group -->
    <div id="create_group" class="modal">
        <div class="modal-background"></div>

        <div class="modal-content">
            <div class="box column is-12 is-offset-0">
                <article class="media">
                    <div class="media-content">
                        <div class="has-text-right">
                            <a class="delete closetop" aria-label="close"></a>
                        </div>
                        <h5 class="has-text-info">
                            <i class="fas fa-history">&nbsp;รายชื่อกลุ่มที่มีการใช้งาน</i>
                        </h5>
                        <div class=" table-container">
                            <table id="table_g" class="table is-bordered is-fullwidth is-striped is-hoverable panel"
                                style="white-space: nowrap;">
                                <thead>
                                    <tr>
                                        <th class="has-text-danger">ลำดับ</th>
                                        <th class="has-text-danger">รหัส</th>
                                        <th class="has-text-danger">ชื่อกลุ่ม</th>
                                        <th class="has-text-danger">วันที่สร้าง</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ?>
                                    @foreach($show_group as $group)
                                    <tr>
                                        <td>{{ $i}}</td>
                                        <td>{{ $group->code}}</td>
                                        <td>{{ $group->groupname}}</td>
                                        <td>{{ $group->created_at}}</td>
                                    </tr>
                                    <?php $i++ ?>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>

                        <br>
                        <h5 class="has-text-info">
                            <i class="fas fa-plus">&nbsp;เพิ่มกลุ่มใหม่</i>
                        </h5>
                        <div class=" table-container">
                            <form id="creategroup" class="form-horizontal" role="form" method="POST"
                                action="creategroup">
                                {{ csrf_field() }}
                                {{ method_field('POST') }}
                                <table id="table_g" class="table is-bordered is-fullwidth is-striped is-hoverable panel"
                                    style="white-space: nowrap;">
                                    <thead>
                                        <tr>
                                            <th class="has-text-danger">ลำดับ</th>
                                            <th class="has-text-danger">รหัส</th>
                                            <th class="has-text-danger">ชื่อกลุ่ม</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <td>#</td>
                                        <td>
                                            <input id="gcode" name="gcode" type="text" class="input" required>
                                        </td>
                                        <td>
                                            <input id="gname" name="gname" type="text" class="input" required>
                                        </td>
                                    </tbody>
                                </table>
                                <button type="submit" class="button is-primary">บันทึก</button>
                                <a class="button is-secondary closebtn">
                                    ยกเลิก </a>
                            </form>
                        </div>
                    </div>

                </article>
            </div>
        </div>
    </div>


    <script src="{{ asset('bulma/clipboard-1.7.1.min.js') }}"></script>
    <script src="{{ asset('bulma/main.js') }}"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/v/bm/jq-3.6.0/dt-1.11.3/datatables.min.js"></script>


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

    $(document).ready(function() {

        var o_table = $('#table_m').DataTable({
            language: {
                searchPlaceholder: "",
                search: "ค้นหา",
            },
            "pageLength": 25
        });

        <?php foreach($show_prov as $prov){ ?>

        $('#e_prov').append($("<option></option>").attr("value", "<?php echo $prov->PROVINCE_CODE ?>").text(
            '<?php echo $prov->PROVINCE_NAME ?>'));

        <?php } ?>

        <?php foreach($show_group as $group){ ?>

        $('#e_group').append($("<option></option>").attr("value", "<?php echo $group->code ?>").text(
            '<?php echo $group->groupname ?>'));

        <?php } ?>


        o_table.on('click', '.edit_form', function() {

            $tr = $(this).closest('tr');
            var data = o_table.row($tr).data();

            $('#e_username').val(data[1]);
            $('#e_active').val(data[3]);
            $('#e_name').val(data[5]);
            $('#e_nameorg').val(data[6]);
            $('#e_tel').val(data[7]);
            $('#e_email').val(data[8]);
            $('#e_position').val(data[10]);


            if (data[15] == '<p class="has-text-secondary"><i class="fas fa-minus-circle"></i></p>') {
                $('#e_area').val('0');
                $('#e_area').prop('disabled', true);
            } else {
                $('#e_area').val(data[15]);
                $('#e_area').prop('disabled', false);
            }

            if (data[17] == '<p class="has-text-secondary"><i class="fas fa-minus-circle"></i></p>') {
                $('#e_prov').val('0');
                $('#e_prov').prop('disabled', true);
            } else {
                $('#e_prov').val(data[16]);
                $('#e_prov').prop('disabled', false);

            }


            $('#e_group').val(data[11]);
            if (data[13] == "yes") {
                $('#e_v_group').val(data[13]);
            } else {
                $('#e_v_group').val('no');
            }

            if (data[20] == "yes") {
                $('#e_viewall').val(data[20]);
            } else {
                $('#e_viewall').val('no');
            }
            

            if (data[22] == "yes") {
                $('#e_receiver').val(data[22]);
            } else {
                $('#e_receiver').val('no');
            }

            $('#edit_officer').attr('action', 'e_officer/' + data[1]);
        });


    });

    function selectElement(id, valueToSelect) {
        let element = document.getElementById(e_group);
        element.value = valueToSelect;
    }
    </script>

    <script>
    function confirmmail(val, id) {
        $("#modal").addClass("is-active");
        $('#confirmmail').text(val);
        $('#username_send').val(val);
        $('#mailusername_id').val(id);
    }

    function editmanage() {
        $("#edit_manager").addClass("is-active");
    }

    function creategroup() {
        $("#create_group").addClass("is-active");
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