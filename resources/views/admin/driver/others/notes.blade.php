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
{{--                                      <div class="pull-right">--}}
{{--                                            <p>Driver's Name: {{ $user->name }}</p>--}}
{{--                                            <p>Driver Type: {{ $user->hire_type }}</p>--}}
{{--                                            <p>Driver Type: {{ $user->status }}</p>--}}
{{--                                       </div>--}}
                                    <div class="card-inner">
                                        <ul class="nav nav-tabs mt-n3" >

                                            <li class="nav-item "  >
                                                <a class="nav-link" href="{{ route('admin.driverForm', $driver->id) }}" wire:navigate>Forms</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('admin.driverDocuments', $driver->id) }}" wire:navigate>Documents</a>
                                            </li>
                                            <li class="nav-item" >
                                                <a class="nav-link" href="{{ route('admin.paymentHistory', $driver->id) }}" wire:navigate >Payment History</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" href="{{ route('admin.driverPcn', $driver->id) }}" wire:navigate >PCNS</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link active btn btn-primary" href="{{ route('admin.notes', $driver->id) }}" wire:navigate >Notes</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" href="{{ route('admin.driverFormHistory', $driver->id) }}" >History</a>
                                            </li>
                                        </ul>

                                    </div>
                                </div>


                                <div class="card card-bordere">
                                    <div class="card-inner-group">
                                        <div class="card-inner p-0">

                                           <div class="container col-lg-10 ">
                                               <a href="{{ route('admin.noteChat', $driver->id) }}" wire:navigate class="btn btn-primary">Add Note</a>
                                                <table class="table table-bordered mt-3">
                                                    @forelse($notes as $item)
                                                       <tr>
                                                        <th>{!! $item->status() !!}</th>
                                                        <td>
                                                            <div>
                                                                <a href="{{ route('admin.noteChat', $driver->id) }}">
                                                                    <h6>
                                                                     <i style="font-size: 50px" class="ni ni-file-check-fill text-primary"></i>
                                                                        {{ $item->title }}
                                                                    </h6>
                                                                </a>
                                                                <p style="margin-left: 0px;">{{ Str::limit(strip_tags($item->message), 50, '...') }}</p>
                                                            </div>
                                                        </td>
                                                      </tr>
                                                    @empty
                                                      <tr>
                                                        <td colspan="2">
                                                            <p>No Notes</p>
                                                        </td>
                                                      </tr>
                                                    @endforelse

                                                </table>


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
