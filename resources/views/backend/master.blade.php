<!DOCTYPE html>
<html lang="en">

<head>
   @include('backend.includes.style')
   
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
       
        <!-- Sidebar Start -->
        @include('backend.includes.sidebar')
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
         @include('backend.includes.navbar')
            <!-- Navbar End -->

          <main>
              @yield('content')
          </main>

            <!-- Footer Start -->
          @include('backend.includes.footer')
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

   <!-- JavaScript Libraries -->
  @include('backend.includes.script')

  @stack('script')
</body>

</html>