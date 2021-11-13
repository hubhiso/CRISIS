$('#problem_case').on('change',function (e) {
    var prob_id = e.target.value;
    //console.log(prob_id);
    $('#group_code').empty();
    $('#group_code').attr('disabled', 'disabled');
    if((prob_id==1)||(prob_id==5)||(prob_id==6)){
        $('#sub_problem').empty();
        $('#sub_problem').removeAttr('disabled');
        $('#sub_problem').append('<option value="1" style="width:250px">People Living with HIV (PLHIV)</option>');
        $('#sub_problem').append('<option value="2" style="width:250px">Vulnerable group</option>');
        $('#sub_problem').append('<option value="4" style="width:250px">Family members/ people close to PLHIV</option>');
        $('#sub_problem').append('<option value="3" style="width:250px">General population</option>');
    }else if(prob_id==2){
        $('#sub_problem').empty();
        $('#sub_problem').removeAttr('disabled');
        $('#sub_problem').append('<option value="1" >People Living with HIV (PLHIV) </option>');
    }else if(prob_id==3){
        $('#sub_problem').empty();
        $('#sub_problem').removeAttr('disabled');
        $('#sub_problem').append('<option value="1" >People Living with HIV (PLHIV)</option>');
        $('#sub_problem').append('<option value="4" >Family members/ people close to PLHIV</option>');
    }else if(prob_id==4){
        $('#sub_problem').empty();
        $('#sub_problem').removeAttr('disabled');
        $('#sub_problem').append('<option value="2" style="width:250px">Vulnerable group</option>');
        $('#group_code').empty();
        $('#group_code').removeAttr('disabled');
        $('#group_code').append('<option value="1" style="width:250px">LGBTI people</option>');
        $('#group_code').append('<option value="2" style="width:250px">Sex Worker  </option>');
        $('#group_code').append('<option value="3" style="width:250px">People Who use Drugs (PWID)</option>');
        $('#group_code').append('<option value="4" style="width:250px">Migrant Worker</option>');
        $('#group_code').append('<option value="5" style="width:250px">Detainee</option>');
        $('#group_code').append('<option value="6" style="width:250px">Members of an ethnic minority/tribal group</option>');
        $('#group_code').append("<option value='7' style='width:250px'>Handicapped</option>");

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
        $('#group_code').append('<option value="1" style="width:250px">LGBTI people</option>');
        $('#group_code').append('<option value="2" style="width:250px">Sex Worker</option>');
        $('#group_code').append('<option value="3" style="width:250px">People Who use Drugs (PWID)</option>');
        $('#group_code').append('<option value="4" style="width:250px">Migrant Worker</option>');
        $('#group_code').append('<option value="5" style="width:250px">Detainee</option>');
        $('#group_code').append('<option value="6" style="width:250px">Members of an ethnic minority/tribal group</option>');
        $('#group_code').append("<option value='7' style='width:250px'>Handicapped</option>");

    }else{
        $('#group_code').empty();
        $('#group_code').attr('disabled', 'disabled');
    }
});