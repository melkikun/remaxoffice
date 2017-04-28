@extends('template')
@section('css')
<link href="{{ asset('/') }}assets/bower_components/slick/slick.css" rel="stylesheet" type="text/css">
<link href="{{ asset('/') }}assets/bower_components/slick/slick-theme.css" rel="stylesheet" type="text/css">
<link href="{{ asset('/') }}assets/mycss/home.css" rel="stylesheet" type="text/css">
@stop
@section('javascript')
<script src="{{ asset('/') }}assets/bower_components/slick/slick.min.js"></script> 
<script src="{{ asset('/') }}assets/bower_components/jquery_lazyload/jquery.lazyload.js"></script>
<script src="{{ asset('/') }}assets/myjs/home.js"></script>
@stop
@section('title')
RE/MAX HOME
@stop
@section('content')
<div class="home-section">
    <div class="home-center">
        <div class="tabs-wrap pos-relative">
            <ul class="row rent-sell">
                <li><a href="#buyForm" class="buy active" id="buy">BUY</a></li>
                <li><a href="#rentForm" class="rent" id="rent">RENT</a></li>
            </ul>
            <a href="http://remax.co.id:88/properties" class="adv-search">Advanced Search</a>
        </div>
        <div class="search-wrap">
            {!! Form::open(["method"=>"get","url"=>"properties/search/"]) !!}
                <div class="row m0">
                <input type="hidden" name="sale" value="1">
                    <input placeholder="Find your dream home" class="form-control pull-left" name="location" type="text">
                    <button type="submit" class="btn btn-small btn-primary pull-left" style="background-color:  blue;">Go</button>
                </div>
                {!! Form::close() !!}
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