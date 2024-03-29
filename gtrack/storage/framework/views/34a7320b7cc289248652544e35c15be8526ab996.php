
<?php $__env->startSection('title'); ?>
    GTrack | Home
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <header class="masthead d-flex">
      <div class="master-video">
        <video autoplay muted loop id="myVideo">
          <source src="../storage/images/img/compostela_playback.mp4" type="video/mp4">
        </video>
      </div>
      
        <div class="container text-center my-auto">
        <h1 class="mb-1 app text-white header-title">GTrack</h1><hr class="bg-white">
        <h4 class="text-white ">
            <em>A Waste Collection System for the residents of Barangay Poblacion, Compostela</em>
        </h4>
        <p class="mb-4 text-white">Let us increase our level of awareness and compliance regarding waste-related activities with GTrack.</p>
        <a class="btn btn-success btn-xl js-scroll-trigger" href="#about">Find Out More</a>
        </div>
        <div class="overlay"></div>
    </header>
    <section class="content-section bg-primary text-white" id="swm">
      <div class="container text-center">
        <div class="row">
            <div class="col-lg-10 mx-auto">
              <h2>Partnered by SWM Department of Barangay Compostela</h2>
              <p class="lead mb-5" align="justify"> The primary goal of solid waste management is reducing and eliminating adverse impacts of waste materials on human health and the environment to support economic development and superior quality of life.</p>
              <a class="btn btn-light btn-xl js-scroll-trigger" href="#about">What is GTrack?</a>
            </div>
         </div>
      </div>
  </section>
    <section class="content-section bg-light" id="about">
      <div class="container text-center">
        <div class="row">
            <div class="col-lg-10 mx-auto">
              <h2>GTrack is the solution to your waste collection!</h2>
              <p class="lead mb-5" align="justify">The GTrack is a web-based system used by residents and staffs of waste management of a specific barangay in the municipality of Compostela. It aims to manage and provide services for informative and systematic waste collection system with a time-based schedule and route tracking system of the garbage collection. It also includes announcements and report forms specific to issues encountered by garbage collectors as well as from concerned citizens. </p>
              <a class="btn btn-dark btn-xl js-scroll-trigger" href="#services">What We Offer</a>
            </div>
         </div>
      </div>
  </section>
  <section class="content-section bg-primary text-white text-center" id="services">
    <div class="container">
      <div class="content-section-heading">
        <h3 class="text-warning mb-0">Services</h3>
        <h2 class="mb-5">What We Offer</h2>
      </div>
      <div class="row">
        <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
          <span class="service-icon rounded-circle mx-auto mb-3">
            <i class="icon-screen-smartphone"></i>
          </span>
          <h4>
            <strong>Mobile Responsive</strong>
          </h4>
          <p class="text-faded mb-0">Looks great on any screen size!</p>
        </div>
        <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
          <span class="service-icon rounded-circle mx-auto mb-3">
            <i class="icon-location-pin"></i>
          </span>
          <h4>
            <strong>Real Time Tracking</strong>
          </h4>
          <p class="text-faded mb-0">Real-time tracking of a garbage truck that provides information to the residents</p>
        </div>
        <div class="col-lg-3 col-md-6 mb-5 mb-md-0">
          <span class="service-icon rounded-circle mx-auto mb-3">
            <i class="icon-directions"></i>
            <i class="icon-calendar"></i>
          </span>
          <h4>
            <strong>Routing and Scheduling</strong>
          </h4>
          <p class="text-faded mb-0">Coordinate waste collection routes and scheduling times in line with the needs of respective barangay</p>
        </div>
        <div class="col-lg-3 col-md-6">
          <span class="service-icon rounded-circle mx-auto mb-3">
            <i class="icon-volume-2"></i>
          </span>
          <h4>
            <strong>Announcement</strong>
          </h4>
          <p class="text-faded mb-0">raise the level of awareness of "No Segregation, No Collection" policy by posting announcements.</p>
        </div>
      </div>
    </div>
  </section>
  <section class="content-section" id="portfolio">
      <div class="container">
        <div class="content-section-heading text-center">
          <h2 class="mb5">Meet Our Team</h2>
        </div>
         <!--Grid row-->
        <div class="row text-center">
        
            <div class="col-lg-3 col-md-6">
                <h5 class="my-5 ">Humera Ardiente</h5>
                <img class="border border-success rounded-circle" alt="100x100" src=<?php echo e(asset('storage/images/img/humera.jpg')); ?> data-holder-rendered="true">
            </div>

             <div class="col-lg-3 col-md-6">
                <h5 class="my-5 ">Aljann Ondoy</h5>
                <img class="border border-success rounded-circle" alt="100x100" src=<?php echo e(asset('storage/images/img/aljann.jpg')); ?> data-holder-rendered="true">
            </div>

            <div class="col-lg-3 col-md-6">
              <h5 class="my-5 ">Cloyd  Anis</h5>
              <img class="border border-success rounded-circle" alt="100x100" src=<?php echo e(asset('storage/images/img/cloyd.jpg')); ?> data-holder-rendered="true">
            </div>

           <div class="col-lg-3 col-md-6">
            <h5 class="my-5 ">Rj Oliverio</h5>
            <img class="border border-success rounded-circle" alt="100x100" src=<?php echo e(asset('storage/images/img/rj.jpg')); ?> data-holder-rendered="true">
           </div>
        </div>
      </div>






  </section>




<?php $__env->stopSection(); ?>







<?php echo $__env->make('layouts.guest_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\rjoli\Desktop\gtrack\gtrack\resources\views/guest/index.blade.php ENDPATH**/ ?>