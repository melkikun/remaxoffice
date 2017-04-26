@extends('template')
@section('css')
<style type="text/css" media="screen">
    .img-responsive.photo-ceo{
        position: absolute;
        right: 0px;
    }
    .service-detail {
        text-align: justify;
    }
    .row.postres {
        margin-top: -27px;
    }
    .service-detail {
        margin-top: -16px;
    }
    .tab-section .nav-stacked li.active a span{
        background-color: #1274bd !important;
    }
    .tab-section .nav-stacked li span::after{
        background: #1274bd none repeat scroll 0 0 !important;
    }
    .tab-section .nav-stacked li.active a span::before{
        border-left:22px solid #1274bd !important;
    }
    tab-section .nav-stacked li span::before {
        border-left: 22px solid #1274bd;
    }
    .tab-section .nav-stacked li span:hover::before{
        border-left: 22px solid #1274bd;
    }
</style>
@stop

@section('title')
RE/MAX ABOUT
@stop
@section('content')
<section class="border-top">
    <div class="container-fluid">
        <div class="page-title mrgb5x mrgt6x clearfix">
            <h4 class="page-name">About Us</h4>
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
