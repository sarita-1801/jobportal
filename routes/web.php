<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobDetailsController;
use App\Http\Controllers\JobListController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestimonialController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

//Public routes 
Route::get('/',[HomeController::class,'index'])->name('home');

Route::get('/aboutus',[AboutController::class,'index'])->name('aboutus');

Route::get('/contact',[ContactController::class,'index'])->name('contact');

Route::get('/category',[CategoryController::class,'index'])->name('category');

Route::get('/job_details',[JobDetailsController::class,'index'])->name('job_details');

Route::get('/job_list',[JobListController::class,'index'])->name('job_list');

Route::get('/testimonials',[TestimonialController::class,'index'])->name('testimonials');

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // --- JOBSEEKER ROUTES --- //
    Route::middleware('role:seeker')->group(function () {
        Route::get('/seeker/dashboard', [SeekerController::class, 'dashboard'])->name('seeker.dashboard');
        Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index'); // Apply for jobs
    });

    // --- EMPLOYER ROUTES --- //
    Route::middleware('role:employer')->group(function () {
        Route::get('/employer/dashboard', [EmployerController::class, 'dashboard'])->name('employer.dashboard');
        Route::get('/jobs/create', [JobController::class, 'create'])->name('jobs.create'); // Post a job
        Route::post('/jobs/store', [JobController::class, 'store'])->name('jobs.store');
        Route::get('/employer/jobs', [JobController::class, 'employerJobs'])->name('employer.jobs'); // Employer job list
    });

    // --- ADMIN ROUTES --- //
    Route::middleware('role:admin')->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/admin/jobs', [AdminController::class, 'jobs'])->name('admin.jobs'); // Manage all jobs
        Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users'); // Manage users
    });
});




require __DIR__.'/auth.php';
