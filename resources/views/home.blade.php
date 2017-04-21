@extends('template')
@section('css')
<link href="{{ asset('/') }}css/owl.carousel.css" rel="stylesheet" type="text/css">
<style type="text/css" media="screen">
    .page-homepage body {
        height: 100%;
        overflow: hidden;
    }
    .bank-partner {
        font-size: 24px;
        padding-top: 20px;
        padding-bottom: 50px;
        text-align: center;
        top: 60%;
        left: 50%;
    }
    .advSearch-wrap img {
        margin: 0 auto;
        height: 50px;
    }
    .wrapper-icon {
        position: absolute;
        bottom: 0%;
        background: white;
        width: 100%;
        padding:0 5px;
    }
    .slick-slide .slick-active{
        width: 150px !important;
        display: inline-block;
    }

    .home-section{
        display: block;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-image: url('{{ asset('/') }}images/background.jpg');
        position: absolute;
        top: 55px;
        left: 0;
        right: 0;
        bottom: 0;
    }
    .tabs-wrap ul li a{
        font-size: 15px;
    }
    .home-section .home-center{
        width: 100%;
        max-width: 700px;
        padding: 10px;
        position: absolute;
        top: 50%;
        left: 50%;
        -ms-transform:translate(-50%,-50%);
        -moz-transform:translate(-50%,-50%);
        -webkit-transform:translate(-50%,-50%);
        transform:translate(-50%,-50%);
    }
    .home-section .home-center object{
        width: 139px;
        height: 30px;
        margin-bottom: 5px;
    }
    .home-section .home-center .tabs-wrap{
        width: 100%;
        text-align: left;
    }
    .home-section .home-center .tabs-wrap ul{
        margin:0px;
        padding:0px;
        list-style: none;
    }
    .home-section .home-center .tabs-wrap li{
        list-style: none;
        display: inline-block;
        float: left;
    }
    .home-section .home-center .tabs-wrap li a{
        display:block;
        padding: 8px 16px;
        color:#fff;
        background-color:green;
    }
    .home-section .home-center .tabs-wrap li a.active{
        position: relative;
    }
    .home-section .home-center .tabs-wrap li a.active::before{
        content: "";
        position: absolute;
        border-left: 7px solid transparent;
        border-right: 7px solid transparent;
        border-bottom: 7px solid #fff;
        -ms-transform:translateX(-50%);
        -webkit-transform:translateX(-50%);
        -moz-transform:translateX(-50%);
        transform:translateX(-50%);
        left: 50%;
        bottom:-1px;
    }
    .home-section .home-center .tabs-wrap li a.buy{
        background-color: rgba(226, 26, 34, 1);
        border-radius:2px;
    }
    .home-section .home-center .tabs-wrap li a.rent{
        background-color: rgba(58, 125, 227, 1);
        border-radius: 2px;
    }

    .home-section .home-center .search-wrap input{
        width: 80%;
        height: 48px;
        padding: 8px;
        border-radius:4px;
    }

    .home-section .home-center .search-wrap button{
        width: 20%;
        padding:0px;
        height: 48px;
        line-height: 40px;
    }
    .adv-search {
        background-color: #f2f2f2;
        border-radius: 100px;
        color: #777;
        display: inline-block;
        font-size: 13px;
        padding: 4px 8px;
        position: absolute;
        right: 0;
        top: 40%;
        transform: translateY(-50%);
    }
    .adv-search:hover {
        box-shadow: 0 1px 2px 1px rgba(0, 0, 0, 0.2);
        color: #444;
    }
    .adv-search:active, .adv-search:focus {
        color: #444;
    }
    .adv-search img {
        display: inline-block;
        margin-left: 8px;
        width: 8px;
    }
    .adv-search img.active {
        transform: rotate(180deg);
    }
    .form-control {
        border: 1px solid white;
        border-radius: 0;
        min-height: 44px;
    }
    .form-control:focus {
        border-color: transparent;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset, 0 0 8px rgba(102, 175, 233, 0.6);
        outline: 0 none;
    }
   
</style>
@stop
@section('javascript')
<script src="{{ asset('/') }}js/owl.carousel.min.js"></script> 
<script src="{{ asset('/') }}assets/bower_components/jquery_lazyload/jquery.lazyload.js"></script>
<script type="text/javascript">
jQuery(document).ready(function ($) {
    $('.partner-carousel').owlCarousel({
        items: 7,
        navigation: true,
        navigationText: true,
        pagination: false,
        autoPlay: true,
        slideSpeed: 1000,
    });
});
</script>
@stop
@section('title')
RE/MAX HOME 
@stop
@section('content')
<section id="slider">

    <div>
        <div class="home-section">
            <div class="home-center">
                <div class="tabs-wrap pos-relative">
                    <ul class="row m0">
                        @if ($office['data'][0]['links']['frofFileId'] != null)
                        @foreach ($office['linked']['frofFileId'] as $element)
                        @if ($element['fileId'] == $office['data'][0]['links']['frofFileId'])
                        <li><img src="https://www.remax.co.id/prodigy/papi/{{ $element['filePreview'] }}" alt="" style="width: 100px;"></li>
                        @endif
                        @endforeach
                        @else
                        <li>
                            <img src="{{ asset('/') }}images/logo.png" alt="" style="width: 100px;">
                        </li>
                        @endif

                    </ul>
                    <a href="{{ url('properties') }}" class="adv-search">Advanced Search</a>
                </div>
                <div class="search-wrap">
                    {!! Form::open(["method"=>"get", "url"=>"property/search/ "]) !!}
                    <div class="row m0">
                        <input type="text" placeholder="Find Your Dream Home" class="form-control pull-left"
                               name="location">
                        <button type="submit" class="btn btn-small btn-primary pull-left">Go!</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="wrapper-icon" style="background: white;">
                <div class="bankpartner-slide js-bankpartner-slide">
                    <div class="partner-carousel owl-carousel">
                        @if (count($bank['linked']['mbnkFileId'])>0)
                        @foreach ($bank['linked']['mbnkFileId'] as $element)
                        <div class="item"> <a href="#"> <img src="https://www.remax.co.id/prodigy/papi/{{$element['filePreview']}}?size=151,53" class="img-responsive" alt="#"/> </a> </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop
