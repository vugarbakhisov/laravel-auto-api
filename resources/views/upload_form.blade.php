@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Upload</div>

                    <div class="card-body">
                        <form class="md-form">
                            <div class="file-field">
                                <div class="mb-4">
                                    <img style="width: 200px; height: 200px;"  src="https://mdbootstrap.com/img/Photos/Others/placeholder-avatar.jpg"
                                         class="rounded-circle z-depth-1-half avatar-pic" alt="example placeholder avatar">
                                </div>
                                <div class="d-flex justify-content-center">
                                    <div class="btn btn-mdb-color btn-rounded float-left">
                                        <span>Add photo</span>
                                        <input type="file">
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary"></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
{{--    <script--}}
{{--        src="https://code.jquery.com/jquery-3.4.1.js"></script>--}}
{{--<script>--}}

{{--    function  myFunction() {--}}
{{--        document.getElementById('click').onclick = function () {--}}
{{--            alert("Hello! I am an alert box!!");--}}
{{--        });--}}
{{--    }--}}





{{--        (function () {--}}
{{--            var output = document.getElementById('output');--}}
{{--            document.getElementById('click').onclick = function () {--}}
{{--                alert("Hello! I am an alert box!!");--}}
{{--                var data = new FormData();--}}
{{--                data.append('userId', '1');--}}
{{--                data.append('uploadFile', document.getElementById('uploadFile').files[0]);--}}

{{--                var config = {--}}
{{--                    headers:{ 'Content-Type' : 'multipart/form-data' },--}}
{{--                    onUploadProgress: function(progressEvent) {--}}
{{--                          percentCompleted = Math.round( (progressEvent.loaded * 100) / progressEvent.total );--}}
{{--                    }--}}
{{--                };--}}

{{--                axios.post('http://localhost:8000/uploads', data, config)--}}
{{--                    .then(function (res) {--}}

{{--                        output.innerHTML = res.data;--}}
{{--                    })--}}
{{--                    .catch(function (err) {--}}
{{--                        output.className = 'text-danger';--}}
{{--                        output.innerHTML = err.message;--}}
{{--                    });--}}
{{--            };--}}
{{--        })();--}}
{{--    </script>--}}

 @endsection
