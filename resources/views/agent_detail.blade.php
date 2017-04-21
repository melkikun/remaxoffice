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
		//agent carousel
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

</script>
@stop

@section('title')
RE/MAX AGENT DETAIL {{ $id }}
@stop
@section('content')
<section class="border-top">
	<div class="container">
	<div class="page-title mrgb6x mrgt6x clearfix">
			<h4 class="page-name">agent single</h4>
			<div class="tag-bar"> <a href="#"><span>choose your next vacation</span></a> </div>
			<ul class="breadcrumb">
				<li><a href="#">Pages</a></li>
				<li class="active"><a href="#">agent Single</a></li>
			</ul>
		</div>
	</div>
</section>
<section>
	<div class="container">
		<div class="agent-single">
			<div class="sync1 agent-carousel owl-carousel">
				<div class="item">
					<div class="agent-single-img"> <img src="{{ asset('/') }}images/single-post-slider.jpg" class="img-responsive" alt="#" />
						<div class="image-detail">
							<h5 class="place-name">Bahli Beach Resort</h5>
							<div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
							<div class="place-price"><span>$1350<sup>/week</sup></span></div>
						</div>
					</div>
				</div>
				<div class="item">
					<div class="agent-single-img"> <img src="{{ asset('/') }}images/single-post-slider.jpg" class="img-responsive" alt="#" />
						<div class="image-detail">
							<h5 class="place-name">Bahli Beach Resort</h5>
							<div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
							<div class="place-price"><span>$1350<sup>/week</sup></span></div>
						</div>
					</div>
				</div>
				<div class="item">
					<div class="agent-single-img"> <img src="{{ asset('/') }}images/single-post-slider.jpg" class="img-responsive" alt="#" />
						<div class="image-detail">
							<h5 class="place-name">Bahli Beach Resort</h5>
							<div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
							<div class="place-price"><span>$1350<sup>/week</sup></span></div>
						</div>
					</div>
				</div>
				<div class="item">
					<div class="agent-single-img"> <img src="{{ asset('/') }}images/single-post-slider.jpg" class="img-responsive" alt="#" />
						<div class="image-detail">
							<h5 class="place-name">Bahli Beach Resort</h5>
							<div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
							<div class="place-price"><span>$1350<sup>/week</sup></span></div>
						</div>
					</div>
				</div>
				<div class="item">
					<div class="agent-single-img"> <img src="{{ asset('/') }}images/single-post-slider.jpg" class="img-responsive" alt="#" />
						<div class="image-detail">
							<h5 class="place-name">Bahli Beach Resort</h5>
							<div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
							<div class="place-price"><span>$1350<sup>/week</sup></span></div>
						</div>
					</div>
				</div>
			</div>
			<div class="sync2 agent-carousel owl-carousel">
				<div class="item"> <img src="{{ asset('/') }}images/thumbnail-1.jpg" class="img-responsive" alt="#" /> </div>
				<div class="item"> <img src="{{ asset('/') }}images/thumbnail-2.jpg" class="img-responsive" alt="#" /> </div>
				<div class="item"> <img src="{{ asset('/') }}images/thumbnail-3.jpg" class="img-responsive" alt="#" /> </div>
				<div class="item"> <img src="{{ asset('/') }}images/thumbnail-4.jpg" class="img-responsive" alt="#" /> </div>
				<div class="item"> <img src="{{ asset('/') }}images/thumbnail-5.jpg" class="img-responsive" alt="#" /> </div>
			</div>
		</div>
	</div>
	
</section>
<section>
	<div class="container">
		<div class="agent-description mrgt5x animated out" data-delay="0" data-animation="fadeInUp">
			<div class="agent-heading">
				<h4><span>AGENT DESCRIPTION</span></h4>
			</div>
			<ul class="description-content col-md-3">
				<li><span class="description-title">Location </span><span class="title-detail">Bahli Palmstreet 213</span></li>
				<li><span class="description-title">Price</span><span class="title-detail">699$ per week</span></li>
				<li><span class="description-title">Type </span><span class="title-detail">Beach House</span></li>
				<li><span class="description-title">Status </span><span class="title-detail">For Rent</span></li>
				<li><span class="description-title">Size </span><span class="title-detail">168 Sq Ft</span></li>
				<li><span class="description-title">Beds</span><span class="title-detail">4</span></li>
				<li><span class="description-title">Baths </span><span class="title-detail">2</span></li>
				<li><span class="description-title">Garages</span><span class="title-detail">1</span></li>
			</ul>
			<div class="description-text col-md-9">
				<h5>Descriptipon</h5>
				<p>Our clients range from 300 companies, to large charitable organisations and some small local businesses who are striving to expand. Most of our clients use our Data Analysis service to inform their strategic decision making and their targets for the immediate, mid-term and long-term future. The data sources that we use for this type of analysis include customer enquiry data, sales figures, costs, market data and customer feedback. We work with clients big and small across a range of sectors.</p>
				<div class="booking-btn"> <a href="#" class="book-it"><i class="fa fa-angle-right"></i>BOOK IT NOW</a> </div>
			</div>
		</div>
	</div>
</section>
<section>
	<div class="container">
		<div class="agent-features mrgt6x animated out" data-delay="0" data-animation="fadeInUp">
			<div class="agent-heading">
				<h4><span>AGENT FEATURES</span></h4>
			</div>
			<ul class="features-name page-2 col-md-10">
				<li class="col-md-2 no-padding"><i class="fa fa-check">
					
				</i><span>swimming pool</span></li>
				<li class="col-md-2 no-padding"><i class="fa fa-check">
					
				</i><span>garden</span></li>
				<li class="col-md-2 no-padding"><i class="fa fa-check">
					
				</i><span>playhouse</span></li>
				<li class="col-md-2 no-padding"><i class="fa fa-check">
					
				</i><span>beach house</span></li>
				<li class="col-md-2 no-padding"><i class="fa fa-check">
					
				</i><span>garage</span></li>
				<li class="col-md-2 no-padding"><i class="fa fa-check">
					
				</i><span>sauna in house</span></li>
				<li class="col-md-2 no-padding"><i class="fa fa-check">
					
				</i><span>beach side / view</span></li>
				<li class="col-md-2 no-padding"><i class="fa fa-check">
					
				</i><span>barbecue grill</span></li>
				<li class="col-md-2 no-padding"><i class="fa fa-check">
					
				</i><span>2 boats</span></li>
				<li class="col-md-2 no-padding"><i class="fa fa-check"></i><span>balcony</span></li>
			</ul>
		</div>
	</div>
</section>
<div class="clearfix"></div>
<br>
<br>
<br>
<br>
@stop