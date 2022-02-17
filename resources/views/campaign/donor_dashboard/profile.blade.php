@extends('layouts.dashboard.main')
@section('title', 'Donor Profile')
@section('content')

 <div class="card yellow_border shadow h-100 py-2">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h4>My Details</h4>
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
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

        {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Name:</strong>
                    {{-- {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!} --}}
                    <input type="text" name="name" class="form-control" value="{{$user->name}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Email:</strong>
                    {{-- {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control','readonly')) !!} --}}
                    <input   class="form-control" value="{{$user->email}}" readonly>

                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Password:</strong>
                    {{-- {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!} --}}
                    <input type="password" name="password" class="form-control" >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Confirm Password:</strong>
                    {{-- {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!} --}}
                    <input type="password" name="confirm-password" class="form-control" >

                </div>
            </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                <button type="submit" class="btn btn-success">Update Details</button>
            </div>
        {{-- </div> --}}
        {!! Form::close() !!}
    </div>
</div>

@endsection


{{-- @extends('layouts.dashboard.main')
@section('title', 'Donor Profile')
@section('content')
 <div class="card yellow_border shadow h-100 py-2">
    <div class="card-body">
            <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h4>Donor Profile</h4>
                </div>
            </div>
        </div>
        <div class="row">
        {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}




              <div class="col-md-6">
                  <div class="form-group">
                    <strong>Name:</strong>
                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                </div>
              </div>
              <div class=" col-md-6">
                  <div class="form-group">
                    <strong>Email:</strong>
                    {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control','readonly')) !!}
                </div>
              </div>
              <div class=" col-md-6">
                   <div class="form-group">
                    <strong>Password:</strong>
                    {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                </div>
              </div>
              <div class=" col-md-6">
                   <div class="form-group">
                    <strong>Confirm Password:</strong>
                    {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                </div>
              </div>

        {!! Form::close() !!}

        </div>

        </div>
    </div>
    @endsection --}}