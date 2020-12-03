@extends('layouts.guest_master')
@section('title')
    GTrack | Announcements
@endsection

@section('css')
<link href={{asset('css/announcement-seminar.css')}} rel="stylesheet">

@endsection

@section('content')
<div class="jumbotron text-center" id="anno" style="background: linear-gradient(rgba(52, 220, 147, 0.7), rgba(52, 220, 147, 0.1)),url('{{asset('storage/images/img/nature2.jpg')}}') fixed center center; background-size: cover;">
        <div class="container head">
          <h1 class="site-heading">ANNOUNCEMENTS</h1>
          
        </div>
</div>

      <div class="album py-5 bg-light">
        <div class="container">
        @forelse($ann as $row)
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="post-preview speech-bubble">
      
            <h2 class="post-title">
              
{{$row->title}}
            </h2>
            <h3 class="post-subtitle">
           {{$row->content}}
            </h3>
         
        
          @if($row->image_id!=null)
          <h6><i>Attached Images:</i></h6>
      <div class="text-center mb-3 border border-secondary rounded-lg p-3 ul">
      <a class="thumbnail fancybox text-center text-decoration-none li" rel="ligthbox"
            href="/storage/images/uploads/{{$row->image->image_1}}">
            <img class="img-fluid ann-images " alt="" src="/storage/images/uploads/{{$row->image->image_1}}" width="100"/>
        </a>
        <a class="thumbnail fancybox text-center text-decoration-none li" rel="ligthbox"
            href="/storage/images/uploads/{{$row->image->image_2}}">
            <img class="img-fluid ann-images " alt="" src="/storage/images/uploads/{{$row->image->image_2}}" width="100"/>
        </a>
        <a class="thumbnail fancybox text-center text-decoration-none li" rel="ligthbox"
            href="/storage/images/uploads/{{$row->image->image_3}}">
            <img class="img-responsive img-fluid ann-images" alt=""
                src="/storage/images/uploads/{{$row->image->image_3}}" width="100"/>
        </a>
        <a class="thumbnail fancybox text-center text-decoration-none li" rel="ligthbox"
            href="/storage/images/uploads/{{$row->image->image_4}}">
            <img class="img-responsive img-fluid ann-images" alt=""
                src="/storage/images/uploads/{{$row->image->image_4}}" width="100"/>
        </a>
   </div>
 
   @endif
          <p class="post-meta">Posted by
            <a href="#">{{$row->user->userdetail->fname}} {{$row->user->userdetail->lname}}</a>
            on {{Carbon\Carbon::parse($row->created_at)->format('F d, Y g:i A')}}</p>
        </div>
            </div>
            </div>
            <hr>
            @empty
              <div class="jumbotron jumbotron-fluid shadow">
                <div class="container">
                  <h1 class="display-4">No announcement yet</h1>
                  <p class="lead">Announcements will be posted soon.</p>
                </div>
              </div>
            @endforelse
            
            </div>
            <div class="d-flex justify-content-center">
            {{ $ann->links() }}
        </div>
           </div>
           
</div>


    
<section class="jumbotron text-center" id="anno1" style="background: linear-gradient(rgba(52, 220, 147, 0.7), rgba(52, 220, 147, 0.1)),url('{{asset('storage/images/img/nature2.jpg')}}') fixed center center; background-size: cover;">
        
</section>
  <!-- <div class="container" id="posts">
    <div class="row genann">
      <div class="col-sm-8">
        <div class="row anno">
        <img src="{{asset('storage/images/rj.jpg')}}" width="160" height="10" class="img-fluid profimg"alt="" >
        <div class="post-preview speech-bubble">
          <a href="post.html">
            <h2 class="post-title">
              Man must explore, and this is exploration at its greatest
            </h2>
            <h3 class="post-subtitle">
              Problems look mighty small from 150 miles up
            </h3>
          </a>
          <p class="post-meta">Posted by
            <a href="#">Start Bootstrap</a>
            on September 24, 2019</p>
        </div>
        </div>
        <hr>
        <div class="row">
        <img src="{{asset('storage/images/gtrack-logo-2.png')}}" width="160" class="img-fluid profimg"alt="" >
        <div class="post-preview speech-bubble">
          <a href="post.html">
            <h2 class="post-title">
              Man must explore, and this is exploration at its greatest
            </h2>
            <h3 class="post-subtitle">
              Problems look mighty small from 150 miles up
            </h3>
          </a>
          <p class="post-meta">Posted by
            <a href="#">Start Bootstrap</a>
            on September 24, 2019</p>
        </div>
        </div>
        <hr>
        <div class="row">
        <img src="{{asset('storage/images/gtrack-logo-2.png')}}" width="160" class="img-fluid profimg"alt="" >
        <div class="post-preview speech-bubble">
          <a href="post.html">
            <h2 class="post-title">
              Man must explore, and this is exploration at its greatest
            </h2>
            <h3 class="post-subtitle">
              Problems look mighty small from 150 miles up
            </h3>
          </a>
          <p class="post-meta">Posted by
            <a href="#">Start Bootstrap</a>
            on September 24, 2019</p>
        </div>
        </div>
        <hr>
        <div class="row">
        <img src="{{asset('storage/images/gtrack-logo-2.png')}}" width="160" class="img-fluid profimg"alt="" >
        <div class="post-preview speech-bubble">
          <a href="post.html">
            <h2 class="post-title">
              Man must explore, and this is exploration at its greatest
            </h2>
            <h3 class="post-subtitle">
              Problems look mighty small from 150 miles up
            </h3>
          </a>
          <p class="post-meta">Posted by
            <a href="#">Start Bootstrap</a>
            on September 24, 2019</p>
        </div>
        </div>
        <hr>
    </div>
</div> -->


@endsection