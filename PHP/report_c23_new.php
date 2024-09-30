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
        require("setdateformat.php");
        date_default_timezone_set("Asia/Bangkok");

        // Change character set to utf8
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
    
            $date_start = "01/10/".($se_year-1);
            $date_end = "30/09/".$se_year;
        }
    
        if($se_time== 1){
    
            if($se_quarter== 0){
                $date_start = "01/10/".($se_year-1);
                $date_end = "30/09/".$se_year;
            }else if($se_quarter== 1){
                $date_start = "01/10/".($se_year-1);
                $date_end = "31/12/".($se_year-1);
            }else if($se_quarter== 2){
                $date_start = "01/01/".$se_year;
                $date_end = "31/03/".$se_year;
            }else if($se_quarter== 3){
                $date_start = "01/04/".$se_year;
                $date_end = "30/06/".$se_year;
            }else if($se_quarter== 4){
                $date_start = "01/07/".$se_year;
                $date_end = "30/09/".$se_year;
            }else if($se_quarter== 12){
                $date_start = "01/10/".($se_year-1);
                $date_end = "31/03/".$se_year;
            }else if($se_quarter== 13){
                $date_start = "01/10/".($se_year-1);
                $date_end = "30/06/".$se_year;
            }else if($se_quarter== 99){
                if($se_month== 10){
                    $date_start = "01/10/".($se_year-1);
                    $date_end = "31/10/".($se_year-1);
                }else if($se_month== 11){
                    $date_start = "01/11/".($se_year-1);
                    $date_end = "30/11/".($se_year-1);
                }else if($se_month== 12){
                    $date_start = "01/12/".($se_year-1);
                    $date_end = "31/12/".($se_year-1);
                }else if($se_month== 1){
                    $date_start = "01/01/".$se_year;
                    $date_end = "31/01/".$se_year;
                }else if($se_month== 2){
                    $date_start = "01/02/".$se_year;
                    $date_end = strtotime("3/1/".$se_year)-1;
                    $date_end = date("d/m/Y",$date_end);
    
                }else if($se_month== 3){
                    $date_start = "01/03/".$se_year;
                    $date_end = "31/03/".$se_year;
                }else if($se_month== 4){
                    $date_start = "01/04/".$se_year;
                    $date_end = "30/04/".$se_year;
                }else if($se_month== 5){
                    $date_start = "01/05/".$se_year;
                    $date_end = "31/05/".$se_year;
                }else if($se_month== 6){
                    $date_start = "01/06/".$se_year;
                    $date_end = "30/06/".$se_year;
                }else if($se_month== 7){
                    $date_start = "01/07/".$se_year;
                    $date_end = "31/07/".$se_year;
                }else if($se_month== 8){
                    $date_start = "01/08/".$se_year;
                    $date_end = "31/08/".$se_year;
                }else if($se_month== 9){
                    $date_start = "01/09/".$se_year;
                    $date_end = "30/09/".$se_year;
                }
            }
    
        }else if($se_time== 2){
    
            $date_start = $_POST["date_start"];
            $date_end = $_POST["date_end"];
            
            if($date_end==''){
                $date_end = date("D/M/Y");
            }
    
        }
        
        if($date_start != "" ){
            $yyyymmdd = substr($date_start,6,4)."/".substr($date_start,3,2)."/".substr($date_start,0,2);
            $date_s =  $yyyymmdd;
        }
    
        if($date_end != "" ){
            $yyyymmdd = substr($date_end,6,4)."/".substr($date_end,3,2)."/".substr($date_end,0,2);
            $date_e =  $yyyymmdd;
        }

        $ck_group = $_POST["group"];

        if ( $ck_group <> ''){
            $query_group = "and o.group = '".$ck_group."' ";
        }else{
            $query_group = " or o.name = 'adminfar' or o.Name = 'adminhatc'";
        }

        $sql = "select * from officer_groups";
        $result = mysqli_query($conn, $sql); 
        $i = 0;
        while($row1 = $result->fetch_assoc()) {
            $i++;
            $g_code[$i] = $row1[code];
            $g_name[$i] = $row1[groupname];
            $loop_group = $i;

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

        <div class="text-center p-4">
            <div class="btn-group btn-group-toggle my-auto flex-wrap  ">

                <div class="dropdown tabtype btn ">
                    <a class="dropdown-toggle textcolor1 p-1" type="button" id="dropdownMenu1" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-chart-bar">&nbsp;</i> Dashboard สรุปสถานการณ์
                    </a>
                    <div class="dropdown-menu color-h3 bg-gradient" aria-labelledby="dropdownMenu1">
                        <a class="dropdown-item " id="dropdown-layouts" href="dashboard3_new.php">
                            ภาพรวม</a>

                        <a class="dropdown-item " id="dropdown-layouts" href="dashboard5_new.php">
                            ช่วงเวลา (รายปี/รายเดือน)</a>

                        <a class="dropdown-item " id="dropdown-layouts" href="dashboard7_new2.php">
                            รายพื้นที่ (เขต/จังหวัด)</a>

                        <a class="dropdown-item " id="dropdown-layouts" href="dashboard1_new.php">
                            จำแนกสถานะการดำเนินงาน</a>

                        <a class="dropdown-item " id="dropdown-layouts" href="dashboard2_new.php">
                            จำแนกปัญหา</a>

                    </div>

                </div>

                <a href="automated.php" class="btn tabtype">
                    <div class="p-1">
                        <i class="fas fa-file-alt">&nbsp;</i> รายงานการละเมิดสิทธิ
                    </div>
                </a>

                <a href="mapcrisis_new.php" class="btn tabtype">
                    <div class="p-1">
                        <i class="fas fa-map">&nbsp;</i> พิกัดจุดเกิดเหตุ
                    </div>
                </a>

                <div class="dropdown tabtype btn active">
                    <a class="dropdown-toggle textcolor1 p-1" type="button" id="dropdownMenu1" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-table">&nbsp;</i> สรุปข้อมูลภาพรวม
                    </a>
                    <div class="dropdown-menu color-h3 bg-gradient" aria-labelledby="dropdownMenu1">
                        <a class="dropdown-item " id="dropdown-layouts" href="table_new.php">
                            ภาพรวม</a>

                        <div class="dropdown dropright">
                            <a class="dropdown-item dropdown-toggle custom-dropdown" id="dropdown-layouts" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">สรุปกรณีการละเมิดสิทธิ</a>
                            <div class="dropdown-menu color-h3" aria-labelledby="dropdown-layouts">
                                <a class="dropdown-item " href="report_c3_new.php">แยกตามกรณี
                                </a>
                                <a class="dropdown-item " href="report_c1_new.php">รายหน่วยบริการ
                                </a>
                                <a class="dropdown-item " href="report_c1-2_new.php">รายจังหวัด
                                </a>
                            </div>
                        </div>

                        <div class="dropdown dropright">
                            <a class="dropdown-item dropdown-toggle custom-dropdown active" id="dropdown-layouts" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">ตารางสรุปการละเมิดสิทธิ</a>
                            <div class="dropdown-menu color-h3" aria-labelledby="dropdown-layouts">
                                <a class="dropdown-item " href="mapreport1.php">แผนที่
                                </a>
                                <a class="dropdown-item " href="report_c44.php">แยกกรณีละเมิดสิทธิ
                                </a>
                                <a class="dropdown-item " href="report_c2_new.php">รวมทุกกรณี
                                </a>
                                <a class="dropdown-item " href="report_c21_new.php">กรณี 1 บังคับตรวจเอชไอวี
                                </a>
                                <a class="dropdown-item " href="report_c22_new.php">กรณี 3
                                    เลือกปฏิบัติในกลุ่มผู้ติดเชื้อ
                                </a>
                                <a class="dropdown-item active" href="report_c23_new.php">กรณี 4 เลือกปฏิบัติในกลุ่มเปราะบาง
                                </a>
                                <a class="dropdown-item " href="dashboard8_new.php">ข้อมูลกลุ่มเปราะบางรายเดือน
                                </a>
                                <a class="dropdown-item " href="dashboard4_new.php">สัดส่วนกลุ่มเปราะบาง
                                </a>
                                <a class="dropdown-item "
                                    href="dashboard9_new.php">สัดส่วนกลุ่มเปราะบางเปรียบเทียบประชากรข้ามชาติ
                                </a>
                                <a class="dropdown-item " href="report_c41.php">สัดส่วนการละเมิดสิทธิ
                                </a>
                                <a class="dropdown-item " href="report_c4.php">สัดส่วนประเภทหน่วยงาน
                                </a>
                                <a class="dropdown-item " href="report_c43.php">สัดส่วนการดำเนินการ
                                </a>
                                <a class="dropdown-item " href="report_c42.php">สัดส่วนผลการดำเนินการ
                                </a>
                            </div>
                        </div>

                        <a class="dropdown-item " id="dropdown-layouts" href="report_performance_new2.php">
                            ระยะเวลาการดำเนินการ</a>

                    </div>

                </div>


            </div>
        </div>

        <div class=" p-จ">

            <div class="text-center p-3 mb-4">
                <p class="h5">สรุปข้อมูลการร้องเรียนในระบบ CRS ข้อมูลในระบบ กรณี 4 เลือกปฎิบัติในกลุ่มเปราะบาง</p>
            </div>

            <form name="form_menu" method="post" action="report_c23_new.php">

                <div class="row g-3 align-items-center mb-3">
                    <div class="col-auto">
                        <label class="col-form-label"><strong> หน่วยงานหลัก </strong> </label>
                    </div>
                    <div class="col-auto">
                            <select class="form-select form-control" id="group" name="group">
                                <option value='' >ทั้งหมด</option>
                                <?php
                                    for($i = 1; $i <= $loop_group ; $i++){
                                        if ($ck_group == $g_code[$i]) { $se_g = "selected";}
                                        echo "<option value='$g_code[$i]' $se_g > $g_name[$i] </option>";
                                        $se_g = "";
                                    }
                                ?>  
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
                            <option value='0' <?php if($se_quarter == 0){ echo "selected"; } ?>> ทั้งปีงบประมาณ
                            </option>
                            <option value='1' <?php if($se_quarter == 1){ echo "selected"; } ?>> ไตรมาส 1 </option>
                            <option value='2' <?php if($se_quarter == 2){ echo "selected"; } ?>> ไตรมาส 2 </option>
                            <option value='3' <?php if($se_quarter == 3){ echo "selected"; } ?>> ไตรมาส 3 </option>
                            <option value='4' <?php if($se_quarter == 4){ echo "selected"; } ?>> ไตรมาส 4 </option>
                            <option value='12' <?php if($se_quarter == 12){ echo "selected"; } ?>> สะสมไตรมาส 1-2
                            </option>
                            <option value='13' <?php if($se_quarter == 13){ echo "selected"; } ?>> สะสมไตรมาส 1-3
                            </option>
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
                        <strong> ข้อมูล ณ วันที่ (ว/ด/ป) : </strong>
                        <?php echo thai_date_short_number_time(strtotime(date("Y-m-d H:i:s"))); ?>
                    </p>

                </div>

            </form>

        </div>

        <table id='crisisc1' width="100%"
            class=" dt-responsive nowrap table table-responsive table-bordered table-striped table-hover">
            <thead class="bgcolor1">
                <th class="" style="vertical-align: middle; color: white;" rowspan="2">ลำดับ</th>
                <th class="" style="vertical-align: middle; color: white;" rowspan="2">ชื่อ</th>
                <th class="" style="vertical-align: middle; color: white;" rowspan="2">จังหวัด</th>
                <th class="" style="vertical-align: middle; color: white;" rowspan="2">เขต</th>
                <th class="" style="vertical-align: middle; color: white;" colspan="4">
                    กลุ่มหลากหลายทางเพศ</th>
                <th class="" style="vertical-align: middle; color: white;" rowspan="2">พนักงานบริการ
                </th>
                <th class="" style="vertical-align: middle; color: white;" rowspan="2">
                    ผู้ใช้สารเสพติด</th>
                <th class="" style="vertical-align: middle; color: white;" rowspan="2">
                    ประชากรข้ามชาติ</th>
                <th class="" style="vertical-align: middle; color: white;" rowspan="2">ผู้ถูกคุมขัง
                </th>
                <th class="" style="vertical-align: middle; color: white;" rowspan="2">
                    กลุ่มชาติพันธุ์และชนเผ่า</th>
                    <th class="" style="vertical-align: middle; color: white;" rowspan="2">
                    คนพิการ</th>
                <th class="" style="vertical-align: middle; color: white;" rowspan="2">รวม</th>
                </tr>
                <tr>

                    <th class="" style="vertical-align: middle; color: white;">ชาย
                        (ชายมีเพศสัมพันธ์กับชาย)</th>
                    <th class="" style="vertical-align: middle; color: white;">หญิง</th>
                    <th class="" style="vertical-align: middle; color: white;">สาวประเภทสอง</th>
                    <th class="" style="vertical-align: middle; color: white;">อื่นๆ</th>
                </tr>
            </thead>
            <?php

                        $sql1 = "SELECT o.id, o.name, o.nameorg, o.prov_id, p.name as provname, nhso
                        FROM officers o left join prov_geo p
                        on p.code = o.prov_id 
                        where
                        position = 'officer' $query_group
                        order by prov_id";
                        $result1 = mysqli_query($conn, $sql1); 
                        $row1 = mysqli_num_rows($result1); 
                        $i = '0';
                        while($row1 = $result1->fetch_assoc()) {

                            $sql2 = "SELECT receiver,
                            sum(CASE WHEN problem_case = '4' and group_code = '1'  and sex = '1' THEN 1 ELSE 0 END) as case4_1_1,
                            sum(CASE WHEN problem_case = '4' and group_code = '1'  and sex = '2' THEN 1 ELSE 0 END) as case4_1_2,
                            sum(CASE WHEN problem_case = '4' and group_code = '1'  and sex = '3' THEN 1 ELSE 0 END) as case4_1_3,
                            sum(CASE WHEN problem_case = '4' and group_code = '1'  and sex = '4' THEN 1 ELSE 0 END) as case4_1_4,
                            sum(CASE WHEN problem_case = '4' and group_code = '2' THEN 1 ELSE 0 END) as case4_2,
                            sum(CASE WHEN problem_case = '4' and group_code = '3' THEN 1 ELSE 0 END) as case4_3,
                            sum(CASE WHEN problem_case = '4' and group_code = '4' THEN 1 ELSE 0 END) as case4_4,
                            sum(CASE WHEN problem_case = '4' and group_code = '5' THEN 1 ELSE 0 END) as case4_5,
                            sum(CASE WHEN problem_case = '4' and group_code = '6' THEN 1 ELSE 0 END) as case4_6,
                            sum(CASE WHEN problem_case = '4' and group_code = '7' THEN 1 ELSE 0 END) as case4_7,
                            sum(CASE WHEN problem_case = '4' THEN 1 ELSE 0 END) as sum
                            FROM case_inputs c
                            where c.activecase = 'yes' and receiver='".$row1['name']."'
                            and date(c.created_at) >= '".date($date_s)."' and date(c.created_at) <= '".date($date_e)."'
                            group by receiver";



                            //echo $sql2,'<br>';

                            $result2 = mysqli_query($conn, $sql2); 
                            $row2 = mysqli_num_rows($result2); 
                            $i++;
                            if ($result2->num_rows > 0) {
                                
                                // output data of each row
                                while($row2 = $result2->fetch_assoc()) {

                                    $c_s411 = $c_s411 + $row2["case4_1_1"];
                                    $c_s412 = $c_s412 + $row2["case4_1_2"];
                                    $c_s413 = $c_s413 + $row2["case4_1_3"];
                                    $c_s414 = $c_s414 + $row2["case4_1_4"];
                                    $c_s42 = $c_s42 + $row2["case4_2"];
                                    $c_s43 = $c_s43 + $row2["case4_3"];
                                    $c_s44 = $c_s44 + $row2["case4_4"];
                                    $c_s45 = $c_s45 + $row2["case4_5"];
                                    $c_s46 = $c_s46 + $row2["case4_6"];
                                    $c_s47 = $c_s47 + $row2["case4_7"];
                                    $c_as = $c_as + $row2["sum"];
                                    
                                    //echo $row['receiver'];
                                    $sql3 = "SELECT username,officers.nameorg, prov_geo.code, prov_geo.name as provname, prov_geo.nhso 
                                    FROM officers left join prov_geo 
                                    on officers.prov_id = prov_geo.code
                                    WHERE officers.name = '".$row2['receiver']."'";
                                    //echo $sql2;
                                    $result3 = mysqli_query($conn, $sql3); 

                                    $row3 = mysqli_num_rows($result3);
                                    $row3 = $result3->fetch_assoc();

                                    //echo $row2["prov_id"];
                                    
                                    echo "<tr>";
                                    echo "<th>".$i."</th>";
                                                        echo "<td>".$row1["nameorg"]."</td>";
                                                        echo "<td>".$row3["provname"]."</td>";
                                                        echo "<td>".$row3["nhso"]."</td>";
                                                        echo "<td>".$row2["case4_1_1"]."</td>";
                                                        echo "<td>".$row2["case4_1_2"]."</td>";
                                                        echo "<td>".$row2["case4_1_3"]."</td>";
                                                        echo "<td>".$row2["case4_1_4"]."</td>";
                                                        echo "<td>".$row2["case4_2"]."</td>";
                                                        echo "<td>".$row2["case4_3"]."</td>";
                                                        echo "<td>".$row2["case4_4"]."</td>";
                                                        echo "<td>".$row2["case4_5"]."</td>";
                                                        echo "<td>".$row2["case4_6"]."</td>";
                                                        echo "<td>".$row2["case4_7"]."</td>";
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
                                    echo "<td>0</td>";
                                    echo "<td>0</td>";
                                    echo "</tr>";
                            }

                        }
                                echo "</tbody>";

                        ?>
            <tfoot>
                <tr>
                    <th colspan='4' class='bgcolor1' style='vertical-align: middle; background: #de0867;' >รวม</th>
                    
                    <td><?php echo $c_s411; ?></td>
                    <td><?php echo $c_s412; ?></td>
                    <td><?php echo $c_s413; ?></td>
                    <td><?php echo $c_s414; ?></td>
                    <td><?php echo $c_s42; ?></td>
                    <td><?php echo $c_s43; ?></td>
                    <td><?php echo $c_s44; ?></td>
                    <td><?php echo $c_s45; ?></td>
                    <td><?php echo $c_s46; ?></td>
                    <td><?php echo $c_s47; ?></td>
                    <td><?php echo $c_as; ?></td>
                </tr>
            </tfoot>
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
    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
        integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous">
    </script>

    <script type="text/javascript"
        src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.11.3/b-2.0.1/b-html5-2.0.1/b-print-2.0.1/datatables.min.js">
    </script>

    <script src="../public/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

    <script type="text/javascript">
    $.fn.dropdown = (function() {
        var $bsDropdown = $.fn.dropdown;
        return function(config) {
            if (typeof config === 'string' && config === 'toggle') { // dropdown toggle trigged
                $('.has-child-dropdown-show').removeClass('has-child-dropdown-show');
                $(this).closest('.dropdown').parents('.dropdown').addClass(
                    'has-child-dropdown-show');
            }
            var ret = $bsDropdown.call($(this), config);
            $(this).off(
                'click.bs.dropdown'
            ); // Turn off dropdown.js click event, it will call 'this.toggle()' internal
            return ret;
        }
    })();
    </script>

    <script type="text/javascript">
    $(function() {
        $('.dropdown [data-toggle="dropdown"]').on('click', function(e) {
            $(this).dropdown('toggle');
            e
                .stopPropagation(); // do not fire dropdown.js click event, it will call 'this.toggle()' internal
        });
        $('.dropdown').on('hide.bs.dropdown', function(e) {
            if ($(this).is('.has-child-dropdown-show')) {
                $(this).removeClass('has-child-dropdown-show');
                e.preventDefault();
            }
            e.stopPropagation(); // do not need pop in multi level mode
        });
    });

    // for hover
    $('.dropdown-hover').on('mouseenter', function() {
        if (!$(this).hasClass('show')) {
            $('>[data-toggle="dropdown"]', this).dropdown('toggle');
        }
    });
    $('.dropdown-hover').on('mouseleave', function() {
        if ($(this).hasClass('show')) {
            $('>[data-toggle="dropdown"]', this).dropdown('toggle');
        }
    });
    $('.dropdown-hover-all').on('mouseenter', '.dropdown', function() {
        if (!$(this).hasClass('show')) {
            $('>[data-toggle="dropdown"]', this).dropdown('toggle');
        }
    });
    $('.dropdown-hover-all').on('mouseleave', '.dropdown', function() {
        if ($(this).hasClass('show')) {
            $('>[data-toggle="dropdown"]', this).dropdown('toggle');
        }
    });
    </script>

    <script>
        $('.input-daterange input').datepicker({
            format: 'dd/mm/yyyy'
        });
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
            "dom": 'Bfrtip',
            "scrollX": true,
            "responsive": true,
            "pageLength": 100,
            "buttons": [
                'excel', 'copy', 'print'
            ]
        });
    });
    </script>


</body>

</html>