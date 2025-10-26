@extends('frontend.master')

@section('content')

<!-- Service Details Section -->
<section id="service-details" class="service-details section mt-5">
  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row">

      <!-- Sidebar -->
      <div class="col-lg-4 order-lg-2">
        <div class="sticky-sidebar">

          <div class="service-card" data-aos="fade-left" data-aos-delay="200">
            <div class="card-header">
              <div class="service-icon">
                <i class="bi bi-code-square"></i>
              </div>
              <h3>{{ $service->title }}</h3>
              <p class="service-tagline">Full-Stack Solutions</p>
            </div>
            <div class="card-body">
              <div class="price-tag">
                <span class="label">Starting at</span>
                <span class="price">{{ $service->starting_price }}</span>
              </div>
              <ul class="quick-info">
                <li><i class="bi bi-clock"></i><span>4-6 weeks delivery</span></li>
                <li><i class="bi bi-arrow-repeat"></i><span>Unlimited revisions</span></li>
                <li><i class="bi bi-shield-check"></i><span>60 days support</span></li>
              </ul>
              <div class="cta-buttons">
                <a href="{{url('/contact')}}" class="btn-primary">Start Project</a>
              </div>
            </div>
          </div>

          <div class="contact-card" data-aos="fade-left" data-aos-delay="300">
            <h4>Have Questions?</h4>
            <p>Let's discuss your project requirements and how I can help.</p>
            <div class="contact-methods">
              <a href="mailto:{{ $setting->email }}" class="contact-item">
                <i class="bi bi-envelope"></i>
                <span>{{ $setting->email }}</span>
              </a>
              <a href="tel:{{ $setting->phone }}" class="contact-item">
                <i class="bi bi-telephone"></i>
                <span>{{ $setting->phone }}</span>
              </a>
            </div>
          </div>

        </div>
      </div>

      <!-- Main Content -->
      <div class="col-lg-8 order-lg-1">

        <div class="service-overview" data-aos="fade-up" data-aos-delay="200">
          <div class="overview-header">
            <span class="badge">Premium Service</span>
            <h2>{{ $service->title }}</h2>
          </div>
          <p class="lead-text">{{ $service->description }}</p>
        </div>

        <div class="service-image-showcase" data-aos="zoom-in" data-aos-delay="300">
          <img src="{{ asset('backend/images/service/' . $service->image) }}" alt="Web Development" class="img-fluid main-image">
          <div class="image-overlay">
            <div class="tech-stack">
              <span class="tech-item">Html</span>
              <span class="tech-item">Css</span>
              <span class="tech-item">Javascript</span>
              <span class="tech-item">Php</span>
              <span class="tech-item">Laravel</span>
            </div>
          </div>
        </div>

        <div class="features-grid" data-aos="fade-up" data-aos-delay="400">
          <h3 class="section-heading">What You Get</h3>
          <div class="row g-4">
            <div class="col-md-6">
              <div class="feature-box">
                <div class="icon-wrapper"><i class="bi bi-layers"></i></div>
                <h4>Modern Architecture</h4>
                <p>Scalable, maintainable code structure using the latest web technologies and best practices for long-term success.</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="feature-box">
                <div class="icon-wrapper"><i class="bi bi-speedometer2"></i></div>
                <h4>Lightning Fast</h4>
                <p>Optimized performance with lazy loading, code splitting, and CDN integration for instant page loads.</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="feature-box">
                <div class="icon-wrapper"><i class="bi bi-phone-landscape"></i></div>
                <h4>Responsive Design</h4>
                <p>Pixel-perfect layouts that adapt seamlessly across all devices, from mobile phones to large desktop screens.</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="feature-box">
                <div class="icon-wrapper"><i class="bi bi-graph-up"></i></div>
                <h4>SEO Optimized</h4>
                <p>Search engine friendly structure with semantic HTML, meta tags, and performance optimizations built in.</p>
              </div>
            </div>
          </div>
        </div>

        <div class="workflow-section" data-aos="fade-up" data-aos-delay="500">
          <h3 class="section-heading">Development Workflow</h3>
          <div class="timeline">
            <div class="timeline-item">
              <div class="timeline-marker">1</div>
              <div class="timeline-content">
                <h4>Strategy & Planning</h4>
                <p>Initial phase for defining goals and crafting the best approach for your project.</p>
                <span class="duration">1 week</span>
              </div>
            </div>
            <div class="timeline-item">
              <div class="timeline-marker">2</div>
              <div class="timeline-content">
                <h4>Design & Prototyping</h4>
                <p>Beautiful, intuitive design and mockups created to visualize your product early.</p>
                <span class="duration">1-2 weeks</span>
              </div>
            </div>
            <div class="timeline-item">
              <div class="timeline-marker">3</div>
              <div class="timeline-content">
                <h4>Development & Testing</h4>
                <p>Robust coding, API integration, and quality assurance to ensure smooth performance.</p>
                <span class="duration">2-3 weeks</span>
              </div>
            </div>
            <div class="timeline-item">
              <div class="timeline-marker">4</div>
              <div class="timeline-content">
                <h4>Launch & Optimization</h4>
                <p>Final delivery with speed optimization and post-launch support for stability.</p>
                <span class="duration">1 week</span>
              </div>
            </div>
          </div>
        </div>

        <div class="testimonial-section" data-aos="fade-up" data-aos-delay="600">
          <div class="testimonial-card">
            <div class="stars">
              <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
            </div>
            <blockquote>"{{ $testimonial->message }}"</blockquote>
            <div class="client-info">
              <img src="{{ asset('uploads/testimonials/' . $testimonial->photo) }}" alt="Client" class="client-avatar">
              <div class="client-details">
                <h5>{{ $testimonial->name }}</h5>
                <p>{{ $testimonial->designation }}</p>
              </div>
            </div>
          </div>
        </div>


