
@extends('layouts.dashboard.main')
@section('title','Detailed News')
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
        {{-- {!! Form::open(array('route' => ['news.update', $news->id],'method'=>'PATCH', 'enctype' => 'multipart/form-data')) !!} --}}
        @csrf
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

            <h4>Editor</h4>
            <div class="row">
                @if($news->categories)
                        <table class="table">
                          <thead>
                            <tr>
                              <th scope="col">Category</th>
                              <th scope="col">News Tags</th>
                              <th scope="col">Keywords</th>
                              <th scope="col">Link</th>
                            </tr>
                          </thead>
                          <tbody class="">
                            <tr>
                                    <td>{{$news->categories}}</td>
                                    <td>
                                        @php   $tags = explode(',', $news->tags)  @endphp
                                            @if($tags)
                                                    @foreach($tags as $tag)
                                                        <span class="btn btn-sm btn-success">{{$tag}}</span>
                                                    @endforeach
                                            @endif
                                    </td>
                                    <td>
                                        @php   $keywords = explode(',', $news->keywords)  @endphp
                                            @if($keywords)
                                                    @foreach($keywords as $keyword)
                                                        <span class="btn btn-sm btn-primary">{{$keyword}}</span>
                                                    @endforeach
                                            @endif
                                    </td>
                                    <td>{{$news->news_page_link}}</td>
                            </tr>
                          </tbody>
                        </table>
                @else
                    <div style="text-align: center;">
                        <h3>Editor hasn't added News Category</h3>
                    </div>
                @endif
            </div>

            @role('Proofreader')            
                @if($news->proofread_by)
                    <hr>
                    <h3>Remarks have been sended to Editor:</h3>
                    <p>{{$news->proofreader_remarks}}</p>
                @else
                                <hr>
                                <h3>Proof Reader Comments</h3>
                                        <form method="POST" action="{{route('send.back.to.editor')}}">
                                            @csrf
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    {{-- <label>Remarks:</label> --}}
                                                    <textarea class="form-control" rows="3" name="proofreader_remarks" required></textarea>
                                                    <input type="hidden" name="news_id" value="{{ $news->id }}">
                                                    <input type="hidden" name="mode" value="proofreader">
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                                                <button type="submit" class="btn btn-primary">Send Back to Editor</button>
                                                <a href="{{route('news.index')}}" class="btn btn-danger">Back</a>
                                            </div>
                                        </form>
                @endif
            @endif

            @role('News Translator')            
                @if($news->translated_by)
                    <hr>
                    <h3>Translator Remarks:</h3>
                    <p>{{$news->proofreader_remarks}}</p>
                @else
                                <hr>
                                <h3>Translator Comments</h3>
                                        <form method="POST" action="{{route('send.back.to.editor')}}">
                                            @csrf
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <textarea class="form-control summernote" rows="3" name="translator_remarks" required></textarea>
                                                    <input type="hidden" name="news_id" value="{{ $news->id }}">
                                                    <input type="hidden" name="mode" value="translator">
                                                </div>
                                            </div>
                                            {{--<div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label>Translated File</label>
                                                    <input type="file" name="translated_news" class="form-control">
                                                </div>
                                            </div> --}}
                                            <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                                                <button type="submit" class="btn btn-primary">Send Back to Editor</button>
                                                <a href="{{route('news.index')}}" class="btn btn-danger">Back</a>
                                            </div>
                                        </form>
                @endif
            @endif

            @role('News Editor')            
                    @if($news->proofread_by)
                        <hr>
                        <h3>Remarks by Proofreader</h3>
                        <p>{{$news->proofreader_remarks}}</p>
                    @endif

                    @if($news->translated_by)
                        <hr>
                        <h3>Remarks by Translator</h3>
                        <p>{{$news->translater_remarks}}</p>
                    @endif
                <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                    @if($news->status == 1)


                            @if(!$news->categories)                        
                                @if(!$news->proofread_by)
                                    <a  href="{{route('send.to.proofreader', $news->id)}}" title="Send for proof reading"  class="btn btn-primary">Proofreader</a>
                                 @endif   


                                @if(!$news->translated_by)
                                    <a href="{{route('send.to.translator', $news->id)}}" class="btn btn-warning">Translator</a>
                                @endif
                            @endif



                        @if($news->categories)
                                @if($news->published == 0)
                                        <a href="{{route('publish.news', $news->id)}}" class="btn btn-success">Publish</a>
                                @else
                                        <a href="{{route('unpublish.news', $news->id)}}" class="btn btn-danger" id="check_unpublish">Un-Publish</a>
                                @endif
                        @endif


                    @endif
                    <a href="{{route('news.index')}}" class="btn btn-warning">Back</a>
                </div>
            @endif


        {{-- {!! Form::close() !!} --}}
    </div>
</div>

@endsection

@section('javascript')
<script type="text/javascript">

        $('#check_unpublish').on('click', function(){
            if(confirm('Are you Sure you want to Un-Published this News ?')){
                return true;
            }else{
                return false;
            }
        });
            
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