<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Eager load the course data for efficiency
        $enrollments = Auth::user()->enrollments()->with('course')->get();
        
        return view('student.dashboard', compact('enrollments'));
    }
}
