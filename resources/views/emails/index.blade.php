@extends('layouts.app')
@section('title', 'email')


@section('content')

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            Search
            <a href="{{ route('email.create') }}" class="btn btn-info float-right" type="button">Add New Mail</a>
        </div>

        <form action="{{ url()->current() }}">
            <div class="card-body">
                <div class="row">


                    <div class="col-md-4 form-group">
                        <label for="email">Email</label>
                        <input class="form-control" type="text" name="email" value="{{request()->get('email')}}">
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="email">Heading</label>
                        <input class="form-control" type="text" name="heading" value="{{request()->get('heading')}}">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col">
                        <a href="{{ url()->current() }}" class="btn btn-secondary" type="button">Reset</a>
                        <button class="btn btn-primary float-right" type="submit">Search</button>
                        <a href="{{ route('email.export') }}" class="btn btn-info mr-2 float-right" type="button">Export Emails</a>
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
                        <th>Email</th>
                        <th>Heading</th>
                        <th>Details</th>


                    </tr>
                </thead>
                <tbody>
                    @forelse ($mail as $mail)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $mail->email }}</td>
                        <td>{{ $mail->heading }}</td>
                        <td>{{ $mail->details }}</td>
                       
                      

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