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


    <link media="all" type="text/css" rel="stylesheet"
        href="../public/bootstrap-datepicker/css/bootstrap-datepicker.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.11.3/b-2.0.1/b-html5-2.0.1/b-print-2.0.1/datatables.min.css" />

    <link href="report.css" rel="stylesheet">


    <title> ปกป้อง (CRS) </title>

    <?php
		
		require("phpsql_dbinfo.php");

		$conn = mysqli_connect($hostname, $username, $password, $database);
		if (mysqli_connect_errno()) 
    { 
        echo "Database connection failed."; 
    }
		mysqli_set_charset($conn,"utf8");


	   $date_start = $_POST["date_start"];
	   $date_end = $_POST["date_end"];
	
	   $se_time = $_POST["se_time"];
       $se_year = $_POST["se_year"];
       $se_quarter = $_POST["se_quarter"];
       $se_month = $_POST["se_month"];

       $year_now =  date("Y");

        if(date("m")>9){
            $year_now++;
        }

        if($years == ''){$years = $year_now;}

        
        if($se_year == ''){
            $se_year = $year_now;
        }

       if($se_time == ''){
           $se_time = 1;

           $date_start = "10/1/".($se_year-1);
           $date_end = "9/30/".$se_year;
       }

       if($se_time== 1){

           if($se_quarter== 0){
               $date_start = "10/1/".($se_year-1);
               $date_end = "9/30/".$se_year;
           }else if($se_quarter== 1){
               $date_start = "10/1/".($se_year-1);
               $date_end = "12/31/".($se_year-1);
           }else if($se_quarter== 2){
               $date_start = "1/1/".$se_year;
               $date_end = "3/31/".$se_year;
           }else if($se_quarter== 3){
               $date_start = "4/1/".$se_year;
               $date_end = "6/30/".$se_year;
           }else if($se_quarter== 4){
               $date_start = "7/1/".$se_year;
               $date_end = "9/30/".$se_year;
           }else if($se_quarter== 12){
               $date_start = "10/1/".($se_year-1);
               $date_end = "3/31/".$se_year;
           }else if($se_quarter== 13){
               $date_start = "10/1/".($se_year-1);
               $date_end = "6/30/".$se_year;
           }else if($se_quarter== 99){
               if($se_month== 10){
                   $date_start = "10/1/".($se_year-1);
                   $date_end = "10/31/".($se_year-1);
               }else if($se_month== 11){
                   $date_start = "11/1/".($se_year-1);
                   $date_end = "11/30/".($se_year-1);
               }else if($se_month== 12){
                   $date_start = "12/1/".($se_year-1);
                   $date_end = "12/31/".($se_year-1);
               }else if($se_month== 1){
                   $date_start = "1/1/".$se_year;
                   $date_end = "1/31/".$se_year;
               }else if($se_month== 2){
                   $date_start = "2/1/".$se_year;
                   $date_end = strtotime("3/31/".$se_year)-1;
               }else if($se_month== 3){
                   $date_start = "3/1/".$se_year;
                   $date_end = "3/31/".$se_year;
               }else if($se_month== 4){
                   $date_start = "4/1/".$se_year;
                   $date_end = "4/30/".$se_year;
               }else if($se_month== 5){
                   $date_start = "5/1/".$se_year;
                   $date_end = "5/31/".$se_year;
               }else if($se_month== 6){
                   $date_start = "6/1/".$se_year;
                   $date_end = "6/30/".$se_year;
               }else if($se_month== 7){
                   $date_start = "7/1/".$se_year;
                   $date_end = "7/31/".$se_year;
               }else if($se_month== 8){
                   $date_start = "8/1/".$se_year;
                   $date_end = "8/31/".$se_year;
               }else if($se_month== 9){
                   $date_start = "9/1/".$se_year;
                   $date_end = "9/30/".$se_year;
               }
           }

       }else if($se_time== 2){

           $date_start = $_POST["date_start"];
           $date_end = $_POST["date_end"];
           
           if($date_end==''){
               $date_end = date("m/d/Y");
           }

       }

	   $p_case = $_POST["pcase"];
	   if($p_case > '0'){
		$sub_q = ' and problem_case = '.$p_case.' ';
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
                    <a href="../public"><span class="icon is-small">
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
                <a class="btn btn-white btn-rounded border" href="report_c3_new.php">
                    <span class="icon is-small"><i class="far fa-chart-bar" aria-hidden="true"></i></span>
                    <span>แยกตามกรณี</span>
                </a>
                <a class="btn btn-primary btn-rounded" href="report_c1_new.php">
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

        <div class="text-center p-3">
                <p class="h5">การรายงานการละเมิดสิทธิผ่านระบบ CRS รายหน่วยบริการ</p>
            </div>

            <form name="form_menu" method="post" action="report_c1_new.php">
                <div class="row g-3 align-items-center mb-3">
                    <div class="col-auto">
                        <label class="col-form-label"><strong> กรณีที่ถูกละเมิด </strong> </label>
                    </div>
                    <div class="col-auto">
                        <select id="p_case" name="pcase" class="form-select">
                            <option value="0" <?php if ($p_case == "0") { echo "selected";} ?>> ทุกกรณี
                            </option>
                            <option value="1" <?php if ($p_case == "1") { echo "selected";} ?>>
                                บังคับตรวจเอชไอวี </option>
                            <option value="2" <?php if ($p_case == "2") { echo "selected";} ?>>
                                เปิดเผยสถานะ<br>การติดเชื้อเอชไอวี </option>
                            <option value="3" <?php if ($p_case == "3") { echo "selected";} ?>>
                                ถูกกีดกันหรือถูกเลือกปฏิบัติ<br>เนื่องมาจากกการติดเชื้อเอชไอวี </option>
                            <option value="4" <?php if ($p_case == "4") { echo "selected";} ?>>
                                ถูกกีดกันหรือถูกเลือกปฏิบัติ<br>เนื่องมาจากเป็นกลุ่มเปราะบาง </option>
                            <option value="5" <?php if ($p_case == "5") { echo "selected";} ?>>
                                กรณีอื่น ๆ ที่เกี่ยวข้องกับเอชไอวี </option>
                            <option value="6" <?php if ($p_case == "6") { echo "selected";} ?>>
                                กรณีอื่น ๆ </option>
                        </select>
                    </div>
                </div>

                <div class="row g-3 align-items-center">

                    <div class="col-auto">
                        <label class="col-form-label">ช่วงเวลา</label>
                    </div>
                    <div class="col-auto">
                        <select class="form-select form-control" id="se_time" name="se_time">
                            <option value='1' <?php if($se_time == 1){ echo "selected"; } ?>> ตามตัวเลือก </option>
                            <option value='2' <?php if($se_time == 2){ echo "selected"; } ?>> ระบุวันที่ </option>
                        </select>
                    </div>

                    <div class="col-auto se_time_g1">
                        <label class="col-form-label">ปีงบประมาณ</label>
                    </div>
                    <div class="col-auto se_time_g1">
                        <select class="form-select form-control" id="se_year" name="se_year">
                            <?php
                                for($y = 2019; $y <= $year_now; $y++){
                                    if ($se_year == $y) { $se =  "selected";}
                                    echo "<option value='$y' $se> ".($y+543)." </option>";
                                    $se = '';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-auto se_time_g1">
                        <select class="form-select form-control" id="se_quarter" name="se_quarter">
                            <option value='0'  <?php if($se_quarter == 0){ echo "selected"; } ?>> ทั้งปีงบประมาณ </option>
                            <option value='1' <?php if($se_quarter == 1){ echo "selected"; } ?>> ไตรมาส 1 </option>
                            <option value='2' <?php if($se_quarter == 2){ echo "selected"; } ?>> ไตรมาส 2 </option>
                            <option value='3' <?php if($se_quarter == 3){ echo "selected"; } ?>> ไตรมาส 3 </option>
                            <option value='4' <?php if($se_quarter == 4){ echo "selected"; } ?>> ไตรมาส 4 </option>
                            <option value='12' <?php if($se_quarter == 12){ echo "selected"; } ?>> สะสมไตรมาส 1-2 </option>
                            <option value='13' <?php if($se_quarter == 13){ echo "selected"; } ?>> สะสมไตรมาส 1-3 </option>
                            <option value='99' <?php if($se_quarter == 99){ echo "selected"; } ?>> เลือกเดือน </option>
                        </select>
                    </div>
                    <div class="col-auto se_time_g11">
                        <select class="form-select form-control" id="se_month" name="se_month">
                            <option value='1' <?php if($se_month == 1){ echo "selected"; } ?>> มกราคม </option>
                            <option value='2' <?php if($se_month == 2){ echo "selected"; } ?>> กุมภาพันธ์ </option>
                            <option value='3' <?php if($se_month == 3){ echo "selected"; } ?>> มีนาคม </option>
                            <option value='4' <?php if($se_month == 4){ echo "selected"; } ?>> เมษายน </option>
                            <option value='5' <?php if($se_month == 5){ echo "selected"; } ?>> พฤษภาคม </option>
                            <option value='6' <?php if($se_month == 6){ echo "selected"; } ?>> มิถุนายน </option>
                            <option value='7' <?php if($se_month == 7){ echo "selected"; } ?>> กรกฎาคม </option>
                            <option value='8' <?php if($se_month == 8){ echo "selected"; } ?>> สิงหาคม </option>
                            <option value='9' <?php if($se_month == 9){ echo "selected"; } ?>> กันยายน </option>
                            <option value='10' <?php if($se_month == 10){ echo "selected"; } ?>> ตุลาคม </option>
                            <option value='11' <?php if($se_month == 11){ echo "selected"; } ?>> พฤศจิกายน </option>
                            <option value='12' <?php if($se_month == 12){ echo "selected"; } ?>> ธันวาคม </option>
                        </select>
                    </div>

                    <div class="col-auto se_time_g2">
                        <strong> วันที่ </strong>

                    </div>

                    <div class="col-auto se_time_g2 input-daterange">
                        <input type="text" class="form-control" id="date_start" name="date_start"
                            value='<?php echo $date_start; ?>'>
                    </div>

                    <div class="col-auto se_time_g2">
                        ถึง
                    </div>

                    <div class="col-auto se_time_g2 input-daterange">
                        <input type="text" class="form-control" id="date_end" name="date_end"
                            value='<?php echo $date_end; ?>'>
                    </div>

                    <div class="col-auto ">
                        <input type="submit" class="btn bgcolor1" id="submit" name="submit" value="ตกลง">

                    </div>

                    <br>

                    <p class="subtitle ">
                        <strong> ข้อมูล ณ วันที่ (ด/ว/ป) </strong>

                        <?php echo "  : ",date("m/d/Y")," เวลา : ",date("h:i:sa"); ?>
                    </p>

                </div>

            </form>

        </div>

        <table id='crisisc1' width="100%"
            class=" dt-responsive nowrap table table-responsive table-bordered table-striped table-hover">
            <thead class="bgcolor1">
                <tr class="hideextra ">
                    <th class="red3" style="vertical-align: middle; color: white;" rowspan="2">ลำดับ</th>
                    <th class="red3" style="vertical-align: middle; color: white;" rowspan="2">ชื่อ</th>
                    <th class="red3" style="vertical-align: middle; color: white;" rowspan="2">จังหวัด</th>
                    <th class="red3" style="vertical-align: middle; color: white;" rowspan="2">เขต</th>
                    <th class="red3 text-center" style="vertical-align: middle; color: white;" colspan="8">สถานะการดำเนินงาน</th>
                    <th class="red3 " style="vertical-align: middle; color: white;" rowspan="2">รวม</th>

                </tr>
                <tr>
                    <th class="red3" style="vertical-align: middle; color: white;">1. ส่งเรื่องสำเร็จ</th>
                    <th class="red3" style="vertical-align: middle; color: white;">2. เจ้าหน้าที่รับเรื่องแล้ว</th>
                    <th class="red3" style="vertical-align: middle; color: white;">3. เจ้าหน้าที่สอบถามข้อมูลเพิ่มเติมแล้ว
                    </th>
                    <th class="red3" style="vertical-align: middle; color: white;">4. อยู่ระหว่างดำเนินการช่วยเหลือ</th>
                    <th class="red3" style="vertical-align: middle; color: white;">5. ดำเนินการเสร็จสิ้น</th>

                    <th class="red3" style="vertical-align: middle; color: white;">6. ส่งต่อภายในระบบ</th>
                    <th class="red3" style="vertical-align: middle; color: white;">7. รับส่งต่อภายในระบบ</th>

                    <th class="red3" style="vertical-align: middle; color: white;">8. ส่งต่อภายนอก</th>
                </tr>
            </thead>
            <?php

                $sql1 = "SELECT o.id, o.name, o.nameorg, o.username, o.prov_id, p.name as provname, nhso
                FROM officers o left join prov_geo p
                on p.code = o.prov_id 
                where
                position = 'officer' or o.name = 'adminfar' or o.Name = 'adminhatc'
                order by prov_id";

                $result1 = mysqli_query($conn, $sql1); 
                $row1 = mysqli_num_rows($result1); 
                $i = '0';


                while($row1 = $result1->fetch_assoc()) {

                    $sqlt = "SELECT count(c.case_id) as total
                    FROM casetransfer c
                    INNER JOIN 
                    (SELECT MAX(id) as id FROM casetransfer c2 where ousername = '".$row1[username]."'  GROUP BY c2.case_id) last_update 
                    ON last_update.id = c.id
                    inner join officers f on c.ousername = f.username
                    inner join case_inputs ca on c.case_id = ca.case_id
                    where f.name = '".$row1['name']."' 
                    and ca.created_at >= '".date("Y/m/d", strtotime($date_start))."' and ca.created_at <= '".date("Y/m/d", strtotime($date_end))."' ";
                    
                    $ousername = 0;
                    
                    $result_t = mysqli_query($conn, $sqlt); 
                    $rowt = mysqli_num_rows($result_t); 
                    while($rowt = $result_t->fetch_assoc()) {
                        $ousername = $rowt['total'];
                        $sum_t += $rowt['total'];
                    }

                    $sqlt2 = "SELECT count(c.case_id) as total
                    FROM casetransfer c
                    INNER JOIN 
                    (SELECT MAX(id) as id FROM casetransfer c2 where prev_ousername = '".$row1[username]."'  GROUP BY c2.case_id) last_update 
                    ON last_update.id = c.id
                    inner join officers f on c.prev_ousername = f.username
                    inner join case_inputs ca on c.case_id = ca.case_id
                    where f.name = '".$row1['name']."' 
                    and ca.created_at >= '".date("Y/m/d", strtotime($date_start))."' and ca.created_at <= '".date("Y/m/d", strtotime($date_end))."' ";
                    
                    $prev_ousername = 0;
                    
                    $result_t2 = mysqli_query($conn, $sqlt2); 
                    $rowt2 = mysqli_num_rows($result_t2); 
                    while($rowt2 = $result_t2->fetch_assoc()) {
                        $prev_ousername = $rowt2['total'];
                        $sum_t2 += $rowt2['total'];
                    }

                    $sql2 = "SELECT receiver,
                    sum(CASE WHEN status = '1' THEN 1 ELSE 0 END) as case1,
                    sum(CASE WHEN status = '2' THEN 1 ELSE 0 END) as case2,
                    sum(CASE WHEN status = '3' THEN 1 ELSE 0 END) as case3,
                    sum(CASE WHEN status = '4' THEN 1 ELSE 0 END) as case4,
                    sum(CASE WHEN status = '5' THEN 1 ELSE 0 END) as case5,
                    sum(CASE WHEN status = '6' THEN 1 ELSE 0 END) as case6,
                    count(status) as sum
                    FROM case_inputs
                    where receiver='".$row1['name']."'
                    and created_at >= '".date("Y/m/d", strtotime($date_start))."' and created_at <= '".date("Y/m/d", strtotime($date_end))."'
                    $sub_q
                    group by receiver";


                    $result2 = mysqli_query($conn, $sql2); 
                    $row2 = mysqli_num_rows($result2); 
                    $i++;
                    
                    if ($result2->num_rows > 0) {
                        
                        while($row2 = $result2->fetch_assoc()) {
                            
                            $sql3 = "SELECT username,officers.nameorg, prov_geo.code, prov_geo.name as provname, prov_geo.nhso 
                            FROM officers left join prov_geo 
                            on officers.prov_id = prov_geo.code
                            WHERE officers.name = '".$row2['receiver']."'";

                            $result3 = mysqli_query($conn, $sql3); 

                            $row3 = mysqli_num_rows($result3);
                            $row3 = $result3->fetch_assoc();
                            
                            $c_s1 = $c_s1 + $row2["case1"];
                            $c_s2 = $c_s2 + $row2["case2"];
                            $c_s3 = $c_s3 + $row2["case3"];
                            $c_s4 = $c_s4 + $row2["case4"];
                            $c_s5 = $c_s5 + $row2["case5"];
                            $c_s6 = $c_s6 + $row2["case6"];
                            $c_as = $c_as + $row2["sum"];

                            
                            echo "<tr>";
                            echo "<th>".$i."</th>";
                            echo "<td>".$row3["nameorg"]."</td>";
                            echo "<td>".$row3["provname"]."</td>";
                            echo "<td>".$row3["nhso"]."</td>";
                            echo "<td>".$row2["case1"]."</td>";
                            echo "<td>".$row2["case2"]."</td>";
                            echo "<td>".$row2["case3"]."</td>";
                            echo "<td>".$row2["case4"]."</td>";
                            echo "<td>".$row2["case5"]."</td>";
                            echo "<td>".$ousername."</td>";
                            echo "<td>".$prev_ousername."</td>";
                            echo "<td>".$row2["case6"]."</td>";
                            echo "<td>".$row2["sum"]."</td>";
                            
                            echo "</tr>";
                            
                            
                        }
                        
                    } else {
                        echo "<tr>";
                            echo "<th>".$i."</th>";
                            echo "<td>".$row1["nameorg"]."</td>";
                            echo "<td>".$row1["provname"]."</td>";
                            echo "<td>".$row1["nhso"]."</td>";
                            echo "<td>0</td>";
                            echo "<td>0</td>";
                            echo "<td>0</td>";
                            echo "<td>0</td>";
                            echo "<td>0</td>";
                            echo "<td>0</td>";
                            echo "<td>0</td>";
                            echo "<td>0</td>";
                            echo "<td>0</td>";
                            
                            echo "</tr>";
                        
                    }
                }

                $i++;

                echo "<tr>";
                        echo "<th colspan='4' class='bg-danger' style='vertical-align: center; color: white;' >รวม</th>";
                        echo "<td style='display: none;'></td>";
                        echo "<td style='display: none;'></td>";
                        echo "<td style='display: none;'></td>";
                        echo "<td>".$c_s1."</td>";
                        echo "<td>".$c_s2."</td>";
                        echo "<td>".$c_s3."</td>";
                        echo "<td>".$c_s4."</td>";
                        echo "<td>".$c_s5."</td>";
                        echo "<td>".$sum_t."</td>";
                        echo "<td>".$sum_t2."</td>";
                        echo "<td>".$c_s6."</td>";
                        echo "<td>".$c_as."</td>";
                echo "</tr>";
                echo "</tbody>";
                echo "</table>";

                $conn->close();
            ?>


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
    $(document).ready(function() {
        $('.se_time_g11').hide();
        $('.se_time_g2').hide();

        <?php 
        if($se_time == 1){
            echo "$('.se_time_g1').show();";
            echo "$('.se_time_g11').hide();";
            echo "$('.se_time_g2').hide();";
            if($se_quarter == 99){
                echo "$('.se_time_g11').show();";
            }
        }else if($se_time == 2){
            echo "$('.se_time_g1').hide();";
            echo "$('.se_time_g11').hide();";
            echo "$('.se_time_g2').show();";
        }else{
            echo "$('.se_time_g1').show();";
            echo "$('.se_time_g11').hide();";
            echo "$('.se_time_g2').hide();";
        }
        ?>
    });

    $('#se_quarter').on('change', function(e) {

        var se_quarter = $('#se_quarter').val();

        if (se_quarter == '99') {
            $('.se_time_g11').show();
        } else {
            $('.se_time_g11').hide();
        }
    });

    $('#se_time').on('change', function(e) {

        if ($('#se_time').val() == '1') {
            $('.se_time_g1').show();
            $('.se_time_g2').hide();
            $('.se_time_g11').hide();
        } else {
            $('.se_time_g1').hide();
            $('.se_time_g2').show();
            $('.se_time_g11').hide();
        }
    });
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