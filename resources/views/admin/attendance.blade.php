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
                    <div class="col-md-7">
                        <div class="card">
                            <div class="card-header card-header-success">
                                <h4 class="card-title">Attendance Settings Panel</h4>
                                <p class="card-category">Pick attendance date. Reset members attendance</p>
                            </div>
                            <div class="card-body">
                                <h4 class="mt-3 mb-3">Pick New Attendance Date.</h4>
                                <form action="{{ route('pick-date') }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <div class='input-group'>
                                            <input class="date form-control" type="date" id="datepicker"
                                                name="att_date">
                                            @error('att_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success btn-round">Pick Date</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-header card-header-success">
                                <h4 class="card-title">Take Members Attendance</h4>
                                <p class="card-category">Use Reg number to take attendance</p>
                            </div>
                            <div class="card-body">
                                <h4 class="mt-3 mb-3">Enter member reg number for attendance taking, thanks.</h4>
                                <form action="{{ route('take-attendance') }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="form-group input-group input-group-lg">
                                        <input type="text" class="form-control @error('reg_no') is-invalid @enderror"
                                            placeholder="Reg Number" name="reg_no" value="{{ old('reg_no') }}"
                                            maxlength="7">
                                        @error('reg_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-success btn-round">Take Attendance</button>
                                </form>
                                <div class="text-center mt-3">
                                    <h4>Reset All Attendance</h4>
                                    <a class="btn btn-success btn-round" href="#" data-toggle="modal"
                                        data-target="#reset_attendance">Reset
                                        Attendance</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">

            </div>
            @include('layouts.admin-footer')
            @include('modals.reset-attendance')
        </div>
    </div>
</div>
@endsection
@section('extra-js')

@endsection
