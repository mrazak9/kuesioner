@extends('layouts.app')

@section('content')
    <section class="checkout">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-12 col-12">
                    <img src="{{asset('images/404-Error-Page.svg')}}" height="250" class="mb-5" alt=" ">
                </div>
                <div class=" col-lg-12 col-12 header-wrap mt-4">
                    <p class="story">
                        Gagal Login!
                    </p>
                    <h2 class="primary-header ">
                        Email anda tidak terdaftar
                    </h2>
                    <p>
                        Silahkan hubungi dosen wali, Deson PIC atau BAU LPKIA
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection