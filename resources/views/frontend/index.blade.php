@extends('frontend.master')
<style>
/* 🔹 শুধুমাত্র Contact Form Box এর জন্য */
.contact-form-box {
    background-color: #000;
    padding: 40px;
    border: 2px solid #dc3545;
    border-radius: 10px;
    box-shadow: 0 0 15px rgba(220, 53, 69, 0.4);
}

/* 🔹 Input & Textarea */
.contact-form-box .form-control {
    background-color: #000 !important; /* pure black inside */
    border: 2px solid #dc3545;
    color: #fff !important; /* ← এখানে !important লাগছে */
    border-radius: 8px;
    padding: 10px 15px;
    transition: all 0.3s ease;
}

/* 🔹 Input focus effect */
.contact-form-box .form-control:focus {
    background-color: #000 !important;
    color: #fff !important; /* ← focus এও সাদা টেক্সট */
    outline: none;
    border-color: #ff4d6d;
    box-shadow: 0 0 8px #ff4d6d;
}

/* 🔹 Placeholder color */
.contact-form-box .form-control::placeholder {
    color: #aaa !important; /* placeholder হালকা ধূসর */
}

/* 🔹 Submit Button */
.contact-form-box button[type="submit"] {
    background-color: #dc3545;
    border: none;
    color: #fff;
    padding: 12px 25px;
    border-radius: 8px;
    font-weight: 600;
    transition: 0.3s;
}

.contact-form-box button[type="submit"]:hover {
    background-color: #ff4d6d;
    box-shadow: 0 0 10px #ff4d6d;
}

/* 🔹 Success Message */
.contact-form-box .alert-success {
    background-color: #198754;
    border: 2px solid #28a745;
    color: #fff;
    font-weight: 600;
    border-radius: 8px;
    text-align: center;
    margin-bottom: 20px;
}
</style>
@section('content')
    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

        <img src="{{ asset('backend/images/banner/' . $banner->image) }}" alt="" data-aos="fade-in">

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2>{{ $banner->title }}</h2>
                    <p>I'm a <span class="typed"
                            data-typed-items="Web Designer,Web Developer, Marketer, Freelancer"></span><span
                            class="typed-cursor" aria-hidden="true"></span></p>
                    <div class="social-links">
                        <a href="{{ $banner->twitter }}" target="_blank"><i class="bi bi-twitter-x"></i></a>
                        <a href="{{ $banner->facebook }}" target="_blank"><i class="bi bi-facebook"></i></a>
                        <a href="{{ $banner->instagram }}" target="_blank"><i class="bi bi-instagram"></i></a>
                        <a href="{{ $banner->linkedin }}" target="_blank"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <span class="subtitle">About Me</span>
            <h2>About Me</h2>

        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-5">
                <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="150">
                    <div class="profile-card">
                        <div class="profile-header">
                            <div class="profile-avatar">
                                <img src="{{ asset('backend/images/about/' . $about->profile_picture) }}" class="img-fluid"
                                    alt="">
                                <div class="status-indicator"></div>
                            </div>
                            <h3>{{ $about->name }}</h3>
                            <span class="role">{{ $about->role }}</span>
                            <div class="rating">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-half"></i>
                                <span>4.8</span>
                            </div>
                        </div>

                        <div class="profile-stats">
                            <div class="stat-item">
                                <h4>15</h4>
                                <p>Projects</p>
                            </div>
                            <div class="stat-item">
                                <h4>2+</h4>
                                <p>Years</p>
                            </div>
                            <div class="stat-item">
                                <h4>1</h4>
                                <p>Awards</p>
                            </div>
                        </div>

                        <div class="profile-actions">
                            <a href="{{ 'backend/files/cv/' . $about->cv_link }}" class="btn-primary"><i
                                    class="bi bi-download"></i> Download CV</a>
                            <a href="https://wa.me/8801890331107" class="btn-secondary"><i class="bi bi-envelope"></i> Contact</a>
                        </div>

                        <div class="social-connect">
                            <a href="{{ $banner->linkedin }}"><i class="bi bi-linkedin"></i></a>
                            <a href="{{ $banner->twitter }}"><i class="bi bi-twitter"></i></a>
                            <a href="{{ $banner->instagram }}"><i class="bi bi-instagram"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8" data-aos="fade-left" data-aos-delay="200">
                    <div class="content-wrapper">
                        <div class="bio-section">
                            <div class="section-tag">Who I am</div>
                            <h2>Who I'm</h2>
                            <p>{!! $about->biography !!}</p>

                        </div>

                        <div class="details-grid">
                            <div class="detail-item" data-aos="fade-up" data-aos-delay="250">
                                <i class="bi bi-briefcase"></i>
                                <div class="detail-content">
                                    <span>Experience</span>
                                    <strong>{{ $about->experience }}</strong>
                                </div>
                            </div>

                            <div class="detail-item" data-aos="fade-up" data-aos-delay="300">
                                <i class="bi bi-mortarboard"></i>
                                <div class="detail-content">
                                    <span>Degree</span>
                                    <strong>{{ $about->degree }}</strong>
                                </div>
                            </div>

                            <div class="detail-item" data-aos="fade-up" data-aos-delay="350">
                                <i class="bi bi-geo-alt"></i>
                                <div class="detail-content">
                                    <span>Based In</span>
                                    <strong>{{ $about->location }}</strong>
                                </div>
                            </div>

                            <div class="detail-item" data-aos="fade-up" data-aos-delay="100">
                                <i class="bi bi-envelope"></i>
                                <div class="detail-content">
                                    <span>Email</span>
                                    <strong>{{ $about->email }}</strong>
                                </div>
                            </div>

                            <div class="detail-item" data-aos="fade-up" data-aos-delay="150">
                                <i class="bi bi-phone"></i>
                                <div class="detail-content">
                                    <span>Phone</span>
                                    <strong>{{ $about->phone }}</strong>
                                </div>
                            </div>

                            <div class="detail-item" data-aos="fade-up" data-aos-delay="200">
                                <i class="bi bi-calendar-check"></i>
                                <div class="detail-content">
                                    <span>Availability</span>
                                    <strong>{{ $about->availability }}</strong>
                                </div>
                            </div>
                        </div>

                        <div class="skills-showcase" data-aos="fade-up" data-aos-delay="250">
                            <div class="section-tag">Core Skills</div>
                            <h3>Technical Proficiency</h3>

                            <div class="skills-list skills-animation">
                                @foreach ($skills as $skill)
                                    <div class="skill-item">
                                        <div class="skill-info">
                                            <span class="skill-name">{{ $skill->name }}</span>
                                            <span class="skill-percent">{{ $skill->progress }}%</span>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar"
                                                style="width: {{ $skill->progress }}%;"
                                                aria-valuenow="{{ $skill->progress }}" aria-valuemin="0"
                                                aria-valuemax="100">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach


                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section><!-- /About Section -->

    <!-- Resume Section -->
    <section id="resume" class="resume section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <span class="subtitle">Resume</span>
            <h2>Resume</h2>
            <p>Responsible for designing and developing responsive, dynamic, and user-friendly websites.
