<!doctype html>
<html lang="en">

  <!--begin::Head-->
     @include('admin.includes.head')
  <!--end::Head-->

  <!--begin::Body-->
  <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">

      <!--begin::Header-->
       @include('admin.includes.header')
      <!--end::Header-->

      <!--begin::Sidebar-->
      @include('admin.includes.aside')
      <!--end::Sidebar-->

      <!--begin::App Main-->
      @yield('content')
      <!--end::App Main-->

      <!--begin::Footer-->
      @include('admin.includes.footer')
      <!--end::Footer-->

    </div>
    <!--end::App Wrapper-->
    <!--begin::Script-->
    @include('admin.includes.scripts')
    <!--end::Script-->
  </body>
  <!--end::Body-->
</html>
