@extends('template')
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('/') }}assets/bower_components/owl-carousel/owl-carousel/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="{{ asset('/') }}assets/bower_components/owl-carousel/owl-carousel/owl.theme.css">
<link rel="stylesheet" type="text/css" href="{{ asset('/') }}assets/bower_components/owl-carousel/owl-carousel/owl.transitions.css">
<link rel="stylesheet" type="text/css" href="{{ asset('/') }}assets/bower_components/bootstrap-social-gh-pages/bootstrap-social.css">
<link rel="stylesheet" type="text/css" href="{{ asset('/') }}assets/mycss/property_detail.css">
@stop

@section('title')
RE/MAX PROPERTY DETAIL
@stop
@section('content')
<section class="border-top">
  <div class="container-fluid">
    <div class="page-title mrgb6x mrgt6x clearfix">
      <ul class="breadcrumb">
        <li><a href="#">Pages</a></li>
        <li class="active"><a href="#">Property Single</a></li>
      </ul>
    </div>
  </div>
</section>
@php
$imgx = array();
@endphp
@if (count($property['data'])> 0)
<section id="content">
  @foreach ($property['data'] as $element)
  <section>
    <div class="container-fluid">
      <div id="owl-demo">
        @foreach ($element['links']['listFile'] as $imgId)
        @foreach ($property['linked']['listFile'] as $linkImg)
        @if ($imgId == $linkImg['fileId'])
        <div class="item">
          <div class="box">
           <div class="ribbon"><span>POPULAR</span></div>
         </div>
         <div style="background-image: url('https://www.remax.co.id/prodigy/papi/{{$linkImg['filePreview']}}');height: 350px;filter: blur(25px);position: center;width: 100%;"></div>
         <img src="https://www.remax.co.id/prodigy/papi/{{$linkImg['filePreview']}}" alt="Owl Image">
       </div>
       @php
       array_push($imgx, "https://www.remax.co.id/prodigy/papi/".$linkImg['filePreview'])
       @endphp
       @endif
       @endforeach
       @endforeach
     </div>
   </section>
   <section>
     <div class="container-fluid">
      <div class="property-description mrgt5x animated in" data-delay="0" data-animation="fadeInUp">
       <div class="property-heading">
        <h4><span>PROPERTY DESCRIPTION</span></h4>
      </div>
      <ul class="description-content col-md-3" id="property-list-detail">
        <li>
          <span class="description-title">
            Lokasi
          </span>
          <span class="title-detail">
            {{$element['listStreetName']}}
          </span>
        </li>
        <li>
          <span class="description-title">
            Kode Pos
          </span>
          <span class="title-detail">
            @if ($element['listPostalCode'] ==  null)
            -
            @else
            {{$element['listPostalCode']}}
            @endif
          </span>
        </li>
        <li>
          <span class="description-title">
            Kota
          </span>
          <span class="title-detail">
            @foreach ($property['linked']['listCityId'] as $kab)
            @if ($kab['mctyId'] == $element['links']['listCityId'])
            {{ $kab['mctyDescription'] }}
            @endif
            @endforeach
          </span>
        </li>
        <li>
          <span class="description-title">
            Provinsi 
          </span>
          <span class="title-detail">
           @foreach ($property['linked']['listProvinceId'] as $prov)
           @if ($prov['mprvId'] == $element['links']['listProvinceId'])
           {{ $prov['mprvDescription'] }}
           @endif
           @endforeach
         </span>
       </li>
       <li>
        <span class="description-title">
          Negara 
        </span>
        <span class="title-detail">
          Indonesia
        </span>
      </li>
      <li>
        <span class="description-title">
          Luas Tanah 
        </span>
        <span class="title-detail">
          {{$element['listLandSize']}}m<sup>2</sup>
        </span>
      </li>
      <li>
        <span class="description-title">
          Luas Bangunan
        </span>
        <span class="title-detail">
          {{$element['listBuildingSize']}}m<sup>2</sup>
        </span>
      </li>
      <li>
        <span class="description-title">
          Kamar Tidur 
        </span>
        <span class="title-detail">
          {{$element['listBedroom']}}
        </span>
      </li>
      <li>
        <span class="description-title">
          Kamar Mandi 
        </span>
        <span class="title-detail">
          {{$element['listBathroom']}}
        </span>
      </li>
      <li>
        <span class="description-title">
          Harga
        </span>
        <span class="title-detail">
          @if ($element['listListingPrice'] >= 100000000000)
          Rp. {{$element['listListingPrice']/1000000000000}} T
          @elseif($element['listListingPrice'] >= 1000000000)
          Rp. {{$element['listListingPrice']/1000000000}} M
          @else
          Rp. {{$element['listListingPrice']/1000000}} JT
          @endif
        </span>
      </li>
    </ul>
    <div class="description-text col-md-3" id="property-list-description">
      <h5>Descriptipon</h5>
      <p>{{$element['listDescription']}}</p>
    </div>
    <div class="description-text col-md-2" id="property-list-agent">
      <div class="gallery">
        @foreach ($property['linked']['listMmbsId'] as $element2)
        @if ($element2['mmbsId'] == $element['links']['listMmbsId'])
        <img src = "{{ asset('/') }}assets/images/noPhotoAvailable.jpg" class = "img-thumbnail">
        @else
        <img src = "{{ asset('/') }}assets/images/noPhotoAvailable.jpg" class = "img-thumbnail">
        @endif
        @endforeach
      </div>
      <a class="btn btn-social btn-yahoo" style="width:100%">
        <span class="fa fa-info"></span>Show Contact
      </a>
      <br/>
      <a class="btn btn-social-icon btn-twitter" href="https://twitter.com/share?url={{ url('property') }}/{{$property['data'][0]['listUrl']}};text={{$element['listDescription']}};hashtags={{$element['listDescription']}}" target="_blank">
        <span class="fa fa-twitter"></span>
      </a>
      <a class="btn btn-social-icon btn-facebook"  href="https://www.facebook.com/sharer/sharer.php?u={{ url('property') }}/{{$property['data'][0]['listUrl']}}" target="_blank">
        <span class="fa fa-facebook"></span
        </a>
        <a class="btn btn-social-icon btn-linkedin" href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ url('property') }}/{{$property['data'][0]['listUrl']}}" target="_blank">
          <span class="fa fa-linkedin"></span
          </a>
          <a class="btn btn-social-icon btn-google" href="https://plus.google.com/share?url={{ url('property') }}/{{$property['data'][0]['listUrl']}}" target="_blank">
            <span class="fa fa-google"></span>
          </a>
        </div>
        <div class="description-text col-md-4" id="property-list-suggest">
          @for ($i = 0; $i < 10; $i++)
          <div class="property-block-small">
           <a href="#">
             <div class="property-image-small" style="background-image: url(&quot;https://www.remax.co.id/prodigy/papi/Listing/crud/28/links/ListingFile/115&quot;);">
             </div>
             <div class="detail">
              <p class="detail-p">Rumah Design Minimalis</p> 
              <p class="team-color detail-p">Harapan Indah</p> 
              <p class="detail-p">Rp. 1.5 M</p>
            </div> 
          </a> 
          <hr>
        </div>
        @endfor
      </div>
    </div>
  </div>
