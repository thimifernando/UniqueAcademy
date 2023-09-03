@extends('layouts.app')
@section('title', 'Add Tutorial')
@section('content')


<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            Search
            <a href="{{ route('tutorial.create') }}" class="btn btn-info float-right" type="button">Add New Tutorial</a>
        </div>
        <form action="{{ url()->current() }}">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="subject">Subject</label>
                        <input class="form-control" type="text" name="subject" value="{{request()->get('subject')}}">
                    </div>


                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col">
                        <a href="{{ url()->current() }}" class="btn btn-secondary" type="button">Reset</a>
                        <button class="btn btn-primary float-right" type="submit">Search</button>
                        <a href="{{ route('tutorial.export') }}" class="btn btn-info mr-2 float-right" type="button">Export Tutorial</a>
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
                        <th>subject</th>
                        <th>date</th>
                        <th>item</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($tute as $tute)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $tute->subject }}</td>
                       
                        <td>{{ $tute->date }}</td>
                        <td><a href="{{url('storage/'.$tute->item)}}">{{ $tute->subject }}</a></td>

                        <td>
                            {{-- <a href="{{ route('tutorial.show', ['id' => $tute->id]) }}"
                                class="btn btn-info">View</a> --}}
                            <a href="{{ route('tutorial.edit', ['id' => $tute->id]) }}"
                                class="btn btn-warning">Edit</a>
                                <a href="{{ route('tutorial.destroy', ['tutorial' => $tute->id]) }}"
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

