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
            background-color: #f8f9fa;
        }
        .sidebar {
            min-height: 100vh;
            background: linear-gradient(180deg, #3e7440, #39722565);
            color: #fff;
        }
        .sidebar a {
            color: #fff;
            text-decoration: none;
            padding: 12px 15px;
            display: block;
            border-radius: 6px;
            margin-bottom: 5px;
        }
        .sidebar a:hover,
        .sidebar a.active {
            background-color: rgba(255,255,255,0.2);
        }
        .topbar {
            background: #fff;
            border-bottom: 1px solid #ddd;
        }
        .card-stat {
            border-left: 5px solid #0b9804fe;
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">

        {{-- SIDEBAR --}}
        <nav class="col-md-3 col-lg-2 d-md-block sidebar p-3">
            <h4 class="text-center mb-4 fw-bold">Jobify Admin</h4>

            <a href="{{ route('admin.dashboard') }}" class="active">
                <i class="bi bi-speedometer2 me-2"></i> Dashboard
            </a>

            <a href="#">
                <i class="bi bi-people me-2"></i> Users
            </a>

            <a href="#">
                <i class="bi bi-briefcase me-2"></i> Jobs
            </a>

            <a href="#">
                <i class="bi bi-file-earmark-text me-2"></i> Applications
            </a>

            <a href="#">
                <i class="bi bi-person-badge me-2"></i> Employers
            </a>

            <hr>

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
                <h5 class="mb-0">Admin Dashboard</h5>
                <span class="fw-semibold">
                    {{ Auth::user()->name }}
                </span>
            </div>

            {{-- PAGE CONTENT --}}
            @yield('pagecontent')

        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>