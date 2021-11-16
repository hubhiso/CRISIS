<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" class="route-index">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300&display=swap" rel="stylesheet">
    <link href="{{ asset('bulma-0.8.0/css/bulma.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mystyles.css') }}" rel="stylesheet">
    {{ Html::script('js/jquery.min.js') }}

    <title> ปกป้อง (CRS) </title>

    <meta name="theme-color" content="#ab3c3c" />

	<link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">

</head>

<body class="layout-default has-background-light">

    <div class="hero-head ">
        <div class=" ">
            @component('component.login_bar2')
            @endcomponent
        </div>
    </div>

    <form class="form-horizontal" role="form" method="POST" action="{{ route('officer.accept_c') }}">

        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <input type="hidden" name="id_officer" value="{{ Auth::user()->id }}">


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
                                    <i class="fa fa-id-card" aria-hidden="true"></i>
                                </span>
                                <span>ข้อมูลเบื้องต้น</span>
                            </a>
                        </li>
                    </ul>
                </nav>

                <div class="content">
                    <h1>
                        <sapn class="has-text-danger">
                            <i class="fa fa-id-card" aria-hidden="true"></i>
                        </sapn>&nbsp;ข้อมูลเบื้องต้น
                    </h1>

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
                                    <p class="control  has-icons-left">
                                        <input class="input" type="text" value="{{ $show_data->created_at }}" disabled>
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
                                        <span class="icon is-small is-left">  </span>
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
                                <label class="label"> เบอร์มือถือ </label>
                            </div>
                            <div class="field-body">
                                <div class="field is-grouped">
                                    <p class="control  has-icons-left">

                                        <input class="input" type="text" value="{{ $show_data->victim_tel }}" disabled>
                                        <span class="icon is-small is-left">  </span>
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
                                            disabled>
                                        @elseif($show_data->sex == 4)
                                        <input class="input" type="text" placeholder="ประเภท4" value="อื่นๆ" disabled>
										@elseif($show_data->sex == 0)
                                        <input class="input" type="text" placeholder="ประเภท4" value="ไม่ประสงค์ตอบ" disabled>
                                        @endif

                                </div>
								@if($show_data->sex == 4)
								<div class="field is-narrow is-grouped">
									<input class="input" type="text" placeholder="ประเภท4" value="{{ $show_data->sex_etc }}" disabled>
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
                                <label class="label"> ปัญหาที่แจ้ง</label>
                            </div>
                            <div class="field-body">
                                <div class="field is-grouped">
                                    <p class="control is-expanded has-icons-left">
                                        @if($show_data->problem_case == 1 )
                                        <input class="input" type="text" placeholder="ประเภท1" value="บังคับตรวจเอชไอวี"
                                            disabled>
                                        @elseif($show_data->problem_case == 2)
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
                                        <input class="input" type="text" placeholder="ประเภท6"
                                            value="อื่นๆ" disabled>
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
                                            value="ผู้ติดเชื้อเอชไอวี" disabled>
                                        @elseif($show_data->sub_problem == 2)
                                        <input class="input" type="text" placeholder="ประเภท2" value="กลุ่มเปราะบาง"
                                            disabled>
                                        @elseif($show_data->sub_problem == 3)
                                        <input class="input" type="text" placeholder="ประเภท3" value="ประชาชนทั่วไป"
                                            disabled>
                                        @elseif($show_data->sub_problem == 4)
                                        <input class="input" type="text" placeholder="ประเภท4"
                                            value="ครอบครัวและผู้ใกล้ชิดผู้ติดเชื้อเอชไอวี" disabled>
                                        @endif
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
                                        <input class="input" type="text" placeholder="ประเภท" value="ผู้พิการ" disabled>
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
                                    <p class="control has-icons-left ">
                                    <input  class="input" type="text" value="{{  Auth::user()->name }}" disabled >
									<input id="receive" name="receiver"  type="text" value="{{  Auth::user()->name }}" hidden >
                                    <input id="receive_username" name="receive_username"  type="text" value="{{  Auth::user()->username }}" hidden >


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
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-label">
                                <!-- Left empty for spacing -->
                            </div>
                        </div>
                    </div>

                    <div class="field is-grouped">

                        <div class="control">
                            @if (Auth::user()->p_receive == 'no')
                            @elseif (Auth::user()->p_receive == 'yes')
                            {!! Form::submit('ยืนยันการรับเรื่อง',['class'=>'button is-primary']) !!}
                            @endif
                        </div>
                        <div class="control">
                            <a class="button" href="{{ route('officer.show',['mode_id' => "0"]) }}"> ยกเลิก </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>

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

</html>