@extends('admin.layout.app')
@section('content')

    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">

                    <div class="nk-block">
                        <div class="nk-block nk-block-lg">
                            <div class="nk-block-head">
                                <div class="nk-block-between">
                                    <div class="nk-block-head-content">
                                        <h4 class="nk-block-title">Vehicle Checks</h4>
                                    </div>


                                </div>

                            </div>

                            <div class="card card-bordered card-preview">
                                <div class="card-inner">
                                    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                        <div class="datatable-wrap- my-3">
                                            <table class="datatable-init nowrap table" data-export-title="Export">
                                                <thead>
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>VRM</th>
                                                    <th>Make</th>
                                                    <th>Model</th>
                                                    <th>Checklist In</th>
                                                    <th>Check In Date</th>
{{--                                                    <th>Action</th>--}}
                                                </tr>

                                                </thead>
                                                <tbody>
                                                @foreach($data as $item)
                                                    <tr>
                                                        <td>{{ $loop->index + 1 }}</td>
{{--                                                        <td>{{ $loop->index + 1 }}</td>--}}
                                                        <td><a wire:navigate href="{{ route('admin.cars.edit', $item->car_id) }}?back_url={{ url()->current() }}" class="badge badge-dim- bg-warning"> {{ $item?->car?->registration_number }}</a></td>
                                                        <td>{{  $item?->car?->make }}</td>
                                                        <td>{{  $item?->car?->model }}</td>
                                                        <td>Checklists</td>

                                                        <td>{{ $item?->created_at->format('d-m-Y') }}</td>


                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- .card-preview -->
                        </div>

                    </div><!-- .nk-block -->
                </div>
            </div>
        </div>
    </div>


@endsection
