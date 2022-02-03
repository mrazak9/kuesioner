@extends('layouts.app')

@section('content')
    <section class="checkout">
        <div class="container">
            <div class="row text-center pb-70">
                <div class="col-lg-12 col-12 header-wrap">
                    <p class="story">
                        PMM
                    </p>
                    <h2 class="primary-header">
                        Program Mahasiswa Mandiri
                    </h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-9 col-12">
                    <div class="row">

                        <div class="col-lg-12 col-12">
                            <form action="{{ route('transaction.edit', $trans->id) }}" class="basic-form"
                                method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <h2 class="primary-header">
                                            Update Data Calon Mahasiswa:
                                        </h2>
                                        <br>
                                        <div class="mb-4">
                                            <label class="form-label">Nama Lengkap</label>
                                            <input name='name' type="text"
                                                class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                                value="{{ old('name') ?: $trans->prospect->name }}" required />
                                            @if ($errors->has('name'))
                                                <p class="text-danger">{{ $errors->first('name') }}</p>
                                            @endif
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">No. Handphone</label>
                                            <input name='phone' type="text"
                                                class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}"
                                                value="{{ old('phone') ?: $trans->prospect->phone }}" required />
                                            @if ($errors->has('phone'))
                                                <p class="text-danger">{{ $errors->first('phone') }}</p>
                                            @endif
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Email</label>
                                            <input name='email' type="text"
                                                class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                                value="{{ old('email') ?: $trans->prospect->email }}" required />
                                            @if ($errors->has('email'))
                                                <p class="text-danger">{{ $errors->first('email') }}</p>
                                            @endif
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Alamat</label>
                                            <input name="address" type="text"
                                                class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}"
                                                value="{{ old('address') ?: $trans->prospect->address }}" required />
                                            @if ($errors->has('address'))
                                                <p class="text-danger">{{ $errors->first('address') }}</p>
                                            @endif
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Asal Sekolah</label>
                                            <input name='school' type="text"
                                                class="form-control {{ $errors->has('school') ? 'is-invalid' : '' }}"
                                                value="{{ old('school') ?: $trans->prospect->school }}" required />
                                            @if ($errors->has('school'))
                                                <p class="text-danger">{{ $errors->first('school') }}</p>
                                            @endif
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Kota Sekolah</label>
                                            <input name='city' type="text"
                                                class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }}"
                                                value="{{ old('city') ?: $trans->prospect->city }}" required />
                                            @if ($errors->has('city'))
                                                <p class="text-danger">{{ $errors->first('city') }}</p>
                                            @endif
                                        </div>
                                        <button type="submit" class="w-100 btn btn-primary">Update</button>
                                    </div>
                                    <div class="col-lg-1 col-12"></div>
                                    <div class="col-lg-5 col-12">
                                        <h2 class="primary-header">
                                            Status Pendaftaran Calon Mahasiswa:
                                        </h2>
                                        <br>
                                        <div class="mb-4">
                                            <label class="form-label">No. Pendaftaran PMB</label>
                                            <input name='id_registrant' type="text"
                                                class="form-control {{ $errors->has('id_registrant') ? 'is-invalid' : '' }}"
                                                value="{{ old('id_registrant') ?: $trans->prospect->id_registrant }}"
                                                required />
                                            @if ($errors->has('id_registrant'))
                                                <p class="text-danger">{{ $errors->first('id_registrant') }}</p>
                                            @endif
                                        </div>
                                        <div class="mb-4">
                                            <input type="hidden" value="0" name="is_pay_regist">
                                            <input name='is_iput_form' type="checkbox"
                                                class="{{ $errors->has('is_iput_form') ? 'is-invalid' : '' }}"
                                                value=1
                                                @if ($trans->prospect->is_iput_form)
                                                    checked
                                                @endif
                                            />
                                            @if ($errors->has('is_iput_form'))
                                                <p class="text-danger">{{ $errors->first('is_iput_form') }}</p>
                                            @endif
                                            <label class="form-label">Mendaftar</label>
                                        </div>
                                        <div class="mb-4">
                                            <input type="hidden" value="0" name="is_pay_form">
                                            <input name='is_pay_form' type="checkbox"
                                                class="{{ $errors->has('is_pay_form') ? 'is-invalid' : '' }}"
                                                value=1
                                                @if ($trans->prospect->is_pay_form)
                                                    checked
                                                @endif
                                            />
                                            @if ($errors->has('is_pay_form'))
                                                <p class="text-danger">{{ $errors->first('is_pay_form') }}</p>
                                            @endif
                                            <label class="form-label">Bayar Pendaftaran</label>
                                        </div>
                                        <div class="mb-4">
                                            <input type="hidden" value="0" name="is_test">
                                            <input name='is_test' type="checkbox"
                                                class="{{ $errors->has('is_test') ? 'is-invalid' : '' }}"
                                                value=1
                                                @if ($trans->prospect->is_test)
                                                    checked
                                                @endif                
                                            />
                                            @if ($errors->has('is_test'))
                                                <p class="text-danger">{{ $errors->first('is_test') }}</p>
                                            @endif
                                            <label class="form-label">Lulus Tes/Sleksi</label>
                                        </div>
                                        <div class="mb-4">
                                            <input type="hidden" value="0" name="is_pay_regist">
                                            <input name='is_pay_regist' type="checkbox"
                                                class="{{ $errors->has('is_pay_regist') ? 'is-invalid' : '' }}"
                                                value=1
                                                @if ($trans->prospect->is_pay_regist)
                                                    checked
                                                @endif   
                                            />
                                            @if ($errors->has('is_pay_regist'))
                                                <p class="text-danger">{{ $errors->first('is_pay_regist') }}</p>
                                            @endif
                                            <label class="form-label">Bayar Regsitrasi</label>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
