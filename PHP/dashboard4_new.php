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
        
        require("phpsqli_dbinfo.php");

        // Change character set to utf8
        mysqli_set_charset($conn,"utf8");

        $last_year = date("Y");
        $last_month = date("M");

        if(date("m")>9){
            $last_year++;
        }

        $years = $_POST["y"];


        if($years == ''){$years = $last_year;}

        
        $sql = "select group_code, r_group_code.name, count(group_code) as count
        from case_inputs
        left join r_group_code
        on r_group_code.code = case_inputs.group_code
        where 
        created_at BETWEEN '".($years-1)."-10-01' and '".$years."-09-30'
        GROUP BY group_code";


        $result1 = mysqli_query($conn, $sql); 
        $row1 = mysqli_num_rows($result1); 
        $i = 0;        
        while($row1 = $result1->fetch_assoc()) {
            $i++;
            $g_code[$i] = $row1[group_code];
            $name[$i] = $row1[name  ];
            $count[$i] = $row1[count];
            $last_i = $i;
        }

        $sql2 = "select group_code, r_group_code.name, count(group_code) as count, case_inputs.sex
        from case_inputs
        left join r_group_code
        on r_group_code.code = case_inputs.group_code
        where group_code <> '' and group_code = '1'
        and created_at BETWEEN '".($years-1)."-10-01' and '".$years."-09-30'
        GROUP BY group_code, case_inputs.sex";

        $result2 = mysqli_query($conn, $sql2); 
        $row2 = mysqli_num_rows($result2); 
        $i = 0;        
        while($row2 = $result2->fetch_assoc()) {
            $i++;
            $ch2_sex[$i] = $row2[sex];
            $ch2_count[$i] = $row2[count];
            $last_i2 = $i;
        }

        for($i = 1; $i <=7; $i++){
            $sum = 0;
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

                <a type="button" class="btn btn-primary btn-rounded align-items-stretch d-flex"
                    href="report_c2_new.php">
                    <div class="text text-right ">
                        <h6><i class="fa fa-table  " aria-hidden="true"></i> ตารางสรุปการละเมิดสิทธิ</h6>
                    </div>
                </a>

                <a type="button" class="btn btn-white btn-rounded   align-items-stretch d-flex border"
                    href="report_performance_new.php">
                    <div class="text text-right">
                        <h6><i class="fa fa-table  " aria-hidden="true"></i> ระยะเวลาการดำเนินการ</h6>
                    </div>
                </a>

            </div>
        </div>

        <div class="text-center ">

            <div class="btn-group flex-wrap">
                <a class="btn btn-white btn-rounded border " href="mapreport1.php">
                    <span class="icon is-small"><i class="far fa-map" aria-hidden="true"></i></span>
                    <span>แผนที่</span>
                </a>
                <a class="btn btn-white btn-rounded border  " href="report_c44.php">
                    <span class="icon is-small"><i class="fa fa-table" aria-hidden="true"></i></span>
                    <span>แยกกรณีละเมิดสิทธิ</span>
                </a>
                <a class="btn btn-white btn-rounded border" href="report_c2_new.php">
                    <span class="icon is-small"><i class="fa fa-table" aria-hidden="true"></i></span>
                    <span>รวมทุกกรณี</span>
                </a>
                <a class="btn btn-white btn-rounded border  " href="report_c21_new.php">
                    <span class="icon is-small"><i class="fa fa-table" aria-hidden="true"></i></span>
                    <span>กรณี 1 บังคับตรวจเอชไอวี</span>
                </a>
                <a class="btn btn-white btn-rounded border " href="report_c22_new.php">
                    <span class="icon is-small"><i class="fa fa-table" aria-hidden="true"></i></span>
                    <span>กรณี 3 เลือกปฎิบัติในกลุ่มผู้ติดเชื้อ</span>
                </a>
                <a class="btn btn-white btn-rounded border" href="report_c23_new.php">
                    <span class="icon is-small"><i class="fa fa-table" aria-hidden="true"></i></span>
                    <span>กรณี 4 เลือกปฎิบัติในกลุ่มเปราะบาง</span>
                </a>
                <a class="btn btn-white btn-rounded border" href="dashboard8_new.php">
                    <span class="icon is-small"><i class="fa fa-table" aria-hidden="true"></i></span>
                    <span>ข้อมูลกลุ่มเปราะบางรายเดือน</span>
                </a>
                <a class="btn btn-primary btn-rounded" href="dashboard4_new.php">
                    <span class="icon is-small"><i class="fa fa-table" aria-hidden="true"></i></span>
                    <span>สัดส่วนกลุ่มเปราะบาง</span>
                </a>
                <a class="btn btn-white btn-rounded border" href="dashboard9_new.php">
                    <span class="icon is-small"><i class="fa fa-table" aria-hidden="true"></i></span>
                    <span>สัดส่วนกลุ่มเปราะบางเทียบประชากรข้ามชาติ</span>
                </a>
                <a class="btn btn-white btn-rounded border" href="report_c41.php">
                    <span class="icon is-small"><i class="fa fa-table" aria-hidden="true"></i></span>
                    <span>สัดส่วนการละเมิดสิทธิ</span>
                </a>
                <a class="btn btn-white btn-rounded border" href="report_c4.php">
                    <span class="icon is-small"><i class="fa fa-table" aria-hidden="true"></i></span>
                    <span>สัดส่วนประเภทหน่วยงาน</span>
                </a>
                <a class="btn btn-white btn-rounded border" href="report_c43.php">
                    <span class="icon is-small"><i class="fa fa-table" aria-hidden="true"></i></span>
                    <span>สัดส่วนการดำเนินการ</span>
                </a>
                <a class="btn btn-white btn-rounded border" href="report_c42.php">
                    <span class="icon is-small"><i class="fa fa-table" aria-hidden="true"></i></span>
                    <span>สัดส่วนผลการดำเนินการ</span>
                </a>
            </div>

        </div>

        <div class="container p-3">

            <div class="text-center p-3">
                <p class="h5">สรุปข้อมูลการร้องเรียนในระบบ CRS ข้อมูลในระบบ สัดส่วนกลุ่มเปราะบาง</p>
            </div>

            <form name="form_menu" method="post" action="dashboard4_new.php">

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

            <div class="row text-right p-2">



                <div name="chart" class="">
                    <div id="chart-container-b1" class="bg-white mb-3  text-center p-2 chart-rounded">
                        FusionCharts XT will load here!
                    </div>

                    <div id="table" class="bg-white p-3 mb-3 text-center chart-rounded">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td>กลุ่มเปราะบาง</td>
                                    <td>จำนวน (เรื่อง)</td>
                                </tr>
                            </thead>
                            <tbody>
                            <tr>
                                    <td class="text-start">กลุ่มหลากหลายทางเพศ</td>
                                    <?php
                                    
                                    $ck = 0;

                                    for($j =1; $j <= $last_i; $j++){

                                        if( $g_code[$j] == 1){
                                            echo '<td style="color: #df4591;">'.$count[$j].'</td>';
                                            $ck = 1;

                                            $sum += $count[$j];
                                        }
                                    }
                                    if($ck == 0){
                                        echo '<td >0</td>';
                                    }

                                    ?>
                                </tr>
                                <tr>
                                    <td class="text-start">&nbsp;&nbsp;&nbsp;- ชาย (ชายมีเพศสัมพันธ์กับชาย)</td>
                                    <?php
                                     $ck = 0;
                                        for($j =1; $j <= 3; $j++){

                                            if( $ch2_sex[$j] == 1){
                                                echo '<td style="color: #8455d3;">'.$ch2_count[$j].'</td>';
                                                $ck = 1;
                                            }
                                        }
                                        if($ck == 0){
                                            echo '<td >0</td>';
                                        }
                                    ?>
                                </tr>
                                <tr>
                                    <td class="text-start">&nbsp;&nbsp;&nbsp;- หญิง</td>
                                    <?php
                                     $ck = 0;
                                        for($j =1; $j <= 3; $j++){

                                            if( $ch2_sex[$j] == 2){
                                                echo '<td style="color: #F8DF8B;">'.$ch2_count[$j].'</td>';
                                                $ck = 1;
                                            }
                                        }
                                        if($ck == 0){
                                            echo '<td >0</td>';
                                        }
                                    ?>
                                </tr>
                                <tr>
                                    <td class="text-start">&nbsp;&nbsp;&nbsp;- สาวประเภทสอง</td>
                                    <?php
                                     $ck = 0;
                                        for($j =1; $j <= 3; $j++){

                                            if( $ch2_sex[$j] == 3){
                                                echo '<td style="color: #B85C38;">'.$ch2_count[$j].'</td>';
                                                $ck = 1;
                                            }
                                        }
                                        if($ck == 0){
                                            echo '<td >0</td>';
                                        }
                                    ?>
                                </tr>
                                <tr>
                                    <td class="text-start">พนักงานบริการ</td>
                                    <?php

                                        $ck = 0;

                                        for($j =1; $j <= $last_i; $j++){

                                            if( $g_code[$j] == 2){
                                                echo '<td style="color: #df4591;">'.$count[$j].'</td>';
                                                $ck = 1;

                                                $sum += $count[$j];
                                            }
                                        }

                                        if($ck == 0){
                                            echo '<td >0</td>';
                                        }

                                        ?>
                                </tr>
                                <tr>
                                    <td class="text-start">ผู้ใช้สารเสพติด</td>
                                    <?php

                                        $ck = 0;

                                        for($j =1; $j <= $last_i; $j++){

                                            if( $g_code[$j] == 3){
                                                echo '<td style="color: #df4591;">'.$count[$j].'</td>';
                                                $ck = 1;

                                                $sum += $count[$j];
                                            }
                                        }

                                        if($ck == 0){
                                            echo '<td >0</td>';
                                        }

                                        ?>
                                </tr>
                                <tr>
                                    <td class="text-start">ประชากรข้ามชาติ</td>
                                    <?php

                                        $ck = 0;

                                        for($j =1; $j <= $last_i; $j++){

                                            if( $g_code[$j] == 4){
                                                echo '<td style="color: #df4591;">'.$count[$j].'</td>';
                                                $ck = 1;

                                                $sum += $count[$j];
                                            }
                                        }

                                        if($ck == 0){
                                            echo '<td >0</td>';
                                        }

                                        ?>
                                </tr>
                                <tr>
                                    <td class="text-start">ผู้ถูกคุมขัง</td>
                                    <?php

                                        $ck = 0;

                                        for($j =1; $j <= $last_i; $j++){

                                            if( $g_code[$j] == 5){
                                                echo '<td style="color: #df4591;">'.$count[$j].'</td>';
                                                $ck = 1;

                                                $sum += $count[$j];
                                            }
                                        }

                                        if($ck == 0){
                                            echo '<td >0</td>';
                                        }

                                        ?>
                                </tr>
                                <tr>
                                    <td class="text-start">กลุ่มชาติพันธิ์และชนเผ่า</td>
                                    <?php

                                        $ck = 0;

                                        for($j =1; $j <= $last_i; $j++){

                                            if( $g_code[$j] == 6){
                                                echo '<td style="color: #df4591;">'.$count[$j].'</td>';
                                                $ck = 1;

                                                $sum += $count[$j];
                                            }
                                        }

                                        if($ck == 0){
                                            echo '<td >0</td>';
                                        }

                                        ?>
                                </tr>
                                <tr>
                                    <td class="text-start">คนพิการ</td>
                                    <?php

                                        $ck = 0;

                                        for($j =1; $j <= $last_i; $j++){

                                            if( $g_code[$j] == 7){
                                                echo '<td style="color: #df4591;">'.$count[$j].'</td>';
                                                $ck = 1;

                                                $sum += $count[$j];
                                            }
                                        }

                                        if($ck == 0){
                                            echo '<td >0</td>';
                                        }

                                        ?>
                                </tr>
                                
                                <tr>
                                    <td>รวม</td>
                                    <td><?php echo $sum; ?></td>
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
        <script type="text/javascript" src="../public/NewFusionChart/js/themes/fusioncharts.theme.hulk-light.js">
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
        $('.input-daterange input').each(function() {

            $(this).datepicker('');
            //$('#date_end').datepicker("setDate", new Date());
        }).on('changeDate', function(e) {
            //load_case()
        });
        </script>

        <script type="text/javascript">
        /*  Tab 2 Chart */

        FusionCharts.ready(function() {

            var salesChart = new FusionCharts({
                    type: 'stackedcolumn2d',
                    renderAt: 'chart-container-b1',
                    width: '100%',
                    height: '400',
                    dataFormat: 'json',
                    dataSource: {
                        "chart": {
                            "caption": "สัดส่วนการรายงานข้อร้องเรียนการถูกเลือกปฏิบัติเนื่องมาจากเป็นกลุ่มเปราะบาง",
                            "subCaption": "จำแนกตามปีงบ <?php echo ($years+543) ?>",
                            "placeValuesInside": "0",
                            "yAxisName": "จำนวน (เรื่อง)",
                            "basefontsize": "14",
                            "captionFontSize": "16",
                            "subcaptionFontSize": "16",
                            "showAxisLines": "1",
                            "axisLineAlpha": "25",
                            "alignCaptionWithCanvas": "0",
                            "showAlternateVGridColor": "1",
                            "numberScaleValue": "0",
                            "theme": "hulk-light",
                            "palettecolors": "#8455d3,#F8DF8B,#B85C38,#df4591,#31112C,#32E0C4",
                            "exportEnabled": "1"

                        },

                        "categories": [{
                            "category": [
                            {
                                "label": "กลุ่มหลากหลายทางเพศ"
                            },{
                                "label": "พนักงานบริการ"
                            }, {
                                "label": "ผู้ใช้สารเสพติด"
                            }, {
                                "label": "ประชากรข้ามชาติ"
                            }, {
                                "label": "ผู้ถูกคุมขัง"
                            }, {
                                "label": "กลุ่มชาติพันธิ์และชนเผ่า"
                            }, {
                                "label": "คนพิการ"
                            }]
                        }],

                        "dataset": [

                        {
                            "seriesname": "ชายมีเพศสัมพันธ์กับชาย",
                            "data": [
                                <?php
                                    echo '{';
                                    for($j =1; $j <= $last_i; $j++){

                                    
                                        if( $ch2_sex[$j] == 1){
                                            echo '"value": "'.$ch2_count[$j].'"';
                                        }
                                        
                                    }
                                    echo '},';

                            ?>
                                {
                                    "value": ""
                                }, {
                                    "value": ""
                                },{
                                    "value": ""
                                }
                            ]
                        }, {
                            "seriesname": "หญิง",
                            "data": [
                                <?php
                                    echo '{';
                                    for($j =1; $j <= $last_i; $j++){

                                    
                                        if( $ch2_sex[$j] == 2){
                                            echo '"value": "'.$ch2_count[$j].'"';
                                        }
                                        
                                    }
                                    echo '},';

                                ?> {
                                    "value": ""
                                },{
                                    "value": ""
                                }, {
                                    "value": ""
                                }
                            ]
                        }, {
                            "seriesname": "สาวประเภทสอง",
                            "data": [
                                <?php
                                    echo '{';
                                    for($j =1; $j <= $last_i; $j++){

                                    
                                        if( $ch2_sex[$j] == 3){
                                            echo '"value": "'.$ch2_count[$j].'"';
                                        }
                                        
                                    }
                                    echo '},';

                                ?>{
                                    "value": ""
                                },

                                {
                                    "value": ""
                                },
                                {
                                    "value": ""
                                }
                            ]
                        }, {
                            "seriesname": "กลุ่มเปราะบาง",
                            "data": [
                                {
                                    "value": ""
                                },
                                <?php
                                    echo '{';
                                    for($j =1; $j <= $last_i; $j++){

                                    
                                        if( $g_code[$j] == 2){
                                            echo '"value": "'.$count[$j].'"';
                                        }
                                        
                                    }
                                    echo '},';

                                ?> 
                                <?php
                                    echo '{';
                                    for($j =1; $j <= $last_i; $j++){

                                    
                                        if( $g_code[$j] == 3){
                                            echo '"value": "'.$count[$j].'"';
                                        }
                                        
                                    }
                                    echo '},';

                                ?>

                                <?php
                                    echo '{';
                                    for($j =1; $j <= $last_i; $j++){

                                    
                                        if( $g_code[$j] == 4){
                                            echo '"value": "'.$count[$j].'"';
                                        }
                                        
                                    }
                                    echo '},';

                                ?>  

                                <?php
                                    echo '{';
                                    for($j =1; $j <= $last_i; $j++){

                                    
                                        if( $g_code[$j] == 5){
                                            echo '"value": "'.$count[$j].'"';
                                        }
                                        
                                    }
                                    echo '},';

                                ?> 
                                <?php
                                    echo '{';
                                    for($j =1; $j <= $last_i; $j++){

                                    
                                        if( $g_code[$j] == 6){
                                            echo '"value": "'.$count[$j].'"';
                                        }
                                        
                                    }
                                    echo '},';

                                ?> 
                                <?php
                                    echo '{';
                                    for($j =1; $j <= $last_i; $j++){

                                    
                                        if( $g_code[$j] == 7){
                                            echo '"value": "'.$count[$j].'"';
                                        }
                                        
                                    }
                                    echo '}';

                                ?> 

                                
                            ]
                        }]

                    }
                })
                .render();
        });
        </script>
</body>

</html>