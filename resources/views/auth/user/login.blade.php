@extends('layouts.app')

@section('content')
    <section class="login-user">
        <div class="left">
            <img src="{{ asset('images/ill_login_new.png') }}" alt="" class="text-center">
        </div>
        <div class="right">
            <img src="{{ asset('images/logo.png') }}" class="logo" alt="">
            <h1 class="header-third">
                Program Partisipasi
            </h1>
            <p class="subheader">
                Silahkan login menggunakan email yang telah di daftarkan
            </p>
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            {{-- <form method="POST" action="{{ route('login') }}">
                @csrf
                <!-- Email Address -->
                <div class="mb-4">
                    <label class="form-label">Email</label>
                    <input id="email" type="email" class="form-control" name="email" :value="old('email')" required />
                </div>
                <div class="mb-4">
                    <label class="form-label">Password</label>
                    <input id="password" class="form-control" type="password" name="password" required
                        autocomplete="current-password" required />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-button class="w-100 btn btn-primary">
                        {{ __('Log in') }}
                    </x-button>
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900"
                            href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>
            </form> --}}
            <div style="text-align: center;">
                <a class="btn btn-border btn-google-login" href="{{ route('user.login.google') }}">
                    <img src="{{ asset('images/ic_google.svg') }}" class="icon" alt=""> Sign In with Google
                </a>
            </div>               
           
            <br>
            <p>
                *Jika Belum memiliki akun atau bermasalah saat login silahkan hubungi dosen wali atau Dosen PIC sekolah.
            </p>
        </div>
    </section>
@endsection
