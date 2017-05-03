@extends('template')
@section('css')
<style type="text/css">
    .panel-body{
        text-align:justify;
    }
    .date-post {
        color: red;
        font-size: 10px;
        font-weight: bold;
    }
    .user-post {
        color: #004480;
        font-size: 10px;
        font-weight: bold;
    }
    .transparent {
      color: transparent !important;
  }
  .info-release{
    font-size: 10px !important;
    color: red !important;
}
</style>
@stop
@section('title')
RE/MAX NEWS {{Session::get("lang")}}
@stop
@section('content')
<section class="border-top">
    <div class="container-fluid">
        <div class="page-title mrgb6x mrgt6x clearfix">
            <ul class="breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class="active"><a href="{{ url('news') }}">News</a></li>
            </ul>
        </div>
    </div>
</section>
<section>
    @if ($news['data'] != null)
    <div class="container-fluid">
        <div class="row">
            <div class="faq">
                <div class="col-md-9">
                    <div class="panel-group" id="accordion">

                        @foreach ($news['data'] as $key => $value)
                        <div class="panel panel-default animated out" data-delay="0" data-animation="fadeInUp">
                            <div class="panel-heading">
                                <h4 class="panel-title"> 
                                    @if ($key == 0)
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$key}}" aria-expanded="true"> 
                                        <span>0{{$key+1}}</span> 
                                        {{$value['wbnlTitle']}}
                                        <br>
                                        <span class="transparent">0{{$key+1}}</span> 
                                        <span class="info-release">{{date('D, d F Y',strtotime($value['wbnlCreatedTime']))}}</span>
                                    </a> 
                                    @else
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$key}}" aria-expanded="false"> 
                                        <span>0{{$key+1}}</span>
                                        {{$value['wbnlTitle']}}
                                    </a> 
                                    @endif

                                </h4>
                            </div>
                            @if ($key == 0)
                            <div id="collapse{{$key}}" class="panel-collapse collapse in">
                                @else
                                <div id="collapse{{$key}}" class="panel-collapse collapse">
                                    @endif
                                    <div class="row">
                                        <div class="col-sm-3">
                                            @foreach ($news['linked']['wbneFileId'] as $element)
                                            @if ($element['fileId'] == $value['links']['wbneFileId'])
                                            <img src="https://www.remax.co.id/prodigy/papi/{{$element['filePreview']}}" style="width: 100%; height: 200px">
                                            @endif
                                            @endforeach
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="panel-body">
                                                <?php
                                                $content = preg_replace('#<[^>]+>#', '', $value['wbnlContent']);
                                                $split = explode(" ", $content);
                                                if(count($split) > 80){
                                                    for($i = 0; $i < 80 ; $i++){
                                                        echo $split[$i]." ";
                                                    }
                                                }else{
                                                    echo $content;
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="row">
                                        <div class="col-sm-12 text-right">
                                            <a href="{{ url("news/$value[id]") }}" class="btn btn-danger btn-outline" id="detail{{$key}}"  style="margin-bottom: 20px; margin-right: 20px;">
                                                Read More
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="right-side-bar mrgb5x">
                        <div class="blog-post mrgt3x animated out" data-delay="0" data-animation="fadeInUp">
                            <div class="rightbar-heading mrgb3x">
                                <h4>LATEST POST</h4>
                            </div>
                            @foreach ($news['data'] as $key => $value)
                            <div class="post-area">
                                <a href="{{ url("news/$value[id]") }}">
                                    <h4>{{$value['wbnlTitle']}}</h4>
                                    <div class="date-post">
                                        Posted On {{date('D, d F Y',strtotime($value['wbnlCreatedTime']))}}
                                    </div>
                                    <div class="user-post">
                                        By :  {{$value['wbnlCreatedUserId']}}
                                    </div> 
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </section>
    @stop