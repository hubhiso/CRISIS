$('#problem_case').on('change',function (e) {
    var prob_id = e.target.value;
    //console.log(prob_id);
    $('#group_code').empty();
    $('#group_code').attr('disabled', 'disabled');
    if((prob_id==1)||(prob_id==5)||(prob_id==6)){
        $('#sub_problem').empty();
        $('#sub_problem').removeAttr('disabled');
        $('#sub_problem').append('<option value="1" style="width:250px">ผู้ติดเชื้อเอชไอวี</option>');
        $('#sub_problem').append('<option value="2" style="width:250px">กลุ่มเปราะบาง</option>');
        $('#sub_problem').append('<option value="4" style="width:250px">ครอบครัวและผู้ใกล้ชิดผู้ติดเชื้อเอชไอวี</option>');
        $('#sub_problem').append('<option value="3" style="width:250px">ประชาชนทั่วไป</option>');
    }else if(prob_id==2){
        $('#sub_problem').empty();
        $('#sub_problem').removeAttr('disabled');
        $('#sub_problem').append('<option value="1" >ผู้ติดเชื้อเอชไอวี</option>');
    }else if(prob_id==3){
        $('#sub_problem').empty();
        $('#sub_problem').removeAttr('disabled');
        $('#sub_problem').append('<option value="1" >ผู้ติดเชื้อเอชไอวี</option>');
        $('#sub_problem').append('<option value="4" >ครอบครัวและผู้ใกล้ชิดผู้ติดเชื้อเอชไอวี</option>');
    }else if(prob_id==4){
        $('#sub_problem').empty();
        $('#sub_problem').removeAttr('disabled');
        $('#sub_problem').append('<option value="2" style="width:250px">กลุ่มเปราะบาง</option>');
        $('#group_code').empty();
        $('#group_code').removeAttr('disabled');
        $('#group_code').append('<option value="1" style="width:250px">กลุ่มหลากหลายทางเพศ</option>');
        $('#group_code').append('<option value="2" style="width:250px">พนักงานบริการ </option>');
        $('#group_code').append('<option value="3" style="width:250px">ผู้ใช้สารเสพติด</option>');
        $('#group_code').append('<option value="4" style="width:250px">ประชากรข้ามชาติ</option>');
        $('#group_code').append('<option value="5" style="width:250px">ผู้ถูกคุมขัง</option>');
        $('#group_code').append('<option value="6" style="width:250px">กลุ่มชาติพันธุ์และชนเผ่า</option>');
        $('#group_code').append('<option value="7" style="width:250px">ผู้พิการ</option>');


    }else{
        $('#sub_problem').empty();
        $('#sub_problem').attr('disabled', 'disabled');
    }
});
$('#sub_problem').on('change',function (e) {
    var sub_id = e.target.value;
    if(sub_id==2){
        $('#group_code').empty();
        $('#group_code').removeAttr('disabled');
        $('#group_code').append('<option value="1" style="width:250px">กลุ่มหลากหลายทางเพศ</option>');
        $('#group_code').append('<option value="2" style="width:250px">พนักงานบริการ</option>');
        $('#group_code').append('<option value="3" style="width:250px">ผู้ใช้สารเสพติด</option>');
        $('#group_code').append('<option value="4" style="width:250px">ประชากรข้ามชาติ</option>');
        $('#group_code').append('<option value="5" style="width:250px">ผู้ถูกคุมขัง</option>');
        $('#group_code').append('<option value="6" style="width:250px">กลุ่มชาติพันธุ์และชนเผ่า</option>');
        $('#group_code').append('<option value="7" style="width:250px">ผู้พิการ</option>');


    }else{
        $('#group_code').empty();
        $('#group_code').attr('disabled', 'disabled');
    }
});