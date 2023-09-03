@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('CSS/css.css') }}">
<div class="card">
  <div class="card-header">Feedback Page</div>
  <div class="card-body">

      <form action="{{ url('/sfeedback/response') }}" method="post">
        {!! csrf_field() !!}
        <label>Feedback name</label></br>
        <input type="text" name="fs_name" id="fs_name" class="form-control"></br>
        <label>Date</label></br>
        <input type="date" name="fs_date" id="fs_date" class="form-control"></br>
        <label>Subject</label></br>
        <input type="text" name="subject" id="subject" class="form-control"></br>
        <label>Email</label></br>
        <input type="text" name="email" id="email" class="form-control"></br>
        <label>Phone number</label></br>
        <input type="text" name="phonenumber" id="phonenumber" class="form-control"></br>
        <label>Description</label></br>
        <input type="text" name="description" id="description" class="form-control"></br>
        

        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>

  </div>
</div>
@stop