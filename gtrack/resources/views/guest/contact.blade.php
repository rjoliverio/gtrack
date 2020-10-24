@extends('layouts.guest_master')
@section('css')
<link href={{asset('css/announcement-seminar.css')}} rel="stylesheet">
@endsection
@section('content')
 <!-- Jumbotron Header -->
 <header class="jumbotron mb-4 headsem" style="background: linear-gradient(rgba(52, 220, 147, 0.7), rgba(52, 220, 147, 0.1)),url('{{asset('storage/images/nature4.jpg')}}') fixed center center; background-size: cover;">
    <h1 class="display-3">CONTACT US</h1>
  </header>
  <div class="container">
<div class="row rowcont ">
    <div class="col-lg-6 ">
      <div class="card w-100 contacts" id="contacts2">
        
                <div class="info">
                <h3 class="label h31"><i class="icon-location-pin"></i>&nbsp;Location:</h3>
                <p>Compostela Cebu</p>
                      
                
                <h3 class="label"><i class="icon-envelope"></i>&nbsp;Email:</h3>
                <p>gtrack32@gmail.com</p>
                
                
                <h3 class="label"><i class="icon-phone"></i>&nbsp;Call:</h3>
                <p>+1 5589 55488 555</p>
                <div class="row maprow">
                <iframe src="https://www.google.com/maps/d/embed?mid=1yFQDBNLFVyMuO1yrPJCWnnixVA9HmCGg" class="contact-map"></iframe>
                </div>
                </div>
                                  
      </div>
    </div>
<div class="col-lg-6 ">
  <div class="card w-100 contacts" id="contacts3">
      <h3 class="label">Send Us A Message</h3>
      @if(count($errors)>0)
      <div class="alert alert-danger">
          <button type="button" class="close" data-dismiss="alert">x</button>
          <ul>
              @foreach($errors->all() as $error)
              <li>{{$error}}</li>
              @endforeach
          </ul>
      </div>
      @endif

      @if($message = Session::get('success'))
      <div class="alert alert-success alert-block">
          <button type="button" class="close" data-dismiss="alert">x</button>
          <strong>{{$message}}</strong>
      </div>
      @endif
      <form method="post" action="{{ url('/send') }}">
          {{csrf_field()}}
          <div class="container w-100">
              <h4 class="title"></h4>

              @if(isset(Auth::user()->email))
              <input type="text" name="email" class="form-control form-control-lg w-100 ml-auto mr-auto mb-1"
                  id="email" placeholder="Email Address" readonly>
              @else
              <input type="text" name="email" class="form-control form-control-lg w-100 ml-auto mr-auto mb-1"
                  id="email" placeholder="Email Address">
              @endif
              <input type="text" name="subject" class="form-control form-control-lg w-100 ml-auto mr-auto mb-1"
                  id="subject" placeholder="Subject">
              <textarea name="message" class="form-control form-control-lg w-100 ml-auto mr-auto mb-3" name="" id=""
                  cols="30" rows="10" placeholder="Type your message here...">
                                  </textarea>

          </div>
          <div class="sendcont mr-3 mt-1 mb-1 ">
              <input type="submit" name="send" class="form-control form-control-md " id="sendbtn" value="Send">
          </div>
      </form>
  </div>
</div>
</div> 
</div>                  
@endsection