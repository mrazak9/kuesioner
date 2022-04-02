@extends('layouts.backend')

@section('title', ' Dashboard')

@section('content')

    <main class="h-full overflow-y-auto">
        <div class="container mx-auto">
            <div class="grid w-full gap-5 px-10 mx-auto md:grid-cols-12">
                <div class="col-span-8">
                    <h2 class="mt-8 mb-1 text-2xl font-semibold text-gray-700">
                        Overviews
                    </h2>
                    <p class="text-sm text-gray-400">
                        Monthly Reports
                    </p>
                </div>

                <div class="col-span-4 text-right">
                    <div @click.away="open = false" class="relative z-10 hidden mt-5 lg:block" x-data="{ open: false }">
                        <button
                            class="flex flex-row items-center w-full px-4 py-2 mt-2 text-left bg-white rounded-lg dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:w-auto md:inline md:mt-0 md:ml-4">

                            @if (Auth::user()->avatar)
                                <img src="{{ Auth::user()->avatar }}" alt="photo profile"
                                    class="inline w-12 h-12 mr-3 rounded-full">
                            @else
                                <img src="https://ui-avatars.com/api?name=Admin" class="inline w-12 h-12 mr-3 rounded-full">
                            @endif

                            Halo, {{ Auth::user()->name }}

                        </button>
                    </div>
                </div>
            </div>
        </div>

        <section class="container px-6 mx-auto mt-5">
            <div class="grid gap-5 md:grid-cols-12">
                <main class="p-4 lg:col-span-7 md:col-span-12 md:pt-0">
                    <div class="sm:grid sm:h-32 sm:grid-flow-row sm:gap-4 sm:grid-cols-3">
                        <div class="flex flex-col justify-center px-4 py-4 mb-4 bg-white rounded-xl">
                            <div>
                                <a href="{{ route('admin.dashboard.progress')}}" type="button">
                                    <div>
                                        <img src="{{ asset('/assets/images/services-progress-icon.svg') }}" alt=""
                                            class="w-8 h-8">
                                    </div>
                                    <p class="mt-2 text-2xl font-semibold text-left text-gray-800">{{ $progress ?? '' }}
                                    </p>
                                    <p class="text-sm text-left text-gray-500">
                                        Progress <br class="hidden lg:block">
                                        Semua Jalur
                                    </p>
                                </a>
                            </div>
                        </div>
                        <div class="flex flex-col justify-center px-4 py-4 mb-4 bg-white rounded-xl">
                            <div>
                                <div>
                                    <img src="{{ asset('/assets/images/services-completed-icon.svg') }}" alt=""
                                        class="w-8 h-8">
                                </div>
                                <p class="mt-2 text-2xl font-semibold text-left text-gray-800">
                                    {{ $partisipantpmm + $partisipantppa + $partisipantppg ?? '' }}</p>
                                <p class="text-sm text-left text-gray-500">
                                    Partisipan <br class="hidden lg:block">
                                    Semua Jalur
                                </p>
                            </div>
                        </div>
                        <div class="flex flex-col justify-center px-4 py-4 mb-4 bg-white rounded-xl">
                            <div>
                                <div>
                                    <img src="{{ asset('/assets/images/new-freelancer-icon.svg') }}" alt=""
                                        class="w-8 h-8">
                                </div>
                                <p class="mt-2 text-2xl font-semibold text-left text-gray-800">{{ $prospects ?? '' }}</p>
                                <p class="text-sm text-left text-gray-500">
                                    Prospek <br class="hidden lg:block">
                                    Semua Jalur
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="p-6 mt-8 bg-white rounded-xl">
                        <div>
                            <h2 class="mb-1 text-xl font-semibold">
                                Prospect PMB 2022
                            </h2>
                            <p class="text-sm text-gray-400">
                                {{ $prospects ?? '' }} Total Prospect
                            </p>
                        </div>
                        <table class="w-full mt-4" aria-label="Table">
                            <thead>
                                <tr class="text-sm font-normal text-left text-gray-900 border-b border-b-gray-600">
                                    <th class="py-4" scope="">Nama Jalur</th>
                                    <th class="py-4" scope="">Participant</th>
                                    <th class="py-4" scope="">Prospect</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                <tr>
                                    <td>PPG</td>
                                    <td>{{ $partisipantppg }}</td>
                                    <td>{{ $ppg }}</td>
                                </tr>
                                <tr>
                                    <td>PMM</td>
                                    <td>{{ $partisipantpmm }}</td>
                                    <td>{{ $pmm }}</td>
                                </tr>
                                <tr>
                                    <td>PPA</td>
                                    <td>{{ $partisipantppa }}</td>
                                    <td>{{ $ppa }}</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </main>
                {{-- <aside class="p-4 lg:col-span-5 md:col-span-12 md:pt-0">
                    <div class="p-6 mt-8 bg-white rounded-xl">
                        <div>
                            <h2 class="mb-1 text-xl font-semibold">
                                Top Reviews
                            </h2>
                            <p class="text-sm text-gray-400">
                                48 Total Reviews
                            </p>
                        </div>
                        <table class="w-full" aria-label="Table">
                            <thead>
                                <tr class="text-sm font-normal text-left text-gray-900 border-b border-b-gray-600">
                                    <th class="py-4" scope=""></th>
                                    <th class="py-4" scope=""></th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                <tr class="text-gray-700">
                                    <td class="w-1/2 px-1 py-2">
                                        <div class="flex items-center text-sm">
                                            <div class="relative w-10 h-10 mr-3 rounded-full md:block">
                                                <img class="object-cover w-full h-full rounded-full"
                                                    src="{{ url('https://randomuser.me/api/portraits/men/2.jpg') }}"
                                                    alt="" loading="lazy" />
                                                <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                                </div>
                                            </div>
                                            <div>
                                                <p class="font-medium text-black">Sarah Roses</p>
                                                <p class="text-sm text-gray-400">1 May 2021</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="w-1/2 px-1 py-5 text-xs text-right text-red-500">
                                        @include('components/dashboard.rating')
                                    </td>
                                </tr>
                                <tr class="text-gray-700">
                                    <td class="w-1/2 px-1 py-2">
                                        <div class="flex items-center text-sm">
                                            <div class="relative w-10 h-10 mr-3 rounded-full md:block">
                                                <img class="object-cover w-full h-full rounded-full"
                                                    src="{{ url('https://randomuser.me/api/portraits/men/3.jpg') }}"
                                                    alt="" loading="lazy" />
                                                <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                                </div>
                                            </div>
                                            <div>
                                                <p class="font-medium text-black">Sarah Roses</p>
                                                <p class="text-sm text-gray-400">1 May 2021</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="w-1/2 px-1 py-5 text-xs text-right text-red-500">
                                        @include('components/dashboard.rating')
                                    </td>
                                </tr>
                                <tr class="text-gray-700">
                                    <td class="w-1/2 px-1 py-2">
                                        <div class="flex items-center text-sm">
                                            <div class="relative w-10 h-10 mr-3 rounded-full md:block">
                                                <img class="object-cover w-full h-full rounded-full"
                                                    src="{{ url('https://randomuser.me/api/portraits/men/4.jpg') }}"
                                                    alt="" loading="lazy" />
                                                <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                                </div>
                                            </div>
                                            <div>
                                                <p class="font-medium text-black">Sarah Roses</p>
                                                <p class="text-sm text-gray-400">1 May 2021</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="w-1/2 px-1 py-5 text-xs text-right text-red-500">
                                        @include('components/dashboard.rating')
                                    </td>
                                </tr>
                                <tr class="text-gray-700">
                                    <td class="w-1/2 px-1 py-2">
                                        <div class="flex items-center text-sm">
                                            <div class="relative w-10 h-10 mr-3 rounded-full md:block">
                                                <img class="object-cover w-full h-full rounded-full"
                                                    src="{{ url('https://randomuser.me/api/portraits/men/5.jpg') }}"
                                                    alt="" loading="lazy" />
                                                <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                                </div>
                                            </div>
                                            <div>
                                                <p class="font-medium text-black">Sarah Roses</p>
                                                <p class="text-sm text-gray-400">1 May 2021</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="w-1/2 px-1 py-5 text-xs text-right text-red-500">
                                        @include('components/dashboard.rating')
                                    </td>
                                </tr>
                                <tr class="text-gray-700">
                                    <td class="w-1/2 px-1 py-2">
                                        <div class="flex items-center text-sm">
                                            <div class="relative w-10 h-10 mr-3 rounded-full md:block">
                                                <img class="object-cover w-full h-full rounded-full"
                                                    src="{{ url('https://randomuser.me/api/portraits/men/6.jpg') }}"
                                                    alt="" loading="lazy" />
                                                <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                                </div>
                                            </div>
                                            <div>
                                                <p class="font-medium text-black">Sarah Roses</p>
                                                <p class="text-sm text-gray-400">1 May 2021</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="w-1/2 px-1 py-5 text-xs text-right text-red-500">
                                        @include('components/dashboard.rating')
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </aside> --}}
            </div>
        </section>
    </main>

@endsection
