{{-- 
@extends('layouts.dashboard.main')
@section('title','Edit News')
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


        {!! Form::open(array('route' => ['news.update', $news->id],'method'=>'PATCH', 'enctype' => 'multipart/form-data')) !!}
        @csrf
        <div class="row">
            <h3>Edit News</h3>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>News Content:</label>
                    <textarea class="form-control "  name="news_content">{{$news->news_content}}</textarea>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>Main Heading:</label>
                    <textarea class="form-control "  name="main_heading">{{$news->main_heading}}</textarea>
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>Sub Heading:</label>
                    <textarea class="form-control "  name="sub_heading">{{$news->sub_heading}}</textarea>
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>Main Highlight:</label>
                    <textarea class="form-control "  name="main_highlight">{{$news->main_highlight}}</textarea>
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>Secondary Highlight:</label>
                    <textarea class="form-control "  name="secondary_highlight">{{$news->secondary_highlight}}</textarea>
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
                        @foreach($news->news_files as $item)
                                @if($item->photo)
                                    <tr>
                                      <th scope="row">{{ ++$loop->index }}</th>
                                      <td><input type="file" name="photo[]" class="form-control" required 
                                            value="{{$item->photo}}"></td>
                                      <td><input type="text" name="photo_caption[]" class="form-control" required 
                                            value="{{$item->photo_caption}}"></td>
                                      <td><button class="btn btn-sm btn-primary add_photo" type="button">Add More</button></td>
                                    </tr>
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
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody class="video_wrapper">
                        @php $v = 0 @endphp
                        @foreach($news->news_files as $item)
                                @if($item->video)
                                    <tr>
                                      <th scope="row">{{  ++$v }}</th>
                                      <td><input type="file" name="video[]" class="form-control" required
                                            value="{{$item->video}}"></td>
                                      <td><input type="text" name="video_caption[]" class="form-control" required
                                            value="{{$item->video_caption}}"></td>
                                      <td><button class="btn btn-sm btn-primary add_video" type="button">Add More</button></td>
                                    </tr>
                               @endif
                        @endforeach
                      
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
                        @php $d = 0 @endphp
                        @foreach($news->news_files as $item)
                                @if($item->document)
                                    <tr>
                                      <th scope="row">{{++$d}}</th>
                                      <td><input type="file" name="document[]" class="form-control" required value="{{$item->document}}"></td>
                                      <td><input type="text" name="document_caption[]" class="form-control" required value="{{$item->document_caption}}"></td>
                                      <td><button class="btn btn-sm btn-primary add_document" type="button">Add More</button></td>
                                    </tr>
                                @endif
                        @endforeach
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
                        @php $l = 0 @endphp
                        @foreach($news->news_files as $item)
                                @if($item->link)
                                <tr>
                                  <th scope="row">{{++$l}}</th>
                                  <td><input type="text" name="link[]" class="form-control" required value="{{$item->link}}"></td>
                                  <td><input type="text" name="link_caption[]" class="form-control" required value="{{$item->link_caption}}"></td>
                                  <td><button class="btn btn-sm btn-primary add_link" type="button">Add More</button></td>
                                </tr>
                            @endif
                        @endforeach
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
@endsection --}}



@extends('layouts.dashboard.main')
@section('title','Update News')
@section('content')
<style type="text/css">
    label{
        font-weight: 700;
        color: black;
    }
    p{
        border: 1px solid lightgray;
        padding: 1%;
    }
