@extends('layouts.website.app')
@section('title', 'News')
@section('content')
<style type="text/css">
    .b-0 {
        bottom: 0;
    }
    .bg-shadow {
        background: rgba(76, 76, 76, 0);
        background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(179, 171, 171, 0)), color-stop(49%, rgba(48, 48, 48, 0.37)), color-stop(100%, rgba(19, 19, 19, 0.8)));
        background: linear-gradient(to bottom, rgba(179, 171, 171, 0) 0%, rgba(48, 48, 48, 0.71) 49%, rgba(19, 19, 19, 0.8) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#4c4c4c', endColorstr='#131313', GradientType=0 );
    }
    .top-indicator {
        right: 0;
        top: 1rem;
        bottom: inherit;
        left: inherit;
        margin-right: 1rem;
    }
    .overflow {
        position: relative;
        overflow: hidden;
    }
    .zoom img {
        transition: all 0.2s linear;
    }
    .zoom:hover img {
        -webkit-transform: scale(1.1);
        transform: scale(1.1);
    }

    /*body{margin-top:20px;}*/
        .blog-listing {
            padding-top: 30px;
            padding-bottom: 30px;
        }
        .gray-bg {
            background-color: #f5f5f5;
        }
        /* Blog 
        ---------------------*/
        .blog-grid {
          box-shadow: 0 0 30px rgba(31, 45, 61, 0.125);
          /*border-radius: 5px;*/
          overflow: hidden;
          background: #ffffff;
          margin-top: 15px;
          margin-bottom: 15px;
        }
        .blog-grid .blog-img {
          position: relative;
        }
        .blog-grid .blog-img .date {
          position: absolute;
          background: #fc5356;
          color: #ffffff;
          padding: 8px 15px;
          left: 10px;
          top: 10px;
          /*border-radius: 4px;*/
        }
        .blog-grid .blog-img .date span {
          font-size: 22px;
          display: block;
          line-height: 22px;
          font-weight: 700;
        }
        .blog-grid .blog-img .date label {
          font-size: 14px;
          margin: 0;
        }
        .blog-grid .blog-info {
          padding: 20px;
        }
        .blog-grid .blog-info h5 {
          font-size: 22px;
          font-weight: 700;
          margin: 0 0 10px;
        }
        .blog-grid .blog-info h5 a {
          color: #20247b;
        }
        .blog-grid .blog-info p {
          margin: 0;
        }
        .blog-grid .blog-info .btn-bar {
          margin-top: 20px;
        }


        /* Blog Sidebar
        -------------------*/
        .blog-aside .widget {
          box-shadow: 0 0 30px rgba(31, 45, 61, 0.125);
          border-radius: 5px;
          overflow: hidden;
          background: #ffffff;
          margin-top: 15px;
          margin-bottom: 15px;
          width: 100%;
          display: inline-block;
          vertical-align: top;
        }
        .blog-aside .widget-body {
          padding: 15px;
        }
        .blog-aside .widget-title {
          padding: 15px;
          border-bottom: 1px solid #eee;
        }
        .blog-aside .widget-title h3 {
          font-size: 20px;
          font-weight: 700;
          color: #fc5356;
          margin: 0;
        }
        .blog-aside .widget-author .media {
          margin-bottom: 15px;
        }
        .blog-aside .widget-author p {
          font-size: 16px;
          margin: 0;
        }
        .blog-aside .widget-author .avatar {
          width: 70px;
          height: 70px;
          border-radius: 50%;
          overflow: hidden;
        }
        .blog-aside .widget-author h6 {
          font-weight: 600;
          color: #20247b;
          font-size: 22px;
          margin: 0;
          padding-left: 20px;
        }
        .blog-aside .post-aside {
          margin-bottom: 15px;
        }
        .blog-aside .post-aside .post-aside-title h5 {
          margin: 0;
        }
        .blog-aside .post-aside .post-aside-title a {
          font-size: 18px;
          color: #20247b;
          font-weight: 600;
        }
        .blog-aside .post-aside .post-aside-meta {
          padding-bottom: 10px;
        }
        .blog-aside .post-aside .post-aside-meta a {
          color: #6F8BA4;
          font-size: 12px;
          text-transform: uppercase;
          display: inline-block;
          margin-right: 10px;
        }
        .blog-aside .latest-post-aside + .latest-post-aside {
          border-top: 1px solid #eee;
          padding-top: 15px;
          margin-top: 15px;
        }
        .blog-aside .latest-post-aside .lpa-right {
          width: 90px;
        }
        .blog-aside .latest-post-aside .lpa-right img {
          border-radius: 3px;
        }
        .blog-aside .latest-post-aside .lpa-left {
          padding-right: 15px;
        }
        .blog-aside .latest-post-aside .lpa-title h5 {
          margin: 0;
          font-size: 15px;
        }
        .blog-aside .latest-post-aside .lpa-title a {
          color: #20247b;
          font-weight: 600;
        }
        .blog-aside .latest-post-aside .lpa-meta a {
          color: #6F8BA4;
          font-size: 12px;
          text-transform: uppercase;
          display: inline-block;
          margin-right: 10px;
        }

        .tag-cloud a {
          padding: 4px 15px;
          font-size: 13px;
          color: #ffffff;
          background: #20247b;
          border-radius: 3px;
          margin-right: 4px;
          margin-bottom: 4px;
        }
        .tag-cloud a:hover {
          background: #fc5356;
        }

        .blog-single {
          padding-top: 30px;
          padding-bottom: 30px;
        }

        .article {
          box-shadow: 0 0 30px rgba(31, 45, 61, 0.125);
          border-radius: 5px;
          overflow: hidden;
          background: #ffffff;
          padding: 15px;
          margin: 15px 0 30px;
        }
        .article .article-title {
          padding: 15px 0 20px;
        }
        .article .article-title h6 {
          font-size: 14px;
          font-weight: 700;
          margin-bottom: 20px;
        }
        .article .article-title h6 a {
          text-transform: uppercase;
          color: #fc5356;
          border-bottom: 1px solid #fc5356;
        }
        .article .article-title h2 {
          color: #20247b;
          font-weight: 600;
        }
        .article .article-title .media {
          padding-top: 15px;
          border-bottom: 1px dashed #ddd;
          padding-bottom: 20px;
        }
        .article .article-title .media .avatar {
          width: 45px;
          height: 45px;
          border-radius: 50%;
          overflow: hidden;
        }
        .article .article-title .media .media-body {
          padding-left: 8px;
        }
        .article .article-title .media .media-body label {
          font-weight: 600;
          color: #fc5356;
          margin: 0;
        }
        .article .article-title .media .media-body span {
          display: block;
          font-size: 12px;
        }
        .article .article-content h1,
        .article .article-content h2,
        .article .article-content h3,
        .article .article-content h4,
        .article .article-content h5,
        .article .article-content h6 {
          color: #20247b;
          font-weight: 600;
          margin-bottom: 15px;
        }
        .article .article-content blockquote {
          max-width: 600px;
          padding: 15px 0 30px 0;
          margin: 0;
        }
        .article .article-content blockquote p {
          font-size: 20px;
          font-weight: 500;
          color: #fc5356;
          margin: 0;
        }
        .article .article-content blockquote .blockquote-footer {
          color: #20247b;
          font-size: 16px;
        }
        .article .article-content blockquote .blockquote-footer cite {
          font-weight: 600;
        }
        .article .tag-cloud {
          padding-top: 10px;
        }

        .article-comment {
          box-shadow: 0 0 30px rgba(31, 45, 61, 0.125);
          border-radius: 5px;
          overflow: hidden;
          background: #ffffff;
          padding: 20px;
        }
        .article-comment h4 {
          color: #20247b;
          font-weight: 700;
          margin-bottom: 25px;
          font-size: 22px;
        }
        img {
            max-width: 100%;
        }
        img {
            vertical-align: middle;
            border-style: none;
        }



