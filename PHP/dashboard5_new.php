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

    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.11.3/b-2.0.1/b-html5-2.0.1/b-print-2.0.1/datatables.min.css" />

    <link href="report.css" rel="stylesheet">

    <title> ปกป้อง (CRS) </title>

    <?php
		
		require("phpsqli_dbinfo.php");
        require("setdateformat.php");
        date_default_timezone_set("Asia/Bangkok");
	
	$years = $_POST["years"];

    $year_now =  date("Y");

    if(date("m")>9){
        $year_now++;
    }

    if($years == ''){$years = $year_now;}

    $sql = "SELECT prov_id, prov_geo.prov_name_en, prov_geo.name, count(*) as ccase
	FROM case_inputs, prov_geo
	where case_inputs.activecase = 'yes' and prov_geo.code = case_inputs.prov_id
    and date(created_at) BETWEEN '".($years-1)."-10-01' and '".$years."-09-30'
	group by prov_id order by ccase desc";

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

    $sql_q1  = "SELECT count(*) as ccase
	FROM case_inputs
	where activecase = 'yes' and
    date(created_at) BETWEEN '".($years-1)."-10-01' and '".($years-1)."-12-31'
	group by prov_id order by ccase desc";

	$result = mysqli_query($conn, $sql_q1); 
	$row1 = mysqli_num_rows($result); 
    $q1_case =0;
	while($row1 = $result->fetch_assoc()) {
		
		$q1_case = $q1_case + $row1["ccase"];
	}

    $sql_q2  = "SELECT count(*) as ccase
	FROM case_inputs
	where activecase = 'yes' and
    date(created_at) BETWEEN '".$years."-01-01' and '".$years."-03-31'
	group by prov_id order by ccase desc";

	$result = mysqli_query($conn, $sql_q2); 
	$row2 = mysqli_num_rows($result); 
    $q2_case =0;
	while($row2 = $result->fetch_assoc()) {
		
		$q2_case = $q2_case + $row2["ccase"];
	}

    $sql_q3  = "SELECT count(*) as ccase
	FROM case_inputs
	where activecase = 'yes' and
    date(created_at) BETWEEN '".$years."-04-01' and '".$years."-06-30'
	group by prov_id order by ccase desc";

	$result = mysqli_query($conn, $sql_q3); 
	$row3 = mysqli_num_rows($result); 
    $q3_case =0;
	while($row3 = $result->fetch_assoc()) {
		
		$q3_case = $q3_case + $row3["ccase"];
	}

    $sql_q4  = "SELECT count(*) as ccase
	FROM case_inputs
	where activecase = 'yes' and
    date(created_at) BETWEEN '".$years."-07-01' and '".$years."-09-30'
	group by prov_id order by ccase desc";

	$result = mysqli_query($conn, $sql_q4); 
	$row4 = mysqli_num_rows($result); 
    $q4_case =0;
	while($row4 = $result->fetch_assoc()) {
		
		$q4_case = $q4_case + $row4["ccase"];
	}

    $list = array("10","11","12","20","21","34","56","73","74","80");
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

        <!--div class="text-center ">

            <div class="btn-group flex-wrap">
                <a type="button" class="btn btn-primary btn-rounded align-items-stretch d-flex "
                    href="dashboard3_new.php">
                    <div class="text text-right ">
                        <h6><i class="fas fa-chart-bar fs-4 " aria-hidden="true"></i> Dashboard สรุปสถานการณ์</h6>
                    </div>
                </a>

                <a type="button" class="btn btn-white btn-rounded   align-items-stretch d-flex border"
                    href="automated.php">
                    <div class="text text-right ">
                        <h6><i class="far fa-file-alt fs-4 " aria-hidden="true"></i> รายงานการละเมิดสิทธิ</h6>
                    </div>
                </a>

                <a type="button" class="btn btn-white btn-rounded   align-items-stretch d-flex border"
                    href="mapcrisis_new.php">
                    <div class="text text-right ">
                        <h6><i class="far fa-map fs-4 " aria-hidden="true"></i> พิกัดจุดเกิดเหตุ</h6>
                    </div>
                </a>

                <a type="button" class="btn btn-white btn-rounded   align-items-stretch d-flex border"
                    href="table.blade.php">
                    <div class="text text-right">
                        <h6><i class="fa fa-table fs-4 " aria-hidden="true"></i> สรุปข้อมูลภาพรวม</h6>
                    </div>
                </a>

            </div>

        </div>

        <br>

        <div class="text-center ">

            <div class="btn-group flex-wrap">
                <a class="btn btn-white  btn-rounded border" href="dashboard3_new.php">
                    <span class="icon is-small"><i class="far fa-chart-bar" aria-hidden="true"></i></span>
                    <span>ภาพรวม</span>
                </a>
                <a class="btn btn-primary btn-rounded" href="dashboard5_new.php">
                    <span class="icon is-small"><i class="far fa-chart-bar" aria-hidden="true"></i></span>
                    <span>ช่วงเวลา (รายปี/รายเดือน)</span>
                </a>
                <a class="btn btn-white btn-rounded border" href="dashboard7_new.php">
                    <span class="icon is-small"><i class="far fa-chart-bar" aria-hidden="true"></i></span>
                    <span>รายพื้นที่ (เขต/จังหวัด)</span>
                </a>
                <a class="btn btn-white btn-rounded border" href="dashboard1_new.php">
                    <span class="icon is-small"><i class="far fa-chart-bar" aria-hidden="true"></i></span>
                    <span>จำแนกสถานะการดำเนินงาน</span>
                </a>
                <a class="btn btn-white btn-rounded border" href="dashboard2_new.php">
                    <span class="icon is-small"><i class="far fa-chart-bar" aria-hidden="true"></i></span>
                    <span>จำแนกปัญหา</span>
                </a>
            </div>

        </div-->

        <!--div class="p-3 text-center">
            <p class="h5">รายงานการละเมิดสิทธิในระบบ CRS รายปี</p>
        </div-->

        <div class="text-center p-4">
            <div class="btn-group btn-group-toggle my-auto flex-wrap  ">

                <div class="dropdown tabtype btn active">
                    <a class="dropdown-toggle textcolor1 p-1" type="button" id="dropdownMenu1" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-chart-bar">&nbsp;</i> Dashboard สรุปสถานการณ์
                    </a>
                    <div class="dropdown-menu color-h3 bg-gradient" aria-labelledby="dropdownMenu1">
                        <a class="dropdown-item " id="dropdown-layouts" href="dashboard3_new.php">
                            ภาพรวม</a>

                        <a class="dropdown-item active" id="dropdown-layouts" href="dashboard5_new.php">
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


        <div class="text-center ">
        <a class="btn btn_color1 btn-rounded" href="dashboard5_new.php">
                    <span class="icon is-small"><i class="far fa-chart-bar" aria-hidden="true"></i></span>
                    <span>รายปี</span>
                </a>
                <a class="btn btn-white btn-rounded border" href="dashboard6_new2.php">
                    <span class="icon is-small"><i class="far fa-chart-bar" aria-hidden="true"></i></span>
                    <span>รายเดือน</span>
                </a>
        </div>

        <div class=" p-3">

            <form name="form_menu" method="post" action="dashboard5_new.php">

                <!--div class="row g-3 align-items-center mb-3">
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
                </!--div-->

                <div class="row g-3 align-items-center mb-3">
                    <div class="col-auto">
                        <label class="col-form-label"><strong> ปีงบประมาณ </strong> </label>
                    </div>
                    <div class="col-auto">
                        <select id="years" name="years" class="form-select">
                            <?php
                                for($y = 2019; $y <= $year_now; $y++){
                                    if ($years == $y) { $se =  "selected";}
                                    echo "<option value='$y' $se> ".($y+543)." </option>";
                                    $se = '';
                                }
                            ?>
                        </select>
                    </div>

                    <div class="col-auto ">
                        <input type="submit" class="btn btn_color1" id="submit" name="submit" value="ตกลง">

                    </div>
                </div>

                <br>

                <p class="subtitle ">
                    <strong> ข้อมูล ณ วันที่ (ว/ด/ป) : </strong>
                    <?php echo thai_date_short_number_time(strtotime(date("Y-m-d H:i:s"))); ?>
                </p>

            </form>

        </div>

        <div class="row mb-3 p-3">
            <div class="col ">
                <div class="bg-white chart-rounded p-3">
                    <a id="chart-container-c2" class="">FusionCharts will render here</a>
                </div>

            </div>
        </div>

        <div class="mb-3 text-center h5">
            <strong>รายงานการละเมิดสิทธิในระบบ CRS ปีงบประมาณ <?php echo $years+543 ?></strong>
            <p>จำแนกรายจังหวัด</p>
        </div>

        <div class="text-end p-2">
            <!--label class="textcolor1">* พื้นที่ต้นแบบ 10 จังหวัด, พื้นที่อื่นๆ <?php echo $i_loop-10 ?> จังหวัด</label-->
        </div>

        <div class="row ">
            <div class="col ">
                <div class="bg-white chart-rounded p-3">
                    <a id="chart-container" class="">FusionCharts will render here</a>
                </div>

            </div>
            <div class="col ">
                <div class="bg-white chart-rounded p-3">

                    <table id="table1" width="100%"
                        class=" dt-responsive nowrap table table-responsive table-bordered table-hover">
                        <thead>
                            <th class="bgcolor1"> ลำดับ </th>
                            <th> จังหวัด </th>
                            <th> จำนวนเรื่อง </th>
                        </thead>
                        <tbody>
                            <?php

                                for($j=1;$j<=$i_loop; $j++){

                                    echo '<tr >';

                                    /*
                                    $ck=0;
                                    for($i = 0; $i <= 9; $i++){

                                        if($prov_id[$j] == $list[$i]){
                                            echo "<td style='background : #fba3e0;'>".$j."</td>";
                                            echo "<td style='background : #fba3e0;'>".$prov_name[$j]."</td>";
                                            echo "<td style='background : #fba3e0;'>".$case[$j]."</td>";
                                            $ck=1;
                                        }
                                    }
                                    if($ck==0){
                                        echo "<td>".$j."</td>";
                                        echo "<td>".$prov_name[$j]."</td>";
                                        echo "<td>".$case[$j]."</td>";
                                    }*/
                                    echo "<td>".$j."</td>";
                                    echo "<td>".$prov_name[$j]."</td>";
                                    echo "<td>".$case[$j]."</td>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>

                    </table>

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

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
        integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous">
    </script>

    <SCRIPT LANGUAGE="Javascript" SRC="../public/NewFusionChart/Fusion/fusioncharts.js"></SCRIPT>
    <script type='text/javascript' src="../public/NewFusionChart/Fusion/fusioncharts.charts.js"></script>
    <script type='text/javascript' src="../public/NewFusionChart/Fusion/fusioncharts.maps.js"></script>
    <script type='text/javascript' src="../public/NewFusionChart/Fusion/fusioncharts.thailand.js"></script>
    <script type='text/javascript' src="../public/NewFusionChart/Fusion/fusioncharts.theme.fint.js"></script>
    <script type="text/javascript" src="../public/NewFusionChart/js/themes/fusioncharts.theme.hulk-light.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript"
        src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.11.3/b-2.0.1/b-html5-2.0.1/b-print-2.0.1/datatables.min.js">
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

    <script>
    $('.input-daterange input').each(function() {

        $(this).datepicker('');
        //$('#date_end').datepicker("setDate", new Date());
    }).on('changeDate', function(e) {
        //load_case()
    });
    </script>

    <script>
    $(document).ready(function() {
        $('#table1').DataTable({
            "bFilter": true,
            "dom": 'Bfrtip',
            "responsive": true,
            "buttons": [
                'excel', 'copy', 'print'
            ],
            "paging": true,
            "ordering": true
        });
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
                height: '610',
                dataFormat: 'json',
                dataSource: {
                    "map": {

                        "nullEntityColor": "#cccccc",

                        "animation": "1",
                        "showbevel": "0",
                        "showLabels": "0",
                        "usehovercolor": "1",
                        "borderColor": "#ffffff",
                        "borderThickness": "1.2",
                        //"bordercolor": "",
                        "showlegend": "1",
                        "showshadow": "0",
                        "legendPosition": "bottom-right",
                        "legendborderalpha": "1",
                        "legendbordercolor": "#e5a3ad",
                        "legendallowdrag": "0",
                        "legendshadow": "0",
                        "legendIconScale": "1",
                        "legendItemFontSize": "16",
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
                        "gradient": "0",
                        "color": [{
                                "minvalue": "0",
                                "maxvalue": "0.9",
                                "code": "#cccccc",
                                "label": "ไม่มีข้อมูล"
                            },
                            {
                                "minvalue": "1",
                                "maxvalue": "2",
                                "code": "#e046a2",
                                "label": "1-2 เรื่อง"
                            },
                            {
                                "minvalue": "2.1",
                                "maxvalue": "<?php echo $v_max; ?>",
                                "code": "#de0867",
                                "label": "3 เรื่องขึ้นไป"
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

    <script>
    FusionCharts.ready(function() {

        var salesChart = new FusionCharts({
                type: 'column2d',
                renderAt: 'chart-container-c2',
                width: '100%',
                height: '400',
                dataFormat: 'json',
                dataSource: {
                    "chart": {
                        "caption": "การบันทึกข้อมูลการถูกละเมิดสิทธิในระบบ CRS ปีงบ <?php echo ($years+543) ?> รายไตรมาส",
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
                        "exportEnabled": "1"

                    },

                    "data": 
                    [
                        {
                            "label" : "ต.ค.-ธ.ค. <?php echo $years+543-1 ?>",
                            "value" : "<?php echo $q1_case ?>"
                        },
                        {
                            "label" : "ม.ค.-มี.ค. <?php echo $years+543 ?>",
                            "value" : "<?php echo $q2_case ?>"
                        },
                        {
                            "label" : "เม.ย.-มิ.ย. <?php echo $years+543 ?>",
                            "value" : "<?php echo $q3_case ?>"
                        },
                        {
                            "label" : "ก.ค.-ก.ย. <?php echo $years+543 ?>",
                            "value" : "<?php echo $q4_case ?>"
                        }
                    ]
                }
            })
            .render();
    });
    </script>


</body>

</html>