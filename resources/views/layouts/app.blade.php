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

    <!--link href="{{ asset('bulma-0.9.0/css/bulma.css') }}" rel="stylesheet"-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.1/css/bulma.min.css">
    <link href="{{ asset('bulma-tooltip/bulma-tooltip.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mystyles.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />

</head>

<body class="theme-light light">

    <div id="app">

        @component('component.input_head') @endcomponent

        <br>
        <div class="container">
            <nav class="breadcrumb ">
                <ul>
                    <li><a href="{{ '../index.php' }}"><span class="icon is-small"><i
                                    class="fa fa-home"></i></span><span>
                                {{ trans('message.nav_home') }} </span></a>
                    </li>
                    <li class="is-active"><a class="has-text-black"><span class="icon is-small "><i class="fa fa-lock"></i></span><span>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/showdown/1.8.6/showdown.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bulma-toast/2.4.4/bulma-toast.min.js"></script>

    <script>
    const quotes = [
        'Help me, Obi-Wan Kenobi. You’re my only hope.',
        'I find your lack of faith disturbing.',
        'The Force will be with you. Always.',
        'Why, you stuck-up, half-witted, scruffy-looking nerf herder!',
        'Never tell me the odds!',
        'Do. Or do not. There is no try.',
        'No. I am your father.',
        'Now, young Skywalker, you will die.',
        'Just for once, let me look on you with my own eyes.',
        'There’s always a bigger fish.',
        'In time, the suffering of your people will persuade you to see our point of view.',
        'You can’t stop the change, any more than you can stop the suns from setting.',
        'Fear is the path to the dark side. Fear leads to anger; anger leads to hate; hate leads to suffering. I sense much fear in you.',
    ]
    const types = [
        'is-primary',
        'is-link',
        'is-info',
        'is-success',
        'is-warning',
        'is-danger',
    ]
    const buttons = document.querySelectorAll('.hero-body button')
    const toast = document.querySelector('.toast')



    function displayToast(position) {
        bulmaToast.toast({
            message: quotes[Math.floor(Math.random() * (quotes.length + 1))],
            type: 'is-danger',
            //position: position.toLowerCase().replace(' ', '-'),
            position: 'bottom-right',
            dismissible: true,
            duration: 10000,
            pauseOnHover: true,
            animate: {
                in: 'fadeIn',
                out: 'fadeOut'
            },
        })
    }
    </script>
</body>

</html>