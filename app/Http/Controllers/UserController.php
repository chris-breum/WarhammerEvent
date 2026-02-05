<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->get();
        return view('users.index', ['users' => $users]);
    }

    public function updateRole(Request $request, User $user)
    {
        $validated = $request->validate([
            'role' => 'required|in:user,admin',
        ]);

        $user->update([
            'role' => $validated['role'],
        ]);

        return redirect()->back()->with('success', 'Brugerrolle opdateret!');
    }
}
