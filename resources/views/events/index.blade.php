<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Events Calendar</title>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.13/index.global.min.js'></script>
</head>
<body>
    <h1 class="mt-4 ml-8 font-bold text-xl">Events Calendar</h1>

    <div id="calendar"></div>




    <script>
        document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          events: @json($calendarEvents),
        });
        calendar.render();
      });
    </script>


</body>
</html>