<?php

namespace App\Http\Controllers\Seeker;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    // Show ACTIVE jobs only
    public function index()
    {
        $user = Auth::user();

        $jobs = Job::where('is_active', true)
                    ->latest()
                    ->paginate(10);

        $savedJobIds = $user->savedJobs()
                            ->pluck('jobs.id')
                            ->toArray();

        $appliedJobIds = $user->applications()
                              ->pluck('job_id')
                              ->toArray();

        return view('seeker.jobs.index', compact(
            'jobs',
            'savedJobIds',
            'appliedJobIds'
        ));
    }

    // Apply to Job
    public function apply(Request $request, Job $job)
    {
        $user = Auth::user();

        // Validate status input if you are accepting it from the request
        $request->validate([
            'status' => 'required|in:applied,pending,rejected',
        ]);

        if (!$job->is_active) {
            return back()->with('error', 'This job is no longer active.');
        }

        if ($user->applications()->where('job_id', $job->id)->exists()) {
            return back()->with('error', 'You have already applied to this job.');
        }

        Application::create([
            'job_id' => $job->id,
            'user_id' => $user->id,
            'status' => $request->status, // now validated safely
        ]);

        return back()->with('success', 'Application submitted successfully.');
    }

    // Save / Unsave Job
    public function toggleSave(Job $job)
    {
        $user = Auth::user();

        if ($user->savedJobs()->where('job_id', $job->id)->exists()) {

            $user->savedJobs()->detach($job->id);
            $message = 'Job removed from saved list.';

        } else {

            $user->savedJobs()->attach($job->id);
            $message = 'Job saved successfully.';
        }

        return back()->with('success', $message);
    }

    // View Applied Jobs
    public function applications()
    {
        $applications = Auth::user()
            ->applications()
            ->with('job')
            ->latest()
            ->paginate(10);

        return view('seeker.applications.index', compact('applications'));
    }

    // View Saved Jobs
    public function savedJobs()
    {
        $jobs = Auth::user()
            ->savedJobs()
            ->where('is_active', true)
            ->paginate(10);

        return view('seeker.saved_jobs', compact('jobs'));
    }
}
