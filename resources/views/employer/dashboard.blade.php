@extends('layouts.app')

@section('pagecontent')
<div class="container mt-4">
    <h2>Welcome, {{ $user->name }}</h2>

    <h4 class="mt-3">Your Posted Jobs:</h4>

    @if($jobs->count() > 0)
        <ul class="list-group mt-2">
            @foreach($jobs as $job)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $job->title }}
                    <span class="badge bg-{{ $job->status === 'active' ? 'success' : 'secondary' }}">
                        {{ ucfirst($job->status) }}
                    </span>
                </li>
            @endforeach
        </ul>

        <!-- Pagination links -->
        <div class="mt-3">
            {{ $jobs->links() }}
        </div>
    @else
        <p class="text-muted mt-2">You haven’t posted any jobs yet.</p>
    @endif

    <a href="{{ route('employer.jobs.create') }}" class="btn btn-primary mt-3">Post a Job</a>
</div>
@endsection
