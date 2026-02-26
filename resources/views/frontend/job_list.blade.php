@extends('template.template')

@section('pagecontent')

<!-- Jobs Start -->
<div class="container-xxl py-5">
    <div class="container">
        <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Job Listing</h1>

        <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
            <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                <li class="nav-item">
                    <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 active" data-bs-toggle="pill" href="#tab-1">
                        <h6 class="mt-n1 mb-0">All Jobs</h6>
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    @forelse($jobs as $job)
                        <div class="job-item p-4 mb-4">
                            <div class="row g-4">

                                {{-- Job Info --}}
                                <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid border rounded" 
                                         src="{{ $job->company_logo ?? asset('frontend/img/default-logo.jpg') }}" 
                                         alt="{{ $job->company }}" 
                                         style="width: 80px; height: 80px;">
                                    <div class="text-start ps-4">
                                        <h5 class="mb-3">{{ $job->title }}</h5>
                                        <span class="text-truncate me-3">
                                            <i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $job->location }}
                                        </span>
                                        <span class="text-truncate me-3">
                                            <i class="far fa-clock text-primary me-2"></i>{{ ucfirst($job->job_type) }}
                                        </span>
                                        <span class="text-truncate me-0">
                                            <i class="far fa-money-bill-alt text-primary me-2"></i>${{ $job->salary_min }} - ${{ $job->salary_max }}
                                        </span>
                                    </div>
                                </div>

                                {{-- Actions --}}
                                <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                    <div class="d-flex mb-3">

                                        {{-- Save / Unsave Button --}}
                                        <a href="#"
                                           onclick="event.preventDefault(); document.getElementById('save-job-{{ $job->id }}').submit();"
                                           class="btn btn-sm {{ in_array($job->id, $savedJobIds) ? 'btn-danger' : 'btn-light btn-square me-3' }}">
                                            <i class="far fa-heart text-primary"></i> {{ in_array($job->id, $savedJobIds) ? 'Unsave' : 'Save' }}
                                        </a>
                                        <form id="save-job-{{ $job->id }}" action="{{ route('seeker.jobs.save', $job) }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>

                                        {{-- Apply Button --}}
                                        @if(in_array($job->id, $appliedJobIds))
                                            <button class="btn btn-success btn-sm" disabled>Applied</button>
                                        @else
                                            <form method="POST" action="{{ route('seeker.jobs.apply', $job) }}">
                                                @csrf
                                                <button type="submit" class="btn btn-primary btn-sm">Apply Now</button>
                                            </form>
                                        @endif
                                    </div>

                                    {{-- Deadline --}}
                                    <small class="text-truncate">
                                        <i class="far fa-calendar-alt text-primary me-2"></i>
                                        Deadline: {{ \Carbon\Carbon::parse($job->deadline)->format('d M, Y') }}
                                    </small>
                                </div>

                            </div>
                        </div>
                    @empty
                        <div class="alert alert-info">No jobs available at the moment.</div>
                    @endforelse

                    {{-- Pagination --}}
                    <div class="mt-3">
                        {{ $jobs->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Jobs End -->

@endsection