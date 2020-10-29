@extends('layouts.admin_master')

@section('title')
    GTrack | Reports
@endsection

@section('css')
    <link href={{asset('css/reports-show.css')}} rel="stylesheet">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
@endsection

@section('content')
<div class="container mb-3">
    <a href="/admin/reports" type="button" class="btn btn-success mb-2"><i class="fas fa-undo"></i> Back</a>
    <div class="row">
            <div class="col-lg-4">
               <div class="profile-card-4 z-depth-3">
                <div class="card">
                  <div class="card-body text-center bg-primary rounded-top">
                   <div class="user-box">
                    <img src={{asset('storage/images/uploads/'.$report->userdetail->image)}} alt="user avatar">
                  </div>
                  <h5 class="mb-1 text-white ">{{$report->userdetail->fname}} {{$report->userdetail->lname}}</h5>
                  <h6 class="text-light small">{{$report->userdetail->user->user_type}}</h6>
                 </div>
                  <div class="card-body">
                    <ul class="list-group shadow-none">
                    <li class="list-group-item">
                      <div class="list-icon">
                        <i class="fa fa-phone-square"></i>
                      </div>
                      <div class="list-details">
                        <span>{{$report->userdetail->contact_no}}</span>
                        <small>Mobile Number</small>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <div class="list-icon">
                        <i class="fa fa-envelope"></i>
                      </div>
                      <div class="list-details">
                        <span>{{$report->userdetail->user->email}}</span>
                        <small>Email Address</small>
                      </div>
                    </li>
                    </ul>
                   </div>
                 </div>
               </div>
            </div>
            <div class="col-lg-8">
               <div class="card z-depth-3">
                <div class="card-body">
                <div class="tab-content p-3">
                    <h6 class="alert alert-danger text-center">{{$report->subject}} | {{$report->degree}}</h6>
                    <div class="row mb-1">
                        <span class="small text-success text-left col-lg-6 col-md-6 col-sm-6">Coordinates:{{$report->longitude}}, {{$report->latitude}}</span>
                        <span class="small text-success text-right col-lg-6 col-md-6 col-sm-6">{{\Carbon\Carbon::parse($report->created_at)->format('g:i A')}} {{\Carbon\Carbon::parse($report->created_at)->format('d F Y')}}</span>
                    </div>
                    
                    <div class="">
                        <span>&emsp; {{$report->message}}</span>
                    </div><hr>
                    <span class="small">Photo attachments:</span>
                    <div class="text-center">
                      @if($report->image->image_1!=null)
                        <a class="fancybox text-decoration-none" rel="ligthbox" href={{asset('storage/images/uploads/'.$report->image->image_1)}}>
                          <img class="img-responsive" width="100" src={{asset('storage/images/uploads/'.$report->image->image_1)}}  />
                      </a>
                      @endif
                      @if($report->image->image_2!=null)
                        <a class="fancybox text-decoration-none" rel="ligthbox" href={{asset('storage/images/uploads/'.$report->image->image_2)}}>
                          <img class="img-responsive" width="100" src={{asset('storage/images/uploads/'.$report->image->image_2)}}  />
                      </a>
                      @endif
                      @if($report->image->image_3!=null)
                        <a class="fancybox text-decoration-none" rel="ligthbox" href={{asset('storage/images/uploads/'.$report->image->image_3)}}>
                          <img class="img-responsive" width="100" src={{asset('storage/images/uploads/'.$report->image->image_3)}}  />
                      </a>
                      @endif
                      @if($report->image->image_4!=null)
                        <a class="fancybox text-decoration-none" rel="ligthbox" href={{asset('storage/images/uploads/'.$report->image->image_4)}}>
                          <img class="img-responsive" width="100" src={{asset('storage/images/uploads/'.$report->image->image_4)}}  />
                      </a>
                      @endif
                    </div><hr>
                    @if($report->status==0)
                    <form id="logout-form" action="/admin/reports/resolve/{{$report->report_id}}" method="POST">
                      @csrf
                      <button type="submit" class="btn btn-block small btn-success ">Resolve</button>
                    </form>
                    @else 
                    <form id="logout-form" action="/admin/reports/remove/{{$report->report_id}}" method="POST">
                      @csrf
                      <button type="submit" class="btn btn-block small btn-danger ">Remove</button>
                    </form>
                    @endif
                </div>
            </div>
          </div>
          </div>
            
        </div>
    </div>
@endsection
@section('scripts')
    <script src={{asset('js/gallery-view.js')}}></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
@endsection