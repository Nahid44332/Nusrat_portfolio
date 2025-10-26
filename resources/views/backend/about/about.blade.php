@extends('backend.master')

<style>
    .top{
        margin-bottom:15px ;!important
    }
    .note-editor.note-frame {
    background-color: #000 !important;   /* black background */
    border: 2px solid #dc3545 !important; /* red border */
    box-shadow: 0 0 6px #ffcdd2 !important;
    border-radius: 6px !important;
}

.note-editable {
    background-color: #000 !important; /* editable area black */
    color: #fff !important;            /* text white */
}
    /* Highlighted input for About & Skills */
    #about-section .highlighted,
    #skillContainer .highlighted {
        background-color: #000 !important;
        color: #fff !important;
        border: 2px solid #dc3545 !important;
        box-shadow: 0 0 6px #ffcdd2 !important;
        border-radius: 6px !important;
        transition: all 0.3s ease;
        padding: 10px !important;
    }

    /* Focus Highlight */
    #about-section .highlighted:focus,
    #skillContainer .highlighted:focus {
        border-color: #b71c1c !important;
        box-shadow: 0 0 12px #ffebee !important;
        outline: none;
    }

    /* Highlighted input */
    #about-section .highlighted {
        background-color: #000;
        color: #fff;
        border: 2px solid #dc3545;
        box-shadow: 0 0 6px #ffcdd2;
        border-radius: 6px;
        transition: all 0.3s ease;
        padding: 10px;
    }

    /* Focus Highlight */
    #about-section .highlighted:focus {
        border-color: #b71c1c;
        box-shadow: 0 0 12px #ffebee;
        outline: none;
    }

    /* Footer Fix inside Blade */
    html,
    body {
        height: 100%;
        margin: 0;
    }

    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    #about-section {
        flex: 1;
    }

    footer {
        background-color: #222;
        color: #fff;
        padding: 20px 0;
        text-align: center;
    }
