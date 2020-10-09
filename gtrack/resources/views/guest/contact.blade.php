<section id="contact" class="mb-5">
    <div class="container">
      @yield('contact')
    </div>
    </section>



@section('contact')
<div >
  <h1><b>Contact Us</b></h1>
  <hr>
    <center>
      <p class="lead">Feel free to visit (from the given location below) or message us down below for any of your concerns or questions.</p>
    </center>
    <br>
</div>
<div class="row rowcont ">
    <div class="col-lg-6 ">
      <div class="card w-100 contacts" id="contacts2">
        
                <div class="info">
                <h3 class="label h31"><i class="icofont-google-map"></i>&nbsp;Location:</h3>
                <p>Compostela Cebu</p>
                      
                
                <h3 class="label"><i class="icofont-envelope"></i>&nbsp;Email:</h3>
                <p>gtrack32@gmail.com</p>
                
                
                <h3 class="label"><i class="icofont-phone"></i>&nbsp;Call:</h3>
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
                  id="email" placeholder="Email Address" value="{{Auth::user()->email}}" readonly>
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
              <input type="submit" name="send" class="form-control form-control-md btn" id="sendbtn" value="Send">
          </div>
      </form>
  </div>
</div>
</div>                   
@endsection