@extends('layouts.admin_master')

@section('title')
GTrack | Events
@endsection

@section('css')
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
<link href={{asset('css/admin-events.css')}} rel="stylesheet">

@endsection

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Events</h1>
    <a href="#addSupplier" class="btn btn-success newcont" data-toggle="modal"><i class="material-icons">&#xE147;</i>
        <p>Add Events</p>
    </a>
</div>



<div class="album py-5 bg-light">
    <div class="container">



        <div class="row">
            @foreach($row as $row)
            <div class="col-lg-4 col-md-8 mb-4">
                <div class="card h-100 w-100">
                    <img class="card-img-top" src="/storage/images/uploads/{{$row->image->image_1}}" alt="">
                    <div class="card-body">
                        <h4 class="card-title">{{$row->event_name}}</h4>
                        <hr>
                        <p class="card-text">{{\Illuminate\Support\Str::limit($row->description,100)}}</p>
                    </div>
                    <div class="card-footer">
                        <a href="#showCont{{$row->event_id}}" class="btn btn-sm btn-success" data-toggle="modal"><i
                                class="material-icons btn-success" data-toggle="tooltip"
                                title="View">open_in_new</i></a>&nbsp;
                        <a href="#deleteAnnouncement{{$row->event_id}}" class="btn btn-sm btn-danger"
                            data-toggle="modal"><i class="material-icons btn-danger" data-toggle="tooltip"
                                title="Delete">delete_forever</i></a>&nbsp;
                        <a href="#editEmployeeModal{{$row->event_id}}" class="btn btn-sm btn-primary"
                            data-toggle="modal"><i class="material-icons btn-primary" data-toggle="tooltip"
                                title="Edit">&#xE254;</i></a>
                        &nbsp;&nbsp;
                        &nbsp;
                        &nbsp;
                        &nbsp;
                        &nbsp;
                        &nbsp;
                        &nbsp;
                        &nbsp;
                        &nbsp;
                        &nbsp;
                        
                        
                            <small class="text-muted">{{ \Carbon\Carbon::parse($row->created_at)->format('m/d/Y')}}</small>
                       
                    </div>
                </div>
            </div>



            <!-- <div class="col-md-4">
              <div class="card h-100 box-shadow">
              <img class="card-img-top" src="{{asset('storage/images/uploads/'.$row->image->image_1)}}" height="200" alt="Card image cap">
                <div class="container card-head text-left mt-3">
                    <h6>{{$row->event_name}}</h6>
                </div>
                <hr>
                <div class="card-body">
                  <p class="card-text">{{\Illuminate\Support\Str::limit($row->description,100)}}</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                    <a href="#showCont{{$row->event_id}}" class="btn btn-sm btn-success"
                                            data-toggle="modal"><i class="material-icons btn-success" data-toggle="tooltip"
                                                title="View">open_in_new</i></a>&nbsp;
                    <a href="#deleteAnnouncement{{$row->event_id}}" class="btn btn-sm btn-danger"
                                            data-toggle="modal"><i class="material-icons btn-danger" data-toggle="tooltip"
                                                title="Delete">delete_forever</i></a>&nbsp;
                      <a href="#editEmployeeModal{{$row->event_id}}" class="btn btn-sm btn-primary"
                                            data-toggle="modal"><i class="material-icons btn-primary" data-toggle="tooltip"
                                                title="Edit">&#xE254;</i></a>

                    </div>
                    <small class="text-muted">{{$row->created_at}}</small>
                  </div>
                </div>
              </div>
              </div> -->

            <!---MODAL--->
            <div id="deleteAnnouncement{{$row->event_id}}" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form
                            action="/admin/events/delete/{{$row->image->image_id}}/{{$row->address_id}}/{{$row->contact_person_id}}"
                            method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="modal-header">
                                <h2 class="modal-title">Delete this?</h2>
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-footer">
                                <input type="button" class="btn btn-default" data-dismiss="modal" value="No">
                                <input type="submit" name="saveNew" class="btn btn-info" value="Yes">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div id="showCont{{$row->event_id}}" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">

                            <img src="/storage/images/uploads/{{$row->userdetail->image}}" class="images-display"
                                width="450" alt="Responsive image">
                            <div class="text-center mb-3 border border-secondary rounded-lg p-3 ">
                                <a class="thumbnail fancybox text-center text-decoration-none" rel="ligthbox"
                                    href="/storage/images/uploads/{{$row->image->image_2}}">
                                    <img class="img-fluid bike-images " alt=""
                                        src="/storage/images/uploads/{{$row->image->image_2}}" width="50" />
                                </a>
                                <a class="thumbnail fancybox text-center text-decoration-none" rel="ligthbox"
                                    href="/storage/images/uploads/{{$row->image->image_3}}">
                                    <img class="img-responsive img-fluid bike-images" alt=""
                                        src="/storage/images/uploads/{{$row->image->image_3}}" width="50" />
                                </a>
                                <a class="thumbnail fancybox text-center text-decoration-none" rel="ligthbox"
                                    href="/storage/images/uploads/{{$row->image->image_4}}">
                                    <img class="img-responsive img-fluid bike-images" alt=""
                                        src="/storage/images/uploads/{{$row->image->image_4}}" width="50" />
                                </a>
                            </div>
                            <hr>
                            <div>
                                <div>
                                    <h2 class="modal-title"><i>{{$row->event_name}}</i></h2>

                                </div>
                                <div>
                                    <div class="text-center mb-3 border border-secondary rounded-lg p-3 ">
                                        <p>{{$row->description}}</p>
                                    </div>
                                    <div class="text-left mb-3 border border-secondary rounded-lg p-3 ">
                                        <div class="row">
                                            <h4><b>Other Details:</b></h4>
                                        </div>
                                        <p><i>When:</i> {{ \Carbon\Carbon::parse($row->date)->format('m/d/Y')}}</p>
                                        <p><i>Who:</i> {{$row->participants}}</p>
                                        <p><i>Contact Person:</i> {{$row->userdetail->fname}}
                                            {{$row->userdetail->lname}}, {{$row->userdetail->contact_no}}</p>
                                    </div>

                                </div>
                            </div>


                        </div>


                    </div>
                </div>
            </div>
            <div id="editEmployeeModal{{$row->event_id}}" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form
                            action="/admin/events/update/{{$row->image->image_id}}/{{$row->event_id}}/{{$row->address_id}}/{{$row->contact_person_id}}/{{$row->userdetail->address->address_id}}"
                            method="POST" enctype="multipart/form-data">
                            @method('PATCH')
                            {{csrf_field()}}
                            <div class="modal-header">
                                <h4 class="modal-title">Edit</h4>
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Event Name</label>
                                    <input type="text" class="form-control" name="event" value="{{$row->event_name}}">
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <input type="text" class="form-control" name="desc" value="{{$row->description}}">
                                </div>
                                <div class="form-group">
                                    <label for="images[]">Image</label>
                                    <input type="file" class="form-control-file" name="images[]"
                                        value="{{ old('images[]') }}" multiple required>
                                </div>
                                <div class="form-group">
                                    <label>Date</label>
                                    <input type="date" class="form-control" name="date" value="{{$row->date}}" required>
                                </div>
                                <div class="form-group">
                                    <label>Event Address - Street</label>
                                    <input type="text" class="form-control" name="estreet"
                                        value="{{$row->address->street}}">
                                </div>
                                <div class="form-group">
                                    <label>Event Address - Barangay</label>
                                    <input type="text" class="form-control" name="ebrgy"
                                        value="{{$row->address->barangay}}">
                                </div>
                                <div class="form-group">
                                    <label>Event Address - Town</label>
                                    <input type="text" class="form-control" name="etown"
                                        value="{{$row->address->town}}">
                                </div>
                                <div class="form-group">
                                    <label>Event Address - Postal Code</label>
                                    <input type="number" class="form-control" name="epost"
                                        value="{{$row->address->postal_code}}">
                                </div>
                                <div class="form-group">
                                    <label>Participants</label>
                                    <input type="text" class="form-control" name="participants"
                                        value="{{$row->participants}}">
                                </div>
                                <div class="form-group">
                                    <label>Contact Person First Name</label>
                                    <input type="text" class="form-control" name="cpfname"
                                        value="{{$row->userdetail->fname}}">
                                </div>
                                <div class="form-group">
                                    <label>Contact Person Last Name</label>
                                    <input type="text" class="form-control" name="cplname"
                                        value="{{$row->userdetail->lname}}">
                                </div>
                                <div class="form-group">
                                    <label>Contact Person Image</label>
                                    <input type="file" class="form-control" name="cpimage" required>
                                </div>
                                <div class="form-group">
                                    <label>Contact Person Contact Number</label>
                                    <input type="number" class="form-control" name="cpconno"
                                        value="{{$row->userdetail->contact_no}}">
                                </div>
                                <div class="form-group">
                                    <label>Contact Person Address - Street</label>
                                    <input type="text" class="form-control" name="cpstreet"
                                        value="{{$row->userdetail->address->street}}">
                                </div>
                                <div class="form-group">
                                    <label>Contact Person Address - Barangay</label>
                                    <input type="text" class="form-control" name="cpbrgy"
                                        value="{{$row->userdetail->address->barangay}}">
                                </div>
                                <div class="form-group">
                                    <label>Contact Person Address - Town</label>
                                    <input type="text" class="form-control" name="cptown"
                                        value="{{$row->userdetail->address->town}}">
                                </div>
                                <div class="form-group">
                                    <label>Contact Person Address - Postal Code</label>
                                    <input type="number" class="form-control" name="cppost"
                                        value="{{$row->userdetail->address->postal_code}}">
                                </div>
                                <div class="form-group">
                                    <label>Contact Person Age</label>
                                    <input type="number" class="form-control" name="cpage"
                                        value="{{$row->userdetail->age}}">
                                </div>
                                <div class="form-group">
                                    <label>Contact Person Gender</label><br><br>
                                    <input type="radio" name="gender" value="Male"
                                        required>&nbsp<label>Male</label>&nbsp&nbsp
                                    <input type="radio" name="gender" value="Female" required>&nbsp<label>Female</label>
                                </div>



                            </div>
                            <div class="modal-footer">
                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                <input type="submit" name="saveNew" class="btn btn-info" value="Save">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<div id="addSupplier" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ url('/admin/events/create') }}" method="POST" enctype="multipart/form-data">

                {{csrf_field()}}
                <div class="modal-header">
                    <h4 class="modal-title">Add Event</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label>Event Name</label>
                        <input type="text" class="form-control" name="event" required>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" name="desc" required>
                    </div>
                    <div class="form-group">
                        <label for="images[]">Image</label>
                        <input type="file" class="form-control-file" name="images[]" value="{{ old('images[]') }}"
                            multiple required>
                    </div>

                    <div class="form-group">
                        <label>Date</label>
                        <input type="date" class="form-control" name="date" required>
                    </div>
                    <div class="form-group">
                        <label>Event Address - Street</label>
                        <input type="text" class="form-control" name="estreet" required>
                    </div>
                    <div class="form-group">
                        <label>Event Address - Barangay</label>
                        <input type="text" class="form-control" name="ebrgy" required>
                    </div>
                    <div class="form-group">
                        <label>Event Address - Town</label>
                        <input type="text" class="form-control" name="etown" required>
                    </div>
                    <div class="form-group">
                        <label>Event Address - Postal Code</label>
                        <input type="number" class="form-control" name="epost" required>
                    </div>
                    <div class="form-group">
                        <label>Participants</label>
                        <input type="text" class="form-control" name="participants" required>
                    </div>
                    <div class="form-group">
                        <label>Contact Person First Name</label>
                        <input type="text" class="form-control" name="cpfname" required>
                    </div>
                    <div class="form-group">
                        <label>Contact Person Last Name</label>
                        <input type="text" class="form-control" name="cplname" required>
                    </div>
                    <div class="form-group">
                        <label>Contact Person Image</label>
                        <input type="file" class="form-control" name="cpimage" required>
                    </div>
                    <div class="form-group">
                        <label>Contact Person Contact Number</label>
                        <input type="number" class="form-control" name="cpconno" required>
                    </div>
                    <div class="form-group">
                        <label>Contact Person Address - Street</label>
                        <input type="text" class="form-control" name="cpstreet" required>
                    </div>
                    <div class="form-group">
                        <label>Contact Person Address - Barangay</label>
                        <input type="text" class="form-control" name="cpbrgy" required>
                    </div>
                    <div class="form-group">
                        <label>Contact Person Address - Town</label>
                        <input type="text" class="form-control" name="cptown" required>
                    </div>
                    <div class="form-group">
                        <label>Contact Person Address - Postal Code</label>
                        <input type="number" class="form-control" name="cppost" required>
                    </div>
                    <div class="form-group">
                        <label>Contact Person Age</label>
                        <input type="number" class="form-control" name="cpage" required>
                    </div>
                    <div class="form-group">
                        <label>Contact Person Gender</label><br><br>
                        <input type="radio" name="gender" value="Male" required>&nbsp<label>Male</label>&nbsp&nbsp
                        <input type="radio" name="gender" value="Female" required>&nbsp<label>Female</label>
                    </div>




                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" name="addNew" class="btn btn-success" value="Add">
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
@section('scripts')
<script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
<script src={{asset('js/gallery.js')}}></script>
<script src={{asset('js/ling-gallery-filter.js')}}></script>
@endsection