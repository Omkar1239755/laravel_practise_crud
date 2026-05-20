@extends('admin.layouts.master')

@section('content')

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Add New User</h2>
        <a href="{{ url('/user') }}" class="btn btn-secondary">← Back</a>
    </div>

    <!-- Centered Form -->
    <div class="d-flex justify-content-center">
        <div class="card shadow-sm p-4" style="width: 50%; border-radius: 10px;">

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

            <form action="{{ route('user.create') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                @csrf

                <!-- Name -->
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text"
                           name="name"
                           class="form-control"
                           placeholder="Enter name"
                           autocomplete="new-name">
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email"
                           name="email"
                           class="form-control"
                           placeholder="Enter email"
                           autocomplete="new-email">
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password"
                           name="password"
                           class="form-control"
                           placeholder="Enter password"
                           autocomplete="new-password">
                </div>

                <!-- Profile Image -->
                <div class="mb-3">
                    <label class="form-label">Profile Image</label>
                    <input type="file"
                           name="profile_image"
                           class="form-control"
                           autocomplete="off">
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary px-4">Create User</button>
                </div>

            </form>

        </div>
    </div>

</div>

@endsection
