@extends('frontend.master')

@section('content')
    <!-- Portfolio Details Section -->
    <section id="portfolio-details" class="portfolio-details section mt-5">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <span class="subtitle">Portfolio Details</span>
            <h2>Portfolio Details</h2>
            <p>Our portfolio showcases a wide range of projects that combine creativity, technology, and innovation. Each
                project reflects our commitment to delivering exceptional digital solutions that drive results for our
                clients. Explore our work to see how we bring ideas to life, from concept to completion.</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-5">

                <div class="col-lg-8">

                    <div class="portfolio-details-slider swiper init-swiper">
                        <script type="application/json" class="swiper-config">
                {
                  "loop": true,
                  "speed": 600,
                  "autoplay": {
                    "delay": 4000
                  },
                  "slidesPerView": 1,
                  "spaceBetween": 0,
                  "effect": "fade",
                  "pagination": {
                    "el": ".swiper-pagination",
                    "type": "bullets",
                    "clickable": true
                  }
                }
              </script>
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="{{ asset('uploads/protfolios/' . $protfolio->image) }}"
                                    alt="{{ $protfolio->name }}" class="img-fluid">
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>

                    <div class="portfolio-content" data-aos="fade-up" data-aos-delay="200">
                        <h2>{{ $protfolio->name }}</h2>

                        <div class="meta-info">
                            <span class="date"><i class="bi bi-calendar"></i>{{ \Carbon\Carbon::parse($protfolio->date)->format('d M Y') }}</span>
                            <span class="category"><i class="bi bi-tag"></i>{{ $protfolio->category->name }}</span>
                            <span class="client"><i class="bi bi-building"></i>{{ $protfolio->client }}</span>
                        </div>

                        <p>
                            {!! $protfolio->description !!}
                        </p>

                        <h3>Project Overview</h3>
                        <p>
                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                            pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                            mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                            accusantium doloremque laudantium.
                        </p>

                        <div class="highlights-box">
                            <h4>Key Highlights</h4>
                            <ul>
                                <li><i class="bi bi-check-circle"></i> Responsive design across all devices</li>
                                <li><i class="bi bi-check-circle"></i> Advanced user authentication system</li>
                                <li><i class="bi bi-check-circle"></i> Real-time data synchronization</li>
                                <li><i class="bi bi-check-circle"></i> Optimized performance and loading speed</li>
                                <li><i class="bi bi-check-circle"></i> Comprehensive admin dashboard</li>
                            </ul>
                        </div>

                        <h3>Technical Implementation</h3>
                        <p>
                            Totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae
                            dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut
                            fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.
                        </p>

                        <blockquote>
                            <i class="bi bi-quote quote-icon"></i>
                            <p>
                                Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci
                                velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam
                                quaerat voluptatem.
                            </p>
                            <div class="author">
                                <img src="{{ asset('frontend/assets/img/person/person-m-7.webp') }}" alt="Author">
                                <div class="author-info">
                                    <h5>Michael Anderson</h5>
                                    <span>Project Lead</span>
                                </div>
                            </div>
                        </blockquote>

                        <p>
                            At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum
                            deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non
                            provident, similique sunt in culpa qui officia deserunt mollitia animi.
                        </p>

                    </div>

                </div>

                <div class="col-lg-4">

                    <div class="sidebar" data-aos="fade-up" data-aos-delay="200">

                        <div class="info-card">
                            <h3>Project Details</h3>
                            <div class="info-item">
                                <span class="label">Client</span>
                                <span class="value">{{ $protfolio->client }}</span>
                            </div>
                            <div class="info-item">
                                <span class="label">Category</span>
                                <span class="value">{{ $protfolio->category->name }}</span>
                            </div>
                            <div class="info-item">
                                <span class="label">Date</span>
                                <span class="value">{{ \Carbon\Carbon::parse($protfolio->date)->format('d M Y') }}</span>
                            </div>
                            <div class="info-item">
                                <span class="label">Duration</span>
                                <span class="value">{{ $protfolio->duration }}</span>
                            </div>
                            <div class="info-item">
                                <span class="label">Technologies</span>
                                <span class="value">{{$protfolio->tools}}</span>
                            </div>
                            <a href="#" class="btn-primary" target="_blank">
                                <i class="bi bi-box-arrow-up-right"></i> View Live Project
                            </a>
                        </div>

                        <div class="share-card" data-aos="fade-up" data-aos-delay="300">
                            <h3>Share This Project</h3>
                            <div class="social-links">
                                <a href="{{ $banner->facebook }}" class="facebook"><i class="bi bi-facebook"></i></a>
                                <a href="{{ $banner->twitter }}" class="twitter"><i class="bi bi-twitter"></i></a>
                                <a href="{{ $banner->linkedin }}" class="linkedin"><i class="bi bi-linkedin"></i></a>
                                <a href="https://www.pinterest.com/nusratjahanitbd" class="pinterest"><i
                                        class="bi bi-pinterest"></i></a>
                            </div>
                        </div>

                        <div class="tags-card" data-aos="fade-up" data-aos-delay="400">
                            <h3>Tags</h3>
                            <div class="tags">
                                <a href="#">Design</a>
                                <a href="#">Development</a>
                                <a href="#">React</a>
                                <a href="#">UX/UI</a>
                                <a href="#">Frontend</a>
                                <a href="#">Backend</a>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section><!-- /Portfolio Details Section -->



    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
@endsection