</section>
<section>
  <div class="container-fluid">
   <div class="property-features mrgt6x animated in" data-delay="0" data-animation="fadeInUp">
    <div class="property-heading">
     <h4><span>PROPERTY MAP</span></h4>
   </div>
   <div class="map">
     <div id="map_div" style="height: 400px;"></div>
   </div>
 </div>
</div>
</section>
<section>
  <div class="container-fluid">
   <div class="property-features mrgt6x animated in" data-delay="0" data-animation="fadeInUp">
    <div class="property-heading">
     <h4><span>PROPERTY FEATURES</span></h4>
   </div>
   <ul class="features-name page-2 col-md-10">
     @if (count($property['linked']['listFacility']) > 0)
     @foreach ($property['linked']['listFacility'] as $element2)
     <li class="col-md-2 no-padding"><i class="fa fa-check"></i><span>balcony</span></li>
     @endforeach
     @else
     <li class="col-md-12 no-padding"><i class="fa fa-check"></i><span>No Facility</span></li>
     @endif
   </ul>
 </div>
</div>
</section>
<section>
  <div class="container-fluid">
    <div class="post-review mrgt7x animated fadeInUp in" data-delay="0" data-animation="fadeInUp">
      <div class="property-heading">
        <h4><span>POST A REVIEW</span></h4>
      </div>
      <div class="col-md-9 no-padding">
        <div class="post-guide mrgt3x mrgb4x">
          <p>Fill out all required fields to send a message. You have to login to your wordpress account to post any comment. Please donÂ´t spam, thank you!</p>
        </div>
      </div>
      <div class="post-form clearfix">
        <form id="review-form" method="post" name="postreview">
          <div class="col-md-4 no-padding">
            <div class="form-group">
              <label>FIRST NAME</label>
              <input class="form-control" placeholder="enter a name">
            </div>
            <div class="form-group">
              <label>LAST NAME</label>
              <input class="form-control" placeholder="enter a email">
            </div>
            <div class="form-group">
              <label>EMAIL</label>
              <input class="form-control" placeholder="enter a subject">
            </div>
          </div>
          <div class="col-md-8">
            <div class="form-group">
              <label>MESSAGE</label>
              <textarea class="form-control" placeholder="type in a message" rows="9"></textarea>
            </div>
            <div class="send-msg"> <a href="#" class="post-msg">SEND MESSAGE<i class="fa fa-angle-right"></i></a></div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<hr/>
