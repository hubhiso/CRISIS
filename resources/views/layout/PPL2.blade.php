<section class="hero is-medium has-background-light wall4">

    <div class="hero-head">
        <div class="navbar">
            <div class="navbar-end has-text-right">
                <div class="navbar-item">

                    <a class=" button is-danger  is-inverted is-rounded is-small  " href="{{ route('register') }}"
                        target="_blank">
                        {{ trans('message.tx_user_regis') }}&nbsp; <span class="fa-stack fa-1x">
                            <i class="fa fa-circle fa-stack-2x"></i>
                            <i class="fas fa-user-plus fa-stack-1x fa-inverse"></i>

                        </span>
                    </a>

                    &nbsp;

                    <a class=" button is-danger is-inverted is-rounded is-small  " href="{{ 'officer' }}">
                        {{ trans('message.bt_admin') }}&nbsp; <span class="fa-stack fa-1x">
                            <i class="fa fa-circle fa-stack-2x"></i>
                            <i class="fa fa-lock fa-stack-1x fa-inverse"></i>
                        </span>
                    </a>

                    &nbsp;

                    @if(Config::get('app.locale') == 'en')

                    <a class="button is-danger is-inverted is-rounded is-small" href="{{ URL::to('change/th') }}">Thai
                        Site&nbsp;
                        <span class="fa-stack fa-1x">
                            <i class="fa fa-circle fa-stack-2x"></i>
                            <i class="fa fa-flag fa-stack-1x fa-inverse"></i>
                        </span>
                    </a>

                    @elseif(Config::get('app.locale') == 'th')

                    <a class="button is-danger is-inverted is-rounded is-small"
                        href="{{ URL::to('change/en') }}">English
                        Site&nbsp;
                        <span class="fa-stack fa-1x">
                            <i class="fa fa-circle fa-stack-2x"></i>
                            <i class="fa fa-flag fa-stack-1x fa-inverse"></i>
                        </span>
                    </a>

                    @endif

                </div>
            </div>
        </div>
    </div>

    <div class="columns">
        <div class="column is-6 ">
        </div>
        <div class="column is-6 ">
            <div class="columns is-mobile is-tablet is-desktop">
                <div class="column is-1">
                </div>
                <div class="column " style="  padding: 20px;">
                    <div class="columns is-mobile is-tablet is-desktop has-background-white"
                        style="border-radius: 5px; max-height: 80px;">
                        <div class="column is-2">
                            <img class="image  " style="max-height: 70px;" src="images/logoPPL/l-h1.png" alt="">
                        </div>
                        <div class="column is-3 border">
                            <img class="image  " style="max-height: 70px; border-radius: 10px;"
                                src="images/logoPPL/logo_fair-2.png" alt="">
                        </div>
                        <div class="column is-3">
                            <img class="image  " src="images/logoPPL/l-h3-2.png" alt="">
                        </div>
                        <div class="column is-3">
                            <img class="image  " src="images/logoPPL/l-h4-2.png" alt="">
                        </div>

                    </div>
                    <div class="columns is-mobile is-tablet is-desktop has-background-white"
                        style="border-radius: 5px; max-height: 80px; ">
                        <div class="column ">
                            <img class="image " style="max-height: 50px;" src="images/logoPPL/l-i1.png" alt="">
                        </div>
                        <div class="column ">
                            <img class="image " style="max-height: 50px;" src="images/logoPPL/l-i2.png" alt="">
                        </div>
                        <div class="column ">
                            <img class="image " style="max-height: 45px;" src="images/logoPPL/l-i3.png" alt="">
                        </div>
                        <div class="column ">
                            <img class="image " style="max-height: 50px;" src="images/logoPPL/l-i4.png" alt="">
                        </div>
                        <div class="column is-2">
                            <img class="image " src="images/logoPPL/l-i5-2.png" alt="">
                        </div>
                        <div class="column is-2">
                            <img class="image " src="images/logoPPL/l-i6-2.png" alt="">
                        </div>
                        <div class="column is-2">
                            <img class="image " style=" border-radius: 10px;" src="images/logoPPL/l-i7-2.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="column is-1">
                </div>
            </div>
        </div>
    </div>

    <br>

    <div class="columns">
        <div class="column is-6 wall5 " style="height: 270px;">
        </div>
        <div class="column is-6 ">
            <div class="columns is-mobile is-tablet is-desktop">
                <div class="column is-1">
                </div>
                <div class="column has-text-centered">
                    <div class="columns is-mobile is-tablet is-desktop ">
                        <div class="column">
                            <div name="action" class="">

                                <h1 id="bulma" class="title"> Crisis Response System (CRS) </h1>
                                <h1 id="bulma" class="title"> <span
                                        style="color: #e5087a;">"{{ trans('message.txt_hello') }}"</span> </h1>

                                <p id="modern-framework" class="subtitle is-size-6 my-2">
                                    {{ trans('message.txt_intro') }}</p>
                                <a id="btn_new1" class="button is-size-4" onclick="show_modal2()" href="#">
                                    {{ trans('message.bt_inputcase') }}
                                </a>
                                <br><br>
                                <p> {{ trans('message.txt_status') }} </p><br>
                                <a class="button is-danger  is-rounded button_addshadow" href="{{ 'status' }}"> <i
                                        class="fa fa-search"
                                        aria-hidden="true"></i>&nbsp;{{ trans('message.bt_status') }} </a>
                                <!--a class="button is-danger  is-rounded" href="../php/dashboard_public.php" target="_blank"> <i class="fa fa-chart-bar"
                                        aria-hidden="true"></i>&nbsp;{{ trans('message.bt_report_public') }} </a-->
                            </div>
                        </div>

                    </div>
                </div>
                <div class="column is-1">
                </div>
            </div>



            <div name="detail" class=" has-text-left " style="  padding: 20px;">
                <div class=" div-detail ">
                    <img class="img_detail" style="vertical-align:middle" src="images/circle_x50.png">
                    <span><b>ถูกบังคับตรวจเอชไอวี</b></span>
                </div>
                <div class=" div-detail ">
                    <img class="img_detail" style="vertical-align:middle" src="images/circle_x50.png">
                    <span><b>ถูกเปิดเผยสถานะการติดเชื้อเอชไอวี</b></span>
                </div>
                <div class=" div-detail ">
                    <img class="img_detail" style="vertical-align:middle" src="images/circle_x50.png">
                    <span><b>ถูกกีดกันหรือเลือกปฏิบัติ เนื่องมาจากการติดเชื้อเอชไอวี</b></span>
                </div>
                <div class=" div-detail ">
                    <img class="img_detail" style="vertical-align:middle" src="images/circle_x50.png">
                    <span><b>ถูกกีดกันหรือเลือกปฏิบัติ เนื่องมาจากเป็นกลุ่มเปราะบาง</b></span>
                </div>
                <p class="is-size-7	" style="padding: 10px;"><b>*กลุ่มเปราะบาง</b> ได้แก่ กลุ่มหลากหลายทางเพศ,
                    พนักงานบริการ, ผู้ใช้สารเสพติด, ประชากรข้ามชาติ, ผู้ถูกคุมขัง, กลุ่มชาติพันธุ์และชนเผ่า</p>
                <p class="has-text-centered is-size-5	">พบเจอสถานการณ์เหล่านี้ติดต่อ <span
                        style="color: #e5087a;"><b>"ปกป้อง"</b></span> ได้ทันที</p>
            </div>
            <br>
        </div>

    </div>

