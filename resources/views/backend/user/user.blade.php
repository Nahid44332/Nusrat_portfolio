@extends('backend.master')

@section('content')
<div class="container-fluid py-4">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="text-danger fw-bold"> User Management</h3>
        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#addUserModal">➕ Add User</button>
    </div>

    <!-- User Table -->
    <div class="card card-dark p-3" style="background-color:#000; border:2px solid #dc3545; border-radius:12px;">
        <table class="table table-dark table-bordered align-middle text-center">
            <thead class="text-danger">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <span class="badge bg-info text-dark">{{ ucfirst($user->role) }}</span>
                    </td>
                    <td class="d-flex justify-content-center gap-2 flex-wrap">

                        <!-- Edit Button -->
                        <button class="btn btn-sm btn-outline-warning"
                            data-bs-toggle="modal"
                            data-bs-target="#editUserModal{{ $user->id }}">
                             Edit
                        </button>

                        <!-- Change Password Button -->
                        <button class="btn btn-sm btn-success"
                            data-bs-toggle="modal"
                            data-bs-target="#changePassModal{{ $user->id }}">
                             Change Password
                        </button>

                        <!-- Delete Button -->
                        <a href="{{ url('admin/users/delete/'.$user->id) }}"
                            onclick="return confirm('Are you sure you want to delete this user?')"
                            class="btn btn-sm btn-outline-danger">
                             Delete
                        </a>
                    </td>
                </tr>

                <!-- Edit Modal -->
                <div class="modal fade" id="editUserModal{{ $user->id }}" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content bg-dark text-light border-danger">
                            <div class="modal-header">
                                <h5 class="text-danger">✏️ Edit User</h5>
                                <button class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                            </div>
                            <form action="{{ url('admin/users/update/'.$user->id) }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <input type="text" name="name" value="{{ $user->name }}"
                                        class="form-control mb-2 bg-dark text-light border-danger" placeholder="Name">
                                    <input type="email" name="email" value="{{ $user->email }}"
                                        class="form-control mb-2 bg-dark text-light border-danger" placeholder="Email">
                                    <select name="role" class="form-control mb-2 bg-dark text-light border-danger">
                                        <option value="admin" {{ $user->role=='admin'?'selected':'' }}>Admin</option>
                                        <option value="editor" {{ $user->role=='editor'?'selected':'' }}>Editor</option>
                                        <option value="viewer" {{ $user->role=='viewer'?'selected':'' }}>Viewer</option>
                                    </select>
                                </div>
                                <div class="modal-footer border-0">
                                    <button type="submit" class="btn btn-danger">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Change Password Modal -->
                <div class="modal fade" id="changePassModal{{ $user->id }}" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content bg-dark text-light border-success">
                            <div class="modal-header">
                                <h5 class="text-success">🔐 Change Password for {{ $user->name }}</h5>
                                <button class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                            </div>
                            <form action="{{ url('admin/users/change-password/'.$user->id) }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label text-light">Current Password</label>
                                        <input type="password" name="current_password"
                                            class="form-control bg-dark text-light border-success"
                                            placeholder="Enter current password" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label text-light">New Password</label>
                                        <input type="password" name="new_password"
                                            class="form-control bg-dark text-light border-success"
                                            placeholder="Enter new password" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label text-light">Re-enter New Password</label>
                                        <input type="password" name="confirm_password"
                                            class="form-control bg-dark text-light border-success"
                                            placeholder="Re-enter new password" required>
                                    </div>
                                </div>
                                <div class="modal-footer border-0">
                                    <button type="submit" class="btn btn-success">✅ Update Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Add User Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content bg-dark text-light border-danger">
            <div class="modal-header">
                <h5 class="text-danger">➕ Add New User</h5>
                <button class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ url('admin/users/store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="text" name="name"
                        class="form-control mb-2 bg-dark text-light border-danger" placeholder="Full Name" required>
                    <input type="email" name="email"
                        class="form-control mb-2 bg-dark text-light border-danger" placeholder="Email" required>
                    <input type="password" name="password"
                        class="form-control mb-2 bg-dark text-light border-danger" placeholder="Password" required>
                    <select name="role"
                        class="form-control mb-2 bg-dark text-light border-danger" required>
                        <option value="admin">Admin</option>
                        <option value="editor">Editor</option>
                        <option value="viewer">Viewer</option>
                    </select>
                </div>
                <div class="modal-footer border-0">
                    <button type="submit" class="btn btn-danger">💾 Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
