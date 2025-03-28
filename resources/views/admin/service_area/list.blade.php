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
                                                        <a class="btn btn-primary" wire:navigate href="{{ route('admin.regions.create') }}"><em class="icon ni ni-plus"></em><span>Add New Area</span></a>
                                                    </li>
                                                    <li class="nk-block-tools-opt d-block d-sm-none">
                                                        <a class="btn btn-icon btn-primary"  wire:navigate  href="{{ route('admin.regions.create') }}"><em class="icon ni ni-plus"></em></a>
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
                                                    <th>Image</th>
                                                    <th>Name</th>
                                                    <th>Cities / Towns</th>
                                                    <th>Currency</th>
                                                    <th>Timezone</th>
                                                    <th>Country</th>
                                                    @if(!request()->has('region_id'))
                                                    <th>Sub regions</th>
                                                    @endif
                                                    @if(hasSpecialPlaces())
                                                        <th>Special Places</th>
                                                    @endif
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>

                                                </thead>
                                                <tbody>
                                                @foreach($data as $item)
                                                    <tr>
                                                        <td>{{ $loop->index + 1 }}</td>
                                                        <td><img src="{{ $item->image }}" style="height: 40px;" /></td>
                                                        <td>{{ $item->name }}</td>
                                                        <td>{{ $item->cities }}</td>
                                                        <td>{{ $item->currency_symbol }}</td>
                                                        <td>{{ $item->timezone }}</td>
                                                        <td>{{ $item?->country?->name ?? 'None' }}</td>
                                                        @if(!request()->has('region_id'))
                                                        <td><a wire:navigate href="{{ route('admin.regions.index') }}?region_id={{ $item->id }}"> {{ $item->regions->count() }}</a></td>
                                                        @endif

                                                        @if(hasSpecialPlaces())
                                                        <td><a wire:navigate href="{{ route('admin.regions.airports', $item->id) }}"> {{ $item->airports->count() }}</a></td>
                                                        @endif


                                                        <td>
                                                            @include('admin.components.toggle-switch', ['model' => "Region", 'item' => $item, 'checked' => $item->is_active, 'field' => 'is_active'])

{{--                                                        @if($item->is_active)--}}
{{--                                                                <span class="badge badge-dim bg-success">Active</span>--}}
{{--                                                            @else--}}
{{--                                                                <span class="badge badge-dim bg-danger">Inactive</span>--}}
{{--                                                            @endif--}}
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
       'title' => 'Do you really want to delete this?',
       'action' => route('admin.regions.destroy', $item->id), // Form action URL for the delete action
       'message' => 'Deleting this region will delete all associated data.', // Message to display in the modal
   ])
    @endcomponent

    @endforeach
@endsection
