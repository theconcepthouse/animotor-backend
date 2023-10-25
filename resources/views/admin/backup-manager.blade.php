@extends('admin.layout.app')
@section('content')

    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-block">
                    <div class="nk-block nk-block-lg">
                        <div class="nk-block-head">
                            <div class="nk-block-between">
                                <div class="nk-block-head-content">
                                    <h4 class="nk-block-title">Backup Manager</h4>
                                </div>
                                <div class="nk-block-head-content">
                                    <div class="toggle-wrap nk-block-tools-toggle">
                                        <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                        <div class="toggle-expand-content" data-content="pageMenu">
                                            <ul class="nk-block-tools g-3">
                                                <li class="nk-block-tools-opt d-none d-sm-block">

                                                    @include('lara-backup-manager::partials.create-backup-btn')

                                                </li>

                                            </ul>
                                        </div>
                                    </div><!-- .toggle-wrap -->
                                </div><!-- .nk-block-head-content -->

                            </div>

                        </div>

                        <div class="card card-bordered card-preview">
                            <div class="card-inner">

                                @include('lara-backup-manager::partials.backup-listing')

                            </div>
                        </div>
                        <!-- .card-preview -->
                    </div>

                </div><!-- .nk-block -->
            </div>
        </div>
    </div>

@endsection
