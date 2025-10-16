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
                    <h3 class="text-2xl font-bold">{{ $course->title }}</h3>
                    <div class="mt-4">
                        {!! $course->description !!}
                    </div>
                    <div class="mt-6 text-3xl font-bold text-blue-500">
                        Price: {{ number_format($course->price, 2) }} ETB
                    </div>

                    {{-- Payment Logic --}}
                    <div class="mt-6">
                        <h4 class="font-semibold">Pay with Telebirr:</h4>
                        @php
                            // IMPORTANT: Replace 'YOUR_RECEIVER_CODE' with the actual merchant code if required by the deep link format.
                            // The format can vary. This is a generic example.
                            $telebirrLink = "telebirr://pay?amount={$course->price}&receiver_code=YOUR_RECEIVER_CODE&order_id=" . uniqid();
                        @endphp
                        <a href="{{ $telebirrLink }}" class="mt-2 inline-block bg-purple-600 hover:bg-purple-700 text-white font-bold py-3 px-6 rounded text-lg">
                            Buy Now with Telebirr
                        </a>
                        <p class="text-sm mt-2 text-gray-400">After payment, an admin will verify your transaction and grant you access.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
