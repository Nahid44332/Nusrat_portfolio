@extends('backend.master')

@section('content')
<style>
/* ========= DARK MODERN UI ========= */
.card-dark {
    background-color: #000;
    border: 2px solid #dc3545;
    border-radius: 18px;
    color: #fff;
    box-shadow: 0 0 15px rgba(220, 53, 69, 0.2);
    transition: 0.3s;
}
.card-dark:hover {
    box-shadow: 0 0 25px rgba(220, 53, 69, 0.4);
}

.table-dark th, .table-dark td {
    color: #fff !important;
    vertical-align: middle;
}

.btn-red {
    background: #dc3545;
    border: none;
    color: #fff;
}
.btn-red:hover {
    background: #bb2d3b;
    color: #fff;
}
</style>

<div class="container-fluid py-4">

    <!-- 🔹 Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-danger">Category & Tag Management</h3>
        <div>
            <button class="btn btn-red me-2" data-bs-toggle="modal" data-bs-target="#addCategoryModal">➕ Add Category</button>
            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#addTagModal">🏷️ Add Tag</button>
        </div>
    </div>

    <div class="row g-4">

        <!-- 🔹 Category Section -->
        <div class="col-lg-12">
            <div class="card card-dark p-3">
                <h5 class="text-danger mb-3">Categories</h5>

                <table class="table table-dark table-bordered align-middle">
                    <thead>
                        <tr>
                            <th width="10%">SL</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th width="20%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categories as $key => $cat)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $cat->name }}</td>
                            <td>{{ $cat->description ?? '-' }}</td>
                            <td>
                                <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editCategory{{ $cat->id }}">✏️</button>
                                <a href="{{ url('/category/delete/'.$cat->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Delete this category?')">🗑️</a>
                            </td>
                        </tr>

                        <!-- Edit Modal -->
                        <div class="modal fade" id="editCategory{{ $cat->id }}" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content bg-dark text-light border-danger">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-danger">✏️ Edit Category</h5>
                                        <button class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                    </div>
                                    <form action="{{ url('/category/update/'.$cat->id) }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <input type="text" name="name" value="{{ $cat->name }}" class="form-control mb-3 bg-dark text-light border-danger" placeholder="Category Name">
                                            <textarea name="description" class="form-control bg-dark text-light border-danger" placeholder="Description">{{ $cat->description }}</textarea>
                                        </div>
                                        <div class="modal-footer border-0">
                                            <button type="submit" class="btn btn-warning">💾 Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @empty
                        <tr><td colspan="4" class="text-center text-muted">No categories found</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- 🔹 Tag Section -->
        <div class="col-lg-12">
            <div class="card card-dark p-3">
                <h5 class="text-danger mb-3">Tags</h5>

                <table class="table table-dark table-bordered align-middle">
                    <thead>
                        <tr>
                            <th width="10%">SL</th>
                            <th>Name</th>
                            <th width="20%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($tags as $key => $tag)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $tag->name }}</td>
                            <td>
                                <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editTag{{ $tag->id }}">✏️</button>
                                <a href="{{ url('/tag/delete/'.$tag->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Delete this tag?')">🗑️</a>
                            </td>
                        </tr>

                        <!-- Edit Modal -->
                        <div class="modal fade" id="editTag{{ $tag->id }}" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content bg-dark text-light border-danger">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-danger">✏️ Edit Tag</h5>
                                        <button class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                    </div>
                                    <form action="{{ url('/tag/update/'.$tag->id) }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <input type="text" name="name" value="{{ $tag->name }}" class="form-control mb-3 bg-dark text-light border-danger" placeholder="Tag Name">
                                        </div>
                                        <div class="modal-footer border-0">
                                            <button type="submit" class="btn btn-warning">💾 Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @empty
                        <tr><td colspan="3" class="text-center text-muted">No tags found</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- 🔹 Add Category Modal -->
<div class="modal fade" id="addCategoryModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content bg-dark text-light border-danger">
            <div class="modal-header">
                <h5 class="modal-title text-danger">➕ Add Category</h5>
                <button class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ url('/category/store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="text" name="name" class="form-control mb-3 bg-dark text-light border-danger" placeholder="Category Name">
                    <textarea name="description" class="form-control bg-dark text-light border-danger" placeholder="Description"></textarea>
                </div>
                <div class="modal-footer border-0">
                    <button type="submit" class="btn btn-red">💾 Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- 🔹 Add Tag Modal -->
<div class="modal fade" id="addTagModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content bg-dark text-light border-danger">
            <div class="modal-header">
                <h5 class="modal-title text-danger">🏷️ Add Tag</h5>
                <button class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ url('/tag/store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="text" name="name" class="form-control bg-dark text-light border-danger" placeholder="Tag Name">
                </div>
                <div class="modal-footer border-0">
                    <button type="submit" class="btn btn-warning">💾 Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
