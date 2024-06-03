@extends('layouts.modernize.main')
@push('css')
    <style>
        .img-banner {
            width: 500px;
        }
    </style>
@endpush

@section('konten')
    <div class="card mt-5" width="100%">
        <div class="card-header">
            <h3>Detail Tour</h3>
        </div>
        <div class="card-body">

            <div class="d-flex gap-5 flex-column flex-md-row">
                <div class="" style="max-width: 400px">
                    <img src="{{ asset('storage/' . $plan->banner_path) }}"
                        style="max-height: 400px;width: 100%;object-fit: cover" class=" rounded" alt="">
                </div>
                <div class="">
                    <h3 class="text-capitalize"><strong>{{ $plan->title }}</strong></h3>
                    <p class="text-capitalize">{{ $plan->location }}</p>
                    <table>
                        <tr>
                            <td>Judul</td>
                            <td class="px-3">:</td>
                            <td>{{ $plan->title }}</td>
                        </tr>
                        <tr>
                            <td>Harga</td>
                            <td class="px-3">:</td>
                            <td>Rp. {{ number_format($plan->price, 2, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <td>Keberangkatan</td>
                            <td class="px-3">:</td>
                            <td>{{ \Carbon\Carbon::parse($plan->start_date)->format('j F Y') }}</td>
                        </tr>
                        <tr>
                            <td>Kembali</td>
                            <td class="px-3">:</td>
                            <td>{{ \Carbon\Carbon::parse($plan->end_date)->format('j F Y') }}</td>
                        </tr>
                        <tr>
                            <td>Kapasitas Peserta</td>
                            <td class="px-3">:</td>
                            <td class="text-capitalize">{{ $plan->max_participant }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <h3 class="mt-5 ms-4">Deskripsi</h3>
            <div class="ms-4">
                {!! $plan->description !!}
            </div>
            <div class="container mt-5">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane"
                            type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Meeting
                            Point</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane"
                            type="button" role="tab" aria-controls="profile-tab-pane"
                            aria-selected="false">Destination</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane"
                            type="button" role="tab" aria-controls="contact-tab-pane"
                            aria-selected="false">Schedule</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                        tabindex="0">
                        <div class="table-responsive mt-3">
                            <table class="table table-striped table-bordered shadow-sm">
                                <thead>
                                    <tr>
                                        <th scope="col" width="50px">No</th>
                                        <th scope="col">Meeting Point</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($meetingPoint as $key => $mp)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <td class="text-capitalize">{{ $mp->meeting_point_name }}</td>
                                            <td>
                                                <form action="{{ route('hapusMeetingPoint', $mp->meeting_point_id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-sm btn-danger" type="submit"><i
                                                            class="ti ti-trash fs-5"></i>Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab"
                        tabindex="0">
                        <div class="table-responsive mt-3">
                            <table class="table table-striped table-bordered shadow-sm">
                                <thead>
                                    <tr>
                                        <th scope="col" width="50px">No</th>
                                        <th scope="col">Destination</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($destination as $key => $d)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <td class="text-capitalize">{{ $d->destination_name }}</td>
                                            <td>
                                                <form action="{{ route('hapusDestination', $d->destination_id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-sm btn-danger" type="submit"><i
                                                            class="ti ti-trash fs-5"></i>Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab"
                        tabindex="0">
                        <div class="table-responsive mt-3">
                            <table class="table table-striped table-bordered shadow-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Aktivitas</th>
                                        <th scope="col">Jam</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($schedule as $key => $s)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <td class="text-capitalize">{{ $s->activity }}</td>
                                            <td>{{ \Carbon\Carbon::parse($s->schedule_time)->format('H:i') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($s->schedule_time)->format('d M Y') }}</td>
                                            <td>
                                                <form action="{{ route('hapusSchedule', $s->tour_schedule_id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-sm btn-danger" type="submit"><i
                                                            class="ti ti-trash fs-5"></i>Hapus</button>
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
            <br>
            <br>

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('editPlan', $plan->tour_id) }}" class="btn btn-primary">Edit Rencana</a>
                <a href="{{ route('tourPlan') }}" class="btn btn-danger">Kembali</a>

            </div>
        </div>
    </div>
@endsection

@push('script')
@endpush
