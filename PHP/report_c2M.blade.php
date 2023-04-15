<!DOCTYPE html>
<html lang="en" class="route-index">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>CRS</title>
    <link rel="shortcut icon" href="../public/images/favicon.ico">

    <link media="all" type="text/css" rel="stylesheet"
        href="../public/bootstrap-datepicker/css/bootstrap-datepicker.min.css">
    <link media="all" type="text/css" rel="stylesheet" href="../public/bootstrap/css/bootstrap.css">

    <meta name="theme-color" content="#cc99cc" />

    <script src="../public/js/jquery.min.js"></script>
    <script src="../public/bootstrap/js/bootstrap.min.js"></script>
    <script src="../public/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

    <link href="../public/bulma-0.8.0/css/bulma.css" rel="stylesheet">
    <link href="../public/css/font-awesome5.0.6/css/fontawesome-all.css" rel="stylesheet">

    <SCRIPT LANGUAGE="Javascript" SRC="../public/NewFusionChart/Fusion/fusioncharts.js"></SCRIPT>
    <script type='text/javascript' src="../public/NewFusionChart/Fusion/fusioncharts.charts.js"></script>
    <script type='text/javascript' src="../public/NewFusionChart/Fusion/fusioncharts.maps.js"></script>
    <script type='text/javascript' src="../public/NewFusionChart/Fusion/fusioncharts.thailand.js"></script>
    <script type='text/javascript' src="../public/NewFusionChart/Fusion/fusioncharts.theme.fint.js"></script>

    <style>
    .hideextra {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    </style>

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

	$sql = "SELECT prov_id, prov_geo.prov_name_en,
	$sub_q
	FROM case_inputs, prov_geo
	where prov_geo.code = case_inputs.prov_id
	and date(created_at) between '".date("Y/m/d", strtotime($date_start))."' and '".date("Y/m/d", strtotime($date_end))."'
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
		$case[$i] = $row["ccase"];
		
		if($v_max < $case[$i]){
			$v_max = $case[$i];
		}

		$i_loop++;
		$i++;
	}
    ?>

    <script type='text/javascript'>
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
                        "animation": "1",
                        "showbevel": "0",
                        "showLabels": "0",
                        "usehovercolor": "1",
                        "canvasbordercolor": "ccc",
                        "bordercolor": "#111111",
                        "showlegend": "1",
                        "showshadow": "1",
                        "legendposition": "BOTTOM",
                        "legendborderalpha": "1",
                        "legendbordercolor": "#e5a3ad",
                        "legendallowdrag": "0",
                        "legendshadow": "0",
                        "caption": "",
                        "connectorcolor": "#e5a3ad",
                        "fillalpha": "100",
                        "hovercolor": "#CCCCCC",
                        "showborder": 1,
                        "forceDecimals": 2,
                        "borderThickness": 0.1,
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
                                "code": "#e5a3ad",
                                "label": "Medium"
                            },
                            {
                                "minvalue": "<?php echo ($v_max/2)+1; ?>",
                                "maxvalue": "<?php echo $v_max; ?>",
                                "code": "#bf1932",
                                "label": "High"
                            }
                        ]

                    },
                    "data": [

                        <?php
	                        for ($j = 1; $j <= $i_loop; $j++) {
	                            echo '{';
	                            echo '"id": "'.$prov_code[$j].
	                            '",';
	                            echo '"value": "'.$case[$j].
	                            '"';
	                            echo '},';
	                        } 
                        ?>

                    ]
                }
            }).render();

        });
    } //]]>  
    </script>

</head>

