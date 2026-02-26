<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function updateStatus(Request $request, Application $application)
    {
        $request->validate([
            'status' => 'required|in:reviewed,shortlisted,accepted,rejected'
        ]);

        $application->update([
            'status' => $request->status
        ]);

        return back()->with('success', 'Application status updated.');
    }
}
