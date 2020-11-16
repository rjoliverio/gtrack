@extends('layouts.admin_master')
@section('title')
    GTrack | Assignment
@endsection

@section('css')
<link href={{asset('css/reports-show.css')}} rel="stylesheet">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
<link href={{asset('css/admin-tablinks.css')}} rel="stylesheet">
@endsection
@section('content')
<a href="#createAssignment" class="btn btn-success newcont" data-toggle="modal"><i class=" fas fa-plus-circle"></i>
    Add New Truck Assignments
</a>
<div class="card mb-4 mt-2">
<div class="tab">
    <a href="/admin/schedules"><button> Schedules </button></a>
    <a href="/admin/schedules/assignments"><button class="tablinks"> Truck Assignments </button></a>
</div>

{{-- ============= TRUCK ASSIGNMENTS TAB =============== --}}
<div class="container">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2><b>Truck Assignments</b></h2>
                </div>
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>Schedule id</th>
                    <th>Truck</th>
                    <th>Driver</th>
                    <th>Route</th>
                    <th>Date Created</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($assignment as $assignment)
                    <tr>
                        <td class="text-center">{{$assignment->assignment_id}}</td>
                        <td class="text-center">{{$assignment->schedule_id}}</td>
                        <td class="text-center">{{$assignment->truck->plate_no}}</td>
                        <td class="text-center">{{$assignment->truck->user->userdetail->lname.', '.$assignment->truck->user->userdetail->fname}}</td>
                        <td>{{$assignment->route}}</td>
                        <td>{{$assignment->created_at}}</td>
                        <td>{{$assignment->active?'Active':'Inactive'}}</td>
                        @if(Auth::user()->user_type == "Admin")
                            <td>
                                <a href="#show{{$assignment->assignment_id}}" data-toggle="modal"> <i class="fas fa-eye pr-3" title="View"></i></a>
                                <a href="#edit{{$assignment->assignment_id}}" data-toggle="modal"> <i class="fas fa-pencil-alt pr-3" title="Edit"></i></a>
                                <a href="#delete{{$assignment->assignment_id}}" data-toggle="modal"> <i class="fas fa-ban" title="Delete"></i></a>
                            </td>
                        @endif
                    </tr>
{{-- ============= DELETE TRUCK ASSIGNMENTS MODAL =============== --}}
<div class="modal fade" id="delete{{$assignment->assignment_id}}" tabindex="-1" role="dialog" aria-labelledby="assignmentdestroyer" aria-hidden="true">
    {{-- <form action="admin/schedules/assignments/destroy/{{$assignment->id}}" method="DELETE"> --}}
    {{Form::open(array('url' => ['/admin/schedules/assignments/destroy', $assignment->assignment_id], 'method' => 'DELETE')) }}
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteSchedulelabel">Alert </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="p-3">Are you sure you want to delete Assignment?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                @csrf
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                {{-- <button type="submit" class="btn btn-danger">Confirm</button> --}}
            </div>
        </div>
    </div>
    {{Form::close()}}
    {{-- </form> --}}
