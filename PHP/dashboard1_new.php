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

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!--link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"-->

    <link href="report.css" rel="stylesheet">

    <script type="text/javascript" src="../public/NewFusionChart/js/fusioncharts.js"></script>
    <script type="text/javascript" src="../public/NewFusionChart/js/themes/fusioncharts.theme.hulk-light.js"></script>

    <title> ปกป้อง (CRS) </title>

    <?php
		
		require("phpsqli_dbinfo.php");
        require("setdateformat.php");
        date_default_timezone_set("Asia/Bangkok");

		$pr = $_POST["pr"];
        $nhso = $_POST["nhso"];

        if($nhso != 0){

            if($pr != 0){
                $pr_q = " and nhso = $nhso and c.prov_id= '".$pr."' ";
            }else{
                $pr_q = " and nhso = $nhso ";
            }
        }else{
            if($pr != 0){
                $pr_q = " and c.prov_id= '".$pr."' ";
            }
        }

	    $date_start = $_POST["date_start"];
	    $date_end = $_POST["date_end"];

	    $se1 = $_POST["problem_case"];
	    $se2 = $_POST["sub_problem"];
	    $se3 = $_POST["group_code"];
	    //echo $se1,' ',$se2," ",$se3," ";
	
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

        if($se1 != '0'){
            $q_se1 = " and problem_case = '$se1' ";

            if($se2 != '0'){
                $q_se2 = " and sub_problem = '$se2' ";

                if($se3 != '0'){

                    $q_se2 = " and group_code = '$se3' ";
                }
            }

        }else{
            $q_se1 = "";
            $q_se2 = "";
            $q_se3 = "";
        }
	

		$sql1 = "SELECT r.code,r.name,c.status,count(c.id) as n_status 
		FROM r_status r left join case_inputs c on r.code = c.status  left join prov_geo on prov_geo.code = c.prov_id
		where c.activecase = 'yes' $q_se1 $q_se2 $q_se3 and date(c.created_at) >= '".date($date_s)."' and date(c.created_at) <= '".date($date_e)."'
		$pr_q
		group by r.code";
		
		$result1 = mysqli_query($conn, $sql1); 
		$i = 0;
		while($row1 = $result1->fetch_assoc()) {
			$i++;
				$status[$i] = $row1["code"];
				$name[$i] = $row1["name"];
				$n_status[$i] = $row1["n_status"];
				$sum =  $sum+$n_status[$i];
		}

        $sql = "SELECT * from prov_geo order by name";
        $result1 = mysqli_query($conn, $sql); 
        
        $i = 0;

        while($row = $result1->fetch_assoc()) {
            $i++;

            $pr_name[$i] = $row["name"];
            $pr_code[$i] = $row["code"];
            $nhso_code[$i] = $row["nhso"];
            
            $prloop = $i;
        }
	?>

</head>

