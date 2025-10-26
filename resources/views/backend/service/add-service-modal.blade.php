<!-- 🔹 Add Service Modal -->
<div class="modal fade" id="addServiceModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content bg-dark text-light border-0 shadow-lg rounded-3">
            <div class="modal-header border-0">
                <h5 class="modal-title">➕ Add New Service</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <form action="{{ url('/service/store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <!-- 📌 Basic -->
                    <h6 class="fw-bold text-danger mb-3">Basic Information</h6>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="fw-bold">Service Icon</label>
                            <input type="text" name="icon"
                                class="form-control bg-transparent text-light border-danger"
                                placeholder="fa-solid fa-code">
                        </div>
                        <div class="col-md-6">
                            <label class="fw-bold">Service Title</label>
                            <input type="text" name="title"
                                class="form-control bg-transparent text-light border-danger"
                                placeholder="Enter service title">
                        </div>
                    </div>

                    <label class="fw-bold mt-3">Description</label>
                    <textarea id="description" name="description"
                        class="form-control bg-transparent text-light border-danger"
                        rows="3" placeholder="Short description..."></textarea>

                    <label class="fw-bold mt-3">Service Image</label>
                    <input type="file" name="image"
                        class="form-control bg-transparent text-light border-danger">

                        <div class="col-md-12 mt-3">
                            <label class="fw-bold">Starting Price</label>
                            <input type="text" name="starting_price"
                                class="form-control bg-transparent text-light border-danger"
                                placeholder="$">
                        </div>
                    <!-- 🎁 What You Get -->
                    <hr class="border-danger mt-4 mb-3">
                    <h6 class="fw-bold text-danger mb-3">What You Get</h6>
                    <div class="row">
                        <div class="col-md-4">
                            <input type="text" name="get_icon"
                                class="form-control bg-transparent text-light border-danger"
                                placeholder="fa-solid fa-star">
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="get_title"
                                class="form-control bg-transparent text-light border-danger"
                                placeholder="Title">
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="get_description"
                                class="form-control bg-transparent text-light border-danger"
                                placeholder="Description">
                        </div>
                    </div>

                    <!-- ⚙️ Workflow -->
                    <hr class="border-danger mt-4 mb-3">
                    <h6 class="fw-bold text-danger mb-3">Development Workflow</h6>
                    <div class="row">
                        <div class="col-md-4">
                            <input type="text" name="workflow_title"
                                class="form-control bg-transparent text-light border-danger" placeholder="Planning">
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="workflow_description"
                                class="form-control bg-transparent text-light border-danger"
                                placeholder="Define project goal">
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="workflow_deadline"
                                class="form-control bg-transparent text-light border-danger" placeholder="2 Weeks">
                        </div>
                    </div>

             <!-- 🛠️ Tech -->
<hr class="border-danger mt-4 mb-3">
<h6 class="fw-bold text-danger mb-3">Technologies & Tools</h6>

<div class="mb-3" id="frontend-wrapper">
  <label class="fw-bold">Frontend</label>
  <div class="d-flex gap-2 mb-2">
    <input type="text" name="frontend[]" class="form-control bg-transparent text-light border-danger" placeholder="HTML, CSS, JS">
    <button type="button" class="btn btn-danger add-frontend">+Add</button>
  </div>
</div>

<div class="mb-3" id="backend-wrapper">
  <label class="fw-bold">Backend</label>
  <div class="d-flex gap-2 mb-2">
    <input type="text" name="backend[]" class="form-control bg-transparent text-light border-danger" placeholder="Laravel, Node.js">
    <button type="button" class="btn btn-danger add-backend">+Add</button>
  </div>
</div>

<div class="mb-3" id="database-wrapper">
  <label class="fw-bold">Database</label>
  <div class="d-flex gap-2 mb-2">
    <input type="text" name="database[]" class="form-control bg-transparent text-light border-danger" placeholder="MySQL, MongoDB">
    <button type="button" class="btn btn-danger add-database">+Add</button>
  </div>
</div>

                <div class="modal-footer border-0">
                    <button type="submit" class="btn btn-danger px-4">💾 Save Service</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Summernote CSS & JS -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>

<!-- Summernote Initialization -->
<script>
$(document).ready(function () {
    // Summernote initialization
    $('#description').summernote({
        placeholder: 'Short description...',
        tabsize: 2,
        height: 150,
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });

    // Add More Buttons
    $('.add-frontend').click(function () {
        $('#frontend-wrapper').append(`
          <div class="d-flex gap-2 mb-2">
            <input type="text" name="frontend[]" class="form-control bg-transparent text-light border-danger" placeholder="HTML, CSS, JS">
            <button type="button" class="btn btn-outline-danger remove-field">−</button>
          </div>
        `);
    });

    $('.add-backend').click(function () {
        $('#backend-wrapper').append(`
          <div class="d-flex gap-2 mb-2">
            <input type="text" name="backend[]" class="form-control bg-transparent text-light border-danger" placeholder="Laravel, Node.js">
            <button type="button" class="btn btn-outline-danger remove-field">−</button>
          </div>
        `);
    });

    $('.add-database').click(function () {
        $('#database-wrapper').append(`
          <div class="d-flex gap-2 mb-2">
            <input type="text" name="database[]" class="form-control bg-transparent text-light border-danger" placeholder="MySQL, MongoDB">
            <button type="button" class="btn btn-outline-danger remove-field">−</button>
          </div>
        `);
    });

    // Remove field
    $(document).on('click', '.remove-field', function () {
        $(this).parent().remove();
    });
});
</script>


<!-- Full Black Background + Red Border + Black Icons -->
<style>
.note-editor.note-frame {
    background-color: #000 !important; /* full black */
    border: 2px solid #dc3545 !important; /* red border */
    color: #f8f9fa !important;
}

.note-editor.note-frame .note-editing-area .note-editable {
    background-color: #000 !important; /* full black */
    color: #f8f9fa !important;
}

.note-editor.note-frame .note-toolbar {
    background-color: #000 !important; /* black toolbar */
    border-bottom: 1px solid #dc3545 !important; /* red bottom border */
}

.note-editor.note-frame .note-toolbar .note-btn {
    color: #000 !important; /* black icons */
}

.note-editor.note-frame .note-toolbar .dropdown-menu {
    background-color: #fff !important;
    color: #000 !important;
}

.note-editor.note-frame .note-codeview {
    background-color: #000 !important;
    color: #f8f9fa !important;
}

.note-editor.note-frame .note-editing-area .note-editable:focus {
    outline: 2px solid #dc3545 !important; /* red focus */
}

.add-frontend, .add-backend, .add-database, .remove-field {
  font-weight: bold;
  padding: 6px 12px;
  border-radius: 8px;
}

.remove-field {
  border: 1px solid #dc3545;
  color: #dc3545;
  background-color: transparent;
}
.remove-field:hover {
  background-color: #dc3545;
  color: #fff;
}
</style>
