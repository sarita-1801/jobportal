@extends('layouts.admin')

@section('pagecontent')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Employers</h4>
    <a href="{{ route('admin.employers.create') }}" class="btn btn-success">+ Add Employer</a>
</div>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Registered At</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($employers as $employer)
        <tr>
            <td>{{ $loop->iteration + ($employers->currentPage()-1) * $employers->perPage() }}</td>
            <td>{{ $employer->name }}</td>
            <td>{{ $employer->email }}</td>
            <td>{{ $employer->created_at->format('d M, Y') }}</td>
            <td>
                <a href="{{ route('admin.employers.edit', $employer->id) }}" class="btn btn-sm btn-primary">Edit</a>
                <form action="{{ route('admin.employers.destroy', $employer->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this employer?');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center text-muted">No employers found.</td>
        </tr>
        @endforelse
    </tbody>
</table>

<!-- Pagination Links -->
<div class="d-flex justify-content-center mt-3">
    {{ $employers->links() }}
</div>
@endsection
