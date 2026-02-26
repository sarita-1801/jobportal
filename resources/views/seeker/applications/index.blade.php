@extends('template.template')

@section('pagecontent') 
    <h2>My Applications</h2>

    @foreach($applications as $application)

        <div>
            <h4>{{ $application->job->title }}</h4>
            <p>Status: {{ $application->status }}</p>
        </div>

    @endforeach
@endsection
