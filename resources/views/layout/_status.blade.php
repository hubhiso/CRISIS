<?php 
    $step=1;

    //$step=2;
    //$step=3;
?>

@if(Config::get('app.locale') == 'en')
    <?php 
        $thaimonth = ["","Jan.","Feb.","Mar.","Apr.","May","Jun.","Jul.","Jul.","Sep.","Oct.","Nov.","Dec."];
    ?>
@elseif(Config::get('app.locale') == 'th')
    <?php 
        $thaimonth = ["","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค."];
    ?>
@endif

{{-- @foreach($data as $Semidata)
 {{ $Semidata }}
@endforeach --}}

<div class="timeline">
    <br>
</div>

@foreach($data as $Semidata)

    <input type="hidden" id="fcase" value="{{$Semidata->case_id}}">
    {{-- @if ($step==1) --}}
   
    @if ($step == 1)

    <div class="timeline-item">

            @if($Semidata->operate_status == 1 )
                <div class="timeline-icon">
                    <img src="images/markx40.png" alt="">
                </div>
                <div class="timeline-content">
                    <h2> 
                        @if(Config::get('app.locale') == 'en')
                            {{date('d',strtotime(str_replace('-','/', $Semidata->operate_time)))}} {{$thaimonth[date('n',strtotime(str_replace('-','/', $Semidata->operate_time)))]}} {{date("Y",strtotime(str_replace('-','/', $Semidata->operate_time)))}}
                        @elseif(Config::get('app.locale') == 'th')
                            {{date('d',strtotime(str_replace('-','/', $Semidata->operate_time)))}} {{$thaimonth[date('n',strtotime(str_replace('-','/', $Semidata->operate_time)))]}} {{date("Y",strtotime(str_replace('-','/', $Semidata->operate_time)))+543}}
                        @endif
                    </h2>
                    <p>
                        {{ trans('message.tx_status1') }}
                    </p>

                </div>
            @else
                <div class="timeline-icon">
                    <img src="images/minusx40.png" alt="">
                </div>
                <div class="timeline-content">
                    <h2> </h2>
                    <p>
                        {{ trans('message.tx_status1') }}
                    </p>
                </div>
            @endif

        <? //$step++; ?>

    </div>


    @endif


    @if ($step == 2)

    <div class="timeline-item">

        @if($Semidata->operate_status == 2 )
        
            <div class="timeline-icon">
                <img src="images/markx40.png" alt="">
            </div>
            
            <div class="timeline-content right">
                <h2> 
                    @if(Config::get('app.locale') == 'en')
                        {{date('d',strtotime(str_replace('-','/', $Semidata->operate_time)))}} {{$thaimonth[date('n',strtotime(str_replace('-','/', $Semidata->operate_time)))]}} {{date("Y",strtotime(str_replace('-','/', $Semidata->operate_time)))}}
                    @elseif(Config::get('app.locale') == 'th')
                        {{date('d',strtotime(str_replace('-','/', $Semidata->operate_time)))}} {{$thaimonth[date('n',strtotime(str_replace('-','/', $Semidata->operate_time)))]}} {{date("Y",strtotime(str_replace('-','/', $Semidata->operate_time)))+543}}
                    @endif
                </h2>
                <p>
                    {{ trans('message.tx_status2_1') }}
                </p>
            </div>
        @else
        <div class="timeline-icon">
            <img src="images/minusx40.png" alt="">
        </div>
        <div class="timeline-content right">
            <h2> </h2>
            <p>
                {{ trans('message.tx_status2_1') }}
            </p>
        </div>

        @endif
        <? //$step++; ?>
    </div>


    @endif

    {{-- @if ($step==3) --}}

    @if ($step==3)
    <div class="timeline-item">
        @if($Semidata->operate_status == 3 )
        <div class="timeline-icon">
            <img src="images/markx40.png" alt="">
        </div>
        <div class="timeline-content">
            <h2> 
                @if(Config::get('app.locale') == 'en')
                    {{date('d',strtotime(str_replace('-','/', $Semidata->operate_time)))}} {{$thaimonth[date('n',strtotime(str_replace('-','/', $Semidata->operate_time)))]}} {{date("Y",strtotime(str_replace('-','/', $Semidata->operate_time)))}}
                @elseif(Config::get('app.locale') == 'th')
                    {{date('d',strtotime(str_replace('-','/', $Semidata->operate_time)))}} {{$thaimonth[date('n',strtotime(str_replace('-','/', $Semidata->operate_time)))]}} {{date("Y",strtotime(str_replace('-','/', $Semidata->operate_time)))+543}}
                @endif
            </h2>
            <p>
                {{ trans('message.tx_status3_1') }}
            </p>
        </div>
        @else
        <div class="timeline-icon">
            <img src="images/minusx40.png" alt="">
        </div>
        <div class="timeline-content">
            <h2> - </h2>
            <p>
                {{ trans('message.tx_status3_1') }}
            </p>
        </div>

        @endif
        <? //$step++; ?>
    </div>

    @endif


    @if ($step==4)
    <div class="timeline-item">
        @if($Semidata->operate_status == 4 )
        <div class="timeline-icon">
            <img src="images/markx40.png" alt="">
        </div>
        <div class="timeline-content right">
            <h2> 
                @if(Config::get('app.locale') == 'en')
                    {{date('d',strtotime(str_replace('-','/', $Semidata->operate_time)))}} {{$thaimonth[date('n',strtotime(str_replace('-','/', $Semidata->operate_time)))]}} {{date("Y",strtotime(str_replace('-','/', $Semidata->operate_time)))}}
                @elseif(Config::get('app.locale') == 'th')
                    {{date('d',strtotime(str_replace('-','/', $Semidata->operate_time)))}} {{$thaimonth[date('n',strtotime(str_replace('-','/', $Semidata->operate_time)))]}} {{date("Y",strtotime(str_replace('-','/', $Semidata->operate_time)))+543}}
                @endif
            </h2>
            <p>
                {{ trans('message.tx_status4_1') }}
            </p>
        </div>
        @else
        <div class="timeline-icon">
            <img src="images/minusx40.png" alt="">
        </div>
        <div class="timeline-content">
            <h2> - </h2>
            <p>
                {{ trans('message.tx_status4_1') }}
            </p>
        </div>

        @endif
        <? //$step++; ?>
    </div>

    @endif


    @if ($step==5)
    <div class="timeline-item">
        @if($Semidata->operate_status == 5 or $Semidata->operate_status == 6 )
        <div class="timeline-icon">
            <img src="images/markx40.png" alt="">
        </div>
        <div class="timeline-content">
            <h2> 
                @if(Config::get('app.locale') == 'en')
                    {{date('d',strtotime(str_replace('-','/', $Semidata->operate_time)))}} {{$thaimonth[date('n',strtotime(str_replace('-','/', $Semidata->operate_time)))]}} {{date("Y",strtotime(str_replace('-','/', $Semidata->operate_time)))}}
                @elseif(Config::get('app.locale') == 'th')
                    {{date('d',strtotime(str_replace('-','/', $Semidata->operate_time)))}} {{$thaimonth[date('n',strtotime(str_replace('-','/', $Semidata->operate_time)))]}} {{date("Y",strtotime(str_replace('-','/', $Semidata->operate_time)))+543}}
                @endif        
            </h2>
            <p>
                {{ trans('message.tx_status5_1') }}
            </p>
        </div>
        @else
        <div class="timeline-icon">
            <img src="images/minusx40.png" alt="">
        </div>
        <div class="timeline-content">
            <h2> - </h2>
            <p>
                {{ trans('message.tx_status5_1') }}
            </p>
        </div>

        @endif
        <? //$step++; ?>

    @endif


    <?php $step++; ?>

