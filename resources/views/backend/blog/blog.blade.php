@extends('backend.master')

@section('content')
    <style>
        .card-dark {
            background-color: #000;
            border: 2px solid #dc3545;
            border-radius: 15px;
            color: #fff;
            box-shadow: 0 0 15px rgba(220, 53, 69, 0.2);
        }

        .card-dark:hover {
            box-shadow: 0 0 25px rgba(220, 53, 69, 0.4);
        }

        .table-dark th,
        .table-dark td {
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

        .btn-warning {
            background: #ffc107;
            color: #000;
            border: none;
        }

        .btn-warning:hover {
            background: #e0a800;
            color: #000;
        }
    </style>

    <div class="container-fluid py-4">
        <h3 class="text-danger fw-bold mb-4"> Blog Management</h3>

        <!-- Add Blog Button -->
        <button class="btn btn-red mb-3" data-bs-toggle="modal" data-bs-target="#addBlogModal">➕ Add Blog</button>

        <div class="row">
            <div class="col-lg-12">
                <div class="card card-dark p-3">
                    <table class="table table-dark table-bordered align-middle">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($blogs as $key => $blog)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $blog->title }}</td>
                                    <td>{{ $blog->category?->name ?? '-' }}</td>
                                    <td>
                                        @if ($blog->image)
                                            <img src="{{ asset('uploads/blog/' . $blog->image) }}" alt="blog"
                                                width="80">
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#editBlog{{ $blog->id }}">✏️</button>
                                        <a href="{{ url('/blog/delete/' . $blog->id) }}" class="btn btn-red btn-sm"
                                            onclick="return confirm('Delete this blog?')">🗑️</a>
                                    </td>
                                </tr>

                                <!-- Edit Blog Modal -->
                                <div class="modal fade" id="editBlog{{ $blog->id }}" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content card-dark">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-danger"> Edit Blog</h5>
                                                <button class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                            </div>
                                            <form action="{{ url('/blog/update/' . $blog->id) }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body">
                                                    <input type="text" name="title" value="{{ $blog->title }}"
                                                        class="form-control mb-3 bg-dark text-light border-danger">
                                                    <textarea name="content" id="summernote{{ $blog->id }}" class="form-control mb-3 bg-dark text-light border-danger">{{ $blog->content }}</textarea>

                                                    <!-- Category Selection -->
                                                    <select name="category_id"
                                                        class="form-control mb-3 bg-dark text-light border-danger" required>
                                                        <option value="">-- Select Category --</option>
                                                        @foreach ($categories as $cat)
                                                            <option value="{{ $cat->id }}"
                                                                {{ $blog->category_id == $cat->id ? 'selected' : '' }}>
                                                                {{ $cat->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>


                                                    <!-- Key Takeaways Section -->
                                                    <label class="text-danger">Key Takeaways:</label>
                                                    <div id="keyTakeawaysArea{{ $blog->id }}">
                                                        @php $takeaways = json_decode($blog->key_takeaways ?? '[]'); @endphp
                                                        @if (!empty($takeaways))
                                                            @foreach ($takeaways as $t)
                                                                <div class="d-flex mb-2 key-item">
                                                                    <input type="text" name="key_takeaways[]"
                                                                        value="{{ $t }}"
                                                                        class="form-control bg-dark text-light border-danger">
                                                                    <button type="button"
                                                                        class="btn btn-danger ms-2 remove-btn">✖</button>
                                                                </div>
                                                            @endforeach
                                                        @else
                                                            <div class="d-flex mb-2 key-item">
                                                                <input type="text" name="key_takeaways[]"
                                                                    class="form-control bg-dark text-light border-danger"
                                                                    placeholder="Enter a takeaway">
                                                                <button type="button"
                                                                    class="btn btn-danger ms-2 remove-btn">✖</button>
                                                            </div>
                                                        @endif

                                                    </div>
                                                    <button type="button"
                                                        class="btn btn-warning btn-sm mt-2 addMoreEditBtn"
                                                        data-id="{{ $blog->id }}">➕ Add More</button>

                                                    <input type="file" name="image"
                                                        class="form-control bg-dark text-light border-danger mt-3">
                                                    @if ($blog->image)
                                                        <img src="{{ asset('uploads/blog/' . $blog->image) }}"
                                                            width="80" class="mt-2">
                                                    @endif
                                                </div>
                                                <div class="modal-footer border-0 mt-3">
                                                    <button type="submit" class="btn btn-warning">💾 Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted">No blogs found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Add Blog Modal -->
        <div class="modal fade" id="addBlogModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content card-dark">
                    <div class="modal-header">
                        <h5 class="modal-title text-danger">➕ Add Blog</h5>
                        <button class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <form action="{{ url('/blog/store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <input type="text" name="title" class="form-control mb-3 bg-dark text-light border-danger"
                                placeholder="Blog Title" required>
                            <textarea name="content" id="summernote1" class="form-control mb-3 bg-dark text-light border-danger"
                                placeholder="Content"></textarea>
                            <!-- Category Selection -->
                            <select name="category_id" class="form-control mb-3 bg-dark text-light border-danger" required>
                                <option value="">-- Select Category --</option>
                                @foreach ($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>

                            <!-- Key Takeaways Section -->
                            <label class="text-danger">Key Takeaways:</label>
                            <div id="keyTakeawaysArea">
                                <div class="d-flex mb-2 key-item">
                                    <input type="text" name="key_takeaways[]"
                                        class="form-control bg-dark text-light border-danger"
                                        placeholder="Enter a takeaway">
                                    <button type="button" class="btn btn-danger ms-2 remove-btn">✖</button>
                                </div>
                            </div>
                            <button type="button" id="addMoreBtn" class="btn btn-warning btn-sm mt-2">➕ Add
                                More</button>

                            <input type="file" name="image"
                                class="form-control bg-dark text-light border-danger mt-3">
                        </div>
                        <div class="modal-footer border-0 mt-3">
                            <button type="submit" class="btn btn-red">💾 Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            // Add Blog Modal
            $('#summernote1').summernote({
                height: 200,
                placeholder: 'Write your blog content...'
            });

            // Edit Blog Modals
            @foreach ($blogs as $blog)
                $(document).on('shown.bs.modal', '#editBlog{{ $blog->id }}', function() {
                    $('#summernote{{ $blog->id }}').summernote({
                        height: 200,
                        placeholder: 'Edit your blog content...'
                    });
                });
            @endforeach
        });
    </script>

    <script>
        document.addEventListener('click', function(e) {
            // Remove Key Takeaway
            if (e.target.classList.contains('remove-btn')) {
                e.target.closest('.key-item').remove();
            }

            // Add More for Edit Modal
            if (e.target.classList.contains('addMoreEditBtn')) {
                const id = e.target.getAttribute('data-id');
                const areaEdit = document.getElementById('keyTakeawaysArea' + id);
                const div = document.createElement('div');
                div.classList.add('d-flex', 'mb-2', 'key-item');
                div.innerHTML = `
            <input type="text" name="key_takeaways[]" class="form-control bg-dark text-light border-danger" placeholder="Enter a takeaway">
            <button type="button" class="btn btn-danger ms-2 remove-btn">✖</button>
        `;
                areaEdit.appendChild(div);
            }

            // Add More for Add Modal
            if (e.target.id === 'addMoreBtn') {
                const area = document.getElementById('keyTakeawaysArea');
                const div = document.createElement('div');
                div.classList.add('d-flex', 'mb-2', 'key-item');
                div.innerHTML = `
            <input type="text" name="key_takeaways[]" class="form-control bg-dark text-light border-danger" placeholder="Enter a takeaway">
            <button type="button" class="btn btn-danger ms-2 remove-btn">✖</button>
        `;
                area.appendChild(div);
            }
        });
    </script>
@endpush
