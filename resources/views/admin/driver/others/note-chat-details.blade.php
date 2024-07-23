@extends('admin.layout.app')
@section('content')
    @include('admin.driver.tinymix')

<div class="nk-content">
    <div class="container-fluid">
         <div class="container mb-3 mt-4">
             <h4>Driver Name: {{ $driver->fullname() }}</h4>
         </div>
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="container m-2">
                    @if(session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                    @endif @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                    @endif
                </div>
                <div class="nk-ibx">
                    <div class="nk-ibx-aside toggle-screen-lg" data-content="inbox-aside" data-toggle-overlay="true" data-toggle-screen="lg">
                        <div class="nk-ibx-head">
                            <h5 class="mb-0">Note Chat</h5>
                            <a class="link link-primary" data-bs-toggle="modal" href="#compose-mail"><em class="icon ni ni-plus"></em> <span>Compose</span></a>
                        </div>
                        <div class="nk-ibx-nav" data-simplebar="init">
                            <div class="simplebar-wrapper" style="margin: 0px;">
                                <div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div>
                                <div class="simplebar-mask">
                                    <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                        <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: 100%; overflow: hidden scroll;">
                                            <div class="simplebar-content" style="padding: 0px;">
                                                <ul class="nk-ibx-menu">
                                                    <li class="active">
                                                        <a class="nk-ibx-menu-item" href="{{ route('admin.noteChat', $driver->id) }}" wire:navigate>
                                                            <em class="icon ni ni-inbox"></em>
                                                            <span class="nk-ibx-menu-text">Inbox</span>
                                                            <span class="badge rounded-pill bg-primary">{{ $noteCount }}</span>
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a class="nk-ibx-menu-item" href="#">
                                                            <em class="icon ni ni-send"></em>
                                                            <span class="nk-ibx-menu-text">Sent</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="nk-ibx-menu-item" href="#">
                                                            <em class="icon ni ni-edit"></em>
                                                            <span class="nk-ibx-menu-text">Draft</span>
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a class="nk-ibx-menu-item" href="#">
                                                            <em class="icon ni ni-trash"></em>
                                                            <span class="nk-ibx-menu-text">Trash</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="simplebar-placeholder" style="width: auto; height: 899px;"></div>
                            </div>
                            <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="width: 0px; display: none;"></div></div>
                            <div class="simplebar-track simplebar-vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="height: 160px; transform: translate3d(0px, 0px, 0px); display: block;"></div></div>
                        </div>
                    </div>
                    <!-- .nk-ibx-aside -->
                    <div class="nk-ibx-body bg-white">
                        <div class="nk-ibx-head">
                            <div>
                                <ul class="nk-ibx-head-tools g-1">
                                    <li>
                                        <a href="{{ route('admin.noteChat', $driver->id) }}" wire:navigate class="btn btn-trigger btn-icon btn-tooltip" aria-label="Prev Page" data-bs-original-title="Prev Page">
                                            <em class="icon ni ni-arrow-left"></em>
                                        </a>
                                    </li>

                                    <li class="me-n1 d-lg-none">
                                        <a href="#" class="btn btn-trigger btn-icon toggle" data-target="inbox-aside"><em class="icon ni ni-menu-alt-r"></em></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- .nk-ibx-head -->
                        <div class="nk-ibx-list" data-simplebar="init">
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
                                                        <h4 class="title">{{ $note->title }}</h4>
                                                        <ul class="nk-ibx-tags g-1">
                                                            <li class="btn-group is-tags">
                                                                <a >{!! $note->minStatus() !!}</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <ul class="d-flex g-1">
                                                        <li class="d-none d-sm-block">
                                                             <form method="POST" action="{!! route('admin.deleteNoteChat', $note->id) !!}" accept-charset="UTF-8">
                                                                   <input name="_method" value="DELETE" type="hidden">
                                                                   {{ csrf_field() }}

                                                                   <div class="dropdown-item" >
                                                                       <button type="submit" class="btn btn-sm btn-icon "  data-bs-original-title="Delete" onclick="return confirm(&quot;Delete Note?&quot;)">
                                                                           <em class="icon ni ni-trash"></em>
                                                                       </button>

                                                                   </div>

                                                               </form>
                                                        </li>
                                                    </ul>
                                                </div>

                                               <div class="container">
                                                   <div class="col-lg-10 m-4">
                                                        {!! $note->message !!}
                                                   </div>
                                               </div>


                                                <div class="nk-ibx-reply-form nk-reply-form mt-5">

                                                    <div class="nk-reply-form-editor">
                                                        <div class="nk-reply-form-field">
                                                            <textarea class="content form-control form-control-simple no-resize" cols="10" rows="5" placeholder="Message"></textarea>
                                                        </div>
                                                    </div><!-- .nk-reply-form-editor -->
                                                    <div class="nk-reply-form-tools">
                                                        <ul class="nk-reply-form-actions g-1">
                                                            <li class="me-2"><button class="btn btn-primary" type="submit">Send</button></li>
                                                        </ul>
                                                        <ul class="nk-reply-form-actions g-1">
                                                            <li>
                                                                <form action="">
                                                                    <select name="" class="form-control" id="">
                                                                        <option value="Open">Open</option>
                                                                        <option value="Urgent">Urgent</option>
                                                                        <option value="Close">Close</option>
                                                                    </select>
                                                                </form>
                                                            </li>
                                                        </ul>
                                                    </div><!-- .nk-reply-form-tools -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="simplebar-placeholder" style="width: 1268px; height: 1167px;"></div>
                            </div>
                        </div>
                        <!-- .nk-ibx-list -->

                    </div>
                    <!-- .nk-ibx-body -->
                </div>
                <!-- .nk-ibx -->
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="compose-mail" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">New Message</h6>
                <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
            </div>
            <div class="modal-body p-0">
                <form action="{{ route('admin.saveNoteChat') }}" method="POST">
                    @csrf
                    <input type="hidden" name="driver_id" value="{{ $driver->id }}" />
                    <div class="nk-reply-form-editor">
                        <div class="nk-reply-form-field">
                            <input type="text" class="form-control form-control-simple" name="title" placeholder="Subject" />
                        </div>
                        <div class="nk-reply-form-field">
                            <textarea class="content form-control form-control-simple no-resize ex-large" name="message" placeholder="Hello"></textarea>
                        </div>
                    </div>
                    <!-- .nk-reply-form-editor -->
                    <div class="nk-reply-form-tools">
                        <ul class="nk-reply-form-actions g-1">
                            <li class="mr-2"><button class="btn btn-primary" type="submit">Send</button></li>
                        </ul>
                    </div>
                    <!-- .nk-reply-form-tools -->
                </form>
            </div>
            <!-- .modal-body -->
        </div>
        <!-- .modal-content -->
    </div>
    <!-- .modla-dialog -->
</div>

@endsection
@section('js')

@endsection