{{-- Technologies & Tools --}}
<div class="tech-details" data-aos="fade-up" data-aos-delay="700">
  <h3 class="section-heading">Technologies & Tools</h3>

  <div class="tech-categories">
    <!-- Frontend -->
    <div class="tech-category">
      <h5>Frontend</h5>
      <div class="tech-tags">
        @php
          $frontendData = $service->frontend;

          if (is_string($frontendData)) {
              $frontend = array_filter(array_map('trim', explode(',', $frontendData)));
          } elseif (is_array($frontendData)) {
              $frontend = array_filter($frontendData);
          } else {
              $frontend = [];
          }
        @endphp

        @foreach($frontend as $tech)
          @if(!empty($tech))
            <span>{{ $tech }}</span>
          @endif
        @endforeach
      </div>
    </div>

    <!-- Backend -->
    <div class="tech-category">
      <h5>Backend</h5>
      <div class="tech-tags">
        @php
          $backendData = $service->backend;

          if (is_string($backendData)) {
              $backend = array_filter(array_map('trim', explode(',', $backendData)));
          } elseif (is_array($backendData)) {
              $backend = array_filter($backendData);
          } else {
              $backend = [];
          }
        @endphp

        @foreach($backend as $tech)
          @if(!empty($tech))
            <span>{{ $tech }}</span>
          @endif
        @endforeach
      </div>
    </div>

    <!-- Database -->
    <div class="tech-category">
      <h5>Database</h5>
      <div class="tech-tags">
        @php
          $databaseData = $service->database;

          if (is_string($databaseData)) {
              $database = array_filter(array_map('trim', explode(',', $databaseData)));
          } elseif (is_array($databaseData)) {
              $database = array_filter($databaseData);
          } else {
              $database = [];
          }
        @endphp

        @foreach($database as $tech)
          @if(!empty($tech))
            <span>{{ $tech }}</span>
          @endif
        @endforeach
      </div>
    </div>
  </div>
</div>

      </div>
    </div>
  </div>
</section>

<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
  <i class="bi bi-arrow-up-short"></i>
</a>

@endsection
