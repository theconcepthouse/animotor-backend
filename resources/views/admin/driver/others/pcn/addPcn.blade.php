@extends('admin.layout.app')
@section('content')

    <style>
        .btn, .dual-listbox .dual-listbox__button {
            position: relative;
            letter-spacing: 0.02em;
             display: inline;
            align-items: center;
        }
    </style>

    <div class="nk-content mt-5">
        <div class="container">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head-content mb-3">
                        <a href="{{ route('admin.notes', $driver->id) }}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex">
                            <em class="icon ni ni-arrow-left"></em>
                            <span>Back</span>
                        </a>

                    </div>
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
                                                   <form action="{{ route('admin.storeDriverPcn', $driver->id) }}" method="POST">
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
                                                    <div class="row">
                                                        <div class="form-group col-md-6">
                                                            <label class="form-label" for="datePostReceived">Date post received</label>
                                                            <input type="date" class="form-control" id="datePostReceived" name="date_post_received" placeholder="Date post received">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="form-label" for="from">VRM</label>
                                                            <select name="vrm" class="form-control" id="">
                                                                @foreach($cars as $item)
                                                                    <option value="{{ $item->registration_number ?? '' }}">{{ $item->registration_number ?? '' }}</option>
                                                                @endforeach
                                                            </select>

                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="form-label" for="pcnNo">PCN no.</label>
                                                            <input type="text" class="form-control" id="pcnNo" name="pcn_no" placeholder="MUKHTAR-0579">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="form-label" for="dateOfIssue">Date of issue</label>
                                                            <input type="date" class="form-control" id="dateOfIssue" name="date_of_issue" placeholder="Date of issue">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="form-label" for="dateOfContravention">Date of contravention</label>
                                                            <input type="date" class="form-control" id="dateOfContravention" name="date_of_contravention" placeholder="Date of contravention">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="form-label" for="deadlineDate">Deadline Date</label>
                                                            <input type="date" class="form-control" id="deadlineDate" name="deadline_date" placeholder="Deadline Date">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="form-label" for="issuingAuthority">Issuing authority</label>
                                                            <select id="issuingAuthority" name="issuing_authority" class="form-control">
                                                                <option selected>Urgent</option>
                                                                <option>Authority 1</option>
                                                                <option>Authority 2</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="form-label" for="priority">Priority</label>
                                                            <select id="priority" name="priority" class="form-control">
                                                                <option selected>Urgent</option>
                                                                <option>High</option>
                                                                <option>Medium</option>
                                                                <option>Low</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-6">
                                                            <label class="form-label" for="notes">Notes</label>
                                                            <input type="text" class="form-control" id="notes" name="notes" placeholder="MUKHTAR-0579">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="form-label" for="status">Status</label>
                                                            <select id="status" name="status" class="form-control">
                                                                <option selected>Send to driver</option>
                                                                <option>Representation made</option>
                                                                <option>Statutory deceleration</option>
                                                                <option>Paid</option>
                                                                <option>Appealed</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="m-3 text-center">
                                                        <button type="submit" class="btn btn-custom btn-primary col-lg-6">Next</button>
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
