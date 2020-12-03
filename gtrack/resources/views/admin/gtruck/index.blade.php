@extends('layouts.admin_master')
@section('title')
    GTrack | Trucks
@endsection

@section('css')
<link href={{asset('css/admin-tablinks.css')}} rel="stylesheet">
@endsection
@section('content')
<div class="card mb-4 mt-2">
    <div class="card-header">
        <i class="fas fa-plus"></i>
        @if(Auth::user()->user_type=="Admin")
        <a href="/admin/gtrucks/create">Add New Garbage Truck</a>
        @endif
    </div>
<div class="tab">
    <button class="tablinks" id="defaultOpen" onclick="openCity(event, 'Garbage Trucks')">Garbage Trucks</button>
    <button class="tablinks" onclick="openCity(event, 'Under Maintenance Trucks')">Under Maintenance Trucks</button>
</div>
<div id="Garbage Trucks" class="tabcontent">
    <div class="container">
        <div class="table-responsive-sm">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2><b>Trucks</b></h2>
                    </div>

                </div>
            </div>
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Plate Number</th>
                        <th>Date Added</th>
                        <th>Status</th>
                        <th>Actions</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($trucks as $truck)
                    <tr>
                        <td >{{$truck->plate_no}}</td>
                        <td>{{$truck->created_at}}</td>
                        <td>{{$truck->active?'Active':'Under Maintenance'}}</td>
                        @if(Auth::user()->user_type=="Admin")
                        <td> 
                        <a href="#"><i class="fas fa-ban" data-toggle="modal" data-target="#exampleModal{{$truck->truck_id}}"
                        title="Disable"></i></a>
                        </td>
                        @endif

                    </tr>
                    @endforeach
                </tbody>
            </table>
            @foreach($trucks as $truck)
                    <form action="/admin/gtrucks/maintenance/{{ $truck->truck_id }}" method="POST">
            
                        <div class="modal fade" id="exampleModal{{$truck->truck_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Disable Truck Operation </h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  
                                  <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Confirmm Using Your Password') }}</label>
                        
                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        
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
                                  @csrf
                                  <button type="submit" class="btn btn-danger">Confirm</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        </form>
                        @endforeach
</div>
</div>
</div>
<div id="Under Maintenance Trucks" class="tabcontent">
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2><b>Under Maintenance Trucks</b></h2>
                    </div>

                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                      <th>Plate Number</th>
                      <th>Date Added</th>
                      <th>Status</th>
                      <th>Actions</th>

                    

                    </tr>
                </thead>
                <tbody>
                    @foreach($inactives as $inactive)
                    <tr>
                      <td >{{$inactive->plate_no}}</td>
                      <td>{{$inactive->created_at}}</td>
                      <td>{{$inactive->active?'Active':'Under Maintenance'}}</td>
                        @if(Auth::user()->user_type=="Admin")
                        @endif
                        <td> 
                            <a href="#"><i class="fas fa-wrench" data-toggle="modal" data-target="#Modal{{ $inactive->truck_id }}"
                            title="Repair"></i></a>
                            </td>

                    </tr>
                    <form action="/admin/gtrucks/repair/{{ $inactive->truck_id }}" method="POST">
      
                        <div class="modal fade" id="Modal{{ $inactive->truck_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Repair Truck </h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  
                                  <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Confirmm Using Your Password') }}</label>
                        
                                    <div class="col-md-6">
                                        <input id="rpassword" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        
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
                                  @csrf
                                  <button type="submit" class="btn btn-danger">Confirm</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        
                        </form>
                   @endforeach
                </tbody>
            </table>
</div>
</div>
</div> 

@endsection
@section('scripts')
<script>
    document.getElementById("defaultOpen").click();
        function openCity(evt, cityName) {
          
            var i, tabcontent, tablinks;

            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }

            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }

            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        } 



 </script>
@endsection
