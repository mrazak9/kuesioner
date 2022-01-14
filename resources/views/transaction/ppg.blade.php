@extends('layouts.app')

@section('content')
    <section class="checkout">
        <div class="container">
            <div class="row text-center pb-70">
                <div class="col-lg-12 col-12 header-wrap">
                    <p class="story">
                        PPG
                    </p>
                    <h2 class="primary-header">
                        Program Partisipasi Guru
                    </h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-9 col-12">
                    <div class="row">
                        <div class="col-lg-5 col-12">
                            <div class="item-bootcamp">
                                <img src="{{ asset('images/item_bootcamp.png') }}" alt="" class="cover">
                                <h1 class="package text-uppercase">
                                    PPG 2022
                                </h1>
                                <p class="description">
                                    Pastikan Calon mahasiswa yang di daftarkan belum mendaftar melalui
                                    program apapun jika terjadi duplikat data, maka data yang terakhir di tambahkan akan di
                                    hapus.
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-1 col-12"></div>
                        <div class="col-lg-6 col-12">
                            <h2 class="primary-header">
                                input Data Calon Mahasiswa:
                            </h2>
                            <br>
                            <form action="{{ route('transaction.store.ppg') }}" class="basic-form" method="POST">
                                @csrf
                                <div class="mb-4">
                                    <label class="form-label">Nama Lengkap</label>
                                    <input name='name' type="text"
                                        class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                        value="{{ old('name') }}" required />
                                    @if ($errors->has('name'))
                                        <p class="text-danger">{{ $errors->first('name') }}</p>
                                    @endif
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">No. Handphone</label>
                                    <input name='phone' type="text"
                                        class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}"
                                        value="{{ old('phone') }}" required />
                                    @if ($errors->has('phone'))
                                        <p class="text-danger">{{ $errors->first('phone') }}</p>
                                    @endif
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Email</label>
                                    <input name='email' type="text"
                                        class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                        value="{{ old('email') }}" required />
                                    @if ($errors->has('email'))
                                        <p class="text-danger">{{ $errors->first('email') }}</p>
                                    @endif
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Alamat</label>
                                    <input name="address"
                                        class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}"
                                        value="{{ old('address') }}" required />
                                    @if ($errors->has('address'))
                                        <p class="text-danger">{{ $errors->first('address') }}</p>
                                    @endif
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Asal Sekolah</label>
                                    <input name='school' type="text"
                                        class="form-control {{ $errors->has('school') ? 'is-invalid' : '' }}"
                                        value="{{ old('school') }}" required />
                                    @if ($errors->has('school'))
                                        <p class="text-danger">{{ $errors->first('school') }}</p>
                                    @endif
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Kota Sekolah</label>
                                    <input name='city' type="text"
                                        class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }}"
                                        value="{{ old('city') }}" required />
                                    @if ($errors->has('city'))
                                        <p class="text-danger">{{ $errors->first('city') }}</p>
                                    @endif
                                </div>
                                <button type="submit" class="w-100 btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
