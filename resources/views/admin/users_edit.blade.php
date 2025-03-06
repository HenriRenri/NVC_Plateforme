@extends('layouts.admin')

@section('content')
    <div class="bg-gray-100 dark:bg-gray-900 flex items-center justify-center py-8 px-4 md:px-8 lg:px-4">
        <div class="w-full max-w-6xl space-y-4">
            <div class="relative bg-white rounded-lg shadow-md dark:bg-gray-700 space-rx-5 mt-4">
                <h2 class="text-center text-3xl font-extrabold text-gray-900 dark:text-white">Update users informations</h2>
                <form action="{{ route('users_update', $user->id) }}" method="POST">
                    @csrf
                    <div class="flex flex-row gap-4 justify-between mt-5 px-5">
                        <div class="bg-white dark:bg-gray-800 p-2 rounded-lg shadow-lg w-1/2">
                            <h2 class="text-center text-lg font-medium text-gray-900 dark:text-white">Personnal information</h2>
                            <div class="mt-4 space-y-4 mb-8">
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">First Name</label>
                                    <input id="name" name="name" type="text" value="{{ $user->name }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                </div>
                                <div>
                                    <label for="lastname" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Last Name</label>
                                    <input id="lastname" name="lastname" type="text" value="{{ $user->lastname }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                </div>
                                <div>
                                    <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Phone</label>
                                    <input id="phone" name="phone" type="text" value="{{ $user->phone }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                </div>
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email Address</label>
                                    <input id="email" name="email" type="email" value="{{ $user->email }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                </div>
                                <div>
                                    <label for="role" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Role</label>
                                    <select name="role" id="role" class="mt-1 block w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                        @foreach ($user as $users)
                                            <option value="">{{ $users->role }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white dark:bg-gray-800 p-2 rounded-lg shadow-lg w-1/2">
                            <h3 class="text-center text-lg font-medium text-gray-900 dark:text-white">Address Information</h3>
                            <div class="mt-4 space-y-4 mb-8">
                            <div>
                                <label for="address_line_1" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Address N°1</label>
                                <input id="address_line" name="address_line_1" type="text" class="mt-1 block w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                            </div>
                            <div>
                                <label for="address_line_2" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Address N°2</label>
                                <input id="address_line" name="address_line_2" type="text"class="mt-1 block w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                            </div>
                            <div>
                                <label for="city" class="block text-sm font-medium text-gray-700 dark:text-gray-300">City</label>
                                <input id="city" name="city" type="text" class="mt-1 block w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                            </div>
                            <div>
                                <label for="state" class="block text-sm font-medium text-gray-700 dark:text-gray-300">State</label>
                                <input id="state" name="state" type="text" class="mt-1 block w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                            </div>
                            <div>
                                <label for="postal_code" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Postale Code</label>
                                <input id="postal_code" name="postal_code" type="text" class="mt-1 block w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                            </div>
                            <div>
                                <label for="country" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Country</label>
                                <input id="country" name="country" type="text" class="mt-1 block w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6 flex justify-end px-6">
                        <button type="submit" class=" mb-5 px-6 py-2 bg-teal-400 text-white rounded-lg hover:bg-teal-600 focus:ring focus:ring-teal-300 transform motion-safe:hover:-translate-y-1 motion-safe:hover:scale-110 transition ease-in-out duration-300">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
