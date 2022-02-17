@extends('layouts.membership.app')
@section('title', 'Login')
@section('content')

        <div class="row justify-content-center">
        
            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" method="POST" action="{{ route('login') }}">
                                        @csrf
                                        @if(session('error')) 
                                            <div class="alert alert-danger">{{session('error')}}</div>
                                        @endif
                                        @if(session('success')) 
                                            <div class="alert alert-success">{{session('success')}}</div>
                                        @endif
                                        
                                        <div class="form-group">
                                            <label>Email:</label>
                                            <input type="email" 
                                             class="form-control  @error('email') is-invalid @enderror"
                                                name="email" value="{{ old('email') }}"  autocomplete="email" 
                                                placeholder="Enter Email Address...">
                                                 @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Password:</label>
                                            <input placeholder="Password" type="password" 
                                            class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="current-password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck"
                                                name="remember" id="" {{ old('remember') ? 'checked' : '' }}
                                                >
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-yellow btn-user btn-block">
                                            {{ __('Login') }}
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        @if (Route::has('password.request'))
                                            <a class="small" href="{{ route('password.request') }}">Forgot Password?</a>
                                        @endif
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="{{ route('register') }}">Create an Account!</a>
                                    </div>
                                  {{--   <div class="text-center">
                                        <a class="small" href="{{ route('send.verification.link.again') }}">Resend Email Verification Link!</a>
                                    </div>         --}}                            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

@endsection