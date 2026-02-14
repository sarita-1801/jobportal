@extends('layouts.admin')

@section('pagecontent')
<div class="mb-3">
    <h4>Edit User</h4>
</div>

<form action="{{ route('admin.users.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" name="name" class="form-control" value="{{ old('name',$user->name) }}">
        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email',$user->email) }}">
        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Role</label>
        <select name="role" class="form-select">
            <option value="user" {{ old('role',$user->role)=='user'?'selected':'' }}>User</option>
            <option value="employer" {{ old('role',$user->role)=='employer'?'selected':'' }}>Employer</option>
            <option value="admin" {{ old('role',$user->role)=='admin'?'selected':'' }}>Admin</option>
        </select>
        @error('role') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <button class="btn btn-primary">Update User</button>
    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Back</a>
</form>
@endsection
