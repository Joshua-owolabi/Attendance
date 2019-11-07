@extends('layouts.applicants')
@section('title', 'Join Sanctuary')
@section('content')
@include('layouts.applicants-navbar')
<section class="section py-150" style="background-image: url({{ asset('images/sample-2.jpg') }});" data-overlay="5">
    <div class="container">
        <h2 class="text-white text-center">Sanctuary Membership Form</h2>
        <p class="text-white text-center opacity-70 lead">Please Fill All Required Fields, Thanks.</p>
        <br>

        <form class="section-dialog section-dialog-lg bg-gray py-40" action="{{ route('membership.store') }}"
            method="POST">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group input-group input-group-lg">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" class="form-control @error('sur_name') is-invalid @enderror"
                            placeholder="Surname" name="sur_name" value="{{ old('sur_name') }}" required autofocus>
                        @error('sur_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group input-group input-group-lg">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                            placeholder="First Name" value="{{ old('first_name') }}" required autofocus
                            name="first_name">
                        @error('first_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group input-group input-group-lg">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                            name="last_name" placeholder="Last Name" value="{{ old('last_name') }}" required autofocus>
                        @error('last_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group input-group input-group-lg">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" class="form-control @error('other_names') is-invalid @enderror"
                            placeholder="Other Names (optional)" name="other_names" value="{{ old('other_names') }}"
                            autofocus>
                        @error('other_names')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row mb-20">
                <div class="col-md-6">
                    <div class="form-group input-group input-group-lg">
                        <span class="input-group-addon"><i class="fa fa-venus-mars"></i></span>
                        <select class="form-control form-control-lg" name="gender" value="{{ old('gender') }}" required>
                            <option disabled selected>--- Select Gender ---</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                        @error('gender')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group input-group input-group-lg">
                        <span class="input-group-addon"><i class="fa fa-level-up"></i></span>
                        <select class="form-control form-control-lg" name="level" value="{{ old('level') }}" required>
                            <option disabled selected>--- Select Level ---</option>
                            <option value="100">100</option>
                            <option value="200">200</option>
                            <option value="300">300</option>
                            <option value="400">400</option>
                            <option value="500">500</option>
                        </select>
                    </div>

                </div>
            </div>

            <div class="row mb-20">
                <div class="col-md-12">
                    <div class="form-group input-group input-group-lg">
                        <input type="text" class="form-control @error('department') is-invalid @enderror"
                            name="department" value="{{ old('department') }}" required
                            placeholder="Enter Your Department">
                        @error('department')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row mb-20">
                <div class="col-md-6">
                    <div class="form-group input-group input-group-lg">
                        <span class="input-group-addon"><i class="fa fa-table"></i></span>
                        <input type="date" class="form-control @error('dob') is-invalid @enderror" name="dob"
                            value="{{ old('dob') }}" required autofocus>
                        @error('dob')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group input-group input-group-lg">
                        <span class="input-group-addon"><i class="fa fa-building"></i></span>
                        <select class="form-control form-control-lg" name="hall" value="{{ old('hall') }}">
                            <option disabled selected>--- Select Hall ---</option>
                            <option>Sarah Hall</option>
                            <option>Deborah Hall</option>
                            <option>Abigail Hall</option>
                            <option>Dorcas Hall</option>
                            <option>Daniel Hall</option>
                            <option>Abraham Hall</option>
                            <option>Joseph Hall</option>
                            <option>Issac Hall</option>
                        </select>
                        @error('hall')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group input-group input-group-lg">
                <span class="input-group-addon"><i class="fa fa-building"></i></span>
                <input type="text" class="form-control @error('room_number') is-invalid @enderror"
                    placeholder="Room Number" maxlength="4" name="room_number" value="{{ old('room_number') }}"
                    required>
                @error('room_number')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group input-group input-group-lg">
                <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                <input type="text" class="form-control @error('email') is-invalid @enderror"
                    placeholder="Enter Webmail or Gmail" name="email" value="{{ old('email') }}" required>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group input-group input-group-lg">
                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                <input type="text" class="form-control @error('phone_number') is-invalid @enderror"
                    placeholder="Phone Number (optional)" name="phone_number" value="{{ old('phone_number') }}">
                @error('phone_number')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="row mb-20">
                <div class="col-md-6">
                    <div class="form-group input-group input-group-lg">
                        <span class="input-group-addon"><i class="fa fa-building"></i></span>
                        <select class="form-control form-control-lg" name="sub_unit" value="{{ old('sub_unit') }}"
                            required>
                            <option value="" selected disabled>Select Sub Unit</option>
                            <option value="arrangement">Arrangement</option>
                            <option value="mopping">Mopping</option>
                            <option value="sweeping">Sweeping</option>
                            <option value="rug">Rug</option>
                            <option value="white house">White House</option>
                            <option value="utility">Utility</option>
                            <option value="suveillance">Suveillance</option>
                        </select>
                        @error('sub_unit')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group input-group input-group-lg">
                        <span class="input-group-addon"><i class="fa fa-building"></i></span>
                        <input type="text" class="form-control @error('reg_no') is-invalid @enderror"
                            placeholder="Reg Number" name="reg_no" value="{{ old('reg_no') }}" required maxlength="7">
                        @error('reg_no')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Tell Us Your Reasons For Joining Sanctuary Unit</label>
                <textarea class="form-control @error('joining_reason') is-invalid @enderror" rows="7"
                    name="joining_reason" placeholder="Your message" value="{{ old('joining_reason') }}" required
                    autofocus></textarea>
                @error('joining_reason')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label>WHAT AREA DO YOU THINK WE NEED TO IMPROVE AS A UNIT (optional)</label>
                <textarea class="form-control @error('suggestions') is-invalid @enderror" rows="7" name="suggestions"
                    placeholder="Your message" value="{{ old('suggestions') }}" autofocus></textarea>
                @error('suggestions')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <button class="btn btn-block btn-lg btn-success">Apply</button>
        </form>

    </div>
</section>
@endsection
