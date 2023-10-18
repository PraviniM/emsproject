
<!-- Other head elements -->
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<title>Laravel 9 Fullcalandar Jquery Ajax Create and Delete Event </title>
  <link href='https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css' rel='stylesheet'>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.3/moment.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.5.1/fullcalendar.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.5.1/fullcalendar.min.js"></script>

<style>
  .recruitment {
color: #9099AD;
font-family: Inter;
font-size: 14px;
font-style: normal;
font-weight: 400;
line-height: normal;
}
</style>

</head>
<center>
    <div style="text-align: right;">
        <button   class="btn btn-red" onclick="goToAllEvents()">
          <i class="ri-account-circle-line"></i>
          <span>All events</span>
        </button>
      </div>
</center>
<script>
    function goToAllEvents() {
        // Replace 'route-url' with the actual URL of the 'allevents' route
        var routeURL = 'allevent';
        window.location.href = routeURL;
    }
</script>

<body>
<div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Calendar</h2>
                <div id="calendar">
                    <div class="model-body" id="calmodel">

                    </div>
                </div>
                </div>
            </div>

        </div>

    </div>
</body>


<script>
    $(document).ready(function () {
        var calendar = $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,basicWeek,basicDay'
            },
            navLinks: true,
            editable: true,
            events: "getevent",          
            displayEventTime: false,
            eventRender: function (event, element, view) {
                if (event.allDay === 'true') {
                    event.allDay = true;
                } else {
                    event.allDay = false;
                }
            },
        selectable: true,
        selectHelper: true,
        select: function (start, end, allDay) {
                var title = prompt('Event Title:');
            if (title) {
                var start = moment(start, 'DD.MM.YYYY').format('YYYY-MM-DD');
                var end = moment(end, 'DD.MM.YYYY').format('YYYY-MM-DD');
                $.ajax({
                    url: "{{ URL::to('createevent') }}",
                    data: 'title=' + title + '&start=' + start + '&end=' + end +   '&_token=' +"{{ csrf_token() }}" ,
                    type: "post",
                    success: function (data) {
                        alert("Added Successfully");
                        $('#calendar').fullCalendar('refetchEvents');
                    }
                });
            }
        },

        });
    });
</script>

