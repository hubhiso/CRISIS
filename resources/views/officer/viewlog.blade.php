<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.2/css/bulma.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bm/jq-3.6.0/dt-1.11.3/datatables.min.css" />

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

    <div class="container is-fluid">

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
                    <li>
                        <a href="{{ route('officer.m_officer') }}">
                            <span class="icon is-small">
                                <i class="fa fa-users"></i>
                            </span>
                            <span>จัดการรายชื่อ</span>
                        </a>
                    </li>
                    <li class="is-active">
                        <a href="#">
                            <span class="icon is-small">
                                <i class="fa fa-history"></i>
                            </span>
                            <span>ประวัติการการจัดการ</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="content">

                <h3>
                    <sapn class="has-text-danger"><i class="fa fa-history"></i></sapn>
                    &nbsp;ประวัติการการจัดการ
                </h3>

                <div class=" table-container">
                    <table id="table_m" class="table is-striped is-hoverable panel" style="white-space: nowrap;">
                        <thead style="background-color:#aaa;">
                            <tr>
                                <th class="has-text-light">ลำดับ</th>
                                <th class="has-text-light">Active</th>
                                <th class="has-text-light">username</th>
                                <th class="has-text-light">ชื่อ</th>
                                <th class="has-text-light">ชื่อหน่วยงาน</th>
                                <th class="has-text-light">เบอร์ติดต่อ</th>
                                <th class="has-text-light">Email</th>
                                <th class="has-text-light">ตำแหน่ง</th>
                                <th class="has-text-light">เขต</th>
                                <th class="has-text-light">จังหวัด</th>
                                
                                <th class="has-text-light">กลุ่ม</th>
                                <th class="has-text-light">ดูทั้งหมดในกลุ่ม</th>
                                <th class="has-text-light">ดูเคสทั้งหมด</th>
                                <th class="has-text-light">รับเคส</th>
                                <th class="has-text-light">วันที่ update</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1 ?>
                            @foreach($show_list as $show)

                                @foreach($show_prov as $prov)

                                <?php if($show->prov_id == $prov->PROVINCE_CODE)
                                    $se_prov = $prov->PROVINCE_NAME;
                                    else $se_prov = "";
                                ?>
                                @endforeach

                            <tr>
                                <td>{{$i}}</td>
                                <td>
                                    @if($show->active == 'no')
                                    <p class="has-text-danger"><i class="fas fa-minus-circle"></i></p>
                                    @else
                                    <p class="has-text-success"><i class="fas fa-check-circle"></i></p>
                                    @endif
                                </td>
                                <td>{{ $show->username }}</td>
                                <td>{{ $show->name }}</td>
                                <td>{{ $show->nameorg }}</td>
                                <td>{{ $show->tel }}</td>
                                <td>{{ $show->email }}</td>
                                <td>{{ $show->position }}</td>
                                <td>
                                    @if($show->area_id < 1)
                                    <p class="has-text-secondary"><i class="fas fa-minus-circle"></i></p>
                                    @else
                                    {{$show->area_id}}
                                    @endif
                                </td>
                                <td>{{ $se_prov }}</td>
                                <td>
                                    @if($show->groupname == '')
                                    <p class="has-text-secondary"><i class="fas fa-minus-circle"></i></p>
                                    @else
                                    {{$show->groupname}}
                                    @endif
                                </td>
                                <td>
                                    @if($show->g_view_all == 'no')
                                    <p class="has-text-secondary"><i class="fas fa-minus-circle"></i></p>
                                    @elseif($show->g_view_all == 'yes')
                                    <p class="has-text-success"><i class="fas fa-check-circle"></i></p>
                                    @else
                                    <p class="has-text-secondary"><i class="fas fa-minus-circle"></i></p>
                                    @endif
                                </td>
                                <td>
                                    @if($show->p_view_all == 'no')
                                    <p class="has-text-secondary"><i class="fas fa-minus-circle"></i></p>
                                    @else
                                    <p class="has-text-success"><i class="fas fa-check-circle"></i></p>
                                    @endif
                                </td>
                                <td>
                                    @if($show->p_receive == 'no')
                                    <p class="has-text-secondary"><i class="fas fa-minus-circle"></i></p>
                                    @else
                                    <p class="has-text-success"><i class="fas fa-check-circle"></i></p>
                                    @endif
                                </td>
                                <td>{{ $show->timesat }}</td>
                            </tr>

                            <?php $i++ ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>




    @extends('officer.footer_m')

    <script src="{{ asset('bulma/clipboard-1.7.1.min.js') }}"></script>
    <script src="{{ asset('bulma/main.js') }}"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/v/bm/jq-3.6.0/dt-1.11.3/datatables.min.js"></script>

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

    $(document).ready(function() {

        var o_table = $('#table_m').DataTable({
            language: {
                searchPlaceholder: "ค้นหา",
                search: "",
            },
            "pageLength": 25
        });


    });
    </script>


</body>

</html>