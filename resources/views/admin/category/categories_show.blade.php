@extends('layouts.admin')

@section('content')
    <div class="min-h-screen py-6 flex flex-col justify-center sm:py-12">
        <div class="relative py-3 sm:max-w-xl sm:mx-auto">
            <div class="absolute inset-0 bg-gradient-to-r from-blue-500 to-purple-500 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl"></div>
                <div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20">
                    <div class="container mx-auto px-4 py-8">
                        <div class="bg-gray rounded-2xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                            <!-- Image -->
                            <div class="relative h-60 w-full">
                                @if ($category->image_path)
                                <img 
                                    src="{{ asset('uploads/categories/' . $category->image_path) }}" 
                                    alt="{{ $category->name }}" 
                                    class="w-full h-full object-cover"
                                >
                                @else
                                <div class="w-full h-full bg-gray-200 flex items-center justify-center text-gray-500">
                                    Pas d'image
                                </div>
                                @endif
                            </div>
                            <!-- Content -->
                            <div class="p-6">
                                <h2 class="text-xl font-bold text-gray-800 truncate">{{ $category->name }}</h2>
                                <p class="mt-2 text-sm text-gray-600">{{ $category->description }}</p>
                                <div class="mt-4 flex justify-between items-center text-sm text-gray-500">
                                    <span>Date de création :</span>
                                    <time datetime="{{ $category->created_at }}">{{ $category->created_at->format('d M, Y') }}</time>
                                </div>
                            </div>  
                        </div>
                        <div class="pt-4 flex justify-end">
                            <a href="{{ route('category') }}" class="inline-block px-4 py-2 bg-green-500 text-white font-semibold rounded-lg shadow-md hover:bg-green-600">
                                Back to the liste category
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection