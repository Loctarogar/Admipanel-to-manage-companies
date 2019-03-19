<!-- Navbar -->
<nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="../../index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        @if(Session::has('newCompanies') )
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fa fa-comments-o"></i>
                <span class="badge badge-danger navbar-badge">{{ session('newCompanies')->count() }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                @foreach(session('newCompanies') as $company)
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->

                    <div class="media">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                {{ $company->name }}
                                <span class="float-right text-sm text-muted"></span>
                            </h3>
                            <p class="text-sm">{{ $company->created_at }}</p>
                            <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i>{{ $company->email }}</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                @endforeach
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('admin.companies') }}" class="dropdown-item dropdown-footer">See All Companies</a>
            </div>
        </li>
        @endif
        <!-- Notifications Dropdown Menu -->
        @if(Session::has('newEmployees'))
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fa fa-bell-o"></i>
                <span class="badge badge-warning navbar-badge">{{ session('newEmployees')->count() }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">{{ session('newEmployees')->count() }} new Employees</span>
                <div class="dropdown-divider"></div>
                @foreach( session('newEmployees') as $employee)
                <a href="#" class="dropdown-item">
                    <i class="fa fa-envelope mr-2"></i> {{ $employee->firstname }}
                    <span class="float-right text-muted text-sm">{{ $employee->company }}</span>
                </a>
                @endforeach
                <a href="{{ route('admin.employees') }}" class="dropdown-item dropdown-footer">See All Employees</a>
            </div>
        </li>
        @endif
        <li class="nav-item">
            <a class="nav-link" data-widget="" data-slide="true" href="{{ route('admin.logout') }}">
                <p>Log out</p>
            </a>
        </li>

    </ul>
</nav>
<!-- /.navbar --