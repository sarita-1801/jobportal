@extends('template.template')
@section('pagecontent')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        .profile-page {
            font-family: 'Inter', sans-serif;
            background: #f0f4f8;
            min-height: 100vh;
            padding: 2rem 1rem;
        }

        .profile-container {
            max-width: 1100px;
            margin: 0 auto;
        }

        /* ── Breadcrumb ── */
        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 0.4rem;
            font-size: 0.85rem;
            color: #6b7280;
            margin-bottom: 1.5rem;
        }

        .breadcrumb a {
            color: #22c55e;
            text-decoration: none;
            font-weight: 500;
        }

        .breadcrumb a:hover { text-decoration: underline; }
        .breadcrumb span { color: #9ca3af; }

        /* ── Layout ── */
        .profile-layout {
            display: grid;
            grid-template-columns: 260px 1fr;
            gap: 1.5rem;
            align-items: start;
        }

        /* ── Sidebar ── */
        .profile-sidebar {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .sidebar-avatar-card {
            background: #fff;
            border-radius: 14px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.07);
            padding: 2rem 1.25rem 1.5rem;
            text-align: center;
            border: 1px solid #e5e7eb;
        }

        .avatar-wrapper {
            position: relative;
            width: 90px;
            height: 90px;
            margin: 0 auto 1rem;
        }

        .avatar-img {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #e5e7eb;
        }

        .avatar-placeholder {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            background: linear-gradient(135deg, #bbf7d0, #86efac);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            font-weight: 700;
            color: #15803d;
            border: 3px solid #e5e7eb;
            margin: 0 auto;
        }

        .sidebar-name {
            font-size: 1rem;
            font-weight: 700;
            color: #111827;
            margin: 0 0 1rem;
        }

        .btn-change-avatar {
            display: inline-block;
            background: #22c55e;
            color: #fff;
            font-size: 0.8rem;
            font-weight: 600;
            padding: 0.45rem 1rem;
            border-radius: 8px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: background 0.2s ease, transform 0.15s ease, box-shadow 0.2s ease;
            box-shadow: 0 3px 10px rgba(34,197,94,0.3);
        }

        .btn-change-avatar:hover {
            background: #16a34a;
            transform: translateY(-1px);
            box-shadow: 0 5px 14px rgba(34,197,94,0.4);
            color: #fff;
        }

        /* ── Sidebar Nav ── */
        .sidebar-nav-card {
            background: #fff;
            border-radius: 14px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.07);
            border: 1px solid #e5e7eb;
            overflow: hidden;
        }

        .sidebar-nav-item {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            padding: 0.85rem 1.25rem;
            font-size: 0.9rem;
            font-weight: 500;
            color: #374151;
            text-decoration: none;
            border-bottom: 1px solid #f3f4f6;
            transition: background 0.15s ease, color 0.15s ease, padding-left 0.15s ease;
        }

        .sidebar-nav-item:last-child { border-bottom: none; }

        .sidebar-nav-item:hover {
            background: #f0fdf4;
            color: #16a34a;
            padding-left: 1.5rem;
        }

        .sidebar-nav-item.active {
            background: #f0fdf4;
            color: #16a34a;
            font-weight: 600;
            border-left: 3px solid #22c55e;
            padding-left: calc(1.25rem - 3px);
        }

        .sidebar-nav-item svg {
            width: 16px;
            height: 16px;
            flex-shrink: 0;
            opacity: 0.7;
        }

        .sidebar-nav-item.logout-item {
            color: #ef4444;
        }

        .sidebar-nav-item.logout-item:hover {
            background: #fef2f2;
            color: #dc2626;
        }

        /* ── Main Content ── */
        .profile-main {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .profile-card {
            background: #fff;
            border-radius: 14px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.07);
            border: 1px solid #e5e7eb;
            padding: 2rem 2.25rem;
            animation: fadeUp 0.3s ease;
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(10px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .profile-card-title {
            font-size: 1.2rem;
            font-weight: 700;
            color: #111827;
            margin: 0 0 1.5rem;
            padding-bottom: 0.75rem;
            border-bottom: 2px solid #f3f4f6;
        }

        /* ── Form Fields ── */
        .form-group {
            margin-bottom: 1.25rem;
        }

        .form-label {
            display: block;
            font-size: 0.85rem;
            font-weight: 600;
            color: #374151;
            margin-bottom: 0.45rem;
        }

        .form-label .required {
            color: #ef4444;
            margin-left: 2px;
        }

        .form-input {
            width: 100%;
            padding: 0.65rem 0.9rem;
            border: 1.5px solid #e5e7eb;
            border-radius: 9px;
            font-size: 0.9rem;
            font-family: 'Inter', sans-serif;
            color: #111827;
            background: #fff;
            transition: border-color 0.18s ease, box-shadow 0.18s ease;
            outline: none;
            box-sizing: border-box;
        }

        .form-input:focus {
            border-color: #22c55e;
            box-shadow: 0 0 0 3px rgba(34,197,94,0.12);
        }

        .form-input::placeholder { color: #9ca3af; }

        .form-input:disabled {
            background: #f9fafb;
            color: #6b7280;
            cursor: not-allowed;
        }

        .form-error {
            font-size: 0.8rem;
            color: #ef4444;
            margin-top: 0.35rem;
        }

        /* ── Buttons ── */
        .btn-save {
            background: #22c55e;
            color: #fff;
            font-size: 0.9rem;
            font-weight: 600;
            padding: 0.6rem 1.75rem;
            border-radius: 9px;
            border: none;
            cursor: pointer;
            transition: background 0.2s ease, transform 0.15s ease, box-shadow 0.2s ease;
            box-shadow: 0 3px 10px rgba(34,197,94,0.3);
        }

        .btn-save:hover {
            background: #16a34a;
            transform: translateY(-1px);
            box-shadow: 0 5px 14px rgba(34,197,94,0.4);
        }

        .btn-save:active { transform: translateY(0); }

        .btn-danger {
            background: #ef4444;
            color: #fff;
            font-size: 0.9rem;
            font-weight: 600;
            padding: 0.6rem 1.75rem;
            border-radius: 9px;
            border: none;
            cursor: pointer;
            transition: background 0.2s ease, transform 0.15s ease, box-shadow 0.2s ease;
            box-shadow: 0 3px 10px rgba(239,68,68,0.25);
        }

        .btn-danger:hover {
            background: #dc2626;
            transform: translateY(-1px);
            box-shadow: 0 5px 14px rgba(239,68,68,0.35);
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        /* ── Success message ── */
        .success-msg {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            font-size: 0.82rem;
            color: #16a34a;
            font-weight: 500;
            margin-left: 1rem;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .success-msg.show { opacity: 1; }

        /* ── Responsive ── */
        @media (max-width: 768px) {
            .profile-layout {
                grid-template-columns: 1fr;
            }

            .profile-card {
                padding: 1.5rem 1.25rem;
            }

            .form-row {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <div class="profile-page">
        <div class="profile-container">

            {{-- Breadcrumb --}}
            <div class="breadcrumb">
                <a href="{{ url('/') }}">Home</a>
                <span>/</span>
                <span>Account Settings</span>
            </div>

            <div class="profile-layout">

                {{-- ── Sidebar ── --}}
                <div class="profile-sidebar">

                    {{-- Avatar Card --}}
                    <div class="sidebar-avatar-card">
                        <form method="POST" action="{{ route('profile.avatar') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="avatar-wrapper">
                                @if(Auth::user()->profile_photo)
                                    <img src="{{ asset('storage/avatars/' . Auth::user()->profile_photo) }}" 
                                        alt="Avatar" class="avatar-img">
                                @else
                                    <div class="avatar-placeholder">
                                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                    </div>
                                @endif
                            </div>

                            <label for="avatar-input" class="btn-change-avatar">
                                Change Profile Picture
                            </label>

                            <input type="file" name="avatar" id="avatar-input" 
                                style="display:none"
                                accept="image/*"
                                onchange="this.form.submit()">
                        </form>
                    </div>

                    {{-- Nav Card --}}
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
                            <button type="submit" class="sidebar-nav-item logout-item" style="width:100%; background:none; text-align:left; border:none; cursor:pointer; font-family:inherit;"> 
                                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"> 
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/> 
                                </svg> Logout 
                            </button> 
                    </form>
                    </div>

                </div>

                {{-- ── Main Content ── --}}
                <div class="profile-main">

                    {{-- My Profile Form --}}
                    <div class="profile-card">
                        <h3 class="profile-card-title">My Profile</h3>
                        @include('profile.partials.update-profile-information-form')
                    </div>

                    {{-- Change Password --}}
                    <div class="profile-card">
                        <h3 class="profile-card-title">Change Password</h3>
                        @include('profile.partials.update-password-form')
                    </div>

                    {{-- Delete Account --}}
                    <div class="profile-card">
                        <h3 class="profile-card-title" style="color:#ef4444;">Danger Zone</h3>
                        @include('profile.partials.delete-user-form')
                    </div>

                </div>
            </div>

        </div>
    </div>

    {{-- Override default Breeze form styles to match our design --}}
    <style>
        /* Override Breeze/Tailwind input styles inside our cards */
        .profile-card input[type="text"],
        .profile-card input[type="email"],
        .profile-card input[type="password"],
        .profile-card input[type="tel"] {
            width: 100%;
            padding: 0.65rem 0.9rem;
            border: 1.5px solid #e5e7eb !important;
            border-radius: 9px !important;
            font-size: 0.9rem;
            font-family: 'Inter', sans-serif;
            color: #111827;
            background: #fff;
            transition: border-color 0.18s ease, box-shadow 0.18s ease;
            outline: none;
            box-shadow: none !important;
            box-sizing: border-box;
        }

        .profile-card input:focus {
            border-color: #22c55e !important;
            box-shadow: 0 0 0 3px rgba(34,197,94,0.12) !important;
        }

        .profile-card label {
            display: block;
            font-size: 0.85rem;
            font-weight: 600;
            color: #374151;
            margin-bottom: 0.45rem;
        }

        .profile-card button[type="submit"] {
            background: #22c55e !important;
            color: #fff !important;
            font-size: 0.9rem;
            font-weight: 600;
            padding: 0.6rem 1.75rem;
            border-radius: 9px !important;
            border: none;
            cursor: pointer;
            transition: background 0.2s ease, transform 0.15s ease, box-shadow 0.2s ease;
            box-shadow: 0 3px 10px rgba(34,197,94,0.3);
        }

        .profile-card button[type="submit"]:hover {
            background: #16a34a !important;
            transform: translateY(-1px);
            box-shadow: 0 5px 14px rgba(34,197,94,0.4);
        }

        /* Danger zone delete button */
        .profile-card .danger-btn button[type="submit"],
        .profile-card button[type="submit"].danger {
            background: #ef4444 !important;
            box-shadow: 0 3px 10px rgba(239,68,68,0.25);
        }

        .profile-card button[type="submit"].danger:hover {
            background: #dc2626 !important;
        }

        .profile-card .text-gray-600 { color: #6b7280 !important; }
        .profile-card .text-sm { font-size: 0.875rem; }
        .profile-card p.mt-1 { margin-top: 0.35rem; }
        .profile-card section { max-width: 100% !important; }
        .profile-card .space-y-6 > * + * { margin-top: 1.25rem; }
        .profile-card .mt-4 { margin-top: 1.25rem; }
        .profile-card .flex { display: flex; }
        .profile-card .items-center { align-items: center; }
        .profile-card .gap-4 { gap: 1rem; }
    </style>

@endsection
