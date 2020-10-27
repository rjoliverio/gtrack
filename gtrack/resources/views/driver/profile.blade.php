@extends('layouts.driver_master')

@section('title')
    GTrack | Profile
@endsection

@section('css')
    <link href={{asset('css/profile-page.css')}} rel="stylesheet">
@endsection

@section('content')
<div class="container light-style flex-grow-1 container-p-y">

    <h4 class="font-weight-bold py-2 mb-2">
      Account Settings
    </h4>

    <div class="card overflow-hidden">
      <div class="row no-gutters row-bordered row-border-light">
        <div class="col-md-3 pt-0">
          <div class="list-group list-group-flush account-settings-links">
            <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account-general">General</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-change-password">Change password</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-address">Address</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-info">Info</a>
          </div>
        </div>
        <div class="col-md-9">
          <div class="tab-content">
            <div class="tab-pane fade active show" id="account-general">
        {{-- form --}}
        <form action="/driver/profile/update/{{$user->user_id}}" method="post" enctype="multipart/form-data">
            @csrf
              <div class="card-body media align-items-center">
                <img src={{asset('/storage/images/uploads/'.$user->userdetail->image)}} alt="" class="d-block ui-w-80">
                <div class="media-body ml-4">
                  <label class="btn btn-outline-primary">
                    <input type="file" name="image" class="@error('image') is-invalid @enderror @error('image.*') is-invalid @enderror" value="{{ old('image') }}" autocomplete="image" autofocus>
                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror 
                    @error('image.*')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror 
                </label> &nbsp;

                  <div class="text-light small mt-1">Allowed JPG, GIF or PNG.</div>
                </div>
              </div>
              <hr class="border-light m-0">

              <div class="card-body">
                <div class="form-group">
                  <label class="form-label">Name</label>
                <input type="text" class="form-control" value="{{$user->userdetail->fname}} {{$user->userdetail->lname}}" readonly>
                </div>
                <div class="form-group">
                  <label class="form-label">E-mail</label>
                  <input type="text" class="form-control mb-1" value="{{$user->email}}" readonly>
                  {{-- <div class="alert alert-warning mt-3">
                    Your email is not confirmed. Please check your inbox.<br>
                    <a href="javascript:void(0)">Resend confirmation</a>
                  </div> --}}
                </div>
                <div class="form-group">
                  <label class="form-label">User Type</label>
                  <input type="text" class="form-control" value="{{$user->user_type}}" readonly>
                </div>
              </div>

            </div>
            <div class="tab-pane fade" id="account-change-password">
              <div class="card-body pb-2">

                <div class="form-group">
                  <label class="form-label">New password</label>
                  <input type="password" name="password" class="form-control @error('image') is-invalid @enderror" value="{{ old('password') }}" autocomplete="password" autofocus>
                  @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                    @enderror 
                </div>

                <div class="form-group">
                  <label class="form-label">Repeat new password</label>
                  <input type="password" class="form-control" id="password-confirm" name="password_confirmation" autocomplete="new-password">
                </div>

              </div>
            </div>
            <div class="tab-pane fade" id="account-address">
                <div class="card-body pb-2">
                  <div class="form-group">
                    <label class="form-label">Street</label>
                    <input type="text" value="{{$user->userdetail->address->street}}" name="street" class="form-control @error('street') is-invalid @enderror" value="{{ old('street') }}" required autocomplete="street" autofocus>
                    @error('street')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror   
                </div>
                  <div class="form-group">
                      <label class="form-label">Barangay</label>
                      <input type="text" value="{{$user->userdetail->address->barangay}}" name="barangay" class="form-control @error('barangay') is-invalid @enderror" value="{{ old('barangay') }}" required autocomplete="barangay" autofocus>
                      @error('barangay')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror 
                    </div>
                  <div class="form-group">
                      <label class="form-label">Town</label>
                      <input type="text" value="{{$user->userdetail->address->town}}" name="town" class="form-control @error('town') is-invalid @enderror" value="{{ old('town') }}" required autocomplete="town" autofocus>
                      @error('town')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror 
                    </div>
                  <div class="form-group">
                    <label class="form-label">Postal Code</label>
                    <input type="number" value="{{$user->userdetail->address->postal_code}}" name="postal_code" class="form-control @error('postal_code') is-invalid @enderror" value="{{ old('postal_code') }}" required autocomplete="postal_code" autofocus>
                    @error('postal_code')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror   
                </div>
                </div>
              </div>
            <div class="tab-pane fade" id="account-info">
              <div class="card-body pb-2">
                <div class="form-group">
                  <label class="form-label">First Name</label>
                  <input type="text" value="{{$user->userdetail->fname}}" name="fname" class="form-control @error('fname') is-invalid @enderror" value="{{ old('fname') }}" required autocomplete="fname" autofocus>
                  @error('fname')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror 
                </div>
                <div class="form-group">
                    <label class="form-label">Last Name</label>
                    <input type="text" value="{{$user->userdetail->lname}}" name="lname" class="form-control @error('lname') is-invalid @enderror" value="{{ old('lname') }}" required autocomplete="lname" autofocus>
                    @error('lname')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror 
                </div>
                <div class="form-group">
                    <label class="form-label">Age</label>
                    <input type="number" value="{{$user->userdetail->age}}" name="age" class="form-control @error('age') is-invalid @enderror" value="{{ old('age') }}" required autocomplete="age" autofocus>
                    @error('age')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror 
                </div>
                <div class="form-group">
                  <label class="form-label">Gender</label>
                  <select class="custom-select" name="gender" class="@error('image') is-invalid @enderror" value="{{ old('gender') }}" required autocomplete="gender" autofocus>
                    <option {{ $user->userdetail->gender=="Male"?"selected": ""}}>Male</option>
                    <option {{ $user->userdetail->gender=="Female"?"selected": ""}}>Female</option>
                  </select>
                  @error('gender')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror 
                </div>


              </div>
              <div class="card-body pb-2">
                <div class="form-group">
                  <label class="form-label">Phone</label>
                  <input type="text" value="{{$user->userdetail->contact_no}}" name="contact_no" class="form-control @error('contact_no') is-invalid @enderror" value="{{ old('contact_no') }}" required autocomplete="contact_no" autofocus>
                  @error('contact_no')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror 
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="text-right mt-3">
      <button type="submit" class="btn btn-primary">Save changes</button>&nbsp;
    </div>
</form>
  </div>
@endsection

@section('scripts')

@endsection