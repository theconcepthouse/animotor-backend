@extends('admin.layout.app')
@section('content')

    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">

                    <div class="nk-block">
                        <div class="nk-block nk-block-lg">
                            <div class="nk-block-head">
                                <div class="nk-block-head-content">
                                    <h4 class="nk-block-title">{{ $title }}</h4>

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
                                                        <span class="sub-text">Type</span>
                                                    </th>
                                                    <th class="nk-tb-col tb-col-lg sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Verified: activate to sort column ascending">
                                                        <span class="sub-text">Platform</span>
                                                    </th>
                                                    <th class="nk-tb-col tb-col-md sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Phone: activate to sort column ascending">
                                                        <span class="sub-text">Joined</span>
                                                    </th>
                                                    <th></th>

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
                                                           {{ $item->email }} <br />

                                                           <a href="{{ route('admin.user.restore_delete', $item->id) }}" class="btn btn-success">Restore</a>
                                                       </span>
                                                        </td>

                                                        <td class="nk-tb-col tb-col-mb" data-order="30.00">
                                                       <span class="tb-amount text-primary">
                                                           {{ $item->phone }}
                                                       </span>
                                                        </td>

                                                        <td class="nk-tb-col tb-col-md">
                                                            {{ $item->role() }}
{{--                                                            {!! $item->status() !!}--}}
                                                        </td>

                                                        <td class="nk-tb-col tb-col-md">
                                                            {{ $item->platform }}
                                                        </td>

                                                        <td class="nk-tb-col tb-col-md">
                                                            <span>{{ $item->created_at }}</span>
                                                        </td>

                                                        <td class="nk-tb-col tb-col-md">
                                                            <form method="POST" action="{!! route('admin.user.force_delete', $item->id) !!}" accept-charset="UTF-8">
                                                                <input name="_method" value="DELETE" type="hidden">
                                                                {{ csrf_field() }}

                                                                <div class="btn-group btn-group-xs pull-right" role="group">
                                                                    <button type="submit" class="btn btn-sm  js-bs-tooltip-enabled" data-bs-toggle="tooltip" title="" data-bs-original-title="Delete" onclick="return confirm(&quot;Delete User?&quot;)">
                                                                        <em class="icon ni ni-na"></em>
                                                                        <span class="text-danger">Permanent Delete</span>
                                                                    </button>

                                                                </div>

                                                            </form>
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
