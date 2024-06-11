@extends('layouts.modernize.main')
@push('css')
@endpush

@section('konten')
    <div class="card mt-5" width="100%">
        <div class="card-header shadow-sm">
            <h4>Daftar Rencana Tour</h4>
        </div>
        <div class="card-body">

            <div class="container">

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    @foreach ($listTours as $listTour)
                        <div class="col">
                            <div class="card shadow">
                                <img src="{{ asset('storage/' . $listTour->banner_path) }}" class="rounded-top daftarTour"
                                    style="max-height: 300px; object-fit: cover;" alt="">
                                <div class="card-body">
                                    <h3 class="text-capitalize">{{ $listTour->title }}</h3>
                                    {{-- <p class="card-text">{{ $listTour->description }}</p> --}}
                                    <div>
                                        <table>
                                            <tr>
                                                <td>Berangkat</td>
                                                <td class="px-2">:</td>
                                                <td>{{ \Carbon\Carbon::parse($listTour->start_date)->format('d F Y') }}</td>
                                            </tr>
                                            <tr>
                                                <td>Kembali</td>
                                                <td class="px-2">:</td>
                                                <td>{{ \Carbon\Carbon::parse($listTour->end_date)->format('d F Y') }}</td>
                                            </tr>
                                            <tr>
                                                <td>Harga</td>
                                                <td class="px-2">:</td>
                                                <td>Rp. {{ number_format($listTour->price, 0, ',', '.') }}</td>
                                            </tr>
                                        </table>
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <div class="btn-group">
                                            <a href="{{ route('showPlan', $listTour->tour_id) }}"
                                                class="btn btn-sm btn-outline-secondary">Lihat
                                                Detail</a>
                                            {{-- <button type="button" class="btn btn-sm btn-outline-secondary">Lihat
                                                Detail</button> --}}
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Daftar</button>
                                        </div>
                                        <small class="text-body-secondary"><i class="bi bi-person-lines-fill"></i>
                                            {{ $listTour->max_participant }}</small>
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
    @endpush
