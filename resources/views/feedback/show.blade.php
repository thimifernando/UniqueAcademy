
@extends('feedback.layout')
@section('content')
<link rel="stylesheet" href="{{ asset('CSS/view.css') }}">
<div class="card">
  <div class="card-header">Feedback Page</div>
  <div class="card-body">

        <div class="card-body">

        <h5 class="card-title">feedback Name : {{ $feedbacks->f_name }}</h5>
        <p class="card-text">Date : {{ $feedbacks->f_date }}</p>
        <p class="card-text">Subject : {{ $feedbacks->subject }}</p>
        <p class="card-text">Description : {{ $feedbacks->description }}</p>
        {{-- <p class="card-text">Option 1 : {{ $feedbacks->option1 }}</p>
        <p class="card-text">Option 2 : {{ $feedbacks->option2 }}</p>
        <p class="card-text">Option 3 : {{ $feedbacks->option3 }}</p>
        <p class="card-text">Option 4 : {{ $feedbacks->option4 }}</p> --}}

        
        <a href="{{url('feedback')}}" class="btn btn-primary">Back</a>
  </div>
  
    </hr>

  </div>
</div>
