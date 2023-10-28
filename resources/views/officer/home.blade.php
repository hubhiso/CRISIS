<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> ปกป้อง (CRS) </title>
    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" crossorigin="anonymous">

    <link href="{{ asset('bulma-0.8.0/css/bulma.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mystyles.css') }}" rel="stylesheet">
    {{ Html::script('js/jquery.min.js') }}

    <meta name="theme-color" content="#ab3c3c" />

    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
    <!--script src="http://bulma.io/javascript/jquery-2.2.0.min.js"></script>
    <script src="http://bulma.io/javascript/clipboard.min.js"></script>
    <script src="http://bulma.io/javascript/bulma.js"></script>
    <script type="text/javascript" src="http://bulma.io/javascript/index.js"></script-->

</head>

<body class="layout-default">

    <div class="hero-head ">
        <div class=" has-background-light">
            @component('component.login_bar2')
            @endcomponent
        </div>
    </div>
    <br>

    <div class="container is-fluid">
        <nav class="breadcrumb has-text-left" aria-label="breadcrumbs">
            <ul>
                <li>
                    <a href="{{ route('guest_home') }}">
                        <span class="icon is-small">
                            <i class="fas fa-home" aria-hidden="true"></i>
                        </span>
                        <span>หน้าแรก</span>
                    </a>
                </li>
                <li class="is-active">
                    <a href="#">
                        <span class="icon is-small">
                            <i class="fas fa-lock" aria-hidden="true"></i>
                        </span>
                        <span>ส่วนเจ้าหน้าที่</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <section class="hero is-medium ">

        <div class="hero-body">

            <div class="container has-text-centered">
                <!--img src="../public/images/PokPong Logo with Nametag.png" alt=""-->
                <h1 id="bulma" class="title"> Crisis Response System (CRS) </h1>
                <h2 id="modern-framework" class="subtitle"> ระบบรับเรื่องร้องเรียนและคุ้มครองการละเมิดสิทธิด้านเอดส์<br>
                    เพศภาวะ และความเป็นกลุ่มประชากรเปราะบางต่อการถูกเลือกปฏิบัติ </h2>
                <a id="btn_new1" class="button ft1 i-margin" href="{{ 'officer/input_case' }}">แจ้งเหตุ</a>
                <a id="btn_new1" class="button ft1 i-margin"
                    href="{{ route('officer.show',['mode_id' => "0"]) }}">จัดการเหตุ</a>
                <a id="btn_new1" class="button ft1 i-margin" href="../php/dashboard3_new.php">รายงาน</a>

                <br>
                <br>
                <br>

                <a class="button btn_sub i-margin" href="{{ 'officer/guide_t' }}"><i class="fa fa-cogs"
                        aria-hidden="true"></i>&nbsp;เครื่องมือ</a>
                <a class="button btn_sub i-margin" href="{{ 'officer/contact' }}"><i class="fa fa-share-alt"
                        aria-hidden="true"></i>&nbsp;ทำเนียบเครือข่าย</a>

                @if( Auth::user()->position == "admin" )
                <br>
                <br>
                <a class="button btn_sub i-margin" href="{{ route('officer.verifydata') }}">
                <i class="fas fa-database"></i></i>&nbsp;จัดการข้อมูลรายเคส</a>
                @endif
            </div>
        </div>
    </section>

    <br><br><br><br>

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
</body>

</html>