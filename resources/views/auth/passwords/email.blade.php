@extends('layouts.app')

@section('content')
    <div class="login-dark">
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="illustration">
                <i class="icon ion-ios-locked-outline"></i>
            </div>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="form-group">
                <input title="Required" placeholder="Email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">Send</button>
            </div>
            <a href="{{ route('login') }}" class="forgot">Log in</a>
            <a href="{{ route('register') }}" class="forgot">Register</a>
        </form>
    </div>
@endsection
