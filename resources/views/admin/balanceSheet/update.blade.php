<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Balance Sheet') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('admin.balanceSheet.update', $balance->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Date</label>
                            <input type="date" name="date" id="date" class="form-input mt-1 block rounded-md text-black" value="{{ $balance->date }}">
                        </div>
<div class="grid grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label for="particular" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Particular</label>
                            <input type="text" name="particular" id="particular" class="form-input mt-1 block w-full rounded-md text-black" value="{{ $balance->particular }}">
                        </div>

                        <div class="mb-4">
                            <label for="quantity" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Quantity</label>
                            <input type="number" name="quantity" id="quantity" class="form-input mt-1 block w-full rounded-md text-black" value="{{ $balance->quantity }}">
                        </div>
</div>
<div class="grid grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label for="revenue" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Revenue</label>
                            <input type="number" name="revenue" id="revenue" class="form-input mt-1 block w-full rounded-md text-black" value="{{ $balance->revenue }}">
                        </div>

                        <div class="mb-4">
                            <label for="expense" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Expense</label>
                            <input type="number" name="expense" id="expense" class="form-input mt-1 block w-full rounded-md text-black" value="{{ $balance->expense }}">
                        </div>
</div>
                        <div class="mb-4 mb-4 flex justify-center">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-gray-900 dark:text-gray-100 py-2 px-4 rounded-md transition duration-300 ease-in-out">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
