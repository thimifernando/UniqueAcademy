@extends('layouts.app')
@section('title', 'Employee')
@section('content')

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            Details
        </div>
        <form action="{{ route('tutorial.show') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="subject" class="req_fld">subject</label>
                        <input class="form-control" type="text" disabled value="{{$tute->subject}}">
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="date" class="req_fld">date</label>
                        <input class="form-control" type="text" disabled value="{{$tute->date}}" autocomplete="off">
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="item" class="req_fld">item</label>
                        <input class="form-control" type="file" disabled value="{{$tute->item}}">
                    </div>



                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col">
                        <a href="{{ route('tutorial.index') }}" class="btn btn-info" type="button">Hello</a>
                        <button class="btn btn-secondary" type="reset">Reset</button>
                        <input type="hidden" name="id" value="{{$tute->id}}">

                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection