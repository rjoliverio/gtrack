@extends('layouts.admin_master')

@section('title')
    GTrack | Employees
@endsection

@section('css')
    <link href={{asset('css/reports-show.css')}} rel="stylesheet">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
@endsection

@section('content')
<div class="container mb-3">
    <a href="/admin/employees" type="button" class="btn btn-success mb-2"><i class="fas fa-undo"></i> Back</a>
    <div class="row">
            <div class="col-lg-4">
               <div class="profile-card-4 z-depth-3">
                <div class="card">
                  <div class="card-body text-center bg-primary rounded-top">
                   <div class="user-box">
                    <img src={{asset('storage/images/img/'.$account->userdetail->image)}} alt="user avatar">
                  </div>
                  <h5 class="mb-1 text-white ">{{$account->userdetail->fname}} {{$account->userdetail->lname}}</h5>
                  <h6 class="text-light small">{{$account->userdetail->user->user_type}}</h6>
                 </div>
                  <div class="card-body">
                    <ul class="list-group shadow-none">
                    <li class="list-group-item">
                      <div class="list-icon">
                        <i class="fa fa-phone-square"></i>
                      </div>
                      <div class="list-details">
                        <span>{{$account->userdetail->contact_no}}</span>
                        <small>Mobile Number</small>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <div class="list-icon">
                        <i class="fa fa-envelope"></i>
                      </div>
                      <div class="list-details">
                        <span>{{$account->userdetail->user->email}}</span>
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
                    <form>
                        <div class="form-group row">
                          <label for="staticAge" class="col-sm-2 col-form-label"> <i class="fas fa-birthday-cake"></i> Age:</label>
                          <div class="col-sm-10">
                          <input type="text" readonly class="form-control" id="staticAge" value="{{$account->userdetail->age}}">
                          </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticGender" class="col-sm-2 col-form-label"><i class="fas fa-venus-mars"></i> Gender:</label>
                            <div class="col-sm-10">
                            <input type="text" readonly class="form-control" id="staticGender" value="{{$account->userdetail->gender}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticAddress" class="col-sm-2 col-form-label"><i class="fas fa-road"></i> Street:</label>
                            <div class="col-sm-10">
                            <input type="text" readonly class="form-control" id="staticAddress" value="{{$account->userdetail->address->street}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticAddress" class="col-sm-2 col-form-label"><i class="fas fa-archway"></i> Brgy:</label>
                            <div class="col-sm-10">
                            <input type="text" readonly class="form-control" id="staticAddress" value="{{$account->userdetail->address->barangay}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticAddress" class="col-sm-2 col-form-label"><i class="fas fa-city"></i> Town:</label>
                            <div class="col-sm-10">
                            <input type="text" readonly class="form-control" id="staticAddress" value="{{$account->userdetail->address->town}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticGender" class="col-sm-2 col-form-label"><i class="fas fa-lightbulb"></i> Status:</label>
                            <div class="col-sm-10">
                            <input type="text" readonly class="form-control" id="staticGender" value="{{$account->active?'Active':'Inactive'}}">
                            </div>
                        </div>




                      </form>
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