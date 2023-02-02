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

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" crossorigin="anonymous">
    {{ Html::script('js/jquery.min.js') }}
    <link href="{{ asset('/css/uploadicon/new3.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/nicelabel/css/jquery-nicelabel.css') }}" rel="stylesheet">

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

            <div class="tabs is-centered is-toggle is-toggle-rounded">
                <ul>
                    <li>
                        <a href="{{ route('officer.view_detail2' , $show_data->case_id) }}">
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

            <div class="content">

                <br>
                <div class="has-text-right">
                    <a class="button is-primary is-rounded" href="{{ route('officer.printpage' , $show_data->case_id) }}"><i
                            class="fa fa-print" aria-hidden="true"></i>&nbsp;พิมพ์รายละเอียดการดำเนินการ</a>
                </div>
                <div>
                    <p>* หน้าสำหรับผู้ดูแลเพื่อดูรายละเอียดการดำเนินการ</p>
                </div>

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

                @foreach($operate_datas as $operate_data)
                <div class="box">
                    <div class="field is-horizontal">
                        <div class="field-label">
                            <!-- Left empty for spacing -->
                        </div>
                    </div>
                    <div id="result_ac" class="">

                        <div class="field is-size-4">
                            <div class="has-text-centered">
                                <label class="label"> การดำเนินการ</label>
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-label">
                                <label class="label"> วันที่ดำเนินการ</label>
                            </div>
                            <div class="field-body">

                                วัน {{ date('d',strtotime(str_replace('-','/', $operate_data->operate_date))) }}

                                เดือน
                                @if ( date('m',strtotime(str_replace('-','/', $operate_data->operate_date))) == 1 )
                                มกราคม
                                @elseif ( date('m',strtotime(str_replace('-','/', $operate_data->operate_date))) == 2 )
                                กุมภาพันธ์
                                @elseif ( date('m',strtotime(str_replace('-','/', $operate_data->operate_date))) == 3 )
                                มีนาคม
                                @elseif ( date('m',strtotime(str_replace('-','/', $operate_data->operate_date))) == 4 )
                                เมษายน
                                @elseif( date('m',strtotime(str_replace('-','/', $operate_data->operate_date))) == 5 )
                                พฤษภาคม
                                @elseif( date('m',strtotime(str_replace('-','/', $operate_data->operate_date))) == 6 )
                                มิถุนายน
                                @elseif( date('m',strtotime(str_replace('-','/', $operate_data->operate_date))) == 7 )
                                กรกฎาคม
                                @elseif( date('m',strtotime(str_replace('-','/', $operate_data->operate_date))) == 8 )
                                สิงหาคม
                                @elseif( date('m',strtotime(str_replace('-','/', $operate_data->operate_date))) == 9 )
                                กันยายน
                                @elseif( date('m',strtotime(str_replace('-','/', $operate_data->operate_date))) == 10 )
                                ตุลาคม
                                @elseif( date('m',strtotime(str_replace('-','/', $operate_data->operate_date))) == 11 )
                                พฤศจิกายน
                                @elseif( date('m',strtotime(str_replace('-','/', $operate_data->operate_date))) == 12 )
                                ธันวาคม
                                @endif

                                ปี พ.ศ.
                                {{date('Y',strtotime(str_replace('-','/', $operate_data->operate_date))) + 543 }}
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-label">
                                <label class="label"> วิธีการดำเนินการ </label>
                            </div>
                            <div class="field-body">
                                <div class="field">
                                    <label>
                                        <span>
                                            @if($operate_data->investigate == 1 )
                                            <i class="far fa-check-square fa-lg  has-text-info"></i>
                                            @else
                                            <i class="far fa-square fa-lg "></i>
                                            @endif
                                            สืบหาข้อเท๊จจริง
                                        </span>
                                    </label>
                                    &nbsp;
                                    <label>
                                        <span>
                                            @if($operate_data->advice == 1 )
                                            <i class="far fa-check-square fa-lg  has-text-info"></i>
                                            @else
                                            <i class="far fa-square fa-lg "></i>
                                            @endif
                                            ให้คำปรึกษา
                                        </span>
                                    </label>
                                    &nbsp;
                                    <label>
                                        <span>
                                            @if($operate_data->negotiate_individual == 1 )
                                            <i class="far fa-check-square fa-lg  has-text-info"></i>
                                            @else
                                            <i class="far fa-square fa-lg  "></i>
                                            @endif
                                            เจรจาเป็นรายบุคคล
                                        </span>
                                    </label>
                                    &nbsp;
                                    <label>
                                        <span>
                                            @if($operate_data->negotiate_policy == 1 )
                                            <i class="far fa-check-square fa-lg  has-text-info"></i>
                                            @else
                                            <i class="far fa-square fa-lg  "></i>
                                            @endif
                                            เจรจาระดับนโยบายขององค์กร
                                        </span>
                                    </label>
                                    &nbsp;
                                    <label>
                                        <span>
                                            @if($operate_data->prosecution == 1 )
                                            <i class="far fa-check-square fa-lg  has-text-info"></i>
                                            @else
                                            <i class="far fa-square fa-lg  "></i>
                                            @endif
                                            ดำเนินคดี
                                        </span>
                                    </label>
                                    
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
                                        <textarea class="textarea" name="edit_operate_detail"
                                            id="edit_operate_detail{{$operate_data->id}}" disabled
                                            placeholder="กรอกรายละเอียด">{{$operate_data->operate_detail}}</textarea>
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
                                        <textarea class="textarea" name="edit_operate_result"
                                            id="edit_operate_result{{$operate_data->id}}" disabled
                                            placeholder="กรอกรายละเอียด">{{$operate_data->operate_result}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                <div class="box">
                    <div class="field is-horizontal">
                        <div class="field-label is-normal">
                            <label class="label"> สถานะการดำเนินการ </label>
                        </div>
                        <div class="field-body">
                            <div class="field is-grouped">
                                <p class="control is-expanded  ">
                                    <span class="select">
                                        <select name="status" id="status_operate" disabled>
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
                    <div class="field is-horizontal" id="result_form" @if($show_data->status != 5 ) style="display:
                        none"
                        @endif>
                        <div class="field-label is-normal">
                            <label class="label"> ผลการดำเนินการ </label>
                        </div>
                        <div class="field-body">
                            <div class="columns">
                                <p class="column">
                                    <span class="select">
                                        <select name="operate_result_status" id="operate_result_status" disabled> 
                                            <option value="1" @if($show_data->operate_result_status == 1 ) selected
                                                @endif>
                                                สำเร็จ </option>
                                            <option value="2" @if($show_data->operate_result_status == 2 ) selected
                                                @endif>
                                                ไม่สำเร็จ </option>
                                            <option value="3" @if($show_data->operate_result_status == 3 ) selected
                                                @endif>
                                                ตาย </option>
                                            <option value="4" @if($show_data->operate_result_status == 4 ) selected
                                                @endif>
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
                            <p id="chk_result" @if($show_data->operate_result_status != 1 ) style="display: none"
                                @endif>
                                <label>
                                    <span>
                                        @if($show_data->problemfix == 1 )
                                        <i class="far fa-check-square fa-lg  has-text-info"></i>
                                        @else
                                        <i class="far fa-square fa-lg "></i>
                                        @endif
                                        ปัญหาได้รับการแก้ไข
                                    </span>
                                </label>
                                &nbsp;
                                <label>
                                    <span>
                                        @if($show_data->compensation == 1 )
                                        <i class="far fa-check-square fa-lg  has-text-info"></i>
                                        @else
                                        <i class="far fa-square fa-lg "></i>
                                        @endif
                                        บุคคลได้รับการเยียวยา
                                    </span>
                                </label>
                                &nbsp;
                                <label>
                                    <span>
                                        @if($show_data->change_policy == 1 )
                                        <i class="far fa-check-square fa-lg  has-text-info"></i>
                                        @else
                                        <i class="far fa-square fa-lg "></i>
                                        @endif
                                        องค์กรเปลี่ยนนโยบาย
                                    </span>
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
                                            <option @if($show_data->prov_refer == $province->PROVINCE_CODE ) selected
                                                @endif
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
                                        placeholder="กรอกรายละเอียด" disabled>{{$show_data->final_operate_result}}</textarea>
                                </div>
                            </div>
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