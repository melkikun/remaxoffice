@extends('template')
@section('title')
Franchise
@stop
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}assets/mycss/franchise.css">
@stop
@section('content')
<section class="border-top">
    <div class="container-fluid">
        <div class="page-title clearfix">
            <ul class="breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class="active"><a href="{{ url('franchise') }}">Franchise</a></li>
            </ul>
        </div>
    </div>
</section>
<section>
    <div class="franchise">
        @foreach ($franchisex['data'] as $element)
        {!!$element['wbflDescription']!!}
        @endforeach
    </div>
    <div class="how-help ng-scope">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center postres">
                            <div class="title">
                                <h1>Own a</h1>
                                <h1><span class="text-red">RE</span>/<span class="text-red">MAX</span> <span class="text-black">OFFICE</span></h1>
                                <h4>Unlimited Income Opportunities</h4>
                            </div>
                        </div>
                        <img src="https://www.remax.co.id//www/build/assets/images/baloon_remax.png" class="img-responsive baloon hidden-xs">
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><div class="br10px"></div></div>
                    </div>
                    <form>
                        <div class="row" ng-hide="sent">
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">                
                                <div class="form-group">
                                    <input name="name" class="form-control" placeholder="Name ..." required="required" type="text">
                                    <input name="email_address" class="form-control" placeholder="Email Address ..." required="required" type="text">
                                    <input name="phone_number" class="form-control" placeholder="Phone Number ..." required="required" type="text">
                                </div>                
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <textarea class="form-control" rows="5" style="padding-bottom: 15px;" required="required">Message....</textarea>    
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-right">
                            <button type="submit" class="btn btn-primary">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@stop