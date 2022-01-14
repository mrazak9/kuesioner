@extends('layouts.app')

@section('content')
    <section class="dashboard my-5">
        <div class="container">
            <div class="row text-left">
                <div class=" col-lg-12 col-12 header-wrap mt-4">
                    <p class="story">
                        DASHBOARD
                    </p>
                    <h2 class="primary-header ">
                        Data {{$data}} Saya 
                    </h2>
                </div>
            </div>
            <div class="row my-5">
                @include('components.alert')
                <table class="table">
                    <tbody>
                        <tr class="align-middle" style="color: blue">
                            <td><strong>Nama: </strong></td>
                            <td><strong>Asal Sekolah</strong> </td>
                            <td><strong>No. HP</strong></td>
                            <td><strong>Email</strong></td>
                            <td><strong>Status</strong></td>                            
                            <td><strong>Deposit</strong></td>                            
                        </tr>
                        <tr><td></td></tr>
                        @forelse ($transactions as $transaction)
                            <tr class="align-middle">
                                <td>
                                    <p class="mb-2">
                                        <strong>{{$transaction->prospect->name}}</strong>
                                    </p>
                                    <p>
                                        {{$transaction->created_at->format('M d, Y')}}
                                    </p>
                                </td>
                                <td>
                                    <strong>{{$transaction->prospect->school}}</strong>
                                </td>
                                <td>
                                    <strong>{{$transaction->prospect->phone}}</strong>
                                </td>
                                <td>
                                    <strong>{{$transaction->prospect->email}}</strong>
                                </td>                                                                
                                <td>
                                    @if ($transaction->prospect->is_iput_form && !$transaction->prospect->is_test)
                                        <strong>Sudah Mengisi Form</strong>
                                    @elseif ($transaction->prospect->is_test && !$transaction->prospect->is_pay_regist)
                                        <strong>Sudah Melakukan Test</strong>
                                    @elseif ($transaction->prospect->is_pay_regist)
                                        <strong class="text-success">Sudah melakukan Registrasi</strong>
                                    @else
                                        <strong>{{$transaction->status}}</strong>
                                    @endif                                    
                                </td>
                                <td>
                                    @if ($transaction->prospect->is_pay_regist)
                                        <strong class="text-success">Rp. 500.000</strong>
                                    @else
                                        <strong>Rp. 0</strong>
                                    @endif                                    
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">
                                    <h3>Tidak ada data terdaftar</h3>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection