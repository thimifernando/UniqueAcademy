
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<div class="container" style="margin-left: 100px; margin-right: 20px">
        <div class="row">
            <div class="col-md-8">
                <h4> Add Question  </h4>
                <br>
                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('success')}}
                    </div>
                @endif

                <form method="POST" action="{{url('save-exam')}}">
                    @csrf
                    <div class="md-3">
                        <label class="form-lable">Exam Name : </label>
                        <input type="text" class="form-control" name="ex_name" value="{{old('ex_name')}}">
                        @error('Exam Name')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                    <div class="md-3">
                        <label class="form-lable">Subject : </label>
                        <input type="text" class="form-control" name="subject" value="{{old('subject')}}" >
                        @error('Subject')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="md-3">
                        <label class="form-lable">Date : </label>
                        <input type="date" class="form-control" name="date" value="{{old('date')}}">
                        @error('Date')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="md-3">
                        <label class="form-lable">Time : </label>
                        <input type="time" class="form-control" name="time" value="{{old('time')}}">
                        @error('Time')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="md-3">
                        <label class="form-lable">Attempt : </label>
                        <input type="text" class="form-control" name="attempt" value="{{old('attempt')}}">
                        @error('Attempt')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    {{-- <div class="md-3">
                        <label class="form-lable">Add Question : </label> --}}
                        {{-- <input type="text" class="form-control" name="add_question" value="{{old('add_question')}}">
                        @error('Add Question')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror --}}
                        {{-- <a href="{{url('question-list')}}" class="btn btn-danger"> </a> --}}


                    {{-- </div> --}}
                    {{-- <div class="md-3">
                        <label class="form-lable">show Question : </label>
                        <input type="text" class="form-control" name="show_question" value="{{old('show_question')}}">
                        @error('show Question')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror
                    </div> --}}
                    <br>

                    <button type="submit" class="btn btn-primary"> Submit </button>

                    <a href="{{url('exam-list')}}" class="btn btn-danger"> Back</a>
            </div>

                </form>
            </div>
        </div>
    </div>



