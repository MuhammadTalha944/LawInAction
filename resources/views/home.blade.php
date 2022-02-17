@extends('layouts.dashboard.main')
@section('title', 'Dashboard')
@section('content')
                    <div class="row" style="">
                        <div class="col-xl-12 col-lg-12">
                            <h3>My Dashboard</h3>
                        </div>
                    </div>
                    @role('Super Admin')
                        <!-- Content Row -->
                        <div class="row">
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    <a href="{{    route('complaint_section.index')    }}">
                                                        Complaints
                                                    </a>
                                                    </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$complaint}}</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-exclamation-triangle fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                    <a href="{{    route('news.index')    }}">News</a></div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$news}}</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-list fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                    <a href="{{    route('polls.index')    }}">Polls</a></div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$polls}}</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-bell fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                    <a href="{{   route('campaign.index')   }}">Campaigns</a></div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$campaign}}</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-money-check-alt fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 

                        <!-- Content Row -->

                        <div class="row" style="">

                            <!-- Area Chart -->
                            <div class="col-xl-12 col-lg-12">
                                <div class="card shadow mb-4">
                                    <div
                                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">Memberships</h6>
                                        <div class="dropdown no-arrow">
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="chart-area">
                                            <canvas id="membership_Chart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    


@endsection
