<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalUsers' => User::count(),
            'totalJobs' => Job::count(),
            'totalApplications' => Application::count(),
            'totalEmployers' => User::where('role','employer')->count(),
        ]);
    }

    public function jobs()
    {
        $jobs = Job::with('employer','category')->get();
        return view('admin.jobs', compact('jobs'));
    }

    public function users()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }
}
