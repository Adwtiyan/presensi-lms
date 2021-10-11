@extends('layouts.apps.auth')
<!-- Section Title -->
@section('title')
    <title>Sign In | Amikom Center</title>
@endsection

<!-- Section Form Title -->
@section('form-title')
    <h1 class="h2">Sign In</h1>
    <p class="lead">
        to your account to continue
    </p>
@endsection

<!-- Section Form Primary -->
@section('forms')

    <form method="POST" action="{{ route('dashboard') }}">
        @csrf

        <!-- Email Address -->
        <div class="mb-3">
            <x-label class="form-label" for="email" :value="__('Email')" />

            <x-input id="email" placeholder="Enter your email" class="form-control form-control-lg" type="email" name="email" :value="old('email')" required />
        </div>

        <!-- Password -->
        <div class="mb-3">
            <x-label class="form-label" for="password" :value="__('Password')" />

            <x-input id="password" placeholder="Enter your password" class="form-control form-control-lg"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
                            <small>
                                <a href="{{ _('forgot-password') }}">Forgot password?</a>
                            </small>
        </div>

        <div>
            <label class="form-check">
                <input class="form-check-input" type="checkbox" value="remember-me" name="remember-me">
                <span class="form-check-label">
                    Remember Me
                </span>
            </label>
        </div>

        <div class="text-center mt-3">
            <button class="btn btn-lg btn-primary">
                {{ __('Sign In') }}
            </button>
        </div>
    </form>

<div class="text-center mt-4">
    <center><p>Don't have an account yet? <a href="{{ route('register') }}">Register now</a></p></center>
</div>

@endsection

