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

        $last_year = date("Y");
        $last_month = date("M");

        if(date("m")>9){
            $last_year++;
        }

        $years = $_POST["y"];


        if($years == ''){$years = $last_year;}
        
        $sql = "select count(case_id) as count,c.group_code,month(c.created_at) as month,year(c.created_at)
        from case_inputs c 
        where sub_problem = '2' and 
        created_at BETWEEN '".($years-1)."-10-01' and '".$years."-09-30'
        group by year(c.created_at),month(created_at),group_code
        order by year(c.created_at),month(created_at),c.group_code";

        $result1 = mysqli_query($conn, $sql); 
        $row1 = mysqli_num_rows($result1); 
        $i = 0;        
        while($row1 = $result1->fetch_assoc()) {
            $i++;
            $g_code[$i] = $row1[group_code];
            $month[$i] = $row1[month];
            $count[$i] = $row1[count];
            $last_i = $i;
        }

        for($i = 1; $i <=7; $i++){
            $sum[$i] = 0;
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


                <a type="button" class="btn btn-primary btn-rounded align-items-stretch d-flex "
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
                <a class="btn btn-white btn-rounded border " href="mapreport1.php">
                    <span class="icon is-small"><i class="far fa-chart-bar" aria-hidden="true"></i></span>
                    <span>แผนที่</span>
                </a>
                <a class="btn btn-white btn-rounded border  " href="report_c44.php">
                    <span class="icon is-small"><i class="far fa-chart-bar" aria-hidden="true"></i></span>
                    <span>แยกกรณีละเมิดสิทธิ</span>
                </a>
                <a class="btn btn-white btn-rounded border" href="report_c2_new.php">
                    <span class="icon is-small"><i class="far fa-chart-bar" aria-hidden="true"></i></span>
                    <span>รวมทุกกรณี</span>
                </a>
                <a class="btn btn-white btn-rounded border" href="report_c21_new.php">
                    <span class="icon is-small"><i class="far fa-chart-bar" aria-hidden="true"></i></span>
                    <span>กรณี 1 บังคับตรวจเอชไอวี</span>
                </a>
                <a class="btn btn-white btn-rounded border " href="report_c22_new.php">
                    <span class="icon is-small"><i class="far fa-chart-bar" aria-hidden="true"></i></span>
                    <span>กรณี 3 เลือกปฎิบัติในกลุ่มผู้ติดเชื้อ</span>
                </a>
                <a class="btn btn-white btn-rounded border" href="report_c23_new.php">
                    <span class="icon is-small"><i class="far fa-chart-bar" aria-hidden="true"></i></span>
                    <span>กรณี 4 เลือกปฎิบัติในกลุ่มเปราะบาง</span>
                </a>
                <a class="btn btn-primary btn-rounded" href="dashboard8_new.php">
                    <span class="icon is-small"><i class="far fa-chart-bar" aria-hidden="true"></i></span>
                    <span>ข้อมูลกลุ่มเปราะบางรายเดือน</span>
                </a>
                <a class="btn btn-white btn-rounded border" href="dashboard4_new.php">
                    <span class="icon is-small"><i class="far fa-chart-bar" aria-hidden="true"></i></span>
                    <span>สัดส่วนกลุ่มเปราะบาง</span>
                </a>
                <a class="btn btn-white btn-rounded border" href="dashboard9_new.php">
                    <span class="icon is-small"><i class="far fa-chart-bar" aria-hidden="true"></i></span>
                    <span>สัดส่วนกลุ่มเปราะบางเทียบประชากรข้ามชาติ</span>
                </a>
                <a class="btn btn-white btn-rounded border" href="report_c41.php">
                    <span class="icon is-small"><i class="far fa-chart-bar" aria-hidden="true"></i></span>
                    <span>สัดส่วนการละเมิดสิทธิ</span>
                </a>
                <a class="btn btn-white btn-rounded border" href="report_c4.php">
                    <span class="icon is-small"><i class="far fa-chart-bar" aria-hidden="true"></i></span>
                    <span>สัดส่วนประเภทหน่วยงาน</span>
                </a>
                <a class="btn btn-white btn-rounded border" href="report_c43.php">
                    <span class="icon is-small"><i class="far fa-chart-bar" aria-hidden="true"></i></span>
                    <span>สัดส่วนการดำเนินการ</span>
                </a>
                <a class="btn btn-white btn-rounded border" href="report_c42.php">
                    <span class="icon is-small"><i class="far fa-chart-bar" aria-hidden="true"></i></span>
                    <span>สัดส่วนผลการดำเนินการ</span>
                </a>
            </div>

        </div>
        <br>

        <div class="container p-3">

            <form name="form_menu" method="post" action="dashboard8_new.php">

                <div class="row g-3 mb-3 align-items-center">
                    <div class="col-auto">
                        <strong class="col-form-label">เลือกปีงบประมาณ</strong>
                    </div>
                    <div class="col-auto">
                        <div class="select">
                            <select id="y" name="y" class="form-select">
                                <?php
                                for($i = 2019; $i <= $last_year; $i++){
                                    if ($years == $i) { $se =  "selected";}
                                    echo "<option value='$i' $se> ".($i+543)." </option>";
                                    $se = '';
                                }
                            ?>
                            </select>
                        </div>
                    </div>


                    <div class="col-auto ">
                        <input type="submit" class="btn btn-danger" id="submit" name="submit" value="ตกลง">

                    </div>
                </div>

                <p class="subtitle ">
                    <strong> ข้อมูล ณ วันที่ (ด/ว/ป) </strong>

                    <?php echo "  : ",date("m/d/Y")," เวลา : ",date("h:i:sa"); ?>
                </p>



            </form>

            <br>

            <div name="chart" class="">
                <div id="chart-container-b1" class="bg-white mb-3 text-center p-2 chart-rounded">
                    FusionCharts XT will load here!
                </div>


                <div id="table" class="bg-white mb-3 text-center p-2 chart-rounded">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td>กลุ่มเปราะบาง</td>
                                <td>ต.ค.</td>
                                <td>พ.ย.</td>
                                <td>ธ.ค.</td>
                                <td>ม.ค.</td>
                                <td>ก.พ.</td>
                                <td>มี.ค.</td>
                                <td>เม.ย.</td>
                                <td>พ.ค.</td>
                                <td>มิ.ย.</td>
                                <td>ก.ค.</td>
                                <td>ส.ค.</td>
                                <td>ก.ย.</td>
                                
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td class="text-start">กลุ่มหลากหลายทางเพศ</td>
                                <?php

                                    for($i =10; $i <=12; $i++){

                                        $ck = 0;
                                        for($j =1; $j <= $last_i; $j++){

                                            if($i == $month[$j] and $g_code[$j] == 1){
                                                echo '<td style="color: #ef4f91;">'.$count[$j].'</td>';
                                                $ck =1;

                                                $sum[$i] += $count[$j];
                                            }
                                        }
                                        if($ck ==0){
                                            echo "<td></td>";
                                        }
                                        
                                    }

                                    for($i =1; $i <=9; $i++){

                                        $ck = 0;
                                        for($j =1; $j <= $last_i; $j++){

                                            if($i == $month[$j] and $g_code[$j] == 1){
                                                echo '<td style="color: #ef4f91;">'.$count[$j].'</td>';
                                                $ck =1;

                                                $sum[$i] += $count[$j];
                                            }
                                        }
                                        if($ck ==0){
                                            echo "<td></td>";
                                        }
                                        
                                    }
                                ?>
                            </tr>

                            <tr>
                                <td class="text-start">พนักงานบริการ</td>
                                <?php

                                    for($i =10; $i <=12; $i++){

                                        $ck = 0;
                                        for($j =1; $j <= $last_i; $j++){

                                            if($i == $month[$j] and $g_code[$j] == 2){
                                                echo '<td style="color: #673888;">'.$count[$j].'</td>';
                                                $ck =1;

                                                $sum[$i] += $count[$j];
                                            }
                                        }
                                        if($ck ==0){
                                            echo "<td></td>";
                                        }
                                        
                                    }

                                    for($i =1; $i <=9; $i++){

                                        $ck = 0;
                                        for($j =1; $j <= $last_i; $j++){

                                            if($i == $month[$j] and $g_code[$j] == 2){
                                                echo '<td style="color: #673888;">'.$count[$j].'</td>';
                                                $ck =1;

                                                $sum[$i] += $count[$j];
                                            }
                                        }
                                        if($ck ==0){
                                            echo "<td></td>";
                                        }
                                        
                                    }
                                ?>
                            </tr>

                            <tr>
                                <td class="text-start">ผู้ใช้สารเสพติด</td>
                                <?php

                                    for($i =10; $i <=12; $i++){

                                        $ck = 0;
                                        for($j =1; $j <= $last_i; $j++){

                                            if($i == $month[$j] and $g_code[$j] == 3){
                                                echo '<td style="color: #fd8a5e;">'.$count[$j].'</td>';
                                                $ck =1;

                                                $sum[$i] += $count[$j];
                                            }
                                        }
                                        if($ck ==0){
                                            echo "<td></td>";
                                        }
                                        
                                    }

                                    for($i =1; $i <=9; $i++){

                                        $ck = 0;
                                        for($j =1; $j <= $last_i; $j++){

                                            if($i == $month[$j] and $g_code[$j] == 3){
                                                echo '<td style="color: #fd8a5e;">'.$count[$j].'</td>';
                                                $ck =1;

                                                $sum[$i] += $count[$j];
                                            }
                                        }
                                        if($ck ==0){
                                            echo "<td></td>";
                                        }
                                        
                                    }
                                ?>
                            </tr>

                            <tr>
                                <td class="text-start">ประชากรข้ามชาติ</td>
                                <?php

                                    for($i =10; $i <=12; $i++){

                                        $ck = 0;
                                        for($j =1; $j <= $last_i; $j++){

                                            if($i == $month[$j] and $g_code[$j] == 4){
                                                echo '<td style="color: #b7ded2;">'.$count[$j].'</td>';
                                                $ck =1;

                                                $sum[$i] += $count[$j];
                                            }
                                        }
                                        if($ck ==0){
                                            echo "<td></td>";
                                        }
                                        
                                    }

                                    for($i =1; $i <=9; $i++){

                                        $ck = 0;
                                        for($j =1; $j <= $last_i; $j++){

                                            if($i == $month[$j] and $g_code[$j] == 4){
                                                echo '<td style="color: #b7ded2;">'.$count[$j].'</td>';
                                                $ck =1;

                                                $sum[$i] += $count[$j];
                                            }
                                        }
                                        if($ck ==0){
                                            echo "<td></td>";
                                        }
                                        
                                    }
                                ?>
                            </tr>

                            <tr>
                                <td class="text-start">ผู้ถูกคุมขัง</td>
                                <?php

                                    for($i =10; $i <=12; $i++){

                                        $ck = 0;
                                        for($j =1; $j <= $last_i; $j++){

                                            if($i == $month[$j] and $g_code[$j] == 5){
                                                echo '<td style="color: #0084ff;">'.$count[$j].'</td>';
                                                $ck =1;
                                                $sum[$i] += $count[$j];
                                            }
                                        }
                                        if($ck ==0){
                                            echo "<td></td>";
                                        }
                                        
                                    }

                                    for($i =1; $i <=9; $i++){

                                        $ck = 0;
                                        for($j =1; $j <= $last_i; $j++){

                                            if($i == $month[$j] and $g_code[$j] == 5){
                                                echo '<td style="color: #0084ff;">'.$count[$j].'</td>';
                                                $ck =1;

                                                $sum[$i] += $count[$j];
                                            }
                                        }
                                        if($ck ==0){
                                            echo "<td></td>";
                                        }
                                        
                                    }
                                ?>
                            </tr>

                            <tr>
                                <td class="text-start">กลุ่มชาติพันธิ์และชนเผ่า</td>
                                <?php

                                    for($i =10; $i <=12; $i++){

                                        $ck = 0;
                                        for($j =1; $j <= $last_i; $j++){

                                            if($i == $month[$j] and $g_code[$j] == 6){
                                                echo '<td style="color: #00bfaf;">'.$count[$j].'</td>';
                                                $ck =1;

                                                $sum[$i] += $count[$j];
                                            }
                                        }
                                        if($ck ==0){
                                            echo "<td></td>";
                                        }
                                        
                                    }

                                    for($i =1; $i <=9; $i++){

                                        $ck = 0;
                                        for($j =1; $j <= $last_i; $j++){

                                            if($i == $month[$j] and $g_code[$j] == 6){
                                                echo '<td style="color: #00bfaf;">'.$count[$j].'</td>';
                                                $ck =1;

                                                $sum[$i] += $count[$j];
                                            }
                                        }
                                        if($ck ==0){
                                            echo "<td></td>";
                                        }
                                        
                                    }
                                ?>
                            </tr>

                            <tr>
                                <td class="text-start">คนพิการ</td>
                                <?php

                                    for($i =10; $i <=12; $i++){

                                        $ck = 0;
                                        for($j =1; $j <= $last_i; $j++){

                                            if($i == $month[$j] and $g_code[$j] == 7){
                                                echo '<td style="color: #8455d3;">'.$count[$j].'</td>';
                                                $ck =1;

                                                $sum[$i] += $count[$j];
                                            }
                                        }
                                        if($ck ==0){
                                            echo "<td></td>";
                                        }
                                        
                                    }

                                    for($i =1; $i <=9; $i++){

                                        $ck = 0;
                                        for($j =1; $j <= $last_i; $j++){

                                            if($i == $month[$j] and $g_code[$j] == 7){
                                                echo '<td style="color: #8455d3;">'.$count[$j].'</td>';
                                                $ck =1;

                                                $sum[$i] += $count[$j];
                                            }
                                        }
                                        if($ck ==0){
                                            echo "<td></td>";
                                        }
                                        
                                    }
                                ?>
                            </tr>
                            <tr>
                                <td class="text-start ">รวม</td>

                                <?php

                                    for($i =10; $i <=12; $i++){

                                        if($sum[$i] == 0){
                                            $sum[$i] = ''; 
                                        }

                                        echo '<td >'.$sum[$i].'</td>';
                                        
                                    }

                                    for($i =1; $i <=9; $i++){

                                        if($sum[$i] == 0){
                                            $sum[$i] = ''; 
                                        }

                                        echo '<td >'.$sum[$i].'</td>';
                                        
                                    }
                                ?>
                            </tr>

                        </tbody>
                    </table>
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

    <script type="text/javascript">
    FusionCharts.ready(function() {

        var salesChart = new FusionCharts({
                type: 'mscolumn2d',
                renderAt: 'chart-container-b1',
                width: '100%',
                height: '400',
                dataFormat: 'json',
                dataSource: {
                    "chart": {
                        "caption": "สถิติการถูกเลือกปฏิบัติเนื่องมาจากเป็นกลุ่มเปราะบางฯ ปีงบ ",
                        "subCaption": " จำแนกรายเดือน ตามปีงบ <?php echo ($years+543) ?>",
                        "placeValuesInside": "0",
                        "yAxisName": "จำนวนการถูกเลือกปฏิบัติ",
                        "yAxisMinValue": "0",
                        "basefontsize": "14",
                        "captionFontSize": "16",
                        "subcaptionFontSize": "16",
                        "showAxisLines": "1",
                        "axisLineAlpha": "25",
                        /*"numVDivLines": "11",*/
                        "alignCaptionWithCanvas": "0",
                        "showAlternateVGridColor": "1",
                        "numberScaleValue": "0",
                        "legendIconBorderThickness": "0",
                        "theme": "hulk-light",
                        "palettecolors": "#ef4f91,#673888,#fd8a5e,#b7ded2,#0084ff,#00bfaf,#8455d3,#e0e300,#fa3c4c",
                        "exportEnabled": "1"

                    },

                    "categories": [{
                        "category": [
                            {
                                "label": "ต.ค."
                            },
                            {
                                "label": "พ.ย."
                            },
                            {
                                "label": "ธ.ค."
                            },
                            {
                                "label": "ม.ค."
                            },
                            {
                                "label": "ก.พ."
                            },
                            {
                                "label": "มี.ค."
                            },
                            {
                                "label": "เม.ย."
                            },
                            {
                                "label": "พ.ค."
                            },
                            {
                                "label": "มิ.ย."
                            },
                            {
                                "label": "ก.ค."
                            },
                            {
                                "label": "ส.ค."
                            },
                            {
                                "label": "ก.ย."
                            }
                            
                        ]
                    }],
                    "dataset": [

                        {
                            "seriesname": "กลุ่มหลากหลายทางเพศ",
                            "data": [
                                <?php

                                    for ($i = 10;$i <= 12; $i++) {
                                        echo "{";

                                        for($j =1; $j <= $last_i; $j++){

                                            if($i == $month[$j] and $g_code[$j] == 1){
                                                echo '"value": "'.$count[$j].'"';
                                            }
                                        }

                                        echo "},";
                                    }

                                    for ($i = 1;$i <= 9; $i++) {
                                        echo "{";

                                        for($j =1; $j <= $last_i; $j++){

                                            if($i == $month[$j] and $g_code[$j] == 1){
                                                echo '"value": "'.$count[$j].'"';
                                            }
                                        }

                                        if($i == 9){
                                            echo "}";
                                        }else{
                                            echo "},";
                                        }
                                    }

                                ?>
                            ]
                        },
                        {
                            "seriesname": "พนักงานบริการ",
                            "data": [
                                <?php

                                    for ($i = 10;$i <= 12; $i++) {
                                        echo "{";

                                        for($j =1; $j <= $last_i; $j++){

                                            if($i == $month[$j] and $g_code[$j] == 2){
                                                echo '"value": "'.$count[$j].'"';
                                            }
                                        }

                                        echo "},";
                                    }

                                    for ($i = 1;$i <= 9; $i++) {
                                        echo "{";

                                        for($j =1; $j <= $last_i; $j++){

                                            if($i == $month[$j] and $g_code[$j] == 2){
                                                echo '"value": "'.$count[$j].'"';
                                            }
                                        }

                                        if($i == 9){
                                            echo "}";
                                        }else{
                                            echo "},";
                                        }
                                    }

                                    ?>
                            ]
                        },
                        {
                            "seriesname": "ผู้ใช้สารเสพติด",
                            "data": [
                                <?php

                                    for ($i = 10;$i <= 12; $i++) {
                                        echo "{";

                                        for($j =1; $j <= $last_i; $j++){

                                            if($i == $month[$j] and $g_code[$j] == 3){
                                                echo '"value": "'.$count[$j].'"';
                                            }
                                        }

                                        echo "},";
                                    }

                                    for ($i = 1;$i <= 9; $i++) {
                                        echo "{";

                                        for($j =1; $j <= $last_i; $j++){

                                            if($i == $month[$j] and $g_code[$j] == 3){
                                                echo '"value": "'.$count[$j].'"';
                                            }
                                        }

                                        if($i == 9){
                                            echo "}";
                                        }else{
                                            echo "},";
                                        }
                                    }

                                    ?>
                            ]
                        },
                        {
                            "seriesname": "ประชากรข้ามชาติ",
                            "data": [
                                <?php

                                    for ($i = 10;$i <= 12; $i++) {
                                        echo "{";

                                        for($j =1; $j <= $last_i; $j++){

                                            if($i == $month[$j] and $g_code[$j] == 4){
                                                echo '"value": "'.$count[$j].'"';
                                            }
                                        }

                                        echo "},";
                                    }

                                    for ($i = 1;$i <= 9; $i++) {
                                        echo "{";

                                        for($j =1; $j <= $last_i; $j++){

                                            if($i == $month[$j] and $g_code[$j] == 4){
                                                echo '"value": "'.$count[$j].'"';
                                            }
                                        }

                                        if($i == 9){
                                            echo "}";
                                        }else{
                                            echo "},";
                                        }
                                    }

                                    ?>
                            ]
                        },
                        {
                            "seriesname": "ผู้ถูกคุมขัง",
                            "data": [
                                <?php

                                    for ($i = 10;$i <= 12; $i++) {
                                        echo "{";

                                        for($j =1; $j <= $last_i; $j++){

                                            if($i == $month[$j] and $g_code[$j] == 5){
                                                echo '"value": "'.$count[$j].'"';
                                            }
                                        }

                                        echo "},";
                                    }

                                    for ($i = 1;$i <= 9; $i++) {
                                        echo "{";

                                        for($j =1; $j <= $last_i; $j++){

                                            if($i == $month[$j] and $g_code[$j] == 5){
                                                echo '"value": "'.$count[$j].'"';
                                            }
                                        }

                                        if($i == 9){
                                            echo "}";
                                        }else{
                                            echo "},";
                                        }
                                    }

                                    ?>
                            ]
                        },
                        {
                            "seriesname": "กลุ่มชาติพันธิ์และชนเผ่า",
                            "data": [
                                <?php

                                for ($i = 10;$i <= 12; $i++) {
                                    echo "{";

                                    for($j =1; $j <= $last_i; $j++){

                                        if($i == $month[$j] and $g_code[$j] == 6){
                                            echo '"value": "'.$count[$j].'"';
                                        }
                                    }

                                    echo "},";
                                }

                                for ($i = 1;$i <= 9; $i++) {
                                    echo "{";

                                    for($j =1; $j <= $last_i; $j++){

                                        if($i == $month[$j] and $g_code[$j] == 6){
                                            echo '"value": "'.$count[$j].'"';
                                        }

                                    }

                            
                                    if($i == 9){
                                        echo "}";
                                    }else{
                                        echo "},";
                                    }
                                }

                                ?>
                            ]
                        },
                        {
                            "seriesname": "คนพิการ",
                            "data": [
                                <?php

                                for ($i = 10;$i <= 12; $i++) {
                                    echo "{";

                                    for($j =1; $j <= $last_i; $j++){

                                        if($i == $month[$j] and $g_code[$j] == 7){
                                            echo '"value": "'.$count[$j].'"';
                                        }
                                    }

                                    echo "},";
                                }

                                for ($i = 1;$i <= 9; $i++) {
                                    echo "{";

                                    for($j =1; $j <= $last_i; $j++){

                                        if($i == $month[$j] and $g_code[$j] == 7){
                                            echo '"value": "'.$count[$j].'"';
                                        }

                                    }

                            
                                    if($i == 9){
                                        echo "}";
                                    }else{
                                        echo "},";
                                    }
                                }

                                ?>
                            ]
                        }

                        
                        
                        
                    ]

                }
            })
            .render();
    });
    </script>
</body>

</html>