@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Upload</div>

                <div class="card-body">
                    <form class="md-form" action="http://localhost:8000/api/uploads" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="file-field">
                            <div class="mb-4">
                                <img style="width: 200px; height: 200px;"  src="https://mdbootstrap.com/img/Photos/Others/placeholder-avatar.jpg"
                                     class="rounded-circle z-depth-1-half avatar-pic" alt="example placeholder avatar">
                            </div>
                            <div class="d-flex justify-content-center">
                                <div class="btn btn-mdb-color btn-rounded float-left">
                                    <span>Add photo</span>
                                    <input type="file" name="images">
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary">Yukle</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
