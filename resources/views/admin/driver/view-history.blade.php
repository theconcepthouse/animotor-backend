@extends('admin.layout.app')
@section('content')

    <div class="nk-content ">
        <div class="container">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                     <div class="container mb-3 mt-4">
                         <h4>Driver Name: {{ $driver->name }}</h4>
                     </div>
                    <div class="components-preview wide-md- mx-auto">

                           <div class="nk-block">

                                 <div class="card card-bordered card-preview">

                                    <div class="card-inner">
                                        <ul class="nav nav-tabs mt-n3" >
                                            <li class="nav-item "  >
                                                <a class="nav-link" href="{{ route('admin.form.index', $driver->id) }}" wire:navigate>Forms</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link " href="{{ route('admin.addDocument', $driver->id) }}" wire:navigate>Documents</a>
                                            </li>
                                            <li class="nav-item" >
                                                <a class="nav-link"href="{{ route('admin.paymentHistory', $driver->id) }}" wire:navigate>Payment History</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" href="{{ route('admin.driverPcn', $driver->id) }}" wire:navigate>PCNS</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link " href="{{ route('admin.notes', $driver->id) }}" wire:navigate>Notes</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link active btn btn-primary" href="{{ route('admin.history', $driver->id) }}" wire:navigate>History</a>
                                            </li>
                                        </ul>

                                    </div>
                                </div>


                                <div class="card card-bordere">
                                    <div class="card-inner-group">
                                        <div class="card-inner p-0">

                                           <div class="container col-lg-10 ">
                                              <div class="container">
                                                <h4 class="mt-3"> History Details for {{ $driver->name }}</h4>

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
