
@extends('layouts.app')
@section('content')
<div class="card">
  <div class="card-header">Contactus Page</div>
  <div class="card-body">
      
      <form action="{{ url('sfeedback/' .$sfeedbacks->fs_id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="fs_id" id="fs_id" value="{{$sfeedbacks->fs_id}}" id="fs_id" />
        <label>Feedback name</label></br>
        <input type="text" name="fs_name" id="fs_name" value="{{$sfeedbacks->fs_name}}" class="form-control"></br>
        <label>Date</label></br>
        <input type="date" name="fs_date" id="fs_date" value="{{$sfeedbacks->fs_date}}" class="form-control"></br>
        <label>Subject</label></br>
        <input type="text" name="subject" id="subject" value="{{$sfeedbacks->subject}}" class="form-control"></br>
        <label>Email</label></br>
        <input type="text" name="email" id="email" value="{{$sfeedbacks->email}}" class="form-control"></br>
        <label>Phone number</label></br>
        <input type="text" name="phonenumber" id="phonenumber" value="{{$sfeedbacks->phonenumber}}" class="form-control"></br>
        <label>Description</label></br>
        <input type="text" name="description" id="description" value="{{$sfeedbacks->description}}" class="form-control"></br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
  
  </div>
</div>
@stop