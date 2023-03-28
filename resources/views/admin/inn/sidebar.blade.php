<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="{{ route('dashboard') }}" class="nav-link active">
                        <i class="fa fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="fa fa-shopping-cart"></i>
                        <p>all<i class="right fas fa-angle-left"></i></p>
                    </a>

                    <ul class="nav nav-treeview">
                        {{-- <li class="nav-item">
                  <a href="{{route('job.index')}}" class="nav-link">
                    <p>Jobs</p>
                  </a>
                </li> --}}

                        <li class="nav-item">
                            <a href="{{ route('package.index') }}" class="nav-link">
                                <p>Package</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('tag.index') }}" class="nav-link">
                                <p>Tag</p>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="{{ route('abouts.index') }}" class="nav-link">
                                <p>About Edit</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('contacts.index') }}" class="nav-link">
                                <p>Contact Edit</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
