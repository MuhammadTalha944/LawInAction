        @extends('layouts.website.app')
        @section('title', 'Campaign Payment')
        @section('content')

        <style type="text/css">
            #header-area.fix{
                position: absolute !important;
            }
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
            .has-error{
                border: 2px solid #ff3030;
            }
        </style>

        <div class="jumbotron text-center" style="padding: 2% !important;">
            <div class="col-12 text-center pt-3">
                <h3 style="color: #ffcb07;font-weight: 800">Donate Now!</h3>
            </div>
        </div>
        <div id="main-content" class="blog-page">
            <div class="container">
                <div class="row clearfix">
                    <div class="col-md-8 offset-md-2">
                        <div class="card " style="margin-bottom: 2%;">
                            
                            <!-- class="donation_next_step" -->

                            <!-- <form
                                action="{{ route('donate.now.next',$campaign[0]['id']) }}"
                                method="post"
                                class="require-validation"
                                data-cc-on-file="false"
                                data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                                id="payment-form"
                                >
                                 -->
                        <form 
                            role="form" 
                            action="{{ route('stripe.post') }}" 
                            method="post" 
                            class="require-validation"
                            data-cc-on-file="false"
                            data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                            id="payment-form">

                            @csrf
                                <div class="body">
                                    <div class="modal-body setup-content">

                                        <div class="row" style="margin-left: 0%">
                                            
                                            <div class="col-md-6">
                                                <h4>Donate Now</h4>
                                            </div>

                                            <div class="col-md-6" style="text-align: right;">
                                                <a 
                                                    style="background: #4d4f57; color: white;" 
                                                    href="{{route('campaign.detail', $campaign[0]['id'])}}" 
                                                    class="btn btn-sm">
                                                    <i class="fa fa-arrow-left"></i> Back to Campaign
                                                </a>
                                            </div>
                                            
                                        </div>
                                        <div class="row error_alert_for_payment" style="display: none;" id="error_alert_payment">
                                            <div class="col-md-12">
                                                <h5>Please Fill all the fields</h5>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Anonymous Payment:</label>

                                            <!-- <label>Yes / No&nbsp;&nbsp;</label> -->
                                            <input type="checkbox" name="anonymous_mode" value="1">
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Donation  Mode:</label>

                                            <label>One Time&nbsp;&nbsp;</label>
                                            <input type="radio" name="mode" value="one_time" class="payment_method_field mode" required>

                                            <label>Monthly&nbsp;&nbsp;</label>
                                            <input type="radio" name="mode" value="monthly" class="payment_method_field mode" required>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <select class="form-control" name="currency" required>
                                                    <option value="INR">INR</option>
                                                    {{-- <option value="USD">USD</option> --}}
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <label>2500</label>&nbsp;&nbsp;<input type="radio" name="amount" value="2500" class=" payment_method_field amount" required>
                                            </div>
                                            <div class="col-md-2">
                                                <label>5000</label>&nbsp;&nbsp;<input type="radio" name="amount" value="5000" class=" payment_method_field amount" required>
                                            </div>
                                            <div class="col-md-2">
                                                <label>10000</label>&nbsp;&nbsp;<input type="radio" name="amount" value="10000" class=" payment_method_field amount" required>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Other</label>&nbsp;&nbsp;<input type="radio" name="amount" value="other_amount" class=" other_amount payment_method_field amount" required>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="number" disabled name="amount_other"  class="form-control other_nmber">
                                            </div>
                                        </div>
                                        <div class="row">
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
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h5>I Declare that:</h5>
                                                <div class="form-group">
                                                    <label>I am an Indian citizen residing in India &nbsp;&nbsp;</label><input type="radio" name="residence" value="inside_ind" class="payment_method_field residence" required>
                                                    <label>I am an Indian citizen residing outside of India &nbsp;&nbsp;</label><input type="radio" name="residence" value="outside_ind" class="payment_method_field residence" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <h5>80G Certificate</h5>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Do you want to request for 80G Certificate against this payment: </label>
                                                    <label>Yes &nbsp;&nbsp;</label><input type="radio" name="certificate" class=" certificate payment_method_field" value="yes" required>
                                                    <label>No &nbsp;&nbsp;</label><input type="radio" name="certificate" class=" certificate payment_method_field" value="no" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <span id="error_show" style="color:Red; display: none;font-weight: 700;">*Please fill all the Fields</span>
                                            <div class="col-md-12" style="text-align: right;">
                                                <input type="hidden" name="campaign_id" value="{{$campaign[0]['id']}}">
                                                <button type="button" class="btn btn-yellow" id="send_payments_gateway">Pay Through {{$type}}</button>
                                            </div>
                                        </div>
                                        
                                        
                                    </div>
                                </div>
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
                                                            
                                                            name="card-name"

                                                         class='form-control' size='20' type='text' payment_form="text" >
                                                   </div>
                                                </div>
                                                <div class='form-row row'>
                                                     <label style="color: white;" class='control-label'>Card Number</label>
                                                   <div class='col-xs-12 form-group card required'>
                                                      <input
                                                            
                                                            name="card-number"

                                                         autocomplete='off' class='form-control card-number' size='20'
                                                         type='text' payment_form="text">
                                                   </div>
                                                </div>
                                                <div class='form-row row'>
                                                   <div class='col-xs-12 col-md-4 form-group cvc required'>
                                                      <label style="color: white;" class='control-label'>CVC</label>
                                                      <input 
                                                            
                                                            name="card-cvc"
                                                        autocomplete='off'
                                                         class='form-control card-cvc' placeholder='ex. 311' size='4'
                                                        maxlength = "4"
                                                        minlength = "3"
                                                         type='text' payment_form="text" >
                                                   </div>
                                                   <div class='col-xs-12 col-md-4 form-group expiration required'>
                                                      <label style="color: white;" class='control-label'>Expiration Month</label>
                                                      <input
                                                            
                                                            name="card-expiry-month"

                                                         class='form-control card-expiry-month' placeholder='MM'size='2'
                                                         maxlength = "2"
                                                         minlength = "2"
                                                         type='text' payment_form="text" >
                                                   </div>
                                                   <div class='col-xs-12 col-md-4 form-group expiration required'>
                                                      <label style="color: white;" class='control-label'>Expiration Year</label>
                                                      <input
                                                            
                                                            name="card-expiry-year"

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
        </div>
    </div>
