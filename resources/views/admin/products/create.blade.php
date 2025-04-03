@extends('layouts.admin')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Add new productst</h1>
            <a href="{{ route('products') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg">
                Retour à la liste
            </a>
        </div>

        @if ($errors->any())
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="flex items-center flex-wrap justify-end">
            <ul class="flex items-center flex-wrap justify-start gap10">
                <li>
                    <a href="{{ route('admin') }}">
                        <div class="text-tiny">Dashboard</div>
                    </a>
                </li>
                <li>
                    <svg class="icon-slash" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                      <path d="M4 20L20 4" />
                     </svg>
                </li>
                <li>
                    <a href="{{ route('products') }}">
                        <div class="text-tiny">Products</div>
                    </a>
                </li>
                <li>
                  <svg class="icon-slash" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 20L20 4" />
                   </svg>
                </li>
                <li>
                    <div class="text-tiny">Add products</div>
                </li>
            </ul>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6">
            <form action="{{ route('products_store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Nom du produit -->
                    <div class="col-span-2">
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nom du produit *</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" required
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                    </div>

                    <!-- Description -->
                    <div class="col-span-2">
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                        <textarea name="description" id="description" rows="4"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">{{ old('description') }}</textarea>
                    </div>

                    <!-- Prix -->
                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Prix *</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500">€</span>
                            <input type="number" name="price" id="price" value="{{ old('price') }}" step="0.01" min="0" required
                                class="w-full pl-8 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                        </div>
                    </div>

                    <!-- Stock -->
                    <div>
                        <label for="stock" class="block text-sm font-medium text-gray-700 mb-1">Stock *</label>
                        <input type="number" name="stock" id="stock" value="{{ old('stock', 0) }}" min="0" required
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                    </div>

                    <!-- Box ID (À commenter si nécessaire) -->
                    <div>
                        <label for="box_id" class="block text-sm font-medium text-gray-700 mb-1">Box associée *</label>
                        <input type="number" name="boxes_id" id="boxes_id" value="{{ old('box_id') }}" required
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                        <p class="text-xs text-gray-500 mt-1">Entrez l'ID de la box (temporaire jusqu'à la création du modèle Box)</p>
                    </div>

                    <!-- Catégorie -->
                    <div>
                        <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1">Catégorie</label>
                        <select name="category_id" id="category_id"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                            <option value="">Aucune catégorie</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Statut -->
                    <div class="col-span-2">
                        <label class="flex items-center">
                            <input type="checkbox" name="is_active" value="1" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" {{ old('is_active', 1) ? 'checked' : '' }}>
                            <span class="ml-2 text-sm text-gray-700">Produit actif</span>
                        </label>
                    </div>

                    <!-- Images -->
                    <div class="col-span-2">
                        <label for="images" class="block text-sm font-medium text-gray-700 mb-1">Images du produit</label>
                        <input type="file" name="images[]" id="images" multiple accept="image/*"
                            class="w-full block text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                        <p class="text-xs text-gray-500 mt-1">Vous pouvez sélectionner plusieurs images (JPG, PNG, GIF). La première sera définie comme image par défaut.</p>
                    </div>
                </div>

                <div class="mt-8 flex justify-end">
                    <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-lg">
                        Enregistrer le produit
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection