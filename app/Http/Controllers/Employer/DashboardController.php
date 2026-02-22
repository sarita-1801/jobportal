<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $jobs = Job::where('user_id', $user->id)
                    ->latest()
                    ->paginate(5);

        return view('employer.dashboard', compact('user','jobs'));
    }
}
