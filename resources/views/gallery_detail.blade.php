@extends('template')
@section('javascript')
{{-- light gallery  --}}
<script src="{{ asset('/') }}assets/bower_components/lightgallery/dist/js/lightgallery.min.js"></script>
<script src="{{ asset('/') }}assets/bower_components/lg-autoplay/dist/lg-autoplay.min.js"></script>
<script src="{{ asset('/') }}assets/bower_components/lg-fullscreen/dist/lg-fullscreen.min.js"></script>
<script src="{{ asset('/') }}assets/bower_components/lg-hash/dist/lg-hash.min.js"></script>
<script src="{{ asset('/') }}assets/bower_components/lg-pager/dist/lg-pager.min.js"></script>
<script src="{{ asset('/') }}assets/bower_components/lg-share/dist/lg-share.min.js"></script>
<script src="{{ asset('/') }}assets/bower_components/lg-thumbnail/dist/lg-thumbnail.min.js"></script>
<script src="{{ asset('/') }}assets/bower_components/lg-video/dist/lg-video.min.js"></script>
<script src="{{ asset('/') }}assets/bower_components/lg-zoom/dist/lg-zoom.min.js"></script>
{{-- justified gallery --}}
<script src="{{ asset('/') }}assets/bower_components/justifiedGallery/dist/js/jquery.justifiedGallery.min.js"></script>
{{-- lazy load --}}
<script src="{{ asset('/') }}assets/bower_components/jquery_lazyload/jquery.lazyload.js"></script>
<script src="{{ asset('/') }}assets/myjs/gallery_detail.js"></script>
@stop
@section('css')
{{-- light gallery --}}
<link href="{{ asset('/') }}assets/bower_components/lightgallery/dist/css/lightgallery.min.css" rel="stylesheet" type="text/css">
{{-- justified gallery --}}
<link href="{{ asset('/') }}assets/bower_components/justifiedGallery/dist/css/justifiedGallery.min.css" rel="stylesheet" type="text/css">
@stop

@section('title')
RE/MAX GALLERY DETAIL
@stop

@section('og')
@if ($detail['data'] != null)
<meta property="fb:app_id"        content="816068768546426" /> 
<meta property="og:url"           content="{{ url('albums') }}/{{$detail['linked']['wbgaWbgyId'][0]['wbgyId']}}" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="{{$detail['linked']['wbgaWbgyId'][0]['wbgyTitle']}}" />
<meta property="og:description"   content="{{$detail['linked']['wbgaWbgyId'][0]['wbgyTitle']}}" />
@foreach ($detail['linked']['wbgaFileId'] as $value)
<meta property="og:image"         content="https://www.remax.co.id/prodigy/papi/{{ $value['filePreview'] }}?size=500,500" />
@endforeach
@endif
@stop

@section('content')
<section class="border-top">
    <div class="container-fluid">
        <div class="page-title mrgb6x mrgt6x clearfix">
            <ul class="breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('albums') }}">Albums</a></li>
                <li class="active"><a href="#">
                    {{$detail['linked']['wbgaWbgyId'][0]['wbgyTitle']}}
                </a></li>
            </ul>
        </div>
    </div>
</section>
<section>
    @if ($detail['data'] != null)
    <div>
        <div id="mygallery">
            @foreach ($detail['linked']['wbgaFileId'] as $value)
            <a href="https://www.remax.co.id/prodigy/papi/{{ $value['filePreview'] }}?size=600,300">
                <img src="https://www.remax.co.id/prodigy/papi/{{ $value['filePreview'] }}?size=600,300" class="lazy"/>
            </a>  
            @endforeach
        </div>
    </div>
    @else
    <div class="row">
        <div class="col-sm-12 text-center" id="property-empty">
            <div id="text-nf">Opsss!! Data Not Found</div>
        </div>
    </div>
    @endif
</section>
@stop
