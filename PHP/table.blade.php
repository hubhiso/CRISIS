<!DOCTYPE html>
<html lang="en" class="route-index">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>CRS</title>

    <link rel="shortcut icon" href="../public/images/favicon.ico">

    <meta name="msapplication-config" content="http://bulma.io/favicons/browserconfig.xml?v=201701041855">

    <script src="http://bulma.io/javascript/jquery-2.2.0.min.js"></script>
    <script src="http://bulma.io/javascript/clipboard.min.js"></script>
    <script src="http://bulma.io/javascript/bulma.js"></script>
    <script type="text/javascript" src="http://bulma.io/javascript/index.js"></script>

    <link href="../public/bulma-0.8.0/css/bulma.css" rel="stylesheet">
    <link href="../public/css/font-awesome5.0.6/css/fontawesome-all.css" rel="stylesheet">

</head>

<body class="layout-default">
    <nav class="navbar navbar-light bg-white has-text-left">
        <div class="container">
            <a class="navbar-brand" href="../public/">
                <img src="../public/images/favicon.ico" alt="" height="30">
                <span class="text-secondary">ปกป้อง (CRS)</span>
            </a>
        </div>
    </nav>

    <section class="hero is-medium has-text-centered">
        <div class="hero-head">

            <div class="container">

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
                        <li>
                            <a href="dashboard3_new.php">
                                <h6><i class="fas fa-chart-bar is-size-4 " aria-hidden="true"></i> Dashboard สรุปสถานการณ์</h6>
                            </a>
                        </li>

                        <li>
                            <a href="automated.php">
                                <h6><i class="far fa-file-alt is-size-4 " aria-hidden="true"></i> รายงานการละเมิดสิทธิ</h6>
                            </a>

                        </li>
                        <li>
                            <a href="mapcrisis_new.php">
                                <h6><i class="far fa-map is-size-4 " aria-hidden="true"></i> พิกัดจุดเกิดเหตุ</h6>
                            </a>

                        </li>
                        <li class="is-active">
                            <a href="table.blade.php">
                            <h6><i class="fa fa-table  is-size-4 " aria-hidden="true"></i> สรุปข้อมูลภาพรวม</h6>
                            </a>

                        </li>
                    </ul>
                </div>

                <div class="tabs is-centered  is-toggle is-toggle-rounded">
                    <ul>
                        <li class="is-active">
                            <a href="dashboard3_new.php">
                                <h6><i class="fa fa-table  " aria-hidden="true"></i> ภาพรวม </h6>
                            </a>
                        </li>

                        <li>
                            <a href="report_c1_new.php">
                                <h6><i class="fa fa-table  " aria-hidden="true"></i> สรุปกรณีละเมิดสิทธิ</h6>
                            </a>

                        </li>
                        <li>
                            <a href="report_c2_new.php">
                                <h6><i class="fa fa-table   " aria-hidden="true"></i> ตารางสรุปการละเมิดสิทธิ</h6>
                            </a>

                        </li>
                        <li >
                            <a href="report_performance_new.php">
                            <h6><i class="fa fa-table   " aria-hidden="true"></i> ระยะเวลาการดำเนินการ</h6>
                            </a>

                        </li>
                    </ul>
                </div>


                <div class="field is-horizontal">
                    <?php
		include "index.php";
		//echo "test db ".$database;
	    ?>
                </div>

    </section>

</body>
<footer class="footer " style="background-color: #EEE;">
    <div class="container  ">
        <div class="content has-text-centered  ">
            <p>Crisis Response System (CRS)
            </p>
            <p id="tsp"> <small> Source code licensed <a href="http://www.hiso.or.th">HISO</a>. </small> </p>
        </div>
    </div>
</footer>

</html>