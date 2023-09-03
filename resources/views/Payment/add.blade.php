@extends('layouts.app')
@section('title', 'Add Payment')
@section('content')

    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                Details
            </div>
            <form action="{{ route('payment.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <!-- <div class="col-md-4 form-group">
                            <label for="s_id" class="req_fld">StudentID</label>
                            {{-- <input class="form-control" type="text" name="s_id" value="{{ old('s_id') }}"> --}}
                            {{-- @error('s_id') --}}
                                {{-- <span class="text-danger small">{{ $message }}</span> --}}
                            {{-- @enderror --}}
                        </div> -->
                        <div class="col-md-4 form-group">
                            <label for="s_name" class="req_fld">StudentName</label>
                            <input class="form-control" type="text" name="s_name" value="{{ old('s_name') }}">
                            @error('s_name')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="teachers_name" class="req_fld">TeacherName</label>
                            <input class="form-control" type="text" name="teachers_name" value="{{ old('teachers_name') }}">
                            @error('teachers_name')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="subject" class="req_fld">Subject</label>
                            <input class="form-control" type="text" name="subject" value="{{ old('subject') }}"
                                autocomplete="off">
                            @error('subject')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-4 form-group">
                            <label for="grade" class="req_fld">Grade</label>
                            <input class="form-control" type="text" name="grade" value="{{ old('grade') }}"
                                autocomplete="off">
                            @error('grade')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-4 form-group">
                            <label for="month" class="req_fld">Month</label>
                            <input class="form-control" type="text" name="month" value="{{ old('month') }}"
                                autocomplete="off">
                            @error('month')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div><br>

                        <div class="col-md-4 form-group">
                            <label for="photo" class="req_fld">Receipt</label>
                                <input class="form-control" name="photo" type="file" value="{{ old('photo') }}">
                            @error('photo')
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