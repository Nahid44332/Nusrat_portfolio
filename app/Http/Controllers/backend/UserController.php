<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
  public function index()
    {
        $users = User::latest()->get();
        return view('backend.user.user', compact('users'));
    }


    public function store(Request $request)
    {
        $user = new User();
        $user->name  = $request->name;
        $user->email = $request->email;
        $user->role  = $request->role;
        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('success', '✅ User added successfully!');
    }


    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name  = $request->name;
        $user->email = $request->email;
        $user->role  = $request->role;
        $user->save();

        return back()->with('success', '✏️ User updated successfully!');
    }


    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return back()->with('success', '🗑️ User deleted!');
    }

    // 🔹 Change password (with current password check)
    public function changePassword(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Current password check
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('error', '❌ Current password is incorrect!');
        }

        // New password update
        if ($request->new_password == $request->confirm_password) {
            $user->password = Hash::make($request->new_password);
            $user->save();
            return redirect('/admin/logout')->with('success', '🔐 Password changed successfully!');
        } else {
            return back()->with('error', '⚠️ Passwords do not match!');
        }
    }
}
