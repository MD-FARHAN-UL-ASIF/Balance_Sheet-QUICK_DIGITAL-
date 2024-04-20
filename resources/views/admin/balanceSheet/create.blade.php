<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('ADD ENTRY') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-center mb-4">
                        <h1 class="text-2xl font-bold">Balance Sheet X Quick Digital</h1>
                    <a href="{{ route('admin.balanceSheet') }}" class="inline-block bg-blue-500 text-white py-2 px-4 rounded-md mb-4 hover:bg-blue-600 transition duration-300 ease-in-out">Go Back</a>

                    </div>
                    <hr class="my-4">

                    @if (session()->has('error'))
                    <div class="text-red-600">
                        {{ session('error') }}
                    </div>
                    @endif


                    <form action="{{ route('admin.balanceSheet.save') }}" method="POST" enctype="multipart/form-data" class="w-full md:w-auto py-2">
    @csrf
    <div class="mb-4">
        <label for="date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Date</label>
        <input type="date" name="date" id="date" class="form-input mt-1 block rounded-md text-black">
        @error('date')
        <span class="text-red-600">{{ $message }}</span>
        @enderror
    </div>

<div class="grid grid-cols-2 gap-4">
    <div class="mb-4">
        <label for="particular" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Particular</label>
        <input type="text" name="particular" id="particular" class="form-input mt-1 block rounded-md text-black w-full">
        @error('particular')
        <span class="text-red-600">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4">
        <label for="quantity" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Quantity</label>
        <input type="number" name="quantity" id="quantity" class="form-input mt-1 block rounded-md text-black w-full">
        @error('quantity')
        <span class="text-red-600">{{ $message }}</span>
        @enderror
    </div>
</div>
<div class="grid grid-cols-2 gap-4">

    <div class="mb-4">
        <label for="revenue" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Revenue</label>
        <input type="number" name="revenue" id="revenue" class="form-input mt-1 block rounded-md text-black w-full">
        @error('revenue')
        <span class="text-red-600">{{ $message }}</span>
        @enderror
    </div>


<div class="mb-4">
    <label for="expense" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Expense</label>
    <input type="number" name="expense" id="expense" class="form-input mt-1 block rounded-md text-black w-full">
    @error('expense')
    <span class="text-red-600">{{ $message }}</span>
    @enderror
</div>
</div>


<div class="mb-4 flex justify-center">
    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-6 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50 transition duration-300 ease-in-out">Submit</button>
</div>







</form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
