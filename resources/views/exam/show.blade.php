@extends('layouts.app')
@section('content')
<div class="card">
  <div class="card-header">
    Question View
  </div>
  <div class="card-body">
    <h5 class="card-title"><b>Question : </b> {{ $exams->question }}<br> <br></h5>
    <p class="card-text"><b> Option A : </b> {{ $exams->opA }}</p>
    <p class="card-text"><b> Option B : </b> {{ $exams->opB }}</p>
    <p class="card-text"><b> Option C : </b> {{ $exams->opC }}</p>
    <p class="card-text"><b> Option D : </b> {{ $exams->opD }}</p>
    <p class="card-text"><b> Answer : </b> {{ $exams->answer }}</p>

    <a href="{{url('question-list')}}" class="btn btn-danger"> Back</a>
  </div>
</hr>

</div>

@endsection
