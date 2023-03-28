@extends('admin.layout.app')
@section('content')
    <div class="content-header ">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 ">
                    <h1>Tag edit</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Tag edit</li>
                    </ol>
                </div>
            </div>
            <hr>
        </div>
    </div>

    <div class="card-body d-flex  justify-content-center">
        <div class="container col-sm-5 pt-5 pb-5 pl-5 pr-5" style="background-color:#e9ecef">
            <form action="{{ route('tag.update', $tags->id) }}" method="post" role="button"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Tag</label>
                            <input type="text" class="form-control" value="{{ $tags['tag'] }}" name="tag"
                                id="tag" required>
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
