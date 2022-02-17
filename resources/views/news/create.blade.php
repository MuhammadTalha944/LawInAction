@extends('layouts.dashboard.main')
@section('title','Create News')
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


        {!! Form::open(array('route' => 'news.store','method'=>'POST', 'enctype' => 'multipart/form-data')) !!}
        @csrf
        <div class="row">
            <h3>Add News</h3>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>News Content:</label>
                    <textarea class="form-control "  name="news_content"></textarea>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>Main Heading:</label>
                    <textarea class="form-control "  name="main_heading"></textarea>
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>Sub Heading:</label>
                    <textarea class="form-control "  name="sub_heading"></textarea>
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>Main Highlight:</label>
                    <textarea class="form-control "  name="main_highlight"></textarea>
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>Secondary Highlight:</label>
                    <textarea class="form-control "  name="secondary_highlight"></textarea>
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

             <h4>Document</h4>
            <div class="row">
                  <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Document</th>
                          <th scope="col">Caption</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody class="document_wrapper">
                        <tr>
                          <th scope="row">1</th>
                          <td><input type="file" name="document[]" class="form-control" required></td>
                          <td><input type="text" name="document_caption[]" class="form-control" required></td>
                          <td><button class="btn btn-sm btn-primary add_document" type="button">Add More</button></td>
                        </tr>
                      </tbody>
                    </table>
            </div>
            <hr>

            <h4>Link</h4>
            <div class="row">
                  <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Link</th>
                          <th scope="col">Caption</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody class="link_wrapper">
                        <tr>
                          <th scope="row">1</th>
                          <td><input type="text" name="link[]" class="form-control" required></td>
                          <td><input type="text" name="link_caption[]" class="form-control" required></td>
                          <td><button class="btn btn-sm btn-primary add_link" type="button">Add More</button></td>
                        </tr>
                      </tbody>
                    </table>
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
            
            var addPhoto = $('.add_photo');
            var photos = $('.photo_wrapper');
            var photo_x = 2;


            var addvideo = $('.add_video');
            var videos = $('.video_wrapper');
            var video_x = 2;

            var adddocument = $('.add_document');
            var documents = $('.document_wrapper');
            var document_x = 2;            

            var addlink = $('.add_link');
            var links = $('.link_wrapper');
            var link_x = 2;
            

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


            //Documents
            $(adddocument).click(function(){
                var maxField = 5;
                var fieldHTML = `<tr  id="document_`+document_x+`">
                          <th scope="row">`+ document_x+`</th>
                          <td><input type="file" name="document[]" class="form-control"  required></td>
                          <td><input type="text" name="document_caption[]" class="form-control"  required></td>
                          <td><a href="javascript:void(0);" class="remove_document btn btn-sm btn-danger" id=`+document_x+`>Remove</a></td>
                        </tr>`;
                
                if(document_x <= maxField){ 
                    document_x++;
                    $(documents).append(fieldHTML);
                }else{
                    alert('Maximum document fields are added');
                }
            });
            
            $(documents).on('click', '.remove_document', function(e){
                e.preventDefault();
                $('#document_'+$(this).attr('id')).remove();
                document_x--;
            });


            //Links
            $(addlink).click(function(){
                var maxField = 5;
                var fieldHTML = `<tr  id="link_`+link_x+`">
                          <th scope="row">`+ link_x+`</th>
                          <td><input type="text" name="link[]" class="form-control"  required></td>
                          <td><input type="text" name="link_caption[]" class="form-control"  required></td>
                          <td><a href="javascript:void(0);" class="remove_link btn btn-sm btn-danger" id=`+link_x+`>Remove</a></td>
                        </tr>`;
                
                if(link_x <= maxField){ 
                    link_x++;
                    $(links).append(fieldHTML);
                }else{
                    alert('Maximum link fields are added');
                }
            });
            
            $(links).on('click', '.remove_link', function(e){
                e.preventDefault();
                $('#link_'+$(this).attr('id')).remove();
                link_x--;
            });
            

</script>
@endsection