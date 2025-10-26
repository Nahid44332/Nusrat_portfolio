<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
  public function message()
    {
        $messages = Message::latest()->get();
        return view('backend.message.message', compact('messages'));
    }

    // Mark as Read
    public function markRead($id)
    {
        $msg = Message::findOrFail($id);
        $msg->is_read = true;
        $msg->save();

        return back()->with('success', '📘 Marked as read!');
    }

    // Mark as Unread
    public function markUnread($id)
    {
        $msg = Message::findOrFail($id);
        $msg->is_read = false;
        $msg->save();

        return back()->with('success', '📗 Marked as unread!');
    }

    // Delete message
    public function delete($id)
    {
        $msg = Message::findOrFail($id);
        $msg->delete();

        return back()->with('success', '🗑 Message deleted!');
    }

    // Reply to message
    public function reply(Request $request, $id)
    {
        $request->validate([
            'reply' => 'required|string',
        ]);

        $msg = Message::findOrFail($id);

        Mail::raw($request->reply, function ($mail) use ($msg) {
            $mail->to($msg->email)
                 ->subject('Reply from Aman IT Agency');
        });

        return back()->with('success', '📤 Reply sent successfully!');
    }
}
