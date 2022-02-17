@extends('layouts.dashboard.main')
@section('title','Create Blog')
@section('content')

 <div class="card yellow_border shadow h-100 py-2">
    <div class="card-body">


        @if (count($errors) > 0)

            <div class="alert alert-danger">

                {{-- <strong>Whoops!</strong> There were some problems with your input.<br><br> --}}

                <ul>

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

                </ul>

            </div>

        @endif


        {!! Form::open(array('route' => 'blogs.store','method'=>'POST', 'enctype' => 'multipart/form-data')) !!}
        @csrf
        <div class="row">
            <h3>Add Blog</h3>



            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>Main Heading:</label>
                    <input type="text" class="form-control "  name="main_heading">
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>Sub Heading:</label>
                    <input type="text" class="form-control "  name="sub_heading">
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>Blog Content:</label>
                    <textarea class="form-control " rows="5"  name="blog_content"></textarea>
                </div>
            </div>
        </div>

            <hr>
            <h3>Attachment Section</h3>
            <hr>
            <h4>Photos</h4>
            <div class="row ">
                  <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Photo</th>
                          <th scope="col">Caption</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody class="photo_wrapper">
                        <tr>
                          <th scope="row">1</th>
                          <td><input type="file" name="photo[]" class="form-control" required></td>
                          <td><input type="text" name="photo_caption[]" class="form-control" required></td>
                          <td><button class="btn btn-sm btn-primary add_photo" type="button">Add More</button></td> 
                        </tr>
                      </tbody>
                    </table>
            </div>
            <hr>

            <h4>Video</h4>
            <div class="row">
                  <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Video</th>
                          <th scope="col">Caption</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody class="video_wrapper">
                        <tr>
                          <th scope="row">1</th>
                          <td><input type="file" name="video[]" class="form-control" required></td>
                          <td><input type="text" name="video_caption[]" class="form-control" required></td>
                          <td><button class="btn btn-sm btn-primary add_video" type="button">Add More</button></td>
                        </tr>
                      </tbody>
                    </table>
            </div>
            <hr>
            <div class="col-xs-12 col-sm-12 col-md-12 text-right">

                <button type="submit" class="btn btn-success">Submit</button>

            </div>


        {!! Form::close() !!}
    </div>
</div>

@endsection

@section('javascript')
<script type="text/javascript">
            
            var addPhoto = $('.add_photo');
            var photos = $('.photo_wrapper');
            var photo_x = 2;


            var addvideo = $('.add_video');
            var videos = $('.video_wrapper');
            var video_x = 2;
            

            //Photo
            $(addPhoto).click(function(){
                var maxField = 5;
                var fieldHTML = `<tr  id="photo_`+photo_x+`">
                          <th scope="row">`+ photo_x+`</th>
                          <td><input type="file" name="photo[]" class="form-control" required></td>
                          <td><input type="text" name="photo_caption[]" class="form-control" required></td>
                          <td><a href="javascript:void(0);" class="remove_photo btn btn-sm btn-danger" id=`+photo_x+`>Remove</a></td>
                        </tr>`;
                
                if(photo_x <= maxField){ 
                    photo_x++;
                    $(photos).append(fieldHTML);
                }else{
                    alert('Maximum Photo fields are added');
                }
            });
            
            $(photos).on('click', '.remove_photo', function(e){
                e.preventDefault();
                $('#photo_'+$(this).attr('id')).remove();
                photo_x--;
            });



            //Video Secion
            $(addvideo).click(function(){
                var maxField = 5;
                var fieldHTML = `<tr  id="video_`+video_x+`">
                          <th scope="row">`+ video_x+`</th>
                          <td><input type="file" name="video[]" class="form-control"  required></td>
                          <td><input type="text" name="video_caption[]" class="form-control"  required></td>
                          <td><a href="javascript:void(0);" class="remove_video btn btn-sm btn-danger" id=`+video_x+`>Remove</a></td>
                        </tr>`;
                
                if(video_x <= maxField){ 
                    video_x++;
                    $(videos).append(fieldHTML);
                }else{
                    alert('Maximum video fields are added');
                }
            });
            
            $(videos).on('click', '.remove_video', function(e){
                e.preventDefault();
                $('#video_'+$(this).attr('id')).remove();
                video_x--;
            });

            

</script>
@endsection