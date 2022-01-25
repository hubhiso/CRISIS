@foreach($operate_datas as $operate_data)

<div class="field is-horizontal">
    <div class="field-label">
        <!-- Left empty for spacing -->
    </div>
</div>

<div id="result_ac" class="">

    <div class="field is-horizontal">
        <div class="field-label ">
            <label class="label"> แก้ไขวันที่ดำเนินการ </label>
        </div>
        <div class="field-body">
            <div class="columns" data-provide="datepicker">
                <div class="column has-text-left">
                    ปี พ.ศ.
                    <input style="width: 100px;" type="number" min="1900" max="2070" maxlength="4"
                        id="YearEdit{{$operate_data->id}}" name="YearEdit" class="form-control input"
                        placeholder="{{ trans('message.txt_year_h') }}"
                        value="{{date('Y',strtotime(str_replace('-','/', $operate_data->operate_date))) + 543 }}"
                        onchange="edit_DateOperate({{$operate_data->id}})">
                </div>
                <div class="column has-text-left">
                    เดือน
                    <div class="select">
                        <select id="MonthEdit{{$operate_data->id}}" name="MonthEdit"
                            onchange="edit_DateOperate({{$operate_data->id}})">
                            <option value="1" @if(date('m',strtotime(str_replace('-','/', $operate_data->operate_date)))
                                == 1){
                                selected } @endif> มกราคม </option>
                            <option value="2" @if(date('m',strtotime(str_replace('-','/', $operate_data->operate_date)))
                                == 2){
                                selected } @endif> กุมภาพันธ์ </option>
                            <option value="3" @if(date('m',strtotime(str_replace('-','/', $operate_data->operate_date)))
                                == 3){
                                selected } @endif> มีนาคม </option>
                            <option value="4" @if(date('m',strtotime(str_replace('-','/', $operate_data->operate_date)))
                                == 4){
                                selected } @endif> เมษายน </option>
                            <option value="5" @if(date('m',strtotime(str_replace('-','/', $operate_data->operate_date)))
                                == 5){
                                selected } @endif> พฤษภาคม </option>
                            <option value="6" @if(date('m',strtotime(str_replace('-','/', $operate_data->operate_date)))
                                == 6){
                                selected } @endif> มิถุนายน </option>
                            <option value="7" @if(date('m',strtotime(str_replace('-','/', $operate_data->operate_date)))
                                == 7){
                                selected } @endif> กรกฎาคม </option>
                            <option value="8" @if(date('m',strtotime(str_replace('-','/', $operate_data->operate_date)))
                                == 8){
                                selected } @endif> สิงหาคม </option>
                            <option value="9" @if(date('m',strtotime(str_replace('-','/', $operate_data->operate_date)))
                                == 9){
                                selected } @endif> กันยายน </option>
                            <option value="10" @if(date('m',strtotime(str_replace('-','/', $operate_data->
                                operate_date))) == 10){
                                selected } @endif> ตุลาคม </option>
                            <option value="11" @if(date('m',strtotime(str_replace('-','/', $operate_data->
                                operate_date))) == 11){
                                selected } @endif> พฤศจิกายน </option>
                            <option value="12" @if(date('m',strtotime(str_replace('-','/', $operate_data->
                                operate_date))) == 12){
                                selected } @endif> ธันวาคม </option>
                        </select>
                    </div>
                </div>

                <div class="column  has-text-left">
                    {{ trans('message.txt_day') }}
                    <div class="select">
                        <select id="DayEdit{{$operate_data->id}}" name="DayEdit">
                            @for ($i = 1; $i <= 31; $i++) <option value="{{$i}}"
                                @if(date('d',strtotime(str_replace('-','/', $operate_data->operate_date))) == $i){
                                selected } @endif>{{$i}}
                                </option>
                                @endfor
                        </select>
                    </div>
                </div>

                <div class="column  is-3">
                    <input type="hidden" id="DateAct" name="DateAct" class="form-control" value="{{date('m/d/Y')}}">
                    <input type="hidden" id="year_hidden" name="year_hidden" class="form-control" value="{{date('Y')}}">
                </div>
            </div>
        </div>
    </div>

    <div class="field is-horizontal">
        <div class="field-label">
            <label class="label"> วิธีการดำเนินการ </label>
        </div>
        <div class="field-body">
            <div class="field is-grouped">
                <div class="control">
                    <label>
                        <input type="checkbox" name="edit_investigate" id="edit_investigate{{$operate_data->id}}"
                            @if($operate_data->investigate == 1 ) checked @endif>
                        สืบหาข้อเท็จจริง
                    </label>
                </div>
                <div class="control">
                    <label>
                        <input type="checkbox" name="edit_advice" id="edit_advice{{$operate_data->id}}"
                            @if($operate_data->advice == 1 ) checked @endif >
                        ให้คำปรึกษา
                    </label>
                </div>
                <div class="control">
                    <label>
                        <input type="checkbox" name="edit_negotiate_individual"
                            id="edit_negotiate_individual{{$operate_data->id}}" @if($operate_data->negotiate_individual
                        == 1 ) checked @endif>
                        เจรจาเป็นรายบุคคล
                    </label>
                </div>
                <div class="control">
                    <label>
                        <input type="checkbox" name="edit_negotiate_policy"
                            id="edit_negotiate_policy{{$operate_data->id}}" @if($operate_data->negotiate_policy == 1 )
                        checked @endif>
                        เจรจาระดับนโยบายขององค์กร
                    </label>
                </div>
                <div class="control">
                    <label>
                        <input type="checkbox" name="edit_prosecution" id="edit_prosecution{{$operate_data->id}}"
                            @if($operate_data->prosecution == 1 ) checked @endif>
                        ดำเนินคดี
                    </label>
                </div>
            </div>
        </div>
    </div>




    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label">รายละเอียดการดำเนินการ</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    <textarea class="textarea" name="edit_operate_detail" id="edit_operate_detail{{$operate_data->id}}"
                        placeholder="กรอกรายละเอียด">{{$operate_data->operate_detail}}</textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label">ผลการดำเนินการ</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    <textarea class="textarea" name="edit_operate_result" id="edit_operate_result{{$operate_data->id}}"
                        placeholder="กรอกรายละเอียด">{{$operate_data->operate_result}}</textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label"></label>
        </div>
        <div class="field-body">
            <div class="field is-grouped">
                <div class="control">
                    <p class="control"> <a class="button is-primary" id="edit_operate_send"
                            onclick="update_operate({{$operate_data->id}})"> ยืนยัน </a> </p>
                </div>
                <div class="control">
                    <p class="control"> <a class="button" onclick="clear_edit({{$operate_data->id}})"> ยกเลิก </a> </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

<?php
/**
 * Created by PhpStorm.
 * User: tonglar
 * Date: 9/8/2017 AD
 * Time: 12:44 PM
 */