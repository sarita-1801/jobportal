@extends('layouts.admin')

@section('pagecontent')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Jobs</h4>
    <a href="{{ route('admin.jobs.create') }}" class="btn btn-success">+ Add Job</a>
</div>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Employer</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($jobs as $job)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $job->title }}</td>
            <td>{{ $job->employer->name ?? 'N/A' }}</td>
            <td>{{ $job->created_at->format('d M, Y') }}</td>
            <td>
                <a href="{{ route('admin.jobs.edit', $job->id) }}" class="btn btn-sm btn-primary">Edit</a>
                <form action="{{ route('admin.jobs.destroy', $job->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this job?');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $jobs->links() }}
@endsection
