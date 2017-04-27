@extends('template')

@section('css')
<style type="text/css" media="screen">
    .appartment-img .detail-btn {
        bottom: 85%;
        position: absolute;
        left: 0;
        z-index: 2;
    }
    .property-box .detail-btn .sale {
        background-color: red;
        padding: 10px 20px;
        transition: all 0.8s ease 0s;
    }
    .property-box .detail-btn .rent:hover, .property-box .detail-btn .sale:hover, .property-box.rent-2 .detail-btn .rent:hover, .property-box.sale-2 .detail-btn .sale:hover{
        background-color: blue;
    }
    .filter-list .property-box .appartment-img::after{
        border-bottom: 2px solid black;
    }
    .properties-list .property-text {
        padding: 15px 5px 15px;
    }
    .one-line{
        text-overflow: ellipsis; 
        overflow: hidden; 
        white-space: nowrap;
    }
    .appartment-name{
        height: 120px;
        margin-bottom: 10px;
    }
    .price{
        color:#e21a22;
        font-size: 24px;
        font-weight: 900;
        margin-bottom: 10px;    
    }
    .mrgb4x{
        margin-bottom:0px;
    }
    .appartment-img{
        height: 250px;
    }
    .search-form .form-section{
        margin-bottom:10px;
    }
    .search-form label{
        margin-bottom: 0px;
    }
    .property-text > a{
        color: black;
    }
</style>
@stop

@section('javascript')
<script src="{{ asset('/') }}assets/bower_components/jquery_lazyload/jquery.lazyload.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $("img").lazyload();
    });
</script>
@stop

@section('title')
RE/MAX PROPERTY
@stop

@section('content')
<section class="border-top">
    <div class="container-fluid">
        <div class="page-title mrgt6x mrgb6x clearfix">
            <h4 class="page-name">properties list</h4>
            <div class="tag-bar"> <a href="#"><span>searching properties</span></a> </div>
            <ul class="breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class="active">Properties list</li>
            </ul>
        </div>
    </div>
