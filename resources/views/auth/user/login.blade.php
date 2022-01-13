@extends('layouts.app')

@section('content')
    <section class="login-user">
        <div class="left">
            <img src="{{ asset('images/ill_login_new.png') }}" alt="" class="text-center">
        </div>
        <div class="right">
            <img src="{{ asset('images/logo.png') }}" class="logo" alt="">
            <h1 class="header-third">
                Program Pratisipasi
            </h1>
            <p class="subheader">
                Silahkan login menggunakan email yang telah di daftarkan
            </p>
            <p>
                <a class="btn btn-border btn-google-login" href="{{route('user.login.google')}}">
                    <img src="{{ asset('images/ic_google.svg') }}" class="icon" alt=""> Sign In with Google
                </a>
            </p>
            <br>
            <p>
                *Jika Belum memiliki akun atau bermasalah saat login silahkan hubungi dosen wali atau Dosen PIC sekolah.
            </p>
        </div>
    </section>
@endsection
