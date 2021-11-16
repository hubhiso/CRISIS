<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300&display=swap" rel="stylesheet">

    <link href="{{ asset('bulma-0.8.0/css/bulma.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mystyles.css') }}" rel="stylesheet">

    <link href="{{ asset('css/printpage.css') }}" rel="stylesheet">

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

        <div class="section">

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
                    <li>
                        <a href="{{ route('officer.add_activities' , $show_data->case_id) }}">
                            <span class="icon is-small">
                                <i class="fas fa-cog" aria-hidden="true"></i>
                            </span>
                            <span>การดำเนินการ</span>
                        </a>
                    </li>
                    <li class="is-active">
                        <a href="#">
                            <span class="icon is-small">
                                <i class="fa fa-print" aria-hidden="true"></i>
                            </span>
                            <span>รายละเอียดสำหรับการพิมพ์</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <div class="content">

                <h2>
                    <sapn class="has-text-danger"><i class="fa fa-print" aria-hidden="true"></i></sapn>
                    รายละเอียดสำหรับการพิมพ์
                </h2>

                <br>
                <button class="button is-primary" onclick="printDiv('result_ac')"> <i class="fa fa-print"
                        aria-hidden="true"></i>&nbsp;พิมพ์รายละเอียดการดำเนินการ</button>
                <br><br>
                <div id="result_ac" class="has-background-white print_page">
                    <div class="">
                        <div class="has-text-centered content">
                            <h4>เอกสารรายละเอียดการดำเนินงาน</h4>
                            <p>ข้อมูล ณ วันที่ {{ date('d') }}
                                @if ( date('m') == 1 )
                                มกราคม
                                @elseif ( date('m') == 2 )
                                กุมภาพันธ์
                                @elseif ( date('m') == 3 )
                                มีนาคม
                                @elseif ( date('m') == 4 )
                                เมษายน
                                @elseif ( date('m') == 5 )
                                พฤษภาคม
                                @elseif ( date('m') == 6 )
                                มิถุนายน
                                @elseif ( date('m') == 7 )
                                กรกฎาคม
                                @elseif ( date('m') == 8 )
                                สิงหาคม
                                @elseif ( date('m') == 9 )
                                กันยายน
                                @elseif ( date('m') == 10 )
                                ตุลาคม
                                @elseif ( date('m') == 11 )
                                พฤศจิกายน
                                @elseif ( date('m') == 12 )
                                ธันวาคม
                                @endif
                                {{date('Y') + 543 }}
                            </p>
                        </div>

                        <div class="box-border">
                            <div class="columns">
                                <div class="column is-3">
                                    <label class="label"><b>ผู้รับเรื่อง</b> </label>
                                </div>
                                <div class="column is-9">
                                    <label>{{ $show_data->receiver }} </label>
                                </div>
                            </div>
                            <div class="columns">
                                <div class="column is-3">
                                    <label class="label"><b>วันที่รับเรื่อง</b> </label>
                                </div>
                                <div class="column is-9">
                                    วันที่ {{ date('d',strtotime(str_replace('-','/', $show_timeline->operate_time))) }}

                                    เดือน
                                    @if ( date('m',strtotime(str_replace('-','/', $show_timeline->operate_time))) == 1 )
                                    มกราคม
                                    @elseif ( date('m',strtotime(str_replace('-','/', $show_timeline->operate_time))) ==
                                    2 )
                                    กุมภาพันธ์
                                    @elseif ( date('m',strtotime(str_replace('-','/', $show_timeline->operate_time))) ==
                                    3 )
                                    มีนาคม
                                    @elseif ( date('m',strtotime(str_replace('-','/', $show_timeline->operate_time))) ==
                                    4 )
                                    เมษายน
                                    @elseif( date('m',strtotime(str_replace('-','/', $show_timeline->operate_time))) == 5
                                    )
                                    พฤษภาคม
                                    @elseif( date('m',strtotime(str_replace('-','/', $show_timeline->operate_time))) == 6
                                    )
                                    มิถุนายน
                                    @elseif( date('m',strtotime(str_replace('-','/', $show_timeline->operate_time))) == 7
                                    )
                                    กรกฎาคม
                                    @elseif( date('m',strtotime(str_replace('-','/', $show_timeline->operate_time))) == 8
                                    )
                                    สิงหาคม
                                    @elseif( date('m',strtotime(str_replace('-','/', $show_timeline->operate_time))) == 9
                                    )
                                    กันยายน
                                    @elseif( date('m',strtotime(str_replace('-','/', $show_timeline->operate_time))) ==
                                    10 )
                                    ตุลาคม
                                    @elseif( date('m',strtotime(str_replace('-','/', $show_timeline->operate_time))) ==
                                    11 )
                                    พฤศจิกายน
                                    @elseif( date('m',strtotime(str_replace('-','/', $show_timeline->operate_time))) ==
                                    12 )
                                    ธันวาคม
                                    @endif

                                    ปี พ.ศ.
                                    {{date('Y',strtotime(str_replace('-','/', $show_timeline->operate_time))) + 543 }}
                                </div>
                            </div>

                            @if($show_data->sender != '')
                            <div class="columns">
                                <div class="column is-3">
                                    <label class="label"><b>ผู้แจ้งเรื่อง</b> </label>
                                </div>
                                <div class="column is-3">
                                    <label>{{ $show_data->sender }} </label>
                                </div>
                                <div class="column is-3">
                                    <label class="label"><b>เบอร์มือถือผู้แจ้ง</b> </label>
                                </div>
                                <div class="column is-3">
                                    <label>{{ $show_data->agent_tel }} </label>
                                </div>
                            </div>
                            @endif

                            <div class="columns">
                                <div class="column is-3">
                                    <label class="label"><b>ชื่อผู้ถูกกระทำ</b> </label>
                                </div>
                                <div class="column is-3">
                                    <label>{{ $show_data->name }} </label>
                                </div>
                                <div class="column is-3">
                                    <label class="label"><b>ID-Code</b> </label>
                                </div>
                                <div class="column is-3">
                                    <label>{{ $show_data->case_id }} </label>
                                </div>
                            </div>
                            <div class="columns">
                                <div class="column is-3">
                                    <label class="label"><b>เบอร์ผู้ถูกกระทำ</b> </label>
                                </div>
                                <div class="column is-9">
                                    <label>{{ $show_data->victim_tel }} </label>
                                </div>
                            </div>
                            <div class="columns">
                                <div class="column is-3">
                                    <label class="label"><b>เพศ</b> </label>
                                </div>
                                <div class="column is-3">
                                    <label>
                                        @if( $show_data->sex == 1 )
                                        ชาย
                                        @elseif( $show_data->sex == 2 )
                                        หญิง
                                        @elseif( $show_data->sex == 3 )
                                        สาวประเภทสอง
                                        @elseif( $show_data->sex == 4 )
                                        อื่นๆ
                                        @endif
                                    </label>
                                </div>
                                <div class="column is-3">
                                    <label class="label"><b>สัญชาติ</b> </label>
                                </div>
                                <div class="column is-3">
                                    <label>
                                        @if( $show_data->nation == 1 )
                                        ไทย
                                        @elseif( $show_data->nation == 2 )
                                        ลาว
                                        @elseif( $show_data->nation == 3 )
                                        เวียดนาม
                                        @elseif( $show_data->nation == 4 )
                                        พม่า
                                        @elseif( $show_data->nation == 5 )
                                        กัมพูชา
                                        @elseif( $show_data->nation == 6 )
                                        อื่นๆ
                                        @endif
                                    </label>
                                </div>
                            </div>
                            <div class="columns">
                                <div class="column is-3">
                                    <label class="label"><b>วันที่เกิดเหตุ</b> </label>
                                </div>
                                <div class="column is-9">
                                    วันที่ {{ date('d',strtotime(str_replace('-','/', $show_data->accident_date))) }}

                                    เดือน
                                    @if ( date('m',strtotime(str_replace('-','/', $show_data->accident_date))) == 1 )
                                    มกราคม
                                    @elseif ( date('m',strtotime(str_replace('-','/', $show_data->accident_date))) ==
                                    2 )
                                    กุมภาพันธ์
                                    @elseif ( date('m',strtotime(str_replace('-','/', $show_data->accident_date))) ==
                                    3 )
                                    มีนาคม
                                    @elseif ( date('m',strtotime(str_replace('-','/', $show_data->accident_date))) ==
                                    4 )
                                    เมษายน
                                    @elseif( date('m',strtotime(str_replace('-','/', $show_data->accident_date))) == 5
                                    )
                                    พฤษภาคม
                                    @elseif( date('m',strtotime(str_replace('-','/', $show_data->accident_date))) == 6
                                    )
                                    มิถุนายน
                                    @elseif( date('m',strtotime(str_replace('-','/', $show_data->accident_date))) == 7
                                    )
                                    กรกฎาคม
                                    @elseif( date('m',strtotime(str_replace('-','/', $show_data->accident_date))) == 8
                                    )
                                    สิงหาคม
                                    @elseif( date('m',strtotime(str_replace('-','/', $show_data->accident_date))) == 9
                                    )
                                    กันยายน
                                    @elseif( date('m',strtotime(str_replace('-','/', $show_data->accident_date))) ==
                                    10 )
                                    ตุลาคม
                                    @elseif( date('m',strtotime(str_replace('-','/', $show_data->accident_date))) ==
                                    11 )
                                    พฤศจิกายน
                                    @elseif( date('m',strtotime(str_replace('-','/', $show_data->accident_date))) ==
                                    12 )
                                    ธันวาคม
                                    @endif

                                    ปี พ.ศ.
                                    {{date('Y',strtotime(str_replace('-','/', $show_data->accident_date))) + 543 }}
                                </div>
                            </div>
                            <div class="columns">
                                <div class="column is-3">
                                    <label class="label"><b>พื้นที่ จังหวัด</b> </label>
                                </div>
                                <div class="column is-3">
                                    <label>{{ $show_data->Provinces->PROVINCE_NAME }} </label>
                                </div>
                                <div class="column is-3">
                                    <label class="label"><b>อำเภอ</b> </label>
                                </div>
                                <div class="column is-3">
                                    <label>{{ $show_data->Amphurs->AMPHUR_NAME }} </label>
                                </div>
                            </div>
                            <div class="columns">
                                <div class="column is-3">
                                    <label class="label"><b>ปัญหาที่แจ้ง</b> </label>
                                </div>
                                <div class="column is-9">
                                    <label> 
                                    @if($show_data->problem_case == 1)
                                    บังคับตรวจเอชไอวี
                                    @elseif($show_data->problem_case == 2)
                                    เปิดเผยสถานะการติดเชื้อเอชไอวี
                                    @elseif($show_data->problem_case == 3)
                                    ถูกกีดกันหรือถูกเลือกปฏิบัติเนื่องมาจาการติดเชื้อเอชไอวี
                                    @elseif($show_data->problem_case == 4)
                                    ถูกกีดกันหรือถูกเลือกปฏิบัติเนื่องมาจากเป็นกลุ่มเปราะบาง
                                    @elseif($show_data->problem_case == 5)
                                    อื่นๆ ที่เกี่ยวข้องกับเอชไอวี
                                    @elseif($show_data->problem_case == 6)
                                    กรณีอื่นๆ ที่ไม่เกี่ยวข้องกับเอชไอวี
                                    @endif
                                    </label>
                                </div>
                            </div>
                            <div class="columns">
                                <div class="column is-3">
                                    <label class="label"><b>กลุ่มที่ได้รับผลกระทบ</b> </label>
                                </div>
                                <div class="column is-3">
                                    <label>
                                        @if(($show_data->problem_case == 1)||($show_data->problem_case == 5))
                                            @if($show_data->sub_problem == 1){
                                                ผู้ติดเชื้อเอชไอวี
                                                @endif
                                            @if($show_data->sub_problem == 2)
                                                กลุ่มเปราะบาง
                                                @endif
                                            @if($show_data->sub_problem == 4)
                                                ครอบครัวและผู้ใกล้ชิดผู้ติดเชื้อเอชไอวี
                                                @endif
                                            @if($show_data->sub_problem == 3)
                                                ประชาชนทั่วไป
                                                @endif
                                        @elseif($show_data->problem_case == 2 )
                                            ผู้ติดเชื้อเอชไอวี
                                        @elseif($show_data->problem_case == 3)
                                            @if($show_data->sub_problem == 1)
                                            @endif
                                                ผู้ติดเชื้อเอชไอวี
                                            @if($show_data->sub_problem == 4)
                                                ครอบครัวและผู้ใกล้ชิดผู้ติดเชื้อเอชไอวี
                                            @endif

                                        @elseif($show_data->problem_case == 4)
                                            กลุ่มเปราะบาง

                                        @endif
                                    </label>
                                </div>
                            
                                <div class="column is-3">
                                    <label class="label"><b>ประเภทกลุ่ม</b> </label>
                                </div>
                                <div class="column is-3">
                                    <label>
                                    @if($show_data->group_code == null) 
                                        ไม่มี  
                                    @endif
                                    @if($show_data->sub_problem == 2)
                                        @if($show_data->group_code == 1)
                                            กลุ่มหลากหลายทางเพศ
                                        @endif
                                        @if($show_data->group_code == 2)
                                            พนักงานบริการ
                                        @endif
                                        @if($show_data->group_code == 3)
                                            ผู้ใช้สารเสพติด
                                        @endif
                                        @if($show_data->group_code == 4)
                                            ประชากรข้ามชาติ
                                        @endif
                                        @if($show_data->group_code == 5)
                                            ผู้ต้องขัง
                                        @endif
                                        @if($show_data->group_code == 6)
                                            กลุ่มชนเผ่า
                                        @endif
                                    @endif
                                    </label>
                                </div>
                            </div>
                            <div class="columns">
                                <div class="column is-3">
                                    <label class="label"><b>รายละเอียดของปัญหา</b> </label>
                                </div>
                                <div class="column is-9 boxlabel">
                                    <label>{{ $show_data->detail }} </label>
                                </div>
                            </div>
                            <div class="columns">
                                <div class="column is-3">
                                    <label class="label"><b>ความต้องการความช่วยเหลือ</b> </label>
                                </div>
                                <div class="column is-9 boxlabel">
                                    <label>{{ $show_data->need }} </label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="">
                            <b>การดำเนินการที่ผ่านมา</b>
                        </div>
                        <br>
                        @foreach($activities as $activitie)

                        <div class="box-border">
                            <div class="columns">
                                <div class="column is-3">
                                    <label class="label"><b>วันที่ดำเนินการ</b> </label>
                                </div>
                                <div class="column is-9">
                                    วันที่ {{ date('d',strtotime(str_replace('-','/', $activitie->operate_date))) }}

                                    เดือน
                                    @if ( date('m',strtotime(str_replace('-','/', $activitie->operate_date))) == 1 )
                                    มกราคม
                                    @elseif ( date('m',strtotime(str_replace('-','/', $activitie->operate_date))) ==
                                    2 )
                                    กุมภาพันธ์
                                    @elseif ( date('m',strtotime(str_replace('-','/', $activitie->operate_date))) ==
                                    3 )
                                    มีนาคม
                                    @elseif ( date('m',strtotime(str_replace('-','/', $activitie->operate_date))) ==
                                    4 )
                                    เมษายน
                                    @elseif( date('m',strtotime(str_replace('-','/', $activitie->operate_date))) == 5
                                    )
                                    พฤษภาคม
                                    @elseif( date('m',strtotime(str_replace('-','/', $activitie->operate_date))) == 6
                                    )
                                    มิถุนายน
                                    @elseif( date('m',strtotime(str_replace('-','/', $activitie->operate_date))) == 7
                                    )
                                    กรกฎาคม
                                    @elseif( date('m',strtotime(str_replace('-','/', $activitie->operate_date))) == 8
                                    )
                                    สิงหาคม
                                    @elseif( date('m',strtotime(str_replace('-','/', $activitie->operate_date))) == 9
                                    )
                                    กันยายน
                                    @elseif( date('m',strtotime(str_replace('-','/', $activitie->operate_date))) ==
                                    10 )
                                    ตุลาคม
                                    @elseif( date('m',strtotime(str_replace('-','/', $activitie->operate_date))) ==
                                    11 )
                                    พฤศจิกายน
                                    @elseif( date('m',strtotime(str_replace('-','/', $activitie->operate_date))) ==
                                    12 )
                                    ธันวาคม
                                    @endif

                                    ปี พ.ศ.
                                    {{date('Y',strtotime(str_replace('-','/', $activitie->operate_date))) + 543 }}
                                </div>
                            </div>

                            <div class="columns">
                                <div class="column is-3">
                                    <label class="label"><b>วิธีการดำเนินการ</b> </label>
                                </div>
                                <div class="column is-9">
                                    <label>
                                        <span>
                                            @if($activitie->investigate ==1 )
                                            <i class="far fa-check-square fa-lg"></i>
                                            @else
                                            <i class="far fa-square fa-lg"></i>
                                            @endif
                                            สืบหาข้อเท๊จจริง &nbsp;
                                        </span>
                                    </label>
                                    <label>
                                        <span>
                                            @if($activitie->advice ==1 )
                                            <i class="far fa-check-square fa-lg"></i>
                                            @else
                                            <i class="far fa-square fa-lg"></i>
                                            @endif
                                            ให้คำปรึกษา &nbsp;
                                        </span>
                                    </label>
                                    <label>
                                        <span>
                                            @if($activitie->negotiate_individual ==1 )
                                            <i class="far fa-check-square fa-lg"></i>
                                            @else
                                            <i class="far fa-square fa-lg"></i>
                                            @endif
                                            เจรจาเป็นรายบุคคล &nbsp;
                                        </span>
                                    </label>
                                    <label class="content is-size-6">
                                        <span>
                                            @if($activitie->negotiate_policy ==1 )
                                            <i class="far fa-check-square fa-lg">&nbsp;<span
                                                    class="is-size-6">เจรจาระดับนโยบายขององค์กร</span></i>
                                            @else
                                            <i class="far fa-square fa-lg">&nbsp;<span
                                                    class="is-size-6">เจรจาระดับนโยบายขององค์กร</span></i>
                                            @endif
                                        </span>
                                    </label>
                                </div>
                            </div>

                            <div class="columns">
                                <div class="column is-3">
                                    <label class="label"><b>รายละเอียดการดำเนินการ</b> </label>
                                </div>
                                <div class="column is-9 boxlabel">
                                    {{$activitie->operate_detail}}
                                </div>
                            </div>

                            <div class="columns">
                                <div class="column is-3">
                                    <label class="label"><b>ผลการดำเนินการ</b> </label>
                                </div>
                                <div class="column is-9 boxlabel">
                                    {{$activitie->operate_result}}
                                </div>
                            </div>

                        </div>

                        <br>

                        @endforeach


                        <div class="">
                            <b>ผลการดำเนินการ</b>
                        </div>
                        <br>
                        <div class="box-border">

                            <div class="columns">
                                <div class="column is-3">
                                    <label class="label"><b>สถานะการดำเนินการ</b> </label>
                                </div>
                                <div class="column is-9 ">
                                    @if($show_data->status == 4 )
                                    อยู่ระหว่างการดำเนินการ
                                    @elseif($show_data->status == 5 )
                                    ดำเนินการเสร็จสิ้น
                                    @elseif($show_data->status == 6 )
                                    ดำเนินการแล้วส่งต่อ
                                    @endif
                                </div>
                            </div>
                            @if($show_data->status == 5 )
                            <div class="columns">
                                <div class="column is-3">
                                    <label class="label"><b>ผลการดำเนินการ</b> </label>
                                </div>
                                <div class="column is-9">
                                    @if($show_data->operate_result_status == 1 )
                                    สำเร็จ
                                    @elseif($show_data->operate_result_status == 2 )
                                    ไม่สำเร็จ
                                    @elseif($show_data->operate_result_status == 3 )
                                    ตาย
                                    @elseif($show_data->operate_result_status == 4 )
                                    ย้ายที่อยู่
                                    @endif
                                </div>
                            </div>
                            <div class="columns">
                                <div class="column is-3">
                                    <label class="label"><b></b> </label>
                                </div>
                                <div class="column is-9">
                                    <label class="checkbox">
                                        @if($show_data->problemfix == 1 )
                                        <i class="far fa-check-square fa-lg"></i>
                                        @else
                                        <i class="far fa-square fa-lg"></i>
                                        @endif
                                        ปัญหาได้รับการแก้ไข &nbsp;
                                    </label>
                                    <label class="checkbox">
                                        @if($show_data->compensation == 1 )
                                        <i class="far fa-check-square fa-lg"></i>
                                        @else
                                        <i class="far fa-square fa-lg"></i>
                                        @endif
                                        บุคคลได้รับการเยียวยา &nbsp;
                                    </label>
                                    <label class="checkbox">
                                        @if($show_data->change_policy == 1 )
                                        <i class="far fa-check-square fa-lg"></i>
                                        @else
                                        <i class="far fa-square fa-lg"></i>
                                        @endif
                                        องค์กรเปลี่ยนนโยบาย
                                    </label>
                                </div>
                            </div>
                            @endif

                        </div>
                    </div>
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

    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
    </script>

</body>

</html>