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

        $years = $_POST["y"];
        $area = $_POST["area"];

        if($years =='')
        {
        $years = $_GET["y"];
        $area = $_GET["area"];
        $pr = $_GET["pr"];
        }


        if($years == ''){$years = $last_year;}
        if($area == ''){$area = '13';}
        

        $sql_a = "select * from prov_geo where nhso = $area";
        $result_a = mysqli_query($conn, $sql_a); 
        $i=0;
        while($row_a = $result_a->fetch_assoc()) {
            $i++;
            $a_code[$i] = $row_a[code];
            $a_prname[$i] = $row_a['name'];
            $a_loop = $i;
        }
        if($pr == ''){$pr = $a_code[1];}

        $sql_o = "select * from officers where prov_id = $pr";
        //echo  $sql_o;
        $result_o = mysqli_query($conn, $sql_o); 
        $i=0;
        while($row_o = $result_o->fetch_assoc()) {
            $i++;
            $o_nameorg[$i] = $row_o['nameorg'];
            $o_name[$i] = $row_o['name'];
            $o_loop = $i;
        }


        
        $sql = "select year(ca.created_at) as y,month(ca.created_at) as m,count(*) as count, ca.prov_id, pr.name
        from case_inputs ca
        left join prov_geo pr
        on ca.prov_id = pr.code
        where  year(created_at) = '$years' and pr.nhso = '$area'
        group by  year(ca.created_at),month(ca.created_at), ca.prov_id";

        $result1 = mysqli_query($conn, $sql); 
        $row1 = mysqli_num_rows($result1); 
        $i = 0;        
        while($row1 = $result1->fetch_assoc()) {
            $i++;
            $y[$i] = $row1[y];
            $m[$i] = $row1[m];
            $count[$i] = $row1[count];
            $p_id[$i] = $row1[prov_id];
            $p_name[$i] = $row1['name'];
            $last_i = $i;
        }

        $sql2 = "select year(ca.created_at) as y, month(ca.created_at) as m, count(*) as count, ca.prov_id, ca.receiver, f.nameorg, f.username
        from case_inputs ca
        left join officers f
        on f.name = ca.receiver
        where  year(ca.created_at) = '".$years."' and ca.prov_id ='".$pr."'  and ca.receiver <> ''
        group by  year(ca.created_at),month(ca.created_at), prov_id, receiver, f.nameorg, f.username";

        $result2 = mysqli_query($conn, $sql2); 
        $row2 = mysqli_num_rows($result2); 
        $i = 0;        
        while($row2 = $result2->fetch_assoc()) {
            $i++;
            $ch2_month[$i] = $row2[m];
            $ch2_count[$i] = $row2[count];
            $ch2_nameorg[$i] = $row2[nameorg];
            $last_i2 = $i;
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
                <a class="btn btn-white btn-rounded border" href="dashboard6_new.php">
                    <span class="icon is-small"><i class="far fa-chart-bar" aria-hidden="true"></i></span>
                    <span>สถานการณ์รายเดือน</span>
                </a>
                <a class="btn btn-primary btn-white btn-rounded border" href="dashboard7_new.php">
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

            <form name="form_menu" method="post" action="dashboard7_new.php">

                <div class="row g-3 mb-3 align-items-center">
                    <div class="col-auto">
                        <strong class="col-form-label">เลือกปี</strong>
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

                    <div class="col-auto">
                        <strong class="col-form-label">เลือกเขต</strong>
                    </div>

                    <div class="col-auto">
                        <div class="select">
                            <select id="area" name="area" class="form-select">
                                <option value="1" <?php if($area == '1'){echo 'selected';} ?>>1</option>
                                <option value="2" <?php if($area == '2'){echo 'selected';} ?>>2</option>
                                <option value="3" <?php if($area == '3'){echo 'selected';} ?>>3</option>
                                <option value="4" <?php if($area == '4'){echo 'selected';} ?>>4</option>
                                <option value="5" <?php if($area == '5'){echo 'selected';} ?>>5</option>
                                <option value="6" <?php if($area == '6'){echo 'selected';} ?>>6</option>
                                <option value="7" <?php if($area == '7'){echo 'selected';} ?>>7</option>
                                <option value="8" <?php if($area == '8'){echo 'selected';} ?>>8</option>
                                <option value="9" <?php if($area == '9'){echo 'selected';} ?>>9</option>
                                <option value="10" <?php if($area == '10'){echo 'selected';} ?>>10</option>
                                <option value="11" <?php if($area == '11'){echo 'selected';} ?>>11</option>
                                <option value="12" <?php if($area == '12'){echo 'selected';} ?>>12</option>
                                <option value="13" <?php if($area == '13'){echo 'selected';} ?>>13</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-auto ">
                        <input type="submit" class="btn bgcolor1" id="submit" name="submit" value="ตกลง">

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

                <div class="row g-3 mb-3 align-items-center">

                    <div class="col-auto">
                        <strong class="col-form-label">เลือกจังหวัด</strong>
                    </div>

                    <div class="col-auto">
                        <div class="select">
                            <select id="pr" name="pr" class="form-select" onChange="location.href='dashboard7_new.php?y=<?php echo $years; ?>&area=<?php echo $area; ?>&pr='+this.value" >
                                <?php
                                    for($i = 1; $i <= $a_loop; $i++){
                                        if($pr == $a_code[$i]){$se2 = "selected";}
                                        echo '<option value="'.$a_code[$i].'" '.$se2.'>'.$a_prname[$i].'</option>';
                                        $se2 = '';
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
                        "palettecolors": "#8455d3,#df4591,#c41cac,#b13825,#f8b4cd,#F8DF8B,#B85C38,#334756,#31112C,#32E0C4",
                        "exportEnabled": "1"

                    },

                    "categories": [{
                        "category": [{
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
                            },
                            {
                                "label": "ต.ค."
                            },
                            {
                                "label": "พ.ย."
                            },
                            {
                                "label": "ธ.ค."
                            }
                        ]
                    }],
                    "dataset": [

                        <?php
                            for($i = 1; $i <= $a_loop; $i++){

                                echo '{';
                                echo '"seriesname": "'.$a_prname[$i].'",';
                                echo '"data" : [';

                                for ($j = 1;$j <= 12; $j++) {
                                    echo "{";

                                    
                                    $ck1 = 0;  

                                    for($ck = 1; $ck <= $last_i; $ck++){
                                        if($a_code[$i] == $p_id[$ck] and $j == $m[$ck] ){
                                            echo '"value": "'.$count[$ck].'"';
                                            $ck1 = 1;
                                        }
                                        
                                    }

                                    if($ck1 == 0){
                                        echo '"value": "0"';
                                    }


                                    if($j == 12){
                                        echo "}]";
                                    }else{
                                        echo "},";
                                    }
                                }

                                if($i == $a_loop){
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
                        "subCaption": "เปรียบเทียบตามหน่วยงาน จำแนกรายเดือน",
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
                        "palettecolors": "#8455d3,#df4591,#c41cac,#b13825,#f8b4cd,#F8DF8B,#B85C38,#334756,#31112C,#32E0C4",
                        "exportEnabled": "1"

                    },

                    "categories": [{
                        "category": [{
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
                            },
                            {
                                "label": "ต.ค."
                            },
                            {
                                "label": "พ.ย."
                            },
                            {
                                "label": "ธ.ค."
                            }
                        ]
                    }],
                    "dataset": [
                        

                        <?php
                            for($i = 1; $i <= $o_loop; $i++){

                                echo '{';
                                echo '"seriesname": "'.$o_nameorg[$i].'",';
                                echo '"data" : [';

                                for ($j = 1;$j <= 12; $j++) {
                                    echo "{";

                                    $ck2 = 0;

                                    for($k = 1; $k <= $last_i2; $k++){
                                        if($j == $ch2_month[$k] and $o_nameorg[$i] == $ch2_nameorg[$k] ){
                                            echo '"value": "'.$ch2_count[$k].'"';
                                            $ck2 = 1;
                                        }
                                    }

                                    if($ck2 == 0){
                                        echo '"value": "0"';
                                    }


                                    if($j == 12){
                                        echo "}]";
                                    }else{
                                        echo "},";
                                    }
                                }

                                if($i == $o_loop){
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
</body>

</html>