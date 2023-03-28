<!-- Start Navbar Area -->
<div class="navbar-area mb-5">
    <div class="mobile-responsive-nav">
        <div class="container">
            <div class="mobile-responsive-menu">
                <div class="logo">
                    <a href="index.html">
                        <img src="{{ asset('frontend/images/logo.png') }}" width="60px" alt="logo">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="desktop-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="">
                    <img src="{{ asset('frontend/images/logo.png') }}" width="60px" alt="logo">
                </a>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav m-auto">
                        <li class="nav-item {{ is_active('home') }}">
                            <a href="{{ route('home') }}" class="nav-link">
                                Home
                            </a>
                        </li>
                        <li class="nav-item {{ is_active('about') }}">
                            <a href="{{ route('about') }}" class="nav-link">
                                About Us
                            </a>
                        </li>

                        <li class="nav-item {{ is_active('contact') }} ">
                            <a href="{{ route('contact') }}" class="nav-link">
                                Contact Us
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="#" class="nav-link dropdown-toggle">
                                More
                            </a>

                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="" class="nav-link">
                                       ?
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link">
                                       ?
                                    </a>
                                </li>
                            </ul>
                        </li> --}}
                    </ul>

                    @guest
                        <ul class="navbar-nav m-auto">
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        </ul>
                    @else
                        <ul class="navbar-nav m-auto">
                            <li class="nav-item ">
                                <a href="#" class="nav-link dropdown-toggle">
                                    {{ Auth::user()->name }}
                                </a>

                                <ul class="dropdown-menu">
                                    <li class="nav-item {{ is_active('job_post') }}">
                                        <a href="{{ route('job_post') }}">Job Post</a>
                                    </li>
                                    <li class="nav-item {{ is_active('myquestion') }}">
                                        <a href="{{ route('myquestion') }}">My Questions</a>
                                    </li>
                                    <li class="nav-item {{ is_active('edit_user') }}">
                                        <a href="{{ route('edit_user') }}">Edit profile</a>
                                    </li>
                                    <li class="nav-item">
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                        <a href="{{ route('logout') }}">Logout</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="" class="text-success">Balance:-<b> {{ Auth::user()->balance }}</b></a>
                            </li>
                        </ul>
                    @endguest
                </div>
            </nav>
        </div>
    </div>
</div>
