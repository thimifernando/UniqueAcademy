@extends('layouts.app')
@section('title', 'Add Notice')
@section('content')

    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                Details
            </div>
            <form action="{{ route('notice.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <label for="name" class="req_fld">Teacher Name</label>
                            <input class="form-control" type="text" name="name" value="{{ old('name') }}">
                            @error('name')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="email" class="req_fld">Subject</label>
                            <input class="form-control" type="text" name="subject" value="{{ old('subject') }}"
                                autocomplete="off">
                            @error('subject')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-4 form-group">
                            <label for="email" class="req_fld">Date</label>
                            <input class="form-control" type="date" name="n_date" value="{{ old('n_date') }}"
                                autocomplete="off">
                            @error('n_date')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-4 form-group">
                            <label for="email" class="req_fld">Topic</label>
                            <input class="form-control" type="text" name="topic" value="{{ old('topic') }}"
                                autocomplete="off">
                            @error('topic')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div><br>

                        <div class="col-md-4 form-group">
                            <label for="email" class="req_fld">Description</label>
                            <textarea  rows="4" cols="50" name="n_description" value="{{ old('n_description') }}"  autocomplete="off">
                            </textarea>
                            {{-- <input class="form-control" type="textarea" name="n_description" value="{{ old('n_description') }}"
                                autocomplete="off"> --}}
                            @error('n_description')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>



                        
                    </div>
                    <div class="row">





                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col">
                            <a href="{{ route('employee.index') }}" class="btn btn-info" type="button">Back</a>
                            <button class="btn btn-secondary" type="reset">Reset</button>
                            <button class="btn btn-primary float-right" type="submit">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection