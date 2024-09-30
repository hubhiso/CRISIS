<?php
        
        require("phpsqli_dbinfo.php");
        require("setdateformat.php");
        date_default_timezone_set("Asia/Bangkok");

        $last_year = date("Y");
        $last_month = date("M");

        if(date("m")>9){
            $last_year++;
        }

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

        $sql_o = "SELECT * from officers where prov_id = $pr or username = 'adminfar' or username = 'adminhatc'";
        
        $result_o = mysqli_query($conn, $sql_o); 
        $i=0;
        while($row_o = $result_o->fetch_assoc()) {
            $i++;
            $o_nameorg[$i] = $row_o['nameorg'];
            $o_name[$i] = $row_o['name'];
            $o_loop = $i;
        }


        
        $sql = "SELECT year(ca.created_at) as y,month(ca.created_at) as m,count(*) as count, ca.prov_id, pr.name
        from case_inputs ca
        left join prov_geo pr
        on ca.prov_id = pr.code
        left join officers f on f.name = ca.receiver
        where ca.activecase = 'yes' and  date(ca.created_at) BETWEEN '".($years-1)."-10-01' and '".$years."-09-30'  and pr.nhso = '$area' and ca.receiver <> ''
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

        $sql2 = "SELECT year(ca.created_at) as y, month(ca.created_at) as m, count(*) as count, ca.prov_id, ca.receiver, f.nameorg, f.username
        from case_inputs ca
        left join officers f on f.name = ca.receiver
        where ca.activecase = 'yes' and date(ca.created_at) BETWEEN '".($years-1)."-10-01' and '".$years."-09-30' and ca.prov_id ='".$pr."'  and ca.receiver <> ''
        group by  year(ca.created_at),month(ca.created_at), prov_id, receiver, f.nameorg, f.username";

        $result2 = mysqli_query($conn, $sql2); 
        //$row2 = mysqli_num_rows($result2); 
        $i = 0;        
        while($row2 = $result2->fetch_assoc()) {
            $i++;
            $ch2_month[$i] = $row2[m];
            $ch2_count[$i] = $row2[count];
            $ch2_nameorg[$i] = $row2[nameorg];
            $last_i2 = $i;
        }


        //chart2 array

        for($i = 1; $i <= $a_loop; $i++){

            $sql = "SELECT * from officers where prov_id = '$a_code[$i]' or username = 'adminfar' or username = 'adminhatc'";
            $result = mysqli_query($conn, $sql); 

            //echo "$sql<br>";
            $j=0;
            while($row = $result->fetch_assoc()) {
                $j++;

                $o_nameorg_2[$i][$j] = $row['nameorg'];
                $o_name_2[$i][$j] = $row['name'];

                $j_loop[$i] = $j;
            }

            $sql2 = "SELECT year(ca.created_at) as y, month(ca.created_at) as m, count(*) as count, ca.prov_id, ca.receiver, f.nameorg, f.username
            from case_inputs ca left join officers f on f.name = ca.receiver
            where ca.activecase = 'yes' and date(ca.created_at) BETWEEN '".($years-1)."-10-01' and '".$years."-09-30' and ca.prov_id ='".$a_code[$i]."'  and ca.receiver <> ''
            group by  year(ca.created_at),month(ca.created_at), prov_id, receiver, f.nameorg, f.username";
            $result2 = mysqli_query($conn, $sql2); 
            $j=0;
            while($row2 = $result2->fetch_assoc()) {
                $j++;

                $ch2_month_2[$i][$j] = $row2['m'];
                $ch2_count_2[$i][$j] = $row2['count'];
                $ch2_nameorg_2[$i][$j] = $row2['nameorg'];

                $sql2_loop[$i] = $j;
            }

        }
        


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv=”content-type” content=”text/html; charset=UTF-8″ />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv=”content-language” content=”th” />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name=”description” content=”ปกป้อง ระบบผู้ช่วยออนไลน์ที่บริการรับเรื่องร้องเรียนและคุ้มครองการละเมิดสิทธิ” />
    <meta name=”keywords” content=”ปกป้อง,ปกป้อง thai” />
    <meta name="theme-color" content="#d45c9c" />

    <title> ปกป้อง (CRS) </title>

    <link rel="shortcut icon" href="../public/favicon.ico">

    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" crossorigin="anonymous">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">


    <link href="report.css" rel="stylesheet">
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

                        <a class="dropdown-item " id="dropdown-layouts" href="dashboard5_new.php">
                            ช่วงเวลา (รายปี/รายเดือน)</a>

                        <a class="dropdown-item active" id="dropdown-layouts" href="dashboard7_new.php">
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

        <div class="container p-3">
            <form name="form_menu" method="post" action="dashboard7_new2.php">

                <div class="row g-3 mb-3 align-items-center">
                    <div class="col-auto">
                        <strong class="col-form-label">เลือกปีงบประมาณ</strong>
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
                        <input type="submit" class="btn btn_color1" id="submit" name="submit" value="ตกลง">

                    </div>
                </div>

                <p class="subtitle ">
                    <strong> ข้อมูล ณ วันที่ (ว/ด/ป) : </strong>
                    <?php echo thai_date_short_number_time(strtotime(date("Y-m-d H:i:s"))); ?>
                </p>

            </form>

            <div class="p-3 bg-white rounded-4 mt-4 mb-4">
                <div id="chart1"></div>
            </div>

            <div class="row g-3 mb-3 align-items-center">

                <div class="col-auto">
                    <strong class="col-form-label">เลือกจังหวัด</strong>
                </div>

                <div class="col-auto">
                    <div class="select">
                        <!--select id="pr" name="pr" class="form-select"  onChange="location.href='dashboard7_new.php?y=<?php echo $years; ?>&area=<?php echo $area; ?>&pr='+this.value" -->
                        <select id="pr" name="pr" class="form-select se_ch2">
                            <?php
                                for($i = 1; $i <= $a_loop; $i++){
                                    if($pr == $a_code[$i]){$se2 = "selected";}
                                    echo '<option value="'.($i-1).'">'.$a_prname[$i].'</option>';
                                    $se2 = '';
                                }
                            ?>
                        </select>
                    </div>
                </div>

            </div>

            <div class="p-3 bg-white rounded-4 mt-4 mb-4">
                <div id="chart2"></div>
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


    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <script src="../public/js/jquery.min.js"></script>
    <script src="../public/bootstrap/js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
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
            e.stopPropagation(); // do not fire dropdown.js click event, it will call 'this.toggle()' internal
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
    Highcharts.setOptions({
        lang: {
            thousandsSep: ','
        }
    })

    const chart1 = Highcharts.chart('chart1', {
        chart: {
            type: 'line',
            backgroundColor: '#ffffff',
            style: {
                fontFamily: 'Noto Sans Thai'
            }
        },
        colors: ['#ec8b83', '#29a899', '#4b6eaa', '#cd4a77', '#006666',
            '#cd4a77', '#feae51', '#b35f44', '#ec8b83', '#4b6eaa', '#f7a44b'
        ],
        title: {
            text: 'การบันทึกข้อมูลการถูกละเมิดสิทธิในระบบ CRS ตั้งแต่เปิดใช้ระบบ',
            style: {
                wordWrap: 'break-word',
                'text-align': 'center'
            }
        },
        subtitle: {

            text: 'เปรียบเทียบตามปี จำแนกรายเดือน ปีงบ <?php echo ($years+543) ?>'
        },

        accessibility: {
            announceNewData: {
                enabled: true
            }
        },
        xAxis: {
            categories: [
                'ต.ค.', 'พ.ย.', 'ธ.ค.', 'ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.',
                'ก.ย.'
            ],
            title: {
                text: ''
            }
        },
        yAxis: {
            title: {
                text: 'จำนวนการถูกละเมิดสิทธิ'
            }
        },
        legend: {
            enabled: true
        },
        plotOptions: {
            column: {
                borderRadius: 10
            },
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true
                }
            }
        },

        tooltip: {
            headerFormat: '<span>{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">จำนวน</span>: <b>{point.y}</b>  <br/>'
        },

        labels: {
            formatter: function() {
                return Highcharts.numberFormat(this.value, 2);
            }
        },

        series: [

            <?php

                for($i = 1; $i <= $a_loop; $i++){

                    echo '{';
                    echo "name : '".$a_prname[$i]."',";
                    echo '"data" : [';

                    for ($j = 10;$j <= 12; $j++) {
                        echo "";
                        $ck1 = 0;  

                        for($ck = 1; $ck <= $last_i; $ck++){
                            if($a_code[$i] == $p_id[$ck] and $j == $m[$ck] ){
                                echo $count[$ck];
                                $ck1 = 1;
                            }
                        }
                        if($ck1 == 0){  echo "0"; } echo ",";
                    }

                    for ($j = 1;$j <= 9; $j++) {
                        $ck1 = 0;  
                        for($ck = 1; $ck <= $last_i; $ck++){
                            if($a_code[$i] == $p_id[$ck] and $j == $m[$ck] ){
                                echo $count[$ck];
                                $ck1 = 1;
                            }
                        }

                        if($ck1 == 0){ echo "0"; }
                        if($j == 9){ echo "]"; }else{ echo ","; }
                    }

                    if($i == $a_loop){ echo "}"; }else{ echo "},"; }
                }

            ?>

        ],
        caption: {
            text: ''
        }
    });
    </script>

    <script>
    const chart2_data = [

        <?php 

            for($i=1;$i<=$a_loop;$i++){
                echo "{";
                echo "'title': '$a_prname[$i]',";
                echo "'series': [";

                
                for($j=1;$j<=$j_loop[$i];$j++){ 
                    echo "{";
                    echo "name: '".$o_nameorg_2[$i][$j]."',";
                    echo "data:[";
                    
                    for($k=10;$k<=12;$k++){ 
                        $ck1 = 0;
                        for($l=1;$l<=$sql2_loop[$i];$l++){ 
                            if(($k == $ch2_month_2[$i][$l]) && ($o_nameorg_2[$i][$j] == $ch2_nameorg_2[$i][$l])){
                                echo $ch2_count_2[$i][$l].",";
                                $ck1 = 1;
                            }
                        }
                        if($ck1 == 0){ echo '0,'; }
                    }

                    for($k=1;$k<=9;$k++){ 
                        $ck1 = 0;
                        for($l=1;$l<=$sql2_loop[$i];$l++){ 
                            if(($k == $ch2_month_2[$i][$l]) && ($o_nameorg_2[$i][$j] == $ch2_nameorg_2[$i][$l])){
                                echo $ch2_count_2[$i][$l].",";
                                $ck1 = 1;
                            }
                        }
                        if($ck1 == 0){ echo '0,'; }
                    }

                    echo "]";
                    echo "},";
                }

                echo "]";
                echo "},";
            }
                
        ?>

    ]
    </script>

    <script>
    const cloneSample2 = (sample1) => {
        // Crude JSON deep clone – see referenced question for discussion
        return JSON.parse(JSON.stringify(sample1));
    }

    let active2 = cloneSample2(chart2_data[0]);

    Highcharts.setOptions({
        lang: {
            thousandsSep: ','
        }
    })

    const chart2 = Highcharts.chart('chart2', {
        chart: {
            type: 'line',
            backgroundColor: '#ffffff',
            style: {
                fontFamily: 'Noto Sans Thai'
            }
        },
        colors: ['#ec8b83', '#29a899', '#4b6eaa', '#cd4a77', '#006666',
            '#cd4a77', '#feae51', '#b35f44', '#ec8b83', '#4b6eaa', '#f7a44b'
        ],
        title: {
            text: 'การบันทึกข้อมูลการถูกละเมิดสิทธิในระบบ CRS ตั้งแต่เปิดใช้ระบบ',
            style: {
                wordWrap: 'break-word',
                'text-align': 'center'
            }
        },
        subtitle: {

            text: 'เปรียบเทียบตามหน่วยงานย่อย จำแนกรายเดือน ปีงบ <?php echo ($years+543) ?>'
        },

        accessibility: {
            announceNewData: {
                enabled: true
            }
        },
        xAxis: {
            categories: [
                'ต.ค.', 'พ.ย.', 'ธ.ค.', 'ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.',
                'ก.ย.'
            ],
            title: {
                text: ''
            }
        },
        yAxis: {
            title: {
                text: 'จำนวนการถูกละเมิดสิทธิ'
            }
        },
        legend: {
            enabled: true
        },
        plotOptions: {
            column: {
                borderRadius: 10
            },
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true
                }
            }
        },

        tooltip: {
            headerFormat: '<span>{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">จำนวน</span>: <b>{point.y}</b>  <br/>'
        },

        labels: {
            formatter: function() {
                return Highcharts.numberFormat(this.value, 2);
            }
        },

        series: active2.series,
        caption: {
            text: ''
        }
    });
    </script>

    <script>
    $(".se_ch2").on('change', function(e) {

        //alert("h");

        let selected2 = this.value;

        newSample2 = cloneSample2(chart2_data[selected2]);

        active2 = newSample2;

        
        var length = chart2.series.length;
        if(length) {
            for(var j = 0; j < length; j++) {
                chart2.series[0].remove(false);
            }
        }

        for(var j = 0; j < 100; j++) {
            chart2.addSeries(active2.series[j]);
        }

        //chart2.series.remove()

        /*
        chart2.update({
            title: {
                text: active2.title
            },
            series: active2.series,
        });*/
    });
    </script>


</body>

</html>