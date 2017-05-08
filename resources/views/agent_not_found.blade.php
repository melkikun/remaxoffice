@extends('template')

@section('css')
<link href="{{ asset('/') }}assets/bower_components/jquery-ui/jquery-ui.min.js" rel="Stylesheet"></link>
<link href="{{ asset('/') }}assets/mycss/agent.css" rel="Stylesheet"></link>
@stop
@section('javascript')
<script src="{{ asset('/') }}assets/bower_components/jquery-ui/jquery-ui.min.js" ></script>
<script src="{{ asset('/') }}assets/myjs/agent.js" ></script>
@stop

@section('title')
RE/MAX AGENT LIST
@stop

@section('content')
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
					<input type="text" class="form-control" name="agents" id="agents" placeholder="Find Agents Name Here">
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
			@if (($agent['data']) != null)
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
						<ul class="agent-mail">
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
			<div class="row">
				<div class="container-fluid">
					<div class="agents-not-found">SORRY!!, DATA NOT FOUND</div>
				</div>
			</div>
		</div>
		@endif
		@endif

	</div>
</section>
<section>
	@foreach ($agentInfo['data'] as $element)
	{!! str_replace('<div class="container">', '<div class="container-fluid">', $element['wbilContent']) !!}
	@endforeach
	<div class="container-fluid" style="padding-bottom: 10px;">
		<div class="row text-center">
			<button type="button" class="button-agents" style="padding: 10px 20px;" id="button-agents">CLICK HERE TO JOIN US</button>
		</div>
	</div>
</section>
<section>
	<!-- Modal -->
	<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title text-center"><b>Become a Proud RE/MAX AGENT</b></h4>
				</div>
				<div class="modal-body">
					<form action="#">
						<div class="form-group">
							<label for="email">Name:</label>
							<input type="email" class="form-control" id="email" placeholder="Enter Name" name="aname">
						</div>
						<div class="form-group">
							<label for="pwd">Email:</label>
							<input type="password" class="form-control" id="email" placeholder="Enter Email" name="email">
						</div>
						<div class="form-group">
							<label for="pwd">Phone:</label>
							<input type="password" class="form-control" id="phone" placeholder="Enter phone" name="phone">
						</div>
						<div class="form-group">
							<label for="pwd">Message:</label>
							<textarea  class="form-control" id="message" name="message" placeholder="Enter Message"></textarea>
						</div>
						<button type="button" class="btn btn-danger col-sm-12">Submit</button>
					</form>
				</div>
				<div class="modal-footer">
				</div>
			</div>

		</div>
	</div>
</section>
@stop