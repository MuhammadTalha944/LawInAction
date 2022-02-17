@extends('layouts.dashboard.main')
@section('title','Campaign Show')
@section('content')
<style type="text/css">
    h3{
        text-align: center;
        font-weight: 700;
        text-decoration: underline;
    }
    label{
        font-weight: 700;
    }
    video {
          /*max-width: 100%;*/
          /*height: auto;*/
              max-height: 110px;
        }
        p{
        border: 1px solid lightgray;
        padding: 1%;
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

            {{-- {!! Form::open(array('route' => ['campaign.update', $campaign->id],'method'=>'PUT', 'enctype' => 'multipart/form-data')) !!}
        @csrf --}}
                    <h2>Campaign Details</h2>
                <hr>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <h3>Main Section</h3>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        <label>Campaign Category:</label>
                        {{-- <select class="form-control" name="campaign_categories_id" required>
                            <option value="">-Select Category-</option>
                            @if($CampaignCategories)
                                @foreach($CampaignCategories as $category)
                                    <option value="{{$category->id}}"
                                        @if($campaign->CampaignCategories->id == $category->id) selected @endif 
                                        > {{$category->name}} </option>
                                @endforeach
                            @endif
                        </select> --}}
                        {{$campaign->CampaignCategories->name}}
                    </div>
                </div>
               <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        <label>Tags Categories:</label>
                        {{-- <select class="form-control" name="campaign_tags" required>
                            <option value="">-Select Tags-</option>
                            @if($CampaignTags)
                                @foreach($CampaignTags as $category)
                                    <option value="{{$category->id}}"
                                        @if($campaign->CampaignTags->id == $category->id) selected @endif
                                        > {{$category->name}} </option>
                                @endforeach
                            @endif
                        </select> --}}
                        {{$campaign->CampaignTags->name}}
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        <label>Keywords Categories:</label>
                        {{-- <select class="form-control" name="campaign_keywords" required>
                            <option value="">-Select Keywords-</option>
                            @if($CampaignKeywords)
                                @foreach($CampaignKeywords as $category)
                                    <option value="{{$category->id}}"
                                        @if($campaign->CampaignKeywords->id == $category->id) selected @endif
                                        > {{$category->name}} </option>
                                @endforeach
                            @endif
                        </select> --}}
                        {{$campaign->CampaignKeywords->name}}
                    </div>
                </div>

                <div class="col-xs-3 col-sm-3 col-md-3">
                    <div class="form-group">
                        <label>Fund Requirment</label>
                        {{-- <select class="form-control" name="fund_req" required>
                            <option value="">-Select Currency-</option>
                           <option value="USD"
                            @if($campaign->fund_req == 'USD' ) selected @endif 
                           >USD - $</option>
                            <option value="INR"
                                @if($campaign->fund_req == 'INR' ) selected @endif 
                            >INR - ₹</option>
                        </select> --}}
                        {{$campaign->fund_req}}
                    </div>
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2">
                    <div class="form-group">
                        <label>Amount</label>
                        {{$campaign->amount}}
                        {{-- <input type="number" name="amount" class="form-control" required value="{{$campaign->amount}}"> --}}
                    </div>
                </div>

                 <div class="col-xs-2 col-sm-2 col-md-2">
                    <div class="form-group">
                        <label>Campaign End Time</label>
                        {{-- <select class="form-control" name="campaing_end_time" required>
                            <option value="">-Select Time-</option>
                           <option value="yes" 
                            @if($campaign->campaing_end_time == 'yes') selected @endif
                           >Yes</option>
                            <option value="no" 
                                @if($campaign->campaing_end_time == 'no') selected @endif
                            >No</option>
                        </select> --}}
                        {{$campaign->campaing_end_time}}
                    </div>
                </div>
                 <div class="col-xs-2 col-sm-2 col-md-2">
                    <div class="form-group">
                        <label>Campaign Date</label>
                        {{-- <select class="form-control" name="campaign_date" required>
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
                        </select> --}}
                        {{$campaign->campaign_date}}
                    </div>
                </div>
                
                <div class="col-xs-3 col-sm-3 col-md-3">
                    <div class="form-group">
                        <label>End Date <small>(Optional)</small></label>
                        {{$campaign->camp_end_date}}
                        {{-- <input type="date" name="camp_end_date" class="form-control" value="{{$campaign->camp_end_date}}"> --}}
                    </div>
                </div>

                 <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label>Beneficiary Details</label>
                        {{$campaign->beneficiary_details}}
                        {{-- <textarea class="form-control" name="beneficiary_details" rows="3" required>{{$campaign->beneficiary_details}}</textarea> --}}
                    </div>
                </div>
            </div>

            <div id="accordion" style="margin-bottom: 3%;">
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
                            {{-- Story --}}
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <h3>Story Section</h3>
                                    <hr>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label>Story Heading:</label>
                                        {{$campaign->story_heading}}
                                        {{-- <textarea class="form-control" name="story_heading">{{$campaign->story_heading}}</textarea> --}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label>Story Sub Heading:</label>
                                        {{$campaign->story_sub_heading}}
                                        {{-- <textarea class="form-control" name="story_sub_heading">{{$campaign->story_sub_heading}}</textarea> --}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label>Story:</label>
                                        {{$campaign->story}}
                                        {{-- <textarea class="form-control" name="story">{{$campaign->story}}</textarea> --}}
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                            <label>Images</label>
                                            <table class="table table-hover table-striped" style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>File</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="story_photo_wrapper">
                                                    @if($campaign->CampaignAttachments)
                                                        @php $count = 1; @endphp
                                                        @foreach($campaign->CampaignAttachments as $photo)
                                                            @if($photo->type == 'story_photo')
                                                                <tr>
                                                                  <th scope="row">{{ $count++ }}</th>
                                                                    <td>
                                                                        <a href="{{asset('storage/campaign/story_image/'.$photo->photo_name)}}" target="_blank">
                                                                            <img src="{{asset('storage/campaign/story_image/'.$photo->photo_name)}}" style="width: 70px;height: 70px;">
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    @else
                                                           <tr>N \ A</tr>
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
                                                        <th>Video Link</th>
                                                    </tr>
                                                </thead>
                                                 <tbody class="story_video_wrapper">
                                                    @if($campaign->CampaignAttachments)
                                                        @foreach($campaign->CampaignAttachments as $video)
                                                            @if($video->type == 'story_video')
                                                                <tr>
                                                                  <th scope="row">{{ $count++ }}</th>
                                                                    <td>
                                                                        <a href="{{asset('storage/campaign/story_video/'.$video->video_name)}}" target="_blank">
                                                                            <video width="400" controls>
                                                                                  <source src="{{asset('storage/campaign/story_video/'.$video->video_name)}}" type="video/mp4">
                                                                                  Your browser does not support HTML5 video.
                                                                            </video>
                                                                        </a>
                                                                    </td>
                                                                    <td><a href="{{asset('storage/campaign/story_video/'.$video->video_name)}}" target="_blanl">Open Video</a></td>
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
                        {{-- Testimonial --}}
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <h3>Testimonial Section</h3>
                                    <hr>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label>Testimonial Heading:</label>
                                        <p>{{$campaign->testimonial_heading}}</p>
                                        {{-- <textarea class="form-control" name="testimonial_heading">{{}}</textarea> --}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label>Testimonial Sub Heading:</label>
                                        <p>{{$campaign->testimonial_sub_heading}}</p>
                                        {{-- <textarea class="form-control" name="testimonial_sub_heading">{{}}</textarea> --}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label>Testimonial:</label>
                                        <p>{{$campaign->testimonial}}</p>
                                        {{-- <textarea class="form-control" name="testimonial">{{}}</textarea> --}}
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
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
                                                        @php $count = 1; @endphp
                                                        @foreach($campaign->CampaignAttachments as $testi_photo)
                                                            @if($testi_photo->type == 'testimonial_image')
                                                                <tr>
                                                                  <th scope="row">{{ $count++ }}</th>
                                                                    <td>
                                                                        <a href="{{asset('storage/campaign/testimonial_image/'.$testi_photo->photo_name)}}" target="_blank">
                                                                            <img src="{{asset('storage/campaign/testimonial_image/'.$testi_photo->photo_name)}}" style="width: 70px;height: 70px;">
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    @else
                                                           <tr>N \ A</tr>
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
                                                        @foreach($campaign->CampaignAttachments as $testi_video)
                                                            @if($testi_video->type == 'testimonial_video')
                                                                <tr>
                                                                  <th scope="row">{{ $count++ }}</th>
                                                                    <td>
                                                                        <a href="{{asset('storage/campaign/testimonial_video/'.$testi_video->video_name)}}" target="_blank">
                                                                            <video width="400" controls>
                                                                                  <source src="{{asset('storage/campaign/testimonial_video/'.$testi_video->video_name)}}" type="video/mp4">
                                                                                  Your browser does not support HTML5 video.
                                                                            </video>
                                                                        </a>
                                                                    </td>
                                                                    <td><a href="{{asset('storage/campaign/testimonial_video/'.$testi_video->video_name)}}" target="_blanl">Open Video</a></td>
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
                        {{-- Documents --}}
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <h3>Supporting Document Section</h3>
                                        <hr>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label>Document Heading:</label>
                                            <p>{{$campaign->document_heading}}</p>
                                            {{-- <textarea class="form-control" name="document_heading">{{$campaign->document_heading}}</textarea> --}}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label>Document Sub Heading:</label>
                                            <p>{{$campaign->document_sub_heading}}</p>
                                            {{-- <textarea class="form-control"  name="document_sub_heading">{{$campaign->document_sub_heading}}</textarea> --}}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label>Document:</label>
                                            <p>{{$campaign->document}}</p>
                                            {{-- <textarea class="form-control" name="document">{{$campaign->document}}</textarea> --}}
                                        </div>
                                    </div>

   

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                <label>Document Images</label>
                                                <table class="table table-hover table-striped" style="width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>File</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="document_photo_wrapper">
                                                        @if($campaign->CampaignAttachments)
                                                        @php $count = 1; @endphp
                                                        @foreach($campaign->CampaignAttachments as $testi_photo)
                                                            @if($testi_photo->type == 'document_image')
                                                                <tr>
                                                                  <th scope="row">{{ $count++ }}</th>
                                                                    <td>
                                                                        <a href="{{asset('storage/campaign/document_image/'.$testi_photo->photo_name)}}" target="_blank">
                                                                            <img src="{{asset('storage/campaign/document_image/'.$testi_photo->photo_name)}}" style="width: 70px;height: 70px;">
                                                                        </a>
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
                                                        @foreach($campaign->CampaignAttachments as $testi_video)
                                                            @if($testi_video->type == 'document_video')
                                                                <tr>
                                                                  <th scope="row">{{ $count++ }}</th>
                                                                    <td>
                                                                        <a href="{{asset('storage/campaign/document_video/'.$testi_video->video_name)}}" target="_blank">
                                                                            <video width="400" controls>
                                                                                  <source src="{{asset('storage/campaign/document_video/'.$testi_video->video_name)}}" type="video/mp4">
                                                                                  Your browser does not support HTML5 video.
                                                                            </video>
                                                                        </a>
                                                                    </td>
                                                                    <td><a href="{{asset('storage/campaign/document_video/'.$testi_video->video_name)}}" target="_blanl">Open Video</a></td>
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
            @role('Campaign Incharge')            
                    @if($campaign->status == 0)
                                            <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                                                <a href="{{route('campaign.send_to_editor', $campaign->id)}}" class="btn btn-primary">Send  to Editor</a>
                                                <a href="{{route('campaign.index')}}" class="btn btn-danger">Back</a>
                                            </div>
                    @endif
            @endif

            @role('Super Admin')            
                    @if($campaign->status == 0)
                                            <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                                                <a href="{{route('campaign.send_to_editor', $campaign->id)}}" class="btn btn-primary">Send  to Editor</a>
                                                <a href="{{route('campaign.index')}}" class="btn btn-danger">Back</a>
                                            </div>
                    @endif
            @endif
            
                    
                @if($campaign->proofread_by)
                    <hr>
                    <h3>Proof-Reader Remarks</h3>
                    <p>{{$campaign->proofreaded_question}}</p>
                @else
                            @role('Campaign Proofreader')    
                                <hr>
                                <h3>Proof Reader Comments</h3>
                                        <form method="POST" action="{{route('send.back.to.editorCampaign')}}">
                                            @csrf
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    {{-- <label>Remarks:</label> --}}
                                                    <textarea class="form-control" rows="3" name="proofreader_remarks" required></textarea>
                                                    <input type="hidden" name="campaign_id" value="{{ $campaign->id }}">
                                                    <input type="hidden" name="mode" value="proofreader">
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                                                <button type="submit" class="btn btn-primary">Send Back to Editor</button>
                                                <a href="{{route('campaign.index')}}" class="btn btn-danger">Back</a>
                                            </div>
                                        </form>
                             @endif
                @endif
            

                       
                @if($campaign->translated_by)
                    <hr>
                    <h3>Translator Remarks:</h3>
                    <p>{{$campaign->translated_question}}</p>
                @else
                            
                            @role('Campaign Translator') 
                                <hr>
                                <h3>Translator Comments</h3>
                                        <form method="POST" action="{{route('send.back.to.editorCampaign')}}">
                                            @csrf
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <textarea class="form-control" rows="3" name="translator_remarks" required></textarea>
                                                    <input type="hidden" name="campaign_id" value="{{ $campaign->id }}">
                                                    <input type="hidden" name="mode" value="translator">
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                                                <button type="submit" class="btn btn-primary">Send Back to Editor</button>
                                                <a href="{{route('campaign.index')}}" class="btn btn-danger">Back</a>
                                            </div>
                                        </form>
                            @endif

                @endif
           

            @role('Campaign Editor')            
                    {{-- @if($campaign->proofread_by)
                        <hr>
                        <h3>Remarks by Proofreader</h3>
                        <p>{{$campaign->proofreader_remarks}}</p>
                    @endif

                    @if($campaign->translated_by)
                        <hr>
                        <h3>Remarks by Translator</h3>
                        <p>{{$campaign->translater_remarks}}</p>
                    @endif --}}
                <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                    @if($campaign->status == 1)


                            @if(!$campaign->categories)                        
                                @if(!$campaign->proofread_by)
                                    <a  href="{{route('send.to.proofreaderCampaign', $campaign->id)}}" title="Send for proof reading"  class="btn btn-primary">Proofreader</a>
                                 @endif   


                                @if(!$campaign->translated_by)
                                    <a href="{{route('send.to.translatorCampaign', $campaign->id)}}" class="btn btn-success">Translator</a>
                                @endif
                            @endif



                                @if($campaign->published == 0)
                                        <a href="{{route('publish.Campaign', $campaign->id)}}" class="btn btn-success" id="check">Publish</a>
                                @else
                                        <a href="{{route('unpublish.Campaign', $campaign->id)}}" class="btn btn-danger" id="check">Un-Publish</a>
                                @endif


                    @endif
                    <a href="{{route('campaign.index')}}" class="btn btn-warning">Back</a>
                </div>
            @endif


        {{--<div class="col-xs-12 col-sm-12 col-md-12 text-right" style="margin-top: 2%;">
                <button type="submit" class="btn btn-warning">Update</button>
            </div> --}}
        {{-- {!! Form::close() !!} --}}
    </div>
</div>
@endsection

@section('javascript')
<script type="text/javascript">
        
</script>
@endsection