
@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('CSS/css.css') }}">
<style>
h2{
    font-family: 'Courier New', Courier, monospace;
}

</style>
    <div class="container"  >
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>FEEDBACK</h2>

                        
                       


                    </div>
                    <div class="card-body">
                        <a href="{{ url('/feedback/create') }}" class="btn btn-success btn-sm" title="Add New Student">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New feedbacks
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Feedback name</th>
                                        <th>Date</th>
                                        <th>Subject</th>
                                        <th>Description</th>

                                        <th>Action</th>


                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($feedbacks as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->f_name }}</td>
                                        <td>{{ $item->f_date }}</td>
                                        <td>{{ $item->subject }}</td>
                                        <td>{{ $item->description }}</td>

                                        <td>
                                            <a href="{{ url('/feedback/' . $item->f_id) }}" title="View Feedback"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
{{--                                            
                                            <a href="{{ url('/feedback/' . $item->f_id . '/edit') }}" title="Edit Feedback"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            <form method="POST" action="{{ url('/feedback' . '/' . $item->f_id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Student" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button> --}}
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
