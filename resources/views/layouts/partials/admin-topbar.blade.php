<nav class="navbar navbar-expand-lg navbar-dark bg-white shadow-sm border-bottom sticky-top">
    <div class="container-fluid">
        <!-- Sidebar toggle for mobile -->
        <button class="navbar-toggler me-3 d-lg-none" type="button" onclick="toggleSidebar()">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Brand -->
        <a class="navbar-brand fw-bold d-none d-lg-flex" href="/admin/dashboard">
            <i class="bi bi-gear-fill text-primary me-2"></i>Dashboard
        </a>

        <!-- Page Title & Breadcrumb -->
        <div class="navbar-nav">
            <h5 class="navbar-text mb-0 fw-bold text-dark">{{ $pageTitle ?? 'Dashboard' }}</h5>
        </div>

        <!-- Right actions slot -->
        <div class="d-flex align-items-center">
            {{ $actionButton ?? '' }}

            <!-- User dropdown -->
            <ul class="navbar-nav ms-3">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-dark" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-person-circle fs-5 me-1"></i>{{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow">
                        <li><a class="dropdown-item" href="{{ url('/') }}">View Site</a></li>
                        <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}" class="m-0">
                                @csrf
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

