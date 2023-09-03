@extends('layouts.app')
@section('title', 'Add Document')
@section('content')

    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                Details
            </div>
            <form action="{{ route('specialdocument.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="name" class="req_fld">Name</label>
                            <input class="form-control" type="text" name="name" >
                            @error('name')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                   <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="date" class="req_fld">Date</label>
                            <input class="form-control" type="date" name="date" 
                                autocomplete="off">
                            @error('date')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror

                        </div>
                   </div>
                        
                    
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="file" class="req_fld">File</label>
                            <input class="form-control" type="file" name="file" >

                            @error('date')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                           
                            {{-- <textarea name="details" class="form-control" cols="30" rows="10"></textarea><br><br> --}}
                            <br>
                            <br>
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
