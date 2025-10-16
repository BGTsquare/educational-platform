<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
// Add these new imports
use App\Http\Controllers\Student\DashboardController;
use App\Http\Controllers\Student\CourseController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// --- ADD THE FOLLOWING NEW ROUTES ---

// Route group for all student-facing pages, requires login
Route::middleware(['auth', 'verified'])->prefix('student')->name('student.')->group(function () {
    // Student Dashboard - "My Courses"
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // View a specific course
    Route::get('/courses/{course:slug}', [CourseController::class, 'show'])->name('courses.show');
});
