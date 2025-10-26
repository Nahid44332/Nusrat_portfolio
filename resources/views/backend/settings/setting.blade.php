@extends('backend.master')
<style>
    /* 🔴 Footer Text Summernote red border style */
.note-editor.note-frame {
    border: 2px solid #dc3545 !important; /* লাল বর্ডার */
    border-radius: 8px;
    background-color: #000 !important; /* ব্যাকগ্রাউন্ড কালো */
}

.note-toolbar {
    background-color: #111 !important; /* টুলবার কালো */
    border-bottom: 1px solid #dc3545 !important; /* টুলবার নিচে লাল বর্ডার */
}

.note-editable {
    background-color: #000 !important; /* লেখার জায়গা কালো */
    color: #fff !important; /* টেক্সট সাদা */
}

.note-editor.note-frame .note-statusbar {
    background-color: #111 !important;
    border-top: 1px solid #dc3545 !important;
}
</style>

@section('content')
<div class="container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="text-danger fw-bold"> Site Settings</h3>
    </div>

    <div class="card card-dark p-4" style="background-color:#000; border:2px solid #dc3545; border-radius:12px;">
        <form action="{{ url('admin/update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <!-- Website Title -->
                <div class="col-md-12 mb-3">
                    <label class="text-light">Website Title</label>
                    <input type="text" name="title" value="{{ $setting->title ?? '' }}" class="form-control bg-dark text-light border-danger">
                </div>

                <!-- Favicon -->
                <div class="col-md-12 mb-3">
                    <label class="text-light">Favicon</label>
                    <input type="file" name="favicon" class="form-control bg-dark text-light border-danger">
                    @if(!empty($setting->favicon))
                        <img src="{{ asset($setting->favicon) }}" width="40" class="mt-2 rounded">
                    @endif
                </div>

                <!-- Logo -->
                <div class="col-md-12 mb-3">
                    <label class="text-light">Logo</label>
                    <input type="file" name="logo" class="form-control bg-dark text-light border-danger">
                    @if(!empty($setting->logo))
                        <img src="{{ asset($setting->logo) }}" width="80" class="mt-2 rounded">
                    @endif
                </div>

                <!-- Footer Text -->
                <div class="col-md-12 mb-3">
                    <label class="text-light">Footer Text</label>
                    <textarea name="footer_text" id="summernote1" rows="3" class="form-control bg-dark text-light border-danger">{{ $setting->footer_text ?? '' }}</textarea>
                </div>

                <!-- Social Links -->
                <h5 class="text-danger mt-4"> Social Links</h5>
                <div class="col-md-3 mb-3">
                    <input type="text" name="facebook" value="{{ $setting->facebook ?? '' }}" class="form-control bg-dark text-light border-danger" placeholder="Facebook URL">
                </div>
                <div class="col-md-3 mb-3">
                    <input type="text" name="twitter" value="{{ $setting->twitter ?? '' }}" class="form-control bg-dark text-light border-danger" placeholder="Twitter URL">
                </div>
                <div class="col-md-3 mb-3">
                    <input type="text" name="instagram" value="{{ $setting->instagram ?? '' }}" class="form-control bg-dark text-light border-danger" placeholder="Instagram URL">
                </div>
                <div class="col-md-3 mb-3">
                    <input type="text" name="linkedin" value="{{ $setting->linkedin ?? '' }}" class="form-control bg-dark text-light border-danger" placeholder="LinkedIn URL">
                </div>

                <!-- Contact Information -->
                <h5 class="text-danger mt-4"> Contact Information</h5>
                <div class="col-md-4 mb-3">
                    <input type="email" name="email" value="{{ $setting->email ?? '' }}" class="form-control bg-dark text-light border-danger" placeholder="Email Address">
                </div>
                <div class="col-md-4 mb-3">
                    <input type="text" name="phone" value="{{ $setting->phone ?? '' }}" class="form-control bg-dark text-light border-danger" placeholder="Phone Number">
                </div>
                <div class="col-md-4 mb-3">
                    <input type="text" name="address" value="{{ $setting->address ?? '' }}" class="form-control bg-dark text-light border-danger" placeholder="Address">
                </div>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-danger mt-3">💾 Save Changes</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('style')
<!-- Footer Text red border for Summernote -->
<style>
    .note-editor.note-frame {
        border: 2px solid #dc3545 !important;
        border-radius: 8px;
    }
</style>
@endpush

@push('script')
<!-- include libraries(jQuery, bootstrap) -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>

<script>
    $(document).ready(function() {
        $('#summernote1').summernote({
            height: 180,
            placeholder: 'Write your footer text here...',
        });
    });
</script>
@endpush
