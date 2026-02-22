@extends('layouts.app')

@section('pagecontent')
<div class="container">
    <h2>Job Listings</h2>

    @foreach($jobs as $job)
    <div class="card p-3 mb-2">
        <h4>{{ $job->title }}</h4>
        <p>{{ $job->description }}</p>

        <form action="{{ route('seeker.jobs.apply', $job->id) }}" method="POST" style="display:inline;">
            @csrf
            <button class="btn btn-primary" 
                    @if(in_array($job->id, $appliedJobIds)) disabled @endif>
                {{ in_array($job->id, $appliedJobIds) ? 'Applied' : 'Apply' }}
            </button>
        </form>

        <form action="{{ route('seeker.jobs.save', $job->id) }}" method="POST" style="display:inline;">
            @csrf
            <button class="btn btn-warning">
                {{ in_array($job->id, $savedJobIds) ? 'Unsave' : 'Save' }}
            </button>
        </form>
    </div>
    @endforeach

    {{ $jobs->links() }}
</div>
@endsection
