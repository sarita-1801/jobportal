@extends('template.template')

@section('pagecontent')

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Employer Dashboard</h2>
        <a href="{{ route('employer.jobs.create') }}" class="btn btn-primary">
            + Post New Job
        </a>
    </div>

    <!-- Stats Cards -->
    <div class="row g-4">

        <div class="col-md-3">
            <div class="card shadow border-0 rounded-4">
                <div class="card-body text-center">
                    <i class="bi bi-briefcase fs-1 text-primary"></i>
                    <h6 class="mt-3">Total Jobs</h6>
                    <h2 class="fw-bold">{{ $totalJobs }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow border-0 rounded-4 bg-warning text-white">
                <div class="card-body text-center">
                    <i class="bi bi-clock fs-1"></i>
                    <h6 class="mt-3">Pending Jobs</h6>
                    <h2 class="fw-bold">{{ $pendingJobs }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow border-0 rounded-4 bg-success text-white">
                <div class="card-body text-center">
                    <i class="bi bi-check-circle fs-1"></i>
                    <h6 class="mt-3">Approved Jobs</h6>
                    <h2 class="fw-bold">{{ $approvedJobs }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow border-0 rounded-4 bg-info text-white">
                <div class="card-body text-center">
                    <i class="bi bi-people fs-1"></i>
                    <h6 class="mt-3">Applications</h6>
                    <h2 class="fw-bold">{{ $totalApplications }}</h2>
                </div>
            </div>
        </div>

    </div>

    <!-- Recent Applications -->
    <div class="card shadow border-0 rounded-4 mt-5">
        <div class="card-header bg-white border-0">
            <h5 class="fw-bold">Recent Applications</h5>
        </div>

        <div class="card-body">

            <table class="table align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Candidate</th>
                        <th>Job</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($recentApplications as $application)
                        <tr>
                            <td>
                                <strong>{{ $application->seeker->name }}</strong>
                            </td>

                            <td>{{ $application->job->title }}</td>

                            <td>
                                @if($application->status == 'submitted')
                                    <span class="badge bg-secondary">Submitted</span>
                                @elseif($application->status == 'reviewed')
                                    <span class="badge bg-primary">Reviewed</span>
                                @elseif($application->status == 'shortlisted')
                                    <span class="badge bg-warning text-dark">Shortlisted</span>
                                @elseif($application->status == 'accepted')
                                    <span class="badge bg-success">Accepted</span>
                                @else
                                    <span class="badge bg-danger">Rejected</span>
                                @endif
                            </td>

                            <td>{{ $application->created_at->diffForHumans() }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">
                                No applications yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>

        </div>
    </div>

</div>

@endsection