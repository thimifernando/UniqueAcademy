@extends('layouts.app')
@section('content')
<div class="card">
  <div class="card-header">
    Question View
  </div>
  <div class="card-body">
    <h5 class="card-title"><b>Exam Name : </b> {{ $exams->question }}<br> <br></h5>
    <p class="card-text"><b> Subject : </b> {{ $exams->opA }}</p>
    <p class="card-text"><b> Date : </b> {{ $exams->opB }}</p>
    <p class="card-text"><b> Time : </b> {{ $exams->opC }}</p>
    <p class="card-text"><b> Attempt : </b> {{ $exams->opD }}</p>
    <p class="card-text"><b> Add Question : </b> {{ $exams->answer }}</p>
    <p class="card-text"><b> show Question : </b> {{ $exams->answer }}</p>

    <a href="{{url('question-list')}}" class="btn btn-danger"> Back</a>
  </div>
</hr>

</div>

@endsection
