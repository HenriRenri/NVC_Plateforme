@extends('layouts.admin')

@section('content')
    <div class="container mx-auto mt-10">

        <button data-modal-target="create-category-modal" data-modal-toggle="create-category-modal" class="text-white items-center bg-yellow-600 hover:bg-green-700 text-sm text-center font-medium py-4 px-6 rounded-lg" type="button">New categoris</button>

        <h1 class="text-2xl font-bold mt-5 text-center">Liste categoris</h1>
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
                    <div class="text-tiny">Categories listes</div>
                </li>
            </ul>
        </div>

        @if (session('categories_success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-4" role="alert">
                <span class="block sm:inline">{{ session('categories_success') }}</span>
            </div>
        @endif

        <table class="table-auto w-full border-collapse border border-gray-300 mt-5">
            <thead>
                <tr>
                    <th class="border border-gray-300 px-4 py-2">#</th>
                    <th class="border border-gray-300 px-4 py-2">Nom</th>
                    <th class="border border-gray-300 px-4 py-2">Image</th>
                    <th class="border border-gray-300 px-4 py-2">Description</th>
                    <th class="border border-gray-300 px-4 py-2">Date de creation</th>
                    <th class="border border-gray-300 px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($categories as $categori)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2 ">{{ $categori->id }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ substr($categori->name, 0, 2)}}...</td>
                        <td class="border border-gray-300 px-4 py-2">{{ substr($categori->description, 0, 1)}}... {{ substr($categori->description, -2) }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $categori->image_path }}</td>                           
                       <td class="border border-gray-300 px-4 py-2">{{ $categori->created_at->format('d/m/Y') }}</td>
                        <td class="border border-gray-300 px-4 py-2 ">
                            <div class="flex justify-between items-center">
                            <div class="text-gray-400">
                                <i class="fa fa-eye cursor-pointer" onclick="window.location=''"></i>
                            </div>
                            <div class="text-green-400">
                                <a href="#">
                                <i class="fa fa-user-pen  text-xl"></i>
                                </a>
                            </div>
                            <div class="text-red-400">
                                <button id="deleteButton" data-modal-target="deleteModal" data-modal-toggle="deleteModal"  type="button">
                                <i class="fa fa-trash"></i>
                                </button>
                            </div>
                            </div>
                        </td>
                    </tr>

                    <!-- Delete modal -->
                    <div id="deleteModal-{{$categoriser->name}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                        <!-- Modal content -->
                        <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                            <button type="button" class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="deleteModal-{{$categorier->name}}">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                            <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                            <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to delete {{$categori->name}}'s count?</p>
                            <div class="flex justify-center items-center space-x-4">
                                <button data-modal-toggle="deleteModal-{{$categori->name}}" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                    No, cancel
                                </button>
                                <form action="{{ route('delete', $categori->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                        Yes, I'm sure
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    </div>
                <!-- Delete modal -->
                @endforeach
            </tbody>
        </table>

        @if ($categories->hasPages())
            <div class="mt-5 flex justify-between">
            {{-- Previous Page Link --}}
            @if ($categories->onFirstPage())
                <span class="px-4 py-2 bg-gray-200 text-gray-500 cursor-not-allowed rounded">Previous</span>
            @else
                <a href="{{ $categories->previousPageUrl() }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">< Previous</a>
            @endif

            {{-- Next Page Link --}}
            @if ($categories->hasMorePages())
                <a href="{{ $categories->nextPageUrl() }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Next ></a>
            @else
                <span class="px-4 py-2 bg-gray-200 text-gray-500 cursor-not-allowed rounded">Next</span>
            @endif
            </div>
        @endif
    </div>

    <!-- Modal de création de catégorie -->
    <div id="create-category-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full mt-10">
        <div class="relative p-4 w-full max-w-4xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Ajouter une nouvelle catégorie</h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="create-category-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Fermer</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="p-4 md:p-5" action="{{ route('categories_store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="flex flex justify-center">
                        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-full">
                            <h3 class="text-lg font-medium text-gray-900 dark:text-white">Informations de la catégorie</h3>
                            <div class="mt-4 space-y-4">
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nom de la catégorie<span class="text-red-700">*</span></label>
                                    <input id="name" name="name" type="text" value="{{old('name')}}" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                </div>
                                @error('name')
                                    <span class="alert alert-danger text-center">{{$message}}</span>
                                @enderror
                                <div>
                                    <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
                                    <textarea id="description" name="description" class="mt-1 block w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white" rows="3"></textarea>
                                </div>
                                @error('description')
                                    <span class="alert alert-danger text-center">{{$message}}</span>
                                @enderror
                                <div class="flex items-center justify-center w-full">
                                    <label for="image" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        <div class="item" id="imagepreview" style="display: none">
                                            <img src="" alt="">
                                        </div>
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                            </svg>
                                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Cliquez pour télécharger</span> ou glissez-déposez</p>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG ou GIF (MAX. 800x400px)</p>
                                        </div>
                                        <input id="myImage" name="image" type="file" accept="image/*" />
                                    </label>
                                </div>
                                @error('image')
                                    <span class="alert alert-danger text-center">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="text-white items-center bg-yellow-400 hover:bg-green-700 text-sm text-center font-medium py-2 px-5 rounded-lg mt-5">Ajouter la catégorie</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
<script>
        // Gestion des modals
    document.addEventListener('DOMContentLoaded', function() {
        // Pour tous les boutons avec data-modal-toggle
        const modalToggles = document.querySelectorAll('[data-modal-toggle]');
        modalToggles.forEach(toggle => {
            toggle.addEventListener('click', function() {
                const modalId = toggle.getAttribute('data-modal-toggle');
                const modal = document.getElementById(modalId);
                
                if (modal) {
                    // Si le modal est caché, on l'affiche, sinon on le cache
                    if (modal.classList.contains('hidden')) {
                        modal.classList.remove('hidden');
                        modal.classList.add('flex');
                    } else {
                        modal.classList.add('hidden');
                        modal.classList.remove('flex');
                    }
                }
            });
        });
        
        // Fermeture des modals en cliquant à l'extérieur
        const modals = document.querySelectorAll('[id$="-modal"]');
        modals.forEach(modal => {
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    modal.classList.add('hidden');
                    modal.classList.remove('flex');
                }
            });
        });
    });

    // Prévisualisation de l'image uploadée (optionnel)
    $(function(){
        $("#myImage").on("change", function(e){
            const photoInput = $("#myImage");
            const [file] = this.files;
            if (condition) {
                $("#imagepreview img").attr('src',URL.createObjectURL(file));
                $("#magepreview").show();
            }
        });
    });
</script>