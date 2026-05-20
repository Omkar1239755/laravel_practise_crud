@extends('admin.layouts.master')

@section('content')

@php
    use App\Models\Categories;
    $categories = Categories::all();
@endphp

<div class="app-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Product</h3>
                    </div>
                    <div class="card-body">

                        {{-- Validation Errors --}}
                        @if($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show">
                                <strong>Errors:</strong>
                                <ul class="mb-0">
                                    @foreach($errors->all() as $err)
                                        <li>{{ $err }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        {{-- UPDATE FORM --}}
                        <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            {{-- Title --}}
                            <div class="mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" name="title" class="form-control" 
                                       value="{{ old('title', $product->title) }}" required>
                            </div>

                            {{-- Description --}}
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea name="description" class="form-control">{{ old('description', $product->description) }}</textarea>
                            </div>

                            {{-- Actual Price --}}
                            <div class="mb-3">
                                <label class="form-label">Actual Price</label>
                                <input type="number" step="0.01" name="actual_price" class="form-control" 
                                       value="{{ old('actual_price', $product->actual_price) }}" required>
                            </div>

                            {{-- Discount Price --}}
                            <div class="mb-3">
                                <label class="form-label">Discount Price</label>
                                <input type="number" step="0.01" name="discount_price" class="form-control" 
                                       value="{{ old('discount_price', $product->discount_price) }}">
                            </div>

                            {{-- Tags --}}
                            <div class="mb-3">
                                <label class="form-label">Tags</label>
                                <input type="text" name="tags" class="form-control" 
                                       value="{{ old('tags', $product->tags) }}">
                            </div>

                            {{-- Category --}}
                            <div class="mb-3">
                                <label class="form-label">Category</label>
                                <select name="category_id" class="form-select">
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" 
                                            {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Images --}}
                            <div class="mb-3">
                                <label class="form-label">Existing Images</label>
                                <div class="mb-2">

                                    @php
                                        $images = $product->image ? explode(',', $product->image) : [];
                                    @endphp

                                    @foreach ($images as $img)
                                        <div style="display:inline-block; position:relative; margin-right:10px;">

                                            {{-- image preview --}}
                                            <img src="{{ asset('uploads/products/' . trim($img)) }}"
                                                width="80" height="80"
                                                style="object-fit: cover; border-radius:5px;">

                                            {{-- delete button - NO FORM HERE --}}
                                            <button type="button"
                                                onclick="deleteImage('{{ route('product.image.delete', [$product->id, trim($img)]) }}')"
                                                style="position:absolute; top:-5px; right:-5px; background:red; color:white;
                                                    width:20px; height:20px; text-align:center; border-radius:50%;
                                                    border:none; cursor:pointer; line-height:20px;">
                                                ×
                                            </button>

                                        </div>
                                    @endforeach
                                </div>

                                {{-- Replace / Add New Image --}}
                                <label class="form-label">Replace Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>

                            {{-- Status --}}
                            <div class="mb-3 form-check">
                                <input type="checkbox" name="status" class="form-check-input" 
                                       id="status" {{ $product->status ? 'checked' : '' }}>
                                <label class="form-check-label" for="status">Active</label>
                            </div>

                            {{-- Buttons --}}
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update Product</button>
                                <a href="{{ url('/product') }}" class="btn btn-secondary">Cancel</a>
                            </div>

                        </form>

                        {{-- Hidden Form For Delete Image --}}
                        <form id="deleteImgForm" method="POST" style="display:none;">
                            @csrf
                            @method('DELETE')
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- JAVASCRIPT FOR DELETE IMAGE --}}
<script>
    function deleteImage(url) {
        if (confirm("Delete this image?")) {
            let form = document.getElementById('deleteImgForm');
            form.action = url;
            form.submit();
        }
    }
</script>

@endsection
