
@extends('admin.layouts.master')

@section('content')

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Add New Product</h2>
        <a href="{{ url('/product') }}" class="btn btn-secondary">← Back</a>
    </div>

    <!-- Centered Form -->
    <div class="d-flex justify-content-center">
        <div class="card shadow-sm p-4" style="width: 50%; border-radius: 10px;">

            <form action="{{ route('product.create') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
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

                <!-- Title -->
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text"
                           name="title"
                           class="form-control"
                           autocomplete="new-title">
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <input type="text"
                           name="description"
                           class="form-control"
                           autocomplete="new-description">
                </div>

                 <!-- actual_price -->
                <div class="mb-3">
                    <label class="form-label">Actual_price</label>
                    <input type="number"
                           name="actual_price"
                           class="form-control"
                           autocomplete="new-actual_price">
                </div>

                 <!-- discount_price -->
                <div class="mb-3">
                    <label class="form-label">Discount_price</label>
                    <input type="number"
                           name="discount_price"
                           class="form-control"
                           autocomplete="new-discount_price">
                </div>
                
                <!-- Product Image -->
                <div class="mb-3">
                    <label class="form-label">Product Image</label>
                    <input type="file"
                            name="image"
                            class="form-control"
                            autocomplete="off">
                </div>

                 <!-- tags -->
                <div class="mb-3">
                          <label class="form-label">Tags</label>
                          <input type="text"
                              name="tags"
                           class="form-control"
                           autocomplete="new-tags">
                </div>

                {{-- categories dropdown --}}
                <div class="mb-3">
                    <label class="form-label">Category</label>
                    <select name="category_id" class="form-select">
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach         
                    </select>
                </div>
            
                  <!-- status -->
                <div class="mb-3 form-check">
                  <input type="checkbox" name="status" class="form-check-input" id="status">
                  <label class="form-check-label" for="status">Active</label>
                </div>
                
                <div class="text-end">
                    <button type="submit" class="btn btn-primary px-4">Create Product</button>
                    <a href="{{ url('/product') }}" class="btn btn-secondary ms-2">Cancel</a>
                </div>

            </form>

        </div>
    </div>

</div>

@endsection