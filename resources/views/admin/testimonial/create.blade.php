
@extends('admin.layouts.master')

@section('content')

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Add New Testimonial</h2>
        <a href="{{ url('/testimonial') }}" class="btn btn-secondary">← Back</a>
    </div>

    <!-- Centered Form -->
    <div class="d-flex justify-content-center">
        <div class="card shadow-sm p-4" style="width: 50%; border-radius: 10px;">

            <form action="{{ route('testimonial.create') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
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

                <!-- Description -->
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <input type="text"
                           name="description"
                           class="form-control"
                           placeholder="Enter Description"
                           autocomplete="new-description">
                </div>

                <!-- Designation -->
                <div class="mb-3">
                    <label class="form-label">designation</label>
                    <input type="text"
                           name="designation"
                           class="form-control"
                           placeholder="Enter Designation"
                           autocomplete="new-designation">
                </div>
                
                <!-- Testimonial Image -->
                <div class="mb-3">
                    <label class="form-label">Testimonial Image</label>
                    <input type="file"
                            name="images"
                            class="form-control"
                            autocomplete="off">
                </div>
                
               <div class="text-end">
                    <a href="{{ url('/testimonial') }}">
                        <button type="submit" class="btn btn-primary px-4">Create Testimonial</button>
                    </a>
                </div>

            </form>

        </div>
    </div>

</div>

@endsection