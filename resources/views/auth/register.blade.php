@extends('layouts.apps.auth')
@section('forms')

<title>Sign Up | Amikom Center</title>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Header -->
        <div class="text-center mt-4">
            <p class="lead">
                Sign Up to your account to continue
            </p>
        </div>

        <!-- Name -->
        <div class="mb-3">
            <x-label class="form-label" for="name" :value="__('Name')" />

            <x-input id="name" placeholder="Enter your name" class="form-control form-control-lg" type="text" name="name" :value="old('name')" required autofocus />
        </div>

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
        </div>

        <!-- Confirm Password -->
        <div class="mb-3">
            <x-label class="form-label" for="password_confirmation" :value="__('Confirm Password')" />

            <x-input id="password_confirmation" placeholder="Confirm your password" class="form-control form-control-lg"
                            type="password"
                            name="password_confirmation" required />
        </div>
        <div class="text-center mt-3">
            <button class="btn btn-lg btn-primary">
                {{ __('Sign up') }}
            </button>
        </div>
    </form>

    <div class="text-center mt-4">
        <center><p>Already have an account? <a href="{{ route('login') }}">Login</a></p></center>
    </div>

@endsection

