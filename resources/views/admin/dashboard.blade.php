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
                        My Bootcamps
                    </h2>
                </div>
            </div>
            <div class="row my-5">
                @include('components.alert')
                <table class="table">
                    <tbody>
                        @forelse ($transactions as $transaction)
                            <tr class="align-middle">
                                <td width="18%">
                                    <img src="{{asset('images/item_bootcamp.png')}}" height="120" alt="">
                                </td>
                                <td>
                                    <p class="mb-2">
                                        <strong>{{$transaction->id}}</strong>
                                    </p>
                                    <p>
                                        {{$transaction->created_at->format('M d, Y')}}
                                    </p>
                                </td>
                                <td>
                                    <strong>${{$transaction->route}}k</strong>
                                </td>
                                <td>
                                    <strong>{{$transaction->status}}</strong>
                                </td>
                                <td>
                                    @if ($transaction->status == 'waiting')
                                        <a href="#" class="btn btn-primary">Pay Here</a>
                                    @endif
                                </td>
                                
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">
                                    <h3>No Camp Registered</h3>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection