@extends('admin.layouts.master')

@section('content')

<div class="container mt-4">

    <h2 class="mb-4 fw-bold">Settings</h2>

    <div class="row">

        <!-- Admin edit profile -->

        <div class="col-md-3 mb-4">
            <a href="{{ route('admin.editProfile') }}" class="text-decoration-none">
                <div class="card shadow-sm text-center p-4">
                    <i class="bi bi-person-fill fs-1 text-primary"></i>
                    <h5 class="mt-3">Edit Profile</h5>
                </div>
            </a>
        </div>

        <!-- Change Password -->
        <div class="col-md-3 mb-4">
            <a href="{{ route('admin.changePassword') }}" class="text-decoration-none">
                <div class="card shadow-sm text-center p-4">
                    <i class="bi bi-shield-lock-fill fs-1 text-danger"></i>
                    <h5 class="mt-3">Change Password</h5>
                </div>
            </a>
        </div>

    </div>

</div>


@endsection
