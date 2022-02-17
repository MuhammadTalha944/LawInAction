    @extends('layouts.website.app')
    @section('title', 'Hate Form Details')
    @section('content')

   <link rel="stylesheet" href="{{asset('website/asset/css/complaints_detail.css')}}">


  <div class="jumbotron text-center" style="padding: 2% !important;">
    <h2 style="color: #ffcb07;font-weight: 800">Public Hate Form Detail</h2>
  </div>
          <div class="container">
              <div class="row" style="border: 1px solid lightgray;border-radius: 6px;margin-bottom: 1%;">
                  <div class="col-sm-12">
                      <div class="">
                          <div class="blog-post">
                              <h3 style="text-align: center;">
                                HateForm # {{ $hateform['hateform_number'] }} 
                              </h3>
                              
                              @php
                                $timestamp = strtotime($hateform['created_at']);
                                $date = date('M D Y', $timestamp);
                                $time = date('H:i a', $timestamp);
                          @endphp
                              <div class="title h5" style="margin-top: 2%;">
                                <a href="javascript:void(0)"><b>{{$hateform['name'] }}</b></a>
                                filed a Hate Form.
                                <small>On {{$date }} at {{$time}}</small>
                              </div>
                              <h4><b><u>Content:</u></b></h4>
                              <p>
                                {{$hateform['hate_content']}}
                              </p>
                              
                          </div>
                      </div>
                      <hr>
                <section class="content-item" id="comments">
                            <div class="container">   
                              <div class="row">
                                    <div class="col-sm-8">   
                                       <div style="text-align: left;">
                                           <a class="" data-toggle="collapse" href="#collapseHateformComments" role="button" aria-expanded="false" aria-controls="collapseHateformComments">
                                              <h3 class="pull-left" style="background-color: #e1e1e1;">Write your Comment...!</h3>
                                          </a>
                                     </div>
                                     <div class="collapse" id="collapseHateformComments">
                                        <form >
                                            <fieldset>
                                                <div class="row">
                                                      <div class="col-sm-12 col-lg-10 hidden-xs" style="margin-bottom: 2%;">
                                                        <input type="email" id="email" name="user_email" required class="form-control" placeholder="Enter your Email">
                                                    </div>
                                                    <div class="form-group col-xs-12 col-sm-9 col-lg-10">
                                                        <textarea class="form-control" required id="hate_content" name="hate_content"></textarea>
                                                    </div>
                                                    <div class="col-sm-10 col-lg-19 hidden-xs" style="text-align: right;">
                                                      <input type="hidden" name="hf_id"  id="hf_id" value="{{$hateform['id']}}">
                                                          <button type="button" class="btn btn-success btn-sm  pull-right" id=btn-save>Submit</button>
                                                    </div>
                                                </div>    
                                            </fieldset>
                                        </form>
                                      </div>

                                      <div id="comment_Added" style="display: none; background-color: lightgreen; padding: 1%;">
                                        <span><b>Your comment is added on this Hate Form!</b></span>
                                      </div>
                                        
                                        <h3>All Comments</h3>
                                        
                                        <!-- COMMENT  - START -->
                                        <div class="comments_section">
                                          @foreach($hateform['hate_form_comments'] as $comments)
                                              <div class="media">
                                                  <div class="media-body">
                                                      <h5 class="media-heading"><a href="mailto:{{$comments['email']}}">
                                                        {{  substr($comments['email'], 0 , 5)  }}...
                                                      </a></h5>
                                                      <p class="p_comment">{{$comments['comment']}}</p>
                                                      <ul class="list-unstyled list-inline media-detail pull-left">
                                                          <li><i class="fa fa-calendar"></i>{{$comments['created_at']}}</li>
                                                      </ul>
                                                  </div>
                                              </div>
                                              @endforeach
                                        </div>
                                        <!-- COMMENT  - END -->
                                        
                                    
                                    </div>
                                </div>
                            </div>
                        </section>
                  </div>
              </div>
          </div>
  @endsection

      @section('javascript')
<script type="text/javascript">

    $("#btn-save").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        var formData = {
            email: $('#email').val(),
            comment: $('#hate_content').val(),
            hf_id: $('#hf_id').val(),
        };
        var type = "POST";
        var ajaxurl = "{{route('hateform.add.comment')}}";

        $.ajax({
            type: type,
            url: ajaxurl,
            data: formData,
            dataType: 'json',
            success: function (data) {

              $('#email').val('');
              $('#hate_content').val('');

              var result = [];
              var comments = data;
              for (var i = 0; i < comments.length; i++) {

                result[i] = `<div class="media">
                                            <div class="media-body">
                                                <h5 class="media-heading"><a href="mailto:`+comments[i]['email']+`">`+comments[i]['email'].substr(1, 5)+`...</a></h5>
                                                <p class="p_comment">`+comments[i]['comment']+`</p>
                                                <ul class="list-unstyled list-inline media-detail pull-left">
                                                    <li><i class="fa fa-calendar"></i>`+comments[i]['created_at']+`</li>
                                                </ul>
                                            </div>
                                        </div>`
              }

              $('.comments_section').empty();
              $('.comments_section').append(result);
              // $('#collapseHateformComments').slideUp();
              
               $('#comment_Added').fadeIn('slow', function(){
                   $('#comment_Added').delay(3000).fadeOut(); 
                });

            },
            error: function (data) {
                console.log('Error:', data);
            }
        });

    });  
</script>
      @endsection