<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Balance Sheet') }}
        </h2>
    </x-slot>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-2xl font-bold">List of Balance Sheet</h1>
                        <a href="{{ route('admin.balanceSheet.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md transition duration-300 ease-in-out">Add Entity</a>
                    </div>
                    <hr class="mb-6">
                    @if(Session::has('success'))
                    <div class="text-black border border-green-400 px-4 py-3 rounded relative bg-green-100" style="background-color: #d4edda !important;" role="alert">
                        <strong class="font-bold">Success!</strong>
                        <span class="block sm:inline">{{ Session::get('success') }}</span>
                    </div>
                    @endif
                    <div class="overflow-x-auto">
                        <table class="table-auto w-full border-collapse">
                            <thead>
                                <tr class="bg-gray-200 dark:bg-gray-700">
                                    <th class="px-4 py-2">No.</th>
                                    <th class="px-4 py-2">Date</th>
                                    <th class="px-4 py-2">Particular</th>
                                    <th class="px-4 py-2">Quantity</th>
                                    <th class="px-4 py-2">Revenue</th>
                                    <th class="px-4 py-2">Expense</th>
                                    <th class="px-4 py-2">Balance</th>
                                    <th class="px-4 py-2">User</th>
                                    @auth
                                    @if(auth()->user()->isAdmin())
                                    <th class="px-4 py-2">Action</th>
                                    @endif
                                    @endauth
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($balances as $balance)
                                <tr class="border-b dark:border-gray-700">
                                    <td class="text-center px-4 py-2">{{ $loop->iteration }}</td>
                                    <td class="text-center px-4 py-2">{{ $balance->date }}</td>
                                    <td class="text-center px-4 py-2">{{ $balance->particular }}</td>
                                    <td class="text-center px-4 py-2">{{ $balance->quantity }}</td>
                                    <td class="text-center px-4 py-2">{{ $balance->revenue }}</td>
                                    <td class="text-center px-4 py-2">{{ $balance->expense }}</td>
                                    <td class="text-center px-4 py-2">{{ $balance->balance }}</td>
                                    <td class="text-center px-4 py-2">{{ $balance->user->name }}</td>
                                    @auth
                                    @if(auth()->user()->isAdmin())
                                    <td class="align-middle">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ route('admin.balanceSheet.edit', ['id'=>$balance->id]) }}" type="button" class="btn btn-secondary text-blue-600">Edit</a>
                                            <a href="{{ route('admin.balanceSheet.delete', ['id'=>$balance->id]) }}" type="button" class="btn btn-danger text-red-600">Delete</a>
                                        </div>
                                    </td>
                                    @endif
                                    @endauth
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
