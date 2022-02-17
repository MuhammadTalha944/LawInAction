@extends('layouts.website.app')
@section('title', 'Home')
@section('content')

   <!-- start service area -->
   <section class="service_area">
      <div class="container">
         <div class="row">
            <div class="col-xl-3 col-lg-6 col-md-6 pr0">
               <div class="service_item_box text-center">
                  <div class="icon">
                     <img class="img-fluid" src="{{asset('website/asset/img/icons/legal.png')}}" alt="">
                  </div>
                  <h4>Legal Advice</h4>
                  <p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur</p>
               </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 pl0 pr0">
               <div class="service_item_box service_item_box2 text-center">
                  <div class="icon">
                     <img class="img-fluid" src="{{asset('website/asset/img/icons/action.png')}}" alt="">
                  </div>
                  <h4>Action</h4>
                  <p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur</p>
               </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 pr0 pl0">
               <div class="service_item_box service_item_box3 text-center">
                  <div class="icon">
                     <img class="img-fluid" src="{{asset('website/asset/img/icons/pulic.png')}}" alt="">
                  </div>
                  <h4>Pulic Support</h4>
                  <p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur</p>
               </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 pl0">
               <div class="service_item_box text-center">
                  <div class="icon">
                     <img class="img-fluid" src="{{asset('website/asset/img/icons/onground.png')}}" alt="">
                  </div>
                  <h4>On Ground</h4>
                  <p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur</p>
               </div>
            </div>
         </div>
      </div>
   </section>

   <!-- start about us area  -->
   <section id="about_us">
      <div class="row align-items-center">
         <div class="col-xl-6">
            <div class="about_image">
               <img class="img-fluid" src="{{asset('website/asset/img/aboutus.jpg')}}" alt="">
            </div>
         </div>
         <div class="col-xl-6">
            <div class="about_us_content">
               <h4>ABout</h4>
               <h3>Lawyers in Action</h3>
               <div class="about_details">
                  <p>As we have said we are a nationwide team of lawyers under the banner of ‘First Legal Aid’ ready to address your problems</p>
                  <p>If conditions require we will personally reach out to you. On your part you just have to call/WhatApp to our ‘First Legal Aid’ national legal helpline number.</p>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- end about us area  -->

   <!-- start campains area  -->
   <section id="campains_area" style="background-image: url('./website/asset/img/campains.jpg');">
      <div class="container">
         <div class="row align-items-center">
            <div class="col-xl-3">
               <div class="campain_left_info">
                  <h4>Campaign</h4>
                  <h3>For Donation</h3>
               </div>
            </div>
            <div class="col-xl-9">
               <div class="row">
                  @if($campaign)
                     @if(count($campaign) > 0)
                           @php $camp_count = count($campaign) @endphp
                              @if($camp_count == 1)
                                 <div class="col-xl-12">
                                       <div class="campain_full text-center" style="background-image: url('./website/asset/img/campains/1.jpg');">
                                          <h5>Lawyers In Action</h5>
                                          <h3>LAWYERS FIGHTING <br> FOR YOUR  RIGHTS</h3>
                                          <p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...</p>
                                          <ul>
                                             <li><a href="#">Know more</a></li>
                                             <li class="btn_sp"><a href="#">Donate</a></li>
                                          </ul>
                                       </div>
                                    </div>
                              @endif
                              @if($camp_count  > 1)
                                 @foreach($campaign as $donate)
                                       @if($loop->index == 0)
                                             <div class="col-xl-6">
                                                <div class="campain_full text-center" style="background-image: url('./website/asset/img/campains/1.jpg');max-height: 100%;height: 100% !important;" >
                                                   <h5>Lawyers In Action</h5>
                                                   <h3>{{$donate->story_heading}}</h3>
                                                   <p>{{$donate->story_sub_heading}}</p>
                                                   <ul>
                                                      <li><a href="{{route('campaign.detail', $donate->id)}}">Know more</a></li>
                                                      <li class="btn_sp"><a href="#">Donate</a></li>
                                                   </ul>
                                                </div>
                                             </div>
                                             @endif
                                    @endforeach
                                                <div class="col-xl-6">
                                                      @foreach($campaign as $donate)
                                                                     @if($loop->index > 0 && $loop->index < 4)
                                                                        <div class="campain_single_item" style="background-image: url('./website/asset/img/campains/2.jpg');">
                                                                           <h3>{{$donate->story_heading}}</h3>
                                                                           <p>{{$donate->story_sub_heading}}</p>
                                                                           <a href="{{route('campaign.detail', $donate->id)}}">Know more</a>
                                                                        </div>
                                                                     @endif
                                                      @endforeach
                                                </div>

                              @endif
                                            
                        {{-- <div class="col-xl-6">
                           <div class="campain_full text-center" style="background-image: url('./website/asset/img/campains/1.jpg');">
                              <h5>Lawyers In Action</h5>
                              <h3>LAWYERS FIGHTING <br> FOR YOUR  RIGHTS</h3>
                              <p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...</p>
                              <ul>
                                 <li><a href="#">Know more</a></li>
                                 <li class="btn_sp"><a href="#">Donate</a></li>
                              </ul>
                           </div>
                        </div>
                        <div class="col-xl-6">
                           <div class="campain_single_item" style="background-image: url('./website/asset/img/campains/2.jpg');">
                              <h4>Lawyers In Action</h4>
                              <h3>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet</h3>
                              <a href="#">Know more</a>
                           </div>
                           <div class="campain_single_item" style="background-image: url('./website/asset/img/campains/3.jpg');">
                              <h4>Lawyers In Action</h4>
                              <h3>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet</h3>
                              <a href="#">Know more</a>
                           </div>
                           <div class="campain_single_item" style="background-image: url('./website/asset/img/campains/4.jpg');">
                              <h4>Lawyers In Action</h4>
                              <h3>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet</h3>
                              <a href="#">Know more</a>
                           </div>
                        </div> --}}
                       @endif 
                  @endif
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- end campains area  -->


   <!-- start news area  -->
   <section id="newsarea">
      <div class="row justify-content-end">
         <div class="col-xl-10">
            <div class="row align-items-center">
               <div class="col-xl-4">
                  <div class="news_left_info">
                     <h4>News</h4>
                     <h3>Lawyers in Action</h3>
                     <p>It is a long established fact that a reader will be distracted by the readable</p>
                     <div class="slider_action_btn">
                        <ul>
                           <li><button id="slide_prev" type="button" class="btn"><i class="fal fa-arrow-left"></i></button></li>
                           <li><button id="slide_next" type="button" class="btn active"><i class="fal fa-arrow-right"></i></button></li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="col-xl-8" style="overflow-x: hidden;">
                  <div class="news_slider_area">
                     <div class="news_slider_active owl-carousel">
                        {{-- <h3>{{count($news)}}</h3> --}}
                        @if($news)
                                    {{-- @foreach($news as $item)
                                          <div class="news_slider_item">
                                             <div class="image_box">
                                                <img class="img-fluid" src="{{asset('storage/news/photo/'.$item->news_files[0]->photo)}}" 
                                                   alt="$item->news_files[0]->photo_caption"
                                                   style="max-height: 229px;" 
                                                   >
                                             </div>
                                             <div class="content_box">
                                                <h4>{{ $item->created_at->format('M d Y') }}</h4>
                                                <h3>{{ str_limit($item->main_heading, 20) }}</h3>
                                                <p>{{ str_limit($item->sub_heading, 10) }}</p>
                                                <a href="{{route('news.page')}}">Read More</a>
                                             </div>
                                          </div>
                                    @endforeach --}}
                                 @php  $count = 0; @endphp
                                 @if(count($news) > 3)
                                    @php  $count = 1; @endphp
                                 @endif
                                  {{-- @if(count($news) < 3) --}}
                                 {{-- @endif --}}

                                       @foreach($news as $item)
                                          
