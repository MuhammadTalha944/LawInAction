@extends('layouts.dashboard.main')
@section('title', 'Polls Reaction Lits')
@section('content')

<style type="text/css">
    /*.col-md-6{*/
        /*text-align: right;*/
    /*}*/
</style>

 <div class="card yellow_border shadow h-100 py-2">
    <div class="card-body">
        <div class="row">

            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h4>Polls Reactions</h4>
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

        <div class="" style="margin-top: 1%;">
          @if($reactions)
          <h3>
            Question : <b>{{$reactions[0]->polls->question}} ?</b>
          </h3>
          @endif

            <div class="table-responsive">
                <table class="table table-bordered" id="datatable" width="100%" cellspacing="0" style="font-size: 80%;">
                    <thead style="text-align: center;">
                          <tr>
                             <th>#</th>
                                 <th>Options</th>
                                 <th>Option Text</th>
                                 <th>IP Address</th>
                                 <th>Votted On</th>
                          </tr>
                    </thead>
                    <tbody style="text-align: center;">
                        @if($reactions)
                            @foreach($reactions as $react)
                                <tr>
                                    <td>{{++$loop->index}}</td>
                                    <td>
                                        @if($react->option == 0)
                                        <button class=" btn btn-sm btn-success">Yes</button>
                                        @elseif($react->option == 1)
                                            <button class=" btn btn-sm btn-warning">No</button>
                                        @elseif($react->option == 2)
                                            <button class=" btn btn-sm btn-primary">Not Sure</button>
                                        @elseif($react->option == 3)
                                            <button class=" btn btn-sm btn-danger">Don't Know</button>
                                        @endif
                                    </td>
                                    <td>{{$react->option_text}}</td>
                                    <td>{{$react->ip}}</td>
                                    <td>{{$react->created_at->format('d M Y')}}</td>
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
