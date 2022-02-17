@extends('layouts.dashboard.main')
@section('title','Create Poll')
@section('content')

 <div class="card yellow_border shadow h-100 py-2">
    <div class="card-body">


        @if (count($errors) > 0)

            <div class="alert alert-danger">

                <ul>

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

                </ul>

            </div>

        @endif


        {!! Form::open(array('route' => 'polls.store','method'=>'POST', 'enctype' => 'multipart/form-data')) !!}
        @csrf
        <div class="row">
            <h3>Add Poll</h3>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>Poll Question:</label>
                    <input type="text" name="question" required class="form-control">
                </div>
            </div>

            
            <div class="col-xs-12 col-sm-12 col-md-12 text-right">

                <button type="submit" class="btn btn-success">Submit</button>

            </div>


        {!! Form::close() !!}
    </div>
</div>

@endsection

@section('javascript')
<script type="text/javascript">
    
</script>
@endsection