Worked with technologies like HTML, CSS, JavaScript, Laravel, and PHP to build custom web solutions for clients.
Collaborated with creative teams to turn ideas into functional and visually appealing products.</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-5">
                <div class="col-lg-6">
                    <div class="experience-section">
                        <div class="section-header" data-aos="fade-right" data-aos-delay="200">
                            <div class="header-content">
                                <span class="section-badge">Experience</span>
                                <h2>Professional Journey</h2>
                                <p>I have built my career as a passionate Web Developer, turning creative ideas into modern and user-focused digital experiences.</p>
                            </div>
                        </div>

                        <div class="experience-cards">
                            <div class="exp-card featured" data-aos="zoom-in" data-aos-delay="300">
                                <div class="card-header">
                                    <div class="company-logo">
                                        <i class="bi bi-buildings"></i>
                                    </div>
                                    <div class="period-badge">Current</div>
                                </div>
                                <div class="card-body">
                                    <h3>Developer</h3>
                                    <p class="company-name">Junior Software Developer</p>
                                    <span class="duration">2024 - Present</span>
                                    <p class="description">Developing and maintaining web applications using modern technologies, ensuring clean, efficient code and seamless user experiences. Collaborating with senior developers to implement new features and optimize performance.</p>
                                    <div class="skills-tags">
                                        <span class="skill-tag">Leadership</span>
                                        <span class="skill-tag">Strategy</span>
                                        <span class="skill-tag">Innovation</span>
                                    </div>
                                </div>
                            </div>

                            <div class="exp-card" data-aos="zoom-in" data-aos-delay="350">
                                <div class="card-header">
                                    <div class="company-logo">
                                        <i class="bi bi-laptop"></i>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h3>Product Design</h3>
                                    <p class="company-name">TechForward Solutions</p>
                                    <span class="duration">2023 - 2024</span>
                                    <p class="description">Created innovative product designs from concept to prototype, focusing on user needs, functionality, and market trends. Collaborated with cross-functional teams to deliver seamless and impactful digital products.</p>
                                </div>
                            </div>

                            <div class="exp-card" data-aos="zoom-in" data-aos-delay="400">
                                <div class="card-header">
                                    <div class="company-logo">
                                        <i class="bi bi-palette"></i>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h3>UX/UI Designer</h3>
                                    <p class="company-name">Creative Studio</p>
                                    <span class="duration">2022 - 2023</span>
                                    <p class="description">Designed intuitive and engaging user interfaces for web and mobile applications, focusing on enhancing user experience, usability, and visual appeal. Collaborated with developers and product teams to bring creative concepts to life.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="education-section">
                        <div class="section-header" data-aos="fade-left" data-aos-delay="200">
                            <div class="header-content">
                                <span class="section-badge">Education</span>
                                <h2>Academic Background</h2>
                                <p>I completed my Bachelor’s in Computer Science & Engineering, where I gained a strong foundation in web technologies and software development.</p>
                            </div>
                        </div>

                        <div class="education-timeline" data-aos="fade-left" data-aos-delay="300">
                            <div class="timeline-track">
                                <div class="timeline-item">
                                    <div class="timeline-marker">
                                        <i class="bi bi-mortarboard-fill"></i>
                                    </div>
                                    <div class="timeline-content">
                                        <div class="education-meta">
                                            <span class="year-range">2021 - 2022</span>
                                            <span class="degree-level">Learning</span>
                                        </div>
                                        <h4>Webcodet IT </h4>
                                        <p class="institution">Institute of Creative skills</p>
                                        <p class="description">I started my web development journey at WebCode IT, where I learned to build modern, responsive, and user-friendly websites with real-world techniques.</p>
                                        <div class="achievement">
                                            <i class="bi bi-award"></i>
                                            <span>“Awarded highest academic honors for exceptional performance throughout my performance.”</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="timeline-item">
                                    <div class="timeline-marker">
                                        <i class="bi bi-book"></i>
                                    </div>
                                    <div class="timeline-content">
                                        <div class="education-meta">
                                            <span class="year-range">2022 - 2023</span>
                                            <span class="degree-level">Design</span>
                                        </div>
                                        <h4> Graphic Design</h4>
                                        <p class="institution">Creative Arts</p>
                                        <p class="description">Studied graphic design, focusing on visual communication, digital illustration, and creative design solutions.</p>
                                    </div>
                                </div>

                                <div class="timeline-item">
                                    <div class="timeline-marker">
                                        <i class="bi bi-patch-check-fill"></i>
                                    </div>
                                    <div class="timeline-content">
                                        <div class="education-meta">
                                            <span class="year-range">2022 - 2025</span>
                                            <span class="degree-level">Certificates</span>
                                        </div>
                                        <h4>Professional Certifications</h4>
                                        <div class="certifications-list">
                                            <div class="cert-item">
                                                <span class="cert-name">Advanced UX/UI Design</span>
                                                <span class="cert-year">2023</span>
                                            </div>
                                            <div class="cert-item">
                                                <span class="cert-name">Graphic Design</span>
                                                <span class="cert-year">2024</span>
                                            </div>
                                            <div class="cert-item">
                                                <span class="cert-name">Digital Strategy</span>
                                                <span class="cert-year">2025</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section><!-- /Resume Section -->

    <!-- Services Section -->
    <section id="services" class="services section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <span class="subtitle">Services</span>
            <h2>Services</h2>
            <p>I offer modern and creative web development services tailored to bring ideas to life with clean design and powerful functionality.
