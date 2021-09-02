"use strict";

var KTCalendarListView = function() {

    return {
        //main function to initiate the module
        init: function() {
            var todayDate = moment().startOf('day');
            //var YM = todayDate.format('YYYY-MM');
            //var YESTERDAY = todayDate.clone().subtract(1, 'day').format('YYYY-MM-DD');
            var TODAY = todayDate.format('YYYY-MM-DD');
            //var TOMORROW = todayDate.clone().add(1, 'day').format('YYYY-MM-DD');
            
            var calendarEl = document.getElementById('kt_calendar');
            //var jobs = JSON($data['_id']);
          //var _id = document.getElementById('_id').value;
            //var x = $(this).data('id');
            //alert(sites);
            var SITEURL = "{{ url('/') }}";
            //events = {{ json_encode($events) }};
            var calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],

                isRTL: KTUtil.isRTL(),
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
                },

                height: 600,
                contentHeight: 550,
                aspectRatio: 3,  // see: https://fullcalendar.io/docs/aspectRatio

                views: {
                    dayGridMonth: { buttonText: 'month' },
                    timeGridWeek: { buttonText: 'week' },
                    timeGridDay: { buttonText: 'day' },
                    listDay: { buttonText: 'list' },
                    listWeek: { buttonText: 'list' }
                },

                defaultView: 'dayGridMonth',
                defaultDate: TODAY,

                editable: false,
                eventLimit: 2, // allow "more" link when too many events
                eventLimitText: "more",
                navLinks: true,
                //events: '/getEvents.php',
                eventSources: [

                    // your event source
                    {
                      url: 'getEvents', // use the `url` property
                      color: 'red',    // an option!
                      textColor: 'white',  // an option!
                      extraParams:
                      {
                        _id : targetID,
                      }
                    }
                
                    // any other sources...
                
                  ],
                eventRender: function(info) {
                    var element = $(info.el);

                    if (info.event.extendedProps && info.event.extendedProps.description) {
                        if (element.hasClass('fc-day-grid-event')) {
                            element.data('content', info.event.extendedProps.description);
                            element.data('placement', 'top');
                            KTApp.initPopover(element);
                        } else if (element.hasClass('fc-time-grid-event')) {
                            element.find('.fc-title').append('<div class="fc-description">' + info.event.extendedProps.description + '</div>');
                        } else if (element.find('.fc-list-item-title').lenght !== 0) {
                            element.find('.fc-list-item-title').append('<div class="fc-description">' + info.event.extendedProps.description + '</div>');
                        }
                    }
                }
            });

            calendar.render();
        }
    };
}();

jQuery(document).ready(function() {
    KTCalendarListView.init();
});
