
@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('CSS/css.css') }}">
<div class="card">
  <div class="card-header">Feedback Page</div>
  <div class="card-body">

      <form action="{{ url('feedback') }}" method="post">
        {!! csrf_field() !!}
        <label>feedback Name</label></br>
        <input type="text" name="f_name" id="f_name" class="form-control">
        @error('f_name')
          <span class="text-danger small">{{ $message }}</span>
        @enderror
      </br>

        <label>feedback date</label></br>
        <input type="date" name="f_date" id="f_date" class="form-control">
        @error('f_date')
          <span class="text-danger small">{{ $message }}</span>
        @enderror
      </br>
        <label>Subject</label></br>
        <input type="text" name="subject" id="subject" class="form-control">
        @error('subject')
          <span class="text-danger small">{{ $message }}</span>
        @enderror
      </br>
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
