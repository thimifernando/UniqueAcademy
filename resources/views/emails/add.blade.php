@extends('layouts.app')
@section('title', 'Send Email')
@section('content')

    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                Details
            </div>
            <form action="{{ route('email.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="email" class="req_fld">Receiver Email</label>
                            <input class="form-control" type="text" name="email" >
                            @error('email')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror

                        </div>
                    </div>
                   <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="heading" class="req_fld">Heading</label>
                            <input class="form-control" type="text" name="heading" 
                                autocomplete="off">
                                @error('heading')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror

                        </div>
                   </div>
                        
                    
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="details" class="req_fld">Details</label>
                            {{-- <input class="form-control" type="text" name="details" > --}}
                           
                            <textarea name="details" class="form-control" cols="30" rows="10"></textarea><br><br>

                            @error('details')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror

                            <button class="btn btn-primary float-right" type="submit">Submit</button>

                        </div>







                    </div>

                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col">
                            {{-- <a href="{{ route('employee.index') }}" class="btn btn-info" type="button">Back</a> --}}
                            <button class="btn btn-secondary" type="reset">Reset</button>
                            
                            

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
