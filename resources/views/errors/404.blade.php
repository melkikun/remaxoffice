<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
	<title>404 error page</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<script src="{{ asset('/') }}js/jquery-3.2.1.min.js"></script>
	<link href="{{ asset('/') }}assets/404/css/style.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
	<div class="wrap">
		<div class="content">
			<div class="logo">
				<h1><a href="#"><img src="{{ asset('/') }}assets/404/images/logo.png"/></a></h1>
				<span><img src="{{ asset('/') }}assets/404/images/signal.png"/>Oops! The Page you requested was not found!</span>
			</div>
			<div class="buttom">
				<div class="seach_bar">
					<p>you can go to <span><a href="{{ asset('/') }}">home</a></span> page or search here</p>
					<div class="search_box">
						{{-- <form>
							<input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}"><input type="submit" value="">
						</form> --}}
					</div>
				</div>
			</div>
		</div>
		<p class="copy_right">&#169; {{date('Y')}} Template by<a href="{{ asset('/') }}" target="_blank">&nbsp;RE/MAX</a> </p>
	</div>
</body>
</html>