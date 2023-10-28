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
		
		require("phpsqli_dbinfo.php");

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

    <div class="container-fluid p-4">

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

        <div class="text-center mb-3">

            <div class="btn-group flex-wrap">
                <a type="button" class="btn btn-white btn-rounded   align-items-stretch d-flex border"
                    href="dashboard3_new.php">
                    <div class="text text-right ">
                        <h6><i class="fas fa-chart-bar fs-4 " aria-hidden="true"></i> Dashboard สรุปสถานการณ์</h6>
                    </div>
                </a>

                <a type="button" class="btn btn-white btn-rounded   align-items-stretch d-flex border"
                    href="automated.php">
                    <div class="text text-right ">
                        <h6><i class="far fa-file-alt fs-4 " aria-hidden="true"></i> รายงานการละเมิดสิทธิ</h6>
                    </div>
                </a>

                <a type="button" class="btn btn-white btn-rounded   align-items-stretch d-flex border"
                    href="mapcrisis_new.php">
                    <div class="text text-right ">
                        <h6><i class="far fa-map fs-4 " aria-hidden="true"></i> พิกัดจุดเกิดเหตุ</h6>
                    </div>
                </a>

                <a type="button" class="btn btn-primary btn-rounded align-items-stretch d-flex" href="table.blade.php">
                    <div class="text text-right">
                        <h6><i class="fa fa-table fs-4 " aria-hidden="true"></i> สรุปข้อมูลภาพรวม</h6>
                    </div>
                </a>

            </div>
        </div>

        <div class="text-center mb-3">

            <div class="btn-group flex-wrap">
                <a type="button" class="btn btn-white btn-rounded   align-items-stretch d-flex border"
                    href="table.blade.php">
                    <div class="text text-right ">
                        <h6><i class="fa fa-table  " aria-hidden="true"></i> ภาพรวม</h6>
                    </div>
                </a>

                <a type="button" class="btn btn-white btn-rounded   align-items-stretch d-flex border"
                    href="report_c1_new.php">
                    <div class="text text-right ">
                        <h6><i class="fa fa-table " aria-hidden="true"></i> สรุปกรณีละเมิดสิทธิ</h6>
                    </div>
                </a>

                <a type="button" class="btn btn-white btn-rounded   align-items-stretch d-flex border"
                    href="report_c2_new.php">
                    <div class="text text-right ">
                        <h6><i class="fa fa-table  " aria-hidden="true"></i> ตารางสรุปการละเมิดสิทธิ</h6>
                    </div>
                </a>

                <a type="button" class="btn btn-primary btn-rounded align-items-stretch d-flex"
                    href="report_performance_new.php">
                    <div class="text text-right">
                        <h6><i class="fa fa-table  " aria-hidden="true"></i> ระยะเวลาการดำเนินการ</h6>
                    </div>
                </a>

            </div>
        </div>


        <br>

        <div class="text-center p-3">
            <p class="h5">รายงานการสรุปเวลาเฉลี่ยในการดำเนินการในแต่ละขั้นตอน<br>จำแนกรายหน่วยจัดการเหตุ</p>
        </div>

        <div class=" p-2">

            <p class="subtitle ">
                <strong> ข้อมูล ณ วันที่ (ด/ว/ป) </strong>

                <?php echo "  : ",date("m/d/Y")," เวลา : ",date("h:i:sa"); ?>
            </p>

        </div>

        <table id='crisisc1' width="100%"
            class=" dt-responsive nowrap table table-responsive table-bordered table-striped table-hover">
            <thead class="bgcolor1">

                <tr class="">
                    <th class="" style="vertical-align: middle; color: white;" rowspan=2 width='$cel_width'>
                        ลำดับ</th>
                    <th class="" style="vertical-align: middle; color: white;" rowspan=2 width='$cel_width'>
                        เจ้าหน้าที่</th>
                    <th class="" style="vertical-align: middle; color: white;" rowspan=2 width='$cel_width'>
                        จังหวัด</th>
                    <th class="" style="vertical-align: middle; color: white;" rowspan=2 align='center'
                        width='$cel_width'>รวม
                    </th>
                    <th class="" style="vertical-align: middle; color: white;" colspan=4 align='center'
                        width='$cel_width'>
                        จำนวนเคสที่ดำเนินการ (ราย) : เวลาเฉลี่ย (วัน)</th>
                </tr>
                <tr>
                    <th class="" style="vertical-align: middle; color: white;" align='center'
                        width='$cel_width'>แจ้งเหตุ ->
                        รับเรื่อง
                    </th>
                    <th class="" style="vertical-align: middle; color: white;" align='center'
                        width='$cel_width'>รับเรื่อง ->
                        บันทึกข้อมูล
                    </th>
                    <th class="" style="vertical-align: middle; color: white;" align='center'
                        width='$cel_width'>บันทึกข้อมูล ->
                        ดำเนินการ
                    </th>
                    <th class="" style="vertical-align: middle; color: white;" align='center'
                        width='$cel_width'>ดำเนินการ ->
                        เสร็จสิ้น
                    </th>
                </tr>


            </thead>

            <tbody>

                <?php

                        function DateDiff($strDate1,$strDate2,$case_id)
                        {
                            return (strtotime($strDate2) - strtotime($strDate1))/  ( 60 * 60 * 24 );  // 1 day = 60*60*24
                        }
                                
                        $strSQL_office = "SELECT p.name,o.nameorg as nameorg,p.name as prov_name,o.prov_id,count(c.receiver) as total FROM officers o left join  case_inputs c on o.name = c.receiver left join prov_geo p on o.prov_id = p.code  where (position ='officer' or o.Name = 'adminfar' or o.Name = 'adminhatc') group by o.prov_id,o.nameorg order by p.code;";

                        $count_no = 0;

                        $result_office = mysqli_query($conn, $strSQL_office); 

                        while($row_office = $result_office->fetch_assoc())
                        {
                            $count_no++;
                            echo "<tr>";
                            echo " <td>".$count_no."</td>";
                            echo " <td>".$row_office["nameorg"]."</td>";
                            echo " <td>".$row_office["prov_name"]."</td>";
                            echo " <td align='center' >".$row_office["total"]."</td>";		
                                
                            
                            $strSQL = "SELECT o.name,c.case_id from case_inputs c inner join officers o on c.receiver = o.name where o.nameorg = '".$row_office["nameorg"]."' and o.prov_id = '".$row_office["prov_id"]."' limit 1;";

                            $count_find_case_id_total = 0;
                            
                            $count_status1_total = 0;
                            $count_status2_total = 0;
                            $count_status3_total = 0;
                            $count_status4_total = 0;
                            $count_status5_total = 0;
                            
                            $datediff_status1_total = 0;
                            $datediff_status2_total = 0;
                            $datediff_status3_total = 0;
                            $datediff_status4_total = 0;
                            $datediff_status5_total = 0;
                            

                            $result = mysqli_query($conn, $strSQL); 
                            while($row = $result->fetch_assoc())

                            {
                                //echo "loop action";
                                $strSQL_find_case_id = "SELECT  receiver,case_id  from case_inputs where receiver = '".$row["name"]."' ;";
                            

                                $result_find_case_id = mysqli_query($conn, $strSQL_find_case_id); 
                                $count_find_case_id = 0;
                                $row_find_case_id = mysqli_num_rows($result_find_case_id); 
                                while($row_find_case_id = $result_find_case_id->fetch_assoc())
                                {
                                    //echo "loop action1";
                                    $strSQL_status1 = "SELECT case_id,date(operate_time) as operate_time FROM timelines  INNER JOIN (SELECT MAX(id) as id FROM timelines where operate_status = '1' GROUP BY case_id) last_update ON last_update.id = timelines.id where case_id = '".$row_find_case_id["case_id"]."';";
                                    

                                    $result_status1 = mysqli_query($conn, $strSQL_status1); 
                                    $count_status1 = 0;
                                    $count_status1 = mysqli_num_rows($result_status1); 
                                    while($row_status1 = $result_status1->fetch_assoc())
                                    {
                                        //echo "loop action1-1";
                                        $date_status1 = $row_status1["operate_time"];		
                                    }
                                            
                                                    
                                    $strSQL_status2 = "SELECT case_id,date(operate_time) as operate_time FROM timelines  INNER JOIN (SELECT MAX(id) as id FROM timelines where operate_status = '2' GROUP BY case_id) last_update ON last_update.id = timelines.id where case_id = '".$row_find_case_id["case_id"]."';";
                                    

                                    $result_status2 = mysqli_query($conn, $strSQL_status2); 
                                    $count_status2 = 0;
                                    $count_status2 = mysqli_num_rows($result_status2); 
                                    while($row_status2 = $result_status2->fetch_assoc())
                                    {
                                        //echo "loop action1-2";
                                        $date_status2 = $row_status2["operate_time"];
                                    }
                                                
                                    $strSQL_status3 = "SELECT case_id,date(operate_time) as operate_time FROM timelines  INNER JOIN (SELECT MAX(id) as id FROM timelines where operate_status = '3' GROUP BY case_id) last_update ON last_update.id = timelines.id where case_id = '".$row_find_case_id["case_id"]."';";
                                    

                                    $result_status3 = mysqli_query($conn, $strSQL_status3); 
                                    $count_status3 = 0;
                                    $count_status3 = mysqli_num_rows($result_status3); 
                                    while($count_status3 = $result_status3->fetch_assoc())
                                    {
                                        //echo "loop action1-3";
                                        $date_status3 = $row_status3["operate_time"];
                                    }
                                                
                                    $strSQL_status4 = "SELECT case_id,date(operate_time) as operate_time FROM timelines  INNER JOIN (SELECT MAX(id) as id FROM timelines where operate_status = '4' GROUP BY case_id) last_update ON last_update.id = timelines.id where case_id = '".$row_find_case_id["case_id"]."';";
                                    

                                    $result_status4 = mysqli_query($conn, $strSQL_status4); 
                                    $count_status4 = 0;
                                    $count_status4 = mysqli_num_rows($result_status4); 
                                    while($row_status4 = $result_status4->fetch_assoc())
                                    {
                                        //echo "loop action1-4";
                                        $date_status4 = $row_status4["operate_time"];
                                    }

                                    $strSQL_status5 = "SELECT case_id,date(operate_time) as operate_time FROM timelines  INNER JOIN (SELECT MAX(id) as id FROM timelines where operate_status = '5' GROUP BY case_id) last_update ON last_update.id = timelines.id where case_id = '".$row_find_case_id["case_id"]."';";
                    

                                    $result_status5 = mysqli_query($conn, $strSQL_status5); 
                                    $count_status5 = 0;
                                    $count_status5 = mysqli_num_rows($result_status5); 
                                    while($row_status5 = $result_status5->fetch_assoc())
                                    {
                                        //echo "loop action1-5";
                                        $date_status5 = $row_status5["operate_time"];
                                    }
                                                    
                                    // 1
                                    if (($date_status2 >= $date_status1) and ($count_status1 != 0)){
                                        $count_status2_total++;
                                        $datediff_status2_total += DateDiff($date_status1,$date_status2);
                                        
                                    }
                                    // 2
                                    if (($date_status3 >= $date_status2) and ($count_status2 == 1)){
                                        $count_status3_total++;
                                        $datediff_status3_total += DateDiff($date_status2,$date_status3);
                                    }
                                    // 3
                                    if (($date_status4 >= $date_status3) and ($count_status3 == 1)){
                                        $count_status4_total++;
                                        $datediff_status4_total += DateDiff($date_status3,$date_status4);
                                    }
                                    // 4
                                    if (($date_status5 >= $date_status4) and ($count_status4 == 1)){
                                        $count_status5_total++;
                                        $datediff_status5_total += DateDiff($date_status4,$date_status5);	
                                    }
                                                        
                                }		
                                
                            }
                            echo "<td  align='center' >".$count_status2_total." : ".round($datediff_status2_total/$count_status2_total,0)."</td><td  align='center' >".$count_status3_total." : ".round($datediff_status3_total/$count_status3_total,0)."</td><td  align='center' >".$count_status4_total." : ".round($datediff_status4_total/$count_status4_total,0)."</td><td  align='center' >".$count_status5_total." : ".round($datediff_status5_total/$count_status5_total,0)."</td></tr>";
                            
                    
                            $count_status1 = 0;
                            $count_status2 = 0;
                            $count_status3 = 0;
                            $count_status4 = 0;
                            $count_status5 = 0;
            
                            $count_status1_total = 0;
                            $count_status2_total = 0;
                            $count_status3_total = 0;
                            $count_status4_total = 0;
                            $count_status5_total = 0;
                            
                            $datediff_status1_total = 0;
                            $datediff_status2_total = 0;
                            $datediff_status3_total = 0;
                            $datediff_status4_total = 0;
                            $datediff_status5_total = 0;
                            
                        }
                    ?>

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
        $('#crisisc1').DataTable({
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