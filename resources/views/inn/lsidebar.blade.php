<!-- Start Mail Content Area -->
<div class="main-content-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-2">
                <div class="sidebar-menu-wrap">
                    <div class="sidemenu-wrap d-flex justify-content-between align-items-center">
                        <h3>Sidebar Menu</h3>
                        <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                            <i class="ri-menu-line"></i>
                        </button>
                    </div>

                    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample"
                        aria-labelledby="offcanvasExampleLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Menu</h5>
                            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <div class="left-sidebar">
                                <nav class="sidebar-nav" data-simplebar>
                                    <ul id="sidebar-menu" class="sidebar-menu">
                                        <li>
                                            <a href="{{ route('home') }}" class="box-style {{ is_active('home') }}">
                                                <span class="menu-title">
                                                    <i class="ri-home-8-line"></i>
                                                    Home
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('all_questions') }}"
                                                class=" box-style {{ is_active('all_questions') }}">
                                                <i class="ri-question-line"></i>
                                                <span class="menu-title">
                                                    All-Questions
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('tags') }}" class="box-style {{ is_active('tags') }}">
                                                <span class="menu-title">
                                                    <i class="ri-price-tag-line"></i>
                                                    Tags
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('package') }}"
                                                class="box-style {{ is_active('package') }}">
                                                <span class="menu-title">
                                                    <i class="ri-award-line"></i>
                                                    Package
                                                </span>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="{{ route('userlist') }}"
                                                class="box-style {{ is_active('userlist') }}">
                                                <i class="ri-user-line"></i>
                                                <span class="menu-title">
                                                    Users
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('hire') }}" class="box-style {{ is_active('hire') }}">
                                                <span class="menu-title">
                                                    <i class="ri-award-line"></i>
                                                    hire
                                                </span>
                                            </a>
                                        </li>
                                        <br><br>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="middull-content">
