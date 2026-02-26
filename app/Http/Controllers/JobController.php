<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $jobs = Job::query()
            ->where('status', 'approved')
            ->where('is_active', true)
            ->when($request->location, fn($q) =>
                $q->where('location', $request->location))
            ->when($request->job_type, fn($q) =>
                $q->where('job_type', $request->job_type))
            ->latest()
            ->paginate(10);

        return view('jobs.index', compact('jobs'));
    }

    // public function show(Job $job)
    // {
    //     if ($job->status !== 'approved' || !$job->is_active) {
    //         abort(404);
    //     }

    //     return view('jobs.show', compact('job'));
    // }   
}
