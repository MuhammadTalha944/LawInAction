@extends('layouts.dashboard.main')
@section('title','Campaign Story Updates')
@section('content')
<style type="text/css">
    h3{
        text-align: center;
        font-weight: 700;
        text-decoration: underline;
    }
</style>
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

        {!! Form::open(array('route' => ['campaign.story.update.store',$id],'method'=>'POST', 'enctype' => 'multipart/form-data')) !!}
        @csrf
                    <h2>Campaign Updates</h2>
                <hr>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label>Story Heading</label>
                        <input type="text" name="story_heading" class="form-control">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label>Story Sub-Heading</label>
                        <input type="text" name="story_sub_heading" class="form-control">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label>Story</label>
                        <textarea class="form-control" name="story" rows="5"></textarea>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-right" style="margin-top: 2%;">
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection

@section('javascript')

@endsection
