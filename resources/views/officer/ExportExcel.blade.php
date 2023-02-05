<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" class="route-index">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300&display=swap" rel="stylesheet">
    <link href="{{ asset('bulma-0.8.0/css/bulma.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mystyles.css') }}" rel="stylesheet">
    {{ Html::script('js/jquery.min.js') }}

    <title> ปกป้อง (CRS) </title>

    <meta name="theme-color" content="#ab3c3c" />

    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    {{ Html::script('js/jquery.table2excel.js') }}

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bm/dt-1.13.1/datatables.min.css" />

</head>

<body class="layout-default has-background-light">
    <div class="hero-head ">
        <div class=" has-background-light">
            @component('component.login_bar2')
            @endcomponent
        </div>
    </div>
    <div class="container is-fluid">

        <div class=" section table-container">
            <nav class="breadcrumb " aria-label="breadcrumbs">
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
                    <li class="">
                        <a href="{{ route('officer.show',['mode_id' => "0"]) }}">
                            <span class="icon is-small">
                                <i class="fas fa-list" aria-hidden="true"></i>
                            </span>
                            <span>จัดการเหตุ</span>
                        </a>
                    </li>
                    <li class="is-active">
                        <a href="#">
                            <span class="icon is-small">
                                <i class="fas fa-file-excel" aria-hidden="true"></i>
                            </span>
                            <span>ส่งออกข้อมูล</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <button class="button is-primary is-rounded exportToExcel">Export to XLS</button>
            <br><br>

            </div>
    </div>
    
    @extends('officer.footer_m')
    <script type="text/javascript" src="https://cdn.datatables.net/v/bm/dt-1.13.1/datatables.min.js"></script>

    <script>
    $(document).ready(function() {
        $('#table_show').DataTable({
            "bLengthChange": true,
            "searching": true,
            "pageLength": 10
        });
    });

    $(function() {
        $(".exportToExcel").click(function(e) {
            var table = $('#table_show');
            if (table && table.length) {
                var preserveColors = (table.hasClass('table2excel_with_colors') ? true : false);
                $(table).table2excel({
                    exclude: ".noExl",
                    name: "Excel Document Name",
                    filename: "myFileName" + new Date().toISOString().replace(/[\-\:\.]/g, "") +
                        ".xls",
                    fileext: ".xls",
                    exclude_img: true,
                    exclude_links: true,
                    exclude_inputs: true,
                    preserveColors: preserveColors
                });
            }
        });

    });
    </script>
</body>

</html>