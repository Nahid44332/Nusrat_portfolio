@extends('backend.master')

@section('content')

<style>
/* 🌑 Common dark highlighted style */
.highlighted {
    background-color: #2b3035;
    border: 1px solid #dc3545;
    color: #fff;
    transition: all 0.3s ease;
}

.highlighted:focus,
.note-editor.note-frame .note-editing-area .note-editable:focus {
    background-color: #1e2125 !important;
    border-color: #b71c1c !important;
    box-shadow: 0 0 5px rgba(220, 53, 69, 0.4);
    outline: none !important;
}

/* 🌈 Summernote dark theme adjustments */
.note-editor {
    background-color: #2b3035;
    border: 1px solid #dc3545;
    border-radius: 4px;
}

.note-editor .note-toolbar {
    background-color: #1e2125;
    border-bottom: 1px solid #b71c1c;
}

.note-editor .note-editing-area .note-editable {
    background-color: #2b3035;
    color: #fff;
    min-height: 150px;
    border: none;
}

.note-editor .note-statusbar {
    background-color: #1e2125;
    border-top: 1px solid #b71c1c;
}

/* select dropdown style */
.highlighted option {
    background-color: #2b3035;
    color: #fff;
}

.highlighted option:hover,
.highlighted option:checked {
    background-color: #b71c1c;
    color: #fff;
}

/* preview image style */
.preview-img {
    width: 120px;
    height: 100px;
    object-fit: cover;
    border-radius: 10px;
    border: 2px solid #6c757d;
}
</style>

<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="text-light mb-0"> Edit Project</h4>
            <a href="{{ url('/admin/protfolio') }}" class="btn btn-danger">⬅️ Back to Projects</a>
        </div>

        {{-- ✅ Success Message --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- ✅ Edit Project Form --}}
        <form action="{{ url('/protfolio/update/'.$protfolio->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold text-light">Project Name</label>
                    <input type="text" name="name" class="form-control highlighted" value="{{ $protfolio->name }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold text-light">Category</label>
                    <select name="category" class="form-control highlighted" required>
                        <option value="Web Design" {{ $protfolio->category == 'Web Design' ? 'selected' : '' }}>Web Design</option>
                        <option value="UI/UX" {{ $protfolio->category == 'UI/UX' ? 'selected' : '' }}>UI/UX</option>
                        <option value="Branding" {{ $protfolio->category == 'Branding' ? 'selected' : '' }}>Branding</option>
                        <option value="Development" {{ $protfolio->category == 'Development' ? 'selected' : '' }}>Development</option>
                    </select>
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label fw-bold text-light">Tools Used</label>
                    <input type="text" name="tools" class="form-control highlighted" value="{{ $protfolio->tools }}" placeholder="e.g. HTML, CSS, Laravel">
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label fw-bold text-light">Description</label>
                    <textarea name="description" id="summernote1" class="form-control highlighted summernote" rows="4" placeholder="Write short description...">{{ $protfolio->description }}</textarea>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold text-light">Client Name</label>
                    <input type="text" name="client" class="form-control highlighted" value="{{ $protfolio->client }}">
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold text-light">Date</label>
                    <input type="date" name="date" class="form-control highlighted" value="{{ $protfolio->date }}">
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold text-light">Duration</label>
                    <input type="text" name="duration" class="form-control highlighted" value="{{ $protfolio->duration }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold text-light">Live Link</label>
                    <input type="url" name="live_link" class="form-control highlighted" value="{{ $protfolio->live_link }}" placeholder="https://example.com">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold text-light">GitHub Link</label>
                    <input type="url" name="github_link" class="form-control highlighted" value="{{ $protfolio->github_link }}" placeholder="https://github.com/...">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold text-light">Current Image</label><br>
                    @if($protfolio->image)
                        <img src="{{ asset('uploads/protfolios/'.$protfolio->image) }}" alt="Project" class="preview-img mb-2">
                    @else
                        <p class="text-muted">No image uploaded</p>
                    @endif
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold text-light">Upload New Image</label>
                    <input type="file" name="image" class="form-control highlighted" accept="image/*">
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-danger px-4">💾 Update Project</button>
            </div>
        </form>
    </div>
</div>

@endsection

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
        height: 150,               // editor height
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['fontsize', 'color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview']]
        ]
    });
});
</script>

@endpush
