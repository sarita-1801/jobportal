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
        $jobs = Auth::user()->jobs()->latest()->paginate(5);
        return view('employer.jobs.index', compact('jobs'));
    }

    public function create()
    {
        return view('employer.jobs.create');
    }

    public function store(StoreJobRequest $request)
    {
        $data = $request->validated();
        $data['is_active'] = $request->has('is_active');

        Auth::user()->jobs()->create($data);

        return redirect()
            ->route('employer.jobs.index')
            ->with('success', 'Job posted successfully.');
    }

    public function edit(Job $job)
    {
        $this->authorizeJob($job);
        return view('employer.jobs.edit', compact('job'));
    }

    public function update(UpdateJobRequest $request, Job $job)
    {
        $this->authorizeJob($job);

        $data = $request->validated();

        $data['is_active'] = $request->has('is_active');

        $job->update($data);

        return redirect()
            ->route('employer.jobs.index')
            ->with('success', 'Job updated successfully.');
    }

    public function destroy(Job $job)
    {
        $this->authorizeJob($job);
        $job->delete();

        return back()->with('success', 'Job deleted successfully.');
    }

    private function authorizeJob(Job $job)
    {
        if ($job->employer_id !== Auth::id()) {
            abort(403);
        }
    }
}
