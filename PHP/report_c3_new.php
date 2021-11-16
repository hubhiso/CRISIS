<!DOCTYPE html>
<html lang="en" class="route-index">

<head>

    <meta http-equiv=”content-type” content=”text/html; charset=UTF-8″ />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv=”content-language” content=”th” />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name=”description” content=”ปกป้อง ระบบผู้ช่วยออนไลน์ที่บริการรับเรื่องร้องเรียนและคุ้มครองการละเมิดสิทธิ” />
    <meta name=”keywords” content=”ปกป้อง,ปกป้อง thai” />

    <meta name="theme-color" content="#d45c9c" />

    <link rel="shortcut icon" href="../public/favicon.ico">

    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.11.3/b-2.0.1/b-html5-2.0.1/b-print-2.0.1/datatables.min.css" />


    <link media="all" type="text/css" rel="stylesheet"
        href="../public/bootstrap-datepicker/css/bootstrap-datepicker.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link href="report.css" rel="stylesheet">


    <title> ปกป้อง (CRS) </title>

    <?php
		
		require("phpsql_dbinfo.php");

		$conn = mysqli_connect($hostname, $username, $password, $database);
		if (mysqli_connect_errno()) 
        { 
            echo "Database connection failed."; 
        }
        // Change character set to utf8
		mysqli_set_charset($conn,"utf8");
        $date_start = $_POST["date_start"];
		$date_end = $_POST["date_end"];
	
		if($date_end==''){
		$date_end = date("m/d/Y");
		}	
		
		
	?>

</head>

