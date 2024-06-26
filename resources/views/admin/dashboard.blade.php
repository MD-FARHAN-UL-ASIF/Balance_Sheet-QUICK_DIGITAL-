<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 grid-cols-6 text-center">
                    {{-- <p class="text-lg">{{ __("You're logged in!") }}</p> --}}
                    <a href="{{ route('admin.balanceSheet') }}" class="inline-block text-gray-900 dark:text-gray-100 py-2 px-4 rounded-md transition duration-300 ease-in-out mt-4 font-bold text-xl">Balance Sheets</a>
                </div>

                <div class="p-6 text-gray-900 dark:text-gray-100 grid-cols-6 text-center">
                    <a href="{{ route('admin.register') }}" class="inline-block text-gray-900 dark:text-gray-100 py-2 px-4 rounded-md transition duration-300 ease-in-out mt-4 ml-4 font-bold text-xl">Register New User</a>
                </div>

                <div class="p-6 text-gray-900 dark:text-gray-100 grid-cols-6 text-center">
                    <a href="{{ route('admin.all_users') }}" class="inline-block text-gray-900 dark:text-gray-100 py-2 px-4 rounded-md transition duration-300 ease-in-out mt-4 ml-4 font-bold text-xl">View All Users</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
