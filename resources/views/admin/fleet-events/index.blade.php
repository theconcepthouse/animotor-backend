@extends('admin.layout.app')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href='https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.13.1/css/all.css' rel='stylesheet'>
<style>
    .fc a.fc-event:not([href]) {
        color: #fff;
        background: #6576ff;
        font-size: 15px;
    }

    .fc-event .fc-event-main {
        position: relative;
        z-index: 2;
        /*margin: 2px;*/
        /*padding: 2px;*/
    }

    #calendar {
            /*max-width: 1100px;*/
            /*margin: 0 auto;*/
        }
        .fc-toolbar-title {
            font-size: 1.5em;
            font-weight: bold;
        }
        .fc-daygrid-event {
            background-color: #3788d8;
            color: white;
            border: none;
        }
        .fc-event:hover {
            background-color: #2b6ca3;
            color: white;
            padding: 5px;
        }
</style>

<div style="margin-top: 50px" class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Fleet Events</h3>
                        </div><!-- .nk-block-head-content -->
                        <div class="nk-block-head-content">
                            <a class="btn btn-primary" data-bs-toggle="modal" href="#addEventPopup"><em class="icon ni ni-plus"></em><span>Add Event</span></a>
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
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
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





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
                <form action="{{ route('admin.storeFleetEvent') }}" method="POST" id="addEventFor" class="form-validate is-alter">
                    @csrf
                    <div class="row gx-4 gy-3">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="event-title">Event Title</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="event-title" name="title" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="event-location">Event Location</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="event-location" name="location">
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
                                            <input type="text" id="event-start-date" name="start_date" class="form-control date-picker" data-date-format="yyyy-mm-dd" required>
                                        </div>
                                    </div>
                                    <div class="w-45">
                                        <div class="form-control-wrap">
                                            <div class="form-icon form-icon-left">
                                                <em class="icon ni ni-clock"></em>
                                            </div>
                                            <input type="text" id="event-start-time" name="start_time" data-time-format="HH:mm:ss" class="form-control time-picker">
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
                                            <input type="text" id="event-end-date" name="end_date" class="form-control date-picker" data-date-format="yyyy-mm-dd">
                                        </div>
                                    </div>
                                    <div class="w-45">
                                        <div class="form-control-wrap">
                                            <div class="form-icon form-icon-left">
                                                <em class="icon ni ni-clock"></em>
                                            </div>
                                            <input type="text" id="event-end-time" name="end_time" data-time-format="HH:mm:ss" class="form-control time-picker">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="event-description">Event Description</label>
                                <div class="form-control-wrap">
                                    <textarea class="form-control" id="event-description" name="description"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label">Event Category</label>
                                <div class="form-control-wrap">
                                    <select id="event-theme" name="category" class="select-calendar-theme form-control" data-search="on">
                                        <option value="event-primary">Company</option>
                                        <option value="event-warning">Meeting</option>
                                        <option value="event-success">Seminars</option>
                                        <option value="event-info">PCN Event</option>
                                        <option value="event-danger">MOT Event</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <ul class="d-flex justify-content-between gx-4 mt-1">
                                <li>
                                    <button id="addEven" type="submit" class="btn btn-primary">Add Event</button>
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


@push('scripts')
{{--    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>--}}
    <script src="{{ asset('assets/js/libs/fullcalendar.js?ver=3.1.1') }}"></script>
{{--    <script src="{{ asset('assets/js/calendar.js') }}"></script>--}}
{{--    <script src="{{ asset('assets/js/event-calendar.js') }}"></script>--}}



    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const addEventForm = document.getElementById('addEventForm');

        addEventForm.addEventListener('submit', function(event) {
            event.preventDefault();

            const title = document.getElementById('event-title').value;
            const description = document.getElementById('event-description').value;
            const location = ''; // Assuming location field is not present
            const category = document.getElementById('event-theme').value;
            const startDate = document.getElementById('event-start-date').value + ' ' + document.getElementById('event-start-time').value;
            const endDate = document.getElementById('event-end-date').value ? (document.getElementById('event-end-date').value + ' ' + document.getElementById('event-end-time').value) : null;

            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            fetch('store/events', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({
                    title: title,
                    description: description,
                    location: location,
                    category: category,
                    start_date: startDate,
                    end_date: endDate
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.id) {
                    alert('Event added successfully!');
                    // Optionally, close the modal and refresh the events
                    $('#addEventPopup').modal('hide');
                    // Reload events (assuming you have a function to fetch and display events)
                    fetchEvents();
                } else {
                    alert('Error adding event.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error adding event.');
            });
        });
    });
