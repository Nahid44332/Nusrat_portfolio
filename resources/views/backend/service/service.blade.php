@extends('backend.master')

@section('content')
<div class="container-fluid py-4">

    <!-- 🔹 Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="text-danger fw-bold">Manage Services</h3>
        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#addServiceModal">➕ Add New Service</button>
    </div>

    <!-- 🔹 Service Cards -->
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-3">
        @foreach($services as $service)
        <div class="col">
            <div class="card service-card h-100 shadow-sm">

                <!-- Image clickable for view -->
                @if($service->image)
                <div style="position: relative; height: 200px; width: 100%; border-top-left-radius: 20px; border-top-right-radius: 20px; overflow: hidden; display: flex; align-items: center; justify-content: center; background-color: #000; cursor:pointer;" data-bs-toggle="modal" data-bs-target="#viewServiceModal{{ $service->id }}">
                    <img src="{{ asset('backend/images/service/' . $service->image) }}"
                         alt="{{ $service->title }}"
                         style="max-height: 300px; max-width: 700px; border-bottom: 2px solid #dc3545; transition: transform 0.3s ease; border-radius: 0;">
                </div>
                @endif

                <div class="card-body d-flex flex-column">
                    <h5 class="card-title text-danger">{{ $service->title }}</h5>
                    <p class="card-text small text-light">
                        {!! Str::limit(strip_tags($service->description), 50) !!}
                    </p>
                    <div class="mt-auto d-flex justify-content-end">
                        <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editServiceModal{{ $service->id }}">✏️ Edit</button>
                        <a href="{{ url('/service/delete/' . $service->id) }}" class="btn btn-sm btn-danger ms-2" onclick="return confirm('Are you sure?')">🗑️ Delete</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- 🔹 View Modal -->
<div class="modal fade" id="viewServiceModal{{ $service->id }}" tabindex="-1">
    <div class="modal-dialog modal-md"> <!-- smaller modal -->
        <div class="modal-content bg-dark text-light border-0 shadow-lg rounded-3">
            <div class="modal-header border-0">
                <h5 class="modal-title text-danger">👁 Service Details</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                @if($service->image)
                <img src="{{ asset('backend/images/service/' . $service->image) }}" class="img-fluid mb-3" style="max-height:120px; border:2px solid #dc3545;">
                @endif

                <h5 class="text-warning">Icon</h5>
                <p>
                    <i class="{{ $service->icon }} fa-2x text-danger"></i>
                </p>

                <h5 class="text-warning">Title:</h5>
                <p>{{ $service->title }}</p>

                <h5 class="text-warning">Description:</h5>
                <p>{!! $service->description !!}</p>

                <h5 class="text-warning">Starting Price</h5>
                <p>{!! $service->starting_price !!}</p>

                <h5 class="text-warning">What You Get:</h5>
                <p><strong>{{ $service->get_title ?? '-' }}</strong> - {{ $service->get_description ?? '-' }}</p>

                <h5 class="text-warning">Workflow:</h5>
                <p><strong>{{ $service->workflow_title ?? '-' }}</strong> - {{ $service->workflow_description ?? '-' }} ({{ $service->workflow_deadline ?? '-' }})</p>

               <h5 class="text-warning">Technologies:</h5>
<p>
    Frontend: {{ is_array($service->frontend) ? implode(', ', $service->frontend) : ($service->frontend ?? '-') }},
    Backend: {{ is_array($service->backend) ? implode(', ', $service->backend) : ($service->backend ?? '-') }},
    Database: {{ is_array($service->database) ? implode(', ', $service->database) : ($service->database ?? '-') }}
</p>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


        <!-- 🔹 Edit Modal -->
        <div class="modal fade" id="editServiceModal{{ $service->id }}" tabindex="-1">
            <div class="modal-dialog modal-xl">
                <div class="modal-content bg-dark text-light border-0 shadow-lg rounded-3">
                    <div class="modal-header border-0">
                        <h5 class="modal-title text-warning">✏️ Edit Service</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <form action="{{ url('/service/update/' . $service->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">

                            <!-- Basic Info -->
                            <h6 class="fw-bold text-danger mb-3">Basic Information</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="fw-bold">Service Icon</label>
                                    <input type="text" name="icon" value="{{ $service->icon }}" class="form-control bg-transparent text-light border-danger">
                                </div>
                                <div class="col-md-6">
                                    <label class="fw-bold">Service Title</label>
                                    <input type="text" name="title" value="{{ $service->title }}" class="form-control bg-transparent text-light border-danger">
                                </div>
                            </div>

                            <label class="fw-bold mt-3">Description</label>
                            <textarea id="summernote{{ $service->id }}" name="description" class="form-control bg-transparent text-light border-danger">{!! $service->description !!}</textarea>

                            <label class="fw-bold mt-3">Service Image</label>
                            <input type="file" name="image" class="form-control bg-transparent text-light border-danger">
                            @if($service->image)
                            <img src="{{ asset('backend/images/service/' . $service->image) }}" class="img-fluid mt-2" style="max-height:150px; border:2px solid #dc3545;">
                            @endif

                            <div class="col-md-12 mt-3">
                                    <label class="fw-bold">Starting Price</label>
                                    <input type="text" name="starting_price" value="{{ $service->starting_price }}" class="form-control bg-transparent text-light border-danger">
                                </div>

                            <!-- What You Get -->
                            <hr class="border-danger mt-4 mb-3">
                            <h6 class="fw-bold text-danger mb-3">What You Get</h6>
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="text" name="get_icon" value="{{ $service->get_icon ?? '' }}" class="form-control bg-transparent text-light border-danger">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="get_title" value="{{ $service->get_title ?? '' }}" class="form-control bg-transparent text-light border-danger">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="get_description" value="{{ $service->get_description ?? '' }}" class="form-control bg-transparent text-light border-danger">
                                </div>
                            </div>

                            <!-- Workflow -->
                            <hr class="border-danger mt-4 mb-3">
                            <h6 class="fw-bold text-danger mb-3">Development Workflow</h6>
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="text" name="workflow_title" value="{{ $service->workflow_title ?? '' }}" class="form-control bg-transparent text-light border-danger">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="workflow_description" value="{{ $service->workflow_description ?? '' }}" class="form-control bg-transparent text-light border-danger">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="workflow_deadline" value="{{ $service->workflow_deadline ?? '' }}" class="form-control bg-transparent text-light border-danger">
                                </div>
                            </div>

                           <!-- 🛠️ Technologies & Tools -->
