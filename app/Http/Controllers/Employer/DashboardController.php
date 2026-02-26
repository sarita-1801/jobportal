<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\Application;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $employerId = auth()->id();

        // Total jobs
        $totalJobs = Job::where('employer_id', $employerId)->count();

        // Pending jobs
        $pendingJobs = Job::where('employer_id', $employerId)
                            ->where('status', 'pending')
                            ->count();

        // Approved jobs
        $approvedJobs = Job::where('employer_id', $employerId)
                            ->where('status', 'approved')
                            ->count();

        // Total applications for employer jobs
        $totalApplications = Application::whereHas('job', function ($query) use ($employerId) {
                $query->where('employer_id', $employerId);
            })->count();

        // Recent applications
        $recentApplications = Application::whereHas('job', function ($query) use ($employerId) {
                $query->where('employer_id', $employerId);
            })
            ->with(['job', 'seeker'])
            ->latest()
            ->take(5)
            ->get();

        return view('employer.dashboard', compact(
            'totalJobs',
            'pendingJobs',
            'approvedJobs',
            'totalApplications',
            'recentApplications'
        ));
    }
}
