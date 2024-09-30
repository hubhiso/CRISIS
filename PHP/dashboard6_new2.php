<?php
        
        require("phpsqli_dbinfo.php");
        require("setdateformat.php");
        date_default_timezone_set("Asia/Bangkok");

        $last_year = date("Y");
        $last_month = date("M");

        if(date("m")>9){
            $last_year++;
        }

        $years = $_GET["y"];

        if($years == ''){$years = $last_year;}

        $list_pb = array("","บังคับตรวจเอชไอวี","เปิดเผยสถานะการติดเชื้อเอชไอวี","ถูกกีดกันหรือถูกเลือกปฏิบัติเนื่องมาจาการติดเชื้อเอชไอวี","ถูกกีดกันหรือถูกเลือกปฏิบัติเนื่องมาจากเป็นกลุ่มเปราะบาง","อื่นๆ ที่เกี่ยวข้องกับ HIV","อื่นๆ");


        $sql = "SELECT year(created_at) as y ,month(created_at) as m,count(*) as count
        from case_inputs where activecase = 'yes'  group by year(created_at), month(created_at)";

        //echo "<br>".$sql;

        $result1 = mysqli_query($conn, $sql); 
        $row1 = mysqli_num_rows($result1); 
        $i = 0;        
        while($row1 = $result1->fetch_assoc()) {
            $i++;
            $y[$i] = $row1[y];
            $m[$i] = $row1[m];
            $count[$i] = $row1[count];
            $last_i = $i;
        }

        $sql = "SELECT year(created_at) as y  from case_inputs where activecase = 'yes'  group by year(created_at) ORDER by y desc";
        $result1 = mysqli_query($conn, $sql); 
        $row = mysqli_num_rows($result1); 
        $i = 0;        
        while($row = $result1->fetch_assoc()) {
            $i++;
            $y_count[$i] = $row[y];
            $y_loop = $i;
        }


        for($i = 1; $i <= $y_loop; $i++){
            //echo "<br> y = $y_count[$i]";
            $sql2 = "SELECT month(created_at) as month, 
            sum(case when problem_case = 1 THEN 1 ELSE 0 END) as case1, 
            sum(case when problem_case = 2 THEN 1 ELSE 0 END) as case2, 
            sum(case when problem_case = 3 THEN 1 ELSE 0 END) as case3, 
            sum(case when problem_case = 4 THEN 1 ELSE 0 END) as case4, 
            sum(case when problem_case = 5 THEN 1 ELSE 0 END) as case5, 
            sum(case when problem_case = 6 THEN 1 ELSE 0 END) as case6 
            from case_inputs 
            where activecase = 'yes' and  date(created_at) BETWEEN '".($y_count[$i]-1)."-10-01' and '".$y_count[$i]."-09-30' 
            group by month";

            $result2 = mysqli_query($conn, $sql2); 
            $row2 = mysqli_num_rows($result2); 
            $j = 0;        
            while($row2 = $result2->fetch_assoc()) {
                $j++;
                $ch2_month[$i][$j] = $row2[month];

                $case[1][$i][$j] = $row2[case1];
                $case[2][$i][$j] = $row2[case2];
                $case[3][$i][$j] = $row2[case3];
                $case[4][$i][$j] = $row2[case4];
                $case[5][$i][$j] = $row2[case5];
                $case[6][$i][$j] = $row2[case6];

                $case1[$i][$j] = $row2[case1];
                $case2[$i][$j] = $row2[case2];
                $case3[$i][$j] = $row2[case3];
                $case4[$i][$j] = $row2[case4];
                $case5[$i][$j] = $row2[case5];
                $case6[$i][$j] = $row2[case6];
                $last_i2[$i] = $j;
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
            <a class="btn btn-white btn-rounded border" href="dashboard5_new.php">
                <span class="icon is-small"><i class="far fa-chart-bar" aria-hidden="true"></i></span>
                <span>รายปี</span>
            </a>
            <a class="btn btn_color1 btn-rounded" href="dashboard6_new2.php">
                <span class="icon is-small"><i class="far fa-chart-bar" aria-hidden="true"></i></span>
                <span>รายเดือน</span>
            </a>
        </div>

        <div class="container p-3">
            <p class="subtitle ">
                <strong> ข้อมูล ณ วันที่ (ว/ด/ป) : </strong>
                <?php echo thai_date_short_number_time(strtotime(date("Y-m-d H:i:s"))); ?>
            </p>

            <div class="p-3 bg-white rounded-4 mt-4 mb-4">
                <div id="chart1"></div>
            </div>

            <div class="row g-3 mb-3 align-items-center">
                <div class="col-auto">
                    <strong class="col-form-label">ปีงบประมาณ</strong>
                </div>
                <div class="col-auto">
                    <div class="select">
                        <select id="years" name="years" class="form-select se_ch2">
                            <?php
                            for($i = 1; $i <= $y_loop; $i++){

                                echo "<option value='".($i-1)."'> ".($y_count[$i]+543)." </option>";
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

            text: 'เปรียบเทียบตามปี จำแนกรายเดือน'
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
                for($iy = $y[1]; $iy <= $last_year; $iy++){

                    echo '{';
                    echo '"name": "ปีงบ '.($iy+543).'",';
                    echo '"data" : [';

                    for ($i = 10;$i <= 12; $i++) {

                        $ck1 = 0;  
                        for($ck = 1; $ck <= $last_i; $ck++){
                            if(($iy-1) == $y[$ck] and $i == $m[$ck]){
                                echo $count[$ck];
                                $ck1 = 1;
                            }
                            
                        }
                        if($ck1 == 0){
                            echo '0';
                        }

                        echo ",";
                        
                    }

                    for ($i = 1;$i <= 9; $i++) {

                        $ck1 = 0;  
                        for($ck = 1; $ck <= $last_i; $ck++){
                            if($iy == $y[$ck] and $i == $m[$ck]){
                                echo $count[$ck];
                                $ck1 = 1;
                            }
                            
                        }
                        if($ck1 == 0){
                            echo '0';
                        }


                        if($i == 9){
                            echo "]";
                        }else{
                            echo ",";
                        }
                    }

                    if($iy == $last_year){
                        echo "}";
                    }else{
                        echo "},";
                    }
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
            
            for($i = 1; $i <= $y_loop; $i++){

                echo '{';
                echo '"title": "ปีงบ '.($y_count[$i]+543).'",';
                echo '"series" : [';

                
                for($j=1;$j<=6;$j++){
                    echo "{";
                    echo "name: '".$list_pb[$j]."',";
                    echo "data:[";

                    for($k=10;$k<=12;$k++){ 
                        $ck1 = 0;

                        for($l=1;$l<=$last_i2[$i];$l++){ 
                            if($ch2_month[$i][$l] == $k){
                                echo $case[$j][$i][$l].",";
                                $ck1 = 1;
                            }
                        }

                        if($ck1 == 0){ echo '0,'; }
                    }

                    for($k=1;$k<=9;$k++){ 
                        $ck1 = 0;

                        for($l=1;$l<=$last_i2[$i];$l++){ 
                            if($ch2_month[$i][$l] == $k){
                                echo $case[$j][$i][$l].",";
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

    //alert(chart2_data[0]);

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

            text: 'เปรียบเทียบตามกรณี จำแนกรายเดือน ปีงบ <?php echo ($years+543) ?>'
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
        if (length) {
            for (var j = 0; j < length; j++) {
                chart2.series[0].remove(false);
            }
        }

        for (var j = 0; j < 100; j++) {
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