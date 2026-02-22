@extends('template.template')

@section('pagecontent')
<div class="container mt-4">
    <h2>Post New Job</h2>

    <div class="card mt-3">
        <div class="card-body">

            <form action="{{ route('employer.jobs.store') }}" method="POST">
                @csrf

                @include('employer.jobs._form')

                <button type="submit" class="btn btn-primary">
                    Post Job
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