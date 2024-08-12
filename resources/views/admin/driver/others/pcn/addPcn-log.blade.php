@extends('admin.layout.app')
@section('content')
@include('admin.driver.tinymix')
    <style>
        .btn, .dual-listbox .dual-listbox__button {
            position: relative;
            letter-spacing: 0.02em;
             display: inline;
            align-items: center;
        }
    </style>

    <div class="nk-content ">
        <div class="container">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                     <div class="container mb-3 mt-4">
                         <h4>Driver Name: {{ $driver->name }}</h4>
                     </div>
                    <div class="components-preview wide-md- mx-auto">

                           <div class="nk-block">

                                <div class="card card-bordered">
                                    <div class="card-inner-group">
                                        <div class="card-inner p-0">

                                            <div class="container mt-5">
                                                <div class="form-container">
                                                    <h3 class="text-center mb-4">PCN Log</h3>
                                                    <p class="text-danger text-center">
                                                        Please add all stepped you have done  time and date of any action on this PCN
                                                        <br>
                                                        Also: sent and email to driver PCN details .PCN Payment link.contact number for issuing authority.
                                                    </p>

                                                   <form action="{{ route('admin.storePcnLog', ['pcnId' => $pcnId, 'driverId' => $driver->id]) }}" method="POST">
                                                       @csrf
                                                       @if(session()->has('error'))
                                                            <div class="alert alert-danger">
                                                                {{ session()->get('error') }}
                                                            </div>
                                                        @endif
                                                       @if(session()->has('message'))
                                                            <div class="alert alert-success">
                                                                {{ session()->get('message') }}
                                                            </div>
                                                        @endif
                                                       <input type="hidden" name="driver_id" value="{{ $driver->id }}">
                                                       <input type="hidden" name="pcn_id" value="{{ $pcnId }}">
                                                    <div class="row">

                                                        <div class="form-group col-lg-10 offset-lg-1">
                                                            <label class="form-label" for="datePostReceived">Report </label>
                                                            <textarea name="report" class="content form-control" id="" cols="30" rows="10"></textarea>
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label class="form-label" for="Linkup">Linkup with </label>
                                                            <input type="text" class="form-control" id="Linkup" name="linkup_with_driver" >
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" name="notify_to_driver" class="custom-control-input" id="customCheck1">
                                                                <label class="custom-control-label" for="customCheck1">Notify to Driver</label>
                                                            </div>
                                                        </div>
                                                         <div class="form-group col-md-6">
                                                            <label class="form-label" for="from"></label>
                                                            <input type="text" class="form-control" id="from" name="linkup_with_vehicle_registration_no" placeholder="Vehicle Registration No">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" name="notify_to_staff_member" class="custom-control-input" id="customCheck2">
                                                                <label class="custom-control-label" for="customCheck2">Notify to staff member</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="form-label" for="dateOfContravention">Reminder</label>
                                                            <input type="date" class="form-control" id="dateOfContravention" name="reminder" placeholder="Reminder">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" name="notify_to_other" class="custom-control-input" id="customCheck3">
                                                                <label class="custom-control-label" for="customCheck3">Notify to Other</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="m-3 text-center">
                                                        <button type="submit" class="btn btn-custom btn-primary col-lg-6">Add PCN</button>
                                                    </div>
                                                </form>
                                                </div>
                                            </div>

                                            <!-- .nk-tb-list -->
                                        </div>

                                    </div>
                                </div>



                            </div>



                    </div><!-- .components-preview -->
                </div>
            </div>
        </div>
    </div>




@endsection

@section('js')


@endsection
