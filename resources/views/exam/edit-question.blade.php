<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Question</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">


</head>
<body>

    <div class="container" style="margin-top: 20px">
        <div class="row">
            <div class="col-md-12">
                <h4> Edit Question  </h4>
                <br>
                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('success')}}
                    </div>
                @endif

                <form method="POST" action="{{url('update-question')}}">
                    @csrf
                    <input type="hidden" name="id" value="{{$data->id}}">
                    <div class="md-3">
                        <label class="form-lable">Question : </label>
                        <input type="text" class="form-control" name="question" value="{{$data->question}}">
                        @error('question')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                    <div class="md-3">
                        <label class="form-lable">Option A : </label>
                        <input type="text" class="form-control" name="opA" value="{{$data->opA}}" >
                        @error('option A')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="md-3">
                        <label class="form-lable">Option B : </label>
                        <input type="text" class="form-control" name="opB" value="{{$data->opB}}">
                        @error('option B')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="md-3">
                        <label class="form-lable">Option C : </label>
                        <input type="text" class="form-control" name="opC" value="{{$data->opC}}">
                        @error('option C')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="md-3">
                        <label class="form-lable">Option D : </label>
                        <input type="text" class="form-control" name="opD" value="{{$data->opD}}">
                        @error('option D')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="md-3">
                        <label class="form-lable">Answer : </label>
                        <input type="text" class="form-control" name="answer" value="{{$data->answer}}">
                        @error('answer')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <br>

                    <button type="submit" class="btn btn-primary"> Update </button>

                    <a href="{{url('question-list')}}" class="btn btn-danger"> Back</a>
            </div>

                </form>
            </div>
        </div>
    </div>



</body>
</html>
