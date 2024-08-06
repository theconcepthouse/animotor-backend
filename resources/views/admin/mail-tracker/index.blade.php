@extends('admin.layout.app') @section('content')

<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block nk-block-lg">
                    <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <h4 class="nk-block-title">Mail Tracker</h4>

                        </div>
                    </div>
                    <div class="card card-bordered card-preview">

                        <div class="card-inner">
                             <a href="{{ route('admin.mailTracker.create') }}" class="btn btn-primary">Add Mail Tracker</a>
                            <div id="DataTables_Table_2_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="datatable-wrap my-3">
                                    <table class="datatable-init-export nowrap table dataTable no-footer dtr-inline" data-export-title="Export" id="DataTables_Table_2" aria-describedby="DataTables_Table_2_info">
                                        <thead>
                                            <tr>
                                                <th class="sorting sorting_asc" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending">From</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending">Reference No</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending">Type</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending">Deadline Date</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending">Status</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($mailTrackers as $item)
                                            <tr class="odd">
                                                <td>{{ $item->mail_tracker['from'] ?? 'N/A' }}</td>
                                                <td>{{ $item->mail_tracker['reference_no'] ?? 'N/A' }}</td>
                                                <td>{{ $item->mail_tracker['type'] ?? 'N/A' }}</td>
                                                <td>{{ $item->mail_tracker['deadline_date'] ?? 'N/A' }}</td>
                                                <td>{{ $item->status ?? 'Pending' }}</td>
                                                <td>
                                                    <a href="{{ route('admin.mailTracker.edit', $item->id) }}" class="btn btn-sm btn-icon btn-outline-gray btn-round mx-1"> <em class="icon ni ni-edit"></em></a>
                                                    <a href="{{ route('admin.mailTracker.edit', $item->id) }}" class="btn btn-sm btn-icon btn-outline-gray btn-round mx-1"> <em class="icon ni ni-eye"></em></a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6">No mail trackers found.</td>
                                            </tr>
                                        @endforelse

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- .card-preview -->
                </div>
                <!-- .nk-block -->
            </div>
        </div>
    </div>
</div>

@endsection
