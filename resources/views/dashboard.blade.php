@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css">
@endpush

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- {{ __('Daftar Rencana Wisata...') }} --}}
                    <h1 class="text-2xl font-medium text-teal-950">Daftar Rencana Wisata</h1>
                    <div class="my-5">
                        <table id="myTable " class="stripe" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Deskripsi</th>
                                    <th>Harga</th>
                                    <th>Pemandu</th>
                                    <th>Durasi</th>
                                    <th>Tanggal Berangkat</th>
                                    <th>Tanggal Kembali</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="">
                                @foreach ($tours as $tour)
                                    <tr>
                                        <td class="px-5">{{ $loop->iteration }}</td>
                                        <td class="px-5">{{ $tour->title }}</td>
                                        <td class="px-5">{{ $tour->description }}</td>
                                        <td class="px-5">{{ $tour->price }}</td>
                                        <td class="px-5">{{ $tour->tour_guide->name }}</td>
                                        <td class="px-5">{{ $tour->duration }}</td>
                                        <td class="px-5">{{ $tour->start_date }}</td>
                                        <td class="px-5">{{ $tour->end_date }}</td>
                                        <td class="px-5">
                                            Edit | Delete
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
@push('javascript')
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
    <script>
        let table = new DataTable('#myTable');
    </script>
@endpush
