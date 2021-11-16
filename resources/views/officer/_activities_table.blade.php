
@foreach($activities as $activitie)

<div class="box">
<!--This container is <strong>centered</strong> on desktop. -->
<div class="field is-horizontal">
    <div class="field-label">
        <!-- Left empty for spacing -->
    </div>

</div>
<!-- operate case -->

<div  class="field is-horizontal">
    <div class="field-label is-normal">
        <label class="label">วันที่ดำเนินการ</label>
    </div>
    <div class="field-body">
        <div class="field is-grouped">
            <p class="control  has-icons-left ">

                <input class="input" type="text" placeholder="" value="{{$activitie->operate_date}}" disabled>

            </p>
        </div>
    </div>
    <div class="field is-grouped">
        <p><a> </a>
        </p>
        <p class="control"> 

            <a class="button is-primary" onclick="edit_operate({{$activitie->id}})"><i class="fas fa-pencil-alt"></i>&nbsp;แก้ไข</a> </p>
    </div>
</div>
<!-- operate case -->
<div class="field is-horizontal">
    <div class="field-label">
        <!-- Left empty for spacing -->
        <div id="edit_area{{$activitie->id}}"></div>
    </div>

</div>

</div>
@endforeach

<?php
/**
* Created by PhpStorm.
* User: tonglar
* Date: 8/28/2017 AD
* Time: 1:55 PM
*/
?>
