<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index() {
        $jobs = Job::with('employer')->paginate(10);
        return view('admin.jobs.index', compact('jobs'));
    }

    public function create() {
        $employers = User::where('role','employer')->get();
        return view('admin.jobs.create', compact('employers'));
    }

    public function store(Request $request) {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'employer_id'=>'required|exists:users,id'
        ]);

        Job::create($request->only(['title','description','employer_id']));
        return redirect()->route('admin.jobs.index')->with('success','Job created');
    }

    public function edit(Job $job) {
        $employers = User::where('role','employer')->get();
        return view('admin.jobs.edit', compact('job','employers'));
    }

    public function update(Request $request, Job $job) {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'employer_id'=>'required|exists:users,id'
        ]);

        $job->update($request->only(['title','description','employer_id']));
        return redirect()->route('admin.jobs.index')->with('success','Job updated');
    }

    public function destroy(Job $job) {
        $job->delete();
        return redirect()->route('admin.jobs.index')->with('success','Job deleted');
    }
}