</div>
{{-- ============= EDIT TRUCK ASSIGNMENT DETAILS MODAL =============== --}}
<div id="edit{{$assignment->assignment_id}}" class="modal fade mt-6">
    <div class="modal-dialog">
        <div class="modal-content">
            {{ Form::open(array('url' => '/admin/schedules/assignments/',$assignment->schedule->schedule_id, 'method' => 'POST')) }}
            <div class="modal-header">
                <h4 class="modal-title">Edit Assignment</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="schedule_id" class="col-md-4 col-form-label text-md-right">{{ __('Schedule Id') }}</label>
                    <div class="col-md-6">
                        <select id="schedule_id" class="custom-select form-control @error('schedule+id') is-invalid @enderror" name="schedule_id" required autocomplete="schedule_id" autofocus>
                            <option selected disabled>{{$assignment->schedule->schedule_id}}</option>
                            @foreach($schedules as $id){
                                <option value={{$id->schedule_id}} : {{$id->schedule_id}}>{{$id->schedule}}</option>
                            }
                            @endforeach
                        </select>
                        @error('schedule_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="truck_id" class="col-md-4 col-form-label text-md-right">{{ __('Truck Id') }}</label>
                    <div class="col-md-6">
                        <select id="truck_id" class="custom-select form-control @error('truck+id') is-invalid @enderror" name="truck_id" required autocomplete="truck_id" autofocus>
                            <option selected disabled>{{$assignment->truck->plate_no}}</option>
                            @foreach($trucks as $id){
                            <option value={{$id->truck_id}}>{{$id->truck_id}} : {{$id->plate_no}}</option>
                            }
                            @endforeach
                        </select>
                        @error('truck_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="route" class="col-md-4 col-form-label text-md-right">{{ __('Route') }}</label>
                    <div class="col-md-6">
                        <textarea id="route" rows="4" class="form-control @error('route') is-invalid @enderror" name="route" value="{{ old('route') }}" required autocomplete="route" autofocus placeholder="{{$assignment->route}}"></textarea>
                        @error('route')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                {{Form::submit('Create', ['class' => 'btn btn-primary'])}}
                {{-- <input type="submit" name="Create" class="btn btn-success" value="Create"> --}}
            </div>
            {{Form::close()}}
        </div>
    </div>
</div>
{{-- ============= SHOW TRUCK ASSIGNMENT DETAILS MODAL =============== --}}
<div id="show{{$assignment->assignment_id}}" class="modal fade">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Assignment Details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-5">
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
                    <div class="col-md-7">
                        <form>
                            <div class="card z-depth-3">
                            <div class="card-header">
                                <h5>Collection Details</h5>
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- ============= END OF SHOW, EDIT, AND DELETE MODALS =============== --}}
                @endforeach
            </tbody>
        </table>
    </div>
</div>
{{-- ============= CREATE TRUCK ASSIGNMENT MODAL =============== --}}
<div id="createAssignment" class="modal fade mt-5">
    <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Create Truck Assignment</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    {{ Form::open(array('url' => '/admin/schedules/assignments/store' , 'method' => 'POST')) }}
                        <div class="form-group row">
                            {{-- {{Form::label('schedule_id', 'Schedule Id', ['class' => 'col-md-4 col-form-label text-md-right', 'placeholder' => 'Title' ])}}
                            <div class="col-md-6">
                                {{Form::select('schedule_id', $schedules->schedule_id, ['class' => 'custom-select form-control', 'placeholder' => 'Title' ])}}
                            </div> --}}
                            <label for="schedule_id" class="col-md-4 col-form-label text-md-right">{{ __('Schedule Id') }}</label>
                            <div class="col-md-6">
                                <select id="schedule_id" class="custom-select form-control @error('schedule+id') is-invalid @enderror" name="schedule_id" required autocomplete="schedule_id" autofocus>
                                    <option selected disabled hidden>-Select Schedule Id-</option>
                                    @foreach($schedules as $id){
                                        <option value={{$id->schedule_id}} : {{$id->schedule_id}}>{{$id->schedule}}</option>
                                    }
                                    @endforeach
                                </select>
                                @error('schedule_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="truck_id" class="col-md-4 col-form-label text-md-right">{{ __('Truck Id') }}</label>
                            <div class="col-md-6">
                                <select id="truck_id" class="custom-select form-control @error('truck+id') is-invalid @enderror" name="truck_id" required autocomplete="truck_id" autofocus>
                                    <option selected disabled hidden>-Select Truck Id-</option>
                                    @foreach($trucks as $id){
                                    <option value={{$id->truck_id}}>{{$id->truck_id}} : {{$id->plate_no}}</option>
                                    }
                                    @endforeach
                                </select>
                                @error('truck_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="route" class="col-md-4 col-form-label text-md-right">{{ __('Route') }}</label>
                            <div class="col-md-6">
                                <textarea id="route" rows="4" class="form-control @error('route') is-invalid @enderror" name="route" value="{{ old('route') }}" required autocomplete="route" autofocus></textarea>
                                @error('route')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                            @csrf
                            {{Form::submit('Create', ['class' => 'btn btn-primary'])}}
                            {{-- <input type="submit" name="Create" class="btn btn-success" value="Create"> --}}
                        </div>
                    {{Form::close()}}
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
