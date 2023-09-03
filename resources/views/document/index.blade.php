@extends('layouts.app')
@section('title', 'Document')


@section('content')

    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                Search
                <a href="{{ route('specialdocument.create') }}" class="btn btn-info float-right" type="button">Add Document</a>
            </div>
            <form action="{{ url()->current() }}">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <label for="name">Name</label>
                            <input class="form-control" type="text" name="name" value="{{ request()->get('name') }}">
                        </div> 

                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col">
                            <a href="{{ url()->current() }}" class="btn btn-secondary" type="button">Reset</a>
                            <button class="btn btn-primary float-right" type="submit">Search</button>
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
                            <!-- <th>StudentID</th> -->
                            <th>Name</th>
                            <th>Date</th>
                            <th>File</th>
                            
                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($doc as $doc)
                            <tr>



                                <td>{{ $loop->iteration }}</td>
                                {{-- <!-- <td>{{ $doc->s_id }}</td> --> --}}
                                <td>{{ $doc->name }}</td>
                                <td>{{ $doc->date }}</td>
                                <td><a href="{{url('storage/'.$doc->file)}}">{{ $doc->file }}</a></td>

                                <td>
                                {{-- <a href="{{ route('payment.show', ['id' => $doc->id]) }}" --}}
                                {{-- class="btn btn-info">View</a> --}}

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