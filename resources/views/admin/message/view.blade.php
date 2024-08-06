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
                                                    <li class="active">
                                                        <a class="nk-ibx-menu-item" href="{{ route('admin.message.index') }}" wire:navigate>
                                                            <em class="icon ni ni-inbox"></em>
                                                            <span class="nk-ibx-menu-text">Inbox</span>
                                                            <span class="badge rounded-pill bg-primary">{{ $messageCount }}</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="nk-ibx-menu-item" href="{{ route('admin.message.sent') }}" wire:navigate>
                                                            <em class="icon ni ni-send"></em>
                                                            <span class="nk-ibx-menu-text">Sent</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="nk-ibx-menu-item" href="#">
                                                            <em class="icon ni ni-edit"></em>
                                                            <span class="nk-ibx-menu-text">Draft</span>
                                                            <span class="badge rounded-pill bg-light">12</span>
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a class="nk-ibx-menu-item" href="#">
                                                            <em class="icon ni ni-trash"></em>
                                                            <span class="nk-ibx-menu-text">Trash</span>
                                                            <span class="badge rounded-pill bg-danger badge-dim">8</span>
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
                            <div class="nk-ibx-head-actions">
                                <ul class="nk-ibx-head-tools g-1">
                                    <li class="d-none d-sm-block">
                                        <a href="#" class="btn btn-icon btn-trigger"> <em class="icon ni ni-trash"></em></a>
                                    </li>
                                </ul>
                            </div>

                            <div class="search-wrap" data-search="search">
                                <div class="search-content">
                                    <a href="#" class="search-back btn btn-icon toggle-search" data-target="search"><em class="icon ni ni-arrow-left"></em></a>
                                    <input type="text" class="form-control border-transparent form-focus-none" placeholder="Search by user or message" />
                                    <button class="search-submit btn btn-icon"><em class="icon ni ni-search"></em></button>
                                </div>
                            </div>
                            <!-- .search-wrap -->
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
                                                <div class="nk-ibx-item">
                                                    <a href="#" class="nk-ibx-link current"></a>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-check">
                                                        <div class="custom-control custom-control-sm custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input nk-dt-item-check" id="conversionItem01" />
                                                            <label class="custom-control-label" for="conversionItem01"></label>
                                                        </div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-star">
                                                        <div class="asterisk">
                                                            <a href="#"><em class="asterisk-off icon ni ni-star"></em><em class="asterisk-on icon ni ni-star-fill"></em></a>
                                                        </div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-user">
                                                        <div class="user-card">
                                                            <div class="user-avatar">
                                                                <img src="./images/avatar/a-sm.jpg" alt="" />
                                                            </div>
                                                            <div class="user-name">
                                                                <div class="lead-text">Abu Bin Ishtiyak</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-fluid">
                                                        <div class="nk-ibx-context-group">
                                                            <div class="nk-ibx-context">
                                                                <span class="nk-ibx-context-text"> <span class="heading">Can we help you set up email forwording?</span> We’ve noticed you haven’t set up email forward </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-attach"></div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-time">
                                                        <div class="sub-text">10:00 AM</div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-tools">
                                                        <div class="ibx-actions">
                                                            <ul class="ibx-actions-hidden gx-1">
                                                                <li>
                                                                    <a href="#" class="btn btn-sm btn-icon btn-trigger" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Archive" data-bs-original-title="Archive">
                                                                        <em class="icon ni ni-archived"></em>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" class="btn btn-sm btn-icon btn-trigger" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete" data-bs-original-title="Delete">
                                                                        <em class="icon ni ni-trash"></em>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                            <ul class="ibx-actions-visible gx-2">
                                                                <li>
                                                                    <div class="dropdown">
                                                                        <a href="#" class="dropdown-toggle btn btn-sm btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                        <div class="dropdown-menu dropdown-menu-end">
                                                                            <ul class="link-list-opt no-bdr">
                                                                                <li>
                                                                                    <a class="dropdown-item" href="#"><em class="icon ni ni-eye"></em><span>View</span></a>
                                                                                </li>
                                                                                <li>
                                                                                    <a class="dropdown-item" href="#"><em class="icon ni ni-trash"></em><span>Delete</span></a>
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
                                                <!-- .nk-ibx-item -->
                                                <div class="nk-ibx-item is-unread">
                                                    <a href="#" class="nk-ibx-link"></a>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-check">
                                                        <div class="custom-control custom-control-sm custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input nk-dt-item-check" id="conversionItem02" />
                                                            <label class="custom-control-label" for="conversionItem02"></label>
                                                        </div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-star">
                                                        <div class="asterisk">
                                                            <a class="active" href="#"><em class="asterisk-off icon ni ni-star"></em><em class="asterisk-on icon ni ni-star-fill"></em></a>
                                                        </div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-user">
                                                        <div class="user-card">
                                                            <div class="user-avatar">
                                                                <img src="./images/avatar/b-sm.jpg" alt="" />
                                                            </div>
                                                            <div class="user-name">
                                                                <div class="lead-text">Ricardo Salazar</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-fluid">
                                                        <div class="nk-ibx-context-group">
                                                            <div class="nk-ibx-context-badges"><span class="badge bg-primary">Feedback</span></div>
                                                            <div class="nk-ibx-context">
                                                                <span class="nk-ibx-context-text"> <span class="heading">Can we help you set up email forwording?</span> We’ve noticed you haven’t set up email forward </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-attach">
                                                        <a class="link link-light">
                                                            <em class="icon ni ni-clip-h"></em>
                                                        </a>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-time">
                                                        <div class="sub-text">10:00 AM</div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-tools">
                                                        <div class="ibx-actions">
                                                            <ul class="ibx-actions-hidden gx-1">
                                                                <li>
                                                                    <a href="#" class="btn btn-sm btn-icon btn-trigger" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Archive" data-bs-original-title="Archive">
                                                                        <em class="icon ni ni-archived"></em>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" class="btn btn-sm btn-icon btn-trigger" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete" data-bs-original-title="Delete">
                                                                        <em class="icon ni ni-trash"></em>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                            <ul class="ibx-actions-visible gx-2">
                                                                <li>
                                                                    <div class="dropdown">
                                                                        <a href="#" class="dropdown-toggle btn btn-sm btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                        <div class="dropdown-menu dropdown-menu-end">
                                                                            <ul class="link-list-opt no-bdr">
                                                                                <li>
                                                                                    <a class="dropdown-item" href="#"><em class="icon ni ni-eye"></em><span>View</span></a>
                                                                                </li>
                                                                                <li>
                                                                                    <a class="dropdown-item" href="#"><em class="icon ni ni-trash"></em><span>Delete</span></a>
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
                                                <!-- .nk-ibx-item -->
                                                <div class="nk-ibx-item is-unread">
                                                    <a href="#" class="nk-ibx-link"></a>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-check">
                                                        <div class="custom-control custom-control-sm custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input nk-dt-item-check" id="conversionItem03" />
                                                            <label class="custom-control-label" for="conversionItem03"></label>
                                                        </div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-star">
                                                        <div class="asterisk">
                                                            <a href="#"><em class="asterisk-off icon ni ni-star"></em><em class="asterisk-on icon ni ni-star-fill"></em></a>
                                                        </div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-user">
                                                        <div class="user-card">
                                                            <div class="user-avatar">
                                                                <span>LH</span>
                                                            </div>
                                                            <div class="user-name">
                                                                <div class="lead-text">Larry Hughes</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-fluid">
                                                        <div class="nk-ibx-context-group">
                                                            <div class="nk-ibx-context">
                                                                <span class="nk-ibx-context-text"> <span class="heading">Individual Modal and Alert Design.</span> Please use the attached file for modal. </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-attach"></div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-time">
                                                        <div class="sub-text">10:30 AM</div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-tools">
                                                        <div class="ibx-actions">
                                                            <ul class="ibx-actions-hidden gx-1">
                                                                <li>
                                                                    <a href="#" class="btn btn-sm btn-icon btn-trigger" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Archive" data-bs-original-title="Archive">
                                                                        <em class="icon ni ni-archived"></em>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" class="btn btn-sm btn-icon btn-trigger" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete" data-bs-original-title="Delete">
                                                                        <em class="icon ni ni-trash"></em>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                            <ul class="ibx-actions-visible gx-2">
                                                                <li>
                                                                    <div class="dropdown">
                                                                        <a href="#" class="dropdown-toggle btn btn-sm btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                        <div class="dropdown-menu dropdown-menu-end">
                                                                            <ul class="link-list-opt no-bdr">
                                                                                <li>
                                                                                    <a class="dropdown-item" href="#"><em class="icon ni ni-eye"></em><span>View</span></a>
                                                                                </li>
                                                                                <li>
                                                                                    <a class="dropdown-item" href="#"><em class="icon ni ni-trash"></em><span>Delete</span></a>
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
                                                <!-- .nk-ibx-item -->
                                                <div class="nk-ibx-item">
                                                    <a href="#" class="nk-ibx-link"></a>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-check">
                                                        <div class="custom-control custom-control-sm custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input nk-dt-item-check" id="conversionItem04" />
                                                            <label class="custom-control-label" for="conversionItem04"></label>
                                                        </div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-star">
                                                        <div class="asterisk">
                                                            <a class="active" href="#"><em class="asterisk-off icon ni ni-star"></em><em class="asterisk-on icon ni ni-star-fill"></em></a>
                                                        </div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-user">
                                                        <div class="user-card">
                                                            <div class="user-avatar">
                                                                <img src="./images/avatar/c-sm.jpg" alt="" />
                                                            </div>
                                                            <div class="user-name">
                                                                <div class="lead-text">Laura Matthews</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-fluid">
                                                        <div class="nk-ibx-context-group">
                                                            <div class="nk-ibx-context-badges"><span class="badge bg-success">Social</span></div>
                                                            <div class="nk-ibx-context">
                                                                <span class="nk-ibx-context-text"> <span class="heading">Laravel Developer - Interview List</span> https://docs.google.com/document/d/12oOKEs4qjMlUiHXNVjHJBK </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-attach"></div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-time">
                                                        <div class="sub-text">10:30 AM</div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-tools">
                                                        <div class="ibx-actions">
                                                            <ul class="ibx-actions-hidden gx-1">
                                                                <li>
                                                                    <a href="#" class="btn btn-sm btn-icon btn-trigger" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Archive" data-bs-original-title="Archive">
                                                                        <em class="icon ni ni-archived"></em>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" class="btn btn-sm btn-icon btn-trigger" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete" data-bs-original-title="Delete">
                                                                        <em class="icon ni ni-trash"></em>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                            <ul class="ibx-actions-visible gx-2">
                                                                <li>
                                                                    <div class="dropdown">
                                                                        <a href="#" class="dropdown-toggle btn btn-sm btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                        <div class="dropdown-menu dropdown-menu-end">
                                                                            <ul class="link-list-opt no-bdr">
                                                                                <li>
                                                                                    <a class="dropdown-item" href="#"><em class="icon ni ni-eye"></em><span>View</span></a>
                                                                                </li>
                                                                                <li>
                                                                                    <a class="dropdown-item" href="#"><em class="icon ni ni-trash"></em><span>Delete</span></a>
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
                                                <!-- .nk-ibx-item -->
                                                <div class="nk-ibx-item">
                                                    <a href="#" class="nk-ibx-link"></a>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-check">
                                                        <div class="custom-control custom-control-sm custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input nk-dt-item-check" id="conversionItem05" />
                                                            <label class="custom-control-label" for="conversionItem05"></label>
                                                        </div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-star">
                                                        <div class="asterisk">
                                                            <a class="active" href="#"><em class="asterisk-off icon ni ni-star"></em><em class="asterisk-on icon ni ni-star-fill"></em></a>
                                                        </div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-user">
                                                        <div class="user-card">
                                                            <div class="user-avatar">
                                                                <img src="./images/avatar/d-sm.jpg" alt="" />
                                                            </div>
                                                            <div class="user-name">
                                                                <div class="lead-text">Tammy Wilson</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-fluid">
                                                        <div class="nk-ibx-context-group">
                                                            <div class="nk-ibx-context">
                                                                <span class="nk-ibx-context-text"> <span class="heading">TokenWiz - New Page</span> here are the 2 screens I would to implement with TokenWiz </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-attach"></div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-time">
                                                        <div class="sub-text">10:30 AM</div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-tools">
                                                        <div class="ibx-actions">
                                                            <ul class="ibx-actions-hidden gx-1">
                                                                <li>
                                                                    <a href="#" class="btn btn-sm btn-icon btn-trigger" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Archive" data-bs-original-title="Archive">
                                                                        <em class="icon ni ni-archived"></em>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" class="btn btn-sm btn-icon btn-trigger" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete" data-bs-original-title="Delete">
                                                                        <em class="icon ni ni-trash"></em>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                            <ul class="ibx-actions-visible gx-2">
                                                                <li>
                                                                    <div class="dropdown">
                                                                        <a href="#" class="dropdown-toggle btn btn-sm btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                        <div class="dropdown-menu dropdown-menu-end">
                                                                            <ul class="link-list-opt no-bdr">
                                                                                <li>
                                                                                    <a class="dropdown-item" href="#"><em class="icon ni ni-eye"></em><span>View</span></a>
                                                                                </li>
                                                                                <li>
                                                                                    <a class="dropdown-item" href="#"><em class="icon ni ni-trash"></em><span>Delete</span></a>
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
                                                <!-- .nk-ibx-item -->
                                                <div class="nk-ibx-item is-unread">
                                                    <a href="#" class="nk-ibx-link"></a>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-check">
                                                        <div class="custom-control custom-control-sm custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input nk-dt-item-check" id="conversionItem06" />
                                                            <label class="custom-control-label" for="conversionItem06"></label>
                                                        </div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-star">
                                                        <div class="asterisk">
                                                            <a class="active" href="#"><em class="asterisk-off icon ni ni-star"></em><em class="asterisk-on icon ni ni-star-fill"></em></a>
                                                        </div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-user">
                                                        <div class="user-card">
                                                            <div class="user-avatar bg-azure">
                                                                <span>SP</span>
                                                            </div>
                                                            <div class="user-name">
                                                                <div class="lead-text">Sara Phillips</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-fluid">
                                                        <div class="nk-ibx-context-group">
                                                            <div class="nk-ibx-context">
                                                                <span class="nk-ibx-context-text"> <span class="heading">TokenLite Promo Assets</span> Please check out attached. </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-attach">
                                                        <a class="link link-light">
                                                            <em class="icon ni ni-clip-h"></em>
                                                        </a>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-time">
                                                        <div class="sub-text">10:30 AM</div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-tools">
                                                        <div class="ibx-actions">
                                                            <ul class="ibx-actions-hidden gx-1">
                                                                <li>
                                                                    <a href="#" class="btn btn-sm btn-icon btn-trigger" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Archive" data-bs-original-title="Archive">
                                                                        <em class="icon ni ni-archived"></em>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" class="btn btn-sm btn-icon btn-trigger" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete" data-bs-original-title="Delete">
                                                                        <em class="icon ni ni-trash"></em>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                            <ul class="ibx-actions-visible gx-2">
                                                                <li>
                                                                    <div class="dropdown">
                                                                        <a href="#" class="dropdown-toggle btn btn-sm btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                        <div class="dropdown-menu dropdown-menu-end">
                                                                            <ul class="link-list-opt no-bdr">
                                                                                <li>
                                                                                    <a class="dropdown-item" href="#"><em class="icon ni ni-eye"></em><span>View</span></a>
                                                                                </li>
                                                                                <li>
                                                                                    <a class="dropdown-item" href="#"><em class="icon ni ni-trash"></em><span>Delete</span></a>
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
                                                <!-- .nk-ibx-item -->
                                                <div class="nk-ibx-item">
                                                    <a href="#" class="nk-ibx-link"></a>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-check">
                                                        <div class="custom-control custom-control-sm custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input nk-dt-item-check" id="conversionItem07" />
                                                            <label class="custom-control-label" for="conversionItem07"></label>
                                                        </div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-star">
                                                        <div class="asterisk">
                                                            <a href="#"><em class="asterisk-off icon ni ni-star"></em><em class="asterisk-on icon ni ni-star-fill"></em></a>
                                                        </div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-user">
                                                        <div class="user-card">
                                                            <div class="user-avatar bg-indigo">
                                                                <span>MA</span>
                                                            </div>
                                                            <div class="user-name">
                                                                <div class="lead-text">Mildred Arnold</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-fluid">
                                                        <div class="nk-ibx-context-group">
                                                            <div class="nk-ibx-context">
                                                                <span class="nk-ibx-context-text"> <span class="heading">Token Page Content.</span> Please check included links for content. </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-attach"></div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-time">
                                                        <div class="sub-text">10:30 AM</div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-tools">
                                                        <div class="ibx-actions">
                                                            <ul class="ibx-actions-hidden gx-1">
                                                                <li>
                                                                    <a href="#" class="btn btn-sm btn-icon btn-trigger" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Archive" data-bs-original-title="Archive">
                                                                        <em class="icon ni ni-archived"></em>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" class="btn btn-sm btn-icon btn-trigger" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete" data-bs-original-title="Delete">
                                                                        <em class="icon ni ni-trash"></em>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                            <ul class="ibx-actions-visible gx-2">
                                                                <li>
                                                                    <div class="dropdown">
                                                                        <a href="#" class="dropdown-toggle btn btn-sm btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                        <div class="dropdown-menu dropdown-menu-end">
                                                                            <ul class="link-list-opt no-bdr">
                                                                                <li>
                                                                                    <a class="dropdown-item" href="#"><em class="icon ni ni-eye"></em><span>View</span></a>
                                                                                </li>
                                                                                <li>
                                                                                    <a class="dropdown-item" href="#"><em class="icon ni ni-trash"></em><span>Delete</span></a>
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
                                                <!-- .nk-ibx-item -->
                                                <div class="nk-ibx-item">
                                                    <a href="#" class="nk-ibx-link"></a>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-check">
                                                        <div class="custom-control custom-control-sm custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input nk-dt-item-check" id="conversionItem08" />
                                                            <label class="custom-control-label" for="conversionItem08"></label>
                                                        </div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-star">
                                                        <div class="asterisk">
                                                            <a href="#"><em class="asterisk-off icon ni ni-star"></em><em class="asterisk-on icon ni ni-star-fill"></em></a>
                                                        </div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-user">
                                                        <div class="user-card">
                                                            <div class="user-avatar bg-success">
                                                                <img src="./images/avatar/a-sm.jpg" alt="" />
                                                            </div>
                                                            <div class="user-name">
                                                                <div class="lead-text">Abu Bin Ishtiyak</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-fluid">
                                                        <div class="nk-ibx-context-group">
                                                            <div class="nk-ibx-context-badges"><span class="badge bg-danger">Personal</span></div>
                                                            <div class="nk-ibx-context">
                                                                <span class="nk-ibx-context-text">
                                                                    <span class="heading">Feedback about licenses and support policy</span> Two important aspects of the marketplace are its licenses, which govern the use of your items by
                                                                    customers
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-attach"></div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-time">
                                                        <div class="sub-text">10:30 AM</div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-tools">
                                                        <div class="ibx-actions">
                                                            <ul class="ibx-actions-hidden gx-1">
                                                                <li>
                                                                    <a href="#" class="btn btn-sm btn-icon btn-trigger" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Archive" data-bs-original-title="Archive">
                                                                        <em class="icon ni ni-archived"></em>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" class="btn btn-sm btn-icon btn-trigger" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete" data-bs-original-title="Delete">
                                                                        <em class="icon ni ni-trash"></em>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                            <ul class="ibx-actions-visible gx-2">
                                                                <li>
                                                                    <div class="dropdown">
                                                                        <a href="#" class="dropdown-toggle btn btn-sm btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                        <div class="dropdown-menu dropdown-menu-end">
                                                                            <ul class="link-list-opt no-bdr">
                                                                                <li>
                                                                                    <a class="dropdown-item" href="#"><em class="icon ni ni-eye"></em><span>View</span></a>
                                                                                </li>
                                                                                <li>
                                                                                    <a class="dropdown-item" href="#"><em class="icon ni ni-trash"></em><span>Delete</span></a>
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
                                                <!-- .nk-ibx-item -->
                                                <div class="nk-ibx-item">
                                                    <a href="#" class="nk-ibx-link"></a>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-check">
                                                        <div class="custom-control custom-control-sm custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input nk-dt-item-check" id="conversionItem09" />
                                                            <label class="custom-control-label" for="conversionItem09"></label>
                                                        </div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-star">
                                                        <div class="asterisk">
                                                            <a class="active" href="#"><em class="asterisk-off icon ni ni-star"></em><em class="asterisk-on icon ni ni-star-fill"></em></a>
                                                        </div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-user">
                                                        <div class="user-card">
                                                            <div class="user-avatar">
                                                                <img src="./images/avatar/d-sm.jpg" alt="" />
                                                            </div>
                                                            <div class="user-name">
                                                                <div class="lead-text">Tammy Wilson</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-fluid">
                                                        <div class="nk-ibx-context-group">
                                                            <div class="nk-ibx-context-badges"><span class="badge bg-info">Team</span></div>
                                                            <div class="nk-ibx-context">
                                                                <span class="nk-ibx-context-text">
                                                                    <span class="heading">Thanks for completing our survey</span> Since you've already completed our survey we wanted to give you the opportunity to win as well
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-attach"></div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-time">
                                                        <div class="sub-text">10:30 AM</div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-tools">
                                                        <div class="ibx-actions">
                                                            <ul class="ibx-actions-hidden gx-1">
                                                                <li>
                                                                    <a href="#" class="btn btn-sm btn-icon btn-trigger" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Archive" data-bs-original-title="Archive">
                                                                        <em class="icon ni ni-archived"></em>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" class="btn btn-sm btn-icon btn-trigger" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete" data-bs-original-title="Delete">
                                                                        <em class="icon ni ni-trash"></em>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                            <ul class="ibx-actions-visible gx-2">
                                                                <li>
                                                                    <div class="dropdown">
                                                                        <a href="#" class="dropdown-toggle btn btn-sm btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                        <div class="dropdown-menu dropdown-menu-end">
                                                                            <ul class="link-list-opt no-bdr">
                                                                                <li>
                                                                                    <a class="dropdown-item" href="#"><em class="icon ni ni-eye"></em><span>View</span></a>
                                                                                </li>
                                                                                <li>
                                                                                    <a class="dropdown-item" href="#"><em class="icon ni ni-trash"></em><span>Delete</span></a>
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
                                                <!-- .nk-ibx-item -->
                                                <div class="nk-ibx-item">
                                                    <a href="#" class="nk-ibx-link"></a>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-check">
                                                        <div class="custom-control custom-control-sm custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input nk-dt-item-check" id="conversionItem10" />
                                                            <label class="custom-control-label" for="conversionItem10"></label>
                                                        </div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-star">
                                                        <div class="asterisk">
                                                            <a href="#"><em class="asterisk-off icon ni ni-star"></em><em class="asterisk-on icon ni ni-star-fill"></em></a>
                                                        </div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-user">
                                                        <div class="user-card">
                                                            <div class="user-avatar">
                                                                <img src="./images/avatar/b-sm.jpg" alt="" />
                                                            </div>
                                                            <div class="user-name">
                                                                <div class="lead-text">Ricardo Salazar</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-fluid">
                                                        <div class="nk-ibx-context-group">
                                                            <div class="nk-ibx-context">
                                                                <span class="nk-ibx-context-text">
                                                                    <span class="heading">Registration Confirmation for Envato Worldwide</span> The event organizer has provided the following information
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-attach">
                                                        <a class="link link-light">
                                                            <em class="icon ni ni-clip-h"></em>
                                                        </a>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-time">
                                                        <div class="sub-text">10:30 AM</div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-tools">
                                                        <div class="ibx-actions">
                                                            <ul class="ibx-actions-hidden gx-1">
                                                                <li>
                                                                    <a href="#" class="btn btn-sm btn-icon btn-trigger" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Archive" data-bs-original-title="Archive">
                                                                        <em class="icon ni ni-archived"></em>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" class="btn btn-sm btn-icon btn-trigger" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete" data-bs-original-title="Delete">
                                                                        <em class="icon ni ni-trash"></em>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                            <ul class="ibx-actions-visible gx-2">
                                                                <li>
                                                                    <div class="dropdown">
                                                                        <a href="#" class="dropdown-toggle btn btn-sm btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                        <div class="dropdown-menu dropdown-menu-end">
                                                                            <ul class="link-list-opt no-bdr">
                                                                                <li>
                                                                                    <a class="dropdown-item" href="#"><em class="icon ni ni-eye"></em><span>View</span></a>
                                                                                </li>
                                                                                <li>
                                                                                    <a class="dropdown-item" href="#"><em class="icon ni ni-trash"></em><span>Delete</span></a>
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
                                                <!-- .nk-ibx-item -->
                                                <div class="nk-ibx-item">
                                                    <a href="#" class="nk-ibx-link"></a>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-check">
                                                        <div class="custom-control custom-control-sm custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input nk-dt-item-check" id="conversionItem11" />
                                                            <label class="custom-control-label" for="conversionItem11"></label>
                                                        </div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-star">
                                                        <div class="asterisk">
                                                            <a href="#"><em class="asterisk-off icon ni ni-star"></em><em class="asterisk-on icon ni ni-star-fill"></em></a>
                                                        </div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-user">
                                                        <div class="user-card">
                                                            <div class="user-avatar bg-pink">
                                                                <span>CL</span>
                                                            </div>
                                                            <div class="user-name">
                                                                <div class="lead-text">Catherine Larson</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-fluid">
                                                        <div class="nk-ibx-context-group">
                                                            <div class="nk-ibx-context">
                                                                <span class="nk-ibx-context-text">
                                                                    <span class="heading">Bring personality to your design work.</span> As designers, how we tell our stories is key. We must be unique, genuine, and use language with purpose
                                                                    to get meaningful results in our design work.
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-attach">
                                                        <a class="link link-light">
                                                            <em class="icon ni ni-clip-h"></em>
                                                        </a>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-time">
                                                        <div class="sub-text">10:30 AM</div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-tools">
                                                        <div class="ibx-actions">
                                                            <ul class="ibx-actions-hidden gx-1">
                                                                <li>
                                                                    <a href="#" class="btn btn-sm btn-icon btn-trigger" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Archive" data-bs-original-title="Archive">
                                                                        <em class="icon ni ni-archived"></em>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" class="btn btn-sm btn-icon btn-trigger" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete" data-bs-original-title="Delete">
                                                                        <em class="icon ni ni-trash"></em>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                            <ul class="ibx-actions-visible gx-2">
                                                                <li>
                                                                    <div class="dropdown">
                                                                        <a href="#" class="dropdown-toggle btn btn-sm btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                        <div class="dropdown-menu dropdown-menu-end">
                                                                            <ul class="link-list-opt no-bdr">
                                                                                <li>
                                                                                    <a class="dropdown-item" href="#"><em class="icon ni ni-eye"></em><span>View</span></a>
                                                                                </li>
                                                                                <li>
                                                                                    <a class="dropdown-item" href="#"><em class="icon ni ni-trash"></em><span>Delete</span></a>
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
                                                <!-- .nk-ibx-item -->
                                                <div class="nk-ibx-item">
                                                    <a href="#" class="nk-ibx-link"></a>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-check">
                                                        <div class="custom-control custom-control-sm custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input nk-dt-item-check" id="conversionItem12" />
                                                            <label class="custom-control-label" for="conversionItem12"></label>
                                                        </div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-star">
                                                        <div class="asterisk">
                                                            <a href="#"><em class="asterisk-off icon ni ni-star"></em><em class="asterisk-on icon ni ni-star-fill"></em></a>
                                                        </div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-user">
                                                        <div class="user-card">
                                                            <div class="user-avatar bg-azure">
                                                                <span>SP</span>
                                                            </div>
                                                            <div class="user-name">
                                                                <div class="lead-text">Sara Phillips</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-fluid">
                                                        <div class="nk-ibx-context-group">
                                                            <div class="nk-ibx-context">
                                                                <span class="nk-ibx-context-text">
                                                                    <span class="heading">Unique design portfolio examples.</span> Prepare to be blown away with our favourite unique design portfolio examples built
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-attach"></div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-time">
                                                        <div class="sub-text">10:30 AM</div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-tools">
                                                        <div class="ibx-actions">
                                                            <ul class="ibx-actions-hidden gx-1">
                                                                <li>
                                                                    <a href="#" class="btn btn-sm btn-icon btn-trigger" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Archive" data-bs-original-title="Archive">
                                                                        <em class="icon ni ni-archived"></em>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" class="btn btn-sm btn-icon btn-trigger" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete" data-bs-original-title="Delete">
                                                                        <em class="icon ni ni-trash"></em>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                            <ul class="ibx-actions-visible gx-2">
                                                                <li>
                                                                    <div class="dropdown">
                                                                        <a href="#" class="dropdown-toggle btn btn-sm btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                        <div class="dropdown-menu dropdown-menu-end">
                                                                            <ul class="link-list-opt no-bdr">
                                                                                <li>
                                                                                    <a class="dropdown-item" href="#"><em class="icon ni ni-eye"></em><span>View</span></a>
                                                                                </li>
                                                                                <li>
                                                                                    <a class="dropdown-item" href="#"><em class="icon ni ni-trash"></em><span>Delete</span></a>
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
                                                <!-- .nk-ibx-item -->
                                                <div class="nk-ibx-item">
                                                    <a href="#" class="nk-ibx-link"></a>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-check">
                                                        <div class="custom-control custom-control-sm custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input nk-dt-item-check" id="conversionItem13" />
                                                            <label class="custom-control-label" for="conversionItem13"></label>
                                                        </div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-star">
                                                        <div class="asterisk">
                                                            <a href="#"><em class="asterisk-off icon ni ni-star"></em><em class="asterisk-on icon ni ni-star-fill"></em></a>
                                                        </div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-user">
                                                        <div class="user-card">
                                                            <div class="user-avatar">
                                                                <img src="./images/avatar/c-sm.jpg" alt="" />
                                                            </div>
                                                            <div class="user-name">
                                                                <div class="lead-text">Laura Matthews</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-fluid">
                                                        <div class="nk-ibx-context-group">
                                                            <div class="nk-ibx-context-badges"><span class="badge bg-danger">Personal</span></div>
                                                            <div class="nk-ibx-context">
                                                                <span class="nk-ibx-context-text">
                                                                    <span class="heading">Credit Card Verification Incomplete.</span> Your recently submitted credit card verification has NOT been completed. We found the following errors in
                                                                    your submission.
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-attach"></div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-time">
                                                        <div class="sub-text">10:30 AM</div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-tools">
                                                        <div class="ibx-actions">
                                                            <ul class="ibx-actions-hidden gx-1">
                                                                <li>
                                                                    <a href="#" class="btn btn-sm btn-icon btn-trigger" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Archive" data-bs-original-title="Archive">
                                                                        <em class="icon ni ni-archived"></em>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" class="btn btn-sm btn-icon btn-trigger" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete" data-bs-original-title="Delete">
                                                                        <em class="icon ni ni-trash"></em>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                            <ul class="ibx-actions-visible gx-2">
                                                                <li>
                                                                    <div class="dropdown">
                                                                        <a href="#" class="dropdown-toggle btn btn-sm btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                        <div class="dropdown-menu dropdown-menu-end">
                                                                            <ul class="link-list-opt no-bdr">
                                                                                <li>
                                                                                    <a class="dropdown-item" href="#"><em class="icon ni ni-eye"></em><span>View</span></a>
                                                                                </li>
                                                                                <li>
                                                                                    <a class="dropdown-item" href="#"><em class="icon ni ni-trash"></em><span>Delete</span></a>
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
                                                <!-- .nk-ibx-item -->
                                                <div class="nk-ibx-item">
                                                    <a href="#" class="nk-ibx-link"></a>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-check">
                                                        <div class="custom-control custom-control-sm custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input nk-dt-item-check" id="conversionItem14" />
                                                            <label class="custom-control-label" for="conversionItem14"></label>
                                                        </div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-star">
                                                        <div class="asterisk">
                                                            <a href="#"><em class="asterisk-off icon ni ni-star"></em><em class="asterisk-on icon ni ni-star-fill"></em></a>
                                                        </div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-user">
                                                        <div class="user-card">
                                                            <div class="user-avatar bg-gray">
                                                                <span>MG</span>
                                                            </div>
                                                            <div class="user-name">
                                                                <div class="lead-text">Maria Grant</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-fluid">
                                                        <div class="nk-ibx-context-group">
                                                            <div class="nk-ibx-context">
                                                                <span class="nk-ibx-context-text">
                                                                    <span class="heading">Introducing npm’s security insights API.</span> Something I think is very important to supply chain security is to have the right information
                                                                    available to make decisions about risk
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-attach"></div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-time">
                                                        <div class="sub-text">10:30 AM</div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-tools">
                                                        <div class="ibx-actions">
                                                            <ul class="ibx-actions-hidden gx-1">
                                                                <li>
                                                                    <a href="#" class="btn btn-sm btn-icon btn-trigger" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Archive" data-bs-original-title="Archive">
                                                                        <em class="icon ni ni-archived"></em>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" class="btn btn-sm btn-icon btn-trigger" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete" data-bs-original-title="Delete">
                                                                        <em class="icon ni ni-trash"></em>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                            <ul class="ibx-actions-visible gx-2">
                                                                <li>
                                                                    <div class="dropdown">
                                                                        <a href="#" class="dropdown-toggle btn btn-sm btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                        <div class="dropdown-menu dropdown-menu-end">
                                                                            <ul class="link-list-opt no-bdr">
                                                                                <li>
                                                                                    <a class="dropdown-item" href="#"><em class="icon ni ni-eye"></em><span>View</span></a>
                                                                                </li>
                                                                                <li>
                                                                                    <a class="dropdown-item" href="#"><em class="icon ni ni-trash"></em><span>Delete</span></a>
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
                                                <!-- .nk-ibx-item -->
                                                <div class="nk-ibx-item">
                                                    <a href="#" class="nk-ibx-link"></a>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-check">
                                                        <div class="custom-control custom-control-sm custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input nk-dt-item-check" id="conversionItem15" />
                                                            <label class="custom-control-label" for="conversionItem15"></label>
                                                        </div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-star">
                                                        <div class="asterisk">
                                                            <a href="#"><em class="asterisk-off icon ni ni-star"></em><em class="asterisk-on icon ni ni-star-fill"></em></a>
                                                        </div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-user">
                                                        <div class="user-card">
                                                            <div class="user-avatar bg-dark">
                                                                <span>TN</span>
                                                            </div>
                                                            <div class="user-name">
                                                                <div class="lead-text">Timothy Nichols</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-fluid">
                                                        <div class="nk-ibx-context-group">
                                                            <div class="nk-ibx-context">
                                                                <span class="nk-ibx-context-text">
                                                                    <span class="heading">Do your table designs pass The Lunch Test</span> This email goes out to everyone who designs data-heavy applications. Lists and tables aren’t exactly
                                                                    the sexiest part of design, but in my own personal experience
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-attach"></div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-time">
                                                        <div class="sub-text">10:30 AM</div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-tools">
                                                        <div class="ibx-actions">
                                                            <ul class="ibx-actions-hidden gx-1">
                                                                <li>
                                                                    <a href="#" class="btn btn-sm btn-icon btn-trigger" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Archive" data-bs-original-title="Archive">
                                                                        <em class="icon ni ni-archived"></em>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" class="btn btn-sm btn-icon btn-trigger" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete" data-bs-original-title="Delete">
                                                                        <em class="icon ni ni-trash"></em>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                            <ul class="ibx-actions-visible gx-2">
                                                                <li>
                                                                    <div class="dropdown">
                                                                        <a href="#" class="dropdown-toggle btn btn-sm btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                        <div class="dropdown-menu dropdown-menu-end">
                                                                            <ul class="link-list-opt no-bdr">
                                                                                <li>
                                                                                    <a class="dropdown-item" href="#"><em class="icon ni ni-eye"></em><span>View</span></a>
                                                                                </li>
                                                                                <li>
                                                                                    <a class="dropdown-item" href="#"><em class="icon ni ni-trash"></em><span>Delete</span></a>
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
                                                <!-- .nk-ibx-item -->
                                                <div class="nk-ibx-item">
                                                    <a href="#" class="nk-ibx-link"></a>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-check">
                                                        <div class="custom-control custom-control-sm custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input nk-dt-item-check" id="conversionItem16" />
                                                            <label class="custom-control-label" for="conversionItem16"></label>
                                                        </div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-star">
                                                        <div class="asterisk">
                                                            <a href="#"><em class="asterisk-off icon ni ni-star"></em><em class="asterisk-on icon ni ni-star-fill"></em></a>
                                                        </div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-user">
                                                        <div class="user-card">
                                                            <div class="user-avatar">
                                                                <span>JL</span>
                                                            </div>
                                                            <div class="user-name">
                                                                <div class="lead-text">Jenkins Lori</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-fluid">
                                                        <div class="nk-ibx-context-group">
                                                            <div class="nk-ibx-context">
                                                                <span class="nk-ibx-context-text"> <span class="heading">Can I get email alerts.</span> If you subscribe to email notifications, you will receive an email alert </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-attach"></div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-time">
                                                        <div class="sub-text">10:30 AM</div>
                                                    </div>
                                                    <div class="nk-ibx-item-elem nk-ibx-item-tools">
                                                        <div class="ibx-actions">
                                                            <ul class="ibx-actions-hidden gx-1">
                                                                <li>
                                                                    <a href="#" class="btn btn-sm btn-icon btn-trigger" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Archive" data-bs-original-title="Archive">
                                                                        <em class="icon ni ni-archived"></em>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" class="btn btn-sm btn-icon btn-trigger" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete" data-bs-original-title="Delete">
                                                                        <em class="icon ni ni-trash"></em>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                            <ul class="ibx-actions-visible gx-2">
                                                                <li>
                                                                    <div class="dropdown">
                                                                        <a href="#" class="dropdown-toggle btn btn-sm btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                        <div class="dropdown-menu dropdown-menu-end">
                                                                            <ul class="link-list-opt no-bdr">
                                                                                <li>
                                                                                    <a class="dropdown-item" href="#"><em class="icon ni ni-eye"></em><span>View</span></a>
                                                                                </li>
                                                                                <li>
                                                                                    <a class="dropdown-item" href="#"><em class="icon ni ni-trash"></em><span>Delete</span></a>
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
                                                <!-- .nk-ibx-item -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="simplebar-placeholder" style="width: 790px; height: 1167px;"></div>
                            </div>
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
                                        <li>
                                            <a href="#" class="btn btn-icon btn-trigger btn-tooltip" aria-label="Delete" data-bs-original-title="Delete"><em class="icon ni ni-trash"></em></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="nk-ibx-head-actions">
                                    <ul class="nk-ibx-head-tools g-1">
                                        <li class="me-n1 me-lg-0">
                                            <a href="#" class="btn btn-icon btn-trigger search-toggle toggle-search" data-target="search"><em class="icon ni ni-search"></em></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="search-wrap" data-search="search">
                                    <div class="search-content">
                                        <a href="#" class="search-back btn btn-icon toggle-search" data-target="search"><em class="icon ni ni-arrow-left"></em></a>
                                        <input type="text" class="form-control border-transparent form-focus-none" placeholder="Search by user or message" />
                                        <button class="search-submit btn btn-icon"><em class="icon ni ni-search"></em></button>
                                    </div>
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
                                        <input type="text" id="email_address" name="email_address" class="input-mail tagify" placeholder="Recipient" data-whitelist="team@softnio.com, help@softnio.com, contact@softnio.com" required />
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
