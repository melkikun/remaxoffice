<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                <a href="{{ url('/') }}">
                    @if ($office['data'][0]['links']['frofFileId'] != null)
                    @foreach ($office['linked']['frofFileId'] as $element)
                    @if ($element['fileId'] == $office['data'][0]['links']['frofFileId'])
                    <img src="https://www.remax.co.id/prodigy/papi/{{ $element['filePreview'] }}" alt="#" style="height: 55px; right: 1%;">
                    @endif
                    @endforeach
                    @else
                    <img src="{{ asset('/') }}images/logo.png" alt="#" style="height: 55px;" />
                    @endif
                </a>
            </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                @foreach ($header['data'] as $key => $value)
                @if (Request::segment(1) == $value['wbmnAPI'])
                <li class="active">
                    <a href="{{url($value['wbmnAPI'])}}">{{$value['wbmlName']}}</a>
                </li>
                @else
                <li>
                    <a href="{{url($value['wbmnAPI'])}}">{{$value['wbmlName']}}</a>
                </li>
                @endif
                @endforeach
                <li>
                    <a style="padding-left: 10px;padding-right: 10px;" href="?language=en">
                        <img style="width: 30px; height: 15px;" src="https://www.remax.co.id/prodigy/papi/Language/crud/1/links/langFileId/112?size=30,30" alt=#"">
                    </a>
                </li>
                <li>
                    <a style="padding-left: 10px;padding-right: 10px;" href="?language=id_ID">
                        <img style="width: 30px; height: 15px;" src="https://www.remax.co.id/prodigy/papi/Language/crud/2/links/langFileId/113?size=30,30" alt="#">
                    </a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<style type="text/css">
    @if(Request::path() == '/')
    .nav.navbar-nav.navbar-right {
        background-color: white;
        position: relative;
        z-index: 99999;
        height: auto;
    }
    @else{
       .nav.navbar-nav.navbar-right {
        background-color: white;
        /*position: relative;*/
        /*z-index: 99999;*/
        height: auto;
    }
}
@endif
</style>