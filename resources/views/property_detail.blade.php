@extends('template')
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('/') }}assets/bower_components/owl-carousel/owl-carousel/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="{{ asset('/') }}assets/bower_components/owl-carousel/owl-carousel/owl.theme.css">
<link rel="stylesheet" type="text/css" href="{{ asset('/') }}assets/bower_components/owl-carousel/owl-carousel/owl.transitions.css">
<style type="text/css" media="screen">
	div.gallery {
		margin: 5px;
		border: 1px solid #ccc;
		float: left;
		width: 200px;
		height: 200px;
	}

	div.gallery:hover {
		border: 1px solid #777;
	}

	div.gallery img {
		width: 100%;
		height: auto;
	}

	div.desc {
		padding: 0px;
		text-align: center;
	}
	.btn-facebook {
		background: #3b5998;
		border-radius: 3px;
		color: #fff;
		/*padding: 8px 16px;*/
	}
	.btn-facebook:link, .btn-facebook:visited {
		color: #fff;
	}
	.btn-facebook:active, .btn-facebook:hover {
		background: #30477a;
		color: #fff;
	}
	#owl-demo .item{
		margin: 3px;
	}
	#owl-demo .item img{
		display: inline-block;
		width: auto;
		height: 350px;
	}
	.item{
		text-align: center;
		background-position: center center;
		background-repeat: no-repeat;
		background-size: cover;
		/*filter: blur(20px);*/
		height: 100%;
		width: 100%;
	}
</style>
@stop

@section('javascript')
<script type="text/javascript" src="{{ asset('/') }}assets/bower_components/owl-carousel/owl-carousel/owl.carousel.js"></script>
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
jQuery(document).ready(function($) {
	$("#owl-demo").owlCarousel({

		nav: true,
		navText: [
		"<i class='icon-chevron-left icon-white'><</i>",
		"<i class='icon-chevron-right icon-white'>></i>"
		],
		slideSpeed: 300,
		paginationSpeed: 400,
		singleItem: true,
		pagination: false,
		items: 1,
		loop: true,
		rewindSpeed: 500

	});
});
</script>
@stop

