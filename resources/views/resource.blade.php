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

    <div class="container  has-text-centered">
        <div class="container ">

        
            <figure class="image is-128x128 container">
                <img src="images/seo.png">
            </figure>
            <br>
            <h1 class="title"> {{ trans('message.tx_h_knowledge') }} </h1>
            <h2 class="subtitle">{{ trans('message.tx_sh_knowledge') }}</h2>
            <br>
        </div>
        <div class="columns">
            <div class="column">
                <div class="videoWrapper is-parent">

                    <iframe id="clip" width="720" height="400" src="{{ trans('message.Link') }}" title="CRISIS" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>

                </div>
            </div>
        </div>
        <div class="columns">
            <div class="column is-two-thirds">
                <article class="tile is-child box">
                    <a href="contents/Crisis.pdf"><img src="images/Crisis-cover.png"></a>
                </article>
            </div>
            <div class="column">
                <article class="tile is-child box">
                    <a href="contents/guide/คู่มือแนวทางการจัดการรับเรื่องร้องเรียน.pdf"><img
                            src="contents/cover2-คู่มือแนวทางการจัดการรับเรื่องร้องเรียน.png" height="360"></a>
                </article>
            </div>
        </div>

        <div class="tile is-ancestor">

            <div class="tile is-parent">
                <article class="tile is-child box">
                    <a href="http://www.buddystation.org/">
                        <h4 class="subtitle is-4 	">"การกระทำที่ถือเป็นการละเมิดสิทธิ"</h4>
                        <p>Buddy Station กรมควบคุมโรค<br> กระทรวงสาธารณสุข</p>
                    </a>
                </article>
            </div>

            <div class="tile is-parent">
                <article class="tile is-child box">
                    <a href="https://www.amnesty.or.th/latest/blog/62/">
                        <h4 class="subtitle is-4 	">"สิทธิมนุษยชน"</h4>
                        <p>แอมเนสตี้ อินเตอร์เนชั่นแนล (ประเทศไทย)<br> AMNESTY INTERNATIONAL THAILAND</p>
                    </a>
                </article>
            </div>
            <div class="tile is-parent">
                <article class="tile is-child box">
                    <a href="http://fairthailand.org/">
                        <h4 class="subtitle is-4 ">"กรณีศึกษาที่น่าสนใจเกี่ยวกับกรณีการละเมิดสิทธิ"</h4>
                        <p>มูลนิธิศูนย์คุ้มครองสิทธิด้านเอดส์<br>มูลนิธิเพื่อสิทธิความหลากหลาย (FAIR)</p>
                    </a>
                </article>
            </div>
            <div class="tile is-parent">
                <article class="tile is-child box">
                    <a
                        href="http://www.pcd.go.th/info_serv/file/%E0%B8%9E%E0%B8%A3%E0%B8%B0%E0%B8%A3%E0%B8%B2%E0%B8%8A%E0%B8%9A%E0%B8%B1%E0%B8%8D%E0%B8%8D%E0%B8%B1%E0%B8%95%E0%B8%B4%20%E0%B8%84%E0%B8%A7%E0%B8%B2%E0%B8%A1%E0%B9%80%E0%B8%97%E0%B9%88%E0%B8%B2%E0%B9%80%E0%B8%97%E0%B8%B5%E0%B8%A2%E0%B8%A1%E0%B8%A3%E0%B8%B0%E0%B8%AB%E0%B8%A7%E0%B9%88%E0%B8%B2%E0%B8%87%E0%B9%80%E0%B8%9E%E0%B8%A8%20%E0%B8%9E.%E0%B8%A8.%202558%20(%E0%B8%89%E0%B8%9A%E0%B8%B1%E0%B8%9A%E0%B8%9B%E0%B8%A3%E0%B8%B0%E0%B8%8A%E0%B8%B2%E0%B8%8A%E0%B8%99).pdf">
                        <h4 class="subtitle is-4 ">"พระราชบัญญัติความเท่าเทียมระหว่างเพศ<br> พ.ศ. 2558 ฉบับประชาชน"
                        </h4>
                        <p>กรมกิจการสตรี และสถาบันครอบครัว</p>
                    </a>
                </article>
            </div>

        </div>

        <div class="tile is-ancestor">

            <div class="tile is-parent">
                <article class="tile is-child box">
                    <a href="http://www.whaf.or.th/media">
                        <h4 class="subtitle is-4 ">"เพศวิถี"</h4>
                        <p>มูลนิธิสร้างความเข้าใจ <br>เรื่องสุขภาพผู้หญิง</p>
                    </a>
                </article>
            </div>

            <div class="tile is-parent">
                <article class="tile is-child box">
                    <a href="https://facebook.com/pg/gfpthailand/photos/?tab=album&album_id=1076061572509713">
                        <h4 class="subtitle is-4 ">"สามสัมพันธ์ ห้าภูมิคุ้มกัน <br>สร้างสรรค์สมดุลให้ครอบครัว"</h4>
                        <p>ศูนย์ประสานงานด้าน<br>ความเสมอภาคระหว่างหญิงชาย <br>Gender Focal Point Thailand</p>
                    </a>
                </article>
            </div>
            <div class="tile is-parent">
                <article class="tile is-child box">
                    <a href="http://forsogi.org/">
                        <h4 class="subtitle is-4 ">"สิทธิมนุษยชนในการสร้างครอบครัว"</h4>
                        <p>มูลนิธิเพื่อสิทธิและความเป็นธรรมทางเพศ <br>(Fundation For SOGI Rights and Justice)</p>
                    </a>
                </article>
            </div>
            <div class="tile is-parent">
                <article class="tile is-child box">
                    <a href="https://www.thaihealthreport.com/">
                        <h4 class="subtitle is-4 ">"รายงานสุขภาพคนไทย"</h4>
                        <p>สถาบันวิจัยประชากรและสังคม <br>มหาวิทยาลัยมหิดล</p>
                    </a>
                </article>
            </div>

        </div>


        <br>


    </div>

    <footer class="footer" style="background-color: #EEE;">
        <div class="container  ">
            <div class="content has-text-centered  ">
                <p>Crisis Response System (CRS)
                </p>
                <p id="tsp"> <small> Sourcecode licensed <a href="http://www.hiso.or.th">HISO</a>. </small> </p>
            </div>
        </div>
    </footer>
</body>

</html>