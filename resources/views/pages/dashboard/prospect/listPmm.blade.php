@extends('layouts.backend')

@section('title', ' List PMM')

@section('content')

    <main class="h-full overflow-y-auto">
        <div class="container mx-auto">
            <div class="grid w-full gap-5 px-10 mx-auto md:grid-cols-12">
                <div class="col-span-8">
                    <h2 class="mt-8 mb-1 text-2xl font-semibold text-gray-700">
                        My Orders
                    </h2>
                    <p class="text-sm text-gray-400">
                        {{ $partisipantpmm }} Total PMM
                    </p>
                </div>
                <div class="col-span-4 lg:text-right">

                </div>
            </div>
        </div>

        <section class="container px-6 mx-auto mt-5">
            <div class="grid gap-5 md:grid-cols-12">
                <main class="col-span-12 p-4 md:pt-0">
                    <div class="px-6 py-2 mt-2 bg-white rounded-xl">
                        <p hidden>{{ $tmp = 1 }}</p>
                        <table class="w-full" aria-label="Table">
                            <thead>
                                <tr class="text-sm font-normal text-left text-gray-900 border-b border-b-gray-600">
                                    <th class="py-4" scope="">No</th>
                                    <th class="py-4" scope="">Nama Pengusul</th>
                                    <th class="py-4" scope="">Wali/PIC</th>
                                    <th class="py-4" scope="">Nama Calon</th>
                                    <th class="py-4" scope="">Asal Sekolah</th>
                                    <th class="py-4" scope="">Handphone</th>
                                    <th class="py-4" scope="">Jalur</th>
                                    <th class="py-4" scope="">Status</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">

                                @forelse ($listPmm as $lpmm)
                                    <tr class="text-gray-700 border-b">
                                        <td class="px-1 py-5 text-sm w-2/8">
                                            <div class="flex items-center text-sm">
                                                <div>
                                                    <p class="font-medium text-black">{{ $tmp++ }}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-1 py-5 text-sm w-2/8">
                                            <div class="flex items-center text-sm">
                                                <div>
                                                    <p class="font-medium text-black">{{ $lpmm->user->name ?? '' }}
                                                    </p>
                                                    <p class="text-sm text-gray-400">
                                                        {{ $lpmm->user->occupation ?? '' }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-1 py-5 text-sm w-2/8">
                                            <div class="flex items-center text-sm">
                                                <div>
                                                    <p class="font-medium text-black">{{ $lpmm->wali->name ?? '' }}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-1 py-5 text-sm w-2/8">
                                            <div class="flex items-center text-sm">
                                                <div>
                                                    <p class="font-medium text-black">{{ $lpmm->prospect->name ?? '' }}
                                                    </p>
                                                    <p class="text-sm text-gray-400">
                                                        {{ $lpmm->created_at ?? '' }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-1 py-5 text-sm w-2/8">
                                            <div class="flex items-center text-sm">
                                                <div>
                                                    <p class="font-medium text-black">{{ $lpmm->prospect->school ?? '' }}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-1 py-5 text-sm w-2/8">
                                            <div class="flex items-center text-sm">
                                                <div>
                                                    <p class="font-medium text-black">{{ $lpmm->prospect->phone ?? '' }}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-1 py-5 text-sm w-2/8">
                                            <div class="flex items-center text-sm">
                                                <div>
                                                    <p class="font-medium text-black">{{ $lpmm->route ?? '' }}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-1 py-5 text-sm w-2/8">
                                            <div class="flex items-center text-sm">
                                                <div>
                                                    @if ($lpmm->prospect->is_iput_form && !$lpmm->prospect->is_pay_form)
                                                        <strong>Sudah Mengisi Form</strong>
                                                    @elseif ($lpmm->prospect->is_pay_form && !$lpmm->prospect->is_test)
                                                        <strong>Berhak Test</strong>
                                                    @elseif ($lpmm->prospect->is_test && !$lpmm->prospect->is_pay_regist)
                                                        <strong>Sudah Melakukan Test</strong>
                                                    @elseif ($lpmm->prospect->is_pay_regist)
                                                        <strong class="text-success">Sudah melakukan Registrasi</strong>
                                                    @else
                                                        <p>{{ $lpmm->status }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-1 py-5 text-sm w-2/8">
                                            <a href="{{ route('admin.prospect.show', $lpmm->id) }}"
                                                class="px-4 py-2 mt-2 text-left text-white rounded-xl bg-serv-email">
                                                Details
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    {{-- empty --}}
                                @endforelse

                            </tbody>
                        </table>
                        <br>
                        {{ $listPmm->links() }}
                    </div>
                </main>
            </div>
        </section>
    </main>

@endsection
