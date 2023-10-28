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

    <link href="{{ asset('bulma-0.9.0/css/bulma.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mystyles.css') }}" rel="stylesheet">
    <script src="{{ asset('css/jquery.min.js') }}"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" crossorigin="anonymous">

    {{ Html::script('js/jquery.min.js') }}

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
                                <i class="fa fa-users"></i>
                            </span>
                            <span>จัดการรายชื่อ</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <div class="content">
                <h3>
                    <sapn class="has-text-danger"><i class="fa fa-users"></i></sapn>
                    &nbsp;รายชื่อเจ้าหน้าที่
                </h3>


                <div class=" table-container">
                    <table id="table_m" class="table is-fullwidth is-striped is-hoverable panel"
                        style="white-space: nowrap;">
                        <thead>
                            <tr>
                                <th class="has-text-danger">ลำดับ</th>

                                <th style="display:none;"></th>
                                <th class="has-text-danger">เข้าใช้</th>
                                <th class="has-text-danger" style="white-space: nomal; max-width: 60px">ชื่อ</th>
                                <th class="has-text-danger" style="white-space: nomal; max-width: 60px">หน่วยงาน</th>
                                <th class="has-text-danger" >เบอร์ติดต่อ</th>
                                <th class="has-text-danger" >Email</th>
                                <th style="display:none;"></th>
                                <th class="has-text-danger">ตำแหน่ง</th>
                                <th style="display:none;"></th>
                                <th class="has-text-danger">กลุ่ม</th>
                                <th style="display:none;"></th>
                                <th class="has-text-danger">ดูทั้งหมดในกลุ่ม</th>
                                <th class="has-text-danger">เขต</th>
                                <th style="display:none;"></th>
                                <th class="has-text-danger">จังหวัด</th>

                                <th class="has-text-danger">Login ล่าสุด</th>
                                <th class="has-text-danger" style="white-space: nomal; max-width: 60px">ไม่ได้ Login
                                </th>
                                <th style="display:none;"></th>
                                <th class="has-text-danger">ดูเคสทั้งหมด</th>
                                <th style="display:none;"></th>
                                <th class="has-text-danger">รับเคส</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1 ?>
                            @foreach($show_list as $show)

                            <?php $se_prov = "<p class='has-text-secondary'><i class='fas fa-minus-circle'></i></p>"; ?>
                            @foreach($show_prov as $prov)
                            <?php 
                                    if($show->prov_id == $prov->PROVINCE_CODE){
                                        $se_prov = $prov->PROVINCE_NAME;
                                    }
                                ?>
                            @endforeach

                            <tr>
                                <td>{{$i}}</td>

                                

                                <td style="display:none;">{{$show->active}}</td>
                                <td>
                                    @if($show->active == 'no')
                                    <p class="has-text-secondary"><i class="fas fa-minus-circle"></i></p>
                                    @elseif($show->active == 'yes')
                                    <p class="has-text-success"><i class="fas fa-check-circle"></i></p>
                                    @else
                                    <p class="has-text-secondary"><i class="fas fa-minus-circle"></i></p>
                                    @endif
                                </td>

                                <td>{{$show->name}}</td>
                                <td>{{$show->nameorg}}</td>
                                <td >{{$show->tel}}</td>
                                <td >{{$show->email}}</td>
                                <td style="display:none;">{{$show->position}}</td>

                                <td>
                                    <?php
                                        if($show->position == "admin"){
                                            echo "admin";
                                        }elseif($show->position == "officer"){
                                            echo "เจ้าหน้าที่";
                                        }elseif($show->position == "manager"){
                                            echo "ผู้ดูแลระดับจังหวัด";
                                        }elseif($show->position == "manager_area"){
                                            echo "ผู้ดูแลระดับเขต";
                                        }
                                    ?>
                                </td>

                                <td style="display:none;">{{$show->group}}</td>

                                <td>
                                    @if($show->groupname == '')
                                    <p class="has-text-secondary"><i class="fas fa-minus-circle"></i></p>
                                    @else
                                    {{$show->groupname}}
                                    @endif
                                </td>

                                <td style="display:none;">{{$show->g_view_all}}</td>
                                <td>
                                    @if($show->g_view_all == 'no')
                                    <p class="has-text-secondary"><i class="fas fa-minus-circle"></i></p>
                                    @elseif($show->g_view_all == 'yes')
                                    <p class="has-text-success"><i class="fas fa-check-circle"></i></p>
                                    @else
                                    <p class="has-text-secondary"><i class="fas fa-minus-circle"></i></p>
                                    @endif
                                </td>


                                <td>
                                    @if($show->area_id < 1) <p class="has-text-secondary"><i
                                            class="fas fa-minus-circle"></i></p>
                                        @else
                                        {{$show->area_id}}
                                        @endif
                                </td>

                                <td style="display:none;">{{$show->prov_id}}</td>
                                <td><?php echo $se_prov ?></td>



                                <td>
                                    @if( $show->last_login_at == '')
                                    ไม่มีข้อมูล
                                    @else
                                    {{ date('d-m-Y', strtotime($show->last_login_at))}}
                                    @endif
                                </td>
                                <td>
                                    @if( date_diff(new \DateTime($show->last_login_at), new \DateTime())->format("%m
                                    เดือน,%d วัน") == 0 and $show->last_login_at == '')
                                    ยังไม่ได้ Login
                                    @elseif($show->last_login_at <> '')
                                        {{ date_diff(new \DateTime($show->last_login_at), new \DateTime())->format("%m เดือน, %d วัน") }}
                                        @endif

                                        &nbsp;&nbsp;
                                        <?php 
                                    $datedifflogin = date_diff(new \DateTime($show->last_login_at), new \DateTime())->format("%m") 
                                    ?>
                                        @if($datedifflogin >= "3" and $show->mailwarning == "yes")
                                        <a class="tag is-danger is-light " href="#" diabled><i
                                                class="fas fa-envelope">&nbsp;แจ้งเตือนแล้ว</i>
                                        </a>
                                        @elseif($datedifflogin >= "3" )
                                        <a class="tag is-danger " href="#" id="lanuchModal"
                                            onClick="confirmmail('{{$show->email}}','{{$show->username}}')"><i
                                                class="fas fa-envelope">&nbsp;แจ้งเตือน</i>
                                        </a>
                                        @endif
                                </td>

                                <td style="display:none;">{{$show->p_view_all}}</td>
                                <td>
                                    @if($show->p_view_all == 'no')
                                    <p class="has-text-secondary"><i class="fas fa-minus-circle"></i></p>
                                    @else
                                    <p class="has-text-success"><i class="fas fa-check-circle"></i></p>
                                    @endif
                                </td>

                                <td style="display:none;">{{$show->p_receive}}</td>
                                <td>
                                    @if($show->p_receive == 'no')
                                    <p class="has-text-secondary"><i class="fas fa-minus-circle"></i></p>
                                    @else
                                    <p class="has-text-success"><i class="fas fa-check-circle"></i></p>
                                    @endif
                                </td>



                            </tr>

                            <?php $i++ ?>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>


    @extends('officer.footer_m')



    <script src="{{ asset('bulma/clipboard-1.7.1.min.js') }}"></script>
    <script src="{{ asset('bulma/main.js') }}"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/v/bm/jq-3.6.0/dt-1.11.3/datatables.min.js"></script>


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

    $(document).ready(function() {

        var o_table = $('#table_m').DataTable({
            language: {
                searchPlaceholder: "",
                search: "ค้นหา",
            },
            "pageLength": 25
        });

        <?php foreach($show_prov as $prov){ ?>

        $('#e_prov').append($("<option></option>").attr("value", "<?php echo $prov->PROVINCE_CODE ?>").text(
            '<?php echo $prov->PROVINCE_NAME ?>'));

        <?php } ?>

        <?php foreach($show_group as $group){ ?>

        $('#e_group').append($("<option></option>").attr("value", "<?php echo $group->code ?>").text(
            '<?php echo $group->groupname ?>'));

        <?php } ?>


        o_table.on('click', '.edit_form', function() {

            $tr = $(this).closest('tr');
            var data = o_table.row($tr).data();

            $('#e_username').val(data[1]);
            $('#e_active').val(data[3]);
            $('#e_name').val(data[5]);
            $('#e_nameorg').val(data[6]);
            $('#e_tel').val(data[7]);
            $('#e_email').val(data[8]);
            $('#e_position').val(data[10]);


            if (data[15] == '<p class="has-text-secondary"><i class="fas fa-minus-circle"></i></p>') {
                $('#e_area').val('0');
                $('#e_area').prop('disabled', true);
            } else {
                $('#e_area').val(data[15]);
                $('#e_area').prop('disabled', false);
            }

            if (data[17] == '<p class="has-text-secondary"><i class="fas fa-minus-circle"></i></p>') {
                $('#e_prov').val('0');
                $('#e_prov').prop('disabled', true);
            } else {
                $('#e_prov').val(data[16]);
                $('#e_prov').prop('disabled', false);

            }


            $('#e_group').val(data[11]);
            if (data[13] == "yes") {
                $('#e_v_group').val(data[13]);
            } else {
                $('#e_v_group').val('no');
            }

            if (data[20] == "yes") {
                $('#e_viewall').val(data[20]);
            } else {
                $('#e_viewall').val('no');
            }


            if (data[22] == "yes") {
                $('#e_receiver').val(data[22]);
            } else {
                $('#e_receiver').val('no');
            }

            $('#edit_officer').attr('action', 'e_officer/' + data[1]);
        });


    });

    
</script>

</body>

</html>