</section>

<div class="container  has-text-centered">
    <div class="columns is-centered mt-5">
        <div class="column is-narrow">
            <a class="" href="{{ 'resource' }}" target="_blank"> <img class="image is-128x128  box p-3"
                    src="images/seo.png"> </a>
        </div>
    </div>
    <div class="columns is-centered  mb-5">
        <div class="column is-narrow">
            <h1 class="title"> {{ trans('message.tx_h_knowledge') }} </h1>
            <h2 class="subtitle">{{ trans('message.tx_sh_knowledge') }}</h2>
        </div>
    </div>
    <div class="columns">
        <div class="column is-two-thirds">
            <article class="tile is-child box">
                <a href="contents/Crisis.pdf"><img src="images/Crisis-cover.png"></a>
            </article>
        </div>
        <div class="column">
            <article class="tile is-child box">
                <a href="contents/guide/คู่มือแนวทางการจัดการรับเรื่องร้องเรียน.pdf"><img
                        src="contents/cover2-คู่มือแนวทางการจัดการรับเรื่องร้องเรียน.png" height="360"></a>
            </article>
        </div>
    </div>

    <div class="tile is-ancestor">

        <div class="tile is-parent">
            <article class="tile is-child box">
                <a href="http://www.buddystation.org/">
                    <h4 class="subtitle is-4 	">"การกระทำที่ถือเป็นการละเมิดสิทธิ"</h4>
                    <p>Buddy Station กรมควบคุมโรค<br> กระทรวงสาธารณสุข</p>
                </a>
            </article>
        </div>

        <div class="tile is-parent">
            <article class="tile is-child box">
                <a href="https://www.amnesty.or.th/latest/blog/62/">
                    <h4 class="subtitle is-4 	">"สิทธิมนุษยชน"</h4>
                    <p>แอมเนสตี้ อินเตอร์เนชั่นแนล (ประเทศไทย)<br> AMNESTY INTERNATIONAL THAILAND</p>
                </a>
            </article>
        </div>
        <div class="tile is-parent">
            <article class="tile is-child box">
                <a href="http://fairthailand.org/">
                    <h4 class="subtitle is-4 ">"กรณีศึกษาที่น่าสนใจเกี่ยวกับกรณีการละเมิดสิทธิ"</h4>
                    <p>มูลนิธิเพื่อสิทธิความหลากหลาย (FAIR)</p>
                </a>
            </article>
        </div>
        <div class="tile is-parent">
            <article class="tile is-child box">
                <a
                    href="http://www.pcd.go.th/info_serv/file/%E0%B8%9E%E0%B8%A3%E0%B8%B0%E0%B8%A3%E0%B8%B2%E0%B8%8A%E0%B8%9A%E0%B8%B1%E0%B8%8D%E0%B8%8D%E0%B8%B1%E0%B8%95%E0%B8%B4%20%E0%B8%84%E0%B8%A7%E0%B8%B2%E0%B8%A1%E0%B9%80%E0%B8%97%E0%B9%88%E0%B8%B2%E0%B9%80%E0%B8%97%E0%B8%B5%E0%B8%A2%E0%B8%A1%E0%B8%A3%E0%B8%B0%E0%B8%AB%E0%B8%A7%E0%B9%88%E0%B8%B2%E0%B8%87%E0%B9%80%E0%B8%9E%E0%B8%A8%20%E0%B8%9E.%E0%B8%A8.%202558%20(%E0%B8%89%E0%B8%9A%E0%B8%B1%E0%B8%9A%E0%B8%9B%E0%B8%A3%E0%B8%B0%E0%B8%8A%E0%B8%B2%E0%B8%8A%E0%B8%99).pdf">
                    <h4 class="subtitle is-4 ">"พระราชบัญญัติความเท่าเทียมระหว่างเพศ<br> พ.ศ. 2558 ฉบับประชาชน" </h4>
                    <p>กรมกิจการสตรี และสถาบันครอบครัว</p>
                </a>
            </article>
        </div>

    </div>

    <div class="tile is-ancestor">

        <div class="tile is-parent">
            <article class="tile is-child box">
                <a href="http://www.whaf.or.th/media">
                    <h4 class="subtitle is-4 ">"เพศวิถี"</h4>
                    <p>มูลนิธิสร้างความเข้าใจ <br>เรื่องสุขภาพผู้หญิง</p>
                </a>
            </article>
        </div>

        <div class="tile is-parent">
            <article class="tile is-child box">
                <a href="https://facebook.com/pg/gfpthailand/photos/?tab=album&album_id=1076061572509713">
                    <h4 class="subtitle is-4 ">"สามสัมพันธ์ ห้าภูมิคุ้มกัน <br>สร้างสรรค์สมดุลให้ครอบครัว"</h4>
                    <p>ศูนย์ประสานงานด้าน<br>ความเสมอภาคระหว่างหญิงชาย <br>Gender Focal Point Thailand</p>
                </a>
            </article>
        </div>
        <div class="tile is-parent">
            <article class="tile is-child box">
                <a href="http://forsogi.org/">
                    <h4 class="subtitle is-4 ">"สิทธิมนุษยชนในการสร้างครอบครัว"</h4>
                    <p>มูลนิธิเพื่อสิทธิและความเป็นธรรมทางเพศ <br>(Fundation For SOGI Rights and Justice)</p>
                </a>
            </article>
        </div>
        <div class="tile is-parent">
            <article class="tile is-child box">
                <a href="https://www.thaihealthreport.com/">
                    <h4 class="subtitle is-4 ">"รายงานสุขภาพคนไทย"</h4>
                    <p>สถาบันวิจัยประชากรและสังคม <br>มหาวิทยาลัยมหิดล</p>
                </a>
            </article>
        </div>

    </div>


    <br>


