<header>
    <div class="container-fluid">
        <div class="navigation clearfix">
            <div class="logo">
                <a href="{{ url('/') }}">
                    @if ($office['data'][0]['links']['frofFileId'] != null)
                    @foreach ($office['linked']['frofFileId'] as $element)
                    @if ($element['fileId'] == $office['data'][0]['links']['frofFileId'])
                    <img src="https://www.remax.co.id/prodigy/papi/{{ $element['filePreview'] }}" alt="#" style="height: 55px;" />
                    @endif
                    @endforeach
                    @else
                    <img src="{{ asset('/') }}images/logo.png" alt="#" style="height: 55px;" />
                    @endif
                </a>
            </div>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar first"></span> <span class="icon-bar middle"></span> <span class="icon-bar last"></span> </button>
            </div>
            <div class="menu">
                <nav class="navbar navbar-default">
                    <div id="navbar" class="navbar-collapse collapse pull-right">
                        <ul class="nav navbar-nav">
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
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<style type="text/css" media="screen">
    .navigation {
        margin: 0px;
    }
</style>