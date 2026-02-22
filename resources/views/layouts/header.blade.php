<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('home') }}">JOBIFY</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link" href="{{route('home') }}">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('aboutus') }}">About</a>
                </li>

                <!-- Job Listings Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
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
                    <a class="nav-link" href="#">Pages</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Blog</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                </li>

            </ul>

            <div class="ms-lg-3">
                @guest
                    <div class="dropdown">
                        <button class="btn btn-success dropdown-toggle" type="button" id="guestDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            Account
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="guestDropdown">
                            <li><a class="dropdown-item" href="{{ route('login') }}">Log In</a></li>
                            <li><a class="dropdown-item" href="{{ route('register') }}">Register</a></li>
                            <li><a class="dropdown-item" href="{{ route('seeker.jobs.index') }}">Browse Jobs</a></li>
                        </ul>
                    </div>
                @endguest

                @auth
                <div class="dropdown">
                    <button class="btn btn-success dropdown-toggle d-flex align-items-center position-relative" 
                            type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        
                        {{-- Replace profile photo with account icon --}}
                        <i class="bi bi-person-circle me-2" style="font-size: 1.5rem;"></i>
                        
                        {{ Auth::user()->name }}
                        <span class="badge bg-primary ms-2 text-capitalize">{{ Auth::user()->role }}</span>

                        {{-- Notification Badge --}}
                        @php
                            $notifications = 0;
                            if(Auth::user()->role === 'seeker'){
                                $notifications = Auth::user()->new_job_notifications ?? 0;
                            } elseif(Auth::user()->role === 'employer'){
                                $notifications = Auth::user()->new_applications ?? 0;
                            }
                        @endphp
                        @if($notifications > 0)
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                {{ $notifications }}
                                <span class="visually-hidden">unread messages</span>
                            </span>
                        @endif
                    </button>

                    {{-- Dropdown menu --}}
                    <ul class="dropdown-menu dropdown-menu-end animate-dropdown" aria-labelledby="userDropdown">
                        @if(Auth::user()->role === 'admin')
                            <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Admin Dashboard</a></li>
                        @elseif(Auth::user()->role === 'employer')
                            <li><a class="dropdown-item" href="{{ route('employer.dashboard') }}">
                                Employer Dashboard
                                @if($notifications > 0)
                                    <span class="badge bg-danger ms-1">{{ $notifications }}</span>
                                @endif
                            </a></li>
                            <li><a class="dropdown-item" href="{{ route('jobs.create') }}">Post a Job</a></li>
                        @elseif(Auth::user()->role === 'seeker')
                            <li><a class="dropdown-item" href="{{ route('seeker.dashboard') }}">
                                Seeker Dashboard
                                @if($notifications > 0)
                                    <span class="badge bg-danger ms-1">{{ $notifications }}</span>
                                @endif
                            </a></li>
                            <li><a class="dropdown-item" href="{{ route('seeker.jobs.index') }}">Apply for Job</a></li>
                        @endif
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
                @endauth

            </div>
        </div>
    </div>
</nav>

{{-- Smooth Dropdown Animation --}}
<style>
/* Fade & slide animation for dropdown */
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
