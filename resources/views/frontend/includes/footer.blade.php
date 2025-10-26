<footer id="footer" class="footer">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">{{ $setting->title}}</span>
          </a>
          <p>{!! $setting->footer_text !!}</p>
          <div class="social-links d-flex mt-4">
            <a href="{{ $setting->twitter }}" target="_blank"><i class="bi bi-twitter-x"></i></a>
                        <a href="{{ $setting->facebook }}" target="_blank"><i class="bi bi-facebook"></i></a>
                        <a href="{{ $setting->instagram }}" target="_blank"><i class="bi bi-instagram"></i></a>
                        <a href="{{ $setting->linkedin }}" target="_blank"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About us</a></li>
            <li><a href="{{url('/service-details')}}">Services</a></li>
            <li><a href="{{url('/terms')}}">Terms of service</a></li>
            <li><a href="{{url('/privacy')}}">Privacy policy</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><a href="#">Web Design</a></li>
            <li><a href="#">Web Development</a></li>
            <li><a href="#">Product Management</a></li>
            <li><a href="#">Marketing</a></li>
            <li><a href="#">Graphic Design</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
          <h4>Contact Us</h4>
          <p>{{ $setting->address }}</p>
          <p class="mt-4"><strong>Phone:</strong> <span>{{ $setting->phone }}</span></p>
          <p><strong>Email:</strong> <span>{{ $setting->email }}</span></p>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">Nusrat Jahan</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Developed by <a href="#">Nusrat Jahan</a>
      </div>
    </div>

  </footer>