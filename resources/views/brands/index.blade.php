<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Brands') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6">
                <div class="flex justify-between items-center mb-4">
                    <h1 class="text-lg font-bold text-gray-900 dark:text-white">Daftar Brand</h1>
                    <a href="{{ route('brands.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow">
                        + Tambah Brand
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full border-collapse rounded-lg overflow-hidden shadow-lg">
                        <thead>
                            <tr class="bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-white">
                                <th class="px-4 py-2">No</th>
                                <th class="px-4 py-2">Nama Brand</th>
                                <th class="px-4 py-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y">
                            @foreach ($brands as $brand)
                            <tr class="text-gray-800 dark:text-white">
                                <td class="px-4 py-2 text-center">{{ $loop->iteration }}</td>
                                <td class="px-4 py-2">{{ $brand->name }}</td>
                                <td class="px-4 py-2">
                                    <a href="{{ route('brands.edit', $brand) }}" class="px-3 py-1 bg-yellow-500 text-white rounded">Edit</a>
                                    <form action="{{ route('brands.destroy', $brand) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>