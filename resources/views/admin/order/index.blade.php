@extends('layouts.modernize.main')
@push('css')
@endpush

@section('konten')
    <div class="card mt-5" width="100%">
        <div class="card-header">
            <h4>Order</h4>
        </div>
        <div class="card-body">
            @foreach ($tours as $tour)
                <a href="{{ route('showOrder', $tour->tour_id) }}" class="text-dark">
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="p-3">
                                <div class="d-flex flex-column flex-md-row align-items-center justify-content-md-between">
                                    <div class="">
                                        <h5>Tour Order</h5>
                                        <p class="fs-4">
                                            {{ \Carbon\Carbon::parse($tour->order[0]->booking_date)->format('d F Y') }}</p>
                                    </div>
                                    <div>
                                        <div class="btn btn-sm btn-primary text-capitalize">
                                            {{ $tour->order[0]->status }}

                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="d-flex gap-3 flex-column flex-md-row justify-content-between">
                                    <div class="d-flex gap-3 flex-column flex-md-row">

                                        <div class="" style="max-width: 125px">
                                            <img src="{{ asset('storage/' . $tour->banner_path) }}" class="img-fluid"
                                                alt="...">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h3>{{ $tour->title }}</h3>
                                            <p class="fs-3">Pesanan untuk {{ count($tour->order) }} orang</p>
                                        </div>
                                    </div>
                                    <p>Total harga: <br> <b class="fs-5">Rp.
                                            {{ number_format($tour->price * count($tour->order), 0, ',', '.') }}</b>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </a>
            @endforeach

        </div>
    </div>
@endsection

@push('script')
@endpush
