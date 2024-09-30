<table class="table is-fullwidth  hideextra has-text-left"  id="table_show">
    <thead style="text-align: center;">
        <tr>
            <th style=" white-space:nowrap;"> ลำดับ </abbr>
            </th>
            <th style=" white-space:nowrap;"> วันที่ </abbr>
            </th>
            <th style=" white-space:nowrap;"> รหัส </abbr>
            </th>
            <th style=" white-space:nowrap;"> วันที่เกิดเหตุ<br>(ตามแจ้ง) </abbr>
            </th>
            <th style=" white-space:nowrap;"> จังหวัด </abbr>
            </th>
            <th style=" white-space:nowrap;">ประเภท </abbr>
            </th>
            <th style=" white-space:nowrap;"> สถานะ </abbr>
            </th>
            <th style=" white-space:nowrap;"> ดำเนินการ </abbr>
            </th>
            <th> ประเภทของผู้แจ้ง </abbr>
            </th>
            <th> ผู้รับเรื่อง </abbr>
            </th>
            @if($username == "HisoDev")
            <th> จัดการ </abbr>
            </th>
            @endif
        </tr>
    </thead>
    <tbody>
        @php
        $thaimonth = ["","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค."];
        @endphp

        <?php $i =0; ?>

        @foreach($cases as $case)


        <?php
            $i++;
                $ck_prev_transfer = 0;

                foreach ($join_transfers as $join_transfer) {

                   if( $join_transfer->case_id == $case->case_id){
                       $ck_prev_transfer = 1;
                    }
                }
        ?>

        <tr>
            <td>{{$i}}</td>

            <th style=" white-space:nowrap;">
                {{date('d',strtotime(str_replace('-','/', $case->created_at)))}}-{{$thaimonth[date('n',strtotime(str_replace('-','/', $case->created_at)))]}}{{date("Y",strtotime(str_replace('-','/', $case->created_at)))+543}}
            </th>

            <th>
                @if($case->emergency == "yes" )
                <span class="has-text-danger">เร่งด่วน</span><br>
                @endif
                <a target="_blank" class=" has-text-link" href="{{ route('officer.open_dt', $case->case_id) }}"
                    title='ID'>{{ $case->case_id }}</a>

                <input type="hidden" id="caseid{{$i}}" name="caseid" value="{{ $case->case_id }}">
            </th>

            <td>
                @if($case->accident_date != "")
                {{date('d',strtotime(str_replace('-','/', $case->accident_date)))}}-{{$thaimonth[date('n',strtotime(str_replace('-','/', $case->accident_date)))]}}{{date("Y",strtotime(str_replace('-','/', $case->accident_date)))+543}}
                @else
                ไม่มีข้อมูล
                @endif
            </td>

            <td class="has-text-left">{{$case->Provinces->PROVINCE_NAME}}</td>

            <td class="has-text-left" style=" white-space:nowrap;">
                @if($case->problem_case == 1)
                บังคับตรวจเอชไอวี <br>
                @endif

                @if($case->problem_case == 2)
                เปิดเผยสถานะการติดเชื้อเอชไอวี<br>
                @endif

                @if($case->problem_case == 3)
                ถูกกีดกันหรือถูกเลือกปฏิบัติเนื่องมาจาการติดเชื้อเอชไอวี<br>
                @endif

                @if($case->problem_case == 4)
                ถูกกีดกันหรือถูกเลือกปฏิบัติเนื่องมาจากเป็นกลุ่มเปราะบาง<br>
                @endif

                @if($case->problem_case == 5)
                อื่นๆ ที่เกี่ยวข้องกับเอชไอวี<br>
                @endif

                @if($case->problem_case == 6)
                อื่นๆ<br>
                @endif
            </td>

            @if(($case->receiver == $username )||($case->status == 1)||($username == "Adminfar")||($username == 'adminhatc'))

                @if($case->status == 99)
                    <td class="has-text-left" style=" white-space:nowrap;">ปฏิเสธการรับเรื่อง</td>
                    <td style=" white-space:nowrap;"><a class='tag is-medium is-danger has-text-white is-rounded'
                            href="{{ route('officer.open_dt', $case->case_id) }}">
                        <span>ดูรายละเอียด </span> </a> </td>
                @elseif( $case->status == 98)
                    <td class="has-text-left" style=" white-space:nowrap;">ยุติการดำเนินการ</td>
                    <td style=" white-space:nowrap;"><a class='tag is-medium is-danger has-text-white is-rounded'
                            href="{{ route('officer.open_dt', $case->case_id) }}">
                            <span>ดูรายละเอียด</span> </a> </td>
                @elseif( $case->status == 1)
                    <td class="has-text-left" style=" white-space:nowrap;">ยังไม่ได้รับเรื่อง</td>
                    <td style=" white-space:nowrap;"> <a class='tag is-medium is-danger has-text-white is-rounded'
                            href="{{ route('officer.open_cfm', $case->case_id) }}">
                            <span>รับเรื่อง</span> </a> </td>
                @elseif( $case->status == 2)
                    <td class="has-text-left" style=" white-space:nowrap;"> รับเรื่องแล้ว </td>
                    <td style=" white-space:nowrap;">
                        <a class='tag is-medium is-danger has-text-white is-rounded'
                            href="{{ route('officer.add_detail' , $case->case_id) }}">บันทึกข้อมูล</a>
                    </td>
                @elseif( $case->status >= 3)

                    @if($case->status == 3)
                        <td class="has-text-left"> บันทึกข้อมูลเพิ่มเติมแล้ว </td>
                    @elseif($case->status == 4)
                        <td class="has-text-left"> อยู่ระหว่างการดำเนินการ </td>
                    @elseif($case->status == 5)
                        <td class="has-text-left"> ดำเนินการเสร็จสิ้น </td>
                    @elseif($case->status ==6)
                        <td class="has-text-left">  ดำเนินการแล้วส่งต่อ </td>
                    @endif

                    <td><a class='tag is-medium is-danger has-text-white is-rounded'
                            href="{{ route('officer.add_activities' , $case->case_id) }}"> <span>
                                ดำเนินการ </span> </a> </td>
                @else

                    <td class="has-text-left"> รับเรื่องแล้ว </td>
                    <td class="has-text-left"><a class='tag is-medium is-danger has-text-white is-rounded' href="{{ route('data.detail2') }}"> <span> บันทึกข้อมูล
                            </span> </a>
                    </td>
                @endif

            @else

                @if($case->status == 99)
                    <td class="has-text-left">ปฏิเสธการรับเรื่อง</td>
                    <td>
                        <a class='tag is-medium is-danger has-text-white is-rounded'
                            href="{{ route('officer.open_dt', $case->case_id) }}"><span>ดูรายละเอียด</span> </a>
                    </td>
                @elseif( $case->status == 98)
                    <td class="has-text-left">ยุติการดำเนินการ</td>
                    <td>
                        <a class='tag is-medium is-danger has-text-white is-rounded'
                            href="{{ route('officer.open_dt', $case->case_id) }}"><span>ดูรายละเอียด</span> </a>
                    </td>
                @elseif( $case->status == 2)
                    <td class="has-text-left"> รับเรื่องแล้ว </td>
                    <td>
                        <a class='tag is-medium is-danger has-text-white is-rounded'
                            href="{{ route('officer.open_dt', $case->case_id) }}"><span>ดูรายละเอียด</span> </a>
                    </td>
                @elseif($case->status == 3)

                    <td class="has-text-left"> บันทึกข้อมูลเพิ่มเติมแล้ว </td>

                    @if(Auth::user()->position == 'admin' || Auth::user()->g_view_all == 'yes' || $ck_prev_transfer == 1)
                        <td>
                            <a class='tag is-medium is-danger has-text-white is-rounded'
                                href="{{ route('officer.view_detail2', $case->case_id) }}"><span>ดูรายละเอียด</span> </a>
                        </td>
                    @else

                        <?php $ck_share = 0; ?>
                        @foreach($sharecases as $sharecase)

                            @if($case->case_id == $sharecase->case_id)
                            <?php $ck_share++; ?>
                            @endif

                        @endforeach

                        @if($ck_share >0)

                            <td>
                                <a class='tag is-medium is-danger has-text-white is-rounded'
                                    href="{{ route('officer.view_detail2', $case->case_id) }}"><span>ดูรายละเอียด</span> </a>
                            </td>

                        @else

                            <td>
                                <a class='tag is-medium is-danger has-text-white is-rounded'
                                    href="{{ route('officer.open_dt', $case->case_id) }}"><span>ดูรายละเอียด </span> </a>
                            </td>

                        @endif

                    @endif
                @elseif($case->status == 4)

                    <td> อยู่ระหว่างการดำเนินการ </td>
                    @if(Auth::user()->position == 'admin' || Auth::user()->g_view_all == 'yes' || $ck_prev_transfer == 1)
                        <td>
                            <a class='tag is-medium is-danger has-text-white is-rounded'
                                href="{{ route('officer.view_activities', $case->case_id) }}"><span>ดูรายละเอียด</span> </a>
                        </td>
                    @else

                        <?php $ck_share = 0; ?>
                        @foreach($sharecases as $sharecase)

                            @if($case->case_id == $sharecase->case_id)
                            <?php $ck_share++; ?>
                            @endif

                        @endforeach

                        @if($ck_share > 0)

                            <td>
                                <a class='tag is-medium is-danger has-text-white is-rounded'
                                    href="{{ route('officer.view_activities', $case->case_id) }}"><span>ดูรายละเอียด</span> </a>
                            </td>

                        @else

                            <td>
                                <a class='tag is-medium is-danger has-text-white is-rounded'
                                    href="{{ route('officer.open_dt', $case->case_id) }}"><span>ดูรายละเอียด</span> </a>
                            </td>

                        @endif


                    @endif

                @elseif($case->status == 5)

                    <td class="has-text-left"> ดำเนินการเสร็จสิ้น </td>
                    @if(Auth::user()->position == 'admin' || Auth::user()->g_view_all == 'yes' || $ck_prev_transfer == 1 )
                        <td>
                            <a class='tag is-medium is-danger has-text-white is-rounded'
                                href="{{ route('officer.view_activities', $case->case_id) }}"><span>ดูรายละเอียด</span> </a>
                        </td>
                    @else
                        <?php $ck_share = 0; ?>
                        @foreach($sharecases as $sharecase)

                            @if($case->case_id == $sharecase->case_id)
                            <?php $ck_share++; ?>
                            @endif

                        @endforeach

                        @if($ck_share > 0)

                            <td>
                                <a class='tag is-medium is-danger has-text-white is-rounded'
                                    href="{{ route('officer.view_activities', $case->case_id) }}"><span>ดูรายละเอียด</span> </a>
                            </td>

                        @else

                            <td>
                                <a class='tag is-medium is-danger has-text-white is-rounded'
                                    href="{{ route('officer.open_dt', $case->case_id) }}"><span>ดูรายละเอียด</span> </a>
                            </td>

                        @endif
                    @endif
            
                @elseif($case->status == 6)
                    <td class="has-text-left"> ดำเนินการแล้วส่งต่อ </td>
                    @if(Auth::user()->position == 'admin' || Auth::user()->g_view_all == 'yes' || $ck_prev_transfer == 1 )
                        <td>
                            <a class='tag is-medium is-danger has-text-white is-rounded'
                                href="{{ route('officer.view_activities', $case->case_id) }}"><span>ดูรายละเอียด</span> </a>
                        </td>
                    @else
                        <?php $ck_share = 0; ?>
                        @foreach($sharecases as $sharecase)

                            @if($case->case_id == $sharecase->case_id)
                            <?php $ck_share++; ?>
                            @endif

                        @endforeach

                        @if($ck_share > 0)

                            <td>
                                <a class='tag is-medium is-danger has-text-white is-rounded'
                                    href="{{ route('officer.view_activities', $case->case_id) }}"><span>ดูรายละเอียด</span> </a>
                            </td>

                        @else

                            <td>
                                <a class='tag is-medium is-danger has-text-white is-rounded'
                                    href="{{ route('officer.open_dt', $case->case_id) }}"><span>ดูรายละเอียด</span> </a>
                            </td>

                            <!--td>
                                <a class='tag is-medium is-danger has-text-white is-rounded'
                                    href="{{ route('officer.view_activities', $case->case_id) }}"><span>ดูรายละเอียด</span> </a>
                            </td-->

                        @endif
                    @endif
                @endif

            @endif

            @if($case->sender_case == 1 )
            <td style=" white-space:nowrap;">แจ้งด้วยตนเอง</td>
            @elseif($case->sender_case == 2)
            <td style=" white-space:nowrap;">มีผู้แจ้งแทน</td>
            @elseif($case->sender_case == 3)
            <td style=" white-space:nowrap;">เจ้าหน้าที่แจ้ง</td>
            @else
            <td style=" white-space:nowrap;">ไม่มีข้อมูล</td>
            @endif

            <td style=" white-space:nowrap;"><a href='#' title='Receiver'>{{ $case->receiver }}</a></td>

            @if($username == "HisoDev")
            <td class="has-text-centered">
                <!--button type="button" class='tag is-medium is-danger is-rounded ' onclick="confirm_delete({{ $case->case_id }},1)" ><span>ลบข้อมูล</span> </button-->
                <button type="button" class='image is-32x32 '
                    onclick="confirm_delete(caseid{{$i}}.value)"><span><img class="is-rounded" src="{{ asset('images/trash-bin.png') }}" /></span> </button>
            </td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>

