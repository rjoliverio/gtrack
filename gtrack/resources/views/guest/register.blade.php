@extends('layouts.guest_master')
@section('title')
    GTrack | Register
@endsection

@section('css')
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<link href={{asset('css/sb-admin-2.css')}} rel="stylesheet">
@endsection
@section('content')
<div class="container "><br><br>
    <div class="card o-hidden border-0 shadow-lg ">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
              <form class="user" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user @error('fname') is-invalid @enderror" name="fname" value="{{ old('fname') }}" required autocomplete="fname" autofocus placeholder="First Name">
                    @error('fname')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-user @error('lname') is-invalid @enderror" name="lname" value="{{ old('lname') }}" required autocomplete="lname" autofocus placeholder="Last Name">
                        @error('lname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Address">
                  @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input type="text" class="form-control form-control-user @error('street') is-invalid @enderror" name="street" value="{{ old('street') }}" required autocomplete="street" autofocus placeholder="Street">
                    </div>
                    <div class="col-sm-6">
                      <input type="text" class="form-control form-control-user @error('barangay') is-invalid @enderror" name="barangay" value="{{ old('barangay') }}" required autocomplete="barangay" autofocus placeholder="Barangay">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input type="text" class="form-control form-control-user @error('town') is-invalid @enderror" name="town" value="{{ old('town') }}" required autocomplete="town" autofocus placeholder="Town">
                    </div>
                    <div class="col-sm-6">
                      <input type="number" class="form-control form-control-user @error('postalcode') is-invalid @enderror" name="postalcode" value="{{ old('postalcode') }}" required autocomplete="postalcode" autofocus placeholder="Postal Code">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="number" class="form-control form-control-user @error('contactno') is-invalid @enderror" name="contactno" value="{{ old('contactno') }}" required autocomplete="contactno" autofocus placeholder="Contact Number">
                    </div>
                    <div class="col-sm-6">
                      <input type="number" class="form-control form-control-user @error('age') is-invalid @enderror" name="age" value="{{ old('age') }}" required autocomplete="age" autofocus placeholder="Age">
                    </div>
                </div>
                <div class="form-group">
                    <select class="form-control  @error('gender') is-invalid @enderror" name="gender" value="{{ old('gender') }}" required autocomplete="gender" autofocus>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror  
                </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="password-confirm" name="password_confirmation" required autocomplete="new-password" placeholder="Repeat Password">
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Register Account
                </button>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="/forgot-pass">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="/login">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
@endsection