@extends('layouts.admin')

@section('content')

    <div class="container mx-auto mt-10">
        <!-- Modal toggle -->
        <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="text-white items-center bg-yellow-400 hover:bg-green-700 text-sm text-center font-medium py-2.5 px-5 rounded-lg" type="button">Creat new user</button>
        
        <h1 class="text-2xl font-bold mb-5 mt-5 text-center">Liste des utilisateurs</h1>

        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead>
                <tr>
                    <th class="border border-gray-300 px-4 py-2">#</th>
                    <th class="border border-gray-300 px-4 py-2">Nom</th>
                    <th class="border border-gray-300 px-4 py-2">Prénom</th>
                    <th class="border border-gray-300 px-4 py-2">Role</th>
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
                        <td class="border border-gray-300 px-4 py-2">{{ $user->role }}</td>
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
                            <i class="fas fa-eye hover:bg-gray-100 cursor-pointer" onclick="window.location='{{ route('users_show', $user->id) }}'"></i>
                            <a href="{{ route('users_edit', $user->id) }}">
                              <i class="fas fa-user-pen text-green-400 text-xl"></i>
                            </a>
                            <i class="fas fa-trash text-red-400 text-xl"></i>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @if ($users->hasPages())
        <div class="mt-5 flex justify-between">
          {{-- Previous Page Link --}}
          @if ($users->onFirstPage())
              <span class="px-4 py-2 bg-gray-200 text-gray-500 cursor-not-allowed rounded">Previous</span>
          @else
              <a href="{{ $users->previousPageUrl() }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">< Previous</a>
          @endif
             
          {{-- Next Page Link --}}
          @if ($users->hasMorePages())
              <a href="{{ $users->nextPageUrl() }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Next ></a>
          @else
              <span class="px-4 py-2 bg-gray-200 text-gray-500 cursor-not-allowed rounded">Next</span>
          @endif
        @endif
      </div>
    </div>

  <!-- Main modal -->
  <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full mt-10">
    <div class="relative p-4 w-full max-w-4xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Add new user</h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Cancel</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5" action="{{ route('users_store') }}" method="POST">
                @csrf
                <div class="flex flex-row gap-4 justify-between">
                    <!-- User Information Card -->
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-1/2">
                      <h3 class="text-lg font-medium text-gray-900 dark:text-white">Personal Information</h3>
                      <div class="mt-4 space-y-4">
                        <div>
                          <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">First Name <span class="text-red-700">*</span></label>
                          <input id="name" name="name" type="text" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        </div>
                        <div>
                          <label for="lastname" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Last Name</label>
                          <input id="lastname" name="lastname" type="text" class="mt-1 block w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        </div>
                        <div>
                          <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Phone</label>
                          <input id="phone" name="phone" type="text" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        </div>
                        <div>
                          <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email Address <span class="text-red-700">*</span></label>
                          <input id="email" name="email" type="email" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        </div>
                        <div>
                          <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password <span class="text-red-700">*</span></label>
                          <input id="password" name="password" type="password" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        </div>
                        <div>
                            <label for="role" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Role <span class="text-red-700">*</span></label>
                            <select name="role" id="role" type="text" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                <option value="admin">Administrator</option>
                                <option value="owner">Owners</option>
                                <option value="user">Users</option>
                            </select>
                          </div>
                      </div>
                    </div>
            
                    <!-- Address Information Card -->
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-1/2">
                      <h3 class="text-lg font-medium text-gray-900 dark:text-white">Address Information</h3>
                      <div class="mt-4 space-y-4">
                        <div>
                          <label for="address_line_1" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Address N°1</span></label>
                          <input id="address_line_1" name="address_line_1" type="text" class="mt-1 block w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        </div>
                        <div>
                          <label for="address_line_2" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Address N°2</label>
                          <input id="address_line_2" name="address_line_2" type="text"class="mt-1 block w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        </div>
                        <div>
                          <label for="city" class="block text-sm font-medium text-gray-700 dark:text-gray-300">City</span></label>
                          <input id="city" name="city" type="text" class="mt-1 block w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        </div>
                        <div>
                          <label for="state" class="block text-sm font-medium text-gray-700 dark:text-gray-300">State</span></label>
                          <input id="state" name="state" type="text" class="mt-1 block w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        </div>
                        <div>
                          <label for="postal_code" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Postale Code</label>
                          <input id="postal_code" name="postal_code" type="text" class="mt-1 block w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        </div>
                        <div>
                          <label for="country" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Country</span></label>
                          <input id="country" name="country" type="text" class="mt-1 block w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        </div>
                      </div>
                    </div>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="text-white items-center bg-yellow-400 hover:bg-green-700 text-sm text-center font-medium py-2 px-5 rounded-lg mt-5">Add new users</button>
                </div>
            </form>
        </div>
    </div>
  </div> 
@endsection

<script>
  document.addEventListener("DOMContentLoaded", function(event) {
    document.getElementById('defaultModalButton').click();
  });
</script>
