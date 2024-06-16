@extends('layouts.modernize.main')
@push('css')
@endpush

@section('konten')
    <div class="card mt-5" width="100%">
        <div class="card-header">
            <h4>Daftar {{ $plan->title }}</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('userDaftarPost') }}" method="post" enctype="multipart/form-data">
                @csrf
                <h4>Informasi Tour</h4>
                <div class="card">
                    <div class="card-body">
                        <input type="hidden" name="tour_id" class="form-control" value="{{ $plan->tour_id }}" readonly>
                        <div class="mb-3">
                            <label for="" class="form-label">Tour</label>
                            <input type="text" class="form-control" value="{{ $plan->title }}" readonly>
                        </div>
                        <div class="d-flex flex-column flex-md-row gap-3">
                            <div class="mb-3 w-100">
                                <label for="" class="form-label">Keberangkatan</label>
                                <input type="text" class="form-control"
                                    value="{{ \Carbon\Carbon::parse($plan->start_date)->format('d F y') }}" readonly>
                            </div>
                            <div class="mb-3 w-100">
                                <label for="" class="form-label">Kembali</label>
                                <input type="text" class="form-control"
                                    value="{{ \Carbon\Carbon::parse($plan->end_date)->format('d F y') }}" readonly>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Harga per Orang</label>
                            <input type="text" class="form-control"
                                value="Rp. {{ number_format($plan->price, 0, ',', '.') }}" readonly>
                        </div>
                    </div>
                </div>

                {{-- DATA PENDAFTAR --}}
                <h4>Informasi Peserta</h4>
                <div class="my-4">
                    <button type="button" class="btn btn-sm btn-dark tambah-peserta">Tambah Peserta</button>
                    <button type="button" class="btn btn-sm btn-danger hapus-peserta">Kurangi Peserta</button>
                </div>
                <div class="info-peserta">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="nama_peserta" class="form-label">Nama Peserta - 1</label>
                                <input type="text" class="form-control @error('nama_peserta.*') is-invalid @enderror"
                                    id="nama_peserta" name="nama_peserta[]" required>
                                @error('nama_peserta.*')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="telepon_peserta" class="form-label">Nomor Telepon Peserta - 1</label>
                                <input type="number" class="form-control @error('telepon_peserta.*') is-invalid @enderror"
                                    id="telepon_peserta" name="telepon_peserta[]">
                                @error('telepon_peserta.*')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                {{-- INFO PEMBAYARAN --}}
                <h4>Total Harga</h4>
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column flex-md-row gap-3">

                            <div class="mb-3 w-100">
                                <label for="total_harga" class="form-label">Total Harga</label>
                                <input type="number" class="form-control" id="total_harga" name="total_harga" readonly>
                            </div>
                            <div class="mb-3 w-100">
                                <label for="bukti_bayar" class="form-label">Bukti Bayar</label>
                                <input type="file" class="form-control @error('bukti_bayar') is-invalid @enderror"
                                    id="bukti_bayar" name="bukti_bayar" required>
                                @error('bukti_bayar')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary tombol">Daftar</button>
            </form>


        </div>
    </div>
@endsection

@push('script')
    <script>
        let peserta = 1
        const tour = @json($plan);
        let hargaTour = parseFloat(tour.price);
        $(".hapus-peserta").prop("disabled", true);


        $("#total_harga").val(hargaTour)
        $(".tambah-peserta").click(function() {
            peserta++
            $(".info-peserta").append(`
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="nama_peserta" class="form-label">Nama Peserta - ${peserta}</label>
                            <input type="text" class="form-control" id="nama_peserta" name="nama_peserta[]" required>
                        </div>
                        <div class="mb-3">
                            <label for="telepon_peserta" class="form-label">Nomor Telepon - ${peserta}</label>
                            <input type="number" class="form-control" id="telepon_peserta" name="telepon_peserta[]" required>
                        </div>
                    </div>
                </div>
            `)
            $("#total_harga").val(hargaTour * peserta)
            $(".hapus-peserta").prop("disabled", false);

        })
        $(".hapus-peserta").click(function() {
            $(".info-peserta .card").last().remove()
            peserta--
            if (peserta > 1) {
                $("#total_harga").val(hargaTour * peserta)
            } else {
                $(".hapus-peserta").prop("disabled", true);
                $("#total_harga").val(hargaTour * peserta)
            }
        })
    </script>
@endpush
