<a href="{{ route('editPlan', $tour->tour_id) }}" class="btn btn-sm btn-warning my-1"><i class="ti ti-edit fs-5"></i></a>
<a href="{{ route('showPlan', $tour->tour_id) }}" class="btn btn-sm btn-secondary my-1"><i class="ti ti-eye fs-5"></i></a>
{{-- <a href="/hapus/{{ $tour_id }}" class="btn btn-sm btn-danger my-1"><i class="ti ti-trash fs-5"></i></a> --}}

<button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
    data-bs-target="#exampleModal{{ $tour->tour_id }}">
    <i class="ti ti-trash fs-5"></i></a>
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal{{ $tour->tour_id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data!</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">

                    <div class="row mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#FA896B"
                            class="bi bi-x-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                            <path
                                d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                        </svg>
                    </div>
                    <div class="row">
                        <p class="text-center">
                            Apakah yakin akan menghapus rencana <strong>"{{ $tour->title }}"</strong>?
                        </p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="{{ route('deletePlan', $tour->tour_id) }}" class="btn btn-danger"><i
                        class="ti ti-trash fs-5"></i>
                    Hapus</a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
