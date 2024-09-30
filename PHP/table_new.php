<!DOCTYPE html>
<html dir="ltr" lang="en-US">
   <head>
      <meta charset="UTF-8" />
      <title>Crisis Response System (CRS)</title>
      <link rel="shortcut icon" href="../public/favicon.ico">
      <!--link href="bootstrap.min.css" rel="stylesheet"-->
      <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
        <!--link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"-->
      <link rel="stylesheet" type="text/css" media="all" href="daterangepicker.css" />
      <script type="text/javascript" src="jquery-1.11.3.min.js"></script>
      <script type="text/javascript" src="bootstrap.min.js"></script>
      <script type="text/javascript" src="moment.js"></script>
      <script type="text/javascript" src="daterangepicker.js"></script>
      <link rel="stylesheet" type="text/css" href="css_table.css">

      <link href="report.css" rel="stylesheet">

      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" crossorigin="anonymous">
    
      
      <?php
       $class = $_POST["class1"];
	   //$class = "1";
	   $date1 = $_POST["date1"];
	   
	   $status_array = $_POST["status"];
	   $region_array = $_POST["region"];
	   $province_array = $_POST["province"];
	   $gender_array = $_POST["gender"];
	   $age_array = $_POST["age"];
	   $occ_array = $_POST["occ"];
	   $office_array = $_POST["office"];
	   
	   $arr = explode(':', $status_array);
	   $i = 1;
	   foreach ($arr as $value) {
		   	if ($i == 1){
				$status = $value;
			}else{
    			$status_text = $value;
			}
			$i++;
			
	    }
		
	   $arr = explode(':', $region_array);
	   $i = 1;
	   foreach ($arr as $value) {
		   	if ($i == 1){
				$region = $value;
				$region_text = $value;
			}else{
    			//$region_text = $value;
				$province_from_region .= " or (prov_id = '$value')";
			}
			$i++;
			
	    }
	   
	   $arr = explode(':', $province_array);
	   $i = 1;
	   foreach ($arr as $value) {
		   	if ($i == 1){
				$province = $value;
			}else{
    			$province_text = $value;
			}
			$i++;
			
	    }
		
	   $arr = explode(':', $gender_array);
	   $i = 1;
	   foreach ($arr as $value) {
		   	if ($i == 1){
				$gender = $value;
			}else{
    			$gender_text = $value;
			}
			$i++;
			
	    }
		
	   $arr = explode(':', $age_array);
	   $i = 1;
	   foreach ($arr as $value) {
		   	if ($i == 1){
				$age = $value;
			}else if($i == 2){
    			$age_text = $value;
			}else if($i == 3){
    			$age_max = $value;
			}else if($i == 4){
    			$age_min = $value;
			}
			$i++;
			
	    }
		
	  $arr = explode(':', $occ_array);
	   $i = 1;
	   foreach ($arr as $value) {
		   	if ($i == 1){
				$occ = $value;
			}else{
    			$occ_text = $value;
			}
			$i++;
			
	    }
		
		
	   $arr = explode(':', $office_array);
	   $i = 1;
	   foreach ($arr as $value) {
		   	if ($i == 1){
				$office = $value;
			}else{
    			$office_text = $value;
			}
			$i++;
			
	    }
		
		
			
	   
	   //$arr = explode(':', $province_array);
	   
	   
	   //echo "arr=".$arr;
	   
	   
	   //echo "gender=".$gender;
	   
	   // สถานะ
	   if (($status != "00") && ($status != "")){
	   	$fillter .= " and (status = '$status')";
	   }
	   // เพศ
	   if (($gender != "00") && ($gender != "")){
	   	$fillter .= " and (sex = '$gender')";
	   }
	   
	   // อายุ
	   
	   if (($age != "00") && ($age != "")) {
	   	$fillter .= " and (year(birth_date) BETWEEN (year(curdate())-$age_max) and year(curdate())-$age_min)";
	   }
	   
	   
	   // จังหวัด
	   if (($region != "00") && ($region != "")){
	   	$fillter .= " and (".substr($province_from_region,4,200).")";
	   }
	   
	   
	   // จังหวัด
	   if (($province != "00") && ($province != "")){
	   	$fillter .= " and (prov_id = '$province')";
	   }
	   
	   // อาชีพ
	   if (($occ != "00") && ($occ != "")){
	   	$fillter .= " and (occupation = '$occ')";
	   }
	   // หน่วยงานผู้ละเมิด
	   if (($office != "00") && ($office != "")){
	   	$fillter .= " and (type_offender = '$office')";
	   }
	   
	   
	   
	   $mm_start = substr($date1,0,2);
	   $dd_start = substr($date1,3,2);
	   $yy_start = substr($date1,6,4);
	   
	   
	   //echo $date1;
	   $mm_stop = substr($date1,13,2);
	   $dd_stop = substr($date1,16,2);
	   $yy_stop = substr($date1,19,4);
	   
	   $date_start = $yy_start."-".$mm_start."-".$dd_start;
	   //echo $date_start."<br>";
	   $date_stop = $yy_stop."-".$mm_stop."-".$dd_stop;
	   //echo $date_stop;
	   $fillter .= " and (date(c.created_at) between '$date_start' and '$date_stop')";

	   
	   //require("phpsql_dbinfo.php");

       require("phpsqli_dbinfo.php");
      ?>
      <script type="text/javascript">
		function Listselect(SelectValue)

		{
			
			if(SelectValue==1){
			document.form_menu.status.disabled=true; 
			document.form_menu.region.disabled=false;
			document.form_menu.province.disabled=false; 
			document.form_menu.gender.disabled=false;
			document.form_menu.age.disabled=false;
			document.form_menu.occ.disabled=false;
			document.form_menu.office.disabled=false;
			}
			else if ((SelectValue==2) || (SelectValue==3)){
			document.form_menu.status.disabled=false; 
			document.form_menu.region.disabled=true;
			document.form_menu.province.disabled=true; 
			document.form_menu.gender.disabled=false;
			document.form_menu.age.disabled=false;
			document.form_menu.occ.disabled=false;
			document.form_menu.office.disabled=false;
			}
			else if (SelectValue==4) {
			document.form_menu.status.disabled=false; 
			document.form_menu.region.disabled=false;
			document.form_menu.province.disabled=false; 
			document.form_menu.gender.disabled=true;
			document.form_menu.age.disabled=false;
			document.form_menu.occ.disabled=false;
			document.form_menu.office.disabled=false;
			}
			else if (SelectValue==5) {
			document.form_menu.status.disabled=false; 
			document.form_menu.region.disabled=false;
			document.form_menu.province.disabled=false; 
			document.form_menu.gender.disabled=false;
			document.form_menu.age.disabled=true;
			document.form_menu.occ.disabled=false;
			document.form_menu.office.disabled=false;
			}
			else if (SelectValue==6) {
			document.form_menu.status.disabled=false; 
			document.form_menu.region.disabled=false;
			document.form_menu.province.disabled=false; 
			document.form_menu.gender.disabled=false;
			document.form_menu.age.disabled=false;
			document.form_menu.occ.disabled=true;
			document.form_menu.office.disabled=false;
			}
			else if (SelectValue==7) {
			document.form_menu.status.disabled=false; 
			document.form_menu.region.disabled=false;
			document.form_menu.province.disabled=false; 
			document.form_menu.gender.disabled=false;
			document.form_menu.age.disabled=false;
			document.form_menu.occ.disabled=false;
			document.form_menu.office.disabled=true;
			}


			else{
				
				
				/*
				initListGroup('subgroupmenu', document.selectfrm.select4, document.selectfrm.sg,'savestate1');
				initListGroup('groupngo', document.selectfrm.selectngo, document.selectfrm.selectsubngo,'savestatengo');
				*/
				}
		
		} 
		
		
		function Listselect_region(SelectValue2)

		{
			if (SelectValue2 == ""){
				document.form_menu.province.disabled=false; 
			}else if (SelectValue2 == "00"){
				document.form_menu.province.disabled=false; 
			}else if (SelectValue2 != "00"){
				document.form_menu.province.disabled=true; 
			}
			
		}
		
		function Listselect_province(SelectValue3)

		{
			if (SelectValue3 == ""){
				document.form_menu.region.disabled=false; 
			}else if (SelectValue3 == "00"){
				document.form_menu.region.disabled=false; 
			}else if (SelectValue3 != "00"){
				document.form_menu.region.disabled=true; 
			}
			
		}
		
        </script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
     <!--link rel="stylesheet" type="text/css" href="DataTables/media/css/jquery.dataTables.css"-->
   </head>
   <?php 
   if ($region == ""){
		$region_listselect = "00";   
   }else{
	   $region_listselect = $region;
   }
   
   if ($province == ""){
		$province_listselect = "00";   
   }else{
	   $province_listselect = $province;
   }
   
   
   ?>
   <body class="bg-light" style="margin: 0px 0" onload ="Listselect(<?php if ($class == ""){ echo "1";}else{ echo $class;}?>);<?php if ($class != "2") {?>Listselect_region(<?php echo $region_listselect; ?>);Listselect_province(<?php echo $province_listselect; ?>);<?php } ?>">
   <!--body style="margin: 20px 0"-->

   

   <nav class="navbar navbar-light bg-white mt-0">
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

        <div class="text-center p-4">
            <div class="btn-group btn-group-toggle my-auto flex-wrap  ">

                <div class="dropdown tabtype btn ">
                    <a class="dropdown-toggle textcolor1 p-1" type="button" id="dropdownMenu1" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-chart-bar">&nbsp;</i> Dashboard สรุปสถานการณ์
                    </a>
                    <div class="dropdown-menu color-h3 bg-gradient" aria-labelledby="dropdownMenu1">
                        <a class="dropdown-item " id="dropdown-layouts" href="dashboard3_new.php">
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

                <a href="mapcrisis_new.php" class="btn tabtype ">
                    <div class="p-1">
                        <i class="fas fa-map">&nbsp;</i> พิกัดจุดเกิดเหตุ
                    </div>
                </a>

                <div class="dropdown tabtype btn active">
                    <a class="dropdown-toggle textcolor1 p-1" type="button" id="dropdownMenu1" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-table">&nbsp;</i> สรุปข้อมูลภาพรวม
                    </a>
                    <div class="dropdown-menu color-h3 bg-gradient" aria-labelledby="dropdownMenu1">
                        <a class="dropdown-item active" id="dropdown-layouts" href="table_new.php">
                            ภาพรวม</a>

                        <div class="dropdown dropright">
                            <a class="dropdown-item dropdown-toggle custom-dropdown" id="dropdown-layouts" data-toggle="dropdown"
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

    </div>

      <div class="container">

        <div class="text-center">
        <h3 style="margin: 0 0 20px 0">รายงาน Crisis Response System (CRS) </h3>
        </div>
        

        <!--div class="well configurator">
           
          <form>
          <div class="row">
          
          
          </div>
          </form>

        </div-->
		 <form name="form_menu" method="post">

        <div class="row border p-4 rounded-3 bg-white">
        
        
        <div class="col-md-2 order-2">
            <h6>เลือกวันที่</h6>
            <div class="form-group">
            	<input type="text" id="date1" name="date1" class="form-control" value="<?php if ($date1 != "") echo $date1;?>">
                <?php //echo "date1=".$date1;?>
            	<!--i class="glyphicon glyphicon-calendar fa fa-calendar"></i-->
            </div>
          <!--/div-->
          
          
          <br>
          <!--div class="col-md-4"-->
            <h6>จำแนกตาม</h6>
				<div class="form-group">
                <select id="class1" name="class1" onchange = "Listselect(this.value);" class="form-control" >
                  <option value=1 <?php if ($class == "1") { echo "selected";} ?>>สถานะ</option>
                  <option value=2 <?php if ($class == "2") { echo "selected";} ?>>เขตสุขภาพ</option>
                  <option value=4 <?php if ($class == "4") { echo "selected";} ?>>เพศ</option>
                  <option value=5 <?php if ($class == "5") { echo "selected";} ?>>อายุ</option>
                  <option value=6 <?php if ($class == "6") { echo "selected";} ?>>อาชีพ</option>
                  <option value=7 <?php if ($class == "7") { echo "selected";} ?>>หน่วยงานผู้ละเมิด</option>
                  
                </select>
              </div>
         <!--/div-->
           
              
          <!--div class="col-sm-3"-->  
          <br>
          	<h6>ตัวกรอง</h6> 
              <div class="form-group">
                <select id="status" name="status" class="form-control" disabled>
                  <option value="00" <?php if ($status == "00") { echo "selected";} ?>>สถานะ (ทุกสถานะ)</option>
                  <option value="1:ยังไม่ได้รับเรื่อง" <?php if ($status == "1") { echo "selected";} ?>>ยังไม่ได้รับเรื่อง</option>
                  <option value="2:รับเรื่องแล้ว" <?php if ($status == "2") { echo "selected";} ?>>รับเรื่องแล้ว</option>
                  <option value="3:บันทึกข้อมูลเพิ่มเติมแล้ว" <?php if ($status == "3") { echo "selected";} ?>>บันทึกข้อมูลเพิ่มเติมแล้ว</option>
                  <option value="4:อยู่ระหว่างดำเนินการ" <?php if ($status == "4") { echo "selected";} ?>>อยู่ระหว่างดำเนินการ</option>
                  <option value="5:ดำเนินการเสร็จสิ้น" <?php if ($status == "5") { echo "selected";} ?>>ดำเนินการเสร็จสิ้น</option>
                  <option value="6:ดำเนินการแล้วส่งต่อ" <?php if ($status == "6") { echo "selected";} ?>>ดำเนินการแล้วส่งต่อ</option>
                 
                  
                </select>
              </div>
              
               <div class="form-group">
                <select id="region" name="region" class="form-control" onchange = "Listselect_region(this.value);" disabled>
                    <option value="00" <?php if ($region == "00") { echo "selected";} ?>>เขต</option>
                  	<option value="1:57:50:55:56:54:58:52:51" <?php if ($region == "1") { echo "selected";} ?>>1</option>
                    <option value="2:63:65:67:64:53" <?php if ($region == "2") { echo "selected";} ?>>2</option>
                    <option value="3:62:18:60:66:61" <?php if ($region == "3") { echo "selected";} ?>>3</option>
                    <option value="4:26:12:13:14:16:19:17:15" <?php if ($region == "4") { echo "selected";} ?>>4</option>
                    <option value="5:71:73:77:76:70:75:74:72" <?php if ($region == "5") { echo "selected";} ?>>5</option>
                    <option value="6:22:24:20:23:25:21:11:27" <?php if ($region == "6") { echo "selected";} ?>>6</option>
                    <option value="7:46:40:44:45" <?php if ($region == "7") { echo "selected";} ?>>7</option>
                    <option value="8:48:38:42:47:43:39:41" <?php if ($region == "8") { echo "selected";} ?>>8</option>
                    <option value="9:36:30:31:32" <?php if ($region == "9") { echo "selected";} ?>>9</option>
                    <option value="10:49:35:33:37:34" <?php if ($region == "10") { echo "selected";} ?>>10</option>
                    <option value="11:81:86:80:82:83:85:84" <?php if ($region == "11") { echo "selected";} ?>>11</option>
                    <option value="12:92:96:94:93:95:90:91" <?php if ($region == "12") { echo "selected";} ?>>12</option>
                    <option value="13:10" <?php if ($region == "13") { echo "selected";} ?>>13</option>
                </select>
              </div>
              
                <div class="form-group">
                <select id="province" name="province" class="form-control" onchange = "Listselect_province(this.value);" disabled >				  
                  <option value="00" <?php if ($province == "00") { echo "selected";} ?>>จังหวัด (ทุกจังหวัด)</option>                
                    <option value="81:กระบี่" <?php if ($province == "81") { echo "selected";} ?>>กระบี่</option>
                    <option value="10:กรุงเทพมหานคร" <?php if ($province == "10") { echo "selected";} ?>>กรุงเทพมหานคร</option>
                    <option value="71:กาญจนบุรี" <?php if ($province == "71") { echo "selected";} ?>>กาญจนบุรี</option>
                    <option value="46:กาฬสินธุ์" <?php if ($province == "46") { echo "selected";} ?>>กาฬสินธุ์</option>
                    <option value="62:กำแพงเพชร" <?php if ($province == "62") { echo "selected";} ?>>กำแพงเพชร</option>
                    <option value="40:ขอนแก่น" <?php if ($province == "40") { echo "selected";} ?>>ขอนแก่น</option>
                    <option value="22:จันทบุรี" <?php if ($province == "22") { echo "selected";} ?>>จันทบุรี</option>
                    <option value="24:ฉะเชิงเทรา" <?php if ($province == "24") { echo "selected";} ?>>ฉะเชิงเทรา</option>
                    <option value="20:ชลบุรี" <?php if ($province == "20") { echo "selected";} ?>>ชลบุรี</option>
                    <option value="18:ชัยนาท" <?php if ($province == "18") { echo "selected";} ?>>ชัยนาท</option>
                    <option value="36:ชัยภูมิ" <?php if ($province == "36") { echo "selected";} ?>>ชัยภูมิ</option>
                    <option value="86:ชุมพร" <?php if ($province == "86") { echo "selected";} ?>>ชุมพร</option>
                    <option value="57:เชียงราย" <?php if ($province == "57") { echo "selected";} ?>>เชียงราย</option>
                    <option value="50:เชียงใหม่" <?php if ($province == "50") { echo "selected";} ?>>เชียงใหม่</option>
                    <option value="92:ตรัง" <?php if ($province == "92") { echo "selected";} ?>>ตรัง</option>
                    <option value="23:ตราด" <?php if ($province == "23") { echo "selected";} ?>>ตราด</option>
                    <option value="63:ตาก" <?php if ($province == "63") { echo "selected";} ?>>ตาก</option>
                    <option value="26:นครนายก" <?php if ($province == "26") { echo "selected";} ?>>นครนายก</option>
                    <option value="73:นครปฐม" <?php if ($province == "73") { echo "selected";} ?>>นครปฐม</option>
                    <option value="48:นครพนม" <?php if ($province == "48") { echo "selected";} ?>>นครพนม</option>
                    <option value="30:นครราชสีมา" <?php if ($province == "30") { echo "selected";} ?>>นครราชสีมา</option>
                    <option value="80:นครศรีธรรมราช" <?php if ($province == "80") { echo "selected";} ?>>นครศรีธรรมราช</option>
                    <option value="60:นครสวรรค์" <?php if ($province == "60") { echo "selected";} ?>>นครสวรรค์</option>
                    <option value="12:นนทบุรี" <?php if ($province == "12") { echo "selected";} ?>>นนทบุรี</option>
                    <option value="96:นราธิวาส" <?php if ($province == "96") { echo "selected";} ?>>นราธิวาส</option>
                    <option value="55:น่าน" <?php if ($province == "55") { echo "selected";} ?>>น่าน</option>
                    <option value="38:บึงกาฬ" <?php if ($province == "38") { echo "selected";} ?>>บึงกาฬ</option>
                    <option value="31:บุรีรัมย์" <?php if ($province == "31") { echo "selected";} ?>>บุรีรัมย์</option>
                    <option value="13:ปทุมธานี" <?php if ($province == "13") { echo "selected";} ?>>ปทุมธานี</option>
                    <option value="77:ประจวบคีรีขันธ์" <?php if ($province == "77") { echo "selected";} ?>>ประจวบคีรีขันธ์</option>
                    <option value="25:ปราจีนบุรี" <?php if ($province == "25") { echo "selected";} ?>>ปราจีนบุรี</option>
                    <option value="94:ปัตตานี" <?php if ($province == "94") { echo "selected";} ?>>ปัตตานี</option>
                    <option value="14:พระนครศรีอยุธยา" <?php if ($province == "14") { echo "selected";} ?>>พระนครศรีอยุธยา</option>
                    <option value="56:พะเยา" <?php if ($province == "56") { echo "selected";} ?>>พะเยา</option>
                    <option value="82:พังงา" <?php if ($province == "82") { echo "selected";} ?>>พังงา</option>
                    <option value="93:พัทลุง" <?php if ($province == "93") { echo "selected";} ?>>พัทลุง</option>
                    <option value="66:พิจิตร" <?php if ($province == "66") { echo "selected";} ?>>พิจิตร</option>
                    <option value="65:พิษณุโลก" <?php if ($province == "65") { echo "selected";} ?>>พิษณุโลก</option>
                    <option value="76:เพชรบุรี" <?php if ($province == "76") { echo "selected";} ?>>เพชรบุรี</option>
                    <option value="67:เพชรบูรณ์" <?php if ($province == "67") { echo "selected";} ?>>เพชรบูรณ์</option>
                    <option value="54:แพร่" <?php if ($province == "54") { echo "selected";} ?>>แพร่</option>
                    <option value="83:ภูเก็ต" <?php if ($province == "83") { echo "selected";} ?>>ภูเก็ต</option>
                    <option value="44:มหาสารคาม" <?php if ($province == "44") { echo "selected";} ?>>มหาสารคาม</option>
                    <option value="49:มุกดาหาร" <?php if ($province == "49") { echo "selected";} ?>>มุกดาหาร</option>
                    <option value="58:แม่ฮ่องสอน" <?php if ($province == "58") { echo "selected";} ?>>แม่ฮ่องสอน</option>
                    <option value="35:ยโสธร" <?php if ($province == "35") { echo "selected";} ?>>ยโสธร</option>
                    <option value="95:ยะลา" <?php if ($province == "95") { echo "selected";} ?>>ยะลา</option>
                    <option value="45:ร้อยเอ็ด" <?php if ($province == "45") { echo "selected";} ?>>ร้อยเอ็ด</option>
                    <option value="85:ระนอง" <?php if ($province == "85") { echo "selected";} ?>>ระนอง</option>
                    <option value="21:ระยอง" <?php if ($province == "21") { echo "selected";} ?>>ระยอง</option>
                    <option value="70:ราชบุรี" <?php if ($province == "70") { echo "selected";} ?>>ราชบุรี</option>
                    <option value="16:ลพบุรี" <?php if ($province == "16") { echo "selected";} ?>>ลพบุรี</option>
                    <option value="52:ลำปาง" <?php if ($province == "52") { echo "selected";} ?>>ลำปาง</option>
                    <option value="51:ลำพูน" <?php if ($province == "51") { echo "selected";} ?>>ลำพูน</option>
                    <option value="42:เลย" <?php if ($province == "42") { echo "selected";} ?>>เลย</option>
                    <option value="33:ศรีสะเกษ" <?php if ($province == "33") { echo "selected";} ?>>ศรีสะเกษ</option>
                    <option value="47:สกลนคร" <?php if ($province == "47") { echo "selected";} ?>>สกลนคร</option>
                    <option value="90:สงขลา" <?php if ($province == "90") { echo "selected";} ?>>สงขลา</option>
                    <option value="91:สตูล" <?php if ($province == "91") { echo "selected";} ?>>สตูล</option>
                    <option value="11:สมุทรปราการ" <?php if ($province == "11") { echo "selected";} ?>>สมุทรปราการ</option>
                    <option value="75:สมุทรสงคราม" <?php if ($province == "75") { echo "selected";} ?>>สมุทรสงคราม</option>
                    <option value="74:สมุทรสาคร" <?php if ($province == "74") { echo "selected";} ?>>สมุทรสาคร</option>
                    <option value="27:สระแก้ว" <?php if ($province == "27") { echo "selected";} ?>>สระแก้ว</option>
                    <option value="19:สระบุรี" <?php if ($province == "19") { echo "selected";} ?>>สระบุรี</option>
                    <option value="17:สิงห์บุรี" <?php if ($province == "17") { echo "selected";} ?>>สิงห์บุรี</option>
                    <option value="64:สุโขทัย" <?php if ($province == "64") { echo "selected";} ?>>สุโขทัย</option>
                    <option value="72:สุพรรณบุรี" <?php if ($province == "72") { echo "selected";} ?>>สุพรรณบุรี</option>
                    <option value="84:สุราษฎร์ธานี" <?php if ($province == "84") { echo "selected";} ?>>สุราษฎร์ธานี</option>
                    <option value="32:สุรินทร์" <?php if ($province == "32") { echo "selected";} ?>>สุรินทร์</option>
                    <option value="43:หนองคาย" <?php if ($province == "43") { echo "selected";} ?>>หนองคาย</option>
                    <option value="39:หนองบัวลำภู" <?php if ($province == "39") { echo "selected";} ?>>หนองบัวลำภู</option>
                    <option value="15:อ่างทอง" <?php if ($province == "15") { echo "selected";} ?>>อ่างทอง</option>
                    <option value="37:อำนาจเจริญ" <?php if ($province == "37") { echo "selected";} ?>>อำนาจเจริญ</option>
                    <option value="41:อุดรธานี" <?php if ($province == "41") { echo "selected";} ?>>อุดรธานี</option>
                    <option value="53:อุตรดิตถ์" <?php if ($province == "53") { echo "selected";} ?>>อุตรดิตถ์</option>
                    <option value="61:อุทัยธานี" <?php if ($province == "61") { echo "selected";} ?>>อุทัยธานี</option>
                    <option value="34:อุบลราชธานี" <?php if ($province == "34") { echo "selected";} ?>>อุบลราชธานี</option>         
                </select>
          		</div>
                
                <div class="form-group">
                <select id="gender" name="gender" class="form-control" disabled>				  
                  <option value="00" <?php if ($gender == "00") { echo "selected";} ?>>เพศ (ทั้งหมด)</option>
                  <option value="1:ชาย" <?php if ($gender == "1") { echo "selected";} ?>>ชาย</option>
                  <option value="2:หญิง" <?php if ($gender == "2") { echo "selected";} ?>>หญิง</option>       
                  <option value="3:สาวประเภทสอง" <?php if ($gender == "3") { echo "selected";} ?>>สาวประเภทสอง</option>     
                  <option value="4:อื่น ๆ" <?php if ($gender == "4") { echo "selected";} ?>>อื่น ๆ</option>                
                </select>
          		</div>
                
                <div class="form-group">
                <select id="age" name="age" class="form-control" disabled>				  
                  <option value="00" <?php if ($age == "00") { echo "selected";} ?>>อายุ (ทั้งหมด)</option>
                  <option value="1:0-4:4:0" <?php if ($age == "1") { echo "selected";} ?>>0-4</option>
                  <option value="2:5-9:9:5" <?php if ($age == "2") { echo "selected";} ?>>5-9</option>
                  <option value="3:10-14:14:10" <?php if ($age == "3") { echo "selected";} ?>>10-14</option>
                  <option value="4:15-19:19:15" <?php if ($age == "4") { echo "selected";} ?>>15-19</option>    
                  <option value="5:20-24:24:20" <?php if ($age == "5") { echo "selected";} ?>>20-24</option> 
                  <option value="6:25-34:34:25" <?php if ($age == "6") { echo "selected";} ?>>25-34</option>  
                  <option value="7:35-44:44:35" <?php if ($age == "7") { echo "selected";} ?>>35-44</option>
                  <option value="8:45-59:59:45" <?php if ($age == "8") { echo "selected";} ?>>45-59</option>   
                  <option value="9:60 ขึ้นไป:120:60" <?php if ($age == "9") { echo "selected";} ?>>60 ขึ้นไป</option>                          
                </select>
          		</div>


				<div class="form-group">
                <select id="occ" name="occ" class="form-control" disabled>				  
                  <option value="00" <?php if ($occ == "00") { echo "selected";} ?>>อาชีพ (ทั้งหมด)</option>
                  <option value="1:ทำงานในหน่วยงานราชการ" <?php if ($occ == "1") { echo "selected";} ?>>ทำงานในหน่วยงานราชการ</option>
                  <option value="2:ทำงานในบริษัทเอกชน" <?php if ($occ == "2") { echo "selected";} ?>>ทำงานในบริษัทเอกชน</option>
                  <option value="3:ทำงานในองค์กรพัฒนาเอกชน (NGO) " <?php if ($occ == "3") { echo "selected";} ?>>ทำงานในองค์กรพัฒนาเอกชน (NGO) </option>    
                  <option value="4:ธุรกิจส่วนตัว" <?php if ($occ == "4") { echo "selected";} ?>>ธุรกิจส่วนตัว</option> 
                  <option value="5:รับจ้างทั่วไป" <?php if ($occ == "5") { echo "selected";} ?>>รับจ้างทั่วไป</option>  
                  <option value="6:เกษตรกร" <?php if ($occ == "6") { echo "selected";} ?>>เกษตรกร</option>
                  <option value="7:นักเรียน/นักศึกษา" <?php if ($occ == "7") { echo "selected";} ?>>นักเรียน/นักศึกษา</option>   
                  <option value="8:ว่างงาน" <?php if ($occ == "8") { echo "selected";} ?>>ว่างงาน</option>  
                  <option value="9:อื่นๆ" <?php if ($occ == "9") { echo "selected";} ?>>อื่นๆ</option>                          
                </select>
          		</div>
                
               
                <div class="form-group">
                <select id="office" name="office" class="form-control">				  
                  <option value="00" <?php if ($office == "00") { echo "selected";} ?>>หน่วยงานผู้ละเมิด (ทั้งหมด)</option>
                  <option value="1:สถานพยาบาล" <?php if ($office == "1") { echo "selected";} ?>>สถานพยาบาล</option>
                  <option value="2:สถานที่ทำงาน" <?php if ($office == "2") { echo "selected";} ?>>สถานที่ทำงาน</option>
                  <option value="3:สถานศึกษา" <?php if ($office == "3") { echo "selected";} ?>>สถานศึกษา</option>    
                  <option value="4:ตำรวจ" <?php if ($office == "4") { echo "selected";} ?>>ตำรวจ</option>  
                  <option value="5:ทหาร" <?php if ($office == "5") { echo "selected";} ?>>ทหาร</option>  
                  <option value="6:ท้องถิ่น" <?php if ($office == "6") { echo "selected";} ?>>ท้องถิ่น</option>
                  <option value="7:หน่วยงานอื่นๆ" <?php if ($office == "7") { echo "selected";} ?>>หน่วยงานอื่นๆ</option>                           
                </select>
          		</div>
                <br>
                <input type="submit"  name = "submit" class="btn btn-success" value="ตกลง">

			<?php //echo "status=".$status."gender=".$gender."province=".$province."age=".$age."occ=".$occ."office=".$office;?>
            <?php //echo "status=".$status."status_text=".$status_text; ?>
            <?php //echo "region=".$region."region_text=".$region_text; ?>
            <?php //echo "province=".$province."province_text=".$province_text; ?>
            <?php //echo "gender=".$gender."gender_text=".$gender_text; ?>
            <?php //echo "age=".$age."age_text=".$age_text; ?>
            <?php //echo "occ=".$occ."occ_text=".$occ_text; ?>
            <?php //echo "office=".$office."office_text=".$office_text; ?>
        	</div>
        
        
        
        <?php 
         if ($class == "1"){	  
	  		
			$j_classifier = 7; // จำนวนตัวจำแนก + 1
			$cell_width = "10%";
			$head_col_num = "6";
			$classifier_name = "สถานะ";
			
			$th ="<td align='center' width='$cel_width'>ยังไม่ได้รับเรื่อง</td>
				<td align='center' width='$cel_width'>รับเรื่องแล้ว</td>
				<td align='center' width='$cel_width'>บันทึกข้อมูลเพิ่มเติมแล้ว</td>
				<td align='center' width='$cel_width'>อยู่ระหว่างดำเนินการ</td>
				<td align='center' width='$cel_width'>ดำเนินการเสร็จสิ้น</td>
				<td align='center' width='$cel_width'>ดำเนินการแล้วส่งต่อ</td>";   
				       
				
			$td ="<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>";   
			
			$dt_target = "1,2,3,4,5,6";
		
		}else if ($class == "4"){	  
	  		
			$j_classifier = 5; // จำนวนตัวจำแนก + 1
			$cell_width = "12%";
			$head_col_num = "4";
			
			$th ="<td align='center' width='$cell_width'>ชาย</td>
				<td align='center'  width='$cell_width'>หญิง</td>
				<td align='center'  width='$cell_width'>สาวประเภทสอง</td>
				<td align='center'  width='$cell_width'>อื่นๆ</td>";   
				       
				
			$td ="<td></td>
				<td></td>
				<td></td>
				<td></td>";   
			
			$dt_target = "1,2,3,4";
		}else if ($class == "6"){	 // อาชีพ  
	  		
			$j_classifier = 10; // จำนวนตัวจำแนก + 1
			$cell_width = "5%";
			$head_col_num = "9";
			$classifier_name = "อาชีพ";
			
			$th ="<td align='center' width='$cell_width'>ราชการ</td>
				<td align='center'  width='$cell_width'>เอกชน</td>
				<td align='center'  width='$cell_width'>NGO</td>
				<td align='center'  width='$cell_width'>ธุรกิจส่วนตัว</td>
				<td align='center'  width='$cell_width'>รับจ้างทั่วไป</td>
				<td align='center'  width='$cell_width'>เกษตรกร</td>
				<td align='center'  width='$cell_width'>นักเรียน, นักศึกษา</td>
				<td align='center'  width='$cell_width'>ว่างงาน</td>
				<td align='center'  width='$cell_width'>อื่นๆ</td>";   
				       
				
			$td ="<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>";   
			
			$dt_target = "1,2,3,4,5,6,7,8,9";
		}else if ($class == "7"){	  // ผู้ละเมิด
	  		
			$j_classifier = 8; // จำนวนตัวจำแนก + 1
			$cell_width = "8%";
			$head_col_num = "7";
			$classifier_name = "หน่วยงานผู้ละเมิด";
			
			$th ="<td align='center' width='$cell_width'>สถานพยาบาล</td>
				<td align='center'  width='$cell_width'>สถานที่ทำงาน</td>
				<td align='center'  width='$cell_width'>สถานศึกษา</td>
				<td align='center'  width='$cell_width'>ตำรวจ</td>
				<td align='center'  width='$cell_width'>ทหาร</td>
				<td align='center'  width='$cell_width'>ท้องถิ่น</td>
				<td align='center'  width='$cell_width'>อื่นๆ</td>";   
				       
				
			$td ="<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>";   
			
			$dt_target = "1,2,3,4,5,6,7";
		}else if ($class == "2"){	  // ผู้ละเมิด
	  		
			$j_classifier = 14; // จำนวนตัวจำแนก + 1
			$cell_width = "5%";
			$head_col_num = "13";
			$classifier_name = "เขต";
			
			$th ="<td align='center' width='$cell_width'>เขต 1</td>
				<td align='center' width='$cell_width'>เขต 2</td>
				<td align='center' width='$cell_width'>เขต 3</td>
				<td align='center' width='$cell_width'>เขต 4</td>
				<td align='center' width='$cell_width'>เขต 5</td>
				<td align='center' width='$cell_width'>เขต 6</td>
				<td align='center' width='$cell_width'>เขต 7</td>
				<td align='center' width='$cell_width'>เขต 8</td>
				<td align='center' width='$cell_width'>เขต 9</td>
				<td align='center' width='$cell_width'>เขต 10</td>
				<td align='center' width='$cell_width'>เขต 11</td>
				<td align='center' width='$cell_width'>เขต 12</td>
				<td align='center' width='$cell_width'>เขต 13</td>";   
				       
				
			$td ="<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>";   
			
			$dt_target = "1,2,3,4,5,6,7,8,9,10,11,12,13";
		}else if ($class == "5"){	 // อายุ  
	  		
			$j_classifier = 10; // จำนวนตัวจำแนก + 1
			$cell_width = "7%";
			$head_col_num = "9";
			$classifier_name = "กลุ่มอายุ";
			
			$th ="<td align='center' width='$cell_width'>0-4</td>
				<td align='center'  width='$cell_width'>5-9</td>
				<td align='center'  width='$cell_width'>10-14</td>
				<td align='center'  width='$cell_width'>15-19</td>
				<td align='center'  width='$cell_width'>20-24</td>
				<td align='center'  width='$cell_width'>25-34</td>
				<td align='center'  width='$cell_width'>35-44</td>
				<td align='center'  width='$cell_width'>45-59</td>
				<td align='center'  width='$cell_width'>60 ขี้นไป</td>";   
				       
				
			$td ="<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>";   
			
			$dt_target = "1,2,3,4,5,6,7,8,9";
		}
		
		
		?>
        
        <?php 
        if (isset($_POST["submit"])){
		
		    $strSQLstatus[] = "";
			
			$strSQLstatus[] = "";
			$strSQLstatus[] = " and sub_problem = '1'";
			$strSQLstatus[] = " and sub_problem = '2'";
			$strSQLstatus[] = " and sub_problem = '2' and group_code = '1'";
			$strSQLstatus[] = " and sub_problem = '2' and group_code = '2'";
			$strSQLstatus[] = " and sub_problem = '2' and group_code = '3'";
			$strSQLstatus[] = " and sub_problem = '2' and group_code = '4'";
			$strSQLstatus[] = " and sub_problem = '2' and group_code = '5'";
			$strSQLstatus[] = " and sub_problem = '2' and group_code = '7'";
			$strSQLstatus[] = " and sub_problem = '4'";
			$strSQLstatus[] = " and sub_problem = '3'";
			
			
			
			for($i = 1;$i < 12 ;$i++){
				
					for ($j=1;$j<$j_classifier;$j++){
						$td_val[$i][$j] = "0";
						$code_val[$i][$j] = "0";
					}
			
			}
			
			
			for($i = 1;$i < 12 ;$i++){
			
				if ($class == "1"){
					$strSQL = "SELECT count(DISTINCT c.case_id) as total,r.code,r.name";
					$strSQL.=" From  r_status r left join case_inputs c on r.code = c.status";
					//if ($office != "00"){
						$strSQL.=" left join add_details a on c.case_id = a.case_id ";
					//}
					$strSQL.=" where c.activecase = 'yes' and problem_case = '1'".$strSQLstatus[$i]." ".$fillter;
					$strSQL.=" GROUP BY status order by r.code asc;";
				}else if ($class == "4"){
					$strSQL = "SELECT count(DISTINCT c.case_id) as total,r.code,r.name";
					$strSQL.=" From  r_sex r left join case_inputs c on r.code = c.sex";
					//if ($office != "00"){
						$strSQL.=" left join add_details a on c.case_id = a.case_id ";
					//}
					$strSQL.=" where c.activecase = 'yes' and problem_case = '1'".$strSQLstatus[$i]." ".$fillter;
					$strSQL.=" GROUP BY sex order by r.code asc;";
				}else if ($class == "6"){
					$strSQL = "SELECT count(DISTINCT c.case_id) as total,r.code,r.name ";
					$strSQL.= " From add_details a left join case_inputs c on a.case_id = c.case_id ";
					$strSQL.=" left join r_occupation r on  a.occupation = r.code ";
					$strSQL.=" where c.activecase = 'yes' and problem_case = '1'".$strSQLstatus[$i]." ".$fillter;
					$strSQL.=" GROUP BY occupation order by r.code asc;";
				}else if ($class == "7"){
					$strSQL = "SELECT count(DISTINCT c.case_id) as total,r.code,r.name ";
					$strSQL.= " From add_details a left join case_inputs c on a.case_id = c.case_id ";
					$strSQL.=" left join r_type_offender r on  a.type_offender = r.code ";
					$strSQL.=" where c.activecase = 'yes' and  problem_case = '1'".$strSQLstatus[$i]." ".$fillter;
					$strSQL.=" GROUP BY type_offender order by r.code asc;";
				}else if ($class == "2"){
					$strSQL = "SELECT count(DISTINCT c.case_id) as total,r.nhso as code,r. nhso as name";
					$strSQL.=" From  prov_geo r left join case_inputs c on r.code = c.prov_id";
					//if ($office != "00"){
						$strSQL.=" left join add_details a on c.case_id = a.case_id ";
					//}
					$strSQL.=" where c.activecase = 'yes' and problem_case = '1'".$strSQLstatus[$i]." ".$fillter;
					$strSQL.=" GROUP BY nhso order by r.code asc;";
				}else if ($class == "5"){
					$strSQL = "SELECT age_group.code, COUNT(*) AS total
FROM
(
    SELECT
        CASE WHEN TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) BETWEEN 0 AND 4
             THEN '1'
             WHEN TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) BETWEEN 5 AND 9
             THEN '2'
             WHEN TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) BETWEEN 10 AND 14
             THEN '3'
             WHEN TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) BETWEEN 15 AND 19
             THEN '4'
						 WHEN TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) BETWEEN 20 AND 24
             THEN '5'
						 WHEN TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) BETWEEN 25 AND 34
             THEN '6'
						 WHEN TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) BETWEEN 35 AND 44
             THEN '7'
						 WHEN TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) BETWEEN 45 AND 59
             THEN '8'
             WHEN TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) BETWEEN 60 AND 120
             THEN '9'
             ELSE 'Other'
        END AS code
    FROM add_details a left join case_inputs c on a.case_id = c.case_id";
	
					$strSQL .=" where c.activecase = 'yes' and problem_case = '1' ".$strSQLstatus[$i]." ".$fillter;
					$strSQL .=") age_group GROUP BY age_group.code";
					
				}
				
				//echo $strSQL."<br>";
				
				//$result = mysql_query($strSQL) or die(mysql_error());
				//while($row = mysql_fetch_array($result))

                $result = mysqli_query($conn,$strSQL);
                while($row = $result->fetch_assoc()) 
				
				{
					
											if (($row["code"]) == "1"){
											
												$td_val[$i][1] = $row["total"];
												$code_val[$i][1] = $row["code"];
												$name_val[$i][1] = $row["name"];
											}else if (($row["code"]) == "2"){
											
												$td_val[$i][2] = $row["total"];
												$code_val[$i][2] = $row["code"];
												$name_val[$i][2] = $row["name"];
											}else if (($row["code"]) == "3"){
											
												$td_val[$i][3] = $row["total"];
												$code_val[$i][3] = $row["code"];
												$name_val[$i][3] = $row["name"];
											}else if (($row["code"]) == "4"){
											
												$td_val[$i][4] = $row["total"];
												$code_val[$i][4] = $row["code"];
												$name_val[$i][4] = $row["name"];
											}else if (($row["code"]) == "5"){
											
												$td_val[$i][5] = $row["total"];
												$code_val[$i][5] = $row["code"];
												$name_val[$i][5] = $row["name"];
											}else if (($row["code"]) == "6"){
											
												$td_val[$i][6] = $row["total"];
												$code_val[$i][6] = $row["code"];
												$name_val[$i][6] = $row["name"];
											}else if (($row["code"]) == "7"){
											
												$td_val[$i][7] = $row["total"];
												$code_val[$i][7] = $row["code"];
												$name_val[$i][7] = $row["name"];
											}else if (($row["code"]) == "8"){
											
												$td_val[$i][8] = $row["total"];
												$code_val[$i][8] = $row["code"];
												$name_val[$i][8] = $row["name"];
											}else if (($row["code"]) == "9"){
											
												$td_val[$i][9] = $row["total"];
												$code_val[$i][9] = $row["code"];
												$name_val[$i][9] = $row["name"];
											}else if (($row["code"]) == "10"){
											
												$td_val[$i][10] = $row["total"];
												$code_val[$i][10] = $row["code"];
												$name_val[$i][10] = $row["name"];
											}else if (($row["code"]) == "11"){
											
												$td_val[$i][11] = $row["total"];
												$code_val[$i][11] = $row["code"];
												$name_val[$i][11] = $row["name"];
											}else if (($row["code"]) == "12"){
											
												$td_val[$i][12] = $row["total"];
												$code_val[$i][12] = $row["code"];
												$name_val[$i][12] = $row["name"];
												
											}else if (($row["code"]) == "13"){
											
												$td_val[$i][13] = $row["total"];
												$code_val[$i][13] = $row["code"];
												$name_val[$i][13] = $row["name"];
											}
											
				}
				
		
			}
			
				for($i = 1;$i < 12 ;$i++){
				
					for ($j=1;$j<$j_classifier;$j++){
						
						if ($td_val[$i][$j] != "0"){
							$td1 .= "<td align='center'>".$td_val[$i][$j]."</td>"; 
						}else{
							$td1 .= "<td align='center'>&nbsp;</td>"; 
						}
						
						
						
						if ($i == 1){
							 $td1_head_total += $td_val[$i][$j];
						}else if ($i == 2){
							$td1_1_total += $td_val[$i][$j];
						}else if ($i == 3){
							$td1_2_total += $td_val[$i][$j];
						}else if ($i == 4){
							$td1_2_1_total += $td_val[$i][$j];
						}else if ($i == 5){
							$td1_2_2_total += $td_val[$i][$j];
						}else if ($i == 6){
							$td1_2_3_total += $td_val[$i][$j];
						}else if ($i == 7){
							$td1_2_4_total += $td_val[$i][$j];
						}else if ($i == 8){
							$td1_2_5_total += $td_val[$i][$j];
						}else if ($i == 9){
							$td1_2_7_total += $td_val[$i][$j];
						}else if ($i == 10){
							$td1_4_total += $td_val[$i][$j];
						}else if ($i == 11){
							$td1_3_total += $td_val[$i][$j];
						}
						
						
						if (($j == 1) && ($i == 1)) {
							 $sum_column_1 += $td_val[$i][$j];
							
						}else if (($j == 2) && ($i == 1)) {
							$sum_column_2 += $td_val[$i][$j];
							
							
						}else if (($j == 3) && ($i == 1)) {
							$sum_column_3 += $td_val[$i][$j];
							
						}else if (($j == 4) && ($i == 1)) {
							$sum_column_4 += $td_val[$i][$j];
							
						}else if (($j == 5) && ($i == 1)) {
							$sum_column_5 += $td_val[$i][$j];
							
						}else if (($j == 6) && ($i == 1)) {
							$sum_column_6 += $td_val[$i][$j];
							
						}else if (($j == 7) && ($i == 1)) {
							$sum_column_7 += $td_val[$i][$j];
							
						}else if (($j == 8) && ($i == 1)) {
							$sum_column_8 += $td_val[$i][$j];
							
						}else if (($j == 9) && ($i == 1)) {
							$sum_column_9 += $td_val[$i][$j];
							
						}else if (($j == 10) && ($i == 1)) {
							$sum_column_10 += $td_val[$i][$j];
							
						}else if (($j == 11) && ($i == 1)) {
							$sum_column_11 += $td_val[$i][$j];
							
						}else if (($j == 12) && ($i == 1)) {
							$sum_column_12 += $td_val[$i][$j];
							
						}else if (($j == 13) && ($i == 1)) {
							$sum_column_13 += $td_val[$i][$j];
							
						}
						
						
						
						
						
					}
					$td1 .= "'newline".$i."'";
				}
	 //$total1 = "l";
	
     //echo "echo td1 ".$td1."<br>";
     $n1 = strpos($td1,"'newline1'");
     $n2 = strpos($td1,"'newline2'");
     $n3 = strpos($td1,"'newline3'");
     $n4 = strpos($td1,"'newline4'");
     $n5 = strpos($td1,"'newline5'");
     $n6 = strpos($td1,"'newline6'");
     $n7 = strpos($td1,"'newline7'");
     $n8 = strpos($td1,"'newline8'");
     $n9 = strpos($td1,"'newline9'");
     $n10 = strpos($td1,"'newline10'");
     $n11 = strpos($td1,"'newline11'");
	 
	 //echo "break";
   
    /*
      echo $n1;
      echo $n2;
      echo $n3;
      echo $n4;
      echo $n5;
      echo $n6;
      echo $n7;
      echo $n8;
      echo $n9;
      echo $n10;
      echo $n11;
		
		
	
	  	
*/
		
		
      $td1_head = substr($td1,0,$n1);
      //echo $td1_head."<br>";

      $td1_1 = substr($td1,$n1+10,$n2-$n1-10);
      //echo $td1_1."<br>";

      $td1_2 = substr($td1,$n2+10,$n3-$n2-10);
      //echo $td1_2."<br>";

      $td1_2_1 = substr($td1,$n3+10,$n4-$n3-10);
      //echo $td1_2_1."<br>";

      $td1_2_2 = substr($td1,$n4+10,$n5-$n4-10);
      //echo $td1_2_2."<br>";

      $td1_2_3 = substr($td1,$n5+10,$n6-$n5-10);
      //echo $td1_2_3."<br>";

      $td1_2_4 = substr($td1,$n6+10,$n7-$n6-10);
      //echo $td1_2_4."<br>";

      $td1_2_5 = substr($td1,$n7+10,$n8-$n7-10);
      //echo $td1_2_5."<br>";

      $td1_2_7 = substr($td1,$n8+10,$n9-$n8-10);
      //echo $td1_2_7."<br>";

      $td1_4 = substr($td1,$n9+10,$n10-$n9-10);
      //echo $td1_4."<br>";

      $td1_3 = substr($td1,$n10+11,$n11-$n10-11);
      //echo $td1_3."<br>";
	  


      //2,3
      //echo "2,3<br>";
      unset($strSQLstatus);
      unset($td_val);
      unset($code_val);
      unset($name_val);
      $td1 = "";
	  
	  
	  for($i = 1;$i < 5 ;$i++){
				
					for ($j=1;$j<$j_classifier;$j++){
						$td_val[$i][$j] = "0";
						$code_val[$i][$j] = "0";
					}
			
	 }
			
      
      		$strSQLstatus[] = "";
			$strSQLstatus[] = " problem_case = '2'  ";
			$strSQLstatus[] = " problem_case = '3'  ";
			$strSQLstatus[] = " problem_case = '3'  and sub_problem = '1'";
			$strSQLstatus[] = " problem_case = '3'  and sub_problem = '4'";
			
			for($i = 1;$i < 5 ;$i++){
			
				if ($class == "1"){
					$strSQL = "SELECT count(DISTINCT c.case_id) as total,r.code,r.name";
					$strSQL.=" From  r_status r left join case_inputs c on r.code = c.status";
					//if ($office != "00"){
						$strSQL.=" left join add_details a on c.case_id = a.case_id ";
					//}
					$strSQL.=" where c.activecase = 'yes' and ".$strSQLstatus[$i]." ".$fillter;
					$strSQL.=" GROUP BY status order by r.code asc;";
				}else if ($class == "4"){
					$strSQL = "SELECT count(DISTINCT c.case_id) as total,r.code,r.name";
					$strSQL.=" From  r_sex r left join case_inputs c on r.code = c.sex";
					//if ($office != "00"){
						$strSQL.=" left join add_details a on c.case_id = a.case_id ";
					//}
					$strSQL.=" where c.activecase = 'yes' and ".$strSQLstatus[$i]." ".$fillter;
					$strSQL.=" GROUP BY sex order by r.code asc;";
					
				}else if ($class == "6"){
					$strSQL = "SELECT count(DISTINCT c.case_id) as total,r.code,r.name ";
					$strSQL.= " From add_details a left join case_inputs c on a.case_id = c.case_id ";
					$strSQL.=" left join r_occupation r on  a.occupation = r.code ";
					$strSQL.=" where c.activecase = 'yes' and ".$strSQLstatus[$i]." ".$fillter;
					$strSQL.=" GROUP BY occupation order by r.code asc;";
				}else if ($class == "7"){
					$strSQL = "SELECT count(DISTINCT c.case_id) as total,r.code,r.name ";
					$strSQL.= " From add_details a left join case_inputs c on a.case_id = c.case_id ";
					$strSQL.=" left join r_type_offender r on  a.type_offender = r.code ";
					$strSQL.=" where c.activecase = 'yes' and ".$strSQLstatus[$i]." ".$fillter;
					$strSQL.=" GROUP BY type_offender order by r.code asc;";
				}else if ($class == "2"){
					$strSQL = "SELECT count(DISTINCT c.case_id) as total,r.nhso as code,r. nhso as name";
					$strSQL.=" From  prov_geo r left join case_inputs c on r.code = c.prov_id";
					//if ($office != "00"){
						$strSQL.=" left join add_details a on c.case_id = a.case_id ";
					//}
					$strSQL.=" where c.activecase = 'yes' and ".$strSQLstatus[$i]." ".$fillter;
					$strSQL.=" GROUP BY nhso order by r.code asc;";
				}else if ($class == "5"){
					$strSQL = "SELECT age_group.code, COUNT(*) AS total
FROM
(
    SELECT
        CASE WHEN TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) BETWEEN 0 AND 4
             THEN '1'
             WHEN TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) BETWEEN 5 AND 9
             THEN '2'
             WHEN TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) BETWEEN 10 AND 14
             THEN '3'
             WHEN TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) BETWEEN 15 AND 19
             THEN '4'
						 WHEN TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) BETWEEN 20 AND 24
             THEN '5'
						 WHEN TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) BETWEEN 25 AND 34
             THEN '6'
						 WHEN TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) BETWEEN 35 AND 44
             THEN '7'
						 WHEN TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) BETWEEN 45 AND 59
             THEN '8'
             WHEN TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) BETWEEN 60 AND 120
             THEN '9'
             ELSE 'Other'
        END AS code
    FROM add_details a left join case_inputs c on a.case_id = c.case_id";
	
					$strSQL .=" where ".$strSQLstatus[$i]." ".$fillter;
					$strSQL .=") age_group GROUP BY age_group.code";
					
				}
				//echo $strSQL."<br>";
				
				//$result = mysql_query($strSQL) or die(mysql_error());
				//while($row = mysql_fetch_array($result))

                $result = mysqli_query($conn,$strSQL);
                while($row = $result->fetch_assoc()) 

				{
											if (($row["code"]) == "1"){
											
												$td_val[$i][1] = $row["total"];
												$code_val[$i][1] = $row["code"];
												$name_val[$i][1] = $row["name"];
											}else if (($row["code"]) == "2"){
											
												$td_val[$i][2] = $row["total"];
												$code_val[$i][2] = $row["code"];
												$name_val[$i][2] = $row["name"];
											}else if (($row["code"]) == "3"){
											
												$td_val[$i][3] = $row["total"];
												$code_val[$i][3] = $row["code"];
												$name_val[$i][3] = $row["name"];
											}else if (($row["code"]) == "4"){
											
												$td_val[$i][4] = $row["total"];
												$code_val[$i][4] = $row["code"];
												$name_val[$i][4] = $row["name"];
											}else if (($row["code"]) == "5"){
											
												$td_val[$i][5] = $row["total"];
												$code_val[$i][5] = $row["code"];
												$name_val[$i][5] = $row["name"];
											}else if (($row["code"]) == "6"){
											
												$td_val[$i][6] = $row["total"];
												$code_val[$i][6] = $row["code"];
												$name_val[$i][6] = $row["name"];
											}else if (($row["code"]) == "7"){
											
												$td_val[$i][7] = $row["total"];
												$code_val[$i][7] = $row["code"];
												$name_val[$i][7] = $row["name"];
											}else if (($row["code"]) == "8"){
											
												$td_val[$i][8] = $row["total"];
												$code_val[$i][8] = $row["code"];
												$name_val[$i][8] = $row["name"];
											}else if (($row["code"]) == "9"){
											
												$td_val[$i][9] = $row["total"];
												$code_val[$i][9] = $row["code"];
												$name_val[$i][9] = $row["name"];
											}else if (($row["code"]) == "10"){
											
												$td_val[$i][10] = $row["total"];
												$code_val[$i][10] = $row["code"];
												$name_val[$i][10] = $row["name"];
											}else if (($row["code"]) == "11"){
											
												$td_val[$i][11] = $row["total"];
												$code_val[$i][11] = $row["code"];
												$name_val[$i][11] = $row["name"];
											}else if (($row["code"]) == "12"){
											
												$td_val[$i][12] = $row["total"];
												$code_val[$i][12] = $row["code"];
												$name_val[$i][12] = $row["name"];
												
											}else if (($row["code"]) == "13"){
											
												$td_val[$i][13] = $row["total"];
												$code_val[$i][13] = $row["code"];
												$name_val[$i][13] = $row["name"];
											}
				}
				
		
			}
			
			
		for($i = 1;$i < 5 ;$i++){
				
					for ($j=1;$j<$j_classifier;$j++){
						if ($td_val[$i][$j] != "0"){
							$td1 .= "<td align='center'>".$td_val[$i][$j]."</td>"; 
						}else{
							$td1 .= "<td align='center'>&nbsp;</td>"; 
						}
						
						if ($i == 1){
							 $td2_head_total += $td_val[$i][$j];
						}else if ($i == 2){
							$td3_head_total += $td_val[$i][$j];
						}else if ($i == 3){
							$td3_1_total += $td_val[$i][$j];
						}else if ($i == 4){
							$td3_2_total += $td_val[$i][$j];
						}
						
						if (($j == 1) && (($i == 1) or ($i == 2))) {
							 $sum_column_1 += $td_val[$i][$j];
							
						}else if (($j == 2) && (($i == 1) or ($i == 2))) {
							$sum_column_2 += $td_val[$i][$j];
							
							
						}else if (($j == 3) && (($i == 1) or ($i == 2))) {
							$sum_column_3 += $td_val[$i][$j];
							
						}else if (($j == 4) && (($i == 1) or ($i == 2))) {
							$sum_column_4 += $td_val[$i][$j];
							
						}else if (($j == 5) && (($i == 1) or ($i == 2))) {
							$sum_column_5 += $td_val[$i][$j];
							
						}else if (($j == 6) && (($i == 1) or ($i == 2))) {
							$sum_column_6 += $td_val[$i][$j];
							
						}else if (($j == 7) && (($i == 1) or ($i == 2))) {
							$sum_column_7 += $td_val[$i][$j];
							
						}else if (($j == 8) && (($i == 1) or ($i == 2))) {
							$sum_column_8 += $td_val[$i][$j];
							
						}else if (($j == 9) && (($i == 1) or ($i == 2))) {
							$sum_column_9 += $td_val[$i][$j];
							
						}else if (($j == 10) && (($i == 1) or ($i == 2))) {
							$sum_column_10 += $td_val[$i][$j];
							
						}else if (($j == 11) && (($i == 1) or ($i == 2))) {
							$sum_column_11 += $td_val[$i][$j];
							
						}else if (($j == 12) && (($i == 1) or ($i == 2))) {
							$sum_column_12 += $td_val[$i][$j];
							
						}else if (($j == 13) && (($i == 1) or ($i == 2))) {
							$sum_column_13 += $td_val[$i][$j];
							
						}
						
						
						
					}
					$td1 .= "'newline".$i."'";
				}	
			
     //echo $td1."<br>";
     $n1 = strpos($td1,"'newline1'")."<br>";
     $n2 = strpos($td1,"'newline2'")."<br>";
     $n3 = strpos($td1,"'newline3'")."<br>";
     $n4 = strpos($td1,"'newline4'")."<br>";
     

      $td2_head = substr($td1,0,$n1);
     // echo $td2_head."<br>";

      $td3_head = substr($td1,$n1+10,$n2-$n1-10);
      //echo $td3_head."<br>";

      $td3_1 = substr($td1,$n2+10,$n3-$n2-10);
      //echo $td3_1."<br>";

      $td3_2 = substr($td1,$n3+10,$n4-$n3-10);
      //echo $td3_2."<br>";

      

      //4

      //echo "4<br>";
      unset($strSQLstatus);
      unset($td_val);
      unset($code_val);
      unset($name_val);
      $td1 = "";

		for($i = 1;$i < 8 ;$i++){
				
					for ($j=1;$j<$j_classifier;$j++){
						$td_val[$i][$j] = "0";
						$code_val[$i][$j] = "0";
					}
			
			}
			
			
			$strSQLstatus[] = "";
			$strSQLstatus[] = " problem_case = '4'";
      $strSQLstatus[] = " problem_case = '4' and sub_problem = '2' and group_code = '1'";
      $strSQLstatus[] = " problem_case = '4' and sub_problem = '2' and group_code = '2'";
      $strSQLstatus[] = " problem_case = '4' and sub_problem = '2' and group_code = '3'";
      $strSQLstatus[] = " problem_case = '4' and sub_problem = '2' and group_code = '4'";
      $strSQLstatus[] = " problem_case = '4' and sub_problem = '2' and group_code = '5'";
      $strSQLstatus[] = " problem_case = '4' and sub_problem = '2' and group_code = '7'";
		
			
			for($i = 1;$i < 8 ;$i++){
			
				if ($class == "1"){
					$strSQL = "SELECT count(DISTINCT c.case_id) as total,r.code,r.name";
					$strSQL.=" From  r_status r left join case_inputs c on r.code = c.status";
					//if ($office != "00"){
						$strSQL.=" left join add_details a on c.case_id = a.case_id ";
					//}
					$strSQL.=" where c.activecase = 'yes' and ".$strSQLstatus[$i]." ".$fillter;
					$strSQL.=" GROUP BY status order by r.code asc;";
				}else if ($class == "4"){
					$strSQL = "SELECT count(DISTINCT c.case_id) as total,r.code,r.name";
					$strSQL.=" From  r_sex r left join case_inputs c on r.code = c.sex";
					//if ($office != "00"){
						$strSQL.=" left join add_details a on c.case_id = a.case_id ";
					//}
					$strSQL.=" where c.activecase = 'yes' and ".$strSQLstatus[$i]." ".$fillter;
					$strSQL.=" GROUP BY sex order by r.code asc;";
				}else if ($class == "6"){
					$strSQL = "SELECT count(DISTINCT c.case_id) as total,r.code,r.name ";
					$strSQL.= " From add_details a left join case_inputs c on a.case_id = c.case_id ";
					$strSQL.=" left join r_occupation r on  a.occupation = r.code ";
					$strSQL.=" where c.activecase = 'yes' and ".$strSQLstatus[$i]." ".$fillter;
					$strSQL.=" GROUP BY occupation order by r.code asc;";
				}else if ($class == "7"){
					$strSQL = "SELECT count(DISTINCT c.case_id) as total,r.code,r.name ";
					$strSQL.= " From add_details a left join case_inputs c on a.case_id = c.case_id ";
					$strSQL.=" left join r_type_offender r on  a.type_offender = r.code ";
					$strSQL.=" where c.activecase = 'yes' and ".$strSQLstatus[$i]." ".$fillter;
					$strSQL.=" GROUP BY type_offender order by r.code asc;";
				}else if ($class == "2"){
					$strSQL = "SELECT count(DISTINCT c.case_id) as total,r.nhso as code,r. nhso as name";
					$strSQL.=" From  prov_geo r left join case_inputs c on r.code = c.prov_id";
					//if ($office != "00"){
						$strSQL.=" left join add_details a on c.case_id = a.case_id ";
					//}
					$strSQL.=" where c.activecase = 'yes' and ".$strSQLstatus[$i]." ".$fillter;
					$strSQL.=" GROUP BY nhso order by r.code asc;";
				}else if ($class == "5"){
					$strSQL = "SELECT age_group.code, COUNT(*) AS total
FROM
(
    SELECT
        CASE WHEN TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) BETWEEN 0 AND 4
             THEN '1'
             WHEN TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) BETWEEN 5 AND 9
             THEN '2'
             WHEN TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) BETWEEN 10 AND 14
             THEN '3'
             WHEN TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) BETWEEN 15 AND 19
             THEN '4'
						 WHEN TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) BETWEEN 20 AND 24
             THEN '5'
						 WHEN TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) BETWEEN 25 AND 34
             THEN '6'
						 WHEN TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) BETWEEN 35 AND 44
             THEN '7'
						 WHEN TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) BETWEEN 45 AND 59
             THEN '8'
             WHEN TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) BETWEEN 60 AND 120
             THEN '9'
             ELSE 'Other'
        END AS code
    FROM add_details a left join case_inputs c on a.case_id = c.case_id";
	
					$strSQL .=" where ".$strSQLstatus[$i]." ".$fillter;
					$strSQL .=") age_group GROUP BY age_group.code";
					
				}
				//echo $strSQL."<br>";
				
				//$result = mysql_query($strSQL) or die(mysql_error());
				//while($row = mysql_fetch_array($result))
                $result = mysqli_query($conn,$strSQL);
                while($row = $result->fetch_assoc()) 

				{
											if (($row["code"]) == "1"){
											
												$td_val[$i][1] = $row["total"];
												$code_val[$i][1] = $row["code"];
												$name_val[$i][1] = $row["name"];
											}else if (($row["code"]) == "2"){
											
												$td_val[$i][2] = $row["total"];
												$code_val[$i][2] = $row["code"];
												$name_val[$i][2] = $row["name"];
											}else if (($row["code"]) == "3"){
											
												$td_val[$i][3] = $row["total"];
												$code_val[$i][3] = $row["code"];
												$name_val[$i][3] = $row["name"];
											}else if (($row["code"]) == "4"){
											
												$td_val[$i][4] = $row["total"];
												$code_val[$i][4] = $row["code"];
												$name_val[$i][4] = $row["name"];
											}else if (($row["code"]) == "5"){
											
												$td_val[$i][5] = $row["total"];
												$code_val[$i][5] = $row["code"];
												$name_val[$i][5] = $row["name"];
											}else if (($row["code"]) == "6"){
											
												$td_val[$i][6] = $row["total"];
												$code_val[$i][6] = $row["code"];
												$name_val[$i][6] = $row["name"];
											}else if (($row["code"]) == "7"){
											
												$td_val[$i][7] = $row["total"];
												$code_val[$i][7] = $row["code"];
												$name_val[$i][7] = $row["name"];
											}else if (($row["code"]) == "8"){
											
												$td_val[$i][8] = $row["total"];
												$code_val[$i][8] = $row["code"];
												$name_val[$i][8] = $row["name"];
											}else if (($row["code"]) == "9"){
											
												$td_val[$i][9] = $row["total"];
												$code_val[$i][9] = $row["code"];
												$name_val[$i][9] = $row["name"];
											}else if (($row["code"]) == "10"){
											
												$td_val[$i][10] = $row["total"];
												$code_val[$i][10] = $row["code"];
												$name_val[$i][10] = $row["name"];
											}else if (($row["code"]) == "11"){
											
												$td_val[$i][11] = $row["total"];
												$code_val[$i][11] = $row["code"];
												$name_val[$i][11] = $row["name"];
											}else if (($row["code"]) == "12"){
											
												$td_val[$i][12] = $row["total"];
												$code_val[$i][12] = $row["code"];
												$name_val[$i][12] = $row["name"];
												
											}else if (($row["code"]) == "13"){
											
												$td_val[$i][13] = $row["total"];
												$code_val[$i][13] = $row["code"];
												$name_val[$i][13] = $row["name"];
											}

				}
				
		
			}
			
			
			
			
             for($i = 1;$i < 8 ;$i++){
				
					for ($j=1;$j<$j_classifier;$j++){
						 if ($td_val[$i][$j] != "0"){
							$td1 .= "<td align='center'>".$td_val[$i][$j]."</td>"; 
						}else{
							$td1 .= "<td align='center'>&nbsp;</td>"; 
						}
						
						if ($i == 1){
							 $td4_head_total += $td_val[$i][$j];
						}else if ($i == 2){
							$td4_1_total += $td_val[$i][$j];
						}else if ($i == 3){
							$td4_2_total += $td_val[$i][$j];
						}else if ($i == 4){
							$td4_3_total += $td_val[$i][$j];
						}else if ($i == 5){
							$td4_4_total += $td_val[$i][$j];
						}else if ($i == 6){
							$td4_5_total += $td_val[$i][$j];
						}else if ($i == 7){
							$td4_6_total += $td_val[$i][$j];
						}
						
						if (($j == 1) && ($i == 1)) {
							 $sum_column_1 += $td_val[$i][$j];
							
						}else if (($j == 2) && ($i == 1)) {
							$sum_column_2 += $td_val[$i][$j];
							
							
						}else if (($j == 3) && ($i == 1)) {
							$sum_column_3 += $td_val[$i][$j];
							
						}else if (($j == 4) && ($i == 1)) {
							$sum_column_4 += $td_val[$i][$j];
							
						}else if (($j == 5) && ($i == 1)) {
							$sum_column_5 += $td_val[$i][$j];
							
						}else if (($j == 6) && ($i == 1)) {
							$sum_column_6 += $td_val[$i][$j];
							
						}else if (($j == 7) && ($i == 1)) {
							$sum_column_7 += $td_val[$i][$j];
							
						}else if (($j == 8) && ($i == 1)) {
							$sum_column_8 += $td_val[$i][$j];
							
						}else if (($j == 9) && ($i == 1)) {
							$sum_column_9 += $td_val[$i][$j];
							
						}else if (($j == 10) && ($i == 1)) {
							$sum_column_10 += $td_val[$i][$j];
							
						}else if (($j == 11) && ($i == 1)) {
							$sum_column_11 += $td_val[$i][$j];
							
						}else if (($j == 12) && ($i == 1)) {
							$sum_column_12 += $td_val[$i][$j];
							
						}else if (($j == 13) && ($i == 1)) {
							$sum_column_13 += $td_val[$i][$j];
							
						}
					}
					$td1 .= "'newline".$i."'";
			}

    //echo $td1."<br>";
     $n1 = strpos($td1,"'newline1'")."<br>";
     $n2 = strpos($td1,"'newline2'")."<br>";
     $n3 = strpos($td1,"'newline3'")."<br>";
     $n4 = strpos($td1,"'newline4'")."<br>";
     $n5 = strpos($td1,"'newline5'")."<br>";
     $n6 = strpos($td1,"'newline6'")."<br>";
     $n7 = strpos($td1,"'newline7'")."<br>";
     $n8 = strpos($td1,"'newline8'")."<br>";
     



      $td4_head = substr($td1,0,$n1);
      //echo $td4_head."<br>";

      $td4_1 = substr($td1,$n1+10,$n2-$n1-10);
      //echo $td4_1."<br>";

      $td4_2 = substr($td1,$n2+10,$n3-$n2-10);
      //echo $td4_2."<br>";

      $td4_3 = substr($td1,$n3+10,$n4-$n3-10);
      //echo $td4_3."<br>";

      $td4_4 = substr($td1,$n4+10,$n5-$n4-10);
     // echo $td4_4."<br>";

      $td4_5 = substr($td1,$n5+10,$n6-$n5-10);
      //echo $td4_5."<br>";

      $td4_6 = substr($td1,$n6+10,$n7-$n6-10);
      //echo $td4_6."<br>";

      $td4_7 = substr($td1,$n7+10,$n8-$n7-10);
      //echo $td4_7."<br>";

 


      //5
      //echo "5<br>";
      unset($strSQLstatus);
      unset($td_val);
      unset($code_val);
      unset($name_val);
      $td1 = "";
	  
	  for($i = 1;$i < 12 ;$i++){
				
					for ($j=1;$j<$j_classifier;$j++){
						$td_val[$i][$j] = "0";
						$code_val[$i][$j] = "0";
					}
			
	  }

      
      $strSQLstatus[] = "";

			$strSQLstatus[] = "";
			$strSQLstatus[] = " and sub_problem = '1'";
			$strSQLstatus[] = " and sub_problem = '2'";
			$strSQLstatus[] = " and sub_problem = '2' and group_code = '1'";
			$strSQLstatus[] = " and sub_problem = '2' and group_code = '2'";
			$strSQLstatus[] = " and sub_problem = '2' and group_code = '3'";
			$strSQLstatus[] = " and sub_problem = '2' and group_code = '4'";
			$strSQLstatus[] = " and sub_problem = '2' and group_code = '5'";
			$strSQLstatus[] = " and sub_problem = '2' and group_code = '7'";
			$strSQLstatus[] = " and sub_problem = '4'";
			$strSQLstatus[] = " and sub_problem = '3'";
			
			for($i = 1;$i < 12 ;$i++){
			
				if ($class == "1"){
					$strSQL = "SELECT count(DISTINCT c.case_id) as total,r.code,r.name";
					$strSQL.=" From  r_status r left join case_inputs c on r.code = c.status";
					//if ($office != "00"){
						$strSQL.=" left join add_details a on c.case_id = a.case_id ";
					//}
					$strSQL.=" where c.activecase = 'yes' and problem_case = '5'".$strSQLstatus[$i]." ".$fillter;
					$strSQL.=" GROUP BY status order by r.code asc;";
				}else if ($class == "4"){
					$strSQL = "SELECT count(DISTINCT c.case_id) as total,r.code,r.name";
					$strSQL.=" From  r_sex r left join case_inputs c on r.code = c.sex";
					//if ($office != "00"){
						$strSQL.=" left join add_details a on c.case_id = a.case_id ";
					//}
					$strSQL.=" where c.activecase = 'yes' and problem_case = '5'".$strSQLstatus[$i]." ".$fillter;
					$strSQL.=" GROUP BY sex order by r.code asc;";

				}else if ($class == "6"){
					$strSQL = "SELECT count(DISTINCT c.case_id) as total,r.code,r.name ";
					$strSQL.= " From add_details a left join case_inputs c on a.case_id = c.case_id ";
					$strSQL.=" left join r_occupation r on  a.occupation = r.code ";
					$strSQL.=" where c.activecase = 'yes' and problem_case = '5'".$strSQLstatus[$i]." ".$fillter;
					$strSQL.=" GROUP BY occupation order by r.code asc;";
				}else if ($class == "7"){
					$strSQL = "SELECT count(DISTINCT c.case_id) as total,r.code,r.name ";
					$strSQL.= " From add_details a left join case_inputs c on a.case_id = c.case_id ";
					$strSQL.=" left join r_type_offender r on  a.type_offender = r.code ";
					$strSQL.=" where c.activecase = 'yes' and problem_case = '5'".$strSQLstatus[$i]." ".$fillter;
					$strSQL.=" GROUP BY type_offender order by r.code asc;";
				}else if ($class == "2"){
					$strSQL = "SELECT count(DISTINCT c.case_id) as total,r.nhso as code,r. nhso as name";
					$strSQL.=" From  prov_geo r left join case_inputs c on r.code = c.prov_id";
					//if ($office != "00"){
						$strSQL.=" left join add_details a on c.case_id = a.case_id ";
					//}
					$strSQL.=" where c.activecase = 'yes' and problem_case = '5'".$strSQLstatus[$i]." ".$fillter;
					$strSQL.=" GROUP BY nhso order by r.code asc;";
				}else if ($class == "5"){
					$strSQL = "SELECT age_group.code, COUNT(*) AS total
FROM
(
    SELECT
        CASE WHEN TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) BETWEEN 0 AND 4
             THEN '1'
             WHEN TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) BETWEEN 5 AND 9
             THEN '2'
             WHEN TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) BETWEEN 10 AND 14
             THEN '3'
             WHEN TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) BETWEEN 15 AND 19
             THEN '4'
						 WHEN TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) BETWEEN 20 AND 24
             THEN '5'
						 WHEN TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) BETWEEN 25 AND 34
             THEN '6'
						 WHEN TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) BETWEEN 35 AND 44
             THEN '7'
						 WHEN TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) BETWEEN 45 AND 59
             THEN '8'
             WHEN TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) BETWEEN 60 AND 120
             THEN '9'
             ELSE 'Other'
        END AS code
    FROM add_details a left join case_inputs c on a.case_id = c.case_id";
	
					$strSQL .=" where c.activecase = 'yes' and problem_case = '5' ".$strSQLstatus[$i]." ".$fillter;
					$strSQL .=") age_group GROUP BY age_group.code";
					
				}
				//echo $strSQL."<br>";
				
				//$result = mysql_query($strSQL) or die(mysql_error());
				//while($row = mysql_fetch_array($result))

                $result = mysqli_query($conn,$strSQL);
                while($row = $result->fetch_assoc()) 

				{
											if (($row["code"]) == "1"){
											
												$td_val[$i][1] = $row["total"];
												$code_val[$i][1] = $row["code"];
												$name_val[$i][1] = $row["name"];
											}else if (($row["code"]) == "2"){
											
												$td_val[$i][2] = $row["total"];
												$code_val[$i][2] = $row["code"];
												$name_val[$i][2] = $row["name"];
											}else if (($row["code"]) == "3"){
											
												$td_val[$i][3] = $row["total"];
												$code_val[$i][3] = $row["code"];
												$name_val[$i][3] = $row["name"];
											}else if (($row["code"]) == "4"){
											
												$td_val[$i][4] = $row["total"];
												$code_val[$i][4] = $row["code"];
												$name_val[$i][4] = $row["name"];
											}else if (($row["code"]) == "5"){
											
												$td_val[$i][5] = $row["total"];
												$code_val[$i][5] = $row["code"];
												$name_val[$i][5] = $row["name"];
											}else if (($row["code"]) == "6"){
											
												$td_val[$i][6] = $row["total"];
												$code_val[$i][6] = $row["code"];
												$name_val[$i][6] = $row["name"];
											}else if (($row["code"]) == "7"){
											
												$td_val[$i][7] = $row["total"];
												$code_val[$i][7] = $row["code"];
												$name_val[$i][7] = $row["name"];
											}else if (($row["code"]) == "8"){
											
												$td_val[$i][8] = $row["total"];
												$code_val[$i][8] = $row["code"];
												$name_val[$i][8] = $row["name"];
											}else if (($row["code"]) == "9"){
											
												$td_val[$i][9] = $row["total"];
												$code_val[$i][9] = $row["code"];
												$name_val[$i][9] = $row["name"];
											}else if (($row["code"]) == "10"){
											
												$td_val[$i][10] = $row["total"];
												$code_val[$i][10] = $row["code"];
												$name_val[$i][10] = $row["name"];
											}else if (($row["code"]) == "11"){
											
												$td_val[$i][11] = $row["total"];
												$code_val[$i][11] = $row["code"];
												$name_val[$i][11] = $row["name"];
											}else if (($row["code"]) == "12"){
											
												$td_val[$i][12] = $row["total"];
												$code_val[$i][12] = $row["code"];
												$name_val[$i][12] = $row["name"];
												
											}else if (($row["code"]) == "13"){
											
												$td_val[$i][13] = $row["total"];
												$code_val[$i][13] = $row["code"];
												$name_val[$i][13] = $row["name"];
											}

				}
				
		
			}
			
			
		for($i = 1;$i < 12 ;$i++){
				
					for ($j=1;$j<$j_classifier;$j++){
						 if ($td_val[$i][$j] != "0"){
							$td1 .= "<td align='center'>".$td_val[$i][$j]."</td>"; 
						}else{
							$td1 .= "<td align='center'>&nbsp;</td>"; 
						}
						//echo"&nbsp;";
						 
						 if ($i == 1){
							 $td5_head_total += $td_val[$i][$j];
						}else if ($i == 2){
							$td5_1_total += $td_val[$i][$j];
						}else if ($i == 3){
							$td5_2_total += $td_val[$i][$j];
						}else if ($i == 4){
							$td5_2_1_total += $td_val[$i][$j];
						}else if ($i == 5){
							$td5_2_2_total += $td_val[$i][$j];
						}else if ($i == 6){
							$td5_2_3_total += $td_val[$i][$j];
						}else if ($i == 7){
							$td5_2_4_total += $td_val[$i][$j];
						}else if ($i == 8){
							$td5_2_5_total += $td_val[$i][$j];
						}else if ($i == 9){
							$td5_2_7_total += $td_val[$i][$j];
						}else if ($i == 10){
							$td5_4_total += $td_val[$i][$j];
						}else if ($i == 11){
							$td5_3_total += $td_val[$i][$j];
						}
						
						
						if (($j == 1) && ($i == 1)) {
							 $sum_column_1 += $td_val[$i][$j];
							
						}else if (($j == 2) && ($i == 1)) {
							$sum_column_2 += $td_val[$i][$j];
							
							
						}else if (($j == 3) && ($i == 1)) {
							$sum_column_3 += $td_val[$i][$j];
							
						}else if (($j == 4) && ($i == 1)) {
							$sum_column_4 += $td_val[$i][$j];
							
						}else if (($j == 5) && ($i == 1)) {
							$sum_column_5 += $td_val[$i][$j];
							
						}else if (($j == 6) && ($i == 1)) {
							$sum_column_6 += $td_val[$i][$j];
							
						}else if (($j == 7) && ($i == 1)) {
							$sum_column_7 += $td_val[$i][$j];
							
						}else if (($j == 8) && ($i == 1)) {
							$sum_column_8 += $td_val[$i][$j];
							
						}else if (($j == 9) && ($i == 1)) {
							$sum_column_9 += $td_val[$i][$j];
							
						}else if (($j == 10) && ($i == 1)) {
							$sum_column_10 += $td_val[$i][$j];
							
						}else if (($j == 11) && ($i == 1)) {
							$sum_column_11 += $td_val[$i][$j];
							
						}else if (($j == 12) && ($i == 1)) {
							$sum_column_12 += $td_val[$i][$j];
							
						}else if (($j == 13) && ($i == 1)) {
							$sum_column_13 += $td_val[$i][$j];
							
						}
						
						
					}
					$td1 .= "'newline".$i."'";
				}
					
	
				
     //echo $td1."<br>";
     $n1 = strpos($td1,"'newline1'")."<br>";
     $n2 = strpos($td1,"'newline2'")."<br>";
     $n3 = strpos($td1,"'newline3'")."<br>";
     $n4 = strpos($td1,"'newline4'")."<br>";
     $n5 = strpos($td1,"'newline5'")."<br>";
     $n6 = strpos($td1,"'newline6'")."<br>";
     $n7 = strpos($td1,"'newline7'")."<br>";
     $n8 = strpos($td1,"'newline8'")."<br>";
     $n9 = strpos($td1,"'newline9'")."<br>";
     $n10 = strpos($td1,"'newline10'")."<br>";
     $n11 = strpos($td1,"'newline11'")."<br>";


      $td5_head = substr($td1,0,$n1);
      //echo $td5_head."<br>";

      $td5_1 = substr($td1,$n1+10,$n2-$n1-10);
      //echo $td5_1."<br>";

      $td5_2 = substr($td1,$n2+10,$n3-$n2-10);
      //echo $td5_2."<br>";

      $td5_2_1 = substr($td1,$n3+10,$n4-$n3-10);
      //echo $td5_2_1."<br>";

      $td5_2_2 = substr($td1,$n4+10,$n5-$n4-10);
      //echo $td5_2_2."<br>";

      $td5_2_3 = substr($td1,$n5+10,$n6-$n5-10);
      //echo $td5_2_3."<br>";

      $td5_2_4 = substr($td1,$n6+10,$n7-$n6-10);
      //echo $td5_2_4."<br>";

      $td5_2_5 = substr($td1,$n7+10,$n8-$n7-10);
      //echo $td5_2_5."<br>";

      $td5_2_7 = substr($td1,$n8+10,$n9-$n8-10);
      //echo $td5_2_7."<br>";

      $td5_4 = substr($td1,$n9+10,$n10-$n9-10);
      //echo $td5_4."<br>";

      $td5_3 = substr($td1,$n10+11,$n11-$n10-11);
      //echo $td5_3."<br>";

		}
		
		$td1="";
		?>
        
		<div class="col-md-10 order-1">
      
