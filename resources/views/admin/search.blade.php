@extends('layouts.admin')
@section('title', 'Search Results')
@section('content')
<div class="wrapper ">
  @include('layouts.admin-sidebar')
  <div class="main-panel">
    @include('layouts.admin-nav')
    <div class="content">
      <div class="container-fuild">
        <div class="col-md-12">
          <div class="col-md-6" style="margin: 0 auto;">
            <form class="navbar-form" action="{{ route('search-members') }}" method="GET">
              <span class="bmd-form-group">
                <div class="input-group no-border">
                  <input type="text" value="{{ $query }}" name="query" class="form-control" placeholder="Search...">
                  <button type="submit" class="btn btn-white btn-round btn-just-icon">
                    <i class="material-icons">search</i>
                    <div class="ripple-container"></div>
                  </button>
                </div>
              </span>
            </form>
            @error('query')
            <div class="alert alert-danger mt-3 mb-3" role="alert">
              <strong>{{ $message }}</strong>
            </div>
            @enderror
          </div>
          <h4>Sanctuary Members Search Results</h4>
          <h6>{{ $members->count() }} result(s) for {{ $query }}</h6>
          @if ($members->count() < 1) Oops No Results Found. @else @foreach ($members as $member) <div
            class="card mt-20 mb-20 search-card">
            <div class="card-body text-center">
              <div class="row">
                <div class="col-md-3">
                  <div class="card-avatar">
                    <a href="/">
                      <img class="img search-img" src="{{ $member->avatar_link }}" />
                    </a>
                  </div>
                </div>
                <div class="col-md-5">
                  <h4 class="title"> <strong>{{ ucfirst($member->sur_name) }} {{ ucfirst($member->first_name) }}
                      {{ ucfirst($member->last_name) }}</strong></h4>
                  <p> Department: <strong>{{ $member->department }}</strong></p>
                  <p>Level: <strong>{{ $member->level }}</strong></p>
                  <p>Unit Position <strong>{{ $member->user_rank }}</strong></p>
                </div>
                <div class="col-md-4">
                  <a href="{{ route('view-member', $member->id) }}">
                    <button type="button" class="btn btn-success search-btn">View Profile</button>
                  </a>
                </div>
              </div>
            </div>
        </div>
        @endforeach
        @endif
      </div>
    </div>
  </div>
</div>
@endsection