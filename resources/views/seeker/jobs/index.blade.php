@extends('template.template')

@section('pagecontent')
<div class="container mt-4">

    <h2 class="mb-4">Available Jobs</h2>

    {{-- Flash Messages --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @forelse($jobs as $job)
        <div class="card mb-3">
            <div class="card-body">

                <h4>{{ $job->title }}</h4>
                <p class="mb-1"><strong>Company:</strong> {{ $job->company }}</p>
                <p class="mb-1"><strong>Location:</strong> {{ $job->location }}</p>
                <p class="mb-2"><strong>Type:</strong> {{ ucfirst($job->job_type) }}</p>

                {{-- Apply Button --}}
                @if(in_array($job->id, $appliedJobIds))
                    <button class="btn btn-success btn-sm" disabled>Applied</button>
                @else
                    <form method="POST" action="{{ route('seeker.jobs.apply', $job) }}" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-primary btn-sm">Apply</button>
                    </form>
                @endif

                {{-- Save / Unsave Button using hidden POST form --}}
                <a href="#"
                   onclick="event.preventDefault(); document.getElementById('save-job-{{ $job->id }}').submit();"
                   class="btn btn-sm {{ in_array($job->id, $savedJobIds) ? 'btn-danger' : 'btn-outline-secondary' }}">
                    {{ in_array($job->id, $savedJobIds) ? 'Unsave' : 'Save' }}
                </a>

                <form id="save-job-{{ $job->id }}" action="{{ route('seeker.jobs.save', $job) }}" method="POST" style="display: none;">
                    @csrf
                </form>

            </div>
        </div>
    @empty
        <div class="alert alert-info">No jobs available at the moment.</div>
    @endforelse

    <div class="mt-3">
        {{ $jobs->links() }}
    </div>

</div>
@endsection