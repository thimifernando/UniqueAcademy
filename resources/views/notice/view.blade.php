@extends('layouts.app')
@section('title', 'Notice')
@section('content')

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            Details
        </div>
        <form action="{{ route('notice.show') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="name" class="req_fld">Teacher Name</label>
                        <input class="form-control" type="text" disabled value="{{$not->name}}">
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="subject" class="req_fld">Subject</label>
                        <input class="form-control" type="text" disabled value="{{$not->subject}}" autocomplete="off">
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="n_date" class="req_fld">Date</label>
                        <input class="form-control" type="text" disabled value="{{$not->n_date}}">
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="topic" class="req_fld">Topic</label>
                        <input class="form-control" type="text" disabled value="{{$not->topic}}">
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="n_description" class="req_fld">Description</label>
                        <p class="card-text">{{ $not->n_description }}</p>
                        {{-- <input class="form-control" type="text" disabled value="{{$not->n_description}}"> --}}
                    </div>
                    
                </div>
            </div>
        <!-- </form> -->
    </div>
</div>
@endsection