</div>

<section class="hero is-white has-text-centered">
    <div class="hero-body">
        <div class="container">
            <figure class="image is-128x128 container">
                <img src="images/place.png">
            </figure>
            <br>
            <h1 class="title">
                {{ trans('message.tx_h_table') }}
            </h1>
            <h2 class="subtitle">
                {{ trans('message.tx_sh_table') }}
            </h2>
            <a class="button is-primary  is-rounded is-danger button_addshadow" href="{{ 'orgmap' }}" target="_blank">
                <i class="fas fa-thumbtack"></i>&nbsp; {{ trans('message.bt_map') }} </a>
            <br><br>
            <div class="panel table-container">

                <table class="table  is-striped is-hoverable">
                    <thead>
                        <tr>
                            <th class="has-text-danger">{{ trans('message.tx_agency_name') }}</th>
                            <th class="has-text-danger">{{ trans('message.tx_province') }}</th>
                            <th class="has-text-danger">{{ trans('message.tx_address') }}</th>
                            <th class="has-text-danger">{{ trans('message.tx_location') }}</th>
                            <th class="has-text-danger" style=" white-space:nowrap;">{{ trans('message.tx_contact') }}
                            </th>
                            <th class="has-text-danger has-text-centered">{{ trans('message.tx_website') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>{{ trans('message.tx_rsat') }}</th>
                            <td class="has-text-left">{{ trans('message.tx_bkk') }}</td>
                            <td class="has-text-left">{{ trans('message.tx_rsat_add_bkk') }}</td>
                            <td class="has-text-left"><a class='tag is-medium is-rounded color1 button_addshadow'
                                    href="https://goo.gl/maps/w8muJ6eguspFFtWf9"
                                    target="_blank">{{ trans('message.bt_map') }}</a></td>
                            <td class="has-text-centered"><a
                                    class='tag is-medium btn_facebook is-rounded button_addshadow'
                                    href="https://www.facebook.com/rsat.info" target="_blank"><i
                                        class="fab fa-facebook-f">&nbsp;</i></a></td>
                            <td class="has-text-left"><a href="http://www.rsat.info"
                                    target="_blank">http://www.rsat.info</a></td>
                        </tr>
                        <tr>
                            <th>{{ trans('message.tx_tnp_plus') }}</th>
                            <td class="has-text-left">{{ trans('message.tx_bkk') }}</td>
                            <td class="has-text-left">{{ trans('message.tx_tnp_add_bkk') }}</td>
                            <td class="has-text-left"><a class='tag is-medium color1 is-rounded button_addshadow'
                                    href="https://goo.gl/maps/iEnbqA2m4voWK6Hk7"
                                    target="_blank">{{ trans('message.bt_map') }}</a></td>
                            <td class="has-text-centered"><a
                                    class='tag is-medium btn_facebook is-rounded button_addshadow'
                                    href="https://www.facebook.com/TNPplus" target="_blank"><i
                                        class="fab fa-facebook-f">&nbsp;</i></a></td>
                            <td class="has-text-left"><a href="https://thaiplus.net"
                                    target="_blank">https://thaiplus.net</a></td>
                        </tr>
                        <tr>
                            <th>{{ trans('message.tx_far') }}</th>
                            <td class="has-text-left">{{ trans('message.tx_bkk') }}</td>
                            <td class="has-text-left">{{ trans('message.tx_far_add_bkk') }}</td>
                            <td class="has-text-left"><a class='tag is-medium color1 is-rounded button_addshadow'
                                    href="https://goo.gl/maps/YbqZjooMDQ3oohMU9"
                                    target="_blank">{{ trans('message.bt_map') }}</a></td>
                            <td class="has-text-centered"><a
                                    class='tag is-medium btn_facebook is-rounded button_addshadow'
                                    href="https://www.facebook.com/people/%E0%B8%A1%E0%B8%B9%E0%B8%A5%E0%B8%99%E0%B8%B4%E0%B8%98%E0%B8%B4%E0%B9%80%E0%B8%9E%E0%B8%B7%E0%B9%88%E0%B8%AD%E0%B8%AA%E0%B8%B4%E0%B8%97%E0%B8%98%E0%B8%B4%E0%B8%84%E0%B8%A7%E0%B8%B2%E0%B8%A1%E0%B8%AB%E0%B8%A5%E0%B8%B2%E0%B8%81%E0%B8%AB%E0%B8%A5%E0%B8%B2%E0%B8%A2-FAIR/61557330737859/" target="_blank"><i
                                        class="fab fa-facebook-f">&nbsp;</i></a></td>
                            <td class="has-text-left"><a href="http://fairthailand.org/"
                                    target="_blank">http://fairthailand.org/</a></td>
                        </tr>
                        <tr>
                            <th>{{ trans('message.tx_swing_silom') }}</th>
                            <td class="has-text-left">{{ trans('message.tx_bkk') }}</td>
                            <td class="has-text-left">{{ trans('message.tx_swing_silom_add') }}</td>
                            <td class="has-text-left"><a class='tag is-medium color1 is-rounded button_addshadow'
                                    href="https://goo.gl/maps/pbvGNNrEykZ3pn4m8"
                                    target="_blank">{{ trans('message.bt_map') }}</a></td>
                            <td class="has-text-centered"><a
                                    class='tag is-medium btn_facebook is-rounded button_addshadow'
                                    href="https://www.facebook.com/SWINGThailandTH" target="_blank"><i
                                        class="fab fa-facebook-f">&nbsp;</i></a></td>
                            <td class="has-text-left"><a href="https://www.swingthailand.org"
                                    target="_blank">https://www.swingthailand.org</a></td>
                        </tr>
                        <tr>
                            <th>{{ trans('message.tx_swing_saphankhwa') }}</th>
                            <td class="has-text-left">{{ trans('message.tx_bkk') }}</td>
                            <td class="has-text-left">{{ trans('message.tx_swing_saphankhwa_add') }}</td>
                            <td class="has-text-left"><a class='tag is-medium color1 is-rounded button_addshadow'
                                    href="https://goo.gl/maps/LPsHRc3TroaNdEry8"
                                    target="_blank">{{ trans('message.bt_map') }}</a></td>
                            <td class="has-text-centered"><a
                                    class='tag is-medium btn_facebook is-rounded button_addshadow'
                                    href="https://www.facebook.com/SWINGThailandTH" target="_blank"><i
                                        class="fab fa-facebook-f">&nbsp;</i></a></td>
                            <td class="has-text-left"><a href="https://www.swingthailand.org"
                                    target="_blank">https://www.swingthailand.org</a></td>
                        </tr>
                        <tr>
                            <th>{{ trans('message.tx_swing_pattaya') }}</th>
                            <td class="has-text-left">{{ trans('message.tx_chonburi') }}</td>
                            <td class="has-text-left">{{ trans('message.tx_swing_pattaya_add') }}</td>
                            <td class="has-text-left"><a class='tag is-medium color1 is-rounded button_addshadow'
                                    href="https://goo.gl/maps/ERF2dMkxUPHvUnhh9"
                                    target="_blank">{{ trans('message.bt_map') }}</a></td>
                            <td class="has-text-centered"><a
                                    class='tag is-medium btn_facebook is-rounded button_addshadow'
                                    href="https://www.facebook.com/SWINGThailandTH" target="_blank"><i
                                        class="fab fa-facebook-f">&nbsp;</i></a></td>
                            <td class="has-text-left"><a href="https://www.swingthailand.org"
                                    target="_blank">https://www.swingthailand.org</a></td>
                        </tr>
                        <tr>
                            <th>{{ trans('message.tx_rsat') }}</th>
                            <td class="has-text-left">{{ trans('message.tx_chonburi') }}</td>
                            <td class="has-text-left">{{ trans('message.tx_rsat_add_chon') }}</td>
                            <td class="has-text-left"><a class='tag is-medium color1 is-rounded button_addshadow'
                                    href="https://goo.gl/maps/omvoYzEqLwDbhaH27"
                                    target="_blank">{{ trans('message.bt_map') }}</a></td>
                            <td class="has-text-centered"><a
                                    class='tag is-medium btn_facebook is-rounded button_addshadow'
                                    href="https://www.facebook.com/rsat.info" target="_blank"><i
                                        class="fab fa-facebook-f">&nbsp;</i></a></td>
                            <td class="has-text-left"><a href="http://www.rsat.info"
                                    target="_blank">http://www.rsat.info</a></td>
                        </tr>
                        <tr>
                            <th>{{ trans('message.tx_rtf') }}</th>
                            <td class="has-text-left">{{ trans('message.tx_chonburi') }}</td>
                            <td class="has-text-left">{{ trans('message.tx_rtf_add_chon') }}</td>
                            <td class="has-text-left"><a class='tag is-medium color1 is-rounded button_addshadow'
                                    href="https://goo.gl/maps/TX221Jyo55Jy4ffN8"
                                    target="_blank">{{ trans('message.bt_map') }}</a></td>
                            <td class="has-text-centered"><a
                                    class='tag is-medium btn_facebook is-rounded button_addshadow'
                                    href="https://www.facebook.com/raksthaifoundation" target="_blank"><i
                                        class="fab fa-facebook-f">&nbsp;</i></a></td>
                            <td class="has-text-left"><a href="https://www.raksthai.org"
                                    target="_blank">https://www.raksthai.org</a></td>
                        </tr>
                        <tr>
                            <th>{{ trans('message.tx_hon') }}</th>
                            <td class="has-text-left">{{ trans('message.tx_chonburi') }}</td>
                            <td class="has-text-left">{{ trans('message.tx_hon_add_chon') }}</td>
                            <td>-</td>
                            <td class="has-text-centered"><a
                                    class='tag is-medium btn_facebook is-rounded button_addshadow'
                                    href="https://www.facebook.com/hon.house/" target="_blank"><i
                                        class="fab fa-facebook-f">&nbsp;</i></a></td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <th>{{ trans('message.tx_nam_kwan_sirung') }}</th>
                            <td class="has-text-left">{{ trans('message.tx_phayao') }}</td>
                            <td class="has-text-left">{{ trans('message.tx_nam_kwan_sirung_add_phayao') }}</td>
                            <td class="has-text-left"><a class='tag is-medium color1 is-rounded button_addshadow'
                                    href="https://goo.gl/maps/5Q6KgTCYS17GYiUW8"
                                    target="_blank">{{ trans('message.bt_map') }}</a></td>
                            <td class="has-text-centered"><a
                                    class='tag is-medium btn_facebook is-rounded button_addshadow'
                                    href="https://www.facebook.com/profile.php?id=100087218064343" target="_blank"><i
                                        class="fab fa-facebook-f">&nbsp;</i></a></td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <th>{{ trans('message.tx_rtf') }}</th>
                            <td class="has-text-left">{{ trans('message.tx_cnx') }}</td>
                            <td class="has-text-left">{{ trans('message.tx_rtf_add_cgm') }}</td>
                            <td class="has-text-left"><a class='tag is-medium color1 is-rounded button_addshadow'
                                    href="https://goo.gl/maps/fZP2nQWbAqqcGfZ89"
                                    target="_blank">{{ trans('message.bt_map') }}</a></td>
                            <td class="has-text-centered"><a
                                    class='tag is-medium btn_facebook is-rounded button_addshadow'
                                    href="https://www.facebook.com/raksthaifoundation" target="_blank"><i
                                        class="fab fa-facebook-f">&nbsp;</i></a></td>
                            <td class="has-text-left"><a href="https://www.raksthai.org">https://www.raksthai.org</a>
                            </td>
                        </tr>
                        <tr>
                            <th>{{ trans('message.tx_rtf') }}</th>
                            <td class="has-text-left">{{ trans('message.tx_trat') }}</td>
                            <td class="has-text-left">{{ trans('message.tx_rtf_add_trat') }}</td>
                            <td class="has-text-left"><a class='tag is-medium color1 is-rounded button_addshadow'
                                    href="https://goo.gl/maps/1s4w2AXo4HnrTP8U6"
                                    target="_blank">{{ trans('message.bt_map') }}</a></td>
                            <td class="has-text-centered"><a
                                    class='tag is-medium btn_facebook is-rounded button_addshadow'
                                    href="https://www.facebook.com/raksthaifoundation" target="_blank"><i
                                        class="fab fa-facebook-f">&nbsp;</i></a></td>
                            <td class="has-text-left"><a href="https://www.raksthai.org"
                                    target="_blank">https://www.raksthai.org</a></td>
                        </tr>
                        <tr>
                            <th>{{ trans('message.tx_rtf') }}</th>
                            <td class="has-text-left">{{ trans('message.tx_nakhonpathom') }}</td>
                            <td class="has-text-left">{{ trans('message.tx_rtf_add_nakornpathom') }}</td>
                            <td class="has-text-left"><a class='tag is-medium color1 is-rounded button_addshadow'
                                    href="https://goo.gl/maps/5pNQTEsw1jwbHNtb8"
                                    target="_blank">{{ trans('message.bt_map') }}</a></td>
                            <td class="has-text-centered"><a
                                    class='tag is-medium btn_facebook is-rounded button_addshadow'
                                    href="https://www.facebook.com/raksthaifoundation" target="_blank"><i
                                        class="fab fa-facebook-f">&nbsp;</i></a></td>
                            <td class="has-text-left"><a href="https://www.raksthai.org"
                                    target="_blank">https://www.raksthai.org</a></td>
                        </tr>
                        <tr>
                            <th>{{ trans('message.tx_rtf') }}</th>
                            <td class="has-text-left">{{ trans('message.tx_nakhon_si') }}</td>
                            <td class="has-text-left">{{ trans('message.tx_rtf_add_nakornsri') }}</td>
                            <td class="has-text-left"><a class='tag is-medium color1 is-rounded button_addshadow'
                                    href="https://goo.gl/maps/84qovGq28ZB4ymxV6"
                                    target="_blank">{{ trans('message.bt_map') }}</a></td>
                            <td class="has-text-centered"><a
                                    class='tag is-medium btn_facebook is-rounded button_addshadow'
                                    href="https://www.facebook.com/raksthaifoundation" target="_blank"><i
                                        class="fab fa-facebook-f">&nbsp;</i></a></td>
                            <td class="has-text-left"><a href="https://www.raksthai.org"
                                    target="_blank"></a>https://www.raksthai.org</td>
                        </tr>
                        <tr>
                            <th>{{ trans('message.tx_rtf') }}</th>
                            <td class="has-text-left">{{ trans('message.tx_rayong') }}</td>
                            <td class="has-text-left">{{ trans('message.tx_rtf_add_rayong') }}</td>
                            <td class="has-text-left"><a class='tag is-medium color1 is-rounded button_addshadow'
                                    href="https://goo.gl/maps/U8eDGmoifbdtotZg8"
                                    target="_blank">{{ trans('message.bt_map') }}</a></td>
                            <td class="has-text-centered"><a
                                    class='tag is-medium btn_facebook is-rounded button_addshadow'
                                    href="https://www.facebook.com/raksthaifoundation" target="_blank"><i
                                        class="fab fa-facebook-f">&nbsp;</i></a></td>
                            <td class="has-text-left"><a href="https://www.raksthai.org"
                                    target="_blank">https://www.raksthai.org</a></td>
                        </tr>
                        <tr>
                            <th>{{ trans('message.tx_far') }}</th>
                            <td class="has-text-left">{{ trans('message.tx_rayong') }}</td>
                            <td class="has-text-left">{{ trans('message.tx_far_add_rayong') }}</td>
                            <td class="has-text-left"><a class='tag is-medium color1 is-rounded button_addshadow'
                                    href="https://goo.gl/maps/tkRxH77i196Y3kNW7"
                                    target="_blank">{{ trans('message.bt_map') }}</a></td>
                            <td class="has-text-centered"><a
                                    class='tag is-medium btn_facebook is-rounded button_addshadow'
                                    href="https://www.facebook.com/foundationforaidsrights" target="_blank"><i
                                        class="fab fa-facebook-f">&nbsp;</i></a></td>
                            <td class="has-text-left"><a href="https://www.aidsrightsthailand.com"
                                    target="_blank">https://www.aidsrightsthailand.com</a></td>
                        </tr>
                        <tr>
                            <th>{{ trans('message.tx_rsat') }}</th>
                            <td class="has-text-left">{{ trans('message.tx_songkhla') }}</td>
                            <td class="has-text-left">{{ trans('message.tx_rsat_add_songkra') }}</td>
                            <td class="has-text-left"><a class='tag is-medium color1 is-rounded button_addshadow'
                                    href="https://goo.gl/maps/eBZo4jGYRbAFqesA9"
                                    target="_blank">{{ trans('message.bt_map') }}</a></td>
                            <td class="has-text-centered"><a
                                    class='tag is-medium btn_facebook is-rounded button_addshadow'
                                    href="https://www.facebook.com/rsat.info" target="_blank"><i
                                        class="fab fa-facebook-f">&nbsp;</i></a></td>
                            <td class="has-text-left"><a href="http://www.rsat.info"
                                    target="_blank">http://www.rsat.info</a></td>
                        </tr>
                        <tr>
                            <th>{{ trans('message.tx_stm') }}</th>
                            <td class="has-text-left">{{ trans('message.tx_songkhla') }}</td>
                            <td class="has-text-left">{{ trans('message.tx_stm_add_songkra') }}</td>
                            <td class="has-text-left"><a class='tag is-medium color1 is-rounded button_addshadow'
                                    href="https://goo.gl/maps/Smpyf3sFBcY923856"
                                    target="_blank">{{ trans('message.bt_map') }}</a></td>
                            <td class="has-text-centered"><a
                                    class='tag is-medium btn_facebook is-rounded button_addshadow'
                                    href="https://www.facebook.com/profile.php?id=100064430270367&ref"
                                    target="_blank"><i class="fab fa-facebook-f">&nbsp;</i></a></td>
                            <td class="has-text-left"><a href="https://stellamariscenter.org/songkhla"
                                    target="_blank">https://stellamariscenter.org/songkhla</a></td>
                        </tr>
                        <tr>
                            <th>{{ trans('message.tx_rtf') }}</th>
                            <td class="has-text-left">{{ trans('message.tx_samut_sakhon') }}</td>
                            <td class="has-text-left">{{ trans('message.tx_rtf_add_samut_sakhon') }}</td>
                            <td class="has-text-left"><a class='tag is-medium color1 is-rounded button_addshadow'
                                    href="https://goo.gl/maps/PNCVqMj4GtXpjA6o7"
                                    target="_blank">{{ trans('message.bt_map') }}</a></td>
                            <td class="has-text-centered"><a
                                    class='tag is-medium btn_facebook is-rounded button_addshadow'
                                    href="https://www.facebook.com/raksthaifoundation" target="_blank"><i
                                        class="fab fa-facebook-f">&nbsp;</i></a></td>
                            <td class="has-text-left"><a href="https://www.raksthai.org"
                                    target="_blank">https://www.raksthai.org</a></td>
                        </tr>
                        <tr>
                            <th>{{ trans('message.tx_rtf') }}</th>
                            <td class="has-text-left">{{ trans('message.tx_surat_thani') }}</td>
                            <td class="has-text-left">{{ trans('message.tx_rtf_add_surat') }}</td>
                            <td class="has-text-left"><a class='tag is-medium color1 is-rounded button_addshadow'
                                    href="https://goo.gl/maps/kGvr9b1NXN6XSuMJ9"
                                    target="_blank">{{ trans('message.bt_map') }}</a></td>
                            <td class="has-text-centered"><a
                                    class='tag is-medium btn_facebook is-rounded button_addshadow'
                                    href="https://www.facebook.com/raksthaifoundation" target="_blank"><i
                                        class="fab fa-facebook-f">&nbsp;</i></a></td>
                            <td class="has-text-left"><a href="https://www.raksthai.org"
                                    target="_blank">https://www.raksthai.org</a></td>
                        </tr>
                        <tr>
                            <th>{{ trans('message.tx_rsat') }}</th>
                            <td class="has-text-left">{{ trans('message.tx_ubon') }}</td>
                            <td class="has-text-left">{{ trans('message.tx_rsat_add_ubon') }}</td>
                            <td class="has-text-left"><a class='tag is-medium color1 is-rounded button_addshadow'
                                    href="https://goo.gl/maps/ukQ2TbkmosL8vp8e7"
                                    target="_blank">{{ trans('message.bt_map') }}</a></td>
                            <td class="has-text-centered"><a
                                    class='tag is-medium btn_facebook is-rounded has-text-centered button_addshadow'
                                    href="https://www.facebook.com/rsat.info" target="_blank"><i
                                        class="fab fa-facebook-f">&nbsp;</i></a></td>
                            <td class="has-text-left"><a href="http://www.rsat.info"
                                    target="_blank">http://www.rsat.info</a></td>
                        </tr>
                        <tr>
                            <th>{{ trans('message.tx_rtf') }}</th>
                            <td class="has-text-left">{{ trans('message.tx_udon') }}</td>
                            <td class="has-text-left">{{ trans('message.tx_rtf_add_udon') }}</td>
                            <td class="has-text-left"><a class='tag is-medium color1 is-rounded button_addshadow'
                                    href="https://goo.gl/maps/U4CupwV4mD8x1Rn78"
                                    target="_blank">{{ trans('message.bt_map') }}</a></td>
                            <td class="has-text-centered"><a
                                    class='tag is-medium btn_facebook is-rounded button_addshadow'
                                    href="https://www.facebook.com/raksthaifoundation" target="_blank"><i
                                        class="fab fa-facebook-f">&nbsp;</i></a></td>
                            <td class="has-text-left"><a href="https://www.raksthai.org"
                                    target="_blank">https://www.raksthai.org</a></td>
                        </tr>
                    </tbody>
                </table>

            </div>

        </div>
    </div>
</section>


<!-- popup box -->
<div id="boxes">
    <div id="dialog" class="window sizebox1">
        <div class="columns">
            <div class="column">
                <div class="videoWrapper is-parent">

                    <iframe id="clip" width="560" height="315" src="{{ trans('message.Link') }}" title="CRISIS"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>

                </div>
            </div>
        </div>

        <p class="has-text-centered">
            <a class="button  is-outlined is-danger close">{{ trans('message.bt_popup') }}</a>
        </p>
        <br>

    </div>
    <div style="width: 1478px; font-size: 32pt; color:white;  display: none; opacity: 0.8;" id="mask_home"></div>
    <!--div id="mask_1"></!--div-->
</div>

<!-- modal confirm -->

<div id="modal2" class="modal ">
    <div class="modal-background"></div>

    <div class="modal-content">
        <header class="modal-card-head">
            <p class="modal-card-title">{{ trans('message.txt_head_typecheck') }}</p>
            <button class="delete" aria-label="close"></button>
        </header>
        <section class="modal-card-body">

            <div class="has-text-centered">
                <p class="control mb-5">
                    <a class="button is-danger is-focused is-medium is-fullwidth is-rounded"
                        href="{{ 'case_inputs' }}"><i
                            class="fas fa-exclamation-triangle">&nbsp;</i>{{ trans('message.bt_report_complaint') }}</a>
                </p>
                <p class="control">
                    <a class="button is-info is-focused is-medium is-fullwidth  is-rounded"
                        href="https://www.facebook.com/people/%E0%B8%A1%E0%B8%B9%E0%B8%A5%E0%B8%99%E0%B8%B4%E0%B8%98%E0%B8%B4%E0%B9%80%E0%B8%9E%E0%B8%B7%E0%B9%88%E0%B8%AD%E0%B8%AA%E0%B8%B4%E0%B8%97%E0%B8%98%E0%B8%B4%E0%B8%84%E0%B8%A7%E0%B8%B2%E0%B8%A1%E0%B8%AB%E0%B8%A5%E0%B8%B2%E0%B8%81%E0%B8%AB%E0%B8%A5%E0%B8%B2%E0%B8%A2-FAIR/61557330737859/"> <i
                            class="fa fa-comment-dots">&nbsp;</i>{{ trans('message.bt_link_far') }}</a>
                </p>
            </div>
            <div class="field is-grouped">

            </div>

        </section>
    </div>
</div>


<script src="{{ asset('bulma/clipboard-1.7.1.min.js') }}"></script>
<script src="{{ asset('bulma/main.js') }}"></script>

<script>
$(document).ready(function() {

    var target = $(".modal-button").data("target");
    $(target).addClass("is-active");


    $("html").removeClass("is-clipped");
    $(".modal-close").parent().removeClass("is-active");

});

function show_modal2() {
    $("#modal2").addClass("is-active");
}
</script>

@extends('footer')