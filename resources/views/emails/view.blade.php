@extends('layouts.app')
@section('title', 'All emails')
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
                @forelse ($mails as $mail)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $mail->email }}</td>
                   
                    <td>{{ $mail->heading }}</td>
                    <td>{{ $mail->details }}</td>

                    {{-- <td>
                        <a href="{{ route('employee.show', ['employee' => $emp->id]) }}"
                            class="btn btn-info">View</a>
                        <a href="{{ route('employee.edit', ['employee' => $emp->id]) }}"
                            class="btn btn-warning">Edit</a>
                            <a href="{{ route('employee.destroy', ['employee' => $emp->id]) }}"
                                class="btn btn-danger">Delete</a>
                    </td> --}}
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





@section('content')



@endsection