@extends('layouts.admin_master')
@section('title')
GTrack | Dumpsters
@endsection
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('Add New Garbage Truck') }}</div>

            <div class="card-body">
                <form method="POST" action="{{ route('admin.dumpster.store')}}">
                    @csrf

                    <div class="form-group col-md-4">
                        <label for="plate_no">Plate Number</label>
                        <input type="text" class="form-control @error('plate_no') is-invalid @enderror" name="plate_no"
                            value="{{ old('plate_no') }}">
                        @error('plate_no')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label for="supplier">Driver</label>
                        <select class="form-control @error('driver_id') is-invalid @enderror" name="driver_id">
                       @forelse($drivers as $driver)
                        <option value="{{ $driver->user_id}}" >{{ $driver->userdetail->fname.' '.$driver->userdetail->lname}}</option>
                        @error('driver_id')
                       
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                        @empty
                          <p>No Drivers yet</p>
                        @endforelse
                    </select>
                     </div>
                     @csrf
                    <button type="submit" class="btn btn-primary ml-3 mt-3">Add New Garbage Truck</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection