@extends('layouts.driver_master')
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
    <a href="/driver/schedule" type="button" class="btn btn-success mb-2"><i class="fas fa-undo"></i> Back</a>
    <div class="row">
        <div id='calendar' class="col-10"></div>
    </div>
</div>
@endsection
@section('scripts')
    <script src={{asset('js/gallery-view.js')}}></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <script src='{{asset('js/calendar-main.js')}}'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var schedules ={!! $schedules !!};
        var trucks={!! $trucks !!};
        var event={!! $events !!};
        var events=[];

        schedules.forEach(function(item,index){
            date=new Date(item.schedule);
            day=date.getDay();
            time=date.toLocaleTimeString('it-IT');
            truck=trucks.find(o => o.schedule_id == item.schedule_id);
            var obj={title:truck.route,
                    startTime:time,
                    endTime: "16:00",
                    color:"green",
                    description: "Collection Details: "+item.garbage_type+"\n"+"Collection will start at: "+date.toLocaleString('en-US', { hour: 'numeric', hour12: true }),
                    daysOfWeek:[day],
                    backgroundColor: '#5cb85c',
                };
            events.push(obj);
        });
        event.forEach(function(item,index){
            sdate=new Date(item.start_date);
            edate=new Date(item.end_date);
            var year=sdate.getFullYear();
            var month=sdate.getMonth()+1 //getMonth is zero based;
            var day=sdate.getDate();
            sdate=year+"-"+month+"-"+day;
            year=edate.getFullYear();
            month=edate.getMonth()+1 //getMonth is zero based;
            day=edate.getDate()+1;
            edate=year+"-"+month+"-"+day;
            var obj={title:item.event_name,
                    allDay:true,
                    start:sdate,
                    end:edate,
                    description:"Description: "+ item.description+"\n"+"Participants: "+item.participants,
                    color: 'purple',
                };
            events.push(obj);
        });
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
            eventColor: 'green',
            events: events,
            eventClick: function(info) {
                swal(info.event.extendedProps.description, {
                    icon: "info",
                }); 
            }
        });
    
        calendar.render();
        });
    </script>
@endsection