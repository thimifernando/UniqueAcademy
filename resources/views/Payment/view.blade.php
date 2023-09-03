@extends('layouts.app')
@section('title', 'Notice')
@section('content')

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            Details
        </div>
        <form action="{{ route('payment.show') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                    <!-- <div class="col-md-4 form-group">
                        <label for="s_id" class="req_fld">StudentID</label>
                        <input class="form-control" type="text" disabled value="{{$pay->s_id}}">
                    </div> -->
                    <div class="col-md-4 form-group">
                        <label for="s_name" class="req_fld">StudentName</label>
                        <input class="form-control" type="text" disabled value="{{$pay->s_name}}" autocomplete="off">
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="teachers_name" class="req_fld">TeacherName</label>
                        <input class="form-control" type="text" disabled value="{{$pay->teachers_name}}">
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="subject" class="req_fld">Subject</label>
                        <input class="form-control" type="text" disabled value="{{$pay->subject}}">
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="grade" class="req_fld">Grade</label>
                        <input class="form-control" type="text" disabled value="{{$pay->grade}}">
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="month" class="req_fld">Month</label>
                        <input class="form-control" type="text" disabled value="{{$pay->month}}">
                    </div>
                    <!-- <div class="col-md-4 form-group">
                        <label for="month" class="req_fld">Month</label>
                        <img src="{{ asset($pay->photo) }}" width= '500' height='500' class="img img-responsive" />
                    </div> -->
                    
                </div>
            </div>
        <!-- </form> -->
    </div>
</div>
@endsection