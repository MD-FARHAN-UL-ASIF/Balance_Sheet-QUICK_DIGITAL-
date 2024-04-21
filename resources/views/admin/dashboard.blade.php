<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p class="text-lg">{{ __("You're logged in!") }}</p>
                    <a href="{{ route('admin.balanceSheet') }}" class="inline-block bg-blue-500 hover:bg-blue-600 text-white hover:text-gray-200 py-2 px-4 rounded-md transition duration-300 ease-in-out mt-4 font-bold text-xl">Balance Sheets</a>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
