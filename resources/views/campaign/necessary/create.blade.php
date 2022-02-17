@extends('layouts.dashboard.main')
@section('title', $type)
@section('content')

 <div class="card yellow_border shadow h-100 py-2">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h4>Create New {{$type}}</h4>
                </div>
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

        {!! Form::open(array('route' => ['campaign.necessary.store', $type],'method'=>'POST')) !!}

        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Name:</strong>

                    {{-- {!! Form::text('name', null, array('placeholder' => 'Enter your {{$type}} name','class' => 'form-control')) !!} --}}
                    <input type="text" name="name" class="form-control" placeholder="Enter your {{$type}} name">

                </div>

            </div>
            <input type="hidden" name="type" value="{{$type}}">
            <div class="col-xs-12 col-sm-12 col-md-12 text-right">

                <button type="submit" class="btn btn-success">Submit</button>

            </div>

        </div>

        {!! Form::close() !!}
    </div>
</div>

@endsection