@endforeach

    <div class="timeline-item">

        @if ($step==1)
        <div class="timeline-icon">
            <img src="images/minusx40.png" alt="">
        </div>
        <div class="timeline-content">
            <h2> - </h2>
            <p>
                {{ trans('message.tx_status1') }}
            </p>
        </div>
        @endif
    </div>
    <div class="timeline-item">
        @if ($step==2)
        <div class="timeline-icon">
            <img src="images/minusx40.png" alt="">
        </div>
        <div class="timeline-content">
            <h2> - </h2>
            <p>
                {{ trans('message.tx_status2_1') }}
            </p>
        </div>
        @endif
    </div>
    <div class="timeline-item">
        @if ($step==3 or $step==2)

        <div class="timeline-icon">
            <img src="images/minusx40.png" alt="">
        </div>
        <div class="timeline-content">
            <h2> - </h2>
            <p>
                {{ trans('message.tx_status3_1') }}
            </p>

        </div>
        @endif
    </div>
    <div class="timeline-item">
        @if ($step==4 or $step==3 or $step==2)
        <div class="timeline-icon">
            <img src="images/minusx40.png" alt="">
        </div>
        <div class="timeline-content">
            <h2> - </h2>
            <p>
                {{ trans('message.tx_status4_1') }}
            </p>
        </div>
        @endif
    </div>
    <div class="timeline-item">
        @if ($step==5 or $step==4 or $step==3 or $step==2)
        <div class="timeline-icon">
            <img src="images/minusx40.png" alt="">
        </div>
        <div class="timeline-content">
            <h2> - </h2>
            <p>
                {{ trans('message.tx_status5_1') }}
            </p>
        </div>
        @endif
    </div>
</div>