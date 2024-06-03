@extends('layouts.modernize.main')
@push('css')
@endpush

@section('konten')
    <div class="card mt-5" width="100%">
        <div class="card-header">
            <h4 class="text-capitalize">Data User - {{ $user->name }}</h4>
        </div>
        <div class="card-body">

            <form>
                <div class="mb-3">
                    <label for="name" class="form-label">Nama user:</label>
                    <input type="text" class="form-control" name="name" value="{{ $user->name }}" id="name"
                        readonly>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username:</label>
                    <input type="text" class="form-control" name="username" value="{{ $user->username }}" id="username"
                        readonly>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail:</label>
                    <input type="email" class="form-control" name="email" value="{{ $user->email }}" id="email"
                        readonly>
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">Role:</label>
                    <input type="text" class="form-control" name="role" value="{{ $user->getRoleNames()[0] }}"
                        id="role" readonly>
                </div>

                <br><br>
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('userList') }}" class="btn btn-danger">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('script')
@endpush
