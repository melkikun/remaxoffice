<!DOCTYPE html>

<style>

    .page-homepage body {

        height: 100%;

        overflow: hidden;

    }



    .bank-partner {

        font-size: 24px;

        padding-top: 20px;

        padding-bottom: 50px;

        text-align: center;

        top: 60%;

        left: 50%;

    }



    .advSearch-wrap img {

        margin: 0 auto;

        height: 50px;

    }



    .wrapper-icon {

        position: absolute;

        bottom: 0%;

        background: white;

        width: 100%;

        padding:0 5px;



    }



    .slick-slide .slick-active{

        width: 150px !important;

        display: inline-block;

    }



</style>



<html lang="en-US">

<head>

    <meta charset="UTF-8"/>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="{{ asset('assets/fonts/font-awesome.css') }}" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.css') }}" type="text/css">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-select.min.css') }}" type="text/css">

    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.css') }}" type="text/css">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}" type="text/css">

    <link rel="stylesheet" href="{{ asset('assets/css/custom.css')}}" type="text/css">

    <link rel="stylesheet" href="{{ asset('assets/css/selectize.css')}}" type="text/css">

    <link rel="stylesheet" href="{{ asset('assets/js/slick-1.6.0/slick/slick.css') }}">

    <title>Home</title>

</head>



<body class="page-homepage" id="page-top">

<!-- Preloader -->

<div id="page-preloader">

    <div class="loader-ring"></div>

    <div class="loader-ring2"></div>

</div>

<!-- End Preloader -->



<!-- Wrapper -->

<div class="wrapper">

    <!-- Start Header -->

    <div id="header" class="menu-wht"> @include('layout.header')</div>

    <!-- End Header -->



    <!-- Page Content -->





    <div>

        <div class="home-section">

            <div class="home-center">

                {{--<object class="master-logo" type="image/svg+xml"></object>--}}

                <div class="tabs-wrap pos-relative">

                    <ul class="row m0">

                        <li><a href="#buyForm" class="buy active">BUY</a></li>

                        <li><a href="#rentForm" class="rent">RENT</a></li>

                    </ul>



                    <a href="{{ url('properties') }}" class="adv-search">Advanced Search</a>

                </div>



                <div class="search-wrap">



                    <form action="{{ route('search.home') }}" id="buyForm">

                        <div class="row m0">

                            <input type="text" placeholder="Where do you want to live ?" class="form-control pull-left"

                                   name="buySearch">

                            <button type="submit" class="btn btn-small btn-primary pull-left">Go</button>

                        </div>

                    </form>



                    <form action="{{ route('search.home') }}" id="rentForm" class="hideit">

                        <div class="row m0">

                            <input type="text" placeholder="Where do you want to live ?" class="form-control pull-left"

                                   name="rentSearch">

                            <button type="submit" class="btn btn-small btn-primary pull-left">Go</button>

                        </div>

                    </form>



                </div>







            </div>



            <div class="wrapper-icon" style="background: white;">

                {{--<div style="text-align: center; padding: 10px 0px; border-bottom: 1px solid rgba(0,0,0, 0.2); margin-bottom: 10px;">Banking Partner</div>--}}

                <div class="bankpartner-slide js-bankpartner-slide">

                    @foreach($body->linked->mbnkFileId as $data)

                        <div style="display: inline-block;width: 100px;"> <!-- kosong aja -->

                            <div style="width: 100%;text-align: center;">

                                <img style="background: white;" src="{{ $uri.$data->filePreview }}" alt="">

                            </div>

                        </div>

                    @endforeach

                </div>

            </div>

        </div>

    </div>

</div>



<!-- <div id="footer">@include('layout.footer')</div> -->





<script src="{{ asset('js/vue.min.js') }}"></script>

{{--<script type="text/javascript" src="{{ asset('js/axios.min.js') }}"></script>--}}

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>



<script type="text/javascript" src="{{ asset('assets/js/jquery-2.1.4.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('assets/js/slick-1.6.0/slick/slick.min.js') }}"> </script>

<script type="text/javascript" src="{{ asset('assets/js/jquery-migrate-1.2.1.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('assets/js/jquery.placeholder.js') }}"></script>

<script type="text/javascript" src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('assets/js/retina-1.1.0.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('assets/js/masonry.pkgd.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('assets/js/custom.js') }}"></script>

<!--[if gt IE 8]>-->

<script type="text/javascript" src="{{asset('assets/js/ie.js')}}"></script>

<!--[endif]-->

<!-- Begin - Custom Javascript -->





<script>

    $(".tabs-wrap ul li a").on("click", function () {

        var href = $(this).attr("href");

        $(".tabs-wrap ul li a").removeClass("active");

        $(this).addClass("active");



        $(".search-wrap form").addClass("hideit");

        $(href).removeClass("hideit");

    });



    $('.js-bankpartner-slide').slick({

        dots: false,

        infinite: true,

        speed: 300,

        slidesToShow: 8,

        slidesToScroll: 4,

        customPaging: function(slider, i) {

          return '<div class="bankpartner-paging"></div>';

        },

        autoplay: true,

        speed:1000,

        focusOnSelect:false,

        prevArrow: '<div style="display:none;"></div>',

        nextArrow: '<div style="display:none;"></div>',

        responsive: [

        {

          breakpoint: 1024,

          settings: {

            slidesToShow: 5,

            slidesToScroll: 3,

            infinite: true,

            dots: false

          }

        },

        {

          breakpoint: 480,

          settings: {

            slidesToShow: 3,

            slidesToScroll: 2,

            infinite: true,

            dots: false

          }

        }]

    });

</script>

<!-- End - Custom Javascript -->



</body>

</html>