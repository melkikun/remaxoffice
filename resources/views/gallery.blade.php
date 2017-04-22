@extends('template')
@section('javascript')
<script src="{{ asset('/') }}assets/bower_components/jquery_lazyload/jquery.lazyload.js"></script>
<script>
jQuery(document).ready(function($) {
     $(".img-responsive").lazyload();
});
</script>
@stop

@section('css')
<style type="text/css" media="screen">
    .service-info.title2 {
    background-color: red !important;
    bottom: 100px;
    padding: 7px;
}
.service-info.title1 {
    background-color: blue !important;
    bottom: 50px;
    padding: 7px;
}
</style>
@stop

@section('title')
RE/MAX GALLERY
@stop

@section('content')
<section class="border-top">
    <div class="container-fluid">
        <div class="page-title mrgb6x mrgt6x clearfix">
            <h4 class="page-name">gallery page</h4>
            <ul class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active"><a href="#">Gallery Page</a></li>
            </ul>
        </div>
    </div>
</section>
<section>
    <div class="container-fluid">
        <div class="row services mrgb6x clearfix">
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
        </div>
        
    </div>
</section>	
@stop


@foreach ($gallery['linked']['wbgyFileId'] as $value)
    
@endforeach