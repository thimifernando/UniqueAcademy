@extends('layouts.app')
@section('title',' Subject List')
@section('content')
    <section class="container">
        <div class="container px-5">
            <div class="col p-0 d-flex justify-content-between align-items-center">
                <div class="btn-group mb-3">
                    <a href="{{ URL::to('/subject/pdf') }}" class="btn btn-warning text-white">Generate
                        Report</a>
                </div>
                <div class="btn-group mb-3">
                    <a href="/subject" class="btn btn-success">New Subject</a>
                </div>
            </div>
            @if (session('success'))
                <div style="margin-top: 20px" class="alert alert-success alert-dismissible" role="alert">
                    {{ session('success') }}
                </div>
            @elseif (session('error'))
                <div style="margin-top: 20px" class="alert alert-error alert-dismissible" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Subject ID</th>
                    <th scope="col">Subject Name</th>
                    <th scope="col">Stream</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($subjects as $ad)
                    <tr>
                        <th scope="row">{{  $ad['subject_id'] }}</th>
                        <td>{{  $ad['subject_name'] }} </td>
                        <td>{{  $ad['subject_Stream'] }} </td>
                        <td class="btn-group p-0 pt-1">
                            <a href="/subject/edit/{{  $ad['subject_id'] }}" type="button"
                               class="btn btn-primary">Edit</a>
                            <a href="{{url('/subject/delete/'.$ad['subject_id'])}}" id="btnDeleteSubject"
                               class="btn btn-danger"
                            >Delete
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
