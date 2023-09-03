
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

                <form method="POST" action="{{url('save-question')}}">
                    @csrf
                    <div class="md-3">
                        <label class="form-lable">Question : </label>
                        <input type="text" class="form-control" name="question" value="{{old('question')}}">
                        @error('question')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                    <div class="md-3">
                        <label class="form-lable">Option A : </label>
                        <input type="text" class="form-control" name="opA" value="{{old('opA')}}" >
                        @error('option A')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="md-3">
                        <label class="form-lable">Option B : </label>
                        <input type="text" class="form-control" name="opB" value="{{old('opB')}}">
                        @error('option B')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="md-3">
                        <label class="form-lable">Option C : </label>
                        <input type="text" class="form-control" name="opC" value="{{old('opC')}}">
                        @error('option C')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="md-3">
                        <label class="form-lable">Option D : </label>
                        <input type="text" class="form-control" name="opD" value="{{old('opD')}}">
                        @error('option D')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="md-3">
                        <label class="form-lable">Answer : </label>
                        <input type="text" class="form-control" name="answer" value="{{old('answer')}}">
                        {{-- <select id="answers" class="form-control" name="answers">
                            <option>Select</option>
                            <option value="opA" {{old('opA') == 'opA' ? 'selected' : ''}}>optionA</option>
                            <option value="opB" {{old('opB') == 'opB' ? 'selected' : ''}}>optionB</option>
                            <option value="opC" {{old('opC') == 'opC' ? 'selected' : ''}}>optionC</option>
                            <option value="opD" {{old('opD') == 'opD' ? 'selected' : ''}}>optionD</option>
                        </select> --}}
                        @error('answer')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <br>

                    <button type="submit" class="btn btn-primary"> Submit </button>

                    <a href="{{url('question-list')}}" class="btn btn-danger"> Back</a>
            </div>

                </form>
            </div>
        </div>
    </div>



