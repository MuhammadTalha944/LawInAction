            @extends('layouts.website.app')
            @section('title', 'Donation Payment Area')
            @section('content')
            <style type="text/css">
                .error_alert_for_payment{
                  text-align: right;
                  color: red;
                  text-decoration: underline;
                  font-weight: 700;
                }
            </style>
            <div class="jumbotron text-center" style="padding: 2% !important;">
                <div class="col-12 text-center pt-3">
                    <h1 style="color: #ffcb07;font-weight: 800">Choose Payment Gateway!</h1>
                </div>
            </div>
            <div id="main-content" class="blog-page">
                <div class="container">
                    <div class="row clearfix">
                        <div class="col-md-2 ">
                        </div>
                        <div class="col-md-8 ">
                            <div class="card ">
                                <form
                                action="{{ route('final.donate.now',$campaign[0]['id']) }}"
                                method="post">
                                @csrf
                                <div class="body">
                                      <div class="row">
                                        <div class="col">
                                            <button type="button" class="btn btn-yellow" id="">Stripe</button>
                                        </div>
                                        <div class="col">
                                            <button type="button" class="btn btn-yellow" id="">Paypal</button>
                                        </div>
                                        <div class="col">
                                            <button type="button" class="btn btn-yellow" id="">UPI IG</button>
                                        </div>
                                      </div>
                                    <div class="modal-body" style="display: none;">
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
                     <div class="modal-footer" style="display: none;">
                        @php  $previous_Details = json_encode($details); @endphp 
                            <input type="hidden" name="previous_data" value="{{$previous_Details}}">
                        <input type="hidden" name="campaign_id" value="{{$campaign[0]['id']}}">
                        <button type="submit" class="btn btn-yellow" id="send_payments">Pay Through Stripe</button>
                        <button type="button" class="btn btn-yellow" id="sending_form" style="display: none;">Submiting...</button>
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
              //FEATURED HOVER
              $(document).ready(function(){

                $('.payment_method_field').on('click', function(){
                    if($(this).val() == 'other_amount'){
                        $('.other_nmber').val("");
                        $('.other_nmber').prop('disabled', false);
                    }else{
                        $('.other_nmber').val("");
                        $('.other_nmber').prop('disabled', true);
                    }
                });
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
