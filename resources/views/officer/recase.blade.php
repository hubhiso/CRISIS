<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.2/css/bulma.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bm/jq-3.6.0/dt-1.11.3/datatables.min.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.1/css/bulma.min.css">
    <!--link href="{{ asset('bulma-0.9.0/css/bulma.css') }}" rel="stylesheet"-->
    <!--link href="{{ asset('bulma-0.8.0/css/bulma.css') }}" rel="stylesheet"-->
    <link href="{{ asset('css/mystyles.css') }}" rel="stylesheet">
    <script src="{{ asset('css/jquery.min.js') }}"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />

    {{ Html::script('js/jquery.min.js') }}

    <meta name="theme-color" content="#ab3c3c" />

    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">

    <title> ปกป้อง (CRS) </title>

    <?php 
        $i = 0;
    ?>
    @foreach($show_prov as $province)
    <?php 
        $i++;

        $pr_name[$i] = $province->PROVINCE_NAME;
        $pr_code[$i] = $province->PROVINCE_CODE;
        $nhso_code[$i] = $province->nhso;
        
        $prloop = $i;
    ?>
    @endforeach

</head>

<body class="has-background-light theme-light">
    <div class="hero-head ">
        <div class=" ">
            @component('component.login_bar2')
            @endcomponent
        </div>
    </div>

    <div class="container is-fluid">

        <div class=" section ">

            <nav class="breadcrumb" aria-label="breadcrumbs">
                <ul>
                    <li>
                        <a href="{{ route('guest_home') }}">
                            <span class="icon is-small">
                                <i class="fas fa-home" aria-hidden="true"></i>
                            </span>
                            <span>หน้าแรก</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('officer.main') }}">
                            <span class="icon is-small">
                                <i class="fas fa-lock" aria-hidden="true"></i>
                            </span>
                            <span>ส่วนเจ้าหน้าที่</span>
                        </a>
                    </li>
                    <li class="is-active">
                        <a href="#">
                            <span class="icon is-small">
                                <i class="fa-solid fa-clock-rotate-left"></i>
                            </span>
                            <span>กู้คืนข้อมูล</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <div class="content">
                <h3>
                    <sapn class="has-text-danger"><i class="fa-solid fa-clock-rotate-left "></i></sapn>
                    กู้คืนข้อมูล
                </h3>
                <br>

                <form role="form" class="mb-5" method="POST" action="{{ route('officer.recase') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="level">
                        <!-- Left side -->
                        <div class="level-left">
                            <div class="level-item">
                                <label class="label">เลือกเขต</label>
                            </div>
                            <div class="level-item">
                                <div class="select">
                                    <select name="nhso" id="nhso" class="form-select rounded"
                                        onchange="setprov(nhso.value,1);">
                                        <option value="0" <?php if ($nhso_se == "0"){ echo "selected";} ?>> ทุกเขต
                                        </option>
                                        <option value="1" <?php if ($nhso_se == "1"){ echo "selected";} ?>>
                                            เขต 1
                                        </option>
                                        <option value="2" <?php if ($nhso_se == "2"){ echo "selected";} ?>>
                                            เขต 2
                                        </option>
                                        <option value="3" <?php if ($nhso_se == "3"){ echo "selected";} ?>>
                                            เขต 3
                                        </option>
                                        <option value="4" <?php if ($nhso_se == "4"){ echo "selected";} ?>>
                                            เขต 4
                                        </option>
                                        <option value="5" <?php if ($nhso_se == "5"){ echo "selected";} ?>>
                                            เขต 5
                                        </option>
                                        <option value="6" <?php if ($nhso_se == "6"){ echo "selected";} ?>>
                                            เขต 6
                                        </option>
                                        <option value="7" <?php if ($nhso_se == "7"){ echo "selected";} ?>>
                                            เขต 7
                                        </option>
                                        <option value="8" <?php if ($nhso_se == "8"){ echo "selected";} ?>>
                                            เขต 8
                                        </option>
                                        <option value="9" <?php if ($nhso_se == "9"){ echo "selected";} ?>>
                                            เขต 9
                                        </option>
                                        <option value="10" <?php if ($nhso_se == "10"){ echo "selected";} ?>>
                                            เขต 10
                                        </option>
                                        <option value="11" <?php if ($nhso_se == "11"){ echo "selected";} ?>>
                                            เขต 11
                                        </option>
                                        <option value="12" <?php if ($nhso_se == "12"){ echo "selected";} ?>>
                                            เขต 12
                                        </option>
                                        <option value="13" <?php if ($nhso_se == "13"){ echo "selected";} ?>>
                                            เขต 13
                                        </option>

                                    </select>
                                </div>
                            </div>
                            <div class="level-item">
                                <label class="label">เลือกจังหวัด</label>
                            </div>
                            <div class="level-item">
                                <div class="select">
                                    <select name="prov_id" id="prov_id">
                                        <option value="0" style="width:250px">ทุกจังหวัด</option>
                                        @foreach($show_prov as $province)
                                        <option value="{{ $province->PROVINCE_CODE }}"
                                            <?php if($province->PROVINCE_CODE == $prov_id_se){ echo "selected";} ?>
                                            style="width:250px">
                                            {{ $province->PROVINCE_NAME }}
                                        </option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                        </div>

                        <!-- Right side -->
                        <div class="level-right">

                        </div>
                    </div>

                    <div class="level">
                        <!-- Left side -->
                        <div class="level-left">
                            <div class="level-item">
                                <label class="label">ข้อมูลปัญหาที่พบ</label>
                            </div>
                            <div class="level-item">
                                <span class="select">
                                    <select id="problem_case" name="problem_case">
                                        <option value="0" <?php if($problem_case_se == 0){ echo "selected"; } ?>>ทั้งหมด
                                        </option>
                                        <option value="1" <?php if($problem_case_se == 1){ echo "selected"; } ?>>
                                            บังคับตรวจเอชไอวี</option>
                                        <option value="2" <?php if($problem_case_se == 2){ echo "selected"; } ?>>
                                            เปิดเผยสถานะการติดเชื้อเอชไอวี</option>
                                        <option value="3" <?php if($problem_case_se == 3){ echo "selected"; } ?>>
                                            ถูกกีดกันหรือถูกเลือกปฏิบัติเนื่องมาจาการติดเชื้อเอชไอวี
                                        </option>
                                        <option value="4" <?php if($problem_case_se == 4){ echo "selected"; } ?>>
                                            ถูกกีดกันหรือถูกเลือกปฏิบัติเนื่องมาจากเป็นกลุ่มเปราะบาง
                                        </option>
                                        <option value="5" <?php if($problem_case_se == 5){ echo "selected"; } ?>>อื่นๆ
                                            ที่เกี่ยวข้องกับเอชไอวี</option>
                                        <option value="6" <?php if($problem_case_se == 6){ echo "selected"; } ?>>อื่นๆ
                                            ที่ไม่เกี่ยวข้องกับเอชไอวี</option>
                                    </select>
                                </span>
                            </div>
                        </div>

                        <!-- Right side -->
                        <div class="level-right">

                        </div>
                    </div>

                    <div class="level">
                        <!-- Left side -->
                        <div class="level-left">
                            <div class="level-item">
                                <label class="label">สถานะการดำเนินงาน</label>
                            </div>
                            <div class="level-item">
                                <span class="select">
                                    <select id="p_case" name="pcase">
                                        <option value="0" <?php if ($pcase_se == "0") { echo "selected";} ?>> ทั้งหมด
                                        </option>
                                        <option value="1" <?php if ($pcase_se == "1") { echo "selected";} ?>>
                                            ยังไม่ได้รับเรื่อง </option>
                                        <option value="2" <?php if ($pcase_se == "2") { echo "selected";} ?>>
                                            รับเรื่องแล้ว </option>
                                        <option value="3" <?php if ($pcase_se == "3") { echo "selected";} ?>>
                                            บันทึกข้อมูลเพิ่มเติมแล้ว </option>
                                        <option value="4" <?php if ($pcase_se == "4") { echo "selected";} ?>>
                                            อยู่ระหว่างดำเนินการ </option>
                                        <option value="5" <?php if ($pcase_se == "5") { echo "selected";} ?>>
                                            ดำเนินการเสร็จสิ้น </option>
                                        <option value="6" <?php if ($pcase_se == "6") { echo "selected";} ?>>
                                            ดำเนินการเสร็จสิ้นแล้วส่งต่อ </option>
                                        <option value="98" <?php if ($pcase_se == "98") { echo "selected";} ?>>
                                            ยุติการดำเนินการ </option>
                                    </select>
                                </span>
                            </div>
                            <div class="level-item">
                                <button type="submit" class="button is-danger"> ยืนยัน </button>
                            </div>
                        </div>

                        <!-- Right side -->
                        <div class="level-right">

                        </div>

                    </div>

                </form>

                <div class=" table-container" style="overflow-x:auto; margin:auto;">
                    <table id="table_m" class="table panel  is-striped  is-hoverable is-fullwidth">

                        <thead style="text-align: center;">
                            <tr class=" has-background-danger ">
                                <th class="has-text-white " style=" white-space:nowrap;"> ลำดับ </abbr>
                                </th>
                                <th class="has-text-white " style=" white-space:nowrap;"> ดำเนินการ </abbr>
                                </th>
                                <th class="has-text-white " style=" white-space:nowrap;"> วันที่ </abbr>
                                </th>
                                <th class="has-text-white " style=" white-space:nowrap;"> รหัส </abbr>
                                </th>
                                <th class="has-text-white " style=" white-space:nowrap;"> วันที่เกิดเหตุ<br>(ตามแจ้ง) </abbr>
                                </th>
                                <th class="has-text-white " style=" white-space:nowrap;"> จังหวัด </abbr>
                                </th>
                                <th class="has-text-white " style=" white-space:nowrap;">ประเภท </abbr>
                                </th>
                                <th class="has-text-white " style=" white-space:nowrap;"> สถานะ </abbr>
                                </th>
                                <th class="has-text-white " style=" white-space:nowrap;"> ประเภทของผู้แจ้ง </abbr>
                                </th>
                                <th class="has-text-white " style=" white-space:nowrap;"> ผู้รับเรื่อง </abbr>
                                </th>
                                
                            </tr>
                        </thead>

                        <?php $i=0; ?>
                        @php
                        $thaimonth =
                        ["","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค."];
                        @endphp

                        @foreach($show_activecase_no as $show)
                        <?php $i++;?>
                        
                        <tr>
                            <input type="hidden" id="caseid{{$i}}" name="caseid" value="{{ $show->case_id }}">
                            <td style="text-align: center;">{{$i}}</td>
                            <td style="text-align: center;"> <button type="button" class='tag is-medium is-danger is-rounded '
                            onclick="confirm_recover(caseid{{$i}}.value)"><span>กู้คืนข้อมูล</span> </button> </td>
                            <td style=" white-space:nowrap;">
                                {{date('d',strtotime(str_replace('-','/', $show->created_at)))}}-{{$thaimonth[date('n',strtotime(str_replace('-','/', $show->created_at)))]}}{{date("Y",strtotime(str_replace('-','/', $show->created_at)))+543}}
                            </td>
                            <td>{{$show->case_id}}</td>
                            <td style=" white-space:nowrap;">
                                @if($show->accident_date != "")
                                {{date('d',strtotime(str_replace('-','/', $show->accident_date)))}}-{{$thaimonth[date('n',strtotime(str_replace('-','/', $show->accident_date)))]}}{{date("Y",strtotime(str_replace('-','/', $show->accident_date)))+543}}
                                @else
                                ไม่มีข้อมูล
                                @endif
                            </td>

                            <td class="has-text-left">{{$show->Provinces->PROVINCE_NAME}}</td>

                            <td class="has-text-left" style=" white-space:nowrap;">
                                @if($show->problem_case == 1)
                                บังคับตรวจเอชไอวี <br>
                                @endif

                                @if($show->problem_case == 2)
                                เปิดเผยสถานะการติดเชื้อเอชไอวี<br>
                                @endif

                                @if($show->problem_case == 3)
                                ถูกกีดกันหรือถูกเลือกปฏิบัติเนื่องมาจาการติดเชื้อเอชไอวี<br>
                                @endif

                                @if($show->problem_case == 4)
                                ถูกกีดกันหรือถูกเลือกปฏิบัติเนื่องมาจากเป็นกลุ่มเปราะบาง<br>
                                @endif

                                @if($show->problem_case == 5)
                                อื่นๆ ที่เกี่ยวข้องกับเอชไอวี<br>
                                @endif

                                @if($show->problem_case == 6)
                                อื่นๆ<br>
                                @endif
                            </td>

                            @if($show->status == 99)
                            <td class="has-text-left" style=" white-space:nowrap;">ปฏิเสธการรับเรื่อง</td>
                            @elseif( $show->status == 98)
                            <td class="has-text-left" style=" white-space:nowrap;">ยุติการดำเนินการ</td>
                            @elseif( $show->status == 1)
                            <td class="has-text-left" style=" white-space:nowrap;">ยังไม่ได้รับเรื่อง</td>
                            @elseif( $show->status == 2)
                            <td class="has-text-left" style=" white-space:nowrap;"> รับเรื่องแล้ว </td>
                            @elseif($show->status == 3)
                            <td class="has-text-left" style=" white-space:nowrap;"> บันทึกข้อมูลเพิ่มเติมแล้ว </td>
                            @elseif($show->status == 4)
                            <td class="has-text-left" style=" white-space:nowrap;"> อยู่ระหว่างการดำเนินการ </td>
                            @elseif($show->status == 5)
                            <td class="has-text-left" style=" white-space:nowrap;"> ดำเนินการเสร็จสิ้น </td>
                            @elseif($show->status ==6)
                            <td class="has-text-left" style=" white-space:nowrap;">  ดำเนินการแล้วส่งต่อ </td>
                            @endif

                            @if($show->sender_case == 1 )
                            <td style=" white-space:nowrap;">แจ้งด้วยตนเอง</td>
                            @elseif($show->sender_case == 2)
                            <td style=" white-space:nowrap;">มีผู้แจ้งแทน</td>
                            @elseif($show->sender_case == 3)
                            <td style=" white-space:nowrap;">เจ้าหน้าที่แจ้ง</td>
                            @else
                            <td style=" white-space:nowrap;">ไม่มีข้อมูล</td>
                            @endif

                            <td style=" white-space:nowrap;"><a href='#' title='Receiver'>{{ $show->receiver }}</a></td>


                        </tr>


                        @endforeach

                    </table>
                </div>

            </div>

        </div>

    </div>

    @extends('officer.footer_m')

    <div id="modal_recovercase" class="modal">
        <div class="modal-background"></div>
        <form role="form" method="POST" action="{{ route('manager.recovercase_cfm') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="modal-card">
                <header class="modal-card-head">
                    <p class="modal-card-title">ยืนยันการกู้คืนข้อมูล</p>
                    <button type="button" class="delete" aria-label="close"></button>
                </header>
                <section class="modal-card-body">

                    <input type="hidden" id="idcase_recover" name="idcase_recover" value="">

                    <p class="is-size-5">ต้องการกู้คืนข้อมูล <span id="txt_idcase_recover" class="has-text-danger"></span> ใช่ไหม</p>
                    <p >กรุณาตรวจสอบความถูกต้องข้อมูลก่อนยืนยันการกู้คืนข้อมูล</p>

                </section>
                <footer class="modal-card-foot">
                    <div class="buttons">
                        <button type="submit" class="button is-success">ยืนยัน</button>
                        <button type="button" class="button modalclose">ยกเลิก</button>
                    </div>
                </footer>
            </div>
        </form>
    </div>

    <script src="{{ asset('bulma/clipboard-1.7.1.min.js') }}"></script>
    <script src="{{ asset('bulma/main.js') }}"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/v/bm/jq-3.6.0/dt-1.11.3/datatables.min.js">
    </script>

    <script>
    var p_id = $('#p_id').val();
    var p_po = $('#p_position').val();
    var p_ar = $('#p_area').val();

    var status_url = "{{route('officer.load_status',['prov_id' => ':p_id']) }}";
    status_url = status_url.replace(':p_id', p_id + ' ' + p_po + ' ' + p_ar);
    console.log(status_url);
    $.ajax({
        type: 'GET',
        url: status_url,
        success: function(data) {
            //console.log(data);
            $('#i-receive').text(data.NotAcp);
            $('#i-additional').text(data.NotKeyIn);
            $('#i-process').text(data.NotOp);
        }
    });

    $(document).ready(function() {

        var o_table = $('#table_m').DataTable({
            language: {
                searchPlaceholder: "",
                search: "ค้นหา",
            },
            "pageLength": 25
        });

        var set_nhso = $('#nhso').val();

        setprov(set_nhso, 0);



    });

    function confirm_recover(idcase) {

        $('#idcase_recover').val(idcase);
        $('#txt_idcase_recover').html(idcase);
        
        $('#modal_recovercase').addClass('is-active');
    }

    $('.modal-background').on('click', function(e) { 
        $('#modal_recovercase').removeClass('is-active');
    })

    $('.recover').on('click', function(e) { 
        $('#modal_recovercase').removeClass('is-active');
    })

    $('.modalclose').on('click', function(e) { 
        $('#modal_recovercase').removeClass('is-active');
    })

    </script>

    <script>
    function setprov(se, ck1) {

        var pr_code = <?php echo json_encode($pr_code); ?>;
        var pr_name = <?php echo json_encode($pr_name); ?>;
        var nhso_code = <?php echo json_encode($nhso_code); ?>;

        if (se == 0) {
            //alert("test"); 

            //$('#prov11').prop('disabled', 'disabled');
            //$('#prov11').val(0);

            $("#prov_id").empty();
            $("#prov_id").append($("<option></option>").attr("value", '0').text('ทุกจังหวัด'));

            for (let i = 1; i <= <?php echo $prloop; ?>; i++) {

                $("#prov_id").append($("<option></option>").attr("value", pr_code[i]).text(pr_name[i]));

                if (ck1 == 0) {
                    if ('<?php echo $prov_id_se; ?>' == pr_code[i]) {
                        $("#prov_id option[value='" + pr_code[i] + "']").attr("selected", "selected");
                    }
                }

            }

        } else {


            $("#prov_id").empty();
            $("#prov_id").append($("<option></option>").attr("value", '0').text("ทุกจังหวัด"));

            for (let i = 1; i <= <?php echo $prloop; ?>; i++) {

                if (nhso_code[i] == se) {
                    $("#prov_id").append($("<option></option>")
                        .attr("value", pr_code[i]).text(pr_name[i]));
                }

                if ('<?php echo $prov_id_se; ?>' == pr_code[i]) {

                    $("#prov_id option[value='" + pr_code[i] + "']").attr("selected", "selected");
                }
            }

        }
    }
    </script>

</body>

</html>