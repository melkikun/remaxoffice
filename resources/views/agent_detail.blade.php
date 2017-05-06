@extends('template')
@section('css')
<style type="text/css" media="screen">

</style>
@stop

@section('javascript')
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
		<!-- BEGIN CONTENT WRAPPER -->
		<div class="content">
			<div class="container-fluid">
				<div class="row">
					<!-- BEGIN MAIN CONTENT -->
					<div class="main col-sm-12">
						
						<!-- BEGIN AGENCY DETAIL -->
						<div class="agency-detail clearfix">
							<div id="agency_map1" class="map col-md-6"></div>
							
							<div class="info col-md-6">
								<header>
									<h2>Agency 1 <small>New York</small></h2>
									<ul class="assigned">
										<li>14 Assigned Properties</li>
										<li>4 Agents</li>
									</ul>
								</header>
								
								<ul class="contact-us">
									<li><i class="fa fa-envelope"></i><a href="mailto:agency.name@yourdomain.com">agency.name@yourdomain.com</a></li>
									<li><i class="fa fa-map-marker"></i> 24th Street, New York, USA</li>
									<li><i class="fa fa-phone"></i> 00351 123 456 789</li>
								</ul>
								
								<ul class="social-networks">
									<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
									<li><a href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#"><i class="fa fa-youtube"></i></a></li>
								</ul>
							</div>
						</div>
						<!-- END AGENCY DETAIL -->
						
						
						<p class="center">Praesent id lectus commodo, porttitor nunc in, consequat lacus. Aliquam vel varius sapien. Vestibulum pulvinar elit ut nisl egestas aliquam. Nullam suscipit nunc vel magna mattis vestibulum. Proin sit amet nulla orci. Sed eleifend adipiscing sapien, eget luctus libero consequat ac. Morbi ac est ipsum.</p>
						
						<!-- BEGIN GALLERY -->
						<div id="property-gallery" class="owl-carousel property-gallery">
							<div class="item">
								<a href="http://placehold.it/700x603" data-gal="prettyPhoto[gallery]" title="Lorem ipsum"><span class="btn btn-default">+</span></a>
								<img src="http://placehold.it/246x212" alt="" />
							</div>
			
							<div class="item">
								<a href="http://placehold.it/700x603" data-gal="prettyPhoto[gallery]" title="Lorem ipsum"><span class="btn btn-default">+</span></a>
								<img src="http://placehold.it/246x212" alt="" />
							</div>
							
							<div class="item">
								<a href="http://placehold.it/700x603" data-gal="prettyPhoto[gallery]" title="Lorem ipsum"><span class="btn btn-default">+</span></a>
								<img src="http://placehold.it/246x212" alt="" />
							</div>
							<div class="item">
								<a href="http://placehold.it/700x603" data-gal="prettyPhoto[gallery]" title="Lorem ipsum"><span class="btn btn-default">+</span></a>
								<img src="http://placehold.it/246x212" alt="" />
							</div>
							<div class="item">
								<a href="http://placehold.it/700x603" data-gal="prettyPhoto[gallery]" title="Lorem ipsum"><span class="btn btn-default">+</span></a>
								<img src="http://placehold.it/246x212" alt="" />
							</div>
							<div class="item">
								<a href="http://placehold.it/700x603" data-gal="prettyPhoto[gallery]" title="Lorem ipsum"><span class="btn btn-default">+</span></a>
								<img src="http://placehold.it/246x212" alt="" />
							</div>
						</div>
						<!-- END GALLERY -->
						
						
						<p class="center">
							Morbi eget dui leo. Sed rutrum urna id tellus euismod gravida. Praesent placerat, mauris ac pellentesque fringilla, tortor libero condimentum mi, at fermentum tortor velit eu felis. Aliquam bibendum risus at lectus condimentum aliquam. Integer eros leo, consectetur non mauris at, aliquam consectetur nibh. Pellentesque vulputate gravida ante, vel pellentesque ante mollis ac. Donec at tristique nulla, vitae facilisis metus.
							<br/><br/>
							Sed nec rhoncus felis, vitae ultricies risus. Nam sit amet risus non dui ultrices tempus quis a est. Vivamus nec dictum est, at adipiscing purus.
							<br/><br/><br/>
							<a href="#" data-slide-to="contact-agency" class="btn btn-fullcolor">Contact Agency</a>
							<br/><br/>
						</p>
						
						
						<!-- BEGIN AGENTS LIST -->
						<h1 class="section-title">Our Agents</h1>
						<ul class="agency-detail-agents clearfix">
							<li class="col-lg-6">
								<a href="agent-detail.html"><img src="http://placehold.it/307x307" alt="" /></a>
								<div class="info">
									<a href="agent-detail.html"><h3>John Doe</h3></a>
									<span class="location">Manhattan, New York</span>
									<p>Curabitur quis augue magna volutpat velit nec, euismod nibh vestibulum.</p>
									<a href="agent-detail.html">Learn More &raquo;</a>
								</div>
							</li>
							<li class="col-lg-6">
								<a href="agent-detail.html"><img src="http://placehold.it/307x307" alt="" /></a>
								<div class="info">
									<a href="agent-detail.html"><h3>Mary Ipsum Dolor</h3></a>
									<span class="location">Tribeca, New York</span>
									<p>Curabitur quis augue magna volutpat velit nec, euismod nibh vestibulum.</p>
									<a href="agent-detail.html">Learn More &raquo;</a>
								</div>
							</li>
							<li class="col-lg-6">
								<a href="agent-detail.html"><img src="http://placehold.it/307x307" alt="" /></a>
								<div class="info">
									<a href="agent-detail.html"><h3>George Lorem</h3></a>
									<span class="location">Upper East Side, New York</span>
									<p>Curabitur quis augue magna volutpat velit nec, euismod nibh vestibulum.</p>
									<a href="agent-detail.html">Learn More &raquo;</a>
								</div>
							</li>
							<li class="col-lg-6">
								<a href="agent-detail.html"><img src="http://placehold.it/307x307" alt="" /></a>
								<div class="info">
									<a href="agent-detail.html"><h3>George Lorem</h3></a>
									<span class="location">SoHo - Nolita, New York</span>
									<p>Curabitur quis augue magna volutpat velit nec, euismod nibh vestibulum.</p>
									<a href="agent-detail.html">Learn More &raquo;</a>
								</div>
							</li>
						</ul>
						<!-- END AGENTS LIST -->
						
						
						<!-- BEGIN PROPERTIES ASSIGNED -->
						<h1 class="section-title">Assigned Properties</h1>
						<div id="assigned-properties" class="grid-style1 clearfix">
							<div class="row">
								<div class="item col-md-4">
									<div class="image">
										<a href="properties-detail.html">
											<h3>Luxury Apartment with great views</h3>
											<span class="location">Upper East Side, New York</span>
										</a>
										<img src="http://placehold.it/760x670" alt="" />
									</div>
									<div class="price">
										<i class="fa fa-home"></i>For Sale
										<span>$950,000</span>
									</div>
									<ul class="amenities">
										<li><i class="icon-area"></i> 2150 Sq Ft</li>
										<li><i class="icon-bedrooms"></i> 4</li>
										<li><i class="icon-bathrooms"></i> 3</li>
									</ul>
								</div>
								
								<div class="item col-md-4">
									<div class="image">
										<a href="properties-detail.html">
											<h3>Stunning Villa with 5 bedrooms</h3>
											<span class="location">Miami Beach, Florida</span>
										</a>
										<img src="http://placehold.it/760x670" alt="" />
									</div>
									<div class="price">
										<i class="fa fa-home"></i>For Sale
										<span>$1,253,000</span>
									</div>
									<ul class="amenities">
										<li><i class="icon-area"></i> 3470 Sq Ft</li>
										<li><i class="icon-bedrooms"></i> 5</li>
										<li><i class="icon-bathrooms"></i> 4</li>
									</ul>
								</div>
								
								<div class="item col-md-4">
									<div class="image">
										<a href="properties-detail.html">
											<h3>Recent construction with 3 bedrooms</h3>
											<span class="location">Park Slope, New York</span>
										</a>
										<img src="http://placehold.it/760x670" alt="" />
									</div>
									<div class="price">
										<i class="fa fa-home"></i>For Sale
										<span>$560,000</span>
									</div>
									<ul class="amenities">
										<li><i class="icon-area"></i> 1800 Sq Ft</li>
										<li><i class="icon-bedrooms"></i> 3</li>
										<li><i class="icon-bathrooms"></i> 2</li>
									</ul>
								</div>
							</div>
							
							<div class="row">
								<div class="item col-md-4">
									<div class="image">
										<a href="properties-detail.html">
											<h3>Modern construction with parking space</h3>
											<span class="location">Midtown, New York</span>
										</a>
										<img src="http://placehold.it/760x670" alt="" />
									</div>
									<div class="price">
										<i class="fa fa-home"></i>For Rent
										<span>$850</span>
									</div>
									<ul class="amenities">
										<li><i class="icon-area"></i> 1300 Sq Ft</li>
										<li><i class="icon-bedrooms"></i> 1</li>
										<li><i class="icon-bathrooms"></i> 2</li>
									</ul>
								</div>
								
								<div class="item col-md-4">
									<div class="image">
										<a href="properties-detail.html">
											<h3>Single Family Townhouse</h3>
											<span class="location">Cobble Hill, New York</span>
										</a>
										<img src="http://placehold.it/760x670" alt="" />
									</div>
									<div class="price">
										<i class="fa fa-home"></i>For Sale
										<span>$846,000</span>
									</div>
									<ul class="amenities">
										<li><i class="icon-area"></i> 1580 Sq Ft</li>
										<li><i class="icon-bedrooms"></i> 2</li>
										<li><i class="icon-bathrooms"></i> 2</li>
									</ul>
								</div>
								
								<div class="item col-md-4">
									<div class="image">
										<a href="properties-detail.html">
											<h3>3 bedroom villa with garage for rent</h3>
											<span class="location">Bal Harbour, Florida</span>
										</a>
										<img src="http://placehold.it/760x670" alt="" />
									</div>
									<div class="price">
										<i class="fa fa-home"></i>For Rent
										<span>$1,500</span>
									</div>
									<ul class="amenities">
										<li><i class="icon-area"></i> 2000 Sq Ft</li>
										<li><i class="icon-bedrooms"></i> 3</li>
										<li><i class="icon-bathrooms"></i> 2</li>
									</ul>
								</div>
							</div>
							
							<div class="row">
								<!-- Item hidden (class="disabled") -->
								<div class="item col-md-4 disabled">
									<div class="image">
										<a href="properties-detail.html">
											<h3>Recent construction with 3 bedrooms.</h3>
											<span class="location">Manhattan, New York</span>
										</a>
										<img src="http://placehold.it/760x670" alt="" />
									</div>
									<div class="price">
										<i class="fa fa-home"></i>For Sale
										<span>$120,000</span>
									</div>
									<ul class="amenities">
										<li><i class="icon-area"></i> 3250 Sq Ft</li>
										<li><i class="icon-bedrooms"></i> 3</li>
										<li><i class="icon-bathrooms"></i> 2</li>
									</ul>
								</div>
								
								<!-- Item hidden (class="disabled") -->
								<div class="item col-md-4 disabled">
									<div class="image">
										<a href="properties-detail.html">
											<h3>Luxury Condo with 2 bedroms</h3>
											<span class="location">Brooklyn Heights, New York</span>
										</a>
										<img src="http://placehold.it/760x670" alt="" />
									</div>
									<div class="price">
										<i class="fa fa-home"></i>For Sale
										<span>$2,120,000</span>
									</div>
									<ul class="amenities">
										<li><i class="icon-area"></i> 3120 Sq Ft</li>
										<li><i class="icon-bedrooms"></i> 4</li>
										<li><i class="icon-bathrooms"></i> 2</li>
									</ul>
								</div>
								
								<!-- Item hidden (class="disabled") -->
								<div class="item col-md-4 disabled">
									<div class="image">
										<a href="properties-detail.html">
											<h3>Edition Residences on Collins Avenue</h3>
											<span class="location">Miami Beach, Florida</span>
										</a>
										<img src="http://placehold.it/760x670" alt="" />
									</div>
									<div class="price">
										<i class="fa fa-home"></i>For Sale
										<span>$975,000</span>
									</div>
									<ul class="amenities">
										<li><i class="icon-area"></i> 1200 Sq Ft</li>
										<li><i class="icon-bedrooms"></i> 1</li>
										<li><i class="icon-bathrooms"></i> 2</li>
									</ul>
								</div>
							</div>
							
							<div class="row">
								<!-- Item hidden (class="disabled") -->
								<div class="item col-md-4 disabled">
									<div class="image">
										<a href="properties-detail.html">
											<h3>Gorgeous Apartment in New York</h3>
											<span class="location">SoHo - Nolita, New York</span>
										</a>
										<img src="http://placehold.it/760x670" alt="" />
									</div>
									<div class="price">
										<i class="fa fa-home"></i>For Sale
										<span>$650,000</span>
									</div>
									<ul class="amenities">
										<li><i class="icon-area"></i> 1000 Sq Ft</li>
										<li><i class="icon-bedrooms"></i> 1</li>
										<li><i class="icon-bathrooms"></i> 1</li>
									</ul>
								</div>
								
								<!-- Item hidden (class="disabled") -->
								<div class="item col-md-4 disabled">
									<div class="image">
										<a href="properties-detail.html">
											<h3>Apartment on North Moore Street</h3>
											<span class="location">Tribeca, New York</span>
										</a>
										<img src="http://placehold.it/760x670" alt="" />
									</div>
									<div class="price">
										<i class="fa fa-home"></i>For Rent
										<span>$560</span>
									</div>
									<ul class="amenities">
										<li><i class="icon-area"></i> 1245 Sq Ft</li>
										<li><i class="icon-bedrooms"></i> 1</li>
										<li><i class="icon-bathrooms"></i> 2</li>
									</ul>
								</div>
								
								<!-- Item hidden (class="disabled") -->
								<div class="item col-md-4 disabled">
									<div class="image">
										<a href="properties-detail.html">
											<h3>Gorgeous villa with ocean view</h3>
											<span class="location">Bal Harbour, Florida</span>
										</a>
										<img src="http://placehold.it/760x670" alt="" />
									</div>
									<div class="price">
										<i class="fa fa-home"></i>For Sale
										<span>$1,500,000</span>
									</div>
									<ul class="amenities">
										<li><i class="icon-area"></i> 2100 Sq Ft</li>
										<li><i class="icon-bedrooms"></i> 3</li>
										<li><i class="icon-bathrooms"></i> 3</li>
									</ul>
								</div>
							</div>
						</div>
						
						<p class="center">
							<a href="#" class="btn btn-default-color" data-grid-id="assigned-properties" data-load-amount="3">Load More Properties</a>
						</p>
						<!-- END PROPERTIES ASSIGNED -->
						
						
						<!-- BEGIN CONTACT FORM -->
						<h1 class="section-title" id="contact-agency">Contact Agency</h1>
						<form class="form-style">
							<div class="col-sm-6">
								<input type="text" name="Name" placeholder="Name" class="form-control required fromName" />
							</div>
							
							<div class="col-sm-6">
								<input type="email" name="Email" placeholder="Email" class="form-control required fromEmail"  />
							</div>
							
							<div class="col-sm-12">
								<input type="text" name="Subject" placeholder="Subject" class="form-control required subject"  />
								<textarea name="Message" placeholder="Message" class="form-control required"></textarea> 
							</div>
							
							
							<script type="text/javascript">
								var RecaptchaOptions = {
									theme : 'custom',
									custom_theme_widget: 'recaptcha_widget'
								};
							</script>
						
							<div id="recaptcha_widget" class="col-sm-12">
								<div id="recaptcha_image"></div>
								<div class="recaptcha_only_if_incorrect">Incorrect! Please try again.</div>

								<span class="recaptcha_only_if_image">Enter the word(s) above:<a href="javascript:Recaptcha.reload()"><i class="fa fa-refresh"></i></a></span>
								<span class="recaptcha_only_if_audio">Enter the numbers you hear:</span>

								<input type="text" id="recaptcha_response_field" name="recaptcha_response_field" class="form-control" />

								<div class="recaptcha_only_if_image recaptcha_switch_audio"><a href="javascript:Recaptcha.switch_type('audio')">Get an audio CAPTCHA</a></div>
								<div class="recaptcha_only_if_audio"><a href="javascript:Recaptcha.switch_type('image')">Get an image CAPTCHA</a></div>

								<div><a href="javascript:Recaptcha.showhelp()">Help</a></div>
							</div>

							<script type="text/javascript" src="http://www.google.com/recaptcha/api/challenge?k=6LdJgOcSAAAAAEHjgPlKAGCE7e2WlfUiFrNks2hO"></script>
							<noscript>
								<iframe src="http://www.google.com/recaptcha/api/noscript?k=6LdJgOcSAAAAAEHjgPlKAGCE7e2WlfUiFrNks2hO"></iframe><br>
								<textarea name="recaptcha_challenge_field" rows="3" cols="40"></textarea>
								<input type="hidden" name="recaptcha_response_field" value="manual_challenge" />
							</noscript>
							
							<script type="text/javascript" src="http://www.google.com/recaptcha/api/js/recaptcha_ajax.js"></script>
							
							
							<div class="center">
								<button type="submit" class="btn btn-default-color submit_form"><i class="fa fa-envelope"></i> Send Message</button>
							</div>
						</form>
						<!-- END CONTACT FORM -->
					</div>	
					<!-- END MAIN CONTENT -->s
				</div>
			</div>
		</div>
		<!-- END CONTENT WRAPPER -->
		
@stop