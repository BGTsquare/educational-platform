<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $course->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    {{-- YouTube Video Embed --}}
                    <div class="aspect-w-16 aspect-h-9">
                        <iframe src="{{ $course->youtube_embed_url }}"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen
                                class="w-full h-full">
                        </iframe>
                    </div>

                    {{-- Course Description --}}
                    <div class="mt-8">
                        <h3 class="text-xl font-bold">About this course</h3>
                        <div class="prose dark:prose-invert mt-4">
                            {!! $course->description !!}
                        </div>
                    </div>

                    {{-- Downloadable Materials --}}
                    @if($course->materials->count() > 0)
                        <div class="mt-8">
                            <h3 class="text-xl font-bold">Course Materials</h3>
                            <ul class="list-disc list-inside mt-4 space-y-2">
                                @foreach($course->materials as $material)
                                    <li>
                                        <a href="#" class="text-blue-500 hover:underline">
                                            {{ $material->file_name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
