<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        return view('admin.index', compact('totalUsers'));
    }

    public function users()
    {
        $users = User::with('address')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.users', compact('users'));
    }

    public function show($id)
    {
        $user = User::with('address')->findOrFail($id);
        return view('admin.users_show', compact('user'));
    }

    public function create()
    {
        return view('admin.users');
    }

    public function store(Request $request)
    {
        $request->validate ([
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['nullable', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:15', 'unique:users,phone'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8'],
            'role' => ['required', 'string', 'in:admin,owner,user'],
            'address_line_1' => ['nullable', 'string', 'max:255'],
            'address_line_2' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:255'],
            'state' => ['nullable', 'string', 'max:255'],
            'postal_code' => ['nullable', 'string', 'max:20'],
            'country' => ['nullable', 'string', 'max:255'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        $user->address()->create([
            'address_line_1' => $request->address_line_1,
            'address_line_2' => $request->address_line_2,
            'city' => $request->city,
            'state' => $request->state,
            'postal_code' => $request->postal_code,
            'country' => $request->country,
        ]);

        return redirect()->route('users_boards')->with('success', 'User created successfully');
    }

    public function edit($id)
    {
        $user = User::with('address')->findOrFail($id);
        return view('admin.users_edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => ['nullable', 'string', 'max:255'],
            'lastname' => ['nullable', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:15', 'unique:users,phone,' . $user->id],
            'email' => ['nullable', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'role' => ['nullable', 'string', 'in:admin,owner,user'],
            'address_line_1' => ['nullable', 'string', 'max:255'],
            'address_line_2' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:255'],
            'state' => ['nullable', 'string', 'max:255'],
            'postal_code' => ['nullable', 'string', 'max:20'],
            'country' => ['nullable', 'string', 'max:255'],
        ]);

        $user->update([
            'name' => $request->input('name', $user->name),
            'lastname' => $request->input('lastname', $user->lastname),
            'phone' => $request->input('phone', $user->phone),
            'email' => $request->input('email', $user->email),
            'role' => $request->input('role', $user->role),
        ]);

        $address = $user->address()->first();
        $user->address()->update([
            'address_line_1' => $request->input('address_line_1', $address->address_line_1),
            'address_line_2' => $request->input('address_line_2', $address->address_line_2),
            'city' => $request->input('city', $address->city),
            'state' => $request->input('state', $address->state),
            'postal_code' => $request->input('postal_code', $address->postal_code),
            'country' => $request->input('country', $address->country),
        ]);

        return redirect()->route('users_boards')->with('success', 'User updated successfully');
    }

    public function deleted(User $user)
    {
        $user->delete();
        return redirect()->route('users_boards')->with('success', 'User deleted successfully');
    }
}
