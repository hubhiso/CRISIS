<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300&display=swap" rel="stylesheet">

    <!--link href="{{ asset('bulma-0.9.0/css/bulma.css') }}" rel="stylesheet"-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.1/css/bulma.min.css">

    <link href="{{ asset('bulma-tooltip/bulma-tooltip.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mystyles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/modal/modal.css') }}" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
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

    <link href="{{ asset('css/bulma-switch.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bulma-checkradio.min.css') }}" rel="stylesheet">


    <title> ปกป้อง (CRS) </title>


</head>

<body class="has-background-light theme-light light">

    <form name="RegForm" id="RegForm" class="form-horizontal" enctype="multipart/form-data" role="form" method="POST"
        onsubmit="return vali_case();" action="{{ route('store') }}">

        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        @component('component.input_head') @endcomponent

        <div class="navbar has-background-light">
            <div class="navbar-end has-text-right">
                <div class="navbar-item">

                    @if(Config::get('app.locale') == 'en')

                    <a class="button btn_color1 is-rounded is-small button_addshadow" href="{{ URL::to('change/th') }}">
                        Thai
                        Site&nbsp;
                        <span class="fa-stack fa-1x">
                            <i class="fa fa-circle fa-stack-2x"></i>
                            <i class="fa fa-flag fa-stack-1x fa-inverse"></i>
                        </span>
                    </a>

                    @elseif(Config::get('app.locale') == 'th')

                    <a class="button btn_color1 is-rounded is-small button_addshadow" href="{{ URL::to('change/en') }}">
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
                    <li class="is-active "><a class="has-text-black"><span class="icon is-small "><i
                                    class="fa fa-bullhorn"></i></span><span>
                                {{ trans('message.nav_complaint') }} </span></a>
                    </li>
                </ul>
            </nav>

            <h2 id="modern-framework" class=""> {{ trans('message.txt_head_rc') }} </h2>
            <br>

            <div class="level">
                <!-- Left side -->
                <div class="level-left">
                    <div class="level-item">
                        <button id="chk_agent" type="button" class="button is-info has-text-white button_addshadow"
                            value="1" onclick="showHideDiv('data-agent')"><i class="fa fa-user-plus"
                                aria-hidden="true"></i>&nbsp;{{ trans('message.bt_victim_rc') }}</button>
                    </div>

                    <input type="hidden" id="emergency" name="emergency" value="0">

                </div>

                <!-- Right side -->
                <div class="level-right">
                    <div class="level-item">
                        <a class="button is-danger has-text-white button_addshadow btn_colorred" style="margon: 30px;"
                            id="showModal"><i class="fas fa-exclamation-triangle fa-shake"
                                style="--fa-animation-duration: 3s;">&nbsp;</i>{{ trans('message.bt_urgent_rc') }}</a>
                    </div>
                </div>
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

            <div class="box " id="data-person">

                <div class="field is-horizontal">
                    <div class="field-label ">
                        <!-- Left empty for spacing -->
                    </div>
                </div>

                <div class="level">
                    <!-- Left side -->
                    <div class="level-left">
                        <div class="level-item">
                            <label>{{ trans('message.txt_head2_rc') }} <span
                                    class='has-text-danger '>{{ trans('message.txt_head2_rc_2') }}</span></label>
                        </div>
                    </div>

                    <!-- Right side -->
                    <div class="level-right">
                        <div class="level-item">
                            <p>{{ trans('message.tag_help_status') }} <span id="tag_alert"
                                    class="tag is-medium is-rounded is-success is-light has-tooltip-multiline"
                                    data-tooltip="{{ trans('message.txt_short_urgenthelp_7day') }}"><b>{{ trans('message.btn_nourgent') }}</b></span>
                                <span id="tag_notalert"
                                    class="tag is-medium is-rounded is-danger is-light has-tooltip-multiline "
                                    data-tooltip="{{ trans('message.txt_short_urgenthelp') }}"><i
                                        class="fas fa-exclamation-triangle">&nbsp;</i><b>{{ trans('message.btn_urgent') }}</b></span>
                            </p>
                        </div>
                    </div>
                </div>

                <hr> 
                
                @if($errors->any())
                <ul class="notification is-warning">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif

                <div class="level">
                    <!-- Left side -->
                    <div class="level-left"></div>

                    <!-- Right side -->
                    <div class="level-right">

                        <div class="control">
                            <p class=" is-danger is-medium has-text-link" id="getsuccess">&nbsp;</p>
                        </div>

                        <div class="control  ">
                            <!--p>คลิกเพื่อระบุตำแหน่งในปัจจุบัน </p-->
                            <a class="button is-danger has-text-white button_addshadow" onclick="getLocation()">
                                <span class="icon is-left">
                                    <i class="fas fa-location-arrow"></i>
                                </span>
                                <span>{{ trans('message.bt_location') }}</span>
                            </a>
                            {{ Form::hidden('geolat', null, array('id' => 'glat')) }}
                            {{ Form::hidden('geolon', null, array('id' => 'glon')) }}
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
                        <div class="field is-narrow">
                            <div class="control">
                                <input class="is-checkradio is-info" type="radio" id="biosex1" name="biosex" value="1"
                                    checked="checked">
                                <label for="biosex1">{{ trans('message.txt_sex1') }}</label>
                                <input class="is-checkradio is-info " type="radio" id="biosex2" name="biosex" value="2">
                                <label for="biosex2">{{ trans('message.txt_sex2') }}</label>
                                <input class="is-checkradio is-info " type="radio" id="biosex0" name="biosex" value="0">
                                <label for="biosex0">{{ trans('message.txt_sex0') }}</label>
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
                    <div class="field-label ">
                        <label class="label"> {{ trans('message.txt_nat') }} *</label>
                    </div>
                    <div class="field-body">
                        <div class="field  ">
                            <input class="is-checkradio is-info" type="radio" id="nation1" name="nation" value="1"
                                checked="checked">
                            <label for="nation1">{{ trans('message.txt_nat1') }}</label>
                            <input class="is-checkradio is-info" type="radio" id="nation2" name="nation" value="2">
                            <label for="nation2">{{ trans('message.txt_nat2') }}</label>
                            <input class="is-checkradio is-info" type="radio" id="nation3" name="nation" value="3">
                            <label for="nation3">{{ trans('message.txt_nat3') }}</label>
                            <input class="is-checkradio is-info" type="radio" id="nation4" name="nation" value="4">
                            <label for="nation4">{{ trans('message.txt_nat4') }}</label>
                            <br>
                            <br>
                            <input class="is-checkradio is-info" type="radio" id="nation5" name="nation" value="5">
                            <label for="nation5">{{ trans('message.txt_nat5') }}</label>
                            <input class="is-checkradio is-info" type="radio" id="nation7" name="nation" value="7">
                            <label for="nation7">{{ trans('message.txt_nat7') }}</label>
                            <input class="is-checkradio is-info" type="radio" id="nation6" name="nation" value="6">
                            <label for="nation6">{{ trans('message.txt_nat6') }}</label>
                            <input type="text" class="input mt-3" name="nation_etc"
                                placeholder="{{ trans('message.txt_nat6_sp') }}" style="display:none">

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
                                <textarea name="detail" class="textarea"
                                    placeholder="{{ trans('message.tx_des1') }}"></textarea>
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
                                <textarea name="need" class="textarea" placeholder="{{ trans('message.bt_input_details') }}"></textarea>
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
                        <div class="file is-danger has-name is-fullwidth">
                            <label class="file-label">
                                <input class="input-file has-text-white" id="file1" name="file1" type="file">
                                <span class="file-cta has-text-white">
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
                        <div class="file is-danger has-name is-fullwidth">
                            <label class="file-label">
                                <input class="input-file " id="file2" name="file2" type="file">
                                <span class="file-cta has-text-white">
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
                        <div class="file is-danger has-name is-fullwidth">
                            <label class="file-label">
                                <input class="input-file" id="file3" name="file3" type="file">
                                <span class="file-cta has-text-white">
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
                    <button type="submit" class="button is-danger has-text-white button_addshadow" form="RegForm"
                        onsubmit="return validateForm();">{{ trans('message.bt_submit') }}</button>
                    <input type="button" name="btn" value="Submit" id="submitBtn" data-toggle="modal"
                        data-target="#confirm-submit" class="btn btn-default button_addshadow" style="display:none" />

                </p>
                <p class="control">
                    <a><a class="button button_addshadow"
                            href="{{ route('guest_home') }}">{{ trans('message.bt_cancle') }}</a></a>
                </p>
            </div>
        </div>

        <input type="hidden" id="eva1" name="eva1" value="">
        <input type="hidden" id="eva2" name="eva2" value="">
        <input type="hidden" id="eva3" name="eva3" value="">
        <input type="hidden" id="eva_comment" name="eva_comment" value="">

    </form>

    <br>

    @extends('footer')

    <!--  confirm-submit   -->
    <div id="boxes">
        <div style="top: 250px; left: 551.5px;  " id="confirm-submit" class="window sizebox2"
            tabindex="-1" role="dialog">

            <div class=" has-text-centered">
                <div class="modal-card">
                    <header class="modal-card-head p-3">
                        <p class="modal-card-title is-normal"><b>{{ trans('message.tx_head_pop_con') }}</b></p>
                    </header>
                    <section class="modal-card-body p-3">

                        <label class="label p-3 has-text-left">{{ trans('message.h_eva') }}</label>

                        <div class="table-container">
                            <table class="table is-bordered is-hoverable is-narrow is-fullwidth">
                                <thead>
                                    <tr>
                                        <th rowspan="2" class="has-text-centered" style="white-space:nowrap; width:5%;">{{ trans('message.bt_rate_status_id') }}</th>
                                        <th rowspan="2" class="has-text-centered" style=" width:250px;" >{{ trans('message.tx_criteria') }}
                                        </th>
                                        <th colspan="5" class="has-text-centered" style="white-space:nowrap;">
                                        {{ trans('message.tx_level') }}</th>
                                    </tr>
                                    <tr>
                                        <th class="has-text-centered colorbg1" style=" width:10%;">{{ trans('message.tx_s_agree') }}</th>
                                        <th class="has-text-centered colorbg2" style=" width:10%;">{{ trans('message.tx_agree') }}</th>
                                        <th class="has-text-centered colorbg3" style=" width:10%;">{{ trans('message.tx_neutral') }}</th>
                                        <th class="has-text-centered colorbg4" style=" width:10%;">{{ trans('message.tx_disagree') }}</th>
                                        <th class="has-text-centered colorbg5" style=" width:10%;">{{ trans('message.tx_s_disagree') }}
                                        </th>
                                    </tr>

                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td class="has-text-left" style="white-space:nowrap;">
                                        {{ trans('message.tx_eva1') }}</td>
                                        <td class="colorbg1">
                                            <input class="is-checkradio has-background-color is-white" type="radio"
                                                id="score11" name="score1" value="5" checked>
                                            <label for="score11"></label>
                                        </td>
                                        <td class="colorbg2">
                                            <input class="is-checkradio has-background-color is-white" type="radio"
                                                id="score12" name="score1" value="4">
                                            <label for="score12"></label>
                                        </td>
                                        <td class="colorbg3">
                                            <input class="is-checkradio has-background-color is-white" type="radio"
                                                id="score13" name="score1" value="3">
                                            <label for="score13"></label>
                                        </td>
                                        <td class="colorbg4">
                                            <input class="is-checkradio has-background-color is-white" type="radio"
                                                id="score14" name="score1" value="2">
                                            <label for="score14"></label>
                                        </td>
                                        <td class="colorbg5">
                                            <input class="is-checkradio has-background-color is-white" type="radio"
                                                id="score15" name="score1" value="1">
                                            <label for="score15"></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td class="has-text-left" style="white-space:nowrap;">{{ trans('message.tx_eva2') }}</td>
                                        <td class="colorbg1">
                                            <input class="is-checkradio has-background-color is-white" type="radio"
                                                id="score21" name="score2" value="5" checked>
                                            <label for="score21"></label>
                                        </td>
                                        <td class="colorbg2">
                                            <input class="is-checkradio has-background-color is-white" type="radio"
                                                id="score22" name="score2" value="4">
                                            <label for="score22"></label>
                                        </td>
                                        <td class="colorbg3">
                                            <input class="is-checkradio has-background-color is-white" type="radio"
                                                id="score23" name="score2" value="3">
                                            <label for="score23"></label>
                                        </td>
                                        <td class="colorbg4">
                                            <input class="is-checkradio has-background-color is-white" type="radio"
                                                id="score24" name="score2" value="2">
                                            <label for="score24"></label>
                                        </td>
                                        <td class="colorbg5">
                                            <input class="is-checkradio has-background-color is-white" type="radio"
                                                id="score25" name="score2" value="1">
                                            <label for="score25"></label>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>3</td>
                                        <td class="has-text-left" style="">
                                        {{ trans('message.tx_eva3') }}</td>
                                        <td class="colorbg1">
                                            <div class="control">
                                                <input class="is-checkradio has-background-color is-white" type="radio"
                                                    id="score31" name="score3" value="5" checked>
                                                <label for="score31"></label>
                                            </div>
                                        </td>
                                        <td class="colorbg2">
                                            <input class="is-checkradio has-background-color is-white" type="radio"
                                                id="score32" name="score3" value="4">
                                            <label for="score32"></label>
                                        </td>
                                        <td class="colorbg3">
                                            <input class="is-checkradio has-background-color is-white" type="radio"
                                                id="score33" name="score3" value="3">
                                            <label for="score33"></label>
                                        </td>
                                        <td class="colorbg4">
                                            <input class="is-checkradio has-background-color is-white" type="radio"
                                                id="score34" name="score3" value="2">
                                            <label for="score34"></label>
                                        </td>
                                        <td class="colorbg5">
                                            <input class="is-checkradio has-background-color is-white" type="radio"
                                                id="score35" name="score3" value="1">
                                            <label for="score35"></label>
                                        </td>
                                    </tr>

                                </tbody>

                            </table>
                        </div>

                        <div class="field has-text-left">
                            <label class="label p-3">{{ trans('message.tx_suggestion') }}</label>
                            <div class="control">
                                <textarea id="s_comment" name="s_comment" class="textarea" rows="2"
                                    placeholder="{{ trans('message.bt_input_details') }}"></textarea>
                            </div>
                        </div>

                        <br>
                        <p>{{ trans('message.tx_body1_pop_con') }}</p>
                        <p>{{ trans('message.tx_body2_pop_con') }}</p>
                        <br>

                        <div class="columns is-desktop is-centered">

                            <div id="form_sender" class="column is-half">
                                <div class="box p-3">
                                    <table class="table has-text-left is-narrow is-fullwidth">
                                        <tr>
                                            <th>{{ trans('message.txt_inf_name') }} : </th>
                                            <td id="txt_sender_name"></td>
                                        </tr>
                                        <tr>
                                            <th>{{ trans('message.txt_tel') }} : </th>
                                            <td id="txt_agent_tel"></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <div class="column is-half">
                                <div class="box p-3">
                                    <table class="table has-text-left is-narrow is-fullwidth">
                                        <tr>
                                            <th>{{ trans('message.tx_name_pop_con') }} : </th>
                                            <td id="txt_name"></td>
                                        </tr>
                                        <tr>
                                            <th>{{ trans('message.txt_tel') }} : </th>
                                            <td id="txt_tel"></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                        </div>

                        <div class="field has-text-center">
                            <button id="submit"
                                class="button is-danger has-text-white button_addshadow">{{ trans('message.bt_submit') }}</button>
                            &nbsp;
                            <button type="button" class="button is-outlined is-danger close button_addshadow"
                                data-dismiss="modal">{{ trans('message.bt_cancle2') }}</button>

                        </div>

                    </section>
                </div>
            </div>

        </div>
        <div style="width: 1478px; font-size: 32pt; color:white; height: 602px; display: none; opacity: 0.8;"
            id="mask_confirm">
        </div>
    </div>

    <!--  alert  -->
    <div id="modal_alert" class="modal ">
        <div class="modal-background"></div>
        <div class="modal-content">
            <div class="modal-card">
                <header class="modal-card-head">
                    <p class="modal-card-title has-text-danger"><i
                            class="fas fa-exclamation-triangle">&nbsp;</i>{{ trans('message.bt_urgent_rc') }}</p>
                </header>
                <section class="modal-card-body">

                    <p class="is-size-4">
                        {{ trans('message.tx_h_table') }}
                    </p>
                    <p class="is-size-5 mb-3">
                        {{ trans('message.tx_sh_table') }}
                    </p>
                    <div class="panel table-container">

                        <table class="table is-fullwidth is-striped is-hoverable">
                            <thead>
                                <tr>
                                    <th class="has-text-danger">{{ trans('message.tx_agency_name') }}</th>
                                    <th class="has-text-danger">{{ trans('message.txt_tel') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>{{ trans('message.tx_rsat') }}</th>
                                    <td class="has-text-left">02-7316533</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('message.tx_tnp_plus') }}</th>
                                    <td class="has-text-left">02-3775065</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('message.tx_far') }}</th>
                                    <td class="has-text-left">097-2194393</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('message.tx_swing') }}</th>
                                    <td class="has-text-left">02-6329502 </td>
                                </tr>
                                <tr>
                                    <th>{{ trans('message.tx_rtf') }}</th>
                                    <td class="has-text-left">063-2057188</td>
                                </tr>
                                <tr>
                                    <th>Health and Opportunity Network (HON)</th>
                                    <td class="has-text-left">038-425808</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('message.tx_nam_kwan_sirung') }}</th>
                                    <td class="has-text-left">054-070599</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('message.tx_stm') }}</th>
                                    <td class="has-text-left">074-313409</td>
                                </tr>

                            </tbody>
                        </table>

                    </div>
                    <p class="is-size-5">{{ trans('message.txt_ask_urgenthelp') }}</p>
                    <p class="is-size-6 has-text-danger">{{ trans('message.txt_tell_urgenthelp') }}</p>

                </section>
                <footer class="modal-card-foot">
                    <div class="buttons">
                        <button class="button color1 modalclose_alert button_addshadow"
                            onclick="sitwch_alert('on')">{{ trans('message.btn_need') }}</button>
                        <button class="button is-info modalclose_notalert button_addshadow"
                            onclick="sitwch_alert('off')">{{ trans('message.btn_noneed') }}</button>
                    </div>
                </footer>
            </div>
        </div>
        <button class="modal-close modalclose"></button>
    </div>

    <!-- popup box -->
    <div id="boxes">
        <div style="top: 250px; left: 551.5px; display: none; " id="dialog" class="window sizebox2">
            <div class="box">
                <p>{{ trans('message.txt_new_explain_popup') }}
                </p>
                <br>

                <div class="buttons has-text-centered">

                    <a class="button  is-outlined is-danger close">{{ trans('message.txt_accept') }}</a>

                    <a href="{{ 'index.php' }}" class="button ">{{ trans('message.bt_cancle') }}</a>
                    <!--span class="is-size-7">By clicking Accept, you agree to be bound by the terms of this
                        document.</!--span-->

                </div>
            </div>
        </div>
        <div style="width: 1478px; font-size: 32pt; color:white; height: 602px; display: none; opacity: 0.8;"
            id="mask_intro">
        </div>
    </div>

    <script src="{{ asset('bulma/clipboard-1.7.1.min.js') }}"></script>
    <script src="{{ asset('bulma/main.js') }}"></script>

    @if(Config::get('app.locale') == 'en')
    {{ Html::script('js/select_list_en.js') }}
    @elseif(Config::get('app.locale') == 'th')
    {{ Html::script('js/select_list.js') }}
    @endif

    {{ Html::script('js/validation_case.js') }}

    <script src="css/modal/modal.js"></script>
    <script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

    <!--<script type="text/javascript" src="//code.jquery.com/jquery-2.0.2.js"> </script>-->
    <!--script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.js"></script-->

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>

    <script src="css/modal/modal.js"></script>

    {{ Html::script('css/nicelabel/js/jquery.nicelabel.js') }}

    <script>

    $(document).ready(function() {

        document.getElementById("tag_notalert").style.display = 'none';

        var btn = document.querySelector('#showModal');
        var modalDlg = document.querySelector('#modal_alert');
        var imageModalCloseBtn = document.querySelector('.modalclose');
        var imageModalCloseBtn_alert = document.querySelector('.modalclose_alert');
        var imageModalCloseBtn_notalert = document.querySelector('.modalclose_notalert');

        btn.addEventListener('click', function() {
            modalDlg.classList.add('is-active');
        });

        imageModalCloseBtn.addEventListener('click', function() {
            modalDlg.classList.remove('is-active');
        });

        imageModalCloseBtn_alert.addEventListener('click', function() {
            //$('#emergency2').val(0);
            modalDlg.classList.remove('is-active');
        });

        imageModalCloseBtn_notalert.addEventListener('click', function() {
            //$('#emergency2').val(1);
            modalDlg.classList.remove('is-active');
        });
        // .click(function() {
        //   .addClass("is-active");  
        // });

        // $(".modal-close").click(function() {
        //    $(".modal").removeClass("is-active");
        // });



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

        $('#submit').on('click', function() {
            $(this).addClass('is-loading');
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
            getsuccess.innerHTML = "&nbsp;&nbsp;{{ trans('message.tx_location_wait') }}&nbsp;&nbsp;";
        } else {
            latlon.innerHTML = "Geolocation is not supported by this browser.";
        }
    }

    function showPosition(position) {

        getsuccess.innerHTML = "&nbsp;&nbsp;{{ trans('message.tx_location_ss') }}&nbsp;&nbsp;";

        document.getElementById('glat').value = position.coords.latitude;
        document.getElementById('glon').value = position.coords.longitude;

    }

</script>

<script>
$(function() {
    $('#text-checkbox  > input').nicelabel();
});
</script>

<script>
function sitwch_alert(data) {

    if (data == 'on') {
        document.getElementById("emergency").value = "1";
        document.getElementById("tag_alert").style.display = 'none';
        document.getElementById("tag_notalert").style.display = '';

        document.getElementById("data-agent").classList.add("has-background-danger-light");
        document.getElementById("data-person").classList.add("has-background-danger-light");

    } else if (data == 'off') {
        document.getElementById("emergency").value = "0";
        document.getElementById("tag_alert").style.display = '';
        document.getElementById("tag_notalert").style.display = 'none';

        document.getElementById("data-agent").classList.remove("has-background-danger-light");
        document.getElementById("data-person").classList.remove("has-background-danger-light");

    }

}
</script>

</body>

</html>