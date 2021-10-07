<head>
    @include('includes.css')
    <link rel="shortcut icon" href="{{ asset('assets/admin-kit/img/logo.jfif') }}" type="image/x-icon">

    <title>Sign In | Amikom Center</title>
</head>

<body>
    <main class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div class="row vh-100">
                <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">

                        <x-guest-layout>
                            <x-auth-card>
                                <x-slot name="logo">
                                    <a href="{{ asset('assets/admin-kit/img/logo.jfif') }}">
                                        <img src="{{ asset('assets/admin-kit/img/logo.jfif') }}" alt="Amikom Center"
                                        class="img-fluid rounded-circle" width="132" height="132" />
                                    </a>
                                </x-slot>

                                <!-- Validation Errors -->
                                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <!-- Email Address -->
                                    <div class="mt-4">
                                        <x-label for="email" :value="__('Email')" />

                                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                                    </div>

                                    <!-- Password -->
                                    <div class="mt-4">
                                        <x-label for="password" :value="__('Password')" />

                                        <x-input id="password" class="block mt-1 w-full"
                                                        type="password"
                                                        name="password"
                                                        required autocomplete="new-password" />
                                    </div>

                                    <div class="flex items-center justify-end mt-4">
                                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                                            {{ __('Register') }}
                                        </a>

                                        <x-button class="ml-4">
                                            {{ __('Sign In') }}
                                        </x-button>
                                    </div>
                                </form>
                            </x-auth-card>
                        </x-guest-layout>


                    </div>
                </div>
            </div>
        </div>
    </main>
    @include('includes.js')

</body>

