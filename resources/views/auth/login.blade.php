{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <img src="{{ asset('img/login/login.jpg') }}" class="w-full h-[300px] object-cover" alt="">
    <form method="POST" class="px-6 py-4" action="{{ route('login') }}">
        <h1 class="text-2xl mb-7 font-medium">Login</h1>
        @if (session()->has('success'))
            <div class="w-full bg-[#D1E7DD] px-4 py-2 rounded-md mb-3 text-teal-900">
                <strong>{{ session('success') }}</strong>
            </div>
        @endif
        @csrf


        <!-- Email Address or username -->
        <div>
            <x-input-label for="id_user" :value="__('Email or Username')" />
            <x-text-input id="id_user" class="block mt-1 w-full" type="text" name="id_user" :value="old('id_user')"
                required autofocus autocomplete="id_user" />
            <x-input-error :messages="$errors->get('id_user')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-8">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

@extends('auth.authLayout')

@section('konten')
    <div class="container">
        <div class="row justify-content-center align-items-center" style="min-height: 100vh">
            <div class="col-md-12 col-lg-10">
                <div class="wrap d-md-flex">
                    @if (session('status'))
                        <div class="mb-4">
                            {{ $status }}
                        </div>
                    @endif
                    <div class="img" style="background-image: url({{ asset('img/login/login.jpg') }});">
                    </div>
                    <div class="login-wrap p-4 p-md-5">
                        <div class="d-flex">
                            <div class="w-100">
                                <h3 class="mb-4">Login</h3>
                            </div>
                        </div>
                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('success') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <form action="{{ route('login') }}" method="post" class="signin-form">
                            @csrf
                            <div class="form-group mb-3">
                                <label class="label" for="id_user">Email or Username</label>
                                <input type="text" class="form-control" placeholder="Username" id="id_user"
                                    name="id_user" value="{{ old('id_user') }}" required autofocus autocomplete="id_user">
                            </div>
                            <div class="form-group mb-3">
                                <label class="label" for="password">Password</label>
                                <input type="password" class="form-control" placeholder="Password" id="password"
                                    name="password" required autocomplete="current-password">
                            </div>
                            <div class="form-group">
                                <button type="submit"
                                    class="form-control btn btn-primary rounded submit px-3">Login</button>
                            </div>
                            {{-- <div class="form-group d-md-flex">
                            <div class="w-50 text-left">
                                <label class="checkbox-wrap checkbox-primary mb-0">Remember Me
                                    <input id="remember_me" type="checkbox" name="remember">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="w-50 text-md-right">
                                @if (Route::has('password.request'))
                                    <a class="" href="{{ route('password.request') }}">
                                        Forgot your password?
                                    </a>
                                @endif
                            </div>
                        </div> --}}
                        </form>
                        <p class="text-center">Not a member? <a href="{{ route('register') }}">Register</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
