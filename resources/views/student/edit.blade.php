@extends('layouts.app')
@section('title', 'Edit Student')
@section('content')

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            Details
        </div>
        <form action="{{ route('student.update', ['employee' => $emp->id]) }}" method="POST">
            @csrf
           
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="name" class="req_fld">Name</label>
                        <input class="form-control" type="text" name="name" value="{{old('name', $emp->name)}}">
                        @error('name')
                        <span class="text-danger small">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="col-md-4 form-group">
                        <label for="email" class="req_fld">Email</label>
                        <input class="form-control" type="text" name="email" value="{{old('email', $emp->email)}}"
                            autocomplete="off">
                        @error('email')
                        <span class="text-danger small">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="phone" class="req_fld">Contact Number</label>
                        <input class="form-control" type="text" name="phone"
                            value="{{old('phone', $emp->phone)}}">
                        @error('phone')
                        <span class="text-danger small">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="gender" class="req_fld">Gender</label>
                        <select id="gender" class="form-control" name="gender">
                            <option>Please Select</option>
                            <option value="M" {{old('gender', $emp->gender) == "M" ? 'selected' : ''}}>Male</option>
                            <option value="F" {{old('gender', $emp->gender) == "F" ? 'selected' : ''}}>Female</option>
                        </select>
                        @error('gender')
                        <span class="text-danger small">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="name" class="req_fld">Address</label>
                        <input class="form-control" type="text" name="address" value="{{old('address', $emp->address)}}">
                        @error('address')
                        <span class="text-danger small">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="password">Password</label>
                        <input class="form-control" type="password" name="password" placeholder="Current Password"
                            autocomplete="off">
                        @error('password')
                        <span class="text-danger small">{{$message}}</span>
                        @enderror
                        <span class="small d-block">If you want to change the password of this employee. Type the new password here and Confirm Password fields.</span>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input class="form-control" type="password" name="password_confirmation">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col">
                        <a href="{{ route('employee.index') }}" class="btn btn-info" type="button">Back</a>
                        <button class="btn btn-secondary" type="reset">Reset</button>
                        <button class="btn btn-warning float-right" type="submit">Update</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection