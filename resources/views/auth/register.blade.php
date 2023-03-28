@extends('layouts.app')
@section('content')

    <body>
        <div class="offset-2 col-sm-8">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5" style="background-color:#f5f5f5">
                <h2 class="text-center mb-3 ms-1" style="color:#f48225">Register</h2>
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end"
                            style="color:#f48225">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" placeholder="Enter your name"
                                class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}" autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end"
                            style="color:#f48225">{{ __('Email Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" placeholder="Enter your email" type="email"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-end"
                            style="color:#f48225">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" placeholder="Enter your password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password"
                                autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-end"
                            style="color:#f48225">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" placeholder="Confirm password" type="password" class="form-control"
                                name="password_confirmation" autocomplete="new-password">
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn text-white" style="background-color:#f48225">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
@endsection
