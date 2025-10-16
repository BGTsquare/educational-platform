<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function show(Course $course)
    {
        // Check if the user is enrolled in this course
        $isEnrolled = Auth::user()
            ->enrollments()
            ->where('course_id', $course->id)
            ->exists();

        if ($isEnrolled) {
            // User is enrolled, show the course content view
            return view('student.courses.show_content', compact('course'));
        } else {
            // User is not enrolled, show the purchase page view
            return view('student.courses.show_purchase', compact('course'));
        }
    }
}
