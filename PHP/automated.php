<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="theme-color" content="#d45c9c" />

    <link rel="shortcut icon" href="../public/favicon.ico">
    <title>ปกป้อง (CRS)</title>

    <link href="../public/css/printpage.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" crossorigin="anonymous">


    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

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

                <a href="automated.php" class="btn tabtype active">
                    <div class="p-1">
                        <i class="fas fa-file-alt">&nbsp;</i> รายงานการละเมิดสิทธิ
                    </div>
                </a>

                <a href="mapcrisis_new.php" class="btn tabtype">
                    <div class="p-1">
                        <i class="fas fa-map">&nbsp;</i> พิกัดจุดเกิดเหตุ
                    </div>
                </a>

                <div class="dropdown tabtype btn ">
                    <a class="dropdown-toggle textcolor1 p-1" type="button" id="dropdownMenu1" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-table">&nbsp;</i> สรุปข้อมูลภาพรวม
                    </a>
                    <div class="dropdown-menu color-h3 bg-gradient" aria-labelledby="dropdownMenu1">
                        <a class="dropdown-item " id="dropdown-layouts" href="table_new.php">
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



    <?php

	require("phpsql_dbinfo_automated.php");
	require("format_date.php");

	$conn = mysqli_connect($hostname, $username, $password, $database);

    $conn -> set_charset("utf8");

	$years = $_POST["years"];
	$type = $_POST["type"];
	$month = $_POST["month"];
	$quarter = $_POST["quarter"];


    $type_area = $_POST["type_area"];
    //echo "type_area : ".$type_area;
    $type_area_region = $_POST["type_area_region"];
    $type_area_province = substr($_POST["type_area_province"],0,2);
    $type_area_province_name = substr($_POST["type_area_province"],3,100);




    

    if ($type_area == "0"){
         $query_region = " ";
    }else if ($type_area == "1"){
        $query_region = " and (p.nhso = '".$type_area_region."') ";
        $area_detail = "เขตสุขภาพที่ ".$type_area_region;
    }else if ($type_area == "2"){
        $query_region = " and (p.code = '".$type_area_province."') ";
        $area_detail = "จังหวัด".$type_area_province_name;
    }



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

        if(date("m")>9){
            $years++;
        }

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

    $all_province = 0;

	$group_total = 0;
	$offender_total = 0;

								
   

    if ($type_area != "2"){		

        $query = "select prov_id,p.name as provname,nhso,p.pilot_province,count(case_id) as total ";
        $query .= "from case_inputs c inner join prov_geo p on c.prov_id = p.code ";
        $query .=  $query_region;
        $query .=  $query_date_range; 
        $query .= " and c.activecase = 'yes' ";
        $query .= " group by c.prov_id ";
        $query .= " order by cast(nhso as signed),prov_id asc;";

    }else{

        $query = "select c.prov_id,o.nameorg as provname,nhso,p.pilot_province,count(case_id) as total,o.nameorg ";
        $query .= "from case_inputs c inner join prov_geo p on c.prov_id = p.code inner join officers o on c.receiver_id = o.id ";
        $query .=  $query_date_range;
        $query .=  $query_region;
        $query .= " and c.activecase = 'yes' ";
        $query .= " group by o.nameorg ";
        $query .= " order by cast(nhso as signed),c.prov_id asc;";

    }

			
					$result = mysqli_query($conn,$query);

					$prov_total =  mysqli_num_rows($result);
				
                    
					while($rows = $result->fetch_assoc()) 
					{		
					
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

                                $all_province += 1;
                                $all_province_name[] = $rows["provname"];
                                $all_moph_name[] = $rows["nhso"];
								
								$case_sort[] = $rows["total"];
								$provname_sort[] = $rows["provname"];
									
								
								if ($type_area != "2"){
                                    $query_case = "select prov_id,count(c.problem_case) as count_case, c.problem_case ";
                                    $query_case .= "from case_inputs c inner join prov_geo p on c.prov_id = p.code ";
                                    $query_case .= "where (prov_id = '".$rows["prov_id"]."') and (sender_case is not null) ";
                                    $query_case .=  $query_region;
                                    $query_case .=  $query_date_range;
                                    $query_case .= " and c.activecase = 'yes' ";
                                    $query_case .= "group by c.problem_case ";
                                    $query_case .= "order by problem_case asc;";
                                }else{

                                    $query_case = "select c.prov_id,count(c.problem_case) as count_case, c.problem_case ";
                                    $query_case .= "from case_inputs c inner join prov_geo p on c.prov_id = p.code inner join officers o on c.receiver_id = o.id ";
                                    $query_case .= "where (c.prov_id = '".$rows["prov_id"]."') and (sender_case is not null) and (nameorg = '".$rows["nameorg"]."')  ";
                                    $query_case .=  $query_region;
                                    $query_case .=  $query_date_range;
                                    $query_case .= " and c.activecase = 'yes' ";
                                    $query_case .= "group by c.problem_case ";
                                    $query_case .= "order by problem_case asc;";


                                }
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
					$query .= "from case_inputs c inner join r_group_code r on c.group_code = r.code  inner join prov_geo p on c.prov_id = p.code ";
					$query .= "where problem_case = '4' ";
					$query .=  $query_date_range;
                    $query .=  $query_region;
                    $query .= " and c.activecase = 'yes' ";
					$query .= "group by c.group_code;";

                    //echo $query;

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

                    //if ($type_area != "2"){
                        $query = "select ";
                        $query .= "sum(CASE WHEN status > '0' THEN 1 ELSE 0 END) as casestep1,";
                        $query .= "sum(CASE WHEN status > '1' THEN 1 ELSE 0 END) as casestep2,";
                        $query .= "sum(CASE WHEN status > '2' THEN 1 ELSE 0 END) as casestep3,";
                        $query .= "sum(CASE WHEN status > '3' THEN 1 ELSE 0 END) as casestep4,";
                        $query .= "sum(CASE WHEN status > '4' THEN 1 ELSE 0 END) as casestep5,";
                        $query .= "sum(CASE WHEN status > '5' THEN 1 ELSE 0 END) as casestep6 ";
                        $query .= "FROM case_inputs c inner join prov_geo p on c.prov_id = p.code ";
                        $query .= "where (sender_case is not null) ";
                        $query .=  $query_date_range;
                        $query .=  $query_region;
                        $query .= " and c.activecase = 'yes' ";
                    /*
                    
                    }else{
                        $query = "select ";
                        $query .= "sum(CASE WHEN status > '0' THEN 1 ELSE 0 END) as casestep1,";
                        $query .= "sum(CASE WHEN status > '1' THEN 1 ELSE 0 END) as casestep2,";
                        $query .= "sum(CASE WHEN status > '2' THEN 1 ELSE 0 END) as casestep3,";
                        $query .= "sum(CASE WHEN status > '3' THEN 1 ELSE 0 END) as casestep4,";
                        $query .= "sum(CASE WHEN status > '4' THEN 1 ELSE 0 END) as casestep5,";
                        $query .= "sum(CASE WHEN status > '5' THEN 1 ELSE 0 END) as casestep6 ";
                        $query .= "FROM case_inputs c inner join prov_geo p on c.prov_id = p.code ";
                        $query .= "where (sender_case is not null)  ";
                        $query .=  $query_date_range;
                        $query .=  $query_region;

                    }
                    */

                    //echo $query;
                

				
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
					$query .= "FROM case_inputs c inner join prov_geo p on c.prov_id = p.code ";
					$query .= "where c.`status` = '5' and sender_case is not null ";
					$query .=  $query_date_range;
                    $query .=  $query_region;
                    $query .= " and c.activecase = 'yes' ";

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
                $query .= "left join prov_geo p on c.prov_id = p.code ";
				$query .=  " where 1 ";
				$query .=  $query_date_range;
                $query .=  $query_region;
                $query .= " and c.activecase = 'yes' ";
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
					$query .= "where c.activecase = 'yes' and sender_case is not null ";
					$query .=  $query_date_range;
                    $query .= " and c.activecase = 'yes' ";
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
                            <option value="2025" <?php if ($years == "2025"){ echo "selected";} ?>>2568</option>
                            <option value="2024" <?php if ($years == "2024"){ echo "selected";} ?>>2567</option>
                            <option value="2023" <?php if ($years == "2023"){ echo "selected";} ?>>2566</option>
                            <option value="2022" <?php if ($years == "2022"){ echo "selected";} ?>>2565</option>
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
                            <option value="0" <?php if ($type == "0"){ echo "selected";} ?>>ทั้งปี (ปีงบประมาณ)</option>
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


                <div class="col-auto">
                    <strong class="col-form-label">เลือกพื้นที่</strong>
                </div>
                <div class="col-auto">
                    <div class="select">
                        <select id="type_area" name="type_area" class="form-select">
                            <option value="0" <?php if ($type_area == "0"){ echo "selected";} ?>>ประเทศ</option>
                            <option value="1" <?php if ($type_area == "1"){ echo "selected";} ?>>เขต</option>
                            <option value="2" <?php if ($type_area == "2"){ echo "selected";} ?>>จังหวัด</option>

                        </select>
                    </div>
                </div>


                <div class="col-auto" id="type_area_region_div">
                    <div class="select">
                        <select id="type_area_region" name="type_area_region" class="form-select">
                            <option value="1" <?php if ($type_area_region == "1"){ echo "selected";} ?>>เขต 1</option>
                            <option value="2" <?php if ($type_area_region == "2"){ echo "selected";} ?>>เขต 2</option>
                            <option value="3" <?php if ($type_area_region == "3"){ echo "selected";} ?>>เขต 3</option>
                            <option value="4" <?php if ($type_area_region == "4"){ echo "selected";} ?>>เขต 4</option>
                            <option value="5" <?php if ($type_area_region == "5"){ echo "selected";} ?>>เขต 5</option>
                            <option value="6" <?php if ($type_area_region == "6"){ echo "selected";} ?>>เขต 6</option>
                            <option value="7" <?php if ($type_area_region == "7"){ echo "selected";} ?>>เขต 7</option>
                            <option value="8" <?php if ($type_area_region == "8"){ echo "selected";} ?>>เขต 8</option>
                            <option value="9" <?php if ($type_area_region == "9"){ echo "selected";} ?>>เขต 9</option>
                            <option value="10" <?php if ($type_area_region == "10"){ echo "selected";} ?>>เขต 10
                            </option>
                            <option value="11" <?php if ($type_area_region == "11"){ echo "selected";} ?>>เขต 11
                            </option>
                            <option value="12" <?php if ($type_area_region == "12"){ echo "selected";} ?>>เขต 12
                            </option>
                            <option value="13" <?php if ($type_area_region == "13"){ echo "selected";} ?>>เขต 13
                            </option>


                        </select>
                    </div>
                </div>


                <div class="col-auto" id="type_area_province_div">
                    <div class="select">
                        <select id="type_area_province" name="type_area_province" class="form-select">


                            <option value="10:กรุงเทพมหานคร"
                                <?php if ($type_area_province == "10"){ echo "selected";} ?>>กรุงเทพมหานคร</option>
                            <option value="81:กระบี่" <?php if ($type_area_province == "81"){ echo "selected";} ?>>
                                กระบี่</option>
                            <option value="71:กาญจนบุรี" <?php if ($type_area_province == "71"){ echo "selected";} ?>>
                                กาญจนบุรี</option>
                            <option value="46:กาฬสินธุ์" <?php if ($type_area_province == "46"){ echo "selected";} ?>>
                                กาฬสินธุ์</option>
                            <option value="62:กำแพงเพชร" <?php if ($type_area_province == "62"){ echo "selected";} ?>>
                                กำแพงเพชร</option>
                            <option value="40:ขอนแก่น" <?php if ($type_area_province == "40"){ echo "selected";} ?>>
                                ขอนแก่น</option>
                            <option value="22:จันทบุรี" <?php if ($type_area_province == "22"){ echo "selected";} ?>>
                                จันทบุรี</option>
                            <option value="24:ฉะเชิงเทรา" <?php if ($type_area_province == "24"){ echo "selected";} ?>>
                                ฉะเชิงเทรา</option>
                            <option value="20:ชลบุรี" <?php if ($type_area_province == "20"){ echo "selected";} ?>>
                                ชลบุรี</option>
                            <option value="18:ชัยนาท" <?php if ($type_area_province == "18"){ echo "selected";} ?>>
                                ชัยนาท</option>
                            <option value="36:ชัยภูมิ" <?php if ($type_area_province == "36"){ echo "selected";} ?>>
                                ชัยภูมิ</option>
                            <option value="86:ชุมพร" <?php if ($type_area_province == "86"){ echo "selected";} ?>>ชุมพร
                            </option>
                            <option value="57:เชียงราย" <?php if ($type_area_province == "57"){ echo "selected";} ?>>
                                เชียงราย</option>
                            <option value="50:เชียงใหม่" <?php if ($type_area_province == "50"){ echo "selected";} ?>>
                                เชียงใหม่</option>
                            <option value="92:ตรัง" <?php if ($type_area_province == "92"){ echo "selected";} ?>>ตรัง
                            </option>
                            <option value="23:ตราด" <?php if ($type_area_province == "23"){ echo "selected";} ?>>ตราด
                            </option>
                            <option value="63:ตาก" <?php if ($type_area_province == "63"){ echo "selected";} ?>>ตาก
                            </option>
                            <option value="26:นครนายก" <?php if ($type_area_province == "26"){ echo "selected";} ?>>
                                นครนายก</option>
                            <option value="73:นครปฐม" <?php if ($type_area_province == "73"){ echo "selected";} ?>>
                                นครปฐม</option>
                            <option value="48:นครพนม" <?php if ($type_area_province == "48"){ echo "selected";} ?>>
                                นครพนม</option>
                            <option value="30:นครราชสีมา" <?php if ($type_area_province == "30"){ echo "selected";} ?>>
                                นครราชสีมา</option>
                            <option value="80:นครศรีธรรมราช"
                                <?php if ($type_area_province == "80"){ echo "selected";} ?>>นครศรีธรรมราช</option>
                            <option value="60:นครสวรรค์" <?php if ($type_area_province == "60"){ echo "selected";} ?>>
                                นครสวรรค์</option>
                            <option value="12:นนทบุรี" <?php if ($type_area_province == "12"){ echo "selected";} ?>>
                                นนทบุรี</option>
                            <option value="96:นราธิวาส" <?php if ($type_area_province == "96"){ echo "selected";} ?>>
                                นราธิวาส</option>
                            <option value="55:น่าน" <?php if ($type_area_province == "55"){ echo "selected";} ?>>น่าน
                            </option>
                            <option value="38:บึงกาฬ" <?php if ($type_area_province == "38"){ echo "selected";} ?>>
                                บึงกาฬ</option>
                            <option value="31:บุรีรัมย์" <?php if ($type_area_province == "31"){ echo "selected";} ?>>
                                บุรีรัมย์</option>
                            <option value="13:ปทุมธานี" <?php if ($type_area_province == "13"){ echo "selected";} ?>>
                                ปทุมธานี</option>
                            <option value="77:ประจวบคีรีขันธ์"
                                <?php if ($type_area_province == "77"){ echo "selected";} ?>>ประจวบคีรีขันธ์</option>
                            <option value="25:ปราจีนบุรี" <?php if ($type_area_province == "25"){ echo "selected";} ?>>
                                ปราจีนบุรี</option>
                            <option value="94:ปัตตานี" <?php if ($type_area_province == "94"){ echo "selected";} ?>>
                                ปัตตานี</option>
                            <option value="14:พระนครศรีอยุธยา"
                                <?php if ($type_area_province == "14"){ echo "selected";} ?>>พระนครศรีอยุธยา</option>
                            <option value="56:พะเยา" <?php if ($type_area_province == "56"){ echo "selected";} ?>>พะเยา
                            </option>
                            <option value="82:พังงา" <?php if ($type_area_province == "82"){ echo "selected";} ?>>พังงา
                            </option>
                            <option value="93:พัทลุง" <?php if ($type_area_province == "93"){ echo "selected";} ?>>
                                พัทลุง</option>
                            <option value="66:พิจิตร" <?php if ($type_area_province == "66"){ echo "selected";} ?>>
                                พิจิตร</option>
                            <option value="65:พิษณุโลก" <?php if ($type_area_province == "65"){ echo "selected";} ?>>
                                พิษณุโลก</option>
                            <option value="76:เพชรบุรี" <?php if ($type_area_province == "76"){ echo "selected";} ?>>
                                เพชรบุรี</option>
                            <option value="67:เพชรบูรณ์" <?php if ($type_area_province == "67"){ echo "selected";} ?>>
                                เพชรบูรณ์</option>
                            <option value="54:แพร่" <?php if ($type_area_province == "54"){ echo "selected";} ?>>แพร่
                            </option>
                            <option value="83:ภูเก็ต" <?php if ($type_area_province == "83"){ echo "selected";} ?>>
                                ภูเก็ต</option>
                            <option value="44:มหาสารคาม" <?php if ($type_area_province == "44"){ echo "selected";} ?>>
                                มหาสารคาม</option>
                            <option value="49:มุกดาหาร" <?php if ($type_area_province == "49"){ echo "selected";} ?>>
                                มุกดาหาร</option>
                            <option value="58:แม่ฮ่องสอน" <?php if ($type_area_province == "58"){ echo "selected";} ?>>
                                แม่ฮ่องสอน</option>
                            <option value="35:ยโสธร" <?php if ($type_area_province == "35"){ echo "selected";} ?>>ยโสธร
                            </option>
                            <option value="95:ยะลา" <?php if ($type_area_province == "95"){ echo "selected";} ?>>ยะลา
                            </option>
                            <option value="45:ร้อยเอ็ด" <?php if ($type_area_province == "45"){ echo "selected";} ?>>
                                ร้อยเอ็ด</option>
                            <option value="85:ระนอง" <?php if ($type_area_province == "85"){ echo "selected";} ?>>ระนอง
                            </option>
                            <option value="21:ระยอง" <?php if ($type_area_province == "21"){ echo "selected";} ?>>ระยอง
                            </option>
                            <option value="70:ราชบุรี" <?php if ($type_area_province == "70"){ echo "selected";} ?>>
                                ราชบุรี</option>
                            <option value="16:ลพบุรี" <?php if ($type_area_province == "16"){ echo "selected";} ?>>
                                ลพบุรี</option>
                            <option value="52:ลำปาง" <?php if ($type_area_province == "52"){ echo "selected";} ?>>ลำปาง
                            </option>
                            <option value="51:ลำพูน" <?php if ($type_area_province == "51"){ echo "selected";} ?>>ลำพูน
                            </option>
                            <option value="42:เลย" <?php if ($type_area_province == "42"){ echo "selected";} ?>>เลย
                            </option>
                            <option value="33:ศรีสะเกษ" <?php if ($type_area_province == "33"){ echo "selected";} ?>>
                                ศรีสะเกษ</option>
                            <option value="47:สกลนคร" <?php if ($type_area_province == "47"){ echo "selected";} ?>>
                                สกลนคร</option>
                            <option value="90:สงขลา" <?php if ($type_area_province == "90"){ echo "selected";} ?>>สงขลา
                            </option>
                            <option value="91:สตูล" <?php if ($type_area_province == "91"){ echo "selected";} ?>>สตูล
                            </option>
                            <option value="11:สมุทรปราการ" <?php if ($type_area_province == "11"){ echo "selected";} ?>>
                                สมุทรปราการ</option>
                            <option value="75:สมุทรสงคราม" <?php if ($type_area_province == "75"){ echo "selected";} ?>>
                                สมุทรสงคราม</option>
                            <option value="74:สมุทรสาคร" <?php if ($type_area_province == "74"){ echo "selected";} ?>>
                                สมุทรสาคร</option>
                            <option value="27:สระแก้ว" <?php if ($type_area_province == "27"){ echo "selected";} ?>>
                                สระแก้ว</option>
                            <option value="19:สระบุรี" <?php if ($type_area_province == "19"){ echo "selected";} ?>>
                                สระบุรี</option>
                            <option value="17:สิงห์บุรี" <?php if ($type_area_province == "17"){ echo "selected";} ?>>
                                สิงห์บุรี</option>
                            <option value="64:สุโขทัย" <?php if ($type_area_province == "64"){ echo "selected";} ?>>
                                สุโขทัย</option>
                            <option value="72:สุพรรณบุรี" <?php if ($type_area_province == "72"){ echo "selected";} ?>>
                                สุพรรณบุรี</option>
                            <option value="84:สุราษฎร์ธานี"
                                <?php if ($type_area_province == "84"){ echo "selected";} ?>>สุราษฎร์ธานี</option>
                            <option value="32:สุรินทร์" <?php if ($type_area_province == "32"){ echo "selected";} ?>>
                                สุรินทร์</option>
                            <option value="43:หนองคาย" <?php if ($type_area_province == "43"){ echo "selected";} ?>>
                                หนองคาย</option>
                            <option value="39:หนองบัวลำภู" <?php if ($type_area_province == "39"){ echo "selected";} ?>>
                                หนองบัวลำภู</option>
                            <option value="15:อ่างทอง" <?php if ($type_area_province == "15"){ echo "selected";} ?>>
                                อ่างทอง</option>
                            <option value="37:อำนาจเจริญ" <?php if ($type_area_province == "37"){ echo "selected";} ?>>
                                อำนาจเจริญ</option>
                            <option value="41:อุดรธานี" <?php if ($type_area_province == "41"){ echo "selected";} ?>>
                                อุดรธานี</option>
                            <option value="53:อุตรดิตถ์" <?php if ($type_area_province == "53"){ echo "selected";} ?>>
                                อุตรดิตถ์</option>
                            <option value="61:อุทัยธานี" <?php if ($type_area_province == "61"){ echo "selected";} ?>>
                                อุทัยธานี</option>
                            <option value="34:อุบลราชธานี" <?php if ($type_area_province == "34"){ echo "selected";} ?>>
                                อุบลราชธานี</option>

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
                <h3>รายงานการละเมิดสิทธิฯ ผ่านระบบ CRS <?php echo $area_detail." ".$quarter_get." ".$quarter_detail; ?>
                </h3>
            </div>

            <div id="head" align="center" class="mb-4">
                -----------------------------------------------------------------------------------
            </div>

            <div id="paragrahp1" class="indent1 ">
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

            <?php if ($type_area != "2"){?>
            <div id="paragrahp2" class="indent1 ">
                <p style="text-align: justify;">
                    รายงานการละเมิดสิทธิเกิดขึ้นใน <?php echo $prov_total; ?> จังหวัด ได้แก่ 

                    <?php 
                        $count = 1; 
                        foreach ($all_province_name as $value) {
                            if ($count != $all_province ) {
                                echo $value." ";
                            }else{ 
                                echo "และ".$value;
                            } 
                            $count++;
                        }
                    ?>
        
                
                    โดยจังหวัดที่มีการร้องเรียนสูงสุด ได้แก่ <?php echo $provname_sort[0]; ?> จำนวน
                    <?php echo $case_sort[0]; ?> เรื่อง (ดังตารางที่ 1)
                </p>
            </div>
            <?php }else{ ?>
            <div id="paragrahp2" class="indent1 ">
                <p style="text-align: justify;">
                    มีหน่วยงานที่ช่วยจัดการการละเมิดสิทธิจำนวน <?php echo $prov_total; ?> หน่วยงาน โดย

                    <?php $count = 1; foreach ($pilot_prov_name as $value) { if ($count != $count_office ) {echo $value." ".$case_sort[$count]." เรื่อง ";}else{ echo "และ".$value;} $count++;} ?>

                    <?php echo $case_sort[0]; ?> เรื่อง (ดังตารางที่ 1)
                </p>
            </div>
            <?php } ?>
            <div class="indent2 ">
                <p><b>ตารางที่ 1</b> สรุปข้อมูลการร้องเรียนในระบบ CRS ข้อมูลในระบบ<?php echo $quarter_title; ?>
                    <?php echo $quarter_detail; ?> จำแนกตามกรณีร้องเรียน </p>
            </div>
            <div class="indent2 ">
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

                <p style="font-size:13px"><b>หมายเหตุ</b> รวมข้อมูลทุกสถานะการดำเนินงาน (ยังไม่รับเรื่อง, รับเรื่องแล้ว รอการบันทึกข้อมูลเพิ่มเติม, บันทึกข้อมูลเพิ่มเติมแล้ว รอดำเนินการ
                ช่วยเหลือ, อยู่ระหว่างดำเนินการ, ดำเนินการเสร็จสิ้น, ส่งต่อ, ยุติการดำเนินการ) ณ วันที่
                    <?php echo $print_date; ?></p>
            </div>

            <div id="paragrahp3" class="indent1 ">
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
            <div id="paragrahp4" class="indent2 ">
                <p><b>แผนภูมิที่ 1</b> สถานะการดำเนินงานจัดการเรื่องร้องเรียนในระบบ CRS
                    ข้อมูลในระบบ<?php echo $quarter_title; ?> <?php echo $quarter_detail;?></p>
                <div id="chart-container-b1"></div>
                <p style="font-size:13px"><b>หมายเหตุ</b> สรุปข้อมูล ณ วันที่ <?php echo $print_date; ?></p>

            </div>
            <div id="paragrahp4" class="indent1 ">
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
            <div id="paragrahp5" class="indent1 ">
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

            <div id="paragrahp6" class="indent2 ">
                <p><b>ดังตารางที่ 2</b> การรายงานละเมิดสิทธิผ่านระบบ CRS <?php echo $area_detail." ".$quarter_title; ?>
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


<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
    integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous">
</script>
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


function type_area_div() {

    if ($('#type_area').val() == '0') {
        $("#type_area_province_div").hide();
        $("#type_area_region_div").hide();

    } else if ($('#type_area').val() == '1') {
        $("#type_area_province_div").hide();
        $("#type_area_region_div").show();

    } else if ($('#type_area').val() == '2') {
        $("#type_area_province_div").show();
        $("#type_area_region_div").hide();
    }
}


$(document).ready(function() {

    news_div();
    type_area_div();

    $('#type').on('change', function() {
        news_div();
        //console.log("1")
    });

    $('#type_area').on('change', function() {
        type_area_div();
        //console.log("1")
    });
});
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

</html>