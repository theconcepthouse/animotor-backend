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
                                        <h4 class="nk-block-title text-capitalize"> Events Details</h4>
                                    </div>


                                    <div class="nk-block-head-content">
                                        <div class="toggle-wrap nk-block-tools-toggle">
                                            <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                            <div class="toggle-expand-content" data-content="pageMenu">
                                                <ul class="nk-block-tools g-3">

                                                    <li  wire:ignore  class="nk-block-tools-opt d-none d-sm-block">
                                                        <a class="btn btn-outline-light bg-white d-none d-sm-inline-flex" href="{{ route('admin.pastEvents') }}"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
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
                                        <div class="row">
                                            <div class="col-lg-8 offset-lg-2">
                                                <div class="card card-bordered">
                                                    <div class="card-inner">
                                                        <h5 class="card-title">Card title</h5>
                                                        <h6 class="card-subtitle mb-2 ff-base">Card subtitle</h6>
                                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                        <a href="#" class="card-link">Card link</a>
                                                        <a href="#" class="card-link">Another link</a>
                                                    </div>
                                                </div>
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
