<x-guest-layout>
  <div class="bg-gray-100 dark:bg-gray-900 flex items-center justify-center py-8 px-4 md:px-8 lg:px-4">
    <div class="w-full max-w-4xl space-y-4">
      <h2 class="text-center text-3xl font-extrabold text-gray-900 dark:text-white">Register</h2>
      <form method="POST" action="{{ route('register') }}" class="space-y-6">
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
                <input id="phone" name="phone" type="text" class="mt-1 block w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white">
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
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Confirm Password <span class="text-red-700">*</span></label>
                <input id="password-confirmation"  name="password_confirmation" type="password" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white">
              </div>
              <div>
                <label for="remember_token" class="inline-flex items-center">
                    <input id="remember_token" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember_token">
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
              </div>
            </div>
          </div>
  
          <!-- Address Information Card -->
          <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-1/2">
            <h3 class="text-lg font-medium text-gray-900 dark:text-white">Address Information</h3>
            <div class="mt-4 space-y-4">
              <div>
                <label for="address_line_1" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Address N°1 <span class="text-red-700">*</span></label>
                <input id="address_line" name="address_line_1" type="text" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white">
              </div>
              <div>
                <label for="address_line_2" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Address N°2</label>
                <input id="address_line" name="address_line_2" type="text"class="mt-1 block w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white">
              </div>
              <div>
                <label for="city" class="block text-sm font-medium text-gray-700 dark:text-gray-300">City <span class="text-red-700">*</span></label>
                <input id="city" name="city" type="text" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white">
              </div>
              <div>
                <label for="state" class="block text-sm font-medium text-gray-700 dark:text-gray-300">State <span class="text-red-700">*</span></label>
                <input id="state" name="state" type="text" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white">
              </div>
              <div>
                <label for="postal_code" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Postale Code</label>
                <input id="postal_code" name="postal_code" type="text" class="mt-1 block w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white">
              </div>
              <div>
                <label for="country" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Country <span class="text-red-700">*</span></label>
                <input id="country" name="country" type="text" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white">
              </div>
            </div>
          </div>
        </div>
  
        <!-- Submit Button -->
        <div class="mt-6 flex justify-between">
          <a class="underline text-indigo-600 transform motion-safe:hover:-translate-y-1 motion-safe:hover:scale-110 transition ease-in-out duration-300" href="{{ route('login') }}">Avais déjà une compte</a>
          <button type="submit" class="px-6 py-2 bg-teal-400 text-white rounded-lg hover:bg-teal-600 focus:ring focus:ring-teal-300 transform motion-safe:hover:-translate-y-1 motion-safe:hover:scale-110 transition ease-in-out duration-300">Register</button>
        </div>
      </form>
    </div>
  </div>
</x-guest-layout>
