<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Users') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-2xl font-bold">List of Users</h1>
                        <a href="{{ route('admin.dashboard') }}" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md transition duration-300 ease-in-out">Back to Dashboard</a>

                    </div>
                    <div class="overflow-x-auto">
                        <table class="table-auto w-full border-collapse">
                            <thead>
                                <tr class="bg-gray-200 dark:bg-gray-700">
                                    <th class="px-4 py-2">No.</th>
                                    <th class="px-4 py-2">Name</th>
                                    <th class="px-4 py-2">Email</th>
                                    <th class="px-4 py-2">Registered At</th>
                                    <th class="px-4 py-2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr class="border-b dark:border-gray-700">
                                    <td class="text-center px-4 py-2">{{ $loop->iteration }}</td>
                                    <td class="text-center px-4 py-2">{{ $user->name }}</td>
                                    <td class="text-center px-4 py-2">{{ $user->email }}</td>
                                    <td class="text-center px-4 py-2">{{ $user->created_at->format('Y-m-d H:i:s') }}</td>
                                    <td class="text-center px-4 py-2">
                                        <div class="flex justify-center space-x-2">
                                            <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                            <form action="{{ route('admin.users.delete', ['id'=>$user->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                            </form>
                                        </div>
                                    </td>
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
