@extends('layouts.app')
@section('title', 'Payment')


@section('content')

    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                Search
                <a href="{{ route('payment.create') }}" class="btn btn-info float-right" type="button">Add payment</a>
            </div>
            <form action="{{ url()->current() }}">
                <div class="card-body">
                    <div class="row">
                        <!-- <div class="col-md-4 form-group">
                            <label for="s_id">SID</label>
                            <input class="form-control" type="text" name="s_id" value="{{ request()->get('s_id') }}">
                        </div> -->
                        <div class="col-md-4 form-group">
                            <label for="s_name">Student Name</label>
                            <input class="form-control" type="text" name="s_name" value="{{ request()->get('s_name') }}">
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
                            <th>StudentName</th>
                            <th>Month</th>
                            <th>Receipt</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($pays as $pay)
                            <tr>



                                <td>{{ $loop->iteration }}</td>
                                <!-- <td>{{ $pay->s_id }}</td> -->
                                <td>{{ $pay->s_name }}</td>
                                <td>{{ $pay->month }}</td>
                                <td><a href="{{url('storage/'.$pay->photo)}}">{{ $pay->photo }}</a></td>

                                <td>
                                <a href="{{ route('payment.show', ['id' => $pay->id]) }}"
                                class="btn btn-info">View</a>

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