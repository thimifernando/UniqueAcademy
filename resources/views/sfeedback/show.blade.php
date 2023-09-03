
@extends('sfeedback.layout')
@section('content')
<link rel="stylesheet" href="{{ asset('CSS/view.css') }}">
<div class="card">
  <div class="card-header">Feedback Page</div>
  <div class="card-body">

        <div class="card-body">

        <h5 class="card-title">Feedback name: {{ $sfeedbacks->fs_name }}</h5>
        <p class="card-text">Date : {{ $sfeedbacks->fs_date }}</p>
        <p class="card-text">Subject : {{ $sfeedbacks->subject }}</p>
        <p class="card-text">Email : {{ $sfeedbacks->email }}</p>
        <p class="card-text">Phone number : {{ $sfeedbacks->phonenumber }}</p>
        <p class="card-text">Description : {{ $sfeedbacks->description }}</p>

        <a href="{{url('sfeedback')}}" class="btn btn-primary">Back</a>
      
  </div>

    </hr>

  </div>
</div>
