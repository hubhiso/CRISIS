<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300&display=swap" rel="stylesheet">

    <link href="{{ asset('bulma-0.8.0/css/bulma.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mystyles.css') }}" rel="stylesheet">

    <link href="{{ asset('css/font-awesome5.0.6/css/fontawesome-all.css') }}" rel="stylesheet">
    {{ Html::script('js/jquery.min.js') }}
    <link href="{{ asset('/css/uploadicon/new3.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/nicelabel/css/jquery-nicelabel.css') }}" rel="stylesheet">

    {{--{{ Html::style('bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}--}}
    {{--{{ Html::style('bootstrap/css/bootstrap.css') }}--}}
    {{ Html::script('js/jquery.min.js') }}
    {{--{{ Html::script('js/thai_date_dropdown.js') }}--}}

    {{--{{ Html::script('js/select_list.js') }}--}}
    {{--{{ Html::script('bootstrap/js/bootstrap.min.js') }}--}}
    {{--{{ Html::script('bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}--}}


    <meta name="theme-color" content="#ab3c3c" />

    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">

    <title> ปกป้อง (CRS) </title>

</head>

<body class="has-background-light">

    <div class="hero-head ">
        <div class=" ">
            @component('component.login_bar2')
            @endcomponent
        </div>
    </div>

    <div class="container">

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
                            <i class="fa fa-share-alt" aria-hidden="true"></i>
                            </span>
                            <span>ทำเนียบผู้พัฒนา</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <div class="content">

                <div name="body" class="">

                    <h1><sapn class="has-text-danger"><i class="fa fa-share-alt" aria-hidden="true"></i></sapn>&nbsp;ทำเนียบเครือข่าย <sapn class="has-text-danger">CRS</sapn>
                    </h1>
                    <br>
                    <div class="panel table-container">

                        <table class="table  is-striped is-hoverable">
                            <thead class="">
                                <tr>
                                    <th class="has-text-danger">เขต</th>
                                    <th class="has-text-danger">จังหวัด</th>
                                    <th class="has-text-danger">รายชื่อ</th>
                                    <th class="has-text-danger">หน่วยงาน</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>เชียงใหม่</td>
                                    <td>นางสาวมนต์ทิวา สุนันตา</td>
                                    <td>สำนักงานป้องกันควบคุมโรคที่ 1 เชียงใหม่</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>พะเยา</td>
                                    <td>&nbsp;</td>
                                    <td>สำนักงานอัยการคุ้มครองสิทธิและช่วยเหลือทางกฎหมายและการบังคับคดี จังหวัดพะเยา
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>พะเยา</td>
                                    <td>นายวิวัฒน์ สมเครือ</td>
                                    <td>สำนักงานสาธารณสุขจังหวัดพะเยา</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>พะเยา</td>
                                    <td>คุณภัคนันท์ เครือแก้ว</td>
                                    <td>ศูนย์บริการที่เป็นมิตร น้ำกว๊านสีรุ้ง พะเยา</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>พะเยา</td>
                                    <td>คุณภัททิยาภรณ์ แก้วสืบ</td>
                                    <td>ศูนย์บริการที่เป็นมิตร น้ำกว๊านสีรุ้ง พะเยา</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>พะเยา</td>
                                    <td>คุณภาสกร สอนน้อย</td>
                                    <td>ศูนย์บริการที่เป็นมิตร น้ำกว๊านสีรุ้ง พะเยา</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>พิษณุโลก</td>
                                    <td>นางสาวกาญจนา มากะนัตย์</td>
                                    <td>สำนักงานป้องกันควบคุมโรคที่ 2 พิษณุโลก</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>พิษณุโลก</td>
                                    <td>นางสาวธิตาภรณ์ วิชชุปกรณ์</td>
                                    <td>สำนักงานป้องกันควบคุมโรคที่ 2 พิษณุโลก</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>พิษณุโลก</td>
                                    <td>นายธานี มีเอี่ยม</td>
                                    <td>สำนักงานป้องกันควบคุมโรคที่ 2 พิษณุโลก</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>นครสวรรค์</td>
                                    <td>นางธิดา นิ่มมา</td>
                                    <td>สำนักงานป้องกันควบคุมโรคที่ 3 นครสวรรค์</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>นครสวรรค์</td>
                                    <td>นางพรชนก สีหะวงษ์</td>
                                    <td>สำนักงานป้องกันควบคุมโรคที่ 3 นครสวรรค์</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>นครสวรรค์</td>
                                    <td>นางวันวิสา ประทุม</td>
                                    <td>สำนักงานป้องกันควบคุมโรคที่ 3 นครสวรรค์</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>สระบุรี</td>
                                    <td>นางสาวศุภษร วิเศษชาติ</td>
                                    <td>สำนักงานป้องกันควบคุมโรคที่ 4 สระบุรี</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>นนทบุรี</td>
                                    <td>นางพยุงพร พลายใย</td>
                                    <td>สำนักงานสาธารณสุขจังหวัดนนทบุรี</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>นนทบุรี</td>
                                    <td>&nbsp;</td>
                                    <td>สำนักงานอัยการคุ้มครองสิทธิและช่วยเหลือทางกฎหมายและการบังคับคดี จังหวัดนนทบุรี
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>นนทบุรี</td>
                                    <td>คุณปุญชรัสมิ์ ตาเลิศ</td>
                                    <td>สมาคมฟ้าสีรุ้งจังหวัดนนทบุรี</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>ปทุมธานี</td>
                                    <td>นางสาวทัศนีย์ พระยานะธูป</td>
                                    <td>สำนักงานสาธารณสุขจังหวัดปทุมธานี</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>ปทุมธานี</td>
                                    <td>&nbsp;</td>
                                    <td>สำนักงานอัยการคุ้มครองสิทธิและช่วยเหลือทางกฎหมายและการบังคับคดี จังหวัดปทุมธานี
                                    </td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>นครปฐม</td>
                                    <td>นางสาวธัญรดา แก้วทิพย์</td>
                                    <td>สำนักงานสาธารณสุขจังหวัดนครปฐม</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>นครปฐม</td>
                                    <td>&nbsp;</td>
                                    <td>สำนักงานอัยการคุ้มครองสิทธิและช่วยเหลือทางกฎหมายและการบังคับคดี จังหวัดนครปฐม
                                    </td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>ราชบุรี</td>
                                    <td>นางปิยนุช เทพสุวรรณ</td>
                                    <td>สำนักงานป้องกันควบคุมโรคที่ 5 ราชบุรี</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>ราชบุรี</td>
                                    <td>นางสาวศิริวรรณ พูลพิพัฒน์</td>
                                    <td>สำนักงานป้องกันควบคุมโรคที่ 5 ราชบุรี</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>สมุทรสาคร</td>
                                    <td>&nbsp;</td>
                                    <td>สำนักงานอัยการคุ้มครองสิทธิและช่วยเหลือทางกฎหมายและการบังคับคดี จังหวัดสมุทรสาคร
                                    </td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>สมุทรสาคร</td>
                                    <td>นายประพนธ์ ใคร่ครวญ</td>
                                    <td>สำนักงานสาธารณสุขจังหวัดสมุทรสาคร</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>สมุทรสาคร</td>
                                    <td>Mr. Thaung Naing</td>
                                    <td>มูลนิธิรักษ์ไทยจังหวัดสมุทรสาคร</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>สมุทรสาคร</td>
                                    <td>Ms.YIN YIN AEY</td>
                                    <td>มูลนิธิรักษ์ไทยจังหวัดสมุทรสาคร</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>ชลบุรี</td>
                                    <td>นางสาวมยุรา เฮืองหล้า</td>
                                    <td>สำนักงานป้องกันควบคุมโรคที่ 6 ชลบุรี</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>ชลบุรี</td>
                                    <td>นางสาวอภิญญา เปี่ยมวัฒนาทรัพย์</td>
                                    <td>สำนักงานป้องกันควบคุมโรคที่ 6 ชลบุรี</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>ชลบุรี</td>
                                    <td>นายนวพล มิติภัทร</td>
                                    <td>สำนักงานสาธารณสุขจังหวัดชลบุรี</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>ชลบุรี</td>
                                    <td>&nbsp;</td>
                                    <td>สำนักงานอัยการคุ้มครองสิทธิและช่วยเหลือทางกฏหมายและการบังคับคดี จังหวัดชลบุรี
                                    </td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>ชลบุรี</td>
                                    <td>คุณเนตรนภิศ มณีเนตร</td>
                                    <td>สมาคมฟ้าสีรุ้งจังหวัดชลบุรี</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>ชลบุรี</td>
                                    <td>คุณบงกช บุญประสาน</td>
                                    <td>เครือข่ายสุขภาพและโอกาส (HON) จังหวัดชลบุรี</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>ชลบุรี</td>
                                    <td>คุณพิริยา ยุติกะ</td>
                                    <td>มูลนิธิรักษ์ไทยจังหวัดชลบุรี</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>ชลบุรี</td>
                                    <td>คุณรชยาภรณ์ธวี ธนวัตน์เทวากุล</td>
                                    <td>เครือข่ายสุขภาพและโอกาส (HON) จังหวัดชลบุรี</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>ชลบุรี</td>
                                    <td>คุณรัชตา สกุลพิทักษ์</td>
                                    <td>เครือข่ายสุขภาพและโอกาส (HON) จังหวัดชลบุรี</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>ตราด</td>
                                    <td>นางสาวนัฐติยาพร ผากำเนิด</td>
                                    <td>สำนักงานสาธารณสุขจังหวัดตราด</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>ตราด</td>
                                    <td>&nbsp;</td>
                                    <td>สำนักงานอัยการคุ้มครองสิทธิและช่วยเหลือทางกฎหมายและการบังคับคดี จังหวัดตราด</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>ตราด</td>
                                    <td>คุณณัฐวุฒิ ลอยเลื่อน</td>
                                    <td>มูลนิธิรักษ์ไทยจังหวัดตราด</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>ระยอง</td>
                                    <td>นางสาวปิยวรรณ บางแสง</td>
                                    <td>สำนักงานสาธารณสุขจังหวัดระยอง</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>ระยอง</td>
                                    <td>นายเวสารัช วรุตมะพงศ์พันธุ์</td>
                                    <td>สำนักงานสาธารณสุขจังหวัดระยอง</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>ระยอง</td>
                                    <td>&nbsp;</td>
                                    <td>สำนักงานอัยการคุ้มครองสิทธิและช่วยเหลือทางกฎหมายและการบังคับคดี จังหวัดระยอง
                                    </td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>ระยอง</td>
                                    <td>คุณขึ้น มอม</td>
                                    <td>มูลนิธิศูนย์คุ้มครองสิทธิด้านเอดส์จังหวัดระยอง</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>ระยอง</td>
                                    <td>คุณจิรทีปต์ ฤกษ์ยามดี</td>
                                    <td>มูลนิธิรักษ์ไทยจังหวัดระยอง</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>ระยอง</td>
                                    <td>คุณทันดาดัน </td>
                                    <td>มูลนิธิศูนย์คุ้มครองสิทธิด้านเอดส์จังหวัดระยอง</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>สมุทรปราการ</td>
                                    <td>นางรัตนา ใจทัศน์กุล</td>
                                    <td>สำนักงานสาธารณสุขจังหวัดสมุทรปราการ</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>สมุทรปราการ</td>
                                    <td>นายต่อศักดิ์ เกษนาค</td>
                                    <td>สำนักงานสาธารณสุขจังหวัดสมุทรปราการ</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>สมุทรปราการ</td>
                                    <td>&nbsp;</td>
                                    <td>สำนักงานอัยการคุ้มครองสิทธิและช่วยเหลือทางกฎหมายและการบังคับคดี
                                        จังหวัดสมุทรปราการ
                                    </td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>สมุทรปราการ</td>
                                    <td>คุณพัฒนา ตาโก่ง</td>
                                    <td>มูลนิธิรักษ์ไทยจังหวัดสมุทรปราการ</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>สมุทรปราการ</td>
                                    <td>คุณมนสิช มณีแสงรัตน์</td>
                                    <td>สมาคมฟ้าสีรุ้งจังหวัดสมุทรปราการ</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>สมุทรปราการ</td>
                                    <td>คุณวราวุธ บุญศิริธนโรจน์</td>
                                    <td>สมาคมฟ้าสีรุ้งจังหวัดสมุทรปราการ</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>สมุทรปราการ</td>
                                    <td>คุณศุภวรรณ เงินเจริญ</td>
                                    <td>มูลนิธิรักษ์ไทยจังหวัดสมุทรปราการ</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>สมุทรปราการ</td>
                                    <td>คุณอมรรัตน์ ศรีบุญเพ็ง</td>
                                    <td>มูลนิธิรักษ์ไทยจังหวัดสมุทรปราการ</td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>ขอนแก่น</td>
                                    <td>นางสาวนงค์นุช สุรัตนวดี</td>
                                    <td>สำนักงานสาธารณสุขจังหวัดขอนแก่น</td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>ขอนแก่น</td>
                                    <td>นางสาวปิยธิดา ภูตาไชย</td>
                                    <td>สำนักงานป้องกันควบคุมโรคที่ 7 ขอนแก่น</td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>อุดรธานี</td>
                                    <td>นางเพชรชลี แตงสกุล</td>
                                    <td>สำนักงานสาธารณสุขจังหวัดอุดรธานี</td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>อุดรธานี</td>
                                    <td>นางสาวจิราภา ตาลหยง</td>
                                    <td>สำนักงานป้องกันควบคุมโรคที่ 8 อุดรธานี</td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>อุดรธานี</td>
                                    <td>นางสาวดวงเดือน จันทะโชติ</td>
                                    <td>สำนักงานป้องกันควบคุมโรคที่ 8 อุดรธานี</td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>อุดรธานี</td>
                                    <td>นางสาวเอื้องอุมา โยธาวิจิตร</td>
                                    <td>สำนักงานสาธารณสุขจังหวัดอุดรธานี</td>
                                </tr>
                                <tr>
                                    <td>9</td>
                                    <td>นครราชสีมา</td>
                                    <td>นางวิมลจันทร์ นาคจันทึก</td>
                                    <td>สำนักงานป้องกันควบคุมโรคที่ 9 นครราชสีมา</td>
                                </tr>
                                <tr>
                                    <td>9</td>
                                    <td>นครราชสีมา</td>
                                    <td>นางสาวกัลยาณี จันทิมา</td>
                                    <td>สำนักงานป้องกันควบคุมโรคที่ 9 นครราชสีมา</td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td>อุบลราชธานี</td>
                                    <td>นางสาววันทนีย์ ธารณธนบูลย์</td>
                                    <td>สำนักงานป้องกันควบคุมโรคที่ 10 อุบลราชธานี</td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td>อุบลราชธานี</td>
                                    <td>วันทนีย์ ธารณธนบูลย์</td>
                                    <td>สำนักงานป้องกันควบคุมโรคที่ 10 อุบลราชธานี</td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td>อุบลราชธานี</td>
                                    <td>นางปิยะพร บุญเกิด</td>
                                    <td>สำนักงานสาธารณสุขจังหวัดอุบลราชธานี</td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td>อุบลราชธานี</td>
                                    <td>นางพรรณธิดา มูลประดับ</td>
                                    <td>สำนักงานสาธารณสุขจังหวัดอุบลราชธานี</td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td>ยโสธร</td>
                                    <td>ถนอม โคตรวงศ์</td>
                                    <td>สํานักงานสาธารณสุขจังหวัดยโสธร</td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td>อุบลราชธานี</td>
                                    <td>คุณปราโมทย์ ศรีสุธรรม</td>
                                    <td>สมาคมฟ้าสีรุ้งจังหวัดอุบลราชธานี</td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td>อุบลราชธานี</td>
                                    <td>คุณชุติมา สืบเชื้อ</td>
                                    <td>สมาคมฟ้าสีรุ้งจังหวัดอุบลราชธานี</td>
                                </tr>
                                <tr>
                                    <td>11</td>
                                    <td>สุราษฎร์ธานี</td>
                                    <td>&nbsp;</td>
                                    <td>สำนักงานอัยการคุ้มครองสิทธิและช่วยเหลือทางกฎหมายและการบังคับคดี
                                        จังหวัดสุราษฎร์ธานี
                                    </td>
                                </tr>
                                <tr>
                                    <td>11</td>
                                    <td>สุราษฎร์ธานี</td>
                                    <td>นายวิสูตร จอมสวัสดิ์</td>
                                    <td>สำนักงานสาธารณสุขจังหวัดสุราษฎร์ธานี</td>
                                </tr>
                                <tr>
                                    <td>11</td>
                                    <td>นครศรีธรรมราช</td>
                                    <td>นางสาวจินตนา สงอุปการ</td>
                                    <td>สำนักงานสาธารณสุขจังหวัดนครศรีธรรมราช</td>
                                </tr>
                                <tr>
                                    <td>11</td>
                                    <td>นครศรีธรรมราช</td>
                                    <td>นางจุลจิรา จุลบล</td>
                                    <td>สำนักงานป้องกันควบคุมโรคที่ 11 นครศรีธรรมราช</td>
                                </tr>
                                <tr>
                                    <td>11</td>
                                    <td>สุราษฎร์ธานี</td>
                                    <td>คุณแก่นแก้ว ชุมชาติ</td>
                                    <td>มูลนิธิรักษ์ไทยจังหวัดสุราษฎร์ธานี</td>
                                </tr>
                                <tr>
                                    <td>11</td>
                                    <td>สุราษฎร์ธานี</td>
                                    <td>คุณเบญจวรรณ บุญฤทธิ์</td>
                                    <td>มูลนิธิรักษ์ไทยจังหวัดสุราษฎร์ธานี</td>
                                </tr>
                                <tr>
                                    <td>11</td>
                                    <td>นครศรีธรรมราช</td>
                                    <td>คุณเพทาย เกื้อบางจาก</td>
                                    <td>มูลนิธิรักษ์ไทยจังหวัดนครศรีธรรมราช</td>
                                </tr>
                                <tr>
                                    <td>12</td>
                                    <td>สงขลา</td>
                                    <td>&nbsp;</td>
                                    <td>สำนักงานอัยการคุ้มครองสิทธิและช่วยเหลือทางกฎหมายและการบังคับคดี จังหวัดสงขลา
                                    </td>
                                </tr>
                                <tr>
                                    <td>12</td>
                                    <td>สงขลา</td>
                                    <td>นางนิ่มอนงค์ ไทยเจริญ</td>
                                    <td>สำนักงานป้องกันควบคุมโรคที่ 12 สงขลา</td>
                                </tr>
                                <tr>
                                    <td>12</td>
                                    <td>สงขลา</td>
                                    <td>นางประทีป สระมุณี</td>
                                    <td>สำนักงานสาธารณสุขจังหวัดสงขลา</td>
                                </tr>
                                <tr>
                                    <td>12</td>
                                    <td>สงขลา</td>
                                    <td>นางสาววนิดา จิตหมั่น</td>
                                    <td>สำนักงานสาธารณสุขจังหวัดสงขลา</td>
                                </tr>
                                <tr>
                                    <td>12</td>
                                    <td>สงขลา</td>
                                    <td>นายเจริญสุข ชะโนวรรณะ</td>
                                    <td>สำนักงานสาธารณสุขจังหวัดสงขลา</td>
                                </tr>
                                <tr>
                                    <td>12</td>
                                    <td>สงขลา</td>
                                    <td>คุณภูเบศวร์ พงศ์สุวรรณ</td>
                                    <td>สมาคมฟ้าสีรุ้งจังหวัดสงขลา</td>
                                </tr>
                                <tr>
                                    <td>12</td>
                                    <td>สงขลา</td>
                                    <td>คุณสุนทร กาญจน์ยศ</td>
                                    <td>สมาคมฟ้าสีรุ้งจังหวัดสงขลา</td>
                                </tr>
                                <tr>
                                    <td>12</td>
                                    <td>สงขลา</td>
                                    <td>คุณอำพาพร หมีเหมาะ</td>
                                    <td>สมาคมฟ้าสีรุ้งจังหวัดสงขลา</td>
                                </tr>
                                <tr>
                                    <td>12</td>
                                    <td>สงขลา</td>
                                    <td>คุณนะดา เกตสุริยงค์</td>
                                    <td>ศูนย์อภิบาลผู้เดินทางทะเล สงขลา (บ้านสุขสันต์)</td>
                                </tr>
                                <tr>
                                    <td>12</td>
                                    <td>สงขลา</td>
                                    <td>คุณลาตีฟะ ยามา</td>
                                    <td>ศูนย์อภิบาลผู้เดินทางทะเล สงขลา (บ้านสุขสันต์)</td>
                                </tr>
                                <tr>
                                    <td>12</td>
                                    <td>สงขลา</td>
                                    <td>คุณสุรีวัลย์ หีมแหละ</td>
                                    <td>ศูนย์อภิบาลผู้เดินทางทะเล สงขลา (บ้านสุขสันต์)</td>
                                </tr>
                                <tr>
                                    <td>13</td>
                                    <td>กรุงเทพ</td>
                                    <td>คุณสมวงศ์ อุไรวัฒนา</td>
                                    <td>มูลนิธิเข้าถึงเอดส์ สายด่วน 1663</td>
                                </tr>
                                <tr>
                                    <td>13</td>
                                    <td>กรุงเทพ</td>
                                    <td>คุณเด่นชัย ศรีกรองทอง</td>
                                    <td>มูลนิธิเพื่อนพนักงานบริการ (SWING)</td>
                                </tr>
                                <tr>
                                    <td>13</td>
                                    <td>กรุงเทพ</td>
                                    <td>คุณสุรศักดิ์ เนียมถนอม</td>
                                    <td>มูลนิธิเพื่อนพนักงานบริการ (SWING)</td>
                                </tr>
                                <tr>
                                    <td>13</td>
                                    <td>กรุงเทพ</td>
                                    <td>คุณศศินภนต์ ภิภัทรวัฒนากุล</td>
                                    <td>สมาคมฟ้าสีรุ้งแห่งประเทศไทย</td>
                                </tr>
                                <tr>
                                    <td>13</td>
                                    <td>กรุงเทพ</td>
                                    <td>คุณสิปปวิชญ์ สุขสาคร</td>
                                    <td>สมาคมฟ้าสีรุ้งแห่งประเทศไทย</td>
                                </tr>
                                <tr>
                                    <td>13</td>
                                    <td>กรุงเทพ</td>
                                    <td>คุณสุดา บุดชาดี</td>
                                    <td>สมาคมฟ้าสีรุ้งแห่งประเทศไทย</td>
                                </tr>
                                <tr>
                                    <td>13</td>
                                    <td>กรุงเทพ</td>
                                    <td>คุณปดิวริดา เดิมสันเทียะ</td>
                                    <td>สมาคมวางแผนครอบครัวแห่งประเทศไทยฯ (สวท)</td>
                                </tr>
                                <tr>
                                    <td>13</td>
                                    <td>กรุงเทพ</td>
                                    <td>นางสาวจอมเทียน พวงดอก</td>
                                    <td>สถาบันป้องกันควบคุมโรคเขตเมือง</td>
                                </tr>
                                <tr>
                                    <td>13</td>
                                    <td>กรุงเทพ</td>
                                    <td>นางสาวรัชดา ชัยสิน</td>
                                    <td>สถาบันป้องกันควบคุมโรคเขตเมือง</td>
                                </tr>
                                <tr>
                                    <td>13</td>
                                    <td>กรุงเทพ</td>
                                    <td>นางพิมพิมล จันทร์เจริญศรี</td>
                                    <td>สำนักอนามัย กรุงเทพ</td>
                                </tr>
                                <tr>
                                    <td>13</td>
                                    <td>กรุงเทพ</td>
                                    <td>นางสาวศิราณี คุณาจารย์</td>
                                    <td>สำนักอนามัย กรุงเทพ</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>

                </div>

            </div>




        </div>
    </div>



    <footer class="footer " style="background-color: #EEE;">
        <div class="container  ">
            <div class="content has-text-centered  ">
                <p>Crisis Response System (CRS)
                </p>
                <p id="tsp"> <small> Source code licensed <a href="http://www.hiso.or.th">HISO</a>. </small> </p>
            </div>
        </div>
    </footer>

    <script src="{{ asset('bulma/clipboard-1.7.1.min.js') }}"></script>
    <script src="{{ asset('bulma/main.js') }}"></script>
    {{--<script src="{{ asset('js/prov_list.js') }}"></script>--}}
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
    </script>
</body>

</html>