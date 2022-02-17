@extends('layouts.website.app')
@section('title', 'Blogs Detail')
@section('content')

    <script src="https://kit.fontawesome.com/496e52d5cd.js" crossorigin="anonymous"></script>

   <link rel="stylesheet" href="{{asset('website/asset/css/blog_detail.css')}}">
   <style type="text/css">
       body{
            /*background:#eee;*/
        }

        hr {
            margin-top: 20px;
            margin-bottom: 20px;
            border: 0;
            border-top: 1px solid #FFFFFF;
        }
        a {
            color: #82b440;
            text-decoration: none;
        }
        .blog-comment::before,
        .blog-comment::after,
        .blog-comment-form::before,
        .blog-comment-form::after{
            content: "";
            display: table;
            clear: both;
        }

        .blog-comment{
            /*padding-left: 15%;*/
            /*padding-right: 15%;*/
        }

        .blog-comment ul{
            list-style-type: none;
            padding: 0;
        }

        .blog-comment img{
            opacity: 1;
            filter: Alpha(opacity=100);
            -webkit-border-radius: 4px;
               -moz-border-radius: 4px;
                 -o-border-radius: 4px;
                    border-radius: 4px;
        }

        .blog-comment img.avatar {
            position: relative;
            float: left;
            margin-left: 0;
            margin-top: 0;
            width: 65px;
            height: 65px;
        }

        .blog-comment .post-comments{
            border: 1px solid #eee;
            margin-bottom: 10px;
            /*margin-left: 85px;*/
            margin-right: 0px;
            padding: 10px 20px;
            /*position: relative;*/
            -webkit-border-radius: 4px;
               -moz-border-radius: 4px;
                 -o-border-radius: 4px;
                    border-radius: 4px;
            background: #fff;
            color: #6b6e80;
            position: relative;
        }

        .blog-comment .meta {
            font-size: 13px;
            color: #aaaaaa;
            padding-bottom: 8px;
            margin-bottom: 10px !important;
            border-bottom: 1px solid #eee;
        }

        .blog-comment ul.comments ul{
            list-style-type: none;
            padding: 0;
            margin-left: 85px;
        }

        .blog-comment-form{
            /*padding-left: 15%;*/
            /*padding-right: 15%;*/
            /*padding-top: 40px;*/
        }

        .blog-comment h3,
        .blog-comment-form h3{
            /*margin-bottom: 40px;*/
            font-size: 26px;
            /*line-height: 30px;*/
            font-weight: 800;
        }
   </style>

<div class="jumbotron text-center" style="padding: 2% !important;">
    <div class="col-12 text-center pt-3">
        <h1 style="color: #ffcb07;font-weight: 800">Blogs / Articles Detail</h1>
    </div>
