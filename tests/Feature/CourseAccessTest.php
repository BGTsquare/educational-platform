<?php

namespace Tests\Feature;

use App\Models\Course;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CourseAccessTest extends TestCase
{
    use RefreshDatabase; // This trait resets the database for each test

    /**
     * Test that a guest cannot see a course purchase/content page.
     */
    public function test_guest_is_redirected_from_course_page_to_login(): void
    {
        // 1. Arrange: Create a course in the database to test against.
        $course = Course::factory()->create();

        // 2. Act: Attempt to visit the course page as a guest.
        $response = $this->get(route('student.courses.show', $course));

        // 3. Assert: Check that the response was a redirect to the login page.
        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    /**
     * Test that an authenticated user can see the course page.
     */
    public function test_authenticated_user_can_see_course_page(): void
    {
        // 1. Arrange: Create a user and a course.
        $user = User::factory()->create();
        $course = Course::factory()->create();

        // 2. Act: "Log in" as the user and visit the course page.
        $response = $this->actingAs($user)->get(route('student.courses.show', $course));

        // 3. Assert: Check that the page loaded successfully.
        $response->assertStatus(200);
        $response->assertSee($course->title); // Check if the course title is visible
    }
}
