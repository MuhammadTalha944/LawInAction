@extends('layouts.membership.app')
@section('title', 'Account Verified')
@section('content')

        <div class="row justify-content-center">
        
            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4"><b>Congratulations!</b></h1>
                                    </div>
                                    <h5>Your account is Verified but not active. Membership Incharge will let you know shortly.</h5>
                                    <div class="text-center">
                                        <a class="small" href="{{ route('login') }}">Already Activated? Please Login!</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="{{ route('register') }}">Crete Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

@endsection