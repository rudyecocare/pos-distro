<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-lg font-bold">Daftar Kategori</h1>
                    <a href="{{ route('categories.create') }}"
                        class="mt-4 inline-block px-4 py-2 bg-blue-500 black-white rounded">
                        + Tambah Kategori
                    </a>

                    <table id="categoryTable" class="display dataTable min-w-full text-sm align-middle whitespace-nowrap"
                        style="width:100%">
                        <thead>
                            <tr class="dark:border-gray-700/50">
                                <th
                                    class="p-3 text-gray-900 bg-gray-100/75 font-semibold text-left dark:text-gray-50 dark:bg-gray-700/25 dt-orderable-asc dt-orderable-desc">
                                    Nama Kategori</th>
                                <th
                                    class="p-3 text-gray-900 bg-gray-100/75 font-semibold text-center dark:text-gray-50 dark:bg-gray-700/25 dt-orderable-asc dt-orderable-desc">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {
                let table = $('#categoryTable').DataTable({
                    processing: true,
                    serverSide: true,
                    responsive: true,
                    ajax: "{{ route('categories.index') }}",
                    columns: [{
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            width: "120px",
                            orderable: false,
                            searchable: false
                        }
                    ],
                    pagingType: "simple_numbers", // Compact pagination style
                    lengthMenu: [5, 10, 25, 50], // Custom page size options
                    dom: '<"flex items-center justify-between py-2"<"flex space-x-2"l><"ml-auto"f>>t<"flex items-center justify-between p-2"<"text-gray-700"i><"ml-auto"p>>',
                    language: {
                        search: "Cari:", // Change "Search" text
                        lengthMenu: "Tampilkan _MENU_ data per halaman",
                        paginate: {
                            previous: "«",
                            next: "»"
                        },
                    },
                    lengthMenu: [5, 10, 25, 50],
                    rowCallback: function(row, data, index) {
                        if (index % 2 === 1) { // Even row (0-based index)
                            $(row).addClass('even:bg-gray-50 dark:even:bg-gray-900/50');
                        }
                    },
                    initComplete: function() {
                        // Remove rounded styles for search input and length dropdown
                        $('div.categoryTable_wrapper input').addClass(
                            'border-gray-300 px-3 py-2 border focus:ring-0 focus:outline-none rounded-none'
                            );
                        $('div.categoryTable_wrapper select').addClass(
                            'float-left'
                            );

                        // Remove default DataTables styling
                        // $('div.categoryTable_wrapper').removeClass('dataTables_wrapper');
                    }

                });
            });
        </script>
    @endpush
</x-app-layout>
