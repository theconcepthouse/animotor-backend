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
                                        <h4 class="nk-block-title">{{ $title }}</h4>
                                    </div>
                                    <div class="nk-block-head-content">
                                        <div class="toggle-wrap nk-block-tools-toggle">
                                            <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                            <div class="toggle-expand-content" data-content="pageMenu">
                                                <ul class="nk-block-tools g-3">
                                                    <li class="nk-block-tools-opt d-none d-sm-block">
                                                        <a class="btn btn-primary" wire:navigate href="{{ route('admin.regions.create') }}?type=special&region_id={{ $region->id }}"><em class="icon ni ni-plus"></em><span>Add Special Place</span></a>
                                                    </li>
                                                    <li class="nk-block-tools-opt d-block d-sm-none">
                                                        <a class="btn btn-icon btn-primary"  wire:navigate  href="{{ route('admin.regions.create') }}?type=special&region_id={{ $region->id }}"><em class="icon ni ni-plus"></em></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div><!-- .toggle-wrap -->
                                    </div><!-- .nk-block-head-content -->

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
                                                    <th>Name</th>
                                                    <th>Amount</th>
                                                    <th>Fee Type</th>
                                                    <th>Fee Mode</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>

                                                </thead>
                                                <tbody>
                                                @foreach($data as $item)
                                                    <tr>
                                                        <td>{{ $loop->index + 1 }}</td>
                                                        <td>{{ $item->name }}</td>
                                                        <td>{{ $item->airport_amount }}</td>
                                                        <td>{{ $item->airport_fee_type }}</td>
                                                        <td>{{ $item->airport_fee_mode }}</td>

                                                        <td>
                                                            @include('admin.components.toggle-switch', ['model' => "Region", 'item' => $item, 'checked' => $item->is_active, 'field' => 'is_active'])
                                                        </td>

                                                        <td>
                                                            <a class="btn btn-warning" href="{{ route('admin.regions.edit', $item->id) }}">Edit</a>

                                                            <a  data-bs-toggle="modal" href="#{{ 'delete_'.$item->id }}"  class="btn btn-danger">Delete</a>

                                                        </td>

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

    @foreach($data as $item)

        @component('admin.components.delete_modal', [
       'modalId' => 'delete_'.$item->id,
       'title' => 'Do you really want to delete this special place?',
       'action' => route('admin.regions.destroy', $item->id), // Form action URL for the delete action
       'message' => 'Deleting this special place is irreversible', // Message to display in the modal
   ])
    @endcomponent

    @endforeach
@endsection
