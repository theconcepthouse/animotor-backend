@extends('admin.layout.app')
@section('content')

    <style>
        .nk-sidebar {
            display: none;
        }

        .nk-header {
            display: none;
        }
    </style>

    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="components-preview wide-md- mx-auto">

                        <div class="nk-block">

                            <div class="nk-block-between g-3">
                                <div class="nk-block-head-content mb-5">
                                    <h4 class="title nk-block-title">PCN History</h4>
                                </div>
                                <div class="nk-block-head-content">
                                    <a href="javascript:history.back()"
                                       class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em
                                            class="icon ni ni-arrow-left"></em><span>Back</span></a>
                                    <a href="javascript:history.back()"
                                       class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em
                                            class="icon ni ni-arrow-left"></em></a>

                                </div>
                            </div>
                            <div class="row g-gs">

                                <div class="col-lg-12">
                                    <div class="card card-bordered h-100">
                                        <div class="card-inner">


                                            <div class="container mt-4">
                                                <div class="mb-4">
                                                    <h4 class="title nk-block-title">PCN Details</h4>
                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table table-striped">
                                                        <thead>
                                                        <tr>
                                                            <th>Date Post Received</th>
                                                            <th>VRM</th>
                                                            <th>PCN No</th>
                                                            <th>Date of Issue</th>
                                                            <th>Date of Contravention</th>
                                                            <th>Deadline Date</th>
                                                            <th>Issuing Authority</th>
                                                            <th>Action</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($pcn as $item)
                                                            <tr>
                                                                <td>{{ $item->date_post_received }}</td>
                                                                <td>{{ $item->vrm }}</td>
                                                                <td>{{ $item->pcn_no }}</td>
                                                                <td>{{ $item->date_of_issue }}</td>
                                                                <td>{{ $item->date_of_contravention }}</td>
                                                                <td>{{ $item->deadline_date }}</td>
                                                                <td>{{ $item->issuing_authority }}</td>
                                                                <td><a href="#" data-bs-toggle="modal"
                                                                       data-bs-target="#modalDefault" class="btn"><em
                                                                            class="ni ni-eye text-primary"></em></a>
                                                                </td>

                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>


                                                @foreach($pcn as $item)
                                                    <div class="modal fade" tabindex="-1" id="modalDefault">
                                                        <div class="modal-dialog modal-dialog-top modal-body-"
                                                             role="document">
                                                            <div class="modal-content">
                                                                <a href="#" class="close" data-bs-dismiss="modal"
                                                                   aria-label="Close">
                                                                    <em class="icon ni ni-cross"></em>
                                                                </a>
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">PCN Details</h5>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <table class="table table-bordered">
                                                                        <tbody>
                                                                        @foreach($pcn as $item)
                                                                            <tr>
                                                                                <th>Priority</th>
                                                                                <td>{{ $item->priority }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Notes</th>
                                                                                <td>{{ $item->notes }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Status</th>
                                                                                <td>{{ $item->status }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Linkup with Driver</th>
                                                                                <td>{{ $item->linkup_with_driver }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Linkup with Vehicle Reg No</th>
                                                                                <td>{{ $item->linkup_with_vehicle_registration_no }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Type</th>
                                                                                <td>{{ $item->type }}</td>
                                                                            </tr>
                                                                        @endforeach
                                                                        </tbody>
                                                                    </table>


                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach



                                                <!-- Modal Trigger Code -->


                                            </div>


                                        </div>
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
