<?php

namespace App\Http\Controllers\Seeker;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    // Show all jobs
    public function index()
    {
        $jobs = Job::latest()->paginate(10);
        $user = Auth::user();
        $savedJobIds = $user->savedJobs()->pluck('jobs.id')->toArray();
        $appliedJobIds = $user->applications()->pluck('job_id')->toArray();

        return view('seeker.jobs.index', compact('jobs', 'savedJobIds', 'appliedJobIds'));
    }

    // Apply to a job
    public function apply(Job $job)
    {
        $user = Auth::user();

        // Prevent duplicate application
        if (!$user->applications()->where('job_id', $job->id)->exists()) {
            Application::create([
                'job_id' => $job->id,
                'user_id' => $user->id,
                'status' => 'applied',
            ]);
        }

        return redirect()->back()->with('success', 'Applied to job successfully.');
    }

    // Save / Unsave job
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

        return redirect()->back()->with('success', $message);
    }
}
