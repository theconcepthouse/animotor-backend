@extends('admin.layout.app')
@section('content')

    <div class="nk-content ">
        <div class="container">
            <div class="nk-content-inner">
                  <div class="nk-block-head-content">
                        <a href="{{ route('admin.drivers') }}" wire:navigate class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
                        <a href="{{ route('admin.drivers') }}" wire:navigate class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>

                    </div>
                <div class="nk-content-body">
                     <div class="container mb-3 mt-4">
                         <h4>Driver Name: {{ $user->name }}</h4>
                     </div>
                    <div class="components-preview wide-md- mx-auto">

                           <div class="nk-block">


                                 <div class="card card-bordered card-preview">
                                    <div class="card-inner">
                                        <ul class="nav nav-tabs mt-n3" >
                                             <li class="nav-item "  >
                                                <a class="nav-link active btn btn-primary" href="{{ route('admin.form.index', $user->id) }}" wire:navigate>Forms</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('admin.addDocument', $user->id) }}" wire:navigate>Documents</a>
                                            </li>
                                            <li class="nav-item" >
                                                <a class="nav-link" href="{{ route('admin.paymentHistory', $user->id) }}" wire:navigate >Payment History</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" href="{{ route('admin.driverPcn', $user->id) }}" wire:navigate >PCNS</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" href="{{ route('admin.notes', $user->id) }}" wire:navigate >Notes</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" href="{{ route('admin.history', $user->id) }}" >History</a>
                                            </li>
                                        </ul>

                                    </div>
                                </div>


                                <div class="card card-bordered">
                                    <div class="card-inner-group">
                                        <div class="card-inner p-0">
                                            <div class="nk-tb-list">
                                                <div class="nk-tb-item nk-tb-head">

                                                    <div class="nk-tb-col tb-col-sm"><span>Name</span></div>
                                                    <div class="nk-tb-col"><span>State</span></div>
                                                    <div class="nk-tb-col"><span>Sending Method</span></div>
                                                    <div class="nk-tb-col"><span>Status</span></div>
                                                    <div class="nk-tb-col"><span>Action</span></div>
                                                </div>
                                                <!-- .nk-tb-item -->
                                                @foreach($forms as $item)
                                                     <div class="nk-tb-item">
                                                        <div class="nk-tb-col tb-col-sm">
                                                            <span class="tb-product">
                                                                <span class="title">{{ $item->name }}</span>
                                                            </span>
                                                        </div>
                                                        <div class="nk-tb-col">
                                                            <span class="tb-sub">{{ $item->state }}</span>
                                                        </div>
                                                        <div class="nk-tb-col">
                                                            <span class="tb-lead">{{ $item->sending_method ? : "Not Set" }}</span>
                                                        </div>
                                                        <div class="nk-tb-col">
                                                            <span class="tb-sub">{!! $item->status() !!}</span>
                                                        </div>
                                                         <div class="nk-tb-col">
                                                            <div class="nk-tb-col nk-tb-col-tools">
                                                                <ul style="justify-content: center" class="nk-tb-actions gx-2">
                                                                    <li class="nk-tb-action">
                                                                        <a href="#" class="bg-white btn btn-sm btn-outline-light btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Approve" data-bs-original-title="Approve"><em class="icon ni ni-search"></em></a>
                                                                    </li>
                                                                    <li class="nk-tb-action">
                                                                        <a href="{{ route('admin.addDocument', $user->id) }}" class="bg-white btn btn-sm btn-outline-light btn-icon btn-tooltip" aria-label="Document" data-bs-original-title="Details"><em class="icon ni ni-upload-cloud"></em></a>
                                                                    </li>
                                                                    <li class="nk-tb-action">
                                                                        <a href="{{ route('admin.fetchCustomerForm', ['driverId' => $user->id, 'formId' => $item->id]) }}"  class="bg-white btn btn-sm btn-outline-light btn-icon btn-tooltip" aria-label="Details" data-bs-original-title="Details"><em class="icon ni ni-eye"></em></a>
                                                                    </li>
                                                                    <li class="nk-tb-action">
                                                                        <a href="{{ route('admin.generatePDF', ['formId' => $item->id, 'driverId' => $user->id]) }}" target="_blank" class="bg-white btn btn-sm btn-outline-light btn-icon btn-tooltip" aria-label="Details" data-bs-original-title="Document"><em class="icon ni ni-file"></em></a>
                                                                    </li>
                                                                    <li class="nk-tb-action">
                                                                        <a href="#tranxDetails" class="bg-white btn btn-sm btn-outline-light btn-icon btn-tooltip" aria-label="Details" data-bs-original-title="Notes"><em class="icon ni ni-edit"></em></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                    </div>
                                                @endforeach


                                            </div>
                                            <!-- .nk-tb-list -->
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="nk-block">

                                <h4 class="mb-3">Actions/Events</h4>
                                    <div class="card card-bordered">
                                        <div class="card-inner-group">
                                            <div class="card-inner p-0">
                                                <div class="nk-tb-list">
                                                    <div class="nk-tb-item nk-tb-head">

                                                        <div class="nk-tb-col tb-col-sm"><span>Name</span></div>
                                                        <div class="nk-tb-col"><span>State</span></div>
                                                        <div class="nk-tb-col"><span>Sending Method</span></div>
                                                        <div class="nk-tb-col"><span>Status</span></div>
                                                        <div class="nk-tb-col"><span>Action</span></div>
                                                    </div>
                                                    <!-- .nk-tb-item -->
                                                    @foreach($form_action as $item)
                                                         <div class="nk-tb-item">
                                                            <div class="nk-tb-col tb-col-sm">
                                                                <span class="tb-product">
                                                                    <span class="title">{{ $item->name }}</span>
                                                                </span>
                                                            </div>
                                                            <div class="nk-tb-col">
                                                                <span class="tb-sub">{{ $item->state }}</span>
                                                            </div>
                                                            <div class="nk-tb-col">
                                                                <span class="tb-lead">{{ $item->sending_method ? : "Not Set" }}</span>
                                                            </div>
                                                            <div class="nk-tb-col">
                                                                <span class="tb-sub">{!! $item->status() !!}</span>
                                                            </div>
                                                             <div class="nk-tb-col">
                                                                <div class="nk-tb-col nk-tb-col-tools">
                                                                    <ul style="justify-content: center" class="nk-tb-actions gx-2">
                                                                        <li class="nk-tb-action">
                                                                            <a href="#" class="bg-white btn btn-sm btn-outline-light btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Approve" data-bs-original-title="Approve"><em class="icon ni ni-search"></em></a>
                                                                        </li>
                                                                       <li class="nk-tb-action">
                                                                        <a href="{{ route('admin.addDocument', $user->id) }}" class="bg-white btn btn-sm btn-outline-light btn-icon btn-tooltip" aria-label="Document" data-bs-original-title="Details"><em class="icon ni ni-upload-cloud"></em></a>
                                                                        </li>
                                                                        <li class="nk-tb-action">
                                                                            <a href="{{ route('admin.fetchCustomerForm', ['driverId' => $user->id, 'formId' => $item->id]) }}"  class="bg-white btn btn-sm btn-outline-light btn-icon btn-tooltip" aria-label="Details" data-bs-original-title="Details"><em class="icon ni ni-eye"></em></a>
                                                                        </li>
                                                                        <li class="nk-tb-action">
                                                                            <a href="{{ route('admin.generatePDF', ['formId' => $item->id, 'driverId' => $user->id]) }}" target="_blank" class="bg-white btn btn-sm btn-outline-light btn-icon btn-tooltip" aria-label="Details" data-bs-original-title="Document"><em class="icon ni ni-file"></em></a>
                                                                        </li>
                                                                        <li class="nk-tb-action">
                                                                            <a href="#tranxDetails"  class="bg-white btn btn-sm btn-outline-light btn-icon btn-tooltip" aria-label="Details" data-bs-original-title="Details"><em class="icon ni ni-edit"></em></a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    @endforeach


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
