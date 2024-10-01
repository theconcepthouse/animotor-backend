

{{--    @php--}}
{{--        $currentUrl = url()->current();--}}
{{--    @endphp--}}


<div class="nk-block nk-block-lg" >


    <div class="nk-block-head">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h4 class="nk-block-title text-capitalize">{{  __('admin.'.$role) }} {{ __('admin.listing') }} [{{ $status }}]</h4>
            </div>


            <div class="nk-block-head-content">
                <div class="toggle-wrap nk-block-tools-toggle">
                    <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                    <div class="toggle-expand-content" data-content="pageMenu">
                        <ul class="nk-block-tools g-3">

                            {{--                            <li>--}}
                            {{--                                <div class="form-control-wrap">--}}
                            {{--                                    <div class="form-icon form-icon-right">--}}
                            {{--                                        <em class="icon ni ni-search"></em>--}}
                            {{--                                    </div>--}}
                            {{--                                    <input wire:model.live="search" type="text" class="form-control" id="default-04" placeholder="Car search">--}}
                            {{--                                </div>--}}
                            {{--                            </li>--}}


                            @if(count($selected_items) > 0)
                                <li class="nk-block-tools-opt d-none d-sm-block">
                                    <span class="btn btn-warning"><span>{{ __('admin.selected_items') }} ({{ count($selected_items) }})</span></span>
                                </li>


                                <li>
                                    <div class="drodown">
                                        <a href="#" class="dropdown-toggle dropdown-indicator btn btn-outline-light btn-white" data-bs-toggle="dropdown" aria-expanded="false">Bulk Action</a>
                                        <div class="dropdown-menu dropdown-menu-end" style="">
                                            <ul class="link-list-opt no-bdr">
                                                <li class="text-center-"><a wire:confirm="Are you sure, you want to delete this records?" wire:click.stop="deleteSelectedItems"><span>Delete selected</span></a></li>
                                                <li class="text-center-"><a  wire:click.stop="changeSelectedItemsStatus('approved')"><span>Approve Users</span></a></li>
                                                <li class="text-center-"><a  wire:click.stop="changeSelectedItemsStatus('banned')"><span>Ban Users</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            @endif

{{--                            @if($role == 'driver')--}}


                                <li>
                                    <div class="drodown">
                                        <a href="#" class="dropdown-toggle dropdown-indicator btn btn-outline-light btn-white" data-bs-toggle="dropdown" aria-expanded="false">Filter</a>
                                        <div class="dropdown-menu dropdown-menu-end" style="">
                                            <ul class="link-list-opt no-bdr">
                                                <li class="text-center-"><a  wire:click.stop="setStatus('all')"><span>All </span></a></li>
                                                <li class="text-center-"><a  wire:click.stop="setStatus('approved')"><span>Approved</span></a></li>
                                                <li class="text-center-"><a  wire:click.stop="setStatus('online')"><span>Online</span></a></li>
                                                <li class="text-center-"><a  wire:click.stop="setStatus('pending')"><span>Pending</span></a></li>
                                                <li class="text-center-"><a  wire:click.stop="setStatus('banned')"><span>Banned</span></a></li>
                                                <li class="text-center-"><a  wire:click.stop="setStatus('negative_balance')"><span>Negative Balance</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>

{{--                            @endif--}}



                            <li  wire:ignore  class="nk-block-tools-opt d-none d-sm-block">
                                <a class="btn btn-outline-primary" wire:navigate href="{{ route('admin.create.customer') }}"><em class="icon ni ni-plus"></em><span>Registration</span></a>
                            </li>

                            <li  wire:ignore class="nk-block-tools-opt d-block d-sm-none">
                                <a  class="btn btn-icon btn-primary" href="{{ route('admin.create.customer') }}"><em class="icon ni ni-plus"></em></a>
                            </li>


                             <li  wire:ignore  class="nk-block-tools-opt d-none d-sm-block">
                                <a class="btn btn-outline-secondary" wire:navigate href="{{ route('admin.createOnBoarding') }}"><em class="icon ni ni-file-check"></em><span>Self Onboarding</span></a>
                            </li>
                            <li  wire:ignore  class="nk-block-tools-opt d-none d-sm-block">
                                <a class="btn btn-primary" wire:navigate href="{{ route('admin.addDriver') }}"><em class="icon ni ni-user-add"></em><span>Add Drivers</span></a>
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
                <div class="d-flex">
                    <div class="form-control-wrap">
                        <div class="form-icon form-icon-right">
                            <em class="icon ni ni-search"></em>
                        </div>
                        <input wire:model.live="search" type="text" class="form-control" id="default-04" placeholder="Start typing to search">
                    </div>

