@extends('admin.layout.app')
@section('content')
    <div class="content-header ">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 ">
                    <h1>Package Create</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Package Create</li>
                    </ol>
                </div>
            </div>
            <hr>
        </div>
    </div>




    <div class="card-body d-flex  justify-content-center">
        <div class="container col-sm-5 pt-5 pb-5 pl-5 pr-5" style="background-color:#e9ecef">
            <form action="{{ route('package.store') }}" method="post" role="button" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Package Title</label>
                            <input type="text" class="form-control" rows="3" placeholder="Title" name="title"
                                id="title">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Company Logo</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="logo" id="logo">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Price</label>
                            <input type="text" class="form-control" placeholder="Price" name="price" id="price">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Total Job Post</label>
                            <input type="number" class="form-control" placeholder="Total job post" name="total_job_post"
                                id="total_job_post">
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <button class="btn btn-primary" type="submit">submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
