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

    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.2/b-2.3.4/b-html5-2.3.4/b-print-2.3.4/datatables.min.css" />

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
            <!--
            <button class="button is-primary is-rounded exportToExcel">Export to XLS</button>
            <br><br>
            -->

            @if($type_export == "1" )
            <table id="table_show" class="table is-fullwidth hideextra table2excel table2excel_with_colors">
                <thead>
                    <tr>
                        <th style=" white-space:nowrap;">id</th>
                        <th style=" white-space:nowrap;">เขต</th>
                        <th style=" white-space:nowrap;">จังหวัด</th>
                        <th style=" white-space:nowrap;">รหัส</th>
                        <th style=" white-space:nowrap;">ประเภทผู้แจ้ง</th>
                        <th style=" white-space:nowrap;">เพศ</th>
                        <th style=" white-space:nowrap;">ผู้รับเรื่อง</th>
                        <th style=" min-width: 200px;">วันที่แจ้งเหตุ</th>
                        <th style=" white-space:nowrap;">วันที่เกิดเหตุ</th>
                        <th style=" min-width: 200px;">ปัญหาที่พบ</th>
                        <th style=" min-width: 200px;">ประเภทกลุ่ม</th>
                        <th style=" min-width: 500px;">รายละเอียดของปัญหา</th>
                        <th style=" white-space:nowrap;">ความต้องการความช่วยเหลือ</th>
                        <th style=" white-space:nowrap; ">วันที่ดำเนินการ</th>
                        <th style=" min-width: 500px; ">รายละเอียดดำเนินการ</th>
                        <th style=" min-width: 200px;">ผลลัพธ์การดำเนินการ</th>
                        <th style=" white-space:nowrap;">สถานะการดำเนินการ</th>
                        <th style=" white-space:nowrap;">ผลสถานะการดำเนินการ</th>
                        <th style=" white-space:nowrap;">ตรวจสอบสถานะ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                        foreach ($show_data as $show_data) {
                            $i++;
                    ?>
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $show_data->nhso }}</td>
                        <td>{{ $show_data->PROVINCE_NAME }}</td>
                        <td>{{ $show_data->case_id }}</td>
                        <td><?php if($show_data->sender_case == 1){ echo 'แจ้งด้วยตนเอง';}else if($show_data->sender_case == 2){ echo 'มีผู้แจ้งแทน';}else if($show_data->sender_case == 3){ echo 'เจ้าหน้าที่แจ้ง';} ?>
                        </td>
                        <td>{{ $show_data->dname }}</td>
                        <td >{{ $show_data->receiver }}</td>
                        <td >{{ $show_data->created_at }}</td>
                        <td >{{ $show_data->accident_date }}</td>
                        <td >
                            <?php
                            $comma_ck = 0;
                            if($show_data->problem_case == 1){ if($comma_ck == 1){ echo ",<br>";} echo "บังคับตรวจเอชไอวี"; $comma_ck = 1;}
                            if($show_data->problem_case == 2){ if($comma_ck == 1){ echo ",<br>";} echo "เปิดเผยสถานะการติดเชื้อเอชไอวี";}
                            if($show_data->problem_case == 3){ if($comma_ck == 1){ echo ",<br>";} echo "ถูกกีดกันหรือถูกเลือกปฏิบัติเนื่องมาจาการติดเชื้อเอชไอวี"; $comma_ck = 1;}
                            if($show_data->problem_case == 4){ if($comma_ck == 1){ echo ",<br>";} echo "ถูกกีดกันหรือถูกเลือกปฏิบัติเนื่องมาจากเป็นกลุ่มเปราะบาง"; $comma_ck = 1;}
                            if($show_data->problem_case == 5){ if($comma_ck == 1){ echo ",<br>";} echo "อื่นๆ ที่เกี่ยวข้องกับ HIV"; $comma_ck = 1;}
                            if($show_data->problem_case == 6){ if($comma_ck == 1){ echo ",<br>";} echo "อื่นๆ"; $comma_ck = 1;}
                        ?>
                        </td>
                        <td >
                            <?php
                            $comma_ck = 0;
                            if($show_data->group_code == 1){ if($comma_ck == 1){ echo ",<br>";} echo "กลุ่มหลากหลายทางเพศ"; $comma_ck = 1;}
                            if($show_data->group_code == 2){ if($comma_ck == 1){ echo ",<br>";} echo "พนักงานบริการ"; $comma_ck = 1;}
                            if($show_data->group_code == 3){ if($comma_ck == 1){ echo ",<br>";} echo "ผู้ใช้สารเสพติด"; $comma_ck = 1;}
                            if($show_data->group_code == 4){ if($comma_ck == 1){ echo ",<br>";} echo "ประชากรข้ามชาติ"; $comma_ck = 1;}
                            if($show_data->group_code == 5){ if($comma_ck == 1){ echo ",<br>";} echo "อผู้ถูกคุมขัง"; $comma_ck = 1;}
                            if($show_data->group_code == 6){ if($comma_ck == 1){ echo ",<br>";} echo "กลุ่มชาติพันธุ์และชนเผ่า"; $comma_ck = 1;}
                            if($show_data->group_code == 7){ if($comma_ck == 1){ echo ",<br>";} echo "คนพิการ"; $comma_ck = 1;}
                            ?>
                        </td>
                        <td >{{ $show_data->detail }}</td>
                        <td >{{ $show_data->need }}</td>
                        <td >{{ $show_data->operate_date }}</td>
                        <td >{{ $show_data->operate_detail }}</td>
                        <td>{{ $show_data->operate_result }}</td>
                        <td >{{ $show_data->gname }}</td>
                        <td >
                            <?php 
                            if($show_data->operate_result_status == 1){ echo 'สำเร็จ';}
                            else if($show_data->operate_result_status == 2){ echo 'ไม่สำเร็จ';}
                            else if($show_data->operate_result_status == 3){ echo 'ตาย';} 
                            else if($show_data->operate_result_status == 4){ echo 'ย้ายที่อยู่';} 
                            ?>
                        </td>
                        <td>{{ $show_data->operate_status }}</td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
            @endif

            @if($type_export == "2" )
            <table id="table_show" class="table is-fullwidth hideextra table2excel table2excel_with_colors">
                <thead>
                    <tr>
                        <th style=" white-space:nowrap;">id</th>
                        <th style=" white-space:nowrap;">เขต</th>
                        <th style=" white-space:nowrap;">จังหวัด</th>
                        <th style=" white-space:nowrap;">รหัส</th>
                        <th style=" white-space:nowrap;">ประเภทผู้แจ้ง</th>
                        <th style=" white-space:nowrap;">เพศ</th>
                        <th style=" white-space:nowrap;">ผู้รับเรื่อง</th>
                        <th style=" min-width: 200px;">วันที่แจ้งเหตุ</th>
                        <th style=" white-space:nowrap;">วันที่เกิดเหตุ</th>
                        <th style=" min-width: 200px;">ปัญหาที่พบ</th>
                        <th style=" min-width: 200px;">ประเภทกลุ่ม</th>
                        <th style=" min-width: 500px;">รายละเอียดของปัญหา</th>
                        <th style=" white-space:nowrap;">ความต้องการความช่วยเหลือ</th>
                        <th style=" white-space:nowrap; ">วันที่ดำเนินการ</th>
                        <th style=" min-width: 500px; ">รายละเอียดดำเนินการ</th>
                        <th style=" min-width: 200px;">ผลลัพธ์การดำเนินการ</th>
                        <th style=" white-space:nowrap;">สถานะการดำเนินการ</th>
                        <th style=" white-space:nowrap;">ผลสถานะการดำเนินการ</th>
                        <th style=" white-space:nowrap;">ตรวจสอบสถานะ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    $show_caseid = "";
                        foreach ($show_data as $show_data) {

                            $recent_caseid = $show_data->case_id1;
                            if($show_caseid <> $recent_caseid){
                                $i++;

                                $show_caseid = $recent_caseid;

                            
                    ?>
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $show_data->nhso }}</td>
                        <td>{{ $show_data->PROVINCE_NAME }}</td>
                        <td>{{ $show_data->case_id1 }}</td>
                        <td><?php if($show_data->sender_case == 1){ echo 'แจ้งด้วยตนเอง';}else if($show_data->sender_case == 2){ echo 'มีผู้แจ้งแทน';}else if($show_data->sender_case == 3){ echo 'เจ้าหน้าที่แจ้ง';} ?>
                        </td>
                        <td>{{ $show_data->dname }}</td>
                        <td >{{ $show_data->receiver }}</td>
                        <td >{{ $show_data->created_at }}</td>
                        <td >{{ $show_data->accident_date }}</td>
                        <td >
                            <?php
                            $comma_ck = 0;
                            if($show_data->problem_case == 1){ if($comma_ck == 1){ echo ",<br>";} echo "บังคับตรวจเอชไอวี"; $comma_ck = 1;}
                            if($show_data->problem_case == 2){ if($comma_ck == 1){ echo ",<br>";} echo "เปิดเผยสถานะการติดเชื้อเอชไอวี";}
                            if($show_data->problem_case == 3){ if($comma_ck == 1){ echo ",<br>";} echo "ถูกกีดกันหรือถูกเลือกปฏิบัติเนื่องมาจาการติดเชื้อเอชไอวี"; $comma_ck = 1;}
                            if($show_data->problem_case == 4){ if($comma_ck == 1){ echo ",<br>";} echo "ถูกกีดกันหรือถูกเลือกปฏิบัติเนื่องมาจากเป็นกลุ่มเปราะบาง"; $comma_ck = 1;}
                            if($show_data->problem_case == 5){ if($comma_ck == 1){ echo ",<br>";} echo "อื่นๆ ที่เกี่ยวข้องกับ HIV"; $comma_ck = 1;}
                            if($show_data->problem_case == 6){ if($comma_ck == 1){ echo ",<br>";} echo "อื่นๆ"; $comma_ck = 1;}

                        ?>
                        </td>
                        <td >
                            <?php
                            $comma_ck = 0;
                            if($show_data->group_code == 1){ if($comma_ck == 1){ echo ",<br>";} echo "กลุ่มหลากหลายทางเพศ"; $comma_ck = 1;}
                            if($show_data->group_code == 2){ if($comma_ck == 1){ echo ",<br>";} echo "พนักงานบริการ"; $comma_ck = 1;}
                            if($show_data->group_code == 3){ if($comma_ck == 1){ echo ",<br>";} echo "ผู้ใช้สารเสพติด"; $comma_ck = 1;}
                            if($show_data->group_code == 4){ if($comma_ck == 1){ echo ",<br>";} echo "ประชากรข้ามชาติ"; $comma_ck = 1;}
                            if($show_data->group_code == 5){ if($comma_ck == 1){ echo ",<br>";} echo "อผู้ถูกคุมขัง"; $comma_ck = 1;}
                            if($show_data->group_code == 6){ if($comma_ck == 1){ echo ",<br>";} echo "กลุ่มชาติพันธุ์และชนเผ่า"; $comma_ck = 1;}
                            if($show_data->group_code == 7){ if($comma_ck == 1){ echo ",<br>";} echo "คนพิการ"; $comma_ck = 1;}
                            
                            ?>
                        </td>
                        <td >{{ $show_data->detail }}</td>
                        <td >{{ $show_data->need }}</td>
                        <td >{{ $show_data->operate_date }}</td>
                        <td>{{ $show_data->operate_detail }}</td>
                        <td>{{ $show_data->operate_result }}</td>
                        <td >{{ $show_data->gname }}</td>
                        <td >
                            <?php 
                            if($show_data->operate_result_status == 1){ echo 'สำเร็จ';}
                            else if($show_data->operate_result_status == 2){ echo 'ไม่สำเร็จ';}
                            else if($show_data->operate_result_status == 3){ echo 'ตาย';} 
                            else if($show_data->operate_result_status == 4){ echo 'ย้ายที่อยู่';} 
                            ?>
                        </td>
                        <td>{{ $show_data->operate_status }}</td>
                    </tr>
                    <?php
                              }  }
                    ?>
                </tbody>
            </table>
            @endif

            </div>
    </div>
    
    @extends('officer.footer_m')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript"
        src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.2/b-2.3.4/b-html5-2.3.4/b-print-2.3.4/datatables.min.js">
    </script>

    <script>
    $(document).ready(function() {
        $('#table_show').DataTable({
            "bLengthChange": true,
            "searching": true,
            "pageLength": 10,
            "dom": 'Bfrtip',
            "responsive": true,
            "buttons": [
                'excel', 'copy', 'print'
            ]
        });
    });

    /*
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
    */
    </script>
</body>

</html>