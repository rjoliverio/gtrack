@extends('layouts.admin_master')
@section('title')
GTrack | Dumpsters
@endsection


@section('content')
<div class="card mb-4 mt-2">
    <div class="card-header">
        <i class="fas fa-plus"></i>
        @if(Auth::user()->user_type=="Admin")
        <a href="/admin/dumpsters/create">Add New Dumpster</a>
        @endif
    </div>

    <div id="Garbage Trucks" class="tabcontent">
        <div class="container">
            <div class="table-responsive-sm">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2><b>Dumpsters</b></h2>
                        </div>

                    </div>
                </div>
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Address</th>
                            <th>Postal Code</th>
                            <th>Longitude</th>
                            <th>Latitude</th>
                            <th>Actions</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dumpsters as $dumpster)
                        <tr>
                            <td>{{$dumpster->address->street.' '.$dumpster->address->barangay.', '.$dumpster->address->town}}
                            </td>
                            <td>{{$dumpster->address->postal_code}}</td>
                            <td>{{$dumpster->longitude}}</td>
                            <td>{{$dumpster->latitude}}</td>
                            @if(Auth::user()->user_type=="Admin")
                            @endif
                            <td>
                                <a href="#myModal{{ $dumpster->dumpster_id }}" data-toggle="modal"><i class="fas fa-edit"
                                        data-toggle="tooltip" title="Edit"></i></a>
                                <a href="#"><i class="fas fa-trash" data-toggle="modal" data-target="#exampleModal"
                                        title="Delete"></i></a>
                            </td>
                            </td>
                            <div id="myModal{{ $dumpster->dumpster_id }}" class="modal fade">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form
                                            action="/admin/dumpsters/{{$dumpster->dumpster_id}}/{{$dumpster->address_id}}"
                                            method="POST">
                                            @method('PATCH')
                                            {{csrf_field()}}
                                            <div class="modal-header">
                                                <h4 class="modal-title">Edit</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label>Street</label>
                                                        <input type="text"
                                                            class="form-control @error('street') is-invalid @enderror"
                                                            name="street" value="{{ $dumpster->address->street }}"
                                                            autocomplete="street" autofocus placeholder="Street">
                                                        @error('street')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Barangay</label>
                                                        <input type="text"
                                                            class="form-control @error('barangay') is-invalid @enderror"
                                                            name="barangay" value="{{ $dumpster->address->barangay }}"
                                                            autocomplete="barangay" autofocus placeholder="Barangay">
                                                        @error('barangay')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Town</label>
                                                        <input type="text"
                                                            class="form-control @error('town') is-invalid @enderror"
                                                            name="town" value="{{ $dumpster->address->town }}"
                                                            autocomplete="town" autofocus placeholder="Town">
                                                        @error('town')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Postal Code</label>
                                                        <input type="text"
                                                            class="form-control @error('postal_code') is-invalid @enderror"
                                                            name="postal_code"
                                                            value="{{ $dumpster->address->postal_code }}"
                                                            autocomplete="postal_code" autofocus
                                                            placeholder="Postal Code">
                                                        @error('postal_code')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Latitude</label>
                                                        <input type="text"
                                                            class="form-control @error('latitude') is-invalid @enderror"
                                                            name="latitude" value="{{ $dumpster->latitude }}"
                                                            autocomplete="latitude" autofocus placeholder="Latitude">
                                                        @error('latitude')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Longitude</label>
                                                        <input type="text"
                                                            class="form-control @error('longitude') is-invalid @enderror"
                                                            name="longitude" value="{{ $dumpster->longitude }}"
                                                            autocomplete="longitude" autofocus placeholder="Longitude">
                                                        @error('longitude')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <input type="button" class="btn btn-default" data-dismiss="modal"
                                                        value="Cancel">
                                                    <input type="submit" name="saveNew" class="btn btn-info"
                                                        value="Save">
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
           
            @foreach($dumpsters as $dumpster)
            <form action="/admin/dumpsters/{{ $dumpster->dumpster_id }}" method="POST">
                @method('DELETE')
                @csrf
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete this Dumpster</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <div class="form-group row">
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Confirmm Using Your Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="new-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Confirm</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            @endforeach
        </div>
    </div>
</div>
</div>

@endsection