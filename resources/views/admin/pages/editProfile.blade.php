@extends('admin.layouts.master')

@section('content')
  <div class="container-fluid p-4">
    <div class="row justify-content-center">
      <div class="col-md-8">

        <div class="card">
          <div class="card-header">
            <h3>Edit Profile</h3>
          </div>

          <div class="card-body">

            @if(session('success'))
              <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form method="post" action="{{ route('admin.editProfile') }}" enctype="multipart/form-data">
              @csrf

              {{-- Name --}}
              <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" value="{{ $admin->name }}" required>
              </div>

              {{-- Current Image --}}
              @if($admin->image)
                <div class="mb-3">
                  <label>Current Image</label><br>
                  <img src="{{ asset('uploads/admins/' . $admin->image) }}" width="100" class="rounded border">
                </div>
              @endif

              {{-- Upload New Image --}}
              <div class="mb-3">
                <label class="form-label">Upload New Image</label>
                <input type="file" name="image" class="form-control" accept="image/*">
              </div>

              <button class="btn btn-primary">Update</button>
              <a href="/admin" class="btn btn-secondary">Cancel</a>

            </form>
          </div>
        </div>

      </div>
    </   div>
  </div>
@endsection
