<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Warehouses') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <a href="{{ route('warehouses.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded">+ Add Warehouse</a>
                <table class="w-full mt-4 border">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border px-4 py-2">ID</th>
                            <th class="border px-4 py-2">Name</th>
                            <th class="border px-4 py-2">Location</th>
                            <th class="border px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($warehouses as $warehouse)
                        <tr>
                            <td class="border px-4 py-2">{{ $warehouse->id }}</td>
                            <td class="border px-4 py-2">{{ $warehouse->name }}</td>
                            <td class="border px-4 py-2">{{ $warehouse->location }}</td>
                            <td class="border px-4 py-2">
                                <a href="{{ route('warehouses.edit', $warehouse->id) }}" class="px-3 py-1 bg-yellow-500 text-white rounded">Edit</a>
                                <form action="{{ route('warehouses.destroy', $warehouse->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $warehouses->links() }}
            </div>
        </div>
    </div>
</x-app-layout>