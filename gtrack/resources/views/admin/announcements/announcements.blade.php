@extends('layouts.admin_master')

@section('title')
GTrack | Announcements
@endsection

@section('css')
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
<link href={{asset('css/admin-announcement.css')}} rel="stylesheet">

@endsection

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Announcements</h1>
    <a href="#addSupplier" class="btn btn-success newcont" data-toggle="modal"><i class="material-icons">&#xE147;</i>
        <p>Add Announcement</p>
    </a>
</div>



<div class="album py-5 bg-light">
    <div class="container">



        <div class="row">
            @foreach($row as $row)
            <div class="col-lg-4 col-md-8 mb-4">
                <div class="card h-100 w-100">
                    @if($row->image_id!=null)
                    <img class="card-img-top" src="{{asset('storage/images/uploads/'.$row->image->image_1)}}" height="250" width="50" alt="">
                    @else
                    <img class="card-img-top noimage" src="{{asset('storage/images/img/noimage.png')}}" height="300" width="50" alt="">
                    
                    @endif
                    <div class="card-body">
                        <h4 class="card-title">{{$row->title}}</h4>
                        <hr>
                        <p class="card-text">{{\Illuminate\Support\Str::limit($row->content,100)}}</p>
                    </div>
                    <div class="card-footer">
                        <a href="#showCont{{$row->announcement_id}}" class="btn btn-sm btn-success"
                            data-toggle="modal"><i class="material-icons btn-success" data-toggle="tooltip"
                                title="View">open_in_new</i></a>&nbsp;
                        <a href="#deleteAnnouncement{{$row->announcement_id}}" class="btn btn-sm btn-danger"
                            data-toggle="modal"><i class="material-icons btn-danger" data-toggle="tooltip"
                                title="Delete">delete_forever</i></a>&nbsp;
                        <a href="#editEmployeeModal{{$row->announcement_id}}" class="btn btn-sm btn-primary"
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
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" src="{{asset('storage/images/uploads/'.$row->image_1)}}" height="200" alt="Card image cap">
                <div class="container card-head">
                    <h3>{{$row->title}}</h3>
                </div>
                <hr>
                <div class="card-body">
                  <p class="card-text">{{\Illuminate\Support\Str::limit($row->content,150)}}</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                    <a href="#showCont{{$row->announcement_id}}" class="btn btn-sm btn-success"
                                            data-toggle="modal"><i class="material-icons btn-success" data-toggle="tooltip"
                                                title="View">open_in_new</i></a>&nbsp;
                    <a href="#deleteAnnouncement{{$row->announcement_id}}" class="btn btn-sm btn-danger"
                                            data-toggle="modal"><i class="material-icons btn-danger" data-toggle="tooltip"
                                                title="Delete">delete_forever</i></a>&nbsp;
                      <a href="#editEmployeeModal{{$row->announcement_id}}" class="btn btn-sm btn-primary"
                                            data-toggle="modal"><i class="material-icons btn-primary" data-toggle="tooltip"
                                                title="Edit">&#xE254;</i></a>

                    </div>
                    <small class="text-muted">{{$row->created_at}}</small>
                  </div>
                </div>
              </div>
            </div> -->
            <div id="deleteAnnouncement{{$row->announcement_id}}" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="/admin/announcements/delete/{{$row->announcement_id}}"
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
            <div id="showCont{{$row->announcement_id}}" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                       
                        <div class="modal-body">
                        @if($row->image_id!=NULL)
                            <img src="/storage/images/uploads/{{$row->image->image_1}}" class="images-display" width="450"
                                alt="Responsive image">
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
                            @endif
                            <hr>
                            <div>
                                <div>
                                    <h2 class="modal-title"><i>{{$row->title}}</i></h2>

                                </div>
                                <div>
                                    <p>{{$row->content}}</p>
                                </div>
                            </div>


                        </div>


                    </div>
                </div>
            </div>
            <div id="editEmployeeModal{{$row->announcement_id}}" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="/admin/announcements/update/{{$row->announcement_id}}"
                            method="POST" enctype="multipart/form-data">
                            @method('PATCH')
                            {{csrf_field()}}
                            <div class="modal-header">
                                <h4 class="modal-title">Edit</h4>
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                <!-- <div class="form-group idnum" id="empID2">
                                    <label>ID</label>
                                    <input type="text" class="form-control" name="empID"
                                        value="{{$row->announcement_id}}" readonly>
                                </div> -->
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"  name="title" value="{{ $row->title }}"  autocomplete="title" autofocus placeholder="Title">
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                <label>Content</label>
                                    <textarea type="text" class="form-control @error('content') is-invalid @enderror" name="content"  rows="10" cols="10" value="{{ old('$row->title') }}"  autocomplete="content" autofocus placeholder="Content" required>{{$row->content}}</textarea>
                                    @error('content')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                <label for="images[]">Image</label>
                                <input type="file" class="form-control-file @error('images') is-invalid @enderror @error('images.*') is-invalid @enderror" name="images[]" value="{{ old('images[]') }}" multiple>
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
            <form action="{{ url('/admin/announcements/create') }}" method="POST" enctype="multipart/form-data">

                {{csrf_field()}}
                <div class="modal-header">
                    <h4 class="modal-title">Add Announcement</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror"  name="title" value="{{ old('title') }}"  autocomplete="title" autofocus placeholder="Title">
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <textarea type="text" class="form-control @error('content') is-invalid @enderror" name="content"  rows="10" cols="10" value="{{ old('content') }}"  autocomplete="content" autofocus placeholder="Content" required></textarea>
                        @error('content')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="images[]">Image</label>
                        <input type="file" class="form-control-file @error('images') is-invalid @enderror @error('images.*') is-invalid @enderror" name="images[]" value="{{ old('images[]') }}" multiple>
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