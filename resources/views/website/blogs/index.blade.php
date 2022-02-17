@extends('layouts.website.app')
@section('title', 'Blogs / Article List')
@section('content')
<style type="text/css">
        .card-style2 {
            position: relative;
            display: flex;
            transition: all 300ms ease;
            border: 1px solid rgba(0, 0, 0, 0.09);
            padding: 0;
            height: 100%;
        }
        .card-style2 .card-img {
            position: relative;
            display: block;
            background: #ffffff;
            overflow: hidden;
            border-radius: 0.25rem;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }
        .card-style2 .card-img img {
            transition: all 0.3s linear 0s;
        }
        .card-style2:hover .card-img img {
            transform: scale(1.05);
        }
        .card-style2 .date {
            position: absolute;
            right: 30px;
            top: 30px;
            z-index: 1;
            color: #16bae1;
            overflow: hidden;
            padding-bottom: 10px;
            line-height: 24px;
            text-align: center;
            border: 2px solid #ededed;
            display: inline-block;
            background-color: #ffffff;
            text-transform: uppercase;
            border-radius: 0.25rem;
        }
        .card-style2 .date span {
            position: relative;
            color: #ffffff;
            font-weight: 500;
            font-size: 20px;
            display: block;
            text-align: center;
            padding: 12px;
            margin-bottom: 10px;
            background-color: #00baee;
            border-radius: 0.25rem;
        }
        .card-style2 .card-body {
            position: relative;
            display: block;
            background: #ffffff;
            padding: 2rem;
        }
        .card-style2 .card-body h3 {
            margin-bottom: 0.8rem;
        }
        .card-style2 .card-body h3 a {
            color: #004975;
        }
        .card-style2 .card-body h3 a:hover {
            color: #00baee;
        }
        .card-style2 .card-footer {
            border-top: 1px solid rgba(0, 0, 0, 0.09);
            background: transparent;
            padding-right: 2rem;
            padding-left: 2rem;
            -ms-flex-align: end;
            align-items: flex-end;
        }
        .card-style2 .card-footer ul {
            display: flex;
            justify-content: space-between;
            list-style: none;
            margin-bottom: 0;
        }
        .card-style2 .card-footer ul li {
            font-size: 15px;
        }
        .card-style2 .card-footer ul li a {
            color: #394952;
        }
        .card-style2 .card-footer ul li a:hover {
            color: #00baee;
        }
        .card-style2 .card-footer ul li i {
            color: #00baee;
            font-size: 14px;
            margin-right: 8px;
        }
</style>
<div class="jumbotron text-center" style="padding: 2% !important;">
    <div class="col-12 text-center pt-3">
        <h1 style="color: #ffcb07;font-weight: 800">Blogs / Articles</h1>
    </div>
</div>
<div id="main-content" class="file_manager">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                    <!-- <section> -->
                        <div class="container">
                            <div class="row">
                                @if($blogs)
                                    @foreach($blogs as $item)
                                        <div class="col-lg-4 col-md-6 mb-2-6" style="margin-bottom : 2%;">
                                            <article class="card card-style2">
                                                <div class="card-img">
                                                    @foreach($item->blog_files as $img)
                                                        @if($loop->index == 0)
                                                            @if($img->photo)
                                                                <img class="rounded-top" src="{{asset('storage/blogs/photo/'.$img->photo)}}" alt="img" 
                                                                style="max-width: 390px; max-height: 220px; width: 390px; height: 220px;" 
                                                                 >
                                                                <!-- <img class="rounded-top" src="https://via.placeholder.com/350x280/6A5ACD/000000" alt="..."> -->
                                                                @endif
                                                        @endif
                                                    @endforeach
                                                    <div class="date">
                                                        <span>{{$item->created_at->format('d')}}</span>
                                                    {{$item->created_at->format('M')}}</div>
                                                </div>
                                                <div class="card-body">
                                                    <h3 class="h5"><a href="#!">{{$item->main_heading}}</a></h3>
                                                    <p class="display-30">
                                                        {{ str_limit($item->blog_content,50) }}
                                                        <!-- {{substr("Hello world",6)}} -->
                                                        <!-- {{substr($item->blog_content, 10)}} -->
                                                        
                                                    </p>
                                                    <a href="{{route('blog.detail.page', $item->id)}}" class="read-more">read more</a>
                                                </div>
                                                <div class="card-footer">
                                                    <ul>
                                                        <li><a href="javascript:void(0)"><i class="fas fa-user"></i>{{$item->user->name}}</a></li>
                                                        <li><a href="javascript:void(0)"><i class="far fa-comment-dots"></i><span>26</span></a></li>
                                                    </ul>
                                                </div>
                                            </article>
                                        </div>
                                    @endforeach
                                @endif

                            </div>
                        </div>
                    <!-- </section> -->
            </div><!--end col-->
        </div><!--end row-->
    </div>
</div>



@endsection

@section('javascript')

@endsection