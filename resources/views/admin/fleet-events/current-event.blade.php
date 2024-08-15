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
    <style>
        .fc .fc-more-popover .fc-popover-body {
            min-width: 220px;
            padding: 10px;
        }

        .fc .fc-more-popover {
            z-index: 8;
            margin-top: 80px;
        }
    </style>

    <div style="margin-top: 50px" class="nk-content ">
        <div class="container-fluid" wire:poll.50s>
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">

                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Fleet Events</h3>
                            </div><!-- .nk-block-head-content -->

                            <div class="nk-block-head-content">

                                <div class="col-lg-6 col-md-8 ">
                                    <a class="btn btn-primary" data-bs-toggle="modal" href="#addEventPopup"><em
                                        class="icon ni ni-plus"></em><span>Add Event</span></a>
                                </div>
                               </div>
                            </div><!-- .nk-block-head-content -->
                        </div><!-- .nk-block-between -->


                    </div><!-- .nk-block-head -->
                    <div class="nk-block">
                        <div class="card card-bordered">
                            <ul class="nav nav-tabs nav-tabs-s2">
                                <li class="nav-item">
                                    <a class="nav-link"  href="{{ route('admin.fleetEvent') }}">Event Calendar</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" wire:navigate href="{{ route('admin.currentEvent') }}">Current Event</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" wire:navigate  href="{{ route('admin.pastEvents') }}" >Past Event</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane " id="tabItem9">
                                    <div class="card-inner">
                                        <div id="calendar"></div>
                                    </div>
                                </div>
                                <div class="tab-pane active" id="tabItem10">
                                     <div class="card-inner">
                                    <div id="DataTables_Table_2_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                        <div class="datatable-wrap my-3">
                                            <table class="datatable-init-export nowrap table dataTable no-footer dtr-inline" data-export-title="Export" id="DataTables_Table_2" aria-describedby="DataTables_Table_2_info">
                                                <thead>
                                                    <tr>
                                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending">S/N</th>
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" >Event</th>
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" >Start Date</th>
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" >End Date</th>
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" >Category</th>
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" >Desc</th>
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" >Status</th>
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" >Action</th>
                                                    </tr>

                                                </thead>
                                                <tbody>
                                                @foreach($events as $value => $item)
                                                    <tr class="odd">
                                                        <td>{{ $value + 1 }}</td>
                                                        <td><a href="#" class="btn btn-success btn-sm">{{ $item->title }}</a></td>
                                                        <td>{{ date('Y-m-d  h:i A', strtotime($item->start_date)) }}</td>
                                                        <td>{{ date('Y-m-d  h:i A', strtotime($item->end_date)) }}</td>
                                                        <td>{{ $item->category() }}</td>
                                                        <td>{!! $item->description !!}</td>
                                                        <td>
                                                           <button type="button" class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#modalDefault-{{ $item?->id }}">{!! $item->status() !!}</button>

                                                        </td>
                                                        <td>
                                                            <div class="d-flex">

                                                                <a data-bs-toggle="modal" data-bs-target="#previewEventPopup-{{ $item?->id }}" class="btn btn-sm btn-icon btn-outline-gray btn-round mx-1">
                                                                    <em class="icon ni ni-eye"></em>
                                                                </a>
                                                                <form method="POST" action="{{ route('admin.event.destroy', $item->id) }}" onsubmit="return confirm('Are you sure you want to delete this item?');">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-sm btn-icon btn-outline-gray btn-round mx-1">
                                                                        <em class="icon ni ni-trash"></em>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>


                                                      <div class="modal fade" tabindex="-1" id="modalDefault-{{ $item?->id }}"  aria-modal="true" role="dialog">
                                                         <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                        <div class="modal-header">
                                                        <h5 class="modal-title">Modal Title</h5>
                                                        <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                            <em class="icon ni ni-cross"></em>
                                                        </a>
                                                        </div>
                                                        <div class="modal-body">
                                                        <form action="{{ route('admin.event.updateStatus') }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="event_id" value="{{ $item?->id }}">
                                                            <div class="row">
                                                                <div class="col-lg-10">
                                                                    <select name="status" class="form-control" id="">
                                                                        <option selected disabled>Select Status</option>
                                                                        <option value="pending">Pending</option>
                                                                        <option value="in-progress">In-Progress</option>
                                                                        <option value="completed">Completed</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-lg-8 mt-3">
                                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        </div>
                                                        </div>
                                                        </div>
                                                    </div>

                                                     <div class="modal fade" id="previewEventPopup-{{ $item?->id }}">
                                                            <div class="modal-dialog modal-md" role="document">
                                                                <div class="modal-content">
                                                                    <div id="preview-event-header" class="modal-header bg-dark">
                                                                        <h5 id="preview-event-title" class="modal-title text-white">
                                                                            {{ $item->title }}</h5>
                                                                        <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                            <em class="icon ni ni-cross"></em>
                                                                        </a>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="row gy-3 py-1">
                                                                            <div class="col-sm-6">
                                                                                <h6 class="overline-title">Start Date</h6>
                                                                                <p id="preview-event-start">{{ date('Y-m-d H:i A', strtotime($item->start_date)) }}</p>
                                                                            </div>
                                                                            <div class="col-sm-6" id="preview-event-end-check">
                                                                                <h6 class="overline-title">End Date</h6>
                                                                                <p id="preview-event-end">{{ date('Y-m-d H:i A', strtotime($item->end_date)) }}</p>
                                                                            </div>
                                                                            <div class="col-sm-10" id="preview-event-description-check">
                                                                                <h6 class="overline-title">Description</h6>
                                                                                <p id="preview-event-description">
                                                                                    {!! $item->description ?? "No Desc" !!}
                                                                                </p>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                @endforeach

                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                                </div>
                                <div class="tab-pane" id="tabItem11">
                                    <p>contnet</p>
                                </div>

                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



