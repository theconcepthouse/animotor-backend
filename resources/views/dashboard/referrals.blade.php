@extends('layouts.dash')


@section('content')


    <!-- order here -->
    <section class="personal__information pt-120 pb__60">
        <div class="container">
            <div class="row justify-content-center">

                @if(!request()->has('app'))
                @include('dashboard.partials.sidebar')
                @endif

                <div class="col-md-9">
                    <div class="personal__favorites">
                        <div class="personal__info__box">
                            <div class="per__ittle d-flex align-items-center">
                                <h5>
                                    All Referrals
                                </h5>
                            </div>

                            <div class="table__system pb__24">
                                @if(count($referrals) > 0)
                                <table class="table1">
                                    <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>User</th>
                                        <th>Amount</th>
                                        <th>Fee</th>
                                        <th>Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($referrals as $item)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $item?->user?->name }}</td>
                                        <td>{{ format_amt($item->amount) }}</td>
                                        <td>{{ $item->earned ? 'completed' : 'pending' }}</td>
                                        <td>
                                            {{ $item->created_at->diffForHumans() }}
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                @else
                                    <p class="mt-5">No referrals yet</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- order End -->

@endsection
