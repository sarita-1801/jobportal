@extends('layouts.admin')

@section('pagecontent')

<div class="row g-4">

    {{-- Total Users --}}
    <div class="col-md-3">
        <div class="card shadow-sm border-0 card-stat">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="text-muted">Total Users</h6>
                    <h3 class="fw-bold">{{ $totalUsers }}</h3>
                </div>
                <div class="text-success fs-2">
                    <i class="bi bi-people"></i>
                </div>
            </div>
        </div>
    </div>

    {{-- Employers --}}
    <div class="col-md-3">
        <div class="card shadow-sm border-0 card-stat">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="text-muted">Employers</h6>
                    <h3 class="fw-bold">{{ $totalEmployers }}</h3>
                </div>
                <div class="text-primary fs-2">
                    <i class="bi bi-person-badge"></i>
                </div>
            </div>
        </div>
    </div>

    {{-- Jobs --}}
    <div class="col-md-3">
        <div class="card shadow-sm border-0 card-stat">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="text-muted">Jobs Posted</h6>
                    <h3 class="fw-bold">{{ $totalJobs }}</h3>
                </div>
                <div class="text-warning fs-2">
                    <i class="bi bi-briefcase"></i>
                </div>
            </div>
        </div>
    </div>

    {{-- Applications --}}
    <div class="col-md-3">
        <div class="card shadow-sm border-0 card-stat">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="text-muted">Applications</h6>
                    <h3 class="fw-bold">{{ $totalApplications }}</h3>
                </div>
                <div class="text-danger fs-2">
                    <i class="bi bi-file-earmark-text"></i>
                </div>
            </div>
        </div>
    </div>

</div>

{{-- Overview Section --}}
<div class="mt-5">
    <h5 class="fw-semibold mb-3">System Overview</h5>
    <div class="card shadow-sm border-0">
        <div class="card-body text-muted">
            Welcome to <strong>Jobify Admin Panel</strong>.  
            Here you can manage:
            <ul class="mt-3">
                <li>✔ User accounts</li>
                <li>✔ Employer registrations</li>
                <li>✔ Job postings</li>
                <li>✔ Applications monitoring</li>
            </ul>
        </div>
    </div>
</div>

@endsection
