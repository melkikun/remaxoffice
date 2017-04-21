@extends('template')
@section('js')
<script>
	function initMap() {
		var uluru = {lat: -6.2262628, lng: 106.8084354};
		var map = new google.maps.Map(document.getElementById('map-street-2'), {
			zoom: 14,
			center: uluru
		});

		var contentString = 'RE/MAX INDONESIA';

		var infowindow = new google.maps.InfoWindow({
			content: contentString
		});

		var marker = new google.maps.Marker({
			position: uluru,
			map: map,
			title: 'Uluru (Ayers Rock)'
		});
		marker.addListener('click', function() {
			infowindow.open(map, marker);
		});
	}
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDO7bSZjer84qHPkPDwMW_CFUHOjgluXak&callback=initMap">
</script>
@stop
@section('css')
<style type="text/css" media="screen">
	.mrgb5x{
		margin-bottom: 0px;
	}
</style>
@stop
@section('title')
Contact Us
@stop
@section('content')
<div class="find-location">
	<div class="map">
		<div id="map-street-2"></div>
	</div>
</div>
<section>
	<div class="container">
		<div class="row">
			<div class="col-md-7">
				<div class="contact-us mrgt5x mrgb6x clearfix animated out" data-delay="0" data-animation="fadeInUp">
					<div class="property-heading">
						<h4><span>CONTACT US</span></h4>
					</div>
					<div class="contact-guide mrgt3x col-md-10 no-padding mrgb5x">
						<p>Fill out all required fields to send a message. You have to login to your wordpress account to post any comment. Please don´t spam, thank you!</p>
					</div>
					<div class="post-form row">
						<form id="review-form" method="post" name="postreview">
							<div class="col-md-6">
								<div class="form-group">
									<label>FIRST NAME</label>
									<input class="form-control" placeholder="enter a name">
								</div>
								<div class="form-group">
									<label>LAST NAME</label>
									<input class="form-control" placeholder="enter a email">
								</div>
								<div class="form-group">
									<label>EMAIL ADDRESS</label>
									<input class="form-control" placeholder="enter a subject">
								</div>
								<div class="form-group">
									<label>PHONE NUMBER(OPTIONAL)</label>
									<input class="form-control" placeholder="enter a subject">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>I'M INTERESTED IN</label>
									<input class="form-control" placeholder="enter a subject">
								</div>
								<div class="form-group">
									<label>MESSAGE</label>
									<textarea class="form-control" placeholder="type in a message" rows="11" style="resize: vertical;"></textarea>
								</div>
								<div class="send-msg"> <a href="#" class="post-msg">SEND MESSAGE<i class="fa fa-angle-right"></i></a></div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-5">
				<div class="contact-info mrgt5x animated out" data-delay="0" data-animation="fadeInUp">
					<div class="rightbar-heading">
						<h4>CONTACT INFORMATION</h4>
					</div>
					<ul class="contact-address clearfix">
						<li class="map-marker"> 
							<a href="#">
								<i class="icon-location10"></i>
								<div>Equity Tower 17th Floor </div><br>
								<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Jl. Sudirman Kav. 52 - 53 (SCBD)</div><br>
								<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Jakarta - Indonesia</div>
							</a>
						</li>
						<li class="globe"> <a href="#"><i class="icon-earth"></i><span>http://www.remax.co.id</span></a></li>
						<li class="phone"> <a href="#"><i class="fa fa-phone"></i><span>+62 21 5151 393 </span></a></li>
						<li class="phone"> <a href="#"><i class="fa fa-fax"></i><span>+62 21 5151 392</span></a></li>
					</ul>
					<div class="follow-on mrgt5x animated out" data-delay="0" data-animation="fadeInUp">
						<div class="rightbar-heading mrgb3x">
							<h4>FOLLOW US ON</h4>
						</div>
						<ul class="sidebar-social-media">
							<li class="facebook"><a href="https://www.facebook.com/remaxindo/"><i class="fa fa-facebook"></i></a></li>
							<li class="twitter"><a href="https://twitter.com/remax_indonesia?lang=en"><i class="fa fa-twitter"></i></a></li>
							<li class="instagram"><a href="https://www.instagram.com/remaxindo/"><i class="fa fa-instagram"></i></a></li>
							<li class="instagram"><a href="https://plus.google.com/116928200867869177372"><i class="fa fa-google"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@stop