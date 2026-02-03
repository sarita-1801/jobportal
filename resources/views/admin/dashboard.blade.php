@extends('layouts.admin')

@section('pagecontent')

<div class="row g-4">

    {{-- Total Users --}}
    <div class="col-md-3">
        <div class="card shadow-sm card-stat">
            <div class="card-body">
                <h6 class="text-muted">Total Users</h6>
                <h3 class="fw-bold">{{ $totalUsers }}</h3>
            </div>
        </div>
    </div>

    {{-- Employers --}}
    <div class="col-md-3">
        <div class="card shadow-sm card-stat">
            <div class="card-body">
                <h6 class="text-muted">Employers</h6>
                <h3 class="fw-bold">{{ $totalEmployers }}</h3>
            </div>
        </div>
    </div>

    {{-- Jobs --}}
    <div class="col-md-3">
        <div class="card shadow-sm card-stat">
            <div class="card-body">
                <h6 class="text-muted">Jobs Posted</h6>
                <h3 class="fw-bold">{{ $totalJobs }}</h3>
            </div>
        </div>
    </div>

    {{-- Applications --}}
    <div class="col-md-3">
        <div class="card shadow-sm card-stat">
            <div class="card-body">
                <h6 class="text-muted">Applications</h6>
                <h3 class="fw-bold">{{ $totalApplications }}</h3>
            </div>
        </div>
    </div>

</div>

{{-- Future Section --}}
<div class="mt-5">
    <h5 class="fw-semibold mb-3">Overview</h5>
    <div class="card shadow-sm">
        <div class="card-body text-muted">
            Jobify admin panel lets you manage users, employers, jobs and applications dynamically.
        </div>
    </div>
</div>

@endsection