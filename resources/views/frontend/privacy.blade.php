@extends('frontend.master')
<style>
  .policy-nav .nav-link {
    display: block;
    padding: 0.5rem 1rem;
    color: #444;
    border-left: 3px solid transparent;
    transition: all 0.3s ease;
}

.policy-nav .nav-link.active {
    color: #dc3545; /* লাল হাইলাইট */
    font-weight: 600;
    border-left: 3px solid #dc3545;
    background-color: #f9f9f9;
    border-radius: 0 5px 5px 0;
}
</style>
@section('content')

<!-- Privacy Section -->
<section id="privacy" class="privacy section mt-5">

  <div class="container">

    <div class="row">
      <!-- Sidebar Navigation -->
      <div class="col-lg-3">
        <div class="policy-sidebar" data-aos="fade-right">
          <h3>Contents</h3>
          <nav class="policy-nav">
            <a href="#introduction" class="nav-link active">Introduction</a>
            <a href="#information-collect" class="nav-link">Information We Collect</a>
            <a href="#use-information" class="nav-link">How We Use Data</a>
            <a href="#sharing" class="nav-link">Information Sharing</a>
            <a href="#security" class="nav-link">Data Security</a>
            <a href="#rights" class="nav-link">Your Rights</a>
            <a href="#changes" class="nav-link">Policy Updates</a>
            <a href="#contact" class="nav-link">Contact Us</a>
          </nav>
        </div>
      </div>

      <!-- Main Content -->
      <div class="col-lg-9">
        <div class="policy-main">
          <!-- Header -->
          <div class="policy-hero" data-aos="fade-up">
            <div class="badge">Last Updated: October 23, 2025</div>
            <h1>Privacy Policy</h1>
            <p class="lead">At Aman IT Agency, your privacy is our priority. We ensure your data is handled securely and transparently.</p>
          </div>

          <!-- Introduction -->
          <div class="policy-section" id="introduction" data-aos="fade-up" data-aos-delay="100">
            <div class="section-number">01</div>
            <h2>Introduction</h2>
            <p>Welcome to Aman IT Agency’s Privacy Policy. We respect your privacy and are committed to protecting your personal information while providing an exceptional digital experience.</p>
          </div>

          <!-- Information Collection -->
          <div class="policy-section" id="information-collect" data-aos="fade-up" data-aos-delay="150">
            <div class="section-number">02</div>
            <h2>Information We Collect</h2>
            <p>We may collect the following information to provide better services:</p>

            <div class="info-card">
              <div class="card-icon">
                <i class="bi bi-person-fill"></i>
              </div>
              <div class="card-content">
                <h3>Personal Information</h3>
                <p>This includes details you provide while contacting us or using our services:</p>
                <ul>
                  <li>Name, email address, and contact number</li>
                  <li>Service inquiries and messages</li>
                  <li>Billing and payment details</li>
                  <li>Feedback and testimonials</li>
                </ul>
              </div>
            </div>

            <div class="info-card">
              <div class="card-icon">
                <i class="bi bi-gear-fill"></i>
              </div>
              <div class="card-content">
                <h3>Automated Data Collection</h3>
                <p>We collect some information automatically when you interact with our website:</p>
                <ul>
                  <li>IP address and browser type</li>
                  <li>Pages visited and time spent</li>
                  <li>Referral websites and links clicked</li>
                  <li>Device and operating system details</li>
                </ul>
              </div>
            </div>
          </div>

          <!-- Use of Information -->
          <div class="policy-section" id="use-information" data-aos="fade-up" data-aos-delay="200">
            <div class="section-number">03</div>
            <h2>How We Use Your Information</h2>
            <p>We use the information collected to improve your experience and deliver quality services:</p>
            <div class="usage-grid">
              <div class="usage-item">
                <i class="bi bi-check-circle-fill"></i>
                <span>Personalize our website content</span>
              </div>
              <div class="usage-item">
                <i class="bi bi-check-circle-fill"></i>
                <span>Respond to your inquiries efficiently</span>
              </div>
              <div class="usage-item">
                <i class="bi bi-check-circle-fill"></i>
                <span>Analyze usage trends for better service</span>
              </div>
              <div class="usage-item">
                <i class="bi bi-check-circle-fill"></i>
                <span>Maintain a secure environment for users</span>
              </div>
              <div class="usage-item">
                <i class="bi bi-check-circle-fill"></i>
                <span>Send updates or newsletters (if subscribed)</span>
              </div>
              <div class="usage-item">
                <i class="bi bi-check-circle-fill"></i>
                <span>Comply with legal and regulatory obligations</span>
              </div>
            </div>
          </div>

          <!-- Information Sharing -->
          <div class="policy-section" id="sharing" data-aos="fade-up" data-aos-delay="250">
            <div class="section-number">04</div>
            <h2>Information Sharing and Disclosure</h2>
            <p>We only share your information under specific circumstances:</p>

            <div class="sharing-box">
              <h3>With Your Consent</h3>
              <p>We may share your data with trusted partners or service providers to deliver requested services.</p>
            </div>

            <div class="sharing-box">
              <h3>Legal Requirements</h3>
              <p>We may disclose your information if required by law or to protect our legal rights:</p>
              <ul>
                <li>Compliance with regulations</li>
                <li>Protection against fraud or illegal activities</li>
                <li>Defending our legal interests</li>
                <li>Responding to court orders or legal requests</li>
              </ul>
            </div>
          </div>

          <!-- Data Security -->
          <div class="policy-section" id="security" data-aos="fade-up" data-aos-delay="300">
            <div class="section-number">05</div>
            <h2>Data Security</h2>
            <p>We implement robust measures to ensure your data remains safe:</p>
            <div class="security-features">
              <div class="feature">
                <i class="bi bi-shield-lock"></i>
                <h4>Encryption</h4>
                <p>All sensitive data is encrypted to prevent unauthorized access.</p>
              </div>
              <div class="feature">
                <i class="bi bi-eye-slash"></i>
                <h4>Access Control</h4>
                <p>Only authorized personnel can access your personal information.</p>
              </div>
              <div class="feature">
                <i class="bi bi-database-lock"></i>
                <h4>Data Protection</h4>
                <p>Regular backups and security protocols ensure data integrity.</p>
              </div>
            </div>
          </div>

          <!-- Your Rights -->
          <div class="policy-section" id="rights" data-aos="fade-up" data-aos-delay="100">
            <div class="section-number">06</div>
            <h2>Your Rights and Choices</h2>
            <p>You have control over your personal information and how it is used:</p>
            <div class="rights-list">
              <div class="right-item">
                <div class="right-icon"><i class="bi bi-folder2-open"></i></div>
                <div class="right-content">
                  <h4>Access Your Data</h4>
                  <p>Request a copy of the data we hold about you.</p>
                </div>
              </div>
              <div class="right-item">
                <div class="right-icon"><i class="bi bi-pencil-square"></i></div>
                <div class="right-content">
                  <h4>Correct Information</h4>
                  <p>Update or correct any inaccurate personal data.</p>
                </div>
              </div>
              <div class="right-item">
                <div class="right-icon"><i class="bi bi-trash"></i></div>
                <div class="right-content">
                  <h4>Delete Your Data</h4>
                  <p>Request deletion of personal information we maintain.</p>
                </div>
              </div>
              <div class="right-item">
                <div class="right-icon"><i class="bi bi-ban"></i></div>
                <div class="right-content">
                  <h4>Object to Processing</h4>
                  <p>Opt-out from certain types of data processing.</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Policy Updates -->
          <div class="policy-section" id="changes" data-aos="fade-up" data-aos-delay="150">
            <div class="section-number">07</div>
            <h2>Changes to This Policy</h2>
            <p>We may update this Privacy Policy periodically. Any changes will be posted on this page with a revised “Last Updated” date.</p>
          </div>

          <!-- Contact Section -->
          <div class="policy-contact" id="contact" data-aos="fade-up" data-aos-delay="200">
            <div class="contact-card">
              <h2>Need Help?</h2>
              <p>If you have questions regarding this policy, feel free to contact us:</p>
              <div class="contact-info">
                <div class="info-item">
                  <i class="bi bi-envelope"></i>
                  <div>
                    <strong>Email Address</strong>
                    <span>nusratjahanitbd1@gmail.com</span>
                  </div>
                </div>
                <div class="info-item">
                  <i class="bi bi-geo-alt"></i>
                  <div>
                    <strong>Office Location</strong>
                    <span>Uttora-10, Dhaka, Bangladesh</span>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>

  </div>

</section><!-- /Privacy Section -->

<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

@endsection
<script>
document.addEventListener("DOMContentLoaded", function() {
  const sections = document.querySelectorAll(".policy-section");
  const navLinks = document.querySelectorAll(".policy-nav .nav-link");

  function activateLink() {
    let current = "";
    sections.forEach(section => {
      const sectionTop = section.offsetTop - 100; // adjust offset if needed
      if (scrollY >= sectionTop) {
        current = section.getAttribute("id");
      }
    });

    navLinks.forEach(link => {
      link.classList.remove("active");
      if (link.getAttribute("href") === "#" + current) {
        link.classList.add("active");
      }
    });
  }

  window.addEventListener("scroll", activateLink);

  // Optional: Smooth scroll on click
  navLinks.forEach(link => {
    link.addEventListener("click", function(e) {
      e.preventDefault();
      const target = document.querySelector(this.getAttribute("href"));
      window.scrollTo({
        top: target.offsetTop - 50, // adjust offset
        behavior: "smooth"
      });
    });
  });
});
</script>