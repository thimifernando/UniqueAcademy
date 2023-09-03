@extends('layouts.app')
@section('title', 'Teacher')


@section('content')

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            Search
            <a href="{{ route('teacher.create') }}" class="btn btn-info float-right" type="button">Add New Teacher</a>
        </div>
        <form action="{{ url()->current() }}">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="name">Name</label>
                        <input class="form-control" type="text" name="name" value="{{request()->get('name')}}">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="status">Status</label>
                        <select id="status"  name="status" class="form-control">
                            <option value="">All</option>
                            <option value="1" {{request()->get('status') == "1" ? 'selected' : ''}}>Active</option>
                            <option value="0" {{request()->get('status') == "0" ? 'selected' : ''}}>Inactive</option>
                        </select>
                    </div>
                    {{-- <div class="col-md-4 form-group">
                        <label for="email">Email</label>
                        <input class="form-control" type="text" name="email" value="{{request()->get('email')}}">
                    </div> --}}
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col">
                        <a href="{{ url()->current() }}" class="btn btn-secondary" type="button">Reset</a>
                        <button class="btn btn-primary float-right" type="submit">Search</button>
                        <a href="{{ route('teacher.export') }}" class="btn btn-info mr-2 float-right" type="button">Export Teacher</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="card">
        <div class="card-header">
            Results
        </div>
        <div class="card-body">
            <table class="table table-light">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>address</th>
                        <th>User_role</th>
                        <th>Birthday</th>
                        <th>Description</th>
                        <th>Subject</th>
                        <th>Grade</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($emps as $emp)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $emp->name }}</td>
                        <td>{{ $emp->status ? 'Active' : 'Inactive' }}</td>
                        <td>{{ $emp->email }}</td>
                        <td>{{ $emp->phone }}</td>
                        <td>{{ $emp->address }}</td>
                        <td>{{$emp->user_role}}</td>
                        <td>{{ $emp->teacher?->birthday }}</td>
                        <td>{{ $emp->teacher?->description }}</td>
                        <td>{{ $emp->teacher?->subject }}</td>
                        <td>{{ $emp->teacher?->grade }}</td>

                        <td>
                            <a href="{{ route('teacher.show', ['id' => $emp->id]) }}"
                                class="btn btn-info">View</a>
                            <a href="{{ route('teacher.edit', ['id' => $emp->id]) }}"
                                class="btn btn-warning">Edit</a>
                                <a href="{{ route('teacher.destroy', ['employee' => $emp->id]) }}"
                                    class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">
                            No Data Available
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection