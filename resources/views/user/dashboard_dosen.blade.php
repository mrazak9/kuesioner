@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Data Usulan
                    </div>
                    <div class="card-body">
                        @include('components.alert')
                        <p hidden>{{ $tmp = 1 }}</p>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jalur</th>
                                    <th>Pengusul</th>
                                    <th>Nama Prospek</th>
                                    <th>Asal Sekolah</th>
                                    <th>No. HP</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($transactions as $trans)
                                    <tr>
                                        <td>{{ $tmp++ }}</td>
                                        <td>{{ $trans->route }}</td>
                                        <td>{{ $trans->user->name }}</td>
                                        <td>{{ $trans->prospect->name }}</td>
                                        <td>{{ $trans->prospect->school }}</td>
                                        <td>{{ $trans->prospect->phone }}</td>
                                        <td>{{ $trans->prospect->email }}</td>
                                        <td>
                                            @if ($trans->prospect->is_iput_form && !$trans->prospect->is_pay_form)
                                                <strong>Sudah Mengisi Form</strong>
                                            @elseif ($trans->prospect->is_pay_form && !$trans->prospect->is_test)
                                                <strong>Berhak Test</strong>
                                            @elseif ($trans->prospect->is_test && !$trans->prospect->is_pay_regist)
                                                <strong>Sudah Melakukan Test</strong>
                                            @elseif ($trans->prospect->is_pay_regist)
                                                <strong class="text-success">Sudah melakukan Registrasi</strong>
                                            @else
                                                <p>{{ $trans->status }}</p>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <p hidden>{{ $tmp = null }}</p>
                                    <tr>
                                        <td colspan="3">Belum ada Data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
