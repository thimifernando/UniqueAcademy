@extends('layouts.app')
@section('title',' Advertisement')
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
            <form method="post" action="{{url('advertisement/create')}}" enctype="multipart/form-data">
                @csrf
                <div class="row d-flex justify-content-end">
                    <input name="date" type="text" class="form-control col-4" id="date"
                           placeholder="Date" onfocus="(this.type='date')" @required(true)>
                </div>
                <div class="row mt-4">
                    <div class="mb-3 col-lg-6 col-md-6 col-sm-6 p-0">
                        <div class="card" id="imgCard">
                            <img src=""
                                 class="card-img-top"
                                 height="265"
                                 id="adsImg"
                                 alt="...">
                            <div class="card-body">
                                <p class="card-text fw-bold text-center">Preview</p>
                                <div class="d-flex justify-content-center">
                                    <button type="button" id="addIMG" class="btn btn-default rounded-lg"
                                            onclick="addImg()">Add Image
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 col-lg-6 col-md-6 col-sm-6">
                        <div class="card" id="videoCard">
                            {{--                    preview a video--}}
                            <video id="videoSourse" width="100%" height="100%" controls autoplay loop preload="auto">
                                <source src="">
                                Your browser does not support the video tag.
                            </video>
                            <div class="card-body">
                                <p class="card-text fw-bold text-center">Preview</p>
                                <div class="d-flex justify-content-center">
                                    <button type="button" class="btn btn-default rounded-lg" onclick="addVideo()">Add
                                        Video
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col p-0">
                        <select class="form-control" aria-label="Default select example" name="category" @required(true)>
                            <option selected disabled readonly>Category</option>
                            <option value="O/L">O/L</option>
                            <option value="A/L">A/L</option>
                            <option value="Grade 05">Grade 05</option>
                        </select>
                    </div>
                    <div class="col p-0">
                        <input type="text" class="form-control" id=" title" name="title" @required(true)
                               placeholder="Title">
                    </div>
                </div>
                <div class="row pb-3">
                    <div class="col p-0">
                        {!! $shareComponent !!}
                        <small>Social Medial sharing</small>
                    </div>
                    <div class="col p-0 d-flex justify-content-end align-items-center">
                        <div class="btn-group">
                            <button class="btn btn-success" type="submit">Add</button>
                            {{--                        <button class="btn btn-primary" type="button">Update</button>--}}
                            {{--                        <button class="btn btn-danger" type="button">Delete</button>--}}
                            <a href="{{url('advertisement/show')}}" class="btn btn-secondary" type="button">View</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <script type="text/javascript">
        function addImg() {
            let imgDiv = document.getElementById("imgCard");

            let imgUploader = document.createElement("input");
            imgUploader.setAttribute("id", "imgUploader");
            imgUploader.setAttribute("type", "file");
            imgUploader.setAttribute("accept", "image/png, image/gif, image/jpeg");
            imgUploader.setAttribute("class", "d-none")
            imgUploader.setAttribute("name", "img")
            imgUploader.setAttribute("required","true");
            imgDiv.appendChild(imgUploader);

            let imgUploaderElement = document.getElementById("imgUploader");
            console.log(imgUploaderElement);

            if (imgUploaderElement !== undefined && imgUploaderElement !== null) {
                imgUploaderElement.click();
                imgUploaderElement.addEventListener("change", () => {
                    imgUploaderElement = document.getElementById("imgUploader");
                    console.log(imgUploaderElement);
                    if (imgUploaderElement.files[0] !== null && imgUploaderElement.files[0] !== undefined) {
                        if (imgUploaderElement.files.length > 0) {
                            const fileReader = new FileReader();

                            fileReader.onload = function (event) {
                                document.getElementById("adsImg").setAttribute("src", event.target.result);
                            };

                            fileReader.readAsDataURL(imgUploaderElement.files[0]);
                        }
                    }
                });
            }
        }

        function addVideo() {
            let imgDiv = document.getElementById("videoCard");

            let imgUploader = document.createElement("input");
            imgUploader.setAttribute("id", "videoUploader");
            imgUploader.setAttribute("type", "file");
            imgUploader.setAttribute("accept", "video/mp4,video/x-m4v,video/*");
            imgUploader.setAttribute("class", "d-none")
            imgUploader.setAttribute("name", "video")
            imgUploader.setAttribute("required","true");
            imgDiv.appendChild(imgUploader);

            let imgUploaderElement = document.getElementById("videoUploader");
            console.log(imgUploaderElement);

            if (imgUploaderElement !== undefined && imgUploaderElement !== null) {
                imgUploaderElement.click();
                imgUploaderElement.addEventListener("change", () => {
                    imgUploaderElement = document.getElementById("videoUploader");
                    console.log(imgUploaderElement);
                    if (imgUploaderElement.files[0] !== null && imgUploaderElement.files[0] !== undefined) {
                        if (imgUploaderElement.files.length > 0) {
                            const fileReader = new FileReader();

                            fileReader.onload = function (event) {
                                console.log(event.target.result);

                                document.getElementById("videoSourse").setAttribute("src", event.target.result);

                                console.log(document.getElementById("videoSourse"));
                            };

                            fileReader.readAsDataURL(imgUploaderElement.files[0]);
                        }
                    }
                });
            }
        }
    </script>
@endsection
