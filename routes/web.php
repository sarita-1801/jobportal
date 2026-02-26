<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\ApplicationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\JobDetailsController;
use App\Http\Controllers\JobListController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SeekerController;
use App\Http\Controllers\TestimonialController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Role-Based Controllers
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\JobController as AdminJobController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\ApplicationController as AdminApplicationController;
use App\Http\Controllers\Admin\EmployerController as AdminEmployerController;

use App\Http\Controllers\Employer\JobController as EmployerJobController;
use App\Http\Controllers\Seeker\DashboardController;
use App\Http\Controllers\Seeker\JobController as SeekerJobController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/aboutus', [AboutController::class, 'index'])->name('aboutus');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/category', [CategoryController::class, 'index'])->name('category');
Route::get('/job_details', [JobDetailsController::class, 'index'])->name('job_details');
Route::get('/job_list', [JobListController::class, 'index'])->name('job_list');
Route::get('/testimonials', [TestimonialController::class, 'index'])->name('testimonials');

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    // ---------------- PROFILE ----------------
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
    });

    Route::post('/profile/avatar', [ProfileController::class, 'updateAvatar'])->name('profile.avatar');
    

    // ================= ADMIN =================
    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {

        // Dashboard
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

        // Users
        Route::resource('users', AdminUserController::class);

        // Jobs
        Route::resource('jobs', AdminJobController::class);

        // Approve Job
        Route::patch('jobs/{job}/approve',
            [AdminJobController::class, 'approve'])
            ->name('jobs.approve');

        // Reject Job
        Route::patch('jobs/{job}/reject',
            [AdminJobController::class, 'reject'])
            ->name('jobs.reject');      

        // Applications (index, show, destroy only)
        Route::resource('applications', AdminApplicationController::class)->only(['index','show','destroy']);

        // Employers
        Route::resource('employers', AdminEmployerController::class);
    });

    // ================= EMPLOYER =================
    Route::middleware('role:employer')->prefix('employer')->name('employer.')->group(function () {

        // Dashboard (controller-driven)
        Route::get('/dashboard', [\App\Http\Controllers\Employer\DashboardController::class, 'index'])
            ->name('dashboard');

        // Jobs Management
        Route::resource('jobs', EmployerJobController::class);
       
        // View applications for a specific job
        Route::get('jobs/{job}/applications',
            [EmployerJobController::class, 'applications'])
            ->name('jobs.applications');

        // Update application status
        Route::patch('applications/{application}/status',
            [\App\Http\Controllers\Employer\ApplicationController::class, 'updateStatus'])
            ->name('applications.updateStatus');
    });

    // ================= SEEKER =================
    Route::middleware('role:seeker')->prefix('seeker')->name('seeker.')->group(function () {

        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Job Applications
        Route::get('jobs', [SeekerJobController::class, 'index'])->name('jobs.index');
        Route::post('jobs/{job}/apply', [SeekerJobController::class, 'apply'])->name('jobs.apply');

        // Save / Unsave Job
        Route::match(['get', 'post'], 'jobs/{job}/save', [SeekerJobController::class, 'toggleSave'])->name('jobs.save');

        //Applications
        Route::get('applications', [SeekerJobController::class, 'applications'])
        ->name('applications');

        // Saved Jobs
        Route::get('saved-jobs', [SeekerJobController::class, 'savedJobs'])->name('saved'); 
    });
});
require __DIR__.'/auth.php';
