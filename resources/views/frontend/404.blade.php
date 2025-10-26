@extends('frontend.master')

@section('content')
      <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#"></a></li>
          <li><a href="#"></a></li>
          <li><a href="#"></a></li>
          <li><a href="#"></a></li>
          <li><a href="#"></a></li>
        
          <li><a href="#"></a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="" href="#about"></a>

    </div>
  </header>

    <!-- Page Title -->
    <div class="page-title light-background mt-3">
      <div class="container">
        <nav class="breadcrumbs">
          <ol>
            <li><a href="{{url('/')}}">Home</a></li>
            <li class="current">404</li>
          </ol>
        </nav>
        <h1>404</h1>
      </div>
    </div><!-- End Page Title -->

    <!-- Error 404 Section -->
    <section id="error-404" class="error-404 section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row justify-content-center">
          <div class="col-lg-6 col-md-8">
            <div class="error-box text-center">
              <div class="error-icon" data-aos="zoom-in" data-aos-delay="200">
                <i class="bi bi-exclamation-triangle"></i>
              </div>
              <div class="error-code" data-aos="fade-up" data-aos-delay="300">
                <span>4</span>
                <span>0</span>
                <span>4</span>
              </div>
              <h2 data-aos="fade-up" data-aos-delay="400">Page Not Found</h2>
              <p data-aos="fade-up" data-aos-delay="500">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              <div class="error-actions" data-aos="fade-up" data-aos-delay="600">
                <a href="/" class="btn-home">
                  <i class="bi bi-house-door"></i>
                  <span>Back to Home</span>
                </a>
                <a href="/contact" class="btn-support">
                  <i class="bi bi-headset"></i>
                  <span>Get Support</span>
                </a>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /Error 404 Section -->

 <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

@endsection