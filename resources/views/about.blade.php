@extends('template')
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('/') }}assets/mycss/about.css">
@stop

@section('title')
RE/MAX ABOUT {{Session::get("lang")}}
@stop
@section('content')
<section class="border-top">
    <div class="container-fluid">
        <div class="page-title mrgb6x mrgt6x clearfix">
            <ul class="breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class="active"><a href="{{ url('about') }}">About</a></li>
            </ul>
        </div>
    </div>
</section>
<section>
    <div class="container-fluid">
        <div class="service-tab">
            <div class="col-md-3 no-padding col-sm-5 animated out" data-delay="0" data-animation="fadeInUp">
                <div class="tab-section">
                    <ul class="nav nav-stacked">
                        @foreach ($about['data'] as $key => $value)
                        @if ($key == 0)
                        <li class="active">
                            <a data-toggle="tab" href="#link{{$key}}" aria-expanded="true">
                                <span class="tab-border">
                                    {{$value['wbalTitle']}}
                                </span>
                            </a>
                        </li>
                        @else
                        <li>
                            <a data-toggle="tab" href="#link{{$key}}">
                                <span class="tab-border">
                                    {{$value['wbalTitle']}}
                                </span>
                            </a>
                        </li>
                        @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-9 col-sm-7">
            <div class="tab-content mrgb7x animated out" data-delay="0" data-animation="fadeInUp">
                @foreach ($about['data'] as $key => $value)
                @if ($key == 0)
                <div id="link{{$key}}" class="tab-pane fade in active">
                    {!!$value['wbalContent']!!}
                </div>
                @else
                <div id="link{{$key}}" class="tab-pane fade">
                    {!!$value['wbalContent']!!}
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</section>
@stop
