@extends('template.template')

@section('pagecontent')
<div class="profile-page">
    <div class="profile-container">

        {{-- Breadcrumb --}}
        <div class="breadcrumb">
            <a href="{{ url('/') }}">Home</a>
            <span>/</span>
            <span>Saved Jobs</span>
        </div>

        <div class="profile-layout">

            {{-- Sidebar --}}
            <div class="profile-sidebar">
                @include('profile.partials.sidebar') {{-- Use your existing sidebar partial --}}
            </div>

            {{-- Main Content --}}
            <div class="profile-main">

                <div class="profile-card">
                    <h3 class="profile-card-title">Saved Jobs</h3>

                    @if($jobs->count() > 0)
                        <ul class="space-y-4">
                            @foreach($jobs as $job)
                                <li class="p-4 border rounded-lg flex justify-between items-center bg-white shadow-sm">
                                    <div>
                                        <a href="{{ route('job_details', ['id' => $job->id]) }}" class="font-semibold text-gray-800 hover:text-green-600">
                                            {{ $job->title }}
                                        </a>
                                        <p class="text-gray-500 text-sm">{{ $job->company_name ?? 'Company Name' }}</p>
                                        <p class="text-gray-400 text-xs">{{ $job->location ?? 'Location' }}</p>
                                    </div>

                                    <div class="flex gap-2">
                                        {{-- Unsave Button --}}
                                        <form action="{{ route('seeker.jobs.save', $job->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn-danger text-sm px-3 py-1">
                                                Unsave
                                            </button>
                                        </form>

                                        {{-- View Job Details --}}
                                        <a href="{{ route('job_details', ['id' => $job->id]) }}" class="btn-save text-sm px-3 py-1">
                                            View
                                        </a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-gray-500 mt-4">You have not saved any jobs yet.</p>
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>
@endsection