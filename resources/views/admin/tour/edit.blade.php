@extends('layouts.modernize.main')
@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/trix.css') }}">
    <script type="text/javascript" src="{{ asset('js/trix.umd.min.js') }}"></script>
    <style>
        trix-toolbar [ data-trix-button-group="file-tools"] {
            display: none
        }
    </style>
@endpush

@section('konten')
    <div class="card mt-5" width="100%">
        <div class="card-header">
            <h4>Edit Rencana Perjalanan</h4>
        </div>
        <div class="card-body">

            <form action="{{ route('updatePlan', $plan->tour_id) }}" method="post" enctype="multipart/form-data">
                <div class="my-3">
                    <h3 class=""><b>Informasi Tour</b></h3>
                    <small class="">Edit informasi umum terkait tour</small>
                </div>

                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Judul</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                        id="title" value="{{ $plan->title }}" placeholder="Kawah Ijen trip">
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="location" class="form-label">Lokasi Tour</label>
                    <input type="text" class="form-control @error('location') is-invalid @enderror" name="location"
                        id="location" value="{{ $plan->location }}" placeholder="Pasuruan Jawa Timur">
                    @error('location')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="max_participant" class="form-label">Maksimal Peserta</label>
                    <input type="number" class="form-control @error('max_participant') is-invalid @enderror"
                        name="max_participant" id="max_participant" value="{{ $plan->max_participant }}" placeholder="30">
                    @error('max_participant')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Harga</label>
                    <input type="number" class="form-control @error('price') is-invalid @enderror" name="price"
                        id="price" value="{{ $plan->price }}" placeholder="300000">
                    @error('price')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="my-3">
                    <label for="tour_guide_id" class="form-label">Tour Guide</label>
                    <select class="form-select" aria-label="tour_guide_id" id="tour_guide_id" name="tour_guide_id">
                        {{-- <option value="{{ $plan->tour_guide->tour_guide_id }}" selected>Pilih tour guide...</option> --}}
                        @foreach ($tourGuide as $tg)
                            <option value="{{ $tg->tour_guide_id }}"
                                {{ $tg->tour_guide_id == $plan->tour_guide->tour_guide_id ? 'selected' : '' }}>
                                {{ $tg->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Gambar Tour</label>
                    @if ($plan->banner_path)
                        <img src="{{ asset('storage/' . $plan->banner_path) }}" class="img-preview mb-3 d-block"
                            style="max-width: 400px;max-height: 300px;object-fit: contain">
                    @endif
                    <img class="img-preview mb-3 d-block" style="max-width: 400px;max-height: 300px;object-fit: contain">
                    <input class="form-control @error('image') is-invalid @enderror" name="image" type="file"
                        id="image" onchange="previewImg()">
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="start_date" class="form-label">Tanggal Keberangkatan</label>
                    <input type="date" class="form-control @error('start_date') is-invalid @enderror" name="start_date"
                        id="start_date" value="{{ $plan->start_date }}">
                    @error('start_date')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="end_date" class="form-label">Tanggal Kembali</label>
                    <input type="date" class="form-control @error('end_date') is-invalid @enderror" name="end_date"
                        id="end_date" value="{{ $plan->end_date }}">
                    @error('end_date')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <input id="description" type="hidden" name="description">
                    <trix-editor input="description">{!! $plan->description !!}</trix-editor>
                </div>

                {{-- MEETING POIN --}}
                <div class="mt-5 mb-3">
                    <h3 class=""><b>Informasi Meeting Point</b></h3>
                    <small>Masukkan informasi terkait meeting poin</small>
                </div>

                @foreach ($plan->meeting_point as $index => $meeting_point)
                    <div class="Meeting-Point mb-3">
                        <div class="mb-3">
                            <label for="meeting_point_name{{ $index + 1 }}" class="form-label">Meeting Point -
                                {{ $index + 1 }}</label>
                            <input type="text"
                                class="form-control @error('meeting_point_name{{ $index + 1 }}') is-invalid @enderror"
                                name="meeting_point_name_update[]" id="meeting_point_name{{ $index + 1 }}"
                                value="{{ $meeting_point->meeting_point_name }}">
                            @error('meeting_point_name{{ $index + 1 }}')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                @endforeach
                <h4 class="">Tambah Meeting Point Lain</h4>
                <div class="mb-3" id="meetingPoint-container"></div>
                <div class="mb-3">
                    <button type="button" class="btn btn-sm btn-dark" id="tambahMeetPoint">Tambah meeting point</button>
                    <button type="button" class="btn btn-sm btn-danger" id="kurangMeetPoint">Kurangi meeting
                        point</button>
                </div>
                {{-- MEETING POINT END --}}

                {{-- DESTINASI SELAMA TOUR --}}
                <div class="mt-5 mb-3">
                    <h3 class=""><b>Informasi Destinasi</b></h3>
                    <small>Masukkan informasi terkait destinasi selama tour</small>
                </div>


                @foreach ($plan->destination as $index => $destinasi)
                    <div class="Destinasi mb-3">
                        <div class="mb-3">
                            <label for="destination_name{{ $index + 1 }}" class="form-label">Destinasi -
                                {{ $index + 1 }}</label>
                            <input type="text"
                                class="form-control @error('destination_name{{ $index + 1 }}') is-invalid @enderror"
                                name="destination_name_update[]" id="destination_name{{ $index + 1 }}"
                                value="{{ $destinasi->destination_name }}">
                            @error('destination_name{{ $index + 1 }}')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                @endforeach
                <h4 class="">Tambah Destinasi Lain</h4>
                <div id="destination-container" class="mb-3"></div>
                <div class="mb-3">
                    <button type="button" class="btn btn-sm btn-dark" id="tambahDestinasi">Tambah destinasi</button>
                    <button type="button" class="btn btn-sm btn-danger" id="kurangDestinasi">Kurangi destinasi</button>
                </div>
                {{-- DESTINASI SELAMA TOUR END --}}

                {{-- JADWAL --}}
                <div class="mt-5 mb-3">
                    <h3 class=""><b>Informasi Jadwal</b></h3>
                    <small>Masukkan informasi terkait jadwal/rundown tour</small>
                </div>


                @foreach ($plan->tour_schedule as $index => $jadwal)
                    <div class="Jadwal mb-3">
                        <div class="mb-3">
                            <label for="activity{{ $index + 1 }}" class="form-label">Aktivitas dan Waktu -
                                {{ $index + 1 }}</label>
                            <input type="text"
                                class="form-control mb-2 @error('activity{{ $index + 1 }}') is-invalid @enderror"
                                name="activity_update[]" id="activity{{ $index + 1 }}"
                                value="{{ $jadwal->activity }}">
                            @error('activity{{ $index + 1 }}')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <input type="datetime-local"
                                class="form-control @error('schedule_time{{ $index + 1 }}') is-invalid @enderror"
                                name="schedule_time_update[]" id="schedule_time{{ $index + 1 }}"
                                value="{{ $jadwal->schedule_time }}">
                            @error('schedule_time{{ $index + 1 }}')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                @endforeach
                <h4 class="">Tambah Jadwal Lain</h4>
                <div class="mb-3" id="jadwal-container"></div>
                <div class="mb-3">
                    <button type="button" class="btn btn-sm btn-dark" id="tambahJadwal">Tambah jadwal</button>
                    <button type="button" class="btn btn-sm btn-danger" id="kurangJadwal">Kurangi jadwal</button>
                </div>
                {{-- JADWAL END --}}
                <br><br>

                <div class="d-flex justify-content-end gap-2">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('tourPlan') }}" class="btn btn-danger">Kembali</a>
                </div>
            </form>

        </div>
    </div>
