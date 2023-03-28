@extends('admin.layout.app')
@section('content')
    <div class="content-header ">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 ">
                    <h1>Tag Create</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Tag Create</li>
                    </ol>
                </div>
            </div>
            <hr>
        </div>
    </div>




    <div class="card-body d-flex  justify-content-center">
        <div class="container col-sm-5 pt-5 pb-5 pl-5 pr-5" style="background-color:#e9ecef">
            <form action="{{ route('tag.store') }}" method="post" role="button" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Tag</label>
                            <input type="text" class="form-control @error('tag') is-invalid @enderror" rows="3"
                                placeholder="tag" name="tag" id="tag" red>
                            @error('tag')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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
