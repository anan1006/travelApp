@extends('layouts.modernize.main')
@push('css')
@endpush

@section('konten')
    <div class="card mt-5" width="100%">
        <div class="card-header">
            <h4>Daftar User</h4>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-end">
                <a href="{{ route('tambahUser') }}" class=" btn btn-primary mb-4 px-3 py-2">
                    <div class="d-flex align-items-center">
                        <i class="ti ti-square-plus fs-6 me-2"></i> Tambah User
                    </div>

                </a>
            </div>
            <div class="table-responsive">
                {{ $dataTable->table(['class' => 'table table-striped'], true) }}
            </div>

        </div>
    </div>
@endsection

@push('script')
    {{ $dataTable->scripts() }}
@endpush