@endsection

@push('script')
    <script>
        $('#tour_guide_id').select2({
            theme: 'bootstrap-5'
        });
    </script>

    {{-- <script>
        function previewImg() {
            const image = document.querySelector('#image')
            const imgPreview = document.querySelector('.img-preview')

            image.style.display = 'block'
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0])
            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result
            }
        }
    </script> --}}

    <script>
        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault()
        })
    </script>

    <script>
        let counterMP = 0; // Counter untuk ID yang unik
        const containerMP = document.getElementById('meetingPoint-container');
        const tmbhMP = document.getElementById('tambahMeetPoint');
        const krgMP = document.getElementById('kurangMeetPoint');

        let counterDest = 0;
        const containerDest = document.getElementById('destination-container');
        const tmbhDest = document.getElementById('tambahDestinasi');
        const krgDest = document.getElementById('kurangDestinasi');

        let counterJadwal = 0;
        const containerJadwal = document.getElementById('jadwal-container');
        const tmbhJadwal = document.getElementById('tambahJadwal');
        const krgJadwal = document.getElementById('kurangJadwal');

        tmbhMP.addEventListener('click', () => {
            counterMP++;
            const newDivMP = document.createElement('div');
            newDivMP.classList.add('mb-3', 'meeting-point');
            newDivMP.innerHTML = `
                <div class="mb-3">
                        <label for="meeting_point_name${counterMP}" class="form-label">Meeting Point - ${counterMP}</label>
                        <input type="text" class="form-control @error('meeting_point_name${counterMP}') is-invalid @enderror"
                            name="meeting_point_name[]" id="meeting_point_name${counterMP}" value="{{ old('meeting_point_name${counterMP}') }}">
                        @error('meeting_point_name${counterMP}')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                `;
            containerMP.appendChild(newDivMP);
        });
        tmbhDest.addEventListener('click', () => {
            counterDest++;
            const newDivDest = document.createElement('div');
            newDivDest.classList.add('mb-3', 'destinasi');
            newDivDest.innerHTML = `
                <div class="mb-3">
                        <label for="destination_name${counterDest}" class="form-label">Destinasi - ${counterDest}</label>
                        <input type="text" class="form-control @error('destination_name${counterDest}') is-invalid @enderror"
                            name="destination_name[]" id="destination_name${counterDest}" value="{{ old('destination_name${counterDest}') }}">
                        @error('destination_name${counterDest}')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                `;
            containerDest.appendChild(newDivDest);
        });
        tmbhJadwal.addEventListener('click', () => {
            counterJadwal++;
            const newDivJadwal = document.createElement('div');
            newDivJadwal.classList.add('mb-3', 'jadwal');
            newDivJadwal.innerHTML = `
                    <div class="mb-3">
                        <label for="activity${counterJadwal}" class="form-label">Aktivitas dan Waktu - ${counterJadwal}</label>
                        <input type="text" class="form-control mb-2 @error('activity${counterJadwal}') is-invalid @enderror"
                            name="activity[]" id="activity${counterJadwal}" value="{{ old('activity${counterJadwal}') }}">
                        @error('activity${counterJadwal}')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <input type="datetime-local" class="form-control @error('schedule_time${counterJadwal}') is-invalid @enderror"
                            name="schedule_time[]" id="schedule_time${counterJadwal}" value="{{ old('schedule_time${counterJadwal}') }}">
                        @error('schedule_time${counterJadwal}')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                `;
            containerJadwal.appendChild(newDivJadwal);
        });

        krgMP.addEventListener('click', () => {
            const meetingPoint = document.querySelectorAll('.meeting-point');
            if (meetingPoint.length > 0) {
                counterMP-- // Agar input pertama tidak dihapus
                containerMP.removeChild(meetingPoint[meetingPoint.length - 1]);
            }
        });
        krgDest.addEventListener('click', () => {
            const destinasi = document.querySelectorAll('.destinasi');
            if (destinasi.length > 0) {
                counterDest-- // Agar input pertama tidak dihapus
                containerDest.removeChild(destinasi[destinasi.length - 1]);
            }
        });
        krgJadwal.addEventListener('click', () => {
            const jadwal = document.querySelectorAll('.jadwal');
            if (jadwal.length > 0) {
                counterJadwal-- // Agar input pertama tidak dihapus
                containerJadwal.removeChild(jadwal[jadwal.length - 1]);
            }
        });
    </script>
@endpush
