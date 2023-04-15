
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
    

    <style>
        .hideextra { white-space: nowrap; overflow: hidden; text-overflow:ellipsis; }
        .red {
            height: 70px; 
            vertical-align: middle; 
            background-color: #E14455;
            border: 1px solid #E14455;
        }
        .red2 {
            vertical-align: middle; 
            background-color: #713132;
            border: 1px solid #713132;
            color: white;
        }
        .red3 {
            vertical-align: middle; 
            background-color: #E14455;
            color: white;
        }
        
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

       $pr = $_POST["pr"];
       
       if($pr != 0){
           $pr_q = " and c.prov_id= '".$pr."' ";
       }

       $date_start = $_POST["date_start"];
       $date_end = $_POST["date_end"];
    
       if($date_end==''){
        $date_end = date("m/d/Y");
       }

       $p_case = $_POST["pcase"];
       if($p_case > '0'){
        $sub_q = ' and problem_case = '.$p_case.' ';
       }
        
        $sql_of = "SELECT a.subtype_offender, count(a.subtype_offender) as suboff 
        FROM add_details a , case_inputs c
        where c.case_id = a.case_id
        and date(c.created_at) between '".date("Y/m/d", strtotime($date_start))."' and '".date("Y/m/d", strtotime($date_end))."'
        $pr_q
        group by a.subtype_offender";
        
        $result_of = mysqli_query($conn, $sql_of); 
        $i = 0;
        while($rowco = $result_of->fetch_assoc()) {
            $i++;
            
            $no_suboff[$i] = $rowco["subtype_offender"];
            $suboff[$i] = $rowco["suboff"];
            $loop_suboff = $i;
        }
        $suboff_all = $suboff[2]+$suboff[3];
        
        $sql_c1 = "SELECT problem_case, r_problem_case.name,count(problem_case) as case1 
        FROM case_inputs c ,r_problem_case
        WHERE r_problem_case.code = c.problem_case
        $pr_q
        and date(c.created_at) between '".date("Y/m/d", strtotime($date_start))."' and '".date("Y/m/d", strtotime($date_end))."'
        group by problem_case";
        
        $result_c1 = mysqli_query($conn, $sql_c1); 
        $i = 0;
        while($rowc1 = $result_c1->fetch_assoc()) {
            $i++;
            
            $no_c1[$i] = $rowc1["problem_case"];
            $name_c1[$i] = $rowc1["name"];
            $sum_c1[$i] = $rowc1["case1"];
            $loop_c1 = $i;
        }

        $sql_c2 = "SELECT sum(a.cause_type1) as cause1, 
        sum(a.cause_type2) as cause2, 
        sum(a.cause_type3) as cause3, 
        sum(a.cause_type4) as cause4, 
        sum(a.etc) as cause5, sum(a.cause_type1 or a.cause_type2 or a.cause_type3 or a.cause_type4 or a.etc) as alls
        FROM add_details a , case_inputs c
        where c.case_id = a.case_id
        $pr_q
        and date(c.created_at) between '".date("Y/m/d", strtotime($date_start))."' and '".date("Y/m/d", strtotime($date_end))."'";
        
        $result_c2 = mysqli_query($conn, $sql_c2); 
        $i = 0;
        while($rowc2 = $result_c2->fetch_assoc()) {
            $i++;
            
            $sumcase2_c1 = $rowc2["cause1"];
            $sumcase2_c2 = $rowc2["cause2"];
            $sumcase2_c3 = $rowc2["cause3"];
            $sumcase2_c4 = $rowc2["cause4"];
            $sumcase2_c5 = $rowc2["cause5"];
            $sumcase2_all = $rowc2["alls"];
            $loop_c2 = $i;
        }

        $sql_c3 = "SELECT c.group_code, r.name, count(c.group_code) as c3 
        FROM case_inputs c, r_group_code r
        WHERE  c.group_code = r.code
        $pr_q and c.problem_case = '4'
        and date(c.created_at) between '".date("Y/m/d", strtotime($date_start))."' and '".date("Y/m/d", strtotime($date_end))."'
        group by c.group_code ";
        //echo $sql_c3;
        $result_c3 = mysqli_query($conn, $sql_c3); 
        $i = 0;
        while($rowc3 = $result_c3->fetch_assoc()) {
            $i++;
        
            for($j = 1;$j<=6;$j++){
                if($rowc3["group_code"] == $j){
                    $i_c3[$j] = $rowc3["group_code"];
                    $namec3[$j] = $rowc3["name"];
                    $sumc3[$j] = $rowc3["c3"];
                    $sumc3all = $sumc3all + $sumc3[$j];
                }
            }

            $loop_c3 = $i;
        }

        
        $sql_c4 = "SELECT c.sub_problem, r.name,count(sub_problem) as c4 
        FROM case_inputs c ,r_sub_problem r
        WHERE r.code = c.sub_problem
        and c.problem_case = '1'
        $pr_q
        and date(c.created_at) between '".date("Y/m/d", strtotime($date_start))."' and '".date("Y/m/d", strtotime($date_end))."'
        group by c.sub_problem";
        
        $result_c4 = mysqli_query($conn, $sql_c4); 
        $i = 0;
        while($rowc4 = $result_c4->fetch_assoc()) {
            $i++;
        
            for($j = 1;$j<=6;$j++){
                if($rowc4["sub_problem"] == $j){
                    $i_c4[$j] = $rowc4["sub_problem"];
                    $namec4[$j] = $rowc4["name"];
                    $sumc4[$j] = $rowc4["c4"];
                    
                }
            }

            $loop_c4 = $i;
        }
    ?>

  
    
    <script type="text/javascript">
        /*  Chart1 */
        FusionCharts.ready( function () {

            var salesChart = new FusionCharts( {
                    type: 'bar2d',
                    renderAt: 'chart-container-1',
                    width: '100%',
                    height: '500',
                    dataFormat: 'json',
                    dataSource: {
                        "chart": {
                            "caption": "จำนวนการละเมิดสิทธิ",
                            "subCaption": "จำแนกตามประเภท ",
                            "placeValuesInside": "0",
                            "yAxisName": "จำนวน",
                            "palettecolors": "#E14455",
                            "basefontsize": "14",
                            "captionFontSize": "16",
                            "subcaptionFontSize": "16",
                            "showAxisLines": "1",
                            "axisLineAlpha": "25",
                            "alignCaptionWithCanvas": "0",
                            "showAlternateVGridColor": "1",
                            "numberScaleValue": "0",
                            "theme": "hulk-light",
                            "exportEnabled": "1"
                        },

                        "data":[ 

                        <?php
                            for($i=1;$i<=$loop_c1;$i++){
                                echo "{";
                                echo "'label': '$name_c1[$i]',";
                                echo "'value': '$sum_c1[$i]'";
                                echo "}";
                                if($i <> $loop_c1){
                                    echo ",";
                                }
                            }
                        ?>
                        
                        ]
                    }
                } )
                .render();
        } );

        /*  pie Chart2 */



        FusionCharts.ready( function () {

        var salesChart = new FusionCharts( {
                type: 'doughnut2d',
                renderAt: 'chart-container-2',
                width: '100%',
                height: '500',
                dataFormat: 'json',
                dataSource: {
                    "chart": {

                        "caption": "สาเหตุการละเมิดสิทธิ",
                        "subcaption": "",
                        "showpercentvalues": "1",
                        "defaultcenterlabel": "<?php echo 'ทั้งหมด '.$sumcase2_all.' เคส'; ?>",
                        "aligncaptionwithcanvas": "0",
                        "captionpadding": "0",
                        "decimals": "1",
                        "showlegend": "1",
                        //"plottooltext": "<b>$percentValue $label</b>",
                        "centerlabel": "$value เคส",
                        "theme": "hulk-light",
                        "palettecolors": "#E14455,#2B1615,#7F7F7F,#BABABA,#E87C87",
                        "exportEnabled": "1"
                    },
                    "data":[ {
                        "label": "ไม่รู้กฎหมาย",
                        <?php echo "'value': '$sumcase2_c1'"; ?>
                    }, {
                        "label": "ขาดความเข้าใจเรื่องเอดส์",
                        <?php echo "'value': '$sumcase2_c2'"; ?>
                    }, {
                        "label": "ทัศนคติ",
                        <?php echo "'value': '$sumcase2_c3'"; ?>
                    }, {
                        "label": "นโยบายองค์กร",
                        <?php echo "'value': '$sumcase2_c4'"; ?>
                    }, {
                        "label": "อื่นๆ",
                        <?php echo "'value': '$sumcase2_c5'"; ?>
                    } ]
                }
                
            } )
            .render();
        } );

        /*  pie Chart3 */
        FusionCharts.ready( function () {

        var salesChart = new FusionCharts( {
                type: 'doughnut2d',
                renderAt: 'chart-container-3',
                width: '100%',
                height: '400',
                dataFormat: 'json',
                dataSource: {
                    "chart": {
                        "caption": "กลุ่มเปราะบางที่ถูกกีดกันหรือถูกเลือกปฎิบัติ",
                        "subcaption": "",
                        "showpercentvalues": "1",
                        "defaultcenterlabel": "<?php echo 'ทั้งหมด '.$sumc3all.' เคส'; ?>",
                        "aligncaptionwithcanvas": "1",
                        "captionpadding": "1",
                        "showlegend": "1",
                        "decimals": "1",
                        //"plottooltext": "<b>$percentValue $label</b>",
                        "centerlabel": "$value เคส",
                        "theme": "hulk-light",
                        "palettecolors": "#E14455,#2B1615,#7F7F7F,#BABABA,#E87C87",
                        "exportEnabled": "1"
                    },

                    "data":[ {
                        "label": "<?php echo $namec3[1]; ?>",
                        "value": "<?php echo $sumc3[1]; ?>"
                    }, {
                        "label": "<?php echo $namec3[2]; ?>",
                        "value": "<?php echo $sumc3[2]; ?>"
                    }, {
                        "label": "<?php echo $namec3[3]; ?>",
                        "value": "<?php echo $sumc3[3]; ?>"
                    }, {
                        "label": "<?php echo $namec3[4]; ?>",
                        "value": "<?php echo $sumc3[4]; ?>"
                    }, {
                        "label": "<?php echo $namec3[5]; ?>",
                        "value": "<?php echo $sumc3[5]; ?>"
                    }, {
                        "label": "<?php echo $namec3[6]; ?>",
                        "value": "<?php echo $sumc3[6]; ?>"
                    } ]
                }
                
            } )
            .render();
        } );
        

        /*  Tab 2 Chart */
        FusionCharts.ready( function () {

            var salesChart = new FusionCharts( {
                    type: 'column2d',
                    renderAt: 'chart-container-b1',
                    width: '100%',
                    height: '400',
                    dataFormat: 'json',
                    dataSource: {
                        "chart": {
                            "caption": "ผู้ถูกบังคับตรวจเอชไอวี",
                            "subCaption": "จำแนกตามประเภท",
                            "placeValuesInside": "0",
                            "palettecolors": "#713132",
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
                            "exportEnabled": "1"

                        },

                        "data":[ {
                        "label": "<?php echo $namec4[1]; ?>",
                        "value": "<?php echo $sumc4[1]; ?>"
                    }, {
                        "label": "<?php echo $namec4[2]; ?>",
                        "value": "<?php echo $sumc4[2]; ?>"
                    }, {
                        "label": "<?php echo $namec4[3]; ?>",
                        "value": "<?php echo $sumc4[3]; ?>"
                    }, {
                        "label": "<?php echo $namec4[4]; ?>",
                        "value": "<?php echo $sumc4[4]; ?>"
                    }]
                    }
                } )
                .render();
        } );
        
    </script>
    <?php
        $sql1 = "SELECT c.status,count(c.id) as n_status 
        FROM case_inputs c
        WHERE  date(c.created_at) between '".date("Y/m/d", strtotime($date_start))."' and '".date("Y/m/d", strtotime($date_end))."'
        $pr_q
        group by c.status";
        $result1 = mysqli_query($conn, $sql1); 
        $i = 0;
        $sumall = 0;
        while($row1 = $result1->fetch_assoc()) {
            $i++;
            $sumall = $sumall + $row1["n_status"];
            for($j=1;$j<=6;$j++){
                if($row1["status"] == $j){
                    $status[$j] = $row1["status"];
                    $n_status[$j] = $row1["n_status"];
                }
            }
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
                        <li class="is-active">
                        <a href="dashboard3.blade.php">
                            <span class="icon is-small"><i class="far fa-chart-bar" aria-hidden="true"></i></span>
                            <span>สถานการณ์การละเมิดสิทธิ</span>
                        </a>
                        </li>
                        <li>
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

                <form name="form_menu" method="post" action="dashboard3.blade.php">
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
                
                <div class="columns is-variable is-1-mobile is-0-tablet is-3-desktop is-2-widescreen is-2-fullhd">
                <div class="column">
                <table class="table is-fullwidth  is-bordered ">
                        <tbody>
                            <tr class="is-selected ">
                                <td class="red" style="vertical-align: middle;"><p class='has-text-centered '>ทั้งหมด</p></td>
                            </tr>
                            <tr class=" ">
                                <td><p class='has-text-centered'><?php echo $sumall;?></p></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="column">
                    <table class="table is-fullwidth  is-bordered ">
                        <tbody>
                            <tr class="is-selected ">
                                <td class="red" style="vertical-align: middle;"><p class='has-text-centered '>ยังไม่ได้รับเรื่อง</p></td>
                            </tr>
                            <tr class=" ">
                                <td><p class='has-text-centered'><?php echo $n_status[1];if($status[1] ==''){echo '0';} ?></p></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="column">
                    <table class="table is-fullwidth  is-bordered ">
                        <tbody>
                            <tr class="is-selected ">
                                <td class="red" style="vertical-align: middle;"><p class='has-text-centered '>รับเรื่องแล้ว</p></td>
                            </tr>
                            <tr class=" ">
                                <td><p class='has-text-centered'><?php echo $n_status[2];if($status[2] ==''){echo '0';} ?></p></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="column">
                <table class="table is-fullwidth  is-bordered ">
                        <tbody>
                            <tr class="is-selected ">
                                <td class="red" style="vertical-align: middle;"><p class='has-text-centered '>บันทึกข้อมูลเพิ่มแล้ว</p></td>
                            </tr>
                            <tr class=" ">
                                <td><p class='has-text-centered'><?php echo $n_status[3];if($status[3] ==''){echo '0';} ?></p></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="column">
                <table class="table is-fullwidth  is-bordered ">
                        <tbody>
                            <tr class="is-selected ">
                                <td class="red" style="vertical-align: middle;"><p class='has-text-centered '>อยู่ระหว่างดำเนินการ</p></td>
                            </tr>
                            <tr class=" ">
                                <td><p class='has-text-centered'><?php echo $n_status[4];if($status[4] ==''){echo '0';} ?></p></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="column">
                <table class="table is-fullwidth  is-bordered ">
                        <tbody>
                            <tr class="is-selected ">
                                <td class="red" style="vertical-align: middle;"><p class='has-text-centered '>ดำเนินการเสร็จสิ้น</p></td>
                            </tr>
                            <tr class=" ">
                                <td><p class='has-text-centered'><?php echo $n_status[5];if($status[5] ==''){echo '0';} ?></p></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="column">
                <table class="table is-fullwidth  is-bordered ">
                        <tbody>
                            <tr class="is-selected ">
                                <td class="red" style="vertical-align: middle;"><p class='has-text-centered '>ดำเนินการแล้วส่งต่อ</p></td>
                            </tr>
                            <tr class=" ">
                                <td><p class='has-text-centered'><?php echo $n_status[6];if($status[6] ==''){echo '0';} ?></p></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
            </div>
            
            <div class="columns ">
                <div class="column  is-offset-8">
                    <table class="table is-fullwidth  is-bordered">
                    <tbody>
                        <tr >
                            <td class="red2" rowspan="2" style="vertical-align : middle;text-align:center;"><p class='has-text-centered'>ละเมิดโดย</p></td>
                            <td class=" red3"><p class='has-text-centered'>บุคคล</p></td>
                            <td><p class='has-text-centered'><?php echo number_format(($suboff[2]/$suboff_all)*100 , 2, '.', '')?> %</p></td>
                        </tr>
                        <tr >
                            
                            <td  class=" red3"><p class='has-text-centered '>องค์กร</p></td>
                            <td><p class='has-text-centered'><?php echo number_format(($suboff[3]/$suboff_all)*100 , 2, '.', '') ?> %</p></td>
                        </tr>
                    </tbody>
                    </table>
                </div>
            </div>
                
            </div>
                
                <div class="columns is-gapless">
                <div class="column">
                    <div id="chart-container-1">FusionCharts XT will load here!</div>
                </div>
                <div class="column">
                    <div id="chart-container-2">FusionCharts XT will load here!</div>
                </div>
            </div>
            <div class="columns is-gapless">
                <div class="column">
                    <div id="chart-container-3">FusionCharts XT will load here!</div>
                </div>
                <div class="column">
                    <div id="chart-container-b1">FusionCharts XT will load here!</div>
                </div>
            </div>
        <br>
        
    </section>

</body>

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

</html>

