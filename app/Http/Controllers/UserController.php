<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function users()
    {
        $users = User::with('address')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.users', compact('users'));
    }

    public function showUsers($id)
    {
        $user = User::with('address')->findOrFail($id);
        return view('admin.users_show', compact('user'));
    }
}
