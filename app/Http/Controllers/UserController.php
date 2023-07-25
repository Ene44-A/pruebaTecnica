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

    public function usersCreate()
    {
        return view('admin/usersCreate');
    }

    public function usersStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        User::create($request->all());

        return redirect()->route('admin/users')->with('success', 'Usuario creado correctamente.');
    }

    public function usersEdit(User $user)
    {
        return view('admin/usersEdit', compact('user'));
    }

    public function usersUpdate(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8',
        ]);

        $user->usersUpdate($request->all());

        return redirect()->route('admin/users')->with('success', 'Usuario actualizado correctamente.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Usuario eliminado correctamente.');
    }
}