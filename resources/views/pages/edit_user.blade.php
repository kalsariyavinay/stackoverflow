@extends('layouts.app')
@section('content')
    <div class="personal-information offset-2 col-sm-5">
        <h3>Personal information</h3>
        <form method="post" action="{{ route('profile.update', $user = Auth::user()->id) }}" enctype="multipart/form-data">
            @method('put')
            @csrf

            <div class="form-group">
                <label for="name">Display name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}" /><br>
            </div>

            <div class="form-group">
                <label for="name">Email</label>
                <input type="text" disabled="disabled" class="form-control"
                    value="{{ Auth::user()->email }}" /><br>
            </div>

            <div class="form-group">
                <label for="photo">Profile Photo</label>
                <input type="hidden" name="old_image" value="{{ Auth::user()->photo }}" />
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" name="photo" class="custom-file-input" id="photo">
                    </div>
                </div>
                @if (Auth::user()->photo != '')
                    <img src="{{ asset(Auth::user()->photo) }}" width="100px" class="mt-2" height="100px" />
                @endif
            </div><br>

       

            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</button>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit your account</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-footer d-flex">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary ">Edit</button>
                        </div>
                    </div>
                </div>
            </div><br><br><br><br>
        </form>
    </div>
@endsection
