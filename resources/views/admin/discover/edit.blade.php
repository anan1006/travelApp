@extends('layouts.modernize.main')
@push('css')
@endpush

@section('konten')
    <div class="card mt-5" width="100%">
        <div class="card-header">
            <h4>Edit Discover</h4>
        </div>
        <div class="card-body">

            <form action="{{ route('discover.update', $discover->discover_id) }}" method="post" enctype="multipart/form-data">
                <div class="my-3">
                    <h3 class=""><b>Discover Form</b></h3>
                    <small class="">Edit data discover</small>
                </div>
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="discover_title" class="form-label">Judul</label>
                    <input type="text" class="form-control @error('discover_title') is-invalid @enderror"
                        name="discover_title" id="title" value="{{ $discover->discover_title }}"
                        placeholder="Kawah Ijen trip">
                    @error('discover_title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="discover_location" class="form-label">Lokasi</label>
                    <input type="text" class="form-control @error('discover_location') is-invalid @enderror"
                        name="discover_location" id="discover_location" value="{{ $discover->discover_location }}"
                        placeholder="Banyuwangi, Jawa Timur">
                    @error('discover_location')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="formFile" class="form-label">Gambar Discover</label>
                    @if ($discover->discover_image)
                        <img src="{{ asset('storage/' . $discover->discover_image) }}" class="img-preview mb-3 d-block"
                            style="max-width: 400px;max-height: 300px;object-fit: contain">
                    @else
                        <img class="img-preview mb-3 d-block"
                            style="max-width: 400px;max-height: 300px;object-fit: contain">
                    @endif
                    <input class="form-control @error('image') is-invalid @enderror" name="image" type="file"
                        id="image" onchange="previewImg()">
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <br>
                <br>

                <div class="d-flex justify-content-end gap-2">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('discover.index') }}" class="btn btn-danger">Kembali</a>

                </div>
            </form>

        </div>
    </div>
@endsection

@push('script')
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
@endpush
