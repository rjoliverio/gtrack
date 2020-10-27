@extends('layouts.admin_master')

@section('title')
    GTrack | Reports
@endsection

@section('css')
<link href={{asset('css/reports-css.css')}} rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card shadow-lg">
            <div class="card-header bg-danger text-white">
              Recent Reports
            </div>
            <div class="card-body">
                <ul class="list-group">
                    @if($reports->contains('status', 0))
                    @foreach($reports as $report)
                    @if($report->status==0)
                    <li class="list-group-item">
                        <a class="text-decoration-none text-dark" href="/admin/reports/show/{{$report->report_id}}">
                            <div class="row report-pending-wrapper">
                                <div class="col-lg-1 col-md-1 col-sm-1 d-flex align-items-center text-center">
                                    <img src={{asset('storage/images/uploads/'.$report->userdetail->image)}} class="img-fluid img-responsive report-user-images shadow-sm" data-holder-rendered="true"  alt="user-pic">
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-10">
                                    <span class="report-user-name font-weight-bold">{{$report->userdetail->fname}} {{$report->userdetail->lname}}</span>
                                    <span class="float-right d-inline-block report-user-date">{{\Carbon\Carbon::parse($report->created_at)->format('g:i A')}} {{\Carbon\Carbon::parse($report->created_at)->format('d F Y')}}</span>
                                    <span class="small font-weight-bold d-block">{{$report->subject}} | {{$report->degree}}</span>
                                    <span class="small d-inline-block text-truncate" style="max-width: 90%;">{{$report->message}}</span>
                                </div>
                                <div class="col-lg-1 col-md-1 col-sm-1 d-flex align-items-center mark-as-btn">
                                    <form id="logout-form" action="/admin/reports/resolve/{{$report->report_id}}" method="POST">
                                        @csrf
                                    <button class="btn btn-block small btn-success"><i class="fas fa-thumbs-up"></i></button>
                                    </form>
                                </div>
                            </div>
                        </a>
                    </li>
                    @endif
                    @endforeach
                    {{ $reports->links() }}
                    @else
                        <li class="list-group-item text-center">No reports from drivers</li>
                    @endif
                </ul>
            </div>
        </div>
        <hr>
        <div class="card">
            <div class="card-header bg-success text-white">
              Resolved Reports
            </div>
            <div class="card-body">
                <ul class="list-group">
                    @if($reports->contains('status', 1))
                    @foreach($reports as $report)
                    <li class="list-group-item">
                        <a class="text-decoration-none text-dark" href="/admin/reports/show/{{$report->report_id}}">
                            <div class="row report-pending-wrapper">
                                <div class="col-lg-1 col-md-1 col-sm-1 d-flex align-items-center text-center">
                                    <img src={{asset('storage/images/uploads/'.$report->userdetail->image)}} class="img-fluid img-responsive report-user-images shadow-sm" data-holder-rendered="true"  alt="user-pic">
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-10">
                                    <span class="report-user-name font-weight-bold">{{$report->userdetail->fname}} {{$report->userdetail->lname}}</span>
                                    <span class="float-right d-inline-block report-user-date">{{\Carbon\Carbon::parse($report->created_at)->format('g:i A')}} {{\Carbon\Carbon::parse($report->created_at)->format('d F Y')}}</span>
                                    <span class="small font-weight-bold d-block">{{$report->subject}} | {{$report->degree}}</span>
                                    <span class="small d-inline-block text-truncate" style="max-width: 90%;">{{$report->message}}</span>
                                </div>
                                <div class="col-lg-1 col-md-1 col-sm-1 d-flex align-items-center mark-as-btn">
                                    <form id="logout-form" action="/admin/reports/remove/{{$report->report_id}}" method="POST">
                                        @csrf
                                    <button class="btn btn-block small btn-secondary"><i class="fas fa-minus-circle"></i></i></button>
                                    </form>
                                </div>
                            </div>
                        </a>
                    </li>
                    @endforeach
                    {{ $reports->links() }}
                    @else
                        <li class="list-group-item text-center">No resolved reports yet.</li>
                    @endif
                </ul>
            </div>
          </div>
    </div>
@endsection
