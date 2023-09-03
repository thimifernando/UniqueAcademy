@extends('layouts.app')
@section('title',' Advertisement List')
@section('content')
    <section class="container">
        <div class="container px-5">
            <div class="col p-0 d-flex justify-content-between align-items-center">
                <div class="btn-group mb-3">
                    <a href="{{ URL::to('/advertisement/pdf/') }}" class="btn btn-warning text-white">Generate
                        Report</a>
                </div>
                <div class="btn-group mb-3">
                    <a href="/advertisement" class="btn btn-success">New Advertisement</a>
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
                    <th scope="col">ID</th>
                    <th scope="col">Date</th>
                    <th scope="col">Image</th>
                    <th scope="col">Video</th>
                    <th scope="col">Category</th>
                    <th scope="col">Title</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($advertisement as $ad)
                    <tr>
                        <th scope="row">{{  $ad['a_id'] }}</th>
                        <td>{{  $ad['date'] }} </td>
                        <td>
                            {{--                            {{url('storage/'.$ad['img'])}}--}}
                            {{--                            {{  $ad['img'] }}--}}
                            <img style="background-size: cover" src=" {{url('storage/'.$ad['img'])}}" alt="ad"
                                 height="100">
                        </td>
                        <td>
                            <video height="100" controls autoplay loop preload="auto"
                                   src="{{url('storage/'.$ad['video'])}}">
                                <source src="{{url('storage/'.$ad['video'])}}" type="video/mp4">
                            </video>

                            {{--                            {{  $ad['video'] }}--}}
                        </td>
                        <td>{{  $ad['category'] }}</td>
                        <td>{{  $ad['title'] }}</td>
                        <td class="btn-group p-0 pt-1">
                            <a href="/advertisement/edit/{{  $ad['a_id'] }}" type="button"
                               class="btn btn-primary">Edit</a>
                            <a href="{{url('/advertisement/delete/'.$ad['a_id'])}}" id="btnDeleteAdvertisement"
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
