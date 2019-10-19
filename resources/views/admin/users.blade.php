@extends('layouts.admin')
@section('title', 'Our Members')
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
                  <input type="text" value="{{ request()->input('query') }}" name="query" class="form-control"
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
          <div class="card mt-20">
            <div class="card-header card-header-success">
              <h4 class="card-title ">Sanctuary Members</h4>
              <p class="card-category"></p>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-success">
                    <tr>
                      <th>
                        ID
                      </th>
                      <th>
                        Name
                      </th>
                      <th>
                        Email
                      </th>
                      <th>
                        Level
                      </th>
                      <th>
                        Unit Rank
                      </th>
                      <th>
                        Sub Unit
                      </th>
                      <th>
                        Attendance(%)
                      </th>
                      <th>
                        Total Attended
                      </th>
                      <th>
                        Actions
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($users->count() > 0)
                    @foreach($users as $user)
                    <tr>
                      <td>
                        {{$loop->iteration}}
                      </td>
                      <td>
                        {{ ucfirst($user->sur_name) }} {{ ucfirst($user->first_name) }}
                      </td>
                      <td>
                        {{ $user->email }}
                      </td>
                      <td>
                        {{ $user->level }}
                      </td>
                      <td>
                        {{ ucfirst($user->user_rank) }}
                      </td>
                      <td>
                        {{ ucfirst($user->sub_unit) }}
                      </td>
                      <td>
                        {{ ucfirst($user->attendance) }}%
                      </td>
                      <td>
                        {{ ucfirst($user->no_attended) }}/{{ $total_attendance}}
                      </td>
                      <td>
                        <div class="nav-item dropdown">
                          <a class="nav-link" href="" id="navbarDropdownProfile" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons text-success">menu</i>
                            <div class="ripple-container"></div>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                            <a class="dropdown-item" href="#" data-toggle="modal"
                              data-target="#update_user_{{ $user->id }}">Update Member</a>
                            <a class="dropdown-item" href="#" data-toggle="modal"
                              data-target="#delete_member_{{ $user->id }}">Remove Member</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('view-member', $user->id) }}">View Profile</a>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <!-- TODO: create printing view for printing all users -->
                    @endforeach
                    @else
                    <p>No Sanctuary members yet.</p>
                    @endif
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      @foreach ($users as $user)
      @include('modals.edit_user')
      @include('modals.delete-member')
      @endforeach
    </div>
  </div>
</div>
@endsection