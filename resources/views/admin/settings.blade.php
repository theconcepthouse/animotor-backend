@extends('admin.layout.app')
@section('content')

    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Settings</h3>
                            </div><!-- .nk-block-head-content -->
                        </div><!-- .nk-block-between -->
                    </div><!-- .nk-block-head -->
                    <div class="nk-block nk-block-lg">
                        <div class="card card-bordered card-stretch">
                            <ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#site"><em class="icon ni ni-laptop"></em><span>General settings</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#admin"><em class="icon ni ni-user-alt"></em><span>Admin Settings</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#theme"><em class="icon ni ni-color-palette-fill"></em><span>Theme setting </span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#email"><em class="icon ni ni-mail-fill"></em><span>Email settings </span> </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="site">
                                    <div class="card-inner pt-0">
                                        <h4 class="title nk-block-title">General setting</h4>
                                        <p>Here is your basic store setting of your app.</p>
                                        <form action="#" class="gy-3 form-settings">
                                            <div class="row g-3 align-center">
                                                <div class="col-lg-5">
                                                    <div class="form-group">
                                                        <label class="form-label" for="comp-name">Company Name</label>
                                                        <span class="form-note">Specify the name of your Company.</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="comp-name" value="Company Name">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row g-3 align-center">
                                                <div class="col-lg-5">
                                                    <div class="form-group">
                                                        <label class="form-label" for="comp-email">Company Email</label>
                                                        <span class="form-note">Specify the email address of your Company.</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="comp-email" value="info@softnio.com">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row g-3 align-center">
                                                <div class="col-lg-5">
                                                    <div class="form-group">
                                                        <label class="form-label" for="comp-copyright">Company Copyright</label>
                                                        <span class="form-note">Copyright information of your Company.</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="comp-copyright" value="&copy; 2022, DashLite. All Rights Reserved.">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row g-3 align-center">
                                                <div class="col-lg-5">
                                                    <div class="form-group">
                                                        <label class="form-label">Allow Registration</label>
                                                        <span class="form-note">Enable or disable registration from site.</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-7">
                                                    <ul class="custom-control-group g-3 align-center flex-wrap">
                                                        <li>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" class="custom-control-input" checked name="reg-public" id="reg-enable">
                                                                <label class="custom-control-label" for="reg-enable">Enable</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" class="custom-control-input" name="reg-public" id="reg-disable">
                                                                <label class="custom-control-label" for="reg-disable">Disable</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" class="custom-control-input" name="reg-public" id="reg-request">
                                                                <label class="custom-control-label" for="reg-request">On Request</label>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="row g-3 align-center">
                                                <div class="col-lg-5">
                                                    <div class="form-group">
                                                        <label class="form-label">Main Website</label>
                                                        <span class="form-note">Specify the URL if your main website is external.</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" name="site-url" value="https://www.softnio.com">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row g-3 align-center">
                                                <div class="col-lg-5">
                                                    <div class="form-group">
                                                        <label class="form-label" for="site-name"> Website description</label>
                                                        <span class="form-note">Describe your website.</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <div class="form-control-wrap">
                                                                <textarea class="form-control form-control" id="fv-message" name="fv-message"> </textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row g-3 align-center">
                                                <div class="col-lg-5">
                                                    <div class="form-group">
                                                        <label class="form-label" for="site-off">Maintanance Mode</label>
                                                        <span class="form-note">Enable to make website make offline.</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="form-group">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input" name="reg-public" id="site-off">
                                                            <label class="custom-control-label" for="site-off">Offline</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row g-3">
                                                <div class="col-lg-7">
                                                    <div class="form-group mt-2">
                                                        <button type="submit" class="btn btn-lg btn-primary">Update</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div><!--tab pan -->
                                <div class="tab-pane" id="admin">
                                    <div class="card-inner position-relative card-tools-toggle pt-0">
                                        <div class="nk-block-between g-3">
                                            <div class="nk-block-head-content">
                                                <h4 class="nk-block-title title">Admin List</h4>
                                            </div><!-- .nk-block-head-content -->
                                            <div class="nk-block-head-content">
                                                <div class="toggle-wrap nk-block-tools-toggle">
                                                    <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                                    <div class="toggle-expand-content" data-content="pageMenu">
                                                        <ul class="nk-block-tools g-3">
                                                            <li><a href="#" class="btn btn-white btn-outline-light"><em class="icon ni ni-download-cloud"></em><span>Export</span></a></li>
                                                            <li class="nk-block-tools-opt"><a data-bs-toggle="modal" href="#addAdmin" class="btn text-white bg-primary"><em class="icon ni ni-plus"></em><span>Add Admin</span></a></li>
                                                        </ul>
                                                    </div>
                                                </div><!-- .toggle-wrap -->
                                            </div><!-- .nk-block-head-content -->
                                        </div><!-- .nk-block-between -->
                                    </div>
                                    <div class="nk-block">
                                        <div class="card card-bordered border-left-0 border-right-0">
                                            <div class="card-inner-group">
                                                <div class="card-inner position-relative card-tools-toggle">
                                                    <div class="card-title-group">
                                                        <div class="card-tools">
                                                            <div class="form-inline flex-nowrap gx-3">
                                                                <div class="form-wrap w-150px">
                                                                    <select class="form-select js-select2" data-search="off" data-placeholder="Bulk Action">
                                                                        <option value="">Bulk Action</option>
                                                                        <option value="email">Send Email</option>
                                                                        <option value="group">Change Group</option>
                                                                        <option value="delete">Delete</option>
                                                                    </select>
                                                                </div>
                                                                <div class="btn-wrap">
                                                                    <span class="d-none d-md-block"><button class="btn btn-dim btn-outline-light disabled">Apply</button></span>
                                                                    <span class="d-md-none"><button class="btn btn-dim btn-outline-light btn-icon disabled"><em class="icon ni ni-arrow-right"></em></button></span>
                                                                </div>
                                                            </div><!-- .form-inline -->
                                                        </div><!-- .card-tools -->
                                                        <div class="card-tools me-n1">
                                                            <ul class="btn-toolbar gx-1">
                                                                <li>
                                                                    <a href="#" class="btn btn-icon search-toggle toggle-search" data-target="search"><em class="icon ni ni-search"></em></a>
                                                                </li><!-- li -->
                                                                <li class="btn-toolbar-sep"></li><!-- li -->
                                                                <li>
                                                                    <div class="toggle-wrap">
                                                                        <a href="#" class="btn btn-icon btn-trigger toggle" data-target="cardTools"><em class="icon ni ni-menu-right"></em></a>
                                                                        <div class="toggle-content" data-content="cardTools">
                                                                            <ul class="btn-toolbar gx-1">
                                                                                <li class="toggle-close">
                                                                                    <a href="#" class="btn btn-icon btn-trigger toggle" data-target="cardTools"><em class="icon ni ni-arrow-left"></em></a>
                                                                                </li><!-- li -->
                                                                                <li>
                                                                                    <div class="dropdown">
                                                                                        <a href="#" class="btn btn-trigger btn-icon dropdown-toggle" data-bs-toggle="dropdown">
                                                                                            <div class="dot dot-primary"></div>
                                                                                            <em class="icon ni ni-filter-alt"></em>
                                                                                        </a>
                                                                                        <div class="filter-wg dropdown-menu dropdown-menu-xl dropdown-menu-end">
                                                                                            <div class="dropdown-head">
                                                                                                <span class="sub-title dropdown-title">Filter Users</span>
                                                                                                <div class="dropdown">
                                                                                                    <a href="#" class="btn btn-sm btn-icon">
                                                                                                        <em class="icon ni ni-more-h"></em>
                                                                                                    </a>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="dropdown-body dropdown-body-rg">
                                                                                                <div class="row gx-6 gy-3">
                                                                                                    <div class="col-6">
                                                                                                        <div class="form-group">
                                                                                                            <label class="overline-title overline-title-alt">Role</label>
                                                                                                            <select class="form-select js-select2">
                                                                                                                <option value="any">Any Role</option>
                                                                                                                <option value="investor">Admin</option>
                                                                                                                <option value="seller">Co-admin</option>
                                                                                                                <option value="buyer">Moderator</option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-6">
                                                                                                        <div class="form-group">
                                                                                                            <label class="overline-title overline-title-alt">Status</label>
                                                                                                            <select class="form-select js-select2">
                                                                                                                <option value="any">Any Status</option>
                                                                                                                <option value="active">Active</option>
                                                                                                                <option value="pending">Pending</option>
                                                                                                                <option value="suspend">Suspend</option>
                                                                                                                <option value="deleted">Deleted</option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-12">
                                                                                                        <div class="form-group">
                                                                                                            <button type="button" class="btn btn-secondary">Filter</button>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="dropdown-foot between">
                                                                                                <a class="clickable" href="#">Reset Filter</a>
                                                                                                <a href="#">Save Filter</a>
                                                                                            </div>
                                                                                        </div><!-- .filter-wg -->
                                                                                    </div><!-- .dropdown -->
                                                                                </li><!-- li -->
                                                                                <li>
                                                                                    <div class="dropdown">
                                                                                        <a href="#" class="btn btn-trigger btn-icon dropdown-toggle" data-bs-toggle="dropdown">
                                                                                            <em class="icon ni ni-setting"></em>
                                                                                        </a>
                                                                                        <div class="dropdown-menu dropdown-menu-xs dropdown-menu-end">
                                                                                            <ul class="link-check">
                                                                                                <li><span>Show</span></li>
                                                                                                <li class="active"><a href="#">10</a></li>
                                                                                                <li><a href="#">20</a></li>
                                                                                                <li><a href="#">50</a></li>
                                                                                            </ul>
                                                                                            <ul class="link-check">
                                                                                                <li><span>Order</span></li>
                                                                                                <li class="active"><a href="#">DESC</a></li>
                                                                                                <li><a href="#">ASC</a></li>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </div><!-- .dropdown -->
                                                                                </li><!-- li -->
                                                                            </ul><!-- .btn-toolbar -->
                                                                        </div><!-- .toggle-content -->
                                                                    </div><!-- .toggle-wrap -->
                                                                </li><!-- li -->
                                                            </ul><!-- .btn-toolbar -->
                                                        </div><!-- .card-tools -->
                                                    </div><!-- .card-title-group -->
                                                    <div class="card-search search-wrap" data-search="search">
                                                        <div class="card-body">
                                                            <div class="search-content">
                                                                <a href="#" class="search-back btn btn-icon toggle-search" data-target="search"><em class="icon ni ni-arrow-left"></em></a>
                                                                <input type="text" class="form-control border-transparent form-focus-none" placeholder="Search by user or email">
                                                                <button class="search-submit btn btn-icon"><em class="icon ni ni-search"></em></button>
                                                            </div>
                                                        </div>
                                                    </div><!-- .card-search -->
                                                </div><!-- .card-inner -->
                                                <div class="card-inner p-0">
                                                    <div class="nk-tb-list nk-tb-ulist">
                                                        <div class="nk-tb-item nk-tb-head">
                                                            <div class="nk-tb-col nk-tb-col-check">
                                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                                    <input type="checkbox" class="custom-control-input" id="uid">
                                                                    <label class="custom-control-label" for="uid"></label>
                                                                </div>
                                                            </div>
                                                            <div class="nk-tb-col tb-col-lg"><span class="sub-text">ID</span></div>
                                                            <div class="nk-tb-col"><span class="sub-text">Name</span></div>
                                                            <div class="nk-tb-col"><span class="sub-text">Role</span></div>
                                                            <div class="nk-tb-col tb-col-sm"><span class="sub-text">Status</span></div>
                                                            <div class="nk-tb-col nk-tb-col-tools text-end">
                                                                <div class="dropdown">
                                                                    <a href="#" class="btn btn-xs btn-outline-light btn-icon dropdown-toggle" data-bs-toggle="dropdown" data-offset="0,5"><em class="icon ni ni-plus"></em></a>
                                                                    <div class="dropdown-menu dropdown-menu-xs dropdown-menu-end">
                                                                        <ul class="link-tidy sm no-bdr">
                                                                            <li>
                                                                                <div class="custom-control custom-control-sm custom-checkbox">
                                                                                    <input type="checkbox" class="custom-control-input" id="inv">
                                                                                    <label class="custom-control-label" for="inv">Invoice ID</label>
                                                                                </div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="custom-control custom-control-sm custom-checkbox">
                                                                                    <input type="checkbox" class="custom-control-input" id="st">
                                                                                    <label class="custom-control-label" for="st">Status</label>
                                                                                </div>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- .nk-tb-item -->
                                                        <div class="nk-tb-item">
                                                            <div class="nk-tb-col nk-tb-col-check">
                                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                                    <input type="checkbox" class="custom-control-input" id="uid1">
                                                                    <label class="custom-control-label" for="uid1"></label>
                                                                </div>
                                                            </div>
                                                            <div class="nk-tb-col tb-col-lg">
                                                                <a href="#">#456</a>
                                                            </div>
                                                            <div class="nk-tb-col">
                                                                <div class="user-card">
                                                                    <div class="user-avatar sm bg-primary">
                                                                        <span>AB</span>
                                                                    </div>
                                                                    <div class="user-name">
                                                                        <span class="tb-lead">Abu Bin Ishtiyak</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="nk-tb-col">
                                                                <span class="badge text-medium text-success">Admin</span>
                                                            </div>
                                                            <div class="nk-tb-col tb-col-sm">
                                                                <span class="tb-status bg-success badge badge-dot">Active</span>
                                                            </div>
                                                            <div class="nk-tb-col nk-tb-col-tools">
                                                                <ul class="nk-tb-actions gx-2">
                                                                    <li class="nk-tb-action-hidden">
                                                                        <a href="#" class="btn btn-sm btn-icon btn-trigger" data-toggle="tooltip" data-placement="top" title="Send Email">
                                                                            <em class="icon ni ni-mail-fill"></em>
                                                                        </a>
                                                                    </li>
                                                                    <li class="nk-tb-action-hidden">
                                                                        <a href="#" class="btn btn-sm btn-icon btn-trigger" data-toggle="tooltip" data-placement="top" title="Delete">
                                                                            <em class="icon ni ni-user-cross-fill"></em>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <div class="drodown">
                                                                            <a href="#" class="btn btn-sm btn-icon btn-trigger dropdown-toggle" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                                <ul class="link-list-opt no-bdr">
                                                                                    <li><a href="#"><em class="icon ni ni-eye"></em><span>View Details</span></a></li>
                                                                                    <li><a data-bs-toggle="modal" href="#editAdmin"><em class="icon ni ni-edit"></em><span>Edit</span></a></li>
                                                                                    <li><a data-bs-toggle="modal" href="#removeAdmin"><em class="icon ni ni-delete"></em><span>Delete</span></a></li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div><!-- .nk-tb-item -->
                                                        <div class="nk-tb-item">
                                                            <div class="nk-tb-col nk-tb-col-check">
                                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                                    <input type="checkbox" class="custom-control-input" id="uid2">
                                                                    <label class="custom-control-label" for="uid2"></label>
                                                                </div>
                                                            </div>
                                                            <div class="nk-tb-col tb-col-lg">
                                                                <a href="#">#457</a>
                                                            </div>
                                                            <div class="nk-tb-col">
                                                                <div class="user-card">
                                                                    <div class="user-avatar sm bg-dark">
                                                                        <span>BW</span>
                                                                    </div>
                                                                    <div class="user-name">
                                                                        <span class="tb-lead">Bruce Wayne</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="nk-tb-col">
                                                                <span class="badge text-medium text-primary">Co-Admin</span>
                                                            </div>
                                                            <div class="nk-tb-col tb-col-sm">
                                                                <span class="tb-status bg-success badge badge-dot">Active</span>
                                                            </div>
                                                            <div class="nk-tb-col nk-tb-col-tools">
                                                                <ul class="nk-tb-actions gx-2">
                                                                    <li class="nk-tb-action-hidden">
                                                                        <a href="#" class="btn btn-sm btn-icon btn-trigger" data-toggle="tooltip" data-placement="top" title="Send Email">
                                                                            <em class="icon ni ni-mail-fill"></em>
                                                                        </a>
                                                                    </li>
                                                                    <li class="nk-tb-action-hidden">
                                                                        <a href="#" class="btn btn-sm btn-icon btn-trigger" data-toggle="tooltip" data-placement="top" title="Delete">
                                                                            <em class="icon ni ni-user-cross-fill"></em>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <div class="drodown">
                                                                            <a href="#" class="btn btn-sm btn-icon btn-trigger dropdown-toggle" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                                <ul class="link-list-opt no-bdr">
                                                                                    <li><a href="#"><em class="icon ni ni-eye"></em><span>View Details</span></a></li>
                                                                                    <li><a data-bs-toggle="modal" href="#editAdmin"><em class="icon ni ni-edit"></em><span>Edit</span></a></li>
                                                                                    <li><a data-bs-toggle="modal" href="#removeAdmin"><em class="icon ni ni-delete"></em><span>Delete</span></a></li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div><!-- .nk-tb-item -->
                                                        <div class="nk-tb-item">
                                                            <div class="nk-tb-col nk-tb-col-check">
                                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                                    <input type="checkbox" class="custom-control-input" id="uid3">
                                                                    <label class="custom-control-label" for="uid3"></label>
                                                                </div>
                                                            </div>
                                                            <div class="nk-tb-col tb-col-lg">
                                                                <a href="#">#496</a>
                                                            </div>
                                                            <div class="nk-tb-col">
                                                                <div class="user-card">
                                                                    <div class="user-avatar sm bg-success">
                                                                        <span>TI</span>
                                                                    </div>
                                                                    <div class="user-name">
                                                                        <span class="tb-lead">Iliash Hossain</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="nk-tb-col">
                                                                <span class="badge text-medium text-info">Co-admin</span>
                                                            </div>
                                                            <div class="nk-tb-col tb-col-sm">
                                                                <span class="tb-status bg-warning badge badge-dot">Inactive</span>
                                                            </div>
                                                            <div class="nk-tb-col nk-tb-col-tools">
                                                                <ul class="nk-tb-actions gx-2">
                                                                    <li class="nk-tb-action-hidden">
                                                                        <a href="#" class="btn btn-sm btn-icon btn-trigger" data-toggle="tooltip" data-placement="top" title="Send Email">
                                                                            <em class="icon ni ni-mail-fill"></em>
                                                                        </a>
                                                                    </li>
                                                                    <li class="nk-tb-action-hidden">
                                                                        <a href="#" class="btn btn-sm btn-icon btn-trigger" data-toggle="tooltip" data-placement="top" title="Delete">
                                                                            <em class="icon ni ni-user-cross-fill"></em>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <div class="drodown">
                                                                            <a href="#" class="btn btn-sm btn-icon btn-trigger dropdown-toggle" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                                <ul class="link-list-opt no-bdr">
                                                                                    <li><a href="#"><em class="icon ni ni-eye"></em><span>View Details</span></a></li>
                                                                                    <li><a data-bs-toggle="modal" href="#editAdmin"><em class="icon ni ni-edit"></em><span>Edit</span></a></li>
                                                                                    <li><a data-bs-toggle="modal" href="#removeAdmin"><em class="icon ni ni-delete"></em><span>Delete</span></a></li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div><!-- .nk-tb-item -->
                                                        <div class="nk-tb-item">
                                                            <div class="nk-tb-col nk-tb-col-check">
                                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                                    <input type="checkbox" class="custom-control-input" id="uid4">
                                                                    <label class="custom-control-label" for="uid4"></label>
                                                                </div>
                                                            </div>
                                                            <div class="nk-tb-col tb-col-lg">
                                                                <a href="#">#458</a>
                                                            </div>
                                                            <div class="nk-tb-col">
                                                                <div class="user-card">
                                                                    <div class="user-avatar sm bg-info">
                                                                        <span>JA</span>
                                                                    </div>
                                                                    <div class="user-name">
                                                                        <span class="tb-lead">Jahangir Alom</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="nk-tb-col">
                                                                <span class="badge text-medium text-warning">Moderator</span>
                                                            </div>
                                                            <div class="nk-tb-col tb-col-sm">
                                                                <span class="tb-status bg-success badge badge-dot">Active</span>
                                                            </div>
                                                            <div class="nk-tb-col nk-tb-col-tools">
                                                                <ul class="nk-tb-actions gx-2">
                                                                    <li class="nk-tb-action-hidden">
                                                                        <a href="#" class="btn btn-sm btn-icon btn-trigger" data-toggle="tooltip" data-placement="top" title="Send Email">
                                                                            <em class="icon ni ni-mail-fill"></em>
                                                                        </a>
                                                                    </li>
                                                                    <li class="nk-tb-action-hidden">
                                                                        <a href="#" class="btn btn-sm btn-icon btn-trigger" data-toggle="tooltip" data-placement="top" title="Delete">
                                                                            <em class="icon ni ni-user-cross-fill"></em>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <div class="drodown">
                                                                            <a href="#" class="btn btn-sm btn-icon btn-trigger dropdown-toggle" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                                <ul class="link-list-opt no-bdr">
                                                                                    <li><a href="#"><em class="icon ni ni-eye"></em><span>View Details</span></a></li>
                                                                                    <li><a data-bs-toggle="modal" href="#editAdmin"><em class="icon ni ni-edit"></em><span>Edit</span></a></li>
                                                                                    <li><a data-bs-toggle="modal" href="#removeAdmin"><em class="icon ni ni-delete"></em><span>Delete</span></a></li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div><!-- .nk-tb-item -->
                                                        <div class="nk-tb-item">
                                                            <div class="nk-tb-col nk-tb-col-check">
                                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                                    <input type="checkbox" class="custom-control-input" id="uid5">
                                                                    <label class="custom-control-label" for="uid5"></label>
                                                                </div>
                                                            </div>
                                                            <div class="nk-tb-col tb-col-lg">
                                                                <a href="#">#459</a>
                                                            </div>
                                                            <div class="nk-tb-col">
                                                                <div class="user-card">
                                                                    <div class="user-avatar sm bg-danger">
                                                                        <span>FA</span>
                                                                    </div>
                                                                    <div class="user-name">
                                                                        <span class="tb-lead">Fuad Alom</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="nk-tb-col">
                                                                <span class="badge text-medium text-primary">Moderator</span>
                                                            </div>
                                                            <div class="nk-tb-col tb-col-sm">
                                                                <span class="tb-status bg-danger badge badge-dot">Suspended</span>
                                                            </div>
                                                            <div class="nk-tb-col nk-tb-col-tools">
                                                                <ul class="nk-tb-actions gx-2">
                                                                    <li class="nk-tb-action-hidden">
                                                                        <a href="#" class="btn btn-sm btn-icon btn-trigger" data-toggle="tooltip" data-placement="top" title="Send Email">
                                                                            <em class="icon ni ni-mail-fill"></em>
                                                                        </a>
                                                                    </li>
                                                                    <li class="nk-tb-action-hidden">
                                                                        <a href="#" class="btn btn-sm btn-icon btn-trigger" data-toggle="tooltip" data-placement="top" title="Delete">
                                                                            <em class="icon ni ni-user-cross-fill"></em>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <div class="drodown">
                                                                            <a href="#" class="btn btn-sm btn-icon btn-trigger dropdown-toggle" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                                <ul class="link-list-opt no-bdr">
                                                                                    <li><a href="#"><em class="icon ni ni-eye"></em><span>View Details</span></a></li>
                                                                                    <li><a data-bs-toggle="modal" href="#editAdmin"><em class="icon ni ni-edit"></em><span>Edit</span></a></li>
                                                                                    <li><a data-bs-toggle="modal" href="#removeAdmin"><em class="icon ni ni-delete"></em><span>Delete</span></a></li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div><!-- .nk-tb-item -->
                                                    </div><!-- .nk-tb-list -->
                                                </div><!-- .card-inner -->
                                                <div class="card-inner">
                                                    <ul class="pagination justify-content-center justify-content-md-start">
                                                        <li class="page-item"><a class="page-link" href="#">Prev</a></li>
                                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                        <li class="page-item"><span class="page-link"><em class="icon ni ni-more-h"></em></span></li>
                                                        <li class="page-item"><a class="page-link" href="#">6</a></li>
                                                        <li class="page-item"><a class="page-link" href="#">7</a></li>
                                                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                                    </ul><!-- .pagination -->
                                                </div><!-- .card-inner -->
                                            </div><!-- .card-inner-group -->
                                        </div><!-- .card -->
                                    </div>
                                </div><!--tab pan -->
                                <div class="tab-pane" id="theme">
                                    <div class="card-inner pt-0">
                                        <div class="nk-block-head">
                                            <div class="nk-block-head-content">
                                                <h4 class="title nk-block-title">Theme Installed</h4>
                                                <p>Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.</p>
                                            </div>
                                        </div>
                                        <div class="row g-gs">
                                            <div class="col-lg-4 col-xxl-3 col-sm-6">
                                                <div class="card shadow-none">
                                                    <img src="./images/crm/theme/a.jpg" class="border border-light rounded" alt="">
                                                    <div class="card-inner pt-3 p-0">
                                                        <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Expedita, sapiente!</p>
                                                        <a href="#" class="btn btn-primary"> Active Theme</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-xxl-3 col-sm-6">
                                                <div class="card shadow-none">
                                                    <img src="./images/crm/theme/b.jpg" class="border border-light rounded" alt="">
                                                    <div class="card-inner pt-3 p-0">
                                                        <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Expedita, sapiente!</p>
                                                        <a href="#" class="btn btn-primary disabled"> Current theme</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-xxl-3 col-sm-6">
                                                <div class="card shadow-none">
                                                    <img src="./images/crm/theme/c.jpg" class="border border-light rounded" alt="">
                                                    <div class="card-inner pt-3 p-0">
                                                        <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Expedita, sapiente!</p>
                                                        <a href="#" class="btn btn-primary"> Active theme</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- .tab-pane -->
                                <div class="tab-pane" id="email">
                                    <div class="card-inner pt-0">
                                        <div class="nk-block-head">
                                            <div class="nk-block-head-content">
                                                <h4 class="title nk-block-title">Email-Settings</h4>
                                                <p>Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.</p>
                                            </div>
                                        </div>
                                        <div class="row g-gs">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">E-mail to Lead</label>
                                                    <ul class="custom-control-group g-3 align-center">
                                                        <li>
                                                            <div class="custom-control custom-control-sm custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="lead-dis">
                                                                <label class="custom-control-label" for="lead-dis">About Discount</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="custom-control custom-control-sm custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="lead-pro">
                                                                <label class="custom-control-label" for="lead-pro">About Product</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="custom-control custom-control-sm custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="lead-det">
                                                                <label class="custom-control-label" for="lead-det">Product Details</label>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div><!-- .col -->
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">E-mail to Customers</label>
                                                    <ul class="custom-control-group g-3 align-center">
                                                        <li>
                                                            <div class="custom-control custom-control-sm custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="cus-dis">
                                                                <label class="custom-control-label" for="cus-dis">About Discount</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="custom-control custom-control-sm custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="cus-pro">
                                                                <label class="custom-control-label" for="cus-pro">About Product</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="custom-control custom-control-sm custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="cus-det">
                                                                <label class="custom-control-label" for="cus-det">Product Details</label>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div><!-- .col -->
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">E-mail to Employee</label>
                                                    <ul class="custom-control-group g-3 align-center">
                                                        <li>
                                                            <div class="custom-control custom-control-sm custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="emp-holiday">
                                                                <label class="custom-control-label" for="emp-holiday">Holiday</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="custom-control custom-control-sm custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="emp-policy">
                                                                <label class="custom-control-label" for="emp-policy">Updated Policy</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="custom-control custom-control-sm custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="emp-salary">
                                                                <label class="custom-control-label" for="emp-salary">About Salary</label>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div><!-- .col -->
                                            <div class="col-sm-6 col-lg-4">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <div class="form-icon form-icon-right">
                                                            <em class="icon ni ni-search"></em>
                                                        </div>
                                                        <input type="text" class="form-control" id="default-04" placeholder="E-mail from a name">
                                                    </div>
                                                </div>
                                            </div><!-- .col -->
                                        </div> <!-- .row -->
                                        <div class="row g-3">
                                            <div class="col-lg-7">
                                                <div class="form-group mt-2">
                                                    <button type="submit" class="btn btn-lg btn-primary">Update</button>
                                                </div>
                                            </div><!-- .col -->
                                        </div><!-- .row -->
                                    </div>
                                </div><!-- .tab-pane -->
                            </div><!-- .tab-content -->
                        </div><!--card-->
                    </div><!--nk-block-->
                </div>
            </div>
        </div>
    </div>

@endsection
