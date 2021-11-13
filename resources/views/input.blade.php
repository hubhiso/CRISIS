<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300&display=swap" rel="stylesheet">

    <link href="{{ asset('bulma-0.8.0/css/bulma.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mystyles.css') }}" rel="stylesheet">

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

    <!--modal popup -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.js"></script>

    <script src="css/modal/modal.js"></script>
    <link href="{{ asset('css/modal/modal.css') }}" rel="stylesheet">

    <script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="//code.jquery.com/jquery-2.0.2.js"> </script>

    <title> ปกป้อง </title>


</head>

<body class="has-background-light">

    <form name="RegForm" class="form-horizontal" enctype="multipart/form-data" role="form" method="POST"
        onsubmit="return vali_case();" action="{{ route('store') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        @component('component.input_head') @endcomponent

        <div class="navbar has-background-light">
            <div class="navbar-end has-text-right">
                <div class="navbar-item">

                    @if(Config::get('app.locale') == 'en')

                    <a class="button is-danger is-inverted is-rounded is-small" href="{{ URL::to('change/th') }}"> Thai
                        Site&nbsp;
                        <span class="fa-stack fa-1x">
                            <i class="fa fa-circle fa-stack-2x"></i>
                            <i class="fa fa-flag fa-stack-1x fa-inverse"></i>
                        </span>
                    </a>

                    @elseif(Config::get('app.locale') == 'th')

                    <a class="button is-danger is-inverted is-rounded is-small" href="{{ URL::to('change/en') }}">
                        English
                        Site&nbsp;
                        <span class="fa-stack fa-1x">
                            <i class="fa fa-circle fa-stack-2x"></i>
                            <i class="fa fa-flag fa-stack-1x fa-inverse"></i>
                        </span>
                    </a>

                    @endif

                </div>
            </div>
        </div>

        <div class="container">

            <nav class="breadcrumb ">
                <ul>
                    <li><a href="{{ 'index.php' }}"><span class="icon is-small"><i class="fa fa-home"></i></span><span>
                                {{ trans('message.nav_home') }} </span></a>
                    </li>
                    <li class="is-active"><a><span class="icon is-small"><i class="fa fa-bullhorn"></i></span><span>
                                {{ trans('message.nav_complaint') }} </span></a>
                    </li>
                </ul>
            </nav>

            <h2 id="modern-framework" class=""> {{ trans('message.txt_head_rc') }} </h2>
            <br>


            <div id="text-checkbox" class="buttons">
                <button id="chk_agent" id="chk_agent" type="button" class="button is-info" value="1"
                    onclick="showHideDiv('data-agent')"><i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp;{{ trans('message.bt_victim_rc') }}</button>

                <input class="text-nicelabel" id="emergency" name="emergency" value="1"
                    data-nicelabel='{"position_class": "text_checkbox", "checked_text": "{{ trans('message.bt_urgent_rc') }}", "unchecked_text": "{{ trans('message.bt_urgent_rc') }}"}'
                    type="checkbox" />

            </div>

            <div class="box " id="data-agent">
                <div class="field is-horizontal">
                    <div class="field-label ">
                        <!-- Left empty for spacing -->
                    </div>
                </div>

                

                @component('component.informer_detail') @endcomponent

                <div class="field is-horizontal">
                    <div class="field-label">
                        <!-- Left empty for spacing -->
                    </div>
                </div>
            </div>

            <input id="case_id" name="case_id" type="text" value="{{  $new_id }}" hidden>
            <div class="box" id="data-person">

                <div class="field is-horizontal">
                    <div class="field-label ">
                        <!-- Left empty for spacing -->
                    </div>
                </div>
                <label>{{ trans('message.txt_head2_rc') }}</label>

                <hr> @if($errors->any())

                <ul class="notification is-warning">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">{{ trans('message.txt_name') }} *</label>
                    </div>
                    <div class="field-body">
                        <div class="field is-grouped">
                            <p class="control is-expanded has-icons-left ">
                                <input name="name" id="name" class="input" type="text"
                                    placeholder="{{ trans('message.bt_name') }} ">
                                <span class="icon is-small is-left"> <i class="fa fa-user"></i> </span>
                            </p>
                        </div>
                        <div class="field-label is-normal">
                            <label class="label">{{ trans('message.txt_tel') }} *</label>
                        </div>
                        <div class="field">
                            <p class="control is-expanded has-icons-left">
                                <input name="victim_tel" id="victim_tel" class="input" type="text"
                                    placeholder="{{ trans('message.bt_tel') }}" maxlength="10">

                                <span class="icon is-left"> <i class="fa fa-mobile-alt"></i> </span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="field is-horizontal">
                    <div class="field-label ">
                        <!-- Left empty for spacing -->
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label ">
                        <label class="label">{{ trans('message.txt_sex') }} *</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <label class="radio">
                                {{ Form::radio('biosex', '1' , true) }} {{ trans('message.txt_sex1') }}
                            </label>
                            &nbsp;
                            <label class="radio">
                                {{ Form::radio('biosex', '2' , false) }} {{ trans('message.txt_sex2') }}
                            </label>
                            &nbsp;
                            <label class="radio">
                                {{ Form::radio('biosex', '0' , false) }} {{ trans('message.txt_sex0') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label ">
                        <!-- Left empty for spacing -->
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label ">
                        <label class="label"> {{ trans('message.txt_nat') }} *</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <label class="radio">
                                {{ Form::radio('nation', '1' , true) }} {{ trans('message.txt_nat1') }}
                            </label>
                            &nbsp;
                            <label class="radio">
                                {{ Form::radio('nation', '2' , false) }} {{ trans('message.txt_nat2') }}
                            </label>
                            &nbsp;
                            <label class="radio">
                                {{ Form::radio('nation', '3' , false) }} {{ trans('message.txt_nat3') }}
                            </label>
                            &nbsp;
                            <label class="radio">
                                {{ Form::radio('nation', '4' , false) }} {{ trans('message.txt_nat4') }}
                            </label>
                            <br>
                            <label class="radio">
                                {{ Form::radio('nation', '5' , false) }} {{ trans('message.txt_nat5') }}
                            </label>
                            &nbsp;
                            <label class="radio">
                                {{ Form::radio('nation', '6' , false) }} {{ trans('message.txt_nat6') }}
                            </label>
                            &nbsp;
                            {!!
                            Form::text('nation_etc',null,['class'=>'input','placeholder'=>
                            trans('message.txt_nat6_sp'), 'style'=>'display:
                            none']) !!}
                        </div>
                    </div>
                </div>
                <div class="field is-horizontal">
                    <div class="field-label ">
                        <!-- Left empty for spacing -->
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label ">
                        <label class="label"> {{ trans('message.txt_DateofIncident') }} *</label>
                    </div>
                    <div class="field-body">
                        <div class="columns" data-provide="datepicker">
                            <div class="column ">
                                {{ trans('message.txt_year') }}
                                @if(Config::get('app.locale') == 'th')
                                <input style="width: 100px;" type="number" min="2400" max="2570" maxlength="4"
                                    id="YearAct" name="YearAct" class="form-control input"
                                    placeholder="{{ trans('message.txt_year_h') }}" value="{{date('Y')+543}}"
                                    onchange="date_acc();">
                                @elseif(Config::get('app.locale') == 'en')
                                <input style="width: 100px;" type="number" min="1900" max="2070" maxlength="4"
                                    id="YearAct" name="YearAct" class="form-control input"
                                    placeholder="{{ trans('message.txt_year_h') }}" value="{{date('Y')}}"
                                    onchange="date_acc();">
                                @endif
                            </div>
                            <div class="column ">

                                {{ trans('message.txt_month') }}
                                <div class="select">
                                    <select id="MonthAct" name="MonthAct" onchange="date_acc();">
                                        <option value="1" @if(date('m')==1){ selected } @endif>
                                            {{ trans('message.txt_month1') }} </option>
                                        <option value="2" @if(date('m')==2){ selected } @endif>
                                            {{ trans('message.txt_month2') }} </option>
                                        <option value="3" @if(date('m')==3){ selected } @endif>
                                            {{ trans('message.txt_month3') }} </option>
                                        <option value="4" @if(date('m')==4){ selected } @endif>
                                            {{ trans('message.txt_month4') }} </option>
                                        <option value="5" @if(date('m')==5){ selected } @endif>
                                            {{ trans('message.txt_month5') }} </option>
                                        <option value="6" @if(date('m')==6){ selected } @endif>
                                            {{ trans('message.txt_month6') }} </option>
                                        <option value="7" @if(date('m')==7){ selected } @endif>
                                            {{ trans('message.txt_month7') }} </option>
                                        <option value="8" @if(date('m')==8){ selected } @endif>
                                            {{ trans('message.txt_month8') }} </option>
                                        <option value="9" @if(date('m')==9){ selected } @endif>
                                            {{ trans('message.txt_month9') }} </option>
                                        <option value="10" @if(date('m')==10){ selected } @endif>
                                            {{ trans('message.txt_month10') }} </option>
                                        <option value="11" @if(date('m')==11){ selected } @endif>
                                            {{ trans('message.txt_month11') }} </option>
                                        <option value="12" @if(date('m')==12){ selected } @endif>
                                            {{ trans('message.txt_month12') }} </option>
                                    </select>
                                </div>

                            </div>

                            <div class="column  ">
                                {{ trans('message.txt_day') }}
                                <div class="select">
                                    <select class="input" id="DayAct" name="DayAct" onchange="">
                                        @for ($i = 1; $i <= 31; $i++) <option value="{{$i}}" @if(date('d')==$i){
                                            selected } @endif>{{$i}}</option>
                                            @endfor
                                    </select>
                                </div>
                            </div>

                            <div class="column  is-3">
                                <input type="hidden" id="DateAct" name="DateAct" class="form-control"
                                    value="{{date('m/d/Y')}}">
                                <input type="hidden" id="year_hidden" name="year_hidden" class="form-control"
                                    value="{{date('Y')}}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label ">
                        <!-- Left empty for spacing -->
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">{{ trans('message.txt_province') }}*</label>
                    </div>
                    <div class="field-body">
                        <div class="field is-grouped">
                            <p class="control is-expanded  ">
                                <span class="select">
                                    <select style='width:200px' name="prov_id" id="prov_id">
                                        <option value="0" style="width:250px">{{ trans('message.txt_head_pr_rc') }}
                                        </option>
                                        @foreach($provinces as $province)
                                        <option value="{{ $province->PROVINCE_CODE }}" style="width:250px">

                                            @if(Config::get('app.locale') == 'en')
                                            {{ $province->PROVINCE_NAME_EN }}
                                            @elseif(Config::get('app.locale') == 'th')
                                            {{ $province->PROVINCE_NAME }}
                                            @endif
                                        </option>
                                        @endforeach
                                    </select>
                        </div>
                        <div class="field-label is-normal">
                            <label class="label">{{ trans('message.txt_amphur') }}*</label>
                        </div>
                        <div class="field is-grouped">
                            <p class="control is-expanded  ">
                                <span class="select">
                                    <select style='width:200px' name="amphur_id" id="amphur_id">
                                        {{--@foreach($amphurs as $amphur)--}}
                                        {{--<option value="{{ $amphur->AMPHUR_CODE }}"
                                        style="width:250px">
                                        {{ $amphur->AMPHUR_NAME }}

                                        </option>--}}
                                        {{--@endforeach--}}
                                    </select>
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label ">
                        <!-- Left empty for spacing -->
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label"> </label>
                    </div>
                    <div class="field-body">
                        <div class="field  is-grouped">
                            <div class="control  ">
                                <!--p>คลิกเพื่อระบุตำแหน่งในปัจจุบัน </p-->
                                <a class="button is-primary" onclick="getLocation()">
                                    <span class="icon is-left">
                                        <i class="fas fa-location-arrow"></i>
                                    </span>
                                    <span>{{ trans('message.bt_location') }}</span>
                                </a>
                                {{ Form::hidden('geolat', null, array('id' => 'glat')) }}
                                {{ Form::hidden('geolon', null, array('id' => 'glon')) }}
                            </div>
                            <div class="control">
                                <p class=" is-primary is-medium has-text-info" id="getsuccess"></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label ">
                        <!-- Left empty for spacing -->
                    </div>
                </div>


                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">{{ trans('message.tx_problem') }} *</label>
                    </div>
                    <div class="field-body">
                        <div class="field is-grouped">
                            <p class="control is-expanded  ">
                                <span class="select">
                                    <select id="problem_case" name="problem_case">
                                        <option value="0">{{ trans('message.se_problem') }}</option>
                                        <option value="1">{{ trans('message.se_problem_1') }}</option>
                                        <option value="2">{{ trans('message.se_problem_2') }}</option>
                                        <option value="3">{{ trans('message.se_problem_3') }}</option>
                                        <option value="4">{{ trans('message.se_problem_4') }}</option>
                                        <option value="5">{{ trans('message.se_problem_5') }}</option>
                                        <option value="6">{{ trans('message.se_problem_6') }}</option>
                                    </select>

                                </span>
                            </p>
                        </div>
                    </div>
                </div>


                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label"> {{ trans('message.tx_group') }} </label>
                    </div>
                    <div class="field-body">
                        <div class="field is-grouped">
                            <p class="control is-expanded  ">
                                <span class="select">
                                    <select id="sub_problem" name="sub_problem" disabled="true">
                                    </select>
                                </span>


                            </p>
                        </div>

                    </div>
                </div>
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label"> {{ trans('message.tx_sub_group') }} </label>
                    </div>
                    <div class="field-body">
                        <div class="field is-grouped">
                            <p class="control is-expanded  ">
                                <span class="select">
                                    <span class="select">
                                        <select id="group_code" name="group_code" disabled="true">
                                        </select>
                            </p>
                        </div>
                    </div>
                </div>



                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label"> {{ trans('message.tx_problem_detail') }} </label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <textarea name="detail" class="textarea"></textarea>
                                {{--<textarea class="textarea"  id ="detail" name="detail" placeholder=" กรอกรายละเอียดของปัญหา "></textarea>--}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label"> {{ trans('message.tx_help') }} </label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <textarea name="need" class="textarea"></textarea>
                                {{--<textarea name="detail" class="textarea" placeholder="กรอกรายละเอียด"></textarea>--}}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label"> {{ trans('message.tx_upload') }} </label>
                    </div>
                    <div class="field-body">
                        <div class="file is-primary has-name is-fullwidth">
                            <label class="file-label">
                                <input class="input-file" id="file1" name="file1" type="file" name="resume">
                                <span class="file-cta">
                                    <span class="file-icon">
                                        <i class="fas fa-upload"></i>
                                    </span>
                                    <span class="file-label input-file-trigger1">
                                        {{ trans('message.bt_upload1') }}
                                    </span>
                                </span>
                                <span class="file-name file-return1">
                                    {{ trans('message.bt_upload2') }}
                                </span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                    </div>
                    <div class="field-body">
                        <div class="file is-primary has-name is-fullwidth">
                            <label class="file-label">
                                <input class="input-file" id="file2" name="file2" type="file" name="resume">
                                <span class="file-cta">
                                    <span class="file-icon">
                                        <i class="fas fa-upload"></i>
                                    </span>
                                    <span class="file-label input-file-trigger2">
                                        {{ trans('message.bt_upload1') }}
                                    </span>
                                </span>
                                <span class="file-name file-return2">
                                    {{ trans('message.bt_upload2') }}
                                </span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                    </div>
                    <div class="field-body">
                        <div class="file is-primary has-name is-fullwidth">
                            <label class="file-label">
                                <input class="input-file" id="file3" name="file3" type="file" name="resume">
                                <span class="file-cta">
                                    <span class="file-icon">
                                        <i class="fas fa-upload"></i>
                                    </span>
                                    <span class="file-label input-file-trigger3">
                                        {{ trans('message.bt_upload1') }}
                                    </span>
                                </span>
                                <span class="file-name file-return3">
                                    {{ trans('message.bt_upload2') }}
                                </span>
                            </label>
                        </div>
                    </div>
                </div>

            </div>

            <div class="field is-grouped">
                <p class="control">
                    <!--{!! Form::submit('ส่งข้อมูล',['class'=>'button is-primary']) !!}-->
                    <input type="submit" class="button is-primary" value="{{ trans('message.bt_submit') }}"
                        onsubmit="return validateForm();">

                    <input type="button" name="btn" value="Submit" id="submitBtn" data-toggle="modal"
                        data-target="#confirm-submit" class="btn btn-default" style="display:none" />

                </p>
                <p class="control">
                    <a><a class="button is-outlined"
                            href="{{ route('guest_home') }}">{{ trans('message.bt_cancle') }}</a></a>
                </p>
            </div>
        </div>


    </form>
    <br>
    @if(Config::get('app.locale') == 'en')
    {{ Html::script('js/select_list_en.js') }}
    @elseif(Config::get('app.locale') == 'th')
    {{ Html::script('js/select_list.js') }}
    @endif

    {{ Html::script('js/validation_case.js') }}

    <script>
    $('#prov_id').on('change', function(e) {
        // console.log(e);
        var prov_id = e.target.value;

        $.get('ajax-amphur/' + prov_id, function(data) {
            //success data
            $('#amphur_id').empty();

            $.each(data, function($index, subcatObj) {

                @if(Config::get('app.locale') == 'en')
                $('#amphur_id').append('<option value="' + subcatObj.AMPHUR_CODE +
                    '"style="width:250px">' + subcatObj.AMPHUR_NAME_EN + '</option>');
                @elseif(Config::get('app.locale') == 'th')
                $('#amphur_id').append('<option value="' + subcatObj.AMPHUR_CODE +
                    '"style="width:250px">' + subcatObj.AMPHUR_NAME + '</option>');
                @endif

            });

            // console.log(data);
        });
    });
    /*
        function load() {

            $('input[name="sender_case"][value="1"]').attr('checked', true);
            //  loadinput(val);
            document.getElementById("data-agent").style.display = 'none';
            document.getElementById("tabradio").style.display = 'none';

            document.getElementById("form_sender").style.display = 'none';

        }
        */

    var val = $('input[name="sender_case"]').val();


    function showHideDiv(ele) {

        var srcElement = document.getElementById(ele);

        console.log("chk : " + val);

        if (val == 2) {
            //แจ้งเอง
            srcElement.style.display = 'none';
            document.getElementById("form_sender").style.display = 'none';

            document.getElementById("case1").checked = true;

            $('input[name="sender"]').val("");
            $('input[name="sender"]').prop('disabled', true);
            $('input[name="agent_tel"]').val("");
            $('input[name="agent_tel"]').prop('disabled', true);
            val = 1;
            console.log("chk-val-loop1 : " + val);
        } else {
            // แจ้งแทน
            srcElement.style.display = 'block';
            document.getElementById("form_sender").style.display = 'block';
            document.getElementById("case2").checked = true;

            $('input[name="sender"]').prop('disabled', false);
            $('input[name="agent_tel"]').prop('disabled', false);
            val = 2;
            console.log("chk-val-loop2 : " + val);
        }
        return false;

        //loadinput(val)
    }

    $("input[name='nation']").on('change', function(e) {

        var sel_value = e.target.value;
        //alert(sel_value);

        if (sel_value == 6) {
            $("input[name='nation_etc']").show();
        } else {
            $("input[name='nation_etc']").hide();
        }
    });


    //<!-- upload -->

    document.querySelector("html").classList.add('js');

    var fileInput1 = document.getElementById("file1"),
        fileInput2 = document.getElementById("file2"),
        fileInput3 = document.getElementById("file3"),
        button1 = document.querySelector(".input-file-trigger1"),
        button2 = document.querySelector(".input-file-trigger2"),
        button3 = document.querySelector(".input-file-trigger3"),
        the_return1 = document.querySelector(".file-return1");
    the_return2 = document.querySelector(".file-return2");
    the_return3 = document.querySelector(".file-return3");

    button1.addEventListener("keydown", function(event) {
        if (event.keyCode == 13 || event.keyCode == 32) {
            fileInput1.focus();
        }
    });
    button2.addEventListener("keydown", function(event) {
        if (event.keyCode == 13 || event.keyCode == 32) {
            fileInput2.focus();
        }
    });
    button3.addEventListener("keydown", function(event) {
        if (event.keyCode == 13 || event.keyCode == 32) {
            fileInput3.focus();
        }
    });
    button1.addEventListener("click", function(event) {
        fileInput1.focus();
        return false;
    });
    button2.addEventListener("click", function(event) {
        fileInput2.focus();
        return false;
    });
    button3.addEventListener("click", function(event) {
        fileInput3.focus();
        return false;
    });
    fileInput1.addEventListener("change", function(event) {
        the_return1.innerHTML = this.files[0].name;
    });
    fileInput2.addEventListener("change", function(event) {
        the_return2.innerHTML = this.files[0].name;
    });
    fileInput3.addEventListener("change", function(event) {
        the_return3.innerHTML = this.files[0].name;
    });

    // Lcation Lat Long //
    var getsuccess = document.getElementById("getsuccess");

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
            getsuccess.innerHTML = "{{ trans('message.tx_location_wait') }}";
        } else {
            latlon.innerHTML = "Geolocation is not supported by this browser.";
        }
    }

    function showPosition(position) {

        getsuccess.innerHTML = "{{ trans('message.tx_location_ss') }}";

        document.getElementById('glat').value = position.coords.latitude;
        document.getElementById('glon').value = position.coords.longitude;

    }


    $(document).ready(function() {
        
        document.getElementById("case1").checked = true;
        //  loadinput(val);
        document.getElementById("data-agent").style.display = 'none';
        document.getElementById("tabradio").style.display = 'none';

        document.getElementById("form_sender").style.display = 'none';


        $('#submitBtn').click(function() {

            $('#txt_agent_tel').text($('#agent_tel').val());
            $('#txt_sender_name').text($('#sender').val());

            $('#txt_tel').text($('#victim_tel').val());
            $('#txt_name').text($('#name').val());

            var radioValue = $("input[name='biosex']:checked").val();

            if (radioValue == '1') {
                var label_sex = "ชาย";
            }

            $('#biosex').text(label_sex);

            var province = $("#sub_problem option:selected").text();

            $('#mask_confirm').fadeIn(200);
            $('#mask_confirm').fadeTo(200, 0.2);

        });

        $('#submit').click(function() {
            document.RegForm.submit();
        });

        //button to able accept button

        $('#popup_ck').click(function() {
            if ($(this).is(':checked')) {
                $('#bt_accept').removeAttr('disabled');

            } else {
                $('#bt_accept').attr('disabled', 'disabled');
            }
        });

        $('#bt_accept').click(function() {

            $('#mask_intro').hide();
            $('.window').hide();
        });

    });
    </script>

    @extends('footer')

    <!-- popup box -->

    <div id="boxes">
        <div style="top: 250px; left: 551.5px; display: none; " id="dialog" class="window sizebox2">
            <div class="box">
                <p>ข้อมูลที่บันทึกจะถูกเก็บเป็นความลับและโปรดตรวจสอบเบอร์โทรศัพท์ให้ถูกต้องเพื่อให้เจ้าหน้าที่ติดต่อกลับ
                </p>
                <br>

                <div class="buttons">

                    <a class="button is-medium  is-outlined is-danger close">ทราบ</a>

                    <a href="{{ 'index.php' }}" class="button is-outlined ">{{ trans('message.bt_cancle') }}</a>
                    <!--span class="is-size-7">By clicking Accept, you agree to be bound by the terms of this
                        document.</!--span-->

                </div>
            </div>
        </div>
        <div style="width: 1478px; font-size: 32pt; color:white; height: 602px; display: none; opacity: 0.8;"
            id="mask_intro">
        </div>
    </div>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.js"></script>
    <script src="css/modal/modal.js"></script>


    <!--  confirm-submit   -->
    <div id="boxes">
        <div id="confirm-submit" class="window" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true" style="  ">
            <div class=" has-text-centered">
                <div class="modal-dialog">
                    <div class="modal-header">
                        <b>{{ trans('message.tx_head_pop_con') }}</b>
                    </div>
                    <div class="modal-body">
                        {{ trans('message.tx_body1_pop_con') }}
                        <br>{{ trans('message.tx_body2_pop_con') }}

                        <table class="table " id="form_sender">
                            <tr>
                                <th>{{ trans('message.txt_inf_name') }}</th>
                                <td id="txt_sender_name"></td>
                            </tr>
                            <tr>
                                <th>{{ trans('message.txt_tel') }}</th>
                                <td id="txt_agent_tel"></td>
                            </tr>
                        </table>
                        <table class="table ">
                            <tr>
                                <th>{{ trans('message.tx_name_pop_con') }}</th>
                                <td id="txt_name"></td>
                            </tr>
                            <tr>
                                <th>{{ trans('message.txt_tel') }}</th>
                                <td id="txt_tel"></td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <br>
                        <a href="#" id="submit"
                            class="button is-medium   is-primary ">{{ trans('message.bt_submit') }}</a>
                        <button type="button" class="button is-medium is-outlined is-danger close"
                            data-dismiss="modal">{{ trans('message.bt_cancle2') }}</button>
                    </div>
                </div>
            </div>

        </div>
        <div style="width: 1478px; font-size: 32pt; color:white; height: 602px; display: none; opacity: 0.8;"
            id="mask_confirm">
        </div>
    </div>


</body>

{{ Html::script('css/nicelabel/js/jquery.nicelabel.js') }}
<script>
$(function() {
    $('#text-checkbox  > input').nicelabel();

});
</script>

</html>