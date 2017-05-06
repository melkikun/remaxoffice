@extends('template')
@section('javascript')
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDO7bSZjer84qHPkPDwMW_CFUHOjgluXak&callback=initMap"></script>
<script>
            /*
             * declare map as a global variable
             */

             function initMap(){
             	var map;

            /*
             * use google maps api built-in mechanism to attach dom events
             */
             google.maps.event.addDomListener(window, "load", function () {

                /*
                 * create map
                 */
                 var map = new google.maps.Map(document.getElementById("map_div"), {
                 	center: new google.maps.LatLng(-6.225673, 106.808481),
                 	zoom: 14,
                 	mapTypeId: google.maps.MapTypeId.ROADMAP
                 });

                 map.set('styles', [
                 {
                 	"elementType": "geometry",
                 	"stylers": [
                 	{
                 		"color": "#f5f5f5"
                 	}
                 	]
                 },
                 {
                 	"elementType": "labels.icon",
                 	"stylers": [
                 	{
                 		"visibility": "off"
                 	}
                 	]
                 },
                 {
                 	"elementType": "labels.text.fill",
                 	"stylers": [
                 	{
                 		"color": "#616161"
                 	}
                 	]
                 },
                 {
                 	"elementType": "labels.text.stroke",
                 	"stylers": [
                 	{
                 		"color": "#f5f5f5"
                 	}
                 	]
                 },
                 {
                 	"featureType": "administrative.land_parcel",
                 	"elementType": "labels.text.fill",
                 	"stylers": [
                 	{
                 		"color": "#bdbdbd"
                 	}
                 	]
                 },
                 {
                 	"featureType": "poi",
                 	"elementType": "geometry",
                 	"stylers": [
                 	{
                 		"color": "#eeeeee"
                 	}
                 	]
                 },
                 {
                 	"featureType": "poi",
                 	"elementType": "labels.text.fill",
                 	"stylers": [
                 	{
                 		"color": "#757575"
                 	}
                 	]
                 },
                 {
                 	"featureType": "poi.park",
                 	"elementType": "geometry",
                 	"stylers": [
                 	{
                 		"color": "#e5e5e5"
                 	}
                 	]
                 },
                 {
                 	"featureType": "poi.park",
                 	"elementType": "labels.text.fill",
                 	"stylers": [
                 	{
                 		"color": "#9e9e9e"
                 	}
                 	]
                 },
                 {
                 	"featureType": "road",
                 	"elementType": "geometry",
                 	"stylers": [
                 	{
                 		"color": "#ffffff"
                 	}
                 	]
                 },
                 {
                 	"featureType": "road.arterial",
                 	"elementType": "labels.text.fill",
                 	"stylers": [
                 	{
                 		"color": "#757575"
                 	}
                 	]
                 },
                 {
                 	"featureType": "road.highway",
                 	"elementType": "geometry",
                 	"stylers": [
                 	{
                 		"color": "#dadada"
                 	}
                 	]
                 },
                 {
                 	"featureType": "road.highway",
                 	"elementType": "labels.text.fill",
                 	"stylers": [
                 	{
                 		"color": "#616161"
                 	}
                 	]
                 },
                 {
                 	"featureType": "road.local",
                 	"elementType": "labels.text.fill",
                 	"stylers": [
                 	{
                 		"color": "#9e9e9e"
                 	}
                 	]
                 },
                 {
                 	"featureType": "transit.line",
                 	"elementType": "geometry",
                 	"stylers": [
                 	{
                 		"color": "#e5e5e5"
                 	}
                 	]
                 },
                 {
                 	"featureType": "transit.station",
                 	"elementType": "geometry",
                 	"stylers": [
                 	{
                 		"color": "#eeeeee"
                 	}
                 	]
                 },
                 {
                 	"featureType": "water",
                 	"elementType": "geometry",
                 	"stylers": [
                 	{
                 		"color": "#c9c9c9"
                 	}
                 	]
                 },
                 {
                 	"featureType": "water",
                 	"elementType": "labels.text.fill",
                 	"stylers": [
                 	{
                 		"color": "#9e9e9e"
                 	}
                 	]
                 }
                 ]);

                /*
                 * create infowindow (which will be used by markers)
                 */
                 var infoWindow = new google.maps.InfoWindow();

                /*
                 * marker creater function (acts as a closure for html parameter)
                 */
                 function createMarker(options, html) {
                 	var marker = new google.maps.Marker(options);
                 	if (html) {
                 		google.maps.event.addListener(marker, "click", function () {
                 			infoWindow.setContent(html);
                 			infoWindow.open(options.map, this);
                 		});
                 	}
                 	return marker;
                 }

                /*
                 * add markers to map
                 */

                 var image = {
                    url: 'http://www.remaxbeachtown.com//images/balloon.png', // image is 512 x 512
                    scaledSize: new google.maps.Size(50, 50),
                };
                var title = "{{$office['data'][0]['frofOfficeName']}} Remax";
                //phone
                @if($office['data'][0]['frofPhone1'] != null)
                var phone ="<i class='fa fa-phone'></i>"+"&nbsp;&nbsp;&nbsp;"+"{{$office['data'][0]['frofPhone1']}}";
                @else
                var phone ="<i class='fa fa-phone'></i>"+"&nbsp;&nbsp;&nbsp;"+ "-";
                @endif
                //email
                @if($office['data'][0]['frofEmail'] != null)
                var email ="<i class='fa fa-envelope'></i>"+"&nbsp;&nbsp;&nbsp;"+"{{$office['data'][0]['frofEmail']}}";
                @else
                var email ="<i class='fa fa-envelope'></i>"+"&nbsp;&nbsp;&nbsp;"+ "-";
                @endif
                //fax
                @if($office['data'][0]['frofFax'] != null)
                var fax ="<i class='fa fa-fax'></i>"+"&nbsp;&nbsp;&nbsp;"+"{{$office['data'][0]['frofFax']}}";
                @else
                var fax ="<i class='fa fa-fax'></i>"+"&nbsp;&nbsp;&nbsp;"+ "-";
                @endif

                var content1 = "<div><h1>"+title+"</h1></div>";
                var phone1 = "<div>"+phone+"</div>";
                var fax1 = "<div>"+fax+"</div>";
                var email1 = "<div>"+email+"</div>";

                var marker0 = createMarker({
                	position: new google.maps.LatLng(-6.225673, 106.808481),
                	map: map,
                	icon: image
                }, content1 + email1 + "<br>" + phone1+ "<br>" + fax1);

            });
}
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
		<div id="map_div" style="height: 400px;"></div>
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
						<p>Fill out all required fields to send a message. Please don´t spam, thank you!</p>
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
								<div>
									@if ($office['data'][0]['frofAddress'] != null)
									{{$office['data'][0]['frofAddress']}} 
									@else
									{{"Data Not Found"}}
									@endif
								</div>
								{{-- <br> --}}
								{{-- <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Jl. Sudirman Kav. 52 - 53 (SCBD)</div><br> --}}
								{{-- <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Jakarta - Indonesia</div> --}}
							</a>
						</li>
						<li class="globe"> 
							<a href="#">
								<i class="icon-earth"></i>
								<span>
									{{ asset('/') }}
								</span>
							</a>
						</li>
						<li class="phone">
							<a href="#">
								<i class="fa fa-phone"></i>
								<span>
									@if ($office['data'][0]['frofPhone1'] != null)
									{{$office['data'][0]['frofPhone1']}} 
									@else
									{{"Data Not Found"}}
									@endif
								</span>
							</a>
						</li>
						<li class="phone"> 
							<a href="#">
								<i class="fa fa-fax"></i>
								<span>
									@if ($office['data'][0]['frofFax'] != null)
									{{$office['data'][0]['frofFax']}} 
									@else
									{{"Data Not Found"}}
									@endif
								</span>
							</a>
						</li>
						<li class="email"> 
							<a href="#">
								<i class="fa fa-envelope" style="color: orange;"></i>
								<span>
									@if ($office['data'][0]['frofEmail'] != null)
									{{$office['data'][0]['frofEmail']}} 
									@else
									{{"Data Not Found"}}
									@endif
								</span>
							</a>
						</li>
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