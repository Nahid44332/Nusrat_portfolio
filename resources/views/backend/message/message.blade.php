@extends('backend.master')

@section('content')
<div class="container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="text-danger fw-bold"> Contact Messages</h3>
    </div>

    <div class="card card-dark p-3" style="background-color: #000; border: 2px solid #dc3545; border-radius: 12px;">
        <table class="table table-dark table-bordered align-middle text-center">
            <thead class="text-danger">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Status</th>
                    <th width="30%">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($messages as $msg)
                <tr class="{{ $msg->is_read ? '' : 'table-active' }}">
                    <td>{{ $msg->name }}</td>
                    <td>{{ $msg->email }}</td>
                    <td>{{ $msg->phone }}</td>
                    <td>{{ $msg->subject }}</td>
                    <td>{{ Str::limit($msg->message, 40) }}</td>
                    <td>
                        @if($msg->is_read)
                            <span class="badge bg-success">Read</span>
                        @else
                            <span class="badge bg-danger">Unread</span>
                        @endif
                    </td>
                    <td class="d-flex justify-content-center gap-1 flex-wrap">

                        <!-- Mark Read / Unread -->
                        @if(!$msg->is_read)
                        <a href="{{ url('admin/messages/read/'.$msg->id) }}"
                           onclick="event.preventDefault(); document.getElementById('read-form-{{ $msg->id }}').submit();"
                           class="btn btn-sm btn-outline-success">
                           Mark Read
                        </a>
                        <form id="read-form-{{ $msg->id }}" action="{{ url('admin/messages/read/'.$msg->id) }}" method="POST" style="display:none;">
                            @csrf
                        </form>
                        @else
                        <a href="{{ url('admin/messages/unread/'.$msg->id) }}"
                           onclick="event.preventDefault(); document.getElementById('unread-form-{{ $msg->id }}').submit();"
                           class="btn btn-sm btn-outline-warning">
                           Mark Unread
                        </a>
                        <form id="unread-form-{{ $msg->id }}" action="{{ url('admin/messages/unread/'.$msg->id) }}" method="POST" style="display:none;">
                            @csrf
                        </form>
                        @endif

                        <!-- Reply Button -->
                        <a href="{{ url('admin/messages/reply/'.$msg->id) }}" class="btn btn-sm btn-outline-info" data-bs-toggle="modal" data-bs-target="#replyModal{{ $msg->id }}">
                            Reply
                        </a>

                        <!-- Delete -->
                        <a href="{{ url('admin/messages/delete/'.$msg->id) }}"
                           onclick="return confirm('Are you sure you want to delete this message?');"
                           class="btn btn-sm btn-outline-danger">
                           Delete
                        </a>
                    </td>
                </tr>

                <!-- Reply Modal -->
                <div class="modal fade" id="replyModal{{ $msg->id }}" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content" style="background-color: #000; border: 2px solid #dc3545; border-radius: 12px;">
                            <div class="modal-header">
                                <h5 class="text-danger">✉️ Reply to {{ $msg->name }}</h5>
                                <button class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                            </div>
                            <form action="{{ url('admin/messages/reply/'.$msg->id) }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <textarea name="reply" class="form-control bg-dark text-light border-danger" rows="4" placeholder="Type your reply..."></textarea>
                                </div>
                                <div class="modal-footer border-0">
                                    <button type="submit" class="btn btn-danger">Send Reply</button>
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
@endsection

