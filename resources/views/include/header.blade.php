
<div class="top-bar">
	<div class="container-fluid">
		{{-- <div class="left-bar">
			<ul class="social-media">
				<li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
				<li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
				<li class="dribble"><a href="#"><i class="fa fa-dribbble"></i></a></li>
				<li class="vimeo"><a href="#"><i class="icon-vimeo"></i></a></li>
				<li class="google"><a href="#"><i class="fa fa-google"></i></a></li>
				<li class="deviantart"><a href="#"><i class="icon-deviantart3"></i></a></li>
				<li class="pinterest"><a href="#"><i class="icon-pinterest-p"></i></a></li>
				<li class="instagram"><a href="#"><i class="fa fa-instagram"></i></a></li>
			</ul>
		</div> --}}
		{{-- <div class="right-bar">
			<ul class="contact">
				<li><i class="fa fa-phone"></i></li>
				<li><span>Call us</span></li>
				<li class="contact-info"><a href="#">+62 31 1234567</a></li>
			</ul>
			<ul class="mail">
				<li><i class="icon-email4"></i></li>
				<li><span>Send email</span></li>
				<li class="contact-info"><a href="#">support@remax.co.id</a></li>
			</ul>
			<ul class="login">
				<li><i class="icon-login"></i></li>
				<li><a href="#"><span>Login</span></a></li>
			</ul>
		</div> --}}
	</div>
</div>

<header>
	<div class="container-fluid">
		<div class="navigation clearfix">
			<div class="logo">
				<a href="{{ url('/') }}">
				{{-- @if ($office['data'][0]['links']['frofFileId'] == null) --}}
					<img src="{{ asset('/') }}images/logo.png" alt="#" style="height: 55px;" />
				{{-- @endif --}}
					
				</a>
			</div>
			<div class="navbar-header">
				<button type="button" class="navbar-toggle"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar first"></span> <span class="icon-bar middle"></span> <span class="icon-bar last"></span> </button>
			</div>
			<div class="menu">
				<nav class="navbar navbar-default">
					<div id="navbar" class="navbar-collapse collapse pull-right">
						<ul class="nav navbar-nav">
							@foreach ($header['data'] as $key => $value)
							<li>
								<a href="{{url($value['wbmnAPI'])}}">{{$value['wbmlName']}}</a>
							</li>
							@endforeach
						</ul>
					</div>
				</nav>
			</div>
		</div>
	</div>
</header>
<style type="text/css" media="screen">
	.navigation {
		margin: 0px;
	}
</style>