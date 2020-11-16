@extends('layouts.admin_master')
@section('title')
    GTrack | Schedules
@endsection

@section('css')
<link href={{asset('css/admin-tablinks.css')}} rel="stylesheet">
@endsection

@section('content')
<a href="#createSchedule" class="btn btn-success newcont" data-toggle="modal"><i class=" fas fa-plus-circle"></i>
    Add New Schedules
</a>
<div class="card mb-4 mt-2">
<div class="tab">
    <a href="/admin/schedules"><button> Schedules </button></a>
    <a href="/admin/schedules/assignments"><button> Truck Assignments </button></a>
</div>

{{-- ================= SCHEDULES TAB =================== --}}
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
            @foreach($schedule as $schedule)
                <tr>
                    <td class="text-center">{{$schedule->schedule_id}}</td>
                    <td>{{$schedule->schedule}}</td>
                    <td class="text-center">{{$schedule->garbage_type == 'Biodegradable'?'✔':'❌'}}</td>
                    <td class="text-center">{{$schedule->garbage_type == 'Nonbiodegradable'?'✔':'❌'}}</td>
                    <td class="text-center">{{$schedule->admin_id}}</td>
                    <td>{{$schedule->created_at}}</td>
                    @if(Auth::user()->user_type == "Admin")
                        <td><a href="/admin/schedules/calendar"><i class="fas fa-eye pr-3" title="View"></i></a>
                            <a href="#editSchedule{{$schedule->schedule_id}}"><i class="fas fa-pencil-alt pr-3" data-toggle="modal" data-target="#editSchedule" title="Edit"></i></a>
                            <a href="#deleteSchedule{{$schedule->schedule_id}}"><i class="fas fa-ban" data-toggle="modal" data-target="#deleteSchedule"
                            title="Delete"></i></a>
                        </td>
                    @endif
                </tr>
                <div class="modal fade" id="deleteSchedule" tabindex="-1" role="dialog" aria-labelledby="deleteSchedule" aria-hidden="true">
                    {{Form::open(array('url' => ['/admin/schedules/destroy', $schedule->schedule_id], 'method' => 'DELETE')) }}
                    {{-- <form action="schedules/destroy/{{$schedule->schedule_id}}" method="DELETE"> --}}
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteSchedulelabel">Alert </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p class="p-3">Are you sure you want to delete Schedule?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                @csrf
                                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                {{-- <button type="submit" class="btn btn-danger">Confirm</button> --}}
                            </div>
                        </div>
                    </div>
                    {{-- </form> --}}
                    {{Form::close()}}
                </div>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<div id="createSchedule" class="modal fade mt-5">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create Schedule</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                {{ Form::open(array('url' => '/admin/schedules/store', 'method' => 'POST')) }}
                {{-- <form action="/admin/employees/store" method="POST"> --}}
                    <div class="form-group row">
                        <label for="garbage_type" class="col-md-4 col-form-label text-md-right">{{ __('Employee Type') }}</label>
                        <div class="col-md-6">
                            <select id="garbage_type" class="custom-select form-control @error('garbage+type') is-invalid @enderror" name="garbage_type" required autocomplete="garbage_type" autofocus>
                                <option selected disabled>-Select Garbage Type-</option>
                                <option value="Nonbiodegradable">Biodegradable</option>
                                <option value="Nonbiodegradable">Nonbiodegradable</option>
                            </select>
                            {{-- {{Form::label('garbage_type', 'Garbage Type')}}
                            {{Form::select('garbage_type', $schedule->garbage_type, ['class' => 'form-control', 'placeholder' => 'Garbage Type' ])}} --}}
                            @error('garbage_type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="schedule" class="col-md-4 col-form-label text-md-right">{{ __('DateTime') }}</label>
                        <div class="col-md-6">
                            <input id="schedule" type="datetime-local" class="form-control @error('DateTime') is-invalid @enderror" name="schedule" value="{{ old('DateTime') }}" required autocomplete="DateTime" autofocus>
                            {{-- {{Form::label('schedule', 'DateTime')}}
                            {{Form::DateTime('schedule', '', ['class' => 'form-control', 'placeholder' => 'DateTime' ])}} --}}
                            @error('DateTime')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    {{-- <input type="submit" name="Create" class="btn btn-success" value="Create"> --}}
                    {{Form::submit('Create', ['class' => 'mb-2 mt-2 btn btn-primary'])}}
                </div>
            {{ Form::close() }}
            {{-- </form> --}}
            </div>
        </div>
    </div>
</div>
<div id="editSchedule" class="modal fade mt-5">
    <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Schedule</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    {{ Form::open(array('url' => '/admin/schedules', 'method' => 'PATCH')) }}
                    {{-- <form action="/admin/employees/store" method="POST"> --}}
                        <div class="form-group row">
                            <label for="garbage_type" class="col-md-4 col-form-label text-md-right">{{ __('Garbage Type') }}</label>
                            <div class="col-md-6">
                                <select id="garbage_type" class="custom-select form-control @error('garbage+type') is-invalid @enderror" name="garbage_type" required autocomplete="garbage_type" autofocus>
                                    <option selected disabled>-Select Garbage Type-</option>
                                    <option value="Nonbiodegradable">Biodegradable</option>
                                    <option value="Nonbiodegradable">Nonbiodegradable</option>
                                </select>
                                {{-- {{Form::label('garbage_type', 'Garbage Type')}}
                                {{Form::select('garbage_type', $schedule->garbage_type, ['class' => 'form-control', 'placeholder' => 'Garbage Type' ])}} --}}
                                @error('garbage_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="schedule" class="col-md-4 col-form-label text-md-right">{{ __('DateTime') }}</label>
                            <div class="col-md-6">
                                <input id="schedule" type="datetime-local" class="form-control @error('DateTime') is-invalid @enderror" name="DateTIme" value="{{ old('DateTime') }}" required autocomplete="DateTime" autofocus>
                                {{-- {{Form::label('schedule', 'DateTime')}}
                                {{Form::DateTime('schedule', '', ['class' => 'form-control', 'placeholder' => 'DateTime' ])}} --}}
                                @error('DateTime')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" name="Create" class="btn btn-success" value="Create">
                    {{-- {{Form::submit('Submit', ['class' => 'mb-2 mt-2 btn btn-primary'])}} --}}
                </div>
            {{-- {{ Form::close() }} --}}
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection