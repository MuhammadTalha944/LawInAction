@extends('layouts.dashboard.main')
@section('title', 'Polls List')
@section('content')


 <div class="card yellow_border shadow h-100 py-2">
    <div class="card-body">
        <div class="row">

            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h4>Polls Management</h4>
                </div>
                    @can('polls-create')
                        <div class="pull-right" style="text-align: right;">
                            <a class="btn btn-success btn-sm" href="{{ route('polls.create') }}"><i class="fas fa-plus"></i> <b>Poll</b></a>
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
                                 <th>Question</th>
                                 <th>Added On</th>
                                 <th>Poll Status</th>
                                 <th>Publisher Status</th>
                                 <th>Poll Reactions</th>
                                 <th>Action</th>
                          </tr>
                    </thead>
                    <tbody style="text-align: center;">
                        @if($polls)
                            @foreach($polls as $poll)
                                <tr>
                                    <td>{{ ++$loop->index}}</td>
                                    <td>{{$poll->user->name}}</td>
                                    <td>{{$poll->question}}</td>
                                    <td>{{$poll->created_at->format('M d Y')}}</td>
                                    <td>
                                        @if($poll->redressal_status == 0)
                                            <label class="badge badge-primary">Initiated</label>
                                        @elseif($poll->redressal_status == 1)
                                            <label class="badge badge-primary">Currently : Editor</label>
                                        @elseif($poll->redressal_status == 2)
                                            <label class="badge badge-primary">Currently : Proofreader</label>
                                        @elseif($poll->redressal_status == 3)
                                            <label class="badge badge-primary">Currently : Translator</label>
                                         @elseif($poll->redressal_status == 4)
                                            <label class="badge badge-primary">Rejected</label>
                                        @endif

                                        <br>
                                        @if($poll->proofread_by)
                                                <label class="badge badge-success">Proofreading Done</label>
                                        @endif

                                        @if($poll->translated_by)
                                                <label class="badge badge-warning">Translation Done</label>
                                        @endif

                                    </td>

                                     <td>
                                        @if($poll->published == 0)
                                                <span class="btn btn-sm btn-danger btn-sm">UnPublished</span>
                                        @elseif($poll->published == 1)
                                                <span class="btn btn-sm btn-success btn-sm">Published</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('polls.reactions.list', $poll->id)}}" class="btn btn-primary btn-sm">Open  <i class="fa fa-link"></i></a>
                                    </td>
                                    <td>
                                        @can('polls-edit')
                                            @if(!$poll->proofread_by && !$poll->translated_by)
                                                <a href="{{route('polls.edit', $poll->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                                            @endif
                                        @endcan
                                        <a href="{{route('polls.show', $poll->id)}}" class="btn btn-sm btn-warning"><i class="fa fa-eye"></i></a>
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
