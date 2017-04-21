@extends('template')

@section('css')
<style type="text/css">

    .panel-body{
        text-align:justify;
    }
</style>
@stop

@section('title')
RE/MAX NEWS
@stop

@section('javascript')
<script type="text/javascript">
    jQuery(document).ready(function ($) {

    });
</script>
@stop

@section('js')
<script type="text/javascript">

</script>
@stop
@section('content')
<section class="border-top">
    <div class="container-fluid">
        <div class="page-title mrgb6x mrgt6x clearfix">
            <h4 class="page-name">NEWS PAGE</h4>
            <div class="tag-bar"> <a href="#"><span></span></a> </div>
            <ul class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active"><a href="#">News</a></li>
            </ul>
        </div>
    </div>
</section>
<section>
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
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$key}}" aria-expanded="true"> <span>0{{$key+1}}</span> {{$value['wbnlTitle']}}</a> 
                                    @else
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$key}}" aria-expanded="false"> <span>0{{$key+1}}</span>{{$value['wbnlTitle']}}</a> 
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
                                                // echo count($split);
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
                                    <a href="{{ url("news/$value[id]") }}" class="btn btn-danger btn-outline" id="detail{{$key}}"  style="margin-bottom: 20px; margin-right: 20px;">Read More</a>
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
                            @foreach ($news['data'] as $key => $value)
                            <div class="post-area">
                            <h4>{{$value['wbnlTitle']}}</h4>
                                <span class="best-place">POSTED ON {{$value['wbnlCreatedTime']}}</span> 
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @stop