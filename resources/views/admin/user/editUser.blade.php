@extends('layouts.modernize.main')
@push('css')
@endpush

@section('konten')
    <div class="card mt-5" width="100%">
        <div class="card-header">
            <h4 class="text-capitalize">Edit User</h4>
        </div>
        <div class="card-body">

            <div class="card">
                <div class="card-body shadow">

                    <form action="{{ route('updateUser', $user->id) }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama user:</label>
                            <input type="text" class="form-control" name="name" value="{{ $user->name }}"
                                id="name">
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username:</label>
                            <input type="text" class="form-control" name="username" value="{{ $user->username }}"
                                id="username">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail:</label>
                            <input type="email" class="form-control" name="email" value="{{ $user->email }}"
                                id="email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" class="form-control" name="password" id="password">
                            <small>Ini akan mengupdate password yang tersimpan di database</small>
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Role:</label>
                            <select class="form-select" id="role" name="role" aria-label="Default select example">
                                <option value="superadmin"
                                    {{ in_array('superadmin', $user->getRoleNames()->toArray()) ? 'selected' : '' }}>
                                    Super
                                    Admin</option>
                                <option value="admin"
                                    {{ in_array('admin', $user->getRoleNames()->toArray()) ? 'selected' : '' }}>
                                    Admin
                                </option>
                                <option value="user"
                                    {{ in_array('user', $user->getRoleNames()->toArray()) ? 'selected' : '' }}>
                                    User</option>
                            </select>
                        </div>

                        <br><br>
                        <div class="d-flex justify-content-end gap-2">
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
