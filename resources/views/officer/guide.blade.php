<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300&display=swap" rel="stylesheet">

    <link href="{{ asset('bulma-0.8.0/css/bulma.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mystyles.css') }}" rel="stylesheet">
    <script src="{{ asset('css/jquery.min.js') }}"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" crossorigin="anonymous">

    {{ Html::script('js/jquery.min.js') }}

    <meta name="theme-color" content="#ab3c3c" />

    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">

    <title> ปกป้อง (CRS) </title>

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
                        <a href="#">
                            <span class="icon is-small">
                            <i class="fa fa-cogs" aria-hidden="true"></i>&nbsp;
                            </span>
                            <span>เครื่องมือ</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <div class="content">

                <input type="hidden" id="token" value="{{ csrf_token() }}">

                <div name="body" class="">
                    <h1><sapn class="has-text-danger"><i class="fa fa-cogs" aria-hidden="true"></i></sapn>&nbsp;เครื่องมือระบบ <sapn class="has-text-danger">CRISIS</sapn>
                    </h1>
                    <br>
                    @if(session()->has('jsAlert'))
                        <script>
                            alert({{ session()->get('jsAlert')}})
                        </script>
                    @endif
                    <div class="columns is-multiline">
                        <div class="column is-12">
                            <div class=" box_text">
                                
                                <div class="videoWrapper is-parent">

                                <iframe width="100%" height="530" src="https://www.youtube.com/embed/OJfDiar6LYg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                                </div>
                                
                            </div>
                        </div>
                        <div class="column is-4">

                            <div class="box_text">
                                <img src="../images/guide/CRSmannual_cover.png" alt="Avatar" class="image_cover">
                                <!--a href="../contents/guide/CRSmannual.pdf" onclick="update_count(1)" target="_blank"-->
                                <a href="../contents/guide/CRSmannual.pdf" onclick="update_count(101)"  target="_blank" >
                                    <div class="overlay_cover" >
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
                        <div class="column is-8">
                            <div class=" box_text">
                                <img src="../images/guide/crisis_cover.png" alt="Avatar" class="image_cover">
                                <a href="../contents/guide/crisis.pdf" onclick="update_count(102)" target="_blank">
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
                                <img src="../images/guide/คู่มือCRSversionปี2564(new)_cover.jpg" alt="Avatar" class="image_cover">
                                <a href="../contents/guide/คู่มือCRSversionปี2564(new).pdf" onclick="update_count(103)" target="_blank">
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
                        <div class="column is-4">
                            <div class=" box_text">
                                <img src="../images/guide/workinggroup_order_cover.png" alt="Avatar"
                                    class="image_cover">
                                <a href="../contents/guide/workinggroup_order.pdf" onclick="update_count(104)" target="_blank">
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
                                    class="image_cover">
                                <a href="../contents/guide/subcommittee_order.pdf" onclick="update_count(105)" target="_blank">
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
                    <br><br>


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