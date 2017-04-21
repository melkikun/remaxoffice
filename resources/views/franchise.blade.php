@extends('template')
@section('js')
<script type="text/javascript">
</script>
@stop
@section('javascript')
{{-- angular js  --}}
<script src="{{ asset('/') }}js/angular.min.js"></script> 
<script src="{{ asset('/') }}js/angular-sanitize.js"></script>
@stop
@section('css')
<style type="text/css" media="screen">
	#agentTopBanner {
    height: 286px;
    width: 100%;
}
</style>
@stop

@section('title')
Franchise
@stop

@section('content')
<section>
	<div class="container-fluid">
		@foreach ($franchisex['data'] as $element)
		{!!$element['wbflDescription']!!}
		@endforeach
	</section>
</div>
@stop
