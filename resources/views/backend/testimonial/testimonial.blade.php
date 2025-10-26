@extends('backend.master')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="text-danger fw-bold"> Client Testimonials</h3>
        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#addTestimonial">➕ Add Testimonial</button>
    </div>

    <div class="card card-dark p-3" style="background-color: #000; border: 2px solid #dc3545; border-radius: 12px;">
        <table class="table table-dark table-bordered align-middle text-center">
            <thead class="text-danger">
                <tr>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Message</th>
                    <th width="15%">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($testimonials as $test)
                <tr>
                    <td>
                        @if($test->photo)
                            <img src="{{ asset('uploads/testimonials/'.$test->photo) }}" width="60" class="rounded-circle">
                        @else
                            -
                        @endif
                    </td>
                    <td>{{ $test->name }}</td>
                    <td>{{ $test->designation }}</td>
                    <td>{{ Str::limit($test->message, 50) }}</td>
                    <td>
                        <button class="btn btn-sm btn-outline-warning" data-bs-toggle="modal" data-bs-target="#editTestimonial{{ $test->id }}">✏️</button>
                        <a href="{{ url('/admin/testimonials/delete/'.$test->id) }}" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this testimonial?')">🗑</a>
                    </td>
                </tr>

                <!-- Edit Modal -->
                <div class="modal fade" id="editTestimonial{{ $test->id }}" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content card-dark" style="background-color: #000; border: 2px solid #dc3545;">
                            <div class="modal-header">
                                <h5 class="text-danger">✏️ Edit Testimonial</h5>
                                <button class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                            </div>
                            <form action="{{ url('/admin/testimonials/update/'.$test->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <input type="text" name="name" value="{{ $test->name }}" class="form-control mb-2 bg-dark text-light border-danger" placeholder="Client Name">
                                    <input type="text" name="designation" value="{{ $test->designation }}" class="form-control mb-2 bg-dark text-light border-danger" placeholder="Designation">
                                    <textarea name="message" class="form-control mb-2 bg-dark text-light border-danger" placeholder="Message">{{ $test->message }}</textarea>
                                    <input type="file" name="photo" class="form-control bg-dark text-light border-danger">
                                    @if($test->photo)
                                        <img src="{{ asset('uploads/testimonials/'.$test->photo) }}" width="60" class="rounded-circle mt-2">
                                    @endif
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

    <!-- Add Modal -->
    <div class="modal fade" id="addTestimonial" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content card-dark" style="background-color: #000; border: 2px solid #dc3545;">
                <div class="modal-header">
                    <h5 class="text-danger">➕ Add Testimonial</h5>
                    <button class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ url('/admin/testimonials/store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="text" name="name" class="form-control mb-2 bg-dark text-light border-danger" placeholder="Client Name">
                        <input type="text" name="designation" class="form-control mb-2 bg-dark text-light border-danger" placeholder="Designation">
                        <textarea name="message" class="form-control mb-2 bg-dark text-light border-danger" placeholder="Message"></textarea>
                        <input type="file" name="photo" class="form-control bg-dark text-light border-danger">
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
