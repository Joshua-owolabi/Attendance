@extends('layouts.login')
@section('title', 'Join Sanctuary')
@section('content')
<div class="card card-shadowed p-50 w-400 mb-0" style="max-width: 100%">
      <h5 class="text-uppercase text-center">Member Login</h5>
      <br><br>

      <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
          <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email or Webmail" name="email" value="{{ old('email') }}" required >

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
        </div>

        <div class="form-group">
          <input type="password" class="form-control  @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
        </div>

        <div class="form-group flexbox py-10">
          <label class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" checked name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <span class="custom-control-indicator"></span>
            <span class="custom-control-description">Remember me</span>
          </label>
            @if (Route::has('password.request'))
                <a class="text-muted hover-primary fs-13" href="{{ route('password.request') }}">
                    {{ __('Forgot Password?') }}
                </a>
            @endif
        </div>

        <div class="form-group">
          <button class="btn btn-bold btn-block btn-primary" type="submit">Login</button>
        </div>
      </form>
      <hr class="w-10">
        <p class="text-center text-muted fs-13 mt-20">Go Back To Home, <a href="/"> Home.</a></p>
      <p class="text-center text-muted fs-13 mt-20">Don't have an account? <a href="{{ route('join-sanctuary') }}">Sign up</a></p>
    </div>
    @endsection