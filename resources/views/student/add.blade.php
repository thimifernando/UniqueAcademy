@extends('layouts.app')
@section('title', 'Add Student')
@section('content')

    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                Details 
            </div>

            <form action="{{ route('student.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <label for="name" class="req_fld">Name</label>
                            <input class="form-control" type="text" name="name" value="{{ old('name') }}">
                            @error('name')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="email" class="req_fld">Email</label>
                            <input class="form-control" type="text" name="email" value="{{ old('email') }}"
                                autocomplete="off">
                            @error('email')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-4 form-group">
                            <label for="contact_no" class="req_fld">Password</label>
                            <input class="form-control" type="password" name="password" value="{{ old('password') }}">
                            @error('password')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-4 form-group">
                            <label for="password_confirmation" class="req_fld">Confirm Password</label>
                            <input class="form-control" type="password" name="password_confirmation">
                            @error('password_confirmation')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-4 form-group">
                            <label for="phone" class="req_fld">Mobile</label>
                            <input class="form-control" type="number" name="phone" value="{{ old('phone') }}">
                            @error('phone')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-4 form-group">
                            <label for="address" class="req_fld">Address</label>
                            <input class="form-control" type="text" name="address" value="{{ old('address') }}">
                            @error('address')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-4 form-group">
                            <label for="gender" class="req_fld">Gender</label>
                            <select id="gender" class="form-control" name="gender">
                                <option>Please Select</option>
                                <option value="M" {{ old('gender') == 'M' ? 'selected' : '' }}>Male</option>
                                <option value="F" {{ old('gender') == 'F' ? 'selected' : '' }}>Female</option>
                            </select>
                            @error('gender')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="birthday" class="req_fld">BirthDay</label>
                            <input class="form-control" type="date" name="birthday" value="{{ old('birthday') }}">
                            @error('birthday')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-4 form-group">
                            <label for="grade" class="req_fld">Grade</label>
                            <input class="form-control" type="number" name="grade" value="{{ old('grade') }}">
                            @error('grade')
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
                            <a href="{{ route('student.index') }}" class="btn btn-info" type="button">Back</a>
                            <button class="btn btn-secondary" type="reset">Reset</button>
                            <button class="btn btn-primary float-right" type="submit">Submit</button>
                        </div>
                    </div>
                </div>
            </form>

















        </div>
    </div>
@endsection
