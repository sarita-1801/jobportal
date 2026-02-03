<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\job;
use App\Models\Job as ModelsJob;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
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
