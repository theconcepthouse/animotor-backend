@extends('admin.layout.app')
@section('content')


    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block">

                            <livewire:admin.mail-tracker.form :mailTrackerId="$mailtracker->id"/>
{{--                        <livewire:admin.mail-tracker.form :mail-tracker-id="$mailtracker->id" />--}}



                    </div>
                    <!-- .nk-block -->
                </div>
            </div>
        </div>
    </div>



@endsection
