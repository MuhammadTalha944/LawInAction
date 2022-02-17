@extends('layouts.dashboard.main')

@section('content')

 <div class="card yellow_border shadow h-100 py-2">
    <div class="card-body">
            <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h4>Show Role</h4>
                </div>
                <div class="pull-right" style="text-align: right;">
                    <a class="btn btn-success" href="{{ route('roles.index') }}"><i class="fas fa-chevron-left"></i> Back</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    {{ $role->name }}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Permissions:</strong>
                    @if(!empty($rolePermissions))
                        @foreach($rolePermissions as $v)
                            <label class="label label-success"><a href="#" class="btn btn-xs btn-warning">{{ $v->name }}</a>,</label>
                        @endforeach
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>

@endsection