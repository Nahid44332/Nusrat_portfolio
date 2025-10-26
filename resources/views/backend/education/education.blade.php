@extends('backend.master')

@section('content')
<style>
    body {
        background-color: #000 !important; /* পুরো পেজ কালো */
    }
    .card-dark {
        background-color: #111 !important; /* কার্ড ডার্ক গ্রে */
        border: 2px solid #dc3545 !important; /* লাল বর্ডার */
        border-radius: 10px;
    }
    .table-dark {
        background-color: #000 !important;
        color: #fff;
    }
    .table thead {
        background-color: #111 !important;
        border-bottom: 2px solid #dc3545 !important;
    }
    .btn-red {
        background-color: #dc3545 !important;
        color: white !important;
        border: none !important;
    }
    .btn-red:hover {
        background-color: #b81f36 !important;
    }
    .modal-content.card-dark {
        background-color: #111 !important;
        border: 2px solid #dc3545 !important;
    }
    input.form-control,
    textarea.form-control,
    select.form-control {
        background-color: #000 !important;
        border: 2px solid #dc3545 !important;
        color: white !important;
    }
</style>

<div class="container-fluid py-4">

    <!-- 🔴 Education Section -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="text-danger fw-bold"> Education</h3>
        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#addEducation">➕ Add Education</button>
    </div>

    <div class="card card-dark p-3 mb-5">
        <table class="table table-dark table-bordered align-middle">
            <thead class="text-danger text-center">
                <tr>
                    <th>Degree</th>
                    <th>Institution</th>
                    <th>Year</th>
                    <th>Description</th>
                    <th width="15%">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($educations as $edu)
                <tr>
                    <td>{{ $edu->degree }}</td>
                    <td>{{ $edu->institution }}</td>
                    <td>{{ $edu->year }}</td>
                    <td>{{ Str::limit($edu->description, 40) }}</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-outline-warning" data-bs-toggle="modal" data-bs-target="#editEducation{{ $edu->id }}">✏️</button>
                        <a href="{{ url('/admin/education/delete/'.$edu->id) }}" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this item?')">🗑</a>
                    </td>
                </tr>

                <!-- Edit Modal -->
                <div class="modal fade" id="editEducation{{ $edu->id }}" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content card-dark">
                            <div class="modal-header">
                                <h5 class="modal-title text-danger">✏️ Edit Education</h5>
                                <button class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                            </div>
                            <form action="{{ url('/admin/education/update/'.$edu->id) }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <input type="text" name="degree" value="{{ $edu->degree }}" class="form-control mb-3" placeholder="Degree">
                                    <input type="text" name="institution" value="{{ $edu->institution }}" class="form-control mb-3" placeholder="Institution">
                                    <input type="text" name="year" value="{{ $edu->year }}" class="form-control mb-3" placeholder="Year">
                                    <textarea name="description" class="form-control">{{ $edu->description }}</textarea>
                                </div>
                                <div class="modal-footer border-0">
                                    <button type="submit" class="btn btn-red">💾 Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Add Education Modal -->
    <div class="modal fade" id="addEducation" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content card-dark">
                <div class="modal-header">
                    <h5 class="modal-title text-danger">➕ Add Education</h5>
                    <button class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ url('/admin/education/store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="text" name="degree" class="form-control mb-3" placeholder="Degree">
                        <input type="text" name="institution" class="form-control mb-3" placeholder="Institution">
                        <input type="text" name="year" class="form-control mb-3" placeholder="Year">
                        <textarea name="description" class="form-control" placeholder="Description"></textarea>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="submit" class="btn btn-red">💾 Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- 💼 Experience Section -->
    <div class="d-flex justify-content-between align-items-center mb-4 mt-5">
        <h3 class="text-danger fw-bold"> Experience</h3>
        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#addExperience">➕ Add Experience</button>
    </div>

    <div class="card card-dark p-3">
        <table class="table table-dark table-bordered align-middle">
            <thead class="text-danger text-center">
                <tr>
                    <th>Title</th>
                    <th>Company</th>
                    <th>Year</th>
                    <th>Description</th>
                    <th width="15%">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($experiences as $exp)
                <tr>
                    <td>{{ $exp->title }}</td>
                    <td>{{ $exp->company }}</td>
                    <td>{{ $exp->year }}</td>
                    <td>{{ Str::limit($exp->description, 40) }}</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-outline-warning" data-bs-toggle="modal" data-bs-target="#editExperience{{ $exp->id }}">✏️</button>
                        <a href="{{ url('/admin/experience/delete/'.$exp->id) }}" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this item?')">🗑</a>
                    </td>
                </tr>

                <!-- Edit Experience Modal -->
                <div class="modal fade" id="editExperience{{ $exp->id }}" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content card-dark">
                            <div class="modal-header">
                                <h5 class="modal-title text-danger">✏️ Edit Experience</h5>
                                <button class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                            </div>
                            <form action="{{ url('/admin/experience/update/'.$exp->id) }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <input type="text" name="title" value="{{ $exp->title }}" class="form-control mb-3" placeholder="Title">
                                    <input type="text" name="company" value="{{ $exp->company }}" class="form-control mb-3" placeholder="Company">
                                    <input type="text" name="year" value="{{ $exp->year }}" class="form-control mb-3" placeholder="Year">
                                    <textarea name="description" class="form-control">{{ $exp->description }}</textarea>
                                </div>
                                <div class="modal-footer border-0">
                                    <button type="submit" class="btn btn-red">💾 Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Add Experience Modal -->
    <div class="modal fade" id="addExperience" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content card-dark">
                <div class="modal-header">
                    <h5 class="modal-title text-danger">➕ Add Experience</h5>
                    <button class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ url('/admin/experience/store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="text" name="title" class="form-control mb-3" placeholder="Title">
                        <input type="text" name="company" class="form-control mb-3" placeholder="Company">
                        <input type="text" name="year" class="form-control mb-3" placeholder="Year">
                        <textarea name="description" class="form-control" placeholder="Description"></textarea>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="submit" class="btn btn-red">💾 Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection
