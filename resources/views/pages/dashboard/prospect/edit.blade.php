@extends('layouts.backend')

@section('title', 'Edit Prospect')

@section('content')

    <main class="h-full overflow-y-auto">
        <div class="container mx-auto">
            <div class="grid w-full gap-5 px-10 mx-auto md:grid-cols-12">
                <div class="col-span-12">
                    <h2 class="mt-8 mb-1 text-2xl font-semibold text-gray-700">
                        Edit Data Prospect
                    </h2>
                    <p class="text-sm text-gray-400">
                        Enter your data Correctly & Properly
                    </p>
                </div>
            </div>
        </div>

        <section class="container px-6 mx-auto mt-5">
            <div class="grid gap-5 md:grid-cols-12">
                <main class="col-span-12 p-4 md:pt-0">
                    <div class="px-2 py-2 mt-2 bg-white rounded-xl">

                        <form action="{{ route('admin.prospect.edit', $trans->id) }}" method="POST"
                            enctype="multipart/form-data">

                            @csrf

                            <div class="">
                                <div class="px-4 py-5 sm:p-6">
                                    <h2 class="mt-8 mb-1 text-2xl font-semibold text-gray-700">
                                        Data Calon Mahasiswa:
                                    </h2>
                                    <div class="grid grid-cols-6 gap-6">

                                        <div class="col-span-6">
                                            <label for="name" class="block mb-3 font-medium text-gray-700 text-md">Full Name
                                            </label>
                                            <input placeholder="Nama Calon" type="text" name="name" id="name"
                                                autocomplete="name"
                                                class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                                                value="{{ $trans->prospect->name ?? '' }}" required>

                                            @if ($errors->has('name'))
                                                <p class="text-red-500 mb-3 text-sm">{{ $errors->first('name') }}</p>
                                            @endif
                                        </div>
                                        <div class="md:col-span-6 lg:col-span-3">
                                            <label for="email" class="block mb-3 font-medium text-gray-700 text-md">Email
                                                Address</label>

                                            <input placeholder="your@email.com" type="email" name="email" id="email"
                                                autocomplete="email"
                                                class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                                                value="{{ $trans->prospect->email }}" required>

                                            @if ($errors->has('email'))
                                                <p class="text-red-500 mb-3 text-sm">{{ $errors->first('email') }}</p>
                                            @endif
                                        </div>

                                        <div class="md:col-span-6 lg:col-span-3">
                                            <label for="phone" class="block mb-3 font-medium text-gray-700 text-md">Contact
                                                Number</label>

                                            <input placeholder="your contact number" type="number" name="phone" id="phone"
                                                autocomplete="phone"
                                                class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                                                value="{{ $trans->prospect->phone ?? '' }}" required>

                                            @if ($errors->has('phone'))
                                                <p class="text-red-500 mb-3 text-sm">
                                                    {{ $errors->first('phone') }}</p>
                                            @endif
                                        </div>
                                        <div class="col-span-6">
                                            <label for="address"
                                                class="block mb-3 font-medium text-gray-700 text-md">Alamat</label>
                                            <textarea placeholder="Enter Address" type="text" name="address" id="address" autocomplete="address"
                                                class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                                                rows="4">{{ $trans->prospect->address ?? '' }}</textarea>

                                            @if ($errors->has('address'))
                                                <p class="text-red-500 mb-3 text-sm">
                                                    {{ $errors->first('address') }}</p>
                                            @endif
                                        </div>

                                        <div class="md:col-span-6 lg:col-span-3">
                                            <label for="school" class="block mb-3 font-medium text-gray-700 text-md">Sekolah
                                                Asal</label>

                                            <input placeholder="Input Sekolah Asal" type="text" name="school" id="school"
                                                autocomplete="school"
                                                class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                                                value="{{ $trans->prospect->school }}">

                                            @if ($errors->has('school'))
                                                <p class="text-red-500 mb-3 text-sm">{{ $errors->first('school') }}</p>
                                            @endif
                                        </div>

                                        <div class="md:col-span-6 lg:col-span-3">
                                            <label for="city" class="block mb-3 font-medium text-gray-700 text-md">Kota
                                                Sekolah</label>

                                            <input placeholder="Input Kota Sekolah" type="text" name="city" id="city"
                                                autocomplete="city"
                                                class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                                                value="{{ $trans->prospect->city ?? '' }}">

                                            @if ($errors->has('city'))
                                                <p class="text-red-500 mb-3 text-sm">
                                                    {{ $errors->first('city') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <h2 class="mt-8 mb-1 text-2xl font-semibold text-gray-700">
                                        Status Pendaftaran:
                                    </h2>
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="md:col-span-6 lg:col-span-3">
                                            <label for="id_registrant"
                                                class="block mb-3 font-medium text-gray-700 text-md">Kode Pendaftar
                                            </label>
                                            <input placeholder="Kode Pendaftaran" type="text" name="id_registrant"
                                                id="id_registrant" autocomplete="id_registrant"
                                                class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                                                value="{{ $trans->prospect->id_registrant ?? '' }}">

                                            @if ($errors->has('id_registrant'))
                                                <p class="text-red-500 mb-3 text-sm">
                                                    {{ $errors->first('id_registrant') }}</p>
                                            @endif
                                        </div>
                                        <div class="md:col-span-6 lg:col-span-3">
                                            <label for="route"
                                            class="block mb-3 font-medium text-gray-700 text-md">Jalur
                                                Pendaftaran </label>
                                            <select name="route" type="text"
                                            class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                                                {{ $errors->has('route') ? 'is-invalid' : '' }}"
                                                value="{{ $trans->prospect->route ?? '' }}" required>
                                                <option value=''> -- Pilih Jalur Pendaftaran -- </option>
                                                {{-- prodi mi --}}
                                                <option value="Test"> Jalur Test</option>
                                                <option value="PST"> Jalur PST</option>
                                                <option value="Bakti Guru"> Jalur Bakti Guru</option>
                                                <option value="Unggulan"> Jalur Unggulan</option>
                                                <option value="KIP"> Jalur KIP</option>
                                                <option value="Transfer LPKIA"> Transfer LPKIA</option>
                                                <option value="Transfer Non LPKIA"> Transfer Non LPKIA</option>
                                            </select>
                                            @if ($errors->has('route'))
                                                <p class="text-red-500 mb-3 text-sm">{{ $errors->first('route') }}</p>
                                            @endif
                                        </div>

                                        <div class="md:col-span-6 lg:col-span-3">
                                            <input type="hidden" value="0" name="is_iput_form">
                                            <input name='is_iput_form' type="checkbox"
                                                class="{{ $errors->has('is_iput_form') ? 'is-invalid' : '' }}" value=1
                                                @if ($trans->prospect->is_iput_form) checked @endif />
                                            @if ($errors->has('is_iput_form'))
                                                <p class="text-danger">{{ $errors->first('is_iput_form') }}</p>
                                            @endif
                                            <label class="form-label">Mendaftar</label>
                                        </div>
                                        <div class="md:col-span-6 lg:col-span-3">
                                            <input type="hidden" value="0" name="is_pay_form">
                                            <input name='is_pay_form' type="checkbox"
                                                class="{{ $errors->has('is_pay_form') ? 'is-invalid' : '' }}" value=1
                                                @if ($trans->prospect->is_pay_form) checked @endif />
                                            @if ($errors->has('is_pay_form'))
                                                <p class="text-danger">{{ $errors->first('is_pay_form') }}</p>
                                            @endif
                                            <label class="form-label">Bayar Pendaftaran</label>
                                        </div>
                                        <div class="md:col-span-6 lg:col-span-3">
                                            <input type="hidden" value="0" name="is_test">
                                            <input name='is_test' type="checkbox"
                                                class="{{ $errors->has('is_test') ? 'is-invalid' : '' }}" value=1
                                                @if ($trans->prospect->is_test) checked @endif />
                                            @if ($errors->has('is_test'))
                                                <p class="text-danger">{{ $errors->first('is_test') }}</p>
                                            @endif
                                            <label class="form-label">Lulus Tes/Sleksi</label>
                                        </div>
                                        <div class="md:col-span-6 lg:col-span-3">
                                            <input type="hidden" value="0" name="is_pay_regist">
                                            <input name='is_pay_regist' type="checkbox"
                                                class="{{ $errors->has('is_pay_regist') ? 'is-invalid' : '' }}" value=1
                                                @if ($trans->prospect->is_pay_regist) checked @endif />
                                            @if ($errors->has('is_pay_regist'))
                                                <p class="text-danger">{{ $errors->first('is_pay_regist') }}</p>
                                            @endif
                                            <label class="form-label">Bayar Regsitrasi</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="px-4 py-3 text-right sm:px-6">
                                    <a href={{ route('admin.dashboard') }} type="button"
                                        class="inline-flex justify-center px-4 py-2 mr-4 text-sm font-medium text-gray-700 bg-white border border-gray-600 rounded-lg shadow-sm hover:bg-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300"
                                        onclick="return confirm('Are you sure want to cancel?, Any changes you make will not be saved.')">
                                        Cancel
                                    </a>

                                    <button type="submit"
                                        class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-green-600 border border-transparent rounded-lg shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
                                        onclick="return confirm('Are you sure want to submit this data ?')">
                                        Save Changes
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </main>
            </div>
        </section>
    </main>

@endsection
