@extends('layouts.admin_master')
@section('title')
    GTrack | Dumpsters
@endsection


@section('content')
<div class="card mb-4 mt-2">
    <div class="card-header">
        <i class="fas fa-plus"></i>
        @if(Auth::user()->user_type=="Admin")
        <a href="/admin/dumpster/create">Add New Dumpster</a>
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
                        <td>{{$dumpster->address->street.' '.$dumpster->address->barangay.', '.$dumpster->address->town}}</td>
                        <td>{{$dumpster->address->postal_code}}</td>
                        <td>{{$dumpster->longitude}}</td>
                        <td>{{$dumpster->latitude}}</td>
                        @if(Auth::user()->user_type=="Admin")
                        <td> 
                        <a href="#"><i class="fas fa-ban" data-toggle="modal" data-target="#exampleModal"
                        title="Disable"></i></a>
                        </td>
                        @endif
                        @endforeach
                    </tr>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
                    
@endsection
