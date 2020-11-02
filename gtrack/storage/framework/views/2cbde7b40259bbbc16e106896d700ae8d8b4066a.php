

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
    <script src='<?php echo e(asset('js/calendar-main.js')); ?>'></script>
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
            // {
            //     title: 'Meeting',
            //     start: '2020-09-13T11:00:00',
            //     constraint: 'availableForMeeting', // defined below
            //     color: '#257e4a'
            // },
            // {
            //     title: 'Conference',
            //     start: '2020-09-18',
            //     end: '2020-09-20'
            // },
            // {
            //     title: 'Party',
            //     start: '2020-09-29T20:00:00'
            // },
    
            // // <==== areas where "Meeting" must be dropped ====>
            // {
            //     groupId: 'availableForMeeting',
            //     start: '2020-09-11T10:00:00',
            //     end: '2020-09-11T16:00:00',
            //     display: 'background'
            // },
            // {
            //     groupId: 'availableForMeeting',
            //     start: '2020-09-13T10:00:00',
            //     end: '2020-09-13T16:00:00',
            //     display: 'background'
            // },
    
            // //<==== red areas where no events can be dropped ====>
            // {
            //     start: '2020-09-24',
            //     end: '2020-09-28',
            //     overlap: false,
            //     display: 'background',
            //     color: '#ff9f89'
            // },
            // {
            //     start: '2020-09-06',
            //     end: '2020-09-08',
            //     overlap: false,
            //     display: 'background',
            //     color: '#ff9f89'
            // }
            ]
        });
    
        calendar.render();
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.guest_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\rjoli\Desktop\gtrack\gtrack\resources\views/guest/calendar.blade.php ENDPATH**/ ?>