{{-- Validation Errors --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="mb-3">
    <label class="form-label">Job Title</label>
    <input type="text"
           name="title"
           class="form-control"
           value="{{ old('title', $job->title ?? '') }}"
           required>
</div>

<div class="mb-3">
    <label class="form-label">Company</label>
    <input type="text"
           name="company"
           class="form-control"
           value="{{ old('company', $job->company ?? '') }}"
           required>
</div>

<div class="mb-3">
    <label class="form-label">Location</label>
    <input type="text"
           name="location"
           class="form-control"
           value="{{ old('location', $job->location ?? '') }}"
           required>
</div>

<div class="mb-3">
    <label class="form-label">Job Type</label>
    <select name="job_type" class="form-select" required>
        @php
            $selectedType = old('job_type', $job->job_type ?? '');
        @endphp
        <option value="">-- Select Type --</option>
        <option value="full-time" {{ $selectedType == 'full-time' ? 'selected' : '' }}>Full Time</option>
        <option value="part-time" {{ $selectedType == 'part-time' ? 'selected' : '' }}>Part Time</option>
        <option value="contract" {{ $selectedType == 'contract' ? 'selected' : '' }}>Contract</option>
        <option value="internship" {{ $selectedType == 'internship' ? 'selected' : '' }}>Internship</option>
    </select>
</div>

<div class="mb-3">
    <label class="form-label">Salary</label>
    <input type="number"
           name="salary"
           class="form-control"
           step="0.01"
           value="{{ old('salary', $job->salary ?? '') }}">
</div>

<div class="mb-3">
    <label class="form-label">Description</label>
    <textarea name="description"
              class="form-control"
              rows="4"
              required>{{ old('description', $job->description ?? '') }}</textarea>
</div>

<div class="mb-3 form-check">
    <input type="checkbox"
           name="is_active"
           class="form-check-input"
           value="1"
           {{ old('is_active', $job->is_active ?? true) ? 'checked' : '' }}>
    <label class="form-check-label">
        Active
    </label>
</div>