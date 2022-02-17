@extends('layouts.dashboard.main')
@section('title','Campaign Edit')
@section('content')
<style type="text/css">
    h3{
        text-align: center;
        font-weight: 700;
        text-decoration: underline;
    }
</style>
 <div class="card yellow_border shadow h-100 py-2">
    <div class="card-body">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif

        {!! Form::open(array('route' => ['campaign.update', $campaign->id],'method'=>'PUT', 'enctype' => 'multipart/form-data')) !!}
        @csrf
                    <h2>Update Campaign</h2>
                <hr>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <h3>Main Section</h3>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        <label>Campaign Category:</label>
                        <select class="form-control" name="campaign_categories_id" required>
                            <option value="">-Select Category-</option>
                            @if($CampaignCategories)
                                @foreach($CampaignCategories as $category)
                                    <option value="{{$category->id}}"
                                        @if($campaign->CampaignCategories->id == $category->id) selected @endif
                                        > {{$category->name}} </option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
               <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        <label>Tags Categories:</label>
                        <select class="form-control" name="campaign_tags" required>
                            <option value="">-Select Tags-</option>
                            @if($CampaignTags)
                                @foreach($CampaignTags as $category)
                                    <option value="{{$category->id}}"
                                        @if($campaign->CampaignTags->id == $category->id) selected @endif
                                        > {{$category->name}} </option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        <label>Keywords Categories:</label>
                        <select class="form-control" name="campaign_keywords" required>
                            <option value="">-Select Keywords-</option>
                            @if($CampaignKeywords)
                                @foreach($CampaignKeywords as $category)
                                    <option value="{{$category->id}}"
                                        @if($campaign->CampaignKeywords->id == $category->id) selected @endif
                                        > {{$category->name}} </option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>

                <div class="col-xs-3 col-sm-3 col-md-3">
                    <div class="form-group">
                        <label>Fund Requirment</label>
                        <select class="form-control" name="fund_req" required>
                            <option value="">-Select Currency-</option>
                           <option value="USD"
                            @if($campaign->fund_req == 'USD' ) selected @endif
                           >USD - $</option>
                            <option value="INR"
                                @if($campaign->fund_req == 'INR' ) selected @endif
                            >INR - ₹</option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2">
                    <div class="form-group">
                        <label>Amount</label>
                        <input type="number" name="amount" class="form-control" required value="{{$campaign->amount}}">
                    </div>
                </div>

                 <div class="col-xs-2 col-sm-2 col-md-2">
                    <div class="form-group">
                        <label>Campaign End Time</label>
                        <select class="form-control campaing_end_time" name="campaing_end_time" required>
                            <option value="">-Select Time-</option>
                           <option value="yes_end_date"
                            @if($campaign->campaing_end_time == 'yes_end_date') selected @endif
                           >Yes</option>
                            <option value="no_end_date"
                                @if($campaign->campaing_end_time == 'no_end_date') selected @endif
                            >No</option>
                        </select>
                    </div>
                </div>
                 <div class="col-xs-2 col-sm-2 col-md-2">
                    <div class="form-group end_time_dependent">
                        <label>Campaign Date</label>
                        <select class="form-control" name="campaign_date" required>
                            <option value="">-Select Date-</option>
                           <option value="End_Date"
                                @if($campaign->campaign_date == 'End_Date') selected @endif
                           >End Date</option>
                            <option value="Ongoing"
                                    @if($campaign->campaign_date == 'Ongoing') selected @endif
                            >Ongoing</option>
                            <option value="Longterm"
                                    @if($campaign->campaign_date == 'Longterm') selected @endif
                            >Longterm</option>
                        </select>
                    </div>
                </div>

                <div class="col-xs-3 col-sm-3 col-md-3">
                    <div class="form-group">
                        <label>End Date <small>(Optional)</small></label>
                        <input type="date" name="camp_end_date" class="form-control camp_end_date" value="{{$campaign->camp_end_date}}">
                    </div>
                </div>

                 <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label>Beneficiary Details</label>
                        <textarea class="form-control" name="beneficiary_details" rows="3" required>{{$campaign->beneficiary_details}}</textarea>
                    </div>
                </div>
            </div>

            <div id="accordion">
              <div class="card">
                    <div class="card-header" id="headingOne">
                      <h5 class="mb-0">
                        <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Story Section
                        </button>
                      </h5>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                      <div class="card-body">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <h3>Story Section</h3>
                                    <hr>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label>Story Heading:</label>
                                        <textarea class="form-control" name="story_heading">{{$campaign->story_heading}}</textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label>Story Sub Heading:</label>
                                        <textarea class="form-control" name="story_sub_heading">{{$campaign->story_sub_heading}}</textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label>Story:</label>
                                        <textarea class="form-control" name="story">{{$campaign->story}}</textarea>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                            <label>Images</label>
                                            <table class="table table-hover table-striped" style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>File</th>
                                                        <th>Cover Photo</th>
                                                        <th>
                                                          <a href="javascript:void(0)" class="btn btn-sm btn-primary add_story_photo"><i class="fas fa-plus"></i> Add</a>
                                                          <a href="javascript:void(0)" class="btn btn-sm btn-success" id="save_image" data-id="story_photo"><i class="fas fa-save"></i> Save</a>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="story_photo_wrapper">
                                                    @php $count = 0; @endphp
                                                    @if($campaign->CampaignAttachments)
                                                        @foreach($campaign->CampaignAttachments as $photo)
                                                            @if($photo->type == 'story_photo')
                                                                @php  $count++;   @endphp
                                                                <tr class="story_photo_counter " id="story_photo_{{$count}}">
                                                                    <td>{{++$loop->index}}</td>
                                                                    <td>
                                                                      <input type="file" name="story_image[]" class="form-control story_image" style="display:none"
                                                                      value="{{asset('storage/campaign/story_image/'.$photo->photo_name)}}"
                                                                      >
                                                                      <a href="{{asset('storage/campaign/story_image/'.$photo->photo_name)}}" target="_blank">
                                                                        <img
                                                                          style="max-width: 15%;"
                                                                          src="{{asset('storage/campaign/story_image/'.$photo->photo_name)}}">
                                                                      </a>
                                                                    </td>
                                                                    <td>
                                                                      <input type="radio" name="cover_photo"
                                                                      @if($photo->main_story_image != null) checked @endif
                                                                      >
                                                                    </td>
                                                                    <td>
                                                                      <a href="javascript:void(0);" class="remove_story_photo btn btn-sm btn-danger" id="{{$count}}"><i class="fas fa-times"></i></a>
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                    @if($count < 5)
                                                        <tr class="" id="story_photo_x">
                                                                <td>{{++$count}}</td>
                                                                <td><input type="file" name="story_image[]" class="form-control story_image" required></td>
                                                                <td><input type="radio" name="cover_photo" required></td>
                                                                <td><a href="javascript:void(0);" class="remove_story_photo btn btn-sm btn-danger" id="x"><i class="fas fa-times"></i></td>
                                                        </tr>
                                                    @endif
                                                    </tbody>
                                            </table>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                            <label>Video</label>
                                            <table class="table table-hover table-striped" style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>File</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                 <tbody class="story_video_wrapper">
                                                    @if($campaign->CampaignAttachments)
                                                        @foreach($campaign->CampaignAttachments as $video)
                                                            @if($video->type == 'story_video')
                                                                <tr>
                                                                    <td>{{++$loop->index}}</td>
                                                                    <td>{{$video->video_name}}</td>
                                                                    <td>N\A</td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <th>1</th>
                                                            <th><input type="file" name="story_video[]" class="form-control" ></th>
                                                            <th><a href="javascript:void(0)" class="btn btn-sm btn-primary add_story_video"><i class="fas fa-plus"></i></a></th>
                                                        </tr>
                                                    @endif


                                                    </tbody>
                                            </table>
                                </div>
                            </div>
                      </div>
                    </div>
              </div>
              <div class="card">
                    <div class="card-header " id="headingTwo">
                      <h5 class="mb-0">
                        <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          Testimonial Section
                        </button>
                      </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                      <div class="card-body">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <h3>Testimonial Section</h3>
                                    <hr>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label>Testimonial Heading:</label>
                                        <textarea class="form-control" name="testimonial_heading">{{$campaign->testimonial_heading}}</textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label>Testimonial Sub Heading:</label>
                                        <textarea class="form-control" name="testimonial_sub_heading">{{$campaign->testimonial_sub_heading}}</textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label>Testimonial:</label>
                                        <textarea class="form-control" name="testimonial">{{$campaign->testimonial}}</textarea>
                                    </div>
                                </div>

                               {{--  <div class="col-xs-12 col-sm-12 col-md-12">
                                            <label>Testimonial Images</label>
                                            <table class="table table-hover table-striped" style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>File</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="testimonial_photo_wrapper">
                                                    @if($campaign->CampaignAttachments)
                                                        @foreach($campaign->CampaignAttachments as $testi_photo)
                                                            @if($testi_photo->type == 'testimonial_image')
                                                                <tr>
                                                                    <td>{{++$loop->index}}</td>
                                                                    <td>{{$testi_photo->photo_name}}</td>
                                                                    <td>N\A</td>
                                                                    <td>N\A</td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    @else
                                                   <tr>
                                                        <td>1</td>
                                                        <td><input type="file" name="testimonial_image[]"  class="form-control"></td>
                                                        <td><a href="javascript:void(0)" class="btn btn-sm btn-primary add_testimonial_photo"><i class="fas fa-plus"></i></a></td>
                                                    </tr>
                                                    @endif
                                                    </tbody>
                                            </table>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                            <label>Testimonial Videos</label>
                                            <table class="table table-hover table-striped" style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>File</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="testimonial_video_wrapper">
                                                    @if($campaign->CampaignAttachments)
                                                        @foreach($campaign->CampaignAttachments as $testi_vid)
                                                            @if($testi_vid->type == 'testimonial_video')
                                                                <tr>
                                                                    <td>{{++$loop->index}}</td>
                                                                    <td>{{$testi_vid->photo_name}}</td>
                                                                    <td>N\A</td>
                                                                    <td>N\A</td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    @else
                                                       <tr>
                                                            <th>1</th>
                                                            <th><input type="file" name="testimonial_video[]"  class="form-control"></th>
                                                            <th><a href="javascript:void(0)" class="btn btn-sm btn-primary add_testimonial_video"><i class="fas fa-plus"></i></a></th>
                                                        </tr>
                                                    @endif
                                                    </tbody>
                                            </table>
                                </div> --}}
                            </div>
                      </div>
                    </div>
              </div>
              <div class="card">
                    <div class="card-header" id="headingThree">
                      <h5 class="mb-0">
                        <button type="button"  class="btn btn-link collapsed"  data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                          Document Section
                        </button>
                      </h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                      <div class="card-body">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <h3>Supporting Document Section</h3>
                                        <hr>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label>Document Heading:</label>
                                            <textarea class="form-control" name="document_heading">{{$campaign->document_heading}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label>Document Sub Heading:</label>
                                            <textarea class="form-control" name="document_sub_heading">{{$campaign->document_sub_heading}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label>Document:</label>
                                            <textarea class="form-control" name="document">{{$campaign->document}}</textarea>
                                        </div>
                                    </div>

                                    {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                                                <label>Document Images</label>
                                                <table class="table table-hover table-striped" style="width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>File</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="document_photo_wrapper">
                                                        @if($campaign->CampaignAttachments)
                                                        @foreach($campaign->CampaignAttachments as $doc_img)
                                                            @if($doc_img->type == 'document_image')
                                                                <tr>
                                                                    <td>{{++$loop->index}}</td>
                                                                    <td>{{$doc_img->photo_name}}</td>
                                                                    <td>N\A</td>
                                                                    <td>N\A</td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    @else
                                                       <tr>
                                                            <td>1</td>
                                                            <td><input type="file" name="document_image[]"  class="form-control"></td>
                                                            <td><a href="javascript:void(0)" class="btn btn-sm btn-primary add_document_photo"><i class="fas fa-plus"></i></a></td>
                                                        </tr>
                                                    @endif
                                                        </tbody>
                                                </table>
                                    </div>




                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                <label>Document Videos</label>
                                                <table class="table table-hover table-striped" style="width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>File</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="document_video_wrapper">
                                                        @if($campaign->CampaignAttachments)
                                                        @foreach($campaign->CampaignAttachments as $doc_vid)
                                                            @if($doc_vid->type == 'document_video')
                                                                <tr>
                                                                    <td>{{++$loop->index}}</td>
                                                                    <td>{{$doc_vid->photo_name}}</td>
                                                                    <td>N\A</td>
                                                                    <td>N\A</td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    @else
                                                       <tr>
                                                            <th>1</th>
                                                            <th><input type="file" name="document_video[]"  class="form-control"></th>
                                                            <th><a href="javascript:void(0)" class="btn btn-sm btn-primary add_document_video"><i class="fas fa-plus"></i></a></th>
                                                        </tr>
                                                        @endif
                                                        </tbody>
                                                </table>
                                    </div> --}}
                                </div>
                      </div>
                    </div>
              </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12 text-right" style="margin-top: 2%;">
                <button type="submit" class="btn btn-warning">Update</button>
            </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection

@section('javascript')
<script type="text/javascript">
            // Saving Images Via Ajax
            $('#save_image').click(function(){
               var form_data = new FormData();
               // Read selected files
               var totalfiles = $('input[name=story_image]').length;
               for (var index = 0; index < totalfiles; index++) {
                  form_data.append("story_image[]", $('.story_image')[index]);
               }
               console.log(form_data);
               $.ajax({
                 url: '{{}}',
                 type: 'post',
                 data: form_data,
                 dataType: 'json',
                 contentType: false,
                 processData: false,
                 success: function (response) {
                   for(var index = 0; index < response.length; index++) {
                     var src = response[index];
                     // Add img element in <div id='preview'>
                     // $('#preview').append('<img src="'+src+'" width="200px;" height="200px">');
                   }
                 }
               });
            });


            $('select.campaing_end_time').on('change', function() {
              if(this.value == 'yes_end_date'){
                $('.end_time_dependent').html('');
                $('.end_time_dependent').append(`
                    <label>Campaign Date</label>
                                <select class="form-control campaign_date" name="campaign_date" required id="campaign_date">
                                <option value="">Select Option</option>

                                <option value="End_Date">End Date</option>
                                </select>`);
                $('.camp_end_date').prop('disabled', false);
                $('.camp_end_date').val('');
              }else{
                $('.end_time_dependent').html('');
                $('.end_time_dependent').append(`
                    <label>Campaign Date</label>
                                <select class="form-control campaign_date" name="campaign_date" required id="campaign_date">
                                <option value="">Select Option</option>
                                <option value="Ongoing">Ongoing</option><option value="Longterm">Longterm</option></select>`);
                $('.camp_end_date').prop('disabled', true);
                $('.camp_end_date').val('');
              }
            });

            //Story Section
            var story_photo_x = $('.story_photo_counter').length;
            story_photo_x = story_photo_x + 2;

            //Story Photo
            $($('.add_story_photo')).click(function(){
                var maxField = 5;
                var fieldHTML = `<tr  id="story_photo_`+story_photo_x+`">
                          <th scope="row">`+ story_photo_x+`</th>
                          <td><input type="file" name="story_image[]" class="form-control story_image" required></td>
                          <td><input type="radio" name="cover_photo" required></td>
                          <td><a href="javascript:void(0);" class="remove_story_photo btn btn-sm btn-danger" id=`+story_photo_x+`><i class="fas fa-times"></i></a></td>
                        </tr>`;

                if(story_photo_x <= maxField){
                    story_photo_x++;
                    $($('.story_photo_wrapper')).append(fieldHTML);
                }else{
                    alert('Maximum Story Photo fields are added');
                }
            });

            $($('.story_photo_wrapper')).on('click', '.remove_story_photo', function(e){
                e.preventDefault();
                $('#story_photo_'+$(this).attr('id')).remove();
                story_photo_x--;
            });


            var addstory_Video = $('.add_story_video');
            var story_videos = $('.story_video_wrapper');
            var story_video_x = 2;

            //Story Photo
            $(addstory_Video).click(function(){
                var maxField = 5;
                var fieldHTML = `<tr  id="story_video_`+story_video_x+`">
                          <th scope="row">`+ story_video_x+`</th>
                          <td><input type="file" name="story_video[]" class="form-control" ></td>
                          <td><a href="javascript:void(0);" class="remove_story_video btn btn-sm btn-danger" id=`+story_video_x+`><i class="fas fa-times"></i></a></td>
                        </tr>`;

                if(story_video_x <= maxField){
                    story_video_x++;
                    $(story_videos).append(fieldHTML);
                }else{
                    alert('Maximum Story Video fields are added');
                }
            });

            $(story_videos).on('click', '.remove_story_video', function(e){
                e.preventDefault();
                $('#story_video_'+$(this).attr('id')).remove();
                story_video_x--;
            });



            //Testimonial Section
            var addtestimonial_Photo = $('.add_testimonial_photo');
            var testimonial_photos = $('.testimonial_photo_wrapper');
            var testimonial_photo_x = 2;

            //testimonial Photo
            $(addtestimonial_Photo).click(function(){
                var maxField = 5;
                var fieldHTML = `<tr  id="testimonial_photo_`+testimonial_photo_x+`">
                          <th scope="row">`+ testimonial_photo_x+`</th>
                          <td><input type="file" name="testimonial_image[]" class="form-control" ></td>
                          <td><a href="javascript:void(0);" class="remove_testimonial_photo btn btn-sm btn-danger" id=`+testimonial_photo_x+`><i class="fas fa-times"></i></a></td>
                        </tr>`;

                if(testimonial_photo_x <= maxField){
                    testimonial_photo_x++;
                    $(testimonial_photos).append(fieldHTML);
                }else{
                    alert('Maximum testimonial Photo fields are added');
                }
            });

            $(testimonial_photos).on('click', '.remove_testimonial_photo', function(e){
                e.preventDefault();
                $('#testimonial_photo_'+$(this).attr('id')).remove();
                testimonial_photo_x--;
            });


            var addtestimonial_Video = $('.add_testimonial_video');
            var testimonial_videos = $('.testimonial_video_wrapper');
            var testimonial_video_x = 2;

            //testimonial Photo
            $(addtestimonial_Video).click(function(){
                var maxField = 5;
                var fieldHTML = `<tr  id="testimonial_video_`+testimonial_video_x+`">
                          <th scope="row">`+ testimonial_video_x+`</th>
                          <td><input type="file" name="testimonial_video[]" class="form-control" ></td>
                          <td><a href="javascript:void(0);" class="remove_testimonial_video btn btn-sm btn-danger" id=`+testimonial_video_x+`><i class="fas fa-times"></i></a></td>
                        </tr>`;

                if(testimonial_video_x <= maxField){
                    testimonial_video_x++;
                    $(testimonial_videos).append(fieldHTML);
                }else{
                    alert('Maximum testimonial Video fields are added');
                }
            });

            $(testimonial_videos).on('click', '.remove_testimonial_video', function(e){
                e.preventDefault();
                $('#testimonial_video_'+$(this).attr('id')).remove();
                testimonial_video_x--;
            });


            //document Section
            var adddocument_Photo = $('.add_document_photo');
            var document_photos = $('.document_photo_wrapper');
            var document_photo_x = 2;

            //document Photo
            $(adddocument_Photo).click(function(){
                var maxField = 5;
                var fieldHTML = `<tr  id="document_photo_`+document_photo_x+`">
                          <th scope="row">`+ document_photo_x+`</th>
                          <td><input type="file" name="document_image[]" class="form-control" ></td>
                          <td><a href="javascript:void(0);" class="remove_document_photo btn btn-sm btn-danger" id=`+document_photo_x+`><i class="fas fa-times"></i></a></td>
                        </tr>`;

                if(document_photo_x <= maxField){
                    document_photo_x++;
                    $(document_photos).append(fieldHTML);
                }else{
                    alert('Maximum document Photo fields are added');
                }
            });

            $(document_photos).on('click', '.remove_document_photo', function(e){
                e.preventDefault();
                $('#document_photo_'+$(this).attr('id')).remove();
                document_photo_x--;
            });


            var adddocument_Video = $('.add_document_video');
            var document_videos = $('.document_video_wrapper');
            var document_video_x = 2;

            //document Photo
            $(adddocument_Video).click(function(){
                var maxField = 5;
                var fieldHTML = `<tr  id="document_video_`+document_video_x+`">
                          <th scope="row">`+ document_video_x+`</th>
                          <td><input type="file" name="document_video[]" class="form-control" ></td>
                          <td><a href="javascript:void(0);" class="remove_document_video btn btn-sm btn-danger" id=`+document_video_x+`><i class="fas fa-times"></i></a></td>
                        </tr>`;

                if(document_video_x <= maxField){
                    document_video_x++;
                    $(document_videos).append(fieldHTML);
                }else{
                    alert('Maximum document Video fields are added');
                }
            });

            $(document_videos).on('click', '.remove_document_video', function(e){
                e.preventDefault();
                $('#document_video_'+$(this).attr('id')).remove();
                document_video_x--;
            });

</script>
@endsection
