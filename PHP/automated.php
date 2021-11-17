<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="theme-color" content="#d45c9c" />

    <link rel="shortcut icon" href="../public/favicon.ico">
    <title>ปกป้อง (CRS)</title>

    <link href="css/printpage.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" crossorigin="anonymous">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link href="report.css" rel="stylesheet">

    <script type="text/javascript" src="../public/NewFusionChart/js/fusioncharts.js"></script>
    <script type="text/javascript" src="../public/NewFusionChart/js/themes/fusioncharts.theme.hulk-light.js"></script>

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
                    <a href="../public"><span class="icon is-small">
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
                <a type="button" class="btn btn-white btn-rounded  align-items-stretch d-flex border "
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

				<a type="button" class="btn btn-primary btn-rounded align-items-stretch d-flex"
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




    </div>



    <?php

	require("phpsql_dbinfo_automated.php");
	require("format_date.php");

	$conn = mysqli_connect($hostname, $username, $password, $database);

    $conn -> set_charset("utf8");

	$years = $_POST["years"];
	$type = $_POST["type"];
	$month = $_POST["month"];
	$quarter = $_POST["quarter"];

	if ($type == "0"){
		$quarter_get = "ปี ";	
		$quarter_detail = ($years+543);
		$quarter_text = $quarter_get.$quarter_detail;
		
		//$query_date_range = " and (year(c.created_at) = '".$years."')";

        $query_date_range = " and (date(c.created_at) between '".($years-1)."-10-01' and '".($years)."-09-30') ";

		
		$quarter_title = "ปี ";
		
	}else if ($type == "1"){
		$quarter_get = "เดือน";
		$quarter_detail = MonthThLong($years."-".$month."-01");
		$quarter_text = $quarter_get.$quarter_detail;
		
		
		$query_date_range = " and (month(c.created_at) = '".$month."' and year(c.created_at) = '".$years."')";
		
		$quarter_title = "เดือน";
		
	}else if ($type == "2"){
		$quarter_get = "ไตรมาสที่ ".$quarter;
        if ($quarter == "1"){
			$quarter_detail = "(ตุลาคม – ธันวาคม ".($years+543).")";
			$mstart = "10";
			$mstop = "12";
            $years_q = ($years-1);
		}else if ($quarter == "2"){
			$quarter_detail = "(มกราคม – มีนาคม ".($years+543).")";
			$mstart = "01";
			$mstop = "03";
            $years_q = $years;
		}else if ($quarter == "3"){
			$quarter_detail = "(เมษายน – มิถุนายน ".($years+543).")";
			$mstart = "04";
			$mstop = "06";
            $years_q = $years;
		}else if ($quarter == "4"){
			$quarter_detail = "(กรกฎาคม – กันยายน ".($years+543).")";
			$mstart = "07";
			$mstop = "09";
            $years_q = $years;
		} 
		$quarter_text = $quarter_get;
		$query_date_range = " and ((month(c.created_at) between '".$mstart."' and  '".$mstop."') and (year(c.created_at) = '".$years_q."'))";
		$quarter_title = "ระหว่างเดือน";
	}else{

        $years = date("Y");
        $quarter_get = "ปี ";	
		$quarter_detail = ($years+543);
		$quarter_text = $quarter_get.$quarter_detail;
		
		//$query_date_range = " and (year(c.created_at) = '".$years."')";

        $query_date_range = " and (date(c.created_at) between '".($years-1)."-10-01' and '".($years)."-09-30') ";

		
		$quarter_title = "ปี ";

    }

	if ($years == ""){
		$years = date("Y");	
	}
	if ($type == ""){
		$type = "0";
	}

	$print_date = DateThLong(date('Y-m-d'));


	$count_no = 1; // no of province
	$case1_sum = 0;
	$case2_sum = 0;
	$case3_sum = 0;
	$case4_sum = 0;
	$case5_sum = 0;
	$case6_sum = 0;// unused
	$case_total = 0;

	$pilot_province = 0;
	$non_pilot_province = 0;
	$prov_total = 0;

	$group_total = 0;
	$offender_total = 0;

								
	$query = "select prov_id,p.name as provname,nhso,p.pilot_province,count(case_id) as total ";
	$query .= "from case_inputs c inner join prov_geo p on c.prov_id = p.code ";
	$query .=  $query_date_range;
	$query .= " group by c.prov_id ";
	$query .= " order by cast(nhso as signed),prov_id asc;";


		//echo $query;
				
			
					$result = mysqli_query($conn,$query);

					$prov_total =  mysqli_num_rows($result);
				
					while($rows = $result->fetch_assoc()) 
					{		
						//echo "hello";
					
								// for pilot province
								if ($rows["pilot_province"] == "1"){
									$pilot_province += 1;
									$pilot_prov_name[] = $rows["provname"];
									$pilot_moph_name[] = $rows["nhso"];
									
								}else{
									$non_pilot_province += 1;
									$non_pilot_prov_name[] = $rows["provname"];
									$non_pilot_moph_name[] = $rows["nhso"];
									
								}
								
								$case_sort[] = $rows["total"];
								$provname_sort[] = $rows["provname"];
									
								
								
								$query_case = "select prov_id,count(c.problem_case) as count_case, c.problem_case ";
								$query_case .= "from case_inputs c ";
								$query_case .= "where (prov_id = '".$rows["prov_id"]."') and (sender_case is not null) ";
								$query_case .=  $query_date_range;
								$query_case .= "group by c.problem_case ";
								$query_case .= "order by problem_case asc;";
								//echo $query_case;
								
								//mysqli_query($query_case);
								//$result_case = mysqli_query($query_case);
								$result_case = mysqli_query($conn,$query_case);
								//echo mysqli_num_rows($result_case);
								
															
								$problem_case1 = "";
								$problem_case2 = "";
								$problem_case3 = "";
								$problem_case4 = "";
								$problem_case5 = "";
								$problem_case6 = "";
								
								
								while($rows_case = mysqli_fetch_array($result_case))
								{		
									
									switch ($rows_case["problem_case"]) {
										 	case "1":
												$problem_case1 = $rows_case["count_case"];
												$case1_sum += $rows_case["count_case"];
												break;
										  	case "2":
												$problem_case2 = $rows_case["count_case"];
												$case2_sum += $rows_case["count_case"];
												break;
										   	case "3":
										   		$problem_case3 = $rows_case["count_case"];
												$case3_sum += $rows_case["count_case"];
												break;
											case "4":
												$problem_case4 = $rows_case["count_case"];
												$case4_sum += $rows_case["count_case"];
												break;
										  	case "5":
										  	 	$problem_case5 = $rows_case["count_case"];
												$case5_sum += $rows_case["count_case"];
												break;
										   case "6":
										  		$problem_case6 = $rows_case["count_case"];
												$case6_sum += $rows_case["count_case"];
												break;
										  default:
										  		break;
											
									} 
									
									
									
								}// end province
						$alt_line = $count_no % 2;
						
						if ($alt_line == 0){
						$tr_content.= "<tr style='background-color:#fba3e0;'>";
						}else{
						$tr_content.= "<tr style='background-color:#f9e7f8;'>";
						}
						$tr_content.= "<td align='center'>".$count_no."</td>";
						$tr_content.= "<td>".$rows["provname"]."</td>";
						$tr_content.= "<td align='center'>".$rows["nhso"]."</td>";
						$tr_content.= "<td align='center' width='10%'>".$problem_case1."</td>";
						$tr_content.= "<td align='center' width='10%'>".$problem_case2."</td>";
						$tr_content.= "<td align='center' width='15%'>".$problem_case4."</td>";
						$tr_content.= "<td align='center' width='15%'>".$problem_case3."</td>";
						$tr_content.= "<td align='center' width='10%'>".$problem_case5."</td>";
						$tr_content.= "<td align='center' width='10%'>".$problem_case6."</td>";
						$tr_content.= "<td align='center'>".($problem_case1+$problem_case2+$problem_case3+$problem_case4+$problem_case5+$problem_case6)."</td>";
						$tr_content.= "</tr>";


						$count_no++;		
						
					}
					
						//footer
						//$case5_total = ($case5_sum+$case6_sum);
						$case_total = ($case1_sum+$case2_sum+$case3_sum+$case4_sum+$case5_sum+$case6_sum);
						$tr_content.= "<tr style='background-color:#de0867;color:#ffffff;' align='center'>";
						$tr_content.= "<td colspan='3'>รวม</td>";
						$tr_content.= "<td>".$case1_sum."</td>";
						$tr_content.= "<td>".$case2_sum."</td>";
						$tr_content.= "<td>".$case4_sum."</td>";
						$tr_content.= "<td>".$case3_sum."</td>";
						$tr_content.= "<td>".$case5_sum."</td>";
						$tr_content.= "<td>".$case6_sum."</td>";
						$tr_content.= "<td>".$case_total."</td>";
						$tr_content.= "</tr>";
						
						
						$case_array = array(intval($case1_sum), intval($case2_sum), intval($case4_sum),intval($case3_sum),intval($case5_sum),intval($case6_sum));
						$problem_array = array("บังคับตรวจเอชไอวี","เปิดเผยสถานะการติดเชื้อเอชไอวี","ถูกกีดกันหรือถูกเลือกปฏิบัติเนื่องมาจากเป็นกลุ่มเปราะบาง","ถูกกีดกันหรือถูกเลือกปฏิบัติเนื่องมาจาการติดเชื้อเอชไอวี","อื่นๆ ที่เกี่ยวข้องกับเอชไอวี","อื่นๆ");
						
						array_multisort($case_array, SORT_DESC, $problem_array);
						
						array_multisort($pilot_moph_name, SORT_ASC, $pilot_prov_name);
						
						array_multisort($non_pilot_moph_name, SORT_ASC, $non_pilot_prov_name);
						
						array_multisort($case_sort, SORT_DESC, $provname_sort);
						//rsort($case_array);
						
						/*
						foreach ($case_array as $value) {
							//echo "<br>".$value.",";
						} 
						*/
						/*
						foreach ($problem_array as $value) {
							//echo "<br>".$value.",";
						} 
						*/
						
						/*
						
						foreach ($pilot_prov_name as $value) {
							echo "<br>".$value.",";
						} 
						
						foreach ($non_pilot_prov_name as $value) {
							echo "<br>".$value.",";
						} 
						*/
						
					// กลุ่มประชากร	
					$query = "select group_code,r.name,count(case_id) as total ";
					$query .= "from case_inputs c inner join r_group_code r on c.group_code = r.code ";
					$query .= "where problem_case = '4' ";
					$query .=  $query_date_range;
					$query .= "group by c.group_code;";

				
		     		//mysqli_query($query);
					$result = mysqli_query($conn,$query) ;
					
					 
				
					while($rows = mysqli_fetch_array($result))
					{	
						$group_code[] = $rows["group_code"];
						$group_name[] = $rows["name"];
						$group_code_total[] = $rows["total"];
						$group_total += $rows["total"];
					
					}
					array_multisort($group_code_total, SORT_DESC, $group_name);
					
					
					
					
					
					
					
			    
				//case status
				$query = "select ";
					$query .= "sum(CASE WHEN status > '0' THEN 1 ELSE 0 END) as casestep1,";
					$query .= "sum(CASE WHEN status > '1' THEN 1 ELSE 0 END) as casestep2,";
					$query .= "sum(CASE WHEN status > '2' THEN 1 ELSE 0 END) as casestep3,";
					$query .= "sum(CASE WHEN status > '3' THEN 1 ELSE 0 END) as casestep4,";
					$query .= "sum(CASE WHEN status > '4' THEN 1 ELSE 0 END) as casestep5,";
					$query .= "sum(CASE WHEN status > '5' THEN 1 ELSE 0 END) as casestep6 ";
					$query .= "FROM case_inputs c ";
					$query .= "where (sender_case is not null) ";
					$query .=  $query_date_range;

				
		     		//mysqli_query($query);
					$result = mysqli_query($conn,$query);
					
					 
					 
					
					
					while($rows = mysqli_fetch_array($result))
					{	
						$group_status_code[] = $rows["casestep1"];
						$group_status_code[] = $rows["casestep2"];
						$group_status_code[] = $rows["casestep3"];
						$group_status_code[] = $rows["casestep4"];
						$group_status_code[] = $rows["casestep5"];
						$group_status_code[] = $rows["casestep6"];
					}
					
					
					
					//ช่วยเหลือสำเร็จ ไม่สำเร็จ ตาย ย้ายที่อยู่
					$query = "select ";
					$query .= "sum(CASE WHEN operate_result_status = '1' THEN 1 ELSE 0 END) as result1, ";
					$query .= "sum(CASE WHEN operate_result_status = '2' THEN 1 ELSE 0 END) as result2, ";
					$query .= "sum(CASE WHEN operate_result_status = '3' THEN 1 ELSE 0 END) as result3, ";
					$query .= "sum(CASE WHEN operate_result_status = '4' THEN 1 ELSE 0 END) as result4 ";
					$query .= "FROM case_inputs c ";
					$query .= "where c.`status` = '5' and sender_case is not null ";
					$query .=  $query_date_range;

					//echo $query;
		     		//mysqli_query($query);
					$result = mysqli_query($conn,$query);
					
					 
					 
					
					
					while($rows = mysqli_fetch_array($result))
					{	
						$group_status_result_code[] = $rows["result1"];
						$group_status_result_code[] = $rows["result2"];
						$group_status_result_code[] = $rows["result3"];
						$group_status_result_code[] = $rows["result4"];
					}
					
					
					if (trim($group_status_result_code[0]) != "0")  {
						$text_result = "สำเร็จ ".$group_status_result_code[0]." เรื่อง ";
					}
					
					
					if ((trim($group_status_result_code[1]) != "0")) {
						$text_result .= "ไม่สำเร็จ ".$group_status_result_code[1]." เรื่อง ";
					}
					
				
					if (trim($group_status_result_code[2]) != "0") {
						$text_result .= "เสียชีวิต ".$group_status_result_code[2]." เรื่อง ";
					}
					
					if (trim($group_status_result_code[3]) != "0") {
						$text_result .= "ย้ายที่อยู่ ".$group_status_result_code[3]." เรื่อง";
					}
				
					
				
				
					
				// การรายงานการละเมิดสิทธิผ่านระบบ 
				$count = 1;	
				$query  = "select c.problem_case, r.name, ";
                $query .= "sum(CASE WHEN  sender_case = '3'  THEN 1 ELSE 0 END) as sendercase3, ";
                $query .= "sum(CASE WHEN  sender_case = '1'  THEN 1 ELSE 0 END) as sendercase1, ";
                $query .= "sum(CASE WHEN  sender_case = '2'  THEN 1 ELSE 0 END) as sendercase2, ";
                $query .= "count(sender_case) as sendercaseall ";
                $query .= "FROM ";
                $query .= "case_inputs c ";
                $query .= "left join r_problem_case r ";
                $query .= "on c.problem_case = r.code ";
				$query .=  " where 1 ";
				$query .=  $query_date_range;
                $query .= "GROUP BY problem_case order by problem_case;";
				
				//echo $query;
				//mysqli_query($query);
				$result = mysqli_query($conn,$query);
				while($rows = mysqli_fetch_array($result))
					{	
					
						$alt_line = $count % 2;
						if ($alt_line == 0){
						$tr_content_3.= "<tr style='background-color:#fba3e0;'>";
						}else{
						$tr_content_3.= "<tr style='background-color:#f9e7f8;'>";
						}
						//$tr_content_3.= "<tr>";
						$tr_content_3.= "<td>".$count.".".$rows["name"]."</td>";
						$tr_content_3.= "<td align='center'>".$rows["sendercase3"]."</td>";
						$tr_content_3.= "<td align='center'>".$rows["sendercase1"]."</td>";
						$tr_content_3.= "<td align='center'>".$rows["sendercase2"]."</td>";
						$tr_content_3.= "<td align='center'>".$rows["sendercaseall"]."</td>";
						$tr_content_3.= "</tr>";
						$sendercase3_sum +=$rows["sendercase3"];
						$sendercase1_sum +=$rows["sendercase1"];
						$sendercase2_sum +=$rows["sendercase2"];
						$sendercaseall_sum +=$rows["sendercaseall"];
						
						$count++;
					
					}
					
						$tr_content_3.= "<tr style='background-color:#de0867;color:#ffffff;'>";
						$tr_content_3.= "<td>ทั้งหมด</td>";
						$tr_content_3.= "<td align='center'>".$sendercase3_sum."</td>";
						$tr_content_3.= "<td align='center'>".$sendercase1_sum."</td>";
						$tr_content_3.= "<td align='center'>".$sendercase2_sum."</td>";
						$tr_content_3.= "<td align='center'>".$sendercaseall_sum."</td>";
						$tr_content_3.= "</tr>";
						
						
						
						
					//ละเมิดโดยองค์กร หรือ บุคคล
					$query = "select ";
					$query .= "subtype_offender,";
					$query .= "count(subtype_offender) as total ";
					$query .= "FROM case_inputs c inner join add_details a on c.case_id = a.case_id ";
					$query .= "where sender_case is not null ";
					$query .=  $query_date_range;
					$query .= " group by a.subtype_offender";
					$query .= " order by total desc;";
					
					
					//echo $query;
		     		//mysqli_query($query);
					$result = mysqli_query($conn,$query);
					
					while($rows = mysqli_fetch_array($result))
					{	
						$group_offender_total[] = $rows["total"];
						
						if ($rows["subtype_offender"] == "1"){
							$group_offender_code[] = "การละเมิดสิทธิในระดับบุคคล";
						}else if ($rows["subtype_offender"] == "2"){
							$group_offender_code[] = "การละเมิดสิทธิในระดับองค์กร";
						}
						
						$offender_total+= $rows["total"];
					}
					
					//array_multisort($group_offender_total, SORT_DESC, $group_offender_code);

					
					
					
					


