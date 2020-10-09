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
@endsection
@section('about')
    <div class="row">
      <div class="col-lg-10 mx-auto">
        <h2>GTrack is the solution to your waste collection!</h2>
        <p class="lead mb-5">This App features blah blah</p>
        <a class="btn btn-dark btn-xl js-scroll-trigger" href="#services">What We Offer</a>
      </div>
    </div>
@endsection

@section('services')
<div class="content-section-heading">
  <h3 class="text-secondary mb-0">Services</h3>
  <h2 class="mb-5">What We Offer</h2>
</div>
<div class="row">
  <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
    <span class="service-icon rounded-circle mx-auto mb-3">
      <i class="fa fa-mobile"></i>
    </span>
    <h4>
      <strong>Mobile Responsive</strong>
    </h4>
    <p class="text-faded mb-0">Looks great on any screen size!</p>
  </div>
  <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
    <span class="service-icon rounded-circle mx-auto mb-3">
      <i class="fa fa-map-marker-alt"></i>
    </span>
    <h4>
      <strong>Real Time Tracking</strong>
    </h4>
    <p class="text-faded mb-0">real-time tracking of a garbage truck that provides information to the residents
    </p>
  </div>
  <div class="col-lg-3 col-md-6 mb-5 mb-md-0">
    <span class="service-icon rounded-circle mx-auto mb-3 fa-stack" style="vertical-align:top;">
      <i class="fas fa-route"></i>
      <i class="fa fa-calendar-alt"></i>
    </span>
    <h4>
      <strong>Routing and Scheduling</strong>
    </h4>
    <p class="text-faded mb-0">coordinate waste collection routes and scheduling times in line with the needs of respective barangay</p>
  

  </div>
  <div class="col-lg-3 col-md-6">
    <span class="service-icon rounded-circle mx-auto mb-3">
      <i class="fas fa-bullhorn"></i>
    </span>
    <h4>
      <strong>Announcement</strong>
    </h4>
    <p class="text-faded mb-0">raise the level of awareness of "No Segregation, No Collection" policy by posting announcements.
    </p>
  </div>
</div>

@endsection

