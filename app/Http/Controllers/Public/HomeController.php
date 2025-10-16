<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;

class HomeController extends Controller
{
    /**
     * Display the homepage with a list of all courses.
     */
    public function index()
    {
        // Fetch all courses, ordered by the newest first
        $courses = Course::latest()->get();
        
        return view('home', compact('courses'));
    }
}