{{--                    <li class="ms-3">--}}
{{--                        <div class="drodown">--}}
{{--                            <a href="#" class="dropdown-toggle dropdown-indicator btn btn-outline-light btn-white" data-bs-toggle="dropdown" aria-expanded="false">Service type</a>--}}
{{--                            <div class="dropdown-menu dropdown-menu-end" style="">--}}
{{--                                <ul class="link-list-opt no-bdr">--}}
{{--                                    <li class="text-center-"><a  wire:click.stop="setServiceType('')"><span>All</span></a></li>--}}
{{--                                    @foreach(\App\Models\Service::all() as $service)--}}
{{--                                        <li class="text-center-"><a  wire:click.stop="setServiceType('{{ $service->id }}')"><span>{{ $service->name }} </span></a></li>--}}
{{--                                    @endforeach--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </li>--}}
                    <li class="ms-3">
                        <div class="drodown">
                            <a href="#" class="dropdown-toggle dropdown-indicator btn btn-outline-light btn-white" data-bs-toggle="dropdown" aria-expanded="false">Service area</a>
                            <div class="dropdown-menu dropdown-menu-end" style="">
                                <ul class="link-list-opt no-bdr">
                                    <li class="text-center-"><a  wire:click.stop="setServiceArea('')"><span>All</span></a></li>
                                    @foreach(\App\Models\Region::withoutAirport()->select('name','id')->get() as $service)
                                        <li class="text-center-"><a  wire:click.stop="setServiceArea('{{ $service->id }}')"><span>{{ $service->name }} </span></a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </li>
                </div>


                <div class="datatable-wrap- table-responsive my-3">



                    <table class="datatable-init- table-bordered nowrap table" data-export-title="{{ __('admin.export_title') }}">
                        <thead>
                        <tr>
                            <th><input type="checkbox" wire:model.live="selectAll"></th>
                            <th>{{ __('admin.sn') }}</th>
                            @if($role == 'driver')
{{--                            <th>{{ __('admin.is_online') }}</th>--}}
{{--                            <th>{{ __('admin.last_seen') }}</th>--}}
{{--                            <th>{{ __('admin.service_type') }}</th>--}}
                            @endif
                            <th>{{ __('admin.service_area') }}</th>
                            <th>{{ __('admin.full_name') }}</th>
                            @if($role == 'driver')
{{--                                <th>Car Type</th>--}}
{{--                                <th>Verification </th>--}}
                            @endif
                            <th>{{ __('admin.phone') }}</th>
{{--                            <th>{{ __('admin.account_balance') }}</th>--}}
                            <th>{{ __('admin.email_address') }}</th>
                            @if(settings('enable_monify_virtual_account') == 'yes')
                                <th>Monify Account</th>
                            @endif
                            @if($role == 'driver')
{{--                                <th>Document </th>--}}
                            @endif
                            <th>{{ __('admin.status') }}</th>
                            <th>{{ __('admin.action') }}</th>
                        </tr>

                        </thead>
                        <tbody>
                        @foreach($data as $item)
                            <tr wire:key="item.id">
                                <td><input type="checkbox" wire:model.live="selected_items" value="{{ $item->id }}"></td>

                                <td>{{ $loop->index + 1 }}</td>
                                @if($role == 'driver')
{{--                                    <td>--}}
{{--                                        @if($item->is_online)--}}
{{--                                            <span class="badge badge-dim bg-success">Yes</span>--}}
{{--                                        @else--}}
{{--                                            <span class="badge badge-dim bg-danger">No</span>--}}
{{--                                        @endif--}}
{{--                                    </td>--}}
{{--                                <td>{{ $item?->last_location_update ? $item?->last_location_update->format('H:i') : 'offline' }}</td>--}}
{{--                                <td>{{ $item?->service?->name ?? 'Not set' }}</td>--}}
                                @endif
                                <td>{{ $item?->region?->name ?? 'Not set' }}</td>
                                <td>{{ $item->name }}</td>
                                @if($role == 'driver')
{{--                                    <td>{{ $item?->car?->type }}</td>--}}
{{--                                    <td>--}}
{{--                                        <a href="{{ route('admin.driver.documents', ['id' => $item->id]) }}">--}}
{{--                                            @if($item->unapproved_documents < 1)--}}
{{--                                                <span class="badge badge-dim bg-success">Approved</span>--}}
{{--                                            @else--}}
{{--                                                <span class="badge badge-dim bg-danger">{{$item->unapproved_documents }} pending</span>--}}
{{--                                            @endif--}}
{{--                                        </a>--}}
{{--                                    </td>--}}

                                @endif

                                <td>{{ $item->full_phone }}</td>
{{--                                <td>{{ amt($item->balance) }}</td>--}}
                                <td>{{ $item->email }}</td>

                                @if(settings('enable_monify_virtual_account') == 'yes')
                                    <th>{{ $item->monify_account ? 'enabled' : 'missing' }}</th>
                                @endif

                                @if($role == 'driver')
{{--                                    <td>--}}
{{--                                        <a href="{{ route('admin.driver.documents', ['id' => $item->id]) }}" class="btn btn-outline-primary">--}}
{{--                                            <i class="icon ni ni-book"></i>--}}
{{--                                        </a>--}}
{{--                                    </td>--}}

                                @endif
                                <td>
                                    @if($item->status == 'approved')
                                        <span class="badge badge-dim bg-success">approved</span>
                                    @else
                                        <span class="badge badge-dim bg-danger">{{ $item->status }}</span>
                                    @endif
                                </td>

                                <td >
                                    <div class="d-flex">
                                        <a wire:navigate href="{{ route('admin.user.edit', $item->id) }}?back_url={{ $current_uri }}" class="btn btn-sm btn-icon btn-outline-gray btn-round mx-1"><em class="icon ni ni-edit"></em></a>

                                        <a wire:navigate href="{{ route('admin.driverForm', $item->id) }}" class="btn btn-sm btn-icon btn-outline-gray btn-round mx-1"><em class="icon ni ni-eye"></em></a>
                                        <a wire:navigate href="{{ route('admin.driver.documents', ['id' => $item->id]) }}" class="btn btn-sm btn-icon btn-outline-gray btn-round mx-1"><em class="icon ni ni-file"></em></a>
                                    </div>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="d-flex mt-2">
                        {!! $data->links() !!}
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
