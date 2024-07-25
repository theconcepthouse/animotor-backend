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
                                        <h4 class="nk-block-title">
                                            {{ isOwner() ? 'Managers listing' : 'Admin listing' }}
                                        </h4>
                                    </div>
                                    <div class="nk-block-head-content">
                                        <div class="toggle-wrap nk-block-tools-toggle">
                                            <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                            <div class="toggle-expand-content" data-content="pageMenu">
                                                <ul class="nk-block-tools g-3">
                                                    <li class="nk-block-tools-opt d-none d-sm-block">
                                                        <a class="btn btn-primary" wire:navigate href="{{ route('admin.createAdmin') }}?role={{ isOwner() ? 'manager' : 'admin' }}&&back_url={{ url()->current() }}"><em class="icon ni ni-plus"></em><span>Add New</span></a>
                                                    </li>
                                                    <li class="nk-block-tools-opt d-block d-sm-none">
                                                        <a class="btn btn-icon btn-primary" wire:navigate href="{{ route('admin.user.create') }}?role={{ isOwner() ? 'manager' : 'admin' }}&&back_url={{ url()->current() }}"><em class="icon ni ni-plus"></em></a>
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
                                            <table class="datatable-init nowrap nk-tb-list nk-tb-ulist dataTable no-footer" data-auto-responsive="false" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
                                                <thead>
                                                <tr class="nk-tb-item nk-tb-head">

                                                    <th class="nk-tb-col sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="User: activate to sort column ascending">
                                                        <span class="sub-text">Name</span>
                                                    </th>
                                                    <th class="nk-tb-col tb-col-mb sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Balance: activate to sort column ascending">
                                                        <span class="sub-text">Email</span>
                                                    </th>
                                                    <th class="nk-tb-col tb-col-mb sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Balance: activate to sort column ascending">
                                                        <span class="sub-text">Phone</span>
                                                    </th>
                                                    <th class="nk-tb-col tb-col-lg sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Verified: activate to sort column ascending">
                                                        <span class="sub-text">Department</span>
                                                    </th>
                                                    <th class="nk-tb-col tb-col-lg sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Verified: activate to sort column ascending">
                                                        <span class="sub-text">Status</span>
                                                    </th>

                                                    <th class="nk-tb-col tb-col-lg" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1">
                                                        <span class="sub-text">Action</span>
                                                    </th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($users as $item)
                                                    <tr class="nk-tb-item even">

                                                        <td class="nk-tb-col">
                                                            <div class="user-card">

                                                                <div class="user-info">
                                                                <span class="tb-lead">{{ $item->name }} <span class="dot dot-success d-md-none ms-1"></span>
                                                               </span>

                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="nk-tb-col tb-col-mb" data-order="30.00">
                                                       <span class="tb-amount text-primary">
                                                           {{ $item->email }}
                                                       </span>
                                                        </td>

                                                        <td class="nk-tb-col tb-col-mb" data-order="30.00">
                                                       <span class="tb-amount text-primary">
                                                           {{ $item->phone }}
                                                       </span>
                                                        </td>

                                                        <td class="nk-tb-col tb-col-md text-uppercase">
                                                            {{ $item->role() }}
                                                        </td>


                                                        <td class="nk-tb-col tb-col-md">
                                                            <span>{{ $item->trashed() ? 'Deactivated' : 'Active' }}</span>
                                                        </td>

                                                        <td wire:ignore class="nk-tb-col nk-tb-col-tools">
                                                            <div class="d-flex">
                                                                <a wire:navigate href="{{ route('admin.user.edit', $item->id) }}?back_url={{ url()->current() }}" class="btn btn-sm btn-icon btn-outline-gray btn-round mx-1"><em class="icon ni ni-edit"></em></a>

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
                            <!-- .card-preview -->
                        </div>

                    </div><!-- .nk-block -->
                </div>
            </div>
        </div>
    </div>


@endsection
