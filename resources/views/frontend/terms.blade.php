@extends('frontend.master')

@section('content')

<!-- Terms Of Service Section -->
<section id="terms-of-service" class="terms-of-service section mt-5">

  <div class="container" data-aos="fade-up">
    <!-- Page Header -->
    <div class="tos-header text-center" data-aos="fade-up">
      <span class="last-updated">Last Updated: October 23, 2025</span>
      <h2>Terms of Service</h2>
      <p>Please read these terms carefully before using Aman IT Agency services.</p>
    </div>

    <!-- Content -->
    <div class="tos-content" data-aos="fade-up" data-aos-delay="200">

      <!-- Agreement Section -->
      <div id="agreement" class="content-section">
        <h3>1. Agreement to Terms</h3>
        <p>By accessing or using our services, you agree to comply with these Terms of Service and all applicable laws. If you disagree with any term, please refrain from using our services.</p>
        <div class="info-box border-start border-4 border-danger p-3 my-3">
          <i class="bi bi-info-circle"></i>
          <p>These terms apply to all users, visitors, and clients engaging with our platform.</p>
        </div>
      </div>

      <!-- Intellectual Property -->
      <div id="intellectual-property" class="content-section">
        <h3>2. Intellectual Property Rights</h3>
        <p>All content, design, graphics, and functionality of our services are owned by Aman IT Agency and protected under international intellectual property laws.</p>
        <ul class="list-items">
          <li>All content is the exclusive property of Aman IT Agency</li>
          <li>Reproduction or modification without permission is prohibited</li>
          <li>Trademarks and logos are protected by law</li>
          <li>Content is for personal and informational purposes only</li>
        </ul>
      </div>

      <!-- User Accounts -->
      <div id="user-accounts" class="content-section">
        <h3>3. User Accounts</h3>
        <p>When registering an account, users must provide accurate and complete information. Misrepresentation may lead to account suspension or termination.</p>
        <div class="alert-box border-start border-4 border-danger p-3 my-3 d-flex align-items-start gap-3">
          <i class="bi bi-exclamation-triangle fs-2"></i>
          <div>
            <h5>Important Notice</h5>
            <p>Users are responsible for keeping their account credentials secure and are liable for all activity under their account.</p>
          </div>
        </div>
      </div>

      <!-- Prohibited Activities -->
      <div id="prohibited" class="content-section">
        <h3>4. Prohibited Activities</h3>
        <p>The following actions are strictly prohibited while using our services:</p>
        <div class="prohibited-list">
          <div class="prohibited-item"><i class="bi bi-x-circle text-danger"></i> Systematic data scraping</div>
          <div class="prohibited-item"><i class="bi bi-x-circle text-danger"></i> Uploading harmful or malicious content</div>
          <div class="prohibited-item"><i class="bi bi-x-circle text-danger"></i> Unauthorized framing of our content</div>
          <div class="prohibited-item"><i class="bi bi-x-circle text-danger"></i> Attempting unauthorized access to our systems</div>
        </div>
      </div>

      <!-- Disclaimers -->
      <div id="disclaimer" class="content-section">
        <h3>5. Disclaimers</h3>
        <p>Our services are provided “AS IS” and “AS AVAILABLE” without warranties. Aman IT Agency does not guarantee:</p>
        <div class="disclaimer-box border-start border-4 border-danger p-3 my-3">
          <ul>
            <li>The services will meet your expectations</li>
            <li>The services will be uninterrupted or error-free</li>
            <li>Accuracy of results obtained through our services</li>
            <li>Immediate correction of all errors</li>
          </ul>
        </div>
      </div>

      <!-- Limitation of Liability -->
      <div id="limitation" class="content-section">
        <h3>6. Limitation of Liability</h3>
        <p>Aman IT Agency is not liable for any indirect, incidental, special, consequential, or punitive damages arising from the use of our services.</p>
      </div>

      <!-- Indemnification -->
      <div id="indemnification" class="content-section">
        <h3>7. Indemnification</h3>
        <p>Users agree to defend, indemnify, and hold Aman IT Agency harmless from any claims, damages, or liabilities arising from their use of our services.</p>
      </div>

      <!-- Termination -->
      <div id="termination" class="content-section">
        <h3>8. Termination</h3>
        <p>We may suspend or terminate accounts at our discretion, especially in case of violation of these Terms, without prior notice.</p>
      </div>

      <!-- Governing Law -->
      <div id="governing-law" class="content-section">
        <h3>9. Governing Law</h3>
        <p>These Terms are governed by the laws of Bangladesh. Any disputes will be subject to the jurisdiction of Bangladeshi courts.</p>
      </div>

      <!-- Changes -->
      <div id="changes" class="content-section">
        <h3>10. Changes to Terms</h3>
        <p>We may revise these Terms at any time. Updated Terms will be posted on this page with a new “Last Updated” date.</p>
        <div class="notice-box border-start border-4 border-danger p-3 my-3 d-flex align-items-start gap-3">
          <i class="bi bi-bell fs-2"></i>
          <p>By continuing to use our services after changes, you agree to be bound by the updated Terms.</p>
        </div>
      </div>

    </div>

    <!-- Contact Section -->
    <div class="tos-contact" data-aos="fade-up" data-aos-delay="300">
      <div class="contact-box border-start border-4 border-danger p-3 d-flex align-items-start gap-3">
        <i class="bi bi-envelope fs-2"></i>
        <div>
          <h4>Questions About Terms?</h4>
          <p>If you have any questions regarding these Terms, reach out to our support team.</p>
          <a href="https://wa.me/8801890331107" target="_blank" class="contact-link btn btn-danger mt-2">Contact Support</a>
        </div>
      </div>
    </div>

  </div>

</section><!-- /Terms Of Service Section -->

<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

@endsection
