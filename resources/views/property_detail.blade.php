@extends('template')
@section('css')
<style type="text/css" media="screen">

</style>
@stop

@section('javascript')

@stop

@section('js')
<script type="text/javascript">
	function syncPosition(el){
		var current = this.currentItem;
		$(".sync2")
		.find(".owl-item")
		.removeClass("synced")
		.eq(current)
		.addClass("synced")
		if($(".sync2").data("owlCarousel") !== undefined){
			center(current)
		}
	}
	try {
		//property carousel
		var sync1 = $(".sync1");
		var sync2 = $(".sync2");

		sync1.owlCarousel({
			items: 1,
			itemsCustom: [[1300,5], [768,3], [600,2],[480,2],[320,1]],
			singleItem : true,
			slideSpeed : 1000,
			navigation: true,
			pagination:false,
			afterAction : syncPosition,
			responsiveRefreshRate : 200,
			scrollPerPage:1
		});

		sync2.owlCarousel({
			items : 1,
			itemsCustom: [[1300,5], [768,2], [600,2],[480,2],[320,1]],
			pagination:false,
			responsiveRefreshRate : 100,
			afterInit : function(el){
				el.find(".owl-item").eq(0).addClass("synced");
			},
			scrollPerPage: 1
		});



		$(".sync2").on("click", ".owl-item", function(e){
			e.preventDefault();
			var number = $(this).data("owlItem");
			sync1.trigger("owl.goTo",number);
		});

		function center(number){
			var sync2visible = sync2.data("owlCarousel").owl.visibleItems;
			var num = number;
			var found = false;
			for(var i in sync2visible){
				if(num === sync2visible[i]){
					var found = true;
				}
			}

			if(found===false){
				if(num>sync2visible[sync2visible.length-1]){
					sync2.trigger("owl.goTo", num - sync2visible.length+2)
				}else{
					if(num - 1 === -1){
						num = 0;
					}
					sync2.trigger("owl.goTo", num);
				}
			} else if(num === sync2visible[sync2visible.length-1]){
				sync2.trigger("owl.goTo", sync2visible[1])
			} else if(num === sync2visible[0]){
				sync2.trigger("owl.goTo", num-1)
			}
			
		}
	} catch(e) {
		console.log( 'owl carousel custom script error '+e.message );
	}	
	function initMap() {
		var obj= JSON.parse('{!!$property['data']['listCoordinat']!!}');
		var latitude = obj.coordinate.latitude;
		var longitude =  obj.coordinate.longitude;
		var uluru = {lat: latitude, lng: longitude};
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
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDO7bSZjer84qHPkPDwMW_CFUHOjgluXak&callback=initMap">
</script>  	
</script>
@stop

@section('title')
RE/MAX PROPERTY DETAIL
@stop
@section('content')
<section class="border-top">
	<div class="container">
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
<section>
	<div class="container">
		<div class="property-single">
			<div class="sync1 property-carousel owl-carousel">
				@foreach ($property['linked']['listFile'] as $element)
				<div class="item">
					<div class="property-single-img"> <img src="https://www.remax.co.id/prodigy/papi/{{$element['filePreview']}}" alt="{{$element['id']}}" style="height: 447px; width: 1172px;" />
						<div class="image-detail">
							<h5 class="place-name">Bahli Beach Resort</h5>
							<div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
							<div class="place-price"><span>$1350<sup>/week</sup></span></div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
			<div class="sync2 property-carousel owl-carousel">
				@foreach ($property['linked']['listFile'] as $element)
				<div class="item"> <img src="https://www.remax.co.id/prodigy/papi/{{$element['filePreview']}}" alt="#" style="height: 140px; width: 192px;" /> </div>
				@endforeach
			</div>
		</div>
	</div>
	
</section>
<section>
	<div class="container">
		<div class="property-description mrgt5x animated out" data-delay="0" data-animation="fadeInUp">
			<div class="property-heading">
				<h4><span>PROPERTY DESCRIPTION</span></h4>
			</div>
			<ul class="description-content col-md-3">
				<li><span class="description-title">Location </span><span class="title-detail">{{($property['data']['id'])}}</span></li>
				<li><span class="description-title">Price</span><span class="title-detail">{{(number_format($property['data']['listListingPrice'],2))}}</span></li>
				{{-- <li><span class="description-title">Type </span><span class="title-detail">{{$property['linked']['listCityId']['mctyDescription']}}</span></li> --}}
				{{-- <li><span class="description-title">Type </span><span class="title-detail">{{$property['linked']['listProvinceId']['mctyDescription']}}</span></li> --}}
				{{-- <li><span class="description-title">Type </span><span class="title-detail">{{$property['linked']['listCountryId']['mprvDescription']}}</span></li> --}}
				<li><span class="description-title">Type </span><span class="title-detail">{{$property['linked']['listListingCategoryId']['lsclName']}}</span></li>
				<li><span class="description-title">Type </span><span class="title-detail">{{$property['linked']['listPropertyTypeId']['prtlName']}}</span></li>
				<li><span class="description-title">Type </span><span class="title-detail">{{$property['linked']['listMmbsId']['mmbsFirstName']}}</span></li>
			</ul>
			<div class="description-text col-md-12">
				<h5>Descriptipon</h5>
				<p>{{$property['data']['listDescription']}}ddasdsa</p>
				<div class="booking-btn"> <a href="#" class="book-it"><i class="fa fa-angle-right"></i>BOOK IT NOW</a> </div>
			</div>
		</div>
	</div>
</section>
<section>
	<div class="container">
		<div class="property-features mrgt6x animated out" data-delay="0" data-animation="fadeInUp">
			<div class="property-heading">
				<h4><span>PROPERTY FEATURES</span></h4>
			</div>
			<ul class="features-name page-2 col-md-10">
				<li class="col-md-2 no-padding"><i class="fa fa-check"></i><span>swimming pool</span></li>
				<li class="col-md-2 no-padding"><i class="fa fa-check"></i><span>garden</span></li>
				<li class="col-md-2 no-padding"><i class="fa fa-check"></i><span>playhouse</span></li>
				<li class="col-md-2 no-padding"><i class="fa fa-check"></i><span>beach house</span></li>
				<li class="col-md-2 no-padding"><i class="fa fa-check"></i><span>garage</span></li>
				<li class="col-md-2 no-padding"><i class="fa fa-check"></i><span>sauna in house</span></li>
				<li class="col-md-2 no-padding"><i class="fa fa-check"></i><span>beach side / view</span></li>
				<li class="col-md-2 no-padding"><i class="fa fa-check"></i><span>barbecue grill</span></li>
				<li class="col-md-2 no-padding"><i class="fa fa-check"></i><span>2 boats</span></li>
				<li class="col-md-2 no-padding"><i class="fa fa-check"></i><span>balcony</span></li>
			</ul>
		</div>
	</div>
</section>
<section>
	<div class="container">
		<div class="find-location mrgt6x animated out" data-delay="0" data-animation="fadeInUp">
			<div class="property-heading mrgb4x">
				<h4><span>FIND THE LOCATION</span></h4>
			</div>
			<div class="map">
				<div id="map-street-2"></div>
			</div>
		</div>
	</div>
</section>
<div class="clearfix"></div>
<br>
<br>
<br>
<br>
@stop