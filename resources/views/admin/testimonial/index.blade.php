@extends('admin.layouts.master')

@section('content')

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">All Testimonials</h2>
        <a href="{{ route('testimonial.create') }}" class="btn btn-primary">Add Testimonials</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Name</th>
                <th>Image</th>
                <th>Description</th>
                <th>Designation</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($testimonials as $testimonial)
                <tr>
                    <td>{{ $testimonial->name }}</td>

                    <!-- Show First Image Only -->
                    <td>
                        @php
                            $images = explode(',', $testimonial->images);
                            $firstImage = trim($images[0]);
                        @endphp

                        @php
                            $imgPath = 'uploads/testimonials/' . $firstImage;
                            $avatar = asset('Admin/src/assets/img/avatar.png');
                            if (!empty($firstImage) && file_exists(public_path($imgPath))) {
                                $avatar = asset($imgPath);
                            }
                        @endphp
                        <img src="{{ $avatar }}"
                             width="80" height="80"
                             style="object-fit: cover; border-radius: 5px;">
                    </td>

                    <td>{{ Str::limit($testimonial->description, 50) }}</td>

                    <td>{{ $testimonial->designation }}</td>

                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('testimonial.edit', $testimonial->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $testimonial->id }}">Delete</button>
                        </div>
                    </td>
                </tr>
                <!-- Delete Confirmation Modal for Testimonial {{ $testimonial->id }} -->
                <div class="modal fade" id="deleteModal{{ $testimonial->id }}" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Confirm Delete</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure you want to delete testimonial <strong>{{ $testimonial->name }}</strong>?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Don't Delete</button>
                                <form action="{{ route('testimonial.destroy', $testimonial->id) }}" method="POST" class="d-inline">
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
