@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <a href="{{ route('view_user')}}" class="btn btn-primary" style="margin: 30px 0px 30px 0px">Lihat Data User</a>
                <div class="card">
                    <div class="card-header">
                        Data Usulan
                    </div>
                    <div class="card-body">
                        @include('components.alert')
                        <table class="table">
                            <thead>
                                <tr>
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
                                        <td>{{$trans->prospect->name}}</td>
                                        <td>{{$trans->user->name}}</td>
                                        <td>{{$trans->route}}</td>
                                        <td>{{$trans->status}}</td>
                                        <td>
                                            <a href="#" class="btn btn-thirdty" style="font-size: x-small; padding: 5px 10px 5px 10px">View</a>
                                            <a href="#" class="btn btn-primary" style="font-size: x-small; padding: 5px 10px 5px 10px">Edit</a>
                                            <a href="#" class="btn btn-delete" style="font-size: x-small; padding: 5px 10px 5px 10px">Delete</a>
                                        </td>
                                       
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">No camps registered</td>
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