@extends('layouts.guest_master')

@section('title')
    GTrack | Home
@endsection
@section('content')
    <header class="masthead d-flex">
        <div class="container text-center my-auto">
        <h1 class="mb-1 app">GTrack</h1>
        <h3 class="mb-5">
            <em>A Waste Collection Mobile Responsive App</em>
        </h3>
        <a class="btn btn-success btn-xl js-scroll-trigger" href="#about">Find Out More</a>
        </div>
        <div class="overlay"></div>
    </header>
    <section class="content-section bg-light" id="about">
      <div class="container text-center">
        <div class="row">
            <div class="col-lg-10 mx-auto">
              <h2>GTrack is the solution to your waste collection!</h2>
              <p class="lead mb-5">The GTrack is a web-based system used by residents and staffs of waste management of a specific barangay in the municipality of Compostela. It aims to manage and provide services for informative and systematic waste collection system with a time-based schedule and route tracking system of the garbage collection. It also includes announcements and report forms specific to issues encountered by garbage collectors as well as from concerned citizens. </p>
              <a class="btn btn-dark btn-xl js-scroll-trigger" href="#services">What We Offer</a>
            </div>
         </div>
      </div>
  </section>
  <section class="content-section bg-primary text-white text-center" id="services">
    <div class="container">
      <div class="content-section-heading">
        <h3 class="text-secondary mb-0">Services</h3>
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
          <h2 class="mb-5">Meet Our Team</h2>
        </div>
        <div class="row no-gutters">
          <div class="col-lg-6">
            <a class="portfolio-item" href="#!">
              <div class="caption">
                <div class="caption-content">
                  <div class="h2">Humera Ardiente</div>
                  <i class="mb-0">Developer</i>
                </div>
              </div>
              <img class="img-fluid" src={{asset('storage/images/img/humera.jpg')}} alt="">
            </a>
          </div>
          <div class="col-lg-6">
            <a class="portfolio-item" href="#!">
              <div class="caption">
                <div class="caption-content">
                  <div class="h2">Cloyd Vincent Anis</div>
                  <i class="mb-0">Developer</i>
                </div>
              </div>
              <img class="img-fluid" src="/storage/images/img/anis.jpg" alt="">
            </a>
          </div>
          <div class="col-lg-6">
            <a class="portfolio-item" href="#!">
              <div class="caption">
                <div class="caption-content">
                  <div class="h2">Rogelio John Oliverio</div>
                  <i class="mb-0">Developer</i>
                </div>
              </div>
              <img class="img-fluid" src="/storage/images/img/rj.jpg" alt="">
            </a>
          </div>
          <div class="col-lg-6">
            <a class="portfolio-item" href="#!">
              <div class="caption">
                <div class="caption-content">
                  <div class="h2">Aljann Niño Ondoy</div>
                  <i class="mb-0">Developer</i>
                </div>
              </div>
              <img class="img-fluid" src="/storage/images/img/aljann.jpg" alt="">
            </a>
          </div>
        </div>
        </div>






  </section>




@endsection