<?php

//require("phpsql_dbinfo.php");

require("phpsqli_dbinfo.php");


/*
$connection=mysql_connect ($hostname, $username, $password);

mysql_query("SET NAMES UTF8",$connection); 

if (!$connection) {
  die('Not connected : ' . mysql_error());
}

$db_selected = mysql_select_db($database, $connection);

if (!$db_selected) {
  die ('Can\'t use db : ' . mysql_error());
}*/

include"class1.php";
		

?>  
<?php 
 if (isset($_POST["submit"])){
	 
?>	 

	
      <table id="crisis" class="compact table-striped" cellspacing="0" width="100%" border="0">
        <thead>
        	<tr>
                <td>ตัวกรอง<?php //echo $classifier_name;?></td>
                <td colspan="<?php echo $head_col_num; ?>"> 
                
                <?php 
					include("format_date.php");
					
					echo "ข้อมูลระหว่างวันที่ ".DateTh($date_start)." ถึง ".DateTh($date_stop).", ";
					if (($status != "00") && ($status != "")){
						echo "สถานะ = ".$status_text.", ";
				   	} 
					// เขต
				   if (($region != "00") && ($region != "")){
						echo "เขต = เขต".$region_text.", ";
				   }
				   
				   
				   // จังหวัด
				   if (($province != "00") && ($province != "")){
						echo "จังหวัด = ".$province_text.", ";
				   }
				   
				   if (($gender != "00") && ($gender != "")){
						echo "เพศ = ".$gender_text.", ";
				   	}
				   
				   
				   // อายุ
				   if (($age != "00") && ($age != "")){
						echo "อายุ = ".$age_text.", ";
				   }
				   
				   // อาชีพ
				   if (($occ != "00") && ($occ != "")){
						echo "อาชีพ = ".$occ_text.", ";
				   }
				   // หน่วยงานผู้ละเมิด
				   if (($office != "00") && ($office != "")){
						echo "หน่วยงานผู้ละเมิด = ".$office_text.", ";
				   }
				   
	   			
				
				
				?>
                </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>จำแนกตาม<?php echo $classifier_name;?></td>
                <?php echo $th;?>
                <td align="center">รวม</td>
            </tr>
        
		</thead>
        <tfoot>
            <tr>
            	 <td>ปัญหา/จำแนกตาม<?php echo $classifier_name;?></td>
                <?php echo $th;?>
                <td align="center">รวม</td>
                
            </tr>
        </tfoot>
        

        <tbody>
        	
             
              <tr class="head">
                <td>รวมทั้งหมด</td>
                <?php if ($head_col_num >= "4"){ ?>
                <td align='center' width='<?php echo $cell_width;?>'><?php echo $sum_column_1;?></td>
				<td align='center' width='<?php echo $cell_width;?>'><?php echo $sum_column_2;?></td>
				<td align='center' width='<?php echo $cell_width;?>'><?php echo $sum_column_3;?></td>
				<td align='center' width='<?php echo $cell_width;?>'><?php echo $sum_column_4;?></td>
                <?php }
				if ($head_col_num >= "6"){ ?>
				<td align='center' width='<?php echo $cell_width;?>'><?php echo $sum_column_5;?></td>
                <td align='center' width='<?php echo $cell_width;?>'><?php echo $sum_column_6;?></td>
                
                <?php 
				}
				if ($head_col_num >= "7"){ ?>
				<td align='center' width='<?php echo $cell_width;?>'><?php echo $sum_column_7;?></td>
                <?php 
				}
				if ($head_col_num >= "9"){ ?>
				
                <td align='center' width='<?php echo $cell_width;?>'><?php echo $sum_column_8;?></td>
                <td align='center' width='<?php echo $cell_width;?>'><?php echo $sum_column_9;?></td>
                <?php 
				}
				if ($head_col_num >= "13"){ ?>
				
                <td align='center' width='<?php echo $cell_width;?>'><?php echo $sum_column_10;?></td>
                <td align='center' width='<?php echo $cell_width;?>'><?php echo $sum_column_11;?></td>
                <td align='center' width='<?php echo $cell_width;?>'><?php echo $sum_column_12;?></td>
                <td align='center' width='<?php echo $cell_width;?>'><?php echo $sum_column_13;?></td>
                <?php 
				}
				?>
                <td align='center' width='<?php echo $cell_width;?>'><?php echo $sum_column_1+$sum_column_2+$sum_column_3+$sum_column_4+$sum_column_5+$sum_column_6+$sum_column_7+$sum_column_8+$sum_column_9+$sum_column_10+$sum_column_11+$sum_column_12+$sum_column_13;?></td>
                <?php 
				/*
				if ($class == "1"){ ?>
				<td align='center' width='10%'>&nbsp;</td>                
                <td>&nbsp;</td>
                <?php } 
					*/
				?>
               
                
            </tr>
            <tr>
            
            <td>&nbsp;</td>
            	<?php if ($head_col_num >= "4"){ ?>
                <td align='center'>&nbsp;</td>
				<td align='center'>&nbsp;</td>
				<td align='center'>&nbsp;</td>
				<td align='center'>&nbsp;</td>
				<?php }
				if ($head_col_num >= "6"){ ?>
				<td align='center'>&nbsp;</td>                
                <td align='center'>&nbsp;</td>
                <?php }
				if ($head_col_num >= "7"){ ?>
                <td align='center'>&nbsp;</td>   
                <?php }
				if ($head_col_num >= "9"){ ?>             
                <td align='center'>&nbsp;</td>
                <td align='center'>&nbsp;</td>
               <?php }
				if ($head_col_num >= "13"){ ?>             
                <td align='center'>&nbsp;</td>
                <td align='center'>&nbsp;</td>
                <td align='center'>&nbsp;</td>
                <td align='center'>&nbsp;</td>
               <?php } ?>
                <td>&nbsp;</td>
            </tr>
            <tr class="head">
                <td>1. บังคับตรวจเอชไอวี  (จำนวนรวม)</td>
                <?php echo $td1_head;?>
                <td align = 'center'><?php echo $td1_head_total;?></td>
                
            </tr>
            <tr class="subhead">
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>1.1 ผู้ติดเชื้อเอชไอวี</b></td>
                 <?php echo $td1_1;?>
                <td align = 'center'><?php echo $td1_1_total;?></td>
               
            </tr>
            <tr class="subhead">
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>1.2 กลุ่มเปราะบาง</b></td>
                 <?php echo $td1_2;?>
                 <td align = 'center'><?php echo $td1_2_total;?></td>
                
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.2.1 กลุ่มหลากหลายทางเพศ</td>
                 <?php echo $td1_2_1;?>
                 <td align = 'center'><?php echo $td1_2_1_total;?></td>
              
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.2.2 พนักงานบริการ</td>
                 <?php echo $td1_2_2;?>
                 <td align = 'center'><?php echo $td1_2_2_total;?></td>
                
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.2.3 ผู้ใช้สารเสพติด</td>
                 <?php echo $td1_2_3;?>
                 <td align = 'center'><?php echo $td1_2_3_total;?></td>
                 
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.2.4 ประชากรข้ามชาติ</td>
                 <?php echo $td1_2_4;?>
                 <td align = 'center'><?php echo $td1_2_4_total;?></td>
                 
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.2.5 ผู้ถูกคุมขัง</td>
                 <?php echo $td1_2_5;?>
                 <td align = 'center'><?php echo $td1_2_5_total;?></td>
                
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.2.6 กลุ่มชาติพันธู์และชนเผ่า</td>
                 <?php echo $td1_2_7;?>
                 <td align = 'center'><?php echo $td1_2_7_total;?></td>
                 
            </tr>
            <tr class="subhead">
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.3 ครอบครัวและผู้ใกล้ชิดผู้ติดเชื้อเอชไอวี</td>
                 <?php echo $td1_4;?>
                 <td align = 'center'><?php echo $td1_4_total;?></td>
                
            </tr>
            <tr class="subhead_border">
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.4 ประชาชนทั่วไป</td>
                 <?php echo $td1_3;?>
                 <td align = 'center'><?php echo $td1_3_total;?></td>
                
            </tr>
            <tr class="head_border">
                <td><b>2. เปิดเผยสถานะการติดเชื้อเอชไอวี</b> <br>(ผู้ติดเชื้อเอชไอวี)  (จำนวนรวม)</td>
                 <?php echo $td2_head;?>
                 <td align = 'center'><?php echo $td2_head_total;?></td>
                
            </tr>
            <tr class="head">
                <td><b>3. ถูกกีดกันหรือถูกเลือกปฏิบัติ<br>เนื่องมาจากกการติดเชื้อเอชไอวี</b>  (จำนวนรวม)</td>
                 <?php echo $td3_head;?>
                 <td align = 'center'><?php echo $td3_head_total;?></td>
               
            </tr>
            <tr class="subhead">
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3.1 ผู้ติดเชื้อเอชไอวี</td>
                 <?php echo $td3_1;?>
                 <td align = 'center'><?php echo $td3_1_total;?></td>
               
            </tr>
            <tr class="subhead_border">
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3.2 ครอบครัวและผู้ใกล้ชิตผู้ติดเชื้อเอชไอวี</td>
                 <?php echo $td3_2;?>
                 <td align = 'center'><?php echo $td3_2_total;?></td>
                
            </tr>
            <tr class="head">
                <td><b>4. ถูกกีดกันหรือถูกเลือกปฏิบัติ<br>เนื่องมาจากเป็นกลุ่มเปราะบาง</b>  (จำนวนรวม)</td>
                 <?php echo $td4_head;?>
                 <td align = 'center'><?php echo $td4_head_total;?></td>
                
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4.1 กลุ่มหลากหลายทางเพศ</td>
                 <?php echo $td4_1;?>
                 <td align = 'center'><?php echo $td4_1_total;?></td>
                
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4.2 พนักงานบริการ</td>
                 <?php echo $td4_2;?>
                 <td align = 'center'><?php echo $td4_2_total;?></td>
               
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4.3 ผู้ใช้สารเสพติด</td>
                 <?php echo $td4_3;?>
                 <td align = 'center'><?php echo $td4_3_total;?></td>
              
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4.4 ประชากรข้ามชาติ</td>
                 <?php echo $td4_4;?>
                 <td align = 'center'><?php echo $td4_4_total;?></td>
                 
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4.5 ผู้ถูกคุมขัง</td>
                 <?php echo $td4_5;?>
                 <td align = 'center'><?php echo $td4_5_total;?></td>
                 
            </tr>
            <tr class="border">
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4.6 กลุ่มชาติพันธุ์และชนเผ่า</td>
                 <?php echo $td4_6;?>
                 <td align = 'center'><?php echo $td4_6_total;?></td>
               
            </tr>
            
             <tr class="head">
                <td><b>5. อื่นๆ ที่เกี่ยวข้องกับเอชไอวี</b> (จำนวนรวม)</td>
                 <?php echo $td5_head;?>
                 <td align = 'center'><?php echo $td5_head_total;?></td>
                
            </tr>
            <tr class="subhead">
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5.1 ผู้ติดเชื้อเอชไอวี</td>
                 <?php echo $td5_1;?>
                 <td align = 'center'><?php echo $td5_1_total;?></td>
               
            </tr>
            <tr class="subhead">
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5.2 กลุ่มเปราะบาง</td>
                 <?php echo $td5_2;?>
                 <td align = 'center'><?php echo $td5_2_total;?></td>
                 
            </tr>
             <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5.2.1 กลุ่มหลากหลายทางเพศ</td>
                 <?php echo $td5_2_1;?>
                 <td align = 'center'><?php echo $td5_2_1_total;?></td>
                
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5.2.2 พนักงานบริการ</td>
                 <?php echo $td5_2_2;?>
                 <td align = 'center'><?php echo $td5_2_2_total;?></td>
                
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5.2.3 ผู้ใช้สารเสพติด</td>
                 <?php echo $td5_2_3;?>
                 <td align = 'center'><?php echo $td5_2_3_total;?></td>
                
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5.2.4 ประชากรข้ามชาติ</td>
                 <?php echo $td5_2_4;?>
                 <td align = 'center'><?php echo $td5_2_4_total;?></td>
                 
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5.2.5 ผู้ถูกคุมขัง</td>
                 <?php echo $td5_2_5;?>
                 <td align = 'center'><?php echo $td5_2_5_total;?></td>
                 
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5.2.6 กลุ่มชาติพันธุ์และชนเผ่า</td>
                 <?php echo $td5_2_7;?>
                 <td align = 'center'><?php echo $td5_2_7_total;?></td>
                  
            </tr>
            <tr class="subhead">
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5.3 ครอบครัวและผู้ใกล้ชิดผู้ติดเชื้อเอชไอวี</td>
                 <?php echo $td5_4;?>
                 <td align = 'center'><?php echo $td5_4_total;?></td>
                 
            </tr>
            <tr class="subhead">
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5.4 ประชาชนทั่วไป</td>
                 <?php echo $td5_3;?>
                 <td align = 'center'><?php echo $td5_3_total;?></td>
                  
            </tr>
            
    </tbody>
</table>
<?php }else{ ?>
 <table id="crisis" class="compact table-striped" cellspacing="0" width="100%">
        <thead>
            <tr class="border_top">
                <td>ปัญหา</th>
                
                
                <?php echo $th;?>
            </tr>
        
		</thead>
        <tfoot>
            <tr>
            	 <td>ปัญหา</td>
                <?php echo $th;?>
            </tr>
        </tfoot>

        <tbody>
            <tr class="head">
                <td>บังคับตรวจเอชไอวี</td>
                <?php echo $td;?>
            </tr>
            <tr class="subhead">
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>ผู้ติดเชื้อเอชไอวี</b></td>
               <?php echo $td;?>
            </tr>
            <tr class="subhead">
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>กลุ่มเปราะบาง</b></td>
                <?php echo $td;?>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-กลุ่มหลากหลายทางเพศ</td>
                <?php echo $td;?>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-พนักงานบริการ</td>
               <?php echo $td;?>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-ผู้ใช้สารเสพติด</td>
                 <?php echo $td;?>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-ประชากรข้ามชาติ</td>
                 <?php echo $td;?>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-ผู้ถูกคุมขัง</td>
                <?php echo $td;?>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-กลุ่มชาติพันธู์และชนเผ่า</td>
                 <?php echo $td;?>
            </tr>
            <tr class="subhead">
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ครอบครัวและผู้ใกล้ชิดผู้ติดเชื้อเอชไอวี</td>
                <?php echo $td;?>
            </tr>
            <tr class="subhead_border">
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ประชาชนทั่วไป</td>
                <?php echo $td;?>
            </tr>
            <tr class="head_border">
                <td><b>เปิดเผยสถานะการติดเชื้อเอชไอวี</b> <br>(ผู้ติดเชื้อเอชไอวี)</td>
                 <?php echo $td;?>
            </tr>
            <tr class="head">
                <td><b>ถูกกีดกันหรือถูกเลือกปฏิบัติ<br>เนื่องมาจากกการติดเชื้อเอชไอวี</b></td>
                <?php echo $td;?>
            </tr>
            <tr class="subhead">
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ผู้ติดเชื้อเอชไอวี</td>
                <?php echo $td;?>
            </tr>
            <tr class="subhead_border">
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ครอบครัวและผู้ใกล้ชิตผู้ติดเชื้อเอชไอวี</td>
                <?php echo $td;?>
            </tr>
            <tr class="head">
                <td><b>ถูกกีดกันหรือถูกเลือกปฏิบัติ<br>เนื่องมาจากเป็นกลุ่มเปราะบาง</b></td>
                <?php echo $td;?>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-กลุ่มหลากหลายทางเพศ</td>
                <?php echo $td;?>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-พนักงานบริการ</td>
                 <?php echo $td;?>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-ผู้ใช้สารเสพติด</td>
                <?php echo $td;?>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-ประชากรข้ามชาติ</td>
                <?php echo $td;?>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-ผู้ถูกคุมขัง</td>
                <?php echo $td;?>
            </tr>
            <tr class="border">
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-กลุ่มชาติพันธุ์และชนเผ่า</td>
                 <?php echo $td;?>
            </tr>
             <tr class="head">
                <td><b>อื่นๆ ที่เกี่ยวข้องกับเอชไอวี</b></td>
                <?php echo $td;?>
            </tr>
            <tr class="subhead">
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ผู้ติดเชื้อเอชไอวี</td>
                <?php echo $td;?>
            </tr>
            <tr class="subhead">
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;กลุ่มเปราะบาง</td>
                <?php echo $td;?>
            </tr>
             <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-กลุ่มหลากหลายทางเพศ</td>
                 <?php echo $td;?>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-พนักงานบริการ</td>
                 <?php echo $td;?>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-ผู้ใช้สารเสพติด</td>
                 <?php echo $td;?>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-ประชากรข้ามชาติ</td>
                 <?php echo $td;?>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-ผู้ถูกคุมขัง</td>
                 <?php echo $td;?>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-กลุ่มชาติพันธุ์และชนเผ่า</td>
                 <?php echo $td;?>
            </tr>
            <tr class="subhead">
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ครอบครัวและผู้ใกล้ชิดผู้ติดเชื้อเอชไอวี</td>
                 <?php echo $td;?>
            </tr>
            <tr class="subhead">
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ประชาชนทั่วไป</td>
                 <?php echo $td;?>
            </tr>
            
    </tbody>
</table>
<?php } ?>
        </div>        

        </div>
		</form>
      </div>
      
      

    <style type="text/css">
    .demo { position: relative; }
    .demo i {
    position: absolute; bottom: 10px; right: 24px; top: auto; cursor: pointer;
    }
    </style>

    

      <script type="text/javascript">
      $(document).ready(function() {

        $('#config-text').keyup(function() {
          eval($(this).val());
        });
        
        $('.configurator input, .configurator select').change(function() {
          updateConfig();
        });

        $('.demo i').click(function() {
          $(this).parent().find('input').click();
        });

        $('#startDate').daterangepicker({
          singleDatePicker: true,
          startDate: moment().subtract(6, 'days')
        });

        $('#endDate').daterangepicker({
          singleDatePicker: true,
          startDate: moment()
        });

        updateConfig();

        function updateConfig() {
          var options = {};

            options.ranges = {
              'วันนี้': [moment(), moment()],
              'เมื่อวาน': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
              '7 วันที่แล้ว': [moment().subtract(6, 'days'), moment()],
              '30 วันที่แล้ว': [moment().subtract(29, 'days'), moment()],
              'เดือนนี้': [moment().startOf('month'), moment().endOf('month')],
              'เดือนที่แล้ว': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            };
            options.alwaysShowCalendars = true;

          $('#config-text').val("$('#demo').daterangepicker(" + JSON.stringify(options, null, '    ') + ", function(start, end, label) {\n  console.log(\"New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')\");\n});");

          $('#date1').daterangepicker(options, function(start, end, label) { console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')'); });
          
        }

      });
      </script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
        integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous">
    </script>

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
      
   </body>


     <link rel="stylesheet" type="text/css" href="DataTable/jquery.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" href="DataTable/buttons.dataTables.min.css" />

   <script type="text/javascript" language="javascript" src="DataTable/jquery.dataTables.min.js"></script>
   <script type="text/javascript" language="javascript" src="DataTable/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" language="javascript" src="DataTable/dataTables.buttons.min.js"></script>
    <script type="text/javascript" language="javascript" src="DataTable/buttons.flash.min.js"></script>
    <script type="text/javascript" language="javascript" src="DataTable/jszip.min.js"></script>
    <script type="text/javascript" language="javascript" src="DataTable/vfs_fonts.js"></script>
    <script type="text/javascript" language="javascript" src="DataTable/buttons.html5.min.js"></script>
    <script type="text/javascript" language="javascript" src="DataTable/buttons.print.min.js"></script>
<script type="text/javascript" language="javascript">


$(document).ready(function() {
    $('#crisis').DataTable( {
		bFilter: true,
        dom: 'Bfrtip',
        buttons: [
            'excel', 'copy', 'print'
        ],
		paging: false,
		ordering: false
    } );
} );

  </script>
<?php mysql_close($connection); ?>  


</html>
