@extends('template')
@section('js')
<script type="text/javascript">
</script>
@stop
@section('javascript')
<script type="text/javascript">
</script>
@stop
@section('css')
<style type="text/css">

    /* padded section */
    .pad-section {
        padding: 50px 0;
    }
    .pad-section img {
        width: 100%;
    }

    /* vertical-centered text */
    .text-vcenter {
        display: table-cell;
        text-align: center;
        vertical-align: middle;
    }
    .text-vcenter h1 {
        font-size: 4.5em;
        font-weight: 700;
        margin: 0;
        padding: 0;
    }

    /* additional sections */
    #home {
        background: url(../images/home.jpg) no-repeat center center fixed; 
        display: table;
        height: 400px;
        position: relative;
        width: 100%;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }

    #about {
    }

    #services {
        background-color: #306d9f;
        color: #ffffff;
    }
    #services .glyphicon {
        border: 2px solid #FFFFFF;
        border-radius: 50%;
        display: inline-block;
        font-size: 60px;
        height: 140px;
        line-height: 140px;
        text-align: center;
        vertical-align: middle;
        width: 140px;
    }

    #information {
        background: url(../images/estate.jpg) no-repeat center center fixed; 
        display: table;
        height: 400px;
        position: relative;
        width: 100%;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
    #information .panel {
        opacity: 0.85;
    }

    #google_map {
        height: 500px;
    }

    footer {
        padding: 20px 0;
    }
    footer .glyphicon {
        color: #333333;
        font-size: 60px;
    }
    footer .glyphicon:hover {
        color: #306d9f;
    }
</style>
@stop

@section('title')
Franchise
@stop

@section('content')
<section class="border-top">
    <div class="container-fluid">
        <div class="page-title mrgt6x mrgb6x clearfix">
            <h4 class="page-name">Home</h4>
            <div class="tag-bar"> <a href="#"><span>Franchise</span></a> </div>
        </div>
    </div>
</section>
<!-- first section - Home -->
<div id="home" class="home">
    <div class="text-vcenter">
        <h1>Office</h1>
        <a href="#about" class="btn btn-default btn-lg">Continue</a>
    </div>
</div>
<!-- /first section -->

<!-- second section - About -->
<div id="about" class="pad-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <div class="container">
                    <p>Why do you just walk slowly, when you can run faster?</p>

                    <p>RE / MAX is present for you and accompany you in order to more quickly achieve your goals and big dreams in the real estate industry.</p>

                    <p>When you join a brand RE / MAX has worldwide, you will be part of a large family of RE / MAX has won the trust of the public.</p>

                    <p>Moreover, you will be supported by competent resource, to help recruit and Marketing Associate makes your office more professional.</p>

                    <p>RE / MAX supports you run a business that fits the needs of your organization, from the time of planning, marketing, up to office operations. RE / MAX role is to encourage the recruitment and training of potential agents to maximize the overall performance of your organization. At RE / MAX, good performance gives inspiration and positive energy for overall organizational performance.</p>

                    <p>RE / MAX understand that if you have the talent, ability, and aided by a strong determination, you will be easier to learn and understand the business overall.</p>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- fourth section - Information -->
<div id="information" class="pad-section">
    <div class="container">
        <div class="row"></div>
    </div>
</div>

<div id="about" class="pad-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <div class="container">
                    <p class="title-agent">Start Up Training</p>

                    <p>You will follow a training program the best that this industry has to offer. You'll start with a 4-5 day orientation and in-depth training sessions on the RE / MAX Center in Jakarta. You will also have the advantage of on-site training, so Franchise Office operates.</p>

                    <p class="title-agent">Ongoing Training</p>

                    <p>The advantage that you will gain by having Franchise RE / MAX is not limited to access to continuing training for you and your agency. RE / MAX University offers more than 1,000 hours of training modules, online, as per your requirement. All this material to encourage improved performance at every level, both Marketing Associate, team leader and business owner. The more often you follow the training, the greater your chances increase revenue.</p>

                    <p class="title-agent">Sustainable Support</p>

                    <p>As long as you become part of a large family of RE / MAX, you will have access and support, both locally, regionally and nationally, ranging from online training to direct face to face consultation.</p>

                </div>
            </div>
        </div>
    </div>
</div>

<div id="information" class="pad-section">
    <div class="container">
        <div class="row"></div>
    </div>
</div>

<div id="about" class="pad-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <div class="container">
                    <p class="title-agent">Start Up Training</p>

                    <p>You will follow a training program the best that this industry has to offer. You'll start with a 4-5 day orientation and in-depth training sessions on the RE / MAX Center in Jakarta. You will also have the advantage of on-site training, so Franchise Office operates.</p>

                    <p class="title-agent">Ongoing Training</p>

                    <p>The advantage that you will gain by having Franchise RE / MAX is not limited to access to continuing training for you and your agency. RE / MAX University offers more than 1,000 hours of training modules, online, as per your requirement. All this material to encourage improved performance at every level, both Marketing Associate, team leader and business owner. The more often you follow the training, the greater your chances increase revenue.</p>

                    <p class="title-agent">Sustainable Support</p>

                    <p>As long as you become part of a large family of RE / MAX, you will have access and support, both locally, regionally and nationally, ranging from online training to direct face to face consultation.</p>

                </div>
            </div>
        </div>
    </div>
</div>

@stop
