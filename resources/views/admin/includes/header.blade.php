@php
    use App\Models\Admin;

    $admin = Admin::first(); // fetch single admin

    $adminName  = $admin?->name ?? 'Admin';
    $adminImage = $admin?->image
        ? asset('uploads/admins/' . $admin->image)
        : asset('Admin/dist/assets/img/user2-160x160.jpg');
@endphp


<nav class="app-header navbar navbar-expand bg-body">
    <div class="container-fluid">

        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                    <i class="bi bi-list"></i>
                </a>
            </li>
            <li class="nav-item d-none d-md-block">
                <a href="{{ url('/admin/dashboard') }}" class="nav-link">Home</a>
            </li>
        </ul>

        <ul class="navbar-nav ms-auto">

            {{-- USER MENU --}}
            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">

                    {{-- Small Image --}}
                    <img src="{{ $adminImage }}" 
                         class="user-image rounded-circle shadow" 
                         alt="Admin Image">

                    <span class="d-none d-md-inline">{{ $adminName }}</span>
                </a>

                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">

                    {{-- Big dropdown avatar --}}
                    <li class="user-header text-bg-primary">
                        <img src="{{ $adminImage }}" 
                             class="rounded-circle shadow" 
                             alt="Admin Image">
                        <p>
                            {{ $adminName }}
                            <small>Logged in as Admin</small>
                        </p>
                    </li>

              <li class="user-footer d-flex justify-content-between align-items-center px-3">

    {{-- Profile Button --}}
    <a href="{{ route('admin.editProfile') }}" 
       class="btn btn-primary btn-md d-flex align-items-center gap-1" 
       style="border-radius: 10px; padding: 6px 14px;">
        <i class="bi bi-person-lines-fill"></i> Profile
    </a>

    {{-- Logout Button --}}
    <a href="{{ route('admin.logout') }}"
       class="btn btn-danger btn-md d-flex align-items-center gap-1"
       style="border-radius: 10px; padding: 6px 14px;">
        <i class="bi bi-box-arrow-right"></i> Logout
    </a>

</li>


                </ul>
            </li>
            {{-- END USER MENU --}}

            
        </ul>

    </div>
</nav>
