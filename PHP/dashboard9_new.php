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

    <link href="report.css" rel="stylesheet">

    <script type="text/javascript" src="../public/NewFusionChart/js/fusioncharts.js"></script>
    <script type="text/javascript" src="../public/NewFusionChart/js/themes/fusioncharts.theme.hulk-light.js"></script>

    <title> ปกป้อง (CRS) </title>

    <?php
        
        require("phpsqli_dbinfo.php");
        require("setdateformat.php");
        date_default_timezone_set("Asia/Bangkok");

        // Change character set to utf8
        mysqli_set_charset($conn,"utf8");

        $sql = "SELECT group_code, r_group_code.name, count(group_code) as count
        from case_inputs
        left join r_group_code
        on r_group_code.code = case_inputs.group_code and case_inputs.activecase = 'yes'
        GROUP BY group_code, r_group_code.NAME";

        $result1 = mysqli_query($conn, $sql); 
        $row1 = mysqli_num_rows($result1); 
        $i = 0;        
        while($row1 = $result1->fetch_assoc()) {
            $i++;
            $g_code[$i] = $row1[group_code];
            $name[$i] = $row1[name];
            $count[$i] = $row1[count];
            $last_i = $i;
        }
        
        $sql2 = "SELECT group_code, r_group_code.name, count(group_code) as count, case_inputs.sex
        from case_inputs
        left join r_group_code
        on r_group_code.code = case_inputs.group_code
        where case_inputs.activecase = 'yes' and group_code <> '' and group_code = '1'
        GROUP BY group_code, case_inputs.sex";

        $result2 = mysqli_query($conn, $sql2); 
        $row2 = mysqli_num_rows($result2); 
        $i = 0;        
        while($row2 = $result2->fetch_assoc()) {
            $i++;
            $ch2_sex[$i] = $row2[sex];
            $ch2_count[$i] = $row2[count];
            $last_i2 = $i;
        }

        //echo "test";

        for($j =1; $j <= $last_i; $j++){
            if( $g_code[$j] == 1){
                $lgbtq =  $count[$j];
            }
            if( $ch2_sex[$j] == 2){
                $sex2 = $ch2_count[$j];
            }
            if( $ch2_sex[$j] == 1){
                $sex1 = $ch2_count[$j];
            }
            if( $ch2_sex[$j] == 3){
                $sex3 = $ch2_count[$j];
            }
            if( $g_code[$j] == 2){
                $sexwork =  $count[$j];
            }
            if( $g_code[$j] == 3){
                $druger =  $count[$j];
            }
            if( $g_code[$j] == 4){
                $foreign = $count[$j];
            }
            if( $g_code[$j] == 5){
                $prisoner =  $count[$j];
            }
            if( $g_code[$j] == 6){
                $tribe =  $count[$j];
            }
            if( $g_code[$j] == 7){
                $handicap =  $count[$j];
            }
        }



    ?>

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

                <a href="mapcrisis_new.php" class="btn tabtype">
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
                            <a class="dropdown-item dropdown-toggle custom-dropdown active" id="dropdown-layouts" data-toggle="dropdown"
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
                                <a class="dropdown-item active"
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

        <div class="container p-0">

            <div class="text-center p-3 mb-4">
                <p class="h5">สรุปข้อมูลการร้องเรียนในระบบ CRS สัดส่วนกลุ่มเปราะบางเทียบประชากรข้ามชาติ</p>
            </div>


            <p class="subtitle ">
                <strong> ข้อมูล ณ วันที่ (ว/ด/ป) : </strong>
                <?php echo thai_date_short_number_time(strtotime(date("Y-m-d H:i:s"))); ?>
            </p>


            <br>

            <div class="bg-white mb-3  text-center p-3 chart-rounded">
                <span > สัดส่วนกลุ่มเปราะบางเทียบประชากรข้ามชาติ</span>
                <br>
                <br>
                <div class="row ">
                    <div class="col ">
                        <div id="chart-container-b1">
                            FusionCharts XT will load here!
                        </div>

                    </div>
                    <div class="col">
                        <div id="chart-container-a2" class=" p-3 " style="border: 1px solid #df4591;border-radius: 20px; ">
                            FusionCharts XT will load here!
                        </div>
                    </div>
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

    <script type="text/javascript" src="../public/NewFusionChart/js/fusioncharts.js"></script>
    <script type="text/javascript" src="../public/NewFusionChart/js/themes/fusioncharts.theme.hulk-light.js">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
        integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous">
    </script>

    <script src="../public/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

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
    $('.input-daterange input').each(function() {

        $(this).datepicker('');
        //$('#date_end').datepicker("setDate", new Date());
    }).on('changeDate', function(e) {
        //load_case()
    });
    </script>

    <script type="text/javascript">
    FusionCharts.ready(function() {

        var salesChart = new FusionCharts({
                type: 'doughnut2d',
                renderAt: 'chart-container-b1',
                width: '100%',
                height: '400',
                dataFormat: 'json',
                dataSource: {
                    "chart": {
                        "caption": "",
                        "subCaption": "",
                        "animateClockwise" :"0",
                        "defaultCenterLabel": " <?php echo $lgbtq+$foreign+$sexwork+$druger+$prisoner+$tribe+$handicap; ?> เรื่อง",
                        "placeValuesInside": "0",
                        "yAxisName": "จำนวน (เรื่อง)",
                        "basefontsize": "14",
                        "captionFontSize": "16",
                        "subcaptionFontSize": "16",
                        "showAxisLines": "1",
                        "axisLineAlpha": "25",
                        "alignCaptionWithCanvas": "0",
                        "showAlternateVGridColor": "1",
                        "numberScaleValue": "0",
                        "theme": "hulk-light",
                        "palettecolors": "#df4591,#8455d3,#F8DF8B,#B85C38,#334756,#31112C,#32E0C4",
                        "exportEnabled": "1"

                    },

                    "data": [
                        {
                            "label": "กลุ่มหลากหลายทางเพศ",
                            "value": "<?php echo $lgbtq; ?>"
                        },
                        {
                            "label": "พนักงานบริการ",
                            "value": "<?php echo $sexwork; ?>"
                        },
                        {
                            "label": "ผู้ใช้สารเสพติด",
                            "value": "<?php echo $druger; ?>"
                        },
                        
                        {
                            "label": "ประชากรข้ามชาติ",
                            "value": "<?php echo $foreign; ?>"
                        },
                        {
                            "label": "ผู้ถูกคุมขัง",
                            "value": "<?php echo $prisoner; ?>"
                        },
                        {
                            "label": "กลุ่มชาติพันธุ์และชนเผ่า",
                            "value": "<?php echo $tribe; ?>"
                        },
                        {
                            "label": "คนพิการ",
                            "value": "<?php echo $handicap; ?>"
                        }
                    ]

                }
            })
            .render();
    });
    </script>


    <script type="text/javascript">
    FusionCharts.ready(function() {

        var salesChart = new FusionCharts({
                type: 'stackedcolumn2d',
                renderAt: 'chart-container-a2',
                width: '100%',
                height: '400',
                dataFormat: 'json',
                dataSource: {
                    "chart": {
                        "caption": "",
                        "subCaption": "",
                        "placeValuesInside": "0",
                        "yAxisName": "",
                        "basefontsize": "14",
                        "captionFontSize": "16",
                        "subcaptionFontSize": "16",
                        "axisLineAlpha": "0",
                        "alignCaptionWithCanvas": "0",
                        "showAlternateVGridColor": "0",
                        "showValues": "1",
                        "numberScaleValue": "0",
                        "showYAxisValues": "0",
                        "showPlotBorder" : "1",
                        "plotBorderColor" : "#df4591",
                        "plotBorderThickness" : "5",
                        "alternateHGridColor": "#ffffff",
                        "showBorder": "0",
                        "bgAlpha": "0",
                        "canvasBgColor": "#FFFFFF",
                        "divLineColor": "#ffffff",
                        "theme": "hulk-light",

                        "palettecolors": "#de0867,#df4591,#fba3e0,#334756,#31112C,#32E0C4",
                        "exportEnabled": "1"

                    },

                    "categories": [{
                        "category": [{
                            "label": "กลุ่มหลากหลายทางเพศ"
                        }]
                    }],

                    "dataset": [{
                        "seriesname": "ชาย (ชายมีเพศสัมพันธ์กับชาย)",
                        "data": [{
                            "value": "<?php echo $sex1; ?>"
                        }]
                    }, {
                        "seriesname": "สาวประเภทสอง (TG)",
                        "data": [{
                            "value": "<?php echo $sex3; ?>"
                        }]
                    }, {
                        "seriesname": "หญิง",
                        "data": [{
                            "value": "<?php echo $sex2; ?>"
                        }]
                    }]

                }
            })
            .render();
    });
    </script>
</body>

</html>