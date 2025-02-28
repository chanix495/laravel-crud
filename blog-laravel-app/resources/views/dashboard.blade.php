@extends('layouts.app')

@section('dashboard')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __('Dashboard') }}
                    </h2>
                    <p>{{ __("You're logged in!") }}</p>
                </div>

                <!-- Manage Blogs Button -->
                <div class="p-6 text-center">
                    <a href="{{ route('blogs.index') }}" 
                        class="px-4 py-2 bg-blue-500 text-black font-semibold rounded-lg hover:bg-blue-700 transition duration-300">
                        Manage Blogs
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
