@extends('layouts.app')
@section('title', 'Add Tutorial')
@section('content')

    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                Details
            </div>
            <form action="{{ route('tutorial.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <label for="subject" class="req_fld">subject</label>
                            <input class="form-control" type="text" name="subject" value="{{ old('name') }}">
                            @error('subject')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="date" class="req_fld">date</label>
                            <input class="form-control" type="date" name="date" value="{{ old('email') }}"
                                autocomplete="off">
                            @error('date')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror

                        </div>

                        <div class="col-md-4 form-group">
                            <label for="item" class="req_fld">item</label>
                            <input class="form-control" type="file" name="item">
                        @error('item')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror



                        </div>
                    </div>
            
                <div class="card-footer">
                    <div class="row">
                        <div class="col">
                            <a href="{{ route('tutorial.index') }}" class="btn btn-info" type="button">Back</a>
                            <button class="btn btn-secondary" type="reset">Reset</button>
                            <button class="btn btn-primary float-right" type="submit">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
