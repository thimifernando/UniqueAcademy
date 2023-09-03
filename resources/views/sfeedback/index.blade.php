
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Student Feedback Form</h2>
                        <div class="form-search" style="float:right">

                         


                       <form action="{{url('sfeedback')}}" method="get" accept-charset="utf-8">
                        <div class="form-group"  style="display:flex">
                        <input type="text" name="search_fs_name" class="form-controll" placeholder="Search here" value="{{request()->get('search_fs_name')}}">
                      <button type="submit"  class="btn btn-primary">search</button>
                      </div>
                       </form>

                    </div>
                    

                    <div class="card-body">
                        <a href="{{ url('/sfeedback/create') }}" class="btn btn-success btn-sm" title="Add New Student"><i class="fa fa-plus" aria-hidden="true"></i> Add New</a>
                        <a href="{{ url('sfeedbacks/export')}}" class="btn btn-info btn-sm" type="button">Feedback Export</a>
                        
                            
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
                                        <th>Email</th>
                                        <th>Phone number</th>
                                        <th>Description</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($sfeedbacks as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->fs_name }}</td>
                                        <td>{{ $item->fs_date }}</td>
                                        <td>{{ $item->subject }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->phonenumber }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>
                                            <a href="{{ url('/sfeedback/' . $item->fs_id) }}" title="View Student"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <!-- <a href="{{ url('response') }}" title="Response"><button class="btn btn-info btn-sm"><i aria-hidden="true"></i> Response</button></a> -->
                                            <a href="{{ url('/sfeedback/' . $item->fs_id . '/edit') }}" title="Edit Student"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            <form method="POST" action="{{ url('/sfeedback' . '/' . $item->fs_id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Student" onclick="return confirm('Confirm delete?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                           
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