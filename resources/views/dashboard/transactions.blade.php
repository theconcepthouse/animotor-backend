@extends('layouts.dash')


@section('content')


    <!-- order here -->
    <section class="personal__information pt-120 pb__60">
        <div class="container">
            <div class="row justify-content-center">

                @include('dashboard.partials.sidebar')

                <div class="col-md-9">
                    <div class="personal__favorites">
                        <div class="personal__info__box">
                            <div class="per__ittle d-flex align-items-center">
                                <h5>
                                    All Transactions
                                </h5>
{{--                                <a href="javascript:void(0)" class="edit d-flex align-items-center gap-2">--}}
{{--                        <span class="icon delete">--}}
{{--                           <i class="material-symbols-outlined">--}}
{{--                              delete--}}
{{--                           </i>--}}
{{--                        </span>--}}
{{--                                    <span class="fz-18 fw-600">--}}
{{--                           Clear Data--}}
{{--                        </span>--}}
{{--                                </a>--}}
                            </div>

                            <div class="table__system pb__24">
                                @if(count($transactions) > 0)
                                <table class="table1">
                                    <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Transaction</th>
                                        <th>Amount</th>
                                        <th>Fee</th>
                                        <th>Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($transactions as $item)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $item->type }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ amt($item->amount) }}</td>
                                        <td>
                                            {{ $item->created_at->diffForHumans() }}
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                @else
                                    <p class="mt-5">No transactions yet</p>
                                @endif
                            </div>
{{--                            <ul class="pagination justify-content-end">--}}
{{--                                <li>--}}
{{--                                    <a href="#">--}}
{{--                           <span class="icon">--}}
{{--                              <i class="material-symbols-outlined">--}}
{{--                                 chevron_left--}}
{{--                              </i>--}}
{{--                           </span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="#">--}}
{{--                                        1--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="#">--}}
{{--                                        2--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="#">--}}
{{--                                        3--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="#">--}}
{{--                                        ...--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="#">--}}
{{--                                        30--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="#">--}}
{{--                           <span class="icon">--}}
{{--                              <i class="material-symbols-outlined">--}}
{{--                                 chevron_right--}}
{{--                              </i>--}}
{{--                           </span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- order End -->

@endsection
