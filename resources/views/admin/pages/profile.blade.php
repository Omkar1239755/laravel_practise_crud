@extends('admin.layouts.master')

@section('content')
  <div class="container-fluid p-4">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header d-flex align-items-center">
            <h3 class="mb-0">Admin Profile</h3>
            <a href="{{ url('/edit') }}" class="btn btn-sm btn-outline-secondary ms-auto">Edit Profile</a>
          </div>
          <div class="card-body">
            <div class="d-flex gap-4 align-items-center">
              <img src="{{ asset('Admin/dist/assets/img/user2-160x160.jpg') }}" alt="Admin Avatar" class="rounded-circle shadow" width="120" height="120" />
              <div>
                <h4 class="mb-1">Alexander Pierce</h4>
                <p class="mb-1 text-muted">admin@example.com</p>
                <p class="mb-0">Role: Super Admin</p>
              </div>
            </div>

            <hr />

            <h5>About</h5>
            <p class="text-muted">This is the admin profile page. Replace these placeholder values with dynamic data from the database (e.g., Auth::user() or a dedicated Admin model).</p>

            <div class="row mt-3">
              <div class="col-md-6">
                <ul class="list-group">
                  <li class="list-group-item"><strong>Joined:</strong> Jan 2023</li>
                  <li class="list-group-item"><strong>Last login:</strong> 2025-11-19 12:34</li>
                </ul>
              </div>
              <div class="col-md-6">
                <a href="{{ url('/changepassword') }}" class="btn btn-primary">Change Password</a>
                <a href="{{ url('/deleteAccount') }}" class="btn btn-outline-danger ms-2">Delete Account</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
