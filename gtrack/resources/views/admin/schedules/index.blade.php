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
                            <a href="#editSchedule{{$schedule->schedule_id}}" data-toggle="modal"><i class="fas fa-pencil-alt pr-3" title="Edit"></i></a>
                            <a href="#deleteSchedule{{$schedule->schedule_id}}" data-toggle="modal"><i class="fas fa-ban" title="Delete"></i></a>
                        </td>
                    @endif
                </tr>
{{-- ============= DELETE SCHEDULE DETAILS MODAL =============== --}}
<div class="modal fade" id="deleteSchedule{{$schedule->schedule_id}}" tabindex="-1" role="dialog" aria-labelledby="deleteSchedule" aria-hidden="true">
    {{Form::open(array('url' => ['/admin/schedules/destroy', $schedule->schedule_id], 'method' => 'DELETE')) }}
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
            </div>
        </div>
    </div>
    {{Form::close()}}
</div>
{{-- ============= EDIT SCHEDULE DETAILS MODAL =============== --}}
<div id="editSchedule{{$schedule->schedule_id}}" class="modal fade mt-5"  tabindex="-1" role="dialog" aria-labelledby="editSchedule" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            {{ Form::open(array('url' => ['/admin/schedules/update', $schedule->schedule_id], 'method' => 'PATCH')) }}
            <div class="modal-header">
                <h4 class="modal-title">Edit Schedule</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="garbage_type" class="col-md-4 col-form-label text-md-right">{{ __('Garbage Type') }}</label>
                    <div class="col-md-6">
                        <select id="garbage_type" class="custom-select form-control @error('garbage+type') is-invalid @enderror" name="garbage_type" autocomplete="garbage_type" autofocus>
                            <option selected disabled hidden>{{$schedule->garbage_type}}</option>
                            <option value="Biodegradable">Biodegradable</option>
                            <option value="Nonbiodegradable">Nonbiodegradable</option>
                        </select>
                        @error('garbage_type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="scheduletime" class="col-md-4 col-form-label text-md-right">{{ __('DateTime') }}</label>
                    <div class="col-md-6">
                        <input id="scheduletime" type="datetime-local" class="form-control @error('DateTime') is-invalid @enderror" name="scheduletime" autocomplete="scheduletime" autofocus>
                        @error('DateTime')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                {{Form::submit('Update', ['class' => 'btn btn-primary'])}}
            </div>
            {{Form::close()}}
            </form>
        </div>
    </div>
</div>
{{-- ============= END OF EDIT SCHEDULE DETAILS MODAL =============== --}}
            @endforeach
            </tbody>
        </table>
    </div>
</div>
{{-- ============= CREATE SCHEDULE DETAILS MODAL =============== --}}
<div id="createSchedule" class="modal fade mt-5">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create Schedule</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                {{ Form::open(array('url' => '/admin/schedules/store', 'method' => 'POST')) }}
                    <div class="form-group row">
                        <label for="garbage_type" class="col-md-4 col-form-label text-md-right">{{ __('Garbage Type') }}</label>
                        <div class="col-md-6">
                            <select id="garbage_type" class="custom-select form-control @error('garbage+type') is-invalid @enderror" name="garbage_type" required autocomplete="garbage_type" autofocus>
                                <option selected disabled>-Select Garbage Type-</option>
                                <option value="Nonbiodegradable">Biodegradable</option>
                                <option value="Nonbiodegradable">Nonbiodegradable</option>
                            </select>
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
                            @error('DateTime')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    {{Form::submit('Create', ['class' => 'mb-2 mt-2 btn btn-primary'])}}
                </div>
            {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
{{-- ============= END OF CREATE SCHEDULE DETAILS MODAL =============== --}}
@endsection

@section('scripts')
@endsection