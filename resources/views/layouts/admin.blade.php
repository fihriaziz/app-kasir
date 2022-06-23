<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
data-template="vertical-menu-template-free">
  <head>
    @include('includes.meta')

    <title>@yield('title')</title>

    <!-- Favicon -->
    @stack('before-style')
    @include('includes.style-admin')
    @stack('after-style')

  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->
            @include('includes.sidebar')
                <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

            @include('includes.navbar')

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <main>@yield('content')</main>
            <!-- / Content -->

            <!-- Footer -->
            @include('includes.footer')
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>

        </div>

      </div>


      <div class="layout-overlay layout-menu-toggle"></div>
    </div>

    @stack('before-script')
    @include('includes.script-admin')
    @stack('after-script')
  </body>
</html>
