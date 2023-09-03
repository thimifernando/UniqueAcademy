
@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('CSS/css.css') }}">
<div class="card">
  <div class="card-header">Feedback Page</div>
  <div class="card-body">

      <form action="{{ url('sfeedback') }}" method="post">
        {!! csrf_field() !!}
        <label>Feedback name</label></br>
        <input type="text" name="fs_name" id="fs_name" class="form-control">
        @error('fs_name')
          <span class="text-danger small">{{ $message }}</span>
        @enderror
      </br>
        <label>Date</label></br>
        <input type="date" name="fs_date" id="fs_date" class="form-control">
        @error('fs_date')
          <span class="text-danger small">{{ $message }}</span>
        @enderror
      </br>
        <label>Subject</label></br>
        <input type="text" name="subject" id="subject" class="form-control">
        @error('subject')
          <span class="text-danger small">{{ $message }}</span>
        @enderror
      </br>
        <label for="email">Email</label></br>
        <input type="text" name="email" id="email" placeholder="Ente Email Address" class="form-control">
        @error('email')
          <span class="text-danger small">{{ $message }}</span>
        @enderror
      </br>
        <label>Phone number</label></br>
        <input type="tel" name="phonenumber" id="phonenumber" class="form-control" required></br>
        <label>Description</label></br>
        <input type="text" name="description" id="description" class="form-control">
        @error('description')
          <span class="text-danger small">{{ $message }}</span>
        @enderror
      </br>
        

        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>

  </div>
</div>
@stop
