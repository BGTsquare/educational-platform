<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
// Add these new imports
use App\Http\Controllers\Student\DashboardController;
use App\Http\Controllers\Student\CourseController;
use App\Http\Controllers\Public\HomeController; // <-- IMPORT THIS

// Public homepage route
Route::get('/', [HomeController::class, 'index'])->name('home');

// Note: Use the student dashboard controller for the authenticated /dashboard route
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// Route group for all student-facing pages, requires login
Route::middleware(['auth', 'verified'])->prefix('student')->name('student.')->group(function () {
    // This route is now redundant because '/dashboard' points to it. Keep for compatibility.
    // Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // View a specific course
    Route::get('/courses/{course:slug}', [CourseController::class, 'show'])->name('courses.show');

    // Secure material download route (requires signed URL and auth)
    Route::get('/materials/{material}/download', [CourseController::class, 'downloadMaterial'])
        ->name('materials.download')
        ->middleware('signed');
});