<div id="modal_deletecase" class="modal">
    <div class="modal-background"></div>
    <form role="form" method="POST" action="{{ route('manager.deletecase_cfm') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">ยืนยันการลบข้อมูล</p>
                <button type="button" class="delete" aria-label="close"></button>
            </header>
            <section class="modal-card-body">

                <input type="hidden" id="idcase_delete" name="idcase_delete" value="">

                <p class="is-size-5">ต้องการลบข้อมูล <span id="txt_idcase_delete" class="has-text-danger"></span> ใช่ไหม</p>
                <p >กรุณาตรวจสอบความถูกต้องข้อมูลก่อนยืนยันการลบข้อมูล</p>

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

<!-- datatable core JS-->
<script type="text/javascript" src="https://cdn.datatables.net/v/bm/dt-1.13.1/datatables.min.js"></script>

<script>
$(document).ready(function() {
    $('#table_show').DataTable({
        "bLengthChange": false,
        "searching": false,
        "pageLength": 30
    });
});

function confirm_delete(idcase) {
    
    //alert(idcase);

    $('#idcase_delete').val(idcase);
    $('#txt_idcase_delete').html(idcase);
    
    $('#modal_deletecase').addClass('is-active');
}

$('.modal-background').on('click', function(e) { 
    $('#modal_deletecase').removeClass('is-active');
})

