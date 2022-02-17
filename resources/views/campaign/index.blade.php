@extends('layouts.dashboard.main')
@section('title', 'Campaigns List')
@section('content')


 <div class="card yellow_border shadow h-100 py-2">
    <div class="card-body">
        <div class="row">

            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h4>Campaign Management</h4>
                </div>
                    @can('campaign-create')
                        <div class="pull-right" style="text-align: right;">
                            <a class="btn btn-success btn-sm" href="{{ route('campaign.create') }}"><i class="fas fa-plus"></i> Campaign</a>
                        </div>
                    @endcan
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
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 80%;">
                    <thead style="text-align: center;">
                          <tr>
                             <th>#</th>
                                 <th>Author</th>
                             <th>Campaign Category</th>
                             {{-- @role('Campaign Incharge') --}}
                                {{-- <th>Send to Editor</th> --}}
                             {{-- @endif --}}
                             <th>End Date</th>
                             <th>Campaign Status</th>
                             <th>Publisher Status</th>
                             <th>Updates</th>
                             <th>Action</th>
                          </tr>
                    </thead>
                    <tbody style="text-align: center;">
                        @if($campaign)
                            @foreach($campaign as $list)
                                <tr>
                                    <td>{{++$loop->index}}</td>
                                    <td>{{$list->user->name}}</td>
                                    <td>{{$list->CampaignCategories->name}}</td>
                                    {{-- <td><a href="">Send to </a></td> --}}
                                    <td>{{$list->campaign_date}} , {{$list->camp_end_date}}</td>
                                    <td>
                                        @if($list->status == 0)
                                            <label class="badge badge-primary">Initiated</label>
                                        @elseif($list->status == 1)
                                            <label class="badge badge-primary">Currently : Editor</label>
                                        @elseif($list->status == 2)
                                            <label class="badge badge-primary">Currently : Proofreader</label>
                                        @elseif($list->status == 3)
                                            <label class="badge badge-primary">Currently : Translator</label>
                                         @elseif($list->status == 4)
                                            <label class="badge badge-primary">Rejected</label>
                                        @endif

                                        <br>
                                        @if($list->proofread_by)
                                                <label class="badge badge-success">Proofreading Done</label>
                                        @endif

                                        @if($list->translated_by)
                                                <label class="badge badge-warning">Translation Done</label>
                                        @endif

                                    </td>
                                    <td>
                                        @if($list->published == 0)
                                                <span class="btn btn-sm btn-danger btn-sm">UnPublished</span>
                                        @elseif($list->published == 1)
                                                <span class="btn btn-sm btn-success btn-sm">Published</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('campaign.story.updates', $list->id)}}" class="btn btn-sm btn-primary">Updates</a>
                                    </td>
                                    <td>
                                        @can('campaign-edit')
                                            @if(!$list->proofread_by && !$list->translated_by)
                                                @if($list->status == 0)
                                                    <a href="{{route('campaign.edit', $list->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                                                @endif
                                            @endif
                                        @endcan
                                        <a href="{{route('campaign.show', $list->id)}}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
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