?>

    <br>
    <div class="container p-3">
        <form name="form_menu" method="post" action="automated.php">
            <div class="row">
                <div class="col-auto">
                    <strong class="col-form-label">เลือกปี</strong>
                </div>
                <div class="col-auto">
                    <div class="select">
                        <select id="years" name="years" class="form-select">
                            <option value="2021" <?php if ($years == "2021"){ echo "selected";} ?>>2564</option>
                            <option value="2020" <?php if ($years == "2020"){ echo "selected";} ?>>2563</option>
                            <option value="2019" <?php if ($years == "2019"){ echo "selected";} ?>>2562</option>
                        </select>
                    </div>
                </div>

                <div class="col-auto">
                    <strong class="col-form-label">เลือกรูปแบบ</strong>
                </div>

                <div class="col-auto">
                    <div class="select">
                        <select id="type" name="type" class="form-select">
                            <option value="0" <?php if ($type == "0"){ echo "selected";} ?>>ทั้งปี</option>
                            <option value="1" <?php if ($type == "1"){ echo "selected";} ?>>รายเดือน</option>
                            <option value="2" <?php if ($type == "2"){ echo "selected";} ?>>รายไตรมาส</option>
                        </select>
                    </div>
                </div>

                <div class="col-auto" id="month_div">
                    <div class="select">
                        <select id="month" name="month" class="form-select">
                            <option value="01" <?php if ($month == "01"){ echo "selected";} ?>>มกราคม</option>
                            <option value="02" <?php if ($month == "02"){ echo "selected";} ?>>กุมภาพันธ์</option>
                            <option value="03" <?php if ($month == "03"){ echo "selected";} ?>>มีนาคม</option>
                            <option value="04" <?php if ($month == "04"){ echo "selected";} ?>>เมษายน</option>
                            <option value="05" <?php if ($month == "05"){ echo "selected";} ?>>พฤษภาคม</option>
                            <option value="06" <?php if ($month == "06"){ echo "selected";} ?>>มิถุนายน</option>
                            <option value="07" <?php if ($month == "07"){ echo "selected";} ?>>กรกฎาคม</option>
                            <option value="08" <?php if ($month == "08"){ echo "selected";} ?>>สิงหาคม</option>
                            <option value="09" <?php if ($month == "09"){ echo "selected";} ?>>กันยายน</option>
                            <option value="10" <?php if ($month == "10"){ echo "selected";} ?>>ตุลาคม</option>
                            <option value="11" <?php if ($month == "11"){ echo "selected";} ?>>พฤศจิกายน</option>
                            <option value="12" <?php if ($month == "12"){ echo "selected";} ?>>ธันวาคม</option>
                        </select>
                    </div>
                </div>

                <div class="col-auto" id="quarter_div" style="display:none">
                    <div class="select">
                        <select id="quarter" name="quarter" class="form-select">
                            <option value="1" <?php if ($quarter == "1"){ echo "selected";} ?>>ไตรมาสที่ 1</option>
                            <option value="2" <?php if ($quarter == "2"){ echo "selected";} ?>>ไตรมาสที่ 2</option>
                            <option value="3" <?php if ($quarter == "3"){ echo "selected";} ?>>ไตรมาสที่ 3</option>
                            <option value="4" <?php if ($quarter == "4"){ echo "selected";} ?>>ไตรมาสที่ 4</option>
                        </select>
                    </div>
                </div>




                <div class="col-auto ">
                    <input type="submit" class="btn btn-danger" id="submit" name="submit" value="ตกลง">

                </div>
                <div class="col-auto ">
                    <button class="btn btn-info text-white" onclick="printDiv('result_ac')"> <i class="fa fa-print"
                            aria-hidden="true"></i>&nbsp;พิมพ์รายงาน</button>
                </div>
            </div>
        </form>
    </div>


    <br />

    <div class="container border bg-white p-3">
        <div id="result_ac">
            <div id="head" align="center">
                <h3>รายงานการละเมิดสิทธิฯ ผ่านระบบ CRS <?php echo $quarter_get; ?> <?php echo $quarter_detail; ?></h3>
            </div>

            <div id="head" align="center">
                -----------------------------------------------------------------------------------
            </div>



            <div id="paragrahp1" class="indent1 container">
                <p style="text-align: justify;">
                    <?php echo $quarter_text; ?> มีเหตุร้องเรียนในระบบ จำนวน <?php echo $case_total; ?> เรื่อง
                    กรณีที่ร้องเรียนมากที่สุดคือ
                    <?php echo $problem_array[0]; ?> จำนวน <?php echo $case_array[0]; ?> เรื่อง คิดเป็นร้อยละ
                    <?php echo number_format(($case_array[0]*100/$case_total),1);?> ของการร้องเรียนทั้งหมด รองลงมาคือ
                    <?php echo $problem_array[1]; ?> จำนวน <?php echo $case_array[1]; ?> เรื่อง คิดเป็นร้อยละ
                    <?php echo number_format(($case_array[1]*100/$case_total),1);?>
                    <?php if (trim($case_array[2]) != ""){ ?>
                    <?php echo $problem_array[2]; ?> จำนวน <?php echo $case_array[2]; ?> เรื่อง คิดเป็นร้อยละ
                    <?php echo number_format(($case_array[2]*100/$case_total),1);?> และ
                    <?php } ?>
                    <?php if (trim($case_array[3]) != ""){ ?>
                    <?php echo $problem_array[3]; ?> จำนวน <?php echo $case_array[3]; ?> เรื่อง คิดเป็นร้อยละ
                    <?php echo number_format(($case_array[3]*100/$case_total),1);?> นอกจากนี้ยังมี
                    <?php } ?>
                    <?php if (trim($case_array[4]) != ""){ ?>
                    <?php echo $problem_array[4]; ?> อีกจำนวน <?php echo $case_array[4]; ?> เรื่อง คิดเป็นร้อยละ
                    <?php echo number_format(($case_array[4]*100/$case_total),1);?>
                    <?php } ?>
                </p>
            </div>
            <div id="paragrahp2" class="indent1 container">
                <p style="text-align: justify;">
                    รายงานการละเมิดสิทธิเกิดขึ้นใน <?php echo $prov_total; ?> จังหวัด เป็นจังหวัดพื้นที่นำร่อง
                    <?php echo $pilot_province; ?> จังหวัด ได้แก่
                    <?php $count = 1; foreach ($pilot_prov_name as $value) { if ($count != $pilot_province ) {echo $value." ";}else{ echo "และ".$value;} $count++;} ?>
                    อีกจำนวน <?php echo $non_pilot_province; ?> จังหวัด อยู่นอกพื้นที่นำร่อง ได้แก่
                    <?php $count = 1; foreach ($non_pilot_prov_name as $value) { if ($count != $non_pilot_province ) {echo $value." ";}else{ echo "และ".$value;} $count++;} ?>
                    โดยจังหวัดที่มีการร้องเรียนสูงสุด ได้แก่ <?php echo $provname_sort[0]; ?> จำนวน
                    <?php echo $case_sort[0]; ?> เรื่อง (ดังตารางที่ 1)
                </p>
            </div>
            <div class="indent2 container">
                <p><b>ตารางที่ 1</b> สรุปข้อมูลการร้องเรียนในระบบ CRS ข้อมูลในระบบ<?php echo $quarter_title; ?>
                    <?php echo $quarter_detail; ?> จำแนกตามกรณีร้องเรียน </p>
            </div>
            <div class="indent2 container">
                <div align="center">
                    <table border="0" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <td rowspan="2" style="background-color:#de0867;color:#ffffff;" align="center">
                                    <p align="center"><strong>ลำดับ</strong></p>
                                </td>
                                <td rowspan="2" style="background-color:#de0867;color:#ffffff;" align="center">
                                    <p align="center"><strong>จังหวัด</strong><strong> </strong></p>
                                </td>
                                <td rowspan="2" style="background-color:#de0867;color:#ffffff;" align="center">
                                    <p align="center"><strong>เขต</strong></p>
                                </td>
                                <td colspan="6" valign="top" style="background-color:#de0867;color:#ffffff;"
                                    align="center">กรณีร้องเรียน</td>
                                <td rowspan="2" style="background-color:#de0867;color:#ffffff;" align="center">รวม</td>
                            </tr>
                            <tr>
                                <td valign="top" style="background-color:#d45c9c;color:#ffffff;">
                                    <p align="center">1.บังคับตรจเอชไอวี</p>
                                </td>
                                <td valign="top" style="background-color:#d45c9c;color:#ffffff;">
                                    <p align="center">2.เปิดเผยสถานะการติดเชื้อเอชไอวี </p>
                                </td>
                                <td valign="top" style="background-color:#d45c9c;color:#ffffff;">
                                    <p align="center">3.ถูกกีดกันหรือถูกเลือกปฏิบัติเนื่องมาจากเป็นกลุ่มเปราะบาง </p>
                                </td>
                                <td valign="top" style="background-color:#d45c9c;color:#ffffff;">
                                    <p align="center">
                                        4.ถูกกีดกันหรือถูกเลือกปฏิบัติ</a><br />เนื่องมาจากการติดเชื้อเอชไอวี</p>
                                </td>
                                <td valign="top" style="background-color:#d45c9c;color:#ffffff;">
                                    <p align="center">5.อื่นๆ ที่เกี่ยวข้องกับเอชไอวี</p>
                                </td>
                                <td valign="top" style="background-color:#d45c9c;color:#ffffff;">
                                    <p align="center">6.อื่นๆ</p>
                                </td>
                            </tr>
                        </thead>

                        <?php echo $tr_content; ?>

                    </table>

                </div>
                <p style="font-size:13px"><b>หมายเหตุ</b> รวมข้อมูลทุกสถานะการดำเนินงาน (ยังไม่รับเรื่อง, รับเรื่องแล้ว,
                    บันทึกข้อมูลเพิ่มเติมแล้ว, อยู่ระหว่างดำเนินการ, ดำเนินการเสร็จสิ้น) ณ วันที่
                    <?php echo $print_date; ?></p>
            </div>

            <div id="paragrahp3" class="indent1 container">
                <p>
                    จากสถิติเรื่องร้องเรียนที่พบว่ามีการถูกเลือกปฏิบัติเนื่องมาจากเป็นกลุ่มเปราะบางมากที่สุด
                    โดยมีจำนวนทั้งหมด <?php echo $group_total; ?> เรื่อง
                    หากจำแนกย่อยในแต่ละกลุ่มพบว่าเป็นการถูกเลือกปฏิบัติใน
                    <?php echo $group_name[0]; ?> จำนวน <?php echo $group_code_total[0]; ?> เรื่อง ร้อยละ
                    <?php echo number_format(($group_code_total[0]*100/$group_total),1); ?>
                    <?php if (trim($group_code_total[1]) != ""){ ?>
                    <?php echo $group_name[1]; ?> จำนวน <?php echo $group_code_total[1]; ?> เรื่อง ร้อยละ
                    <?php echo number_format(($group_code_total[1]*100/$group_total),1); ?>
                    <?php } ?>
                    <?php if (trim($group_code_total[2]) != ""){ ?>
                    <?php echo $group_name[2]; ?> จำนวน <?php echo $group_code_total[2]; ?> เรื่อง ร้อยละ
                    <?php echo number_format(($group_code_total[2]*100/$group_total),1); ?> และ
                    <?php } ?>
                    <?php if (trim($group_code_total[3]) != ""){ ?>
                    <?php echo $group_name[3]; ?> จำนวน <?php echo $group_code_total[3]; ?> เรื่อง ร้อยละ
                    <?php echo number_format(($group_code_total[3]*100/$group_total),1); ?>
                    <?php } ?>
                </p>
            </div>
            <div id="paragrahp4" class="indent2 container">
                <p><b>แผนภูมิที่ 1</b> สถานะการดำเนินงานจัดการเรื่องร้องเรียนในระบบ CRS
                    ข้อมูลในระบบ<?php echo $quarter_title; ?> <?php echo $quarter_detail;?></p>
                <div id="chart-container-b1"></div>
                <p style="font-size:13px"><b>หมายเหตุ</b> สรุปข้อมูล ณ วันที่ <?php echo $print_date; ?></p>

            </div>
            <div id="paragrahp4" class="indent1 container">
                <p>
                    เมื่อสรุปผลการจัดการเรื่องร้องเรียน พบว่าจากเรื่องร้องเรียนทั้งหมด
                    <?php echo $group_status_code[0]; ?> เรื่อง รับเรื่องแล้ว <?php echo $group_status_code[1]; ?>
                    เรื่อง ติดต่อกลับเพื่อบันทึกข้อมูลเพิ่มเติมแล้ว จำนวน <?php echo $group_status_code[2]; ?> เรื่อง
                    ในจำนวนนี้ได้ดำเนินการช่วยเหลือแล้ว <?php echo $group_status_code[3]; ?> เรื่อง
                    โดยช่วยเหลือเสร็จสิ้น <?php echo $group_status_code[4]; ?> เรื่อง อีกจำนวน
                    <?php echo $group_status_code[3]-$group_status_code[4]; ?> เรื่อง อยู่ระหว่างการดำเนินงาน
                    โดยเรื่องที่ช่วยเหลือเสร็จสิ้น <?php echo $group_status_code[4]; ?> เรื่อง
                    <?php echo $text_result; ?>

                </p>
            </div>
            <div id="paragrahp5" class="indent1 container">
                <p>
                    การละเมิดสิทธิส่วนใหญ่ ร้อยละ
                    <?php echo number_format((($group_offender_total[0]*100)/$offender_total),1); ?>
                    เป็น<?php echo $group_offender_code[0]; ?> และอีกร้อยละ
                    <?php echo number_format((($group_offender_total[1]*100)/$offender_total),1);  ?>
                    เป็น<?php echo $group_offender_code[1]; ?> ทั้งนี้การแจ้งเหตุในระบบทั้งหมด
                    <?php echo $sendercaseall_sum; ?> เรื่อง ส่วนใหญ่เป็นการแจ้งโดยเจ้าหน้าที่ จำนวน
                    <?php echo $sendercase3_sum; ?> เรื่อง (ร้อยละ
                    <?php echo number_format(($sendercase3_sum*100/$sendercaseall_sum),1); ?>)
                    มีเหตุที่ผู้ถูกละเมิดสิทธิแจ้งด้วยตนเอง จำนวน
                    <?php echo $sendercase1_sum; ?> เรื่อง คิดเป็นร้อยละ
                    <?php echo number_format(($sendercase1_sum*100/$sendercaseall_sum),1); ?> และมีเรื่องที่มีผู้แจ้งแทน
                    (ที่ไม่ใช่เจ้าหน้าที่) จำนวน
                    <?php echo $sendercase2_sum; ?> เรื่อง คิดเป็นร้อยละ
                    <?php echo number_format(($sendercase2_sum*100/$sendercaseall_sum),1); ?> ดังตารางที่ 2
                </p>
            </div>

            <div id="paragrahp6" class="indent2 container">
                <p><b>ดังตารางที่ 2</b> การรายงานละเมิดสิทธิผ่านระบบ CRS <?php echo $quarter_title; ?>
                    <?php echo $quarter_detail; ?></p>
                <div align="center">
                    <table border="0" cellspacing="0" cellpadding="0" width="100%">
                        <tr style="background-color:#de0867;color:#ffffff;">
                            <td>
                                <p align="center">กรณีละเมิดสิทธิ
                            </td>
                            <td>
                                <p align="center">เจ้าหน้าที่แจ้ง
                            </td>
                            <td>
                                <p align="center">แจ้งด้วยตนเอง
                            </td>
                            <td>
                                <p align="center">มีผู้แจ้งแทน
                            </td>
                            <td>
                                <p align="center">ทั้งหมด
                            </td>
                        </tr>
                        <?php echo $tr_content_3; ?>

                    </table>
                </div>
                <p style="font-size:13px"><b>หมายเหตุ</b> ข้อมูล ณ วันที่ <?php echo $print_date; ?></p>


            </div>

        </div>


    </div>
    <br />

    <!-- Footer -->
    <footer class="text-center text-lg-start bg-light text-muted">

        <!-- Copyright -->
        <div class="text-center p-5" style="background-color: #dddddd;">
            Crisis Response System (CRS)
            <p id="tsp"> <small> Source code licensed <a href="http://www.hiso.or.th">HISO</a>. </small> </p>
        </div>
        <!-- Copyright -->
    </footer>


