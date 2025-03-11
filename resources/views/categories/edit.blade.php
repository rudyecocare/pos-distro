<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Kategori') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('categories.update', $category) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Nama Kategori</label>
                            <input type="text" name="name" value="{{ $category->name }}" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200 dark:bg-gray-700 dark:text-white" required>
                        </div>
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>