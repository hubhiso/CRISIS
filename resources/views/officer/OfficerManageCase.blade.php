<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" class="route-index">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#ab3c3c" />
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">

    {{ Html::style('bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}

    {{ Html::script('js/jquery.min.js') }}
    {{ Html::script('bootstrap/js/bootstrap.min.js') }}
    {{ Html::script('bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}

    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.1/css/bulma.min.css">
    <!--link href="{{ asset('bulma-0.9.0/css/bulma.css') }}" rel="stylesheet"-->
    <!--link href="{{ asset('bulma-0.8.0/css/bulma.css') }}" rel="stylesheet"-->
    <link href="{{ asset('css/mystyles.css') }}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bm/dt-1.13.1/datatables.min.css" />

    <title> ปกป้อง (CRS) </title>

    <style>
    .hideextra {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .datepicker {
        background-color: #fff;
        color: #333;
        padding: 5px;
        border: 2px solid #eee;
        padding: 20px;
    }
    </style>
</head>

<body class="layout-default has-background-light theme-light light" onload="auto_select_status({{ $mode_id}});load_case();">

    @component('component.login_bar2')
    @endcomponent

    <input type="hidden" id="token" value="{{ csrf_token() }}">

    <div class="container is-fluid">
        <div class=" section ">
            <nav class="breadcrumb " aria-label="breadcrumbs">
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
                        <a href="#" class="has-text-dark">
                            <span class="icon is-small">
                                <i class="fas fa-list" aria-hidden="true"></i>
                            </span>
                            <span>จัดการเหตุ</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <div class="level">
                <!-- Left side -->
                <div class="level-left">

                </div>

                <!-- Right side -->
                <div class="level-right">
                    <div class="level-item">
                        <p class="subtitle is-6">
                            <strong> เลือกวันที่ </strong>
                        </p>
                    </div>
                    <div class="level-item input-daterange">
                        <input type="text" class="input bulmaCalendar form-control" id="date_start">
                    </div>
                    <div class="level-item">
                        <div class="input-group-addon">ถึง</div>
                    </div>
                    <div class="level-item input-daterange">
                        <input type="text" class=" input bulmaCalendar form-control" id="date_end">
                    </div>
                </div>
            </div>

            <div class="level">
                <!-- Left side -->
                <div class="level-left">
                    <div class="level-item">
                        <p class="subtitle is-6">
                            <strong>สืบค้น</strong>
                        </p>
                    </div>
                    <div class="level-item">
                        <div class="field has-addons">
                            <p class="control">
                                <input class="input" type="text" id="text_search" placeholder="">
                            </p>
                            <p>
                                <span class="select">
                                    <select id="type_search">
                                        <option value="1"> ชื่อ </option>
                                        <option value="2"> ผู้รับเรื่อง </option>
                                        <option value="3"> เบอร์ติดต่อ </option>
                                        <option value="4"> รหัส </option>
                                    </select>
                                </span>
                            </p>
                            <p class="control"> <button class="button is-danger has-text-white" onclick="load_case()"> ตกลง </button>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Right side -->
                <div class="level-right">
                    <div class="level-item">
                        <p class="subtitle is-6">
                            <strong> กรอง </strong>
                        </p>
                    </div>
                    <div class="level-item">
                        <div class="field has-addons">
                            <p>
                                <span class="select">
                                    <select id="filter_search">
                                        <option value="1"> ทั้งหมด </option>
                                        <option value="2"> ประเภท </option>
                                        <option value="3"> สถานะ </option>
                                        <option value="4"> ประเภทของผู้แจ้ง </option>
                                        <option value="5"> เคสส่งต่อ </option>
                                        <option value="6"> จังหวัด </option>
                                    </select>
                                </span>
                            </p>
                            <p>
                                <span class="select">
                                    <select id="sub_filter_search" disabled="disabled" onchange="load_case()">

                                    </select>
                                </span>
                            </p>
                            <!--p class="control"> <button class="button is-primary"> ตกลง </button> </p-->
                        </div>
                    </div>
                    <div class="level-item has-text-centered">
                        <div>
                            <p class="heading is-4"> จำนวนเรื่อง </p>
                            <p class="title is-4"><label id="case_number"></label></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="body has-text-centered">
                <br />

                <div class="table-case_container has-text-centered" style="overflow-x:auto; margin:auto;">

                </div>
            </div>
            <br>
            <p class="has-text-centered ">
                สามารถคลิกที่ตาราง แล้วกด
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                <i class="fa fa-arrow-right" aria-hidden="true"></i>
                เพื่อเลื่อนดูข้อมูล
            </p>

            <br>

            <div class="columns is-multiline is-mobile">
                <div class="column is-half">

                    @if(Auth::user()->position == 'admin' )
                    
                    <label style=" white-space:nowrap;">Download ข้อมูลรายเคส </label>
                    <br>
                    <br>
                    <div class="body columns">
                        <form class="box column is-narrow" role="form" method="POST"
                            action="{{ route('officer.Export_Excel') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="field is-grouped">
                                <div class="control field-label is-normal">
                                    <label style=" white-space:nowrap;">เลือกวันที่ </label>
                                </div>
                                <div class="control input-daterange">
                                    <input type="text" class="input bulmaCalendar form-control" name="date_start2"
                                        id="date_start2">
                                </div>
                                <div class="control field-label is-normal has-text-centered">
                                    <label>ถึง </label>
                                </div>
                                <div class="control input-daterange">
                                    <input type="text" class=" input bulmaCalendar form-control" name="date_end2"
                                        id="date_end2">
                                </div>
                                <div class="control field-label is-normal">
                                    <label style=" white-space:nowrap;">เลือกข้อมูล </label>
                                </div>
                                <div class="control">
                                    <div class="select">
                                        <select name="type_export">
                                            <option value="1">ทั้งหมด</option>
                                            <option value="2">รายเคส</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="control ">
                                    <button type="submit" id="btn_submit" class="button is-primary is-rounded"
                                        formtarget="_blank">ส่งข้อมูล</button>
                                </div>
                            </div>
                        </form>

                    </div>
                    @endif

                </div>

                <div class="column is-half">

                @if(Auth::user()->username == 'crisistest' )
                <div class="level">
                    <!-- Left side -->
                    <div class="level-left">
                    </div>

                    <!-- Right side -->
                    <div class="level-right">
                        <a href="{{ route('officer.recase') }}" class="button is-danger">กู้คืนข้อมูล</a>
                    </div>
                </div>
                    
                @endif
                </div>

            </div>

        </div>
    </div>

    @extends('officer.footer_m')

    <!-- datatable core JS-->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bm/dt-1.13.1/datatables.min.js"></script>

    <script src="{{ asset('bulma/clipboard-1.7.1.min.js') }}"></script>
    <script src="{{ asset('bulma/main.js') }}"></script>

    <script>
    $(document).ready(function() {
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
            '.modal-background, .modal-close, .modal-card-head .delete, .modal-card-foot .button') || [])
        .forEach((
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

    $('.input-daterange input').each(function() {
        $(this).datepicker('clearDates');
        $('#date_end').datepicker("setDate", new Date());
    }).on('changeDate', function(e) {
        load_case()
    });

    function auto_select_status(status) {
        if (status == 1) {
            $("#filter_search option[value='3']").attr("selected", "selected");
            set_suboption(3);
            $("#sub_filter_search option[value='1']").attr("selected", "selected");
            load_case()

        } else if (status == 2) {
            $("#filter_search option[value='3']").attr("selected", "selected");
            set_suboption(3);
            $("#sub_filter_search option[value='2']").attr("selected", "selected");
            load_case()

        } else if (status == 3) {
            $("#filter_search option[value='3']").attr("selected", "selected");
            set_suboption(3);
            $("#sub_filter_search option[value='3']").attr("selected", "selected");
            load_case()
        } else {
            //// do nothing
        }
    }

    function load_case() {
        var token = $('#token').val();
        var p_id = $('#p_id').val();
        var username = $('#user_name').val();
        var text_search = $('#text_search').val();
        var type_Search = $('#type_search').val();
        var Date_start = $('#date_start').val();
        var Date_end = $('#date_end').val();
        var Filter = $('#filter_search').val();
        var Sub_Filter = $('#sub_filter_search').val();
        var pposition = $('#p_position').val();
        var parea = $('#p_area').val();

        var $container = $('.table-case_container');

        var p_po = $('#p_position').val();
        var p_ar = $('#p_area').val();

        var status_url = "{{route('officer.load_status',['prov_id' => ':p_id']) }}";

        //alert(Sub_Filter);
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
        $.ajax({
            type: 'POST',
            url: '{!!  route("officer.load_case") !!}',
            data: {
                _token: token,
                pid: p_id,
                username: username,
                Search_text: text_search,
                Type_search: type_Search,
                Date_start: Date_start,
                Date_end: Date_end,
                Filter: Filter,
                Sub_Filter: Sub_Filter,
                pposition: pposition,
                parea: parea
            },
            success: function(data) {
                //  console.log(data);
                $container.html(data.html);
                var rows = $('#table_show tbody tr').length;
                document.getElementById('case_number').innerHTML = rows;

            }
        })
    }

    function set_suboption(search_type) {
        if (search_type == 1) {
            $('#sub_filter_search').empty();
            $('#sub_filter_search').attr('disabled', 'disabled');
        } else if (search_type == 2) {
            $('#sub_filter_search').empty();
            $('#sub_filter_search').removeAttr('disabled');
            $('#sub_filter_search').append('<option value="1" style="width:250px">บังคับตรวจเอชไอวี</option>');
            $('#sub_filter_search').append(
                '<option value="2" style="width:250px">เปิดเผยสถานะการติดเชื้อเอชไอวี</option>');
            $('#sub_filter_search').append(
                '<option value="3" style="width:250px">ถูกกีดกันหรือถูกเลือกปฏิบัติเนื่องมาจาการติดเชื้อเอชไอวี</option>'
            );
            $('#sub_filter_search').append(
                '<option value="4" style="width:250px">ถูกกีดกันหรือถูกเลือกปฏิบัติเนื่องมาจากเป็นกลุ่มเปราะบาง</option>'
            );
            $('#sub_filter_search').append(
                '<option value="5" style="width:250px">อื่นๆ ที่เกี่ยวข้องกับเอชไอวี</option>'
            );
            $('#sub_filter_search').append(
                '<option value="6" style="width:250px">อื่นๆ</option>'
            );
        } else if (search_type == 3) {
            $('#sub_filter_search').empty();
            $('#sub_filter_search').removeAttr('disabled');
            $('#sub_filter_search').append('<option value="1" style="width:250px">ยังไม่ได้รับเรื่อง</option>');
            $('#sub_filter_search').append('<option value="2" style="width:250px">รับเรื่องแล้ว </option>');
            $('#sub_filter_search').append('<option value="3" style="width:250px">บันทึกข้อมูลเพิ่มเติมแล้ว</option>');
            $('#sub_filter_search').append('<option value="4" style="width:250px">อยู่ระหว่างดำเนินการ</option>');
            $('#sub_filter_search').append('<option value="5" style="width:250px">ดำเนินการเสร็จสิ้น</option>');
            $('#sub_filter_search').append('<option value="6" style="width:250px">ดำเนินการแล้วส่งต่อ</option>');
            $('#sub_filter_search').append('<option value="99" style="width:250px">ปฏิเสธรับเรื่อง</option>');
            $('#sub_filter_search').append('<option value="98" style="width:250px">ยุติการดำเนินการ</option>');
        } else if (search_type == 4) {
            $('#sub_filter_search').empty();
            $('#sub_filter_search').removeAttr('disabled');
            $('#sub_filter_search').append('<option value="1" style="width:250px">แจ้งด้วยตนเอง</option>');
            $('#sub_filter_search').append('<option value="2" style="width:250px">มีผู้แจ้งแทน</option>');
            $('#sub_filter_search').append('<option value="3" style="width:250px">เจ้าหน้าที่แจ้ง</option>');
        } else if (search_type == 6) {
            $('#sub_filter_search').empty();
            $('#sub_filter_search').removeAttr('disabled');

            @foreach($provinces as $province)

            $('#sub_filter_search').append(
                '<option value="{{ $province->PROVINCE_CODE }}" style="width:250px" > {{ $province->PROVINCE_NAME }} </option>'
            );

            @endforeach
        }
    }
    $('#filter_search').on('change', function(e) {
        var search_type = e.target.value;
        set_suboption(search_type);
        load_case()
    });
    </script>
</body>

</html>