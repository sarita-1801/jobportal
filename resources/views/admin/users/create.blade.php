@extends('layouts.admin')

@section('pagecontent')
<div class="mb-3">
    <h4>Create User</h4>
</div>

<form action="{{ route('admin.users.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email') }}">
        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Role</label>
        <select name="role" class="form-select">
            <option value="user" {{ old('role')=='user'?'selected':'' }}>User</option>
            <option value="employer" {{ old('role')=='employer'?'selected':'' }}>Employer</option>
            <option value="admin" {{ old('role')=='admin'?'selected':'' }}>Admin</option>
        </select>
        @error('role') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control">
        @error('password') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Confirm Password</label>
        <input type="password" name="password_confirmation" class="form-control">
    </div>

    <button class="btn btn-success">Create User</button>
    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Back</a>
</form>
@endsection
