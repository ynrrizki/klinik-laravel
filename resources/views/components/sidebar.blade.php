<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center"
        @switch(Auth::user()->level)
        @case('ADMIN')
            href="{{ route('admin') }}"
            @break
        @case('DOKTER')
            href="{{ route('dokter') }}"
            @break
        @case('APOTEKER')
            href="{{ route('apoteker') }}"
            @break
        @default
            
    @endswitch>
        <div class="sidebar-brand-icon">
            <i class="fas fa-hospital"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Clinic</div>
    </a>

    @if (Auth::user()->level == 'ADMIN')
        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item {{ strpos(Route::currentRouteName(), 'admin') === 0 ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Users -->
        <li class="nav-item {{ strpos(Route::currentRouteName(), 'user.index') === 0 ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('user.index') }}">
                <i class="fas fa-fw fa-users"></i>
                <span>Users</span></a>
        </li>
    @endif
    @if (Auth::user()->level == 'DOKTER' || Auth::user()->level == 'ADMIN')
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Dokter
        </div>

        <!-- Nav Item - Pasien -->
        <li class="nav-item {{ strpos(Route::currentRouteName(), 'pasien.index') === 0 ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('pasien.index') }}">
                <i class="fas fa-fw fa-hospital-user"></i>
                <span>Pasien</span></a>
        </li>


        <!-- Nav Item - Riwayat Obat -->
        <li class="nav-item {{ strpos(Route::currentRouteName(), 'riwayat-berobat.index') === 0 ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('riwayat-berobat.index') }}">
                <i class="fas fa-fw fa-file-medical"></i>
                <span>Riwayat Berobat</span></a>
        </li>
    @endif
    @if (Auth::user()->level == 'APOTEKER' || Auth::user()->level == 'ADMIN')
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Apoteker
        </div>

        <!-- Nav Item - Pasien -->
        <li class="nav-item {{ strpos(Route::currentRouteName(), 'resep-obat.index') === 0 ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('resep-obat.index') }}">
                <i class="fas fa-fw fa-receipt"></i>
                <span>Resep Obat</span></a>
        </li>


        <!-- Nav Item - Riwayat Obat -->
        <li class="nav-item {{ strpos(Route::currentRouteName(), 'obat.index') === 0 ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('obat.index') }}">
                <i class="fas fa-fw fa-heart"></i>
                <span>Obat</span></a>
        </li>
    @endif

    <!-- Divider -->
    {{-- <hr class="sidebar-divider"> --}}

    <!-- Heading -->
    {{-- <div class="sidebar-heading">
        Interface
    </div> --}}

    <!-- Nav Item - Pages Collapse Menu -->
    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Components</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="buttons.html">Buttons</a>
                <a class="collapse-item" href="cards.html">Cards</a>
            </div>
        </div>
    </li> --}}

    <!-- Nav Item - Utilities Collapse Menu -->
    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Utilities:</h6>
                <a class="collapse-item" href="utilities-color.html">Colors</a>
                <a class="collapse-item" href="utilities-border.html">Borders</a>
                <a class="collapse-item" href="utilities-animation.html">Animations</a>
                <a class="collapse-item" href="utilities-other.html">Other</a>
            </div>
        </div>
    </li> --}}

    <!-- Divider -->
    {{-- <hr class="sidebar-divider"> --}}

    <!-- Heading -->
    {{-- <div class="sidebar-heading">
        Addons
    </div> --}}

    <!-- Nav Item - Pages Collapse Menu -->
    {{-- <li class="nav-item active">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse show" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Login Screens:</h6>
                <a class="collapse-item" href="login.html">Login</a>
                <a class="collapse-item" href="register.html">Register</a>
                <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Other Pages:</h6>
                <a class="collapse-item" href="404.html">404 Page</a>
                <a class="collapse-item active" href="blank.html">Blank Page</a>
            </div>
        </div>
    </li> --}}

    <!-- Nav Item - Charts -->
    {{-- <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
    </li> --}}

    <!-- Nav Item - Tables -->
    {{-- <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
    </li> --}}

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