$('.delete').on('click', function(e) { 
    $('#modal_deletecase').removeClass('is-active');
})

$('.modalclose').on('click', function(e) { 
    $('#modal_deletecase').removeClass('is-active');
})

$('table.paginated').each(function() {
    var currentPage = 0;
    var numPerPage = 30;
    var $table = $(this);
    $table.bind('repaginate', function() {
        $table.find('tbody tr').hide().slice(currentPage * numPerPage, (currentPage + 1) * numPerPage)
            .show();
    });
    $table.trigger('repaginate');
    var numRows = $table.find('tbody tr').length;
    var numPages = Math.ceil(numRows / numPerPage);
    var $pager = $('<div class="pagination is-centered"></div>');
    var $previous = $('<span class="pagination-previous">Previous</span>');
    var $next = $('<span class="pagination-next">Next page</span>');
    var $page_area1 = $('<ul class="pagination-list"></ul>');
    for (var page = 0; page < numPages; page++) {
        $('<span class="pagination-link"></span>').text(page + 1).bind('click', {
            newPage: page
        }, function(event) {
            currentPage = event.data['newPage'];
            $table.trigger('repaginate');
            $(this).addClass('is-current').siblings().removeClass('is-current');
        }).appendTo($page_area1).addClass('is-static');
    }

    $pager.insertBefore($table);


    $page_area1.appendTo($pager).find('span.pagination-link:first').addClass('is-current');;
    $previous.insertBefore($page_area1);
    $next.insertBefore($page_area1);

    $next.click(function(e) {
        $previous.addClass('is-static');
        $pager.find('.is-current').next('.pagination-link.is-static').click();
    });
    $previous.click(function(e) {
        $next.addClass('is-static');
        $pager.find('.is-current').prev('.pagination-link.is-static').click();
    });
    $table.on('repaginate', function() {
        $next.addClass('is-static');
        $previous.addClass('is-static');

        setTimeout(function() {
            var $active = $pager.find('.pagination-link.is-current');
            if ($active.next('.pagination-link.is-static').length === 0) {
                $next.removeClass('is-static');
            } else if ($active.prev('.pagination-link.is-static').length === 0) {
                $previous.removeClass('is-static');
            }
        });
    });
    $table.trigger('repaginate');
});
</script>
{{--{{ $cases->links('component.pagination') }}--}}
{{--{{$cases->links()}}--}}