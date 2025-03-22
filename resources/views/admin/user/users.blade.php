@extends('layouts.admin')

@section('content')

    <div class="container mx-auto mt-10">
        <!-- Modal toggle -->
        <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="text-white items-center bg-yellow-600 hover:bg-green-700 text-sm text-center font-medium py-2.5 px-5 rounded-lg" type="button">Creat new user</button>

        <h1 class="text-2xl font-bold mt-5 text-center">Liste des utilisateurs</h1>
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
                  <div class="text-tiny">Users listes</div>
              </li>
          </ul>
        </div>

        @if (session('creat_success'))
          <div class="bg-green-100 border border-green-400 text-green-700 text-center px-4 py-3 rounded relative mb-5" role="alert">
              <span class="block sm:inline">{{ session('creat_success') }}</span>
          </div>
        @endif
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 text-center px-4 py-3 rounded relative mb-5 " role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('update_success'))
          <div class="p-4 mb-4 text-sm text-green-800 text-center rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400">
              {{ session('update_success') }}
          </div>
        @endif

        @if(session('delete_success'))
          <div class="p-4 mb-4 text-sm text-red-800 text-center rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400">
              {{ session('delete_success') }}
          </div>
        @endif
          <table class="table-auto w-full border-collapse border border-gray-300 mt-5">
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
                        <td class="border border-gray-300 px-4 py-2">{{ $user->id }}</td>
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
                            <div class="flex justify-between items-center">
                              <div class="text-gray-400">
                                <i class="fa fa-eye cursor-pointer" onclick="window.location='{{ route('users_show', $user->id) }}'"></i>
                              </div>
                              <div class="text-green-400">
                                <a href="{{ route('users_edit', $user->id) }}">
                                  <i class="fa fa-user-pen  text-xl"></i>
                                </a>
                              </div>
                              <div class="text-red-400">
                                <button id="deleteButton-{{$user->name}}" data-modal-target="deleteModal-{{$user->name}}" data-modal-toggle="deleteModal-{{$user->name}}"  type="button">
                                  <i class="fa fa-trash"></i>
                                </button>
                              </div>
                            </div>
                        </td>
                    </tr>

                    <!-- Delete modal -->
                    <div id="deleteModal-{{$user->name}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                      <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                          <!-- Modal content -->
                          <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                              <button type="button" class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="deleteModal-{{$user->name}}">
                                  <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                  <span class="sr-only">Close modal</span>
                              </button>
                              <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                              <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to delete {{$user->name}}'s count?</p>
                              <div class="flex justify-center items-center space-x-4">
                                  <button data-modal-toggle="deleteModal-{{$user->name}}" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                      No, cancel
                                  </button>
                                  <form action="{{ route('users_delete', $user->id) }}" method="post">
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
            </div>
          @endif
    </div>

  <!-- Update modal -->
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
<!-- End Update modal!! -->

@endsection
  <script>
    document.addEventListener("DOMContentLoaded", function(event) {
      document.getElementById('defaultModalButton').click();
    });
  </script>
