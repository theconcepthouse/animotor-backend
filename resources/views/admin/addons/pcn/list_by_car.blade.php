@extends('admin.layout.app')
@section('content')


    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">

                    <div class="nk-block">


                        <livewire:admin.addons.pcn.list_by_car :id="$id" />


                    </div><!-- .nk-block -->
                </div>
            </div>
        </div>
    </div>



@endsection
