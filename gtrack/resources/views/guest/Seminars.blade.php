@extends('layouts.guest_master')


@section('title')
    GTrack | Events
@endsection

@section('css')
<link href={{asset('css/announcement-seminar.css')}} rel="stylesheet">
@endsection

@section('content')

    <!-- Jumbotron Header -->
    <header class="jumbotron mb-4 headsem" style="background: linear-gradient(rgba(52, 220, 147, 0.7), rgba(52, 220, 147, 0.1)),url('{{asset('storage/images/img/nature4.jpg')}}') fixed center center; background-size: cover;">
      <h1 class="display-3">EVENTS</h1>
</header>
<div class="container">
<div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="first-slide" src="/storage/images/img/event1.jpg" alt="First slide">
            <div class="container">
              <div class="carousel-caption">
                <h1>Welcome to Events</h1>
                <p><i>Here you can see all the events regarding waste management in Barangay Poblacion, Compostela</i></p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="second-slide" src="/storage/images/img/event2.jpg" alt="Second slide">
            <div class="container">
              <div class="carousel-caption text-left">
                <h1><i>Help Nature...</i></h1>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="third-slide" src="/storage/images/img/event3.png" alt="Third slide">
            <div class="container">
              <div class="carousel-caption text-right">
                <h1><i>Become Responsible...</i></h1>
              </div>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
<!-- Carousel -->
<div class="row">
  <h5>Upcoming Events</h5>
</div>
<hr>
<div class="row">
@foreach($arr as $row)
<div class="col-lg-3 col-md-6 mb-4">
        <div class="card h-100">
          <img class="card-img-top" src="/storage/images/uploads/{{$row->image->image_1}}" alt="">
          <div class="card-body">
            <h4 class="card-title">{{$row->event_name}}</h4>
            <p class="card-text">{{\Illuminate\Support\Str::limit($row->description,100)}}</p>
          </div>
          <div class="card-footer">
            <a href="#showCont{{$row->event_id}}" class="btn btn-primary" data-toggle="modal">Find Out More!</a>
          </div>
        </div>
      </div>
      <div id="showCont{{$row->event_id}}" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                      
                                        <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                
      <img src="/storage/images/uploads/{{$row->image->image_1}}" class="images-display" width="450" alt="Responsive image">
      <div class="text-center mb-3 border border-secondary rounded-lg p-3 ">
      @if($row->image->image_2!=null)
        <a class="thumbnail fancybox text-center text-decoration-none" rel="ligthbox"
            href="/storage/images/uploads/{{$row->image->image_2}}">
            <img class="img-fluid bike-images " alt="" src="/storage/images/uploads/{{$row->image->image_2}}" width="50"/>
        </a>
        <a class="thumbnail fancybox text-center text-decoration-none" rel="ligthbox"
            href="/storage/images/uploads/{{$row->image->image_3}}">
            <img class="img-responsive img-fluid bike-images" alt=""
                src="/storage/images/uploads/{{$row->image->image_3}}" width="50"/>
        </a>
        <a class="thumbnail fancybox text-center text-decoration-none" rel="ligthbox"
            href="/storage/images/uploads/{{$row->image->image_4}}">
            <img class="img-responsive img-fluid bike-images" alt=""
                src="/storage/images/uploads/{{$row->image->image_4}}" width="50"/>
        </a>
        @else
          <h6><i>No other images available</i></h6>
        @endif
    </div>
      <hr>
      <div>
      <div>
                                                    <h2 class="modal-title"><i>{{$row->event_name}}</i></h2>
                                                    
                                                </div>
                                              <div>
                                              <div class="text-center mb-3 border border-secondary rounded-lg p-3 ">
                                              <p>{{$row->description}}</p>
                                              </div>
                                              <div class="text-left mb-3 border border-secondary rounded-lg p-3 ">
                                              
                                              <h4><b>Event Details:</b></h4>
                                              
                                              <p><i>Start Date:</i> {{$row->start_date}}</p>
                                              <p><i>End Date:</i> {{$row->end_date}}</p>
                                              
        <p><i>Participants:</i> {{$row->participants}}</p>
        <h4><b>Contact Details:</b></h4>
        <p><i>Contact Person:</i> {{ucfirst($row->userdetail->fname)}} {{ucfirst($row->userdetail->lname)}}</p> 
        <p><i>Contact No.:</i> {{$row->userdetail->contact_no}}</p>
                                              </div>
        
        </div>
      </div>

  
                                                </div>

                  
                                        </div>
                                    </div>
                                </div>
      @endforeach
