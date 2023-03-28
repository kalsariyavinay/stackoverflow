@extends('admin.layout.app')
@section('content')
    <div class="content-header ">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 ">
                    <h1>Job Create</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Job Create</li>
                    </ol>
                </div>
            </div>
            <hr>
        </div>
    </div>

    <div class="card-body d-flex  justify-content-center">
        <form action="{{ route('job.store') }}" method="post" role="button" enctype="multipart/form-data">
            @csrf
            <div class="container pt-5 pb-5 pl-5 pr-5" style="background-color:#e9ecef">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Job Title</label>
                            <input type="text" class="form-control" rows="3" placeholder="Enter" name="job_title"
                                id="job_title" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Company Name</label>
                            <input type="text" class="form-control" placeholder="Enter" name="company_name"
                                id="company_name" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Company Logo</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="company_logo"
                                        id="company_logo"required>
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
                            <label>Email Address</label>
                            <input type="email" class="form-control" placeholder="Enter" name="email" id="email"
                                required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Location</label>
                            <input type="location" class="form-control" placeholder="Location Address" name="location"
                                id="location" required>
                        </div>
                    </div>
                </div>


                {{-- <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label>Select</label>
              <select class="form-control">
                <option>option 1</option>
              </select>
            </div>
          </div> 
        </div> --}}

                <div class="text-center">
                    <button class="btn btn-primary" type="submit">submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection
