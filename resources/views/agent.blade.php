@extends('template')

@section('css')
<link href="{{ asset('/') }}assets/bower_components/jquery-ui/jquery-ui.min.js" rel="Stylesheet"></link>
<style type="text/css">
	.ui-menu.ui-widget.ui-widget-content.ui-autocomplete.ui-front{
		border: none;
	}
	.img-responsive, .thumbnail > img, .thumbnail a > img, .carousel-inner > .item > img, .carousel-inner > .item > a > img{
		display: inline !important;
	}
	.agent-img {
		margin: auto;
		position: relative;
		text-align: center;
	}
	.img-hover {
		background: rgba(9, 185, 229, 0.85) none repeat scroll 0 0;
		bottom: 0;
		left: 0;
		opacity: 0;
		position: absolute;
		right: 0;
		text-align: center;
		top: 0;
		transform: scale(0, 0);
		transition: all 0.4s ease 0s;
	}
</style>
@stop

@section('javascript')
<script src="{{ asset('/') }}assets/bower_components/jquery-ui/jquery-ui.min.js" ></script>
<script type="text/javascript">
	$(function () {
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
		$("#tags").autocomplete({
			source: availableTags
		});
	});
</script>
@stop

@section('title')
RE/MAX AGENT LIST
@stop

@section('content')
<div>
	<section>
		<div class="image">
			<img src="https://www.remax.co.id//assets/images/agent_top_banner.jpg" style="width: 100%;">
		</div>
	</section>
	<section class="border-top">
		<div class="container-fluid">
			<div class="page-title mrgb6x mrgt6x clearfix">
				<ul class="breadcrumb">
					<li><a href="{{ url('/') }}">Home</a></li>
					<li class="active"><a href="{{ url('about') }}">About</a></li>
				</ul>
			</div>
		</div>
	</section>
	<section>
		<div class="container-fluid" id="agent-list-page">
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
						<div class="agent-img">
							<img src="https://www.remax.co.id/prodigy/papi/Membership/crud/2/links/MembershipFile/126" class="img-responsive" alt="#" />
							<div class="img-hover">
								<a href="https://www.remax.co.id/prodigy/papi/Membership/crud/2/links/MembershipFile/126" class="plus-link"></a>
							</div>
						</div>
						<div class="agent-detail">
							<div class="agent-name">
								<h5>{{$value['mmbsFirstName']}}</h5>
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