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
	
	$date_start = $_POST["date_start"];
	$date_end = $_POST["date_end"];
 
	if($date_end==''){
	 $date_end = date("m/d/Y");
	}

	$p_case = $_POST["pcase"];
	   if($p_case > '0'){
		$sub_q = ' sum(CASE WHEN problem_case = '.$p_case.' THEN 1 ELSE 0 END) as ccase ';
	   }else{
		$sub_q = ' count(problem_case) as ccase';
	   }

	$sql = "SELECT prov_id, prov_geo.prov_name_en, prov_geo.name,
	$sub_q
	FROM case_inputs, prov_geo
	where prov_geo.code = case_inputs.prov_id
	and created_at >= '".date("Y/m/d", strtotime($date_start))."' and created_at <= '".date("Y/m/d", strtotime($date_end))."'
	group by prov_id";

	$result = mysqli_query($conn, $sql); 
	$row = mysqli_num_rows($result); 
	$i = '0';
	$i++;
	$i_loop = 0;
	$v_max = 0;
	while($row = $result->fetch_assoc()) {
		
		$prov_id[$i] = $row["prov_id"];
		$prov_code[$i] = $row["prov_name_en"];
        $prov_name[$i] = $row["name"];
		$case[$i] = $row["ccase"];
		
		if($v_max < $case[$i]){
			$v_max = $case[$i];
		}

		$i_loop++;
		$i++;
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
                <a class="btn btn-primary btn-rounded  "  href="report_c2m_new.php">
                    <span class="icon is-small"><i class="far fa-chart-bar" aria-hidden="true"></i></span>
                    <span>แผนที่</span>
                </a>
                <a class="btn btn-white btn-rounded border " href="report_c2_new.php">
                    <span class="icon is-small"><i class="far fa-chart-bar" aria-hidden="true"></i></span>
                    <span>รวมทุกกรณี</span>
                </a>
                <a class="btn btn-white btn-rounded border" href="report_c21_new.php">
                    <span class="icon is-small"><i class="far fa-chart-bar" aria-hidden="true"></i></span>
                    <span>กรณี 1 บังคับตรวจเอชไอวี</span>
                </a>
                <a class="btn btn-white btn-rounded border" href="report_c22_new.php">
                    <span class="icon is-small"><i class="far fa-chart-bar" aria-hidden="true"></i></span>
                    <span>กรณี 3 เลือกปฎิบัติในกลุ่มผู้ติดเชื้อ</span>
                </a>
                <a class="btn btn-white btn-rounded border" href="report_c23_new.php">
                    <span class="icon is-small"><i class="far fa-chart-bar" aria-hidden="true"></i></span>
                    <span>กรณี 4 เลือกปฎิบัติในกลุ่มเปราะบาง</span>
                </a>
            </div>

        </div>

        <div class=" p-4">

            <form name="form_menu" method="post" action="report_c2m_new.php">

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

                </div>

                <br>

                <p class="subtitle ">
                    <strong> ข้อมูล ณ วันที่ (ด/ว/ป) </strong>

                    <?php echo "  : ",date("m/d/Y")," เวลา : ",date("h:i:sa"); ?>
                </p>

            </form>

        </div>

        <a id="chart-container">FusionCharts will render here</a>

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

    <SCRIPT LANGUAGE="Javascript" SRC="../public/NewFusionChart/Fusion/fusioncharts.js"></SCRIPT>
    <script type='text/javascript' src="../public/NewFusionChart/Fusion/fusioncharts.charts.js"></script>
    <script type='text/javascript' src="../public/NewFusionChart/Fusion/fusioncharts.maps.js"></script>
    <script type='text/javascript' src="../public/NewFusionChart/Fusion/fusioncharts.thailand.js"></script>
    <script type='text/javascript' src="../public/NewFusionChart/Fusion/fusioncharts.theme.fint.js"></script>

    <script>
    $('.input-daterange input').each(function() {

        $(this).datepicker('');
        //$('#date_end').datepicker("setDate", new Date());
    }).on('changeDate', function(e) {
        //load_case()
    });
    </script>

    <script type='text/javascript'>
    //<![CDATA[ 
    window.onload = function() {
        FusionCharts.ready(function() {
            var salesByState = new FusionCharts({
                type: 'thailand',
                renderAt: 'chart-container',
                width: '100%',
                height: '700',
                dataFormat: 'json',
                dataSource: {
                    "map": {
                        "nullEntityColor": "#cccccc",

                        "animation": "1",
                        "showbevel": "0",
                        "showLabels": "0",
                        "usehovercolor": "1",
                        "borderColor": "#aaaaaa",
                        "borderThickness": "1",
                        //"bordercolor": "",
                        "showlegend": "1",
                        "showshadow": "0",
                        "legendPosition": "bottom",
                        "legendborderalpha": "1",
                        "legendbordercolor": "#e5a3ad",
                        "legendallowdrag": "0",
                        "legendshadow": "0",
                        "legendIconScale": "1",
                        "legendItemFontSize": "11",
                        "caption": "",
                        "connectorcolor": "#e5a3ad",
                        "fillalpha": "100",
                        "hovercolor": "#e5a3ad",
                        "showborder": '1',
                        "forceDecimals": 2,
                        "canvasBorderColor": '#ffffff',
                        "exportenabled": "1"
                    },
                    "colorrange": {
                        "minvalue": "0",
                        "startlabel": "Low",
                        "endlabel": "High",
                        "code": "#ffffff",
                        "gradient": "1",
                        "color": [{
                                "minvalue": "0",
                                "maxvalue": "0",
                                "code": "#ffffff",
                                "label": "Low"
                            },
                            {
                                "minvalue": "1",
                                "maxvalue": "<?php echo $v_max/2; ?>",
                                "code": "#fba3e0",
                                "label": "Medium"
                            },
                            {
                                "minvalue": "<?php echo ($v_max/2)+1; ?>",
                                "maxvalue": "<?php echo $v_max; ?>",
                                "code": "#db318d",
                                "label": "High"
                            }
                        ]

                    },
                    "data": [

                        <?php
                            for($j=1;$j<=$i_loop; $j++){
                                echo '{';
                                echo '"id": "'.$prov_code[$j].'",';
                                echo '"value": "'.$case[$j].'",';
                                echo '"showlabel": "1",';
                                echo '"displayValue": "'.$prov_name[$j].'"';
                                echo '},';
                            }
			            ?>

                    ]
                }
            }).render();

        });
    } //]]>  
    </script>


</body>

</html>