@extends('admin.layout.app')
@section('content')

    @include('admin.driver.tinymix')

<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-block-head-content mb-3">
            <a href="{{ route('admin.notes', $driver->id) }}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex">
                <em class="icon ni ni-arrow-left"></em>
                <span>Back</span>
            </a>

        </div>
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
                                                            @if($noteCount)
                                                                <span class="badge rounded-pill bg-primary">{{ $noteCount }}</span>
                                                            @endif

                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a class="nk-ibx-menu-item" href="{{ route('admin.noteChat', $driver->id) }}" wire:navigate>
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
                                                    <input type="hidden" name="driver_id" value="{{ $driver->id }}">
                                                @foreach($notes as $item)

                                                    @if($item->read == 0)
                                                        <div class="nk-ibx-item is-unread">
                                                <div class="nk-ibx-item-elem nk-ibx-item-user">
                                                    <a href="{{ route('admin.viewNote', ['driverId' => $driver, 'noteId' => $item->id]) }}" wire:navigate>
                                                        <div class="user-card">
                                                        <div class="user-avatar bg-white">
                                                            <img src="{{ asset($item?->user?->avatar) }}" alt="" />
                                                        </div>
                                                        <div class="user-name">
                                                            <div class="lead-text">{{ $item?->user?->fullname() }}</div>
                                                        </div>
                                                    </div>
                                                    </a>
                                                </div>
                                                <div class="nk-ibx-item-elem nk-ibx-item-fluid">
                                                    <div class="nk-ibx-context-group">
                                                        <div class="nk-ibx-context">

                                                            <a href="{{ route('admin.viewNote', ['driverId' => $driver, 'noteId' => $item->id]) }}" wire:navigate>
                                                                <span class="nk-ibx-context-text"> <span class="heading">{{ $item?->title }} </span> {{ Str::limit(strip_tags($item->message), 50, '...') }} </span>

                                                            </a>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="nk-ibx-item-elem nk-ibx-item-attach"></div>
                                                <div class="nk-ibx-item-elem nk-ibx-item-time">
                                                    <div class="sub-text">{{ date('h:i A', strtotime($item->created_at)) }}</div>
                                                </div>
                                                <div class="nk-ibx-item-elem nk-ibx-item-tools">
                                                    <div class="ibx-actions">
                                                        <ul class="ibx-actions-visible gx-2">
                                                            <li>
                                                                <div class="dropdown">
                                                                    <a href="#" class="dropdown-toggle btn btn-sm btn-icon btn-trigger" data-bs-toggle="dropdown" aria-expanded="false"><em class="icon ni ni-more-h"></em></a>
                                                                    <div class="dropdown-menu dropdown-menu-end" style="">
                                                                        <ul class="link-list-opt no-bdr">
                                                                             <li>
                                                                                <a class="dropdown-item" href="{{ route('admin.viewNote', ['driverId' => $driver->id, 'noteId' => $item->id]) }}"><em class="icon ni ni-eye"></em><span>View</span></a>
                                                                            </li>
                                                                            <li>
                                                                                <form method="POST" action="{!! route('admin.deleteNoteChat', $item->id) !!}" accept-charset="UTF-8">
                                                                                   <input name="_method" value="DELETE" type="hidden">
                                                                                   {{ csrf_field() }}

                                                                                   <div class="dropdown-item" >
                                                                                       <button type="submit" class="btn btn-sm"  data-bs-original-title="Delete" onclick="return confirm(&quot;Delete Note?&quot;)">
                                                                                           <em class="icon ni ni-trash"> <span>Delete</span></em>
                                                                                       </button>

                                                                                   </div>

                                                                               </form>
                                                                            </li>
                                                                            <li>
                                                                                <a class="dropdown-item" href="#"><em class="icon ni ni-archived"></em><span>Archive</span></a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                                    @else
                                                        <div class="nk-ibx-item ">
                                                        <div class="nk-ibx-item-elem nk-ibx-item-user">
                                                            <a href="{{ route('admin.viewNote', ['driverId' => $driver, 'noteId' => $item->id]) }}" wire:navigate>
                                                                <div class="user-card">
                                                                    <div class="user-avatar bg-white">
                                                                        <img src="{{ asset($item?->user?->avatar) }}" alt="" />
                                                                    </div>
                                                                    <div class="user-name">
                                                                        <div class="lead-text">{{ $item?->user?->fullname() }}</div>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <div class="nk-ibx-item-elem nk-ibx-item-fluid">
                                                            <div class="nk-ibx-context-group">
                                                                <div class="nk-ibx-context">
                                                                    <a href="{{ route('admin.viewNote', ['driverId' => $driver, 'noteId' => $item->id]) }}" wire:navigate>
                                                                        <span class="nk-ibx-context-text"> <span class="heading">{{ $item?->title }} </span> {{ Str::limit(strip_tags($item->message), 50, '...') }} </span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="nk-ibx-item-elem nk-ibx-item-attach"></div>
                                                        <div class="nk-ibx-item-elem nk-ibx-item-time">
                                                            <div class="sub-text">{{ date('h:i A', strtotime($item->created_at)) }}</div>
                                                        </div>
                                                        <div class="nk-ibx-item-elem nk-ibx-item-tools">
                                                            <div class="ibx-actions">
                                                                <ul class="ibx-actions-visible gx-2">
                                                                    <li>
                                                                        <div class="dropdown">
                                                                            <a href="#" class="dropdown-toggle btn btn-sm btn-icon btn-trigger" data-bs-toggle="dropdown" aria-expanded="false"><em class="icon ni ni-more-h"></em></a>
                                                                            <div class="dropdown-menu dropdown-menu-end" style="">
                                                                                <ul class="link-list-opt no-bdr">
                                                                                    <li>
                                                                                        <a class="dropdown-item" href="{{ route('admin.viewNote', ['driverId' => $driver->id, 'noteId' => $item->id]) }}"><em class="icon ni ni-eye"></em><span>View</span></a>
                                                                                    </li>
                                                                                    <li>
                                                                                         <form method="POST" action="{!! route('admin.deleteNoteChat', $item->id) !!}" accept-charset="UTF-8">
                                                                                           <input name="_method" value="DELETE" type="hidden">
                                                                                           {{ csrf_field() }}

                                                                                           <div class="dropdown-item" >
                                                                                               <button type="submit" class="btn btn-sm"  data-bs-original-title="Delete" onclick="return confirm(&quot;Delete Note?&quot;)">
                                                                                                   <em class="icon ni ni-trash"> <span>Delete</span></em>
                                                                                               </button>
                                                                                           </div>
                                                                                       </form>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a class="dropdown-item" href="#"><em class="icon ni ni-archived"></em><span>Archive</span></a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endif

                                                @endforeach
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
                            <textarea class="content form-control no-resize ex-large " name="message" placeholder="Type Message..."></textarea>
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