{{--                                           @if($count == 1)
                                             @if($loop->index < $count)
                                                   @break
                                             @endif
                                          @endif --}}
                                          
                                             <div class="news_slider_item">
                                                <div class="image_box">
                                                   <img class="img-fluid" src="{{asset('storage/news/photo/'.$item->news_files[0]->photo)}}" 
                                                      alt="$item->news_files[0]->photo_caption"
                                                      style="max-height: 229px;" 
                                                      >
                                                </div>
                                                <div class="content_box">
                                                   <h4>{{ $item->created_at->format('M d Y') }}</h4>
                                                   <h3>{{ str_limit($item->main_heading, 20) }}</h3>
                                                   <p>{{ str_limit($item->sub_heading, 10) }}</p>
                                                   <a href="{{route('news.page')}}">Read More</a>
                                                </div>
                                             </div>
                                       @endforeach
                        @endif
                        {{-- <div class="news_slider_item">
                           <div class="image_box">
                              <img class="img-fluid" src="{{asset('website/asset/img/news/2.jpg')}}" alt="">
                           </div>
                           <div class="content_box">
                              <h4>24 May 2021</h4>
                              <h3>It is a long established fact that a reader will be </h3>
                              <p>Lorem Ipsum is simply dummy text of the printing and typesetting is industry. Industry's the a</p>
                              <a href="{{route('news.page')}}">Read More</a>
                           </div>
                        </div>
                        <div class="news_slider_item">
                           <div class="image_box">
                              <img class="img-fluid" src="{{asset('website/asset/img/news/1.jpg')}}" alt="">
                           </div>
                           <div class="content_box">
                              <h4>24 May 2021</h4>
                              <h3>It is a long established fact that a reader will be </h3>
                              <p>Lorem Ipsum is simply dummy text of the printing and typesetting is industry. Industry's the a</p>
                              <a href="{{route('news.page')}}">Read More</a>
                           </div>
                        </div> --}}
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- end news area  -->

   <!-- start footer top feater  -->
   <section id="feater_area">
      <div class="container">
         <div class="row">
            <div class="col-xl-6">
                  <div class="poll_voting">
                                    @if($poll)
                                             <div class="feater_polls">
                                                <div class="top_title">
                                                   <div class="row">
                                                      <div class="col-xl-9 col-lg-8 col-md-9 col-sm-8">
                                                        <div class="title_left">
                                                            <h4>Polls</h4>
                                                            @if($poll)
                                                               @if($poll[0]['translated_by'])
                                                                  <p><span>Poll Questions:</span>{{$poll[0]['translated_question']}}</p>
                                                               @else
                                                                  <p><span>Poll Questions:</span>{{$poll[0]['question']}}</p>
                                                               @endif
                                                            @endif
                                                        </div>
                                                      </div>
                                                      <div class="col-xl-3 col-lg-4 col-md-3 col-sm-4">
                                                         <div class="live_box text-right">
                                                            <div class="live_box_content">
                                                               <div class="live_icon"></div>
                                                               <div class="live_text">Live</div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="vote_item_box">
                                                   
                                                   <div class="vote_single_item">
                                                      <div class="row align-items-center">
                                                         <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1">
                                                            <div class="el-radio">
                                                               <input type="radio" name="poll_option" id="2_1" value="0" onclick="check_poll_op(this);">
                                                               <label class="el-radio-style mb-0" for="2_1"></label>
                                                             </div>
                                                         </div>
                                                         <div class="col-xl-11 col-lg-11 col-md-11 col-sm-11">
                                                            <div class="vote_progress">
                                                               <h4>Yes</h4>
                                                               <div class="row align-items-center">
                                                                  <div class="col-xl-9 col-lg-9 col-md-9 pr0">
                                                                     <div class="vote_progress_bar">
                                                                        {{-- style="width: 40%;" --}}
                                                                        <span class="vote_progress_fill" ></span>
                                                                     </div>
                                                                  </div>
                                                                  <div class="col-xl-3 col-lg-3 col-md-3">
                                                                     <div class="vote_count">
                                                                        {{-- <p>1000 votes</p> --}}
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="vote_single_item">
                                                      <div class="row align-items-center">
                                                         <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1">
                                                            <div class="el-radio">
                                                               <input type="radio" name="poll_option" id="2_2" value="1" onclick="check_poll_op(this);">
                                                               <label class="el-radio-style mb-0" for="2_2"></label>
                                                             </div>
                                                         </div>
                                                         <div class="col-xl-11 col-lg-11 col-md-11 col-sm-11">
                                                            <div class="vote_progress">
                                                               <h4>No</h4>
                                                               <div class="row align-items-center">
                                                                  <div class="col-xl-9 col-lg-9 col-md-9 pr0">
                                                                     <div class="vote_progress_bar">
                                                                        {{-- style="width: 87%;" --}}
                                                                        <span class="vote_progress_fill" ></span>
                                                                     </div>
                                                                  </div>
                                                                  <div class="col-xl-3 col-lg-3 col-md-3">
                                                                     <div class="vote_count">
                                                                        {{-- <p>2500 votes</p> --}}
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="vote_single_item">
                                                      <div class="row align-items-center">
                                                         <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1">
                                                            <div class="el-radio">
                                                               <input type="radio" name="poll_option" id="2_3" value="2" onclick="check_poll_op(this);">
                                                               <label class="el-radio-style mb-0" for="2_3"></label>
                                                             </div>
                                                         </div>
                                                         <div class="col-xl-11 col-lg-11 col-md-11 col-sm-11">
                                                            <div class="vote_progress">
                                                               <h4>Not Sure</h4>
                                                               <div class="row align-items-center">
                                                                  <div class="col-xl-9 col-lg-9 col-md-9 pr0">
                                                                     <div class="vote_progress_bar">
                                                                        {{-- style="width: 15%;" --}}
                                                                        <span class="vote_progress_fill" ></span>
                                                                     </div>
                                                                  </div>
                                                                  <div class="col-xl-3 col-lg-3 col-md-3">
                                                                     <div class="vote_count">
                                                                        {{-- <p>500 votes</p> --}}
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="vote_single_item">
                                                      <div class="row align-items-center">
                                                         <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1">
                                                            <div class="el-radio">
                                                               <input type="radio" name="poll_option" id="2_4" value="3" onclick="check_poll_op(this);">
                                                               <label class="el-radio-style mb-0" for="2_4"></label>
                                                             </div>
                                                         </div>
                                                         <div class="col-xl-11 col-lg-11 col-md-11 col-sm-11">
                                                            <div class="vote_progress">
                                                               <h4>Don't Know</h4>
                                                               <div class="row align-items-center">
                                                                  <div class="col-xl-9 col-lg-9 col-md-9 pr0">
                                                                     <div class="vote_progress_bar">
                                                                        {{-- style="width: 15%;" --}}
                                                                        <span class="vote_progress_fill" ></span>
                                                                     </div>
                                                                  </div>
                                                                  <div class="col-xl-3 col-lg-3 col-md-3">
                                                                     <div class="vote_count">
                                                                        {{-- <p>500 votes</p> --}}
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>

                                                   <div class="vote_single_item" id="poll_option" style="display: none;">
                                                      <div class="row align-items-center">
                                                         {{-- <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1">
                                                            <div class="el-radio">
                                                               <input type="radio" name="poll_option" id="2_3" value="option" onclick="check_poll_op(this);">
                                                               <label class="el-radio-style mb-0" for="2_3"></label>
                                                             </div>
                                                         </div> --}}
                                                         {{-- <form> --}}
                                                               <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10">
                                                                  <div class="vote_progress">
                                                                     <h4>Write your Option</h4>
                                                                     <div class="row align-items-center">
                                                                        <div class="col-xl-9 col-lg-9 col-md-9 pr0">
                                                                           <div class="">
                                                                              <div class="form-group">
                                                                                 <input type="text" name="poll_option_explain" class="form-control" id="poll_option_explain" required>
                                                                                 <span style="display: none;" id="error_vote">*  This Field is Required</span>
                                                                              </div>
                                                                              {{-- style="width: 15%;" --}}
                                                                              {{-- <span class="vote_progress_fill" ></span> --}}
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2">
                                                                  <input type="hidden" name="poll_id" value="{{$poll[0]['id']}}" id="poll_id">
                                                                  <button type="button" class="btn btn-yellow" id="submit_poll">Vote</button>
                                                               </div>
                                                         {{-- </form> --}}
                                                      </div>
                                                   </div>

                                                   <div class="total_vote_count text-right">
                                                      {{-- <p>Total: 4000 votes</p> --}}
                                                   </div>
                                                </div>
                                             </div>
                                          @else
                                             <div class="feater_polls">
                                                <div class="top_title">
                                                      <h3>No Poll Currently</h3>
                                                </div>
                                             </div>   
                                          @endif
                  </div>
                  <div class="poll_vote_stats" style="display: none;">
                     <div class="feater_polls">
                           <div class="top_title">
                              <div class="row">
                                 <div class="col-xl-9 col-lg-8 col-md-9 col-sm-8">
                                   <div class="title_left">
                                       <h4>Polls</h4>
                                       <p><span>Poll Questions:</span> <p id="pool_question"></p> </p>
                                   </div>
                                 </div>
                                 <div class="col-xl-3 col-lg-4 col-md-3 col-sm-4">
                                    <div class="live_box text-right">
                                       <div class="live_box_content">
                                          <div class="live_icon"></div>
                                          <div class="live_text">Live</div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="vote_item_box">
                              <div class="vote_single_item">
                                 <div class="row align-items-center">
                                    {{-- <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1">
                                       <div class="el-radio">
                                          <input type="radio" name="radio1" id="2_1" value="option" checked>
                                          <label class="el-radio-style mb-0" for="2_1"></label>
                                        </div>
                                    </div> --}}
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                       <div class="vote_progress">
                                          <h4>Yes</h4>
                                          <div class="row align-items-center">
                                             <div class="col-xl-9 col-lg-9 col-md-9 pr0">
                                                <div class="vote_progress_bar">
                                                   {{-- style="width: 40%;" --}}
                                                   <span class="vote_progress_fill" id="yes_progress" ></span>
                                                </div>
                                             </div>
                                             <div class="col-xl-3 col-lg-3 col-md-3">
                                                <div class="vote_count">
                                                   <p id="yes_votes"></p>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="vote_single_item">
                                 <div class="row align-items-center">
                                   {{--  <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1">
                                       <div class="el-radio">
                                          <input type="radio" name="radio1" id="2_2" value="option" checked>
                                          <label class="el-radio-style mb-0" for="2_2"></label>
                                        </div>
                                    </div> --}}
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                       <div class="vote_progress">
                                          <h4>No</h4>
                                          <div class="row align-items-center">
                                             <div class="col-xl-9 col-lg-9 col-md-9 pr0">
                                                <div class="vote_progress_bar">
                                                   <span class="vote_progress_fill"  id="no_progress"></span>
                                                </div>
                                             </div>
                                             <div class="col-xl-3 col-lg-3 col-md-3">
                                                <div class="vote_count">
                                                   <p id="no_votes"></p>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="vote_single_item">
                                 <div class="row align-items-center">
                                    {{-- <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1">
                                       <div class="el-radio">
                                          <input type="radio" name="radio1" id="2_3" value="option" checked>
                                          <label class="el-radio-style mb-0" for="2_3"></label>
                                        </div>
                                    </div> --}}
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                       <div class="vote_progress">
                                          <h4>Not Sure</h4>
                                          <div class="row align-items-center">
                                             <div class="col-xl-9 col-lg-9 col-md-9 pr0">
                                                <div class="vote_progress_bar">
                                                   <span class="vote_progress_fill"  id="not_sure_progress"></span>
                                                </div>
                                             </div>
                                             <div class="col-xl-3 col-lg-3 col-md-3">
                                                <div class="vote_count">
                                                   <p id="not_sure_votes"></p>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="vote_single_item">
                                 <div class="row align-items-center">
                                    {{-- <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1">
                                       <div class="el-radio">
                                          <input type="radio" name="radio1" id="2_3" value="option" checked>
                                          <label class="el-radio-style mb-0" for="2_3"></label>
                                        </div>
                                    </div> --}}
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                       <div class="vote_progress">
                                          <h4>Don't Know</h4>
                                          <div class="row align-items-center">
                                             <div class="col-xl-9 col-lg-9 col-md-9 pr0">
                                                <div class="vote_progress_bar">
                                                   <span class="vote_progress_fill"  id="dont_know_progress"></span>
                                                </div>
                                             </div>
                                             <div class="col-xl-3 col-lg-3 col-md-3">
                                                <div class="vote_count">
                                                   <p id="dont_know_votes"></p>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="total_vote_count text-right">
                                 <p id="total_votes"></p>
                              </div>
                           </div>
                        </div>
                  </div>
            </div>
            <div class="col-xl-6">
               <div class="feater_slider_area">
                  <div class="top_area">
                     <div class="row">
                        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                           <div class="left_info">
                              <h4>Career</h4>
                              <h3>Lawyers in Action</h3>
                           </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                           <div class="slider_action_btn text-right">
                              <ul>
                                 <li><button id="slide_prev_feater" type="button" class="btn"><i class="fal fa-arrow-left"></i></button></li>
                                 <li><button id="slide_next_feater" type="button" class="btn active"><i class="fal fa-arrow-right"></i></button></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="feater_main_slider_area">
                     <div class="feater_main_slider_active owl-carousel">
                        <div class="feater_main_slider_item">
                           <div class="row">
                              <div class="col-xl-6 col-lg-6 col-md-6">
                                 <div class="inner_item">
                                    <h4>Position Name</h4>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    <a href="#">View more</a>
                                 </div>
                              </div>
                              <div class="col-xl-6 col-lg-6 col-md-6">
                                 <div class="inner_item">
                                    <h4>Position Name</h4>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    <a href="#">View more</a>
                                 </div>
                              </div>
                              <div class="col-xl-6 col-lg-6 col-md-6">
                                 <div class="inner_item">
                                    <h4>Position Name</h4>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    <a href="#">View more</a>
                                 </div>
                              </div>
                              <div class="col-xl-6 col-lg-6 col-md-6">
                                 <div class="inner_item">
                                    <h4>Position Name</h4>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    <a href="#">View more</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="feater_main_slider_item">
                           <div class="row">
                              <div class="col-xl-6 col-lg-6 col-md-6">
                                 <div class="inner_item">
                                    <h4>Position Name</h4>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    <a href="#">View more</a>
                                 </div>
                              </div>
                              <div class="col-xl-6 col-lg-6 col-md-6">
                                 <div class="inner_item">
                                    <h4>Position Name</h4>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    <a href="#">View more</a>
                                 </div>
                              </div>
                              <div class="col-xl-6 col-lg-6 col-md-6">
                                 <div class="inner_item">
                                    <h4>Position Name</h4>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    <a href="#">View more</a>
                                 </div>
                              </div>
                              <div class="col-xl-6 col-lg-6 col-md-6">
                                 <div class="inner_item">
                                    <h4>Position Name</h4>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    <a href="#">View more</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="feater_main_slider_item">
                           <div class="row">
                              <div class="col-xl-6 col-lg-6 col-md-6">
                                 <div class="inner_item">
                                    <h4>Position Name</h4>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    <a href="#">View more</a>
                                 </div>
                              </div>
                              <div class="col-xl-6 col-lg-6 col-md-6">
                                 <div class="inner_item">
                                    <h4>Position Name</h4>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    <a href="#">View more</a>
                                 </div>
                              </div>
                              <div class="col-xl-6 col-lg-6 col-md-6">
                                 <div class="inner_item">
                                    <h4>Position Name</h4>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    <a href="#">View more</a>
                                 </div>
                              </div>
                              <div class="col-xl-6 col-lg-6 col-md-6">
                                 <div class="inner_item">
                                    <h4>Position Name</h4>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    <a href="#">View more</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- end footer top feater  -->

