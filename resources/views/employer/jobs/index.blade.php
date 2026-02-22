@extends('template.template')

@section('pagecontent')
<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>My Jobs</h2>
        <a href="{{ route('employer.jobs.create') }}" class="btn btn-primary">
            + Post New Job
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($jobs->count())
        <div class="card">
            <div class="table-responsive">
                <table class="table table-bordered mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Title</th>
                            <th>Company</th>
                            <th>Location</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th width="180">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jobs as $job)
                            <tr>
                                <td>{{ $job->title }}</td>
                                <td>{{ $job->company }}</td>
                                <td>{{ $job->location }}</td>
                                <td>{{ ucfirst($job->job_type) }}</td>
                                <td>
                                    @if($job->is_active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('employer.jobs.edit', $job) }}"
                                       class="btn btn-sm btn-warning">
                                        Edit
                                    </a>

                                    <form action="{{ route('employer.jobs.destroy', $job) }}"
                                          method="POST"
                                          class="d-inline"
                                          onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-sm btn-danger">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-3">
            {{ $jobs->links() }}
        </div>
    @else
        <div class="alert alert-info">
            You have not posted any jobs yet.
        </div>
    @endif

</div>
@endsection