<body class="bg-light">

    <nav class="navbar navbar-light bg-white">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
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

                <div class="dropdown tabtype btn active">
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

                        <a class="dropdown-item active" id="dropdown-layouts" href="dashboard1_new.php">
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

                <div class="dropdown tabtype btn ">
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
                            <a class="dropdown-item dropdown-toggle custom-dropdown" id="dropdown-layouts" data-toggle="dropdown"
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
                                <a class="dropdown-item " href="report_c23_new.php">กรณี 4 เลือกปฏิบัติในกลุ่มเปราะบาง
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

        <div class="container p-3">

            <form name="form_menu" method="post" action="dashboard1_new.php">


                <div class="row g-3 align-items-center mb-3">
                    <div class="col-auto">
                        <label class="col-form-label">ปัญหาที่พบ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    </div>
                    <div class="col-auto">
                        <select id="problem_case" name="problem_case" class="form-select">
                            <option value="0">ทุกประเภทปัญหา</option>
                            <option value="1" <?php if($se1 == '1' ){echo "selected";} ?>>บังคับตรวจเอชไอวี</option>
                            <option value="2" <?php if($se1 == '2' ){echo "selected";} ?>>เปิดเผยสถานะการติดเชื้อเอชไอวี
                            </option>
                            <option value="3" <?php if($se1 == '3' ){echo "selected";} ?>>ถูกกีดกันหรือถูกเลือกปฏิบัติเนื่องมาจาการติดเชื้อเอชไอวี</option>
                            <option value="4" <?php if($se1 == '4' ){echo "selected";} ?>>ถูกกีดกันหรือถูกเลือกปฏิบัติเนื่องมาจากเป็นกลุ่มเปราะบาง</option>
                            <option value="5" <?php if($se1 == '5' ){echo "selected";} ?>>อื่นๆ ที่เกี่ยวข้องกับ HIV</option>
                            <option value="6" <?php if($se1 == '6' ){echo "selected";} ?>>อื่นๆ </option>

                        </select>
                    </div>
                </div>

                <div class="row g-3 align-items-center mb-3">
                    <div class="col-auto">
                        <label class="col-form-label"> ประเภทกลุ่ม &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    </div>
                    <div class="col-auto">
                        <select id="sub_problem" name="sub_problem" class="form-select" disabled="true">
                        </select>
                    </div>
                </div>

                <div class="row g-3 align-items-center mb-3">

                    <div class="col-auto">
                        <label class="col-form-label"> ประเภทกลุ่มย่อย &nbsp;</label>
                    </div>
                    <div class="col-auto">
                        <select id="group_code" name="group_code" class="form-select" disabled="true">
                        </select>
                    </div>
                </div>

                <div class="row mb-3">

                    <div class="col-auto">
                        <label class="col-form-label tx1">เลือกเขต</label>
                    </div>

                    <div class="col-auto ">
                        <div class="">
                            <div class="input-group">
                                <select name="nhso" id="nhso" class="form-select rounded"
                                    onchange="setprov(nhso.value,1);">
                                    <option value="0" <?php if ($nhso == "0"){ echo "selected";} ?>> ทุกเขต </option>
                                    <option value="1" <?php if ($nhso == "1"){ echo "selected";} ?>>
                                        เขต 1
                                    </option>
                                    <option value="2" <?php if ($nhso == "2"){ echo "selected";} ?>>
                                        เขต 2
                                    </option>
                                    <option value="3" <?php if ($nhso == "3"){ echo "selected";} ?>>
                                        เขต 3
                                    </option>
                                    <option value="4" <?php if ($nhso == "4"){ echo "selected";} ?>>
                                        เขต 4
                                    </option>
                                    <option value="5" <?php if ($nhso == "5"){ echo "selected";} ?>>
                                        เขต 5
                                    </option>
                                    <option value="6" <?php if ($nhso == "6"){ echo "selected";} ?>>
                                        เขต 6
                                    </option>
                                    <option value="7" <?php if ($nhso == "7"){ echo "selected";} ?>>
                                        เขต 7
                                    </option>
                                    <option value="8" <?php if ($nhso == "8"){ echo "selected";} ?>>
                                        เขต 8
                                    </option>
                                    <option value="9" <?php if ($nhso == "9"){ echo "selected";} ?>>
                                        เขต 9
                                    </option>
                                    <option value="10" <?php if ($nhso == "10"){ echo "selected";} ?>>
                                        เขต 10
                                    </option>
                                    <option value="11" <?php if ($nhso == "11"){ echo "selected";} ?>>
                                        เขต 11
                                    </option>
                                    <option value="12" <?php if ($nhso == "12"){ echo "selected";} ?>>
                                        เขต 12
                                    </option>
                                    <option value="13" <?php if ($nhso == "13"){ echo "selected";} ?>>
                                        เขต 13
                                    </option>

                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-auto">
                        <label class="col-form-label tx1">จังหวัด</label>
                    </div>


                    <div class="col-auto">
                        <div class="">
                            <div class="input-group">
                                <select name="pr" id="pr" class="form-select rounded">

                                    <option value='0' <?php if ($pr == '0') { echo "selected";} ?>> ทุกจังหวัด </option>

                                    <?php
                                        for($i = 1; $i <= $prloop; $i++){
                                    ?>
                                    <option value='<?php echo $pr_code[$i]; ?>'
                                        <?php if ($pr == $pr_code[$i]) { echo "selected";} ?>>
                                        <?php echo $pr_name[$i]; ?> </option>

                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
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
                        <input type="submit" class="btn btn_color1" id="submit" name="submit" value="ตกลง">

                    </div>

                    <br>

                    <p class="subtitle ">
                        <strong> ข้อมูล ณ วันที่ (ว/ด/ป) : </strong>
                        <?php echo thai_date_short_number_time(strtotime(date("Y-m-d H:i:s"))); ?>
                    </p>

                </div>

            </form>


            <br>

            <div class="row text-right p-2">
            &nbsp;&nbsp;
                
                <div class="col-auto">
                    <a id="update-chart12" class="btn btn-outline-danger ">
                        <span>จำนวน</span>
                    </a>
                </div>
                <div class="col-auto">
                    <a id="update-chart11" class="btn btn-outline-danger ">
                        <span>เปอร์เซ็นต์</span>
                    </a>
                </div>
            </div>


            <div name="chart" class="">
                <div id="chart-container-b1" class="bg-white  text-center p-2 chart-rounded">
                    FusionCharts XT will load here!
                </div>

            </div>

        </div>
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
    
    <script type="text/javascript" src="../public/NewFusionChart/js/fusioncharts.js"></script>
    <script type="text/javascript" src="../public/NewFusionChart/js/themes/fusioncharts.theme.hulk-light.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
        integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous">
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
    $(document).ready(function() {

        var set_nhso = $('#nhso').val();

        setprov(set_nhso,0);  

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

        //alert($('#group_code').val(););

        if($('#problem_case').val() !== '0' ){
            //alert("yes");

            var prob_id = $('#problem_case').val();

            $('#group_code').empty();
            $('#group_code').attr('disabled', 'disabled');
            if ((prob_id == 1) || (prob_id == 5)|| (prob_id == 6)) {
                $('#sub_problem').empty();
                $('#sub_problem').removeAttr('disabled');
                $('#sub_problem').append(
                    '<option value="0" <?php if($se2 == '0' ){echo "selected";} ?> style="width:250px">ทุกประเภทกลุ่ม</option>'
                );
                $('#sub_problem').append(
                    '<option value="1" <?php if($se2 == '1' ){echo "selected";} ?> style="width:250px">ผู้ติดเชื้อเอชไอวี</option>'
                );
                $('#sub_problem').append(
                    '<option value="2" <?php if($se2 == '2' ){echo "selected";} ?> style="width:250px">กลุ่มเปราะบาง</option>'
                );
                $('#sub_problem').append(
                    '<option value="4" <?php if($se2 == '4' ){echo "selected";} ?>  style="width:250px">ครอบครัวและผู้ใกล้ชิดผู้ติดเชื้อเอชไอวี</option>');
                $('#sub_problem').append('<option value="3" style="width:250px">ประชาชนทั่วไป</option>');
            } else if (prob_id == 2) {
                $('#sub_problem').empty();
                $('#sub_problem').removeAttr('disabled');
                $('#sub_problem').append('<option value="0" <?php if($se2 == '0' ){echo "selected";} ?> style="width:250px">ทุกประเภทกลุ่ม</option>');
                $('#sub_problem').append('<option value="1" <?php if($se2 == '1' ){echo "selected";} ?>>ผู้ติดเชื้อเอชไอวี</option>');
            } else if (prob_id == 3) {
                $('#sub_problem').empty();
                $('#sub_problem').removeAttr('disabled');
                $('#sub_problem').append('<option value="0" <?php if($se2 == '0' ){echo "selected";} ?> style="width:250px">ทุกประเภทกลุ่ม</option>');
                $('#sub_problem').append('<option value="1" <?php if($se2 == '1' ){echo "selected";} ?>  >ผู้ติดเชื้อเอชไอวี</option>');
                $('#sub_problem').append('<option value="4" <?php if($se2 == '4' ){echo "selected";} ?>  >ครอบครัวและผู้ใกล้ชิดผู้ติดเชื้อเอชไอวี</option>');
            } else if (prob_id == 4) {
                $('#sub_problem').empty();
                $('#sub_problem').removeAttr('disabled');
                $('#sub_problem').append('<option value="0" <?php if($se2 == '0' ){echo "selected";} ?> style="width:250px">ทุกประเภทกลุ่ม</option>');
                $('#sub_problem').append('<option value="2" <?php if($se2 == '2' ){echo "selected";} ?>  style="width:250px">กลุ่มเปราะบาง</option>');
                $('#group_code').empty();
                $('#group_code').removeAttr('disabled');
                $('#group_code').append('<option value="0" <?php if($se3 == '0' ){echo "selected";} ?> style="width:250px">ทุกประเภทกลุ่มย่อย</option>');
                $('#group_code').append('<option value="1" <?php if($se3 == '1' ){echo "selected";} ?>  style="width:250px">กลุ่มหลากหลายทางเพศ</option>');
                $('#group_code').append('<option value="2" <?php if($se3 == '2' ){echo "selected";} ?>  style="width:250px">พนักงานบริการ </option>');
                $('#group_code').append('<option value="3" <?php if($se3 == '3' ){echo "selected";} ?>  style="width:250px">ผู้ใช้สารเสพติด</option>');
                $('#group_code').append('<option value="4" <?php if($se3 == '4' ){echo "selected";} ?>  style="width:250px">ประชากรข้ามชาติ</option>');
                $('#group_code').append('<option value="5" <?php if($se3 == '5' ){echo "selected";} ?>  style="width:250px">ผู้ถูกคุมขัง</option>');
                $('#group_code').append('<option value="6" <?php if($se3 == '6' ){echo "selected";} ?>  style="width:250px">กลุ่มชาติพันธุ์และชนเผ่า</option>');
                $('#group_code').append('<option value="7" <?php if($se3 == '7' ){echo "selected";} ?>  style="width:250px">คนพิการ</option>');

            } else {
                $('#sub_problem').empty();
                $('#sub_problem').attr('disabled', 'disabled');
            }

            if($('#group_code').val() != null ){
                $('#group_code').empty();
                $('#group_code').removeAttr('disabled');
                $('#group_code').append('<option value="0" <?php if($se3 == '0' ){echo "selected";} ?> style="width:250px">ทุกประเภทกลุ่มย่อย</option>');
                $('#group_code').append('<option value="1" <?php if($se3 == '1' ){echo "selected";} ?>  style="width:250px">กลุ่มหลากหลายทางเพศ</option>');
                $('#group_code').append('<option value="2" <?php if($se3 == '2' ){echo "selected";} ?>  style="width:250px">พนักงานบริการ </option>');
                $('#group_code').append('<option value="3" <?php if($se3 == '3' ){echo "selected";} ?>  style="width:250px">ผู้ใช้สารเสพติด</option>');
                $('#group_code').append('<option value="4" <?php if($se3 == '4' ){echo "selected";} ?>  style="width:250px">ประชากรข้ามชาติ</option>');
                $('#group_code').append('<option value="5" <?php if($se3 == '5' ){echo "selected";} ?>  style="width:250px">ผู้ถูกคุมขัง</option>');
                $('#group_code').append('<option value="6" <?php if($se3 == '6' ){echo "selected";} ?>  style="width:250px">กลุ่มชาติพันธุ์และชนเผ่า</option>');
                $('#group_code').append('<option value="7" <?php if($se3 == '7' ){echo "selected";} ?>  style="width:250px">คนพิการ</option>');
            }

        }
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
        $('.input-daterange input').datepicker({
            format: 'dd/mm/yyyy'
        });
    </script>

    <script>
    $('.input-daterange input').each(function() {

        $(this).datepicker('');
        
        //$('#date_end').datepicker("setDate", new Date());
    }).on('changeDate', function(e) {
        //load_case()
    });

    $('#problem_case').on('change', function(e) {
        var prob_id = e.target.value;
        //console.log(prob_id);
        $('#group_code').empty();
        $('#group_code').attr('disabled', 'disabled');
        if ((prob_id == 1) || (prob_id == 5)|| (prob_id == 6)) {
            $('#sub_problem').empty();
            $('#sub_problem').removeAttr('disabled');
            $('#sub_problem').append(
                '<option value="0" <?php if($se2 == '0' ){echo "selected";} ?> style="width:250px">ทุกประเภทกลุ่ม</option>'
            );
            $('#sub_problem').append(
                '<option value="1" <?php if($se2 == '1' ){echo "selected";} ?> style="width:250px">ผู้ติดเชื้อเอชไอวี</option>'
            );
            $('#sub_problem').append(
                '<option value="2" <?php if($se2 == '2' ){echo "selected";} ?> style="width:250px">กลุ่มเปราะบาง</option>'
            );
            $('#sub_problem').append(
                '<option value="4" <?php if($se2 == '4' ){echo "selected";} ?>  style="width:250px">ครอบครัวและผู้ใกล้ชิดผู้ติดเชื้อเอชไอวี</option>');
            $('#sub_problem').append('<option value="3" style="width:250px">ประชาชนทั่วไป</option>');
        } else if (prob_id == 2) {
            $('#sub_problem').empty();
            $('#sub_problem').removeAttr('disabled');
            $('#sub_problem').append('<option value="0" <?php if($se2 == '0' ){echo "selected";} ?> style="width:250px">ทุกประเภทกลุ่ม</option>');
            $('#sub_problem').append('<option value="1" <?php if($se2 == '1' ){echo "selected";} ?>>ผู้ติดเชื้อเอชไอวี</option>');
        } else if (prob_id == 3) {
            $('#sub_problem').empty();
            $('#sub_problem').removeAttr('disabled');
            $('#sub_problem').append('<option value="0" <?php if($se2 == '0' ){echo "selected";} ?> style="width:250px">ทุกประเภทกลุ่ม</option>');
            $('#sub_problem').append('<option value="1" <?php if($se2 == '1' ){echo "selected";} ?>  >ผู้ติดเชื้อเอชไอวี</option>');
            $('#sub_problem').append('<option value="4" <?php if($se2 == '4' ){echo "selected";} ?>  >ครอบครัวและผู้ใกล้ชิดผู้ติดเชื้อเอชไอวี</option>');
        } else if (prob_id == 4) {
            $('#sub_problem').empty();
            $('#sub_problem').removeAttr('disabled');
            $('#sub_problem').append('<option value="0" <?php if($se2 == '0' ){echo "selected";} ?> style="width:250px">ทุกประเภทกลุ่ม</option>');
            $('#sub_problem').append('<option value="2" <?php if($se2 == '2' ){echo "selected";} ?>  style="width:250px">กลุ่มเปราะบาง</option>');
            $('#group_code').empty();
            $('#group_code').removeAttr('disabled');
            $('#group_code').append(
                '<option value="0" <?php if($se3 == '0' ){echo "selected";} ?> style="width:250px">ทุกประเภทกลุ่มย่อย</option>'
            );
            $('#group_code').append('<option value="1" <?php if($se3 == '1' ){echo "selected";} ?>  style="width:250px">กลุ่มหลากหลายทางเพศ</option>');
            $('#group_code').append('<option value="2" <?php if($se3 == '2' ){echo "selected";} ?>  style="width:250px">พนักงานบริการ </option>');
            $('#group_code').append('<option value="3" <?php if($se3 == '3' ){echo "selected";} ?>  style="width:250px">ผู้ใช้สารเสพติด</option>');
            $('#group_code').append('<option value="4" <?php if($se3 == '4' ){echo "selected";} ?>  style="width:250px">ประชากรข้ามชาติ</option>');
            $('#group_code').append('<option value="5" <?php if($se3 == '5' ){echo "selected";} ?>  style="width:250px">ผู้ถูกคุมขัง</option>');
            $('#group_code').append('<option value="6" <?php if($se3 == '6' ){echo "selected";} ?>  style="width:250px">กลุ่มชาติพันธุ์และชนเผ่า</option>');
            $('#group_code').append('<option value="7" <?php if($se3 == '7' ){echo "selected";} ?>  style="width:250px">คนพิการ</option>');

        } else {
            $('#sub_problem').empty();
            $('#sub_problem').attr('disabled', 'disabled');
        }
    });
    $('#sub_problem').on('change', function(e) {
        var sub_id = e.target.value;
        if (sub_id == 2) {
            $('#group_code').empty();
            $('#group_code').removeAttr('disabled');
            $('#group_code').append(
                '<option value="0" <?php if($se3 == '0' ){echo "selected";} ?> style="width:250px">ทุกประเภทกลุ่มย่อย</option>'
            );
            $('#group_code').append(
                '<option value="1" <?php if($se3 == '1' ){echo "selected";} ?> style="width:250px">กลุ่มหลากหลายทางเพศ</option>'
            );
            $('#group_code').append(
                '<option value="2" <?php if($se3 == '2' ){echo "selected";} ?>style="width:250px">พนักงานบริการ</option>'
            );
            $('#group_code').append('<option value="3" <?php if($se3 == '3' ){echo "selected";} ?> style="width:250px">ผู้ใช้สารเสพติด</option>');
            $('#group_code').append('<option value="4" <?php if($se3 == '4' ){echo "selected";} ?> style="width:250px">ประชากรข้ามชาติ</option>');
            $('#group_code').append('<option value="5" <?php if($se3 == '5' ){echo "selected";} ?> style="width:250px">ผู้ถูกคุมขัง</option>');
            $('#group_code').append('<option value="6" <?php if($se3 == '6' ){echo "selected";} ?> style="width:250px">กลุ่มชาติพันธุ์และชนเผ่า</option>');
            $('#group_code').append('<option value="7" <?php if($se3 == '7' ){echo "selected";} ?> style="width:250px">คนพิการ</option>');



        } else {
            $('#group_code').empty();
            $('#group_code').attr('disabled', 'disabled');
        }
    });
    </script>

    <script type="text/javascript">
    /*  Tab 2 Chart */

    FusionCharts.ready(function() {

        var updateBtn11 = document.getElementById('update-chart11');
        var updateBtn12 = document.getElementById('update-chart12');

        updateBtn11.addEventListener('click', function(e) {
            this.disabled = true;
            updateBtn12.disabled = false;
            salesChart.setJSONData({
                "chart": {
                    "caption": "ข้อมูลแยกตามขั้นตอน",
                    "subCaption": "",
                    "placeValuesInside": "0",
                    "yAxisName": "เปอร์เซ็นต์",
                    "basefontsize": "14",
                    "captionFontSize": "16",
                    "subcaptionFontSize": "16",
                    "showAxisLines": "1",
                    "axisLineAlpha": "25",
                    "alignCaptionWithCanvas": "0",
                    "showAlternateVGridColor": "1",
                    "numberScaleValue": "0",
                    "theme": "hulk-light",
                    "decimals": "2",
                    "numberSuffix": "%",
                    "palettecolors": "#de0867",
                    "exportEnabled": "1"
                },

                "data": [
                    <?php
						for($i=1;$i<=6;$i++){
							echo '{';
							echo '"label": "'.$name[$i].'",';
							echo '"value": "'.$n_status[$i]*100/$sum.'",';
							echo '}';
							if($i<>6){
								echo ",";
							}
						}
					?>
                ]
            });
        });


        updateBtn12.addEventListener('click', function(e) {
            this.disabled = true;
            updateBtn11.disabled = false;
            salesChart.setJSONData({
                "chart": {
                    "caption": "ข้อมูลแยกตามขั้นตอน",
                    "subCaption": "",
                    "placeValuesInside": "0",
                    "yAxisName": "จำนวน",
                    "basefontsize": "14",
                    "captionFontSize": "16",
                    "subcaptionFontSize": "16",
                    "showAxisLines": "1",
                    "axisLineAlpha": "25",
                    "alignCaptionWithCanvas": "0",
                    "showAlternateVGridColor": "1",
                    "numberScaleValue": "0",
                    "theme": "hulk-light",
                    "palettecolors": "#de0867",
                    "exportEnabled": "1"

                },

                "data": [<?php
						for($i=1;$i<=6;$i++){
							echo '{';
							echo '"label": "'.$name[$i].'",';
							echo '"value": "'.$n_status[$i].'",';
							echo '}';
							if($i<>6){
								echo ",";
							}
						}
					?>]
            });
        });

        var salesChart = new FusionCharts({
                type: 'column2d',
                renderAt: 'chart-container-b1',
                width: '100%',
                height: '400',
                dataFormat: 'json',
                dataSource: {
                    "chart": {
                        "caption": "ข้อมูลแยกตามขั้นตอน",
                        "subCaption": "",
                        "placeValuesInside": "0",
                        "yAxisName": "จำนวน",
                        "basefontsize": "14",
                        "captionFontSize": "16",
                        "subcaptionFontSize": "16",
                        "showAxisLines": "1",
                        "axisLineAlpha": "25",
                        "alignCaptionWithCanvas": "0",
                        "showAlternateVGridColor": "1",
                        "numberScaleValue": "0",
                        "theme": "hulk-light",
                        "palettecolors": "#de0867",
                        "exportEnabled": "1"

                    },

                    "data": [<?php
						for($i=1;$i<=6;$i++){
							echo '{';
							echo '"label": "'.$name[$i].'",';
							echo '"value": "'.$n_status[$i].'",';
							echo '}';
							if($i<>6){
								echo ",";
							}
						}
					?>]
                },
                events: {
                    "dataUpdated": function(evtObj, argObj) {
                        var header = document.getElementById('header');
                        header.style.display = 'block';

                        var tempDiv = document.createElement('div');
                        var attrsTable = document.getElementById('attrs-table');
                        var titleDiv, valueDiv;
                        for (var prop in argObj) {
                            titleDiv = document.createElement('div');
                            titleDiv.className = 'title';
                            titleDiv.innerHTML = prop;

                            valueDiv = document.createElement('div');
                            valueDiv.className = 'value';
                            valueDiv.innerHTML = argObj[prop];
                            console.log(argObj[prop]);

                            tempDiv.appendChild(titleDiv);
                            tempDiv.appendChild(valueDiv);
                        }
                        attrsTable.innerHTML = '';
                        attrsTable.appendChild(tempDiv);
                    }
                }
            })
            .render();
    });
    </script>

    <script>
    function setprov(se,ck1) {

        var pr_code = <?php echo json_encode($pr_code); ?>;
        var pr_name = <?php echo json_encode($pr_name); ?>;
        var nhso_code = <?php echo json_encode($nhso_code); ?>;

        if (se == 0) {
            //alert("test"); 

            //$('#prov11').prop('disabled', 'disabled');
            //$('#prov11').val(0);

            $("#pr").empty();
            $("#pr").append($("<option></option>").attr("value", '0').text('ทุกจังหวัด'));

            for (let i = 1; i <= <?php echo $prloop; ?>; i++) {

                $("#pr").append($("<option></option>").attr("value", pr_code[i]).text(pr_name[i]));

                if(ck1 == 0){
                    if ('<?php echo $pr; ?>' == pr_code[i]) {
                    $("#pr option[value='" + pr_code[i] + "']").attr("selected", "selected");
                    }
                }

            }

        } else {


            $("#pr").empty();
            $("#pr").append($("<option></option>").attr("value", '0').text("ทุกจังหวัด"));

            for (let i = 1; i <= <?php echo $prloop; ?>; i++) {

                if (nhso_code[i] == se) {
                    $("#pr").append($("<option></option>")
                        .attr("value", pr_code[i]).text(pr_name[i]));
                }

                if ('<?php echo $pr; ?>' == pr_code[i]) {

                    $("#pr option[value='" + pr_code[i] + "']").attr("selected", "selected");
                }
            }

        }
    }
    </script>

</body>

</html>