@extends('layouts.admin')

@section('content')

    <div class="bg-gray-100 dark:bg-gray-900 flex items-center justify-center py-8 px-4 md:px-8 lg:px-4">
        <form class="p-4 md:p-5" action="{{ route('categories_update', $categories->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="flex flex justify-center">
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-full">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white">Informations de la catégorie</h3>
                    <div class="mt-4 space-y-4">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nom de la catégorie<span class="text-red-700">*</span></label>
                            <input id="name" name="name" type="text" value="{{ $categories->name }}" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        </div>
                        @error('name')
                            <span class="alert alert-danger text-center">{{$message}}</span>
                        @enderror
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
                            <textarea id="description" name="description" class="mt-1 block w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white" rows="3">{{ $categories->description }}</textarea>
                        </div>
                        @error('description')
                            <span class="alert alert-danger text-center">{{$message}}</span>
                        @enderror
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Image actuelle</label>
                                <div class="flex justify-center items-center">
                                    @if($categories->image_path)
                                        <img src="{{ asset('uploads/categories/' . $categories->image_path) }}" alt="{{ $categories->name }}" class="h-30 w-70 object-cover rounded-md mb-4">
                                    @else
                                        <p class="text-gray-500 dark:text-gray-400">Aucune image</p>
                                    @endif
                                </div>
                                <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mt-4">Nouvelle image (optionnel)</label>
                                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg">
                                    <div class="space-y-1 text-center">
                                        <div class="item" id="imagepreview" style="display: none">
                                            <img src="" alt="" class="mx-auto h-30 w-50 object-cover rounded-lg">
                                        </div>
                                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <div class="flex text-sm text-gray-600">
                                            <label for="image" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                <span>Télécharger un fichier</span>
                                                <input id="image" name="image" type="file" class="sr-only" accept="image/*">
                                            </label>
                                            <p class="pl-1">ou glisser-déposer</p>
                                        </div>
                                        <p class="text-xs text-gray-500">PNG, JPG, GIF jusqu'à 2MB</p>
                                    </div>
                                </div>
                            </div>
                        @error('image')
                            <span class="alert alert-danger text-center">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="text-white items-center bg-yellow-400 hover:bg-green-700 text-sm text-center font-medium py-2 px-5 rounded-lg mt-5">Update this information</button>
            </div>
        </form>
    </div>

@endsection

<script>
    
    document.addEventListener('DOMContentLoaded', function() {
        // Prévisualisation de l'image
        const imageInput = document.getElementById('image');
        if (imageInput) {
            imageInput.addEventListener('change', function() {
                const [file] = this.files;
                if (file) {
                    const imagePreview = document.getElementById('imagepreview');
                    const previewImg = imagePreview.querySelector('img');
                    previewImg.src = URL.createObjectURL(file);
                    imagePreview.style.display = 'block';
                }
            });
        }
    });

</script>