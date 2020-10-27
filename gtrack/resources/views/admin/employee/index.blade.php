@extends('layouts.admin_master')
@section('title')
    GTrack | Employees
@endsection

@section('css')
<link href={{asset('css/admin-tablinks.css')}} rel="stylesheet">
@endsection
@section('content')
<div class="card mb-4 mt-2">
    <div class="card-header">
        <i class="fas fa-plus"></i>
        @if(Auth::user()->user_type=="Admin")
        <a href="/admin/employees/create">Add New Employee</a>
        @endif
    </div>
<div class="tab">
    <button class="tablinks" id="defaultOpen" onclick="openCity(event, 'Drivers')">Drivers</button>
    <button class="tablinks" onclick="openCity(event, 'Admins')">Admins</button>
    <button class="tablinks" onclick="openCity(event, 'Inactive Accounts')">Inactive Accounts</button>
</div>
<div id="Drivers" class="tabcontent">
    <div class="container">
        <div class="table-responsive-sm">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2><b>Drivers</b></h2>
                    </div>

                </div>
            </div>
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Email</th>
                        <th>Contact Number</th>
                        <th>Address</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Date Added</th>
                        <th>Status</th>
                        <th>Actions</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($drivers as $driver)
                    <tr>
                        <td >{{$driver->userdetail->lname}}</td>
                        <td>{{$driver->userdetail->fname}}</td>
                        <td>{{$driver->email}}</td>
                        <td>{{$driver->userdetail->contact_no}}</td>
                        <td>{{$driver->userdetail->address->street.' '.$driver->userdetail->address->barangay.' '.$driver->userdetail->address->town}}</td>
                        <td>{{$driver->userdetail->age}}</td>
                        <td>{{$driver->userdetail->gender}}</td>
                        <td>{{$driver->created_at}}</td>
                        <td>{{$driver->active?'Active':'Inactive'}}</td>
                        @if(Auth::user()->user_type=="Admin")
                        <td> 
                        <a href="/admin/employees/show/{{$driver->user_id}}"> <i class="fas fa-eye" title="View" > </i></a>
                        <a href="#"><i class="fas fa-ban" data-toggle="modal" data-target="#exampleModal"
                        title="Disable"></i></a>
                        </td>
                        @endif

                    </tr>
                    <form action="/admin/employees/disable/{{ $driver->user_id }}" method="POST">
                        <!--First Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Disable Driver Account </h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  Are you really sure to disable this account?
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-danger">Yes</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        
                        <!--Second Modal -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Disable Driver Account </h5>
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
                        
                        </form>
                   @endforeach
                </tbody>
            </table>
</div>
</div>
</div>




<div id="Admins" class="tabcontent">
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2><b>Admins</b></h2>
                    </div>

                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Email</th>
                        <th>Contact Number</th>
                        <th>Address</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Date Added</th>
                        <th>Status</th>
                    

                    </tr>
                </thead>
                <tbody>
                    @foreach($admins as $admin)
                    <tr>
                        <td>{{$admin->userdetail->lname}}</td>
                        <td>{{$admin->userdetail->fname}}</td>
                        <td>{{$admin->email}}</td>
                        <td>{{$admin->userdetail->contact_no}}</td>
                        <td>{{$admin->userdetail->address->street.' '.$admin->userdetail->address->barangay.' '.$admin->userdetail->address->town}}</td>
                        <td>{{$admin->userdetail->age}}</td>
                        <td>{{$admin->userdetail->gender}}</td>
                        <td>{{$admin->created_at}}</td>
                        <td>{{$admin->active?'Active':'Inactive'}}</td>
                        @if(Auth::user()->user_type=="Admin")
                        @endif

                    </tr>
                   @endforeach
                </tbody>
            </table>
</div>
</div>
</div>
<div id="Inactive Accounts" class="tabcontent">
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2><b>Inactive Accounts</b></h2>
                    </div>

                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Email</th>
                        <th>Contact Number</th>
                        <th>Address</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Date Added</th>
                        <th>Status</th>
                        <th>Actions</th>
                    

                    </tr>
                </thead>
                <tbody>
                    @foreach($inactives as $inactive)
                    <tr>
                        <td>{{$inactive->userdetail->lname}}</td>
                        <td>{{$inactive->userdetail->fname}}</td>
                        <td>{{$inactive->email}}</td>
                        <td>{{$inactive->userdetail->contact_no}}</td>
                        <td>{{$inactive->userdetail->address->street.' '.$inactive->userdetail->address->barangay.' '.$inactive->userdetail->address->town}}</td>
                        <td>{{$inactive->userdetail->age}}</td>
                        <td>{{$inactive->userdetail->gender}}</td>
                        <td>{{$inactive->created_at}}</td>
                        <td>{{$inactive->active ?'Active':'Inactive'}}</td>
                        @if(Auth::user()->user_type=="Admin")
                        @endif
                        <td> 
                            <a href="/admin/employees/show/{{$inactive->user_id}}"> <i class="fas fa-eye" title="View" > </i></a>
                            <a href="#"><i class="fas fa-key" data-toggle="modal" data-target="#Modal"
                            title="Reactivate"></i></a>
                            </td>

                    </tr>
                    <form action="/admin/employees/reactivate/{{ $inactive->user_id }}" method="POST">
                        <!--First Modal -->
                        <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Reactivate Driver Account </h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  Are you really sure to reactivate this account?
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button type="button" data-toggle="modal" data-target="#Modale" class="btn btn-danger">Yes</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        <!--Second Modal -->
                        <div class="modal fade" id="Modale" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Reactivate Driver Account </h5>
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

@endsection