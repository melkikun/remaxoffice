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
        height: 80px;
        margin-bottom: 10px;
    }
    .price{
        color:red;
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
        margin-bottom: 5px;
    }
</style>
@stop

@section('javascript')
@stop

@section('js')
<script type="text/javascript">

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
                                     <div class="form-section col-md-3">
                                            <label>Keyword</label>
                                            <input class="form-control" placeholder="Rumah, Apartemen" id="keyword" name="keyword">
                                        </div>
                                        <div class="form-section col-md-3">
                                            <label>Location</label>
                                            <input class="form-control" placeholder="Location, City" id="location" name="location">
                                        </div>
                                        <div class="form-section col-md-3">
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
                                        <div class="form-section col-md-3">
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
                                </div>

                                    <div class="row">
                                        <div class="form-section col-md-3">
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
                                        <div class="form-section col-md-3">
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
                                        <div class="form-section col-md-3">
                                            <label>Land Size M<sup>2</sup></label>
                                            <input class="form-control" placeholder="Eg : 100000" id="land" name="land">
                                        </div>
                                        <div class="form-section col-md-3">
                                            <label>Building Size M<sup>2</sup></label>
                                            <input class="form-control" placeholder="Eg : 100000" id="building" name="building">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-section col-md-3">
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
                                        <div class="form-section col-md-3">
                                            <label>Price Range (Rp)</label>
                                            <input class="form-control" placeholder="Harga minimun" id="min" name="min">
                                        </div>
                                        <div class="form-section col-md-3">
                                            <label>&nbsp;</label>
                                            <input class="form-control" placeholder="Harga maximum" id="max" name="max">
                                        </div>

                                        <div class="form-section col-md-3">
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
                            <li class="col-md-2 mrgb5x col-sm-4">
                                <div class="property-box">
                                    <div class="appartment-img">
                                        @foreach ($property['linked']['listFile'] as $element2)
                                        @if($element2['fileId'] == $element['links']['listFile'][0])
                                        <img src="https://www.remax.co.id/prodigy/papi/{{$element2['filePreview']}}?size=600,300" alt="#" style="height: 100%; width: 100%;" />
                                        @break
                                        @endif
                                        @endforeach
                                        <div class="detail-btn">
                                            <a href="#" class="sale">For {{$property['linked']['listListingCategoryId'][0]['lsclName']}}</a> 
                                        </div>
                                    </div>
                                    <div class="property-text">
                                        <div class="appartment-name">
                                            <h4></h4>
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
                                            <i class="fa fa-bed"></i><span>{{ $element['listBedroom'] }}</span>&nbsp;&nbsp;
                                            <i class="fa fa-shower"></i><span>{{ $element['listBedroom'] }}</span>&nbsp;&nbsp;
                                            <i class="fa fa fa-area-chart"></i>{{ $element['listBuildingSize'] }}m<sup>2</sup>
                                            <a href="{{ url('property/') }}/{{$element['id']}}" class="btn btn-default btn-xs pull-right btn-outline">More Info</a>
                                        </div>
                                        <div class="clearfix"><hr/></div>
                                        <div>
                                            <i class="fa fa-map-marker fa-lg"></i>&nbsp;&nbsp;<span>{{ $property['linked']['listCityId'][0]['mctyDescription'] }}</span><br>
                                            <i class="fa fa-map-marker fa-lg" style="color: transparent;"></i>&nbsp;&nbsp;<span><span>{{ $property['linked']['listProvinceId'][0]['mprvDescription'] }}</span>
                                        </div>
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
                    @for ($i = 1; $i <= ceil($propertyTotal['status']['totalRecords']/2); $i++)
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