</body>
<script>
function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
}
</script>
<?php
mysqli_close($connection);
?>
<script type="text/javascript">
FusionCharts.ready(function() {
    var salesChart = new FusionCharts({
            type: 'column2d',
            renderAt: 'chart-container-b1',
            width: '100%',
            //height: '400',
            dataFormat: 'json',
            dataSource: {
                "chart": {
                    "caption": "",
                    "subCaption": "",
                    "placeValuesInside": "0",
                    "yAxisName": "จำนวนเรื่องร้องเรียน (เรื่อง)",
                    "basefontsize": "14",
                    "captionFontSize": "16",
                    "subcaptionFontSize": "16",
                    "showAxisLines": "1",
                    "axisLineAlpha": "25",
                    "alignCaptionWithCanvas": "0",
                    "showAlternateVGridColor": "1",
                    "numberScaleValue": "0",
                    "theme": "hulk-light",
                    "palettecolors": "#de0867",
                    "chartLeftMargin": "10",
                    "placeValuesInside": "0",
                    /*
                    "numVDivLines": "5",
                    "vDivLineColor": "#99ccff",
                    "vDivLineThickness": "1",
                    "vDivLineAlpha": "50"
                    */
                    //"exportEnabled": "1"

                },
                "data": [{
                        "label": "เรื่องทั้งหมด",
                        "value": "<?php echo $group_status_code[0]; ?>",
                    },
                    {
                        "label": "รับเรื่องแล้ว",
                        "value": "<?php echo $group_status_code[1]; ?>",
                    },
                    {
                        "label": "สอบถามข้อมูล<br>เพิ่มเติม",
                        "value": "<?php echo $group_status_code[2]; ?>",
                    },
                    {
                        "label": "ดำเนินการช่วยเหลือ",
                        "value": "<?php echo $group_status_code[3]; ?>",
                    },
                    {
                        "label": "เสร็จสิ้น",
                        "value": "<?php echo $group_status_code[4]; ?>",
                    },
                    {
                        "label": "ช่วยเหลือสำเร็จ",
                        "value": "<?php echo $group_status_result_code[0]; ?>",
                    }
                ]

            }

        })
        .render();
});
</script>
<script type="text/javascript" src="../public/NewFusionChart/js/fusioncharts.js"></script>
<script type="text/javascript" src="../public/NewFusionChart/js/themes/fusioncharts.theme.hulk-light.js"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
//type_report
function news_div() {

    if ($('#type').val() == '0') {
        $("#month_div").hide();
        $("#quarter_div").hide();
    } else if ($('#type').val() == '1') {
        $("#month_div").show();
        $("#quarter_div").hide();
    } else {
        $("#month_div").hide();
        $("#quarter_div").show();
    }
}

$(document).ready(function() {

    news_div();

    $('#type').on('change', function() {
        news_div();
        //console.log("1")
    });
});
</script>

</html>