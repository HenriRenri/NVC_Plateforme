@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($categories as $category)
        <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
            <!-- Image -->
            <div class="relative h-48">
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
        @endforeach
    </div>
</div>
@endsection