@php
    $frontendArray = is_array($service->frontend) ? $service->frontend : [$service->frontend];
    $backendArray = is_array($service->backend) ? $service->backend : [$service->backend];
    $databaseArray = is_array($service->database) ? $service->database : [$service->database];
@endphp

<div id="techFields{{ $service->id }}" class="mt-3">
    @foreach($frontendArray as $index => $frontend)
    <div class="row align-items-center mb-2">
        <div class="col-md-3">
            <input type="text" name="frontend[]" value="{{ $frontend }}" class="form-control bg-transparent text-light border-danger" placeholder="Frontend">
        </div>
        <div class="col-md-3">
            <input type="text" name="backend[]" value="{{ $backendArray[$index] ?? '' }}" class="form-control bg-transparent text-light border-danger" placeholder="Backend">
        </div>
        <div class="col-md-3">
            <input type="text" name="database[]" value="{{ $databaseArray[$index] ?? '' }}" class="form-control bg-transparent text-light border-danger" placeholder="Database">
        </div>
        <div class="col-md-3 text-end">
            <button type="button" class="btn btn-outline-danger btn-sm addTechBtn" data-service="{{ $service->id }}">
                ➕ Add More
            </button>
        </div>
    </div>
    @endforeach
</div>


                        </div>
                        <div class="modal-footer border-0">
                            <button type="submit" class="btn btn-warning">💾 Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
        document.addEventListener('DOMContentLoaded', function () {
    // একবারই কাজ করবে, একাধিকবার attach হবে না
    $(document).off('click', '.addTechBtn').on('click', '.addTechBtn', function () {
        const serviceId = $(this).data('service');
        const container = $('#techFields' + serviceId);

        // নতুন ১টা row তৈরি হবে
        const newRow = $(`
            <div class="row align-items-center mb-2">
                <div class="col-md-3">
                    <input type="text" name="frontend[]" class="form-control bg-transparent text-light border-danger"
                        placeholder="Frontend">
                </div>
                <div class="col-md-3">
                    <input type="text" name="backend[]" class="form-control bg-transparent text-light border-danger"
                        placeholder="Backend">
                </div>
                <div class="col-md-3">
                    <input type="text" name="database[]" class="form-control bg-transparent text-light border-danger"
                        placeholder="Database">
                </div>
                <div class="col-md-3 text-end">
                    <button type="button" class="btn btn-outline-light btn-sm removeTechBtn">✖ Remove</button>
                </div>
            </div>
        `);

        container.append(newRow);
    });

    // Remove button কাজ করবে
    $(document).off('click', '.removeTechBtn').on('click', '.removeTechBtn', function () {
        $(this).closest('.row').remove();
    });
});
        $(document).ready(function() {
            $('#summernote{{ $service->id }}').summernote({
                placeholder: 'Short description...',
                tabsize: 2,
                height: 150,
                toolbar: [
                  ['style', ['bold', 'italic', 'underline', 'clear']],
                  ['font', ['strikethrough','superscript','subscript','fontsize','color']],
                  ['para', ['ul','ol','paragraph']],
                  ['insert', ['link','picture','video']],
                  ['view', ['fullscreen','codeview','help']]
                ]
            });
        });
        </script>

        @endforeach
    </div>
</div>

<!-- 🔹 Add Service Modal -->
@include('backend.service.add-service-modal')

@endsection

@push('script')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>
@endpush

<style>
/* ================= Card Styles ================= */
.service-card {
    transition: all 0.3s ease-in-out;
    border-radius: 20px !important;
    height: 180px;
    background-color: #000 !important;
    overflow: hidden;
    position: relative;
    cursor: pointer;
    border: 2px solid #dc3545 !important;
    color: #fff;
}
.service-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(220,53,69,0.5);
}
.service-card-body-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    background: rgba(0,0,0,0.95);
    color: #fff;
    padding: 10px;
    transform: translateY(100%);
    transition: all 0.3s ease-in-out;
    font-size: 0.85rem;
}
.service-card:hover .service-card-body-overlay {
    transform: translateY(0);
}

/* ================= Summernote Dark Theme ================= */
.note-editor.note-frame {
    background-color: #000 !important;
    border: 2px solid #dc3545 !important;
    color: #fff !important;
}
.note-editor.note-frame .note-editing-area .note-editable {
    background-color: #000 !important;
    color: #fff !important;
}
.note-editor.note-frame .note-toolbar {
    background-color: #000 !important;
    border-bottom: 1px solid #dc3545 !important;
}
.note-editor.note-frame .note-btn {
    color: #000 !important;
}
.note-editor.note-frame .note-codeview {
    background-color: #000 !important;
    color: #fff !important;
}
.note-editor.note-frame .note-editing-area .note-editable:focus {
    outline: 2px solid #dc3545 !important;
}
#techFields{{ $service->id }} input::placeholder {
    color: #aaa !important;
}
#techFields{{ $service->id }} input:focus {
    border-color: #ff4d6d !important;
    box-shadow: 0 0 6px #ff4d6d !important;
}
</style>
