<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
        <!--begin::Sidebar Brand-->
        <div class="sidebar-brand">
          <!--begin::Brand Link-->
          <a href="./index.html" class="brand-link">
            <!--begin::Brand Image-->
            <img
              src="{{ asset('Admin/dist/assets/img/AdminLTELogo.png') }}"
              alt="AdminLTE Logo"
              class="brand-image opacity-75 shadow"
            />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">AdminLTE 4</span>
            <!--end::Brand Text-->
          </a>
          <!--end::Brand Link-->
        </div>
        <!--end::Sidebar Brand-->
        <!--begin::Sidebar Wrapper-->
        <div class="sidebar-wrapper">
          <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul
              class="nav sidebar-menu flex-column"
              data-lte-toggle="treeview"
              role="navigation"
              aria-label="Main navigation"
              data-accordion="false"
              id="navigation"
            >
              <li class="nav-item menu-open">
                <a href="{{ url('/') }}" class="nav-link active">
                  <i class="nav-icon bi bi-speedometer"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>
              <li class="nav-item menu-open">
                <a href="{{ url('/user') }}" class="nav-link active">
                  <i class="bi bi-person"></i>
                  <p>
                    Users
                  </p>
                </a>
              </li>
              <li class="nav-item menu-open">
                <a href="{{ url('/categories') }}" class="nav-link">
                  <i class="nav-icon bi bi-bag"></i>
                  <p>
                    Categories
                  </p>
                </a>
              </li>
              <li class="nav-item menu-open">
                <a href="{{ url('/product') }}" class="nav-link">
                  <i class="nav-icon bi bi-bag"></i>
                  <p>
                    Products
                  </p>
                </a>
              </li>
              
              <li class="nav-item menu-open">
                <a href="{{ url('/testimonial') }}" class="nav-link">
                  <i class="nav-icon bi bi-bag"></i>
                  <p>
                    Testimonials
                  </p>
                </a>
              </li>

              <li class="nav-item menu-open">
                <a href="{{ url('/payment') }}" class="nav-link">
                  <i class="nav-icon bi bi-bag"></i>
                  <p>
                    Payments
                  </p>
                </a>
              </li>

              <li class="nav-item" >        
                <a href="#" class="nav-link">
                  <i class="nav-icon bi bi-gear-fill"></i>
                  <p>
                    Settings
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{  url('/admin/dashboard') }}" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Admin</p>
                    </a>
                  </li>
                </ul>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('admin.privacypolicy') }}" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>PrivacyPolicy</p>
                    </a>
                  </li>
                </ul>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{  route('admin.termsandcondition') }}" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>TermsAndCondition</p>
                    </a>
                  </li>
                </ul>
              </li>

            </ul>
            <!--end::Sidebar Menu-->
          </nav>
        </div>
        <!--end::Sidebar Wrapper-->
      </aside>
      <!-- AdminLTE CSS/JS includes removed from aside (loaded centrally in head/scripts) -->