<body class="layout-default">

    <section class="hero is-medium has-text-centered">
        <div class="hero-head">

            <div class="container">
                <br>
                <nav class="breadcrumb" aria-label="breadcrumbs">
                    <ul>
                        <li><a href="../public/officer"><span class="icon is-small">
                                    <i class="fa fa-home"></i></span><span> หน้าหลัก </span></a>

                        </li>
                        <li class="is-active"><a><span class="icon is-small">
                                    <i class="far fa-file-alt"></i></span><span> ระบบรายงาน </span></a>

                        </li>
                    </ul>
                </nav>

                <div class="tabs is-centered  is-toggle is-toggle-rounded">
                    <ul>
                        <li>
                            <a href="dashboard3.blade.php">
                                <span class="icon is-small"><i class="fas fa-chart-bar" aria-hidden="true"></i></span>
                                <span> กราฟแสดงข้อมูล<br>แยกตามประเด็น </span>
                            </a>
                        </li>
                        <li>
                            <a href="mapcrisis.blade.php">
                                <span class="icon is-small"><i class="far fa-map" aria-hidden="true"></i></span>
                                <span>พิกัด<br>การละเมิดสิทธิ์</span>
                            </a>

                        </li>
                        <li>
                            <a href="table.blade.php">
                                <span class="icon is-small"><i class="far fa-file-alt" aria-hidden="true"></i></span>
                                <span>ตารางสรุป<br>ในภาพรวม</span>
                            </a>

                        </li>
                        <li>
                            <a href="report_c1.blade.php">
                                <span class="icon is-small"><i class="far fa-file-alt" aria-hidden="true"></i></span>
                                <span>ตารางสรุปการ<br>จัดการเหตุ</span>
                            </a>
                        </li>
                        <li class="is-active">
                            <a href="report_c2.blade.php">
                                <span class="icon is-small"><i class="far fa-file-alt" aria-hidden="true"></i></span>
                                <span>ตารางสรุป<br>การละเมิดสิทธิ์</span>
                            </a>
                        </li>
                        <li>
                            <a href="report_perfomance.blade.php">
                                <span class="icon is-small"><i class="far fa-file-alt" aria-hidden="true"></i></span>
                                <span>ตารางสรุป<br>การให้บริการ</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="tabs is-centered is-toggle is-toggle-rounded ">
                    <ul>
                        <li class="is-active">
                            <a href="report_c2m.blade.php">
                                <span class="icon is-small"><i class="far fa-file-alt" aria-hidden="true"></i></span>
                                <span>แผนที่</span>
                            </a>
                        </li>
                        <li>
                            <a href="report_c2.blade.php">
                                <span class="icon is-small"><i class="far fa-file-alt" aria-hidden="true"></i></span>
                                <span>รวมทุกกรณี</span>
                            </a>
                        </li>
                        <li>
                            <a href="report_c21.blade.php">
                                <span class="icon is-small"><i class="far fa-file-alt" aria-hidden="true"></i></span>
                                <span>กรณี 1 บังคับตรวจเอชไอวี</span>
                            </a>
                        </li>
                        <li>
                            <a href="report_c22.blade.php">
                                <span class="icon is-small"><i class="far fa-file-alt" aria-hidden="true"></i></span>
                                <span>กรณี 3 เลือกปฏิบัติในกลุ่มผู้ติดเชื้อ</span>
                            </a>
                        </li>
                        <li>
                            <a href="report_c23.blade.php">
                                <span class="icon is-small"><i class="far fa-file-alt" aria-hidden="true"></i></span>
                                <span>กรณี 4 เลือกปฏิบัติในกลุ่มเปราะบาง</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <p class="title">แผนที่สรุปการละเมิดรายจังหวัด</p>


                <form name="form_menu" method="post" action="report_c2m.blade.php">
                    <div class="columns is-multiline is-mobile">
                        <div class="column ">
                            <div class="level-left">
                                <div class="level-item">
                                    <p class="subtitle is-6">
                                        <strong> กรณีที่ถูกละเมิด </strong>
                                    </p>
                                </div>

                                <div class="level-item">
                                    <div class="select">
                                        <select id="p_case" name="pcase">
                                            <option value="0" <?php if ($p_case == "0") { echo "selected";} ?>>
                                                ทุกกรณี </option>
                                            <option value="1" <?php if ($p_case == "1") { echo "selected";} ?>>
                                                บังคับตรวจเอชไอวี </option>
                                            <option value="2" <?php if ($p_case == "2") { echo "selected";} ?>>
                                                เปิดเผยสถานะ<br>การติดเชื้อเอชไอวี </option>
                                            <option value="3" <?php if ($p_case == "3") { echo "selected";} ?>>
                                                ถูกกีดกันหรือถูกเลือกปฏิบัติ<br>เนื่องมาจากกการติดเชื้อเอชไอวี </option>
                                            <option value="4" <?php if ($p_case == "4") { echo "selected";} ?>>
                                                ถูกกีดกันหรือถูกเลือกปฏิบัติ<br>เนื่องมาจากเป็นกลุ่มเปราะบาง </option>
                                            <option value="5" <?php if ($p_case == "5") { echo "selected";} ?>>
                                                กรณีที่อื่นๆ<br>ที่เกี่ยวข้องกับเอชไอวี </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="columns is-multiline is-mobile">
                        <div class="column ">
                            <div class="level-left">
                                <div class="level-item">
                                    <p class="subtitle is-6">
                                        <strong> เลือกวันที่ </strong>
                                    </p>
                                </div>
                                <div class="level-item">
                                    <div class="field has-addons">
                                        <p class="control has-icons-left">
                                        <div class="input-group input-daterange" style="width: 300px">
                                            <input type="text" class="form-control" id="date_start" name="date_start"
                                                value='<?php echo $date_start; ?>'>
                                            <div class="input-group-addon">ถึง</div>
                                            <input type="text" class="form-control" id="date_end" name="date_end"
                                                value='<?php echo $date_end; ?>'>
                                        </div>
                                        </p>
                                    </div>
                                </div>
                                <div class="level-item">
                                    <input type="submit" class="button is-primary" id="submit" name="submit"
                                        value="ตกลง">
                                </div>
                                <div class="level-item">
                                    <div class="field has-addons">
                                        <p>
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="columns is-multiline is-mobile">
                        <div class="column ">
                            <div class="level-left">
                                <div class="level-item">
                                    <p class="subtitle is-6">
                                        <strong> ข้อมูล ณ วันที่ (ด/ว/ป) </strong>
                                    </p>
                                    <p class="subtitle is-6">
                                        <?php echo "  : ",date("m/d/Y")," เวลา : ",date("h:i:sa"); ?>
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>
                </form>
                <br>
                <a id="chart-container">FusionCharts will render here</a>
    </section>
    <br>

</body>



<script src="../public/bulma/clipboard-1.7.1.min.js"></script>
<script src="../public/bulma/main.js"></script>

<script>
$('.input-daterange input').each(function() {
    $(this).datepicker('');
    //$('#date_end').datepicker("setDate", new Date());
}).on('changeDate', function(e) {
    //load_case()
});
</script>

<footer class="footer " style="background-color: #EEE;">
    <div class="container  ">
        <div class="content has-text-centered  ">
            <p>Crisis Response System (CRS)
            </p>
            <p id="tsp"> <small> Source code licensed <a href="http://www.hiso.or.th">HISO</a>. </small> </p>
        </div>
    </div>
</footer>

</html>