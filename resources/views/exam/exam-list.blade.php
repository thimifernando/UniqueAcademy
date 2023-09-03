@extends('layouts.app')
@section('title','All Questions')
@section('content')


  <div class="container" style="margin-top: 20px">

{{-- Search function --}}
    {{-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
    </div> --}}


        <div class="row">
            <div class="col-md-12">
                <h2> Exam List <h2>
            </div>

            {{-- report --}}
            {{-- <a href="{{ url('question/export')}}" class="btn btn-info"> Exam Export</a>
            <br> --}}

                    <div style="float: right;">
                        <a href="{{url('add-exam')}}" class="btn btn-primary"> Add Exam</a>
                    </div>
                    @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('success')}}
                        </div>
                    @endif
                    <table class="table">
                        <thead><tr>
                            <th>#</th>
                            <th>Exam Name</th>
                            <th>Subject</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Attempt</th>
                            <th>Add question</th>
                            {{-- <th>show question</th> --}}
                            <th>Action</th>

                         </tr></thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($Data as $exe)
                                <tr>
                                    <td> {{$i++}} </td>
                                    <td><p> {{$exe->ex_name}} </p> </td>
                                    <td> {{$exe->subject}} </td>
                                    <td> {{$exe->date}} </td>
                                    <td> {{$exe->time}} </td>
                                    <td> {{$exe->attempt}} </td>
                                    <td>{{-- {{$exe->add_question}}--}}<a href="{{url('question-list')}}" class="btn btn-danger"> </a> </td>
                                    {{-- <td> {{$exe->show_question}} </td> --}}

                                    <td> <a href="{{url('edit-exam/'.$exe->id)}}" class="btn btn-primary"> Edit</a> |
                                         <a href="{{url('delete-exam/'.$exe->id)}}" class="btn btn-danger"> Delete</a> |
                                          <a href="{{url('exam/' . $exe->id)}}" class="btn btn-info"> View</a>

                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>

        </div>
    </div><!-- div ek genichcha 13 row ekta -->

@endsection