<div class="modal fade" id="editEventPopup">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Events</h5>
                    <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.storeFleetEvent') }}" method="POST" id="addEventFor"
                          class="form-validate is-alter">
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
                                                <input type="text" id="event-start-date" name="start_date"
                                                       class="form-control date-picker" data-date-format="yyyy-mm-dd"
                                                       required>
                                            </div>
                                        </div>
                                        <div class="w-45">
                                            <div class="form-control-wrap">
                                                <div class="form-icon form-icon-left">
                                                    <em class="icon ni ni-clock"></em>
                                                </div>
                                                <input type="text" id="event-start-time" name="start_time"
                                                       data-time-format="HH:mm:ss" class="form-control time-picker">
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
                                                <input type="text" id="event-end-date" name="end_date"
                                                       class="form-control date-picker" data-date-format="yyyy-mm-dd">
                                            </div>
                                        </div>
                                        <div class="w-45">
                                            <div class="form-control-wrap">
                                                <div class="form-icon form-icon-left">
                                                    <em class="icon ni ni-clock"></em>
                                                </div>
                                                <input type="text" id="event-end-time" name="end_time"
                                                       data-time-format="HH:mm:ss" class="form-control time-picker">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label" for="event-description">Event Description</label>
                                    <div class="form-control-wrap">
                                        <textarea class="form-control" id="event-description"
                                                  name="description"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">Event Category</label>
                                    <div class="form-control-wrap">
                                        <select id="event-theme" name="category"
                                                class="select-calendar-theme form-control" data-search="on">
                                            <option value="company-events">Company</option>
                                            <option value="meeting-events">Meeting</option>
                                            <option value="mail-tracker events">Mail Tracker</option>
                                            <option value="PCN-events">PCN Event</option>
                                            <option value="MOT-events">MOT Event</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label" for="event-location">Guests Email</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" name="guests">
{{--                                        <textarea rows="5" cols="5" class="form-control" id="event-location" name="guest"></textarea>--}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <ul class="d-flex justify-content-between gx-4 mt-1">
                                    <li>
                                        <button id="addEven" type="submit" class="btn btn-primary">Add Event</button>
                                    </li>
                                    <li>
                                        <button id="resetEvent" data-bs-dismiss="modal" class="btn btn-danger btn-dim">
                                            Discard
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </form>
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
                    <form action="{{ route('admin.storeFleetEvent') }}" method="POST" id="addEventFor"
                          class="form-validate is-alter">
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
                                        <div class="w-5">
                                            <div class="form-control-wrap">
                                                <div class="form-icon form-icon-left">
                                                    <em class="icon ni ni-calendar"></em>
                                                </div>
                                                <input type="datetime-local" id="event-start-date" name="start_date"
                                                       class="form-control date-picke" data-date-format="yyyy-mm-dd"
                                                       required>
                                            </div>
                                        </div>
{{--                                        <div class="w-45">--}}
{{--                                            <div class="form-control-wrap">--}}
{{--                                                <div class="form-icon form-icon-left">--}}
{{--                                                    <em class="icon ni ni-clock"></em>--}}
{{--                                                </div>--}}
{{--                                                <input type="text" id="event-start-time" name="start_time"--}}
{{--                                                       data-time-format="HH:mm:ss" class="form-control time-picker">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
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
                                                <input type="datetime-local" id="event-end-date" name="end_date"
                                                       class="form-control date-picke" data-date-format="yyyy-mm-dd">
                                            </div>
                                        </div>
{{--                                        <div class="w-45">--}}
{{--                                            <div class="form-control-wrap">--}}
{{--                                                <div class="form-icon form-icon-left">--}}
{{--                                                    <em class="icon ni ni-clock"></em>--}}
{{--                                                </div>--}}
{{--                                                <input type="text" id="event-end-time" name="end_time"--}}
{{--                                                       data-time-format="HH:mm:ss" class="form-control time-picker">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label" for="event-description">Event Description</label>
                                    <div class="form-control-wrap">
                                        <textarea class="form-control" id="event-description"
                                                  name="description"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">Event Category</label>
                                    <div class="form-control-wrap">
                                        <select id="event-theme" name="category"
                                                class="select-calendar-theme form-control" data-search="on">
                                            <option value="company-events">Company</option>
                                            <option value="meeting-events">Meeting</option>
                                            <option value="mail-tracker events">Mail Tracker</option>
                                            <option value="PCN-events">PCN Event</option>
                                            <option value="MOT-events">MOT Event</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label" for="event-location">Guests Email</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" name="guests">
{{--                                        <textarea rows="5" cols="5" class="form-control" id="event-location" name="guest"></textarea>--}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <ul class="d-flex justify-content-between gx-4 mt-1">
                                    <li>
                                        <button id="addEven" type="submit" class="btn btn-primary">Add Event</button>
                                    </li>
                                    <li>
                                        <button id="resetEvent" data-bs-dismiss="modal" class="btn btn-danger btn-dim">
                                            Discard
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
