@extends('layouts.membership.app')
@section('title', 'Verify Account')
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
                                        <h1 class="h4 text-gray-900 mb-4">Welcome!</h1>
                                    </div>
                                    <h5><b>Congratulations!</b><br>Your account is created and an account verification link is sent to you. Please verify your account before login</h5>
                                    {{-- <div class="text-center">
                                        @if (Route::has('password.request'))
                                            <a class="small" href="{{ route('password.request') }}">Forgot Password?</a>
                                        @endif
                                    </div> --}}
                                    <div class="text-center">
                                        <a class="small" href="{{ route('login') }}">Already Verified, Please Login!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

@endsection