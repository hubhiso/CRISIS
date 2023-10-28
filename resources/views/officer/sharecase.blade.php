<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300&display=swap" rel="stylesheet">

    <link href="{{ asset('bulma-0.9.0/css/bulma.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mystyles.css') }}" rel="stylesheet">
    <script src="{{ asset('css/jquery.min.js') }}"></script>

    <link href="{{ asset('css/font-awesome5.0.6/css/fontawesome-all.css') }}" rel="stylesheet">


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

    <div class="container">

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
                                <i class="fa fa-user-plus" aria-hidden="true"></i>
                            </span>
                            <span>เชิญทีมร่วมจัดการเคส</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <br>

            <h3 class="mb-5">
                <sapn class="has-text-info is-size-4"><i class="fa fa-user-plus" aria-hidden="true"></i></sapn>

                <span class=" is-size-4">
                    &nbsp;เชิญทีมร่วมจัดการเคส
                </span>

            </h3>

            <div class="content">

                <form class="form-horizontal mb-5" role="form" method="POST"
                    action="{{ route('manager.manage_sharecase') }}">

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div id="tab_data" class="mb-5">

                        <div class="box">
                            <div class="columns">
                                <div class="column">
                                    <div class="field">
                                        <label class="label">ผู้ถูกกระทำ</label>
                                        <div class="control">
                                            <p class="control is-expanded has-icons-left ">
                                                <input class="input"  type="text" value="{{ $show_data->name }}"
                                                    disabled>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="column">
                                    <div class="field">
                                        <label class="label">ID-Code</label>
                                        <div class="control">
                                            <p class="control is-expanded has-icons-left has-icons-right">
                                                <input class="input" type="text" value="{{ $show_data->case_id }}"
                                                    disabled>
                                                {!! Form::text('case_id',$show_data->case_id,['class'=>'text',
                                                'hidden']) !!}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="columns">
                                <div class="column">
                                    <div class="field">
                                        <label class="label">จังหวัด</label>
                                        <div class="control">
                                            <p class="control is-expanded has-icons-left ">
                                                <input name="prov" class="input" type="text" placeholder="ชื่อผู้แจ้ง"
                                                    value="{{ $show_data->Provinces->PROVINCE_NAME }}" disabled>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="column">
                                    <div class="field">
                                        <label class="label">อำเภอ</label>
                                        <div class="control">
                                            <p class="control is-expanded has-icons-left has-icons-right">
                                                <input class="input" type="email" placeholder="ID-CODE"
                                                    value="{{ $show_data->Amphurs->AMPHUR_NAME }}" disabled>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div id="tab_share" class="mb-5">

                        <div class="box ">

                            <div class="columns">
                                <div class="column">
                                    <div class="field">
                                        <label class="label">ผู้รับเรื่อง</label>
                                        <div class="control">
                                            <p class="control is-expanded has-icons-left has-icons-right">
                                                <input class="input" type="text" value="{{ $show_data->receiver }}"
                                                    disabled>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="columns">
                                <div class="column">
                                    <div class="field">
                                        <label class="label">เชิญทีมร่วมจัดการเคส</label>
                                    </div>
                                </div>
                            </div>

                            @foreach($sharecases as $sharecase)
                            <div class="columns">
                                <div class="column">
                                    <div class="field has-addons">
                                        <div class="select is-fullwidth control">
                                            <select name="old_shareperson[]" >
                                                @foreach($officers as $officer)
                                                <option value="{{ $officer->username }}" <?php if($officer->username == $sharecase->user_share){ echo "selected";} ?>>
                                                    {{ $officer->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="control">
                                            <button type="submit" class="button is-danger close"> ลบ </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            <div id="addshare_list" class="p-0"></div>

                            <a id="btn_addshare" class="button p-2 is-success is-rounded mt-5">
                                <i class="fa fa-plus is-success" aria-hidden="true">&nbsp;</i>
                                เพิ่มทีมร่วมจัดการเคส
                            </a>



                        </div>
                    </div>

                    <input type="hidden" name="prov_id" value="{{ Auth::user()->prov_id }}">
                    <input type="hidden" name="username" value="{{ Auth::user()->username }}">

                    <div class="field is-grouped">
                        <div class="control">
                            {!! Form::submit('ยืนยันการเปลี่ยนเจ้าหน้าที่',['class'=>'button is-danger']) !!}
                        </div>

                        <div class="control">
                            <p class="control">
                                <a class="button" href="{{ route('officer.open_dt', $show_data->case_id) }}">
                                    กลับ
                                </a>
                            </p>
                        </div>
                    </div>

                </form>


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
    </script>

    <script>
    $(document).ready(function() {

        $("#tab2").addClass("is-hidden");

    });

    var m = 1;
    $("#btn_addshare").on('click', function() {
        $("#addshare_list").append(
            `<div class="columns">
                <div class="column">
                    <div class="field has-addons">
                        <div class="select is-fullwidth control">
                            <select name="new_shareperson[]" id='shareperson${m++}'>
                                @foreach($officers as $officer)
                                <option value="{{ $officer->username }}">
                                    {{ $officer->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="control">
                            <button type="submit" class="button is-danger close"> ลบ </button>
                        </div>
                    </div>
                </div>
            </div>`
        );
    });

    $(document).on('click', 'button.close', function() {
        $(this).parent().parent().parent().remove();
    });

    function tab1() {
        $("#tab1-tab").addClass("is-active");
        $("#tab2-tab").removeClass("is-active");

        $("#tab1").removeClass("is-hidden");
        $("#tab2").addClass("is-hidden");
    }

    function tab2() {
        $("#tab2-tab").addClass("is-active");
        $("#tab1-tab").removeClass("is-active");

        $("#tab2").removeClass("is-hidden");
        $("#tab1").addClass("is-hidden");
    }

    $('#province').on('change', function(e) {
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
    </script>


</body>

</html>