<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\Support\Facades\Auth; 

class JobListController extends Controller
{
    public function index()
    {
        // Get all active jobs
        $jobs = Job::where('is_active', true)->latest()->paginate(10);

        // Get current user (if logged in)
        $user = Auth::user();

        // IDs of saved and applied jobs (for showing buttons correctly)
        $savedJobIds = $user ? $user->savedJobs()->pluck('jobs.id')->toArray() : [];
        $appliedJobIds = $user ? $user->applications()->pluck('job_id')->toArray() : [];

        // Pass all variables to view
        return view('frontend.job_list', compact('jobs', 'savedJobIds', 'appliedJobIds'));
    }
}
