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
<script type="text/javascript">
  jQuery(document).ready(function($) {
      $("img.lazy").lazyload();
      $('#mygallery').lightGallery({
        mode: 'lg-fade',
        thumbnail: true,
        share:true
    });
       $("#mygallery").justifiedGallery({
       rowHeight: 250,
       margins : 1,
       waitThumbnailsLoad :false
   });
  });
</script>
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
<meta property="og:url"           content="http://premier.digikomdev.com/albums/2" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="Testing Remax" />
<meta property="og:description"   content="Ini berkaitan dengan testing remax" />
<meta property="og:image"         content="http://premier.digikomdev.com/assets/images/franchise_top_banner.jpg" />
@stop

@section('content')
<section class="border-top">
    <div class="container-fluid">
        <div class="page-title mrgb6x mrgt6x clearfix">
            <ul class="breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('albums') }}">Albums</a></li>
                <li class="active"><a href="#">Albums Detail</a></li>
            </ul>
        </div>
    </div>
</section>
<section>
    <div>
        <div id="mygallery">
        @foreach ($detail['linked']['wbgaFileId'] as $value)
         <a href="https://www.remax.co.id/prodigy/papi/{{ $value['filePreview'] }}?size=600,300">
            <img src="https://www.remax.co.id/prodigy/papi/{{ $value['filePreview'] }}?size=600,300" class="lazy"/>
        </a>  
        @endforeach
       </div>
    </div>
    @stop
</section>
