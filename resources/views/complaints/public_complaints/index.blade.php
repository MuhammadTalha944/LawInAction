@extends('layouts.website.app')
@section('title', 'Complaints')
@section('content')

<link href="{{asset('website/asset/css/complaints.css')}}" rel="stylesheet">

<div class="jumbotron text-center">
  <h1 style="color: #ffcb07;font-weight: 800">Public Complaints</h1>
</div>

<div class="container">
   <div class="col-md-12" style="text-align: left;">
      <h3>All Complaints <i class="fa fa-exclamation-triangle"></i></h3>
   </div>
   <div class="col-md-12" style="text-align: right;">
      <div style="font-size: 14px;">
            <i class="fa fa-dot-circle" style="color: #07a7e3;"></i> <span>Initiated/Open</span>
            <i class="fa fa-dot-circle" style="color: #0ad251;"></i> <span>Proceesing/Resolved</span>
            <i class="fa fa-dot-circle" style="color: #f43a59;"></i> <span>Pending</span>
            <i class="fa fa-dot-circle" style="color: #fce418;"></i> <span>Closed</span>
      </div>
   </div>
   <div class="row mb-5">
      @if(count($complaints) > 0)
        @php
          $color = array('info','success','primary','warning','danger');
        @endphp
        @foreach($complaints as $complaint)
          <div class="col-md-4 mb-5">
            <div
                @if($complaint->status->name == 'Initiated')
                  class="card bg-primary bg-gradient mb-3 text-center"

                @elseif($complaint->status->name == 'Open')
                  class="card bg-primary bg-gradient mb-3 text-center"

                @elseif($complaint->status->name == 'Under Proceesing')
                  class="card bg-success bg-gradient mb-3 text-center"

                @elseif($complaint->status->name == 'Pending')
                  class="card bg-danger bg-gradient mb-3 text-center"

                @elseif($complaint->status->name == 'Resolved')
                  class="card bg-success bg-gradient mb-3 text-center"

                @elseif($complaint->status->name == 'Closed')
                  class="card bg-warning bg-gradient mb-3 text-center"

                @endif
                >
             
                <div class="card-body">
                   <blockquote class="blockquote">
                    <h5>
                      <u>Complaint # <b>{{$complaint->complaint_number}}</b></u>
                    </h5>
                    <p style="text-align: left;"><b>Related To</b>: 
                      @if($complaint->complaint_related_to == 'Communal_Riots')
                        Communal Riots
                      @elseif($complaint->complaint_related_to == 'Tablighi_Jamaat')
                        Tablighi_Jamaat
                      @elseif($complaint->complaint_related_to == 'Corona_Related')
                        Corona Related
                      @elseif($complaint->complaint_related_to == 'Personal_Matter')
                        Personal Matter
                      @elseif($complaint->complaint_related_to == 'Mob_Lynching')
                        Mob Lynching
                      @elseif($complaint->complaint_related_to == 'Religious_Caste_Discrimination')
                        Religious Caste Discrimination
                      @elseif($complaint->complaint_related_to == 'Other_Issues')
                        Other Issues
                      @elseif($complaint->complaint_related_to == 'Other_Hate_Crimes')
                        Other Hate Crimes
                      @endif
                    </p>
                    <p style="text-align: left;"><b>By</b> : {{$complaint->name}}
                    <br>
                    <b>Gender</b> : 
                    {{$complaint->gender}} from <b>Country</b> : {{ $complaint->country }}</p>
                        <div style="text-align: right;">
                           <button type="button" class="btn btn-sm 
                                              @if($complaint->status->name == 'Initiated')
                                                  btn-primary
                                              @elseif($complaint->status->name == 'Open')
                                                  btn-primary
                                              @elseif($complaint->status->name == 'Under Proceesing')
                                                  btn-success
                                              @elseif($complaint->status->name == 'Pending')
                                                  btn-danger
                                              @elseif($complaint->status->name == 'Resolved')
                                                  btn-success
                                              @elseif($complaint->status->name == 'Closed')
                                                  btn-warning
                                              @endif  ">{{$complaint->status->name}}</button> 
                           <a href="{{route('complaint.detail', $complaint->complaint_number )}}" class="btn btn-sm btn-warning">Open <i class="fas fa-external-link-alt"></i></a>
                        </div>
                   </blockquote>
                </div>
             </div>
          </div>
        @endforeach
      @else
        <div class="card" style="box-shadow: 4px 7px #e1dede;">
          <div class="card-body " style="text-align: center;">
              <h3>No Complaints Found</h3>
          </div>
        </div>
      @endif
   </div>
</div>

@endsection