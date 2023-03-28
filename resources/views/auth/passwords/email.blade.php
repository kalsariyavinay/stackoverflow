@extends('layouts.app')
@section('content')

    <body>
        <div class="offset-2 col-sm-8">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5" style="background-color:#f5f5f5">
                <h2 class="text-center mb-3 ms-1" style="color:#f48225">Reset Password</h2>

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end"
                            style="color:#f48225">{{ __('Email Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn text-white"
                                style="background-color:#f48225">{{ __('Send Password Reset Link') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
@endsection
