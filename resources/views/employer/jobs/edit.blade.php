@extends('template.template')

@section('pagecontent')
<div class="container mt-4">
    <h2>Edit Job</h2>

    <div class="card mt-3">
        <div class="card-body">

            <form action="{{ route('employer.jobs.update', $job) }}"
                  method="POST">
                @csrf
                @method('PUT')

                @include('employer.jobs._form')

                <button type="submit" class="btn btn-success">
                    Update Job
                </button>

                <a href="{{ route('employer.jobs.index') }}"
                   class="btn btn-secondary">
                    Cancel
                </a>
            </form>

        </div>
    </div>
</div>
@endsection