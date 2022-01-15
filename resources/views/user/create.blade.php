@extends('layouts.app')

@section('content')
    <section class="checkout">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9 col-12">
                    <div class="row">
                        <div class="col-lg-6 col-12" style="padding: 30px">
                            <form action="{{ route('user.store') }}" class="basic-form" method="POST">
                                @csrf
                                <h2 class="primary-header">
                                    Input Data Pengusul :
                                </h2>
                                <br>
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
                                    <label class="form-label">Email</label>
                                    <input name='email' type="text"
                                        class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                        value="{{ old('email') }}" required />
                                    @if ($errors->has('email'))
                                        <p class="text-danger">{{ $errors->first('email') }}</p>
                                    @endif
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">No. HP</label>
                                    <input name='phone' type="number"
                                        class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}"
                                        value="{{ old('phone') }}" required />
                                    @if ($errors->has('phone'))
                                        <p class="text-danger">{{ $errors->first('phone') }}</p>
                                    @endif
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">NRP/NIM</label>
                                    <input name='nim' type="number"
                                        class="form-control {{ $errors->has('nim') ? 'is-invalid' : '' }}"
                                        value="{{ old('nim') }}" required />
                                    @if ($errors->has('nim'))
                                        <p class="text-danger">{{ $errors->first('nim') }}</p>
                                    @endif
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Asal Prodi</label>
                                    <select name="prodi_asal" type="text"
                                        class="form-control select2
                                    {{ $errors->has('prodi_asal') ? 'is-invalid' : '' }}"
                                        value="{{ old('prodi_asal') }}" required>
                                        @if ($errors->has('prodi_asal'))
                                            <p class="text-danger">{{ $errors->first('prodi_asal') }}</p>
                                        @endif
                                        <option value=''> -- Pilih Prodi Asal -- </option>
                                        <option value='MI'> Manajemen Informatika</option>
                                        <option value='STMIK'> STMIK </option>
                                        <option value='AB'> Administrasi Bisnis</option>
                                        <option value='KA'> Komputer Akuntansi</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tahun Lulus</label>
                                    <input name='year' type="number"
                                        class="form-control {{ $errors->has('year') ? 'is-invalid' : '' }}"
                                        value="{{ old('year') }}" required />
                                    @if ($errors->has('year'))
                                        <p class="text-danger">{{ $errors->first('year') }}</p>
                                    @endif
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Program Partisipasi</label>
                                    <select name="occupation" type="text"
                                        class="form-control select2{{ $errors->has('occupation') ? 'is-invalid' : '' }}"
                                        value="{{ old('occupation') }}" required>
                                        @if ($errors->has('occupation'))
                                            <p class="text-danger">{{ $errors->first('occupation') }}</p>
                                        @endif
                                        <option value=''> -- Pilih Salah Satu -- </option>
                                        <option value='Alumni'> Alumni</option>
                                        <option value='Guru'> Guru </option>
                                        <option value='Mahasiswa'> Mahasiswa </option>
                                        <option value='Dosen'> Dosen </option>
                                    </select>
                                </div>
                                <button type="submit" class="w-100 btn btn-primary">Simpan</button>
                            </form>
                        </div>
                        <div class="col-lg-1 col-12"></div>
                        <div class="col-lg-5 col-12">
                            <div class="item-bootcamp">
                                <img src="{{ asset('images/item_bootcamp.png') }}" alt="" class="cover">
                                <h1 class="package text-uppercase">
                                    Selamat Datang
                                </h1>
                                <p class="description">
                                    Daftarkan diri anda untuk mengikuti program partisipasi PMB LPKIA 2022
                                </p>
                                <a href="{{ route('login') }}" class="btn btn-primary me-3">
                                    Sign In
                                </a>
                                <p style="font-style: oblique; color: darkmagenta;">
                                    *Jika anda telah memiliki akun
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