@endsection


@section('javascript')
<script type="text/javascript">
   // alert();
      function check_poll_op(option){
         // alert('Hello');
         $('#poll_option').slideDown();
      }

          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });

      $('#submit_poll').on('click', function(){
            var option_text = $('#poll_option_explain').val();
            var poll_id = $('#poll_id').val();
            var vote_option = $('input[name="poll_option"]:checked').val();

            if(option_text.length == 0 || vote_option.length == 0){
               $('#error_vote').slideDown();
               $('#error_vote').css('color','red');
               return false;
            }else{
               $('#error_vote').slideUp();
            }
               $.ajax({
                    type:'POST',
                    url:"{{ route('poll.option.post') }}",
                    data:{option_text:option_text, poll_id:poll_id, vote_option:vote_option},
                    success:function(data){
                       // alert(data);
                        $('#poll_option_explain').val("");
                        $('#poll_option').slideUp();
                        $('.poll_voting').slideUp();
                        $('.poll_vote_stats').slideDown();

                        //Load the poll results
                                    $.ajax({
                                         type:'GET',
                                         url:"{{ route('poll.results.get') }}",
                                         data:{poll_id:poll_id},
                                         success:function(data){
                                             // console.log(data);
                                             var yes = data.yes;
                                             var no = data.no;
                                             var not_sure = data.not_sure;
                                             var dont_know = data.dont_know;
                                             var total = data.total;
                                             var question = data.question;
                                             var translated_question = data.translated_question;

                                             $('#pool_question').html(question);
                                             
                                             $('#yes_progress').css('width', yes+'%');
                                             $('#yes_votes').html(yes + ' votes');

                                             $('#no_progress').css('width', no+'%');
                                             $('#no_votes').html(no + ' votes');

                                             $('#not_sure_progress').css('width', not_sure+'%');
                                             $('#not_sure_votes').html(not_sure + ' votes');

                                             $('#dont_know_progress').css('width', dont_know+'%');
                                             $('#dont_know_votes').html(dont_know + ' votes');

                                             $('#total_votes').html('Total:  '+total+'  votes')

                                             // alert(data.question);
                                             
                                            // alert(data);
                                             // $('#poll_option').slideUp();
                                             // $('.poll_voting').slideUp();
                                             // $('.poll_vote_stats').slideDown();
                                         }
                                      });
                    }
                 });
      });
      

</script>
@endsection