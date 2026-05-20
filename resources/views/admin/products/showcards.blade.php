@extends('admin.layouts.master')

@section('content')

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">All Products</h2>
        <a href="{{ url('/product/create') }}" class="btn btn-primary">Add Product</a>
    </div>

    {{-- Success message --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Error message --}}
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Images</th>
                <th>Title</th>
                <th>Description</th>
                <th>Actual Price</th>
                <th>Discount Price</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>

            @foreach ($products as $product)
                <tr>

                    <!-- Image -->
                    <td>
                        @php
                            $images = $product->image ? explode(',', $product->image) : [];
                            $firstImage = count($images) ? trim($images[0]) : null;
                        @endphp

                        @if($firstImage)
                            <img src="{{ asset('uploads/products/' . $firstImage ) }}"
                                 width="80" height="80"
                                 style="object-fit: cover; border-radius: 5px;">
                        @else
                            <span class="text-muted">No image</span>
                        @endif
                    </td>

                    <td>{{ $product->title }}</td>

                    <td>{{ Str::limit($product->description, 50) }}</td>

                    <td class="text-danger">₹{{ $product->actual_price }}</td>

                    <td class="text-success fw-bold">₹{{ $product->discount_price }}</td>

                    <!-- STATUS BUTTON -->
                    <td>
                        <form action="{{ route('product.status', $product->id) }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="btn btn-sm {{ $product->status ? 'btn-success' : 'btn-secondary' }}">
                                {{ $product->status ? 'Active' : 'Inactive' }}
                            </button>
                        </form>
                    </td>

                    <!-- Action Buttons -->
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('product.edit', $product->id) }}"
                               class="btn btn-warning btn-sm">Edit</a>

                            <button type="button"
                                    class="btn btn-danger btn-sm"
                                    data-bs-toggle="modal"
                                    data-bs-target="#deleteModal{{ $product->id }}">
                                Delete
                            </button>
                        </div>
                    </td>

                </tr>

                <!-- Delete Confirmation Modal -->
                <div class="modal fade" id="deleteModal{{ $product->id }}" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title">Confirm Delete</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <div class="modal-body">
                                <p>Are you sure you want to delete product
                                    <strong>{{ $product->title }}</strong>?</p>
                            </div>

                            <div class="modal-footer">
                                <button type="button"
                                        class="btn btn-secondary"
                                        data-bs-dismiss="modal">
                                    Don't Delete
                                </button>

                                <form action="{{ url('/product/' . $product->id) }}"
                                      method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">
                                        Confirm Delete
                                    </button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

            @endforeach

        </tbody>
    </table>

</div>

@endsection
