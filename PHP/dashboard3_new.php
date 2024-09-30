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


    <title> ปกป้อง (CRS) </title>

    <?php
        
        require("phpsqli_dbinfo.php");
        require("setdateformat.php");
        date_default_timezone_set("Asia/Bangkok");

        //$conn = mysqli_connect($hostname, $username, $password, $database);
        /*if (mysqli_connect_errno()) 
        { 
            echo "Database connection failed."; 
        }*/
        // Change character set to utf8
        // mysqli_set_charset($conn,"utf8");

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

        //echo "<br>date :".$date_start." ".$date_end."<br>";

        if($date_start != "" ){
            $yyyymmdd = substr($date_start,6,4)."/".substr($date_start,3,2)."/".substr($date_start,0,2);
            $date_s =  $yyyymmdd;
        }
    
        if($date_end != "" ){
            $yyyymmdd = substr($date_end,6,4)."/".substr($date_end,3,2)."/".substr($date_end,0,2);
            $date_e =  $yyyymmdd;
        }

        //echo "<br>date :".$date_s." ".$date_e."<br>";

        $p_case = $_POST["pcase"];

        if($p_case > '0'){
            $sub_q = ' and problem_case = '.$p_case.' ';
        }
            
        $sql_of = "SELECT a.subtype_offender, count(a.subtype_offender) as suboff 
        FROM add_details a , case_inputs c , prov_geo
        where c.activecase = 'yes' and c.case_id = a.case_id  and prov_geo.code = c.prov_id
        and date(c.created_at) >= '".date($date_s)."' and date(c.created_at) <= '".date($date_e)."'
        $pr_q
        group by a.subtype_offender";

        //echo $sql_of;

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
        FROM case_inputs c ,r_problem_case , prov_geo
        WHERE c.activecase = 'yes' and r_problem_case.code = c.problem_case and prov_geo.code = c.prov_id
        $pr_q
        and date(c.created_at) >= '".date($date_s)."' and date(c.created_at) <= '".date($date_e)."'
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
        FROM add_details a , case_inputs c, prov_geo
        where c.activecase = 'yes' and c.case_id = a.case_id and prov_geo.code = c.prov_id
        $pr_q
        and date(c.created_at) >= '".date($date_s)."' and date(c.created_at) <= '".date($date_e)."'";
        
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
        FROM case_inputs c, r_group_code r , prov_geo
        WHERE c.activecase = 'yes' and  c.group_code = r.code and prov_geo.code = c.prov_id
        $pr_q and c.problem_case = '4'
        and date(c.created_at) >= '".date($date_s)."' and date(c.created_at) <= '".date($date_e)."'
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
        FROM case_inputs c ,r_sub_problem r , prov_geo
        WHERE c.activecase = 'yes' and r.code = c.sub_problem and prov_geo.code = c.prov_id
        and c.problem_case = '1' 
        $pr_q
        and date(c.created_at) >= '".date($date_s)."' and date(c.created_at) <= '".date($date_e)."'
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

        $sql_c5 = "SELECT 
        sum(CASE WHEN status > '0' THEN 1 ELSE 0 END) as casestep1,
        sum(CASE WHEN status > '1' and status != '99' and status != '98' THEN 1 ELSE 0 END) as casestep2,
        sum(CASE WHEN status > '2' and status != '99' and status != '98' THEN 1 ELSE 0 END) as casestep3,
        sum(CASE WHEN status > '3' and status != '99' and status != '98' THEN 1 ELSE 0 END) as casestep4,
        sum(CASE WHEN status > '4' and status != '99' and status != '98' THEN 1 ELSE 0 END) as casestep5,
        sum(CASE WHEN status > '5' and status != '99' and status != '98' THEN 1 ELSE 0 END) as casestep6,
        sum(CASE WHEN status = '98' THEN 1 ELSE 0 END) as casestep98,
        sum(CASE WHEN status = '99' THEN 1 ELSE 0 END) as casestep99
        FROM case_inputs c , prov_geo
        where c.activecase = 'yes' and  prov_geo.code = c.prov_id and date(c.created_at) >= '".date($date_s)."' and date(c.created_at) <= '".date($date_e)."'
		$pr_q ";

        //echo $sql_c5;


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
            $casestep98 = $rowc5[casestep98];
            
        }
    ?>

    <?php
        $sql1 = "SELECT c.status,count(c.id) as n_status 
        FROM case_inputs c , prov_geo
        WHERE c.activecase = 'yes' and prov_geo.code = c.prov_id and date(c.created_at) >= '".date($date_s)."' and date(c.created_at) <= '".date($date_e)."'
        $pr_q
        group by c.status";
        
        //echo "$sql1";
        $result1 = mysqli_query($conn, $sql1); 
        $i = 0;
        $sumall = 0;
        while($row1 = $result1->fetch_assoc()) {
            $i++;
            $sumall = $sumall + $row1["n_status"];

            if($row1["status"] == "1" ){
                $status_code_1 = $row1["n_status"]; 

            }else if($row1["status"] == "2"){
                $status_code_2 = $row1["n_status"]; 

            }else if($row1["status"] == "3"){
                $status_code_3 = $row1["n_status"]; 

            }else if($row1["status"] == "4"){
                $status_code_4 = $row1["n_status"]; 

            }else if($row1["status"] == "5"){
                $status_code_5 = $row1["n_status"]; 

            }else if($row1["status"] == "6"){
                $status_code_6 = $row1["n_status"];

            }else if($row1["status"] == "98"){
                $status_code_98 = $row1["n_status"]; 

            }else if($row1["status"] == "99"){
                $status_code_99 = $row1["n_status"]; 
            }

            /*
            for($j=1;$j<=7;$j++){
                if($row1["status"] == $j){
                    $status[$j] = $row1["status"];
                    $n_status[$j] = $row1["n_status"];
                }
            }*/
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

        $sql = "SELECT count(*) as count_pr, code, prov_geo.prov_name_en, prov_geo.name as prname from case_inputs c left join prov_geo on prov_id = code where c.activecase = 'yes' and date(c.created_at) >= '".date($date_s)."' and date(c.created_at) <= '".date($date_e)."'
        $pr_q group by code";
        $result1 = mysqli_query($conn, $sql); 
        
        $i = 0;

        while($row = $result1->fetch_assoc()) {
            $i++;

            $count_pr[$i] = $row["count_pr"];
            $prov_name[$i] = $row["prname"];

            $i_nameen[$i] = substr($row['prov_name_en'],3);
            
            $case_pr_loop = $i;
        }

        

        if($nhso != 0){

            if($pr != 0){
                $strSQL = "SELECT count(*) as total , c.amphur_id as DISTRICTID, a.AMPHUR_NAME as area_name from case_inputs c left join prov_geo on c.prov_id = code left join amphurs a on c.amphur_id = a.AMPHUR_CODE where c.activecase = 'yes' and  date(c.created_at) >= '".date($date_s)."' and date(c.created_at) <= '".date($date_e)."' $pr_q group by c.amphur_id, a.AMPHUR_NAME order by c.amphur_id asc; ";
            }else{

                $strSQL = " SELECT count(*) AS total, c.prov_id AS province , p.nhso , p.name as area_name FROM case_inputs c inner join prov_geo p ON p.code = c.prov_id WHERE c.activecase = 'yes' and date(c.created_at) >= '".date($date_s)."' and date(c.created_at) <= '".date($date_e)."' $pr_q  GROUP BY c.prov_id;";
            }
        }else{
            if($pr != 0){

                $strSQL = "SELECT count(*) as total , c.amphur_id as DISTRICTID, a.AMPHUR_NAME as area_name from case_inputs c left join prov_geo on c.prov_id = code left join amphurs a on c.amphur_id = a.AMPHUR_CODE where c.activecase = 'yes' and date(c.created_at) >= '".date($date_s)."' and date(c.created_at) <= '".date($date_e)."' $pr_q group by c.amphur_id, a.AMPHUR_NAME order by c.amphur_id asc; ";

            }else{

                $strSQL = "SELECT count(*) as total, nhso AS area_name from case_inputs c left join prov_geo on prov_id = code where c.activecase = 'yes' and date(c.created_at) >= '".date($date_s)."' and date(c.created_at) <= '".date($date_e)."' group by nhso order by total desc ;";

            }
        }

        //echo $strSQL;

        $result1 = mysqli_query($conn, $strSQL); 
        
        $i = 0;

        while($row = $result1->fetch_assoc()) {
            $i++;

            $area_total[$i] = $row["total"];

            if($nhso != 0){
                if($pr != 0){
                    $area_name[$i] = $row["area_name"];
                    $txt_area = "อำเภอในจังหวัด".$area_name[$i];
                }else{
                    $area_name[$i] = $row["area_name"];
                    $txt_area = "จังหวัดในเขต ".$area_name[$i];
                }
            }else{
                if($pr != 0){
                    $area_name[$i] = $row["area_name"];
                    $txt_area = "อำเภอในจังหวัด".$area_name[$i];
                }else{
                    $area_name[$i] = "เขต ".$row["area_name"];
                    $txt_area = "เขตสุขภาพ";
                }
            }

            
            $selectarea_loop = $i;
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
                        <a class="dropdown-item active" id="dropdown-layouts" href="dashboard3_new.php">
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

                <div class="dropdown tabtype btn ">
                    <a class="dropdown-toggle textcolor1 p-1" type="button" id="dropdownMenu1" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-table">&nbsp;</i> สรุปข้อมูลภาพรวม
                    </a>
                    <div class="dropdown-menu color-h3 bg-gradient" aria-labelledby="dropdownMenu1">
                        <a class="dropdown-item " id="dropdown-layouts" href="table_new.php">
                            ภาพรวม</a>

                        <div class="dropdown dropright ">
                            <a class="dropdown-item dropdown-toggle custom-dropdown " id="dropdown-layouts" data-toggle="dropdown"
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

        <form name="form_menu" method="post" action="dashboard3_new.php">

            <div class="p-3">

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
                        <input type="submit" class="btn btn_color1" id="submit" name="submit" value="ตกลง">

                    </div>

                    <br>

                    <p class="subtitle ">
                        <strong> ข้อมูล ณ วันที่ (ว/ด/ป) : </strong>
                        <?php echo thai_date_short_number_time(strtotime(date("Y-m-d H:i:s"))); ?>
                    </p>


                </div>
            </div>

        </form>

        <div class="row gap-3 mb-3 justify-content-md-center">
            <div class="col-lg-1 text-center  boxborder1 rounded-3">
                <div class=" row  boxcolor1">
                    <div class="col align-middle p-1 mt-2 mb-2">
                    ทั้งหมด
                    </div>
                </div>
                <div class="row ">
                    <div class="col border-warning align-middle p-3 ">
                        <span><?php echo $sumall; if($sumall ==''){echo '0';}?></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-1 text-center boxborder2 border-secondary rounded-3">
                <div class="  ">
                    <div class=" row   boxcolor2">
                        <div class="col align-middle p-1 mt-2 mb-2 text-white">
                        ปฏิเสธรับเรื่อง
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col border-secondary align-middle p-3 ">
                            <span><?php echo $status_code_99;if($status_code_99 ==''){echo '0';} ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-1 text-center boxborder3  rounded-3">
                <div class="  ">
                    <div class=" row boxcolor3 ">
                        <div class="col align-middle p-1 mt-2 mb-2">
                        ยังไม่ได้รับเรื่อง
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col  align-middle p-3 ">
                            <span><?php echo $status_code_1;if($status_code_1 ==''){echo '0';} ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 text-center boxborder4 rounded-3">
                <div class="  ">
                    <div class=" row boxcolor4">
                        <div class="col align-middle p-2">
                            รับเรื่องแล้ว
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-5 boxborder_end4  align-middle p-2">
                            <p class=" mb-0">รอการบันทึกข้อมูลเพิ่มเติม</p>
                            <p class=" mb-0">
                                <span><?php echo $status_code_2;if($status_code_2 ==''){echo '0';} ?></span>
                            </p>
                        </div>
                        <div class="col-7   align-middle p-2">
                            <p class=" mb-0">บันทึกข้อมูลแล้วรอดำเนินการช่วยเหลือ</p>
                            <p class=" mb-0">
                                <span><?php echo $status_code_3;if($status_code_3 ==''){echo '0';} ?></span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 text-center boxborder5 rounded-3">
                <div class="  ">
                    <div class=" row  boxcolor5 text-white">
                        <div class="col align-middle p-2">
                            ดำเนินการ
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-6 boxborder_end5  align-self-center mx-auto  p-2">
                            <p class=" mb-0">อยู่ระหว่างดำเนินการ</p>
                            <p class=" mb-0">
                                <span><?php echo $status_code_4;if($status_code_4 ==''){echo '0';} ?></span>
                            </p>
                        </div>
                        <div class="col-3 boxborder_end5 align-self-center mx-auto   p-2">
                            <p class=" mb-0">เสร็จสิ้น</p>
                            <p class=" mb-0">
                                <span><?php echo $status_code_5;if($status_code_5 ==''){echo '0';} ?></span>
                            </p>
                        </div>
                        <div class="col-3 align-self-center mx-auto  p-2">
                            <p class=" mb-0">ส่งต่อ</p>
                            <p class=" mb-0">
                                <span><?php echo $status_code_6;if($status_code_6 ==''){echo '0';} ?></span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-1 text-center boxborder6 rounded-3">
                <div class=" row  boxcolor6">
                    <div class="col align-middle p-1 mt-2 mb-2 text-white ">
                        ยุติการดำเนินการ
                    </div>
                </div>
                <div class="row ">
                    <div class="col border-warning align-middle p-3 ">
                        <span><?php echo $status_code_98;if($status_code_98 ==''){echo '0';} ?></span>
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

            <div class="col-12 col-md-6 p-3">
                <div id="chart-map" class="bg-white  text-center p-3 chart-rounded ratio ratio-1x1">

                    <?php

                        if($pr == 0 and $nhso != 0){
                            $map1 = "map_crs/map_region_auto_crs.php?province=$nhso&pr=$pr&ds=$date_start&de=$date_end";

                            echo "<iframe class='responsive-iframe' src='$map1'> </iframe> ";
                        }else if($pr == 0 and $nhso == 0){
                            ?>
                    <div id="chartdiv31" class="bg-white  text-center p-3 chart-rounded">
                        FusionCharts XT will load here!
                    </div>
                    <?php
                        }else{
                            $map1 = "map_crs/map_province_auto_crs.php?province=$pr&nhso=$nhso&ds=$date_start&de=$date_end";
                            echo "<iframe class='responsive-iframe' src='$map1'> </iframe> ";
                        }
                    
                    ?>




                </div>
            </div>

            <div class="col-12 col-md-6 p-3">
                <div id="chart-container-6" class="bg-white  text-center p-3 chart-rounded">
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

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
        integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous">
    </script>

    <script type="text/javascript" src="../public/NewFusionChart/js/fusioncharts.js"></script>
    <script type="text/javascript" src="../public/NewFusionChart/js/themes/fusioncharts.theme.hulk-light.js"></script>

    <script src="https://code.highcharts.com/maps/highmaps.js"></script>
    <script src="https://code.highcharts.com/mapdata/countries/th/th-all.js"></script>
    <script src="https://code.highcharts.com/maps/modules/exporting.js"></script>

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

        setprov(set_nhso, 0);

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
    $('.input-daterange input').datepicker({
        format: 'dd/mm/yyyy'
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
                    "exportEnabled": "1",
                    "labelDisplay": "rotate",
                    "slantLabel": "1"
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
                            echo '"label": "เสร็จสิ้น",';
                            echo '"value": "'.($casestep6/$casestep1*100).'",';
                            echo '},';

                            echo '{';
                            echo '"label": "ยุติการดำเนินการ",';
                            echo '"value": "'.($casestep98/$casestep1*100).'",';
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
                    "exportEnabled": "1",
                    "labelDisplay": "rotate",
                    "slantLabel": "1"

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
                        echo '},';

                        echo '{';
                        echo '"label": "ยุติการดำเนินการ",';
                        echo '"value": "'.$casestep98.'",';
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
                        "exportEnabled": "1",
                        "labelDisplay": "rotate",
                        "slantLabel": "1"

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
                        echo '},';

                        echo '{';
                        echo '"label": "ยุติการดำเนินการ",';
                        echo '"value": "'.$casestep98.'",';
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

    <script>
    function setprov(se, ck1) {

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

                if (ck1 == 0) {
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


    <script>
    var data = [

        <?php
        for($i =1; $i <= $case_pr_loop; $i++){
            echo '{';
            echo '"hc-key" : "th-'.strtolower($i_nameen[$i]).'",';
            echo '"code" : "'.$prov_name[$i].'",';
            echo '"id" : "'.$prov_name[$i].'",';
            echo '"value" : '.$count_pr[$i];

            if($i <> $case_pr_loop){
                echo '},';
            }else{
                echo '}';
            }
        }
    ?>


    ];

    // Create the chart
    const chart31 = Highcharts.mapChart('chartdiv31', {

        chart: {
            map: 'countries/th/th-all',
            backgroundColor: 'transparent',
            height: 650
        },
        title: {
            text: 'การบันทึกข้อมูลการถูกละเมิดสิทธิในระบบ CRS'
        },
        subtitle: {
            text: 'แยกรายจังหวัด',
            style: {
                fontSize: '15px'
            }
        },

        mapNavigation: {
            enabled: true,
            buttonOptions: {
                verticalAlign: 'bottom'
            }
        },

        legend: {
            verticalAlign: 'middle',
            align: 'right',
            layout: 'vertical',

        },


        colorAxis: {
            dataClasses: [{
                from: 0,
                to: 0,
                name: "ไม่มีข้อมูล",
                color: '#ddd',
            }, {
                from: 1,
                to: 2,
                name: "1 - 2 เรื่อง",
                color: '#e046a2',
            }, {
                from: 3,
                to: 10000,
                name: "3 เรื่องขึ้นไป",
                color: '#de0867',
            }]
        },

        series: [{
            data: data,
            tooltip: {
                headerFormat: '',
                pointFormat: '{point.code}: {point.value}'
            },
            states: {
                hover: {
                    color: '#98b2d1'
                }
            },
            dataLabels: {
                //enabled: true,
                format: '{point.code}'
            }
        }]
    });
    </script>

    <script type="text/javascript">
    /*  Chart6 */
    FusionCharts.ready(function() {

        var salesChart = new FusionCharts({
                type: 'bar2d',
                renderAt: 'chart-container-6',
                width: '100%',
                height: '650',
                dataFormat: 'json',
                dataSource: {
                    "chart": {
                        "caption": "การบันทึกข้อมูลการถูกละเมิดสิทธิในระบบ CRS ",
                        "subCaption": "จำแนกตามพื้นที่ <?php echo $txt_area; ?>",
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
                        "numVisiblePlot": "12",
                        "scrollheight": "10",
                        "flatScrollBars": "1",
                        "scrollShowButtons": "1",
                        "scrollColor": "#cccccc",
                        "exportEnabled": "1"
                    },

                    "data": [

                        <?php
                        
                            for($i=1;$i<=$selectarea_loop;$i++){
                                echo "{";
                                echo "'label': '$area_name[$i]',";
                                echo "'value': '$area_total[$i]',";
                                echo "'color': '#de0867'";
                                echo "}";
                                if($i <> $selectarea_loop){
                                    echo ",";
                                }
                            }
                        ?>

                    ]
                }
            })
            .render();
    });
    </script>
</body>

</html>