@extends('admin.layout.app')
@section('content')

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
        margin: 2px;
        padding: 2px;
    }

    #calendar {
            max-width: 1100px;
            margin: 0 auto;
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
        }
</style>

<div style="margin-top: 80px" class="nk-content mt-5">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Fleet Events <i class="ni ni-bell"></i></h3>
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
                    <h5 class="modal-title">Add Events </h5>
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
                                        <div class="w-5">
                                            <div class="form-control-wrap">
                                                <div class="form-icon form-icon-left">
                                                    <em class="icon ni ni-calendar"></em>
                                                </div>
                                                <input type="datetime-local" name="start_date" id="event-start-date" class="form-control d" data-date-format="yyyy-mm-dd" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">End Date & Time</label>
                                    <div class="row gx-2">
                                        <div class="w-5">
                                            <div class="form-control-wrap">
                                                <div class="form-icon form-icon-left">
                                                    <em class="icon ni ni-calendar"></em>
                                                </div>
                                                <input type="datetime-local" name="end_date" id="event-end-date" class="form-control date-picke" data-date-format="yyyy-mm-dd">
                                            </div>
                                        </div>
{{--                                        <div class="w-45">--}}
{{--                                            <div class="form-control-wrap">--}}
{{--                                                <div class="form-icon form-icon-left">--}}
{{--                                                    <em class="icon ni ni-clock"></em>--}}
{{--                                                </div>--}}
{{--                                                <input type="text" id="event-end-time"  data-time-format="HH:mm:ss" class="form-control time-picker">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
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



@push('scripts')
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>

    <script>
           document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');

            var events = @json($events);

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                headerToolbar: {
                    right: 'prev,next today',
                    center: 'title',
                    left: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                themeSystem: 'bootstrap',
                events: events,
                eventContent: function(info) {
                let event = info.event;
                let content = document.createElement('div');
                content.innerHTML = `
                    Event: ${event.title}<br>
                    Start: ${event.start.toISOString().split('T')[0]}<br>
                    End: ${event.end ? event.end.toISOString().split('T')[0] : 'N/A'}<br>
                    ${event.extendedProps.location ? 'Location: ' + event.extendedProps.location + '<br>' : ''}
                    ${event.extendedProps.description ? 'Des: ' + event.extendedProps.description + '<br>' : ''}
                `;
                    content.style.backgroundColor = event.extendedProps.type === 'meeting' ? 'green' :
                                                    event.extendedProps.type === 'conference' ? 'red' : '#6576ff';
                    return { domNodes: [content] };
                },
                editable: true,
                droppable: true,
                eventResizableFromStart: true
            });
            calendar.render();
        });

        </script>
@endpush


@endsection
