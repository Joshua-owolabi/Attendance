@extends('layouts.admin')
@section('title', 'Member')
@section('content')
<div class="wrapper ">
    @include('layouts.admin-sidebar')
    <div class="main-panel">
        @include('layouts.admin-nav')
        <!-- End Navbar -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8 center-element">
                        <div class="card card-profile">
                            <div class="card-avatar">
                                <img class="img" src="{{ $member->avatar_link }}" />
                            </div>
                            <div class="card-body">
                                <h3 class="card-category text-gray">{{ ucfirst($member->sur_name) }}
                                    {{ ucfirst($member->first_name) }}
                                    {{ ucfirst($member->last_name) }} </h3>
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <h4 class="card-title">Unit Rank:
                                            <strong>{{ ucfirst($member->user_rank) }}</strong></h4>
                                    </div>
                                    <div class="col-md-4">
                                        <h4 class="card-title">Level: <strong>{{ ucfirst($member->level) }}
                                                Level</strong></h4>
                                    </div>
                                    <div class="col-md-4">
                                        <h4 class="card-title">
                                            Gender: <strong>{{ $member->gender }}</strong>
                                        </h4>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-8">
                                        <h4 class="card-title">
                                            Email: <strong>{{ $member->email }}</strong>
                                        </h4>
                                    </div>
                                    <div class="col-md-4">
                                        <h4 class="card-title">
                                            Reg No: <strong>{{ $member->reg_no }}</strong>
                                        </h4>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4">
                                        <h4 class="card-title">
                                            Phone: <strong>{{ $member->phone_number }}</strong>
                                        </h4>
                                    </div>
                                    <div class="col-md-8">
                                        <h4 class="card-title">
                                            Dept: <strong>{{ $member->department }}</strong>
                                        </h4>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <h4 class="card-title">
                                            Sub Unit: <strong>{{ $member->sub_unit }}</strong>
                                        </h4>
                                    </div>

                                    <div class="col-md-6">
                                        <h4 class="card-title">
                                            Date Of Birth:
                                            <strong>{{ \Carbon\Carbon::parse($member->dob)->format('D d M, Y')}}</strong>
                                        </h4>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-12">
                                        <p class="card-title">
                                            <h5>About {{ ucfirst($member->first_name) }}</h5>
                                            <strong>{{ $member->about_me }}</strong>
                                        </p>
                                    </div>
                                </div>
                                <div class="progress-container mt-3 mb-3">
                                    <span class="progress-badge">{{ ucfirst($member->first_name) }}'s Attendance
                                        Progress</span>
                                    <div class="progress">
                                        <div class="progress-bar @if($member->attendance <= 40) progress-bar-danger @else progress-bar-success @endif"
                                            role="progressbar" aria-valuenow="{{ $member->attendance }}"
                                            aria-valuemin="0" aria-valuemax="100"
                                            style="width: {{ $member->attendance }}%;"> <strong
                                                style="@if($member->attendance === 0) color: #000; @else color: #fff; @endif">{{ $member->attendance }}%</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.admin-footer')
    </div>
</div>
<div class="fixed-plugin">
    <div class="dropdown show-dropdown">
        <a href="#" data-toggle="dropdown">
            <i class="fa fa-cog fa-2x"> </i>
        </a>
        <ul class="dropdown-menu">
            <li class="header-title"> Sidebar Filters</li>
            <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger active-color">
                    <div class="badge-colors ml-auto mr-auto">
                        <span class="badge filter badge-purple" data-color="purple"></span>
                        <span class="badge filter badge-azure" data-color="azure"></span>
                        <span class="badge filter badge-green" data-color="green"></span>
                        <span class="badge filter badge-warning" data-color="orange"></span>
                        <span class="badge filter badge-danger" data-color="danger"></span>
                        <span class="badge filter badge-rose active" data-color="rose"></span>
                    </div>
                    <div class="clearfix"></div>
                </a>
            </li>
            <li class="header-title">Images</li>
            <li class="active">
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="../assets/img/sidebar-1.jpg" alt="">
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="../assets/img/sidebar-2.jpg" alt="">
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="../assets/img/sidebar-3.jpg" alt="">
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="../assets/img/sidebar-4.jpg" alt="">
                </a>
            </li>
            <li class="button-container">
                <a href="https://www.creative-tim.com/product/material-dashboard" target="_blank"
                    class="btn btn-primary btn-block">Free Download</a>
            </li>
            <!-- <li class="header-title">Want more components?</li>
            <li class="button-container">
                <a href="https://www.creative-tim.com/product/material-dashboard-pro" target="_blank" class="btn btn-warning btn-block">
                  Get the pro version
                </a>
            </li> -->
            <li class="button-container">
                <a href="https://demos.creative-tim.com/material-dashboard/docs/2.1/getting-started/introduction.html"
                    target="_blank" class="btn btn-default btn-block">
                    View Documentation
                </a>
            </li>
            <li class="button-container github-star">
                <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard"
                    data-icon="octicon-star" data-size="large" data-show-count="true"
                    aria-label="Star ntkme/github-buttons on GitHub">Star</a>
            </li>
            <li class="header-title">Thank you for 95 shares!</li>
            <li class="button-container text-center">
                <button id="twitter" class="btn btn-round btn-twitter"><i class="fa fa-twitter"></i> &middot;
                    45</button>
                <button id="facebook" class="btn btn-round btn-facebook"><i class="fa fa-facebook-f"></i> &middot;
                    50</button>
                <br>
                <br>
            </li>
        </ul>
    </div>
</div>
@endsection
