@extends('layouts.login')

@section('pagetitle')
    <title>ITMS Dev Login</title>
@endsection

@section('content')
<form method="POST" action="{{ route('login') }}" class="pt-3" >
@csrf
    <div class="form-group">
        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email  Address') }}</label>

        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="mt-3">
        <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">LOG IN</button>
    </div>
    <div class="my-3 d-flex justify-content-between align-items-center">
    @if (Route::has('password.request'))
        <a  href="{{ route('password.request') }}" class="auth-link text-black">{{ __('Forgot Your Password?') }}</a>
    @endif
    </div>
    <div class="text-center mt-4 font-weight-light">
        Don't have an account? <a href="{{ route('register') }}" class="text-primary">Create</a>
    </div>
</form>
@endsection
