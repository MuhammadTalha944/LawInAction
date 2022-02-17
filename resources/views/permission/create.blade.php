@extends('layouts.dashboard.main')

@section('content')

 <div class="card yellow_border shadow h-100 py-2">
    <div class="card-body">


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


        {!! Form::open(array('route' => 'permissions.store','method'=>'POST')) !!}

        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Permission Name:</strong>

                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}

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