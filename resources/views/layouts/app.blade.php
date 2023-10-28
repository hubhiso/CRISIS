<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300&display=swap" rel="stylesheet">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> ปกป้อง (CRS) </title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="{{ asset('bulma-0.9.0/css/bulma.css') }}" rel="stylesheet">
    <link href="{{ asset('bulma-tooltip/bulma-tooltip.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mystyles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome5.0.6/css/fontawesome-all.css') }}" rel="stylesheet">
</head>

<body>

    <div id="app">

        @component('component.input_head') @endcomponent

        <br>
        <div class="container">
            <nav class="breadcrumb ">
                <ul>
                    <li><a href="{{ '../index.php' }}"><span class="icon is-small"><i class="fa fa-home"></i></span><span>
                                {{ trans('message.nav_home') }} </span></a>
                    </li>
                    <li class="is-active"><a><span class="icon is-small"><i class="fa fa-lock"></i></span><span>
                        {{ trans('message.bt_admin') }} </span></a>
                    </li>
                </ul>
            </nav>
        </div>
        <br>
        <br>



        @yield('content')

        @extends('footer')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>