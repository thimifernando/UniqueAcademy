@extends('layouts.app')
@section('title', 'Notice')


@section('content')

    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                Search
                <a href="{{ route('notice.create') }}" class="btn btn-info float-right" type="button">Add New Notice</a>
            </div>
            <form action="{{ url()->current() }}">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <label for="name">Subject</label>
                            <input class="form-control" type="text" name="name" value="{{ request()->get('subject') }}">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col">
                            <a href="{{ url()->current() }}" class="btn btn-secondary" type="button">Reset</a>
                            <button class="btn btn-primary float-right" type="submit">Search</button>
                            <a href="{{ route('notice.export') }}" class="btn btn-info mr-2 float-right" type="button">Export Notice</a>
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
                            <th>Teacher Name</th>
                            <th>Subject</th>
                            <th>Date</th>
                            <th>Topic</th>
                            <th>Details</th>
                    
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($nots as $not)
                            <tr>



                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $not->name }}</td>
                                <td>{{ $not->subject }}</td>
                                <td>{{ $not->n_date }}</td>
                                <td>{{ $not->topic }}</td>
                                <td>{{ $not->n_description }}</td>

                                 <td>
                                 <a href="{{ route('notice.show', ['id' => $not->id]) }}"
                                class="btn btn-info">View</a>

                                <a href="{{ route('notice.edit', ['id' => $not->id]) }}"
                                        class="btn btn-warning">Edit</a>

                                <a href="{{ route('notice.destroy', ['notice' => $not->id]) }}"
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
