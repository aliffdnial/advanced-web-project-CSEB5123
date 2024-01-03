@extends('layouts.register')

@section('pagebusinessunit')
    <businessunit>Register</businessunit>
@endsection

@section('content')
    <form class="pt-1" method="POST" action="{{ route('register') }}">
    @csrf
    <div class="row mb-3">
        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
        
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="row mb-3">
        <label for="phonenum" class="col-md-4 col-form-label text-md-end">{{ __('Phone Number') }}</label>
        
        <input id="phonenum" type="text" class="form-control @error('phonenum') is-invalid @enderror" name="phonenum" value="{{ old('phonenum') }}" required autocomplete="name" autofocus>

        @error('phonenum')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="row mb-3">
        <label for="bunit" class="col-md-4 col-form-label text-md-end">{{ __('Business Unit') }}</label>
        
        <select class="form-control" name="bunit">
            <option value="">-- Please Select --</option>
            <option value="ITMS">ITMS</option>
            <option value="CCI">CCI</option>
            <option value="COE">COE</option>
            <option value="COBA">COBA</option>
            <option value="COGS">COGS</option>
        </select>
        @error('bunit')
        <span class="text-danger">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="row mb-3">
        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email  Address') }}</label>
        
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="row mb-3">
        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
        
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="row mb-3">
        <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
        
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"required autocomplete="new-password">
    </div>
    
    <div class="mt-3">
        <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">{{ __('Register') }}
        </button>
    </div>
    <div class="text-center mt-4 font-weight-light">
        Already have an account? <a href="{{ route('login') }}" class="text-primary">Login</a>
    </div>
    </form>
@endsection
