@extends('layouts.driver_master')
@section('title')
    GTrack | Schedules
@endsection

@section('css')
<link href={{asset('css/reports-show.css')}} rel="stylesheet">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
<link href={{asset('css/admin-tablinks.css')}} rel="stylesheet">
@endsection

@section('content')
<div class="card mb-4 mt-2">
<div class="tab">
    <button class="tablinks" id="defaultOpen" onclick="openCity(event, 'Schedules')">Schedules</button>
    <button class="tablinks" onclick="openCity(event, 'Assignments')">Truck Assignments</button>
</div>

{{-- ================= SCHEDULES TAB =================== --}}
<div id="Schedules" class="tabcontent">
    <div class="container">
        <div class="table-responsive-sm">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2><b>Schedules</b></h2>
                    </div>
                </div>
            </div>
            <table class="table table-striped fixed">
                <thead class="thead-dark">
                    <tr>
                        <th>Id</th>
                        <th>Schedule</th>
                        <th width="5px">Biodegradable</th>
                        <th width="5px">Nonbiodegradable</th>
                        <th>Admin id</th>
                        <th>Date Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($schedules as $schedules)
                    <tr>
                        <td class="text-center">{{$schedules->schedule_id}}</td>
                        <td>{{$schedules->schedule}}</td>
                        <td class="text-center">{{$schedules->garbage_type == 'Biodegradable'?'✔':'❌'}}</td>
                        <td class="text-center">{{$schedules->garbage_type == 'Nonbiodegradable'?'✔;':'❌'}}</td>
                        <td class="text-center">{{$schedules->admin_id}}</td>
                        <td>{{$schedules->created_at}}</td>
                        @if(Auth::user()->user_type == "Driver")
                            <td><a href="/driver/calendar"><i class="fas fa-eye pr-3" title="View"></i></a>
                            <a href="/driver/reports"><i class="fas fa-exclamation-circle" title="Report Issue"></i></a></td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
{{-- ============= TRUCK ASSIGNMENTS TAB =============== --}}
<div id="Assignments" class="tabcontent">
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
                    @foreach($assignments as $assignments)
                        <tr>
                            <td class="text-center">{{$assignments->assignment_id}}</td>
                            <td class="text-center">{{$assignments->schedule_id}}</td>
                            <td class="text-center">{{$assignments->truck->plate_no}}</td>
                            <td class="text-center">{{$assignments->truck->user->userdetail->lname.', '.$assignments->truck->user->userdetail->fname}}</td>
                            <td>{{$assignments->route}}</td>
                            <td>{{$assignments->created_at}}</td>
                            <td>{{$assignments->active?'Active':'Inactive'}}</td>
                            @if(Auth::user()->user_type == "Driver")
                                <td><a href="#show{{$assignments->assignment_id}}" data-toggle="modal"> <i class="fas fa-eye pr-3" title="View"></i></a>
                                    <a href="/driver/reports"><i class="fas fa-exclamation-circle" title="Report Issue"></i></a></td>
                            @endif
                        </tr>
{{-- ============= SHOW TRUCK ASSIGNMENT DETAILS TAB =============== --}}
<div id="show{{$assignments->assignment_id}}" class="modal fade">
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
                                    <img src={{asset('storage/images/img/'.$assignments->truck->user->userdetail->image)}} alt="user avatar">
                                    </div>
                                    <h5 class="mb-1 text-white ">{{$assignments->truck->user->userdetail->fname}} {{$assignments->truck->user->userdetail->lname}}</h5>
                                    <h6 class="text-light small">{{$assignments->truck->user->userdetail->user->user_type}}</h6>
                                </div>
                                <div class="card-body">
                                    <ul class="list-group shadow-none">
                                    <li class="list-group-item">
                                        <div class="list-icon">
                                        <i class="fas fa-truck-moving"></i>
                                        </div>
                                        <div class="list-details">
                                        <span>{{$assignments->truck->plate_no}}</span>
                                        <small>Truck Plate No.</small>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="list-icon">
                                        <i class="fa fa-phone-square"></i>
                                        </div>
                                        <div class="list-details">
                                        <span>{{$assignments->truck->user->userdetail->contact_no}}</span>
                                        <small>Mobile Number</small>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="list-icon">
                                        <i class="fa fa-envelope"></i>
                                        </div>
                                        <div class="list-details">
                                        <span>{{$assignments->truck->user->email}}</span>
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
                                        <input type="text" readonly class="form-control" id="staticSchedule" value="{{$assignments->schedule->schedule}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label for="staticgarbagetype" class="col-sm-4 col-form-label"><i class="fas fa-recycle"></i> Garbage Type:</label>
                                        <div class="col-sm-7">
                                        <input type="text" readonly class="form-control" id="staticgarbagetype" value="{{$assignments->schedule->garbage_type}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label for="staticRoute" class="col-sm-4 col-form-label"><i class="fas fa-map-marked-alt"></i> Route:</label>
                                    <div class="col-sm-7">
                                        <input type="text" readonly class="form-control" id="staticRoute" value="{{$assignments->route}}">
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
                                    <input type="text" readonly class="form-control" id="staticDriver" value="{{$assignments->schedule->user->userdetail->fname}} {{$assignments->schedule->user->userdetail->lname}}">
                                </div>
                                </div>
                                <div class="form-group row">
                                <label for="staticEmail" class="col-sm-4 col-form-label"><i class="fas fa-envelope"></i> Admin's Email:</label>
                                <div class="col-sm-7">
                                    <input type="text" readonly class="form-control" id="staticEmail" value="{{$assignments->schedule->user->email}}">
                                </div>
                                </div>
                                <div class="form-group row">
                                <label for="staticContact" class="col-sm-4 col-form-label"><i class="fas fa-phone-square"></i> Admin's Contact:</label>
                                <div class="col-sm-7">
                                    <input type="text" readonly class="form-control" id="staticContact" value="{{$assignments->schedule->user->userdetail->contact_no}}">
                                </div>
                                </div>
                                <div class="form-group row">
                                <label for="staticStatus" class="col-sm-4 col-form-label"><i class="fas fa-spinner"></i> Active:</label>
                                <div class="col-sm-7">
                                    <input type="text" readonly class="form-control" id="staticStatus" value="{{$assignments->active?'Active':'Inactive'}}">
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
{{-- ============= END OF SHOW TRUCK ASSIGNMENT DETAILS TAB =============== --}}
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src={{asset('js/gallery-view.js')}}></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
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
