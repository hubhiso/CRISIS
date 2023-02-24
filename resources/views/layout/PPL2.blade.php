<section class="hero is-medium has-background-light wall4">

    <div class="hero-head">
        <div class="navbar">
            <div class="navbar-end has-text-right">
                <div class="navbar-item">

                    <a class=" button is-danger is-inverted is-rounded is-small  " href="contents/แบบฟอร์ม_ขอสถานะผู้ใช้งานโปรแกรมCRS.pdf" target="_blank">
                        แบบฟอร์มขอรหัสผู้ใช้งาน&nbsp; <span class="fa-stack fa-1x">
                            <i class="fa fa-circle fa-stack-2x"></i>
                            <i class="fa fa-download fa-stack-1x fa-inverse"></i>
                        </span>
                    </a>

                    <a class=" button is-danger is-inverted is-rounded is-small  " href="{{ 'officer' }}">
                        {{ trans('message.bt_admin') }}&nbsp; <span class="fa-stack fa-1x">
                            <i class="fa fa-circle fa-stack-2x"></i>
                            <i class="fa fa-lock fa-stack-1x fa-inverse"></i>
                        </span>
                    </a>

                    @if(Config::get('app.locale') == 'en')

                    <a class="button is-danger is-inverted is-rounded is-small" href="{{ URL::to('change/th') }}">Thai
                        Site&nbsp;
                        <span class="fa-stack fa-1x">
                            <i class="fa fa-circle fa-stack-2x"></i>
                            <i class="fa fa-flag fa-stack-1x fa-inverse"></i>
                        </span>
                    </a>

                    @elseif(Config::get('app.locale') == 'th')

                    <a class="button is-danger is-inverted is-rounded is-small" href="{{ URL::to('change/en') }}">English
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
                    <div class="columns is-mobile is-tablet is-desktop has-background-white" style="border-radius: 5px; max-height: 80px;">
                        <div class="column">
                            <img class="image  " style="max-height: 70px;" src="images/logoPPL/l-h1.png" alt="">
                        </div>
                        <div class="column">
                            <img class="image  " style="max-height: 70px; border-radius: 10px;"
                                src="images/logoPPL/l-h2.png" alt="">
                        </div>
                        <div class="column is-4">
                            <img class="image  " src="images/logoPPL/l-h3-2.png" alt="">
                        </div>
                        <div class="column is-4">
                            <img class="image  " src="images/logoPPL/l-h4-2.png" alt="">
                        </div>

                    </div>
                    <div class="columns is-mobile is-tablet is-desktop has-background-white" style="border-radius: 5px; max-height: 80px; ">
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
                                <a id="btn_new1" class="button is-size-4" href="{{ 'case_inputs' }}">
                                    {{ trans('message.bt_inputcase') }}
                                </a>
                                <br><br>
                                <p> {{ trans('message.txt_status') }} </p><br>
                                <a class="button is-danger  is-rounded" href="{{ 'status' }}"> <i class="fa fa-search"
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
    <div class="container ">

        <br><br>
        <figure class="image is-128x128 container">
            <img src="images/seo.png">
        </figure>
        <br>
        <h1 class="title"> {{ trans('message.tx_h_knowledge') }} </h1>
        <h2 class="subtitle">{{ trans('message.tx_sh_knowledge') }}</h2>
        <br>
    </div>
    <div class="columns">
        <div class="column is-two-thirds">
            <article class="tile is-child box">
                <a href="contents/Crisis.pdf"><img src="images/Crisis-cover.png"></a>
            </article>
        </div>
        <div class="column">
            <article class="tile is-child box">
                <a href="contents/guide/คู่มือแนวทางการจัดการรับเรื่องร้องเรียน.pdf"><img src="contents/cover2-คู่มือแนวทางการจัดการรับเรื่องร้องเรียน.png" height="360"></a>
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
                <a href="http://www.aidsrightsthailand.com/all-article.php?lang=">
                    <h4 class="subtitle is-4 ">"กรณีศึกษาที่น่าสนใจเกี่ยวกับกรณีการละเมิดสิทธิ"</h4>
                    <p>มูลนิธิศูนย์คุ้มครองสิทธิด้านเอดส์<br>Foundation For AIDS Rights (FAR)</p>
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
                    <h4 class="subtitle is-4 ">"รายงานสุขภาพคนไทย 2562"</h4>
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
            <a class="button is-primary  is-rounded is-danger" href="{{ 'orgmap' }}"> <i
                    class="fas fa-thumbtack"></i>&nbsp; {{ trans('message.bt_map') }} </a>
            <br><br>
            <div class="panel table-container">

                <table class="table  is-striped is-hoverable">
                    <thead>
                        <tr>
                            <th class="has-text-danger">ชื่อหน่วยงาน</abbr></th>
                            <th class="has-text-danger">จังหวัด</th>
                            <th class="has-text-danger">ที่อยู่</abbr></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>RSAT(สมาคมฟ้าสีรุ้ง)</th>
                            <td>กรุงเทพฯ</td>
                            <td>เลขที 1 และ 3 ซอยรามคำแหง 97/2 ถนนรามคำแหง แขวงหัวหมาก เขตบางกะปิ กรุงเทพฯ 10240</td>
                        </tr>
                        <tr>
                            <th>TNP+ (เครือข่ายผู้ติดเชื้อ)</th>
                            <td>กรุงเทพฯ</td>
                            <td>494 ซอย 14 ลาดพร้าว 101 แขวงคลองจั่น เขตบางกะปิ กรุงเทพฯ 10240</td>
                        </tr>
                        <tr>
                            <th>FAR</th>
                            <td>กรุงเทพฯ</td>
                            <td>เลขที133/235 หมู่บ้านรื่นฤดี 3 ถนนหทัยราษฎร์ แขวง/เขตมีนบุรี กรุงเทพฯ 10510</td>
                        </tr>
                        <tr>
                            <th>SWING (มูลนิธิเพื่อนพนักงานบริการ สีลม)</th>
                            <td>กรุงเทพฯ</td>
                            <td>อาคารเลขที่ 3 ชั้น 5 ซอยพัฒน์พงศ์ 1 ถนนสุรวงศ์ แขวงสุริยวงศ์ เขตบางรัก กรุงเทพมหานคร 10500<br>
                            <a class='tag is-medium is-primary is-rounded' href="https://goo.gl/maps/E9kgmrb6SmocuTUp7">แสดงบนแผนที่</a> 
                            </td>
                        </tr>
                        <tr>
                            <th>SWING (มูลนิธิเพื่อนพนักงานบริการ สะพานควาย)</th>
                            <td>กรุงเทพฯ</td>
                            <td>1417/31 ถนนประดิพัทธ์ แขวงสามเสนใน เขตพญาไท กรุงเทพมหานคร 10400<br>
                            <a class='tag is-medium is-primary is-rounded' href="https://goo.gl/maps/f35cKX4pwg3gPFX19">แสดงบนแผนที่</a> </td>
                        </tr>
                        <tr>
                            <th>SWING (มูลนิธิเพื่อนพนักงานบริการ พัทยา)</th>
                            <td>ชลบุรี</td>
                            <td>45/54 หมู่ 10 ตำบลหนองปรือ อำเภอบางละมุง จังหวัดชลบุรี<br>
                            <a class='tag is-medium is-primary is-rounded' href="https://goo.gl/maps/nN1s84HcZRaRzEbe7">แสดงบนแผนที่</a> </td>
                        </tr>
                        <tr>
                            <th>RSAT(สมาคมฟ้าสีรุ้ง)</th>
                            <td>ชลบุรี</td>
                            <td>94/6 ม.4 ต.บ้านสวน อ.เมือง จ.ชลบุรี เทศบาลเมืองชลบุรี</td>
                        </tr>
                        <tr>
                            <th>RTF (มูลนิธิรักษ์ไทย)</th>
                            <td>ชลบุรี</td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>HON</th>
                            <td>ชลบุรี</td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>กลุ่มน้ำกว๊านสีรุ้ง</th>
                            <td>ลำพูน</td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>กลุ่มน้ำกว๊านสีรุ้ง</th>
                            <td>พะเยา</td>
                            <td>414/12 หมู่11 ต.ต๋อม เทศบาลเมืองพะเยา 56000</td>
                        </tr>
                        <tr>
                            <th>RTF (มูลนิธิรักษ์ไทย)</th>
                            <td>เชียงใหม่</td>
                            <td>113/9 ถ. เชียงใหม่ – ลำปาง ต. ท่าศาลา อ. เมือง จ. เชียงใหม่ 50000</td>
                        </tr>
                        <tr>
                            <th>RTF (มูลนิธิรักษ์ไทย)</th>
                            <td>ตราด</td>
                            <td>1140/35 ม.12 ต.วังกระแจะ อ.เมือง จ.ตราด 23000</td>
                        </tr>
                        <tr>
                            <th>RTF (มูลนิธิรักษ์ไทย)</th>
                            <td>นครปฐม</td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>RTF (มูลนิธิรักษ์ไทย)</th>
                            <td>นครศรีธรรมราช</td>
                            <td>11 ถนนชลประทาน 4 ขวา 2 ตำบลนาเคียน อ.เมือง จ.นครศรีธรรมราช 80000</td>
                        </tr>
                        <tr>
                            <th>RSAT(สมาคมฟ้าสีรุ้ง)</th>
                            <td>นนทบุรี</td>
                            <td>ถนนรัตนาธิเบต22 หรือ ซอยโรงแรมพาราไดซ์ ตรงข้าม บิ๊กซี รัตนาธิเบต นนทบุรี</td>
                        </tr>
                        <tr>
                            <th>RSAT(สมาคมฟ้าสีรุ้ง)</th>
                            <td>ปทุมธานี</td>
                            <td>315/61 ซอยพหลโยธิน 62 ตำบล คูคต อำเภอลำลูกกา เทศบาลเมืองปทุมธานี 12130</td>
                        </tr>
                        <tr>
                            <th>RTF (มูลนิธิรักษ์ไทย)</th>
                            <td>ระยอง</td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>FAR</th>
                            <td>ระยอง</td>
                            <td>เลขที5/79 หมู่บ้านเติมทรัพย์ไพรเวทโฮม ตำบลเนินพระ อำเภอเมือง จังหวัดระยอง, 21000</td>
                        </tr>
                        <tr>
                            <th>RSAT(สมาคมฟ้าสีรุ้ง)</th>
                            <td>สงขลา</td>
                            <td>79 ถนน นิพัทธิ์สงเคราะห์ 2, หาดใหญ่, หาดใหญ่ 90110</td>
                        </tr>
                        <tr>
                            <th>STM(บ้านสุขสันต์)</th>
                            <td>สงขลา</td>
                            <td>33 ราษฎร์อุทิศ 2 ซอย 1 ตำบลบ่อยาง อำเภอเมืองสงขลา สงขลา 90000</td>
                        </tr>
                        <tr>
                            <th>RTF (มูลนิธิรักษ์ไทย)</th>
                            <td>สมุทรสาคร</td>
                            <td>25/21 มหาชัยเมืองทองโครงการ1 หมู่ 3 ถ สหกรณ์ ต บางหญ้าแพรก อ เมือง ตำบล บางหญ้าแพรก
                                อำเภอเมืองสมุทรสาคร สมุทรสาคร 74000</td>
                        </tr>
                        <tr>
                            <th>RSAT(สมาคมฟ้าสีรุ้ง)</th>
                            <td>สมุทรปราการ</td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>RSAT(มูลนิธิรักษ์ไทย)</th>
                            <td>สมุทรปราการ</td>
                            <td>80/403 หมู่บ้านทิพวัลย์ 1 ซอย 45 ถนนเทพารักษ์ บางเมืองใหม่ เมือง สมุทรปราการ 10270</td>
                        </tr>
                        <tr>
                            <th>RTF (มูลนิธิรักษ์ไทย)</th>
                            <td>สุราษฎร์ธานี</td>
                            <td>200/3-4 หมู่ 5 หมู่บ้าน เอกธานี ถ. เลี่ยงเมือง ต. มะขามเตี้ย อ. เมือง จ. สุราษฎร์ธานี
                                84000
                            </td>
                        </tr>
                        <tr>
                            <th>RSAT(สมาคมฟ้าสีรุ้ง)</th>
                            <td>อุบลราชธานี</td>
                            <td>542 ถนนพิชิตรังสรรค์ ตำบลในเมือง อำเภอเมือง จังหวัดอุบลราชธานี  34000</td>
                        </tr>
                        <tr>
                            <th>RTF (มูลนิธิรักษ์ไทย)</th>
                            <td>อุดรธานี</td>
                            <td>273 ถนน อำเภอ ตำบลหมากแข้ง อำเภอเมืองอุดรธานี อุดรธานี 41000</td>
                        </tr>
                    </tbody>
                </table>

            </div>

        </div>
    </div>
