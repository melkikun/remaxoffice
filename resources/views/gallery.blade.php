@extends('template')
@section('javascript')
<script src="{{ asset('/') }}assets/bower_components/jquery_lazyload/jquery.lazyload.js"></script>
<script src="{{ asset('/') }}assets/myjs/gallery.js"></script>
@stop
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('/') }}assets/mycss/gallery.css">
@stop
@section('title')
RE/MAX GALLERY
@stop
@section('content')
<section>
    <div class="image">
        <img src="{{ asset('/') }}assets/images/GALLERY_HEADER.jpg" style="width: 100%;">
    </div>
</section>
<section class="border-top">
    <div class="container-fluid">
        <div class="page-title clearfix">
            <ul class="breadcrumb">
                <li>
                    <a href="{{ url('/') }}">Home</a>
                </li>
                <li class="active">
                    <a href="{{ url('albums') }}">Albums</a>
                </li>
            </ul>
        </div>
    </div>
</section>
<section>
    <div class="container-fluid">
        <div class="row services mrgb6x clearfix">
            @if ($gallery['data'] != null)
            @foreach ($gallery['data'] as $key => $value)
            <div class="col-md-3 col-sm-6 animated in" data-delay="0" data-animation="fadeInUp">
                <a href="{{ url("albums/$value[id]") }}">
                    <div class="service-image"> 
                        @foreach ($gallery['linked']['wbgyFileId'] as $key1 => $value1)
                        @if($value['links']['wbgyFileId'] == $value1['id'])
                        <img src="https://www.remax.co.id/prodigy/papi/{{ $value1['filePreview'] }}?size=600,300" class="img-responsive" alt="#" />
                        @endif
                        @endforeach
                        <div class="service-info title1">
                            <a href="">{{ $value['wbgyTitle'] }}</a>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
            @else
            <div class="row">
                <div class="col-sm-12 text-center" id="property-empty">
                    <div id="text-nf">Opsss!! Data Not Found</div>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>  
@stop