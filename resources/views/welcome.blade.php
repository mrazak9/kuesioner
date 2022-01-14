@extends('layouts.app')

@section('content')

    <section class="banner">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-11 col-12">
                    <div class="row">
                        <div class="col-lg-6 col-12 copywriting">
                            <h1 class="header">
                                Bergabung bersama <span class="text-purple">Insitut Digital Ekonomi <br> LPKIA </span>
                                dengan berbagai pilihan Beasiswa
                            </h1>
                            <p class="support">
                                <b>Insitut Digital Ekonimi (IDE LPKIA)</b> Lulusannya Mudah Bekerja dan Bersertifikasi
                                Internasional
                            </p>
                            <p class="cta">
                                <a href="https://pmb.lpkia.ac.id" class="btn btn-master btn-primary">
                                    Daftar Sekarang
                                </a>
                            </p>
                        </div>
                        <div class="col-lg-6 col-12 text-center">
                            <a href="#">
                                <img src="{{ asset('images/banner.png') }}" class="img-fluid" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row brands">
                <div class="col-lg-12 col-12 text-center">
                    <img src="{{ asset('images/brands.png') }}" alt="">
                </div>
            </div>
        </div>
    </section>

    <section class="pricing">
        <div class="container">
            <div class="row pb-70">
                <div class="col-lg-5 col-12 header-wrap copywriting">
                    <p class="story">
                        Progra Mahasiswa Mandiri
                    </p>
                    <h2 class="primary-header text-white">
                        PMM 2022
                    </h2>
                    <p class="support">
                        Dapatkan kelipatan Rp. 500.000 untuk setiap calon mahasiswa yang di daftarkan.
                    </p>
                    <p class="mt-5">
                        <a href="{{ route('transaction.create.pmm') }}" class="btn btn-master btn-thirdty me-3">
                            Input PMM
                        </a>
                    </p>
                </div>
                <div class="col-lg-7 col-12">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="table-pricing ppa">
                                <p class="story text-center">
                                    Program Partisipasi Alumni
                                </p>
                                <h1 class="price text-center">
                                    PPA
                                </h1>
                                <div class="item-benefit-pricing mb-4">
                                    <img src="{{ asset('images/ic_check.svg') }}" alt="">
                                    <p>
                                        500K/siswa Regis
                                    </p>
                                    <div class="clear"></div>
                                    <div class="divider"></div>
                                </div>
                                <div class="item-benefit-pricing mb-4">
                                    <img src="{{ asset('images/ic_check.svg') }}" alt="">
                                    <p>
                                        Khusus Alumni LPKIA
                                    </p>
                                    <div class="clear"></div>
                                    <div class="divider"></div>
                                </div>
                                <p>
                                    @if (Auth::user())
                                        <a href="{{ route('transaction.create.ppa_user') }}"
                                            class="btn btn-master btn-primary w-100 mt-3">
                                            Input PPA
                                        </a>
                                    @else
                                        <a href="{{ route('transaction.create.ppa') }}"
                                            class="btn btn-master btn-primary w-100 mt-3">
                                            Input PPA
                                        </a>
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="table-pricing ppg">
                                <p class="story text-center">
                                    Program Partisipasi Guru
                                </p>
                                <h1 class="price text-center">
                                    PPG
                                </h1>
                                <div class="item-benefit-pricing mb-4">
                                    <img src="{{ asset('images/ic_check.svg') }}" alt="">
                                    <p>
                                        500K/siswa Regis
                                    </p>
                                    <div class="clear"></div>
                                    <div class="divider"></div>
                                </div>
                                <div class="item-benefit-pricing mb-4">
                                    <img src="{{ asset('images/ic_check.svg') }}" alt="">
                                    <p>
                                        Khusus Guru sekolah yang telah melakukan Kerjasama
                                    </p>
                                    <div class="clear"></div>
                                    <div class="divider"></div>
                                </div>
                                <p>
                                    <a href="{{ route('transaction.create.ppg') }}"
                                        class="btn btn-master btn-primary w-100 mt-3">
                                        Input PPG
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="testimonials">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-12">
                    <div class="row copyright">
                        <div class="col-lg-12 col-12">
                            <p>
                                All Rights Reserved. Copyright MIS IDE LPKIA 2022.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