</section>

<div id="modal" class="modal">
    <div class="modal-background"></div>
    <div class="modal-content">
        <div class="box">
            <article class="media">
                <div class="media-left">
                    <figure class="image is-64x64">
                        <img src="https://www.tutorialspoint.com/bootstrap/images/64.jpg" alt="Image">
                    </figure>
                </div>
                <div class="media-content">
                    <div class="content">
                        <p>
                            <strong>Will Smith</strong>
                            <small>@wsmith</small>
                            <small>31m</small>
                            <br>
                            This is simple text. This is simple text.
                            This is simple text. This is simple text.
                        </p>
                    </div>
                    <nav class="level">
                        <div class="level-left">
                            <a class="level-item">
                                <span class="icon is-small">
                                    <i class="fa fa-reply"></i>
                                </span>
                            </a>
                            <a class="level-item">
                                <span class="icon is-small">
                                    <i class="fa fa-retweet"></i>
                                </span>
                            </a>
                        </div>
                    </nav>

                </div>
            </article>
        </div>
    </div>
    <button class="modal-close is-large" aria-label="close"></button>
</div>

<!-- popup box -->
<div id="boxes">
    <div id="dialog" class="window sizebox1">
        <div class="columns">
            <div class="column">
                <div class="videoWrapper is-parent">

                    <iframe id="clip" width="560" height="315" src="{{ trans('message.Link') }}" title="CRISIS" frameborder="0"
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
    <div  style="width: 1478px; font-size: 32pt; color:white;  display: none; opacity: 0.8;" id="mask_home"></div>
    <!--div id="mask_1"></!--div-->
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
</script>

@extends('footer')