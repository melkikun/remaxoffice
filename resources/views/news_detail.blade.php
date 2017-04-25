@extends('template')
@section('js')
{{-- expr --}}
@stop
@section('javascript')
{{-- expr --}}
@stop
@section('css')
<style type="text/css" media="screen">
	.share-news ul li{
		display: inline-block;
	}
	.share-news ul li img{
		width: 50px;
	}
</style>
@stop
@section('title')
News Detail
@stop
@section('content')
<section class="border-top">
	<div class="container-fluid">
		<div class="page-title mrgb3x mrgt6x clearfix">
			<h4 class="page-name">DETAIL NEWS</h4>
			<div class="tag-bar"> <a href="#"><span>keep your mind up</span></a> </div>
			<ul class="breadcrumb">
				<li><a href="#">Pages</a></li>
				<li class="active"><a href="#">Blog Singlepost</a></li>
			</ul>
		</div>
	</div>
</section>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-9 blog-singlepost">
			<div class="blog-section mrgb9x clearfix animated out" data-delay="0" data-animation="fadeInUp">
			<div class="blogsingle-img"> <img src="https://www.remax.co.id/prodigy/papi/{{$detail['linked']['wbneFileId']['filePreview']}}" class="img-responsive" alt="#" /> </div>
				<div class="blog-text"> <span>post-detail ON {{($detail['data']['wbnlCreatedTime']['en'])}}</span>
					<h4>{{$detail['data']['wbnlTitle']['en']}}</h4>
					<span class="post-detail">BY: {{$detail['data']['wbnlCreatedUserId']['en']}}</span>
					<div class="share-news">
                    <ul>
                        <li>SHARE</li>
                        <li><a href="http://www.facebook.com/share.php?u={{ url('news') }}{{ $detail['data']['id'] }}&amp;title={{$detail['data']['wbnlTitle']['en']}}"><img src="http://remax.co.id:88/assets/img/remax-fb.png" alt=""></a></li>
                        <li><a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ url('news') }}{{ $detail['data']['id'] }}&amp;title={{$detail['data']['wbnlTitle']['en']}}"><img src="http://remax.co.id:88/assets/img/remax-in.png" alt=""></a></li>
                        <li><a href="http://twitter.com/home?status={{$detail['data']['wbnlTitle']['en']}}+{{ url('news') }}{{ $detail['data']['id'] }}"><img src="http://remax.co.id:88/assets/img/remax-tw.png" alt=""></a></li>
                        <li><a href="https://plus.google.com/share?url={{ url('news') }}{{ $detail['data']['id'] }}"><img src="http://remax.co.id:88/assets/img/remax-gp.png" alt=""></a></li>
                    </ul>
                </div>
					<div class="content-news">
						{!!$detail['data']['wbnlContent']['en']!!}
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-3">
			<div class="right-side-bar mrgb5x">
				<div class="blog-post mrgt3x animated out" data-delay="0" data-animation="fadeInUp">
					@foreach ($news['data'] as $key => $value)
					<div class="post-area">
						<h4>{{$value['wbnlTitle']}}</h4>
						<span class="best-place">POSTED ON {{$value['wbnlCreatedTime']}}</span> 
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
@stop