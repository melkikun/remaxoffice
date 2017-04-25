@extends('template')
@section('css')
{{-- <link href="{{ asset('/') }}css/owl.carousel.css" rel="stylesheet" type="text/css"> --}}
<style type="text/css">
    html { 
      background: url("{{ asset('/') }}images/background.jpg") no-repeat center center fixed; 
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
  }

  #search {
    left: 30%;
    position: fixed;
    right: 30%;
    top: 50%;
}

#search-button{
    background-color: #09b9e5
}
#search-input{
    border-radius: 4px;
    height: 48px;
    padding: 8px;
}

#btn-search{
 background-color: red;
 border: medium none;
 color: white;
 padding: 0px 50px;
}

#adv-search{
    background-color: #f2f2f2;
    border-radius: 100px;
    color: #777;
    display: inline-block;
    font-size: 10px;
    padding: 4px 8px;
    position: absolute;
    right: 0;
    top: 50%;
    transform: translateY(-50%);
}
</style>
@stop
@section('javascript')
{{-- <script src="{{ asset('/') }}js/owl.carousel.min.js"></script>  --}}
<script src="{{ asset('/') }}assets/bower_components/jquery_lazyload/jquery.lazyload.js"></script>
<script type="text/javascript">
jQuery(document).ready(function($) {
    $('img').lazyload();
});
</script>
@stop
@section('title')
RE/MAX HOME 
@stop
@section('content')
<section>
    <div class="container" id="search-group">
        <div id="search">
            <div class="input-group">
               @if ($office['data'][0]['links']['frofFileId'] != null)
               @foreach ($office['linked']['frofFileId'] as $element)
               @if ($element['fileId'] == $office['data'][0]['links']['frofFileId'])
               <img src="https://www.remax.co.id/prodigy/papi/{{ $element['filePreview'] }}" style="width: 75px;">
               @endif
               @endforeach
               @else
               <li>
                   <img src="{{ asset('/') }}images/logo.png" alt="" style="width: 100px;">
               </li>
               @endif
               <span class="input-group-addon" style="border: none; background: transparent;"><a href="{{ url('properties') }}" id="adv-search">Advanced Search</a></span>
           </div>
           {!! Form::open(["url"=>"properties/search/", "method"=>"get"]) !!}
           <div class="input-group">
              <input type="text" class="form-control" placeholder="Where Do You Live" aria-describedby="basic-addon2" id="search-input" name="location">
              <span class="input-group-addon" id="btn-search">GO!!!</span>
          </div>
          {!! Form::close() !!}
      </div>
  </div>
</section>
@stop
