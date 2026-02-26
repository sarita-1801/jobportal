
<div class="sidebar-nav-card">

    {{-- Account Settings --}}
    <a href="{{ route('profile.edit') }}" 
       class="sidebar-nav-item {{ request()->routeIs('profile.edit') ? 'active' : '' }}">
       Account Settings
    </a>

    @if(Auth::user()->role === 'employer')

        <a href="{{ route('employer.jobs.create') }}" 
           class="sidebar-nav-item {{ request()->routeIs('employer.jobs.create') ? 'active' : '' }}">
           Post a Job
        </a>

        <a href="{{ route('employer.jobs.index') }}" 
           class="sidebar-nav-item {{ request()->routeIs('employer.jobs.*') ? 'active' : '' }}">
           My Jobs
        </a>

    @elseif(Auth::user()->role === 'seeker')

        <a href="{{ route('seeker.applications') }}" 
           class="sidebar-nav-item {{ request()->routeIs('seeker.applications') ? 'active' : '' }}">
           Jobs Applied
        </a>

        <a href="{{ route('seeker.saved') }}" 
           class="sidebar-nav-item {{ request()->routeIs('seeker.saved') ? 'active' : '' }}">
           Saved Jobs
        </a>

    @endif

    {{-- Logout --}}
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="sidebar-nav-item logout-item">
            Logout
        </button>
    </form>

</div>