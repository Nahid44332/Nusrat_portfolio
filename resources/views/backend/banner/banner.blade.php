@extends('backend.master')

@section('content')
<div class="container-fluid py-4">

    <!-- 🔹 Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="text-danger fw-bold"> Manage Banner</h3>
    </div>

    <!-- 🔹 Success Message -->
    @if(session('success'))
        <div class="alert alert-success border-0 fw-bold shadow-sm">{{ session('success') }}</div>
    @endif

    <!-- 🔹 Form -->
    <form action="{{ url('admin/banner/update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card p-4 shadow-lg rounded-4 border border-danger bg-dark text-light">

            <!-- Title -->
            <div class="mb-3">
                <label class="form-label fw-bold text-danger">Title</label>
                <input type="text" name="title" class="form-control bg-dark text-light border-danger"
                    value="{{ $banner->title ?? '' }}">
            </div>

            <!-- Subtitle -->
            <div class="mb-3">
                <label class="form-label fw-bold text-danger">Subtitle</label>
                <input type="text" name="subtitle" class="form-control bg-dark text-light border-danger"
                    value="{{ $banner->subtitle ?? '' }}">
            </div>

            <!-- Button Text -->
            <div class="mb-3">
                <label class="form-label fw-bold text-danger">Button Text</label>
                <input type="text" name="button_text" class="form-control bg-dark text-light border-danger"
                    value="{{ $banner->button_text ?? '' }}">
            </div>

            <!-- Button Link -->
            <div class="mb-3">
                <label class="form-label fw-bold text-danger">Button Link</label>
                <input type="text" name="button_link" class="form-control bg-dark text-light border-danger"
                    value="{{ $banner->button_link ?? '' }}">
            </div>

            <!-- Social Media Links -->
            <hr class="border-danger">
            <h5 class="text-danger fw-bold mb-3">Social Media Links</h5>
            <div class="mb-3">
                <label class="form-label text-warning">Facebook</label>
                <input type="url" name="facebook" class="form-control bg-dark text-light border-danger"
                       value="{{ $banner->facebook ?? '' }}" placeholder="https://facebook.com/username">
            </div>
            <div class="mb-3">
                <label class="form-label text-warning">Instagram</label>
                <input type="url" name="instagram" class="form-control bg-dark text-light border-danger"
                       value="{{ $banner->instagram ?? '' }}" placeholder="https://instagram.com/username">
            </div>
            <div class="mb-3">
                <label class="form-label text-warning">Twitter</label>
                <input type="url" name="twitter" class="form-control bg-dark text-light border-danger"
                       value="{{ $banner->twitter ?? '' }}" placeholder="https://twitter.com/username">
            </div>
            <div class="mb-3">
                <label class="form-label text-warning">LinkedIn</label>
                <input type="url" name="linkedin" class="form-control bg-dark text-light border-danger"
                       value="{{ $banner->linkedin ?? '' }}" placeholder="https://linkedin.com/in/username">
            </div>

            <!-- Banner Image -->
            <hr class="border-danger">
            <div class="mb-3">
                <label class="form-label fw-bold text-danger">Banner Image</label><br>
                @if(!empty($banner->image))
                    <img src="{{ asset('backend/images/banner/' . $banner->image) }}" alt="Banner"
                         class="rounded-3 border border-danger mb-3" style="max-width: 250px;">
                @endif
                <input type="file" name="image" class="form-control bg-dark text-light border-danger">
            </div>

            <!-- Submit -->
            <div class="text-end">
                <button class="btn btn-danger fw-bold px-4">💾 Update Banner</button>
            </div>
        </div>
    </form>
</div>
@endsection
