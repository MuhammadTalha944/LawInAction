@extends('layouts.dashboard.main')
@section('title', 'User Details')
@section('content')
<style type="text/css">
        .blink{
            background-color: #e1b50d;
            padding: 5px;
            text-align: center;
            line-height: 50px;
            margin: 3%;
        }
        #blink_donor{
            font-size: 24px;
            font-family: cursive;
            color: black;
            animation: blink 1s linear infinite;
        }
    @keyframes blink{
    0%{opacity: 0;}
    50%{opacity: .5;}
    100%{opacity: 1;}
    }
</style>
 <div class="card yellow_border shadow h-100 py-2">
    <div class="card-body">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h4><b>Member Details</b></h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        {{ $user->name }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Email:</strong>
                        {{ $user->email }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Email Verification:</strong>
                                            @if($user->email_verified_at)
                                                <label class="badge badge-success">Verified</label>
                                            @else
                                                <label class="badge badge-warning">Not Verified</label>
                                            @endif
                    </div>
                </div>
                @if($user->donor == 0)
                    @if($user->membership)
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Country:</strong>
                                    @if($user->membership->country)
                                        {{ $user->membership->country }}
                                    @endif
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Gender:</strong>
                                    {{ $user->membership->gender }}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Category:</strong>
                                    @if($user->membership->category == 'Advocate_Lawyer')
                                                    Advocate Lawyer
                                    @elseif($user->membership->category == 'Law_Student_Activist')
                                                    Law Student Activist
                                    @elseif($user->membership->category == 'Journalist')
                                                    Journalist
                                    @elseif($user->membership->category == 'Writer')
                                                    Writer
                                    @elseif($user->membership->category == 'Retired_Judge')
                                                    Retired Judge
                                    @elseif($user->membership->category == 'Retired_Bureaucrat')
                                                    Retired Bureaucrat
                                    @elseif($user->membership->category == 'Other_Accredited_Person')
                                                    Other Accredited Person
                                    @elseif($user->membership->category == 'Others')
                                                    Others
                                    @endif                
                                    
                                </div>
                            </div>
                             <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Identity Proof:</strong>
                                        <img src="{{asset('storage/membership/identity/'.$user->membership->proving_your_identity)}}" style="width: 70px;height: 70px;">
                                </div>
                            </div>

                             <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Passport photo:</strong>
                                    <img src="{{asset('storage/membership/passport_photo/'.$user->membership->passport_photo)}}" style="width: 70px;height: 70px;">
                                </div>
                            </div>
                    @endif
                @endif
                {{-- @if($user->donor == 1) --}}
                    @if(empty($user->membership))
                        <div class="col-xs-12 col-sm-12 col-md-12" style="text-align: left;">
                            <div class="blink"><h3 id="blink_donor">This user registered via Campaign Donation</h3></div>
                        </div>
                    @endif
                {{-- @endif --}}
                
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <form method="POST" action="{{route('users.evaluate', $user->id)}}">
                        @csrf
                        <div class="form-group">
                            <strong>Please evaluate and check that is this person relible enough to get dashboard access?</strong>
                                
                                <input type="radio" name="done_by_evaluator" value="yes" {{ ($user->done_by_evaluator == 'yes') ? "checked" : '' }} >
                                <label>Yes</label>
                                <input type="radio" name="done_by_evaluator" value="no" {{ ($user->done_by_evaluator == 'no') ? "checked" : '' }} >
                                <label>No</label>
                                <button type="submit" class="btn btn-sm btn-primary">
                                    Save
                                </button>
                        
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection