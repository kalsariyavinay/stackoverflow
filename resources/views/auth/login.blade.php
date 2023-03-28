@extends('layouts.app')
@section('content')

    <body>
        <div class="offset-2 col-sm-8 ">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5" style="background-color:#f5f5f5">
                <h2 class="text-center mb-3 ms-1" style="color:#f48225">Login</h2>
                <form method="POST" action="{{ route('userLoginPost') }}">
                    @csrf

                    <div class="row mb-2">
                        <label for="email" class="col-md-4 col-form-label text-md-end"
                            style="color:#f48225">{{ __('Email Address') }}</label>
                        <div class="col-md-6">
                            <input id="email" type="email" placeholder="Enter email"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label for="password" class="col-md-4 col-form-label text-md-end"
                            style="color:#f48225">{{ __('Password') }}</label>
                        <div class="col-md-6">
                            <input id="password" type="password" placeholder="Enter password"
                                class="form-control @error('password') is-invalid @enderror" name="password"
                                autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember"
                                    style="color:#f48225">{{ __('Remember Me') }}</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn text-white"
                                style="background-color:#f48225">{{ __('Login') }}</button>
                            <a class="btn text-white" style="background-color:#f48225"
                                href="{{ route('register') }}">Register</a>

                            @if (Route::has('password.request'))
                                <a class="text-back" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
@endsection
