@extends('layouts.driver_master')

@section('title')
    GTrack | Input Garbage Weight
@endsection

@section('css')
    <link href={{asset('css/weight.css')}} rel="stylesheet">
@endsection

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Input Weight</h1>
</div>

<div class="container">
            <form action="/driver/weight/input" method="POST" enctype="multipart/form-data">

                {{csrf_field()}}
                <div class="modal-header">
                    <h4 class="modal-title">Input Weight(in Tons)</h4>
                </div>
                <div class="modal-body">
                <div class="form-group">
                <input type="number" class="form-control" name="weight" placeholder="Type here...">
                </div>

                </div>
                <div class="modal-footer">
                    <input type="submit" name="addNew" class="btn btn-success" value="Input">
                </div>
            </form>
            </div>
        

@endsection

@section('scripts')

@endsection