</div>
<div id="main-content" class="file_manager">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="container">
                    <div class="blog-single gray-bg">
                            <div class="container">
                                <div class="row align-items-start">
                                    <div class="col-lg-8 m-15px-tb">
                                        <article class="article">
                                            <div class="article-img">
                                                @foreach($blog->blog_files as $img)
                                                    @if($loop->index == 0)
                                                        @if($img->photo)
                                                        <img class="rounded-top" src="{{asset('storage/blogs/photo/'.$img->photo)}}" alt="img" style="    width: 770px;height: 350px;" >
                                                        @endif
                                                    @endif
                                                @endforeach
                                                <!-- <img src="https://via.placeholder.com/800x350/87CEFA/000000" title="" alt=""> -->

                                            </div>
                                            <div class="article-title">
                                                <!-- <h6><a href="#">Lifestyle</a></h6> -->
                                                <h2>{{$blog->main_heading}}</h2>
                                                <div class="media">
                                                    <div class="avatar">
                                                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" title="" alt="">
                                                    </div>
                                                    <div class="media-body" style="text-align: left;">
                                                        <label>{{$blog->user->name}}</label>
                                                        <span>{{$blog->created_at->format('d M Y')}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="article-content">
                                                <p>{{$blog->blog_content}}</p>
                                            </div>
                                        </article>

                                        

                                        <div class="blog-comment">
                                                <h3 class="text-success" style="text-align: left;">Comments</h3>
                                                <hr/>
                                                <ul class="comments" id="comments_box">
                                                    <!-- <li class="clearfix">
                                                      <div class="post-comments" style="text-align: left;">
                                                          <p class="meta">Dec 18, 2014 
                                                            <a href="#">JohnDoe</a> says</p>
                                                          <p>
                                                              Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                              Etiam a sapien odio, sit amet
                                                          </p>
                                                      </div>
                                                    </li> -->

<!--                                                     <li class="clearfix">
                                                      <div class="post-comments" style="text-align: left;">
                                                          <p class="meta">Dec 18, 2014 
                                                            <a href="#">JohnDoe</a> says</p>
                                                          <p>
                                                              Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                              Etiam a sapien odio, sit amet
                                                          </p>
                                                      </div>
                                                    </li> -->
                                                    
                                            </ul>
                                        </div>
                                        <div id="comment_Added" style="display: none; background-color: lightgreen; padding: 1%;">
                                            <span><b>Your comment is added!</b></span>
                                        </div>
                                        <div class="contact-form article-comment">
                                            <h4>Leave a Reply</h4>
                                            <!-- <form id="contact-form" method="POST"> -->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input name="name" id="name" placeholder="name *" class="form-control" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input name="email" id="email" placeholder="Email *" class="form-control" type="email">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <textarea name="comment" id="comment" placeholder="Your message *" rows="4" class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="send">
                                                            <input type="hidden" name="campaign_id"  id="blog_id" value="{{$blog->id}}">
                                                            <button class="px-btn theme btn" id="btn-save"><span>Submit</span> <i class="arrow"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            <!-- </form> -->
                                        </div>
                                    </div>
                                    <div class="col-lg-4 m-15px-tb blog-aside">
                                        <!-- Author -->
                                        <div class="widget widget-author">
                                            <div class="widget-title">
                                                <h3>Author</h3>
                                            </div>
                                            <div class="widget-body">
                                                <div class="media align-items-center">
                                                    <div class="avatar">
                                                        <img src="https://bootdey.com/img/Content/avatar/avatar6.png" title="" alt="">
                                                    </div>
                                                    <div class="media-body">
                                                        <h6>Hello, I'm<br> {{$blog->user->name}}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Author -->
                                        <!-- Trending Post -->
                                        <div class="widget widget-post">
                                            <div class="widget-title">
                                                <h3>Share Now</h3>
                                            </div>
                                            <div class="widget-body">
                                                <div class="row" style="margin-top: 5%;">
                                                    <!-- {!! Share::page(url('/post/'. '1234'))->facebook()->twitter()->whatsapp() !!} -->

                                                    <div class="col-md-4" style="text-align: center;color: #4c6ef5;">
                                                        <!-- <i class="fa fa-facebook-square" style="color: #4c6ef5;"></i> -->
                                                        {!! Share::page(url('/blogs-detail/'. $blog->id))->facebook() !!}
                                                        Facebook
                                                    </div>
                                                    <div class="col-md-4" style="text-align: center;color: #15aabf;">
                                                        <!-- <i class="fa fa-twitter-square"
                                                            style="color: #15aabf;"
                                                        ></i> -->
                                                        {!! Share::page(url('/blogs-detail/'. $blog->id))->twitter() !!}
                                                        Twitter
                                                    </div>
                                                    <div class="col-md-4" style="text-align: center;color: rgb(36, 204, 99);">
                                                        <!-- <i class="fa fa-whatsapp-square"
                                                            style="color: rgb(36, 204, 99);"
                                                        ></i> -->
                                                        {!! Share::page(url('/blogs-detail/'. $blog->id))->whatsapp() !!}
                                                        WhatsApp
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Trending Post -->
                                        <!-- Latest Post -->
                                        <div class="widget widget-latest-post">
                                            <div class="widget-title">
                                                <h3>Latest Post</h3>
                                            </div>
                                            <div class="widget-body">
                                                @foreach($blogs as $item)
                                                    <div class="latest-post-aside media">
                                                        <div class="lpa-left media-body">
                                                            <div class="lpa-title">
                                                                <h5><a href="{{route('blog.detail.page', $item->id)}}" style="text-align: left;">
                                                                    {{$item->main_heading}}</a></h5>
                                                            </div>
                                                            <div class="lpa-meta">
                                                                <a class="name" href="#">
                                                                    {{$item->user->name}}
                                                                </a>
                                                                <a class="date" href="#">
                                                                    {{$item->created_at->format('d M Y')}}
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="lpa-right">    
                                                            @foreach($item->blog_files as $img)
                                                                @if($loop->index == 0)
                                                                    @if($img->photo)
                                                                        <img class="rounded-top" src="{{asset('storage/blogs/photo/'.$img->photo)}}" alt="img" 
                                                                        style="width: 55px; height: 55px;" 
                                                                         >
                                                                        @endif
                                                                @endif
                                                            @endforeach
                                                            

                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <!-- End Latest Post -->
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div>
</div>



@endsection

@section('javascript')
<script type="text/javascript">
              //Comments functionality
            $("#btn-save").click(function (e) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    }
                });
                e.preventDefault();
                if($('#name').val().length > 0 &&
                 $('#email').val().length > 0  &&
                $('#comment').val().length > 0 ){
                            var formData = {
                                name: $('#name').val(),
                                email: $('#email').val(),
                                comment: $('#comment').val(),
                                parent_id: $('#blog_id').val(),
                                type: 'blog',
                            };
                            var type = "POST";
                            var ajaxurl = "{{route('add.comment')}}";

                            $.ajax({
                                type: type,
                                url: ajaxurl,
                                data: formData,
                                dataType: 'json',
                                success: function (data) {

                                  $('#name').val('');
                                  $('#email').val('');
                                  $('#comment').val('');

                                  var result = [];
                                  var comments = data;
                                  for (var i = 0; i < comments.length; i++) {

                                    // result[i] = `<li class="row clearfix">
                                    //                     <div class="text-box col-md-12 col-12 p-l-0 p-r0">
                                    //                         <h5 class="m-b-0">`+comments[i]['name']+`</h5>
                                    //                         <p>`+comments[i]['comment']+`</p>
                                    //                         <ul class="list-inline">
                                    //                             <li><a href="javascript:void(0);">`+comments[i]['created_at']+`</a></li>
                                    //                         </ul>
                                    //                     </div>
                                    //                 </li>`;
                                    result[i] = `<li class="clearfix">
                                                      <div class="post-comments" style="text-align: left;">
                                                          <p class="meta">`+comments[i]['created_at']+` 
                                                            <a href="#">`+comments[i]['name']+`</a> says</p>
                                                          <p>
                                                              `+comments[i]['comment']+`
                                                          </p>
                                                      </div>
                                                    </li>`;

                                  }

                                  $('#comments_box').empty();
                                  $('#comments_box').append(result);
                                   $('#comment_Added').fadeIn('slow', function(){
                                       $('#comment_Added').delay(3000).fadeOut();
                                    });

                                },
                                error: function (data) {
                                    console.log('Error:', data);
                                }
                            });
                }else{
                    alert('Please fill all the fields');
                }
            });
</script>
@endsection