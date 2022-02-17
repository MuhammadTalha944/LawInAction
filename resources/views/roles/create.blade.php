@extends('layouts.dashboard.main')

@section('content')

 <div class="card yellow_border shadow h-100 py-2">
    <div class="card-body">
        <div class="row">

            <div class="col-lg-12 margin-tb">

                <div class="pull-left">

                    <h4>Create New Role</h4>

                </div>

               {{--  <div class="pull-right">

                    <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>

                </div> --}}

            </div>

        </div>


        @if (count($errors) > 0)

            <div class="alert alert-danger">

                <strong>Whoops!</strong> There were some problems with your input.<br><br>

                <ul>

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

                </ul>

            </div>

        @endif


        {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}

        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Name:</strong>

                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Permission:</strong>

                    <br/>

                    @foreach($permission as $value)

                        <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}

                        {{ $value->name }}</label>

                    <br/>

                    @endforeach

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-right">

                <button type="submit" class="btn btn-success">Submit</button>

            </div>

        </div>

        {!! Form::close() !!}
    </div>
</div>

@endsection