@extends('layouts.admin_master')
@section('title')
    GTrack | Calendar
@endsection

@section('css')
    <link href={{asset('css/reports-show.css')}} rel="stylesheet">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <link href='{{asset('css/calendar-main.css')}}' rel='stylesheet' />
    <style>
        #calendar {
          max-width: 1100px;
          margin: 0 auto;
          padding-top: 40px;
        }
      </style>
@endsection

@section('content')
<div class="container mb-3">
    <a href="/admin/schedules" type="button" class="btn btn-success mb-2"><i class="fas fa-undo"></i> Back</a>
    <div class="row xl-10">
        <div id='calendar' class="col-10"></div>
    </div>
</div>
@endsection
@section('scripts')
    <script src={{asset('js/gallery-view.js')}}></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <script src='{{asset('js/calendar-main.js')}}'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
    
        var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
            },
            // initialDate: '2020-09-12',
            navLinks: true, // can click day/week names to navigate views
            businessHours: true, // display business hours
            editable: false,
            selectable: true,
            events: [
            {
                title: 'Trash Day',
                start: '2020-10-11T13:00:00',
                color: '#ffae00'
            },
            {
                title: 'Trash Day',
                start: '2020-10-14T13:00:00',
                color: '#ff0000'
            },
            {
                title: 'Trash Day',
                start: '2020-10-16T13:00:00',
                color: '#f8e321'
            }
            ]
        });
    
        calendar.render();
        });
    </script>
@endsection