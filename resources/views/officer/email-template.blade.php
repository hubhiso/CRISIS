<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <style>
    * {
        box-sizing: border-box;
    }

    th.column {
        padding: 0
    }

    a[x-apple-data-detectors] {
        color: inherit !important;
        text-decoration: inherit !important;
    }

    #MessageViewBody a {
        color: inherit;
        text-decoration: none;
    }

    p {
        line-height: inherit
    }

    @media (max-width:620px) {
        .icons-inner {
            text-align: center;
        }

        .icons-inner td {
            margin: 0 auto;
        }

        .row-content {
            width: 100% !important;
        }

        .image_block img.big {
            width: auto !important;
        }

        .stack .column {
            width: 100%;
            display: block;
        }
    }
    </style>
</head>

<body style="background-color: #eeeeee; margin: 0; padding: 0; -webkit-text-size-adjust: none; text-size-adjust: none;">
    
<table border="0" cellpadding="0" cellspacing="0" class="nl-container" role="presentation"
        style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #eeeeee;" width="100%">
        <tbody>
            <tr>
                <td>
                    <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-2"
                        role="presentation"
                        style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #eeeeee; background-image: url('images/body_background_2.png'); background-position: top center; background-repeat: repeat;"
                        width="100%">
                        <tbody>
                            <tr>
                                <td>
                                    <br>
                                    <br>
                                    <table align="center" border="0" cellpadding="0" cellspacing="0"
                                        class="row-content stack" role="presentation"
                                        style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #fff; border-radius: 15px;" width="800">
                                        <tbody>
                                            <tr>
                                                <th class="column"
                                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-left: 50px; padding-right: 50px; padding-top: 15px; padding-bottom: 15px;"
                                                    width="100%">
                                                    <table border="0" cellpadding="10" cellspacing="0"
                                                        class="text_block" role="presentation"
                                                        style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;"
                                                        width="100%">
                                                        <tr>
                                                            <td>
                                                                <div style="font-family: sans-serif">
                                                                    <div
                                                                        style="font-size: 14px; color: #ec5075; line-height: 1.2; font-family: Helvetica Neue, Helvetica, Arial, sans-serif;">
                                                                        <p style="margin: 0; font-size: 14px;">
                                                                            <strong><span
                                                                                    style="font-size:28px;">แจ้งเตือนการไม่ได้เข้าสู่ระบบ</span></strong>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <table border="0" cellpadding="10" cellspacing="0"
                                                        class="text_block" role="presentation"
                                                        style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;"
                                                        width="100%">
                                                        <tr>
                                                            <td>
                                                                <div style="font-family: sans-serif">
                                                                    <div
                                                                        style="font-size: 14px; color: #40507a; line-height: 1.2; font-family: Helvetica Neue, Helvetica, Arial, sans-serif;">

                                                                        @if (session('resent'))
                                                                        <div class="alert alert-success" role="alert">
                                                                            {{ __('A fresh mail has been sent to your email address.') }}
                                                                        </div>
                                                                        @endif
                                                                         <!--{!! $content !!}-->

                                                                        <p>
                                                                            Username ของ Email {!! $email !!}
                                                                            นี้ไม่ได้เข้าใช้ระบบ ปกป้อง (CRS)
                                                                            เป็นเวลานาน 
                                                                            <br><br>
                                                                            หากยังไม่ได้มีเข้าใช้งาน  
                                                                            <strong style="color: #ec5075;">นับจากที่ได้ Email ฉบับนี้ ภายในเวลา 7 วัน</strong>
                                                                            ทางทีมผู้ดูแลระบบ ขออนุญาตปิดการเข้าใช้งานระบบ
                                                                            ของ Email ดังกล่าวนี้

                                                                            <br><br>

                                                                            สามารถเข้าใช้งานได้โดยการคลิก Link
                                                                            ด้านล่างนี้
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                        class="button_block" role="presentation"
                                                        style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                                        width="100%">
                                                        <tr>
                                                            <td
                                                                style="padding-bottom:20px;padding-left:10px;padding-right:10px;padding-top:20px;text-align:center;">
                                                                <div align="center">
                                                                    <!--[if mso]><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="http://www.example.com/" style="height:48px;width:143px;v-text-anchor:middle;" arcsize="34%" stroke="false" fillcolor="#ec5075"><w:anchorlock/><v:textbox inset="5px,0px,0px,0px"><center style="color:#ffffff; font-family:Arial, sans-serif; font-size:15px"><![endif]--><a
                                                                        href="https://crs.ddc.moph.go.th/"
                                                                        style="text-decoration:none;display:inline-block;color:#ffffff;background-color:#ec5075;border-radius:16px;width:auto;border-top:0px solid TRANSPARENT;border-right:0px solid TRANSPARENT;border-bottom:0px solid TRANSPARENT;border-left:0px solid TRANSPARENT;padding-top:8px;padding-bottom:8px;font-family:Helvetica Neue, Helvetica, Arial, sans-serif;text-align:center;mso-border-alt:none;word-break:keep-all;"
                                                                        target="_blank"><span
                                                                            style="padding-left:15px;padding-right:15px;font-size:15px;display:inline-block;letter-spacing:normal;"><span
                                                                                style="font-size: 16px; line-height: 2; word-break: break-word; mso-line-height-alt: 32px;"><span
                                                                                    data-mce-style="font-size: 15px; line-height: 30px;"
                                                                                    style="font-size: 15px; line-height: 30px;">
                                                                                    <strong>
                                                                                        เข้าสู่ระบบปกป้อง (CRS)
                                                                                    </strong>
                                                                                </span></span></span></a>
                                                                    <!--[if mso]></center></v:textbox></v:roundrect><![endif]-->
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </th>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <br>
                                    <br>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table><!-- End -->
</body>

</html>