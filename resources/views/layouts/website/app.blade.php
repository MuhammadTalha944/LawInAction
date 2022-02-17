<!doctype html>
<html class="no-js" lang="">

<head>
   <meta charset="utf-8">
   <title>Lawyers In Action | @yield('title')</title>
   <meta name="description" content="">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
   <!-- Favicons -->
   <link rel="icon" href="{{asset('website/asset/img/favicons/favicon.png')}}">
   <link rel="stylesheet" href="{{asset('website/asset/css/bootstrap.min.css')}}">
   <link rel="stylesheet" href="{{asset('website/asset/css/animate.css')}}">
   <link rel="stylesheet" href="{{asset('website/asset/css/fontawsome.css')}}">
   <link rel="stylesheet" href="{{asset('website/asset/css/owl.carousel.min.css')}}">
   <link rel="stylesheet" href="{{asset('website/asset/css/checkbox.css')}}">
   <link rel="stylesheet" href="{{asset('website/asset/css/hc-offcanvas-nav.css')}}">
   <link rel="stylesheet" href="{{asset('website/asset/css/style.css')}}">
   <link rel="stylesheet" href="{{asset('website/asset/css/responsive.css')}}">
   <!-- this is for mordanizar js link -->
   <script src="{{asset('website/asset/js/vendor/modernizr-3.6.0.min.js')}}"></script>




       <!-- CSRF Token -->

    <meta name="csrf-token" content="{{ csrf_token() }}">

   <style type="text/css">
          .btn-yellow {
                      color: #2c2b2e;
                      background-color: #ffcb06;
                      border-color: #ffcb06;
                      font-weight: bold;
                      font-size: 0.8rem;
                      /*border-radius: 10rem;*/
                      padding: 0.50rem 1rem;
                  }
                   .has-error{
                          border: 2px solid #ff3030;
                      }
                      a{
                        border-radius: 0% !important;
                      }
                      button{
                        border-radius: 0% !important;
                      }
                      .jumbotron{
                        background: url("https://source.unsplash.com/1600x400/?nature");
                        border-radius: 0;
                      }
                      .jumbotron > div > h1{
                        color: #ffcb07;
                        font-weight: 800;
                      }
                      
      </style>

</head>

