@extends('template')
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('/') }}assets/bower_components/owl-carousel/owl-carousel/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="{{ asset('/') }}assets/bower_components/owl-carousel/owl-carousel/owl.theme.css">
<link rel="stylesheet" type="text/css" href="{{ asset('/') }}assets/bower_components/owl-carousel/owl-carousel/owl.transitions.css">
<link rel="stylesheet" type="text/css" href="{{ asset('/') }}assets/bower_components/bootstrap-social-gh-pages/bootstrap-social.css">
<link rel="stylesheet" type="text/css" href="{{ asset('/') }}assets/mycss/property.css">
<style type="text/css">
	
	.content-panel {
		padding: 30px 60px 30px 30px;
	}
	.content-panel {
		padding-right: 30px;
	}
	.content-panel {
		background: #fff none repeat scroll 0 0;
		float: left;
		/*margin-top: 30px;*/
		padding: 15px;
		width: 100%;
	}
	.content-panel .image-block {
		margin-right: 60px;
	}
	.content-panel .image-block {
		/*margin-right: 30px;*/
		width: auto;
	}
	.content-panel .image-block {
		float: left;
		margin-bottom: 25px;
		text-align: center;
		/*width: 100%;*/
	}
	.align-left {
		float: left;
	}
	.content-panel-heading {
		color: #333333;
		font-family: "Droid Sans",sans-serif;
		font-size: 20px;
		margin-top: 0;
		text-transform: uppercase;
	}
	.info-agent-parent{
		width: 100%;
	}
</style>
@stop
@section('javascript')
<script type="text/javascript" src="{{ asset('/') }}assets/bower_components/owl-carousel/owl-carousel/owl.carousel.js"></script>
<script>
	jQuery(document).ready(function($) {
		$("#owl-carousel").owlCarousel({
			nav: true,
			navText: [
			"<i class='fa fa-angle-left'></i>",
			"<i class='fa fa-angle-right'></i>",
			],
			slideSpeed: 300,
			paginationSpeed: 400,
			singleItem: false,
			pagination: true,
			items: 5,
			loop: true,
			rewindSpeed: 500,
			center:false

		});
	});
</script>
@stop
@section('title')
Agent Page
@stop
@section('content')
<section class="border-top">
	<div class="container-fluid">
		<div class="page-title mrgb6x mrgt6x clearfix">
			<ul class="breadcrumb">
				<li><a href="{{ url('/') }}">Home</a></li>
				<li class="active"><a href="#">Agent Page</a></li>
			</ul>
		</div>
	</div>
</section>
<!--begin agent info-->
<section>
	<div class="container-fluid">
		<!-- Agents description -->
		<div class="property-description animated in" data-delay="0" data-animation="fadeInUp">
			<div class="property-heading">
				<h4>
					<span>
						Agent Information
					</span>
				</h4>
			</div>
			<div class="content-panel agent-descriptions">
				<div class="agent-image image-block align-left">
					<?php
					$file = url('/')."/assets/images/noPhotoAvailable.jpg";
					foreach ($detail['data'][0]['links']['mmbsFile'] as $element) {
						foreach ($detail['linked']['mmbsFile'] as $element2) {
							if($element2['fileId'] == $element && @is_array(getimagesize("https://www.remax.co.id/prodigy/papi/".$element2['filePreview']))){
								$file = "https://www.remax.co.id/prodigy/papi/".$element2['filePreview'];											
								break(2);
							}
						}
					}
					?>
					<img src="{{ $file }}" class="img-responsive" alt="#"  height="200" width="225" alt=""/>
					<?php
					?>
				</div>
				<div class="agent-bio">     
					{{-- <h2 class="content-panel-heading">JAVILA CREER</h2> --}}
					<div class="contents">
						<div class="col-sm-3">
							<a class="btn btn-social btn-reddit info-agent-parent">
								<span class="fa fa-user"></span>
								<span class="info-agent">
									@if ($detail['data'][0]['mmbsFirstName'] == null)
									-
									@else
									{{$detail['data'][0]['mmbsFirstName']}}
									@endif
								</span>
							</a>
							<hr>
							<a class="btn btn-social btn-reddit info-agent-parent">
								<span class="fa fa-user"></span>
								<span class="info-agent">
									@if ($detail['data'][0]['mmbsLastName'] == null)
									-
									@else
									{{$detail['data'][0]['mmbsLastName']}}
									@endif
								</span>
							</a>
							<hr>
						</div>
					</div>
					<div class="contents">
						<div class="col-sm-3">
							<a class="btn btn-social btn-reddit info-agent-parent">
								<span class="fa fa fa-id-card"></span>
								<span class="info-agent">
									@if ($detail['data'][0]['id'] == null)
									-
									@else
									{{$detail['data'][0]['id']}}
									@endif
								</span>
							</a>
							<hr>
							<a class="btn btn-social btn-reddit info-agent-parent">
								<span class="fa fa-phone"></span>
								<span class="info-agent">
									@if ($detail['data'][0]['mmbsCellPhone1'] == null)
									-
									@else
									{{$detail['data'][0]['mmbsCellPhone1']}}
									@endif
								</span>
							</a>
							<hr>
							<a class="btn btn-social btn-reddit info-agent-parent">
								<span class="fa fa-envelope"></span>
								<span class="info-agent">
									@if ($detail['data'][0]['mmbsEmail'] == null)
									-
									@else
									{{$detail['data'][0]['mmbsEmail']}}
									@endif
								</span>
							</a>
						</div>
					</div>
				</div>
			</div>
			<!-- Agents description // -->
		</div>

		<!--share button-->
		<div class="property-description animated in" data-delay="0" data-animation="fadeInUp">
		<div class="content-panel agent-descriptions">
					<a class="btn btn-social btn-twitter">
						<span class="fa fa fa-twitter"></span>
						Share On twitter
					</a>
					<a class="btn btn-social btn-facebook">
						<span class="fa fa fa-facebook"></span>
						Share On facebook
					</a>
					<a class="btn btn-social btn-google">
						<span class="fa fa fa-twitter"></span>
						Share On Google
					</a>
					<a class="btn btn-social btn-linkedin">
						<span class="fa fa fa-envelope"></span>
						Share On Email
					</a>
					<hr>
				</div>
	</div>
	</div>
