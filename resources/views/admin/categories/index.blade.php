@extends('admin.layouts.master')

@section('content')

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">All Categories</h2>
        <a href="{{ route('categories.create') }}" class="btn btn-primary">Add Categories</a>
    </div>

    {{-- Success message --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Error message --}}
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <!-- ID REMOVED -->
                <th>Name</th>
                <th>Images</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>

            @foreach ($categories as $category)
                <tr>

                    <!-- Name -->
                    <td>{{ $category->name }}</td>

                    <!-- Image -->
                    <td>
                        @php
                            $images = $category->image ? explode(',', $category->image) : [];
                            $firstImage = count($images) ? trim($images[0]) : null;
                        @endphp

                        @if($firstImage)
                            <img src="{{ asset('uploads/categories/' . $firstImage ) }}"
                                 width="80" height="80"
                                 style="object-fit: cover; border-radius: 5px;">
                        @else
                            <span class="text-muted">No image</span>
                        @endif
                    </td>

                    <!-- Status -->
                    <td>
                        <form action="{{ route('categories.status', $category->id) }}" method="POST">
                            @csrf
                            @php $isActive = ($category->status === 'active'); @endphp

                            <button type="submit"
                                class="btn btn-sm {{ $isActive ? 'btn-success' : 'btn-secondary' }}">
                                {{ $isActive ? 'Active' : 'Inactive' }}
                            </button>
                        </form>
                    </td>

                    <!-- Action buttons -->
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm">Edit</a>

                            <button type="button" class="btn btn-danger btn-sm"
                                data-bs-toggle="modal"
                                data-bs-target="#deleteModal{{ $category->id }}">
                                Delete
                            </button>
                        </div>
                    </td>

                </tr>

                <!-- Delete Modal -->
                <div class="modal fade" id="deleteModal{{ $category->id }}" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title">Confirm Delete</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <div class="modal-body">
                                <p>Are you sure you want to delete category <strong>{{ $category->name }}</strong>?</p>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Don't Delete</button>

                                <form action="{{ route('categories.delete', $category->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Confirm Delete</button>
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
