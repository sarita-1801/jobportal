<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function apply(Request $request, Job $job)
    {
        $request->validate([
            'resume' => 'required|mimes:pdf,doc,docx|max:2048'
        ]);

        $resumePath = $request->file('resume')
                              ->store('resumes', 'public');

        Application::create([
            'job_id' => $job->id,
            'seeker_id' => auth()->id(),
            'resume' => $resumePath,
            'status' => 'submitted'
        ]);

        return back()->with('success', 'Application submitted successfully.');
    }
}