From responsive websites to dynamic web solutions, I focus on delivering quality, performance, and user satisfaction.</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">
              @foreach ($services as $service)
                    <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                    <div class="service-item">
                        <div class="icon-wrapper">
                            <i class="{{ $service->icon }}"></i>
                        </div>
                        <h4>{{ $service->title}}</h4>
                        <p>{{ $service->description}}</p>
                        <a href="{{ url('/service-details/'.$service->id) }}" class="read-more">
                            <span>Explore</span>
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
              @endforeach

                

            </div>

            <div class="row mt-5">
                <div class="col-12" data-aos="fade-up" data-aos-delay="200">
                    <div class="cta-box">
                        <div class="row align-items-center">
                            <div class="col-lg-8">
                                <h3>Transform Your Vision Into Reality</h3>
                                <p>Partner with us to bring your ideas to life with innovative solutions tailored to your
                                    needs</p>
                            </div>
                            <div class="col-lg-4 text-lg-end text-center">
                                <a href="#contact" class="cta-btn">Start Your Project</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section><!-- /Services Section -->

    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <span class="subtitle">Portfolio</span>
            <h2>Portfolio</h2>
            <p> I’m a Web Developer and Designer who loves turning creative ideas into real, interactive digital experiences. From building responsive websites to crafting smooth user interfaces, I focus on making every project functional, beautiful, and user-friendly.</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
                <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="200">
                    <li data-filter="*" class="filter-active">All Work</li>
                    <li data-filter=".filter-creative">Design</li>
                    <li data-filter=".filter-digital">Digital</li>
                    <li data-filter=".filter-strategy">Strategy</li>
                    <li data-filter=".filter-development">Development</li>
                </ul>

                <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="300">
                    @foreach ($protfolios as $protfolio)
                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-creative">
                        <div class="portfolio-card">
                            <div class="portfolio-image-container">
                                <img src="{{ asset('uploads/protfolios/'. $protfolio->image) }}"
                                    alt="Creative Project" class="img-fluid" loading="lazy">
                                <div class="portfolio-overlay">
                                    <div class="portfolio-info">
                                        <span class="project-category">{{  $protfolio->category->name}}</span>
                                        <h4>{{$protfolio->name}}</h4>
                                    </div>
                                    <div class="portfolio-actions">
                                        <a href="{{ asset('uploads/protfolios/'. $protfolio->image) }}"
                                            class="glightbox portfolio-link">
                                            <i class="bi bi-plus-lg"></i>
                                        </a>
                                        <a href="{{ url('/portfolio/details/'.$protfolio->id) }}" class="portfolio-details">
                                            <i class="bi bi-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="portfolio-meta">
                                <div class="project-tags">
                                    <span class="tag">Branding</span>
                                    <span class="tag">Identity</span>
                                </div>
                                <div class="project-year">2024</div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                   
                </div>

            </div>

            <div class="portfolio-bottom" data-aos="fade-up" data-aos-delay="400">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <h3>Like what you see?</h3>
                        <p>Donec rutrum congue leo eget malesuada. Vivamus suscipit tortor eget felis porttitor volutpat.
                        </p>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a href="#contact" class="btn btn-accent">Let's Work Together</a>
                    </div>
                </div>
            </div>

        </div>

    </section><!-- /Portfolio Section -->


    <!-- Blog-->
    <section id="blog" class="portfolio section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <span class="subtitle">Blog</span>
            <h2>Blog</h2>
            <p>Welcome to my Blog, where I share insights, tips, and tutorials on Web Development, UI/UX Design, Digital Marketing, and Technology. Whether you’re a beginner or a fellow professional, you’ll find useful guides, latest trends, and practical advice to help you grow and stay updated in the digital world.</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

                <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="300">
                    @foreach ($blogs as $blog)
                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-creative">
                        <div class="portfolio-card">
                            <div class="portfolio-image-container">
                                <img src="{{ asset('uploads/blog/' .$blog->image) }}"
                                    alt="Creative Project" class="img-fluid" loading="lazy">
                                <div class="portfolio-overlay">
                                    <div class="portfolio-info">
                                        <span class="project-category">{{ $protfolio->category}}</span>
                                        <h4> {{$blog->title}}</h4>
                                    </div>
                                    <div class="portfolio-actions">
                                        <a href="{{ asset('frontend/assets/img/portfolio/portfolio-1.webp') }}"
                                            class="glightbox portfolio-link">
                                            <i class="bi bi-plus-lg"></i>
                                        </a>
                                        <a href="{{ url('/blog-details') }}" class="portfolio-details">
                                            <i class="bi bi-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="portfolio-meta">
                                <div class="project-tags">
                                    <span class="tag">Branding</span>
                                    <span class="tag">Identity</span>
                                </div>
                                <div class="project-year">2024</div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>

            </div>



        </div>

    </section><!-- /Blog -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <span class="subtitle">Contact</span>
            <h2>Contact</h2>
            <p>I’m always open to discuss new projects, creative ideas, or opportunities. Drop a message and let’s get connected!</p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-4">
                    <div class="info-item">
                        <div class="icon-wrapper">
                            <i class="bi bi-geo-alt"></i>
                        </div>
                        <div>
                            <h3>Address</h3>
                            <p>{{ $about->location }}</p>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="icon-wrapper">
                            <i class="bi bi-telephone"></i>
                        </div>
                        <div>
                            <h3>Call Me</h3>
                            <p>{{ $about->phone }}</p>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="icon-wrapper">
                            <i class="bi bi-envelope"></i>
                        </div>
                        <div>
                            <h3>Email Me</h3>
                            <p>{{ $about->email }}</p>
                        </div>
                    </div>

                </div>

              <div class="col-lg-8">
        <div class="contact-form-box">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ url('/contact/store') }}" method="POST" novalidate>
                @csrf
                <div class="row gy-4">

                    <div class="col-md-6">
                        <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                    </div>

                    <div class="col-md-6">
                        <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                    </div>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="phone" placeholder="Your Phone" required>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                    </div>
                    
                    <div class="col-md-12">
                        <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
                    </div>

                    <div class="col-md-12 text-center">
                        <button type="submit">Send Message</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
    </div>
</div>



            </div>

        </div>

    </section><!-- /Contact Section -->
    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
@endsection