<body class="bg-light">

    <nav class="navbar navbar-light bg-white">
        <div class="container-fluid">
            <a class="navbar-brand" href="../public/">
                <img src="../public/images/favicon.ico" alt="" height="30">
                <span class="text-secondary">ปกป้อง (CRS)</span>
            </a>
        </div>
    </nav>

    <div class="container p-4">

    <nav aria-label="breadcrumb ">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="../public/"><span class="icon is-small">
                            <i class="fas fa-home" aria-hidden="true"></i>
                        </span>หน้าหลัก</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="../public/officer"><span class="icon is-small">
                            <i class="fas fa-lock" aria-hidden="true"></i>
                        </span>ส่วนเจ้าหน้าที่</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <span class="icon is-small"><i class="fas fa-chart-bar" aria-hidden="true"></i></span>&nbsp;รายงาน
                </li>
            </ol>
        </nav>

        <div class="text-center ">

            <div class="btn-group flex-wrap">
                <a type="button" class="btn btn-white btn-rounded   align-items-stretch d-flex border"
                    href="dashboard3_new.php">
                    <div class=" icon-left d-flex align-items-center justify-content-center h4">
                        <i class="fas fa-chart-bar" aria-hidden="true"></i>
                    </div>
                    &nbsp;&nbsp;&nbsp;
                    <div class="text text-right ">
                        <h6>Dashboard</h6>
                        <span>สรุปสถานการณ์</span>
                    </div>
                </a>

                <a type="button" class="btn btn-white btn-rounded   align-items-stretch d-flex border"
                    href="automated.php">
                    <div class=" icon-left d-flex align-items-center justify-content-center h4">
                        <i class="far fa-file-alt" aria-hidden="true"></i>
                    </div>
                    &nbsp;&nbsp;&nbsp;
                    <div class="text text-right ">
                        <h6>รายงาน</h6>
                        <span>การละเมิดสิทธิ</span>
                    </div>
                </a>

                <a type="button" class="btn btn-white btn-rounded   align-items-stretch d-flex border"
                    href="mapcrisis_new.php">
                    <div class=" icon-left d-flex align-items-center justify-content-center h4">
                        <i class="far fa-map" aria-hidden="true"></i>
                    </div>
                    &nbsp;&nbsp;&nbsp;
                    <div class="text text-right ">
                        <h6>พิกัดการ</h6>
                        <span>ละเมิดสิทธิ</span>
                    </div>
                </a>

                <a type="button" class="btn btn-white btn-rounded   align-items-stretch d-flex border"
                    href="table.blade.php">
                    <div class=" icon-left d-flex align-items-center justify-content-center h4">
                        <i class="far fa-file-alt" aria-hidden="true"></i>
                    </div>
                    &nbsp;&nbsp;&nbsp;
                    <div class="text text-right">
                        <h6>สรุปข้อมูล</h6>
                        <span>ภาพรวม</span>
                    </div>
                </a>

                <a type="button" class="btn btn-primary btn-rounded align-items-stretch d-flex "
                    href="report_c1_new.php">
                    <div class=" icon-left d-flex align-items-center justify-content-center h4">
                        <i class="far fa-file-alt" aria-hidden="true"></i>
                    </div>
                    &nbsp;&nbsp;&nbsp;
                    <div class="text text-right">
                        <h6>สรุปกรณี</h6>
                        <span>ละเมิดสิทธิ</span>
                    </div>
                </a>


                <a type="button" class="btn btn-white btn-rounded   align-items-stretch d-flex border"
                    href="report_c2_new.php">
                    <div class=" icon-left d-flex align-items-center justify-content-center h4">
                        <i class="far fa-file-alt" aria-hidden="true"></i>
                    </div>
                    &nbsp;&nbsp;&nbsp;
                    <div class="text text-right">
                        <h6>ตารางสรุป</h6>
                        <span>การละเมิดสิทธิ</span>
                    </div>
                </a>

                <a type="button" class="btn btn-white btn-rounded   align-items-stretch d-flex border"
                    href="report_performance_new.php">
                    <div class=" icon-left d-flex align-items-center justify-content-center h4">
                        <i class="far fa-file-alt" aria-hidden="true"></i>
                    </div>
                    &nbsp;&nbsp;&nbsp;
                    <div class="text text-right">
                        <h6>ระยะเวลา</h6>
                        <span>ดำเนินการ</span>
                    </div>
                </a>

            </div>

        </div>

        <br>

        <div class="text-center ">

            <div class="btn-group flex-wrap">
                <a class="btn btn-primary btn-rounded" href="report_c3_new.php">
                    <span class="icon is-small"><i class="far fa-chart-bar" aria-hidden="true"></i></span>
                    <span>แยกตามกรณี</span>
                </a>
                <a class="btn btn-white btn-rounded border" href="report_c1_new.php">
                    <span class="icon is-small"><i class="far fa-chart-bar" aria-hidden="true"></i></span>
                    <span>รายหน่วยบริการ</span>
                </a>
                <a class="btn btn-white btn-rounded border" href="report_c1-2_new.php">
                    <span class="icon is-small"><i class="far fa-chart-bar" aria-hidden="true"></i></span>
                    <span>รายจังหวัด</span>
                </a>
            </div>

        </div>

        <div class=" p-4">

            <form name="form_menu" method="post" action="report_c23_new.php">

                <div class="row g-3 align-items-center">

                    <div class="col-auto">
                        <strong> เลือกวันที่ </strong>

                    </div>

                    <div class="col-auto input-daterange">
                        <input type="text" class="form-control" id="date_start" name="date_start"
                            value='<?php echo $date_start; ?>'>
                    </div>

                    <div class="col-auto">
                        ถึง
                    </div>

                    <div class="col-auto input-daterange">
                        <input type="text" class="form-control" id="date_end" name="date_end"
                            value='<?php echo $date_end; ?>'>
                    </div>

                    <div class="col-auto ">
                        <input type="submit" class="btn bgcolor1" id="submit" name="submit" value="ตกลง">

                    </div>

                </div>

                <br>

                <p class="subtitle ">
                    <strong> ข้อมูล ณ วันที่ (ด/ว/ป) </strong>

                    <?php echo "  : ",date("m/d/Y")," เวลา : ",date("h:i:sa"); ?>
                </p>

            </form>

        </div>

        <table id='table_r' width="100%"
            class=" dt-responsive nowrap table table-responsive table-bordered table-striped table-hover">
            <thead class="bgcolor1">
                <th> ลำดับ </th>
                <th> กรณีละเมิดสิทธิ </th>
                <th> เจ้าหน้าที่แจ้ง </th>
                <th> แจ้งด้วยตนเอง </th>
                <th> มีผู้แจ้งแทน </th>
                <th> ทั้งหมด </th>
            </thead>
            <tbody>
                <?php
                $sql1 = "select problem_case, r_problem_case.name,
                sum(CASE WHEN  sender_case = '3'  THEN 1 ELSE 0 END) as sendercase3,
                sum(CASE WHEN  sender_case = '1'  THEN 1 ELSE 0 END) as sendercase1,
                sum(CASE WHEN  sender_case = '2'  THEN 1 ELSE 0 END) as sendercase2,
                count(sender_case) as sendercaseall
                FROM
                case_inputs
                left join r_problem_case 
                on case_inputs.problem_case = r_problem_case.code
                where
                created_at >= '".date("Y/m/d", strtotime($date_start))."' and created_at <= '".date("Y/m/d", strtotime($date_end))."'
                GROUP BY problem_case order by problem_case";

                $result1 = mysqli_query($conn, $sql1); 
                $row1 = mysqli_num_rows($result1); 
                $i = '1';
                while($row1 = $result1->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$i."</td>";
                    echo "<td>".$row1[name]."</td>";
                    echo "<td>".$row1[sendercase3]."</td>";
                    echo "<td>".$row1[sendercase1]."</td>";
                    echo "<td>".$row1[sendercase2]."</td>";
                    echo "<td>".$row1[sendercaseall]."</td>";

                    echo "</tr>";

                    $sumsendercase3 = $sumsendercase3 + $row1[sendercase3];
                    $sumsendercase1 = $sumsendercase1 + $row1[sendercase1];
                    $sumsendercase2 = $sumsendercase2 + $row1[sendercase2];
                    $sumsendercase_all = $sumsendercase_all + $row1[sendercaseall];

                    $i++;
                }

            ?>
                <tr>
                    <td> <strong> <?php echo $i ?> </strong></td>
                    <td>รวม</td>
                    <td><?php echo $sumsendercase3 ?></td>
                    <td><?php echo $sumsendercase2 ?></td>
                    <td><?php echo $sumsendercase1 ?></td>
                    <td><?php echo $sumsendercase_all ?></td>
                </tr>

            </tbody>
        </table>


    </div>

    <!-- Footer -->
    <footer class="text-center text-lg-start bg-light text-muted">

        <!-- Copyright -->
        <div class="text-center p-5" style="background-color: #dddddd;">
            Crisis Response System (CRS)
            <p id="tsp"> <small> Source code licensed <a href="http://www.hiso.or.th">HISO</a>. </small> </p>
        </div>
        <!-- Copyright -->
    </footer>

    <script src="../public/js/jquery.min.js"></script>
    <script src="../public/bootstrap/js/bootstrap.min.js"></script>
    <script src="../public/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript"
        src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.11.3/b-2.0.1/b-html5-2.0.1/b-print-2.0.1/datatables.min.js">
    </script>

    <script>
    $('.input-daterange input').each(function() {

        $(this).datepicker('');
        //$('#date_end').datepicker("setDate", new Date());
    }).on('changeDate', function(e) {
        //load_case()
    });
    </script>

    <script>
    $(document).ready(function() {
        $('#table_r').DataTable({
            "bFilter": true,
            "dom": 'Bfrtip',
            "scrollX": true,
            "responsive": true,
            "buttons": [
                'excel', 'copy', 'print'
            ],
            "paging": false,
            "ordering": true
        });
    });
    </script>


</body>

</html>