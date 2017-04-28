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
	.aTop.remaxBlueColor {
		text-align: center;
		font-size: 20px;
	}
	.centerAlign {
		text-align: center;
	}
	.row.agentHightlight.m-t.m-b {
		text-align: center;
	}
	.highlightIcon {
		width: 110px;
		height: 140px;
		margin: 0 auto;
		background-image: url({{ asset('/') }}assets/images/agent_highlight_icons.jpg);
	}
	.highlightIcon.col2 {
		background-position: -110px 0;
	}
	.highlightIcon.col3 {
		background-position: -220px 0;
	}
	.highlightIcon.col4 {
		background-position: -330px 0;
	}
	.header-agent-title{
		font-weight: bolder;
		font-size: 20px;
		text-align: center;
	}
</style>
@stop

@section('javascript')
<script src="{{ asset('/') }}assets/bower_components/jquery-ui/jquery-ui.min.js" ></script>
<script type="text/javascript">
	// $(function () {
	// 	var availableTags = [
	// 	"ActionScript",
	// 	"AppleScript",
	// 	"Asp",
	// 	"BASIC",
	// 	"C",
	// 	"C++",
	// 	"Clojure",
	// 	"COBOL",
	// 	"ColdFusion",
	// 	"Erlang",
	// 	"Fortran",
	// 	"Groovy",
	// 	"Haskell",
	// 	"Java",
	// 	"JavaScript",
	// 	"Lisp",
	// 	"Perl",
	// 	"PHP",
	// 	"Python",
	// 	"Ruby",
	// 	"Scala",
	// 	"Scheme"
	// 	];
	// 	$("#tags").autocomplete({
	// 		source: availableTags
	// 	});
	// });
</script>
@stop

@section('title')
RE/MAX AGENT LIST
@stop

@section('content')
<div>
	<section>
		<div class="image">
			<img src="{{ asset('/') }}assets/images/agent_top_bannerx.jpg" style="width: 100%;">
		</div>
	</section>
	<section class="border-top">
		<div class="container-fluid">
			<div class="page-title mrgb6x mrgt6x clearfix">
				<ul class="breadcrumb">
					<li><a href="{{ url('/') }}">Home</a></li>
					<li class="active"><a href="{{ url('agents') }}">Agents</a></li>
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
						<span class="input-group-btn">
							<button class="btn btn-danger btn-lg" type="submit" style="font-size: 16.5px;">Search!!</button>
						</span>
					</div>
					{!! Form::close() !!}
				</div>
			</div>
			@if (isset($first))
			@else
				<div class="agents-list">
				@if (count($agent['data']) > 0)
				@foreach ($agent['data'] as $key => $value)
				<div class="col-md-3 col-sm-4 mrgb10x animated out" data-delay="0" data-animation="fadeInUp">
					<div class="agent-profile">
						<div class="agent-img">
							<?php
							if($value['links']['mmbsFile'] != null){
								$file = url('/')."/assets/images/noPhotoAvailable.jpg";
								foreach ($value['links']['mmbsFile'] as $element) {
									foreach ($agent['linked']['mmbsFile'] as $element2) {
										if($element2['fileId'] == $element && @is_array(getimagesize("https://www.remax.co.id/prodigy/papi/".$element2['filePreview']))){
											$file = "https://www.remax.co.id/prodigy/papi/".$element2['filePreview'];											break 2;
										}
									}
								}
								?>
								<img src="{{ $file }}" class="img-responsive" alt="#"  style="height: 200px;"/>
								<?php
							}else{
								?>
								<img src="{{ asset('/') }}assets/images/noPhotoAvailable.jpg" class="img-responsive" alt="#" style="height: 200px;" />
								<?php
							}
							?>
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
			@endif
			
		</div>
	</section>
	<section>
		<div class="container">
			<div class="row text-center">
				<p class="header-agent-title">Want to develop a career in the industry of real estate broker and enjoy unlimited earnings?</p>
			</div>
		</div>
		@foreach ($agentInfo['data'] as $element)
		{!! $element['wbilContent'] !!}
		@endforeach
		<div class="container" style="padding-bottom: 10px;">
		<div class="row text-center">
			<button type="button" class="btn btn-danger" style="padding: 10px 20px;">CLICK HERE TO JOIN US</button>
		</div>
		</div>
	</section>
</div>
@stop