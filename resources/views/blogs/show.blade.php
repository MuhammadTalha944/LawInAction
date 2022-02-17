@extends('layouts.dashboard.main')
@section('title','Show Blog')
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

        <div class="row">
            <h3>Edit Blog</h3>



            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <u><label>Main Heading:</label></u>
                    <h3>{{$blog->main_heading}}</h3>
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <u><label>Sub Heading:</label></u>
                    <h4>{{$blog->sub_heading}}</h4>
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <u><label>Blog Content:</label></u>
                    <p>
                        {{$blog->blog_content}}
                    </p>
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
                          <!-- <th scope="col"><button class="btn btn-sm btn-primary add_photo" type="button">Add More</button></th> -->
                        </tr>
                      </thead>
                      <tbody class="photo_wrapper">
                        @php $p = 1 @endphp
                        @foreach($blog->blog_files as $item)
                                @if($item->photo)
                                    <tr class="photo_counter" id="photo_{{$p}}">
                                      <th scope="row">{{ $p }}</th>
                                      <td style="text-align: center;">
                                        <!-- <input type="file" name="photo[]" class="form-control" required > -->
                                            <a href="{{asset('storage/blogs/photo/'.$item->photo)}}" target="_blank">
                                                <img src="{{asset('storage/blogs/photo/'.$item->photo)}}" 
                                                style="margin-top: 2%;width: 200px;height: 200px;">
                                            </a>
                                        </td>
                                      <td>
                                        {{$item->photo_caption}}
                                        <!-- <input type="text" name="photo_caption[]" class="form-control" required  value="{{$item->photo_caption}}"> -->
                                        </td>
                                      <td>
                                        <!-- <a href="javascript:void(0);" class="remove_photo btn btn-sm btn-danger" id="{{$p}}">Remove</a> -->
                                        <!-- <button class="btn btn-sm btn-danger add_photo" id="{{$p}}" type="button">Remove</button> -->
                                      </td>
                                    </tr>
                                    @php ++$p; @endphp 
                                @endif
                        @endforeach
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
                          <!-- <th scope="col"><button class="btn btn-sm btn-primary add_video" type="button">Add More</button></th> -->
                        </tr>
                      </thead>
                      <tbody class="video_wrapper">
                        @php $v = 0 @endphp
                        @foreach($blog->blog_files as $item)
                                @if($item->video)
                                    <tr>
                                      <th scope="row">{{  ++$v }}</th>
                                      <td>
                                         <a href="{{asset('storage/blogs/video/'.$item->video)}}" target="_blank">
                                                <img src="{{asset('storage/blogs/video/'.$item->video)}}" 
                                                style="margin-top: 2%;width: 200px;height: 200px;">
                                            </a>
<!--                                         <input type="file" name="video[]" class="form-control" required
                                            value="{{$item->video}}"> -->
                                        </td>
                                      <td>
                                        {{$item->video_caption}}
<!--                                         <input type="text" name="video_caption[]" class="form-control" required
                                            value="{{$item->video_caption}}"> -->
                                        </td>
                                      <!-- <td><button class="btn btn-sm btn-primary add_video" type="button">Add More</button></td> -->
                                    </tr>
                               @endif
                        @endforeach

                      </tbody>
                    </table>
            </div>
            <hr>
            <div class="col-xs-12 col-sm-12 col-md-12 text-right">

                <button type="submit" class="btn btn-warning">Update</button>

            </div>
    </div>
</div>

@endsection

@section('javascript')
<script type="text/javascript">
            
            var addPhoto = $('.add_photo');
            var photos = $('.photo_wrapper');
            var photo_x = $('.photo_counter').length + 1;
            // var photo_x = $('input[name=photo_caption]').length;
            // alert($('.photo_counter').length);


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
                if(confirm('Are you sure ?')){
                    e.preventDefault();
                    $('#photo_'+$(this).attr('id')).remove();
                    photo_x--;
                }else{
                    return false;
                }

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