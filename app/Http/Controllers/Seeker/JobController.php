<?php

namespace App\Http\Controllers\Seeker;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $jobs = Job::where('is_active',1)
            ->when($request->keyword, fn($q)=>
                $q->where('title','like','%'.$request->keyword.'%')
            )
            ->latest()->get();

        return view('seeker.jobs.index', compact('jobs'));
    }

    public function apply(Job $job)
    {
        Application::create([
            'job_id' => $job->id,
            'seeker_id' => Auth::id(),
        ]);

        return back()->with('success','Applied successfully');
    }
}
