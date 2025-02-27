<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="bg-gray-100 dark:bg-gray-900 flex items-center justify-center py-8 px-4 md:px-8 lg:px-4">
        <div class="w-full max-w-xl space-y-4">
          <h2 class="text-center text-3xl font-extrabold text-gray-900 dark:text-white">Login</h2>
          <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf
              <!-- User Information Card -->
              <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg">
                <div class="mt-4 space-y-4">
                  <div>
                    <label for="login" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email, phone number or username<span class="text-red-700">*</span></label>
                    <input id="login" name="login" type="text" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white" value="{{ old('identifier') }}">
                  </div>
                  <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password <span class="text-red-700">*</span></label>
                    <input id="password" name="password" type="password" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                  </div>
                  <div>
                    <label for="remember_token" class="inline-flex items-center">
                        <input id="remember_token" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember_token">
                        <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
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
