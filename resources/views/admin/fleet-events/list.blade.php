@extends('admin.layout.app')
@section('content')

    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">

                    <div class="nk-block">
                        <div class="nk-block nk-block-lg" wire:poll.50s>


                            <div class="nk-block-head">
                                <div class="nk-block-between">
                                    <div class="nk-block-head-content">
                                        <h4 class="nk-block-title text-capitalize">Passed Events</h4>
                                    </div>


                                    <div class="nk-block-head-content">
                                        <div class="toggle-wrap nk-block-tools-toggle">
                                            <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                            <div class="toggle-expand-content" data-content="pageMenu">
                                                <ul class="nk-block-tools g-3">

                                                    <li  wire:ignore  class="nk-block-tools-opt d-none d-sm-block">
                                                        <a class="btn btn-outline-light bg-white d-none d-sm-inline-flex" href="{{ route('admin.fleetEvent') }}"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div><!-- .toggle-wrap -->
                                    </div><!-- .nk-block-head-content -->

                                </div>

                            </div>

                            <div class="card card-bordered card-preview">
                                @if(session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session()->get('message') }}
                                    </div>
                                @endif
                                <div class="card-inner">
                                    <div id="DataTables_Table_2_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                        <div class="datatable-wrap my-3">
                                            <table class="datatable-init-export nowrap table dataTable no-footer dtr-inline" data-export-title="Export" id="DataTables_Table_2" aria-describedby="DataTables_Table_2_info">
                                                <thead>
                                                    <tr>
                                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending">S/N</th>
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" >Event</th>
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" >Start Date</th>
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" >End Date</th>
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" >Category</th>
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" >Desc</th>
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" >Status</th>
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" >Action</th>
                                                    </tr>

                                                </thead>
                                                <tbody>
                                                @foreach($events as $value => $item)
                                                    <tr class="odd">
                                                        <td>{{ $value + 1 }}</td>
                                                        <td><a href="#" class="btn btn-success btn-sm">{{ $item->title }}</a></td>
                                                        <td>{{ date('Y-m-d  h:i A', strtotime($item->start_date)) }}</td>
                                                        <td>{{ date('Y-m-d  h:i A', strtotime($item->end_date)) }}</td>
                                                        <td>{{ $item->category() }}</td>
                                                        <td>{!! $item->description !!}</td>
                                                        <td>
                                                           <button type="button" class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#modalDefault-{{ $item?->id }}">{!! $item->status() !!}</button>

                                                        </td>
                                                        <td>
                                                            <div class="d-flex">

{{--                                                                <a wire:navigate href="{{ route('admin.viewEvent', $item->id) }}" class="btn btn-sm btn-icon btn-outline-gray btn-round mx-1">--}}
{{--                                                                    <em class="icon ni ni-eye"></em>--}}
{{--                                                                </a>--}}
                                                                <form method="POST" action="{{ route('admin.event.destroy', $item->id) }}" onsubmit="return confirm('Are you sure you want to delete this item?');">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-sm btn-icon btn-outline-gray btn-round mx-1">
                                                                        <em class="icon ni ni-trash"></em>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>


                                                      <div class="modal fade" tabindex="-1" id="modalDefault-{{ $item?->id }}"  aria-modal="true" role="dialog">
                                                         <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                        <div class="modal-header">
                                                        <h5 class="modal-title">Modal Title</h5>
                                                        <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                            <em class="icon ni ni-cross"></em>
                                                        </a>
                                                        </div>
                                                        <div class="modal-body">
                                                        <form action="{{ route('admin.event.updateStatus') }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="event_id" value="{{ $item?->id }}">
                                                            <div class="row">
                                                                <div class="col-lg-10">
                                                                    <select name="status" class="form-control" id="">
                                                                        <option selected disabled>Select Status</option>
                                                                        <option value="pending">Pending</option>
                                                                        <option value="in-progress">In-Progress</option>
                                                                        <option value="completed">Completed</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-lg-8 mt-3">
                                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        </div>
                                                        </div>
                                                        </div>
                                                    </div>

                                                @endforeach

                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div><!-- .nk-block -->
                </div>
            </div>
        </div>
    </div>


@endsection
