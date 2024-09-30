<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#ab3c3c" />
    <title> ปกป้อง (CRS) </title>

    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">

    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.1/css/bulma.min.css">
    <!--link href="{{ asset('bulma-0.9.0/css/bulma.css') }}" rel="stylesheet"-->
    <!--link href="{{ asset('bulma-0.8.0/css/bulma.css') }}" rel="stylesheet"-->
    <link href="{{ asset('css/mystyles.css') }}" rel="stylesheet">


    <script src="{{ asset('css/jquery.min.js') }}"></script>

    {{ Html::script('js/jquery.min.js') }}

    <style>
    .tabs {
        margin-bottom: -1px !important;
    }

    .tab-content {
        border: 0px solid #DBDBDB;
        padding: 30px;
    }

    .tab-pane {
        display: none;
    }

    .is-active {
        display: initial;
    }
    </style>

</head>

<body class="has-background-light theme-light light">

    <div class="hero-head ">
        <div class=" ">
            @component('component.login_bar2')
            @endcomponent
        </div>
    </div>

    <div class="container">

        <div class=" section ">

            <nav class="breadcrumb mb-6" aria-label="breadcrumbs">
                <ul>
                    <li>
                        <a href="{{ route('guest_home') }}">
                            <span class="icon is-small">
                                <i class="fas fa-home" aria-hidden="true"></i>
                            </span>
                            <span>หน้าหลัก</span>
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
                        <a href="#" class="has-text-dark">
                            <span class="icon is-small">
                                <i class="fas fa-file-alt" aria-hidden="true"></i>
                            </span>
                            <span>เอกสารเผยแพร่</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <div class="content">

                <h1>
                    <sapn class="has-text-danger"><i class="fas fa-file-alt"></i></sapn>&nbsp;เอกสารเผยแพร่
                </h1>

                <input type="hidden" id="token" value="{{ csrf_token() }}">

                <div class="tabs is-toggle is-fullwidth is-medium">
                    <ul>
                        <li class="is-active ">
                            <a id="menu1" class="is-danger">
                                <span class="icon is-small"><i class="fas fa-file-alt"></i></span>
                                <span class="fs-4">คู่มือ</span>
                            </a>
                        </li>
                        <li>
                            <a id="menu2">
                                <span class="icon is-small"><i class="fas fa-file-alt"></i></span>
                                <span class="fs-4">เอกสารอื่นๆ ที่เกี่ยวข้อง</span>
                            </a>
                        </li>
                        <li>
                            <a id="menu3" >
                                <span class="icon is-small"><i class="fa fa-film"></i></span>
                                <span >สื่อวิดีทัศน์</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="tab-content">
                    <div class="tab-pane is-active" id="menu1">
                        <div class="columns is-multiline">

                            <div class="column is-4">
                                <div class="box_text">
                                    <img src="../contents/cover2-คู่มือแนวทางการจัดการรับเรื่องร้องเรียน.png" alt="CRSmannual" class="image is-3by4">
                                    <a href="../contents/guide/คู่มือแนวทางการจัดการรับเรื่องร้องเรียน.pdf" onclick="update_count(101)" target="_blank">
                                        <div class="overlay_cover">
                                            คู่มือแนวทางการจัดการเรื่องร้องเรียน CRS Manual
                                            <div class="buttons is-right">
                                                <div class="tags has-addons has-text-right	">
                                                    <span class="tag is-dark"><i class="fa fa-download "></i></span>
                                                    <span class="tag is-info">{{ $show_count[0]->count }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                            </div>
                            <div class="column is-4">
                                <div class=" box_text">
                                    <img src="../images/guide/crisis_cover_2.png" alt="guide_crisis" class="image is-3by4">
                                    <a href="../contents/Crisis.pdf" onclick="update_count(102)" target="_blank">
                                        <div class="overlay_cover">
                                            คู่มือการคุ้มครองสิทธิประชาชนเกี่ยวกับเอดส์
                                            <div class="buttons is-right">
                                                <div class="tags has-addons has-text-right	">
                                                    <span class="tag is-dark"><i class="fa fa-download "></i></span>
                                                    <span class="tag is-info">{{ $show_count[1]->count }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="column is-4">
                                <div class=" box_text">
                                    <img src="../contents/ปกคู่มือcrs-2567.png" alt="Avatar"
                                        class="image is-3by4">
                                    <a href="../contents/guide/คู่มือCRSversionปี2567.pdf" onclick="update_count(103)"
                                        target="_blank">
                                        <div class="overlay_cover">
                                            คู่มือการใช้งานข้อมูลละเมิดสิทธิ(ฉบับสมบูรณ์)
                                            <div class="buttons is-right">
                                                <div class="tags has-addons has-text-right	">
                                                    <span class="tag is-dark"><i class="fa fa-download "></i></span>
                                                    <span class="tag is-info">{{ $show_count[2]->count }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="menu2">
                        <div class="columns is-multiline">

                            <div class="column is-4">
                                <div class=" box_text">
                                    <img src="../images/guide/workinggroup_order_cover.png" alt="Avatar"
                                        class="image is-3by4">
                                    <a href="../contents/guide/workinggroup_order.pdf" onclick="update_count(104)"
                                        target="_blank">
                                        <div class="overlay_cover">
                                            คำสั่งคณะทำงานส่งเสริมและคุ้มครองสิทธิด้านเอดส์ระดับจังหวัด
                                            <div class="buttons is-right">
                                                <div class="tags has-addons has-text-right	">
                                                    <span class="tag is-dark"><i class="fa fa-download "></i></span>
                                                    <span class="tag is-info">{{ $show_count[3]->count }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="column is-4">
                                <div class=" box_text">
                                    <img src="../images/guide/subcommittee_order_cover.png" alt="Avatar"
                                        class="image is-3by4">
                                    <a href="../contents/guide/subcommittee_order.pdf" onclick="update_count(105)"
                                        target="_blank">
                                        <div class="overlay_cover">
                                            คำสั่งคณะอนุกรรมการส่งเสริมและคุ้มครองสิทธิด้านเอดส์
                                            <div class="buttons is-right">
                                                <div class="tags has-addons has-text-right	">
                                                    <span class="tag is-dark"><i class="fa fa-download "></i></span>
                                                    <span class="tag is-info">{{ $show_count[4]->count }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="tab-pane p-4" id="menu3">
                        <div class=" box_text">
                            <div class="videoWrapper is-parent">
                                <iframe width="100%" height="530" src="https://www.youtube.com/embed/OJfDiar6LYg"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <br><br>

                <div name="body" class="">

                    <br>
                    @if(session()->has('jsAlert'))
                    <script>
                    alert({
                        {
                            session() - > get('jsAlert')
                        }
                    })
                    </script>
                    @endif


                </div>
            </div>
        </div>
    </div>

    <br><br><br><br><br><br>


    @extends('officer.footer_m')

    <script src="{{ asset('bulma/clipboard-1.7.1.min.js') }}"></script>
    <script src="{{ asset('bulma/main.js') }}"></script>
    {{--<script src="{{ asset('js/prov_list.js') }}"></script>--}}



    <script>
    $(document).ready(function() {

        /*
        document.querySelectorAll('.tabs').forEach((tab) => {
            tab.querySelectorAll('li').forEach((li) => {
                li.onclick = () => {
                    tab.querySelector('li.is-active').classList.remove('is-active')
                    li.classList.add('is-active')
                    tab.nextElementSibling.querySelector('.tab-pane.is-active').classList
                        .remove('is-active')
                    tab.nextElementSibling.querySelector('.tab-pane#' + li.firstElementChild
                            .getAttribute('id'))
                        .classList.add("is-active")
                }
            })
        })*/

    });


    window.onload = () => {
        // Tabs Start
        document.querySelectorAll('.tabs').forEach((tab) => {
            tab.querySelectorAll('li').forEach((li) => {
                li.onclick = () => {
                    tab.querySelector('li.is-active').classList.remove('is-active')
                    li.classList.add('is-active')
                    tab.nextElementSibling.querySelector('.tab-pane.is-active').classList
                        .remove('is-active')
                    tab.nextElementSibling.querySelector('.tab-pane#' + li.firstElementChild
                            .getAttribute('id'))
                        .classList.add("is-active")
                }
            })
        })
    }


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

    function update_count(o_id) {

        console.log(o_id);

        var token = $('#token').val();

        //alert(token);

        $.ajax({
            type: 'POST',
            url: '{!!  route('officer.update_count') !!}',
            data: {
                _token: token,
                id: o_id
            },
            success: function(data) {
                //console.log(data);
            }
        })

    }
    </script>
</body>

</html>