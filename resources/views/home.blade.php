@extends('template')
@section('css')
<link href="{{ asset('/') }}css/owl.carousel.css" rel="stylesheet" type="text/css">
<style type="text/css" media="screen">
    .search-form label{
        margin-bottom: 0px;
    }
    .search-form .form-section {
        margin-bottom: 10px;
    }
    .inner-text{
        padding: 0px;
    }
    .hprp-caption{
        color: orange;
        font-size: 35px;
    }
    .inner-text p{
        font-size: 18px;
    }
    .mrgb4x{
        margin: 20px auto 0px auto;
    }
    .mrgb8x {
        margin-bottom: 20px;
    }
    .mrgt7x {
        margin-top: 20px;
    }
    .owl-item {
        width: 200px !important;
    }
    .mrgb9x{
        margin-bottom:20px;
        margin-top:20px;
    }
    #tulisan {
        bottom: 0;
        color: #fff;
        height: 70%;
        left: 0;
        margin: auto;
        position: absolute;
        right: 0;
        text-align: center;
        top: 0;
        width: 50%;
    }
    .top-tabs .tab-content{
        padding-top: 20px;
    }
    .office-info{
        color: white;
    }
</style>
@stop
@section('javascript')
<script src="{{ asset('/') }}js/owl.carousel.min.js"></script> 
<script src="{{ asset('/') }}assets/bower_components/jquery_lazyload/jquery.lazyload.js"></script>
<script type="text/javascript">
    var myIndex = 0;

    function carousel() {
        var i;
        var x = document.getElementsByClassName("mySlides");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        myIndex++;
        if (myIndex > x.length) {
            myIndex = 1
        }
        x[myIndex - 1].style.display = "block";
        x[myIndex - 1].style.width = "100%";
        x[myIndex - 1].style.height = "450px";
    setTimeout(carousel, 15000); // Change image every 2 seconds
}

jQuery(document).ready(function($) {
   $('.partner-carousel').owlCarousel({
    items: 5,
    navigation: true,
    navigationText: true,
    pagination: false,
    autoPlay: true,
    itemsCustom: [[1300, 5], [768, 3], [600, 3], [480, 2], [320, 1]],
    slideSpeed: 1000
}); 
   carousel();
   $("img").lazyload();
});

</script>
@stop
@section('title')
RE/MAX HOME 
@stop
@section('content')
<section id="slider">
    <div id="mainslider">
        <div class="slider">
            <div class="fullscreen-container">
                <div class="fullscreenbanner">
                    <li data-transition="slide" data-slotamount="10" v-for="slider in sliders"> 
                        <img class="img-responsive mySlides" alt="#" src="{{ asset('/') }}images/backgroundhome-v2.jpg"/>
                        <img class="img-responsive mySlides" alt="#" src="{{ asset('/') }}images/sliderimg-2.png"/>
                        <img class="img-responsive mySlides" alt="#" src="{{ asset('/') }}images/sliderimg-3.png"/>
                    </li>
                    <div class="slider-text clearfix"  id="tulisan">
                        <div class="text-box">
                            <p class="office-info">Ruko Taman Palem Lestari Blok B18 No.7,</p>
                            <p class="office-info"> Jl. Kamal Raya Outer Ring Road,</p>
                            <p class="office-info"> Cengkareng Jakarta Barat</p>
                            <p>Telp Office : +62 21 5596 1288</p>
                            <p>Fax Office : +62 21 5595 8857</p>
                            <p></p>

                        </div>
                        <div class="slider-button">
                            <div class="view-btn"> <a href="">VIEW PROPERTIES</a> </div>
                            <div class="signup-btn"> <a href="#">VIEW AGENT</a> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</section>
<section id="search">
    <div class="top-tabs">
        <div class="container">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#properties" aria-expanded="true"><i class="icon-home10"></i> Properties</a></li>
            </ul>
            <div class="tab-content clearfix">
                <div id="properties" class="tab-pane fade in active">
                    <div class="search-options">
                        <div class="search-form">
                            {!! Form::open([
                                "method"=>"get",
                                "url"=>"search"
                                ]) !!}
                                <div class="form-inner">
                                    <div class="left-options col-md-12">
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
                                                    @if (count($propertytype['data'] > 0))
                                                    @foreach ($propertytype['data'] as $element)
                                                    <option value="{{$element['id']}}">{{$element['prtlName']}}</option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-section col-md-3">
                                            <label>Sale Type</label>
                                            <div class="select-box">
                                                <select class="form-control" name="sale" id="sale">
                                                    <option value="">All</option>
                                                    @if (count($listingcategory['data'] > 0))
                                                    @foreach ($listingcategory['data'] as $element)
                                                    <option value="{{$element['id']}}">{{$element['lsclName']}}</option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="left-options col-md-12">
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
                                    <div class="left-options col-md-12">
                                        <div class="form-section col-md-3">
                                            <label>Facility</label>
                                            <div class="select-box">
                                                <select class="form-control" name="facility" id="facility">
                                                    <option value="">All</option>
                                                    @if (count($facility['data'] > 0))
                                                    @foreach ($facility['data'] as $element)
                                                    <option value="{{$element['id']}}">{{$element['fctlName']}}</option>
                                                    @endforeach
                                                    @endif
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
            </div>
        </div>
    </section>
    <section class="bg-dark parallex mrgb4x">
        <div class="container">
            <div class="inner-text">
                <div>
                    @if ($content['data'][0]['wbhlVideoDescription'] != "" || $content['data'][0]['wbhlVideoDescription'] != null)
                    {!!$content['data'][0]['wbhlVideoDescription']!!}
                    @endif
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="partners mrgt9x mrgb9x animated out" data-delay="0" data-animation="fadeInUp">
                <div class="partner-carousel owl-carousel">
                    @if (count($bank['linked']['mbnkFileId'])>0)
                    @foreach ($bank['linked']['mbnkFileId'] as $element)
                    <div class="item"> <a href="#"> <img src="https://www.remax.co.id/prodigy/papi/{{$element['filePreview']}}?size=151,53" class="img-responsive" alt="#"/> </a> </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </section>
        @stop
