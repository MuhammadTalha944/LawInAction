@extends('layouts.dashboard.main')
@section('title','80G certificate')
@section('content')

 <div class="card yellow_border shadow h-100 py-2">
    <div class="card-body">
            <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h4>My Donations</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <table class="table table-bordered table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Donated on</th>
                            <th>Amount</th>
                            <th>Campaign Link</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($donations)
                            @foreach($donations as $donated)
                                <tr>
                                    <td>{{++$loop->index}}</td>
                                    <td>{{$donated->created_at->format('M d Y')}}</td>
                                    <td>{{$donated->amount}} {{$donated->currency}}</td>
                                    <td>
                                        <a href="{{route('campaign.detail', $donated->Campaign->id)}}" target="_blank" 
                                            class="btn btn-sm btn-success" 
                                            ><i class="fa fa-external-link"></i> Open
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>                
            </div>
        </div>
    </div>
</div>

@endsection