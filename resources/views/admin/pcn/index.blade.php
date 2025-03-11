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
                                        <h4 class="nk-block-title">All PCN</h4>
                                    </div>


                                    <div class="nk-block-head-content">
                                        <div class="toggle-wrap nk-block-tools-toggle">
                                            <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                            <div class="toggle-expand-content" data-content="pageMenu">
                                                <ul class="nk-block-tools g-3">
{{--                                                    <li>--}}
{{--                                                        <div class="form-control-wrap">--}}
{{--                                                            <div class="form-icon form-icon-right">--}}
{{--                                                                <em class="icon ni ni-search"></em>--}}
{{--                                                            </div>--}}
{{--                                                            <input wire:model.live="search" type="text" class="form-control" id="default-04" placeholder="Car search">--}}
{{--                                                        </div>--}}
{{--                                                    </li>--}}

                                                    <li class="nk-block-tools-opt d-none d-sm-block">
                                                        <a class="btn btn-primary" wire:navigate href="{{ route('admin.pcns.create') }}"><em class="icon ni ni-plus"></em><span>{{ __('admin.add_new') }}</span></a>
                                                    </li>
                                                    <li class="nk-block-tools-opt d-none d-sm-block">
                                                        <button type="button" class="btn btn-warning" wire:click="resetPageData"><span>{{ __('admin.reset_page') }}</span></button>
                                                    </li>
                                                    <li class="nk-block-tools-opt d-block d-sm-none">
                                                        <a class="btn btn-icon btn-primary" wire:navigate data-bs-toggle="modal" href="{{ route('admin.pcns.create') }}"><em class="icon ni ni-plus"></em></a>
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
                                            <table class="datatable-init-export nowrap table dataTable no-footer dtr-inline" data-export-title="{{ __('admin.export_title') }}">
                                                <thead>
                                                <tr>
                                                    <th>{{ __('admin.sn') }}</th>
                                                    <th>Driver</th>
                                                    <th>{{ __('admin.vrm') }}</th>
                                                    <th>{{ __('admin.pcn_no') }}</th>
                                                    <th>{{ __('admin.offence_date') }}</th>
                                                    <th>{{ __('admin.offence_type') }}</th>
                                                    <th>{{ __('admin.status') }}</th>
                                                </tr>

                                                </thead>
                                                <tbody>
                                                @foreach($pcns as $item)
                                                    <tr>
                                                        <td>#{{ $loop->index+1 }}</td>
                                                        <td><a href="{{ route('admin.driverPcn', $item->driver->id ?? '') }}" class="btn btn-sm btn-primary">{{ $item->driver->first_name ?? '' }} {{ $item->driver->last_name ?? '' }}</a></td>
                                                        <td><a class="btn btn-warning"> {{ $item->vrm }}</a></td>
                                                        <td>{{ $item->pcn_no }}</td>
                                                        <td>{{ date('d M, Y', strtotime($item->date_of_contravention)) }}</td>
                                                        <td>{{ $item->type }}</td>
                                                        <td>{{ $item->status }}</td>
                                                    </tr>
                                                @endforeach

                                                @if(count($pcns) < 1)
                                                    <tr>
                                                        <td class="text-center mt-5" colspan="7">{{ __('admin.table_no_data') }}</td>
                                                    </tr>
                                                @endif
                                                </tbody>
                                            </table>

                                            <div class="d-flex mt-2">
                                                {!! $pcns->links() !!}
                                            </div>


                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
