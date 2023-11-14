@extends('layouts.dash')


@section('content')


    <!-- order here -->
    <section class="personal__information pt-120 pb__60">
        <div class="container">
            <div class="row justify-content-center">
                @include('dashboard.partials.sidebar')


                <div class="col-md-9">
                    <livewire:components.editprofile />
                </div>
            </div>
        </div>
    </section>
    <!-- order End -->

@endsection
