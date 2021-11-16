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

    <link href="report.css" rel="stylesheet">

    <script type="text/javascript" src="../public/NewFusionChart/js/fusioncharts.js"></script>
    <script type="text/javascript" src="../public/NewFusionChart/js/themes/fusioncharts.theme.hulk-light.js"></script>

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

       $pr = $_POST["pr"];
       
       if($pr != 0){
           $pr_q = " and c.prov_id= '".$pr."' ";
       }

       $date_start = $_POST["date_start"];
       $date_end = $_POST["date_end"];
    
       if($date_end==''){
        $date_end = date("m/d/Y");
       }

       $p_case = $_POST["pcase"];
       if($p_case > '0'){
        $sub_q = ' and problem_case = '.$p_case.' ';
       }
        
        $sql_of = "SELECT a.subtype_offender, count(a.subtype_offender) as suboff 
        FROM add_details a , case_inputs c
        where c.case_id = a.case_id
        and c.created_at >= '".date("Y/m/d", strtotime($date_start))."' and c.created_at <= '".date("Y/m/d", strtotime($date_end))."'
        $pr_q
        group by a.subtype_offender";
        
        $result_of = mysqli_query($conn, $sql_of); 
        $i = 0;
        while($rowco = $result_of->fetch_assoc()) {
            $i++;
            
            $no_suboff[$i] = $rowco["subtype_offender"];
            $suboff[$i] = $rowco["suboff"];
            $loop_suboff = $i;
        }
        $suboff_all = $suboff[2]+$suboff[3];
        
        $sql_c1 = "SELECT problem_case, r_problem_case.name,count(problem_case) as case1 
        FROM case_inputs c ,r_problem_case
        WHERE r_problem_case.code = c.problem_case
        $pr_q
        and c.created_at >= '".date("Y/m/d", strtotime($date_start))."' and c.created_at <= '".date("Y/m/d", strtotime($date_end))."'
        group by problem_case order by case1 desc";
        
        $result_c1 = mysqli_query($conn, $sql_c1); 
        $i = 0;
        while($rowc1 = $result_c1->fetch_assoc()) {
            $i++;
            
            $no_c1[$i] = $rowc1["problem_case"];
            $name_c1[$i] = $rowc1["name"];
            $sum_c1[$i] = $rowc1["case1"];
            $all_sum = $all_sum+$rowc1["case1"];
            $loop_c1 = $i;
        }

        $sql_c2 = "SELECT sum(a.cause_type1) as cause1, 
        sum(a.cause_type2) as cause2, 
        sum(a.cause_type3) as cause3, 
        sum(a.cause_type4) as cause4, 
        sum(a.etc) as cause5, sum(a.cause_type1 or a.cause_type2 or a.cause_type3 or a.cause_type4 or a.etc) as alls
        FROM add_details a , case_inputs c
        where c.case_id = a.case_id
        $pr_q
        and c.created_at >= '".date("Y/m/d", strtotime($date_start))."' and c.created_at <= '".date("Y/m/d", strtotime($date_end))."'";
        
        $result_c2 = mysqli_query($conn, $sql_c2); 
        $i = 0;
        while($rowc2 = $result_c2->fetch_assoc()) {
            $i++;
            
            $sumcase2_c1 = $rowc2["cause1"];
            $sumcase2_c2 = $rowc2["cause2"];
            $sumcase2_c3 = $rowc2["cause3"];
            $sumcase2_c4 = $rowc2["cause4"];
            $sumcase2_c5 = $rowc2["cause5"];
            $sumcase2_all = $rowc2["alls"];
            $loop_c2 = $i;
        }

        $sql_c3 = "SELECT c.group_code, r.name, count(c.group_code) as c3 
        FROM case_inputs c, r_group_code r
        WHERE  c.group_code = r.code
        $pr_q and c.problem_case = '4'
        and c.created_at >= '".date("Y/m/d", strtotime($date_start))."' and c.created_at <= '".date("Y/m/d", strtotime($date_end))."'
        group by c.group_code ";
        //echo $sql_c3;
        $result_c3 = mysqli_query($conn, $sql_c3); 
        $i = 0;
        while($rowc3 = $result_c3->fetch_assoc()) {
            $i++;
        
            for($j = 1;$j<=6;$j++){
                if($rowc3["group_code"] == $j){
                    $i_c3[$j] = $rowc3["group_code"];
                    $namec3[$j] = $rowc3["name"];
                    $sumc3[$j] = $rowc3["c3"];
                    $sumc3all = $sumc3all + $sumc3[$j];
                }
            }

            $loop_c3 = $i;
        }

        
        $sql_c4 = "SELECT c.sub_problem, r.name,count(sub_problem) as c4 
        FROM case_inputs c ,r_sub_problem r
        WHERE r.code = c.sub_problem
        and c.problem_case = '1'
        $pr_q
        and c.created_at >= '".date("Y/m/d", strtotime($date_start))."' and c.created_at <= '".date("Y/m/d", strtotime($date_end))."'
        group by c.sub_problem";
        
        $result_c4 = mysqli_query($conn, $sql_c4); 
        $i = 0;
        while($rowc4 = $result_c4->fetch_assoc()) {
            $i++;
        
            for($j = 1;$j<=6;$j++){
                if($rowc4["sub_problem"] == $j){
                    $i_c4[$j] = $rowc4["sub_problem"];
                    $namec4[$j] = $rowc4["name"];
                    $sumc4[$j] = $rowc4["c4"];
                    
                }
            }

            $loop_c4 = $i;
        }

        $sql_c5 = "select 
        sum(CASE WHEN status > '0' THEN 1 ELSE 0 END) as casestep1,
        sum(CASE WHEN status > '1' THEN 1 ELSE 0 END) as casestep2,
        sum(CASE WHEN status > '2' THEN 1 ELSE 0 END) as casestep3,
        sum(CASE WHEN status > '3' THEN 1 ELSE 0 END) as casestep4,
        sum(CASE WHEN status > '4' THEN 1 ELSE 0 END) as casestep5,
        sum(CASE WHEN status > '5' THEN 1 ELSE 0 END) as casestep6
        FROM case_inputs c
        where  created_at >= '".date("Y/m/d", strtotime($date_start))."' and created_at <= '".date("Y/m/d", strtotime($date_end))."'
		$pr_q ";


        $result_c5 = mysqli_query($conn, $sql_c5); 
        $rowc5 = mysqli_num_rows($result_c5); 
        $i = 0;        
        while($rowc5 = $result_c5->fetch_assoc()) {
            $i++;
            $casestep1 = $rowc5[casestep1];
            $casestep2 = $rowc5[casestep2];
            $casestep3 = $rowc5[casestep3];
            $casestep4 = $rowc5[casestep4];
            $casestep5 = $rowc5[casestep5];
            $casestep6 = $rowc5[casestep6];
            
        }
    ?>

    <?php
        $sql1 = "SELECT c.status,count(c.id) as n_status 
        FROM case_inputs c
        WHERE  c.created_at >= '".date("Y/m/d", strtotime($date_start))."' and c.created_at <= '".date("Y/m/d", strtotime($date_end))."'
        $pr_q
        group by c.status";
        $result1 = mysqli_query($conn, $sql1); 
        $i = 0;
        $sumall = 0;
        while($row1 = $result1->fetch_assoc()) {
            $i++;
            $sumall = $sumall + $row1["n_status"];
            for($j=1;$j<=6;$j++){
                if($row1["status"] == $j){
                    $status[$j] = $row1["status"];
                    $n_status[$j] = $row1["n_status"];
                }
            }
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

        <div class="text-center ">

            <div class="btn-group flex-wrap">
                <a type="button" class="btn btn-primary btn-rounded align-items-stretch d-flex "
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

                <a type="button" class="btn btn-white btn-rounded   align-items-stretch d-flex border"
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
                <a class="btn btn-primary btn-rounded" href="dashboard3_new.php">
                    <span class="icon is-small"><i class="far fa-chart-bar" aria-hidden="true"></i></span>
                    <span>สถานการณ์การละเมิดสิทธิ</span>
                </a>
                <a class="btn btn-white btn-rounded border" href="dashboard5_new.php">
                    <span class="icon is-small"><i class="far fa-chart-bar" aria-hidden="true"></i></span>
                    <span>สถานการณ์รายปี</span>
                </a>
                <a class="btn btn-white btn-rounded border" href="dashboard6_new.php">
                    <span class="icon is-small"><i class="far fa-chart-bar" aria-hidden="true"></i></span>
                    <span>สถานการณ์รายเดือน</span>
                </a>
                <a class="btn btn-white btn-rounded border" href="dashboard7_new.php">
                    <span class="icon is-small"><i class="far fa-chart-bar" aria-hidden="true"></i></span>
                    <span>สถานการณ์รายจังหวัด</span>
                </a>
                <a class="btn btn-white btn-rounded border" href="dashboard1_new.php">
                    <span class="icon is-small"><i class="far fa-chart-bar" aria-hidden="true"></i></span>
                    <span>ข้อมูลแยกตามขั้นตอน</span>
                </a>
                <a class="btn btn-white btn-rounded border" href="dashboard2_new.php">
                    <span class="icon is-small"><i class="far fa-chart-bar" aria-hidden="true"></i></span>
                    <span>ข้อมูลแยกตามปัญหา</span>
                </a>
            </div>

        </div>
        <br>

        <form name="form_menu" method="post" action="dashboard3_new.php">

            <div class="p-3">
                <div class="row g-3 align-items-center">
                    <div class="col-auto">
                        <strong class="col-form-label">จังหวัด</strong>
                    </div>
                    <div class="col-auto">
                        <div class="select">
                            <select class="form-select" id="pr" name="pr">
                                <?php
                                if ($pr == '0') { $pr_v = "selected";}
                                echo "<option value='0' $pr_v> ทุกจังหวัด </option>";
                                $pr_v = '';
                                $sql_p = "SELECT *
                                FROM prov_geo";
                                $result_p = mysqli_query($conn, $sql_p); 
                                $i = 0;
                                while($rowp = $result_p->fetch_assoc()) {
                                    $i++;
                                    $pcode[$i] = $rowp["code"];
                                    $pname[$i] = $rowp["name"];
                                    $loop_p = $i;
                                    if ($pr == $pcode[$i]) { $pr_v = "selected";} 
                                    echo "<option value='$pcode[$i]' $pr_v> $pname[$i] </option>";
                                    $pr_v = '';
                                }
                            ?>
                            </select>
                        </div>
                    </div>

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

                    <br>

                    <p class="subtitle ">
                        <strong> ข้อมูล ณ วันที่ (ด/ว/ป) </strong>

                        <?php echo "  : ",date("m/d/Y")," เวลา : ",date("h:i:sa"); ?>
                    </p>


                </div>

            </div>

        </form>

        <div class="row p-3 ">
            <div class=" col-lg-2 col-md-4 col-sm-4 col-6">
                <div class="text-center  ">
                    <div class="text-white p-4 box-top bgcolor1">
                        <span class="h4">ทั้งหมด</span>
                    </div>
                    <div class="text-dark bg-white border box-buttom p-3 h4">
                        <span><?php echo $sumall; if($sumall ==''){echo '0';}?></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 col-6">
                <div class="text-center  ">
                    <div class="text-white p-4 box-top bgcolor1">
                        <span class="h6">ยังไม่ได้รับเรื่อง</span>
                    </div>
                    <div class="text-dark bg-white border box-buttom p-3 h4">
                        <span><?php echo $n_status[1];if($status[1] ==''){echo '0';} ?></span>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 col-md-4  col-sm-4 col-6">
                <div class="text-center  ">
                    <div class="text-white p-4 box-top bgcolor1">
                        <span class="h6">รับเรื่องแล้ว</span>
                    </div>
                    <div class="text-dark bg-white border box-buttom p-3 h4">
                        <span><?php echo $n_status[2];if($status[2] ==''){echo '0';} ?></span>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 col-md-4 col-sm-4 col-6">
                <div class="text-center  ">
                    <div class="text-white p-4 box-top bgcolor1">
                        <span class="h6">บันทึกข้อมูลเพิ่มแล้ว</span>
                    </div>
                    <div class="text-dark bg-white border box-buttom p-3 h4">
                        <span><?php echo $n_status[3];if($status[3] ==''){echo '0';} ?></span>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 col-md-4 col-sm-4 col-6">
                <div class="text-center  ">
                    <div class="text-white p-4 box-top bgcolor1">
                        <span class="h6">อยู่ระหว่างดำเนินการ</span>
                    </div>
                    <div class="text-dark bg-white border box-buttom p-3 h4">
                        <span><?php echo $n_status[4];if($status[4] ==''){echo '0';} ?></span>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 col-md-4 col-sm-4 col-6">
                <div class="text-center  ">
                    <div class="text-white p-4 box-top bgcolor1">
                        <span class="h6">ดำเนินการเสร็จสิ้น</span>
                    </div>
                    <div class="text-dark bg-white border box-buttom p-3 h4">
                        <span><?php echo $n_status[5];if($status[5] ==''){echo '0';} ?></span>
                    </div>
                </div>
            </div>

        </div>

        <div name="who" class="row">
            <div class="col-xl-8 col-lg-6 col-sm-5 col-xs-5"></div>
            <div class="div-h col-xl-1 col-lg-2 col-md-3 col-sm-3 col-xs-3 text-center text-white p-3 rounded"
                style="background-color:#87053d"> ละเมิดโดย</div>
            <div class="div-h col-xl-1 col-lg-2 col-md-2 col-sm-3 col-xs-2 col-6 text-white rounded"
                style="padding:0px">
                <div class="short-div text-center bgcolor1  rounded p-2" style="border:1px solid #fff; ">
                    บุคคล</div>
                <div class="short-div text-center bgcolor1 rounded p-2" style="border:1px solid #fff; ">
                    องค์กร</div>
            </div>
            <div class="div-h col-xl-1 col-lg-2 col-md-2 col-sm-3 col-xs-2 col-6 rounded" style="padding:0px">
                <div class="short-div text-center bg-white  rounded p-2" style="border:1px solid #ccc;">
                    <?php echo number_format(($suboff[2]/$suboff_all)*100 , 2, '.', '')?> %</div>
                <div class="short-div text-center bg-white  rounded p-2" style="border:1px solid #ccc;">
                    <?php echo number_format(($suboff[3]/$suboff_all)*100 , 2, '.', '') ?> %</div>
            </div>
        </div>

        <div name="chart" class="row p-3">
            <div class="col-12 col-md-6 p-3 ">
                <div id="chart-container-1" class="bg-white  text-center p-3 chart-rounded">
                    FusionCharts XT will load here!
                </div>
            </div>
            <div class="col-12 col-md-6 p-3">
                <div class="bg-white  text-center p-3 chart-rounded">

                    <div class="row text-right p-2">
                        &nbsp;&nbsp;

                        <div class="col-auto">
                            <a id="update-chart12" class="btn btn-outline-primary ">
                                <span>จำนวน</span>
                            </a>
                        </div>
                        <div class="col-auto">
                            <a id="update-chart11" class="btn btn-outline-primary ">
                                <span>เปอร์เซ็นต์</span>
                            </a>
                        </div>
                    </div>
                    <!--div id="chart-container-2" class="bg-white  text-center p-3 chart-rounded">
                FusionCharts XT will load here!
                </!--div-->
                    <div id="chart-container-c5">

                        FusionCharts XT will load here!
                    </div>

                </div>

            </div>
            <div class="col-12 col-md-6 p-3">
                <div id="chart-container-3" class="bg-white  text-center p-3 chart-rounded">
                    FusionCharts XT will load here!
                </div>
            </div>
            <div class="col-12 col-md-6 p-3">
                <div id="chart-container-b1" class="bg-white  text-center p-3 chart-rounded">
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
    <script src="../public/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

    <script type="text/javascript" src="../public/NewFusionChart/js/fusioncharts.js"></script>
    <script type="text/javascript" src="../public/NewFusionChart/js/themes/fusioncharts.theme.hulk-light.js"></script>

    <script>
    $('.input-daterange input').each(function() {

        $(this).datepicker('');
        //$('#date_end').datepicker("setDate", new Date());
    }).on('changeDate', function(e) {
        //load_case()
    });
    </script>

    <script type="text/javascript">
    /*  Chart1 */
    FusionCharts.ready(function() {

        var salesChart = new FusionCharts({
                type: 'bar2d',
                renderAt: 'chart-container-1',
                width: '100%',
                height: '500',
                dataFormat: 'json',
                dataSource: {
                    "chart": {
                        "caption": "การบันทึกข้อมูลการถูกละเมิดสิทธิในระบบ CRS ",
                        "subCaption": "จำแนกตามประเภท ",
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
                        "exportEnabled": "1"
                    },

                    "data": [{
                            "label": "ทั้งหมด",
                            "value": <?php echo $all_sum ?>,
                            "color": "#de0867"
                        },
                        <?php
                        
                            for($i=1;$i<=$loop_c1;$i++){
                                echo "{";
                                echo "'label': '$name_c1[$i]',";
                                echo "'value': '$sum_c1[$i]',";
                                echo "'color': '#333f50'";
                                echo "}";
                                if($i <> $loop_c1){
                                    echo ",";
                                }
                            }
                        ?>

                    ]
                }
            })
            .render();
    });

    /*  pie Chart2 */



    FusionCharts.ready(function() {

        var salesChart = new FusionCharts({
                type: 'doughnut2d',
                renderAt: 'chart-container-2',
                width: '100%',
                height: '500',
                dataFormat: 'json',
                dataSource: {
                    "chart": {

                        "caption": "สาเหตุการละเมิดสิทธิ",
                        "subcaption": "",
                        "showpercentvalues": "1",
                        "defaultcenterlabel": "<?php echo 'ทั้งหมด '.$sumcase2_all.' เคส'; ?>",
                        "aligncaptionwithcanvas": "0",
                        "captionpadding": "0",
                        "decimals": "1",
                        "showlegend": "1",
                        //"plottooltext": "<b>$percentValue $label</b>",
                        "centerlabel": "$value เคส",
                        "theme": "hulk-light",
                        "palettecolors": "#E14455,#2B1615,#7F7F7F,#BABABA,#E87C87",
                        "exportEnabled": "1"
                    },
                    "data": [{
                        "label": "ไม่รู้กฎหมาย",
                        <?php echo "'value': '$sumcase2_c1'"; ?>
                    }, {
                        "label": "ขาดความเข้าใจเรื่องเอดส์",
                        <?php echo "'value': '$sumcase2_c2'"; ?>
                    }, {
                        "label": "ทัศนคติ",
                        <?php echo "'value': '$sumcase2_c3'"; ?>
                    }, {
                        "label": "นโยบายองค์กร",
                        <?php echo "'value': '$sumcase2_c4'"; ?>
                    }, {
                        "label": "อื่นๆ",
                        <?php echo "'value': '$sumcase2_c5'"; ?>
                    }]
                }

            })
            .render();
    });

    /*  pie Chart3 */
    FusionCharts.ready(function() {

        var salesChart = new FusionCharts({
                type: 'doughnut2d',
                renderAt: 'chart-container-3',
                width: '100%',
                height: '400',
                dataFormat: 'json',
                dataSource: {
                    "chart": {
                        "caption": "กลุ่มเปราะบางที่ถูกกีดกันหรือถูกเลือกปฎิบัติ",
                        "subcaption": "",
                        "showpercentvalues": "1",
                        "defaultcenterlabel": "<?php echo 'ทั้งหมด '.$sumc3all.' เคส'; ?>",
                        "aligncaptionwithcanvas": "1",
                        "captionpadding": "1",
                        "showlegend": "1",
                        "decimals": "1",
                        //"plottooltext": "<b>$percentValue $label</b>",
                        "centerlabel": "$value เคส",
                        "theme": "hulk-light",
                        "palettecolors": "#de0867,#2B1615,#7F7F7F,#BABABA,#fba3e0",
                        "exportEnabled": "1"
                    },

                    "data": [{
                        "label": "<?php echo $namec3[1]; ?>",
                        "value": "<?php echo $sumc3[1]; ?>"
                    }, {
                        "label": "<?php echo $namec3[2]; ?>",
                        "value": "<?php echo $sumc3[2]; ?>"
                    }, {
                        "label": "<?php echo $namec3[3]; ?>",
                        "value": "<?php echo $sumc3[3]; ?>"
                    }, {
                        "label": "<?php echo $namec3[4]; ?>",
                        "value": "<?php echo $sumc3[4]; ?>"
                    }, {
                        "label": "<?php echo $namec3[5]; ?>",
                        "value": "<?php echo $sumc3[5]; ?>"
                    }, {
                        "label": "<?php echo $namec3[6]; ?>",
                        "value": "<?php echo $sumc3[6]; ?>"
                    }]
                }

            })
            .render();
    });


    /*  Tab 2 Chart */
    FusionCharts.ready(function() {

        var salesChart = new FusionCharts({
                type: 'column2d',
                renderAt: 'chart-container-b1',
                width: '100%',
                height: '400',
                dataFormat: 'json',
                dataSource: {
                    "chart": {
                        "caption": "ผู้ถูกบังคับตรวจเอชไอวี",
                        "subCaption": "จำแนกตามประเภท",
                        "placeValuesInside": "0",
                        "palettecolors": "#87053d",
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
                        "exportEnabled": "1"

                    },

                    "data": [{
                        "label": "<?php echo $namec4[1]; ?>",
                        "value": "<?php echo $sumc4[1]; ?>"
                    }, {
                        "label": "<?php echo $namec4[2]; ?>",
                        "value": "<?php echo $sumc4[2]; ?>"
                    }, {
                        "label": "<?php echo $namec4[3]; ?>",
                        "value": "<?php echo $sumc4[3]; ?>"
                    }, {
                        "label": "<?php echo $namec4[4]; ?>",
                        "value": "<?php echo $sumc4[4]; ?>"
                    }]
                }
            })
            .render();
    });
    </script>

    <script type="text/javascript">
    /*  Chart 5 */

    FusionCharts.ready(function() {

        var updateBtn11 = document.getElementById('update-chart11');
        var updateBtn12 = document.getElementById('update-chart12');

        updateBtn11.addEventListener('click', function(e) {
            this.disabled = true;
            updateBtn12.disabled = false;
            salesChart.setJSONData({
                "chart": {
                    "caption": "สถานะการดำเนินงานจัดการเรื่องร้องเรียนในระบบ CRS ",
                    "subCaption": "",
                    "placeValuesInside": "0",
                    "yAxisName": "เปอร์เซ็นต์",
                    "yAxisMaxValue": "100",
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
						echo '{';
                            echo '"label": "เรื่องทั้งหมด",';
                            echo '"value": "'.($casestep1/$casestep1*100).'",';
                            echo '},';
    
                            echo '{';
                            echo '"label": "รับเรื่องแล้ว",';
                            echo '"value": "'.($casestep2/$casestep1*100).'",';
                            echo '},';
    
                            echo '{';
                            echo '"label": "สอบถามข้อมูลเพิ่มเติม",';
                            echo '"value": "'.($casestep3/$casestep1*100).'",';
                            echo '},';
    
                            echo '{';
                            echo '"label": "ดำเนินการช่วยเหลือ",';
                            echo '"value": "'.($casestep4/$casestep1*100).'",';
                            echo '},';
    
                            echo '{';
                            echo '"label": "เสร็จสิ้น",';
                            echo '"value": "'.($casestep5/$casestep1*100).'",';
                            echo '},';

                            echo '{';
                            echo '"label": "ส่งต่อภายนอก",';
                            echo '"value": "'.($casestep6/$casestep1*100).'",';
                            echo '}';
					?>
                ]
            });
        });


        updateBtn12.addEventListener('click', function(e) {
            this.disabled = true;
            updateBtn11.disabled = false;
            salesChart.setJSONData({
                "chart": {
                    "caption": "สถานะการดำเนินงานจัดการเรื่องร้องเรียนในระบบ CRS ",
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
						echo '{';
                        echo '"label": "เรื่องทั้งหมด",';
                        echo '"value": "'.$casestep1.'",';
                        echo '},';

                        echo '{';
                        echo '"label": "รับเรื่องแล้ว",';
                        echo '"value": "'.$casestep2.'",';
                        echo '},';

                        echo '{';
                        echo '"label": "สอบถามข้อมูลเพิ่มเติม",';
                        echo '"value": "'.$casestep3.'",';
                        echo '},';

                        echo '{';
                        echo '"label": "ดำเนินการช่วยเหลือ",';
                        echo '"value": "'.$casestep4.'",';
                        echo '},';

                        echo '{';
                        echo '"label": "เสร็จสิ้น",';
                        echo '"value": "'.$casestep5.'",';
                        echo '},';

                        echo '{';
                        echo '"label": "ส่งต่อภายนอก",';
                        echo '"value": "'.$casestep6.'",';
                        echo '}';
					?>]
            });
        });

        var salesChart = new FusionCharts({
                type: 'column2d',
                renderAt: 'chart-container-c5',
                width: '100%',
                height: '450',
                dataFormat: 'json',
                dataSource: {
                    "chart": {
                        "caption": "สถานะการดำเนินงานจัดการเรื่องร้องเรียนในระบบ CRS ",
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
						echo '{';
                        echo '"label": "เรื่องทั้งหมด",';
                        echo '"value": "'.$casestep1.'",';
                        echo '},';

                        echo '{';
                        echo '"label": "รับเรื่องแล้ว",';
                        echo '"value": "'.$casestep2.'",';
                        echo '},';

                        echo '{';
                        echo '"label": "สอบถามข้อมูลเพิ่มเติม",';
                        echo '"value": "'.$casestep3.'",';
                        echo '},';

                        echo '{';
                        echo '"label": "ดำเนินการช่วยเหลือ",';
                        echo '"value": "'.$casestep4.'",';
                        echo '},';

                        echo '{';
                        echo '"label": "เสร็จสิ้น",';
                        echo '"value": "'.$casestep5.'",';
                        echo '},';

                        echo '{';
                        echo '"label": "ส่งต่อภายนอก",';
                        echo '"value": "'.$casestep6.'",';
                        echo '}';
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
</body>

</html>