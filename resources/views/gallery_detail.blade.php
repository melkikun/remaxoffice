@extends('template')
@section('javascript')
{{-- light gallery  --}}
<script src="{{ asset('/') }}assets/bower_components/lightgallery/dist/js/lightgallery.min.js"></script>
<script src="{{ asset('/') }}assets/bower_components/lg-thumbnail/dist/lg-thumbnail.min.js"></script>
<script src="{{ asset('/') }}assets/bower_components/lg-fullscreen/dist/lg-fullscreen.min.js"></script>
{{-- justified gallery --}}
<script src="{{ asset('/') }}assets/bower_components/justifiedGallery/dist/js/jquery.justifiedGallery.min.js"></script>
{{-- lazy load --}}
<script src="{{ asset('/') }}assets/bower_components/jquery_lazyload/jquery.lazyload.js"></script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
      $("img.lazy").lazyload();
      $('#mygallery').lightGallery({
        mode: 'lg-fade',
        thumbnail: true
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

@section('content')

<section class="border-top">
    <div class="container-fluid">
        <div class="page-title mrgb6x mrgt6x clearfix">
            <h4 class="page-name">gallery detail</h4>
            {{-- <div class="tag-bar"> <a href="#"><span>what we do for you</span></a> </div> --}}
            <ul class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active"><a href="#">Gallery Detail</a></li>
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
