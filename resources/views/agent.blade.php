@extends('template')

@section('css')
<link href="{{ asset('/') }}assets/bower_components/jquery-ui/jquery-ui.min.js" rel="Stylesheet"></link>
<style type="text/css">
	.ui-menu.ui-widget.ui-widget-content.ui-autocomplete.ui-front{
		border: none;
	}
	.alphabet {
		list-style-type: none;
		margin:20px auto 0;
		padding:0;
		cursor: pointer;
		/*width:80%;*/
		text-align:center;
	}

	.alphabet li {
		float:left;
		margin:0;
		padding:0;
		border-right:1px solid darkgrey;
		font-size: 13px;
		-moz-box-sizing:border-box;
		color:black;
		display:inline-block;
		-webkit-box-sizing:border-box;
		-moz-box-sizing:border-box;
		box-sizing:border-box;
		width:3.7%;
	}

	.alphabet li:last-child {
		border-right: none;
	}

	.alphabet li:hover {
		color:green;
		background-color: lightgrey;
	}

</style>
@stop

@section('javascript')
<script src="{{ asset('/') }}assets/bower_components/jquery-ui/jquery-ui.min.js" ></script>
<script type="text/javascript">
	$( function() {
		var availableTags = [
		"ActionScript",
		"AppleScript",
		"Asp",
		"BASIC",
		"C",
		"C++",
		"Clojure",
		"COBOL",
		"ColdFusion",
		"Erlang",
		"Fortran",
		"Groovy",
		"Haskell",
		"Java",
		"JavaScript",
		"Lisp",
		"Perl",
		"PHP",
		"Python",
		"Ruby",
		"Scala",
		"Scheme"
		];
		$( "#tags" ).autocomplete({
			source: availableTags
		});
	} );
</script>
@stop

@section('title')
RE/MAX AGENT LIST
@stop

@section('content')
<div style='background: url("{{ asset('/') }}images/remax_agent_bg.jpg");''>
	<section>
		{{-- <div class="container-fluid"> --}}
		<div class="image">
			<img src="https://www.remax.co.id//assets/images/agent_top_banner.jpg" style="width: 100%;">
		</div>
		{{-- </div> --}}
	</section>
	<section class="border-top">
		<div class="container">
			<div class="page-title mrgt6x mrgb6x clearfix">
				<h4 class="page-name">agent lists</h4>
				<div class="tag-bar"> <a href="#"><span>see all our agents</span></a> </div>
			</div>
		</div>
	</section>
	<section>
		<div class="container" id="agent-list-page">
			<div class="filter-type mrgb6x clearfix">
				<div class="row">
					{!! Form::open(["url"=>"agents/search", "method"=>"get"]) !!}
					<div class="input-group">
						<input type="text" class="form-control" name="agents">
						<span class="input-group-addon btn-danger" style="background-color: blue; border:none; cursor: pointer;">
							Search!!
						</span>
					</div>
					{!! Form::close() !!}
				</div>
			</div>
			<div class="agents-list">
				@if (count($agent['data']) > 0)
				@foreach ($agent['data'] as $key => $value)
				<div class="col-md-3 col-sm-4 mrgb10x animated out" data-delay="0" data-animation="fadeInUp">
					<div class="agent-profile">
						<div class="agent-img"><img src="{{ asset('/') }}images/agent-1.jpg" class="img-responsive" alt="#" />
							<div class="img-hover">
								<a href="{{ asset('/') }}images/agent-1.jpg" class="plus-link"></a></div>
							</div>
							<div class="agent-detail">
								<div class="agent-name">
									<h5>{{$value['mmbsFirstName']}}</h5>
									{{-- <span class="vaction">vaction</span> --}}
								</div>
								<ul class="agent-mail">
									<li><i class="fa fa-id-card"></i></li>
									<li><span></span></li>
									<li class="contact-info"><a href="#">{{ $value['id'] }}</a></li>
								</ul>
								<ul class="agent-mail">
									<li><i class="icon-email4"></i></li>
									<li><span>E-mail</span></li>
									<li class="contact-info"><a href="#">{{ $value['mmbsEmail'] }}</a></li>
								</ul>
								<ul class="agent-contact">
									<li><i class="fa fa-phone"></i></li>
									<li><span>Mobile</span></li>
									<li class="contact-info"><a href="#">{{ $value['mmbsCellPhone1'] }}</a></li>
								</ul>
								<div class="full-profile-btn"> <a href="{{ url("$value[mmbsUrl]") }}" class="see-more">see full profile</a> </div>
							</div>
						</div>	
					</div>
					@endforeach
				</div>
				@else
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
					DATA NOT FOUND
				</div>
				@endif
			</div>
		{{-- <div class="agents-list">
			<div class="numbering mrgb3x">
				<ul class="pagination">
					<li class="active"><a href="#">01</a></li>
					<li><a href="#">02</a></li>
					<li><a href="#">03</a></li>
					<li><a href="#">04</a></li>
					<li><a href="#">05</a></li>
				</ul>
			</div>
		</div> --}}
	</section>
	<section>
		<div class="wrapper-main-agent">
			<div class="content-main-agent">
				<div class="container" style="text-align: center;">
					<h2 style="font-size:25px;">
						<strong style="color:black;">Want to develop a career in the industry of real estate broker and enjoy unlimited earnings?
						</strong>
					</h2>
					<h2 style="font-size:18px;">
						RE / MAX, the global name and has won the trust of millions of families around the world, comes to realize your big dreams. Be Marketing Associate RE / MAX, by having competitive advantage.
					</h2>
				</div>

				<div style="text-align: center; padding-bottom: 20px;">
					<button class="btn btn-danger" type="button" data-toggle="modal" data-target="#modal-inquiry">CLICK HERE TO JOIN US</button>
				</div>
			</div>            
		</div>

	</section>
</div>

@stop