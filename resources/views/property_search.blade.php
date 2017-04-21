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
<section id="property-page">
    <div class="container-fluid">
        <div class="col-md-12 no-padding">
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
    <div class="clearfix"></div>
    <div class="numbering">
        <ul class="pagination">
            @for ($i = 1; $i <= ceil($propertyTotal['status']['totalRecords']/2); $i++)
            @if ($currentPage == $i)
            <li class="active">
                <a href="{{ url('/') }}{{str_replace("&page=$currentPage","",Request::getRequestUri())}}&page={{$i}}">  
                    @if ($i < 10)
                    0{{$i}}
                    @else
                    {{$i}}
                    @endif
                </a>
            </li>
            @else
            <li>
                <a href="{{ url('/') }}{{str_replace("&page=$currentPage","",Request::getRequestUri())}}&page={{$i}}">
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