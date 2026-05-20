
@extends('admin.layouts.master')

@section('content')

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Add New Categories</h2>
        <a href="{{ url('/categories') }}" class="btn btn-secondary">← Back</a>
    </div>

    <!-- Centered Form -->
    <div class="d-flex justify-content-center">
        <div class="card shadow-sm p-4" style="width: 50%; border-radius: 10px;">

            <form action="{{ route('categories.create') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $err)
                                <li>{{ $err }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Name -->
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text"
                           name="name"
                           class="form-control"
                           placeholder="Enter Name"
                           autocomplete="new-name">
                </div>
                
                <!-- Categories Image -->
                <div class="mb-3">
                    <label class="form-label">Categories Image</label>
                    <input type="file"
                            name="image"
                            class="form-control"
                            autocomplete="off">
                </div>

               <!-- status -->
                <div class="mb-3 form-check">
                  <input type="checkbox" name="status" class="form-check-input" id="status">
                  <label class="form-check-label" for="status">Active</label>
                </div>
                
                <div class="text-end">
                    <button type="submit" class="btn btn-primary px-4">Create Categories</button>
                    <a href="{{ url('/categories') }}" class="btn btn-secondary ms-2">Cancel</a>
                </div>

            </form>

        </div>
    </div>

</div>

@endsection