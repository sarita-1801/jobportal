@extends('layouts.app')
@section('content')
<h2>Welcome, {{ $user->name }}</h2>
<h4>Your Posted Jobs:</h4>
<ul>
@foreach($jobs as $job)
<li>{{ $job->title }} (Status: {{ $job->status }})</li>
@endforeach
</ul>
<a href="{{ route('jobs.create') }}" class="btn btn-primary">Post a Job</a>
@endsection
