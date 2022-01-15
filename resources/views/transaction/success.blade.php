@extends('layouts.app')

@section('content')
    <section class="checkout">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-12 col-12">
                    <img src="{{asset('images/success.svg')}}" height="250" alt="Succsess">
                </div>
                <div class=" col-lg-12 col-12 header-wrap mt-4">
                    <p class="story">
                        Yeay!
                    </p>
                    <h2 class="primary-header ">
                        Berhasil Menyimpan data
                    </h2>
                    <p>
                        Silahkan menuju halaman Dashboard dan lakukan pembayaran
                    </p>
                    <a href="{{route('dashboard')}}" class="btn btn-primary mt-3">
                        My Dashboard
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection