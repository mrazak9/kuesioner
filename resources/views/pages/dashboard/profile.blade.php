@extends('layouts.backend')

@section('title', 'Submit Order')

@section('content')

    <main class="h-full overflow-y-auto">
        <div class="container mx-auto">
            <div class="grid w-full gap-5 px-10 mx-auto md:grid-cols-12">
                <div class="col-span-12">
                    <h2 class="mt-8 mb-1 text-2xl font-semibold text-gray-700">
                        Edit My Profile
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

                        <form action="{{ route('admin.profile.edit', [Auth::user()->id]) }}" method="POST"
                            enctype="multipart/form-data">

                            @csrf

                            <div class="">
                                <div class="px-4 py-5 sm:p-6">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6">

                                            <div class="flex items-center mt-1">

                                                @if (Auth::user()->avatar)
                                                <img src="{{ Auth::user()->avatar }}"
                                                alt="photo profile" class="w-16 h-16 rounded-full">
                                                @else
                                                    <span
                                                        class="inline-block w-16 h-16 overflow-hidden bg-gray-100 rounded-full">
                                                        <svg class="w-full h-full text-gray-300" fill="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path
                                                                d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                                        </svg>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="md:col-span-6 lg:col-span-3">
                                            <label for="name" class="block mb-3 font-medium text-gray-700 text-md">Full Name
                                            </label>

                                            <input placeholder="Your Name" type="text" name="name" id="name"
                                                autocomplete="name"
                                                class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                                                value="{{ $user->name ?? '' }}" required>

                                            @if ($errors->has('name'))
                                                <p class="text-red-500 mb-3 text-sm">{{ $errors->first('name') }}</p>
                                            @endif
                                        </div>

                                        <div class="md:col-span-6 lg:col-span-3">
                                            <label for="occupation"
                                                class="block mb-3 font-medium text-gray-700 text-md">Role</label>

                                            <input placeholder="Your Role" type="text" name="occupation" id="occupation"
                                                autocomplete="occupation"
                                                class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                                                value="{{ $user->occupation ?? '' }}" required>

                                            @if ($errors->has('occupation'))
                                                <p class="text-red-500 mb-3 text-sm">{{ $errors->first('occupation') }}</p>
                                            @endif
                                        </div>

                                        <div class="md:col-span-6 lg:col-span-3">
                                            <label for="email" class="block mb-3 font-medium text-gray-700 text-md">Email
                                                Address</label>

                                            <input placeholder="your@email.com" type="email" name="email" id="email"
                                                autocomplete="email"
                                                class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                                                value="{{ $user->email }}" required>

                                            @if ($errors->has('email'))
                                                <p class="text-red-500 mb-3 text-sm">{{ $errors->first('email') }}</p>
                                            @endif
                                        </div>

                                        <div class="md:col-span-6 lg:col-span-3">
                                            <label for="phone"
                                                class="block mb-3 font-medium text-gray-700 text-md">Contact Number</label>

                                            <input placeholder="your contact number" type="number" name="phone"
                                                id="phone" autocomplete="phone"
                                                class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                                                value="{{ $user->people->phone ?? '' }}" required>

                                            @if ($errors->has('phone'))
                                                <p class="text-red-500 mb-3 text-sm">
                                                    {{ $errors->first('phone') }}</p>
                                            @endif
                                        </div>

                                        {{-- school --}}
                                        <div class="md:col-span-6 lg:col-span-3">
                                            <label for="school_origin" class="block mb-3 font-medium text-gray-700 text-md">school_origin
                                                Address</label>

                                            <input placeholder="Sekolah Asal anda" type="text" name="school_origin" id="school_origin"
                                                autocomplete="school_origin"
                                                class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                                                value="{{ $user->people->school_origin }}">

                                            @if ($errors->has('school_origin'))
                                                <p class="text-red-500 mb-3 text-sm">{{ $errors->first('school_origin') }}</p>
                                            @endif
                                        </div>

                                        <div class="md:col-span-6 lg:col-span-3">
                                            <label for="graduation_year"
                                                class="block mb-3 font-medium text-gray-700 text-md">Tahun Lulus</label>

                                            <input placeholder="Tahun lulus anda" type="text" name="graduation_year"
                                                id="graduation_year" autocomplete="graduation_year"
                                                class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                                                value="{{ $user->people->graduation_year ?? '' }}">

                                            @if ($errors->has('graduation_year'))
                                                <p class="text-red-500 mb-3 text-sm">
                                                    {{ $errors->first('graduation_year') }}</p>
                                            @endif
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
