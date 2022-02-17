    @extends('layouts.website.app')
    @section('title', 'Complaint Details')
    @section('content')

   <link rel="stylesheet" href="{{asset('website/asset/css/complaints_detail.css')}}">

  <div class="jumbotron text-center" style="padding: 2% !important;">
    <h2 style="color: #ffcb07;font-weight: 800">Public Complaints Detail</h2>
  </div>
          <div class="container">
              <div class="row" style="border: 1px solid lightgray;border-radius: 6px;margin-bottom: 1%;">
                  <div class="col-sm-12">
                      <div class="">
                          <div class="blog-post">
                            <div class="blog-info">
                                <img src="{{   asset('storage/complaints/photo/'.$complaint['photo'])  }}" class="img-circle avatar" alt="Complainent profile image" style="width: 50px;height: 50px;">
                              </div>
                              <h3 style="text-align: center;">
                                Complaint # {{$complaint['complaint_number']}}
                              </h3>
                              
                              @php
                                $timestamp = strtotime($complaint['created_at']);
                                $date = date('M D Y', $timestamp);
                                $time = date('H:i a', $timestamp);
                              @endphp
                              <div class="title h5" style="margin-top: 2%;">
                                <a href="javascript:void(0)"><b>{{$complaint['name'] }}</b></a>
                                filed a complaint.
                                <small>On {{$date }} at {{$time}}</small>
                                <!-- <h7 class="text-muted time">On {{$date }} at {{$time}}</h7> -->
                              </div>
                              <h4><b><u>Lodged Grievance:</u></b></h4>
                                @if(file_exists(public_path('storage/complaints/grievance/'.$complaint['grievance'])))
                              <a href="{{asset('storage/complaints/grievance/'.$complaint['grievance'])}}" target="_blank">
                              Open Grievance File</a>
                              @else
                              <p>
                                {{$complaint['grievance']}}
                              </p>
                              @endif
                              <div style="text-align: right;">
                               <a class="btn btn-yellow btn-sm" data-toggle="collapse" href="#collapseComplaintDetails" role="button" aria-expanded="false" aria-controls="collapseComplaintDetails">
                                More Detail <i class="fas fa-arrow-circle-down"></i>
                              </a>
                            </div>
                          <div class="collapse" id="collapseComplaintDetails">
                            <div class="card card-body">
                              <div class="form-group row">
                                <div class="col-md-6 mb-3 mb-sm-0">
                                  <label>Age:</label>
                                  <p>{{$complaint['age']}}</p>
                                </div>
                                <div class="col-md-6 mb-3 mb-sm-0">
                                  <label>Phone number :</label>
                                  <p>+91{{$complaint['phone_number']}}</p>
                                </div>
                              </div>
                              <div class="form-group  row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                  <label>Email:</label>
                                  <p>{{$complaint['email']}}</p>
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                  <label>Country:</label>
                                  <p>{{$complaint['country']}}</p>
                                </div>
                              </div>
                              @if($complaint['country'] == 'India')
                              <div class="form-group row country_dependent" style=""> 
                                
                                <div class="col-sm-6 " >
                                  <label>State:</label>
                                  <p>{{$complaint['state']['name']}}</p>
                                </div>
                                <div class="col-sm-6 country_dependent" >
                                  <label>District:</label>
                                  <p>{{$complaint['district']['name']}}</p>
                                </div>
                              </div>  
                              
                              <div class="form-group row country_dependent"  id="" >
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                  <label>Police Station:</label>
                                  <p>{{$complaint['police_station']}}</p>
                                </div>
                                <div class="col-sm-6">
                                  <label>Pin Code:</label>
                                  <p>{{$complaint['pin_code']}}</p>

                                </div>
                                <div class="col-sm-12">
                                  <label>Correspondence Address:</label>
                                  <p>{{$complaint['correspondence_address']}}</p>
                                  
                                </div>
                              </div>
                              @endif
                              <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                  <label>Complaint Category:</label>
                                  <p>
                                    @if($complaint['complaint_related_to'] == 'Communal_Riots')
                                    Communal Riots
                                    @elseif($complaint['complaint_related_to'] == 'Tablighi_Jamaat')
                                    Tablighi Jamaat
                                    @elseif($complaint['complaint_related_to'] == 'Corona_Related')
                                    Corona Related
                                    @elseif($complaint['complaint_related_to'] == 'Personal_Matter')
                                    Personal Matter
                                    @elseif($complaint['complaint_related_to'] == 'Mob_Lynching')
                                    Mob Lynching
                                    @elseif($complaint['complaint_related_to'] == 'Religious_Caste_Discrimination')
                                    Religious Caste Discrimination
                                    @elseif($complaint['complaint_related_to'] == 'Other_Issues')
                                    Other Issues
                                    @elseif($complaint['complaint_related_to'] == 'Other_Hate_Crimes')
                                    Other Hate Crimes
                                    @endif
                                    {{$complaint['complaint_related_to']}}
                                  </p>

                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                  <label>Are you:</label>
                                  <p>{{$complaint['vistim_accused']}}</p>
                                  
                                </div>
                              </div>
                              <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                  <label>Fir Copy:</label>
                                  @if($complaint['fir_copy'] == null)
                                  No Fir File
                                  @else
                                  @php 
                                  $path = storage_path('complaints/fir/' . $complaint['fir_copy']);
                                  @endphp
                                  <a href="{{asset('storage/complaints/fir/'.$complaint['fir_copy'])}}" target="_blank">
                                  Open FIR Copy in next tab</a>
                                  @endif
                                </div>
                              </div>
                              
                              {{-- <div class="row " >
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                  <label>Your ID for Proof:</label>
                                  <a href="{{asset('storage/complaints/id_proof/'.$complaint['id_proof'])}}" target="_blank">
                                  Open ID Proof</a>
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                  <label>Clear face photograpgh:</label>
                                  
                                  <a href="{{asset('storage/complaints/photo/'.$complaint['photo'])}}" target="_blank">
                                  Open Image</a>
                                </div>
                              </div> --}}
                              <div class="row ">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                  <label>Adress for Proof:</label>
                                  <p>
                                    {{$complaint['address_proof']}}
                                  </p>
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                 <label>Complaint Confidentiality:</label>
                                 <button type="button" class="btn btn-sm btn-success">{{$complaint['confidentiality']}}</button>
                               </div>
                             </div> 

                           </div>
                         </div>
                          </div>
                      </div>
                      <hr>
                 <section class="content-item" id="comments">
                  <div class="container">   
                    <div class="row">
                      <div class="col-sm-8">   
                       <div style="text-align: left;">
                         <a class="" data-toggle="collapse" href="#collapseComplaintComments" role="button" aria-expanded="false" aria-controls="collapseComplaintComments">
                          <h3 class="pull-left" style="background-color: #e1e1e1;">Write your Comment...!</h3>
                        </a>
                      </div>
                      <div class="collapse" id="collapseComplaintComments">
                        <form >
                          <fieldset>
                            <div class="row">
                              <div class="col-sm-12 col-lg-10 hidden-xs" style="margin-bottom: 2%;">
                                <input type="email" id="email" name="user_email" required class="form-control" placeholder="Enter your Email">
                              </div>
                              <div class="form-group col-xs-12 col-sm-9 col-lg-10">
                                {{-- <input type="text" name="complaint_comment" required class="form-control" placeholder="Write your Comment here...!"> --}}
                                <textarea class="form-control" required id="complaint_comment" name="complaint_comment"></textarea>
                              </div>
                              <div class="col-sm-10 col-lg-19 hidden-xs" style="text-align: right;"> 
                                <input type="hidden" name="complaint_id"  id="complaint_id" value="{{$complaint['id']}}">
                                <button type="button" class="btn btn-success btn-sm  pull-right" id="btn-save">Submit</button>
                                {{-- <input type="submit" name="user_email" value="submit" class="form-control"> --}}
                              </div>
                            </div>    
                          </fieldset>
                        </form>
                      </div>

                      <div id="comment_Added" style="display: none; background-color: lightgreen; padding: 1%;">
                        <span><b>Your comment is added on this complaint!</b></span>
                      </div>
                      
                      <h3>All Comments</h3>
                      
                      <!-- COMMENT  - START -->
                      <div class="comments_section">
                        {{-- <h3 id="comments_coun">{{count($complaint['complaint_comments'])}} Comments</h3> --}}
                        @foreach($complaint['complaint_comments'] as $comments)
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
            comment: $('#complaint_comment').val(),
            complaint_id: $('#complaint_id').val(),
          };
          var type = "POST";
          var ajaxurl = "{{route('complaint.add.comment')}}";

          $.ajax({
            type: type,
            url: ajaxurl,
            data: formData,
            dataType: 'json',
            success: function (data) {

              $('#email').val('');
              $('#complaint_comment').val('');

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
                  // $('#collapseComplaintComments').slideToggle( );
                  
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