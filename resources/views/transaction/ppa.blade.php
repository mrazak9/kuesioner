@extends('layouts.app')

@section('content')
    <section class="checkout">
        <div class="container">
            <div class="row text-center pb-70">
                <div class="col-lg-12 col-12 header-wrap">
                    <p class="story">
                        PPA
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
                                <img src="{{asset('images/item_bootcamp.png')}}" alt="" class="cover">
                                <h1 class="package text-uppercase">
                                    PPA 2022
                                </h1>
                                <p class="description">
                                    Pastikan Calon mahasiswa yang di daftarkan belum mendaftar melalui 
                                    program apapun jika terjadi duplikat data, maka data yang terakhir di tambahkan akan di hapus. 
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-1 col-12"></div>
                        <div class="col-lg-6 col-12" style="padding: 30px">                            
                            <form action="{{route('transaction.store.ppa')}}" class="basic-form" method="POST">
                                @csrf
                                <h2 class="primary-header">
                                    input Data Pengusul:
                                </h2>
                                <br>
                                <div class="mb-4">
                                    <label class="form-label">Nama Lengkap</label>
                                    <input name='user_name' type="text" class="form-control" >
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Email</label>
                                    <input name='user_email' type="email" class="form-control" >
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">No. HP</label>
                                    <input name='user_phone' type="text" class="form-control" >
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">NRP/NIM</label>
                                    <input name='nim' type="text" class="form-control" >
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Asal Prodi</label>
                                    <input name='prodi_asal' type="text" class="form-control" >
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tahun Lulus</label>
                                    <input name='year' type="text" class="form-control" >
                                </div>
                                <br>
                                <h2 class="primary-header">
                                    input Data Calon Mahasiswa:
                                </h2>
                                <br>
                                <div class="mb-4">
                                    <label class="form-label">Nama Lengkap</label>
                                    <input name='name' type="text" class="form-control" >
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">No. Handphone</label>
                                    <input name='phone' type="text" class="form-control" >
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Email</label>
                                    <input name='email' type="email" class="form-control" >
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Alamat</label>
                                    <input name="address" class="form-control" >
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Asal Sekolah</label>
                                    <input name='school' type="address" class="form-control" >
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Kota Sekolah</label>
                                    <input name='city' type="address" class="form-control" >
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