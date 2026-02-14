@extends('layouts.admin')

@section('pagecontent')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Applications</h4>
</div>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Job Title</th>
            <th>Applicant</th>
            <th>Status</th>
            <th>Applied At</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($applications as $app)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $app->job->title ?? 'N/A' }}</td>
            <td>{{ $app->user->name ?? 'N/A' }}</td>
            <td>{{ ucfirst($app->status) }}</td>
            <td>{{ $app->created_at->format('d M, Y') }}</td>
            <td>
                <a href="{{ route('admin.applications.show', $app->id) }}" class="btn btn-sm btn-info">View</a>
                <form action="{{ route('admin.applications.destroy', $app->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this application?');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $applications->links() }}
@endsection
