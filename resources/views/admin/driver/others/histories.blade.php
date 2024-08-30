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
                                                <a class="nav-link" href="{{ route('admin.notes', $driver->id) }}" wire:navigate >Notes</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link active btn btn-primary" href="{{ route('admin.driverFormHistory', $driver->id) }}" wire:navigate>History</a>
                                            </li>
                                        </ul>

                                    </div>
                                </div>


                                <div class="card card-bordere">
                                    <div class="card-inner-group">
                                        <div class="card-inner p-0">

                                           <div class="container-fluid ">
                                              <h4 class="m-4">Form History for {{ $driver->name }}</h4>
                                               <div class="table-responsive">
                                                   <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 100px">Timestamp</th>
                                                            <th>Hire Date Change</th>
                                                            <th>Day Return Extension</th>
                                                            <th>Contact Info</th>
                                                            <th>Address Info</th>
                                                            <th>Payment Date</th>
                                                            <th>Payment Amount</th>
                                                            <th>Vehicle Change</th>
                                                            <th>Hirer Insurance</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($histories as $history)
                                                        <tr>
                                                             <td>{{ $history->created_at->format('d M Y, h:i A') }}</td>
                                                            <!-- Hire Date Change -->
                                                            <td>
                                                                @if (isset($history->hire))
                                                                    @php
                                                                        $hireData = json_decode($history->hire, true);
                                                                    @endphp
                                                                    @foreach ($hireData as $field => $data)
                                                                        @if ($field === 'reason')
                                                                            <strong>{{ ucfirst(str_replace('_', ' ', $field)) }}</strong>: {{ $data['reason'] ?? 'N/A' }}<br>
                                                                        @else
                                                                            <strong>{{ ucfirst(str_replace('_', ' ', $field)) }}</strong>:<br>
                                                                            <span class="badge bg-warning">Old</span> - {{ $data['old_data'] ?? 'N/A' }}<br>
                                                                            <span class="badge bg-success">New</span> - {{ $data['new_data'] ?? 'N/A' }}<br>
                                                                        @endif
                                                                    @endforeach
                                                                @else
                                                                    N/A
                                                                @endif
                                                            </td>

                                                            <!-- Day Return Extension -->
                                                            <td>
                                                                @if (isset($history->hire))
                                                                    @php
                                                                        $dayReturnData = json_decode($history->hire, true);
                                                                    @endphp
                                                                    @foreach ($dayReturnData as $field => $data)
                                                                        @if ($field === 'reason')
                                                                            <strong>{{ ucfirst(str_replace('_', ' ', $field)) }}</strong>: {{ $data['reason'] ?? 'N/A' }}<br>
                                                                        @else
                                                                            <strong>{{ ucfirst(str_replace('_', ' ', $field)) }}</strong>:<br>
                                                                            <span class="badge bg-warning">Old</span> - {{ $data['old_data'] ?? 'N/A' }}<br>
                                                                            <span class="badge bg-success">New</span> - {{ $data['new_data'] ?? 'N/A' }}<br>
                                                                        @endif
                                                                    @endforeach
                                                                @else
                                                                    N/A
                                                                @endif
                                                            </td>

                                                            <!-- Address/Contact -->
                                                            <td>
                                                                @if (isset($history->personal_details))
                                                                    @php
                                                                        $contactData = json_decode($history->personal_details, true);
                                                                    @endphp
                                                                    @foreach ($contactData as $field => $data)
                                                                        @if ($field === 'reason')
                                                                            <strong>{{ ucfirst(str_replace('_', ' ', $field)) }}</strong>: {{ $data['reason'] ?? 'N/A' }}<br>
                                                                        @else
                                                                            <strong>{{ ucfirst(str_replace('_', ' ', $field)) }}</strong>:<br>
                                                                            <span class="badge bg-warning">Old</span> - {{ $data['old_data'] ?? 'N/A' }}<br>
                                                                            <span class="badge bg-success">New</span> - {{ $data['new_data'] ?? 'N/A' }}<br>
                                                                        @endif
                                                                    @endforeach
                                                                @else
                                                                    N/A
                                                                @endif
                                                            </td>
                                                             <!-- Address -->
                                                            <td>
                                                                @if (isset($history->address))
                                                                    @php
                                                                        $contactData = json_decode($history->address, true);
                                                                    @endphp
                                                                    @foreach ($contactData as $field => $data)
                                                                        @if ($field === 'reason')
                                                                            <strong>{{ ucfirst(str_replace('_', ' ', $field)) }}</strong>: {{ $data['reason'] ?? 'N/A' }}<br>
                                                                        @else
                                                                            <strong>{{ ucfirst(str_replace('_', ' ', $field)) }}</strong>:<br>
                                                                            <span class="badge bg-warning">Old</span> - {{ $data['old_data'] ?? 'N/A' }}<br>
                                                                            <span class="badge bg-success">New</span> - {{ $data['new_data'] ?? 'N/A' }}<br>
                                                                        @endif
                                                                    @endforeach
                                                                @else
                                                                    N/A
                                                                @endif
                                                            </td>

                                                            <!-- Payment Date -->
                                                            <td>
                                                                @if (isset($history->payment_date))
                                                                    @php
                                                                        $paymentData = json_decode($history->payment_date, true);
                                                                    @endphp
                                                                    @foreach ($paymentData as $field => $data)
                                                                        @if ($field === 'reason')
                                                                            <strong>{{ ucfirst(str_replace('_', ' ', $field)) }}</strong>: {{ $data['reason'] ?? 'N/A' }}<br>
                                                                        @elseif ($field == 'received_date')
                                                                            <strong>{{ ucfirst(str_replace('_', ' ', $field)) }}</strong>:<br>
                                                                            <span class="badge bg-warning">Old</span> - {{ $data['old_data'] ?? 'N/A' }}<br>
                                                                            <span class="badge bg-success">New</span> - {{ $data['new_data'] ?? 'N/A' }}<br>
                                                                        @endif
                                                                    @endforeach
                                                                @else
                                                                    N/A
                                                                @endif
                                                            </td>

                                                            <!-- Payment Amount -->
                                                            <td>
                                                                @if (isset($history->payment))
                                                                    @php
                                                                        $paymentData = json_decode($history->payment, true);
                                                                    @endphp
                                                                    @foreach ($paymentData as $field => $data)
                                                                        @if ($field === 'reason')
                                                                            <strong>{{ ucfirst(str_replace('_', ' ', $field)) }}</strong>: {{ $data['reason'] ?? 'N/A' }}<br>
                                                                        @elseif ($field == 'received_amount')
                                                                            <strong>{{ ucfirst(str_replace('_', ' ', $field)) }}</strong>:<br>
                                                                            <span class="badge bg-warning">Old</span> - {{ $data['old_data'] ?? 'N/A' }}<br>
                                                                            <span class="badge bg-success">New</span> - {{ $data['new_data'] ?? 'N/A' }}<br>
                                                                        @endif
                                                                    @endforeach
                                                                @else
                                                                    N/A
                                                                @endif
                                                            </td>

                                                            <!-- Vehicle Change -->
                                                            <td>
                                                                @if (isset($history->vehicle))
                                                                    @php
                                                                        $vehicleData = json_decode($history->vehicle, true);
                                                                    @endphp
                                                                    @foreach ($vehicleData as $field => $data)
                                                                        @if ($field === 'reason')
                                                                            <strong>{{ ucfirst(str_replace('_', ' ', $field)) }}</strong>: {{ $data['reason'] ?? 'N/A' }}<br>
                                                                        @else
                                                                            <strong>{{ ucfirst(str_replace('_', ' ', $field)) }}</strong>:<br>
                                                                            <span class="badge bg-warning">Old</span> - {{ $data['old_data'] ?? 'N/A' }}<br>
                                                                            <span class="badge bg-success">New</span> - {{ $data['new_data'] ?? 'N/A' }}<br>
                                                                        @endif
                                                                    @endforeach
                                                                @else
                                                                    N/A
                                                                @endif
                                                            </td>

                                                            <!-- Hirer Insurance -->
                                                            <td>
                                                                @if (isset($history->hirer_insurance))
                                                                    @php
                                                                        $insuranceData = json_decode($history->hirer_insurance, true);
                                                                    @endphp
                                                                    @foreach ($insuranceData as $field => $data)
                                                                        @if ($field === 'reason')
                                                                            <strong>{{ ucfirst(str_replace('_', ' ', $field)) }}</strong>: {{ $data['reason'] ?? 'N/A' }}<br>
                                                                        @else
                                                                            <strong>{{ ucfirst(str_replace('_', ' ', $field)) }}</strong>:<br>
                                                                            <span class="badge bg-warning">Old</span> - {{ $data['old_data'] ?? 'N/A' }}<br>
                                                                            <span class="badge bg-success">New</span> - {{ $data['new_data'] ?? 'N/A' }}<br>
                                                                        @endif
                                                                    @endforeach
                                                                @else
                                                                    N/A
                                                                @endif
                                                            </td>

                                                            <!-- Timestamp -->

                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>

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
