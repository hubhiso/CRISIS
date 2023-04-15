<!DOCTYPE html>
<html lang="en" class="route-index">

<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<title>CRS</title>
	<link rel="shortcut icon" href="../public/images/favicon.ico">

	<link media="all" type="text/css" rel="stylesheet" href="../public/bootstrap-datepicker/css/bootstrap-datepicker.min.css">
	<link media="all" type="text/css" rel="stylesheet" href="../public/bootstrap/css/bootstrap.css">

	<meta name="theme-color" content="#cc99cc"/>
	
	<script src="../public/js/jquery.min.js"></script>
	<script src="../public/bootstrap/js/bootstrap.min.js"></script>
	<script src="../public/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

	<link href="../public/bulma-0.8.0/css/bulma.css" rel="stylesheet">
    <link href="../public/css/font-awesome5.0.6/css/fontawesome-all.css" rel="stylesheet">

    <script type="text/javascript" src="../public/NewFusionChart/js/fusioncharts.js"></script>
	<script type="text/javascript" src="../public/NewFusionChart/js/themes/fusioncharts.theme.hulk-light.js"></script>

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
	   $date_start = $_POST["date_start"];
	   $date_end = $_POST["date_end"];
	
	   if($date_end==''){
		$date_end = date("m/d/Y");
	   }
	
		   $p_case = $_POST["pcase"];
		   if($p_case > '0'){
			$sub_q = " and  status = '".$p_case."' ";
		   }
		   if($pr != 0){
			$pr_q = " and prov_id= '".$pr."' ";
		}

		$sql1 = "SELECT 
		sum(CASE WHEN problem_case = '1' THEN 1 ELSE 0 END) as case1,
		sum(CASE WHEN problem_case = '2' THEN 1 ELSE 0 END) as case2,
		sum(CASE WHEN problem_case = '3' THEN 1 ELSE 0 END) as case3,
		sum(CASE WHEN problem_case = '4' THEN 1 ELSE 0 END) as case4,
		sum(CASE WHEN problem_case = '5' THEN 1 ELSE 0 END) as case5,
		count(problem_case) as sum
		FROM case_inputs where date(created_at) between '".date("Y/m/d", strtotime($date_start))."' and '".date("Y/m/d", strtotime($date_end))."'
		$sub_q $pr_q
		";
		//echo $sql2;
		$result1 = mysqli_query($conn, $sql1); 
		$i = 0;
		while($row1 = $result1->fetch_assoc()) {
				$i++;
				$case1 = $row1["case1"];
				$case2 = $row1["case2"];
				$case3 = $row1["case3"];
				$case4 = $row1["case4"];
				$case5 = $row1["case5"];
				$sum = $row1["sum"];
		}
	?>

	<script type="text/javascript">
		/*  Tab 2 Chart */

		FusionCharts.ready( function () {

			var updateBtn11 = document.getElementById( 'update-chart11' );
			var updateBtn12 = document.getElementById( 'update-chart12' );

			updateBtn11.addEventListener( 'click', function ( e ) {
				this.disabled = true;
				updateBtn12.disabled = false;
				salesChart.setJSONData( {
					"chart": {
						"caption": "กราฟแสดงข้อมูลแยกตามปัญหา",
						"subCaption": "ปี 2562",
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
						"palettecolors": "#E14455",
						"exportEnabled": "1"

					},

					"data": [ {
						"label": "บังคับตรวจเอชไอวี",
						"value": "<?php echo $case1*100/$sum; ?>"
					}, {
						"label": "เปิดเผยสถานะ<br>ฃการติดเชื้อเอชไอวี",
						"value": "<?php echo $case2*100/$sum; ?>"
					}, {
						"label": "ถูกกีดกันหรือถูกเลือกปฏิบัติ<br>เนื่องมาจากกการติดเชื้อเอชไอวี",
						"value": "<?php echo $case3*100/$sum; ?>"
					}, {
						"label": "ถูกกีดกันหรือถูกเลือกปฏิบัติ<br>เนื่องมาจากเป็นกลุ่มเปราะบาง",
						"value": "<?php echo $case4*100/$sum; ?>"
					}, {
						"label": "กรณีที่อื่นๆ<br>ที่เกี่ยวข้องกับเอชไอวี",
						"value": "<?php echo $case5*100/$sum; ?>"
					}]
				} );
			} );


			updateBtn12.addEventListener( 'click', function ( e ) {
				this.disabled = true;
				updateBtn11.disabled = false;
				salesChart.setJSONData( {
					"chart": {
						"caption": "กราฟแสดงข้อมูลแยกตามปัญหา",
						"subCaption": "ปี 2562",
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
						"palettecolors": "#E14455",
						"exportEnabled": "1"

					},

					"data": [ {
						"label": "บังคับตรวจเอชไอวี",
						"value": "<?php echo $case1; ?>"
					}, {
						"label": "เปิดเผยสถานะ<br>ฃการติดเชื้อเอชไอวี",
						"value": "<?php echo $case2; ?>"
					}, {
						"label": "ถูกกีดกันหรือถูกเลือกปฏิบัติ<br>เนื่องมาจากกการติดเชื้อเอชไอวี",
						"value": "<?php echo $case3; ?>"
					}, {
						"label": "ถูกกีดกันหรือถูกเลือกปฏิบัติ<br>เนื่องมาจากเป็นกลุ่มเปราะบาง",
						"value": "<?php echo $case4; ?>"
					}, {
						"label": "กรณีที่อื่นๆ<br>ที่เกี่ยวข้องกับเอชไอวี",
						"value": "<?php echo $case5; ?>"
					}]
				} );
			} );

			var salesChart = new FusionCharts( {
					type: 'column2d',
					renderAt: 'chart-container-b1',
					width: '100%',
					height: '400',
					dataFormat: 'json',
					dataSource: {
						"chart": {
							"caption": "กราฟแสดงข้อมูลแยกตามปัญหา",
							"subCaption": "ปี 2562",
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
							"palettecolors": "#E14455",
							"exportEnabled": "1"

						},

						"data":[ {
						"label": "บังคับตรวจเอชไอวี",
						"value": "<?php echo $case1; ?>"
					}, {
						"label": "เปิดเผยสถานะ<br>ฃการติดเชื้อเอชไอวี",
						"value": "<?php echo $case2; ?>"
					}, {
						"label": "ถูกกีดกันหรือถูกเลือกปฏิบัติ<br>เนื่องมาจากกการติดเชื้อเอชไอวี",
						"value": "<?php echo $case3; ?>"
					}, {
						"label": "ถูกกีดกันหรือถูกเลือกปฏิบัติ<br>เนื่องมาจากเป็นกลุ่มเปราะบาง",
						"value": "<?php echo $case4; ?>"
					}, {
						"label": "กรณีที่อื่นๆ<br>ที่เกี่ยวข้องกับเอชไอวี",
						"value": "<?php echo $case5; ?>"
					} ]
					},
					events: {
						"dataUpdated": function ( evtObj, argObj ) {
							var header = document.getElementById( 'header' );
							header.style.display = 'block';

							var tempDiv = document.createElement( 'div' );
							var attrsTable = document.getElementById( 'attrs-table' );
							var titleDiv, valueDiv;
							for ( var prop in argObj ) {
								titleDiv = document.createElement( 'div' );
								titleDiv.className = 'title';
								titleDiv.innerHTML = prop;

								valueDiv = document.createElement( 'div' );
								valueDiv.className = 'value';
								valueDiv.innerHTML = argObj[ prop ];
								console.log( argObj[ prop ] );

								tempDiv.appendChild( titleDiv );
								tempDiv.appendChild( valueDiv );
							}
							attrsTable.innerHTML = '';
							attrsTable.appendChild( tempDiv );
						}
					}
				} )
				.render();
		} );
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
						<li class="is-active">
							<a href="dashboard3.blade.php">
						        <span class="icon is-small"><i class="fas fa-chart-bar" aria-hidden="true"></i></span>
                                <span> กราฟแสดงข้อมูล<br>แยกตามประเด็น </span>
                            </a>
						</li>
						<li >
							<a href="mapcrisis.blade.php">
								<span class="icon is-small"><i class="far fa-map" aria-hidden="true"></i></span>
								<span>พิกัด<br>การละเมิดสิทธิ์</span>
							</a>
						
						</li>
						<li >
							<a href="table.blade.php">
								<span class="icon is-small"><i class="far fa-file-alt" aria-hidden="true"></i></span>
								<span>ตารางสรุป<br>ในภาพรวม</span>
							</a>
						
						</li>
						<li >
							<a href="report_c1.blade.php">
                                <span class="icon is-small"><i class="far fa-file-alt" aria-hidden="true"></i></span>
                                <span>ตารางสรุปการ<br>จัดการเหตุ</span>
                            </a>
						</li>
						<li >
							<a href="report_c2.blade.php">
                                <span class="icon is-small"><i class="far fa-file-alt" aria-hidden="true"></i></span>
                                <span>ตารางสรุป<br>การละเมิดสิทธิ์</span>
                            </a>
						</li>
						<li >
							<a href="report_perfomance.blade.php">
                                <span class="icon is-small"><i class="far fa-file-alt" aria-hidden="true"></i></span>
                                <span>ตารางสรุป<br>การให้บริการ</span>
                            </a>
						</li>
					</ul>
				</div>
				
				<div class="tabs is-centered is-toggle is-toggle-rounded">
                    <ul>
                        <li >
                        <a href="dashboard3.blade.php">
                            <span class="icon is-small"><i class="far fa-chart-bar" aria-hidden="true"></i></span>
                            <span>สถานการณ์การละเมิดสิทธิ</span>
                        </a>
                        </li>
                        <li >
                        <a href="dashboard1.blade.php">
                            <span class="icon is-small"><i class="far fa-chart-bar" aria-hidden="true"></i></span>
                            <span>ข้อมูลแยกตามขั้นตอน</span>
                        </a>
                        </li>
                        <li class="is-active">
                        <a href="dashboard2.blade.php">
                            <span class="icon is-small"><i class="far fa-chart-bar" aria-hidden="true"></i></span>
                            <span>ข้อมูลแยกตามปัญหา</span>
                        </a>
                        </li>
                    </ul>
                </div>

				<form name="form_menu" method="post" action="dashboard2.blade.php">
					<div class="columns is-multiline is-mobile">
						<div class="column ">
							<div class="level-left">
								<div class="level-item">
									<p class="subtitle is-6">
										<strong> สถานะ </strong>
									</p>
								</div>
								
								<div class="level-item">
									<div class="select">
										<select id="p_case" name="pcase">
											<option value="0" <?php if ($p_case == "0") { echo "selected";} ?>> ทั้งหมด </option>
											<option value="1" <?php if ($p_case == "1") { echo "selected";} ?>> ยังไม่ได้รับเรื่อง </option>
											<option value="2" <?php if ($p_case == "2") { echo "selected";} ?>> รับเรื่องแล้ว </option>
											<option value="3" <?php if ($p_case == "3") { echo "selected";} ?>> บันทึกข้อมูลเพิ่มเติมแล้ว </option>
											<option value="4" <?php if ($p_case == "4") { echo "selected";} ?>> อยู่ระหว่างดำเนินการ</option>
											<option value="5" <?php if ($p_case == "5") { echo "selected";} ?>> ดำเนินการเสร็จสิ้น </option>
											<option value="5" <?php if ($p_case == "5") { echo "selected";} ?>> ดำเนินการเสร็จสิ้นแล้วส่งต่อ </option>
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
										<strong> จังหวัด </strong>
									</p>
                                </div>
								
								<div class="level-item">
									<div class="select">
										<select id="pr" name="pr" >
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
								<div class="level-item">
									<p class="subtitle is-6">
										<strong> เลือกวันที่ </strong>
									</p>
								</div>
								<div class="level-item">
									<div class="field has-addons">
										<p class="control has-icons-left" >
										<div class="input-group input-daterange" style="width: 300px">
											<input type="text" class="form-control" id="date_start" name="date_start" value='<?php echo $date_start; ?>'>
											<div class="input-group-addon">ถึง</div>
											<input type="text" class="form-control" id="date_end" name="date_end" value='<?php echo $date_end; ?>'>
										</div>
										</p>
									</div>
								</div>
								<div class="level-item">
									<input type="submit" class="button is-primary" id="submit" name = "submit" value="ตกลง">
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
				<br>
				<div class="field has-addons">
					<p class="control">
						<a id="update-chart12" class="button is-danger is-outlined">
							<span>จำนวน</span>
						</a>
					</p>
					<p class="control">
						<a id="update-chart11" class="button is-danger is-outlined">
							<span>เปอร์เซ็นต์</span>
						</a>
					</p>
				</div>
				<div id="chart-container-b1">FusionCharts XT will load here!</div>
			</div>

			<br>


		</div>
		</div>

	</section>
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
	<footer class="footer "style="background-color: #EEE;">
  <div class="container  ">
    <div class="content has-text-centered  ">
      <p>Crisis Response System (CRS)
	  </p>
	  <p id="tsp"> <small> Source code licensed <a href="http://www.hiso.or.th">HISO</a>.  </small> </p>
    </div>
  </div>
</footer>
</body>

</html>