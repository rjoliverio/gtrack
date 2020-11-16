

<?php $__env->startSection('title'); ?>
    GTrack | Calendar
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href='<?php echo e(asset('css/calendar-main.css')); ?>' rel='stylesheet' />
    <style>
        #calendar {
          max-width: 1100px;
          margin: 0 auto;
          padding-top: 40px;
        }
      </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div id='calendar'></div>
    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src='<?php echo e(asset('js/calendar-main.js')); ?>'></script>
    <script>
        
        document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var schedules =<?php echo $schedules; ?>;
        var trucks=<?php echo $trucks; ?>;
        var event=<?php echo $events; ?>;
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
            date=new Date(item.date);
            day=date.getDate();
            var obj={title:item.event_name,
                    allDay:true,
                    start:date,
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.guest_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\rjoli\Desktop\gtrack\gtrack\resources\views/guest/calendar.blade.php ENDPATH**/ ?>