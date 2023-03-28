@extends('admin.layout.app')
@section('content')
    <form action="{{ route('abouts.update', $abouts->id) }}" method="post" role="button" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-sm-8 offset-2 mt-5">
                <div class="form-group">
                    <label>Description</label>
                    <input type="text" class="form-control" value="{{ $abouts['description'] }}" name="description"
                        id="description" required>
                </div>
            </div>
        </div>
        <div class="text-center">
            <button class="btn btn-primary" type="submit">submit</button>
        </div>
    </form>
@endsection