</style>
 <div class="card yellow_border shadow h-100 py-2">
    <div class="card-body">

        {{-- {!! Form::open(array('route' => 'news.store','method'=>'POST', 'enctype' => 'multipart/form-data')) !!} --}}

        <div class="row">
            <h3>Detailed News</h3>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>News Content:</label>
                     <p>{{$news->news_content}}</p>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>Main Heading:</label>
                    <p>{{$news->main_heading}}</p>
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>Sub Heading:</label>
                    <p>{{$news->sub_heading}}</p>
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>Main Highlight:</label>
                    <p>{{$news->main_highlight}}</p>
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>Secondary Highlight:</label>
                    <p>{{$news->secondary_highlight}}</p>
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
                        </tr>
                      </thead>
                      <tbody class="photo_wrapper">
                        @php $count = 1; @endphp
                        @foreach($news->news_files as $item)
                                @if($item->photo)
                                    <tr>
                                      <th scope="row">{{ $count++ }}</th>
                                        <td>
                                            <a href="{{asset('storage/news/photo/'.$item->photo)}}" target="_blank">
                                                <img src="{{asset('storage/news/photo/'.$item->photo)}}" style="width: 70px;height: 70px;">
                                            </a>
                                        </td>
                                      <td>
                                          {{$item->photo_caption}}
                                      </td>
                                    </tr>
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
                        </tr>
                      </thead>
                      <tbody class="photo_wrapper">
                        @php $count = 1; @endphp
                        @foreach($news->news_files as $item)
                                @if($item->video)
                                    <tr>
                                      <th scope="row">{{ $count++ }}</th>
                                        <td>
                                            <a href="{{asset('storage/news/video/'.$item->video)}}" target="_blank">
                                                <img src="{{asset('storage/news/video/'.$item->video)}}" style="width: 70px;height: 70px;">
                                            </a>
                                        </td>
                                      <td>
                                          {{$item->video_caption}}
                                      </td>
                                    </tr>
                                @endif
                        @endforeach
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
                        </tr>
                      </thead>
                      <tbody class="photo_wrapper">
                        @php $count = 1; @endphp
                        @foreach($news->news_files as $item)
                                @if($item->document)
                                    <tr>
                                      <th scope="row">{{ $count++ }}</th>
                                        <td>
                                            <a href="{{asset('storage/news/document/'.$item->document)}}" target="_blank">
                                                <img src="{{asset('storage/news/document/'.$item->document)}}" style="width: 70px;height: 70px;">
                                            </a>
                                        </td>
                                      <td>
                                          {{$item->document_caption}}
                                      </td>
                                    </tr>
                                @endif
                        @endforeach
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
                        </tr>
                      </thead>
                      <tbody class="photo_wrapper">
                        @php $count = 1; @endphp
                        @foreach($news->news_files as $item)
                                @if($item->link)
                                    <tr>
                                      <th scope="row">{{ $count++ }}</th>
                                        <td>
                                            {{$item->link}}
                                        </td>
                                      <td>
                                          {{$item->link_caption}}
                                      </td>
                                    </tr>
                                @endif
                        @endforeach
                      </tbody>
                    </table>
            </div>
        {!! Form::open(array('route' => ['news.update', $news->id],'method'=>'PATCH', 'enctype' => 'multipart/form-data')) !!}
        @csrf
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>News Categories:</label>
                    <select class="form-control" name="categories" >
                        <option class="">Select Category</option>
                            <option @if($news->categories == 'Business') selected @endif 
                                                        value="Business">Business</option>
                            <option @if($news->categories == 'Cars') selected @endif 
                                                        value="Cars">Cars</option>
                            <option @if($news->categories == 'Entertainment') selected @endif 
                                                        value="Entertainment">Entertainment</option>
                            <option @if($news->categories == 'Family') selected @endif 
                                                        value="Family">Family</option>
                            <option @if($news->categories == 'Health') selected @endif 
                                                        value="Health">Health</option>
                            <option @if($news->categories == 'Politics') selected @endif 
                                                        value="Politics">Politics</option>
                            <option @if($news->categories == 'Religion') selected @endif 
                                                        value="Religion">Religion</option>
                            <option @if($news->categories == 'Science') selected @endif 
                                                        value="Science">Science</option>
                            <option @if($news->categories == 'Sports') selected @endif 
                                                        value="Sports">Sports</option>
                            <option @if($news->categories == 'Technology') selected @endif 
                                                        value="Technology">Technology</option>
                            <option @if($news->categories == 'Travel') selected @endif 
                                                        value="Travel">Travel</option>
                            <option @if($news->categories == 'Video') selected @endif 
                                                        value="Video">Video</option>
                            <option @if($news->categories == 'World') selected @endif 
                                                        value="World">World</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>Tags:</label>
                    <input type="text" data-role="tagsinput" name="news_tags" class="form-control"
                        value="{{$news->tags}}" 
                        >
                    {{-- <input type="hidden" name="tags_input"> --}}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>News Keywords:</label>
                    <input type="text" data-role="tagsinput" name="keywords_tags" class="form-control"
                        value="{{$news->keywords}}" 
                        >
                    {{-- <input type="hidden" name="keywords_input"> --}}
                </div>
            </div>
            

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>News Page Links: <small></small></label>
                    <input type="text" name="page_links" class="form-control"
                        value="{{$news->news_page_link}}" 
                        >
                </div>
            </div>
            <div class="col-md-12" style="text-align: right;">
                    <input type="hidden" name="news_id" class="form-control" value="{{ $news->id }}">
                <button type="submit" class="publish_news btn btn-sm btn-success">Submit</button>
            </div>        

        {!! Form::close() !!}
    </div>
</div>

@endsection

@section('javascript')
<script type="text/javascript">

            // $('.publish_news').on('click', function(){
            //     var news_tags = $("input[name=news_tags]").tagsinput('items');
            //     var keywords_tags = $("input[name=keywords_tags]").tagsinput('items');
            //     $('input[name=tags_input]').val(news_tags);
            //     $('input[name=keywords_input]').val(keywords_tags);
            // })

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