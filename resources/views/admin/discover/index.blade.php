@extends('layouts.modernize.main')
@push('css')
@endpush

@section('konten')
    <div class="card mt-5" width="100%">
        <div class="card-header">
            <h4>Discover</h4>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-end">
                <a href="{{ route('discover.create') }}" class=" btn btn-primary mb-4 px-3 py-2">
                    <div class="d-flex align-items-center">
                        <i class="ti ti-square-plus fs-6 me-2"></i> Tambah Discover
                    </div>
                </a>
            </div>
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            {{-- <div class="table-responsive">
                {{ $dataTable->table(['class' => 'table table-striped'], true) }}
            </div> --}}

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach ($discovers as $discover)
                    <div class="col">
                        <div class="card shadow">
                            <img src="{{ asset('storage/' . $discover->discover_image) }}"
                                style="max-height: 400px; object-fit: cover;" class="rounded-top" alt="">
                            <div class="card-body">
                                <h3>{{ $discover->discover_title }}</h3>
                                <p class="card-text">{{ $discover->discover_location }}</p>

                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <div class="">
                                        <a href="{{ route('discover.edit', $discover->discover_id) }}"
                                            class="btn btn-sm btn-secondary">Edit</a>
                                        <form action="{{ route('discover.destroy', $discover->discover_id) }}"
                                            class="d-inline" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
@endsection

@push('script')
    {{-- {{ $dataTable->scripts() }} --}}
@endpush
