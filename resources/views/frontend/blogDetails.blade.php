@extends('frontend.master')
<style>
.quote-wrapper {
  display: flex;
  justify-content: center; /* horizontal center */
  align-items: center;    /* vertical center */
  min-height: 200px;      /* div height অনুযায়ী adjust করতে পারো */
  padding: 20px;
  background: #f8f9fa;    /* light background, চাইলে change করতে পারো */
  border: 3px solid #dc3545; /* 🔴 Outer red border */
  border-radius: 15px;
}

.custom-quote {
  position: relative;
  background: #fff;
  border-left: 6px solid #dc3545; /* left red stripe */
  padding: 25px 35px;
  border-radius: 12px;
  box-shadow: 0 4px 10px rgba(0,0,0,0.08);
  max-width: 700px; /* max width control */
  text-align: center;
}

.custom-quote i {
  position: absolute;
  top: -15px;
  left: 20px;
  font-size: 45px;
  color: #f03e3e;
  opacity: 0.15;
}

.custom-quote p {
  font-style: italic;
  color: #444;
  font-size: 1.05rem;
  margin: 0;
  line-height: 1.7;
}

.custom-quote .author {
  margin-top: 10px;
  font-weight: 600;
  color: #dc3545;
  font-size: 0.95rem;
}
</style>

@section('content')

<!-- Blog Details Section -->
<section id="blog-details" class="blog-details section mt-5">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <span class="subtitle">Blog Details</span>
    <h2>Insights & Inspiration</h2>
    <p>Discover stories, tips, and creative ideas from the world of web design, development, and digital innovation.</p>
  </div><!-- End Section Title -->

  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row gy-5">

      <!-- Blog Content -->
      <div class="col-lg-8">

        <div class="blog-featured">
          <img src="{{ asset('uploads/blog/'.$blogs->image) }}" alt="Blog Image" class="img-fluid rounded-3 shadow">
        </div>

        <div class="blog-meta mt-4">
          <span><i class="bi bi-person"></i> Admin</span>
          <span><i class="bi bi-calendar"></i> October 20, 2025</span>
          <span><i class="bi bi-chat"></i> 5 Comments</span>
        </div>

        <div class="blog-content mt-4">
          <h2 class="fw-bold mb-3">{{$blogs->title}}</h2>
         {!! $blogs->content !!}

          <h3 class="mt-5">Key Takeaways</h3>
          <ul class="list-unstyled mt-3">
            @foreach(json_decode($blogs->key_takeaways) as $takeaway)
            <li><i class="bi bi-check-circle text-danger"></i> {{ $takeaway }}</li>
              @endforeach
          </ul>

          <p class="mt-4">
            A beautiful design that frustrates the user is a failure. The future belongs to experiences that connect technology with empathy — 
            turning interfaces into meaningful interactions.
          </p>

        </div>
      </div>

      <!-- Sidebar -->
      <div class="col-lg-4">

        <div class="sidebar" data-aos="fade-up" data-aos-delay="200">
          
          <!-- About the Author -->
          <div class="info-card mb-4">
            <h3>About the Author</h3>
            <div class="d-flex align-items-center mt-3">
              <img src="{{ asset('frontend/assets/img/blog/Nusrat Jahan.png') }}" alt="Author" class="rounded-circle me-3" width="60">
              <div>
                <h5 class="mb-0">Nusrat Jahan</h5>
                <small>Creative Web Designer</small>
              </div>
            </div>
            <p class="mt-3 mb-0">Passionate about crafting digital experiences that blend creativity with usability. Loves UI/UX, Laravel, and storytelling through design.</p>
          </div>

          <!-- Recent Posts -->
          <div class="info-card mb-4">
            <h3>Recent Posts</h3>
            <ul class="list-unstyled mt-3">
              <li><a href="#">Mastering Color Psychology in UI Design</a></li>
              <li><a href="#">How to Build a Responsive Portfolio Website</a></li>
              <li><a href="#">Top 10 UX Mistakes Designers Should Avoid</a></li>
            </ul>
          </div>

          <!-- Tags -->
          <div class="tags-card">
            <h3>Tags</h3>
            <div class="tags">
              <a href="#">UI/UX</a>
              <a href="#">Design</a>
              <a href="#">Inspiration</a>
              <a href="#">Web</a>
              <a href="#">Creative</a>
              <a href="#">Frontend</a>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

</section><!-- /Blog Details Section -->

<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
  <i class="bi bi-arrow-up-short"></i>
</a>

@endsection