</section>
<!--end agent info-->

<!--begin slider section-->
<section>
	<div class="container-fluid">
		<div class="property-description mrgt5x animated in" data-delay="0" data-animation="fadeInUp">
			<div class="property-heading">
				<h4>
					<span>
						Properties you might like
					</span>
				</h4>
			</div>
			@if ($property['data'] != null)
			<div id="owl-carousel">
				@foreach ($property['linked']['listFile'] as $element2)
				@if (@is_array(getimagesize("https://www.remax.co.id/prodigy/papi/".$element2['filePreview'])))
				<div class="item"><img src="https://www.remax.co.id/prodigy/papi/{{$element2['filePreview']}}" alt="#" style="width: 100% height:100%;"></div>
				<div class="item"><img src="https://www.remax.co.id/prodigy/papi/{{$element2['filePreview']}}" alt="#" style="width: 100% height:100%;"></div>
				<div class="item"><img src="https://www.remax.co.id/prodigy/papi/{{$element2['filePreview']}}" alt="#" style="width: 100% height:100%;"></div>
				<div class="item"><img src="https://www.remax.co.id/prodigy/papi/{{$element2['filePreview']}}" alt="#" style="width: 100% height:100%;"></div>
				<div class="item"><img src="https://www.remax.co.id/prodigy/papi/{{$element2['filePreview']}}" alt="#" style="width: 100% height:100%;"></div>
				<div class="item"><img src="https://www.remax.co.id/prodigy/papi/{{$element2['filePreview']}}" alt="#" style="width: 100% height:100%;"></div>
				@else
				<div class="item"><img src="{{ asset('/') }}assets/images/no_image.jpg" alt="#" style="width: 100%; height:100%;"></div>
				<div class="item"><img src="{{ asset('/') }}assets/images/no_image.jpg" alt="#" style="width: 100%; height:100%;"></div>
				<div class="item"><img src="{{ asset('/') }}assets/images/no_image.jpg" alt="#" style="width: 100%; height:100%;"></div>
				<div class="item"><img src="{{ asset('/') }}assets/images/no_image.jpg" alt="#" style="width: 100%; height:100%;"></div>
				<div class="item"><img src="{{ asset('/') }}assets/images/no_image.jpg" alt="#" style="width: 100%; height:100%;"></div>
				<div class="item"><img src="{{ asset('/') }}assets/images/no_image.jpg" alt="#" style="width: 100%; height:100%;"></div>
				<div class="item"><img src="{{ asset('/') }}assets/images/no_image.jpg" alt="#" style="width: 100%; height:100%;"></div>
				<div class="item"><img src="{{ asset('/') }}assets/images/no_image.jpg" alt="#" style="width: 100%; height:100%;"></div>
				<div class="item"><img src="{{ asset('/') }}assets/images/no_image.jpg" alt="#" style="width: 100%; height:100%;"></div>
				@endif			
				@endforeach
			</div>
			@endif
		</div>
	</div>
