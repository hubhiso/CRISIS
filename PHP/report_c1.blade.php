
<!DOCTYPE html>
<html lang="en" class="route-index">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<title>CRS</title>
	<link rel="shortcut icon" href="http://localhost:8888/crisis/public/images/favicon.ico">
	<link href="../public/css/font-awesome5.0.6/css/fontawesome-all.css" rel="stylesheet">
	<link rel="stylesheet" href="../public/bulma/css/bulma.css">

	<link media="all" type="text/css" rel="stylesheet" href="http://localhost:8888/crisis/public/bootstrap-datepicker/css/bootstrap-datepicker.min.css">
	<link media="all" type="text/css" rel="stylesheet" href="http://localhost:8888/crisis/public/bootstrap/css/bootstrap.css">

	<meta name="theme-color" content="#cc99cc"/>
	
	<script src="http://localhost:8888/crisis/public/js/jquery.min.js"></script>
	<script src="http://localhost:8888/crisis/public/bootstrap/js/bootstrap.min.js"></script>
	<script src="http://localhost:8888/crisis/public/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

	<link href="http://localhost:8888/crisis/public/bulma/css/bulma.css" rel="stylesheet">
	<link href="http://localhost:8888/crisis/public/css/font-awesome5.0.6/css/fontawesome-all.css" rel="stylesheet">

	<style>
		.hideextra { white-space: nowrap; overflow: hidden; text-overflow:ellipsis; }
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
		$sub_q = ' and problem_case = '.$p_case.' ';
	   }

	?>


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
						<li >
							<a href="table.blade.php">
                                <span class="icon is-small"><i class="far fa-file-alt" aria-hidden="true"></i></span>
                                <span>ตารางสรุป<br>ในภาพรวม</span>
                            </a>
						</li>
						<li class="is-active">
							<a href="report_c1.blade.php">
                                <span class="icon is-small"><i class="far fa-file-alt" aria-hidden="true"></i></span>
                                <span>ตารางสรุปการ<br>จัดการเหตุรายหน่วย</span>
                            </a>
						</li>
						<li >
							<a href="report_c2.blade.php">
					    <span class="icon is-small"><i class="far fa-file-alt" aria-hidden="true"></i></span>
						<span>ตารางสรุป<br>การละเมิดสิทธิ์</span>
					</a>
						
						</li>
						<li >
							<a href="mapcrisis.blade.php">
								<span class="icon is-small"><i class="far fa-map" aria-hidden="true"></i></span>
								<span>แผนที่สรุป<br>การละเมิดสิทธิ์</span>
							</a>
						
						</li>
						<li >
							<a href="dashboard3.blade.php">
						<span class="icon is-small"><i class="fas fa-chart-bar" aria-hidden="true"></i></span>
						<span> กราฟแสดงข้อมูล<br>แยกตามประเด็น </span>
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
				<p class="title">รายงานการสรุปการจัดการเหตุละเมิดสิทธิ <br>จำแนกรายหน่วยจัดการเหตุ</p>

				<form name="form_menu" method="post" action="report_c1.blade.php">
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
											<option value="0" <?php if ($p_case == "0") { echo "selected";} ?>> ทุกกรณี </option>
											<option value="1" <?php if ($p_case == "1") { echo "selected";} ?>> บังคับตรวจเอชไอวี </option>
											<option value="2" <?php if ($p_case == "2") { echo "selected";} ?>> เปิดเผยสถานะ<br>การติดเชื้อเอชไอวี </option>
											<option value="3" <?php if ($p_case == "3") { echo "selected";} ?>> ถูกกีดกันหรือถูกเลือกปฏิบัติ<br>เนื่องมาจากกการติดเชื้อเอชไอวี </option>
											<option value="4" <?php if ($p_case == "4") { echo "selected";} ?>> ถูกกีดกันหรือถูกเลือกปฏิบัติ<br>เนื่องมาจากเป็นกลุ่มเปราะบาง </option>
											<option value="5" <?php if ($p_case == "5") { echo "selected";} ?>> กรณีที่อื่นๆ<br>ที่เกี่ยวข้องกับเอชไอวี </option>
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
                
				<p class="subtitle is-6">คลิกที่ตารางแล้วกดปุ่ม ซ้าย-ขวา เพื่อเลื่อนดูข้อมูล</p>
                <div class="table-container">
				<table class="table hideextra is-bordered is-striped is-narrow is-hoverable">
					<thead>
						<tr class="hideextra">
						<th>ลำดับ</th>
						<th>ชื่อ</th>
						<th>จังหวัด</th>
						<th>เขต</th>
						<th>ยังไม่ได้รับเรื่อง</th>
						<th>รับเรื่องแล้ว</th>
						<th>บันทึกข้อมูลเพิ่มเติมแล้ว</th>
						<th>อยู่ระหว่างดำเนินการ</th>
						<th>ดำเนินการเสร็จสิ้น</th>
						<th>ส่งต่อ</th>
						<th>ทั้งหมด</th>
						</tr>
					</thead>
					<tbody>
						<?php

							$sql1 = "SELECT o.id, o.name, o.nameorg, o.prov_id, p.name as provname, nhso
							FROM officers o left join prov_geo p
							on p.code = o.prov_id 
							where
							position = 'officer' or o.name = 'adminfar'
							order by prov_id";
							$result1 = mysqli_query($conn, $sql1); 
							$row1 = mysqli_num_rows($result1); 
							$i = '0';
							while($row1 = $result1->fetch_assoc()) {

								$sql2 = "SELECT receiver,
								sum(CASE WHEN status = '1' THEN 1 ELSE 0 END) as case1,
								sum(CASE WHEN status = '2' THEN 1 ELSE 0 END) as case2,
								sum(CASE WHEN status = '3' THEN 1 ELSE 0 END) as case3,
								sum(CASE WHEN status = '4' THEN 1 ELSE 0 END) as case4,
								sum(CASE WHEN status = '5' THEN 1 ELSE 0 END) as case5,
								sum(CASE WHEN status = '6' THEN 1 ELSE 0 END) as case6,
								count(status) as sum
								FROM case_inputs
								where receiver='".$row1['name']."'
								and created_at >= '".date("Y/m/d", strtotime($date_start))."' and created_at <= '".date("Y/m/d", strtotime($date_end))."'
								$sub_q
								group by receiver";

								//echo $sql2,'<br>';

								$result2 = mysqli_query($conn, $sql2); 
								$row2 = mysqli_num_rows($result2); 
								$i++;
								if ($result2->num_rows > 0) {
									
									// output data of each row
									while($row2 = $result2->fetch_assoc()) {
										
										//echo $row['receiver'];
										$sql3 = "SELECT username,officers.nameorg, prov_geo.code, prov_geo.name as provname, prov_geo.nhso 
										FROM officers left join prov_geo 
										on officers.prov_id = prov_geo.code
										WHERE officers.name = '".$row2['receiver']."'";
										//echo $sql2;
										$result3 = mysqli_query($conn, $sql3); 

										$row3 = mysqli_num_rows($result3);
										$row3 = $result3->fetch_assoc();

										//echo $row2["prov_id"];
										
										echo "<tr>";
										echo "<th>".$i."</th>";
										echo "<td>".$row3["nameorg"]."</td>";
										echo "<td>".$row3["provname"]."</td>";
										echo "<td>".$row3["nhso"]."</td>";
										echo "<td>".$row2["case1"]."</td>";
										echo "<td>".$row2["case2"]."</td>";
										echo "<td>".$row2["case3"]."</td>";
										echo "<td>".$row2["case4"]."</td>";
										echo "<td>".$row2["case5"]."</td>";
										echo "<td>".$row2["case6"]."</td>";
										echo "<td>".$row2["sum"]."</td>";
										
										echo "</tr>";
									}

									
								} else {
									echo "<tr>";
										echo "<th>".$i."</th>";
										echo "<td>".$row1["nameorg"]."</td>";
										echo "<td>".$row1["provname"]."</td>";
										echo "<td>".$row1["nhso"]."</td>";
										echo "<td>0</td>";
										echo "<td>0</td>";
										echo "<td>0</td>";
										echo "<td>0</td>";
										echo "<td>0</td>";
										echo "<td>0</td>";
										echo "<td>0</td>";
										
										echo "</tr>";
								}

							}
							echo "</tbody>";
							echo "</table>";
							echo "Showing 1 to $i of $i entries";

							$conn->close();
						?>
			</div>
        </div>
		<br>
        </section>

</body>


	
<script src="http://localhost:8888/crisis/public/bulma/clipboard-1.7.1.min.js"></script>
	<script src="http://localhost:8888/crisis/public/bulma/main.js"></script>

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

</html>