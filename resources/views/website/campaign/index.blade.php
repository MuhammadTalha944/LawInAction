    @extends('layouts.website.app')
    @section('title', 'Campaign Detail')
    @section('content')
    <script src="https://kit.fontawesome.com/496e52d5cd.js" crossorigin="anonymous"></script>
    <!-- kit_favicon.css -->
    
    <!-- <link rel="stylesheet" href="{{asset('website/asset/css/kit_favicon.css')}}"> -->

        <style type="text/css">
            .hide{
                display: none;
            }
            body{
            background-color: #f4f7f6;
                /*margin-top:20px;*/
            }
            .card {
                background: #fff;
                transition: .5s;
                border: 0;
                margin-bottom: 30px;
                border-radius: .55rem;
                position: relative;
                width: 100%;
                box-shadow: 0 1px 2px 0 rgb(0 0 0 / 10%);
            }
            .card .body {
                color: #444;
                padding: 20px;
                font-weight: 400;
            }
            .card .header {
                color: #444;
                padding: 20px;
                position: relative;
                box-shadow: none;
            }
            .single_post {
                -webkit-transition: all .4s ease;
                transition: all .4s ease
            }

            .single_post .body {
                padding: 30px
            }

            .single_post .img-post {
                position: relative;
                overflow: hidden;
                max-height: 500px;
                margin-bottom: 30px
            }

            .single_post .img-post>img {
                -webkit-transform: scale(1);
                -ms-transform: scale(1);
                transform: scale(1);
                opacity: 1;
                -webkit-transition: -webkit-transform .4s ease, opacity .4s ease;
                transition: transform .4s ease, opacity .4s ease;
                max-width: 100%;
                filter: none;
                -webkit-filter: grayscale(0);
                -webkit-transform: scale(1.01)
            }

            .single_post .img-post:hover img {
                -webkit-transform: scale(1.02);
                -ms-transform: scale(1.02);
                transform: scale(1.02);
                opacity: .7;
                filter: gray;
                -webkit-filter: grayscale(1);
                -webkit-transition: all .8s ease-in-out
            }

            .single_post .img-post:hover .social_share {
                display: block
            }

            .single_post .footer {
                padding: 0 30px 30px 30px
            }

            .single_post .footer .actions {
                display: inline-block
            }

            .single_post .footer .stats {
                cursor: default;
                list-style: none;
                padding: 0;
                display: inline-block;
                float: right;
                margin: 0;
                line-height: 35px
            }

            .single_post .footer .stats li {
                border-left: solid 1px rgba(160, 160, 160, 0.3);
                display: inline-block;
                font-weight: 400;
                letter-spacing: 0.25em;
                line-height: 1;
                margin: 0 0 0 2em;
                padding: 0 0 0 2em;
                text-transform: uppercase;
                font-size: 13px
            }

            .single_post .footer .stats li a {
                color: #777
            }

            .single_post .footer .stats li:first-child {
                border-left: 0;
                margin-left: 0;
                padding-left: 0
            }

            .single_post h3 {
                font-size: 20px;
                text-transform: uppercase
            }

            .single_post h3 a {
                color: #242424;
                text-decoration: none
            }

            .single_post p {
                font-size: 16px;
                line-height: 26px;
                font-weight: 300;
                margin: 0
            }

            .single_post .blockquote p {
                margin-top: 0 !important
            }

            .single_post .meta {
                list-style: none;
                padding: 0;
                margin: 0
            }

            .single_post .meta li {
                display: inline-block;
                margin-right: 15px
            }

            .single_post .meta li a {
                font-style: italic;
                color: #959595;
                text-decoration: none;
                font-size: 12px
            }

            .single_post .meta li a i {
                margin-right: 6px;
                font-size: 12px
            }

            .single_post2 {
                overflow: hidden
            }

            .single_post2 .content {
                margin-top: 15px;
                margin-bottom: 15px;
                padding-left: 80px;
                position: relative
            }

            .single_post2 .content .actions_sidebar {
                position: absolute;
                top: 0px;
                left: 0px;
                width: 60px
            }

            .single_post2 .content .actions_sidebar a {
                display: inline-block;
                width: 100%;
                height: 60px;
                line-height: 60px;
                margin-right: 0;
                text-align: center;
                border-right: 1px solid #e4eaec
            }

            .single_post2 .content .title {
                font-weight: 100
            }

            .single_post2 .content .text {
                font-size: 15px
            }

            .right-box .categories-clouds li {
                display: inline-block;
                margin-bottom: 5px
            }

            .right-box .categories-clouds li a {
                display: block;
                border: 1px solid;
                padding: 6px 10px;
                border-radius: 3px
            }

            .right-box .instagram-plugin {
                overflow: hidden
            }

            .right-box .instagram-plugin li {
                float: left;
                overflow: hidden;
                border: 1px solid #fff
            }

            .comment-reply li {
                margin-bottom: 15px
            }

            .comment-reply li:last-child {
                margin-bottom: none
            }

            .comment-reply li h5 {
                font-size: 18px
            }

            .comment-reply li p {
                margin-bottom: 0px;
                font-size: 15px;
                color: #777
            }

            .comment-reply .list-inline li {
                display: inline-block;
                margin: 0;
                padding-right: 20px
            }

            .comment-reply .list-inline li a {
                font-size: 13px

            }

            /*Progress Bar*/
            .progress{
                width: 100px;
                height: 100px;
            /*        width: 150px;
                height: 150px;*/
                line-height: 150px;
                background: none;
                margin: 0 auto;
                box-shadow: none;
                position: relative;
            }
            .progress:after{
                content: "";
                width: 100%;
                height: 100%;
                border-radius: 50%;
                border: 12px solid #fff;
                position: absolute;
                top: 0;
                left: 0;
            }
            .progress > span{
                width: 50%;
                height: 100%;
                overflow: hidden;
                position: absolute;
                top: 0;
                z-index: 1;
            }
            .progress .progress-left{
                left: 0;
            }
            .progress .progress-bar{
                width: 100%;
                height: 100%;
                background: none;
                border-width: 12px;
                border-style: solid;
                position: absolute;
                top: 0;
            }
            .progress .progress-left .progress-bar{
                left: 100%;
                border-top-right-radius: 80px;
                border-bottom-right-radius: 80px;
                border-left: 0;
                -webkit-transform-origin: center left;
                transform-origin: center left;
            }
            .progress .progress-right{
                right: 0;
            }
            .progress .progress-right .progress-bar{
                left: -100%;
                border-top-left-radius: 80px;
                border-bottom-left-radius: 80px;
                border-right: 0;
                -webkit-transform-origin: center right;
                transform-origin: center right;
                animation: loading-1 1.8s linear forwards;
            }
            .progress .progress-value{
                /*width: 100%;
                height: 100%;
                border-radius: 40%;
                background: #44484b;
                font-size: 24px;
                color: #fff;
                line-height: 135px;
                text-align: center;
                position: absolute;
                top: 5%;
                left: 5%;*/
                width: 100%;
                height: 100%;
                border-radius: 50%;
                /*background: #44484b;*/
                font-size: 24px;
                /*color: #fff;*/
                line-height: 135px;
                text-align: center;
                position: absolute;
                /*top: 4%;*/
                /*left: 5%;*/
            }
            /*.progress.blue .progress-bar{
                border-color: #049dff;
            }
            .progress.blue .progress-left .progress-bar{
                animation: loading-2 1.5s linear forwards 1.8s;
            }*/
            .progress.yellow .progress-bar{
                border-color: #fdba04;
            }
            .progress.yellow .progress-left .progress-bar{
                animation: loading-3 1s linear forwards 1.8s;
            }
            .progress.pink .progress-bar{
                border-color: #ed687c;
            }
            .progress.pink .progress-left .progress-bar{
                animation: loading-4 0.4s linear forwards 1.8s;
            }
            .progress.green .progress-bar{
                border-color: #1abc9c;
            }
            .progress.green .progress-left .progress-bar{
                animation: loading-5 1.2s linear forwards 1.8s;
            }
            @keyframes loading-1{
                0%{
                    -webkit-transform: rotate(0deg);
                    transform: rotate(0deg);
                }
                100%{
                    -webkit-transform: rotate(180deg);
                    transform: rotate(180deg);
                }
            }
            @keyframes loading-2{
                0%{
                    -webkit-transform: rotate(0deg);
                    transform: rotate(0deg);
                }
                100%{
                    -webkit-transform: rotate(144deg);
                    transform: rotate(144deg);
                }
            }
            @keyframes loading-3{
                0%{
                    -webkit-transform: rotate(0deg);
                    transform: rotate(0deg);
                }
                100%{
                    -webkit-transform: rotate(90deg);
                    transform: rotate(90deg);
                }
            }
            @keyframes loading-4{
                0%{
                    -webkit-transform: rotate(0deg);
                    transform: rotate(0deg);
                }
                100%{
                    -webkit-transform: rotate(36deg);
                    transform: rotate(36deg);
                }
            }
            @keyframes loading-5{
                0%{
                    -webkit-transform: rotate(0deg);
                    transform: rotate(0deg);
                }
                100%{
                    -webkit-transform: rotate(126deg);
                    transform: rotate(126deg);
                }
            }
            @media only screen and (max-width: 990px){
                .progress{ margin-bottom: 20px; }
            }

            /*Nav bar*/

            nav > .nav.nav-tabs{

              border: none;
                color:#fff;
                background:#272e38;
                border-radius:0;

            }
            nav > div a.nav-item.nav-link,
            nav > div a.nav-item.nav-link.active
            {
              border: none;
                padding: 18px 25px;
                color:#fff;
                background:#272e38;
                border-radius:0;
            }

            nav > div a.nav-item.nav-link.active:after
             {
              content: "";
              position: relative;
              bottom: -60px;
              left: -10%;
              border: 15px solid transparent;
              border-top-color: #ffcb07 ;
            }
            .tab-content{
              background: #fdfdfd;
                line-height: 25px;
                border: 1px solid #ddd;
                border-top:5px solid #ffcb07;
                border-bottom:5px solid #ffcb07;
                padding:30px 25px;
            }

            nav > div a.nav-item.nav-link:hover,
            nav > div a.nav-item.nav-link:focus
            {
              border: none;
                background: #ffcb07;
                /*background: #e74c3c;*/
                /*#ffcb07;*/
                color:#fff;
                border-radius:0;
                transition:background 0.20s linear;
            }
            .error_alert_for_payment{
              text-align: right;
              color: red;
              text-decoration: underline;
              font-weight: 700;
            }
            .fa-facebook-official{
                color: #4c6ef5;
                font-size: 30px;
            }
            .fa-twitter{
                color: #15aabf;
                font-size: 30px;
            }
            .fa-whatsapp{
                color: rgb(36, 204, 99);
                font-size: 30px;
            }
        </style>
          <div class="jumbotron text-center" style="padding: 2% !important;">
                    <div class="col-12 text-center pt-3">
                        <h1 style="color: #ffcb07;font-weight: 800">Campaign</h1>
                    </div>
          </div>
        <div id="main-content" class="blog-page">
            <div class="container">
                <div class="row clearfix">
                    <div class="col-lg-8 col-md-12 left-box">
                        <div class="card single_post">
                            <div class="body">

                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success">
                                        <p>{{ $message }}</p>
                                    </div>
                                @endif

                                @if ($message = Session::get('error'))
                                    <div class="alert alert-danger">
                                        <p>{{ $message }}</p>
                                    </div>
                                @endif

                                <div class="img-post">
                                    @foreach($campaign[0]['campaign_attachments'] as $photo)
                                        @if($photo['type'] == 'story_photo')
                                                @if($photo['main_story_image'] == 1)
                                                        <img class="d-block img-fluid" src="{{asset('storage/campaign/story_image/'.$photo['photo_name'])}}" alt="First slide">
                                                @endif
                                        @endif
                                    @endforeach
                                </div>
                                <h3><a href="#">{{$campaign[0]['story_heading']}}</a></h3>
                                <h5><a href="#">{{$campaign[0]['story_sub_heading']}}</a></h5>
                                {{--  --}}
                                <div class="row">
                                        <div class="col-xs-12 " style="width: 100%;">
                                          <nav>
                                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                              <a class="nav-item nav-link active" id="nav-story-tab" data-toggle="tab" href="#nav-story" role="tab" aria-controls="nav-story" aria-selected="true">Story</a>
                                              <a class="nav-item nav-link" id="nav-updates-tab" data-toggle="tab" href="#nav-updates" role="tab" aria-controls="nav-updates" aria-selected="false">Updates</a>
                                              <a class="nav-item nav-link" id="nav-document-tab" data-toggle="tab" href="#nav-document" role="tab" aria-controls="nav-document" aria-selected="false">Documents</a>
                                              <a class="nav-item nav-link" id="nav-testimonial-tab" data-toggle="tab" href="#nav-testimonial" role="tab" aria-controls="nav-testimonial" aria-selected="false">Testimonials</a>

                                            </div>
                                          </nav>
                                          <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                                            <div class="tab-pane fade show active" id="nav-story" role="tabpanel" aria-labelledby="nav-story-tab" style="padding: 1%;">
                                                 <p>{{$campaign[0]['story']}}</p>
                                                 <h5><u>Story Images</u></h5>
                                                    <table class="table">
                                                        <tbody>
                                                             @foreach($campaign[0]['campaign_attachments'] as $photo)
                                                                @if($photo['type'] == 'story_photo')
                                                                <tr style="text-align: center;">
                                                                    <th>
                                                                        <img class="d-block img-fluid" src="{{asset('storage/campaign/story_image/'.$photo['photo_name'])}}" alt="First slide" style="    width: 300px;height: 300px;">
                                                                    </th>
                                                                </tr>

                                                                @endif
                                                            @endforeach                                                            
                                                            
                                                        </tbody>
                                                    </table>

                                            </div>
                                            <div class="tab-pane fade" id="nav-updates" role="tabpanel" aria-labelledby="nav-updates-tab" style="padding: 1%;">
                                                @if($campaign[0]['story_updates'])
                                                    @foreach($campaign[0]['story_updates'] as $story)
                                                        <div class="col-md-12">
                                                            <small>({{$story['created_at']}})</small>
                                                            <h3><u>{{$story['story_heading']}}</u>
                                                            </h3>
                                                            <h4><u>{{$story['story_sub_heading']}}</u></h4>
                                                            <p>{{$story['story']}}</p>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                            <div class="tab-pane fade" id="nav-document" role="tabpanel" aria-labelledby="nav-document-tab" style="padding: 1%;">
                                                <h3><u>{{$campaign[0]['document_heading']}}</u></h3>
                                                <h5>{{$campaign[0]['document_sub_heading']}}</h5>
                                                <p>{{$campaign[0]['document']}}</p>
                                                <hr>
                                                <h5><u>Hard Documents</u></h5>
                                                
                                                <table class="table table-hover table-striped" style="width: 100%;">
                                                    <tbody class="document_photo_wrapper">
                                                        @if(count($campaign[0]['campaign_attachments']) > 0)
                                                            @php $count = 1; @endphp
                                                            @foreach($campaign[0]['campaign_attachments'] as $doc_photo)
                                                                @if($doc_photo['type'] == 'document_image')
                                                                    <tr>
                                                                        <td style="text-align: center;">
                                                                            <!-- <a href="{{asset('storage/campaign/document_image/'.$doc_photo['photo_name'])}}" target="_blank"> -->
                                                                                <img src="{{asset('storage/campaign/document_image/'.$doc_photo['photo_name'])}}" style="    width: 300px;height: 300px;">
                                                                            <!-- </a> -->
                                                                        </td>
                                                                    </tr>
                                                                @endif
                                                            @endforeach
                                                        @else
                                                            <tr>N\A</tr>
                                                        @endif
                                                        </tbody>
                                                </table>

                                            </div>
                                            <div class="tab-pane fade" id="nav-testimonial" role="tabpanel" aria-labelledby="nav-testimonial-tab" style="padding: 1%;">
                                                <h3><u>{{$campaign[0]['testimonial_heading']}}</u></h3>
                                                <h5>{{$campaign[0]['testimonial_sub_heading']}}</h5>
                                                <p>{{$campaign[0]['testimonial']}}</p>
                                                <h5><u>Hard Documents</u></h5>
                                                
                                                <table class="table table-hover table-striped" style="width: 100%;">
                                                    <tbody class="document_photo_wrapper">
                                                        @if(count($campaign[0]['campaign_attachments']) > 0)
                                                            @php $count = 1; @endphp
                                                            @foreach($campaign[0]['campaign_attachments'] as $doc_photo)
                                                                @if($doc_photo['type'] == 'testimonial_image')
                                                                    <tr>
                                                                        <td style="text-align: center;">
                                                                            <!-- <a href="{{asset('storage/campaign/testimonial_image/'.$doc_photo['photo_name'])}}" target="_blank"> -->
                                                                                <img src="{{asset('storage/campaign/testimonial_image/'.$doc_photo['photo_name'])}}" style="    width: 300px;height: 300px;">
                                                                            <!-- </a> -->
                                                                        </td>
                                                                    </tr>
                                                                @endif
                                                            @endforeach
                                                        @else
                                                            <tr>N\A</tr>
                                                        @endif
                                                        </tbody>
                                                </table>
                                            </div>
                                          </div>

                                        </div>
                                      </div>
                            </div>
                        </div>
                            <div class="card">
                                <div class="header">
                                    <h2>Comments</h2>
                                </div>
                                <div class="body">
                                    <ul class="comment-reply list-unstyled" id="comments_box">
                                        @if($campaign[0]['donation_comments'])
                                            @foreach($campaign[0]['donation_comments'] as $comments)
                                                <li class="row clearfix">
                                                    <div class="text-box col-md-12 col-12 p-l-0 p-r0">
                                                        <h5 class="m-b-0">{{$comments['name']}}</h5>
                                                        <p>{{$comments['comment']}}</p>
                                                        <ul class="list-inline">
                                                            <li><a href="javascript:void(0);">{{$comments['created_at']}}</a></li>
                                                        </ul>
                                                    </div>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            <div id="comment_Added" style="display: none; background-color: lightgreen; padding: 1%;">
                                <span><b>Your comment is added on this Donation!</b></span>
                            </div>
                            <div class="card">
                                <div class="header">
                                    <h2>Leave a reply <small>Your email address will not be published. Required fields are marked*</small></h2>
                                </div>
                                <div class="body">
                                    <div class="comment-form">
                                        <form class="row clearfix">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Your Name" required name="name" id="name" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Email Address" required name="email" id="email" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <textarea rows="4" class="form-control no-resize" placeholder="Please type what you want..."
                                                    name="comment"
                                                    required id="comment" required></textarea>
                                                </div> 
                                                <input type="hidden" name="campaign_id"  id="campaign_id" value="{{$campaign[0]['id']}}">
                                                <button type="submit" class="btn btn-block btn-yellow" id="btn-save">SUBMIT</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="col-lg-4 col-md-12 right-box">
                        <div class="card">
                            <div class="body widget">
                                <div class="row">
                                    <div class="col-md-6"><h5><i class="fa fa-donate"></i>&nbsp;Donate</h5></div>
                                    <div class="col-md-6" style="text-align: right;">
                                            <a href="#" data-toggle="modal" data-target="#supporters_log">
                                                <u>
                                                    @if($donations)
                                                        {{count($donations)}}
                                                    @else
                                                        No Supporter Yet!
                                                    @endif
                                                 Supporter</u>
                                            </a>
                                    </div>
                            </div>
                                    <div class="row" style="margin-top: 5%;">
                                        <div class="col-md-6">
                                                <div class="progress yellow">
                                                    <span class="progress-left">
                                                        <span class="progress-bar"></span>
                                                    </span>
                                                    <span class="progress-right">
                                                        <span class="progress-bar"></span>
                                                    </span>
                                                    <div class="progress-value">90%</div>
                                                </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h5>Raised</h5>
                                            <span>Rs. {{$count_received_fund}}</span>
                                            <br><span>of Rs. {{$campaign[0]['amount']}}{{$campaign[0]['fund_req']}}</span>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top: 5%;">
                                        <div class="col-md-12" style="text-align: center; width: 100%;">
                                            <!-- <a href="#" data-toggle="modal" class="btn btn-yellow" data-target="#donate_now_model" style="width: 100%;"
                                            data-backdrop="static" data-keyboard="false"
                                            >
                                                Donate Now
                                            </a>
                                             -->
                                            <!-- <a href="{{route('donate.now',$campaign[0]['id'])}}" class="btn btn-yellow" style="width: 100%;">
                                                Donate Now
                                            </a> -->
                                            <a href="javascript:void(0)" class="btn btn-yellow" style="width: 100%;">
                                                Donate Now
                                            </a>
                                            
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row" style="text-align: center; margin-top: 5%;">
                                                <div class="col-md-6">
                                                    <a href="{{route('donate.now.campaign',[$campaign[0]['id'],'stripe'])}}">
                                                        <u>
                                                            <b><span class="fa fa-credit-card" aria-hidden="true"></span>
                                                        Stripe</b>
                                                        </u>
                                                    </a>
                                                </div>
                                                <div class="col-md-6">
                                                    <u>
                                                        <a href="{{route('donate.now.campaign',[$campaign[0]['id'],'paytm'])}}">
                                                            <b>₹ Paytm</b>
                                                        </a>
                                                    </u>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                            </div>
                            <div class="body widget">
                                <div class="row">
                                        <div class="col-md-12"><h5><i class="fa fa-users"></i>&nbsp;Share with Others</h5></div>
                                </div>
                                    <div class="row" style="margin-top: 5%;">
                                        <!-- {!! Share::page(url('/post/'. '1234'))->facebook()->twitter()->whatsapp() !!} -->

                                        <div class="col-md-4" style="text-align: center;color: #4c6ef5;">
                                            <!-- <i class="fa fa-facebook-square" style="color: #4c6ef5;"></i> -->
                                            {!! Share::page(url('/campaigns/detail/'. $campaign[0]['id']))->facebook() !!}
                                            Facebook
                                        </div>
                                        <div class="col-md-4" style="text-align: center;color: #15aabf;">
                                            <!-- <i class="fa fa-twitter-square"
                                                style="color: #15aabf;"
                                            ></i> -->
                                            {!! Share::page(url('/campaigns/detail/'. $campaign[0]['id']))->twitter() !!}
                                            Twitter
                                        </div>
                                        <div class="col-md-4" style="text-align: center;color: rgb(36, 204, 99);">
                                            <!-- <i class="fa fa-whatsapp-square"
                                                style="color: rgb(36, 204, 99);"
                                            ></i> -->
                                            {!! Share::page(url('/campaigns/detail/'. $campaign[0]['id']))->whatsapp() !!}
                                            WhatsApp
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <!-- Modal -->
                            <div class="modal fade" id="supporters_log" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Donations Log</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <table class="table table-bordered table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Amount</th>
                                                <th>Time</th>
                                            </tr>
                                        </thead>

                                        @if($donations)
                                         <tbody>
                                                @foreach($donations as $item)
                                                    <tr>
                                                       <td>{{++$loop->index}}</td>
                                                       <td>
                                                        @if($item->user != NULL)
                                                            @if($item->anonymous == 1)
                                                                No Name
                                                            @else
                                                                {{$item->user->name}}
                                                            @endif
                                                        @else
                                                            N\A
                                                        @endif
                                                        </td>
                                                        <td>{{$item->amount}} &nbsp; {{$item->currency}}</td>
                                                       <td>{{$item->created_at->format('d M Y')}} at {{$item->created_at->format('h:m')}}</td>
                                                   </tr>
                                               @endforeach
                                           </tbody>
                                        @endif
                                    </table>
                                    @if(!$donations)
                                        <h3>No Donations Yet!</h3>
                                    @endif
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <form
                                            role="form"
                                            action="{{ route('stripe.post') }}"
                                            method="post"
                                            class="require-validation"
                                            data-cc-on-file="false"
                                            data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                                            id="payment-form">
                                    @csrf
                                <div class="modal fade" id="donate_now_model" tabindex="-1" role="dialog" aria-labelledby="donate_now_model" aria-hidden="true">
                                  <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="donate_now_model">Donation Form</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                    {{-- <form method="POST" action="{{route('donation.save')}}"> --}}
                                        {{-- @csrf --}}
                                          <div class="modal-body">

                                                  <div class="row" style="margin-left: 0%">
                                                    <h4>Donate Now</h4>
                                                  </div>
                                                  <div class="row error_alert_for_payment" style="display: none;" id="error_alert_payment">
                                                    <div class="col-md-12">
                                                        <h5>Please Fill all the fields</h5>
                                                    </div>
                                                  </div>

                                                  <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Donation  Mode:</label>
                                                   <label>One Time&nbsp;&nbsp;</label><input type="radio" name="mode" value="one_time" class="payment_method_field" required>
                                                    <label>Monthly&nbsp;&nbsp;</label><input type="radio" name="mode" value="monthly" class="payment_method_field" required>
                                                  </div>
                                                  <div class="row">
                                                    <div class="col-md-2">
                                                        <select class="form-control" name="currency" required>
                                                            <option value="INR">INR</option>
                                                            {{-- <option value="USD">USD</option> --}}
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                            <label>2500</label>&nbsp;&nbsp;<input type="radio" name="amount" value="2500" class="form-group payment_method_field" required>
                                                    </div>
                                                    <div class="col-md-2">
                                                            <label>5000</label>&nbsp;&nbsp;<input type="radio" name="amount" value="5000" class="form-group payment_method_field" required>
                                                    </div>
                                                    <div class="col-md-2">
                                                            <label>10000</label>&nbsp;&nbsp;<input type="radio" name="amount" value="10000" class="form-group payment_method_field" required>
                                                    </div>
                                                    <div class="col-md-2">
                                                            <label>Other</label>&nbsp;&nbsp;<input type="radio" name="amount" value="other" class="form-group payment_method_field" required>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="number" name="amount_other"  class="form-control">
                                                    </div>
                                                  </div>

                                                  <div class="row"
                                                  style="
                                                  @if(Auth::user())
                                                    display: none;
                                                  @endif
                                                  "
                                                  >
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Name</label>
                                                            <input type="text" name="name" class="form-control payment_method_field"
                                                            required
                                                            @auth
                                                                value="{{Auth::user()->name}}"
                                                                readonly
                                                            @endif
                                                            >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Email (<small>Not be visible on website</small>)</label>
                                                            <input type="email" name="email" class="form-control payment_method_field"  required
                                                            @auth
                                                                value="{{Auth::user()->email}}"
                                                                readonly
                                                            @endif
                                                            >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Mobile (<small>Not be visible on website</small>)</label>
                                                            <input type="text" name="phone_number" class="form-control payment_method_field"  required
                                                            @auth
                                                                value="{{Auth::user()->phone_number}}"
                                                                readonly
                                                            @endif>
                                                        </div>
                                                    </div>
                                                  </div>
                                                    <div class="form-group">
                                                        <label>PAN / Passport / Aadhaar /Voter ID / Driving Licence Numbe</label>
                                                        <input class="form-control payment_method_field" name="personal_number"  required >
                                                    </div>
                                                      <h5>I Declare that:</h5>
                                                    <div class="form-group">
                                                            {{-- <label for="recipient-name" class="col-form-label">I declare that : </label> --}}
                                                           <label>I am an Indian citizen residing in India &nbsp;&nbsp;</label><input type="radio" name="residence" value="inside_ind" class="payment_method_field" required>
                                                            <label>I am an Indian citizen residing outside of India &nbsp;&nbsp;</label><input type="radio" name="residence" value="outside_ind" class="payment_method_field" required>
                                                      </div>
                                                      <h3>80G Certificate</h3>
                                                      <div class="form-group">
                                                            <label for="recipient-name" class="col-form-label">Do you want to request for 80G Certificate against this payment: </label>
                                                           <label>Yes &nbsp;&nbsp;</label><input type="radio" name="certificate" class="payment_method_field" value="yes" required>
                                                            <label>No &nbsp;&nbsp;</label><input type="radio" name="certificate" class="payment_method_field" value="no" required>
                                                      </div>
                                          </div>
                                          <div class="modal-footer">
                                                <input type="hidden" name="campaign_id" value="{{$campaign[0]['id']}}">
                                                <button type="button"
                                                    id="payment_method_model"
                                                    class="btn btn-yellow"
                                                    >Proceed</button>
                                                {{-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> --}}
                                                <!-- <button data-toggle="modal" id="payment_method_model" data-target="#payment_method_model" type="button" class="btn btn-yellow" data-backdrop="static" data-keyboard="false">Proceed</button> -->
                                                {{-- <a href="#"  class="btn btn-yellow"  style="width: 100%;" --}}

                                                {{-- > --}}
                                                    {{-- Proceed to Payment Method --}}
                                                {{-- </a> --}}
                                          </div>
                                    {{-- </form> --}}
                                    </div>
                                  </div>
                                </div>

                                <!-- payment_method_model -->
                                <div class="modal fade" id="payment_method_area" tabindex="-1" role="dialog" aria-labelledby="payment_method_area" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content" style="background-color: #3a3a3a;">
                                      <div class="modal-header">
                                        <h5 style="color: white;" class="modal-title" id="payment_method_area">Payment Method</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                          <div class="modal-body">
                                                <div class='form-row row'>
                                                   <div class='col-xs-12 form-group required'>
                                                      <label style="color: white;" class='control-label'>Name on Card</label>
                                                      <input
                                                         class='form-control' size='20' type='text' payment_form="text" >
                                                   </div>
                                                </div>
                                                <div class='form-row row'>
                                                     <label style="color: white;" class='control-label'>Card Number</label>
                                                   <div class='col-xs-12 form-group card required'>
                                                      <input
                                                         autocomplete='off' class='form-control card-number' size='20'
                                                         type='text' payment_form="text">
                                                   </div>
                                                </div>
                                                <div class='form-row row'>
                                                   <div class='col-xs-12 col-md-4 form-group cvc required'>
                                                      <label style="color: white;" class='control-label'>CVC</label>
                                                      <input autocomplete='off'
                                                         class='form-control card-cvc' placeholder='ex. 311' size='4'
                                                        maxlength = "4"
                                                        minlength = "3"
                                                         type='text' payment_form="text" >
                                                   </div>
                                                   <div class='col-xs-12 col-md-4 form-group expiration required'>
                                                      <label style="color: white;" class='control-label'>Expiration Month</label>
                                                      <input
                                                         class='form-control card-expiry-month' placeholder='MM'size='2'
                                                         maxlength = "2"
                                                         minlength = "2"
                                                         type='text' payment_form="text" >
                                                   </div>
                                                   <div class='col-xs-12 col-md-4 form-group expiration required'>
                                                      <label style="color: white;" class='control-label'>Expiration Year</label>
                                                      <input
                                                         class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                                        maxlength = "4"
                                                        minlength = "4"
                                                         type='text' payment_form="text" >
                                                   </div>
                                                </div>
                                                <div class='form-row row'>
                                                   <div class='col-md-12 error form-group hide'>
                                                      <div class='alert-danger alert'>Please correct the errors and try
                                                         again.
                                                      </div>
                                                   </div>
                                                </div>
                                          </div>
                                          <div class="modal-footer">
                                                <input type="hidden" name="campaign_id" value="{{$campaign[0]['id']}}">
                                                <button type="submit" class="btn btn-yellow" id="send_payments">Pay Through Stripe</button>
                                                <button type="button" class="btn btn-yellow" id="sending_form" style="display: none;">Submiting...</button>
                                          </div>
                                    </div>
                                  </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
       <script type="text/javascript" src="https://js.stripe.com/v2/"></script>

        @endsection

    @section('javascript')

    <script type="text/javascript">
      //FEATURED HOVER
        $(document).ready(function(){
              $(".linkfeat").hover(
                function () {
                    $(".textfeat").show(500);
                },
                function () {
                    $(".textfeat").hide(500);
                }
            );

            isEmpty = false
            radioSelected = false;
            $('#payment_method_model').on('click', function(e){
              // alert('Inside');
              $('#payment_method_area').modal('show');
              // $('.payment_method_field:required').each(function() {
              //   if ($(this).val() === '')
              //   {
              //       alert('Inside Not I/P');
              //       isEmpty = true;
              //   }
              //   else{
              //     isEmpty = false;
              //   }
              // });

              // $('.payment_method_field:required').each(function() {
                // if (!$(this).is(':checked'))
                // {
                //   alert('Not checked');
                //   isEmpty = true;
                // }
                // else{
                //   isEmpty = false;
                // }
              // });
              // $('input[type=radio]:required').each(function() {
              //   if ($(this).is(':checked'))
              //   {
              //     isEmpty = true;
              //   }else{
              //     isEmpty = false;
              //   }
              // });

              // if (!radioSelected)
              // {
              //   isEmpty = true;
              // }
              // alert(isEmpty);

              // if (isEmpty)
              // { setTimeout(function(){  $('#error_alert_payment').slideDown(); }, 50);}
              // else
              // {
              //   $('#payment_method_area').modal('show');
              //   setTimeout(function(){  $('#error_alert_payment').slideUp(); }, 50);
              // }
              // alert(isEmpty);
            });


              //Comments functionality
            $("#btn-save").click(function (e) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    }
                });
                e.preventDefault();
                if($('#name').val().length > 0 &&
                 $('#email').val().length > 0  &&
                $('#comment').val().length > 0 ){
                            var formData = {
                                name: $('#name').val(),
                                email: $('#email').val(),
                                comment: $('#comment').val(),
                                campaign_id: $('#campaign_id').val(),
                            };
                            var type = "POST";
                            var ajaxurl = "{{route('donation.add.comment')}}";

                            $.ajax({
                                type: type,
                                url: ajaxurl,
                                data: formData,
                                dataType: 'json',
                                success: function (data) {

                                  $('#name').val('');
                                  $('#email').val('');
                                  $('#comment').val('');

                                  var result = [];
                                  var comments = data;
                                  for (var i = 0; i < comments.length; i++) {

                                    result[i] = `<li class="row clearfix">
                                                        <div class="text-box col-md-12 col-12 p-l-0 p-r0">
                                                            <h5 class="m-b-0">`+comments[i]['name']+`</h5>
                                                            <p>`+comments[i]['comment']+`</p>
                                                            <ul class="list-inline">
                                                                <li><a href="javascript:void(0);">`+comments[i]['created_at']+`</a></li>
                                                            </ul>
                                                        </div>
                                                    </li>`
                                  }

                                  $('#comments_box').empty();
                                  $('#comments_box').append(result);
                                   $('#comment_Added').fadeIn('slow', function(){
                                       $('#comment_Added').delay(3000).fadeOut();
                                    });

                                },
                                error: function (data) {
                                    console.log('Error:', data);
                                }
                            });
                }else{
                    alert('Please fill all the fields');
                }
            });


            //Stripe functionality
                var $form = $(".require-validation");
                $('form.require-validation').bind('submit', function(e) {
                    var $form = $(".require-validation"),
                        inputSelector = ['input[payment_form=text]',
                        ].join(', '),
                        $inputs = $form.find('.required').find(inputSelector),
                        $errorMessage = $form.find('div.error'),
                        valid = true;
                    $errorMessage.addClass('hide');
                    $('.has-error').removeClass('has-error');
                    $inputs.each(function(i, el) {
                        var $input = $(el);
                        if ($input.val() === '') {
                            $input.parent().addClass('has-error');
                            $errorMessage.removeClass('hide');
                            e.preventDefault();
                        }
                    });
                    if (!$form.data('cc-on-file')) {
                        e.preventDefault();
                        Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                        Stripe.createToken({
                            number: $('.card-number').val(),
                            cvc: $('.card-cvc').val(),
                            exp_month: $('.card-expiry-month').val(),
                            exp_year: $('.card-expiry-year').val()
                        }, stripeResponseHandler);
                    }
                });
                function stripeResponseHandler(status, response) {
                    if (response.error) {
                        $('.error')
                            .removeClass('hide')
                            .find('.alert')
                            .text(response.error.message);
                    } else {
                        /* token contains id, last4, and card type */
                        var token = response['id'];
                        $form.find('input[payment_form=text]').empty();
                        $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                        $('#send_payments').remove();
                        $('#sending_form').slideDown();
                        $form.get(0).submit();
                    }
                }
        });
    </script>
    @endsection
