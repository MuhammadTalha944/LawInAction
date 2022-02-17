@extends('layouts.website.app')
@section('title', 'Hate-Form Status')
@section('content')

<link href="{{asset('website/asset/css/complaints.css')}}" rel="stylesheet">

<div class="jumbotron text-center" style="padding: 2% !important;">
  <h1 style="color: #ffcb07;font-weight: 800">Hate-Form Status</h1>
</div>
  
<div class="container">
   <div class="col-md-12" style="text-align: left;">
      <h3>Hate-Form Status</h3>
   </div>
   <div class="col-md-12" style="text-align: right;">
      <div style="font-size: 14px;">
            <i class="fa fa-dot-circle" style="color: #07a7e3;"></i> <span>Initiated/Open</span>
            <i class="fa fa-dot-circle" style="color: #0ad251;"></i> <span>Proceesing/Resolved</span>
            <i class="fa fa-dot-circle" style="color: #f43a59;"></i> <span>Pending</span>
            <i class="fa fa-dot-circle" style="color: #fce418;"></i> <span>Closed</span>
      </div>
   </div>
   <div class="row mb-5" style="margin-top: 2%;">
      @if(count($hate_form) > 0)
        @php
          $color = array('info','success','primary','warning','danger');
        @endphp
        @foreach($hate_form as $hf)
          <div class="col-sm-6 offset-sm-3">
            <div
                @if($hf->status->name == 'Initiated')
                  class="card bg-primary bg-gradient mb-3 text-center"

                @elseif($hf->status->name == 'Open')
                  class="card bg-primary bg-gradient mb-3 text-center"

                @elseif($hf->status->name == 'Under Proceesing')
                  class="card bg-success bg-gradient mb-3 text-center"

                @elseif($hf->status->name == 'Pending')
                  class="card bg-danger bg-gradient mb-3 text-center"

                @elseif($hf->status->name == 'Resolved')
                  class="card bg-success bg-gradient mb-3 text-center"

                @elseif($hf->status->name == 'Closed')
                  class="card bg-warning bg-gradient mb-3 text-center"

                @endif
                >
             
                <div class="card-body">
                   <blockquote class="blockquote">
                    <h5>
                      <u>Complaint # <b>{{$hf->hateform_number}}</b></u>
                    </h5>
                    <p style="text-align: left;"><b>Added By</b>: {{$hf->name}}</p>
                    <p style="text-align: left;"><b>Country</b> : {{ $hf->country }} </p>
                        <div style="text-align: right;">
                           <button type="button" class="btn btn-sm 
                                              @if($hf->status->name == 'Initiated')
                                                  btn-primary
                                              @elseif($hf->status->name == 'Open')
                                                  btn-primary
                                              @elseif($hf->status->name == 'Under Proceesing')
                                                  btn-success
                                              @elseif($hf->status->name == 'Pending')
                                                  btn-danger
                                              @elseif($hf->status->name == 'Resolved')
                                                  btn-success
                                              @elseif($hf->status->name == 'Closed')
                                                  btn-warning
                                              @endif  ">{{$hf->status->name}}</button> 
                           <a href="{{route('hateForm.detail', $hf->hateform_number )}}" class="btn btn-sm btn-warning">Open <i class="fas fa-external-link-alt"></i></a>
                        </div>
                   </blockquote>
                </div>
             </div>
          </div>
        @endforeach
      @else
        <div class="card" style="box-shadow: 4px 7px #e1dede;">
          <div class="card-body " style="text-align: center;">
              <h3>No Hate Forms Found</h3>
          </div>
        </div>
      @endif
   </div>
  </div>

@endsection