</div>
       <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
@endsection

@section('javascript')

<script type="text/javascript">
          $(document).ready(function(){
            $(".linkfeat").hover(
                function () {
                    $(".textfeat").show(500);
                },
                function () {
                    $(".textfeat").hide(500);
                }
            );

            // $('.donation_next_step').on('submit', function(event){
            //     event.preventDefault();
            //     $('#payment_method_area').modal('show');
            //     $('#send_payments_gateway').prop('type', 'button');
            // });

            $('#send_payments_gateway').on('click', function(){
                // $('#payment_method_area').modal('show');

                

                var curStep = $(this).closest(".setup-content"),
                            curStepBtn = curStep.attr("id"),
                            // nextStepWizard = $('.submitBtn'),
                            curInputs = curStep.find("input"),
                            isValid = true;
                            check = 0;
                        if($('.mode:radio:checked').length == 0 || $('.amount:radio:checked').length == 0 ||
                            $('.residence:radio:checked').length == 0 || $('.certificate:radio:checked').length == 0
                            ){
                            $('#error_show').css('display','block');
                                isValid = false;
                                check = 1;

                        }else{
                            // $('#error_show').slideUp();
                            check = 0;
                        }

                        // else{
                        //     $('#error_show').slideUp();
                        //         isValid = true;
                        // }

                        for(var i=0; i<curInputs.length; i++){
                            if (!curInputs[i].validity.valid){
                                isValid = false;
                                check = 1;
                                $('#error_show').css('display','block');
                            }
                            else{
                                check = 0;
                                // $('#error_show').slideUp();
                            }
                        }

                        if(check == 1){
                            isValid == false;
                        }
                        // else{
                        //     $('#error_show').slideUp();
                        // }

                        if (isValid)
                        {
                            alert('All filled');
                            $('#error_show').slideUp();
                            $('#payment_method_area').modal('show');

                        }
                        // else{
                        // }
            })

            $('.payment_method_field').on('click', function(){
                if($(this).val() == 'other_amount'){
                    $('.other_nmber').val("");
                    $('.other_nmber').prop('disabled', false);
                }else{
                    $('.other_nmber').val("");
                    $('.other_nmber').prop('disabled', true);
                }
            });

            isEmpty = false
            radioSelected = false;

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
                    
                    // alert('okay now');
                    // return false;

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
