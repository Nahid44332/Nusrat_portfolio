@extends('frontend.master')

@section('title', 'Contact Me')

<!-- 🔹 AOS CSS -->
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

<style>
/* 🔹 Page Background */
.contact-page {
    background: #000;
    color: #fff;
    min-height: 100vh;
    padding: 100px 0;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* 🔹 Contact Container */
.contact-container {
    background-color: #111;
    border: 2px solid #dc3545;
    border-radius: 12px;
    padding: 50px;
    max-width: 900px;
    width: 100%;
    box-shadow: 0 0 20px rgba(220, 53, 69, 0.5);
}

/* 🔹 Title */
.contact-container h2 {
    text-align: center;
    color: #ff4d6d;
    font-weight: 700;
    margin-bottom: 10px;
}

.contact-container p {
    text-align: center;
    color: #ccc;
    margin-bottom: 40px;
}

/* 🔹 Info Box */
.contact-info {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
    gap: 20px;
    margin-bottom: 40px;
}

.info-box {
    text-align: center;
    background: #000;
    border: 1px solid #dc3545;
    border-radius: 8px;
    padding: 20px;
    flex: 1 1 250px;
    transition: all 0.3s ease;
}

.info-box:hover {
    background: #dc3545;
    transform: translateY(-5px);
}

.info-box i {
    font-size: 30px;
    color: #ff4d6d;
    margin-bottom: 10px;
}

.info-box:hover i {
    color: #fff;
}

/* 🔹 Form Styling */
.contact-form .form-control {
    background: #000 !important;
    color: #fff !important;
    border: 2px solid #dc3545;
    border-radius: 8px;
    padding: 12px 15px;
    transition: 0.3s;
}

.contact-form .form-control:focus {
    background: #000;
    border-color: #ff4d6d;
    box-shadow: 0 0 8px #ff4d6d;
    color: #fff;
}

.contact-form .form-control::placeholder {
    color: #aaa;
}

/* 🔹 Submit Button */
.contact-form button {
    background-color: #dc3545;
    color: #fff;
    border: none;
    padding: 12px 30px;
    border-radius: 8px;
    font-weight: 600;
    margin-top: 10px;
    transition: all 0.3s ease;
}

.contact-form button:hover {
    background-color: #ff4d6d;
    box-shadow: 0 0 10px #ff4d6d;
}
</style>

@section('content')
<section class="contact-page">
    <div class="contact-container" data-aos="fade-up" data-aos-delay="100">

        <h2>Get In Touch</h2>
        <p>Feel free to contact me for any project, collaboration, or just to say hello 👋</p>

        <!-- 🔹 Contact Info -->
        <div class="contact-info">
            <div class="info-box" data-aos="fade-up" data-aos-delay="150">
                <i class="bi bi-geo-alt"></i>
                <h4>Address</h4>
                <p>{{ $about->location }}</p>
            </div>
            <div class="info-box" data-aos="fade-up" data-aos-delay="200">
                <i class="bi bi-telephone"></i>
                <h4>Phone</h4>
                <p>{{ $about->phone }}</p>
            </div>
            <div class="info-box" data-aos="fade-up" data-aos-delay="250">
                <i class="bi bi-envelope"></i>
                <h4>Email</h4>
                <p>{{ $about->email }}</p>
            </div>
        </div>

        <!-- 🔹 Contact Form -->
        <form action="{{ url('/contact/store') }}" method="POST" class="contact-form" data-aos="fade-up" data-aos-delay="300">
            @csrf
            @if(session('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif

            <div class="row gy-3">
                <div class="col-md-6">
                    <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                </div>
                <div class="col-md-6">
                    <input type="email" name="email" class="form-control" placeholder="Your Email" required>
                </div>
                <div class="col-md-6">
                    <input type="text" name="phone" class="form-control" placeholder="Your Phone" required>
                </div>
                <div class="col-md-6">
                    <input type="text" name="subject" class="form-control" placeholder="Subject" required>
                </div>
                <div class="col-md-12">
                    <textarea name="message" rows="6" class="form-control" placeholder="Message" required></textarea>
                </div>
                <div class="col-md-12 text-center">
                    <button type="submit">Send Message</button>
                </div>
            </div>
        </form>

    </div>
</section>

<!-- 🔹 AOS JS -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init({
        once: true, // একবার animation হবে
        duration: 1000,
    });
</script>
@endsection
