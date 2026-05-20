@extends('admin.layouts.master')

@section('content')

<div class="container mt-5">

    <div class="col-md-6 offset-md-3">

        <h3 class="mb-3 text-center">Edit User</h3>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card p-4 shadow-sm">
            <form action="{{ url('/user' . $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Name -->
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input 
                        type="text" 
                        name="name" 
                        value="{{ old('name', $user->name) }}"
                        class="form-control"
                        placeholder="Enter new name"
                    >
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input 
                        type="email" 
                        name="email" 
                        value="{{ old('email', $user->email) }}"
                        class="form-control"
                        placeholder="Enter new email"
                    >
                </div>

                <!-- Profile_image -->
                <div class="mb-3">
                    <label class="form-label">Profile_image</label>
                    <input 
                        type="file" 
                        name="profile_image" 
                        class="form-control"
                        placeholder="Enter profile_image"
                    >
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ url('/user') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>

    </div>

</div>

@endsection
