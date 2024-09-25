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
                                                <a class="nav-link active btn btn-primary" href="{{ route('admin.paymentHistory', $driver->id) }}" wire:navigate >Payment History</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" href="{{ route('admin.driverPcn', $driver->id) }}" wire:navigate >PCNS</a>
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



                               <div class="row mb-5 mt-4">
                                   <div class="col-lg-8 offset-lg-2">
                                       <div style="background: #efeded" class="card card-bordered">
                                    <div class="card-inner-group">
                                        <div class="card-inner p-0">
                                            <a data-bs-toggle="modal" class="btn btn-primary btn-sm m-3" href="#addItem" >Add New</a>
                                             <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th scope="col">Date</th>
                                                            <th scope="col">Item</th>
                                                            <th scope="col">Unit</th>
                                                            <th scope="col">Amount</th>
{{--                                                            <th scope="col">Paid</th>--}}
                                                            <th scope="col">...</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                     @foreach ($rates as $index => $item)
                                                        <tr>
                                                            <td >{{ date('d M, Y', strtotime($item->created_at)) }}</td>
                                                            <td class="text-capitalize">{{ $item->payment_name ?? '' }}</td>
                                                            <td>{{ $item->payment_unit }}</td>
                                                            <td>£{{ $item->payment_price ?? '' }}</td>
{{--                                                            <td>£{{ $item->payment_paid ?? '' }}</td>--}}
                                                            <td>
                                                                <a data-bs-toggle="modal"  href="#addItem-{{ $item->id }}" style="font-size: 20px; margin-left: 5px"><i class="ni ni-edit"></i></a>
                                                            </td>
                                                        </tr>
                                                         <div class="modal fade modal-lg" tabindex="-1" id="addItem-{{ $item->id }}" >
                                                            <div class="modal-dialog" role="document">
                                                                  <div class="modal-content">
                                                                    <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                                                                    <div class="modal-body modal-body-md">
                                                                       <form action="{{ route('admin.RateItem', $driver->id) }}" method="POST">
                                                                           @csrf
                                                                           <input type="hidden" name="driver_id" value="{{ $driver->id }}">
                                                                           <input type="hidden" name="item_id" value="{{ $item->id }}">
                                                                            <div class="row">
                                                                                <div class="form-group col-md-6">
                                                                                    <label for="num">Name</label>
                                                                                    <input type="text" class="form-control" id="num" name="payment_name" placeholder="Name" required
                                                                                        value="{{ old('payment_name', $item->payment_name ?? '') }}">
                                                                                </div>
                                                                                <div class="form-group col-md-6">
                                                                                    <label for="amount">Unit</label>
                                                                                    <input type="number" class="form-control" id="amount" name="payment_unit" placeholder="Unit" required
                                                                                        value="{{ old('payment_unit', $item->payment_unit ?? '') }}">
                                                                                </div>

                                                                                 <div class="form-group col-md-6 mt-2">
                                                                                    <label >Price</label>
                                                                                    <input type="number" class="form-control" name="payment_price" placeholder="Price" required
                                                                                        value="{{ old('payment_price', $item->payment_price ?? '') }}">
                                                                                </div>
{{--                                                                                <div class="form-group col-md-6 mt-2">--}}
{{--                                                                                    <label for="receivedDate">Paid</label>--}}
{{--                                                                                    <input type="number" class="form-control" id="receivedDate" name="payment_paid" placeholder="Paid"--}}
{{--                                                                                        value="{{ old('payment_paid', $item->payment_paid ?? '') }}">--}}
{{--                                                                                </div>--}}

                                                                            </div>

                                                                        <button type="submit" class="btn btn-primary mt-3">Update</button>
                                                                  </form>

                                                                    </div><!-- .modal-body -->
                                                                </div>
                                                                <!-- .modal-content -->
                                                            </div>
                                                      </div>
                                                     @endforeach


                                                    </tbody>
                                                </table>
                                                 <div class="modal fade modal-lg" tabindex="-1" id="addItem" >
                                                    <div class="modal-dialog" role="document">
                                                          <div class="modal-content">
                                                            <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                                                            <div class="modal-body modal-body-md">
                                                               <form action="{{ route('admin.RateItem', $driver->id) }}" method="POST">
                                                                   @csrf
                                                                   <input type="hidden" name="driver_id" value="{{ $driver->id }}">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-6">
                                                                            <label for="num">Name</label>
                                                                            <input type="text" class="form-control" id="num" name="payment_name" placeholder="Name" required>
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="amount">Unit</label>
                                                                            <input type="number" class="form-control" id="amount" name="payment_unit" placeholder="Unit" required>
                                                                        </div>

                                                                         <div class="form-group col-md-6">
                                                                            <label for="receivedDate">Price</label>
                                                                            <input type="number" class="form-control" id="receivedDate" name="payment_price" placeholder="Price" required>
                                                                        </div>

                                                                    </div>

                                                                <button type="submit" class="btn btn-primary mt-3">Save</button>
                                                          </form>

                                                            </div><!-- .modal-body -->
                                                        </div>
                                                        <!-- .modal-content -->
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- .nk-tb-list -->
                                        </div>

                                    </div>
                                </div>
                                   </div>
                                   <div class="col-lg-6">
                                       <div style="background: #d8d6d6; display: none" class="card card-bordered">
                                    <div class="card-inner-group">
                                        <div class="card-inner p-0">
                                             <div class="table-responsive">
                                                        <table class="table table-hover">
                                                            <thead class="thead-light">
                                                                <tr>
                                                                    <th scope="col">Item</th>
                                                                    <th scope="col">Unit</th>
                                                                    <th scope="col">Amount</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($payments as $item)
                                                                <tr>
                                                                    <td>{{ $item->due_date }}</td>
                                                                    <td>{{ $item->received_date }}</td>
                                                                    <td>£{{ $item->amount }}</td>
                                                                </tr>
                                                            @endforeach


                                                            </tbody>
                                                        </table>

                                                    </div>
                                            <!-- .nk-tb-list -->
                                        </div>

                                    </div>
                                </div>
                                   </div>
                               </div>

                                <div class="card card-bordered">
                                    <div class="card-inner-group">
                                        <div class="card-inner p-0">

                                           <div class="container col-lg-10 ">

                                               @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                               @endif

                                               @if(session()->has('message'))
                                                    <div class="alert alert-success">
                                                        {{ session()->get('message') }}
                                                    </div>
                                                @endif
                                                <div class="row">

                                                    <div class="container mt-5">

                                                        <div class="table-responsive">
                                                            <table class="table table-striped">
                                                                <thead class="thead-light">
                                                                    <tr>
                                                                        <th scope="col">Type</th>
                                                                        <th scope="col">Due Date</th>
                                                                        <th scope="col">Amount</th>
                                                                        <th scope="col">Received Date</th>
                                                                        <th scope="col">£ Received</th>
                                                                        <th scope="col">£ Balance</th>
                                                                        <th scope="col">Late Payment Days</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                @if($payments)
                                                                   @foreach($payments as $item)
                                                                        <tr>
                                                                            <td class="text-capitalize">{{ $item->name }}</td>
                                                                            <td>{{ date('d M, Y', strtotime($item->due_date)) }}</td>
                                                                            <td>
                                                                                @if($item?->amount)
                                                                                    £{{ $item->amount }}
                                                                                @endif
                                                                                <a data-bs-toggle="modal" href="#addPayment-{{ $item->id }}" style="font-size: 20px; margin-left: 5px">
                                                                                    <i class="ni ni-eye"></i>
                                                                                </a>
                                                                            </td>
                                                                            <td>{{ $item?->received_date ?? '' }}</td>
                                                                            <td>
                                                                                @if($item?->received_amount)
                                                                                    £{{ $item->received_amount }}
                                                                                @endif
                                                                            </td>
                                                                            <td>
                                                                                @if($item?->balance)
                                                                                    £{{ $item->balance }}
                                                                                @endif
                                                                            </td>
                                                                            <td>
                                                                                @if($item?->late_payment_days)
                                                                                    {{ $item->late_payment_days }} Day(s)
                                                                                @endif
                                                                            </td>
                                                                        </tr>

                                                                         <div class="modal fade modal-lg" tabindex="-1" id="addPayment-{{ $item->id }}" >
                                                                            <div class="modal-dialog" role="document">
                                                                                  <div class="modal-content">
                                                                                    <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                                                                                    <div class="modal-body modal-body-md">
                                                                                       <form action="{{ route('admin.savePayment') }}" method="POST">
                                                                                           @csrf
                                                                                           <input type="hidden" name="driver_id" value="{{ $driver->id }}">
                                                                                           <input type="hidden" name="payment_id" value="{{ $item->id }}">
                                                                                        <div class="row">
                                                                                            <div class="form-group col-md-6">
                                                                                                <label for="dueDate">Due Date</label>
                                                                                                <input style="background: #e6e6e6"  readonly type="date" class="form-control" id="dueDate" name="due_date" value="{{ date('Y-m-d', strtotime($item->due_date)) }}" placeholder="Due Date" required>
                                                                                            </div>
                                                                                            <div class="form-group col-md-6">
                                                                                                <label for="amount">Amount</label>
                                                                                                <input style="background: #e6e6e6" type="number" class="form-control" readonly id="amount" name="amount" value="{{ $item->amount }}" placeholder="Amount" >
                                                                                            </div>

                                                                                             <div class="form-group col-md-6">
                                                                                                <label for="receivedDate">Received Date</label>
                                                                                                <input data-date-format="yyyy-mm-dd" type="date" class="form-control" id="receivedDate" name="received_date" value="{{ $item->received_date }}" placeholder="Received Date" >
                                                                                            </div>
                                                                                            <div class="form-group col-md-6">
                                                                                                <label for="receivedAmount">£ Received</label>
                                                                                                <input type="number" class="form-control" id="receivedAmount" name="received_amount" value="{{ $item->received_amount }}" placeholder="£ Received" >
                                                                                            </div>

                                                                                            <div class="form-group col-md-6">
                                                                                                <label for="balance">£ Balance</label>
                                                                                                <input type="number" class="form-control" id="balance" name="balance" value="{{ $item->balance }}" placeholder="£ Balance" >
                                                                                            </div>
                                                                                            <div class="form-group col-md-6">
                                                                                                <label for="latePaymentDays">Late Payment Days</label>
                                                                                                <input type="number" class="form-control" id="latePaymentDays" name="late_payment_days" value="{{ $item->late_payment_days }}" placeholder="Late Payment Days" >
                                                                                            </div>

                                                                                        </div>

                                                                                        <button type="submit" class="btn btn-primary">Save</button>
                                                                                  </form>

                                                                                    </div><!-- .modal-body -->
                                                                                </div>
                                                                                <!-- .modal-content -->
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                @endif

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
