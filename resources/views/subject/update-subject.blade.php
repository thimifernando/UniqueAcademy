@extends('layouts.app')
@section('title','Update Subject')
@section('content')
    <style>
        div#social-links {
            margin: 0 0 5px 0;
            max-width: 500px;
        }

        div#social-links ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        div#social-links ul li {
            display: inline-block;
        }

        div#social-links ul li a {
            padding: 10px;
            border: 1px solid #ccc;
            margin: 1px;
            font-size: 30px;
            color: #222;
            background-color: #ccc;
            border-radius: 10px;
        }
    </style>
    <section class="container">
        <div class="container px-5">
            <form method="post" action="{{url('subject/update/'.$subjects['subject_id'])}}"
                  enctype="multipart/form-data">
                @csrf
                <div class="row d-flex justify-content-end">
                    <div class="mb-3 col-lg-6 col-md-6 col-sm-6 p-0">
                        <input name="subjectName" type="text" class="form-control" id="subjectName"
                               placeholder="Subject name" value="{{$subjects['subject_name']}}" @required(true)>
                    </div>
                    <div class="mb-3 col-lg-6 col-md-6 col-sm-6 p-0">
                        <select class="form-control" aria-label="Default select example" @required(true)
                                name="subjectStream" value="{{$subjects['subject_Stream']}}">
                            <option disabled readonly>Category</option>
                            <option value="O/L">O/L</option>
                            <option value="A/L">A/L</option>
                            <option value="Grade 05">Grade 05</option>
                        </select>
                    </div>
                </div>
                <div class="row pb-3">
                    <div class="col p-0">
                        {!! $shareComponent !!}
                        <small>Social Medial sharing</small>
                    </div>
                    <div class="col p-0 d-flex justify-content-end align-items-center">
                        <div class="btn-group">
                            <button class="btn btn-success" type="submit">Update</button>
                            {{--                        <button class="btn btn-primary" type="button">Update</button>--}}
                            {{--                        <button class="btn btn-danger" type="button">Delete</button>--}}
                            <a href="{{url('subject/show')}}" class="btn btn-secondary" type="button">View</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
