@extends('layouts.backend')

@section('title', ' List Prospect')

@section('content')

    <main class="h-full overflow-y-auto">
        <div class="container mx-auto">
            <div class="grid w-full gap-5 px-10 mx-auto md:grid-cols-12">
                <div class="col-span-8">
                    <h2 class="mt-8 mb-1 text-2xl font-semibold text-gray-700">
                        List Prospect
                    </h2>
                    <p class="text-sm text-gray-400">
                        {{ $trans->count() }} Total Prospect
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
                        <label for="cari" class="block mb-3 font-medium text-gray-700 text-md">Cari Data Prospect :
                        </label>
                        <form action="{{ route('admin.prospect.cari') }}" method="GET">
                            <input placeholder="Cari Prospect .." type="text" name="cari"
                                class="py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                                value="{{ old('cari') }}">

                            <button type="submit"
                                class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-green-600 border border-transparent rounded-lg shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                Cari
                            </button>
                        </form>
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

                                @forelse ($trans as $tran)
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
                                                    <p class="font-medium text-black">{{ $tran->user->name ?? '' }}
                                                    </p>
                                                    <p class="text-sm text-gray-400">
                                                        {{ $tran->user->occupation ?? '' }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-1 py-5 text-sm w-2/8">
                                            <div class="flex items-center text-sm">
                                                <div>
                                                    <p class="font-medium text-black">{{ $tran->wali->name ?? '' }}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-1 py-5 text-sm w-2/8">
                                            <div class="flex items-center text-sm">
                                                <div>
                                                    <p class="font-medium text-black">{{ $tran->prospect->name ?? '' }}
                                                    </p>
                                                    <p class="text-sm text-gray-400">
                                                        {{ $tran->created_at ?? '' }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-1 py-5 text-sm w-2/8">
                                            <div class="flex items-center text-sm">
                                                <div>
                                                    <p class="font-medium text-black">{{ $tran->prospect->school ?? '' }}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-1 py-5 text-sm w-2/8">
                                            <div class="flex items-center text-sm">
                                                <div>
                                                    <p class="font-medium text-black">{{ $tran->prospect->phone ?? '' }}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-1 py-5 text-sm w-2/8">
                                            <div class="flex items-center text-sm">
                                                <div>
                                                    <p class="font-medium text-black">{{ $tran->route ?? '' }}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-1 py-5 text-sm w-2/8">
                                            <div class="flex items-center text-sm">
                                                <div>
                                                    @if ($tran->prospect->is_iput_form && !$tran->prospect->is_pay_form)
                                                        <strong>{{ $tran->status }}</strong>
                                                    @elseif ($tran->prospect->is_pay_form && !$tran->prospect->is_test)
                                                        <strong>{{ $tran->status }}</strong>
                                                    @elseif ($tran->prospect->is_test && !$tran->prospect->is_pay_regist)
                                                        <strong>{{ $tran->status }}</strong>
                                                    @elseif ($tran->prospect->is_pay_regist)
                                                        <strong class="text-success">{{ $tran->status }}</strong>
                                                    @elseif ($tran->prospect->is_cancel)
                                                        <strong>{{ $tran->status }}</strong>
                                                    @else
                                                        <p>{{ $tran->status }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-1 py-5 text-sm w-2/8">
                                            <a href="{{ route('admin.prospect.detail', $tran->id) }}"
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
                        {{ $trans->links() }}
                    </div>
                </main>
            </div>
        </section>
    </main>

@endsection