</style>
  <div class="jumbotron text-center" style="padding: 2% !important;">
            <div class="col-12 text-center pt-3">
                <h1 style="color: #ffcb07;">NewsFeed</h1>
                <p style="color: #ffcb07;">All Featured news with their details and on this page</p>
            </div>
  </div>
<div class="container">
    <!--Start code-->
    <div class="row">
        <div class="col-12 pb-5">
            <!--SECTION START-->
            <section class="row">
                <!--Start slider news-->
                <div class="col-12 col-md-6 pb-0 pb-md-3 pt-2 pr-md-1">
                    <div id="featured" class="carousel slide carousel" data-ride="carousel">
                        <!--dots navigate-->
                        <ol class="carousel-indicators top-indicator">
                            <li data-target="#featured" data-slide-to="0" class="active"></li>
                            <li data-target="#featured" data-slide-to="1"></li>
                            <li data-target="#featured" data-slide-to="2"></li>
                            <li data-target="#featured" data-slide-to="3"></li>
                        </ol>
                        
                        <!--carousel inner-->
                        <div class="carousel-inner">
                            <!--Item slider-->
                            <div class="carousel-item active">
                                <div class="card border-0 rounded-0 text-light overflow zoom">
                                    <div class="position-relative">
                                        <!--thumbnail img-->
                                        <div class="ratio_left-cover-1 image-wrapper">
                                            <a href="{{route('news.page')}}">
                                                <img class="img-fluid w-100"
                                                     src="https://bootstrap.news/source/img1.jpg"
                                                     alt="LiA news">
                                            </a>
                                        </div>
                                        <div class="position-absolute p-2 p-lg-3 b-0 w-100 bg-shadow">
                                            <!--title-->
                                            <a href="{{route('news.page')}}">
                                                <h2 class="h3 post-title text-white my-1">Bootstrap 4 template news portal magazine perfect for news site</h2>
                                            </a>
                                            <!-- meta title -->
                                            <div class="news-meta">
                                                <span class="news-author">by <a class="text-white font-weight-bold" href="../category/author.html">Jennifer</a></span>
                                                <span class="news-date">Oct 22, 2019</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!--Item slider-->
                            <div class="carousel-item">
                                <div class="card border-0 rounded-0 text-light overflow zoom">
                                    <div class="position-relative">
                                        <!--thumbnail img-->
                                        <div class="ratio_left-cover-1 image-wrapper">
                                            <a href="{{route('news.page')}}">
                                                <img class="img-fluid w-100"
                                                     src="https://bootstrap.news/source/img2.jpg"
                                                     alt="LiA news">
                                            </a>
                                        </div>
                                        <div class="position-absolute p-2 p-lg-3 b-0 w-100 bg-shadow">
                                            <!--title-->
                                            <a href="{{route('news.page')}}">
                                                <h2 class="h3 post-title text-white my-1">Walmart shares up 10% on online sales lift</h2>
                                            </a>
                                            <!-- meta title -->
                                            <div class="news-meta">
                                                <span class="news-author">by <a class="text-white font-weight-bold" href="../category/author.html">Jennifer</a></span>
                                                <span class="news-date">Oct 22, 2019</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!--Item slider-->
                            <div class="carousel-item">
                                <div class="card border-0 rounded-0 text-light overflow zoom">
                                    <div class="position-relative">
                                        <!--thumbnail img-->
                                        <div class="ratio_left-cover-1 image-wrapper">
                                            <a href="{{route('news.page')}}">
                                                <img class="img-fluid w-100"
                                                     src="https://bootstrap.news/source/img3.jpg"
                                                     alt="LiA news">
                                            </a>
                                        </div>
                                        <div class="position-absolute p-2 p-lg-3 b-0 w-100 bg-shadow">
                                            <!--title-->
                                            <a href="{{route('news.page')}}">
                                                <h2 class="h3 post-title text-white my-1">Bank chief warns on Brexit staff moves to other company</h2>
                                            </a>
                                            <!-- meta title -->
                                            <div class="news-meta">
                                                <span class="news-author">by <a class="text-white font-weight-bold" href="../category/author.html">Jennifer</a></span>
                                                <span class="news-date">Oct 22, 2019</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!--Item slider-->
                            <div class="carousel-item">
                                <div class="card border-0 rounded-0 text-light overflow zoom">
                                    <div class="position-relative">
                                        <!--thumbnail img-->
                                        <div class="ratio_left-cover-1 image-wrapper">
                                            <a href="{{route('news.page')}}">
                                                <img class="img-fluid w-100"
                                                     src="https://bootstrap.news/source/img4.jpg"
                                                     alt="LiA news">
                                            </a>
                                        </div>
                                        <div class="position-absolute p-2 p-lg-3 b-0 w-100 bg-shadow">
                                            <!--title-->
                                            <a href="{{route('news.page')}}">
                                                <h2 class="h3 post-title text-white my-1">The world's first floating farm making waves in Rotterdam</h2>
                                            </a>
                                            <!-- meta title -->
                                            <div class="news-meta">
                                                <span class="news-author">by <a class="text-white font-weight-bold" href="../category/author.html">Jennifer</a></span>
                                                <span class="news-date">Oct 22, 2019</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end item slider-->
                        </div>
                        <!--end carousel inner-->
                    </div>
                    
                    <!--navigation-->
                    <a class="carousel-control-prev" href="#featured" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#featured" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <!--End slider news-->
                
                <!--Start box news-->
                <div class="col-12 col-md-6 pt-2 pl-md-1 mb-3 mb-lg-4">
                    <div class="row">
                        <!--news box-->
                        <div class="col-6 pb-1 pt-0 pr-1">
                            <div class="card border-0 rounded-0 text-white overflow zoom">
                                <div class="position-relative">
                                    <!--thumbnail img-->
                                    <div class="ratio_right-cover-2 image-wrapper">
                                        <a href="{{route('news.page')}}">
                                            <img class="img-fluid"
                                                 src="https://bootstrap.news/source/img5.jpg"
                                                 alt="LiA news">
                                        </a>
                                    </div>
                                    <div class="position-absolute p-2 p-lg-3 b-0 w-100 bg-shadow">
                                        <!-- category -->
                                        <a class="p-1 badge badge-primary rounded-0" href="{{route('news.page')}}">Lifestyle</a>

                                        <!--title-->
                                        <a href="{{route('news.page')}}">
                                            <h2 class="h5 text-white my-1">Should you see the Fantastic Beasts sequel?</h2>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!--news box-->
                        <div class="col-6 pb-1 pl-1 pt-0">
                            <div class="card border-0 rounded-0 text-white overflow zoom">
                                <div class="position-relative">
                                    <!--thumbnail img-->
                                    <div class="ratio_right-cover-2 image-wrapper">
                                        <a href="{{route('news.page')}}">
                                            <img class="img-fluid"
                                                 src="https://bootstrap.news/source/img6.jpg"
                                                 alt="LiA news">
                                        </a>
                                    </div>
                                    <div class="position-absolute p-2 p-lg-3 b-0 w-100 bg-shadow">
                                        <!-- category -->
                                        <a class="p-1 badge badge-primary rounded-0" href="{{route('news.page')}}">Motocross</a>
                                        <!--title-->
                                        <a href="{{route('news.page')}}">
                                            <h2 class="h5 text-white my-1">Three myths about Florida elections recount</h2>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!--news box-->
                        <div class="col-6 pb-1 pr-1 pt-1">
                            <div class="card border-0 rounded-0 text-white overflow zoom">
                                <div class="position-relative">
                                    <!--thumbnail img-->
                                    <div class="ratio_right-cover-2 image-wrapper">
                                        <a href="{{route('news.page')}}">
                                            <img class="img-fluid"
                                                 src="https://bootstrap.news/source/img7.jpg"
                                                 alt="LiA news">
                                        </a>
                                    </div>
                                    <div class="position-absolute p-2 p-lg-3 b-0 w-100 bg-shadow">
                                        <!-- category -->
                                        <a class="p-1 badge badge-primary rounded-0" href="{{route('news.page')}}">Fitness</a>
                                        <!--title-->
                                        <a href="{{route('news.page')}}">
                                            <h2 class="h5 text-white my-1">Finding Empowerment in Two Wheels and a Helmet</h2>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!--news box-->
                        <div class="col-6 pb-1 pl-1 pt-1">
                            <div class="card border-0 rounded-0 text-white overflow zoom">
                                <div class="position-relative">
                                    <!--thumbnail img-->
                                    <div class="ratio_right-cover-2 image-wrapper">
                                        <a href="{{route('news.page')}}">
                                            <img class="img-fluid"
                                                 src="https://bootstrap.news/source/img8.jpg"
                                                 alt="LiA news">
                                        </a>
                                    </div>
                                    <div class="position-absolute p-2 p-lg-3 b-0 w-100 bg-shadow">
                                        <!-- category -->
                                        <a class="p-1 badge badge-primary rounded-0" href="{{route('news.page')}}">Adventure</a>
                                        <!--title-->
                                        <a href="{{route('news.page')}}">
                                            <h2 class="h5 text-white my-1">Ditch receipts and four other tips to be a shopper</h2>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end news box-->
                    </div>
                </div>
                <!--End box news-->
            </section>
            <section class="blog-listing ">
                    {{-- <div class="container"> --}}
                        <div class="row align-items-start">
                            <div class="col-lg-8 m-15px-tb">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="blog-grid">
                                            <div class="blog-img">
                                                <div class="date">
                                                    <span>04</span>
                                                    <label>FEB</label>
                                                </div>
                                                <a href="#">
                                                    <img src="https://source.unsplash.com/400x200/?law" title="" alt="">
                                                </a>
                                            </div>
                                            <div class="blog-info">
                                                <h5><a href="#">Prevent 75% of visitors from google analytics</a></h5>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                                <div class="btn-bar">
                                                    <a href="#" class="px-btn-arrow">
                                                        <span>Read More</span>
                                                        <i class="arrow"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="blog-grid">
                                            <div class="blog-img">
                                                <div class="date">
                                                    <span>04</span>
                                                    <label>FEB</label>
                                                </div>
                                                <a href="#">
                                                    <img src="https://source.unsplash.com/400x200/?law" title="" alt="">
                                                </a>
                                            </div>
                                            <div class="blog-info">
                                                <h5><a href="#">Prevent 75% of visitors from google analytics</a></h5>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                                <div class="btn-bar">
                                                    <a href="#" class="px-btn-arrow">
                                                        <span>Read More</span>
                                                        <i class="arrow"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="blog-grid">
                                            <div class="blog-img">
                                                <div class="date">
                                                    <span>04</span>
                                                    <label>FEB</label>
                                                </div>
                                                <a href="#">
                                                    <img src="https://source.unsplash.com/400x200/?law" title="" alt="">
                                                </a>
                                            </div>
                                            <div class="blog-info">
                                                <h5><a href="#">Prevent 75% of visitors from google analytics</a></h5>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                                <div class="btn-bar">
                                                    <a href="#" class="px-btn-arrow">
                                                        <span>Read More</span>
                                                        <i class="arrow"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="blog-grid">
                                            <div class="blog-img">
                                                <div class="date">
                                                    <span>04</span>
                                                    <label>FEB</label>
                                                </div>
                                                <a href="#">
                                                    <img src="https://source.unsplash.com/400x200/?law" title="" alt="">
                                                </a>
                                            </div>
                                            <div class="blog-info">
                                                <h5><a href="#">Prevent 75% of visitors from google analytics</a></h5>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                                <div class="btn-bar">
                                                    <a href="#" class="px-btn-arrow">
                                                        <span>Read More</span>
                                                        <i class="arrow"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <a href="#" class="btn btn-yellow">Load More...</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 m-15px-tb blog-aside">
                                <!-- widget Tags -->
                                <div class="widget widget-tags">
                                    <div class="widget-title">
                                        <h3>Categories</h3>
                                    </div>
                                    <div class="widget-body">
                                        <div class="nav tag-cloud">
                                            <a href="#">Design</a>
                                            <a href="#">Development</a>
                                            <a href="#">Travel</a>
                                            <a href="#">Web Design</a>
                                            <a href="#">Marketing</a>
                                            <a href="#">Research</a>
                                            <a href="#">Managment</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- End widget Tags -->

                                <!-- Latest Post -->
                                <div class="widget widget-latest-post">
                                    <div class="widget-title">
                                        <h3>Latest News</h3>
                                    </div>
                                    <div class="widget-body">
                                        <div class="latest-post-aside media">
                                            <div class="lpa-left media-body">
                                                <div class="lpa-title">
                                                    <h5><a href="#">Prevent 75% of visitors from google analytics</a></h5>
                                                </div>
                                                <div class="lpa-meta">
                                                    <a class="name" href="#">
                                                        Rachel Roth
                                                    </a>
                                                    <a class="date" href="#">
                                                        26 FEB 2020
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="lpa-right">
                                                <a href="#">
                                                    <img src="https://source.unsplash.com/400x200/?law" title="" alt="">
                                                </a>
                                            </div>
                                        </div>

                                        <div class="latest-post-aside media">
                                            <div class="lpa-left media-body">
                                                <div class="lpa-title">
                                                    <h5><a href="#">Prevent 75% of visitors from google analytics</a></h5>
                                                </div>
                                                <div class="lpa-meta">
                                                    <a class="name" href="#">
                                                        Rachel Roth
                                                    </a>
                                                    <a class="date" href="#">
                                                        26 FEB 2020
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="lpa-right">
                                                <a href="#">
                                                    <img src="https://source.unsplash.com/400x200/?law" title="" alt="">
                                                </a>
                                            </div>
                                        </div>

                                        <div class="latest-post-aside media">
                                            <div class="lpa-left media-body">
                                                <div class="lpa-title">
                                                    <h5><a href="#">Prevent 75% of visitors from google analytics</a></h5>
                                                </div>
                                                <div class="lpa-meta">
                                                    <a class="name" href="#">
                                                        Rachel Roth
                                                    </a>
                                                    <a class="date" href="#">
                                                        26 FEB 2020
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="lpa-right">
                                                <a href="#">
                                                    <img src="https://source.unsplash.com/400x200/?law" title="" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="latest-post-aside media">
                                            <div class="lpa-left media-body">
                                                <div class="lpa-title">
                                                    <h5><a href="#">Prevent 75% of visitors from google analytics</a></h5>
                                                </div>
                                                <div class="lpa-meta">
                                                    <a class="name" href="#">
                                                        Rachel Roth
                                                    </a>
                                                    <a class="date" href="#">
                                                        26 FEB 2020
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="lpa-right">
                                                <a href="#">
                                                    <img src="https://source.unsplash.com/400x200/?law" title="" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="latest-post-aside media">
                                            <div class="lpa-left media-body">
                                                <div class="lpa-title">
                                                    <h5><a href="#">Prevent 75% of visitors from google analytics</a></h5>
                                                </div>
                                                <div class="lpa-meta">
                                                    <a class="name" href="#">
                                                        Rachel Roth
                                                    </a>
                                                    <a class="date" href="#">
                                                        26 FEB 2020
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="lpa-right">
                                                <a href="#">
                                                    <img src="https://source.unsplash.com/400x200/?law" title="" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="latest-post-aside media">
                                            <div class="lpa-left media-body">
                                                <div class="lpa-title">
                                                    <h5><a href="#">Prevent 75% of visitors from google analytics</a></h5>
                                                </div>
                                                <div class="lpa-meta">
                                                    <a class="name" href="#">
                                                        Rachel Roth
                                                    </a>
                                                    <a class="date" href="#">
                                                        26 FEB 2020
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="lpa-right">
                                                <a href="#">
                                                    <img src="https://source.unsplash.com/400x200/?law" title="" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        

                                    </div>
                                </div>
                                <!-- End Latest Post -->

                                
                            </div>
                        </div>
                    {{-- </div> --}}
            </section>
            <!--END SECTION-->
        </div>
    </div>
    <!--end code-->
  
</div>
@endsection

@section('javascript')
<script type="text/javascript">
  //FEATURED HOVER
    $(document).ready(function(){
          $(".linkfeat").hover(
            function () {
                $(".textfeat").show(500);
            },
            function () {
                $(".textfeat").hide(500);
            }
        );
    });
</script>
@endsection