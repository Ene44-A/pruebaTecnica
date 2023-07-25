<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index()
    {
        $users = User::all();
        return view('admin/users', compact('users'));
    }

    public function create()
    {
        return view('admin/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        User::create($request);

        return redirect()->route('admin/users')->with('success', 'Usuario creado correctamente.');
    }

    public function edit(User $user)
    {
        return view('admin/usersEdit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8', // Add any password validation rules you need
        ]);

        $user->update($request->only('name', 'email', 'password'));

        return redirect()->route('edit', $user)->with('success', 'Usuario actualizado correctamente.');
    }


    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users')->with('success', 'Usuario eliminado correctamente.');
    }
}