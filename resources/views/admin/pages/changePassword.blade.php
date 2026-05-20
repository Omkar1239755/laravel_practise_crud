@extends('admin.layouts.master')

@section('content')
  <div class="container p-4">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h4 class="mb-0">Change Password</h4>
          </div>
          <div class="card-body">
            @if(session('success_message'))
              <div class="alert alert-success">{{ session('success_message') }}</div>
            @endif
            @if($errors->any())
              <div class="alert alert-danger">
                <ul class="mb-0">
                  @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            <form method="post" action="{{ route('admin.changePassword') }}" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                <label for="current_password " class="form-label">Current Password</label>
                <input id="current_password" name="current_password" type="password" class="form-control" required />
              </div>
              <div class="mb-3">
                <label for="new_password" class="form-label">New Password</label>
                <input id="new_password" name="new_password" type="password" class="form-control" required />
              </div>
              <div class="mb-3">
                <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
                <input id="new_password_confirmation" name="new_password_confirmation" type="password" class="form-control" required />
              </div>
              <div class="d-grid">
                <button class="btn btn-primary" type="submit">Change Password</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
