<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar fixed-top bg-light shadow-sm">
    <div class="container">

        <a class="navbar-brand fw-bold" href="{{ route('home') }}">JOBIFY</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navMenu">

            <!-- LEFT MENU -->
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('aboutus') }}">About</a>
                </li>

                <!-- Job Listings -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button"
                       data-bs-toggle="dropdown">
                        Job Listings
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('job_list') }}">All Jobs</a></li>
                        <li><a class="dropdown-item" href="#">Full Time Jobs</a></li>
                        <li><a class="dropdown-item" href="#">Part Time Jobs</a></li>
                        <li><a class="dropdown-item" href="#">Internships</a></li>
                        <li><a class="dropdown-item" href="#">Remote Jobs</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                </li>

            </ul>

            <!-- RIGHT SIDE -->
            <div class="ms-lg-3">

                @guest
                    <div class="d-flex gap-2">
                        <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm">Login</a>
                        <a href="{{ route('register') }}" class="btn btn-success btn-sm">Register</a>
                    </div>
                @endguest


                @auth
                    @php
                        $user = Auth::user();
                    @endphp

                    <div class="dropdown">
                        <button class="btn btn-success dropdown-toggle d-flex align-items-center"
                                type="button" data-bs-toggle="dropdown">

                            <i class="bi bi-person-circle me-2" style="font-size: 1.3rem;"></i>

                            {{ $user->name }}

                            <span class="badge bg-primary ms-2 text-capitalize">
                                {{ $user->role }}
                            </span>
                        </button>

                        <ul class="dropdown-menu dropdown-menu-end animate-dropdown">

                            {{-- ROLE BASED LINKS --}}

                            @if($user->role === 'admin')
                                <li>
                                    <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                        Dashboard
                                    </a>
                                </li>
                            @endif

                            @if($user->role === 'employer')
                                <li>
                                    <a class="dropdown-item" href="{{ route('employer.dashboard') }}">
                                        Dashboard
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('employer.jobs.create') }}">
                                        Post a Job
                                    </a>
                                </li>
                            @endif

                            @if($user->role === 'seeker')
                                <li>
                                    <a class="dropdown-item" href="{{ route('seeker.dashboard') }}">
                                        Dashboard
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('seeker.jobs.index') }}">
                                        Browse Jobs
                                    </a>
                                </li>
                            @endif

                            {{-- COMMON PROFILE --}}
                            <li>
                                <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                    Profile
                                </a>
                            </li>

                            <li><hr class="dropdown-divider"></li>

                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        Logout
                                    </button>
                                </form>
                            </li>

                        </ul>
                    </div>
                @endauth

            </div>

        </div>
    </div>
</nav>


<style>
.animate-dropdown {
    opacity: 0;
    transform: translateY(-10px);
    transition: all 0.3s ease-in-out;
}

.show.animate-dropdown {
    opacity: 1;
    transform: translateY(0);
}
</style>