</style>
@section('content')
    <div class="container mt-4" id="about-section">
        <h3 class="mb-3">About Section Management</h3>
        <hr>

        <form action="{{ url('/about/update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row g-3">

                <!-- Full Name -->
                <div class="col-md-6">
                    <label class="fw-bold">Full Name</label>
                    <input type="text" name="name" class="form-control highlighted" value="{{ $about->name ?? '' }}"
                        placeholder="Enter full name">
                </div>

                <!-- Role / Designation -->
                <div class="col-md-6">
                    <label class="fw-bold">Role / Designation</label>
                    <input type="text" name="role" class="form-control highlighted" value="{{ $about->role ?? '' }}"
                        placeholder="e.g., Full Stack Developer">
                </div>

                <!-- Experience -->
                <div class="col-md-6">
                    <label class="fw-bold">Experience (Years)</label>
                    <input type="text" name="experience" class="form-control highlighted"
                        value="{{ $about->experience ?? '' }}" placeholder="e.g., 8+ Years">
                </div>

                <!-- Degree -->
                <div class="col-md-6">
                    <label class="fw-bold">Degree</label>
                    <input type="text" name="degree" class="form-control highlighted" value="{{ $about->degree ?? '' }}"
                        placeholder="e.g., Master of Science">
                </div>

                <!-- Based In -->
                <div class="col-md-6">
                    <label class="fw-bold">Based In</label>
                    <input type="text" name="location" class="form-control highlighted"
                        value="{{ $about->location ?? '' }}" placeholder="e.g., Portland, OR">
                </div>

                <!-- Email -->
                <div class="col-md-6">
                    <label class="fw-bold">Email</label>
                    <input type="email" name="email" class="form-control highlighted" value="{{ $about->email ?? '' }}"
                        placeholder="Enter email">
                </div>

                <!-- Phone -->
                <div class="col-md-6">
                    <label class="fw-bold">Phone</label>
                    <input type="text" name="phone" class="form-control highlighted" value="{{ $about->phone ?? '' }}"
                        placeholder="Enter phone number">
                </div>

                <!-- Availability -->
                <div class="col-md-6">
                    <label class="fw-bold">Availability</label>
                    <input type="text" name="availability" class="form-control highlighted"
                        value="{{ $about->availability ?? '' }}" placeholder="e.g., Open to Work">
                </div>

                <!-- Profile Picture -->
                <div class="col-md-6">
                    <label class="fw-bold">Profile Picture</label>
                    <input type="file" name="profile_picture" class="form-control highlighted mt-2"
                        onchange="previewProfile(event)">
                    <div class="mt-2">
                        <img id="previewImage"
                            src="{{ asset('backend/images/about/' . ($about->profile_picture ?? 'default.png')) }}"
                            class="img-thumbnail mt-2" width="150" height="150" alt="Profile">
                    </div>
                </div>

                <!-- CV Upload -->
                <div class="col-md-6">
                    <label class="fw-bold">Upload CV</label>
                    <input type="file" name="cv_file" class="form-control highlighted mt-2">
                    <small class="text-muted d-block mt-3">
                        Current CV:
                        @if (!empty($about->cv_link))
                            <a href="{{ asset('backend/files/cv/' . $about->cv_link) }}" target="_blank"
                                class="text-info">{{ $about->cv_link }}</a>
                        @else
                            Not uploaded yet
                        @endif
                    </small>
                </div>

                <!-- Biography / Intro (Full Width) -->
                <div class="col-12 mt-3">
                    <label class="fw-bold top">Short Biography / Intro</label>
                    <textarea name="biography" id="summernote1" class="form-control highlighted" placeholder="Write your bio..."
                        >{{ $about->biography ?? '' }}</textarea>
                </div>

            </div>

            <!-- Update About Button -->
            <div class="col-12 text-end mt-4">
                <button type="submit" class="btn btn-danger w-auto">Update About</button>
            </div>

        </form>

        <hr>
    </div>

    <div class="container">

        {{-- ✅ Skills Management --}}
        {{-- ✅ Manage Skills Section --}}
        <h4>Manage Skills</h4>

        <form action="{{ url('/skill/store') }}" method="POST" id="skillForm" class="mb-4">
           @csrf

            <div id="skillContainer" class="row g-3 mb-3">
                @if (isset($skills) && count($skills) > 0)
                    @foreach ($skills as $key => $skill)
                        <div class="col-md-6 skill-item">
                            <label class="form-label fw-bold">Skill Name</label>
                            <input type="text" name="skills[{{ $key }}][name]" value="{{ $skill->name }}"
                                class="form-control highlighted" placeholder="Enter skill name">
                        </div>
                        <div class="col-md-6 skill-item">
                            <label class="form-label fw-bold">Progress %</label>
                            <input type="number" name="skills[{{ $key }}][progress]"
                                value="{{ $skill->progress }}" class="form-control highlighted"
                                placeholder="Enter progress %">
                        </div>
                    @endforeach
                @else
                    <div class="col-md-6 skill-item">
                        <label class="form-label fw-bold">Skill Name</label>
                        <input type="text" name="skills[0][name]" placeholder="Enter skill name"
                            class="form-control highlighted">
                    </div>
                    <div class="col-md-6 skill-item">
                        <label class="form-label fw-bold">Progress %</label>
                        <input type="number" name="skills[0][progress]" placeholder="Enter progress %"
                            class="form-control highlighted">
                    </div>
                @endif
            </div>

            <div class="text-end mb-3">
                <button type="button" id="addSkillBtn" class="btn btn-danger w-auto">➕ Add Skill</button>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-success w-auto">💾 Update Skills</button>
            </div>
        </form>

        <hr>

        <h5 class="mt-4">Existing Skills</h5>
        <table class="table table-bordered table-dark table-striped mt-3">
            <thead>
                <tr>
                    <th>Skill Name</th>
                    <th>Progress (%)</th>
                    <th width="100">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($skills as $skill)
                    <tr>
                        <td>{{ $skill->name }}</td>
                        <td>{{ $skill->progress }}%</td>
                        <td class="text-center">
                            <a href="{{ url('/skill/delete/' . $skill->id) }}" class="btn btn-sm btn-danger"
                                onclick="return confirm('Are you sure you want to delete this skill?')">
                                Delete
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center text-muted">No skills added yet</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
@push('script')
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        let skillCount = {{ isset($skills) ? count($skills) : 1 }};

        // Dynamically Add New Skill Fields
        document.getElementById('addSkillBtn').addEventListener('click', function() {
            const container = document.getElementById('skillContainer');
            const newSkill = `
            <div class="col-md-6 skill-item">
                <label class="form-label fw-bold">Skill Name</label>
                <input type="text" name="skills[${skillCount}][name]" placeholder="Enter skill name" class="form-control highlighted">
            </div>
            <div class="col-md-6 skill-item">
                <label class="form-label fw-bold">Progress %</label>
                <input type="number" name="skills[${skillCount}][progress]" placeholder="Enter progress %" class="form-control highlighted">
            </div>
        `;
            container.insertAdjacentHTML('beforeend', newSkill);
            skillCount++;
        });
    });
</script>
<!-- include libraries(jQuery, bootstrap) -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>

<script>
    $(document).ready(function() {
  $('#summernote1').summernote();
});
</script>
@endpush


