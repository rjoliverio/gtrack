@extends('layouts.admin_master')

@section('title')
    GTrack | Assignment
@endsection

@section('css')
    <link href={{asset('css/reports-show.css')}} rel="stylesheet">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
@endsection

@section('content')
<div class="container mb-3">
  <a href="/admin/schedules/assignments" type="button" class="btn btn-success mb-2"><i class="fas fa-undo"></i> Back</a>
  <div class="row">
    <div class="col-lg-4">
      <div class="profile-card-4 z-depth-3">
        <div class="card">
          <div class="card-body text-center bg-primary rounded-top">
            <div class="user-box">
              <img src={{asset('storage/images/img/'.$assignment->truck->user->userdetail->image)}} alt="user avatar">
            </div>
            <h5 class="mb-1 text-white ">{{$assignment->truck->user->userdetail->fname}} {{$assignment->truck->user->userdetail->lname}}</h5>
            <h6 class="text-light small">{{$assignment->truck->user->userdetail->user->user_type}}</h6>
          </div>
          <div class="card-body">
            <ul class="list-group shadow-none">
              <li class="list-group-item">
                <div class="list-icon">
                  <i class="fas fa-truck-moving"></i>
                </div>
                <div class="list-details">
                  <span>{{$assignment->truck->plate_no}}</span>
                  <small>Truck Plate No.</small>
                </div>
              </li>
              <li class="list-group-item">
                <div class="list-icon">
                  <i class="fa fa-phone-square"></i>
                </div>
                <div class="list-details">
                  <span>{{$assignment->truck->user->userdetail->contact_no}}</span>
                  <small>Mobile Number</small>
                </div>
              </li>
              <li class="list-group-item">
                <div class="list-icon">
                  <i class="fa fa-envelope"></i>
                </div>
                <div class="list-details">
                  <span>{{$assignment->truck->user->email}}</span>
                  <small>Email Address</small>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>    
    <div class="col-lg-8">
      <form>
        <div class="card z-depth-3">
          <div class="card-header">
              <h5>Assignment Details</h5>
          </div>
          <div class="card-body">
            <div class="tab-content pt-3 pr-3 pl-3">
                <div class="form-group row">
                  <label for="staticSchedule" class="col-sm-4 col-form-label"><i class="fas fa-calendar-alt"></i> Schedule:</label>
                    <div class="col-sm-7">
                      <input type="text" readonly class="form-control" id="staticSchedule" value="{{$assignment->schedule->schedule}}">
                      </div>
                </div>
                <div class="form-group row">
                  <label for="staticgarbagetype" class="col-sm-4 col-form-label"><i class="fas fa-recycle"></i> Garbage Type:</label>
                    <div class="col-sm-7">
                      <input type="text" readonly class="form-control" id="staticgarbagetype" value="{{$assignment->schedule->garbage_type}}">
                      </div>
                </div>
                <div class="form-group row">
                  <label for="staticRoute" class="col-sm-4 col-form-label"><i class="fas fa-map-marked-alt"></i> Route:</label>
                  <div class="col-sm-7">
                    <input type="text" readonly class="form-control" id="staticRoute" value="{{$assignment->route}}">
                  </div>
                </div>
              </div>   
          </div>
        </div>
        <div class="card z-depth-3">
          <div class="card-header">
            <h5>Admin Details</h5>
          </div>
          <div class="card-body">
            <div class="form-group row">
              <label for="staticDriver" class="col-sm-4 col-form-label"> <i class="fas fa-user-tie"></i> Admin:</label>
              <div class="col-sm-7">
                <input type="text" readonly class="form-control" id="staticDriver" value="{{$assignment->schedule->user->userdetail->fname}} {{$assignment->schedule->user->userdetail->lname}}">
              </div>
            </div>
            <div class="form-group row">
              <label for="staticEmail" class="col-sm-4 col-form-label"><i class="fas fa-envelope"></i> Admin's Email:</label>
              <div class="col-sm-7">
                <input type="text" readonly class="form-control" id="staticEmail" value="{{$assignment->schedule->user->email}}">
              </div>
            </div>
            <div class="form-group row">
              <label for="staticContact" class="col-sm-4 col-form-label"><i class="fas fa-phone-square"></i> Admin's Contact:</label>
              <div class="col-sm-7">
                <input type="text" readonly class="form-control" id="staticContact" value="{{$assignment->schedule->user->userdetail->contact_no}}">
              </div>
            </div>
            <div class="form-group row">
              <label for="staticStatus" class="col-sm-4 col-form-label"><i class="fas fa-spinner"></i> Active:</label>
              <div class="col-sm-7">
                <input type="text" readonly class="form-control" id="staticStatus" value="{{$assignment->active?'Active':'Inactive'}}">
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
@section('scripts')
    <script src={{asset('js/gallery-view.js')}}></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
@endsection