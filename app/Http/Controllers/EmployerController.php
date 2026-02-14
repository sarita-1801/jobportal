<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployerController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user(); // Get logged-in employer

        // Fetch jobs posted by this employer
        $jobs = Job::where('employer_id', $user->id)->paginate(10);

        return view('employer.dashboard', compact('user', 'jobs'));
    }

    // Admin - list all employers
    public function index()
    {
        // Example: fetch all employers for admin
        $employers = \App\Models\User::where('role', 'employer')->paginate(10);
        return view('admin.employers.index', compact('employers'));
    }

    public function create()
    {
        return view('admin.employers.create');
    }

    public function store(Request $request)
    {
        // Store employer logic
    }

    public function show($id)
    {
        $employer = \App\Models\User::findOrFail($id);
        return view('admin.employers.show', compact('employer'));
    }

    public function edit($id)
    {
        $employer = \App\Models\User::findOrFail($id);
        return view('admin.employers.edit', compact('employer'));
    }

    public function update(Request $request, $id)
    {
        // Update employer logic
    }

    public function destroy($id)
    {
        // Delete employer logic
    }
}
