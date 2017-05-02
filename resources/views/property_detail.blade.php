@extends('template')
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('/') }}assets/bower_components/owl-carousel/owl-carousel/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="{{ asset('/') }}assets/bower_components/owl-carousel/owl-carousel/owl.theme.css">
<link rel="stylesheet" type="text/css" href="{{ asset('/') }}assets/bower_components/owl-carousel/owl-carousel/owl.transitions.css">
<style type="text/css" media="screen">
    
    .btn-facebook:active, .btn-facebook:hover {
        background: #30477a none repeat scroll 0 0;
        color: #fff;
    }
    #owl-demo .item img {
        bottom: 0;
        display: inline-block;
        height: auto;
        left: 0;
        margin: auto;
        position: fixed;
        right: 0;
        top: 0;
        height: 350px;
    }
    .item {
        background-color: black;
    }
    /*ribborn*/
    .ribbon {
      position: absolute;
      left: -5px; top: -5px;
      z-index: 1;
      overflow: hidden;
      width: 75px; height: 75px;
      text-align: right;
  }
  .ribbon span {
      font-size: 10px;
      font-weight: bold;
      color: #FFF;
      text-transform: uppercase;
      text-align: center;
      line-height: 20px;
      transform: rotate(-45deg);
      -webkit-transform: rotate(-45deg);
      width: 100px;
      display: block;
      background: #79A70A;
      background: linear-gradient(#9BC90D 0%, #79A70A 100%);
      box-shadow: 0 3px 10px -5px rgba(0, 0, 0, 1);
      position: absolute;
      top: 19px; left: -21px;
  }
  .ribbon span::before {
      content: "";
      position: absolute; left: 0px; top: 100%;
      z-index: -1;
      border-left: 3px solid #79A70A;
      border-right: 3px solid transparent;
      border-bottom: 3px solid transparent;
      border-top: 3px solid #79A70A;
  }
  .ribbon span::after {
      content: "";
      position: absolute; right: 0px; top: 100%;
      z-index: -1;
      border-left: 3px solid transparent;
      border-right: 3px solid #79A70A;
      border-bottom: 3px solid transparent;
      border-top: 3px solid #79A70A;
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

@section('content')
<section class="border-top">
    <div class="container-fluid">
        <div class="page-title mrgb6x mrgt6x clearfix">
            <ul class="breadcrumb">
                <li><a href="#">Pages</a></li>
                <li class="active"><a href="#">Property Single</a></li>
            </ul>
        </div>
    </div>
</section>
@if (count($property['data'])> 0)
<section id="content">
	@foreach ($property['data'] as $element)
	<section>
		<div class="container-fluid">
			<div id="owl-demo">
				@foreach ($element['links']['listFile'] as $imgId)
				@foreach ($property['linked']['listFile'] as $linkImg)
				@if ($imgId == $linkImg['fileId'])
				<div class="item">
                    <div class="box">
                       <div class="ribbon"><span>POPULAR</span></div>
                   </div>
                   <div style="background-image: url('https://www.remax.co.id/prodigy/papi/{{$linkImg['filePreview']}}');height: 350px;filter: blur(25px);position: center;width: 100%;"></div>
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
       <div class="description-text col-md-3">
          <h5>Descriptipon</h5>
          <p>{{$element['listDescription']}}</p>
      </div>
      <div class="description-text col-md-3">
          <div class="gallery">
            @foreach ($property['linked']['listMmbsId'] as $element2)
            @if ($element2['mmbsId'] == $element['links']['listMmbsId'])
            a
            @else
            -
            @endif
            @endforeach
        </div>
    </div>
     <div class="description-text col-md-3">
         dropdown proprety
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
