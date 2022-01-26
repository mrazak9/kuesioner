@extends('layouts.app')

@section('content')
    <section class="checkout">
        <div class="container">
            <div class="row text-center pb-70">
                <div class="col-lg-12 col-12 header-wrap">
                    <p class="story">
                        PPA 2022
                    </p>
                    <h2 class="primary-header">
                        Program Partisipasi Alumni
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
                                    Perhatian!
                                </h1>
                                <p class="description">
                                    Selamat Datang di Program Partisipasi Alumni, mohon di pastikan bahwa ini adalah pertama kali anda menginput data PPA 2022.
                                    jika anda pernah menginput data sebelumnya silahkan untuk login dan tambahkan data PPA baru.
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-1 col-12"></div>
                        <div class="col-lg-6 col-12" style="padding: 30px">
                            <form action="{{ route('transaction.store.ppa') }}" class="basic-form" method="POST">
                                @csrf
                                <h2 class="primary-header">
                                    input Data Pengusul:
                                </h2>
                                <br>
                                <div class="mb-4">
                                    <label class="form-label">Nama Lengkap</label>
                                    <input name='user_name' type="text"
                                        class="form-control {{ $errors->has('user_name') ? 'is-invalid' : '' }}"
                                        value="{{ old('user_name') }}" required />
                                    @if ($errors->has('user_name'))
                                        <p class="text-danger">{{ $errors->first('user_name') }}</p>
                                    @endif
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Email</label>
                                    <input name='user_email' type="text"
                                        class="form-control {{ $errors->has('user_email') ? 'is-invalid' : '' }}"
                                        value="{{ old('user_email') }}" required />
                                    @if ($errors->has('user_email'))
                                        <p class="text-danger">{{ $errors->first('user_email') }}</p>
                                    @endif
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">No. HP</label>
                                    <input name='user_phone' type="number"
                                        class="form-control {{ $errors->has('user_phone') ? 'is-invalid' : '' }}"
                                        value="{{ old('user_phone') }}" required />
                                    @if ($errors->has('user_phone'))
                                        <p class="text-danger">{{ $errors->first('user_phone') }}</p>
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
                                    <input name='prodi_asal' type="text"
                                        class="form-control {{ $errors->has('prodi_asal') ? 'is-invalid' : '' }}"
                                        value="{{ old('prodi_asal') }}" required />
                                    @if ($errors->has('prodi_asal'))
                                        <p class="text-danger">{{ $errors->first('prodi_asal') }}</p>
                                    @endif
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
                                <br>
                                <h2 class="primary-header">
                                    input Data Calon Mahasiswa:
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
                                    <label class="form-label">No. Handphone</label>
                                    <input name='phone' type="number"
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
                                    <input name="address" type="text"
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
