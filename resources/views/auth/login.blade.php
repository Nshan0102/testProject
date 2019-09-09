@extends('layouts.app')
@section('content')
    <div class="login-dark">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="illustration">
                <i class="icon ion-ios-locked-outline"></i>
            </div>
            <div class="form-group">
                <input title="Required" placeholder="Email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <input title="Required" placeholder="Password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">Log in</button>
            </div>
            <a href="{{ route('register') }}" class="forgot">Register</a>
            <a href="{{ route('password.request') }}" class="forgot">Forgot your password?</a>
        </form>
    </div>
@endsection
