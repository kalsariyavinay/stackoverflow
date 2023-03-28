<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="vertical-layout vertical-menu-modern" data-open="click" data-menu="vertical-menu-modern" data-col=""
    data-framework="laravel">
    <div class="auth-wrapper auth-basic px-2">
        <div class="auth-inner my-2">
            <!-- Login basic -->
            @if (\Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <div class="alert-body">
                        {{ \Session::get('success') }}
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            {{ \Session::forget('success') }}
            @if (\Session::get('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <div class="alert-body">
                        {{ \Session::get('error') }}
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="container ">
                <div class="row">
                    <div class="col-sm-3">

                    </div>

                    <div class="col-sm-6 mt-5">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5" style="background-color:#f5f5f5">
                            <h2 class="brand-text text-primary text-center mb-3 ms-1">Admin Login</h2>
                            <form class="auth-login-form mt-2" action="{{ route('adminLoginPost') }}" method="post">
                                @csrf

                                <div class="mb-2">
                                    <label for="email" class="form-label ">Admin id</label>
                                    <input type="text" class="form-control" placeholder="Admin id" id="email"
                                        name="email" value="{{ old('email') }}" autofocus />
                                    @if ($errors->has('email'))
                                        <span class="help-block font-red-min text-danger">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="mb-1">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label " for="password">Password</label>
                                        {{-- <a href="{{url('auth/forgot-password-basic')}}"><small>Forgot Password?</small></a> --}}
                                    </div>
                                    <div class="input-group input-group-merge form-password-toggle mb-3">
                                        <input type="password" class="form-control form-control-merge"
                                            placeholder="password" id="password" name="password" autofocus />
                                        <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                    </div>
                                    @if ($errors->has('password'))
                                        <span class="help-block font-red-mint text-danger">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-md-8 offset-md-5">
                                    <button type="submit" class="btn btn-primary w-" tabindex="4">Sign in</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-sm-3">

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
