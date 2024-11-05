@extends('admin.layout.app') @section('content') @include('admin.driver.tinymix')

<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                @if(session()->has('error'))
                <div class="alert alert-danger">
                    {{ session()->get('error') }}
                </div>
                @endif @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
                @endif
                <div class="nk-ibx">
                    <div class="nk-ibx-aside toggle-screen-lg" data-content="inbox-aside" data-toggle-overlay="true" data-toggle-screen="lg">
                        <div class="nk-ibx-head">
                            <h5 class="mb-0">Message</h5>
                            <a class="link link-primary" data-bs-toggle="modal" href="#compose-mail"><em class="icon ni ni-plus"></em> <span>Compose</span></a>
                        </div>
                        <div class="nk-ibx-nav" data-simplebar="init">
                            <div class="simplebar-wrapper" style="margin: 0px;">
                                <div class="simplebar-height-auto-observer-wrapper">
                                    <div class="simplebar-height-auto-observer"></div>
                                </div>
                                <div class="simplebar-mask">
                                    <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                        <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: 100%; overflow: hidden scroll;">
                                            <div class="simplebar-content" style="padding: 0px;">
                                                <ul class="nk-ibx-menu">
                                                   <li >
                                                        <a class="nk-ibx-menu-item" href="{{ route('admin.message.index') }}" wire:navigate>
                                                            <em class="icon ni ni-inbox"></em>
                                                            <span class="nk-ibx-menu-text">Inbox</span>
                                                            <span class="badge rounded-pill bg-warning">{{ $inboxCount }}</span>
                                                        </a>
                                                    </li>
                                                    <li class="active">
                                                        <a class="nk-ibx-menu-item" href="{{ route('admin.message.sent') }}" wire:navigate>
                                                            <em class="icon ni ni-send"></em>
                                                            <span class="nk-ibx-menu-text">Sent</span>
                                                             <span class="badge rounded-pill bg-primary">{{ $sentCount }}</span>
                                                        </a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="simplebar-placeholder" style="width: auto; height: 899px;"></div>
                            </div>
                            <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                                <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                            </div>
                            <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                                <div class="simplebar-scrollbar" style="height: 29px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
                            </div>
                        </div>
                    </div>


                    <!-- .nk-ibx-aside -->
                    <div class="nk-ibx-body bg-white">
                        <div class="nk-ibx-head">



                            <!-- .search-wrap -->
                        </div>
                        <!-- .nk-ibx-head -->
                        <div class="nk-ibx-list" data-simplebar="init">

                            <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                                <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                            </div>
                            <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                                <div class="simplebar-scrollbar" style="height: 25px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
                            </div>
                        </div>
                        <!-- .nk-ibx-list -->
                        <div class="nk-ibx-view show-ibx">
                            <div class="nk-ibx-head">
                                <div class="nk-ibx-head-actions">
                                    <ul class="nk-ibx-head-tools g-1">
                                        <li class="ms-n2">
                                            <a href="{{ route('admin.message.sent') }}" wire:navigate class="btn btn-icon btn-trigger nk-ibx-hide"><em class="icon ni ni-arrow-left"></em></a>
                                        </li>

                                    </ul>
                                </div>


                                <!-- .search-wrap -->
                            </div>
                            <!-- .nk-ibx-head -->
                            <div class="nk-ibx-reply nk-reply" data-simplebar="init">
                                <div class="simplebar-wrapper" style="margin: 0px;">
                                    <div class="simplebar-height-auto-observer-wrapper">
                                        <div class="simplebar-height-auto-observer"></div>
                                    </div>
                                    <div class="simplebar-mask">
                                        <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                            <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: 100%; overflow: hidden scroll;">
                                                <div class="simplebar-content" style="padding: 0px;">
                                                    <div class="nk-ibx-reply-head">
                                                        <div>
                                                            <h4 class="title">{{ $message->subject }}</h4>

                                                        </div>

                                                    </div>
                                                    <div class="nk-ibx-reply-group">
                                                        <div class="nk-ibx-reply-item nk-reply-item">
                                                            <div class="nk-reply-header nk-ibx-reply-header is-collapsed">
                                                                <div class="nk-reply-desc">

                                                                    <div class="nk-reply-info">

                                                                        <div class="nk-reply-msg-excerpt">
                                                                            {{ $message->message }}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <ul class="nk-reply-tools g-1">
                                                                    <li class="date-msg"><span class="date">{{ date('d M, Y') }}</span></li>

                                                                </ul>
                                                            </div>

                                                        </div>

                                                    </div>

                                                    <!-- .nk-reply-form -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="simplebar-placeholder" style="width: auto; height: 1029px;"></div>
                                </div>
                                <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                                    <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                                </div>
                                <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                                    <div class="simplebar-scrollbar" style="height: 25px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
                                </div>
                            </div>
                            <!-- .nk-reply -->
                        </div>
                    </div>
                    <!-- .nk-ibx-body -->
                </div>
                <!-- .nk-ibx -->
            </div>
        </div>
    </div>
</div>

<div class="modal fade" role="dialog" id="compose-mail">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Compose Message</h6>
                <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
            </div>
            <div class="modal-body p-0">
                <form method="POST" action="{{ route('admin.message.store') }}">
                    @csrf
                    <div>
                        <div class="nk-reply-form-header">
                            <div class="nk-reply-form-group">
                                <div class="nk-reply-form-input-group">
                                     <div class="nk-reply-form-input nk-reply-form-input-to">
                                            <label class="label" for="email_address">To</label>
                                            <select name="email_address" id="" class="form-control">
                                                @foreach($drivers as $item)
                                                    <option value="{{ $item->email }}">{{ $item->email ?? '' }} ({{ $item->name ?? '' }})</option>
                                                @endforeach
                                            </select>

                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="nk-reply-form-editor">
                            <div class="nk-reply-form-field">
                                <input type="text" id="subject" name="subject" class="form-control form-control-simple" placeholder="Subject" />
                            </div>
                            <div class="nk-reply-form-field">
                                <textarea id="message" name="message" class="form-control form-control-simple no-resize ex-large" placeholder="Hello"></textarea>
                            </div>
                        </div>
                        <!-- .nk-reply-form-editor -->
                        <div class="nk-reply-form-tools">
                            <ul class="nk-reply-form-actions g-1">
                                <li class="mr-2">
                                    <button class="btn btn-primary" type="submit">Send</button>
                                </li>
                            </ul>
                            <ul class="nk-reply-form-actions g-1">
                                <li>
                                    <a href="#" class="btn-trigger btn btn-icon me-n2"><em class="icon ni ni-trash"></em></a>
                                </li>
                            </ul>
                        </div>
                        <!-- .nk-reply-form-tools -->
                    </div>
                </form>
            </div>

            <!-- .modal-body -->
        </div>
        <!-- .modal-content -->
    </div>
    <!-- .modla-dialog -->
</div>
<!-- .modal -->

@endsection
@section('js')

@endsection
