@extends('admin.layouts.master')

@section('content')

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">All Users</h2>
        <a href="{{ route('user.create') }}" class="btn btn-primary">Add User</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Avatar</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>

            @foreach ($users as $user)
                <tr>

                    <!-- Avatar -->
                    <td>
                        @php
                            $avatarUrl = asset('Admin/src/assets/img/avatar.png'); // default image

                            if (!empty($user->profile_image)) {
                                $first = trim($user->profile_image);
                                if ($first) {
                                    $uploadedPath = public_path('uploads/users/' . $first);
                                    if (file_exists($uploadedPath)) {
                                        $avatarUrl = asset('uploads/users/' . $first);
                                    } else {
                                        $avatarUrl = asset($first);
                                    }
                                }
                            }
                        @endphp

                        <img src="{{ $avatarUrl }}" width="80" height="80"
                            style="object-fit: cover; border-radius: 5px;">
                    </td>

                    <!-- Name -->
                    <td>{{ $user->name }}</td>

                    <!-- Email -->
                    <td>{{ $user->email }}</td>

                    <!-- Actions -->
                    <td>
                        <a href="{{ url('/user/' . $user->id . '/edit') }}" class="btn btn-warning btn-sm">Update</a>
                        <button type="button" class="btn btn-danger btn-sm"
                            data-bs-toggle="modal"
                            data-bs-target="#deleteModal{{ $user->id }}">
                            Delete
                        </button>
                    </td>
                </tr>

                <!-- Delete Modal -->
                <div class="modal fade" id="deleteModal{{ $user->id }}" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Confirm Delete</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure you want to delete user <strong>{{ $user->name }}</strong>?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Don't Delete</button>

                                <form action="{{ url('/user/' . $user->id) }}" method="POST" class="d-inline">
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
