@extends('layouts.app')

@section('content')
    <div class="login-dark">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="illustration">
                <i class="icon ion-ios-locked-outline"></i>
            </div>
            <div class="form-group">
                <input title="Required" placeholder="Name" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <input title="Required" placeholder="Email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input title="Required" placeholder="Password" id="password" minlength="6" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <input title="Required" placeholder="Password confirm" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">Register</button>
            </div>
            <a href="{{ route('login') }}" class="forgot">Log in</a>
        </form>
    </div>
@endsection
