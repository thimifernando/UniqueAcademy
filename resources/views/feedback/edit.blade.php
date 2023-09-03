
@extends('layouts.app')
@section('content')
<div class="card">
  <div class="card-header">Edit Feedback Page</div>
  <div class="card-body">

      <form action="{{ url('feedback/' .$feedbacks->f_id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="f_id" id="f_id" value="{{$feedbacks->f_id}}" id="f_id" />
        <label>Feedback Name</label></br>
        <input type="text" name="f_name" id="f_name" value="{{$feedbacks->f_name}}" class="form-control"></br>
        <label>feedback date</label></br>
        <input type="date" name="f_date" id="f_date" value="{{$feedbacks->f_date}}" class="form-control"></br>
        <label>Subject</label></br>
        <input type="text" name="subject" id="subject" value="{{$feedbacks->subject}}" class="form-control"></br>
        <label>Description</label></br>
        <input type="text" name="description" id="description" value="{{$feedbacks->description}}" class="form-control"></br>
        <label>Option 1</label></br>
        <input type="text" name="option1" id="option1" value="{{$feedbacks->option1}}" class="form-control"></br>
        <label>Option 2</label></br>
        <input type="text" name="option2" id="option2" value="{{$feedbacks->option2}}" class="form-control"></br>
        <label>Option 3</label></br>
        <input type="text" name="option3" id="option3" value="{{$feedbacks->option3}}" class="form-control"></br>
        <label>Option 4</label></br>
        <input type="text" name="option4" id="option4" value="{{$feedbacks->option4}}" class="form-control"></br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>

  </div>
</div>
@stop
