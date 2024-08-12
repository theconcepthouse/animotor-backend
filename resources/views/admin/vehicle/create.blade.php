@extends('admin.layout.app')
@section('content')

    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                     <h4 style="text-align: center" class="text-center">Add Vehicle</h4>

                    <div class="nk-block">
                        <livewire:admin.vehicle.vehicle-form  />

                    </div><!-- .nk-block -->
                </div>
            </div>
        </div>
    </div>


@endsection