<body>
   <div id="banar_area">
      <header id="header-area">
         <div class="container">
            <div class="row align-items-center">
               <div class="col-xl-1">
                  <div class="logo-area">
                     <a href="{{url('/')}}">
                        <img src="{{asset('website/asset/img/logo.png')}}" alt="">
                     </a>
                  </div>
               </div>
               <div class="col-xl-10">
                  <div class="nav-area text-right">
                     <ul>
                        {{-- <li class="{{  request()->is('/')  ? 'active' : ''   }}"><a href="{{url('/')}}">Home</a></li> --}}
                        <li><a href="#">About Us</a></li>
                        <li class="{{  request()->is('team')  ? 'active' : ''   }}"><a href="{{route('team.index')}}">Team</a></li>
                        <li><a href="#">Achievements</a></li>
                        <li class="{{  request()->is('complaint')  ? 'active' : ''   }}">
                           <a href="{{route('complaint.index')}}">Complaint Book</a>
                              <div class="submenu">
                                 <ul>
                                    <li>
                                       <a href="#">COMPLAINTS <i class="fal fa-angle-right"></i></a>
                                       <div class="submenu_second">
                                          <ul>
                                             <li><a href="{{route('complaint.index')}}">VIEW PUBLIC COMPLAINTS</a></li>
                                             <li><a href="{{route('complaint.create')}}">REGISTER A COMPLAINT</a></li>
                                             <li><a href="#" data-toggle="modal" data-target="#complaint_Status_model">CHECK COMPLAINT STATUS</a></li>
                                          </ul>
                                       </div>
                                    </li>
                                    <li>
                                       <a href="#">HATE MESSAGES <i class="fal fa-angle-right"></i></a>
                                       <div class="submenu_second">
                                          <ul>
                                             <li><a href="{{ route('hateForm.index') }}">VIEW HATE MESSAGE LOGS</a></li>
                                             <li><a href="{{ route('hateForm.create') }}">REPORT A HATE MESSAGE</a></li>
                                             <li><a href="#" data-toggle="modal" data-target="#hateform_Status_model">CHECK HATE MESSAGE STATUS</a></li>
                                          </ul>
                                       </div>
                                    </li>
                                 </ul>
                              </div>
                        </li>
                        <li>
                           <a href="#">Knowledge Hub</a>
                           <div class="submenu">
                              <ul>
                                 <li><a href="#">LAWS & RULES LIBRARY</a></li>
                                 <li><a href="#">KNOWLEDGE VIDEOS</a></li>
                                 <li><a href="{{route('blogs.home')}}">BLOG/ARTICLES</a></li>
                              </ul>
                           </div>
                        </li>
                        <li>
                           <a href="{{route('contact.index')}}">Contact</a>
                           
                        </li>
                        @guest
                           <li class="header_btn color_bg"><a href="{{route('register')}}">Join Us</a></li>              
                        @endif                      
                        <li class="header_btn"><a href="{{route('campaign.listing')}}">Donate</a></li>                                    
                     </ul>
                  </div>
               </div>
               <div class="col-xl-1">
                 <div class="header_login_action text-right">
                     @if(Auth::check())
                        <a href="{{route('home')}}">Dashboard</a>
                     @else
                        <a href="{{route('login')}}"><i class="fal fa-user-check"></i> Login</a>
                     @endif
                 </div>
               </div>
            </div>
         </div>
      </header>
      <!-- start mobile haeder -->
      <div id="mobile_header">
         <div class="container">
            <div class="row align-items-center">
               <div class="col-lg-3 col-md-3 col-sm-3 col-4">
                  <div class="mobile_logo">
                     <a href="index.html">
                        <img class="img-fluid" src="{{asset('website/asset/img/logo.png')}}" alt="">
                     </a>
                  </div>
               </div>
               <div class="col-lg-9 col-md-9 col-sm-9 col-8">
                  <div class="mobile_header_right_info">
                     <div class="btn_link_item">
                        <ul>
                           <li class="btn_sp"><a href="#">Join Us</a></li>
                           <li><a href="#">Donate</a></li>
                           <li><a href="#"><i class="fal fa-user-check"></i> Login</a></li>
                        </ul>
                     </div>
                     <a class="toggle hc-nav-trigger hc-nav-1" href="#" role="button" aria-label="Open Menu" aria-controls="hc-nav-1" aria-expanded="false">
                        <span></span>
                      </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end mobile haeder -->

      <!-- start mobile toggle link area  -->
      <nav id="main-nav">
         <ul>
           <li><a href="#">Home</a></li>
           <li><a href="#">About us</a></li>
           <li><a href="#">Team</a></li>
           <li><a href="#">Achievements</a></li>
           <li><a href="#">Complaint Book</a></li>
           <li>
             <a href="#">Knowledge Hub</a>
             <ul>
               <li>
                 <a href="#">COMPLAINTS </a>
                 <ul>
                   <li><a href="#">VIEW PUBLIC COMPLAINTS</a></li>
                   <li><a href="#">REGISTER A COMPLAINT</a></li>
                   <li><a href="#">CHECK COMPLAINT STATUS</a></li>
                 </ul>
               </li>
               <li>
                  <a href="#">HATE MESSAGES  </a>
                  <ul>
                     <li><a href="#">VIEW HATE MESSAGE LOGS</a></li>
                     <li><a href="#">REPORT A HATE MESSAGE</a></li>
                     <li><a href="#">CHECK HATE MESSAGE STATUS</a></li>
                  </ul>
                </li>
             </ul>
           </li>
           <li>
            <a href="#">Contact</a>
            <ul>
               <li><a href="#">LAWS &amp; RULES LIBRARY</a></li>
               <li><a href="#">KNOWLEDGE VIDEOS</a></li>
               <li><a href="#">BLOG/ARTICLES</a></li>
            </ul>
          </li>
          <li class="sidebar_custom_btn"><a href="#">Join Us</a></li>
          <li class="sidebar_custom_btn sidebar_custom_btn2"><a href="#">Donate</a></li>
          <li class="sidebar_custom_btn sidebar_custom_btn2"><a href="#"><i class="fal fa-user-check"></i> Login</a></li>
         </ul>
       </nav>
      <!-- end mobile toggle link area  -->


      @if(request()->is('/'))
      <div class="hero_banar_area">
         <div class="container">
            <div class="row">
               <div class="col-12 mx-auto">
                  <div class="hero_banar_image">
                     <img class="img-fluid" src="{{asset('website/asset/img/hero-banar.png')}}" alt="">
                     <div class="hero_banar_content">
                        <h5>Welcome To</h5>
                        <h3>Lawyers in Action</h3>
                        <p>As we have said we are a nationwide team of lawyers under <br> the banner of ‘First Legal Aid’ ready to address your problems.</p>
                        <a href="#">Contact Us</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      @endif

      
   </div>


   @yield('content')

       <!-- Modal -->
    <div class="modal fade" id="complaint_Status_model" tabindex="-1" role="dialog" aria-labelledby="ComplaintForm"       aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
         
          <div class="modal-header">
            <h5 class="modal-title" id="ComplaintForm">Check Your Complaint Status</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <form method="GET" action="{{route('complaint.status')}}" >
                @csrf
                <div class="modal-body">
                  <div class="form-group">
                    <label for="complaint">Complaint No .</label>
                    <input type="text" name="complaint_no"  class="form-control" placeholder="Enter enter your Complaint Number" required>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-yellow">Submit</button>
                </div>
            </form>

        </div>
      </div>
    </div>

          <!-- Modal -->
    <div class="modal fade" id="hateform_Status_model" tabindex="-1" role="dialog" aria-labelledby="HateForm"       aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
         
          <div class="modal-header">
            <h5 class="modal-title" id="HateForm">Check Your Hate Form Status</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <form method="GET" action="{{route('hateform.status')}}" >
                @csrf
                <div class="modal-body">
                  <div class="form-group">
                    <label for="complaint">From No .</label>
                    <input type="text" name="number"  class="form-control" required placeholder="Enter enter your Hate Form Number">
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-yellow">Submit</button>
                </div>
            </form>

        </div>
      </div>
    </div>

   <!-- start footer area  -->
   <footer id="footer">
      <div class="container">
         <div class="row align-items-center">
            <div class="col-xl-2">
               <div class="footer_logo">
                  <a href="index.html">
                     <img class="img-fluid" src="{{asset('website/asset/img/logo-footer.png')}}" alt="">
                  </a>
                  <p>G-1, Near Cribs Hospital, 
                     Shaheen Bagh, Jamia Nagar, 
                     New Delhi-110025</p>
               </div>
            </div>
            <div class="col-xl-10 footer_link_wrapper">
               <div class="row">
                  <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6">
                     <div class="footer_link">
                        <ul>
                           <li><a href="#">Home</a></li>
                           <li><a href="#">About</a></li>
                           <li><a href="#">Team</a></li>
                           <li><a href="#">Achievements</a></li>
                           <li><a href="#">Complaint Book</a></li>
                           <li><a href="#">Knowledge Hub</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6">
                     <div class="footer_link">
                        <ul>
                           <li><a href="#">Laws & Rules Library</a></li>
                           <li><a href="#">Knowledge videos</a></li>
                           <li><a href="#">News</a></li>
                           <li><a href="#">Opinion polls</a></li>
                           <li><a href="#">Donation</a></li>
                           <li><a href="#">Career</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6">
                     <div class="footer_link">
                        <ul>
                           <li><a href="{{route('complaint.index')}}">Complaints</a></li>
                           <li><a href="{{route('complaint.create')}}">Register complaint</a></li>
                           <li><a href="{{route('complaint.index')}}">Check complaint</a></li>
                           <li><a href="javascript:void(0)">Complaint status</a></li>
                           <li><a href="{{route('contact.index')}}">Contact</a></li>
                           <li><a href="{{route('register')}}">Join</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                     <div class="social_link">
                        <h4>Follow us on:</h4>
                        <ul>
                           <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                           <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                           <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                           <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                           <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                           <li><a href="#"><i class="fab fa-wikipedia-w"></i></a></li>
                        </ul>
                     </div>
                     <div class="contact_info">
                        <ul>
                           <li>
                              <a href="#"><i class="fal fa-phone-alt"></i> <span>+91 --- --- ----</span></a>
                           </li>
                           <li><a href="#"><i class="fal fa-envelope"></i> <span>lawyersinaction@gmail.com</span></a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="container footer_copyright">
         <div class="row">
            <div class="col-12">
               <div class="footer_copyright_info text-center">
                  <p>© 2021 Digital. All Rights Reserved By Lawyers In Action</p>
               </div>
            </div>
         </div>
      </div>
   </footer>
   <!-- end footer area  -->

   
   <!-- all javascript load here -->
   <script src="{{asset('website/asset/js/vendor/jquery-3.3.1.min.js')}}"></script>
   <script src="{{asset('website/asset/js/popper.min.js')}}"></script>
   <script src="{{asset('website/asset/js/bootstrap.min.js')}}"></script>
   <script src="{{asset('website/asset/js/owl.carousel.min.js')}}"></script>
   <script src="{{asset('website/asset/js/hc-offcanvas-nav.js')}}"></script>
   <script src="{{asset('website/asset/js/custom.js')}}"></script>
   <script src="{{asset('dashboard/js/jquery.inputmask.bundle.js')}}"></script>
   
   @yield('javascript')

</body>

</html>