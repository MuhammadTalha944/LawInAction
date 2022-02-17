@extends('layouts.dashboard.main')

@section('content')
 <div class="card yellow_border shadow h-100 py-2">
    <div class="card-body">
        <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h4>Permissions</h4>
                    </div>
                </div>
        </div>
       {{--  <div class="pull-right" style="text-align: right;">
                <a class="btn btn-success btn-sm" href="{{ route('permissions.create') }}"><i class="fas fa-plus"></i> Add Permission</a>
        </div> --}}
        <div style="margin-top: 1%;">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                       <th>#</th>
                       <th>Permission Name</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php $i = 0; @endphp
                    @foreach ($permission as $key => $item)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $item->name }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
        </div>
    </div>
</div>
@endsection
