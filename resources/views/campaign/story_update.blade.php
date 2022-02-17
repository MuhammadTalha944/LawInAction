@extends('layouts.dashboard.main')
@section('title', 'Campaigns Story Updates')
@section('content')


 <div class="card yellow_border shadow h-100 py-2">
    <div class="card-body">
        <div class="row">

            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h4>Campaign Story Updates</h4>
                </div>
                        <div class="pull-right" style="text-align: right;">
                            <a class="btn btn-success btn-sm" target="_blank" href="{{ route('campaign.detail', $id) }}"><i class="fas fa-eye"></i> Campaign</a>
                            <a class="btn btn-primary btn-sm" href="{{ route('campaign.story.add', $id) }}"><i class="fas fa-plus"></i> Add Story</a>
                            
                        </div>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        @if ($message = Session::get('error'))
            <div class="alert alert-warning">
                <p>{{ $message }}</p>
            </div>
        @endif

        <div class="row" style="margin-top: 1%;">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" style="font-size: 80%;">
                    <thead style="text-align: center;">
                          <tr>
                            <th>#</th>
                            <th>Story Heading</th>
                            <th>Date Added</th>
                            <th>Action</th>
                          </tr>
                    </thead>
                    <tbody style="text-align: center;">
                        @if($stories)
                            @foreach($stories as $story)
                                <tr>
                                    <td>{{$loop->index}}</td>
                                    <td>{{$story->story_heading}}</td>
                                    <td>{{$story->created_at}}</td>
                                    <td>
                                        <a href="{{route('campaign.story.edit', $story->id)}}" class="btn btn-sm btn-warning"><i class="fa fa-eye"></i> Edit/view</a>
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
