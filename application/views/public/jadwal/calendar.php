<!DOCTYPE html>
<html>

<head>
    <title>Dinas Kesehatan Kota Malang</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style_admin.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.lwMultiSelect.css">
    <!-- MULTISELECT -->


    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/packages/core/main.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/packages/daygrid/main.css">
    <script src='<?php echo base_url(); ?>assets/packages/core/main.js'></script>
    <script src='<?php echo base_url(); ?>assets/packages/interaction/main.js'></script>
    <script src='<?php echo base_url(); ?>assets/packages/daygrid/main.js'></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/lwMultiSelect/jquery.lwMultiSelect.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: ['interaction', 'dayGrid'],
                defaultDate: '2019-06-12',
                editable: true,
                eventLimit: true, // allow "more" link when too many events
                events: [{
                        title: 'All Day Event',
                        start: '2019-06-01'
                    },
                    {
                        title: 'Long Event',
                        start: '2019-06-07',
                        end: '2019-06-10'
                    },
                    {
                        groupId: 999,
                        title: 'Repeating Event',
                        start: '2019-06-09T16:00:00'
                    },
                    {
                        groupId: 999,
                        title: 'Repeating Event',
                        start: '2019-06-16T16:00:00'
                    },
                    {
                        title: 'Conference',
                        start: '2019-06-11',
                        end: '2019-06-13'
                    },
                    {
                        title: 'Meeting',
                        start: '2019-06-12T10:30:00',
                        end: '2019-06-12T12:30:00'
                    },
                    {
                        title: 'Lunch',
                        start: '2019-06-12T12:00:00'
                    },
                    {
                        title: 'Meeting',
                        start: '2019-06-12T14:30:00'
                    },
                    {
                        title: 'Happy Hour',
                        start: '2019-06-12T17:30:00'
                    },
                    {
                        title: 'Dinner',
                        start: '2019-06-12T20:00:00'
                    },
                    {
                        title: 'Birthday Party',
                        start: '2019-06-13T07:00:00'
                    },
                    {
                        title: 'Click for Google',
                        url: 'http://google.com/',
                        start: '2019-06-28'
                    }
                ]
            });

            calendar.render();
        });
    </script>
    <style>
        body {
            margin: 40px 10px;
            padding: 0;
            font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
            font-size: 14px;
        }

        #calendar {
            max-width: 900px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div id="main">
        <div class="card col-md-12 shadow md-5 p-3 bg-white rounded">
            <div class="card-body">
                <div id='calendar'></div>
            </div>
        </div>
    </div>
</body>

</html>