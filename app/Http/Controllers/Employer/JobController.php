<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Auth::user()->jobs()->latest()->get();
        return view('employer.jobs.index', compact('jobs'));
    }

    public function create()
    {
        return view('employer.jobs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'company'=>'required',
            'location'=>'required',
            'job_type'=>'required',
            'description'=>'required',
        ]);

        Auth::user()->jobs()->create($request->all());

        return redirect()->route('employer.jobs.index')->with('success','Job Posted');
    }
}
