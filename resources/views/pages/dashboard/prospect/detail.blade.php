@extends('layouts.backend')

@section('title', ' Detail Order')

@section('content')

    <main class="h-full overflow-y-auto">
        <div class="container mx-auto">
            <div class="grid w-full gap-5 px-10 mx-auto md:grid-cols-12">
                <div class="col-span-8">
                    <h2 class="mt-8 mb-1 text-2xl font-semibold text-gray-700">
                        Detail Prospect {{ $trans->route }}
                    </h2>
                    <p class="text-sm text-gray-400">
                        {{ $transUser }} Total Prospect
                    </p>
                </div>
            </div>
        </div>

        <!-- breadcrumb -->
        <nav class="mx-10 mt-8 text-sm" aria-label="Breadcrumb">
            <ol class="inline-flex p-0 list-none">
                <li class="flex items-center">
                    <a href="{{ route('admin.prospect') }}" class="text-gray-400">Prospect</a>
                    <svg class="w-3 h-3 mx-3 text-gray-400 fill-current" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 320 512">
                        <path
                            d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z" />
                    </svg>
                </li>
                <li class="flex items-center">
                    <p class="font-medium">Details Prospect</p>
                </li>
            </ol>
        </nav>

        <section class="container px-6 mx-auto mt-5">
            <div class="grid gap-5 md:grid-cols-12">
                <main class="col-span-12 p-4 md:pt-0">
                    <div class="bg-white rounded-xl">
                        <section class="pt-6 pb-20 mx-8 w-auth">
                            <div class="grid gap-5 md:grid-cols-12">
                                <main class="p-4 lg:col-span-7 md:col-span-12">
                                    <div class="content">
                                        <div>
                                            <!-- The tabs content -->
                                            <div class="leading-8 text-md">
                                                <h2 class="text-xl font-semibold">Detail <span
                                                        class="text-serv-button">Pengusul</span></h2>
                                                <div class="mt-4 mb-8 content-description">
                                                    <table>
                                                        <tr>
                                                            <td class="mb-4 font-medium">Nama</td>
                                                            <td>: </td>
                                                            <td>{{ $trans->user->name ?? '' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="mb-4 font-medium">NIM/NRP</td>
                                                            <td>: </td>
                                                            <td>{{ $trans->user->people->nim ?? '-' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="mb-4 font-medium">Email</td>
                                                            <td>: </td>
                                                            <td>{{ $trans->user->email ?? '' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="mb-4 font-medium">Phone </td>
                                                            <td>: </td>
                                                            <td>{{ $trans->user->people->phone ?? '' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="mb-4 font-medium">Asal Sekolah/Prodi</td>
                                                            <td>: </td>
                                                            <td>{{ $trans->user->people->school_origin ?? '-' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="mb-4 font-medium">Tahun Lulus</td>
                                                            <td>: </td>
                                                            <td>{{ $trans->user->people->graduation_year ?? '-' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="mb-4 font-medium">Wali/PIC</td>
                                                            <td>: </td>
                                                            <td>{{ $trans->wali->name ?? '-' }}</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <h2 class="text-xl font-semibold">Detail <span
                                                        class="text-serv-button">Calon</span></h2>
                                                <table>
                                                    <tr>
                                                        <td class="mb-4 font-medium">Nama</td>
                                                        <td>: </td>
                                                        <td>{{ $trans->prospect->name ?? '' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="mb-4 font-medium">Email</td>
                                                        <td>: </td>
                                                        <td>{{ $trans->prospect->email ?? '' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="mb-4 font-medium">Phone </td>
                                                        <td>: </td>
                                                        <td>{{ $trans->prospect->phone ?? '' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="mb-4 font-medium">Asal Sekolah</td>
                                                        <td>: </td>
                                                        <td>{{ $trans->prospect->school_origin ?? '-' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="mb-4 font-medium">Alamat</td>
                                                        <td>: </td>
                                                        <td>{{ $trans->prospect->address ?? '-' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="mb-4 font-medium">Alamat</td>
                                                        <td>: </td>
                                                        <td>{{ $trans->prospect->city ?? '-' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="mb-4 font-medium">Jalur Pendaftaran</td>
                                                        <td>: </td>
                                                        <td>{{ $trans->prospect->route ?? '-' }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </main>
                                <aside class="p-4 lg:col-span-5 md:col-span-12 md:pt-0">
                                    <div class="mb-4 border rounded-lg border-serv-testimonial-border">
                                        <div
                                            class="flex items-center px-2 py-3 mx-4 mt-4 border rounded-full border-serv-testimonial-border">
                                            <div class="flex-1 text-sm font-medium text-center">
                                                <h2 class="text-xl font-semibold">Detail PMB : <span
                                                        class="text-serv-button">{{ $trans->prospect->name ?? '' }}</span>
                                                </h2>
                                            </div>

                                        </div>
                                        <div class="px-4 pt-4 pb-2 features-list">
                                            <ul class="mb-4 text-sm list-check">
                                                <table>
                                                    <tr>
                                                        <td class="mb-4 font-medium pl-10 my-4">Id Pendaftar</td>
                                                        <td>: </td>
                                                        <td>{{ $trans->prospect->name ?? '-' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="mb-4 font-medium pl-10 my-4">Input Form</td>
                                                        <td>: </td>
                                                        <td>
                                                            @if ($trans->prospect->is_iput_form)
                                                                Yes
                                                            @else
                                                                No
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="mb-4 font-medium pl-10 my-4">Bayar Pendaftaran</td>
                                                        <td>: </td>
                                                        <td>
                                                            @if ($trans->prospect->is_pay_form)
                                                                Yes
                                                            @else
                                                                No
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="mb-4 font-medium pl-10 my-4">Bayar Pendaftaran</td>
                                                        <td>: </td>
                                                        <td>
                                                            @if ($trans->prospect->is_pay_form)
                                                                Yes
                                                            @else
                                                                No
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="mb-4 font-medium pl-10 my-4">Lulus Test</td>
                                                        <td>: </td>
                                                        <td>
                                                            @if ($trans->prospect->is_test)
                                                                Yes
                                                            @else
                                                                No
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="mb-4 font-medium pl-10 my-4">Bayar Registrasi</td>
                                                        <td>: </td>
                                                        <td>
                                                            @if ($trans->prospect->is_pay_regist)
                                                                Yes
                                                            @else
                                                                No
                                                            @endif
                                                        </td>
                                                    </tr>
                                                </table>
                                            </ul>
                                        </div>
                                        <div class="px-4">
                                            <table class="w-full mb-4">
                                                <tr>
                                                    <td class="text-sm leading-7 text-serv-text">
                                                        Status
                                                    </td>
                                                    <td class="mb-4 text-xl font-semibold text-right text-serv-button">
                                                        @if ($trans->prospect->is_iput_form && !$trans->prospect->is_pay_form)
                                                            Sudah Mengisi Form
                                                        @elseif ($trans->prospect->is_pay_form && !$trans->prospect->is_test)
                                                            Berhak Test
                                                        @elseif ($trans->prospect->is_test && !$trans->prospect->is_pay_regist)
                                                            Sudah Melakukan Test
                                                        @elseif ($trans->prospect->is_pay_regist)
                                                            Sudah melakukan Registrasi
                                                        @else
                                                            {{ $trans->status }}
                                                        @endif
                                                    </td>
                                                </tr>

                                            </table>
                                        </div>
                                    </div>
                                </aside>
                                <div class="p-4 md:text-right lg:col-span-12 md:col-span-12">
                                    <a href="{{ route('admin.prospect.show', $trans->id)}}"
                                        class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white border border-transparent rounded-lg shadow-sm bg-serv-email hover:bg-serv-email-text focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-serv-email">
                                        Edit Prospect
                                    </a>
                                    <a href="{{ route('admin.prospect.delete', $trans->id)}}"
                                        class="inline-flex justify-center px-4 py-2 mr-4 text-sm font-medium text-white bg-red-400 rounded-lg shadow-sm hover:bg-serv-email-text focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300">
                                        Delete Prospect
                                    </a>
                                </div>
                            </div>
                        </section>
                    </div>
                </main>
            </div>
        </section>
    </main>

@endsection
