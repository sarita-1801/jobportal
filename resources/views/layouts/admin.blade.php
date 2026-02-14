<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin | Jobify</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f6f9;
        }

        /* Sidebar */
        .sidebar {
            min-height: 100vh;
            background: linear-gradient(180deg, #2e7d32, #1b5e20);
            color: #fff;
            transition: all 0.3s ease;
        }

        .sidebar a {
            color: #fff;
            text-decoration: none;
            padding: 12px 15px;
            display: block;
            border-radius: 8px;
            margin-bottom: 6px;
            transition: 0.2s ease-in-out;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background-color: rgba(255,255,255,0.15);
            transform: translateX(4px);
        }

        /* Topbar */
        .topbar {
            background: #ffffff;
            border-bottom: 1px solid #e0e0e0;
            padding-left: 15px;
            padding-right: 15px;
        }

        /* Stat Card */
        .card-stat {
            border-left: 5px solid #2e7d32;
        }

        /* Mobile Sidebar */
        .sidebar-toggle {
            display: none;
            cursor: pointer;
        }

        @media (max-width: 768px) {
            .sidebar {
                position: fixed;
                left: -100%;
                top: 0;
                width: 250px;
                z-index: 1050;
            }

            .sidebar.active {
                left: 0;
            }

            .sidebar-toggle {
                display: inline-block;
            }
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">

        {{-- SIDEBAR --}}
        <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block sidebar p-3">

            <h4 class="text-center mb-4 fw-bold">Jobify Admin</h4>

            {{-- Dashboard --}}
            <a href="{{ route('admin.dashboard') }}" 
            class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="bi bi-speedometer2 me-2"></i> Dashboard
            </a>

            {{-- Users --}}
            <a href="{{ route('admin.users.index') }}" 
            class="{{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                <i class="bi bi-people me-2"></i> Users
            </a>

            {{-- Jobs --}}
            <a href="{{ route('admin.jobs.index') }}" 
            class="{{ request()->routeIs('admin.jobs.*') ? 'active' : '' }}">
                <i class="bi bi-briefcase me-2"></i> Jobs
            </a>

            {{-- Applications --}}
            <a href="{{ route('admin.applications.index') }}" 
            class="{{ request()->routeIs('admin.applications.*') ? 'active' : '' }}">
                <i class="bi bi-file-earmark-text me-2"></i> Applications
            </a>

            {{-- Employers --}}
            <a href="{{ route('admin.employers.index') }}" 
            class="{{ request()->routeIs('admin.employers.*') ? 'active' : '' }}">
                <i class="bi bi-person-badge me-2"></i> Employers
            </a>

            <hr>

            {{-- Logout --}}
            <a href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="bi bi-box-arrow-right me-2"></i> Logout
            </a>

            <form id="logout-form" method="POST" action="{{ route('logout') }}">
                @csrf
            </form>
        </nav>


        {{-- MAIN CONTENT --}}
        <main class="col-md-9 col-lg-10 px-md-4">

            {{-- TOPBAR --}}
            <div class="topbar py-3 mb-4 d-flex justify-content-between align-items-center">

                <span class="sidebar-toggle text-success" onclick="toggleSidebar()">
                    <i class="bi bi-list fs-4"></i>
                </span>

                <h5 class="mb-0 fw-semibold">Admin Dashboard</h5>

                <span class="fw-semibold text-success">
                    {{ Auth::user()->name }}
                </span>
            </div>

            {{-- PAGE CONTENT --}}
            @yield('pagecontent')

        </main>
    </div>
</div>

<script>
    function toggleSidebar() {
        document.getElementById('sidebar').classList.toggle('active');
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
