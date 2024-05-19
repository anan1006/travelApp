@extends('layouts.modernize.main')
@push('css')
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap5.css">
@endpush

@section('konten')
    <div class="card" width="100%">
        <div class="card-header">
            <h4>Daftar Rencana Perjalanan</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Judul</th>
                            <th class="text-center">Harga</th>
                            <th class="text-center">Tanggal Berangkat</th>
                            <th class="text-center">Tanggal Kembali</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        @foreach ($tours as $tour)
                            <tr>
                                <td class="text-center text-capitalize">{{ $loop->iteration }}</td>
                                <td class="text-center text-capitalize">{{ $tour->title }}</td>
                                <td class="text-center text-capitalize">{{ $tour->price }}</td>
                                <td class="text-center text-capitalize">{{ $tour->start_date }}</td>
                                <td class="text-center text-capitalize">{{ $tour->end_date }}</td>
                                <td class="">
                                    <button class="btn btn-sm btn-success">Edit</button>
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection

@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
    <script>
        new DataTable('#example');
    </script>
@endpush
