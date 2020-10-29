@extends('layouts.driver_master')

@section('title')
    GTrack | Reports
@endsection

@section('css')

@endsection

@section('content')
<div class="container light-style flex-grow-1 container-p-y mb-3 ">
    <form action="/driver/reports/send" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-header bg-danger text-white">
              Report Details
            </div>
            <div class="card-body">
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Subject</label>
                        <div class="col-sm-10">
                        <input type="text" name="subject" class="form-control @error('subject') is-invalid @enderror" value="{{ old('subject') }}" autocomplete="subject" autofocus placeholder="Enter subject" required>
                            @error('subject')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror 
                        </div>
                    </div><hr>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Message</label>
                        <div class="col-sm-10">
                          <textarea type="text" style="height:150px;" name="message" class="form-control @error('message') is-invalid @enderror" value="{{ old('message') }}" autocomplete="message" autofocus  required placeholder="Enter message here..."></textarea>
                          @error('message')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror 
                        </div>
                    </div><hr>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Degree</label>
                        <div class="col-sm-10 text-center">
                            <input id="slider11" name="degree" class="border-0 @error('degree') is-invalid @enderror" value="{{ old('degree') }}" autocomplete="degree" autofocus style="width:80%" type="range" min="0" max="10" required/>
                            <span class="font-weight-bold text-primary  valueSpan"></span>
                            @error('degree')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror 
                        </div>
                    </div><hr>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Location</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="text" name="longitude" class="form-control @error('longitude') is-invalid @enderror" value="{{ old('longitude') }}" autocomplete="longitude" autofocus id="longitude" value="" readonly>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" name="latitude" class="form-control @error('latitude') is-invalid @enderror" value="{{ old('latitude') }}" autocomplete="latitude" autofocus id="latitude" value="" readonly>
                                </div>
                            </div>
                        </div>
                    </div><hr>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Attachments</label>
                        <div class="col-sm-10">
                            <input type="file" name="images[]" class=" @error('images') is-invalid @enderror @error('images.*') is-invalid @enderror" value="{{ old('images[]') }}" autocomplete="images[]" autofocus multiple required>
                            @error('images')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror 
                            @error('images.*')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror 
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary pl-4 pr-4">Send</button>
                    </div>
                </div>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script src={{asset('js/range-input.js')}}></script>
<script>
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(success);
    }
    function success(position) {
        $('#longitude').val(position.coords.longitude);
        $('#latitude').val(position.coords.latitude);
    }
</script>
@endsection