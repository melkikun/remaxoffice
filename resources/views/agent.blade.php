@extends('template')

@section('css')
<style type="text/css" media="screen">
</style>
@stop

@section('javascript')
{{-- vue js --}}
<script src="{{ asset('/') }}js/vue.min.js"></script>
<script src="{{ asset('/') }}js/vue-resource.min.js"></script>
@stop

@section('js')

@stop

@section('title')
RE/MAX AGENT LIST
@stop

@section('content')
<section class="border-top">
	<div class="container">
		<div class="page-title mrgt6x mrgb6x clearfix">
			<h4 class="page-name">agent lists</h4>
			<div class="tag-bar"> <a href="#"><span>see all our agents</span></a> </div>
			<ul class="breadcrumb">
				<li><a href="#">Pages</a></li>
				<li class="active"><a href="#">Agent list</a></li>
			</ul>
		</div>
	</div>
</section>
<section>
	<div class="container" id="agent-list-page">
		<div class="agents-list">
			@foreach ($agent['data'] as $key => $value)
			{{-- expr --}}
			<div class="col-md-3 col-sm-4 mrgb10x animated out" data-delay="0" data-animation="fadeInUp">
				<div class="agent-profile">
					<div class="agent-img"><img src="images/agent-1.jpg" class="img-responsive" alt="#" />
						<div class="img-hover">
							<a href="images/agent-1.jpg" class="plus-link"></a></div>
						</div>
						<div class="agent-detail">
							<div class="agent-name">
								<h5>{{$value['mmbsFirstName']}}</h5>
								{{-- <span class="vaction">vaction</span> --}}
							</div>
							<ul class="agent-contact">
								<li><i class="fa fa-phone"></i></li>
								<li><span>Mobile</span></li>
								<li class="contact-info"><a href="#">NULL</a></li>
							</ul>
							<ul class="agent-mail">
								<li><i class="icon-email4"></i></li>
								<li><span>E-mail</span></li>
								<li class="contact-info"><a href="#">NULL</a></li>
							</ul>
							<ul class="social-profile">
								{{-- <li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-instagram"></i></a></li>
								<li><a href="#"><i class="fa fa-google"></i></a></li> --}}
							</ul>
							<div class="full-profile-btn"> <a href="{{ url("$value[mmbsUrl]") }}" class="see-more">see full profile</a> </div>
						</div>
					</div>	
				</div>
				@endforeach
			</div>
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
	@stop