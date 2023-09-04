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
                                    All Notifications
                                </h5>
                            </div>

                            <div class="table__system pb__24">
                                @if(count($notifications) > 0)
                                <table class="table1">
                                    <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Type</th>
                                        <th>Title</th>
                                        <th>Message</th>
                                        <th>Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($notifications as $item)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $item->data['type'] }}</td>
                                        <td>{{ $item->data['title'] }}</td>
                                        <td>{{ $item->data['message'] }}</td>
                                        <td>
                                            {{ $item->created_at->diffForHumans() }}
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                @else
                                    <p class="mt-5">No notifications yet</p>
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