</script>

<script>
    "use strict";

!function (NioApp, $) {
  "use strict";

  // Variable
  var $win = $(window),
    $body = $('body'),
    breaks = NioApp.Break;

  NioApp.Calendar = function () {
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0');
    var yyyy = today.getFullYear();
    var tomorrow = new Date(today);
    tomorrow.setDate(today.getDate() + 1);
    var t_dd = String(tomorrow.getDate()).padStart(2, '0');
    var t_mm = String(tomorrow.getMonth() + 1).padStart(2, '0');
    var t_yyyy = tomorrow.getFullYear();
    var yesterday = new Date(today);
    yesterday.setDate(today.getDate() - 1);
    var y_dd = String(yesterday.getDate()).padStart(2, '0');
    var y_mm = String(yesterday.getMonth() + 1).padStart(2, '0');
    var y_yyyy = yesterday.getFullYear();
    var YM = yyyy + '-' + mm;
    var YESTERDAY = y_yyyy + '-' + y_mm + '-' + y_dd;
    var TODAY = yyyy + '-' + mm + '-' + dd;
    var TOMORROW = t_yyyy + '-' + t_mm + '-' + t_dd;
    var month = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    var calendarEl = document.getElementById('calendar');
    var eventsEl = document.getElementById('externalEvents');
    var removeEvent = document.getElementById('removeEvent');
    var addEventBtn = $('#addEvent');
    var addEventForm = $('#addEventForm');
    var addEventPopup = $('#addEventPopup');
    var updateEventBtn = $('#updateEvent');
    var editEventForm = $('#editEventForm');
    var editEventPopup = $('#editEventPopup');
    var previewEventPopup = $('#previewEventPopup');
    var deleteEventBtn = $('#deleteEvent');
    var mobileView = NioApp.Win.width < NioApp.Break.md ? true : false;

    var events = @json($events);

    var calendar = new FullCalendar.Calendar(calendarEl, {
      timeZone: 'UTC',
      initialView: mobileView ? 'listWeek' : 'dayGridMonth',
      themeSystem: 'bootstrap',
      headerToolbar: {
        left: 'title prev,next',
        center: null,
        right: 'today dayGridMonth,timeGridWeek,timeGridDay,listWeek'
      },
      height: 800,
      contentHeight: 780,
      aspectRatio: 3,
      editable: true,
      droppable: true,
      views: {
        dayGridMonth: {
          dayMaxEventRows: 2
        }
      },
      direction: NioApp.State.isRTL ? "rtl" : "ltr",
      nowIndicator: true,
      now: TODAY + 'T09:25:00',
      eventDragStart: function eventDragStart(info) {
        $('.popover').popover('hide');
      },
      eventMouseEnter: function eventMouseEnter(info) {
        $(info.el).popover({
          template: '<div class="popover"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>',
          title: info.event._def.title,
          content: info.event._def.extendedProps.description,
          placement: 'top'
        });
        info.event._def.extendedProps.description ? $(info.el).popover('show') : $(info.el).popover('hide');
      },
      eventMouseLeave: function eventMouseLeave(info) {
        $(info.el).popover('hide');
      },
      eventClick: function eventClick(info) {
        // Get data
        var title = info.event._def.title;
        var description = info.event._def.extendedProps.description;
        var start = info.event._instance.range.start;
        var startDate = start.getFullYear() + '-' + String(start.getMonth() + 1).padStart(2, '0') + '-' + String(start.getDate()).padStart(2, '0');
        var startTime = start.toUTCString().split(' ');
        startTime = startTime[startTime.length - 2];
        startTime = startTime == '00:00:00' ? '' : startTime;
        var end = info.event._instance.range.end;
        var endDate = end.getFullYear() + '-' + String(end.getMonth() + 1).padStart(2, '0') + '-' + String(end.getDate()).padStart(2, '0');
        var endTime = end.toUTCString().split(' ');
        endTime = endTime[endTime.length - 2];
        endTime = endTime == '00:00:00' ? '' : endTime;
        var className = info.event._def.ui.classNames[0].slice(3);
        var eventId = info.event._def.publicId;

        //Set data in eidt form
        $('#edit-event-title').val(title);
        $('#edit-event-start-date').val(startDate).datepicker('update');
        $('#edit-event-end-date').val(endDate).datepicker('update');
        $('#edit-event-start-time').val(startTime);
        $('#edit-event-end-time').val(endTime);
        $('#edit-event-description').val(description);
        $('#edit-event-theme').val(className);
        $('#edit-event-theme').trigger('change.select2');
        editEventForm.attr('data-id', eventId);

        // Set data in preview
        var previewStart = String(start.getDate()).padStart(2, '0') + ' ' + month[start.getMonth()] + ' ' + start.getFullYear() + (startTime ? ' - ' + to12(startTime) : '');
        var previewEnd = String(end.getDate()).padStart(2, '0') + ' ' + month[end.getMonth()] + ' ' + end.getFullYear() + (endTime ? ' - ' + to12(endTime) : '');
        $('#preview-event-title').text(title);
        $('#preview-event-header').addClass('fc-' + className);
        $('#preview-event-start').text(previewStart);
        $('#preview-event-end').text(previewEnd);
        $('#preview-event-description').text(description);
        !description ? $('#preview-event-description-check').css('display', 'none') : null;
        previewEventPopup.modal('show');
        $('.popover').popover('hide');
      },
        events: events,
       eventContent: function(info) {
    let event = info.event;
    let content = document.createElement('div');

    let categoryColors = {
        'event-primary': '#6576ff',  // Company
        'event-warning': '#ffc107',  // Meeting
        'event-success': '#28a745',  // Seminars
        'event-info': '#17a2b8',     // PCN Event
        'event-danger': '#dc3545'    // MOT Event
    };

    let eventColor = categoryColors[event.extendedProps.category] || '#6576ff';  // Default color

    content.innerHTML = `
        <div style="display: flex; align-items: center; color: white; padding: 5px">
            <div style="flex: 1;">
                <strong>${event.title}</strong><br>
                Start: ${event.start.toISOString().split('T')[0]}<br>
                End: ${event.end ? event.end.toISOString().split('T')[0] : 'N/A'}<br>
                ${event.extendedProps.location ? 'Location: ' + event.extendedProps.location + '<br>' : ''}
            </div>
            <button type="submit" class="delete-event" style="background: none; border: none; cursor: pointer; display: none">
                <i class="fas fa-trash"></i>
            </button>
        </div>
    `;
    content.style.backgroundColor = eventColor;

    content.querySelector('.delete-event').addEventListener('click', function() {
        if (confirm('Are you sure you want to delete this event?')) {
            // Remove from calendar
            calendar.getEventById(event.id).remove();

            // Remove from database
            fetch(`/delete-event/${event.id}`, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    console.log('Event deleted successfully.');
                } else {
                    console.error('Failed to delete event.');
                }
            })
            .catch(error => console.error('Error:', error));
        }
    });

    return { domNodes: [content] };
},
    });
    calendar.render();

    // Add event
    addEventBtn.on("click", function (e) {
      e.preventDefault();
      var eventTitle = $('#event-title').val();
      var eventStartDate = $('#event-start-date').val();
      var eventEndDate = $('#event-end-date').val();
      var eventStartTime = $('#event-start-time').val();
      var eventEndTime = $('#event-end-time').val();
      var eventDescription = $('#event-description').val();
      var eventTheme = $('#event-theme').val();
      var eventStartTimeCheck = eventStartTime ? 'T' + eventStartTime + 'Z' : '';
      var eventEndTimeCheck = eventEndTime ? 'T' + eventEndTime + 'Z' : '';
      var newEvent = {
        title: eventTitle,
        start: eventStartDate + eventStartTimeCheck,
        end: eventEndDate + eventEndTimeCheck,
        description: eventDescription,
        className: "fc-event-" + eventTheme,
        category: eventTheme,
        location: eventTheme,
      };

      if (eventTitle.length) {
        calendar.addEvent(newEvent);
        addEventPopup.modal('hide');
      }
    });

    // Update Event
    updateEventBtn.on("click", function (e) {
      e.preventDefault();
      var eventId = editEventForm.data('id');
      var event = calendar.getEventById(eventId);
      var eventTitle = $('#edit-event-title').val();
      var eventStartDate = $('#edit-event-start-date').val();
      var eventEndDate = $('#edit-event-end-date').val();
      var eventStartTime = $('#edit-event-start-time').val();
      var eventEndTime = $('#edit-event-end-time').val();
      var eventDescription = $('#edit-event-description').val();
      var eventTheme = $('#edit-event-theme').val();
      var eventStartTimeCheck = eventStartTime ? 'T' + eventStartTime + 'Z' : '';
      var eventEndTimeCheck = eventEndTime ? 'T' + eventEndTime + 'Z' : '';

      event.setProp('title', eventTitle);
      event.setStart(eventStartDate + eventStartTimeCheck);
      event.setEnd(eventEndDate + eventEndTimeCheck);
      event.setExtendedProp('description', eventDescription);
      event.setProp('classNames', ['fc-event-' + eventTheme]);
      previewEventPopup.modal('hide');
    });

    // Delete Event
    deleteEventBtn.on("click", function (e) {
      e.preventDefault();
      var eventId = editEventForm.data('id');
      var event = calendar.getEventById(eventId);
      event.remove();
      previewEventPopup.modal('hide');
    });

    // External Events
    new FullCalendar.Draggable(eventsEl, {
      itemSelector: '.fc-event',
      eventData: function eventData(eventEl) {
        var title = $(eventEl).find('.fc-event-title').text();
        var className = $(eventEl).data('class');
        return {
          title: title,
          className: className,
          create: true,
          editable: true
        };
      }
    });

    // Remove Event
    if (removeEvent) {
      new FullCalendar.Draggable(removeEvent, {
        itemSelector: '.fc-event',
        eventData: function eventData(eventEl) {
          var title = $(eventEl).find('.fc-event-title').text();
          var className = $(eventEl).data('class');
          return {
            title: title,
            className: className,
            remove: true,
            create: true,
            editable: true
          };
        }
      });
    }

    // Form Reset
    addEventPopup.on('hidden.bs.modal', function (e) {
      addEventForm.trigger("reset");
      addEventForm.find('input, select').removeClass("is-invalid");
      addEventForm.find('input, select').removeClass("is-valid");
    });
    editEventPopup.on('hidden.bs.modal', function (e) {
      editEventForm.trigger("reset");
      editEventForm.find('input, select').removeClass("is-invalid");
      editEventForm.find('input, select').removeClass("is-valid");
    });

    // Date Picker
    $('.date-picker').datepicker({
      format: "yyyy-mm-dd",
      todayHighlight: true,
      autoclose: true,
    });
  };

  // Init Calendar
  NioApp.coms.docReady.push(NioApp.Calendar);
}(NioApp, jQuery);

</script>
@endpush


@endsection
