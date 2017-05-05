@extends('template')
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('/') }}assets/mycss/property.css">
@stop
@section('javascript')
<script src="{{ asset('/') }}assets/bower_components/jquery-mask-plugin/dist/jquery.mask.min.js"></script>
<script src="{{ asset('/') }}assets/bower_components/jquery_lazyload/jquery.lazyload.js"></script>
<script src="{{ asset('/') }}assets/myjs/property.js"></script>
@stop
@section('title')
RE/MAX PROPERTY
@stop
@section('content')
<section class="border-top">
    <div class="container-fluid">
        <div class="page-title mrgb6x mrgt6x clearfix">
            <ul class="breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class="active"><a href="{{ url('properties') }}">Properties</a></li>
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
                                            <input class="form-control" placeholder="Rumah, Apartemen" id="keyword" name="keyword" value="{{Request::input('keyword')}}">
                                        </div>
                                        <div class="form-section col-md-2">
                                            <label>Location</label>
                                            <input class="form-control" placeholder="Location, City" id="location" name="location" value="{{Request::input('location')}}">
                                        </div>
                                        <div class="form-section col-md-2">
                                            <label>Property Type</label>
                                            <div class="select-box">
                                                <select class="form-control" name="type" id="type">
                                                    <option value="">All</option>
                                                    @if ($propertytype['data'] != null)
                                                    @foreach ($propertytype['data'] as $element)
                                                    @if (Request::input('type') == $element['id'])
                                                    <option value="{{$element['id']}}" selected="">{{$element['prtlName']}}</option>
                                                    @else
                                                    <option value="{{$element['id']}}">{{$element['prtlName']}}</option>
                                                    @endif
                                                    @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-section col-md-2">
                                            <label>Sale Type</label>
                                            <div class="select-box">
                                                <select class="form-control" name="sale" id="sale">
                                                    <option value="">All</option>
                                                    @if ($listingcategory['data'] != null)
                                                    @foreach ($listingcategory['data'] as $element)
                                                    @if (Request::input('sale') == $element['id'])
                                                    <option value="{{$element['id']}}" selected="">{{$element['lsclName']}}</option>
                                                    @else
                                                    <option value="{{$element['id']}}">{{$element['lsclName']}}</option>
                                                    @endif
                                                    @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-section col-md-2">
                                            <label>Bathrooms</label>
                                            <div class="select-box">
                                                <select class="form-control" name="bath" id="bath">
                                                    <option value="" @if (Request::input('bath') <1 ) selected @endif>All</option>
                                                    @for ($i = 1; $i < 7; $i++)
                                                    @if (Request::input('bath') == $i)
                                                    <option value="{{$i}}" selected="">{{$i}}</option>
                                                    @else
                                                    <option value="{{$i}}">{{$i}}</option>
                                                    @endif
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-section col-md-2">
                                            <label>Bedrooms</label>
                                            <div class="select-box">
                                                <select class="form-control" name="bed" id="bed">
                                                 <option value="" @if (Request::input('bed') <1) selected @endif>All</option>
                                                 @for ($i = 1; $i < 7; $i++)
                                                 @if (Request::input('bath') == $i)
                                                 <option value="{{$i}}" selected="">{{$i}}</option>
                                                 @else
                                                 <option value="{{$i}}">{{$i}}</option>
                                                 @endif
                                                 @endfor
                                             </select>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="row">
                                    <div class="form-section col-md-2">
                                        <label>Land Size M<sup>2</sup></label>
                                        <input class="form-control" placeholder="Eg : 100000" id="land" name="land" value="{{Request::input('land')}}">
                                    </div>
                                    <div class="form-section col-md-2">
                                        <label>Building Size M<sup>2</sup></label>
                                        <input class="form-control" placeholder="Eg : 100000" id="building" name="building" value="{{Request::input('building')}}">
                                    </div>
                                    <div class="form-section col-md-2">
                                        <label>Facility</label>
                                        <div class="select-box">
                                            <select class="form-control" name="facility" id="facility">
                                                <option value="">All</option>
                                                @if (($facility['data'] != null))
                                                @foreach ($facility['data'] as $element)
                                                @if (Request::input('facility') == $element['id'])
                                                <option value="{{$element['id']}}" selected="">{{$element['fctlName']}}</option>
                                                @else
                                                <option value="{{$element['id']}}">{{$element['fctlName']}}</option>
                                                @endif
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-section col-md-2">
                                        <label>Price Min(Rp)</label>
                                        <input class="form-control" placeholder="Eg : 100000" id="min" name="min" value="{{Request::input('min')}}">
                                    </div>
                                    <div class="form-section col-md-2">
                                        <label>Price Max(Rp)</label>
                                        <input class="form-control" placeholder="Eg : 100000" id="max" name="max" value="{{Request::input('max')}}">
                                    </div>
                                    <div class="form-section col-md-2">
                                        <label>&nbsp;</label>
                                        <input class="form-control btn btn-danger" id="search" name="search" type="submit" value="Search Property" style="background-color: #e11b22;">
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
                        @if (($property['data'])!=null)
                        @foreach ($property['data'] as $element)
                        <li class="col-md-2 mrgb5x col-sm-4" style="cursor: pointer; padding-right: 0px;">
                            <div class="property-box">
                                <a href="{{ url('property') }}/{{$element['listUrl']}}" class="a-link">
                                    <div class="appartment-img">
                                        @foreach ($property['linked']['listFile'] as $element2)
                                        @if($element2['fileId'] == $element['links']['listFile'][0])
                                        <img src="https://www.remax.co.id/prodigy/papi/{{$element2['filePreview']}}?size=600,300" alt="#" style="height: 100%; width: 100%;" />
                                        @break
                                        @endif
                                        @endforeach
                                        @foreach ($property['linked']['listListingCategoryId'] as $lsclName)
                                        @if ($lsclName['mlscId'] == $element['links']['listListingCategoryId'])
                                        @if ($lsclName['id'] == 1)
                                        <div class="detail-btn">
                                            <a href="{{ url('property') }}/{{$element['listUrl']}}" class="sale">
                                                For {{$lsclName['lsclName']}}
                                            </a> 
                                        </div>
                                        @else
                                        <div class="detail-btn">
                                            <a href="{{ url('property') }}/{{$element['listUrl']}}" class="rent">
                                                For {{$lsclName['lsclName']}}
                                            </a> 
                                        </div>
                                        @endif
                                        @endif
                                        @endforeach
                                    </div>
                                </a>
                                <a href="{{ url('property') }}/{{$element['listUrl']}}" class="a-link">
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
                                            <p class="one-line">
                                                {{$element['listDescription']}}
                                            </p>
                                        </div>
                                        <div class="facility">
                                            <i class="fa fa-bed"></i>
                                            <span class="text-facility">
                                                @if ($element['listBedroom'] != null)
                                                {{ $element['listBedroom'] }}
                                                @else
                                                {{ "-" }}
                                                @endif
                                            </span>&nbsp;&nbsp;
                                            <i class="fa fa-shower"></i>
                                            <span class="text-facility">
                                                @if ($element['listBathroom'] != null)
                                                {{ $element['listBathroom'] }}
                                                @else
                                                {{ "-" }}
                                                @endif
                                            </span>&nbsp;&nbsp;
                                            <i class="fa fa fa-area-chart"></i>
                                            <span class="text-facility">
                                                @if ($element['listLandSize'] != null)
                                                {{ $element['listLandSize'] }}m<sup>2</sup>
                                                @else
                                                {{ "-" }}m<sup>2</sup>
                                                @endif
                                            </span>&nbsp;&nbsp;
                                            <i class="fa fa fa-building"></i>
                                            <span class="text-facility">
                                                @if ($element['listBuildingSize'] != null)
                                                {{ $element['listBuildingSize'] }}m<sup>2</sup>
                                                @else
                                                {{ "-" }}m<sup>2</sup>
                                                @endif
                                            </span>&nbsp;&nbsp;
                                        </div>
                                        <div class="clearfix">
                                            <hr style="border-color: black;">
                                        </div>
                                        <div>
                                            <i class="fa fa-map-marker fa-lg"></i>&nbsp;&nbsp;
                                            <span style="font-size: 14px; font-weight: bolder;">
                                                @foreach ($property['linked']['listCityId'] as $kab)
                                                @if ($kab['mctyId'] == $element['links']['listCityId'])
                                                {{ $kab['mctyDescription'] }}
                                                @endif
                                                @endforeach
                                            </span>
                                            <br>
                                            <i class="fa fa-map-marker fa-lg" style="color: transparent;"></i>&nbsp;&nbsp;
                                            <span style="color: #aaa">
                                                @foreach ($property['linked']['listProvinceId'] as $prov)
                                                @if ($prov['mprvId'] == $element['links']['listProvinceId'])
                                                {{ $prov['mprvDescription'] }}
                                                @endif
                                                @endforeach
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </li>
                        @endforeach
                        @else
                        <div class="row">
                           <div class="col-sm-12 text-center" id="property-empty">
                            <div id="text-nf">Opsss!! Data Not Found</div>
                        </div>
                    </div>
                    @endif
                </ul>
            </div>
        </div>
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
</section>
@stop