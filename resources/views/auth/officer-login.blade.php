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

        <div class="container mb-5">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">เข้าใช้ระบบ Crisis Response System </div>
                        <div class="panel-body">

                            @if(\Session::has('message'))

                            <div class="notification <?php if( Session::get('status') == 'warning' ){ echo 'is-warning';}else if(Session::get('status') == 'danger'){ echo 'is-danger';} ?> is-light">
                                <button class="delete noti-close " onclick="this.parentElement.style.display='none'"></button>
                                <strong> 
                                    <?php 
                                        if( Session::get('status') == 'warning' ){ echo '<i class="fa-solid fa-clock-rotate-left fa-flip-horizontal "></i> ';}
                                        else if(Session::get('status') == 'danger'){ echo '<i class="fa-solid fa-circle-minus"></i>';} 
                                    ?> 
                                    {{ \Session::get('message') }}
                                </strong>
                            </div>
                            @endif

                            <form class="form-horizontal" role="form" method="POST"
                                action="{{ route('officer.login.submit') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">Username</label>

                                    <div class="col-md-6">
                                        <input id="username" type="text" class="form-control" name="username"
                                            value="{{ old('username') }}" required autofocus>

                                        @if ($errors->has('username'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-4 control-label">Password</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password" required>

                                        @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                                Remember Me
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-4">
                                        <button type="submit" class="button color1 button_addshadow">
                                            Login
                                        </button>

                                        &nbsp;&nbsp;&nbsp;

                                        <a class="button is-info button_addshadow"
                                            href="{{ route('officer.password.request') }}">
                                            ลืมรหัสผ่าน
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <a class="button color1 button_addshadow" href="{{ route('register') }}"> <i
                            class="fas fa-user-plus">&nbsp;</i> {{ trans('message.tx_user_regis') }} </a>
                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <div class="columns">
                    <div class="column is-3">
                        <div id="about" class="content has-text-black"> <strong class="has-text-black">Crisis Response System (CRS)</strong> </div>
                        <!--a class="button is-outlined" href="{{ 'my-page' }}">หน่วยงานสนับสนุน</a-->
                        <div class="content">
                            <a class="button button_addshadow" href="../support">ภาคีเครือข่าย</a>
                        </div>

                    </div>
                    <div class="column is-5">
                <div id="share" class="content">

                </div>
            </div>
            <div class="column is-4 has-text-right">
                <!-- Histats.com  (div with counter) -->
                <div id="histats_counter"></div>
                <!-- Histats.com  START  (aync)-->
                <script type="text/javascript">
                var _Hasync = _Hasync || [];
                _Hasync.push(['Histats.start', '1,4574557,4,306,118,60,00011001']);
                _Hasync.push(['Histats.fasi', '1']);
                _Hasync.push(['Histats.track_hits', '']);
                (function() {
                    var hs = document.createElement('script');
                    hs.type = 'text/javascript';
                    hs.async = true;
                    hs.src = ('//s10.histats.com/js15_as.js');
                    (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0])
                    .appendChild(hs);
                })();
                </script>
                <noscript><a href="/" target="_blank"><img src="//sstatic1.histats.com/0.gif?4574557&101" alt=""
                            border="0"></a></noscript>
                <!-- Histats.com  END  -->
            </div>
                </div>
        </footer>

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