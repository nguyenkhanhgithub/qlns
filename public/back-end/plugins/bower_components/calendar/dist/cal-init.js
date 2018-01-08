! function($) {
    "use strict";

    var CalendarApp = function() {
        this.$body = $("body")
        this.$calendar = $('#calendar'),
            this.$event = ('#calendar-events div.calendar-events'),
            this.$categoryForm = $('#add-new-event form'),
            this.$extEvents = $('#calendar-events'),
            this.$modal = $('#my-event'),
            this.$saveCategoryBtn = $('.save-category'),
            this.$calendarObj = null
    };

    var initialLocaleCode = 'vi';

    $.each($.fullCalendar.locales, function(localeCode) {
        $('#locale-selector').append(
            $('<option/>')
            .attr('value', localeCode)
            .prop('selected', localeCode == initialLocaleCode)
            .text(localeCode)
        );
    });

    // when the selected option changes, dynamically change the calendar option
    $('#locale-selector').on('change', function() {
        if (this.value) {
            $('#calendar').fullCalendar('option', 'locale', this.value);
        }
    });
    /* on drop */
    CalendarApp.prototype.onDrop = function(eventObj, date) {

            var $this = this;
            // retrieve the dropped element's stored Event Object
            var originalEventObject = eventObj.data('eventObject');
            var $categoryClass = eventObj.attr('data-class');
            // we need to copy it, so that multiple events don't have a reference to the same object
            var copiedEventObject = $.extend({}, originalEventObject);
            // assign it the date that was reported
            copiedEventObject.start = date;
            var newDate = moment(copiedEventObject.start, 'DD.MM.YYYY').format('YYYY-MM-DD');
            var title = eventObj.text();

            var event = "manage/ajax/lichtuan";

            $.ajax({
                url: 'manage/ajax/lich_insert',
                type: 'post',
                beforeSend: function(xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                        return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                data: {
                    'start': newDate,
                    'end': newDate,
                    'title': title,
                    'className': $categoryClass
                },
                success: function(response) {
                    $this.$calendarObj.fullCalendar('refetchEvents');
                    // $this.$calendarObj.fullCalendar('removeEvents');
                    // $this.$calendarObj.fullCalendar('addEventSource', event);
                }
            });
            if ($categoryClass)
                copiedEventObject['className'] = [$categoryClass];
            // $this.$calendarObj.fullCalendar('renderEvent', copiedEventObject, true);
            // render the event on the calendar
            // is the "remove after drop" checkbox checked?
            if ($('#drop-remove').is(':checked')) {
                // if so, remove the element from the "Draggable Events" list
                eventObj.remove();
            }
        },


        /* on click on event */
        CalendarApp.prototype.onEventClick = function(calEvent, jsEvent, view) {
            var $this = this;
            var form = $("<form method='post' action='manage/ajax/lich_update/" + calEvent._id + "'></form>");
            form.append("<div class='row'></div>");
            form.find(".row")
                .append("<div class='col-md-6'><div class='form-group'><label class='control-label'>Event Name</label><input class='form-control' placeholder='Insert Event Name' type='text' name='title'/></div></div>")
                .append("<div class='col-md-6'><div class='form-group'><label class='control-label'>Category</label><select class='form-control' name='category' id='category'></select></div></div>")
                .find("select[name='category']")
                .append("<option value='bg-danger'>Danger</option>")
                .append("<option value='bg-success'>Success</option>")
                .append("<option value='bg-purple'>Purple</option>")
                .append("<option value='bg-primary'>Primary</option>")
                .append("<option value='bg-pink'>Pink</option>")
                .append("<option value='bg-info'>Info</option>")
                .append("<option value='bg-warning'>Warning</option></div></div>");
            form.append("<div class='row' id='row4'></div>");
            form.find('#row4')
                .append("<div class='col-md-12'><div class='form-group'><label class='control-label'>Ghi chú</label><textarea class='form-control' rows='3' id='ghichu'></textarea></div></div>")
            form.append("<div class='row' id='row2'></div>");
            form.find("#row2")
                .append("<div class='col-md-6'><div class='form-group'><label class='control-label'>Bắt đầu</label><div class='input-group clockpicker'> <input type='text' class='form-control' name='startTimeId' value=''> <span class='input-group-addon'> <span class='glyphicon glyphicon-time'></span> </span> </div></div>")
                .append("<div class='col-md-6'><div class='form-group'><label class='control-label'>Kết thúc</label><div class='input-group clockpicker'> <input type='text' class='form-control' name='endTimeId' value=''> <span class='input-group-addon'> <span class='glyphicon glyphicon-time'></span> </span> </div></div>");
            form.append("<div class='row' id='row3'></div>");
            form.find("#row3")
                .append("<input type='hidden' name='LocalStart'>")
                .append("<input type='hidden' name='LocalEnd'>");
            $('.modal-footer').append("<button type='button' class='btn btn-success waves-effect waves-light capnhat'><i class='fa fa-check'></i> Save</button>");
            $.ajax({
                url: 'manage/ajax/lich_id/' + calEvent._id,
                type: 'GET',
                success: function(response) {
                    var array = JSON.parse(response);
                    $('input[name="title"]').val(array['title']);
                    $('#category').val(array["className"]);
                    $('input[name="LocalStart"]').val(array["start"]);
                    $('input[name="LocalEnd"]').val(array["end"]);
                    $('input[name="startTimeId"]').val(array["start"].substr(11, 5));
                    $('input[name="endTimeId"]').val(array["end"].substr(11, 5));
                    $('#ghichu').html(array["GhiChu"]);
                }
            });

            $this.$modal.modal({
                backdrop: 'static'
            });
            $this.$modal.find('.delete-event').show().end().find('.save-event').hide().end().find('.modal-body').empty().prepend(form).end().find('.delete-event').unbind('click').click(function() {
                $this.$calendarObj.fullCalendar('removeEvents', function(ev) {
                    if (ev._id == calEvent._id) {
                        $.ajax({
                            url: 'manage/ajax/delete_event/' + calEvent._id,
                            type: 'GET',
                            success: function(response) {}
                        });
                    }

                    $('.capnhat').css('display', 'none');
                    return (ev._id == calEvent._id);
                });
                $this.$modal.modal('hide');
            });

            $this.$modal.find('.capnhat').on('click', function() {

                calEvent.title = form.find("input[type=text]").val();
                $this.$calendarObj.fullCalendar('updateEvent', calEvent);
                $.ajax({
                    url: 'manage/ajax/lich_update/' + calEvent._id,
                    type: 'post',
                    data: {
                        'title': $('input[name="title"]').val(),
                        'start': $('input[name="LocalStart"]').val(),
                        'end': $('input[name="LocalEnd"]').val(),
                        'className': $('select[name="category"]').val(),
                        'startTime': $('input[name="startTimeId"]').val(),
                        'endTime': $('input[name="endTimeId"]').val(),
                        'GhiChu': $('#ghichu').val()
                    },
                    beforeSend: function(xhr) {
                        var token = $('meta[name="csrf_token"]').attr('content');

                        if (token) {
                            return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                        }
                    },
                    success: function(response) {
                        $this.$calendarObj.fullCalendar('refetchEvents');
                    }
                });
                $('.capnhat').css('display', 'none');
                $this.$modal.modal('hide');
                return false;
            });


            $('.clockpicker').clockpicker({
                donetext: 'Done',
            }).find('input').change(function() {
                console.log(this.value);
            });
        },
        /* on select */
        CalendarApp.prototype.onSelect = function(start, end, allDay) {

            var $this = this;
            $this.$modal.modal({
                backdrop: 'static'
            });
            var form = $("<form></form>");
            form.append("<div class='row'></div>");
            form.find(".row")
                .append("<div class='col-md-6'><div class='form-group'><label class='control-label'>Event Name</label><input class='form-control' placeholder='Insert Event Name' type='text' name='title'/></div></div>")
                .append("<div class='col-md-6'><div class='form-group'><label class='control-label'>Category</label><select class='form-control' name='category'></select></div></div>")
                .find("select[name='category']")
                .append("<option value='bg-danger'>Danger</option>")
                .append("<option value='bg-success'>Success</option>")
                .append("<option value='bg-purple'>Purple</option>")
                .append("<option value='bg-primary'>Primary</option>")
                .append("<option value='bg-pink'>Pink</option>")
                .append("<option value='bg-info'>Info</option>")
                .append("<option value='bg-warning'>Warning</option></div></div>");
            form.append("<div class='row' id='row3'></div>");
            form.find('#row3')
                .append("<div class='col-md-12'><div class='form-group'><label class='control-label'>Ghi chú</label><textarea class='form-control' rows='3' id='ghichu'></textarea></div></div>");
            form.append("<div class='row' id='row2'></div>");
            form.find("#row2")
                .append("<div class='col-md-6'><div class='form-group'><label class='control-label'>Bắt đầu</label><div class='input-group clockpicker'> <input type='text' class='form-control' name='startTime' value=''> <span class='input-group-addon'> <span class='glyphicon glyphicon-time'></span> </span> </div></div>")
                .append("<div class='col-md-6'><div class='form-group'><label class='control-label'>Kết thúc</label><div class='input-group clockpicker'> <input type='text' class='form-control' name='endTime' value=''> <span class='input-group-addon'> <span class='glyphicon glyphicon-time'></span> </span> </div></div>");
            $this.$modal.find('.delete-event').hide().end().find('.save-event').show().end().find('.modal-body').empty().prepend(form).end().find('.save-event').unbind('click').click(function() {
                form.submit();
            });

            $('.clockpicker').clockpicker({
                donetext: 'Done',
            }).find('input').change(function() {
                console.log(this.value);
            });

            $this.$modal.find('form').on('submit', function() {
                var title = form.find("input[name='title']").val();
                var beginning = form.find("input[name='beginning']").val();
                var ending = form.find("input[name='ending']").val();
                var categoryClass = form.find("select[name='category'] option:checked").val();
                var newEnd = new Date(end);
                var startTime = form.find('input[name="startTime"]').val();
                var endTime = form.find('input[name="endTime"]').val();
                var GhiChu = form.find('#ghichu').val();
                newEnd.setDate(newEnd.getDate() - 1);
                if (title !== null && title.length != 0) {
                    $.ajax({
                        url: 'manage/ajax/lich_insert',
                        type: "POST",
                        beforeSend: function(xhr) {
                            var token = $('input[name="_token"]').val();

                            if (token) {
                                return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                            }
                        },
                        data: {
                            'title': title,
                            'start': moment(start, 'DD.MM.YYYY').format('YYYY-MM-DD'),
                            'end': moment(newEnd, 'DD.MM.YYYY').format('YYYY-MM-DD'),
                            'className': categoryClass,
                            'GhiChu': GhiChu,
                            'startTime': startTime,
                            'endTime': endTime,
                            allDay: false,

                        },
                        success: function(response) {

                            $this.$calendarObj.fullCalendar('refetchEvents');
                        }

                    });

                    $this.$modal.modal('hide');
                } else {
                    alert('You have to give a title to your event');
                }
                return false;

            });


            $this.$calendarObj.fullCalendar('unselect');
        },
        CalendarApp.prototype.enableDrag = function() {

            //init events
            $(this.$event).each(function() {
                // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
                // it doesn't need to have a start or end
                var eventObject = {
                    title: $.trim($(this).text()) // use the element's text as the event title
                };

                // store the Event Object in the DOM element so we can get to it later
                $(this).data('eventObject', eventObject);
                // make the event draggable using jQuery UI
                $(this).draggable({
                    zIndex: 999,
                    revert: true, // will cause the event to go back to its
                    revertDuration: 0 //  original position after the drag
                });
            });
        }

    /* Initializing */
    CalendarApp.prototype.init = function() {
            this.enableDrag();
            /*  Initialize the calendar  */
            var date = new Date();
            var d = date.getDate();
            var m = date.getMonth();
            var y = date.getFullYear();
            var form = '';
            var today = new Date($.now());

            var event = "manage/ajax/lichtuan";

            var $this = this;
            $this.$calendarObj = $this.$calendar.fullCalendar({
                slotDuration: '00:15:00',
                /* If we want to split day time each 15minutes */
                minTime: '08:00:00',
                maxTime: '24:00:00',
                defaultView: 'month',
                handleWindowResize: true,

                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                locale: 'en',
                events: event,
                editable: true,
                droppable: true, // this allows things to be dropped onto the calendar !!!
                eventDrop: function(event, delta, revertFunc) { // si changement de position

                    edit(event);

                },
                eventResize: function(event, dayDelta, minuteDelta, revertFunc) { // si changement de longueur

                    edit(event);

                },
                eventLimit: true, // allow "more" link when too many events
                selectable: true,

                navLinks: true, // can click day/week names to navigate views

                drop: function(date) { $this.onDrop($(this), date); },
                select: function(start, end, allDay) { $this.onSelect(start, end, allDay); },
                eventClick: function(calEvent, jsEvent, view) { $this.onEventClick(calEvent, jsEvent, view); }
            });

            function edit(event) {
                var id = event.id;
                var start = moment(event.start, 'DD.MM.YYYY').format('YYYY-MM-DD HH:mm:ss');
                var end = moment(event.end, 'DD.MM.YYYY').format('YYYY-MM-DD HH:mm:ss');
                if (start.substr(11, 8) == "00:00:00") {
                    start = moment(event.start, 'DD.MM.YYYY').format('YYYY-MM-DD');
                    end = moment(event.start, 'DD.MM.YYYY').format('YYYY-MM-DD');
                }
                $.ajax({
                    url: 'manage/ajax/lich_drop/' + id,
                    type: 'post',
                    beforeSend: function(xhr) {
                        var token = $('meta[name="csrf_token"]').attr('content');

                        if (token) {
                            return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                        }
                    },
                    data: {
                        'start': start,
                        'end': end,
                    }
                });
            };
            //on new event
            this.$saveCategoryBtn.on('click', function() {
                var categoryName = $this.$categoryForm.find("input[name='category-name']").val();
                var categoryColor = $this.$categoryForm.find("select[name='category-color']").val();
                if (categoryName !== null && categoryName.length != 0) {
                    $this.$extEvents.append('<div class="calendar-events bg-' + categoryColor + '" data-class="bg-' + categoryColor + '" style="position: relative;"><i class="fa fa-move"></i>' + categoryName + '</div>')
                    $this.enableDrag();
                }

            });
        },

        //init CalendarApp
        $.CalendarApp = new CalendarApp, $.CalendarApp.Constructor = CalendarApp

}(window.jQuery),

//initializing CalendarApp
function($) {
    "use strict";
    $.CalendarApp.init()
}(window.jQuery);