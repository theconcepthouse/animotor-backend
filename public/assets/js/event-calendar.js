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
      events: function(fetchInfo, successCallback, failureCallback) {
        $.ajax({
          url: 'fleet/events',
          method: 'GET',
          success: function(data) {
            successCallback(data);
          },
          error: function() {
            failureCallback();
          }
        });
      }
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
