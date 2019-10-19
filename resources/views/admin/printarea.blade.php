@extends('layouts.admin')
@section('title', 'Attendance Panel')
@section('extra-css')
@endsection
@section('content')
<div class="wrapper ">
  @include('layouts.admin-sidebar')
  <div class="main-panel">
    @include('layouts.admin-nav')
    <!-- End Navbar -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-10" style="margin: 2em auto">
            <div class="card">
              <div class="card-header card-header-success">
                <h4 class="card-title">Printing Settings Panel</h4>
                <p class="card-category">Select how your prints will look like.</p>
              </div>
              <div class="card-body text-center">
                <h4 class="mt-3 mb-3 text-center">Choose Your Style</h4>
                <div class="row">
                  <div class="col-md-4">
                    <h4>Prints for all members in sanctuary</h4>
                    <a href="{{ route('members-print') }}" class="mt-3">
                      <button type="button" class="btn btn-success btn-round">Print All Members</button>
                    </a>
                  </div>
                  <div class="col-md-2">
                    <h2 class="text-center"> OR</h2>
                  </div>
                  <div class="col-md-6">
                    <form action="{{ route('subunit-print') }}" method="POST">
                      {{ csrf_field() }}
                      <div class="form-group input-group input-group-lg">
                        <select class="form-control form-control-lg" name="sub_unit" value="" required>
                          <option>--- Select Sub Unit ---</option>
                          <option value="arrangement">Arrangement</option>
                          <option value="mopping">Mopping</option>
                          <option value="sweeping">Sweeping</option>
                          <option value="rug">Rug</option>
                          <option value="white house">White House</option>
                          <option value="utility">Utility</option>
                          <option value="suveillance">Suveillance</option>
                        </select>
                      </div>
                      <button type="submit" class="btn btn-success btn-round">Print Sub Unit Members</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container-fluid">

      </div>
      @include('layouts.admin-footer')
    </div>
  </div>
</div>
@endsection
@section('extra-js')

@endsection