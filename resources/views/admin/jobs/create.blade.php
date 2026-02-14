@extends('layouts.admin')

@section('pagecontent')
<h4>Create Job</h4>

<form action="{{ route('admin.jobs.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label class="form-label">Job Title</label>
        <input type="text" name="title" class="form-control" value="{{ old('title') }}">
        @error('title') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Employer</label>
        <select name="employer_id" class="form-select">
            @foreach($employers as $employer)
                <option value="{{ $employer->id }}" {{ old('employer_id')==$employer->id?'selected':'' }}>
                    {{ $employer->name }}
                </option>
            @endforeach
        </select>
        @error('employer_id') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
        @error('description') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <button class="btn btn-success">Create Job</button>
    <a href="{{ route('admin.jobs.index') }}" class="btn btn-secondary">Back</a>
</form>
@endsection
