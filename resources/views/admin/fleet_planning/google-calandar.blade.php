@extends('admin.layout.app') @section('content')

<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Fleet Events</h3>
                        </div>
                        <!-- .nk-block-head-content -->
                        <div class="nk-block-head-content">
                            <a class="btn btn-primary" data-bs-toggle="modal" href="#addEventPopup"><em class="icon ni ni-plus"></em><span>Add Event</span></a>
                        </div>
                        <!-- .nk-block-head-content -->
                    </div>
                    <!-- .nk-block-between -->
                </div>
                <!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="card card-bordered">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="card-inner">
                            <div id="calendar" class="nk-calendar fc fc-media-screen fc-direction-ltr fc-theme-bootstrap" style="height: 800px;">
                                <div class="fc-header-toolbar fc-toolbar fc-toolbar-ltr">
                                    <div class="fc-toolbar-chunk">
                                        <h2 class="fc-toolbar-title" id="fc-dom-1">July 2024</h2>
                                        <div class="btn-group">
                                            <button type="button" title="Previous month" aria-pressed="false" class="fc-prev-button btn btn-primary"><span class="fa fa-chevron-left"></span></button>
                                            <button type="button" title="Next month" aria-pressed="false" class="fc-next-button btn btn-primary"><span class="fa fa-chevron-right"></span></button>
                                        </div>
                                    </div>
                                    <div class="fc-toolbar-chunk"></div>
                                    <div class="fc-toolbar-chunk">
                                        <button type="button" title="This month" disabled="" aria-pressed="false" class="fc-today-button btn btn-primary">today</button>
                                        <div class="btn-group">
                                            <button type="button" title="month view" aria-pressed="true" class="fc-dayGridMonth-button btn btn-primary active">month</button>
                                            <button type="button" title="week view" aria-pressed="false" class="fc-timeGridWeek-button btn btn-primary">week</button>
                                            <button type="button" title="day view" aria-pressed="false" class="fc-timeGridDay-button btn btn-primary">day</button>
                                            <button type="button" title="list view" aria-pressed="false" class="fc-listWeek-button btn btn-primary">list</button>
                                        </div>
                                    </div>
                                </div>
                                <div aria-labelledby="fc-dom-1" class="fc-view-harness fc-view-harness-active">
                                    <div class="fc-daygrid fc-dayGridMonth-view fc-view">
                                        <div id="calendar"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
    @endpush

 <div class="modal fade" id="addEventPopup">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Events</h5>
                    <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.fleet.store') }}" method="POST" id="addEventForm" class="form-validate is-alter">
                        @csrf
                        <div class="row gx-4 gy-3">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label" for="event-title">Event Title</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="event-title" name="event_name" required placeholder="Event Name">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">Start Date & Time</label>
                                    <div class="row gx-2">
                                        <div class="w-55">
                                            <div class="form-control-wrap">
                                                <div class="form-icon form-icon-left">
                                                    <em class="icon ni ni-calendar"></em>
                                                </div>
                                                <input type="text" name="start_date" id="event-start-date" class="form-control date-picker" data-date-format="yyyy-mm-dd" required>
                                            </div>
                                        </div>
                                        <div class="w-45">
                                            <div class="form-control-wrap">
                                                <div class="form-icon form-icon-left">
                                                    <em class="icon ni ni-clock"></em>
                                                </div>
                                                <input type="text" id="event-start-time" data-time-format="HH:mm:ss" class="form-control time-picker">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">End Date & Time</label>
                                    <div class="row gx-2">
                                        <div class="w-55">
                                            <div class="form-control-wrap">
                                                <div class="form-icon form-icon-left">
                                                    <em class="icon ni ni-calendar"></em>
                                                </div>
                                                <input type="text" name="end_date" id="event-end-date" class="form-control date-picker" data-date-format="yyyy-mm-dd">
                                            </div>
                                        </div>
                                        <div class="w-45">
                                            <div class="form-control-wrap">
                                                <div class="form-icon form-icon-left">
                                                    <em class="icon ni ni-clock"></em>
                                                </div>
                                                <input type="text" id="event-end-time" data-time-format="HH:mm:ss" class="form-control time-picker">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label" for="event-description">Event Description</label>
                                    <div class="form-control-wrap">
                                        <textarea class="form-control" name="description" id="event-description"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">Location</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" name="location" placeholder="Event Location">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">Guest</label>
                                    <div class="form-control-wrap">
                                        <input type="email" class="form-control" name="guests[]" placeholder="Add Guest">
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <ul class="d-flex justify-content-between gx-4 mt-1">
                                    <li>
                                        <button id="addEvent" type="submit" class="btn btn-primary">Add Event</button>
                                    </li>
                                    <li>
                                        <button id="resetEvent" data-bs-dismiss="modal" class="btn btn-danger btn-dim">Discard</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<div class="modal fade" id="editEventPopup">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Event</h5>
                <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
            </div>
            <div class="modal-body">
                <form action="#" id="editEventForm" class="form-validate is-alter">
                    <div class="row gx-4 gy-3">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="edit-event-title">Event Title</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="edit-event-title" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label">Start Date & Time</label>
                                <div class="row gx-2">
                                    <div class="w-55">
                                        <div class="form-control-wrap">
                                            <div class="form-icon form-icon-left">
                                                <em class="icon ni ni-calendar"></em>
                                            </div>
                                            <input type="text" id="edit-event-start-date" class="form-control date-picker" data-date-format="yyyy-mm-dd" required>
                                        </div>
                                    </div>
                                    <div class="w-45">
                                        <div class="form-control-wrap">
                                            <div class="form-icon form-icon-left">
                                                <em class="icon ni ni-clock"></em>
                                            </div>
                                            <input type="text" id="edit-event-start-time" data-time-format="HH:mm:ss" class="form-control time-picker">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label">End Date & Time</label>
                                <div class="row gx-2">
                                    <div class="w-55">
                                        <div class="form-control-wrap">
                                            <div class="form-icon form-icon-left">
                                                <em class="icon ni ni-calendar"></em>
                                            </div>
                                            <input type="text" id="edit-event-end-date" class="form-control date-picker" data-date-format="yyyy-mm-dd">
                                        </div>
                                    </div>
                                    <div class="w-45">
                                        <div class="form-control-wrap">
                                            <div class="form-icon form-icon-left">
                                                <em class="icon ni ni-clock"></em>
                                            </div>
                                            <input type="text" id="edit-event-end-time" data-time-format="HH:mm:ss" class="form-control time-picker">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="edit-event-description">Event Description</label>
                                <div class="form-control-wrap">
                                    <textarea class="form-control" id="edit-event-description"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label">Event Category</label>
                                <div class="form-control-wrap">
                                    <select id="edit-event-theme" class="select-calendar-theme form-control" data-search="on">
                                        <option value="event-primary">Company</option>
                                        <option value="event-success">Seminars </option>
                                        <option value="event-info">Conferences</option>
                                        <option value="event-warning">Meeting</option>
                                        <option value="event-danger">Business dinners</option>
                                        <option value="event-pink">Private</option>
                                        <option value="event-primary-dim">Auctions</option>
                                        <option value="event-success-dim">Networking events</option>
                                        <option value="event-info-dim">Product launches</option>
                                        <option value="event-warning-dim">Fundrising</option>
                                        <option value="event-danger-dim">Sponsored</option>
                                        <option value="event-pink-dim">Sports events</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <ul class="d-flex justify-content-between gx-4 mt-1">
                                <li>
                                    <button id="updateEvent" type="submit" class="btn btn-primary">Update Event</button>
                                </li>
                                <li>
                                    <button data-bs-dismiss="modal" data-toggle="modal" data-target="#deleteEventPopup" class="btn btn-danger btn-dim">Delete</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="previewEventPopup">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div id="preview-event-header" class="modal-header">
                <h5 id="preview-event-title" class="modal-title">Placeholder Title</h5>
                <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
            </div>
            <div class="modal-body">
                <div class="row gy-3 py-1">
                    <div class="col-sm-6">
                        <h6 class="overline-title">Start Time</h6>
                        <p id="preview-event-start"></p>
                    </div>
                    <div class="col-sm-6" id="preview-event-end-check">
                        <h6 class="overline-title">End Time</h6>
                        <p id="preview-event-end"></p>
                    </div>
                    <div class="col-sm-10" id="preview-event-description-check">
                        <h6 class="overline-title">Description</h6>
                        <p id="preview-event-description"></p>
                    </div>
                </div>
                <ul class="d-flex justify-content-between gx-4 mt-3">
                    <li>
                        <button data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#editEventPopup" class="btn btn-primary">Edit Event</button>
                    </li>
                    <li>
                        <button data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#deleteEventPopup" class="btn btn-danger btn-dim">Delete</button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="deleteEventPopup">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body modal-body-lg text-center">
                    <div class="nk-modal py-4">
                        <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-cross bg-danger"></em>
                        <h4 class="nk-modal-title">Are You Sure ?</h4>
                        <div class="nk-modal-text mt-n2">
                            <p class="text-soft">This event data will be removed permanently.</p>
                        </div>
                        <ul class="d-flex justify-content-center gx-4 mt-4">
                            <li>
                                <button data-bs-dismiss="modal" id="deleteEvent" class="btn btn-success">Yes, Delete it</button>
                            </li>
                            <li>
                                <button data-bs-dismiss="modal" data-toggle="modal" data-target="#editEventPopup" class="btn btn-danger btn-dim">Cancel</button>
                            </li>
                        </ul>
                    </div>
                </div><!-- .modal-body -->
            </div>
        </div>
    </div>

@endsection
