@extends('layouts.admin')

@section('pagecontent')
<h4>Edit Employer</h4>

<form action="{{ route('admin.employers.update', $employer->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" name="name" class="form-control" value="{{ old('name',$employer->name) }}">
        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email',$employer->email) }}">
        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <button class="btn btn-primary">Update Employer</button>
    <a href="{{ route('admin.employers.index') }}" class="btn btn-secondary">Back</a>
</form>
@endsection
