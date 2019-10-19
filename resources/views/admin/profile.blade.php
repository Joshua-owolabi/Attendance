@extends('layouts.admin')
@section('title', 'Your Profile')
@section('content')
<div class="wrapper ">
  @include('layouts.admin-sidebar')
  <div class="main-panel">
    @include('layouts.admin-nav')
    <!-- End Navbar -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-7">
            <div class="card">
              <div class="card-header card-header-success">
                <h4 class="card-title">Edit Profile</h4>
                <p class="card-category">Complete your profile</p>
              </div>
              <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
                @endif
                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="bmd-label-floating" for="gender">Gender</label>
                        <select class="form-control" name="gender" id="gender" value=" {{$user->gender}}">
                          <option value=" {{$user->gender}}" selected>{{ ucfirst($user->gender) }}</option>
                          <option value="male">Male</option>
                          <option value="female">Female</option>
                        </select>

                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="bmd-label-floating" for="level">Level</label>
                        <select class="form-control" id="level" name="level" value="{{$user->level}}">
                          <option value="{{$user->level}}" selected>{{ $user->level }}</option>
                          <option value="100">100</option>
                          <option value="200">200</option>
                          <option value="300">300</option>
                          <option value="400">400</option>
                          <option value="500">500</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="bmd-label-floating" for="hall" name="hall">Hall Of Residence</label>
                        <select class="form-control" id="hall" name="hall" value="{{$user->hall}}">
                          <option value="{{$user->hall}}" selected>{{ $user->hall }}</option>
                          <option value="Abigail Hall">Abigail Hall</option>
                          <option value="Abraham Hall">Abraham Hall</option>
                          <option value="Dorcas Hall">Dorcas Hall</option>
                          <option value="Daniel Hall">Daniel Hall</option>
                          <option value="Deborah Hall">Deborah Hall</option>
                          <option value="Joseph Hall">Joseph Hall</option>
                          <option value="Issac Hall">Issac Hall</option>
                          <option value="Sarah Hall">Sarah Hall</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="bmd-label-floating" for="department">Department</label>
                        <select class="form-control" id="department" name="department" value="{{$user->department}}">
                          <option value="{{$user->department}}" selected>{{ $user->department }}</option>
                          <option value="Accounting">Accounting</option>
                          <option value="Agricultural Extension & Economics">Agricultural Extension & Economics</option>
                          <option value="Animal Science">Animal Science</option>
                          <option value="Agric & Bio Systems Engineering">Agric & Bio Systems Engineering</option>
                          <option value="Banking and Finance">Banking and Finance</option>
                          <option value="Business Administrtion">Business Administration</option>
                          <option value="Computer Science">Computer Science</option>
                          <option value="Civil Engineering">Civil Engineering</option>
                          <option value="Chemical Engineering">Chemical Engineering</option>
                          <option value="Crop & Soil Science">Crop & Soil Science</option>
                          <option value="Electrical & Information Engineering"> Electrical & Information Engineering
                          </option>
                          <option value="Economics">Economics</option>
                          <option value="Mechanical Engineering">Mechanical Engineering</option>
                          <option value="Micro Biology">Micro Biology</option>
                          <option value="Biochemistry">Biochemistry</option>
                          <option value="Industrial Physics">Industrial Physics</option>
                          <option value="Industrial Mathematics">Industrial Mathematics</option>
                          <option value="Mass Communication">Mass Communication</option>
                          <option value="Sociology">Sociology</option>
                          <option value="International Relations">International Relations</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="bmd-label-floating">Room Number</label>
                        <input type="text" class="form-control" value="{{ $user->room_number }}" name="room_number"
                          maxlength="4">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="bmd-label-floating">Phone Number</label>
                        <input type="text" class="form-control" value="{{ $user->phone_number }}" name="phone_number"
                          maxlength="11">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="bmd-label-floating">Old Password</label>
                        <input type="password" class="form-control" name="password">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="bmd-label-floating">New Password</label>
                        <input type="password" class="form-control" name="new_password">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="bmd-label-floating">Confirm Password</label>
                        <input type="password" class="form-control" name="confirm_password">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>About Me</label>
                        <div class="form-group">
                          <label class="bmd-label-floating"> Tell us a little about yourself </label>
                          <textarea class="form-control" rows="5" name="about_me"
                            value="{{ $user->about_me }}"></textarea>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-md-12">
                      <label for="avatar" class="bmd-label-floating"> Add profile image (max: 2MB)</label><br>
                      <input type="file" name="avatar" id="avatar">
                    </div>
                  </div>
                  <button type="submit" class="btn btn-success pull-right">Update Profile</button>
                  <div class="clearfix"></div>
                </form>
              </div>
            </div>
          </div>
          <!-- TODO: add more departments to the department list -->
          <div class="col-md-5">
            <div class="card card-profile">
              <div class="card-avatar">
                <a href="/">
                  <img class="img" src="{{ $user->avatar_link }}" />
                </a>
              </div>
              <div class="card-body">
                <h3 class="card-category text-gray">{{ ucfirst($user->sur_name) }} {{ ucfirst($user->first_name) }}
                  {{ ucfirst($user->last_name) }} </h3>
                <div class="row mb-3">
                  <div class="col">
                    <h4 class="card-title">Unit Rank: <strong>{{ ucfirst($user->user_rank) }}</strong></h4>
                  </div>
                  <div class="col">
                    <h4 class="card-title">Level: <strong>{{ ucfirst($user->level) }} Level</strong></h4>
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col">
                    <h4 class="card-title">
                      Email: <strong>{{ $user->email }}</strong>
                    </h4>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col">
                    <h4 class="card-title">
                      Sub Unit: <strong>{{ ucfirst($user->sub_unit) }}</strong>
                    </h4>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col">
                    <h4 class="card-title">
                      Date Of Birth: <strong>{{ \Carbon\Carbon::parse($user->dob)->format('D d M, Y')}}</strong>
                    </h4>
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-md-5">
                    <h4 class="card-title">
                      Gender: <strong>{{ $user->gender }}</strong>
                    </h4>
                  </div>
                  <div class="col">
                    <h4 class="card-title">
                      Phone: <strong>{{ $user->phone_number }}</strong>
                    </h4>
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-md-12">
                    <h4 class="card-title">
                      Dept: <strong>{{ $user->department }}</strong>
                    </h4>
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-md-12">
                    <p class="card-title">
                      <h5>About Me</h5>
                      <strong>{{ $user->about_me }}</strong>
                    </p>
                  </div>
                </div>
                <div class="progress-container mt-3">
                  <span class="progress-badge">Your Attendance Progress</span>
                  <div class="progress">
                    <div
                      class="progress-bar @if($user->attendance <= 40) progress-bar-danger @else progress-bar-success @endif"
                      role="progressbar" aria-valuenow="{{ $user->attendance }}" aria-valuemin="0" aria-valuemax="100"
                      style="width: {{ $user->attendance }}%;"> <strong
                        style="@if($user->attendance === 0) color: #000; @else color: #fff; @endif">{{ $user->attendance }}%</strong>
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
        <button id="twitter" class="btn btn-round btn-twitter"><i class="fa fa-twitter"></i> &middot; 45</button>
        <button id="facebook" class="btn btn-round btn-facebook"><i class="fa fa-facebook-f"></i> &middot; 50</button>
        <br>
        <br>
      </li>
    </ul>
  </div>
</div>
@endsection