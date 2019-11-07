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
                                    <input type="text" value="{{ $query }}" name="query" class="form-control"
                                        placeholder="Search...">
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
                    <h6>{{ $users->count() }} result(s) for {{ $query }}</h6>
                    @if ($users->count() < 1) Oops No Results Found. @else @foreach ($users as $user) @if($user->
                        user_rank !== 'developer')
                        <div class="card mt-20 mb-20 search-card">
                            <div class="card-body text-center">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="card-avatar">
                                            <a href="/">
                                                <img class="img search-img" src="{{ $user->avatar_link }}" />
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <h4 class="title"> <strong>{{ ucfirst($user->sur_name) }}
                                                {{ ucfirst($user->first_name) }}
                                                {{ ucfirst($user->last_name) }}</strong></h4>
                                        <p> Department: <strong>{{ $user->department }}</strong></p>
                                        <p>Level: <strong>{{ $user->level }}</strong></p>
                                        <p>Unit Position <strong>{{ $user->user_rank }}</strong></p>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="{{ route('view-member', $user->id) }}">
                                            <button type="button" class="btn btn-success search-btn">View
                                                Profile</button>
                                        </a>
                                    </div>
                                    <div class="col-md-3 mt-0">
                                        <div class="nav-item dropdown">
                                            <a class="nav-link pt-0" href="" id="navbarDropdownProfile"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <div class="ripple-container"></div>
                                                <button type="button" class="btn btn-success search-btn">Edit
                                                    Member</button>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right"
                                                aria-labelledby="navbarDropdownProfile">
                                                <a class="dropdown-item" href="#" data-toggle="modal"
                                                    data-target="#update_user_{{ $user->id }}">Update Member</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal"
                                                    data-target="#delete_member_{{ $user->id }}">Remove
                                                    Member</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else
                        <h4>Oops No Results Found.</h4>
                        @endif
                        @endforeach
                        @endif
                </div>
            </div>
        </div>
        @foreach ($users as $user)
        @include('modals.edit_user')
        @include('modals.delete-member')
        @endforeach
    </div>
    @endsection
