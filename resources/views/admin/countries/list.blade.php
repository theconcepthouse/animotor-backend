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

                                </div>

                            </div>

                            <div class="card card-bordered card-preview">
                                <div class="card-inner">
                                    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                        <div class="datatable-wrap- my-3">
                                            <table class="datatable-init nowrap table" data-export-title="Export">
                                                <thead>
                                                <tr>
                                                    <th>Flag</th>
                                                    <th>Name</th>
                                                    <th>Country code</th>
                                                    <th>Currency</th>
                                                    <th>Currency Symbol</th>
                                                    <th>Active</th>
                                                    <th>Action</th>
                                                </tr>

                                                </thead>
                                                <tbody>
                                                @foreach($data as $item)
                                                    <tr>
                                                        <td>
                                                            <img src="{{ $item->flag }}" />

                                                        </td>
                                                        <td>{{ $item->name }}</td>
                                                        <td>{{ $item->dial_code }}</td>
                                                        <td>{{ $item->currency_code }}</td>
                                                        <td>{{ $item->currency_symbol }}</td>

                                                        <td>
                                                            @include('admin.components.toggle-switch', ['model' => "Country", 'item' => $item, 'checked' => $item->is_active, 'field' => 'is_active'])
{{--                                                            <x-toggle-switch :model="$item" field="is_active" />--}}


{{--                                                            <livewire:toggle-item-status :model="$item" field="is_active"--}}
{{--                                                                                         key="{{ $item->id }}"--}}
{{--                                                                                          />--}}
                                                        </td>
                                                        <td>

                                                            <a class="btn btn-warning btn-sm" href="{{ route('admin.countries.edit', $item->id) }}"><em class="icon ni ni-edit"></em></a>

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
