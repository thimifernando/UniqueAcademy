@extends('layouts.app')
@section('title','All Questions')
@section('content')


  <div class="container" style="margin-top: 20px">
        <div class="row">
            <div class="col-md-12">
                <h2> Question List <h2>
            </div>



                    <div style="float: right;">
                        <a href="{{url('add-question')}}" class="btn btn-success"> Add Question</a>

                        <a href="{{ url('exams/export')}}" class="btn btn-info"> Question Downloard</a>
                    </div>


                    @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('success')}}
                        </div>
                    @endif
                    <table class="table">
                        <thead><tr>
                            <th>#</th>
                            <th>Question</th>
                            <th>Option A</th>
                            <th>Option B</th>
                            <th>Option C</th>
                            <th>Option D</th>
                            <th>Answer</th>
                            <th>Action</th>

                         </tr></thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($data as $que)
                                <tr>
                                    <td> {{$i++}} </td>
                                    <td><p> {{$que->question}} </p> </td>
                                    <td> {{$que->opA}} </td>
                                    <td> {{$que->opB}} </td>
                                    <td> {{$que->opC}} </td>
                                    <td> {{$que->opD}} </td>
                                    <td> {{$que->answer}} </td>

                                    <td> <a href="{{url('edit-question/'.$que->id)}}" class="btn btn-primary"> Edit</a> | <a href="{{url('delete-question/'.$que->id)}}" class="btn btn-danger"> Delete</a> | <a href="{{url('exam/' . $que->id)}}" class="btn btn-info"> View</a>

                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>

        </div>
    </div><!-- div ek genichcha 13 row ekta -->



@endsection
