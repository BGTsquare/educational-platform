<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Material;
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

    /**
     * Download a protected course material via signed URL.
     */
    public function downloadMaterial(Material $material)
    {
        // Optional Security Check: Ensure the user is enrolled in the course this material belongs to.
        $isEnrolled = Auth::user()
            ->enrollments()
            ->where('course_id', $material->course_id)
            ->exists();

        if (!$isEnrolled) {
            abort(403, 'You are not enrolled in this course.');
        }

        // Return the file from our protected storage for download
        return response()->download(storage_path('app/' . $material->file_path), $material->file_name);
    }
}
