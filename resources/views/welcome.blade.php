@extends('layouts.app')

@section('content')

    <section class="banner">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-11 col-12">
                    <div class="row">
                        <div class="col-lg-6 col-12 copywriting">
                            <h1 class="header">
                                Bergabung bersama <span class="text-purple">Institut Digital Ekonomi <br> LPKIA </span>
                                dengan berbagai pilihan Beasiswa
                            </h1>
                            <p class="support">
                                <b>Insitut Digital Ekonomi (IDE LPKIA)</b> Lulusannya Mudah Bekerja dan Bersertifikasi
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
                    <img style="margin:20px 20px 0px 0px" src="{{ asset('images/microsoft.png') }}" alt="">
                    <img style="margin:20px 20px 0px 0px" src="{{ asset('images/mikrotik.png') }}" alt="">
                    <img style="margin:20px 20px 0px 0px" src="{{ asset('images/oracle.png') }}" alt="">
                    <img style="margin:20px 20px 0px 0px" src="{{ asset('images/cisco.png') }}" alt="">
                    <img style="margin:20px 20px 0px 0px" src="{{ asset('images/ibm.png') }}" alt="">
                    <img style="margin:20px 20px 0px 0px" src="{{ asset('images/ets-toeic.png') }}" alt="">
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
                        Khusus Mahasiswa Aktif LPKIA! Dapatkan kesempatan meraih potongan biaya kuliah dengan mengikuti program PMM.
                    </p>
                    <p class="mt-5">
                        @if (Auth::user())
                            @if (Auth::user()->occupation == 'Mahasiswa')
                                <a href="{{ route('transaction.create.pmm') }}" class="btn btn-master btn-thirdty me-3">
                                    Input PMM
                                </a>
                            @elseif (Auth::user()->occupation != 'Mahasiswa')
                                {{-- <a href="{{ route('home') }}" class="btn btn-master btn-primary w-100 mt-3">
                                    Input PMM
                                </a> --}}
                            @endif
                        @else
                            <a href="{{ route('transaction.create.pmm_guest') }}" class="btn btn-master btn-thirdty me-3">
                                Input PMM
                            </a>
                        @endif
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
                                        Khusus Alumni LPKIA
                                    </p>
                                    <div class="clear"></div>
                                    <div class="divider"></div>
                                </div>
                                <div class="item-benefit-pricing mb-4">
                                    <img src="{{ asset('images/ic_check.svg') }}" alt="">
                                    <p>
                                        Tahun lulus tidak dibatasi
                                    </p>
                                    <div class="clear"></div>
                                    <div class="divider"></div>
                                </div>
                                <p>
                                    @if (Auth::user())
                                        @if (Auth::user()->occupation == 'Alumni')
                                            <a href="{{ route('transaction.create.ppa_user') }}"
                                                class="btn btn-master btn-primary w-100 mt-3">
                                                Input PPA
                                            </a>
                                        @elseif (Auth::user()->occupation != 'Alumni')
                                            {{-- <a href="{{ route('home') }}" class="btn btn-master btn-primary w-100 mt-3">
                                                Input PPA
                                            </a> --}}
                                        @endif
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
                                        Untuk Guru SMA/SMK Sederajat
                                    </p>
                                    <div class="clear"></div>
                                    <div class="divider"></div>
                                </div>
                                <div class="item-benefit-pricing mb-4">
                                    <img src="{{ asset('images/ic_check.svg') }}" alt="">
                                    <p>
                                        Guru sekolah yang telah melakukan Kerjasama
                                    </p>
                                    <div class="clear"></div>
                                    <div class="divider"></div>
                                </div>
                                <p>
                                    @if (Auth::user())
                                        @if (Auth::user()->occupation == 'Guru')
                                            <a href="{{ route('transaction.create.ppg') }}"
                                                class="btn btn-master btn-primary w-100 mt-3">
                                                Input PPG
                                            </a>
                                        @elseif (Auth::user()->occupation != 'Guru')
                                            {{-- <a href="{{ route('home') }}" class="btn btn-master btn-primary w-100 mt-3">
                                                Input PPG
                                            </a> --}}
                                        @endif
                                    @else
                                        <a href="{{ route('transaction.create.ppg_guest') }}"
                                            class="btn btn-master btn-primary w-100 mt-3">
                                            Input PPG
                                        </a>
                                    @endif

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
</section @endsection
