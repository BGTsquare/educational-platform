<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('My Courses') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if($enrollments->isEmpty())
                        <p>You are not enrolled in any courses yet.</p>
                    @else
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($enrollments as $enrollment)
                                <div class="bg-gray-700 p-4 rounded-lg">
                                    <h3 class="font-bold text-lg">{{ $enrollment->course->title }}</h3>
                                    <p class="text-sm text-gray-400 mt-2">{{ Str::limit($enrollment->course->description, 100) }}</p>
                                    <a href="{{ route('student.courses.show', $enrollment->course->slug) }}" class="mt-4 inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                        Start Watching
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
