<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#ab3c3c" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300&display=swap" rel="stylesheet">
    <link href="{{ asset('bulma-0.9.0/css/bulma.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome5.0.6/css/fontawesome-all.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mystyles.css') }}" rel="stylesheet">

    <title> ปกป้อง (CRS) </title>

</head>

<body>
    <section class="hero is-primary wall3">
        <div class="hero-body">
            <div class="container">
                <div class="columns is-vcentered">
                    <div class="column">
                        <p class="title"> Crisis Response System (CRS) </p>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <div id="html2canvas" class="p-3 mb-3">
        <div class="container mt-5">
            <div class="has-text-centered mb-5">
                <p class="is-size-3">{{ trans('message.tx_thankyou') }}</p>
                <p>{{ trans('message.tx_thankyou2') }}</p>
                <p class="has-text-danger is-size-2"><i class="fas fa-exclamation-triangle">&nbsp;</i></p>
                <p class="has-text-danger is-size-4">{{ trans('message.tx_keep_id') }}</p>
            </div>
            <div class="box mb-5">
                <div class="notification is-primary has-text-centered is-light">
                    <h1>{{ trans('message.tx_id') }}</h1>
                    <h1 class="title has-text-danger"><b>{{ $case_id }}</b></h1>

                    <?php
                        

                        if($emergency == 1){
                            $emer_tx = '❗เคสเร่งด่วน❗';
                        }else{
                            $emer_tx = '';
                        }
                    
                        if ($case_id != ""){
                            //echo "text";

                            define("LINE_API","https://notify-api.line.me/api/notify");

                        $token = "GOmBagL47ZPiK6XiWKKQDUkoWE9QuF5zTIsTLDlqkf8";
                        $message = " $case_id $emer_tx เกิดเหตุร้องเรียน \nจังหวัด $provname->PROVINCE_NAME \nปัญหาที่แจ้ง : $problem_case_names_ss\n🌐 https://crs.ddc.moph.go.th"; //ข้อความที่ต้องการส่ง สูงสุด 1000 ตัวอักษร

                        $queryData = array("message" => $message);
                        $queryData = http_build_query($queryData,"","&");
                        $headerOptions = array(
                        "http"=>array(
                        "method"=>"POST",
                        "header"=> "Content-Type: application/x-www-form-urlencoded\r\n"
                        ."Authorization: Bearer ".$token."\r\n"
                        ."Content-Length: ".strlen($queryData)."\r\n",
                        "content" => $queryData
                        ),
                        );
                        $context = stream_context_create($headerOptions);
                        $result = file_get_contents(LINE_API,FALSE,$context);
                        $res = json_decode($result);
                        //return $res;
                        //}
                        }

                        
                    ?>
                </div>
            </div>

        </div>

    </div>

    <div class="tile is-ancestor">
        <div class="tile is-parent">
            <div class="tile is-child ">

                <div class="has-text-centered ">
                    @if(Auth::guard('officer')->check())
                    <a class="button is-danger button_addshadow" href="{{ route('officer.main') }}"><i
                            class="fa fa-home">&nbsp;</i>{{ trans('message.bt_cancle') }}</a>
                    @else
                    <a class="button is-danger button_addshadow" href="{{ route('guest_home') }}"><i
                            class="fa fa-home">&nbsp;</i>{{ trans('message.bt_cancle') }}</a>
                    @endif
                        &nbsp;&nbsp;&nbsp;
                    <button class="button is-primary button_addshadow" onclick="downloadByHtml2Canvas()"> <i class="fa fa-download">&nbsp;</i>&nbsp;บันทึกรหัสติดตาม</button>
                </div>

            </div>

            
        </div>
    </div>

    


    @extends('footer')


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>

    <script>
    function downloadByHtml2Canvas() {
        html2canvas(document.querySelector('#html2canvas')).then((canvas) => {
            const name = 'รหัสติดตาม ปกป้อง';
            let today = new Date();
            let dd = today.getDate();
            let mm = today.getMonth() + 1;
            let yyyy = today.getFullYear();
            if (dd < 10) {
                dd = '0' + dd;
            }
            if (mm < 10) {
                mm = '0' + mm;
            }
            today = yyyy + '-' + mm + '-' + dd;
            let img = canvas.toDataURL('image/png');
            downloadImage(img, `${name}_${today}`);
        });
    }

    function downloadImage(blob, fileName) {
        const fakeLink = window.document.createElement('a');
        fakeLink.style = 'display:none;';
        fakeLink.download = fileName;
        fakeLink.href = blob;
        document.body.appendChild(fakeLink);
        fakeLink.click();
        document.body.removeChild(fakeLink);
        fakeLink.remove();
    }
    </script>

</body>

</html>