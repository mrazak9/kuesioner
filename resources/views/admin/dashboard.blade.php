@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <a href="{{ route('view_user') }}" class="btn btn-primary" style="margin: 30px 0px 30px 0px">Lihat Data
                    User</a>
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
                                    <th>Nama</th>
                                    <th>Pengusul</th>
                                    <th>Jalur</th>
                                    <th>Status</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($transactions as $trans)
                                    <tr>
                                        <td>{{ $tmp++ }}</td>
                                        <td>{{ $trans->prospect->name }}</td>
                                        <td>{{ $trans->user->name }}</td>
                                        <td>{{ $trans->route }}</td>
                                        <td>{{ $trans->status }}</td>
                                        <td>
                                            <a href="#" class="btn btn-thirdty"
                                                style="font-size: x-small; padding: 5px 10px 5px 10px">View</a>
                                            <a href="#" class="btn btn-primary"
                                                style="font-size: x-small; padding: 5px 10px 5px 10px">Edit</a>
                                            <a data-toggle="modal" class="btn btn-delete"
                                                style="font-size: x-small; padding: 5px 10px 5px 10px"
                                                data-target="#deleteUserModal">Delete</a>
                                        </td>

                                    </tr>
                                @empty
                                    <p hidden>{{ $tmp = null }}</p>
                                    <tr>
                                        <td colspan="3">No camps registered</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <!-- Modal -->
                        @if ($tmp != null)
                            <div class="modal fade" id="deleteUserModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteUserModal">Peringatan!</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body text-center">
                                            Apakah anda yakin akan menghapus data prospect?
                                        </div>
                                        <div class="modal-footer">
                                            <a href="{{ route('transaction.remove', $trans->prospect->id) }}"
                                                type="button" class="btn btn-delete">Hapus</a>
                                            <a type="button" class="btn btn-secondary" data-dismiss="modal">Batal</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
