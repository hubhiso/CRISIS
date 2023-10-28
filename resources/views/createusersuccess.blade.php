<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#ab3c3c" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300&display=swap" rel="stylesheet">
    <link href="{{ asset('bulma-0.9.0/css/bulma.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome5.0.6/css/fontawesome-all.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mystyles.css') }}" rel="stylesheet">

    <title> ปกป้อง (CRS) </title>

</head>

<body>
    <section class="hero is-primary wall3">
        <div class="hero-body">
            <div class="container">
                <div class="columns is-vcentered">
                    <div class="column">
                        <p class="title"> Crisis Response System (CRS) </p>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <br><br><br><br>

    <div class="container mt-5 mb-5">

        <div class="has-text-centered mb-5">
            <p class="is-size-4">ขอบคุณที่แจ้งลงทะเบียนเข้ามาที่ระบบ CRS</p>
            <p class="is-size-6">ทางเจ้าหน้าที่ดูแลระบบจะดำเนินการตรวจสอบข้อมูลต่อไป</p>
            <p class="has-text-info is-size-4">หากข้อมูลของท่านได้รับการอนุมัติ จะมีการแจ้งเข้ามาที่ Email ของท่าน</p>
        </div>

        <div class="tile is-ancestor">
            <div class="tile is-parent">
                <div class="tile is-child ">

                    <div class="has-text-centered ">

                        <a class="button is-danger" href="{{ route('guest_home') }}"><i
                                class="fa fa-home">&nbsp;</i>{{ trans('message.bt_cancle') }}</a>

                    </div>

                </div>
            </div>
        </div>

    </div>
    <br><br><br><br>

    @extends('footer')
</body>

</html>