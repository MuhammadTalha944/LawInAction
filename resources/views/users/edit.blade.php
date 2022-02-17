@extends('layouts.dashboard.main')

@section('content')

<style type="text/css">
    .select2-container {
        width: 100% !important;
    }
</style>




 <div class="card yellow_border shadow h-100 py-2">
    <div class="card-body">

        <div class="row">

            <div class="col-lg-12 margin-tb">

                <div class="pull-left">

                    <h4>Edit User</h4>

                </div>

        {{--         <div class="pull-right">

                    <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>

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


        {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}

        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-6">

                <div class="form-group">

                    <strong>Name:</strong>

                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control', 'readonly')) !!}

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-6">

                <div class="form-group">

                    <strong>Email:</strong>

                    {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control','readonly')) !!}

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-6">

                <div class="form-group">

                    <strong>Password:</strong>

                    {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-6">

                <div class="form-group">

                    <strong>Confirm Password:</strong>

                    {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Role:</strong>

                    {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control select2','multiple')) !!}

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-right">

                <button type="submit" class="btn btn-success">Update</button>

            </div>

        </div>

        {!! Form::close() !!}
    </div>
</div>

@endsection


@section('javascript')
<script type="text/javascript">
    $('.select2').select2();
</script>
@endsection