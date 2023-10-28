<!DOCTYPE html>
<html lang="en" class="route-index">

<head>

    <meta charset="utf-8">
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title> ปกป้อง (CRS) </title>
    <link href="{{ asset('bulma-0.9.0/css/bulma.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mystyles.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300&display=swap" rel="stylesheet">

    <script src="js/jquery.min.js"></script>
    <link href="{{ asset('css/font-awesome5.0.6/css/fontawesome-all.css') }}" rel="stylesheet">

    <meta name="theme-color" content="#cc99cc" />


    <style>
    .hideextra {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    </style>

</head>


<body class="layout-default has-background-light">

    @component('component.input_head') @endcomponent

    <div class="navbar has-background-light">
        <div class="navbar-end has-text-right">
            <div class="navbar-item">

                @if(Config::get('app.locale') == 'en')

                <a class="button is-danger is-inverted is-rounded is-small" href="{{ URL::to('change/th') }}">
                    Thai
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
        <nav class="breadcrumb">
            <ul>
                <li><a href="{{ 'index.php' }}"><span class="icon is-small"><i class="fa fa-home"></i></span><span>
                {{ trans('message.nav_home') }} </span></a>
                </li>
                <li class="is-active"><a><span class="icon is-small"><i class="fas fa-thumbtack"></i></span><span>
                {{ trans('message.bt_map') }} </span></a>
                </li>
            </ul>
        </nav>

        <div class="box mb-5">
            <iframe src="../PHP/crisisclusterorgmap/cluster.php?lang={{ Config::get('app.locale') }}" height="100%" width="100%"
                style="height:700px;"></iframe>
        </div>

    </div>

</body>



<footer class="footer" style="background-color: #EEE;">
    <div class="container  ">
        <div class="content has-text-centered  ">
            <p>Crisis Response System (CRS)
            </p>
            <p id="tsp"> <small> Sourcecode licensed <a href="http://www.hiso.or.th">HISO</a>. </small> </p>
        </div>
    </div>
</footer>

</html>