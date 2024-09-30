<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta name="theme-color" content="#ab3c3c" />
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">

    <link href="{{ asset('bulma-0.8.0/css/bulma.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mystyles.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300&display=swap" rel="stylesheet">
    <script src="js/jquery.min.js"></script>
    <link href="{{ asset('css/font-awesome5.0.6/css/fontawesome-all.css') }}" rel="stylesheet">
	<link href="{{ asset('css/base.css') }}" rel="stylesheet">

	<script src="{{ asset('bulma/main.js') }}"></script>

	<title> ปกป้อง (CRS) </title>

</head>

<body>
	<input type="hidden" id="token" value="{{ csrf_token() }}">
	
	<section class="hero is-primary wall3">
		<div class="hero-body">
			<div class="container">
				<div class="columns is-vcentered">
					<div class="column">
						<p class="title"> Crisis Response System (CRS) </p>
					</div>
				</div>
			</div>
		</div>
	</section>


	<div class="navbar has-background-light">
		<div class="navbar-end has-text-right">
			<div class="navbar-item">

				@if(Config::get('app.locale') == 'en')

				<a class="button is-danger is-inverted is-rounded is-small" href="{{ URL::to('change/th') }}"> Thai
					Site&nbsp;
					<span class="fa-stack fa-1x">
						<i class="fa fa-circle fa-stack-2x"></i>
						<i class="fa fa-flag fa-stack-1x fa-inverse"></i>
					</span>
				</a>

				@elseif(Config::get('app.locale') == 'th')

				<a class="button is-danger is-inverted is-rounded is-small" href="{{ URL::to('change/en') }}">
					English
					Site&nbsp;
					<span class="fa-stack fa-1x">
						<i class="fa fa-circle fa-stack-2x"></i>
						<i class="fa fa-flag fa-stack fa-inverse"></i>
					</span>
				</a>

				@endif

			</div>
		</div>
	</div>

	<br>

	
		<div class="container">

			<nav class="breadcrumb">
                <ul>
                    <li><a href="{{ 'index.php' }}"><span class="icon is-small"><i class="fa fa-home"></i></span><span>
                        {{ trans('message.nav_home') }} </span></a>
                    </li>
                    <li class="is-active"><a><span class="icon is-small"><i class="fa fa-search"></i></span><span>
                    {{ trans('message.tx_head_status') }} </span></a>
                    </li>
                </ul>
            </nav>

            <h1 class="title"> {{ trans('message.tx_head_status') }} </h1>
			
			
			<!-- Main container -->
			<nav class="level">
			  <!-- Left side -->
			    <div class="level-left">
					<div class="level-item">
						<p class="subtitle is-5"> {{ trans('message.tx_track_status') }} </p>
					</div>
					<div class="level-item">
						<div class="field has-addons">
							<p class="control">
								<input class="input" type="text" id="case_search">
							</p>
							<p class="control">
								<button class="button" onclick="report_status();"> {{ trans('message.bt_search_status') }} </button>
							</p>
						</div>
					</div>
				</div>

			  <!-- Right side -->
				<!--div class="level-right">
					<div class="level-item">
						<a class="button is-medium   modal-button" data-target="modal-ter">
							<span class="icon is-medium">
								<i class="fa fa-smile"></i>
							</span>
							<span> {{ trans('message.bt_rate_status') }} </span>
						</a>
					</div>
			  	</div-->
			</nav>
			
			<hr>
			<!-- Timeline begin here -->
			
		</div>	
			
		<div class="container"  style="background-color: #EEEEEE">
		
		<div id="timeline" >
		</br>

		</div>
		<!-- Timeline ends here -->
		</div>



	@extends('footer')
	
	
	<div id="modal-ter" class="modal">
	  <div class="modal-background"></div>
	  <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title"> {{ trans('message.bt_rate_status') }} </p>
                <button class="delete"></button>
            </header>
            <section class="modal-card-body">
                <div class="content">
                    <h4> {{ trans('message.bt_rate_status_head') }} </h4>
                    <table class="table">
                        <thead>
                            <tr>
                                <th><abbr title="Position"> {{ trans('message.bt_rate_status_id') }} </abbr></th>
                                <th> {{ trans('message.bt_rate_status_topic') }} </th>
                                <th><abbr title="Played"> {{ trans('message.bt_rate_status_sc1') }}  </abbr></th>
                                <th><abbr title="Won"> {{ trans('message.bt_rate_status_sc2') }}  </abbr></th>
                                <th><abbr title="Drawn"> {{ trans('message.bt_rate_status_sc3') }}  </abbr></th>
                                <th><abbr title="Lost"> {{ trans('message.bt_rate_status_sc4') }} </abbr></th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <th>1</th>
                                <td><a href="#"> {{ trans('message.bt_rate_status_topic1') }} </a>
                                </td>
                                <td>{{ Form::radio('eval1', '1' , true) }}</td>
                                <td>{{ Form::radio('eval1', '2' , false) }}</td>
                                <td>{{ Form::radio('eval1', '3' , false) }}</td>
                                <td>{{ Form::radio('eval1', '4' , false) }}</td>
                            </tr>
                            <tr>
                                <th>2</th>
                                <td><a href="#"> {{ trans('message.bt_rate_status_topic2') }} </a></td>
                                <td>{{ Form::radio('eval2', '1' , true) }}</td>
                                <td>{{ Form::radio('eval2', '2' , false) }}</td>
                                <td>{{ Form::radio('eval2', '3' , false) }}</td>
                                <td>{{ Form::radio('eval2', '4' , false) }}</td>

                            </tr>

                        </tbody>
                    </table>
                </div>
            </section>
            <footer class="modal-card-foot">
                <a class="button is-success" onclick="evaluate1();"> {{ trans('message.bt_submit') }} </a>
                <a class="button"> {{ trans('message.bt_cancle2') }}  </a>
            </footer>
        </div>
	</div>


</body>
<script>
	function evaluate1() {
        var token = $('#token').val();
        var  case_id = $('#fcase').val();
        var  eval1 = $("input[name='eval1']:checked").val();
        var  eval2 = $("input[name='eval2']:checked").val();
        console.log(eval1 + eval2);
		//alert(eval1 + eval2);
		if (case_id!=null){
        $.ajax({
            type: 'POST',
            url: '{!!  route('case.update') !!}',
            data: {
                _token: token,
                case_id: case_id,
                eval_1: eval1,
                eval_2 : eval2,
            },
            success: function( data ) {
                console.log(data);
            },
			error: function (request, data, error) {
                alert(data);
            }
        })}else{
		    alert("ไม่พบเคส");
		}
    }
    function report_status(){

        var  case_id = $('#case_search').val();
       // alert(case_id);
        var url = "{{route('case.status',['case_id' => ":case_id"]) }}";
        url = url.replace(':case_id', case_id);
        
		console.log(url);
		
        var $request = $.get(url); // make request
        var $container = $('#timeline');

        $request.done(function(data) { // success
            $container.html(data.html);
        }
        );

	}

</script>
</html>