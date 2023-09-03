@extends('layouts.app')
@section('title', 'Edit Employee')
@section('content')

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            Details
        </div>
        <form action="{{ route('notice.update', ['notice' => $not->id]) }}" method="POST">
            @csrf
           
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="name" class="req_fld">Name</label>
                        <input class="form-control" type="text" name="name" value="{{old('name', $not->name)}}">
                        @error('name')
                        <span class="text-danger small">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="col-md-4 form-group">
                        <label for="subject" class="req_fld">Subject</label>
                        <input class="form-control" type="text" name="subject" value="{{old('subject', $not->subject)}}"
                            autocomplete="off">
                        @error('email')
                        <span class="text-danger small">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="n_date" class="req_fld">Date</label>
                        <input class="form-control" type="date" name="n_date" value="{{old('date', $not->n_date)}}">
                        @error('phone')
                        <span class="text-danger small">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-md-4 form-group">
                        <label for="topic" class="req_fld">Topic</label>
                        <input class="form-control" type="text" name="topic" value="{{old('topic', $not->topic)}}">
                        @error('address')
                        <span class="text-danger small">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="description" class="req_fld">Description</label>
                        <textarea  rows="4" cols="50" name="n_description" value="{{old('description', $not->n_description)}}"  autocomplete="off">
                        </textarea>
                        {{-- <input class="form-control" type="text" name="n_description" value="{{old('description', $not->n_description)}}"> --}}
                        @error('address')
                        <span class="text-danger small">{{$message}}</span>
                        @enderror
                    </div>
                    
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col">
                        <a href="{{ route('notice.index') }}" class="btn btn-info" type="button">Back</a>
                        <button class="btn btn-secondary" type="reset">Reset</button>
                        <button class="btn btn-warning float-right" type="submit">Update</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection