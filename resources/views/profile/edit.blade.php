@extends('layouts.modernize.main')

@section('konten')
    <div class="card mt-5">
        <div class="card-header">
            <h2>Profile</h2>
        </div>
        <div class="card-body">
            {{-- PROFILE --}}
            <div class="card">
                <div class="card-body">
                    <h2>Profile Information</h2>
                    <p>Update your account's profile information and email address.</p>
                    @if (session('status') === 'profile-updated')
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Profile updated successfully</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <form method="post" action="{{ route('profile.update') }}">
                        @csrf
                        @method('patch')
                        <div class="form-group mb-3">
                            <label class="label" for="name">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                placeholder="Username" id="name" name="name" value="{{ old('name', $user->name) }}"
                                required autofocus autocomplete="name">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="label" for="email">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                placeholder="Email" id="email" name="email" value="{{ old('email', $user->email) }}"
                                required autocomplete="username">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="">
                            <button class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
            {{-- Password --}}
            <div class="card">
                <div class="card-body">
                    <h2>Update Password</h2>
                    <p>Ensure your account is using a long, random password to stay secure.</p>
                    @if (session('status') === 'password-updated')
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Password updated successfully</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <form method="post" action="{{ route('password.update') }}">
                        @csrf
                        @method('put')
                        <div class="form-group mb-3">
                            <label class="label" for="update_password_current_password">Current Password</label>
                            <input type="password" class="form-control @error('current_password') is-invalid @enderror"
                                placeholder="Current Password" id="update_password_current_password" name="current_password"
                                autocomplete="current-password">
                            @error('current_password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="label" for="update_password_password">New Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                placeholder="New Password" id="update_password_password" name="password"
                                autocomplete="new-password">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="label" for="update_password_password_confirmation">Confirm Password</label>
                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                                placeholder="Confirm Password" id="update_password_password_confirmation"
                                name="password_confirmation" autocomplete="new-password">
                            @error('password_confirmation')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="">
                            <button class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
            {{-- Delete user --}}
            <div class="card">
                <div class="card-body">
                    <h2>Delete Account</h2>
                    <p>Once your account is deleted, all of its resources and data will be permanently deleted. Before
                        deleting your account, please download any data or information that you wish to retain.</p>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Delete Account
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete User</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="{{ route('profile.destroy') }}">
                                        @csrf
                                        @method('delete')
                                        <h4>Are you sure you want to delete your account?</h4>
                                        <p>Once your account is deleted, all of its resources and data will be permanently
                                            deleted. Please enter your password to confirm you would like to permanently
                                            delete your account.</p>

                                        <div class="form-group mb-3">
                                            <label class="label" for="password">Password</label>
                                            <input type="password"
                                                class="form-control @error('current_password') is-invalid @enderror"
                                                id="password" name="password" placeholder="Password">
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="d-flex justify-content-end gap-2">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-danger">Delete Account</button>
                                        </div>
                                    </form>
                                </div>
                                {{-- <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-danger">Delete Account</button>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
