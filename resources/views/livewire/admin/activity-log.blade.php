<div class="nk-block" wire:poll.30s>


    <div class="nk-block-head">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h4 class="nk-block-title text-capitalize-"><span class="text-capitalize"></span> {{ __('admin.activity_log') }}</h4>
            </div>
            <div class="nk-block-head-content">
                <div class="toggle-wrap nk-block-tools-toggle">
                    <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em
                            class="icon ni ni-menu-alt-r"></em></a>
                    <div class="toggle-expand-content" data-content="pageMenu">

                    </div>
                </div>
            </div><!-- .nk-block-head-content -->

        </div>

    </div>


    <div class="card card-bordered card-preview">
        <div class="card-inner">


                <div class="dataTables_wrapper dt-bootstrap4 no-footer mt-4">
                    <div class="d-flex">
                        <div class="form-control-wrap">
                            <div class="form-icon form-icon-right">
                                <em class="icon ni ni-search"></em>
                            </div>
                            <input wire:model.live="search" type="text" class="form-control" id="default-04" placeholder="Activity search">
                        </div>
                    </div>
                    <div class="table-responsive my-3">
                        <table class="nowrap table-condensed table-bordered table-striped table">
                            <thead>
                            <tr>
                                <th>{{ __('admin.sn') }}</th>

                                <th>{{ __('admin.created_at') }}</th>
                                <th>{{ __('admin.title') }}</th>
                                <th>{{ __('admin.info') }}</th>
                            </tr>

                            </thead>
                            <tbody>
                            @foreach($data as $item)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>

                                    <td>{{ $item?->created_at }}</td>

                                    <td>{{ $item?->title }}</td>

                                    <td>{{ $item?->info }}</td>

                                </tr>
                            @endforeach
                            @if(count($data) < 1)
                                <tr>
                                    <td class="text-center" colspan="4">No record found</td>
                                </tr>
                            @endif
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