@section('title')
RE/MAX PROPERTY DETAIL
@stop
@if (count($property['data'])> 0)
@section('content')
<section id="content">
	
	@foreach ($property['data'] as $element)
	<section class="border-top">
		<div class="container-fluid">
			<div class="page-title mrgb6x mrgt6x clearfix">
				<h4 class="page-name">property single</h4>
				<div class="tag-bar"> <a href="#"><span>choose your next vacation</span></a> </div>
				<ul class="breadcrumb">
					<li><a href="#">Pages</a></li>
					<li class="active"><a href="#">Property Single</a></li>
				</ul>
			</div>
		</div>
	</section>
	<section id="xx">
		<div class="container-fluid">
			<div id="owl-demo">
				@foreach ($element['links']['listFile'] as $imgId)
				@foreach ($property['linked']['listFile'] as $linkImg)
				@if ($imgId == $linkImg['fileId'])
				<div class="item">
                    <div style="background-image: url('https://www.remax.co.id/prodigy/papi/Listing/crud/28/links/ListingFile/115');height: 350px;filter: blur(5px);position: center;width: 100%;background-size: 100%;"></div>
					<img src="https://www.remax.co.id/prodigy/papi/{{$linkImg['filePreview']}}" alt="Owl Image">
				</div>
				@endif
				@endforeach
				@endforeach
			</div>
		</section>
		<section>
			<div class="container-fluid">
				<div class="property-description mrgt5x animated in" data-delay="0" data-animation="fadeInUp">
					<div class="property-heading">
						<h4><span>PROPERTY DESCRIPTION</span></h4>
					</div>
					<ul class="description-content col-md-3">
						<li><span class="description-title">Lokasi </span><span class="title-detail">{{$element['listStreetName']}}</span></li>
						<li><span class="description-title">Kode Pos</span><span class="title-detail">{{$element['listPostalCode']}}</span></li>
						<li><span class="description-title">Kota</span><span class="title-detail">{{$element['links']['listCityId']}}</span></li>
						<li><span class="description-title">Provinsi </span><span class="title-detail">{{$element['links']['listProvinceId']}}</span></li>
						<li><span class="description-title">Negara </span><span class="title-detail">{{$element['links']['listCountryId']}}m<sup>2</sup></span></li>
						<li><span class="description-title">Luas Tanah </span><span class="title-detail">{{$element['listLandSize']}}m<sup>2</sup></span></li>
						<li><span class="description-title">Luas Bangunan</span><span class="title-detail">{{$element['listBuildingSize']}}m<sup>2</sup></span></li>
						<li><span class="description-title">Kamar Tidur </span><span class="title-detail">{{$element['listBedroom']}}+{{$element['listBedroom']}}</span></li>
						<li><span class="description-title">Kamar Mandi </span><span class="title-detail">{{$element['listBathroom']}}</span></li>
						<li><span class="description-title">Harga </span><span class="title-detail">
							@if ($element['listListingPrice'] >= 100000000000)
							Rp. {{$element['listListingPrice']/1000000000000}} T
							@elseif($element['listListingPrice'] >= 1000000000)
							Rp. {{$element['listListingPrice']/1000000000}} M
							@else
							Rp. {{$element['listListingPrice']/1000000}} JT
							@endif
						</span></li>
					</ul>
					<div class="description-text col-md-5">
						<h5>Descriptipon</h5>
						<p>{{$element['listDescription']}}</p>
					</div>
					<div class="description-text col-md-4">
						<div class="gallery">
							<a target="_blank" href="fjords.jpg">
								<img src="http://remax.co.id:88/images/default.jpg" alt="Fjords" width="300" height="200">
							</a>
							@foreach ($property['linked']['listMmbsId'] as $element2)
							@if ($element2['mmbsId'] == $element['links']['listMmbsId'])
							<div class="desc">
								<b>{{$element2['mmbsFirstName']}}</b>
								<span class="team-color" style="color: rgb(66, 139, 202); font-weight: 600;">
									<span class="remax-red">RE<span class="remax-blue">/</span>MAX</span> Premier
								</span>
							</div>
							<div class="desc"  style="padding-top: 10px;">
								<button class="btn btn-primary col-sm-12">Show Contact</button>
							</div>
							<div class="desc" style="padding-top: 10px; margin-top: 25px;">
								<a href="https://www.facebook.com/sharer/sharer.php?u=" title="Share on Facebook" target="_blank" class="btn btn-facebook" style="width: 49%; display: inline-block;"><i class="fa fa-facebook"></i> Share</a>
								<a href="https://twitter.com/share" class="btn btn-primary btn-twitter" style="width: 49%; display: inline-block;">
									<i class="fa fa-twitter"></i> Share</i> </a>
								</div>
								@else
								-
								@endif
								@endforeach

							</div>
						</div>
					</div>
				</div>
			</section>
			<section>
				<div class="container-fluid">
					<div class="property-features mrgt6x animated in" data-delay="0" data-animation="fadeInUp">
						<div class="property-heading">
							<h4><span>PROPERTY FEATURES</span></h4>
						</div>
						<ul class="features-name page-2 col-md-10">
							@if (count($property['linked']['listFacility']) > 0)
							@foreach ($property['linked']['listFacility'] as $element2)
							<li class="col-md-2 no-padding"><i class="fa fa-check"></i><span>balcony</span></li>
							@endforeach
							@else
							<li class="col-md-12 no-padding"><i class="fa fa-check"></i><span>No Facility</span></li>
							@endif

						</ul>
					</div>
				</div>
			</section>
			<section>
				<div class="container-fluid">
					<div class="property-features mrgt6x animated in" data-delay="0" data-animation="fadeInUp">
						<div class="property-heading">
							<h4><span>PROPERTY MAP</span></h4>
						</div>
						<div class="map">
							<div id="map_div" style="height: 400px;"></div>
						</div>
					</div>
				</div>
			</section>
			@endforeach
		</section>
		@stop
		@else
		false expr
		@endif
