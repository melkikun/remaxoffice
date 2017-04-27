@extends('template')
@section('css')
<link href="{{ asset('/') }}assets/bower_components/slick/slick.css" rel="stylesheet" type="text/css">
<link href="{{ asset('/') }}assets/bower_components/slick/slick-theme.css" rel="stylesheet" type="text/css">
<style type="text/css">
  .home-section {
    background-image: url("{{ asset('/') }}images/backgroundhome-v2.jpg");
    background-position: center center;
    background-repeat: no-repeat;
    background-size: cover;
    bottom: 0;
    display: block;
    left: 0;
    position: fixed;
    right: 0;
    top: 55px;
}
.crsl {
    background-color: white !important;
    bottom: 0 !important;
    width: 100%;
    position: absolute !important;
}
.home-section .home-center .search-wrap input {
    border-radius: 4px;
    height: 48px;
    padding: 8px;
    width: 80%;
}
.home-section .home-center .search-wrap button {
    height: 48px;
    line-height: 40px;
    padding: 0;
    width: 20%;
}
.m0 {
    margin: 0;
}
.home-section .home-center {
    left: 50%;
    max-width: 700px;
    padding: 10px;
    position: absolute;
    top: 50%;
    transform: translate(-50%, -50%);
    width: 100%;
}
.home-section .home-center .tabs-wrap{
    text-align:left;
    width: 100%
}
.pos-relative{
    position: relative;
}
.home-section .home-center .tabs-wrap ul {
    list-style: outside none none;
    margin: 0;
    padding: 0;
}
.home-section .home-center .tabs-wrap li {
    display: inline-block;
    float: left;
    list-style: outside none none;
}
.home-section .home-center .tabs-wrap li a.active::before {
    border-bottom: 7px solid #fff;
    border-left: 7px solid transparent;
    border-right: 7px solid transparent;
    bottom: -1px;
    content: "";
    left: 50%;
    position: absolute;
    transform: translateX(-50%);
}
.adv-search{
    display: inline-block;
    right: 2^;
    position: fixed;

}
.rent-sell{
    display: inline-block;
    left: 0;
}
</style>
@stop
@section('javascript')
<script src="{{ asset('/') }}assets/bower_components/slick/slick.min.js"></script> 
<script src="{{ asset('/') }}assets/bower_components/jquery_lazyload/jquery.lazyload.js"></script>
<script type="text/javascript">
   $(document).ready(function(){
      $('.slider-bank').slick({
        slidesToShow: 7,
        slidesToScroll: 4,
        autoplay: true,
        infinite:true,
        mobileFirst:true
    });
  });
</script>
@stop
@section('content')
<div class="home-section">
    <div class="home-center">
        <div class="tabs-wrap pos-relative">
            <ul class="row rent-sell">
                <li><a href="#buyForm" class="buy active">BUY</a></li>
                <li><a href="#rentForm" class="rent">RENT</a></li>
            </ul>
            <a href="http://remax.co.id:88/properties" class="adv-search">Advanced Search</a>
        </div>
        <div class="search-wrap">
            <form action="http://remax.co.id:88/properties/search" id="rentForm" class="hideit">
                <div class="row m0">
                    <input placeholder="Find your dream home" class="form-control pull-left" name="rentSearch" type="text">
                    <button type="submit" class="btn btn-small btn-primary pull-left">Go</button>
                </div>
            </form>
        </div>
    </div>
    <div class="crsl">
       <div class="slider-bank">
          @if (count($bank['linked']['mbnkFileId'])>0)
          @foreach ($bank['linked']['mbnkFileId'] as $element)
          <div class="item"> <img src="https://www.remax.co.id/prodigy/papi/{{$element['filePreview']}}?size=151,53" class="img-responsive" alt="#"/></div>
          @endforeach
          @endif
      </div>
  </div>
</div>
@stop