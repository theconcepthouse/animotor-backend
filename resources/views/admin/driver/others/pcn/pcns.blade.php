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
                                                <a class="nav-link " href="{{ route('admin.driverForm', $driver->id) }}" wire:navigate>Forms</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('admin.driverDocuments', $driver->id) }}" wire:navigate>Documents</a>
                                            </li>
                                            <li class="nav-item" >
                                                <a class="nav-link " href="{{ route('admin.paymentHistory', $driver->id) }}" wire:navigate >Payment History</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link active btn btn-primary" href="{{ route('admin.driverPcn', $driver->id) }}" wire:navigate >PCNS</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" href="{{ route('admin.notes', $driver->id) }}" wire:navigate >Notes</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" href="{{ route('admin.driverFormHistory', $driver->id) }}" >History</a>
                                            </li>
                                        </ul>

                                    </div>
                                </div>



                                <div class="card card-bordered">
                                    <div class="card-inner-group">
                                        <div class="card-inner p-0">

                                           <div class="container col-lg-10 ">
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
                                                <div class="row">

                                                    <div class="container mt-5">
                                                     <a  class="btn btn-primary btn-sm m-3" href="{{ route('admin.addDriverPcn', $driver->id) }}" wire:navigate>Add PCN</a>

                                                        <div class="table-responsive">
                                                            <table class="table table-hover">
                                                                 <thead>
                                                                <tr>
                                                                    <th>{{ __('admin.sn') }}</th>
                                                                    <th>Created On</th>
                                                                    <th>{{ __('admin.vrm') }}</th>
                                                                    <th>{{ __('admin.pcn_no') }}</th>
                                                                    <th>Issue Date</th>
                                                                    <th>Deadline Date</th>
                                                                    <th>Issuing Authority</th>
                                                                    <th>{{ __('admin.status') }}</th>
                                                                    <th>Action</th>
                                                                </tr>

                                                                </thead>
                                                                <tbody>
                                                                @foreach($pcns as $item)
                                                                    <tr>
                                                                        <td>{{ $loop->index+1 }}</td>
                                                                        <td>{{ $item->created_at->format('d M, Y') }}</td>
                                                                        <td><a href="#"> {{ $item->vrm }}</a></td>
                                                                        <td>{{ $item->pcn_no }}</td>
                                                                        <td>{{ $item?->date_of_issue }}</td>
                                                                        <td>{{ $item->deadline_date }}</td>
                                                                        <td>{{ $item->issuing_authority }}</td>
                                                                        <td>{{ $item->status }}</td>
                                                                        <td>
                                                                            <a href="{{ route('admin.editDriverPcn', ['pcnId' =>$item->id, 'driverId' => $driver->id]) }}" class="btn btn-sm"><i class="ni ni-edit"></i></a>

                                                                            <div>
                                                                                <form method="POST" action="{!! route('admin.deleteDriverPcn', ['pcnId' => $item->id]) !!}" accept-charset="UTF-8">
                                                                                   <input name="_method" value="DELETE" type="hidden">
                                                                                   {{ csrf_field() }}

                                                                                   <div class="dropdown-item" >
                                                                                       <button type="submit" class="btn btn-sm"  data-bs-original-title="Delete" onclick="return confirm(&quot;Delete PCN?&quot;)">
                                                                                           <em class="icon ni ni-trash"> </em>
                                                                                       </button>
                                                                                   </div>
                                                                               </form>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>

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
