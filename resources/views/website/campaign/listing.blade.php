        @extends('layouts.website.app')
        @section('title', 'Campaign List')
        @section('content')
        <script src="https://kit.fontawesome.com/496e52d5cd.js" crossorigin="anonymous"></script>

        <style>
        body{
            background-color: #f4f7f6;
        }
        .file_manager .file a:hover .hover,
        .file_manager .file .file-name small{
            display: block
        }
        .file_manager .file {
            padding: 0 !important
        }

        .file_manager .file .icon{
            text-align: center
        }


        .file_manager .file {
            position: relative;
            border-radius: .55rem;
            overflow: hidden
        }

        .file_manager .file .image,
        .file_manager .file .icon {
            max-height: 200px;
            overflow: hidden;
            background-size: cover;
            background-position: top
        }

        .file_manager .file .hover {
            position: absolute;
            right: 10px;
            top: 10px;
            display: none;
            transition: all 0.2s ease-in-out
        }

        .file_manager .file a:hover .hover {
            transition: all 0.2s ease-in-out
        }

        .file_manager .file .icon {
            padding: 15px 10px;
            display: table;
            width: 100%
        }

        .file_manager .file .icon i {
            display: table-cell;
            font-size: 30px;
            vertical-align: middle;
            color: #777;
            line-height: 100px
        }

        .file_manager .file .file-name {
            padding: 10px;
            border-top: 1px solid #f7f7f7
        }

        .file_manager .file .file-name small .date {
            float: right
        }

        .folder {
            padding: 20px;
            display: block;
            color: #777
        }

        @media only screen and (max-width: 992px) {
            .file_manager .nav-tabs {
                padding-left: 0;
                padding-right: 0
            }
            .file_manager .nav-tabs .nav-item {
                display: inline-block
            }
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

        a:hover {
            text-decoration:none;
        }
        .btn-centre-campaign{
            width: 100%;
            margin: 3%;
        }
        .fa-facebook-official{
                    color: #4c6ef5;
                    font-size: 20px;
                }
                .fa-twitter{
                    color: #15aabf;
                    font-size: 20px;
                }
                .fa-whatsapp{
                    color: rgb(36, 204, 99);
                    font-size: 20px;
                }
                .fa-clone{
                    color: grey;
                    font-size: 20px;   
                }
                .header_btn button:hover {
                    background-color: #ffcb07;
                    color: #2c2b2f !important;
                    border-color: #ffcb07;
                }
        .chartjs-render-monitor{
            width: 120px !important;
            height: 110px !important;
            margin-left: 20%;
        }
    </style>

    <div class="jumbotron text-center" style="padding: 2% !important;">
        <div class="col-12 text-center pt-3">
            <h1 style="color: #ffcb07;font-weight: 800">Campaigns</h1>
        </div>
    </div>
    <div id="main-content" class="file_manager">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="section-title mb-4 pb-2">
                        <h4 class="title mb-4">List of all Campaigns</h4>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
            <div class="row clearfix">
                @if($campaign)
                @foreach($campaign as $list)
                
                <form class="canvases_div">
                    <input type="hidden" class="canvases" name="canvases[]" value="canvas_{{$list->id}}">   
                </form>
                
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="file">
                            <!-- <a href="{{route('campaign.detail', $list->id)}}"> -->
                                <div class="hover">
                                </div>
                                <div class="image">
                                    @if($list->CampaignAttachments)
                                    @php $count = 1; @endphp
                                    @foreach($list->CampaignAttachments as $photo)
                                    @if($photo->type == 'story_photo')
                                    <img src="{{asset('storage/campaign/story_image/'.$photo->photo_name)}}" 
                                        alt="img"
                                        style="height: auto;width: 100%;" 
                                    >
                                    <!-- style="width: 300px;height: 163px"  -->

                                    @endif
                                    @endforeach
                                    @else
                                    <img src="https://via.placeholder.com/280x280/87CEFA/000000" alt="img" class="img-fluid">
                                    @endif
                                </div>
                                <div class="row" style="padding: 2%;">
                                    <div class="col-md-4" style="text-align: center;">
                                        <canvas id="canvas_{{$list->id}}" height="50" width="50"></canvas>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <button 
                                                style="background: #414248;border-color: #404248;" 
                                                class="btn-centre-campaign btn btn-sm btn-success">Raised {{$list->donation->sum('amount')}} {{$list->fund_req}}</button>
                                            </div>
                                            <div class="col-md-6">
                                                <button class="btn-centre-campaign btn btn-sm" style="background-color: #b7c29f;">9 Days Left</button>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                               <button class="btn-centre-campaign btn btn-sm btn-warning"> 
                                                @if($list->amount - $list->donation->sum('amount') > 0)
                                                    Shortfall -{{$list->amount - $list->donation->sum('amount')}}
                                                @else
                                                    Fullness {{str_replace("-","+",$list->amount - $list->donation->sum('amount'))}}
                                                @endif
                                                    {{$list->fund_req}}

                                               </button>
                                           </div>
                                           <div class="col-md-6 header_btn">
                                                <button class="btn-centre-campaign header_login_action btn btn-sm">Donate Now</button>
                                            </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            @php
                                                $raised = $list->donation->sum('amount');
                                                $required = $list->amount;
                                            @endphp
                                            <button 
                                            style="background-color: #df1935;border-color: #df1935;" 
                                            class="btn-centre-campaign btn btn-sm btn-info">Requirment {{$list->amount}} {{$list->fund_req}}</button>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row" style="text-align: center;">
                                                <div class="col-md-6">
                                                    <a href="{{route('donate.now.campaign',[$list->id,'stripe'])}}">
                                                        <b><span class="fa fa-credit-card" aria-hidden="true"></span>
                                                        Stripe</b>
                                                    </a>
                                                </div>
                                                <div class="col-md-6">
                                                    <a href="{{route('donate.now.campaign',[$list->id,'paytm'])}}">
                                                        <b>₹ Paytm</b>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row" style="padding: 2%;">

                                <div class="col-md-12">
                                    <h4><u><b>{{ $list->story_heading }}</b></u></h4>
                                    <h5>{{ $list->story_sub_heading }}</h5>        
                                    <!-- {!! Share::page(url('/post/'. '1234'))->facebook()->twitter()->whatsapp() !!}            -->
                                </div>

                                <div class="col-md-12" style="text-align: right;">
                                    <a href="{{route('campaign.detail', $list->id)}}">Read more...</a></div>

                            </div>

                            <div class="row" style="padding: 2%;">
                                <div class="col-md-8">
                                    <button class="btn btn-sm btn-defaukt" style="width: 100%">
                                        Support Now
                                    </button>
                                </div>
                                <div class="col-md-4">
                                   <button class="btn btn-sm " style="width: 100%; background-color: #ee8b7e;">
                                    Donors: {{count($list->donation)}}
                                </button>
                            </div>
                        </div>

                        <div class="row" style="padding: 2%;">
                            <div class="col-md-8">
                                <div class="row" style="text-align: center;">
                                    <!-- <div class="col-md-2"> -->
                                    <!-- </div> -->
                                    <div class="col-md-3">
                                        {!! Share::page(url('/campaigns/detail/'. $list->id))->facebook() !!}
                                        <small>Facebook</small>
                                    </div>
                                    <div class="col-md-3">
                                        {!! Share::page(url('/campaigns/detail/'. $list->id))->twitter() !!}
                                        <small>Twitter</small>
                                    </div>
                                    <div class="col-md-3">
                                        {!! Share::page(url('/campaigns/detail/'. $list->id))->whatsapp() !!}
                                        <small>WhatsApp</small>
                                    </div>
                                    <div class="col-md-3">
                                        <div id="social-links">
                                            <ul>
                                                <li>
                                                    <a href="javascript:void(0)" data-url="{{url('/campaigns/detail/'. $list->id)}}" class="copy_link social-button " id="" title="">
                                                        <span class="fa fa-clone" aria-hidden="true"></span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <small>Copy Link</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                               <button class="btn btn-sm"  style="background-color: #28384f;color: white; width: 100%">
                                Supporters
                            </button>
                        </div>
                    </div>


                                        </div>
                                    </div>
                                </div>   
                                @endforeach
                                @endif

                            </div>

                        </div>
                    </div>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>


                    @endsection



                    @section('javascript')
                    <script type="text/javascript">
                        $('.copy_link').on('click', function(event){

                              copyText = $(this).attr('data-url');

                              /* Select the text field */
                              // copyText.select();
                              // copyText.setSelectionRange(0, 99999); /* For mobile devices */

                              /* Copy the text inside the text field */
                              // navigator.clipboard.writeText(copyText.value);
                               // document.execCommand("copy");
                              
                              /* Alert the copied text */
                              alert("Copied the text: " + copyText);

                        });
                        // console.log($('.canvases').val());
                        var x = $(".canvases_div").serializeArray();
                        // $.each(x, function(i, field){
                        //   $("#results").append(field.name + ":" + field.value + " ");
                        // });
                        // console.log(x);
                        $.each(x, function(i, field){
                          // $("#results").append(field.name + ":" + field.value + " ");
                          var raised = '<?php echo $required; ?>';
                          var required = '<?php echo $required; ?>';
                        
                            var year = ['Total','Raised'];

                            var user = [required,raised];

                            var barChartData = {

                                labels: year,

                                datasets: [{

                                    label: 'Donation',

                                    backgroundColor: "#6610f2",

                                    data: user

                                }]

                            };

                            // window.onload = function() {

                                var ctx = document.getElementById(field.value).getContext("2d");

                                window.myBar = new Chart(ctx, {

                                    type: 'doughnut',

                                    data: barChartData,

                                    options: {

                                        elements: {

                                            rectangle: {

                                                // borderWidth: 2,

                                                borderColor: '#c1c1c1',

                                                borderSkipped: 'bottom'

                                            }

                                        },

                                        responsive: true,
                                        legend: {
                                         labels: false,
                                        }

                                    }

                                });

                            // };
                        });

                    </script>
                    @endsection