<?php

namespace App\Http\Controllers\Seeker;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $applicationsCount = Application::where('user_id', $user->id)->count();
        $savedJobsCount = Job::whereHas('savedByUsers', function($q) use ($user){
            $q->where('user_id', $user->id);
        })->count();

        return view('seeker.dashboard', compact('applicationsCount', 'savedJobsCount'));
    }
}
