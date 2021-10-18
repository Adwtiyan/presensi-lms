@extends('layouts.apps.auth')
<!-- Section Title -->
@section('title')
<title>Sign Up | Amikom Center</title>
@endsection

<!-- Section Form Title -->
@section('form-title')
<h1 class="h2">Sign Up</h1>
<p class="lead">
    to your account to continue
</p>
@endsection

<!-- Section Form Primary -->
@section('forms')
<form method="POST" action="{{ route('register') }}">
    @csrf

    <!-- Name -->
    <div class="mb-3">
        <x-label class="form-label" for="name" :value="__('Name')" />

        <x-input id="name" placeholder="Enter your name" class="form-control form-control-lg" type="text" name="name"
            :value="old('name')" required autofocus />
    </div>

    <!-- Email Address -->
    <div class="mb-3">
        <x-label class="form-label" for="email" :value="__('Email')" />

        <x-input id="email" placeholder="Enter your email" class="form-control form-control-lg" type="email"
            name="email" :value="old('email')" required />
    </div>

    <!-- Password -->
    <div class="mb-3">
        <x-label class="form-label" for="password" :value="__('Password')" />

        <x-input id="password" placeholder="Enter your password" class="form-control form-control-lg" type="password"
            name="password" required autocomplete="new-password" />
    </div>

    <!-- Confirm Password -->
    <div class="mb-3">
        <x-label class="form-label" for="password_confirmation" :value="__('Confirm Password')" />

        <x-input id="password_confirmation" placeholder="Confirm your password" class="form-control form-control-lg"
            type="password" name="password_confirmation" required />
    </div>
    <div class="text-center mt-3">
        <button class="btn btn-lg btn-primary">
            {{ __('Sign up') }}
        </button>
    </div>
</form>

<div class="text-center mt-4">
    <center>
        <p>Already have an account? <a href="{{ _('login') }}">Sign In</a></p>
    </center>
</div>

@endsection
