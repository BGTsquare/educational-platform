<x-guest-layout>
    {{-- Hero Section --}}
    <div class="bg-gray-800 text-white py-20">
        <div class="container mx-auto text-center">
            <h1 class="text-5xl font-bold">Welcome to EduPlatform</h1>
            <p class="text-xl mt-4">Your journey to knowledge starts here. Find the best online courses.</p>
        </div>
    </div>

    {{-- Courses Grid --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center text-gray-800 dark:text-gray-200 mb-8">Our Courses</h2>

            @if($courses->isEmpty())
                <p class="text-center text-gray-500">No courses are available at the moment. Please check back later.</p>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($courses as $course)
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg flex flex-col">
                            <div class="p-6 text-gray-900 dark:text-gray-100 flex-grow">
                                <h3 class="font-bold text-xl">{{ $course->title }}</h3>
                                <p class="text-sm text-gray-400 mt-2">{{ Str::limit($course->description, 150) }}</p>
                            </div>
                            <div class="p-6 bg-gray-700/50 flex justify-between items-center">
                                <span class="font-bold text-lg text-blue-500">{{ number_format($course->price, 2) }} ETB</span>
                                {{-- Link will take user to the course purchase/view page. If not logged in, they will be prompted to log in first. --}}
                                <a href="{{ route('student.courses.show', $course->slug) }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Learn More
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-guest-layout>
