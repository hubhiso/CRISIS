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

        $years = $_GET["y"];

        if($years == ''){$years = $last_year;}

        $list_pb = array("บังคับตรวจเอชไอวี","เปิดเผยสถานะการติดเชื้อเอชไอวี","ถูกกีดกันหรือถูกเลือกปฏิบัติเนื่องมาจาการติดเชื้อเอชไอวี","ถูกกีดกันหรือถูกเลือกปฏิบัติเนื่องมาจากเป็นกลุ่มเปราะบาง","อื่นๆ ที่เกี่ยวข้องกับ HIV","อื่นๆ");


        $sql = "select year(created_at) as y ,month(created_at) as m,count(*) as count
        from case_inputs
        
        group by year(created_at), month(created_at)";

        $result1 = mysqli_query($conn, $sql); 
        $row1 = mysqli_num_rows($result1); 
        $i = 0;        
        while($row1 = $result1->fetch_assoc()) {
            $i++;
            $y[$i] = $row1[y];
            $m[$i] = $row1[m];
            $count[$i] = $row1[count];
            $last_i += $i;
        }

        $sql2 = "select month(created_at) as month, 
        sum(case when problem_case = 1 THEN 1 ELSE 0 END) as case1, 
        sum(case when problem_case = 2 THEN 1 ELSE 0 END) as case2, 
        sum(case when problem_case = 3 THEN 1 ELSE 0 END) as case3, 
        sum(case when problem_case = 4 THEN 1 ELSE 0 END) as case4, 
        sum(case when problem_case = 5 THEN 1 ELSE 0 END) as case5, 
        sum(case when problem_case = 6 THEN 1 ELSE 0 END) as case6 
        from case_inputs 
        where created_at BETWEEN '".($years-1)."-10-01' and '".$years."-09-30' 
        group by month";

        
        $result2 = mysqli_query($conn, $sql2); 
        $row2 = mysqli_num_rows($result2); 
        $i = 0;        
        while($row2 = $result2->fetch_assoc()) {
            $i++;
            $ch2_month[$i] = $row2[month];
            $case1[$i] = $row2[case1];
            $case2[$i] = $row2[case2];
            $case3[$i] = $row2[case3];
            $case4[$i] = $row2[case4];
            $case5[$i] = $row2[case5];
            $case6[$i] = $row2[case6];
            $last_i2 += $i;
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
                <a class="btn btn-white  btn-rounded border" href="dashboard3_new.php">
                    <span class="icon is-small"><i class="far fa-chart-bar" aria-hidden="true"></i></span>
                    <span>สถานการณ์การละเมิดสิทธิ</span>
                </a>
                <a class="btn btn-white btn-rounded border" href="dashboard5_new.php">
                    <span class="icon is-small"><i class="far fa-chart-bar" aria-hidden="true"></i></span>
                    <span>สถานการณ์รายปี</span>
                </a>
                <a class="btn btn-primary btn-white btn-rounded border" href="dashboard6_new.php">
                    <span class="icon is-small"><i class="far fa-chart-bar" aria-hidden="true"></i></span>
                    <span>สถานการณ์รายเดือน</span>
                </a>
                <a class="btn btn-white btn-rounded border" href="dashboard7_new.php">
                    <span class="icon is-small"><i class="far fa-chart-bar" aria-hidden="true"></i></span>
                    <span>สถานการณ์รายจังหวัด</span>
                </a>
                <a class="btn btn-white  btn-rounded border" href="dashboard1_new.php">
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

        <div class="container p-3">

            <p class="subtitle ">
                <strong> ข้อมูล ณ วันที่ (ด/ว/ป) </strong>

                <?php echo "  : ",date("m/d/Y")," เวลา : ",date("h:i:sa"); ?>
            </p>

            <br>

            <div name="chart" class="">
                <div id="chart-container-b1" class="bg-white mb-3 text-center p-2 chart-rounded">
                    FusionCharts XT will load here!
                </div>

                <div class="row g-3 mb-3 align-items-center">
                    <div class="col-auto">
                        <strong class="col-form-label">ปีงบประมาณ</strong>
                    </div>
                    <div class="col-auto">
                        <div class="select">
                            <select id="years" name="years" class="form-select"
                                onChange="location.href='dashboard6_new.php?y='+this.value;">
                                <?php
                                for($i = $y[1]; $i <= $last_year; $i++){
                                    if ($years == $i) { $se =  "selected";}
                                    echo "<option value='$i' $se> ".($i+543)." </option>";
                                    $se = '';
                                }
                            ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div id="chart-container-c2" class="bg-white mb-3 text-center p-2 chart-rounded">
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
    <script type="text/javascript" src="../public/NewFusionChart/js/themes/fusioncharts.theme.fint.js"></script>


    <script type="text/javascript">
    FusionCharts.ready(function() {

        var salesChart = new FusionCharts({
                type: 'msline',
                renderAt: 'chart-container-b1',
                width: '100%',
                height: '400',
                dataFormat: 'json',
                dataSource: {
                    "chart": {
                        "caption": "การบันทึกข้อมูลการถูกละเมิดสิทธิในระบบ CRS ตั้งแต่เปิดใช้ระบบ ",
                        "subCaption": "เปรียบเทียบตามปี จำแนกรายเดือน",
                        "yAxisName": "จำนวนการถูกละเมิดสิทธิ",
                        "yAxisMinValue": "0",
                        "basefontsize": "14",
                        "captionFontSize": "16",
                        "subcaptionFontSize": "16",

                        "showhovereffect": "1",
                        "showValues": "0",
                        "numbersuffix": "",
                        "drawcrossline": "1",

                        "theme": "hulk-light",
                        /*"palettecolors": "#8455d3,#df4591,#c41cac,#b13825,#f8b4cd,#F8DF8B,#B85C38,#334756,#31112C,#32E0C4",*/
                        "palettecolors": "#8455d3,#F8DF8B,#B85C38,#df4591,#31112C,#32E0C4",
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

                        <?php
                            for($iy = $y[1]; $iy <= $last_year; $iy++){

                                echo '{';
                                echo '"seriesname": "ปีงบ '.($iy+543).'",';
                                echo '"data" : [';

                                for ($i = 10;$i <= 12; $i++) {
                                    echo "{";

                                    $ck1 = 0;  
                                    for($ck = 1; $ck <= $last_i; $ck++){
                                        if(($iy-1) == $y[$ck] and $i == $m[$ck]){
                                            echo '"value": "'.$count[$ck].'"';
                                            $ck1 = 1;
                                        }
                                        
                                    }
                                    if($ck1 == 0){
                                        echo '"value": "0"';
                                    }

                                    echo "},";
                                    
                                }

                                for ($i = 1;$i <= 9; $i++) {
                                    echo "{";

                                    $ck1 = 0;  
                                    for($ck = 1; $ck <= $last_i; $ck++){
                                        if($iy == $y[$ck] and $i == $m[$ck]){
                                            echo '"value": "'.$count[$ck].'"';
                                            $ck1 = 1;
                                        }
                                        
                                    }
                                    if($ck1 == 0){
                                        echo '"value": "0"';
                                    }


                                    if($i == 9){
                                        echo "}]";
                                    }else{
                                        echo "},";
                                    }
                                }

                                if($iy == $last_year){
                                    echo "}";
                                }else{
                                    echo "},";
                                }
                            }

                        ?>
                    ]

                }
            })
            .render();
    });
    </script>

    <script type="text/javascript">
    FusionCharts.ready(function() {

        var salesChart = new FusionCharts({
                type: 'msline',
                renderAt: 'chart-container-c2',
                width: '100%',
                height: '400',
                dataFormat: 'json',
                dataSource: {
                    "chart": {
                        "caption": "การบันทึกข้อมูลการถูกละเมิดสิทธิในระบบ CRS ตั้งแต่เปิดใช้ระบบ ",
                        "subCaption": "เปรียบเทียบตามกรณี จำแนกรายเดือน ปีงบประมาณ <?php echo ($years+543) ?>",
                        "placeValuesInside": "0",
                        "yAxisName": "จำนวนการถูกละเมิดสิทธิ",
                        "yAxisMinValue": "0",
                        "basefontsize": "14",
                        "captionFontSize": "16",
                        "subcaptionFontSize": "16",
                        "showhovereffect": "1",
                        "showValues": "0",
                        "numbersuffix": "",
                        "drawcrossline": "1",
                        "legendIconBorderThickness": "3",
                        "theme": "hulk-light",
                        /*"palettecolors": "#8455d3,#df4591,#c41cac,#b13825,#f8b4cd,#F8DF8B,#B85C38,#334756,#31112C,#32E0C4",*/
                        "palettecolors": "#8455d3,#F8DF8B,#B85C38,#df4591,#31112C,#32E0C4",
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

                        <?php
                            
                            echo '{';
                            echo '"seriesname": "'.$list_pb[0].'",';
                            echo '"data" : [';

                            for($i = 10; $i <= 12; $i++){
                                echo '{';

                                $ck2 = 0;  
                                for($j = 1;$j <= $last_i2; $j++ ){
                                    if($i == $ch2_month[$j]){
                                        echo '"value" : "'.$case1[$j].'",';
                                        $ck2 = 1; 
                                    }
                                }
                                if($ck2 == 0){
                                    echo '"value": "0"';
                                }

                                    echo '},';
                                
                            }

                            for($i = 1; $i <= 9; $i++){
                                echo '{';

                                $ck2 = 0;  
                                for($j = 1;$j <= $last_i2; $j++ ){
                                    if($i == $ch2_month[$j]){
                                        echo '"value" : "'.$case1[$j].'",';
                                        $ck2 = 1; 
                                    }
                                }
                                if($ck2 == 0){
                                    echo '"value": "0"';
                                }

                                if($i == 9){
                                    echo '}';
                                }else{
                                    echo '},';
                                }
                            }

                            echo ']},';

                            echo '{';
                                echo '"seriesname": "'.$list_pb[1].'",';
                                echo '"data" : [';

                                for($i = 10; $i <= 12; $i++){
                                    echo '{';
    
                                    $ck2 = 0;  
                                    for($j = 1;$j <= $last_i2; $j++ ){
                                        if($i == $ch2_month[$j]){
                                            echo '"value" : "'.$case2[$j].'",';
                                            $ck2 = 1; 
                                        }
                                    }
                                    if($ck2 == 0){
                                        echo '"value": "0"';
                                    }
    
                                        echo '},';
                                    
                                }
    
                                for($i = 1; $i <= 9; $i++){
                                    echo '{';
    
                                    $ck2 = 0;  
                                    for($j = 1;$j <= $last_i2; $j++ ){
                                        if($i == $ch2_month[$j]){
                                            echo '"value" : "'.$case2[$j].'",';
                                            $ck2 = 1; 
                                        }
                                    }
                                    if($ck2 == 0){
                                        echo '"value": "0"';
                                    }
    
                                    if($i == 9){
                                        echo '}';
                                    }else{
                                        echo '},';
                                    }
                                }
    
                                echo ']},';

                                echo '{';
                                echo '"seriesname": "'.$list_pb[2].'",';
                                echo '"data" : [';

                                for($i = 10; $i <= 12; $i++){
                                    echo '{';
    
                                    $ck2 = 0;  
                                    for($j = 1;$j <= $last_i2; $j++ ){
                                        if($i == $ch2_month[$j]){
                                            echo '"value" : "'.$case3[$j].'",';
                                            $ck2 = 1; 
                                        }
                                    }
                                    if($ck2 == 0){
                                        echo '"value": "0"';
                                    }
    
                                        echo '},';
                                    
                                }
    
                                for($i = 1; $i <= 9; $i++){
                                    echo '{';
    
                                    $ck2 = 0;  
                                    for($j = 1;$j <= $last_i2; $j++ ){
                                        if($i == $ch2_month[$j]){
                                            echo '"value" : "'.$case3[$j].'",';
                                            $ck2 = 1; 
                                        }
                                    }
                                    if($ck2 == 0){
                                        echo '"value": "0"';
                                    }
    
                                    if($i == 9){
                                        echo '}';
                                    }else{
                                        echo '},';
                                    }
                                }
    
                                echo ']},';

                                echo '{';
                                echo '"seriesname": "'.$list_pb[3].'",';
                                echo '"data" : [';

                                for($i = 10; $i <= 12; $i++){
                                    echo '{';
    
                                    $ck2 = 0;  
                                    for($j = 1;$j <= $last_i2; $j++ ){
                                        if($i == $ch2_month[$j]){
                                            echo '"value" : "'.$case4[$j].'",';
                                            $ck2 = 1; 
                                        }
                                    }
                                    if($ck2 == 0){
                                        echo '"value": "0"';
                                    }
    
                                        echo '},';
                                    
                                }
    
                                for($i = 1; $i <= 9; $i++){
                                    echo '{';
    
                                    $ck2 = 0;  
                                    for($j = 1;$j <= $last_i2; $j++ ){
                                        if($i == $ch2_month[$j]){
                                            echo '"value" : "'.$case4[$j].'",';
                                            $ck2 = 1; 
                                        }
                                    }
                                    if($ck2 == 0){
                                        echo '"value": "0"';
                                    }
    
                                    if($i == 9){
                                        echo '}';
                                    }else{
                                        echo '},';
                                    }
                                }
    
                                echo ']},';

                                echo '{';
                                echo '"seriesname": "'.$list_pb[4].'",';
                                echo '"data" : [';

                                for($i = 10; $i <= 12; $i++){
                                    echo '{';
    
                                    $ck2 = 0;  
                                    for($j = 1;$j <= $last_i2; $j++ ){
                                        if($i == $ch2_month[$j]){
                                            echo '"value" : "'.$case5[$j].'",';
                                            $ck2 = 1; 
                                        }
                                    }
                                    if($ck2 == 0){
                                        echo '"value": "0"';
                                    }
    
                                        echo '},';
                                    
                                }
    
                                for($i = 1; $i <= 9; $i++){
                                    echo '{';
    
                                    $ck2 = 0;  
                                    for($j = 1;$j <= $last_i2; $j++ ){
                                        if($i == $ch2_month[$j]){
                                            echo '"value" : "'.$case5[$j].'",';
                                            $ck2 = 1; 
                                        }
                                    }
                                    if($ck2 == 0){
                                        echo '"value": "0"';
                                    }
    
                                    if($i == 9){
                                        echo '}';
                                    }else{
                                        echo '},';
                                    }
                                }
    
                                echo ']},';

                                echo '{';
                                    echo '"seriesname": "'.$list_pb[5].'",';
                                    echo '"data" : [';

                                    for($i = 10; $i <= 12; $i++){
                                        echo '{';
        
                                        $ck2 = 0;  
                                        for($j = 1;$j <= $last_i2; $j++ ){
                                            if($i == $ch2_month[$j]){
                                                echo '"value" : "'.$case6[$j].'",';
                                                $ck2 = 1; 
                                            }
                                        }
                                        if($ck2 == 0){
                                            echo '"value": "0"';
                                        }
        
                                            echo '},';
                                        
                                    }
        
                                    for($i = 1; $i <= 9; $i++){
                                        echo '{';
        
                                        $ck2 = 0;  
                                        for($j = 1;$j <= $last_i2; $j++ ){
                                            if($i == $ch2_month[$j]){
                                                echo '"value" : "'.$case6[$j].'",';
                                                $ck2 = 1; 
                                            }
                                        }
                                        if($ck2 == 0){
                                            echo '"value": "0"';
                                        }
        
                                        if($i == 9){
                                            echo '}';
                                        }else{
                                            echo '},';
                                        }
                                    }
        
                                    echo ']}';
                                
                        
                        ?>
                    ]

                }
            })
            .render();
    });
    </script>
</body>

</html>