</section>
<!--end slider section-->
<!--begin list property-->
<section>
	<div class="container-fluid">
		<div class="property-description mrgt5x animated in" data-delay="0" data-animation="fadeInUp">
			<div class="property-heading">
				<h4>
					<span>
						Property List
					</span>
				</h4>
			</div>
			<div class="property-filter clearfix">
				<div class="filter-type mrgb6x clearfix">
					<div class="row">
						<div class="properties-list">
							<ul class="filter-list">
								@if (count($property['data'])!= null)
								@foreach ($property['data'] as $element)
								<li class="col-md-2 mrgb5x col-sm-4" style="cursor: pointer; padding-right: 0px;">
									<div class="property-box">
										<a href="{{ url('property') }}/{{$element['listUrl']}}" class="a-link">
											<div class="appartment-img">
												@php
												$file = "";
												@endphp
												{{-- foreach untuk ambil link file --}}
												@foreach ($property['linked']['listFile'] as $element2)
												{{-- foreach pada data property --}}
												@foreach ($element['links']['listFile'] as $element3)
												@if ($element3 == $element2['fileId'] && @is_array(getimagesize("https://www.remax.co.id/prodigy/papi/".$element2['filePreview'])))
												@php
												$file = "https://www.remax.co.id/prodigy/papi/".$element2['filePreview'];
												@endphp
												@break(2)
												@endif
												{{-- end foreach pada data property --}}
												@endforeach
												{{-- end foreach ambil file --}}
												@endforeach
												@if ($file != "")
												<img src="https://www.remax.co.id/prodigy/papi/{{$element2['filePreview']}}?size=600,300" alt="#" style="height: 100%; width: 100%;" />
												@else
												<img src="{{ asset('/') }}assets/images/no_image.jpg" class="img-responsive" alt="#" style="height: 100%; width: 100%;"/>
												@endif
												@foreach ($property['linked']['listListingCategoryId'] as $lsclName)
												@if ($lsclName['mlscId'] == $element['links']['listListingCategoryId'])
												@if ($lsclName['id'] == 1)
												<div class="detail-btn">
													<a href="{{ url('property') }}/{{$element['listUrl']}}" class="sale">
														For {{$lsclName['lsclName']}}
													</a> 
												</div>
												@else
												<div class="detail-btn">
													<a href="{{ url('property') }}/{{$element['listUrl']}}" class="rent">
														For {{$lsclName['lsclName']}}
													</a> 
												</div>
												@endif
												@endif
												@endforeach
											</div>
										</a>
										<a href="{{ url('property') }}/{{$element['listUrl']}}" class="a-link">
											<div class="property-text">
												<div class="appartment-name">
													<h4>{{$element['listTitle']}}</h4>
													<h3 class="price">
														@if ($element['listListingPrice'] >= 100000000000)
														Rp. {{$element['listListingPrice']/1000000000000}} T
														@elseif($element['listListingPrice'] >= 1000000000)
														Rp. {{$element['listListingPrice']/1000000000}} M
														@else
														Rp. {{$element['listListingPrice']/1000000}} JT
														@endif
													</h3>
													<p class="one-line">
														{{$element['listDescription']}}
													</p>
												</div>
												<div class="facility">
													<i class="fa fa-bed"></i>
													<span class="text-facility">
														@if ($element['listBedroom'] != null)
														{{ $element['listBedroom'] }}
														@else
														{{ "-" }}
														@endif
													</span>&nbsp;&nbsp;
													<i class="fa fa-shower"></i>
													<span class="text-facility">
														@if ($element['listBathroom'] != null)
														{{ $element['listBathroom'] }}
														@else
														{{ "-" }}
														@endif
													</span>&nbsp;&nbsp;
													<i class="fa fa fa-area-chart"></i>
													<span class="text-facility">
														@if ($element['listLandSize'] != null)
														{{ $element['listLandSize'] }}m<sup>2</sup>
														@else
														{{ "-" }}m<sup>2</sup>
														@endif
													</span>&nbsp;&nbsp;
													<i class="fa fa fa-building"></i>
													<span class="text-facility">
														@if ($element['listBuildingSize'] != null)
														{{ $element['listBuildingSize'] }}m<sup>2</sup>
														@else
														{{ "-" }}m<sup>2</sup>
														@endif
													</span>&nbsp;&nbsp;
												</div>
												<div class="clearfix">
													<hr style="border-color: black;">
												</div>
												<div>
													<i class="fa fa-map-marker fa-lg"></i>&nbsp;&nbsp;
													<span style="font-size: 14px; font-weight: bolder;">
														@foreach ($property['linked']['listCityId'] as $kab)
														@if ($kab['mctyId'] == $element['links']['listCityId'])
														{{ $kab['mctyDescription'] }}
														@endif
														@endforeach
													</span>
													<br>
													<i class="fa fa-map-marker fa-lg" style="color: transparent;"></i>&nbsp;&nbsp;
													<span style="color: #aaa">
														@foreach ($property['linked']['listProvinceId'] as $prov)
														@if ($prov['mprvId'] == $element['links']['listProvinceId'])
														{{ $prov['mprvDescription'] }}
														@endif
														@endforeach
													</span>
												</div>
											</div>
										</a>
									</div>
								</li>
								@endforeach
								@endif
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--end list propert-->
<!--begin numbering-->
<section>
	<div class="numbering">
		<ul class="pagination">
			@for ($i = 1; $i <= ceil($propertyTotal['status']['totalRecords']/12); $i++)
			@if ($currentPage == $i)
			<li class="active">
				<a href="{{ url('/') }}/{{$detail['data'][0]['mmbsUrl']}}?page={{$i}}">
					@if ($i < 10)
					0{{$i}}
					@else
					{{$i}}
					@endif
				</a>
			</li>
			@else
			<li>
				<a href="{{ url('/') }}/{{$detail['data'][0]['mmbsUrl']}}?page={{$i}}">
					@if ($i < 10)
					0{{$i}}
					@else
					{{$i}}
					@endif
				</a>
			</li>
			@endif
			@endfor
		</ul>
	</div>
</section>
<!--end numbering-->
@stop