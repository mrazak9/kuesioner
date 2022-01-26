@extends('layouts.app')

@section('content')
    <section class="checkout">
        <div class="container">
            <div class="row text-center pb-70">
                <div class="col-lg-12 col-12 header-wrap">
                    <p class="story">
                        PMM 2022
                    </p>
                    <h2 class="primary-header">
                        Program mahasiswa Mandiri
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
                                    Selamat Datang di Program Mahasiswa Mandiri, mohon di pastikan bahwa ini adalah pertama kali anda menginput data PMM 2022.
                                    jika anda pernah menginput data sebelumnya silahkan untuk login dan tambahkan data PMM baru.
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-1 col-12"></div>
                        <div class="col-lg-6 col-12" style="padding: 30px">
                            <form action="{{ route('transaction.store.pmm_guest') }}" class="basic-form" method="POST">
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
                                    <label class="form-label">Email Fellow</label>
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
                                    <select name="prodi_asal" type="text"
                                        class="form-control select2
                                    {{ $errors->has('prodi_asal') ? 'is-invalid' : '' }}"
                                        value="{{ old('prodi_asal') }}" required>
                                        @if ($errors->has('prodi_asal'))
                                            <p class="text-danger">{{ $errors->first('prodi_asal') }}</p>
                                        @endif
                                        <option value=''> -- Pilih Prodi Asal -- </option>
                                        <option value='MI'> Manajemen Informatika</option>
                                        <option value='AB'> Administrasi Bisnis</option>
                                        <option value='KA'> Komputer Akuntansi</option>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Dosen Wali</label>
                                    <select name="id_wali" type="text"
                                        class="form-control select2
                                    {{ $errors->has('id_wali') ? 'is-invalid' : '' }}"
                                        value="{{ old('id_wali') }}" required>
                                        @if ($errors->has('id_wali'))
                                            <p class="text-danger">{{ $errors->first('id_wali') }}</p>
                                        @endif
                                        <option value=''> -- Pilih Dosen Wali -- </option>
                                        {{-- prodi mi --}}
                                        <option value= 7 > Andy Victor</option>
                                        <option value= 2 > Atep Aulia Rahman</option>
                                        <option value= 6 > Bakti Bestin</option>
                                        <option value= 5 > Rudy Sofian</option>
                                        {{-- prodi ab --}}
                                        <option value= 11 > Deden Sofyan Hamdani</option>
                                        <option value= 8 > Tjang Kian Liong</option>
                                        <option value= 10 > Tuti Sulastri</option>
                                        <option value= 9 > Tengku Ine Hendriana</option>
                                        <option value= 3 > Neng Susi Susilawati Sugiana</option>
                                        {{-- prodi ka --}}
                                        <option value= 14 > Rikky Wisnu Nugraha</option>
                                        <option value= 13 > Muhtarudin </option>
                                        <option value= 4 > Wahyu Nurjaya WK </option>
                                        <option value= 12 > Maisa Azizah Asmara </option>
                                    </select>
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
