@extends('layouts.admin')

@section('content')

    <div class="container mx-auto mt-10">
        <!-- Modal toggle -->
        <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="bg-yellow-400 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full" type="button">
          Toggle modal
        </button>
        
        <h1 class="text-2xl font-bold mb-5 mt-5 text-center">Liste des utilisateurs</h1>

        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead>
                <tr>
                    <th class="border border-gray-300 px-4 py-2">#</th>
                    <th class="border border-gray-300 px-4 py-2">Nom</th>
                    <th class="border border-gray-300 px-4 py-2">Prénom</th>
                    <th class="border border-gray-300 px-4 py-2">Téléphone</th>
                    <th class="border border-gray-300 px-4 py-2">Email</th>
                    <th class="border border-gray-300 px-4 py-2">Adresse 1</th>
                    <th class="border border-gray-300 px-4 py-2">Adresse 2</th>
                    <th class="border border-gray-300 px-4 py-2">Ville</th>
                    <th class="border border-gray-300 px-4 py-2">Region</th>
                    <th class="border border-gray-300 px-4 py-2">Code postal</th>
                    <th class="border border-gray-300 px-4 py-2">Pays</th>
                    <th class="border border-gray-300 px-4 py-2">Date de création</th>
                    <th class="border border-gray-300 px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($users as $user)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2 ">{{ $user->id }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ substr($user->name, 0, 2)}}...</td>
                        <td class="border border-gray-300 px-4 py-2">{{ substr($user->lastname, 0, 1)}}... {{ substr($user->lastname, -2) }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ substr($user->phone, 0, 3)}}... {{ substr($user->phone, -2) }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ substr($user->email, 0, 3)}}... {{ substr($user->email, -4) }}</td>                            
                        @foreach ($user->address as $adrs)
                            <td class="border border-gray-300 px-4 py-2">{{ substr($adrs->address_line_1, 0, 5) }}...{{ substr($adrs->address_line_1, -5) }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ substr($adrs->address_line_2, 0, 5) }}...{{ substr($adrs->address_line_2, -5) }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ substr($adrs->city, 0, 2) }}...{{ substr($adrs->city, -2) }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ substr($adrs->state, 0, 2) }}...{{ substr($adrs->state, -3) }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $adrs->postal_code }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $adrs->country }}</td>
                        @endforeach 
                        <td class="border border-gray-300 px-4 py-2">{{ $user->created_at->format('d/m/Y') }}</td>
                        <td class="border border-gray-300 px-4 py-2 ">
                            <i class="fas fa-eye hover:bg-gray-100 cursor-pointer" onclick="window.location='{{ route('users_boards_show', $user->id) }}'"></i>
                            <i class="fas fa-user-pen text-green-400 text-xl"></i>
                            <i class="fas fa-trash text-red-400 text-xl"></i>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-5">
            {{ $users->links() }} {{-- Affiche la pagination --}}
        </div>
    </div>

  <!-- Main modal -->
  <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Create New Product
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5">
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required="">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                        <input type="number" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="$2999" required="">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                        <select id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected="">Select category</option>
                            <option value="TV">TV/Monitors</option>
                            <option value="PC">PC</option>
                            <option value="GA">Gaming/Console</option>
                            <option value="PH">Phones</option>
                        </select>
                    </div>
                    <div class="col-span-2">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Description</label>
                        <textarea id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write product description here"></textarea>                    
                    </div>
                </div>
                <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    Add new product
                </button>
            </form>
        </div>
    </div>
</div> 
@endsection

@push('scripts')
document.addEventListener("DOMContentLoaded", function(event) {
    document.getElementById('defaultModalButton').click();
    });
@endpush
