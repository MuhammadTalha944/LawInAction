@extends('layouts.dashboard.main')
@section('title', $data['type'])
@section('content')
{{-- @php dd($data['type']); @endphp --}}
 <div class="card yellow_border shadow h-100 py-2">
    <div class="card-body">
        <div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h4>{{$data['type']}}  Management</h4>
        </div>
        <div class="pull-right" style="text-align: right;">
        {{-- @can('role-create') --}}
            <a class="btn btn-success btn-sm" href="{{ route('campaign.necessary.add', $data['type']) }}">
                    <i class="fas fa-plus"></i> Add {{$data['type']}}
            </a>
            {{-- @endcan --}}
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
<div class="row" style="margin-top: 1%;">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <tr>
             <th>#</th>
             <th>Name</th>
             <th width="280px">Action</th>
          </tr>
          @if($data['list'])
                @foreach($data['list'] as $list)
                    <tr>
                            <td>{{++$loop->index}}</td>
                            <td>{{$list->name}}</td>
                            <td>
                                <a href="{{route('campaign.necessary.edit',[$list->id,$data['type']])}}" class="btn btn-sm btn-warning">Edit</a>
                                <a href="" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                    </tr>
                @endforeach
            @endif
        </table>
    </div>
</div> 
    </div>
</div>
@endsection