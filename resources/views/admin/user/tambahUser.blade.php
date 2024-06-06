@extends('layouts.modernize.main')
@push('css')
@endpush

@section('konten')
    <div class="card mt-5" width="100%">
        <div class="card-header">
            <h4 class="text-capitalize">Tambah User</h4>
        </div>
        <div class="card-body">

            <div class="card">
                <div class="card-body shadow">

                    <form action="{{ route('simpanUser') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama user:</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                                id="name">
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username:</label>
                            <input type="text" class="form-control" name="username" value="{{ old('username') }}"
                                id="username">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail:</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                                id="email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" class="form-control" name="password" id="password">
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Role:</label>
                            <select class="form-select" id="role" name="role" aria-label="Default select example">
                                <option selected>Pilih role</option>
                                <option value="superadmin">Super Admin</option>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                        </div>

                        <br><br>
                        <div class="d-flex justify-content-end gap-2 mt-5">
                            <button class="btn btn-primary" type="submit">Submit</button>
                            <a href="{{ route('userList') }}" class="btn btn-danger">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
@endpush
