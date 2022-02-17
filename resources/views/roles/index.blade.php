@extends('layouts.dashboard.main')

@section('content')

 {{-- <div class="card border-left-primary shadow h-100 py-2"> --}}

 <div class="card yellow_border shadow h-100 py-2">
    <div class="card-body">
        <div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h4>Role Management</h4>

        </div>

        <!-- <div class="pull-right" style="text-align: right;">

        @can('role-create')

            <a class="btn btn-success btn-sm" href="{{ route('roles.create') }}"><i class="fas fa-plus"></i> Add Role</a>

            @endcan

        </div> -->

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

          <thead>
            <tr>
               <th>No</th>
               <th>Name</th>
               <th width="280px">Action</th>
            </tr>
          </thead>
          <tbody>
            @php $i = 0; @endphp
            @foreach ($roles as $key => $role)

            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $role->name }}</td>
                <td>
                    <a class="btn btn-info btn-sm" href="{{ route('roles.show',$role->id) }}"><i class="fas fa-eye"></i></a>
                    @can('role-edit')
                        <a class="btn btn-warning btn-sm" style="color: black;" href="{{ route('roles.edit',$role->id) }}"><i class="fas fa-pen"></i></a>
                    @endcan
{{--                     @can('role-delete')
                        {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn-sm btn btn-danger']) !!}
                        {!! Form::close() !!}
                    @endcan --}}
                </td>
            </tr>
            @endforeach
          </tbody>
        </table>
    </div>
</div>

    </div>
</div>

@endsection
