<?php

use App\Http\Controllers\AboutController;
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


// Route::get('/', function () {
//     return view('welcome');
// });
//Public routes
Route::get('/',[HomeController::class,'index'])->name('home');

Route::get('/aboutus',[AboutController::class,'index'])->name('aboutus');

Route::get('/contact',[ContactController::class,'index'])->name('contact');

Route::get('/category',[CategoryController::class,'index'])->name('category');

Route::get('/job_details',[JobDetailsController::class,'index'])->name('job_details');

Route::get('/job_list',[JobListController::class,'index'])->name('job_list');

Route::get('/testimonials',[TestimonialController::class,'index'])->name('testimonials');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




require __DIR__.'/auth.php';
