<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> ปกป้อง (CRS) </title>
    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" crossorigin="anonymous">

    <link href="{{ asset('bulma-0.8.0/css/bulma.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mystyles.css') }}" rel="stylesheet">
    {{ Html::script('js/jquery.min.js') }}

    <meta name="theme-color" content="#ab3c3c" />

    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
    <!--script src="http://bulma.io/javascript/jquery-2.2.0.min.js"></script>
    <script src="http://bulma.io/javascript/clipboard.min.js"></script>
    <script src="http://bulma.io/javascript/bulma.js"></script>
    <script type="text/javascript" src="http://bulma.io/javascript/index.js"></script-->

    <link href="{{ asset('css/modal/modal.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bulma-switch.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bulma-checkradio.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/izitoast/dist/css/iziToast.min.css">

</head>

<body class="layout-default">

    <div class="hero-head ">
        <div class=" has-background-light">
            @component('component.login_bar2')
            @endcomponent
        </div>
    </div>
    <br>

    <div class="container is-fluid">
        <nav class="breadcrumb has-text-left" aria-label="breadcrumbs">
            <ul>
                <li>
                    <a href="{{ route('guest_home') }}">
                        <span class="icon is-small">
                            <i class="fas fa-home" aria-hidden="true"></i>
                        </span>
                        <span>หน้าแรก</span>
                    </a>
                </li>
                <li class="is-active">
                    <a href="#">
                        <span class="icon is-small">
                            <i class="fas fa-lock" aria-hidden="true"></i>
                        </span>
                        <span>ส่วนเจ้าหน้าที่</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <section class="hero is-medium ">

        <div class="hero-body">

            <div class="container has-text-centered">
                <!--img src="../public/images/PokPong Logo with Nametag.png" alt=""-->
                <h1 id="bulma" class="title"> Crisis Response System (CRS) </h1>
                <h2 id="modern-framework" class="subtitle"> ระบบรับเรื่องร้องเรียนและคุ้มครองการละเมิดสิทธิด้านเอดส์<br>
                    เพศภาวะ และความเป็นกลุ่มประชากรเปราะบางต่อการถูกเลือกปฏิบัติ </h2>
                <a id="btn_new1" class="button ft1 i-margin" href="{{ 'officer/input_case' }}">แจ้งเหตุ</a>
                <a id="btn_new1" class="button ft1 i-margin"
                    href="{{ route('officer.show',['mode_id' => "0"]) }}">จัดการเหตุ</a>
                <a id="btn_new1" class="button ft1 i-margin" href="../php/dashboard3_new.php">รายงาน</a>

                <br>
                <br>
                <br>

                <a class="button btn_sub i-margin" href="{{ 'officer/guide_t' }}"><i class="fas fa-file-alt"></i>&nbsp;เอกสารเผยแพร่</a>
                <a class="button btn_sub i-margin" href="{{ 'officer/contact' }}"><i class="fa fa-share-alt"
                        aria-hidden="true"></i>&nbsp;ทำเนียบเครือข่าย</a>

                @if( Auth::user()->position == "admin" )
                <br>
                <br>
                <a class="button btn_sub i-margin" href="{{ route('officer.verifydata') }}">
                <i class="fas fa-database"></i></i>&nbsp;จัดการข้อมูลรายเคส</a>
                @endif
            </div>
        </div>
    </section>

    <br><br><br><br>

    @extends('officer.footer_m')

    <!--  alert  -->
    <div id="modal_alert" class="modal " >
        <div class="modal-background"></div>
        <div class="modal-content " style="width: 80%;" >
            <div class="modal-card" style="width: 80%;">
                <form id="officer_eva" method="POST" >
                    <header class="modal-card-head">
                        <p class="modal-card-title has-text-danger">แบบประเมินความพึงพอใจ</p>
                    </header>
                    <section class="modal-card-body">

                        <label class="label p-3 has-text-left">แบบประเมินความพึงพอใจและข้อเสนอแนะสำหรับเจ้าหน้าที่</label>

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="table-container">
                            <table class="table is-bordered is-hoverable is-narrow is-fullwidth">
                                <thead>
                                    <tr>
                                        <th rowspan="2" class="has-text-centered" style="white-space:nowrap;">ลำดับ</th>
                                        <th rowspan="2" class="has-text-centered" style="white-space:nowrap;">ประเด็น
                                        </th>
                                        <th colspan="5" class="has-text-centered" style="white-space:nowrap;">
                                            ระดับความพึงพอใจ</th>
                                    </tr>
                                    <tr>
                                        <th class="has-text-centered colorbg1" style="white-space:nowrap;">มากที่สุด
                                        </th>
                                        <th class="has-text-centered colorbg2" style="white-space:nowrap;">มาก</th>
                                        <th class="has-text-centered colorbg3" style="white-space:nowrap;">ปานกลาง</th>
                                        <th class="has-text-centered colorbg4" style="white-space:nowrap;">น้อย</th>
                                        <th class="has-text-centered colorbg5" style="white-space:nowrap;">น้อยที่สุด
                                        </th>
                                    </tr>

                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td class="has-text-left" style="white-space:nowrap;">
                                            การเข้าใช้งานฟังก์ชั่นต่างๆในระบบ สามารถทำได้ง่าย ไม่ซับซ้อน</td>
                                        <td class="colorbg1">
                                            <input class="is-checkradio has-background-color is-white" type="radio"
                                                id="score11" name="score1" value="5" <?php if($ck_datetoday_eva == 1){ if($eva1 == 5){ echo "checked";}}else{ echo "checked";} ?>>
                                            <label for="score11"></label>
                                        </td>
                                        <td class="colorbg2">
                                            <input class="is-checkradio has-background-color is-white" type="radio"
                                                id="score12" name="score1" value="4" <?php if($ck_datetoday_eva == 1){ if($eva1 == 4){ echo "checked";}} ?>>
                                            <label for="score12"></label>
                                        </td>
                                        <td class="colorbg3">
                                            <input class="is-checkradio has-background-color is-white" type="radio"
                                                id="score13" name="score1" value="3" <?php if($ck_datetoday_eva == 1){ if($eva1 == 3){ echo "checked";}} ?>>
                                            <label for="score13"></label>
                                        </td>
                                        <td class="colorbg4">
                                            <input class="is-checkradio has-background-color is-white" type="radio"
                                                id="score14" name="score1" value="2" <?php if($ck_datetoday_eva == 1){ if($eva1 == 2){ echo "checked";}} ?>>
                                            <label for="score14"></label>
                                        </td>
                                        <td class="colorbg5">
                                            <input class="is-checkradio has-background-color is-white" type="radio"
                                                id="score15" name="score1" value="1" <?php if($ck_datetoday_eva == 1){ if($eva1 == 1){ echo "checked";}} ?>>
                                            <label for="score15"></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td class="has-text-left" style="white-space:nowrap;">สามารถค้นหาหรือเข้าถึงข้อมูลที่ต้องการได้ง่าย</td>
                                        <td class="colorbg1">
                                            <input class="is-checkradio has-background-color is-white" type="radio"
                                                id="score21" name="score2" value="5" <?php if($ck_datetoday_eva == 1){ if($eva2 == 5){ echo "checked";}}else{ echo "checked";} ?>>
                                            <label for="score21"></label>
                                        </td>
                                        <td class="colorbg2">
                                            <input class="is-checkradio has-background-color is-white" type="radio"
                                                id="score22" name="score2" value="4" <?php if($ck_datetoday_eva == 1){ if($eva2 == 4){ echo "checked";}} ?>>
                                            <label for="score22"></label>
                                        </td>
                                        <td class="colorbg3">
                                            <input class="is-checkradio has-background-color is-white" type="radio"
                                                id="score23" name="score2" value="3" <?php if($ck_datetoday_eva == 1){ if($eva2 == 3){ echo "checked";}} ?>>
                                            <label for="score23"></label>
                                        </td>
                                        <td class="colorbg4">
                                            <input class="is-checkradio has-background-color is-white" type="radio"
                                                id="score24" name="score2" value="2" <?php if($ck_datetoday_eva == 1){ if($eva2 == 2){ echo "checked";}} ?>>
                                            <label for="score24"></label>
                                        </td>
                                        <td class="colorbg5">
                                            <input class="is-checkradio has-background-color is-white" type="radio"
                                                id="score25" name="score2" value="1" <?php if($ck_datetoday_eva == 1){ if($eva2 == 1){ echo "checked";}} ?>>
                                            <label for="score25"></label>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>3</td>
                                        <td class="has-text-left" style="white-space:nowrap;">
                                        ความหลากหลายของรูปแบบการรายงานข้อมูล
                                        </td>
                                        <td class="colorbg1">
                                            <div class="control">
                                                <input class="is-checkradio has-background-color is-white" type="radio"
                                                    id="score31" name="score3" value="5" <?php if($ck_datetoday_eva == 1){ if($eva3 == 5){ echo "checked";}}else{ echo "checked";} ?>>
                                                <label for="score31"></label>
                                            </div>
                                        </td>
                                        <td class="colorbg2">
                                            <input class="is-checkradio has-background-color is-white" type="radio"
                                                id="score32" name="score3" value="4" <?php if($ck_datetoday_eva == 1){ if($eva3 == 4){ echo "checked";}} ?>>
                                            <label for="score32"></label>
                                        </td>
                                        <td class="colorbg3">
                                            <input class="is-checkradio has-background-color is-white" type="radio"
                                                id="score33" name="score3" value="3" <?php if($ck_datetoday_eva == 1){ if($eva3 == 3){ echo "checked";}} ?>>
                                            <label for="score33"></label>
                                        </td>
                                        <td class="colorbg4">
                                            <input class="is-checkradio has-background-color is-white" type="radio"
                                                id="score34" name="score3" value="2" <?php if($ck_datetoday_eva == 1){ if($eva3 == 2){ echo "checked";}} ?>>
                                            <label for="score34"></label>
                                        </td>
                                        <td class="colorbg5">
                                            <input class="is-checkradio has-background-color is-white" type="radio"
                                                id="score35" name="score3" value="1" <?php if($ck_datetoday_eva == 1){ if($eva3 == 1){ echo "checked";}} ?>>
                                            <label for="score35"></label>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>4</td>
                                        <td class="has-text-left" style="white-space:nowrap;">
                                            ความรวดเร็วในการตอบสนองของระบบ
                                        </td>
                                        <td class="colorbg1">
                                            <div class="control">
                                                <input class="is-checkradio has-background-color is-white" type="radio"
                                                    id="score41" name="score4" value="5" <?php if($ck_datetoday_eva == 1){ if($eva4 == 5){ echo "checked";}}else{ echo "checked";} ?>>
                                                <label for="score41"></label>
                                            </div>
                                        </td>
                                        <td class="colorbg2">
                                            <input class="is-checkradio has-background-color is-white" type="radio"
                                                id="score42" name="score4" value="4" <?php if($ck_datetoday_eva == 1){ if($eva4 == 4){ echo "checked";}} ?>>
                                            <label for="score42"></label>
                                        </td>
                                        <td class="colorbg3">
                                            <input class="is-checkradio has-background-color is-white" type="radio"
                                                id="score43" name="score4" value="3" <?php if($ck_datetoday_eva == 1){ if($eva4 == 3){ echo "checked";}} ?>>
                                            <label for="score43"></label>
                                        </td>
                                        <td class="colorbg4">
                                            <input class="is-checkradio has-background-color is-white" type="radio"
                                                id="score44" name="score4" value="2" <?php if($ck_datetoday_eva == 1){ if($eva4 == 2){ echo "checked";}} ?>>
                                            <label for="score44"></label>
                                        </td>
                                        <td class="colorbg5">
                                            <input class="is-checkradio has-background-color is-white" type="radio"
                                                id="score45" name="score4" value="1" <?php if($ck_datetoday_eva == 1){ if($eva4 == 1){ echo "checked";}} ?>>
                                            <label for="score45"></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td class="has-text-left" style="white-space:nowrap;">
                                        สามารถนำข้อมูลการรายงานไปใช้ประโยชน์
                                        </td>
                                        <td class="colorbg1">
                                            <div class="control">
                                                <input class="is-checkradio has-background-color is-white" type="radio"
                                                    id="score51" name="score5" value="5" <?php if($ck_datetoday_eva == 1){ if($eva5 == 5){ echo "checked";}}else{ echo "checked";} ?>>
                                                <label for="score51"></label>
                                            </div>
                                        </td>
                                        <td class="colorbg2">
                                            <input class="is-checkradio has-background-color is-white" type="radio"
                                                id="score52" name="score5" value="4" <?php if($ck_datetoday_eva == 1){ if($eva5 == 4){ echo "checked";}} ?>>
                                            <label for="score52"></label>
                                        </td>
                                        <td class="colorbg3">
                                            <input class="is-checkradio has-background-color is-white" type="radio"
                                                id="score53" name="score5" value="3" <?php if($ck_datetoday_eva == 1){ if($eva5 == 3){ echo "checked";}} ?>>
                                            <label for="score53"></label>
                                        </td>
                                        <td class="colorbg4">
                                            <input class="is-checkradio has-background-color is-white" type="radio"
                                                id="score54" name="score5" value="2" <?php if($ck_datetoday_eva == 1){ if($eva5 == 2){ echo "checked";}} ?>>
                                            <label for="score54"></label>
                                        </td>
                                        <td class="colorbg5">
                                            <input class="is-checkradio has-background-color is-white" type="radio"
                                                id="score55" name="score5" value="1" <?php if($ck_datetoday_eva == 1){ if($eva5 == 1){ echo "checked";}} ?>>
                                            <label for="score55"></label>
                                        </td>
                                    </tr>

                                </tbody>

                            </table>
                        </div>

                        <div class="field has-text-left">
                            <label class="label p-3">ข้อเสนอแนะเพิ่มเติม (ถ้ามี)</label>
                            <div class="control">
                                <textarea id="s_comment" name="s_comment" class="textarea" rows="2"
                                    placeholder="กรอกรายละเอียด"></textarea>
                            </div>
                        </div>

                        <br>

                        <div class="p-4 mt-5">
                            <input class="is-checkradio is-info" id="ck_notshow" name="ck_notshow" type="checkbox" value="yes">
                            <label for="ck_notshow">ไม่แสดงหน้า popup ภายในวันนี้</label>
                        </div>

                    </section>
                    <footer class="modal-card-foot is-centered">


                    <div class=" has-text-centered mt-4">
                            <button type="button" class="button is-success modalclose" id="btn_officer_eva" > ส่งข้อมูล </button>
                        </div>

                    </footer>
                </form>
            </div>
        </div>
        <button class="modal-close modalclose"></button>
    </div>


    <script src="{{ asset('bulma/clipboard-1.7.1.min.js') }}"></script>
    <script src="{{ asset('bulma/main.js') }}"></script>
    {{--<script src="{{ asset('js/prov_list.js') }}"></script>--}}
    <script src="https://cdn.jsdelivr.net/npm/izitoast/dist/js/iziToast.min.js"></script>


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
        var modalDlg = document.querySelector('#modal_alert');

        if('<?php echo $show_eva; ?>' == 'yes'){
            //alert("ต้องประเมิน");
            modalDlg.classList.add('is-active');
        }else{
            //alert("ไม่ต้องประเมิน");
            //modalDlg.classList.add('is-active');
        }
    });

    

    </script>

    <script>          
    $("#btn_officer_eva").click(function(e){
        e.preventDefault();
        let form = $('#officer_eva')[0];
        let data = new FormData(form);

        
        $.ajax({
        url: "{{ route('officer.office_eva') }}",
        type: "POST",
        data : data,
        dataType:"JSON",
        processData : false,
        contentType:false,
        
        success: function(response) {

            if (response.errors) {
                var errorMsg = '';
                $.each(response.errors, function(field, errors) {
                    $.each(errors, function(index, error) {
                        errorMsg += error + '<br>';
                    });
                });
                iziToast.error({
                    message: errorMsg,
                    position: 'topRight'
                });
                
            } else {
            iziToast.success({
            message: response.success,
            position: 'topRight'
            
                    });
            }
                    
        },
        error: function(xhr, status, error) {
        
            iziToast.error({
                message: 'An error occurred: ' + error,
                position: 'topRight'
            });
        }
    
        });

        
        
        
    
    })
</script>
</body>

</html>