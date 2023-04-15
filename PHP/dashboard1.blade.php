<!DOCTYPE html>
<html lang="en" class="route-index">

<head>

<meta charset="utf-8">
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

	    $se1 = $_POST["problem_case"];
	    $se2 = $_POST["sub_problem"];
	    $se3 = $_POST["group_code"];
	   //echo $se1,' ',$se2," ",$se3," ";
	
	   if($date_end==''){
		$date_end = date("m/d/Y");
	   }
	
	   if($pr != 0){
			$pr_q = " and c.prov_id= '".$pr."' ";
		}

		$sql1 = "SELECT r.code,r.name,c.status,count(c.id) as n_status 
		FROM r_status r left join case_inputs  c 
		on r.code = c.status
		where date(c.created_at) between '".date("Y/m/d", strtotime($date_start))."' and '".date("Y/m/d", strtotime($date_end))."'
		$pr_q
		group by r.code";
		//echo $sql1;
		$result1 = mysqli_query($conn, $sql1); 
		$i = 0;
		while($row1 = $result1->fetch_assoc()) {
			$i++;
				$status[$i] = $row1["code"];
				$name[$i] = $row1["name"];
				$n_status[$i] = $row1["n_status"];
				$sum =  $sum+$n_status[$i];
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
						"caption": "กราฟแสดงข้อมูลแยกตามขั้นตอน",
						"subCaption": "ปี 2560",
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
					?>]
				} );
			} );


			updateBtn12.addEventListener( 'click', function ( e ) {
				this.disabled = true;
				updateBtn11.disabled = false;
				salesChart.setJSONData( {
					"chart": {
						"caption": "กราฟแสดงข้อมูลแยกตามขั้นตอน",
						"subCaption": "ปี 2560",
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
					?> ]
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
							"caption": "กราฟแสดงข้อมูลแยกตามขั้นตอน",
							"subCaption": "ปี 2560",
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

						"data":[ <?php
						for($i=1;$i<=6;$i++){
							echo '{';
							echo '"label": "'.$name[$i].'",';
							echo '"value": "'.$n_status[$i].'",';
							echo '}';
							if($i<>6){
								echo ",";
							}
						}
					?> ]
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
	<br>

	<section class="hero is-medium has-text-centered">
		<div class="hero-head">

			<div class="container">

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
                        <li class="is-active">
                        <a href="dashboard1.blade.php">
                            <span class="icon is-small"><i class="far fa-chart-bar" aria-hidden="true"></i></span>
                            <span>ข้อมูลแยกตามขั้นตอน</span>
                        </a>
                        </li>
                        <li >
                        <a href="dashboard2.blade.php">
                            <span class="icon is-small"><i class="far fa-chart-bar" aria-hidden="true"></i></span>
                            <span>ข้อมูลแยกตามปัญหา</span>
                        </a>
                        </li>
                    </ul>
				</div>
				
				<form name="form_menu" method="post" action="dashboard1.blade.php">

					<div class="field is-horizontal">
						<div class="field-label is-normal">
							<label class="label">ปัญหาที่พบ</label>
						</div>
						<div class="field-body">
							<div class="field is-grouped">
								<p class="control is-expanded  ">
									<span class="select">
									<select id ="problem_case" name="problem_case">
										<option value="0"  >โปรดเลือกประเภทปัญหาของท่าน</option>
										<option value="1"  >บังคับตรวจเอชไอวี</option>
										<option value="2" <?php if($se1 == '2' ){echo "selected";} ?> >เปิดเผยสถานะการติดเชื้อเอชไอวี</option>
										<option value="3"  >ถูกกีดกันหรือถูกเลือกปฏิบัติเนื่องมาจาการติดเชื้อเอชไอวี</option>
										<option value="4"  >ถูกกีดกันหรือถูกเลือกปฏิบัติเนื่องมาจากเป็นกลุ่มเปราะบาง</option>
										<option value="5"  >อื่นๆ ที่เกี่ยวข้องกับ HIV</option>
									</select>

									</span>
								</p>
							</div>
						</div>
					</div>

					<div class="field is-horizontal">
						<div class="field-label is-normal">
							<label class="label"> ประเภทกลุ่ม </label>
						</div>
						<div class="field-body">
							<div class="field is-grouped">
								<p class="control is-expanded  ">
									<span class="select">
									<select id ="sub_problem" name="sub_problem" disabled="true">
									</select>

								</p>
							</div>

						</div>
					</div>
					<div class="field is-horizontal">
						<div class="field-label is-normal">
							<label class="label"> ประเภทกลุ่มย่อย </label>
						</div>
						<div class="field-body">
							<div class="field is-grouped">
								<p class="control is-expanded  ">
									<span class="select">
									<span class="select">
									<select id ="group_code" name="group_code" disabled="true">
									</select>
								</p>
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

					<div class="field is-horizontal">
						<div class="field-label is-normal">
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

	<footer class="footer "style="background-color: #EEE;">
	<div class="container  ">
		<div class="content has-text-centered  ">
		<p>Crisis Response System (CRS)
		</p>
		<p id="tsp"> <small> Source code licensed <a href="http://www.hiso.or.th">HISO</a>.  </small> </p>
		</div>
	</div>
</footer>
	<script src="../public/bulma/clipboard-1.7.1.min.js"></script>
	<script src="../public/bulma/main.js"></script>

	<script>
	
        $('.input-daterange input').each(function() {
			
			$(this).datepicker('');
            //$('#date_end').datepicker("setDate", new Date());
        }).on('changeDate', function(e) {
            //load_case()
        });

            $('#problem_case').on('change',function (e) {
    var prob_id = e.target.value;
    //console.log(prob_id);
    $('#group_code').empty();
    $('#group_code').attr('disabled', 'disabled');
    if((prob_id==1)||(prob_id==5)){
        $('#sub_problem').empty();
        $('#sub_problem').removeAttr('disabled');
        $('#sub_problem').append('<option value="1" <?php if($se2 == '1' ){echo "selected";} ?> style="width:250px">ผู้ติดเชื้อเอชไอวี</option>');
        $('#sub_problem').append('<option value="2" <?php if($se2 == '2' ){echo "selected";} ?> style="width:250px">กลุ่มเปราะบาง</option>');
        $('#sub_problem').append('<option value="4" style="width:250px">ครอบครัวและผู้ใกล้ชิดผู้ติดเชื้อเอชไอวี</option>');
        $('#sub_problem').append('<option value="3" style="width:250px">ประชาชนทั่วไป</option>');
    }else if(prob_id==2){
        $('#sub_problem').empty();
        $('#sub_problem').removeAttr('disabled');
        $('#sub_problem').append('<option value="1" <?php if($se2 == '1' ){echo "selected";} ?>>ผู้ติดเชื้อเอชไอวี</option>');
    }else if(prob_id==3){
        $('#sub_problem').empty();
        $('#sub_problem').removeAttr('disabled');
        $('#sub_problem').append('<option value="1" >ผู้ติดเชื้อเอชไอวี</option>');
        $('#sub_problem').append('<option value="4" >ครอบครัวและผู้ใกล้ชิดผู้ติดเชื้อเอชไอวี</option>');
    }else if(prob_id==4){
        $('#sub_problem').empty();
        $('#sub_problem').removeAttr('disabled');
        $('#sub_problem').append('<option value="2" style="width:250px">กลุ่มเปราะบาง</option>');
        $('#group_code').empty();
        $('#group_code').removeAttr('disabled');
        $('#group_code').append('<option value="1" style="width:250px">กลุ่มหลากหลายทางเพศ</option>');
        $('#group_code').append('<option value="2" style="width:250px">พนักงานบริการ </option>');
        $('#group_code').append('<option value="3" style="width:250px">ผู้ใช้สารเสพติด</option>');
        $('#group_code').append('<option value="4" style="width:250px">ประชากรข้ามชาติ</option>');
        $('#group_code').append('<option value="5" style="width:250px">ผู้ถูกคุมขัง</option>');
        $('#group_code').append('<option value="7" style="width:250px">กลุ่มชาติพันธุ์และชนเผ่า</option>');


    }else{
        $('#sub_problem').empty();
        $('#sub_problem').attr('disabled', 'disabled');
    }
});
$('#sub_problem').on('change',function (e) {
    var sub_id = e.target.value;
    if(sub_id==2){
        $('#group_code').empty();
        $('#group_code').removeAttr('disabled');
        $('#group_code').append('<option value="1" <?php if($se3 == '1' ){echo "selected";} ?> style="width:250px">กลุ่มหลากหลายทางเพศ</option>');
        $('#group_code').append('<option value="2" <?php if($se3 == '2' ){echo "selected";} ?>style="width:250px">พนักงานบริการ</option>');
        $('#group_code').append('<option value="3" style="width:250px">ผู้ใช้สารเสพติด</option>');
        $('#group_code').append('<option value="4" style="width:250px">ประชากรข้ามชาติ</option>');
        $('#group_code').append('<option value="5" style="width:250px">ผู้ถูกคุมขัง</option>');
        $('#group_code').append('<option value="7" style="width:250px">กลุ่มชาติพันธุ์และชนเผ่า</option>');


    }else{
        $('#group_code').empty();
        $('#group_code').attr('disabled', 'disabled');
    }
});
        </script>
</body>

</html>