<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Unique Academy</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
</head>

<body class="hold-transition login-page"  >

    
     <img src="{{'assets/img/Backgrounds.jpg'}}"  style="position:absolute;" width="100%">
    <div class="login-box">
         {{-- <img src="{{'assets/img/1.jpg'}}"> --}}
        <div class="card card-outline card-primary"  style="background-color: rgb(187, 180, 180);">
            {{-- <img src="{{'assets/img/1.jpg'}}"> --}}
            <div class="card-header text-center" >
                
                <h1 ><b>Unique</b> Academy</h1>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="input-group mb-3" style="background-color: rgb(105, 105, 105);">
                        <input type="email" name="email" class="form-control" placeholder="Email" value="{{old('email')}}" >
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    @error('email')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block float-end">Sign In</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/dist/js/adminlte.min.js')}}"></script>
</body>

</html>