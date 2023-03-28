@extends('admin.layout.app')
@section('content')
    <form action="{{ route('contacts.update', $contactus->id) }}" method="post" role="button" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-sm-8 offset-2 mt-5">
                <div class="form-group">
                    <label>Phone No.</label>
                    <input type="text" class="form-control" value="{{ $contactus['call'] }}" name="call" id="call"
                        required>
                </div>
                <div class="form-group">
                    <label>Email </label>
                    <input type="email" class="form-control" value="{{ $contactus['email'] }}" name="email"
                        id="email" required>
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" value="{{ $contactus['address'] }}" name="address"
                        id="address" required>
                </div>
            </div>
        </div>
        <div class="text-center">
            <button class="btn btn-primary" type="submit">submit</button>
        </div>
    </form>
@endsection
