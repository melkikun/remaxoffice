@extends('template')
@section('css')
<link href="{{ asset('/') }}css/owl.carousel.css" rel="stylesheet" type="text/css">
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
    position: absolute;
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
}
</style>
@stop
@section('javascript')
<script src="{{ asset('/') }}js/owl.carousel.min.js"></script> 
<script src="{{ asset('/') }}assets/bower_components/jquery_lazyload/jquery.lazyload.js"></script>
<script type="text/javascript">

</script>
@stop
@section('title')
RE/MAX HOME 
@stop
@section('content')
<section id="slider">
    <div class="container" id="search-group">
        <div class="input-group" id="search">
          <input type="text" class="form-control" placeholder="Where Do You Live" aria-describedby="basic-addon2" id="search-input">
          <span class="input-group-addon" id="btn-search">&nbsp;&nbsp;&nbsp;&nbsp;GO!!&nbsp;&nbsp;&nbsp;&nbsp;</span>
      </div>
  </div>
</section>
@stop