</div>
<div class="row">
  <h5>All Events</h5>
</div>
<hr>
    <!-- Page Features -->
    <div class="row">
    @foreach($arr2 as $row)
<div class="col-lg-3 col-md-6 mb-4">
        <div class="card h-100">
          <img class="card-img-top" src="/storage/images/uploads/{{$row->image->image_1}}" alt="">
          <div class="card-body">
            <h4 class="card-title">{{$row->event_name}}</h4>
            <p class="card-text">{{\Illuminate\Support\Str::limit($row->description,100)}}</p>
          </div>
          <div class="card-footer">
            <a href="#showCont{{$row->event_id}}" class="btn btn-primary" data-toggle="modal">Find Out More!</a>
          </div>
        </div>
      </div>
      <div id="showCont{{$row->event_id}}" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                      
                                        <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                
      <img src="/storage/images/uploads/{{$row->image->image_1}}" class="images-display" width="450" alt="Responsive image">
      <div class="text-center mb-3 border border-secondary rounded-lg p-3 ">
      @if($row->image->image_2!=null)
        <a class="thumbnail fancybox text-center text-decoration-none" rel="ligthbox"
            href="/storage/images/uploads/{{$row->image->image_2}}">
            <img class="img-fluid bike-images " alt="" src="/storage/images/uploads/{{$row->image->image_2}}" width="50"/>
        </a>
        <a class="thumbnail fancybox text-center text-decoration-none" rel="ligthbox"
            href="/storage/images/uploads/{{$row->image->image_3}}">
            <img class="img-responsive img-fluid bike-images" alt=""
                src="/storage/images/uploads/{{$row->image->image_3}}" width="50"/>
        </a>
        <a class="thumbnail fancybox text-center text-decoration-none" rel="ligthbox"
            href="/storage/images/uploads/{{$row->image->image_4}}">
            <img class="img-responsive img-fluid bike-images" alt=""
                src="/storage/images/uploads/{{$row->image->image_4}}" width="50"/>
        </a>
        @else
          <h6><i>No other images available</i></h6>
        @endif
    </div>
      <hr>
      <div>
      <div>
                                                    <h2 class="modal-title"><i>{{$row->event_name}}</i></h2>
                                                    
                                                </div>
                                              <div>
                                              <div class="text-center mb-3 border border-secondary rounded-lg p-3 ">
                                              <p>{{$row->description}}</p>
                                              </div>
                                              <div class="text-left mb-3 border border-secondary rounded-lg p-3 ">
                                              
                                              <h4><b>Event Details:</b></h4>
                                             
                                              <p><i>Start Date:</i> {{ $row->start_date}}</p>
                                              <p><i>End Date:</i> {{$row->end_date}}</p>
        <p><i>Participants:</i> {{$row->participants}}</p>
        <h4><b>Contact Details:</b></h4>
        <p><i>Contact Person:</i> {{ucfirst($row->userdetail->fname)}} {{ucfirst($row->userdetail->lname)}}</p> 
        <p><i>Contact No.:</i> {{$row->userdetail->contact_no}}</p>
                                              </div>
        
        </div>
      </div>

  
                                                </div>

                  
                                        </div>
                                    </div>
                                </div>
      @endforeach

    
    </div>
    
    <!-- /.row -->
    <div class="d-flex justify-content-center">
            {{ $arr2->links() }}
        </div>
  </div>
  
  
  <!-- /.container -->
  <section class="jumbotron text-center mt-5" id="anno1" style="background: linear-gradient(rgba(52, 220, 147, 0.7), rgba(52, 220, 147, 0.1)),url('{{asset('storage/images/img/nature4.jpg')}}') fixed center center; background-size: cover;">
        
</section>
        
@endsection