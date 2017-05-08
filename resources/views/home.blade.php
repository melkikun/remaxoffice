@extends('template')
@section('og')
<meta name="keywords" content="{{ asset('/') }}">
<meta name="description" content="RE/MAX, perusahaan agen properti terkemuka di dunia kini hadir di Indonesia, dengan membawa serta budaya kerja profesional yang telah mengiringi kiprahnya selama 40 tahun dalam industri real estate dunia. RE/MAX Indonesia merupakan mitra kerja terpercaya dan menjadi solusi atas kebutuhan Anda dalam bidang properti">
<!-- Twitter Card data -->
<meta name="twitter:card" content="home">
<meta name="twitter:site" content="@remaxhome">
<meta name="twitter:title" content="RE/MAX HOME">
<meta name="twitter:description" content="RE/MAX, perusahaan agen properti terkemuka di dunia kini hadir di Indonesia, dengan membawa serta budaya kerja profesional yang telah mengiringi kiprahnya selama 40 tahun dalam industri real estate dunia. RE/MAX Indonesia merupakan mitra kerja terpercaya dan menjadi solusi atas kebutuhan Anda dalam bidang properti">
<meta name="twitter:creator" content="@remax">
<meta name="twitter:image" content="{{ asset('/') }}images/backgroundhome-v2.jpg)">

<!-- Facebook's Open Graph data -->
<meta property="og:title" content="RE/MAX HOME" />
<meta property="og:type" content="website" />
<meta property="og:url" content="{{ asset('/') }}" />
<meta property="og:image" content="{{ asset('/') }}images/backgroundhome-v2.jpg)" />
<meta property="og:description" content="RE/MAX, perusahaan agen properti terkemuka di dunia kini hadir di Indonesia, dengan membawa serta budaya kerja profesional yang telah mengiringi kiprahnya selama 40 tahun dalam industri real estate dunia. RE/MAX Indonesia merupakan mitra kerja terpercaya dan menjadi solusi atas kebutuhan Anda dalam bidang properti" /> 
<meta property="og:site_name" content="{{ asset('/') }}" />
<meta property="fb:admins" content="816068768546426" />
<meta property="fb:app_id" content="816068768546426" /> 
@stop
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
      <a href="{{ url('/') }}/properties" class="adv-search">Advanced Search</a>
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