</section>
<section>
    <div class="container-fluid">
        <div class="property-filter clearfix">
            <div class="filter-type mrgb6x clearfix">
                <div class="filter-type mrgb6x clearfix">
                    <div class="row">
                        <div class="search-options">
                            <div class="search-form">
                                {!! Form::open(["method"=>"get","url"=>"properties/search/"]) !!}
                                <div class="form-horizontal">
                                    <div class="row">
                                       <div class="form-section col-md-2">
                                        <label>Keyword</label>
                                        <input class="form-control" placeholder="Rumah, Apartemen" id="keyword" name="keyword">
                                    </div>
                                    <div class="form-section col-md-2">
                                        <label>Location</label>
                                        <input class="form-control" placeholder="Location, City" id="location" name="location">
                                    </div>
                                    <div class="form-section col-md-2">
                                        <label>Property Type</label>
                                        <div class="select-box">
                                            <select class="form-control" name="type" id="type">
                                                <option value="">All</option>
                                                    {{-- @if (count($propertytype['data'] > 0))
                                                    @foreach ($propertytype['data'] as $element)
                                                    <option value="{{$element['id']}}">{{$element['prtlName']}}</option>
                                                    @endforeach
                                                    @endif --}}
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-section col-md-2">
                                            <label>Sale Type</label>
                                            <div class="select-box">
                                                <select class="form-control" name="sale" id="sale">
                                                    <option value="">All</option>
                                                    {{-- @if (count($listingcategory['data'] > 0))
                                                    @foreach ($listingcategory['data'] as $element)
                                                    <option value="{{$element['id']}}">{{$element['lsclName']}}</option>
                                                    @endforeach
                                                    @endif --}}
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-section col-md-2">
                                            <label>Bathrooms</label>
                                            <div class="select-box">
                                                <select class="form-control" name="bath" id="bath">
                                                    <option value="">-</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-section col-md-2">
                                            <label>Bedrooms</label>
                                            <div class="select-box">
                                                <select class="form-control" name="bed" id="bed">
                                                    <option value="">-</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                     <div class="form-section col-md-2">
                                            <label>Land Size M<sup>2</sup></label>
                                            <input class="form-control" placeholder="Eg : 100000" id="land" name="land">
                                        </div>
                                        <div class="form-section col-md-2">
                                            <label>Building Size M<sup>2</sup></label>
                                            <input class="form-control" placeholder="Eg : 100000" id="building" name="building">
                                        </div>
                                        <div class="form-section col-md-2">
                                            <label>Facility</label>
                                            <div class="select-box">
                                                <select class="form-control" name="facility" id="facility">
                                                    <option value="">All</option>
                                                    {{-- @if (count($facility['data'] > 0))
                                                    @foreach ($facility['data'] as $element)
                                                    <option value="{{$element['id']}}">{{$element['fctlName']}}</option>
                                                    @endforeach
                                                    @endif --}}
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-section col-md-2">
                                            <label>Price Range (Rp)</label>
                                            {{-- <input class="form-control" placeholder="Harga minimun" id="min" name="min"> --}}
                                            <div class="select-box">
                                                <select class="form-control" name="min" id="min">
                                                    <option value="">Min</option> <option value="1000000">Rp. 1.00 Jt</option><option value="10000000">Rp. 10.00 Jt</option><option value="20000000">Rp. 20.00 Jt</option><option value="30000000">Rp. 30.00 Jt</option><option value="40000000">Rp. 40.00 Jt</option><option value="50000000">Rp. 50.00 Jt</option><option value="80000000">Rp. 80.00 Jt</option><option value="100000000">Rp. 100.00 Jt</option><option value="150000000">Rp. 150.00 Jt</option><option value="200000000">Rp. 200.00 Jt</option><option value="250000000">Rp. 250.00 Jt</option><option value="300000000">Rp. 300.00 Jt</option><option value="350000000">Rp. 350.00 Jt</option><option value="400000000">Rp. 400.00 Jt</option><option value="450000000">Rp. 450.00 Jt</option><option value="500000000">Rp. 500.00 Jt</option><option value="600000000">Rp. 600.00 Jt</option><option value="700000000">Rp. 700.00 Jt</option><option value="800000000">Rp. 800.00 Jt</option><option value="900000000">Rp. 900.00 Jt</option><option value="1000000000">Rp. 1.00 M</option><option value="2000000000">Rp. 2.00 M</option><option value="3000000000">Rp. 3.00 M</option><option value="5000000000">Rp. 5.00 M</option><option value="8000000000">Rp. 8.00 M</option><option value="10000000000">Rp. 10.00 M</option><option value="100000000000">Rp. 100.00 M</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-section col-md-2">
                                            <label>&nbsp;</label>
                                            <div class="select-box">
                                               <select class="form-control" name="max" id="max">
                                                <option value="">Max</option> <option value="1000000">Rp. 1.00 Jt</option><option value="10000000">Rp. 10.00 Jt</option><option value="20000000">Rp. 20.00 Jt</option><option value="30000000">Rp. 30.00 Jt</option><option value="40000000">Rp. 40.00 Jt</option><option value="50000000">Rp. 50.00 Jt</option><option value="80000000">Rp. 80.00 Jt</option><option value="100000000">Rp. 100.00 Jt</option><option value="150000000">Rp. 150.00 Jt</option><option value="200000000">Rp. 200.00 Jt</option><option value="250000000">Rp. 250.00 Jt</option><option value="300000000">Rp. 300.00 Jt</option><option value="350000000">Rp. 350.00 Jt</option><option value="400000000">Rp. 400.00 Jt</option><option value="450000000">Rp. 450.00 Jt</option><option value="500000000">Rp. 500.00 Jt</option><option value="600000000">Rp. 600.00 Jt</option><option value="700000000">Rp. 700.00 Jt</option><option value="800000000">Rp. 800.00 Jt</option><option value="900000000">Rp. 900.00 Jt</option><option value="1000000000">Rp. 1.00 M</option><option value="2000000000">Rp. 2.00 M</option><option value="3000000000">Rp. 3.00 M</option><option value="5000000000">Rp. 5.00 M</option><option value="8000000000">Rp. 8.00 M</option><option value="10000000000">Rp. 10.00 M</option><option value="100000000000">Rp. 100.00 M</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-section col-md-2">
                                        <label>&nbsp;</label>
                                        <input class="form-control btn btn-danger" id="search" name="search" type="submit" value="Search Property">
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="properties-list">
                    <ul class="filter-list">
                        @if (count($property['data'])> 0)
                        @foreach ($property['data'] as $element)
                        <li class="col-md-2 mrgb5x col-sm-4" style="cursor: pointer; padding-right: 0px;">
                            <div class="property-box">
                            <a href="{{ url('property') }}/{{$element['listUrl']}}">
                                <div class="appartment-img">
                                    @foreach ($property['linked']['listFile'] as $element2)
                                    @if($element2['fileId'] == $element['links']['listFile'][0])
                                    <img src="https://www.remax.co.id/prodigy/papi/{{$element2['filePreview']}}?size=600,300" alt="#" style="height: 100%; width: 100%;" />
                                    @break
                                    @endif
                                    @endforeach
                                    <div class="detail-btn">
                                        <a href="{{ url('property') }}/{{$element['listUrl']}}" class="sale">For {{$property['linked']['listListingCategoryId'][0]['lsclName']}}</a> 
                                    </div>
                                </div>
                                </a>
                                <a href="{{ url('property') }}/{{$element['listUrl']}}">
                                <div class="property-text">
                                    <div class="appartment-name">
                                        <h4>{{$element['listTitle']}}</h4>
                                        <h3 class="price">
                                            @if ($element['listListingPrice'] >= 100000000000)
                                            Rp. {{$element['listListingPrice']/1000000000000}} T
                                            @elseif($element['listListingPrice'] >= 1000000000)
                                            Rp. {{$element['listListingPrice']/1000000000}} M
                                            @else
                                            Rp. {{$element['listListingPrice']/1000000}} JT
                                            @endif
                                        </h3>
                                        <p class="one-line">{{$element['listDescription']}}</p>
                                    </div>
                                    <div>
                                        <i class="fa fa-bed"></i>
                                        <span>
                                            @if ($element['listBedroom'] != null)
                                            {{ $element['listBedroom'] }}
                                            @else
                                            {{ "-" }}
                                            @endif
                                        </span>&nbsp;&nbsp;
                                        <i class="fa fa-shower"></i>
                                        <span>
                                           @if ($element['listBathroom'] != null)
                                           {{ $element['listBathroom'] }}
                                           @else
                                           {{ "-" }}
                                           @endif
                                       </span>&nbsp;&nbsp;
                                       <i class="fa fa fa-area-chart"></i>
                                       @if ($element['listLandSize'] != null)
                                       {{ $element['listLandSize'] }}m<sup>2</sup>
                                       @else
                                       {{ "-" }}m<sup>2</sup>
                                       @endif&nbsp;&nbsp;
                                       <i class="fa fa fa-building"></i>
                                       @if ($element['listBuildingSize'] != null)
                                       {{ $element['listBuildingSize'] }}m<sup>2</sup>
                                       @else
                                       {{ "-" }}m<sup>2</sup>
                                       @endif
                                       {{-- <a href="{{ url('property/') }}/{{$element['id']}}" class="btn btn-default btn-xs pull-right btn-outline">More Info</a> --}}
                                   </div>
                                   <div class="clearfix"><hr style="border-color: black;"></div>
                                   <div>
                                    <i class="fa fa-map-marker fa-lg"></i>&nbsp;&nbsp;
                                    <span style="font-size: 18px; font-weight: bolder;">{{ $property['linked']['listCityId'][0]['mctyDescription'] }}</span>
                                    <br>
                                    <i class="fa fa-map-marker fa-lg" style="color: transparent;"></i>&nbsp;&nbsp;<span style="color: #aaa">{{ $property['linked']['listProvinceId'][0]['mprvDescription'] }}</span>
                                </div>
                                </a>
                            </div>
                        </div>
                    </li>
                    @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="numbering">
        <ul class="pagination">
            @for ($i = 1; $i <= ceil($propertyTotal['status']['totalRecords']/12); $i++)
            @if ($currentPage == $i)
            <li class="active">
                <a href="{{ url('properties') }}?page={{$i}}">
                    @if ($i < 10)
                    0{{$i}}
                    @else
                    {{$i}}
                    @endif
                </a>
            </li>
            @else
            <li>
                <a href="{{ url('properties') }}?page={{$i}}">
                    @if ($i < 10)
                    0{{$i}}
                    @else
                    {{$i}}
                    @endif
                </a>
            </li>
            @endif
            @endfor
        </ul>
    </div>
</div>
<div class="clearfix"></div>
</section>
@stop