@endforeach
</section>
@else
false expr
@endif
@stop
@section('javascript')
<script type="text/javascript" src="{{ asset('/') }}assets/bower_components/owl-carousel/owl-carousel/owl.carousel.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDO7bSZjer84qHPkPDwMW_CFUHOjgluXak&callback=initMap"></script>
<script type="text/javascript" src="{{ asset('/') }}assets/myjs/property_detail.js"></script>
<script>
 function initMap(){
   @if ($property['data']['0']['listCoordinat'] != null)
   @else
   @endif
   var map;
   google.maps.event.addDomListener(window, "load", function () {
     var map = new google.maps.Map(document.getElementById("map_div"), {
      center: new google.maps.LatLng(-6.225673, 106.808481),
      zoom: 14,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });
     mapStyle(map)
     var infoWindow = new google.maps.InfoWindow();
     function createMarker(options, html) {
      var marker = new google.maps.Marker(options);
      if (html) {
        google.maps.event.addListener(marker, "click", function () {
          infoWindow.setContent(html);
          infoWindow.open(options.map, this);
        });
      }
      return marker;
    }
    var image = {
                    url: 'http://www.remaxbeachtown.com//images/balloon.png', // image is 512 x 512
                    scaledSize: new google.maps.Size(50, 50),
                  };
                  var harga = "";
                  @if ($property['data'][0]['listListingPrice'] >= 100000000000)
                  harga = "Rp. {{$property['data'][0]['listListingPrice']/1000000000000}} T";
                  @elseif($property['data'][0]['listListingPrice'] >= 1000000000)
                  harga = "Rp.  {{$property['data'][0]['listListingPrice']/1000000000}} M";
                  @else
                  harga = "Rp. {{$property['data'][0]['listListingPrice']/1000000}} JT";
                  @endif

                  var title = "{{ $property['data'][0]['listTitle'] }}";

                  var content1 = "<div><h1>"+title+"</h1></div>";
                  var harga = "<div>"+harga+"</div>";

                  var marker0 = createMarker({
                    position: new google.maps.LatLng(-6.225673, 106.808481),
                    map: map,
                    icon: image
                  }, content1 + "<br>" + harga );

                });
 }
</script>
@stop
@section('og')
<meta property="fb:app_id" content="816068768546426" /> 
<meta property="og:type" content="website" />
<meta property="og:url" content="{{ url('property') }}/{{$property['data'][0]['listUrl']}}" />
<meta property="og:title" content="{{$property['data'][0]['listTitle']}}" />
<meta property="og:image" content="{{$imgx[0]}}?size=600,600" />
<meta property="og:image:width" content="700" />
<meta property="og:image:height" content="700" />
<meta property="og:description" content="{{$property['data'][0]['listDescription']}}" />
@stop