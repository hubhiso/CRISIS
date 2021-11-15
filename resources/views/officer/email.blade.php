<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300&display=swap" rel="stylesheet">

    <link href="{{ asset('bulma-0.8.0/css/bulma.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mystyles.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" crossorigin="anonymous">
    {{ Html::script('js/jquery.min.js') }}
    <link href="{{ asset('/css/uploadicon/new3.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/nicelabel/css/jquery-nicelabel.css') }}" rel="stylesheet">

    <meta name="theme-color" content="#ab3c3c" />

    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">

    <title> ปกป้อง (CRS) </title>

    <meta name="csrf-token" content="{{ csrf_token() }}" />


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
                                <i class="fa fa-share-alt" aria-hidden="true"></i>
                            </span>
                            <span>ทำเนียบผู้พัฒนา</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <div class="content">

                <h1>Mail Send in Laravel Example</h1>

                @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
                @endif

                <form action="{{ route('send.email') }}" method="post">

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="box ">
                        <div class="field">
                            <label class="label"> Email </label>
                            <input type="email" name="email" class="form-control input" placeholder="Enter Email">
                        </div>
                        <div class="field">
                            <div class="label" name="subject"> Subject </div>
                            <input class="input" type="text" name="subject" placeholder="Enter subject">
                        </div>
                        <div class="field">
                            <div class="label" name="subject"> Content </div>
                            <textarea name="content" rows="5" class=" textarea"
                                placeholder="Enter Your Message"></textarea>
                        </div>

                    </div>

                    <div id="modal" class="modal ">
                        <div class="modal-background"></div>
                        <div class="modal-content">
                            <div class="box column is-8 is-offset-2">
                                <article class="media">

                                    <div class="media-content has-text-right">
                                        <button class="delete" id="closetop" aria-label="close"></button>
                                        <div class="content  has-text-centered">
                                            <div class="section ">
                                                <p class=" is-size-5	">
                                                    คลิกยืนยันอีกครั้ง เพื่อดำเนินการต่อไป
                                                </p>
                                            </div>
                                            <button type="submit" class="button is-primary"> ยืนยันการส่ง </button>

                                            <button class="button is-secondary " id="closebtn"> ยกเลิก </button>
                                        </div>



                                    </div>
                                </article>
                            </div>
                        </div>

                    </div>

                </form>

                <button class="button is-danger" id="lanuchModal">Show Modal</button>

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
    $("#lanuchModal").click(function() {
        $(".modal").addClass("is-active");
    });

    $(".modal-close").click(function() {
        $(".modal").removeClass("is-active");
    });

    $("#closebtn").click(function() {
        $(".modal").removeClass("is-active");
    });
    </script>

</body>

</html>