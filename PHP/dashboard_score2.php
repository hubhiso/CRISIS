<!DOCTYPE html>
<html lang="en" class="route-index">

<head>

    <meta http-equiv=”content-type” content=”text/html; charset=UTF-8″ />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv=”content-language” content=”th” />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name=”description” content=”ปกป้อง ระบบผู้ช่วยออนไลน์ที่บริการรับเรื่องร้องเรียนและคุ้มครองการละเมิดสิทธิ” />
    <meta name=”keywords” content=”ปกป้อง,ปกป้อง thai” />

    <meta name="theme-color" content="#f14668" />

    <link rel="shortcut icon" href="../public/favicon.ico">

    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" crossorigin="anonymous">

    <link media="all" type="text/css" rel="stylesheet"
        href="../public/bootstrap-datepicker/css/bootstrap-datepicker.min.css">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.12.1/b-2.2.3/b-html5-2.2.3/b-print-2.2.3/datatables.min.css" />
 

    <!--link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"-->

    <link href="report.css" rel="stylesheet">

    <title> ปกป้อง (CRS) </title>

    <?php

        require("phpsqli_dbinfo.php");
        require("setdateformat.php");
        date_default_timezone_set("Asia/Bangkok");

        $se_time = $_POST["se_time"];
        $se_year = $_POST["se_year"];
        $se_quarter = $_POST["se_quarter"];
        $se_month = $_POST["se_month"];

        $year_now =  date("Y");

        if(date("m")>9){
            $year_now++;
        }

        if($years == ''){$years = $year_now;}


        if($se_year == ''){
            $se_year = $year_now;
        }

        if($se_time == ''){
            $se_time = 1;

            $date_start = "01/10/".($se_year-1);
            $date_end = "30/09/".$se_year;
        }

        if($se_time== 1){

            if($se_quarter== 0){
                $date_start = "01/10/".($se_year-1);
                $date_end = "30/09/".$se_year;
            }else if($se_quarter== 1){
                $date_start = "01/10/".($se_year-1);
                $date_end = "31/12/".($se_year-1);
            }else if($se_quarter== 2){
                $date_start = "01/01/".$se_year;
                $date_end = "31/03/".$se_year;
            }else if($se_quarter== 3){
                $date_start = "01/04/".$se_year;
                $date_end = "30/06/".$se_year;
            }else if($se_quarter== 4){
                $date_start = "01/07/".$se_year;
                $date_end = "30/09/".$se_year;
            }else if($se_quarter== 12){
                $date_start = "01/10/".($se_year-1);
                $date_end = "31/03/".$se_year;
            }else if($se_quarter== 13){
                $date_start = "01/10/".($se_year-1);
                $date_end = "30/06/".$se_year;
            }else if($se_quarter== 99){
                if($se_month== 10){
                    $date_start = "01/10/".($se_year-1);
                    $date_end = "31/10/".($se_year-1);
                }else if($se_month== 11){
                    $date_start = "01/11/".($se_year-1);
                    $date_end = "30/11/".($se_year-1);
                }else if($se_month== 12){
                    $date_start = "01/12/".($se_year-1);
                    $date_end = "31/12/".($se_year-1);
                }else if($se_month== 1){
                    $date_start = "01/01/".$se_year;
                    $date_end = "31/01/".$se_year;
                }else if($se_month== 2){
                    $date_start = "01/02/".$se_year;
                    $date_end = strtotime("3/1/".$se_year)-1;
                    $date_end = date("d/m/Y",$date_end);

                }else if($se_month== 3){
                    $date_start = "01/03/".$se_year;
                    $date_end = "31/03/".$se_year;
                }else if($se_month== 4){
                    $date_start = "01/04/".$se_year;
                    $date_end = "30/04/".$se_year;
                }else if($se_month== 5){
                    $date_start = "01/05/".$se_year;
                    $date_end = "31/05/".$se_year;
                }else if($se_month== 6){
                    $date_start = "01/06/".$se_year;
                    $date_end = "30/06/".$se_year;
                }else if($se_month== 7){
                    $date_start = "01/07/".$se_year;
                    $date_end = "31/07/".$se_year;
                }else if($se_month== 8){
                    $date_start = "01/08/".$se_year;
                    $date_end = "31/08/".$se_year;
                }else if($se_month== 9){
                    $date_start = "01/09/".$se_year;
                    $date_end = "30/09/".$se_year;
                }
            }

        }else if($se_time== 2){

            $date_start = $_POST["date_start"];
            $date_end = $_POST["date_end"];
            
            if($date_end==''){
                $date_end = date("D/M/Y");
            }

        }

        //echo "<br>date :".$date_start." ".$date_end."<br>";

        if($date_start != "" ){
            $yyyymmdd = substr($date_start,6,4)."/".substr($date_start,3,2)."/".substr($date_start,0,2);
            $date_s =  $yyyymmdd;
        }

        if($date_end != "" ){
            $yyyymmdd = substr($date_end,6,4)."/".substr($date_end,3,2)."/".substr($date_end,0,2);
            $date_e =  $yyyymmdd;
        }

        

        $sql = "SELECT
            oe.username AS oe_username,
            o.NAME AS oname,
            count( oe.username ) AS feq,
            AVG( oe.eva1 ) AS eva1,
            AVG( oe.eva2 ) AS eva2,
            AVG( oe.eva3 ) AS eva3,
            AVG( oe.eva4 ) AS eva4,
            AVG( oe.eva5 ) AS eva5
        FROM
            officer_evaluates oe
            LEFT JOIN officers o ON o.username = oe.username 
        WHERE date(oe.created_at) >= '".date($date_s)."' and date(oe.created_at) <= '".date($date_e)."'
        GROUP BY
            oe.username,
            o.NAME;";

        //echo $sql;

        $result = mysqli_query($conn, $sql); 

        $i = 0;
        $cal1 = 0;
        $cal2 = 0;
        $cal3 = 0;
        $cal4 = 0;
        $cal5 = 0;

        $count_eva1_1 = 0;
        $count_eva1_2 = 0;
        $count_eva1_3 = 0;
        $count_eva1_4 = 0;
        $count_eva1_5 = 0;

        $count_eva2_1 = 0;
        $count_eva2_2 = 0;
        $count_eva2_3 = 0;
        $count_eva2_4 = 0;
        $count_eva2_5 = 0;

        $count_eva3_1 = 0;
        $count_eva3_2 = 0;
        $count_eva3_3 = 0;
        $count_eva3_4 = 0;
        $count_eva3_5 = 0;

        $count_eva4_1 = 0;
        $count_eva4_2 = 0;
        $count_eva4_3 = 0;
        $count_eva4_4 = 0;
        $count_eva4_5 = 0;

        $count_eva5_1 = 0;
        $count_eva5_2 = 0;
        $count_eva5_3 = 0;
        $count_eva5_4 = 0;
        $count_eva5_5 = 0;
        while($row = $result->fetch_assoc()) {
            $i++;

            $oe_username[$i] = $row["oe_username"];
            $oname[$i] = $row["oname"];
            $feq[$i] = $row["feq"];

            $eva1[$i] = $row["eva1"];
            $eva2[$i] = $row["eva2"];
            $eva3[$i] = $row["eva3"];
            $eva4[$i] = $row["eva4"];
            $eva5[$i] = $row["eva5"];

            $cal1 += $eva1[$i];
            $cal2 += $eva2[$i];
            $cal3 += $eva3[$i];
            $cal4 += $eva4[$i];
            $cal5 += $eva5[$i];


            if($eva1[$i] <= 1.49){
                $count_eva1_1++;
            }else if($eva1[$i] <= 2.49){
                $count_eva1_2++; 
            }else if($eva1[$i] <= 3.49){
                $count_eva1_3++; 
            }else if($eva1[$i] <= 4.49){
                $count_eva1_4++; 
            }else if($eva1[$i] <= 5){
                $count_eva1_5++; 
            }

            if($eva2[$i] <= 1.49){
                $count_eva2_1++;
            }else if($eva2[$i] <= 2.49){
                $count_eva2_2++; 
            }else if($eva2[$i] <= 3.49){
                $count_eva2_3++; 
            }else if($eva2[$i] <= 4.49){
                $count_eva2_4++; 
            }else if($eva2[$i] <= 5){
                $count_eva2_5++; 
            }

            if($eva3[$i] <= 1.49){
                $count_eva3_1++;
            }else if($eva3[$i] <= 2.49){
                $count_eva3_2++; 
            }else if($eva3[$i] <= 3.49){
                $count_eva3_3++; 
            }else if($eva3[$i] <= 4.49){
                $count_eva3_4++; 
            }else if($eva3[$i] <= 5){
                $count_eva3_5++; 
            }

            if($eva4[$i] <= 1.49){
                $count_eva4_1++;
            }else if($eva4[$i] <= 2.49){
                $count_eva4_2++; 
            }else if($eva4[$i] <= 3.49){
                $count_eva4_3++; 
            }else if($eva4[$i] <= 4.49){
                $count_eva4_4++; 
            }else if($eva4[$i] <= 5){
                $count_eva4_5++; 
            }

            if($eva5[$i] <= 1.49){
                $count_eva5_1++;
            }else if($eva5[$i] <= 2.49){
                $count_eva5_2++; 
            }else if($eva5[$i] <= 3.49){
                $count_eva5_3++; 
            }else if($eva5[$i] <= 4.49){
                $count_eva5_4++; 
            }else if($eva5[$i] <= 5){
                $count_eva5_5++; 
            }

            
            $count_user = $i;
            $counteva = $i;
        }

        

        if($cal1 == 0 and $cal2 == 0 and $cal3 == 0 and $cal4 == 0 and $cal5 == 0){
            $average_percent = 0;
        }else{

            $cal1 = $cal1/$count_user;
            $cal2 = $cal2/$count_user;
            $cal3 = $cal3/$count_user;
            $cal4 = $cal4/$count_user;
            $cal5 = $cal5/$count_user;
            
            $average = ($cal1 + $cal2 + $cal3 + $cal4 + $cal5)/5;
            $average_percent = ($average*100)/5;
        }

        $average = ($cal1 + $cal2 + $cal3 + $cal4 + $cal5)/5;
        $average_percent = ($average*100)/5;

        $sumcount_1 = $count_eva1_1 + $count_eva2_1 + $count_eva3_1 + $count_eva4_1 + $count_eva5_1;
        $sumcount_2 = $count_eva1_2 + $count_eva2_2 + $count_eva3_2 + $count_eva4_2 + $count_eva5_2;
        $sumcount_3 = $count_eva1_3 + $count_eva2_3 + $count_eva3_3 + $count_eva4_3 + $count_eva5_3;
        $sumcount_4 = $count_eva1_4 + $count_eva2_4 + $count_eva3_4 + $count_eva4_4 + $count_eva5_4;
        $sumcount_5 = $count_eva1_5 + $count_eva2_5 + $count_eva3_5 + $count_eva4_5 + $count_eva5_5;


        $sum1 =  ($count_eva1_1*1) + ($count_eva1_2*2) + ($count_eva1_3*3) + ($count_eva1_4*4) + ($count_eva1_5*5);
        $sum2 =  ($count_eva2_1*1) + ($count_eva2_2*2) + ($count_eva2_3*3) + ($count_eva2_4*4) + ($count_eva2_5*5);
        $sum3 =  ($count_eva3_1*1) + ($count_eva3_2*2) + ($count_eva3_3*3) + ($count_eva3_4*4) + ($count_eva3_5*5);
        $sum4 =  ($count_eva4_1*1) + ($count_eva4_2*2) + ($count_eva4_3*3) + ($count_eva4_4*4) + ($count_eva4_5*5);
        $sum5 =  ($count_eva5_1*1) + ($count_eva5_2*2) + ($count_eva5_3*3) + ($count_eva5_4*4) + ($count_eva5_5*5);

        $divide1 =  $count_eva1_1 + $count_eva1_2 + $count_eva1_3 + $count_eva1_4 + $count_eva1_5;
        $divide2 =  $count_eva2_1 + $count_eva2_2 + $count_eva2_3 + $count_eva2_4 + $count_eva2_5;
        $divide3 =  $count_eva3_1 + $count_eva3_2 + $count_eva3_3 + $count_eva3_4 + $count_eva3_5;
        $divide4 =  $count_eva4_1 + $count_eva4_2 + $count_eva4_3 + $count_eva4_4 + $count_eva4_5;
        $divide5 =  $count_eva5_1 + $count_eva5_2 + $count_eva5_3 + $count_eva5_4 + $count_eva5_5;

        $avg1 = $sum1/$divide1;
        $avg2 = $sum2/$divide2;
        $avg3 = $sum3/$divide3;
        $avg4 = $sum4/$divide4;
        $avg5 = $sum5/$divide5;

        $percentcal1 = ($avg1*100)/5;
        $percentcal2 = ($avg2*100)/5;
        $percentcal3 = ($avg3*100)/5;
        $percentcal4 = ($avg4*100)/5;
        $percentcal5 = ($avg5*100)/5;

        if($avg1 <= 1.49){
            $bar2_color1 = "#f0685a";
            $bar2_txt1 = "น้อยที่สุด";
            $bar_icon1 = "../public/images/icon_score1.png";
        }else if($avg1 <= 2.49){
            $bar2_color1 = "#f49e78";
            $bar2_txt1 = "น้อย";
            $bar_icon1 = "../public/images/icon_score2.png";
        }else if($avg1 <= 3.49){
            $bar2_color1 = "#fcc845";
            $bar2_txt1 = "ปานกลาง";
            $bar_icon1 = "../public/images/icon_score3.png";
        }else if($avg1 <= 4.49){
            $bar2_color1 = "#b4ca84";
            $bar2_txt1 = "มาก";
            $bar_icon1 = "../public/images/icon_score4.png";
        }else if($avg1 <= 5){
            $bar2_color1 = "#74a474";
            $bar2_txt1 = "มากที่สุด";
            $bar_icon1 = "../public/images/icon_score5.png";
        }

        if($avg2 <= 1.49){
            $bar2_color2 = "#f0685a";
            $bar2_txt2 = "น้อยที่สุด";
            $bar_icon2 = "../public/images/icon_score1.png";
        }else if($avg2 <= 2.49){
            $bar2_color2 = "#f49e78";
            $bar2_txt2 = "น้อย";
            $bar_icon2 = "../public/images/icon_score2.png";
        }else if($avg2 <= 3.49){
            $bar2_color2 = "#fcc845";
            $bar2_txt2 = "ปานกลาง";
            $bar_icon2 = "../public/images/icon_score3.png";
        }else if($avg2 <= 4.49){
            $bar2_color2 = "#b4ca84";
            $bar2_txt2 = "มาก";
            $bar_icon2 = "../public/images/icon_score4.png";
        }else if($avg2 <= 5){
            $bar2_color2 = "#74a474";
            $bar2_txt2 = "มากที่สุด";
            $bar_icon2 = "../public/images/icon_score5.png";
        }

        if($avg3 <= 1.49){
            $bar2_color3 = "#f0685a";
            $bar2_txt3 = "น้อยที่สุด";
            $bar_icon3 = "../public/images/icon_score1.png";
        }else if($avg3 <= 2.49){
            $bar2_color3 = "#f49e78";
            $bar2_txt3 = "น้อย";
            $bar_icon3 = "../public/images/icon_score2.png";
        }else if($avg3 <= 3.49){
            $bar2_color3 = "#fcc845";
            $bar2_txt3 = "ปานกลาง";
            $bar_icon3 = "../public/images/icon_score3.png";
        }else if($avg3 <= 4.49){
            $bar2_color3 = "#b4ca84";
            $bar2_txt3 = "มาก";
            $bar_icon3 = "../public/images/icon_score4.png";
        }else if($avg3 <= 5){
            $bar2_color3 = "#74a474";
            $bar2_txt3 = "มากที่สุด";
            $bar_icon3 = "../public/images/icon_score5.png";
        }

        if($avg4 <= 1.49){
            $bar2_color4 = "#f0685a";
            $bar2_txt4 = "น้อยที่สุด";
            $bar_icon4 = "../public/images/icon_score1.png";
        }else if($avg4 <= 2.49){
            $bar2_color4 = "#f49e78";
            $bar2_txt4 = "น้อย";
            $bar_icon4 = "../public/images/icon_score2.png";
        }else if($avg4 <= 3.49){
            $bar2_color4 = "#fcc845";
            $bar2_txt4 = "ปานกลาง";
            $bar_icon4 = "../public/images/icon_score3.png";
        }else if($avg4 <= 4.49){
            $bar2_color4 = "#b4ca84";
            $bar2_txt4 = "มาก";
            $bar_icon4 = "../public/images/icon_score4.png";
        }else if($avg4 <= 5){
            $bar2_color4 = "#74a474";
            $bar2_txt4 = "มากที่สุด";
            $bar_icon4 = "../public/images/icon_score5.png";
        }

        if($avg5 <= 1.49){
            $bar2_color5 = "#f0685a";
            $bar2_txt5 = "น้อยที่สุด";
            $bar_icon5 = "../public/images/icon_score1.png";
        }else if($avg5 <= 2.49){
            $bar2_color5 = "#f49e78";
            $bar2_txt5 = "น้อย";
            $bar_icon5 = "../public/images/icon_score2.png";
        }else if($avg5 <= 3.49){
            $bar2_color5 = "#fcc845";
            $bar2_txt5 = "ปานกลาง";
            $bar_icon5 = "../public/images/icon_score3.png";
        }else if($avg5 <= 4.49){
            $bar2_color5 = "#b4ca84";
            $bar2_txt5 = "มาก";
            $bar_icon5 = "../public/images/icon_score4.png";
        }else if($avg5 <= 5){
            $bar2_color5 = "#74a474";
            $bar2_txt5 = "มากที่สุด";
            $bar_icon5 = "../public/images/icon_score5.png";
        }

        $sql2 = "SELECT
            oe.username AS oe_username,
            o.NAME AS oname,
            DATE ( oe.created_at ) as dateadd, oe.*
        FROM
            officer_evaluates oe
            LEFT JOIN officers o ON o.username = oe.username 
        WHERE
            date(oe.created_at) >= '".date($date_s)."' and date(oe.created_at) <= '".date($date_e)."' 
        ORDER BY DATE (oe.created_at), oe.username ;";

        $result = mysqli_query($conn, $sql2); 

        $i = 0;
        while($row = $result->fetch_assoc()) {
            $i++;

            $oe_username2[$i] = $row["oe_username"];
            $oname2[$i] = $row["oname"];

            $list_eva1[$i] = $row["eva1"];
            $list_eva2[$i] = $row["eva2"];
            $list_eva3[$i] = $row["eva3"];
            $list_eva4[$i] = $row["eva4"];
            $list_eva5[$i] = $row["eva5"];

            $eva_comment[$i] = $row["eva_comment"];

            $eva_date[$i] = $row["dateadd"];

            if($list_eva1[$i] == "1"){
                $list_eva_txt1[$i] = "น้อยที่สุด";
            }else if($list_eva1[$i] == "2"){
                $list_eva_txt1[$i] = "น้อย";
            }else if($list_eva1[$i] == "3"){
                $list_eva_txt1[$i] = "ปานกลาง";
            }else if($list_eva1[$i] == "4"){
                $list_eva_txt1[$i] = "มาก";
            }else if($list_eva1[$i] == "5"){
                $list_eva_txt1[$i] = "มากที่สุด";
            }
            if($list_eva2[$i] == "1"){
                $list_eva_txt2[$i] = "น้อยที่สุด";
            }else if($list_eva2[$i] == "2"){
                $list_eva_txt2[$i] = "น้อย";
            }else if($list_eva2[$i] == "3"){
                $list_eva_txt2[$i] = "ปานกลาง";
            }else if($list_eva2[$i] == "4"){
                $list_eva_txt2[$i] = "มาก";
            }else if($list_eva2[$i] == "5"){
                $list_eva_txt2[$i] = "มากที่สุด";
            }
            if($list_eva3[$i] == "1"){
                $list_eva_txt3[$i] = "น้อยที่สุด";
            }else if($list_eva3[$i] == "2"){
                $list_eva_txt3[$i] = "น้อย";
            }else if($list_eva3[$i] == "3"){
                $list_eva_txt3[$i] = "ปานกลาง";
            }else if($list_eva3[$i] == "4"){
                $list_eva_txt3[$i] = "มาก";
            }else if($list_eva3[$i] == "5"){
                $list_eva_txt3[$i] = "มากที่สุด";
            }
            if($list_eva4[$i] == "1"){
                $list_eva_txt4[$i] = "น้อยที่สุด";
            }else if($list_eva4[$i] == "2"){
                $list_eva_txt4[$i] = "น้อย";
            }else if($list_eva4[$i] == "3"){
                $list_eva_txt4[$i] = "ปานกลาง";
            }else if($list_eva4[$i] == "4"){
                $list_eva_txt4[$i] = "มาก";
            }else if($list_eva4[$i] == "5"){
                $list_eva_txt4[$i] = "มากที่สุด";
            }
            if($list_eva5[$i] == "1"){
                $list_eva_txt5[$i] = "น้อยที่สุด";
            }else if($list_eva5[$i] == "2"){
                $list_eva_txt5[$i] = "น้อย";
            }else if($list_eva5[$i] == "3"){
                $list_eva_txt5[$i] = "ปานกลาง";
            }else if($list_eva5[$i] == "4"){
                $list_eva_txt5[$i] = "มาก";
            }else if($list_eva5[$i] == "5"){
                $list_eva_txt5[$i] = "มากที่สุด";
            }

            $loop_q2 = $i;
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

        <form name="form_menu" method="post" action="dashboard_score2.php">

            <div class="p-3">

                <div class="row g-3 align-items-center">

                    <div class="col-auto">
                        <label class="col-form-label">ช่วงเวลา</label>
                    </div>
                    <div class="col-auto">
                        <select class="form-select form-control" id="se_time" name="se_time">
                            <option value='1' <?php if($se_time == 1){ echo "selected"; } ?>> ตามตัวเลือก </option>
                            <option value='2' <?php if($se_time == 2){ echo "selected"; } ?>> ระบุวันที่ </option>
                        </select>
                    </div>

                    <div class="col-auto se_time_g1">
                        <label class="col-form-label">ปีงบประมาณ</label>
                    </div>
                    <div class="col-auto se_time_g1">
                        <select class="form-select form-control" id="se_year" name="se_year">
                            <?php
                                for($y = 2024; $y <= $year_now; $y++){
                                    if ($se_year == $y) { $se =  "selected";}
                                    echo "<option value='$y' $se> ".($y+543)." </option>";
                                    $se = '';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-auto se_time_g1">
                        <select class="form-select form-control" id="se_quarter" name="se_quarter">
                            <option value='0' <?php if($se_quarter == 0){ echo "selected"; } ?>> ทั้งปีงบประมาณ
                            </option>
                            <option value='1' <?php if($se_quarter == 1){ echo "selected"; } ?>> ไตรมาส 1 </option>
                            <option value='2' <?php if($se_quarter == 2){ echo "selected"; } ?>> ไตรมาส 2 </option>
                            <option value='3' <?php if($se_quarter == 3){ echo "selected"; } ?>> ไตรมาส 3 </option>
                            <option value='4' <?php if($se_quarter == 4){ echo "selected"; } ?>> ไตรมาส 4 </option>
                            <option value='12' <?php if($se_quarter == 12){ echo "selected"; } ?>> สะสมไตรมาส 1-2
                            </option>
                            <option value='13' <?php if($se_quarter == 13){ echo "selected"; } ?>> สะสมไตรมาส 1-3
                            </option>
                            <option value='99' <?php if($se_quarter == 99){ echo "selected"; } ?>> เลือกเดือน </option>
                        </select>
                    </div>
                    <div class="col-auto se_time_g11">
                        <select class="form-select form-control" id="se_month" name="se_month">
                            <option value='1' <?php if($se_month == 1){ echo "selected"; } ?>> มกราคม </option>
                            <option value='2' <?php if($se_month == 2){ echo "selected"; } ?>> กุมภาพันธ์ </option>
                            <option value='3' <?php if($se_month == 3){ echo "selected"; } ?>> มีนาคม </option>
                            <option value='4' <?php if($se_month == 4){ echo "selected"; } ?>> เมษายน </option>
                            <option value='5' <?php if($se_month == 5){ echo "selected"; } ?>> พฤษภาคม </option>
                            <option value='6' <?php if($se_month == 6){ echo "selected"; } ?>> มิถุนายน </option>
                            <option value='7' <?php if($se_month == 7){ echo "selected"; } ?>> กรกฎาคม </option>
                            <option value='8' <?php if($se_month == 8){ echo "selected"; } ?>> สิงหาคม </option>
                            <option value='9' <?php if($se_month == 9){ echo "selected"; } ?>> กันยายน </option>
                            <option value='10' <?php if($se_month == 10){ echo "selected"; } ?>> ตุลาคม </option>
                            <option value='11' <?php if($se_month == 11){ echo "selected"; } ?>> พฤศจิกายน </option>
                            <option value='12' <?php if($se_month == 12){ echo "selected"; } ?>> ธันวาคม </option>
                        </select>
                    </div>

                    <div class="col-auto se_time_g2">
                        <strong> วันที่ </strong>

                    </div>

                    <div class="col-auto se_time_g2 input-daterange">
                        <input type="text" class="form-control" id="date_start" name="date_start"
                            value='<?php echo $date_start; ?>'>
                    </div>

                    <div class="col-auto se_time_g2">
                        ถึง
                    </div>

                    <div class="col-auto se_time_g2 input-daterange">
                        <input type="text" class="form-control" id="date_end" name="date_end"
                            value='<?php echo $date_end; ?>'>
                    </div>

                    <div class="col-auto ">
                        <input type="submit" class="btn bgcolor2 shadow-sm" id="submit" name="submit" value="ตกลง">

                    </div>

                    <br>

                    <p class="subtitle ">
                        <strong> ข้อมูล ณ วันที่ (ว/ด/ป) : </strong>
                        <?php echo thai_date_short_number_time(strtotime(date("Y-m-d H:i:s"))); ?>
                    </p>


                </div>
            </div>

        </form>

        <div class="text-center mb-3">

            <div class=" btn-group">
                <a class="btn btn-lg bgcolor4 shadow-sm" href="dashboard_score.php">
                    <span class="icon is-small"><i class="far fa-chart-bar" aria-hidden="true"></i></span>
                    <span>ผู้แจ้งเหตุ</span>
                </a>
                <a class="btn btn-lg bgcolor3 btn-white border shadow-sm" href="dashboard_score2.php">
                    <span class="icon is-small"><i class="far fa-chart-bar" aria-hidden="true"></i></span>
                    <span>เจ้าหน้าที่</span>
                </a>
            </div>

        </div>

        <!--  <div class="container mb-3">-->
        <div class=" mb-3">

            <!--<div class="row d-flex justify-content-center gap-4">-->
            <div class="row  gap-4">
                <div class="col-sm-5 p-3   ">

                    <div id="chart1" class="p-3 bg-white rounded-3 border shadow-sm"></div>

                </div>

                <div class="col-sm-3 p-3 ">

                    <div class="p-3 p-3 bgcolor5 rounded-3 text-center shadow-sm" style="margin-top: 90px;">

                        <img class="bg-white" src="../public/images/survey_icon2.png" width="100"
                            style="border-radius: 50%; margin-top: -70px; border: 2px solid #86adae;">

                        <div class=" p-1 mt-3">
                            <label>จำนวนผู้ประเมินความพึงพอใจ</label>
                        </div>

                        <div class="bg-white p-3 mt-3" style="color: #000;">
                            <label><?php echo $count_user; ?> ราย</label>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-sm-6">
                <div class="bg-white p-3 rounded-3 border shadow-sm">
                    <div id="chart2" class="p-3 bg-white rounded-4"></div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="bg-white p-3 rounded-3 border shadow-sm">
                    <div id="chart3" class="p-3 bg-white rounded-4"></div>
                </div>
            </div>
        </div>

        <div class="mb-4 p-3 bg-white rounded-3 border shadow-sm">
            <div class="text-center mb-3">
                <b class="fs-5">สรุปผลการประเมินความพึงพอใจต่อการใช้งานระบบของเจ้าหน้าที่</b>
            </div>
            <div class="table-responsive border rounded-3 p-3">
                <table id="tablescore1" class="table table-bordered table-striped" style="text-align: center;">
                    <thead>
                        <tr style="text-align: center;">
                            <th class="text-center" rowspan="2">ลำดับ</th>
                            <th class="text-center" rowspan="2" style="width: 40%;">ประเด็น</th>
                            <th class="text-center" colspan="5">จำนวนผู้แจ้งเหตุที่ประเมินความพึงพอใจ จำแนกตามระดับความพึงพอใจ</th>
                        </tr>
                        <tr>
                            <th class="text-center" style="width: 10%;">มากที่สุด</th>
                            <th class="text-center" style="width: 10%;">มาก</th>
                            <th class="text-center" style="width: 10%;">ปานกลาง</th>
                            <th class="text-center" style="width: 10%;">น้อย</th>
                            <th class="text-center" style="width: 10%;">น้อยที่สุด</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td class="text-start">การเข้าใช้งานฟังก์ชั่นต่างๆในระบบ สามารถทำได้ง่าย ไม่ซับซ้อน</td>
                            <td><?php echo $count_eva1_5; ?></td>
                            <td><?php echo $count_eva1_4; ?></td>
                            <td><?php echo $count_eva1_3; ?></td>
                            <td><?php echo $count_eva1_2; ?></td>
                            <td><?php echo $count_eva1_1; ?></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td class="text-start">สามารถค้นหาหรือเข้าถึงข้อมูลที่ต้องการได้ง่าย</td>
                            <td><?php echo $count_eva2_5; ?></td>
                            <td><?php echo $count_eva2_4; ?></td>
                            <td><?php echo $count_eva2_3; ?></td>
                            <td><?php echo $count_eva2_2; ?></td>
                            <td><?php echo $count_eva2_1; ?></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td class="text-start">
                            ความหลากหลายของรูปแบบการรายงานข้อมูล</td>
                            <td><?php echo $count_eva3_5; ?></td>
                            <td><?php echo $count_eva3_4; ?></td>
                            <td><?php echo $count_eva3_3; ?></td>
                            <td><?php echo $count_eva3_2; ?></td>
                            <td><?php echo $count_eva3_1; ?></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td class="text-start">
                            ความรวดเร็วในการตอบสนองของระบบ</td>
                            <td><?php echo $count_eva4_5; ?></td>
                            <td><?php echo $count_eva4_4; ?></td>
                            <td><?php echo $count_eva4_3; ?></td>
                            <td><?php echo $count_eva4_2; ?></td>
                            <td><?php echo $count_eva4_1; ?></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td class="text-start">
                            สามารถนำข้อมูลการรายงานไปใช้ประโยชน์</td>
                            <td><?php echo $count_eva5_5; ?></td>
                            <td><?php echo $count_eva5_4; ?></td>
                            <td><?php echo $count_eva5_3; ?></td>
                            <td><?php echo $count_eva5_2; ?></td>
                            <td><?php echo $count_eva5_1; ?></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="text-center" colspan="2">รวม</th>
                            <th class="text-center"><?php echo $sumcount_5; ?></th>
                            <th class="text-center"><?php echo $sumcount_4; ?></th>
                            <th class="text-center"><?php echo $sumcount_3; ?></th>
                            <th class="text-center"><?php echo $sumcount_2; ?></th>
                            <th class="text-center"><?php echo $sumcount_1; ?></th>
                        </tr>
                    </tfoot>

                </table>
            </div>
        </div>

        <div class="mb-4 p-3 bg-white rounded-3 border shadow-sm">
            <div class="text-center mb-3">
                <b class="fs-5">ข้อมูลการประเมินความพึงพอใจต่อการใช้งานระบบของเจ้าหน้าที่</b>
            </div>
            <div class="row rounded-3 p-3">
                <div class="col-md-3 offset-md-9 ">
                    <div class="row text-center" >
                        <div class="col-5 p-3">
                            จำนวนผู้ประเมิน 
                        </div>
                        <div class="col-7 bg-light rounded-3 border p-3">
                            <?php echo $count_user; ?> ราย
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive border rounded-3 p-3">
                <table id="tablescore2" class="table table-bordered text-center ">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 5%;" rowspan="2">ลำดับ</th>
                            <th class="text-center" style="width: 10%;" rowspan="2">ชื่อผู้ใช้งาน (User)</th>
                            <th class="text-center" style="width: 10%;" rowspan="2">วันที่ประเมิน</th>
                            <th class="text-center" style="width: 10%;" rowspan="2">ครั้งที่ประเมิน</th>
                            <th class="text-center" colspan="6">ผลการประเมิน</th>
                        </tr>
                        <tr >
                            <th style="width: 10%; vertical-align: top;">1. การเข้าใช้งานฟังก์ชั่นต่างๆในระบบ สามารถทำได้ง่าย ไม่ซับซ้อน</th>
                            <th style="width: 10%; vertical-align: top;">2. สามารถค้นหาหรือเข้าถึงข้อมูลที่ต้องการได้ง่าย</th>
                            <th style="width: 10%; vertical-align: top;">3. ความหลากหลายของรูปแบบการรายงานข้อมูล</th>
                            <th style="width: 10%; vertical-align: top;">4. ความรวดเร็วในการตอบสนองของระบบ</th>
                            <th style="width: 10%; vertical-align: top;">5. สามารถนำข้อมูลการรายงานไปใช้ประโยชน์</th>
                            <th class="text-center" style="width: 30%; ">ข้อเสนอแนะ</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $j = 0; $order = 0; $color_change = "1"; for($i=1;$i<=$loop_q2;$i++){  ?>

                        <?php 
                            /*
                            //$oname2_check_color = $oname2[$i];
                            //$eva_date_check_color = $eva_date[$i];

                            $color_change = "0";
                            if(($oname2[$i-1] == $oname2[$i]) && ($eva_date[$i-1] == $eva_date[$i])){ 
                                //$color = "style='background-color: #efefef; '";
                            }else{
                                //$color = "";
                                $order++;
                                $color_change = "1";
                            }
                            //$order_old =  $order;

                            if ($color_change == "1" ){
                                $color = "style='background-color: #efefef; '";
                            }else{
                                $color = "";
                            }
                            */

                            if($eva_date[$i] <> $eva_date[$i-1]){

                                if($color_change == "0"){
                                    $color_change = "1";
                                    $color = "style='background-color: #efefef; '";
                                    $order++;
                                }else if($color_change == "1"){
                                    $color_change = "0";
                                    $color = "";
                                    $order++;
                                }
                            }else if ($oname2[$i-1] <> $oname2[$i]){
                                if($color_change == "0"){
                                    $color_change = "1";
                                    $color = "style='background-color: #efefef; '";
                                    $order++;
                                }else if($color_change == "1"){
                                    $color_change = "0";
                                    $color = "";
                                    $order++;
                                }
                            }
                                
                        ?>

                        <tr >
                            <td <?php echo $color; ?>><?php echo $order; ?></td>
                            <td <?php echo $color; ?> class="text-start"><?php echo $oname2[$i]; ?></td>
                            <td <?php echo $color; ?>><?php echo thai_date_short_number2($eva_date[$i]); ?></td>
                            <td <?php echo $color; ?>><?php 
                                    if(($oname2[$i-1] == $oname2[$i]) && ($eva_date[$i-1] == $eva_date[$i])){
                                        $j++;
                                        echo $j; 
                                    }else{
                                        $j = 1;
                                        echo $j; 
                                    }
                                    
                                ?>
                            </td>
                            <td <?php echo $color; ?>><?php echo $list_eva_txt1[$i]; ?></td>
                            <td <?php echo $color; ?>><?php echo $list_eva_txt2[$i]; ?></td>
                            <td <?php echo $color; ?>><?php echo $list_eva_txt3[$i]; ?></td>
                            <td <?php echo $color; ?>><?php echo $list_eva_txt4[$i]; ?></td>
                            <td <?php echo $color; ?>><?php echo $list_eva_txt5[$i]; ?></td>
                            <td <?php echo $color; ?>><?php echo $eva_comment[$i]; ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>

                </table>
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
    <script src="https://code.highcharts.com/highcharts-more.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <!-- datatable core JS-->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript"
        src="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-html5-2.2.3/b-print-2.2.3/datatables.min.js">
    </script>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Core theme JS-->
    <!--script src="js/scripts.js"></script-->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" crossorigin="anonymous">
    </script>

    <script src="../public/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

    <script>
    $(document).ready(function() {

        var o_table = $('#tablescore1').DataTable({
            responsive: true,
            "pageLength": 25,
            dom: 'Bfrtip',
            buttons: [
                'pageLength', 'copy', 'excel', 'pdf', 'print'
            ]

        });

        var o_table = $('#tablescore2').DataTable({
            responsive: true,
            "pageLength": 25,
            dom: 'Bfrtip',
            buttons: [
                'pageLength', 'copy', 'excel', 'pdf', 'print'
            ]

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

    $(document).ready(function() {

        $('.se_time_g11').hide();
        $('.se_time_g2').hide();

        <?php 
            if($se_time == 1){
                echo "$('.se_time_g1').show();";
                echo "$('.se_time_g11').hide();";
                echo "$('.se_time_g2').hide();";
                if($se_quarter == 99){
                    echo "$('.se_time_g11').show();";
                }
            }else if($se_time == 2){
                echo "$('.se_time_g1').hide();";
                echo "$('.se_time_g11').hide();";
                echo "$('.se_time_g2').show();";
            }else{
                echo "$('.se_time_g1').show();";
                echo "$('.se_time_g11').hide();";
                echo "$('.se_time_g2').hide();";
            }
        ?>
    });

    $('#se_quarter').on('change', function(e) {

        var se_quarter = $('#se_quarter').val();

        if (se_quarter == '99') {
            $('.se_time_g11').show();
        } else {
            $('.se_time_g11').hide();
        }
    });

    $('#se_time').on('change', function(e) {

        if ($('#se_time').val() == '1') {
            $('.se_time_g1').show();
            $('.se_time_g2').hide();
            $('.se_time_g11').hide();
        } else {
            $('.se_time_g1').hide();
            $('.se_time_g2').show();
            $('.se_time_g11').hide();
        }
    });
    </script>

<script>
    $('.input-daterange input').datepicker({
        format: 'dd/mm/yyyy'
    });
    </script>

    <script>

    Highcharts.chart('chart1', {

        chart: {
            type: 'gauge',
            plotBackgroundColor: null,
            plotBackgroundImage: null,
            plotBorderWidth: 0,
            plotShadow: false,
            height: '60%'
        },

        title: {
            text: 'ภาพรวมความพึงพอใจต่อการใช้งานระบบ'
        },

        pane: {
            startAngle: -90,
            endAngle: 89.9,
            background: null,
            center: ['50%', '75%'],
            size: '120%'
        },

        // the value axis
        yAxis: {
            min: 0,
            max: 100,
            tickPixelInterval: 72,
            tickPosition: 'inside',
            tickColor: Highcharts.defaultOptions.chart.backgroundColor || '#FFFFFF',
            tickLength: 20,
            tickWidth: 2,
            minorTickInterval: null,
            labels: {
                distance: 20,
                style: {
                    fontSize: '14px'
                }
            },
            lineWidth: 0,
            plotBands: [

                {
                    from: 0,
                    to: 40,
                    color: '#f0685a',
                    thickness: 20,
                    borderRadius: '80%'
                },
                {
                    from: 30,
                    to: 100,
                    color: '#74a474',
                    thickness: 20,
                    borderRadius: '80%'
                },
                {
                    from: 30,
                    to: 50,
                    color: '#f49e78',
                    thickness: 20
                },
                {
                    from: 50,
                    to: 70,
                    color: '#fdd777',
                    thickness: 20
                },
                {
                    from: 70,
                    to: 90,
                    color: '#b4ca84',
                    thickness: 20
                },

            ]
        },

        series: [{
            name: 'คะแนนเฉลี่ย',
            data: [<?php echo number_format($average_percent,2); ?>],
            tooltip: {
                valueSuffix: '%'
            },
            dataLabels: {
                enabled: true,
                align: 'center',
                useHTML: true,
                formatter: function() {
                    return "<img src='<?php echo $path_icon; ?>' width='30'> คะแนนเฉลี่ย <?php echo number_format($average,2); ?> (<?php echo number_format($average_percent,2); ?>%) <br>  <?php echo $txt_score; ?> ";
                },
                //format: "<img src='../public/images/survey_icon2.png' width='20'> คะแนนเฉลี่ย 4.41 {y}%",
                borderWidth: 0,
            },
            dial: {
                radius: '80%',
                backgroundColor: 'gray',
                baseWidth: 12,
                baseLength: '0%',
                rearLength: '0%'
            },
            pivot: {
                backgroundColor: 'gray',
                radius: 6
            }

        }]

    });

    // chart 2

    Highcharts.chart('chart2', {
        chart: {
            type: 'bar'
        },
        title: {
            text: 'ภาพรวมคะแนนเฉลี่ยความพึงพอใจต่อการใช้งานระบบของผู้แจ้งเหตุ',
            align: 'center'
        },
        subtitle: {
            text: 'จำแนกรายประเด็น',
            align: 'center'
        },
        xAxis: {
            categories: [
                '1.การเข้าใช้งานฟังก์ชั่นต่างๆในระบบ สามารถทำได้ง่าย ไม่ซับซ้อน',
                '2.สามารถค้นหาหรือเข้าถึงข้อมูลที่ต้องการได้ง่าย',
                '3.ความหลากหลายของรูปแบบการรายงานข้อมูล',
                '4.ความรวดเร็วในการตอบสนองของระบบ',
                '5.สามารถนำข้อมูลการรายงานไปใช้ประโยชน์'
            ],
            accessibility: {
                description: ''
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: ''
            }
        },
        /*
        tooltip: {
            valueSuffix: ' '
        },
        */
        tooltip: {
                headerFormat: '',
                pointFormat: '<b style="color:{point.color};">ระดับความพึงพอใจ{point.b}</b><br>คะแนนเฉลี่ย {point.y} ({point.a}%)'
            },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            dataLabels: {
                enabled: true
            },
            name: 'คะแนนเฉลี่ย',
            data: [
                {
                    "y": <?php if(is_nan($avg1) == true){ echo "0";}else{echo number_format($avg1,2);} ?>,
                    "color": "<?php echo $bar2_color1; ?>",
                    "a": "<?php echo number_format($percentcal1,2); ?>",
                    "b": "<?php echo $bar2_txt1; ?>",
                    "c": "<?php echo $bar_icon1; ?>"
                },
                {
                    "y": <?php if(is_nan($avg2) == true){ echo "0";}else{echo number_format($avg2,2);} ?>,
                    "color": "<?php echo $bar2_color2; ?>",
                     "a": "<?php echo number_format($percentcal2,2); ?>",
                    "b": "<?php echo $bar2_txt2; ?>",
                    "c": "<?php echo $bar_icon2; ?>"
                },
                {
                    "y": <?php if(is_nan($avg3) == true){ echo "0";}else{echo number_format($avg3,2);} ?>,
                    "color": "<?php echo $bar2_color3; ?>",
                    "a": "<?php echo number_format($percentcal3,2); ?>",
                    "b": "<?php echo $bar2_txt3; ?>",
                    "c": "<?php echo $bar_icon3; ?>"
                },
                {
                    "y": <?php if(is_nan($avg4) == true){ echo "0";}else{echo number_format($avg4,2);} ?>,
                    "color": "<?php echo $bar2_color4; ?>",
                    "a": "<?php echo number_format($percentcal4,2); ?>",
                    "b": "<?php echo $bar2_txt4; ?>",
                    "c": "<?php echo $bar_icon4; ?>"
                },
                {
                    "y": <?php if(is_nan($avg5) == true){ echo "0";}else{echo number_format($avg5,2);} ?>,
                    "color": "<?php echo $bar2_color5; ?>",
                    "a": "<?php echo number_format($percentcal5,2); ?>",
                    "b": "<?php echo $bar2_txt5; ?>",
                    "c": "<?php echo $bar_icon5; ?>"
                },
            ],
            color: '#86adae'

        }]
    });

    // chart3
    Highcharts.chart('chart3', {
        chart: {
            type: 'bar'
        },
        title: {
            text: 'จำนวนผู้แจ้งเหตุที่ประเมินความพึงพอใจต่อการใช้งานระบบ'
        },
        subtitle: {
            text: 'จำแนกตามระดับความพึงพอใจ',
            align: 'center'
        },
        tooltip: {
                headerFormat: '',
                pointFormat: '<b>{series.name}</b><br>จำนวน {point.y} ราย'
        },
        xAxis: {
            categories: [
                '1.การเข้าใช้งานฟังก์ชั่นต่างๆในระบบ สามารถทำได้ง่าย ไม่ซับซ้อน',
                '2.สามารถค้นหาหรือเข้าถึงข้อมูลที่ต้องการได้ง่าย',
                '3.ความหลากหลายของรูปแบบการรายงานข้อมูล',
                '4.ความรวดเร็วในการตอบสนองของระบบ',
                '5.สามารถนำข้อมูลการรายงานไปใช้ประโยชน์'
            ]
        },
        yAxis: {
            min: 0,
            title: {
                text: ''
            }
        },
        legend: {
            reversed: true
        },
        plotOptions: {
            series: {
                stacking: 'percent',
                dataLabels: {
                    enabled: true
                }
            }
        },
        series: [
            {
                name: 'มากที่สุด',
                color: '#74a474',
                data: [<?php echo $count_eva1_5; ?>, <?php echo $count_eva2_5; ?>, <?php echo $count_eva3_5; ?>, <?php echo $count_eva4_5; ?>, <?php echo $count_eva5_5; ?>]
            },{
                name: 'มาก',
                color: '#b4ca84',
                data: [<?php echo $count_eva1_4; ?>, <?php echo $count_eva2_4; ?>, <?php echo $count_eva3_4; ?>, <?php echo $count_eva4_4; ?>, <?php echo $count_eva5_4; ?>]
            },{
                name: 'ปานกลาง',
                color: '#fdd777',
                data: [<?php echo $count_eva1_3; ?>, <?php echo $count_eva2_3; ?>, <?php echo $count_eva3_3; ?>, <?php echo $count_eva4_3; ?>, <?php echo $count_eva5_3; ?>]
            },{
                name: 'น้อย',
                color: '#f49e78',
                data: [<?php echo $count_eva1_2; ?>, <?php echo $count_eva2_2; ?>, <?php echo $count_eva3_2; ?>, <?php echo $count_eva4_2; ?>, <?php echo $count_eva5_2; ?>]
            },{
                name: 'น้อยที่สุด',
                data: [<?php echo $count_eva1_1; ?>, <?php echo $count_eva2_1; ?>, <?php echo $count_eva3_1; ?>, <?php echo $count_eva4_1; ?>, <?php echo $count_eva5_1; ?>],
                color: '#f0685a'
            }

        ]
    });
    </script>

</body>

</html>